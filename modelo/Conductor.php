<?php

class Conductor
{
    private $conn;

    public function __construct(PDO $pdo)
    {
        $this->conn = $pdo;
    }

    public function crearConductor(
        $cedula,
        $nombre,
        $apellido,
        $direccion,
        $celular,
        $num_licencia,
        $vencimiento_licencia,
        $grado_licencia,
        $cedula_usuario
    ): bool {
        try {
            if ($this->obtenerConductor($cedula)) {
                echo "ERROR: El conductor ya existe";
                exit;
            }

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

    /**
     * La cedula es el identificador.
     */
    public function actualizarConductor(
        $cedula,
        $nuevoNombre,
        $nuevoApellido,
        $nuevaDireccion,
        $nuevoCelular,
        $nuevaLicencia,
        $nuevoVencimiento,
        $nuevoGrado
    ) {
        $stmt = $this->conn->prepare(
            "UPDATE `conductores` SET 
                nombre_conductor=?, 
                apellido_conductor=?, 
                direccion_conductor=?, 
                celular_conductor=?, 
                numero_licencia=?, 
                vencimiento_licencia=?, 
                grado_licencia=? 
            WHERE cedula_conductor=?"
        );
        $stmt->execute([
            $nuevoNombre,
            $nuevoApellido,
            $nuevaDireccion,
            $nuevoCelular,
            $nuevaLicencia,
            $nuevoVencimiento,
            $nuevoGrado,
            $cedula
        ]);
        return $stmt->rowCount();
    }

    public function eliminarConductor($cedula_conductor): string|int
    {
        $stmt = $this->conn->prepare("DELETE FROM `conductores` WHERE `cedula_conductor` = ?");
        $stmt->execute([$cedula_conductor]);
        return $stmt->rowCount();
    }

    /**
     * Listara todos los vehiculos
     */
    public function listarConductores(): array
    {
        $result = $this->conn->query("SELECT * FROM `conductores`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerConductor($identificador): array | bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM `conductores` WHERE `cedula_conductor` = ?");
        $stmt->execute([$identificador]);
        return $stmt->fetch();
    }
}
