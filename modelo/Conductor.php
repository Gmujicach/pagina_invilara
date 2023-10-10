<?php
ini_set('display_errors', 1);
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
        return $stmt->execute([
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
    }

    /**
     * La cedula es el identificador.
     */
    public function actualizarConductor(
        $id_cedula,
        $nuevoCedula,
        $nuevoNombre,
        $nuevoApellido,
        $nuevaDireccion,
        $nuevoCelular,
        $nuevaLicencia,
        $nuevoVencimiento,
        $nuevoGrado
    ): bool {
        if (!$this->obtenerConductor($id_cedula)) {
            echo "ERROR: El conductor con la cedula . $id_cedula . no existe";
            exit;
        }

        $stmt = $this->conn->prepare(
            "UPDATE 
                `conductores` 
            SET
                `cedula_conductor` = ?,
                `nombre_conductor` = ?,
                `apellido_conductor` = ?,
                `direccion_conductor` = ?,
                `celular_conductor` = ?,
                `numero_licencia` = ?,
                `vencimiento_licencia` = ?,
                `grado_licencia` = ?
            WHERE
                `cedula_conductor` = ?"
        );
        return $stmt->execute([
            $nuevoCedula,
            $nuevoNombre,
            $nuevoApellido,
            $nuevaDireccion,
            $nuevoCelular,
            $nuevaLicencia,
            $nuevoVencimiento,
            intval($nuevoGrado),
            $id_cedula,
        ]);
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

    public function obtenerConductor($id): array | bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM `conductores` WHERE `cedula_conductor` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
