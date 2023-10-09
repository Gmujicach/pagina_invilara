<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Vehiculo.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$vehiculos = $vehiculo->listarVehiculos();
require_once "../vista/vehiculo.php";
exit;
