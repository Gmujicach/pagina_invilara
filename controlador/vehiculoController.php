<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/vehiculoModel.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$serial = $_POST['serial'];
$numero_vehiculo = $_POST['numero_vehiculo'];
$color = $_POST['color'];
$id_fabricante = $_POST['Fabricante'];
$id_tipo = $_POST['Tipo'];

if ($stmt->execute()) {
    header('Location: ../vista/admin.php');
} else {

    echo "Error al insertar en la base de datos.";
}

?>