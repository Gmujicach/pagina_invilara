<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Conductor.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

// Logica
$id = $_GET["id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si es un POST, extraera el 'id' proporcionado y actualizara el conductor correspondiente.
    $result = $conductor->actualizarConductor(
        $id,
        $_POST["cedula"],
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["direccion"],
        $_POST["celular"],
        $_POST["num_licencia"],
        $_POST["vencimiento_licencia"],
        $_POST["grado_licencia"]
    );

    if (!$result) {
        exit;
    } else {
        header("Location: ../controlador/Conductor.php");
        exit;
    }
} elseif ($id) {
    // De lo contrario, cargara la vista de ediciòn si 'id' existe. La vista deberia retornar un POST devuelta.
    require_once "../vista/conductor-update.php";
    exit;
} else {
    echo "No se ha proporcionado el 'id' a modificar (Cedula)";
    exit;
}
