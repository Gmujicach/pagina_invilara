<?php

class Conductor
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=nombre_de_la_base_de_datos', 'usuario', 'contraseña');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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