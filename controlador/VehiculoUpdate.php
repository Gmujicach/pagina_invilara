<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Vehiculo.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
$fabricantes = $vehiculo->listarFabricantes();
$tipos_vehiculo = $vehiculo->listarTiposVehiculos();

$id = $_GET["id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehiculo->actualizarVehiculo(
        $_POST['serial'],
        $_POST['numero_vehiculo'],
        $_POST['color'],
        $_POST['ID_tipo'],
        $_POST['ID_fabricante']
    );
    require_once "../controlador/Vehiculo.php";
    exit;
} elseif ($id) {
    // De lo contrario, cargara la vista de ediciòn si 'id' existe. La vista deberia retornar un POST devuelta.
    require_once "../vista/vehiculo-update.php";
    exit;
} else {
    echo "No se ha proporcionado ningun 'id'";
    exit;
}
