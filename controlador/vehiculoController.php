<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/vehiculoModel.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

if ($_GET["action"] == "put") {
    // `put` significa "meter".
    $fabricantes = $vehiculo->listarFabricantes();
    $tipos_vehiculo = $vehiculo->listarTiposVehiculos();
    include "../vista/vehiculo-edit.php";
    exit;

} elseif ($_GET["action"] == "delete") {
    // `delete` significa "eliminar"
    $vehiculo->eliminarConductor($_GET["id"]);
}

// Si se envia un POST, automaticamente ingresara los datos a la base de datos.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $vehiculo->insertarVechiculo(
        $_POST['serial'],
        $_POST['numero_vehiculo'],
        $_POST['color'],
        $_POST['ID_fabricante'],
        $_POST['ID_tipo']
    );

    if (!$result) {
        header('Location: ../vista/error.php');
        exit;
    }
}

// Actualizar vista
$vehiculos = $vehiculo->listarVehiculos();
include "../vista/vehiculos.php";
exit;

?>