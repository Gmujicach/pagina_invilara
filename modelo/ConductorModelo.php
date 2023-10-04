<?php

class Conductor
{
    private $conn;

    public function __construct()
    {
        $conn = new Database();
        $this->conn = $conn->connect();
    }

    public function insertarConductor(
        $cedula,
        $nombre,
        $apellido,
        $direccion,
        $celular,
        $num_licencia,
        $vencimiento_licencia,
        $grado_licencia,
        $cedula_usuario
    ) {
        $stmt = $this->conn->prepare("INSERT INTO conductores (
            cedula_conductor, 
            nombre_conductor, 
            apellido_conductor, 
            direccion_conductor, 
            celular_conductor, 
            numero_licencia, 
            vencimiento_licencia, 
            grado_licencia, 
            cedula_usuario
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
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
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>