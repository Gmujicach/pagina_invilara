<?php

ini_set('display_errors', '1');

require_once "../modelo/VehiculoModel.php";
$vehiculo = new Vehiculo();

session_start();
$_SESSION["fabricantes"] = $vehiculo->listarFabricantes();
$_SESSION["tipovehiculo"] = $vehiculo->listarTiposVehiculos();

header("Location: ../vista/vehiculo.php");

?>