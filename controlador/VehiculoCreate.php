<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Vehiculo.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$fabricantes = $vehiculo->listarFabricantes();
$tipos_vehiculo = $vehiculo->listarTiposVehiculos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehiculo->crearVechiculo(
        $_POST['serial'],
        $_POST['numero_vehiculo'],
        $_POST['color'],
        $_POST['ID_fabricante'],
        $_POST['ID_tipo']
    );
    require_once "../controlador/Vehiculo.php";
    exit;
} else {
    require_once "../vista/vehiculo-create.php";
    exit;
}
