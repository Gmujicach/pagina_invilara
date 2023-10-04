<?php

require_once "../modelo/Database.php";

class Usuario
{
    private $conn;

    public function __construct()
    {
        $conn = new Database();
        $this->conn = $conn->connect();
    }

    public function register(
        string $cedula_usuario,
        string $nombre_usuario,
        string $contraseña_usuario,
        int $id_rol,
    ): bool {
        try {
            // Verificar si el usuario existe por su cedula
            $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE cedula_usuario = ?");
            $stmt->execute([$cedula_usuario]);
            $user = $stmt->fetch();

            if ($user) {
                return false;
            }

            // Si no existe, lo agregara al sistema
            $stmt = $this->conn->prepare(
                "INSERT INTO `usuario` (`cedula_usuario`, `nombre_usuario`, `contrasena_usuario`, `ID_rol`) VALUES (?, ?, ?, ?)"
            );

            $contraseña_hash = password_hash($contraseña_usuario, PASSWORD_DEFAULT);
            $stmt->execute([$cedula_usuario, $nombre_usuario, $contraseña_hash, $id_rol]);
            return true;

        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
            exit;
        }
    }

    public function login(
        string $cedula_usuario,
        string $contraseña_usuario
    ): bool {
        try {
            // Verificar si el usuario existe
            $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE cedula_usuario = ?");
            $stmt->execute([$cedula_usuario]);
            $user = $stmt->fetch();

            if (!$user) {
                echo "El usuario no existe";
                exit(1);
            }

            // Verificar si el hash coincide
            if (password_verify($contraseña_usuario, $user["contrasena_usuario"])) {
                return $user["ID_rol"];
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
            exit;
        }
    }
}

?>