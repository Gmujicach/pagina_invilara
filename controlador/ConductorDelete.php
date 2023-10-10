<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Conductor.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

// Logica
if ($_GET["id"]) {
    // Eliminara el conductor por su ID (Ejemplo: cedula_conductor)
    $conductor->eliminarConductor($_GET["id"]);
    header("Location: ../controlador/Conductor.php");
    exit;
} else {
    echo "ERROR: No se especifico el conductor a eliminar (id).";
    exit;
}
