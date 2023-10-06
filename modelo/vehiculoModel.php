<?php

require_once "../modelo/baseDatosModel.php";

class Vehiculo
{
    private $conn;

    public function __construct(PDO $pdo)
    {
        $this->conn = $pdo;
    }

    public function insertarVechiculo(
        string $serial,
        string $numero_vehiculo,
        string $color,
        string $ID_tipo,
        string $ID_fabricante,
    ): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO `vehiculo` (
                `serial`,
                `numero_vehiculo`,
                `color`,
                `ID_tipo`,
                `ID_fabricante`
                ) VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $serial,
                $numero_vehiculo,
                $color,
                $ID_tipo,
                $ID_fabricante,
            ]);
            return true;

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            exit;
        }
    }

    public function actualizarConductor(
        $serial,
        $numero_vehiculo,
        $color,
        $ID_tipo,
        $ID_fabricante,
    ) {
        $stmt = $this->conn->prepare(
            "UPDATE `vehiculo` SET 
                serial=?, 
                numero_vehiculo=?, 
                color=?, 
                ID_tipo=?, 
                ID_fabricante=?, 
            WHERE serial=?"
        );
        $stmt->execute([
            $serial,
            $numero_vehiculo,
            $color,
            $ID_tipo,
            $ID_fabricante,
        ]);
        return $stmt->rowCount();
    }

    public function eliminarConductor($serial)
    {
        $stmt = $this->conn->prepare("DELETE FROM `vehiculo` WHERE serial=?");
        $stmt->execute([$serial]);
        return $stmt->rowCount();
    }

    /**
     * Listara todos los vehiculos
     * @return array
     */
    public function listarVehiculos(): array
    {
        $result = $this->conn->query("SELECT * FROM `vehiculo`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Listara todos los fabricantes
     * @return array
     */
    public function listarFabricantes(): array
    {
        $result = $this->conn->query("SELECT * FROM `fabricante`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Listara todos los tipos de vehiculos
     * @return array
     */
    public function listarTiposVehiculos()
    {
        $result = $this->conn->query("SELECT * FROM `tipovehiculo`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>