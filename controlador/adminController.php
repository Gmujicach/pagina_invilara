<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/conductorModel.php";
require_once "../modelo/vehiculoModel.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$fabricantes = $vehiculo->listarVehiculos();
require "../vista/admin.php";

?>