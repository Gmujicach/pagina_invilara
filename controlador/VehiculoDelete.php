<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Vehiculo.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$id = $_GET["id"];

if ($id) {
    $vehiculo->eliminarVehiculo($_GET["id"]);
    require_once "../controlador/Vehiculo.php";
    exit;
} else {
    echo "No se ha proporcionado ningun 'id'";
}
