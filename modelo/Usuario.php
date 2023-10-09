<?php

class Usuario
{
    private $conn;

    public function __construct(PDO $pdo)
    {
        $this->conn = $pdo;
    }

    /**
     * Verificara si el usuario no existe, cifrara la contraseña y registrara el usuario en el sistema.
     * @param string $cedula_usuario
     * @param string $nombre_usuario
     * @param string $contraseña_usuario
     * @param int $id_rol
     * @return bool
     */
    public function register($cedula_usuario, $nombre_usuario, $contraseña_usuario, $id_rol)
    {
        try {
            // Verificar si el usuario existe por su cedula
            $user = $this->getUserInfo($cedula_usuario);

            if ($user) {
                return false;
            }

            // Si no existe, lo agregara al sistema
            $stmt = $this->conn->prepare(
                "INSERT INTO `usuario` (`cedula_usuario`, `nombre_usuario`, `contrasena_usuario`, `ID_rol`) 
                VALUES (?, ?, ?, ?)"
            );

            $contraseña_hash = password_hash($contraseña_usuario, PASSWORD_DEFAULT);
            $stmt->execute([$cedula_usuario, $nombre_usuario, $contraseña_hash, $id_rol]);
            return true;

        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
            exit;
        }
    }

    /**
     * Devolvera un `array` del usuario si existe y la contraseña coincide con el hash.
     * @param string $cedula_usuario
     * @param string $contraseña_usuario
     * @return array | bool
     */
    public function login($cedula_usuario, $contraseña_usuario)
    {
        $user = $this->getUserInfo($cedula_usuario);

        if (!$user) {
            return false;
        }

        // Verificar si el hash coincide
        if (password_verify($contraseña_usuario, $user["contrasena_usuario"])) {
            return $user;
        } else {
            return false;
        }
    }

    public function listarRoles()
    {
        $result = $this->conn->query("SELECT * FROM `roles`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Si encuentra el usuario en el sistema devolvera un `array` con sus datos.
     * @param mixed $identificador
     * @return array
     */
    private function getUserInfo($identificador)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `usuario` WHERE `cedula_usuario` = ?");
        $stmt->execute([$identificador]);
        return $stmt->fetch();
    }
}
