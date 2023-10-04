<?php

require_once "../modelo/Database.php";

class Conductor
{
    private $conn;

    public function __construct()
    {
        $conn = new Database();
        $this->conn = $conn->connect();
    }

    public function insertarConductor(
        string $cedula,
        string $nombre,
        string $apellido,
        string $direccion,
        string $celular,
        int $num_licencia,
        string $vencimiento_licencia,
        string $grado_licencia,
        int $cedula_usuario
    ): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO `conductores` (
                `cedula_conductor`,
                `nombre_conductor`,
                `apellido_conductor`,
                `direccion_conductor`,
                `celular_conductor`,
                `numero_licencia`,
                `vencimiento_licencia`,
                `grado_licencia`,
                `cedula_usuario`
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $cedula,
                $nombre,
                $apellido,
                $direccion,
                $celular,
                $num_licencia,
                $vencimiento_licencia,
                $grado_licencia,
                $cedula_usuario
            ]);

            return true;

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            exit;
        }
    }
}

?>