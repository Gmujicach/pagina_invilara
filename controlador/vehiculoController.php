<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/vehiculoModel.php";

$bd = new BaseDatos();
$vehiculo = new Vehiculo($bd->crear_conexion());

// Logica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $vehiculo->insertarVechiculo(
        $_POST['serial'],
        $_POST['numero_vehiculo'],
        $_POST['color'],
        $_POST['ID_fabricante'],
        $_POST['ID_tipo']
    );

    if ($result) {
        header('Location: ../controlador/adminController.php');
    } else {
        header('Location: ../vista/error.php');
    }

} else {
    $fabricantes = $vehiculo->listarFabricantes();
    $tipos_vehiculo = $vehiculo->listarTiposVehiculos();
    include "../vista/vehiculo-edit.php";
}

?>