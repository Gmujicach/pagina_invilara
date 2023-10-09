<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Conductor.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

// Logica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $cedula_usuario = isset($_SESSION['cedula_usuario']) ? $_SESSION['cedula_usuario'] : null;

    $conductor->crearConductor(
        $_POST["cedula"],
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["direccion"],
        $_POST["celular"],
        $_POST["num_licencia"],
        $_POST["vencimiento_licencia"],
        $_POST["grado_licencia"],
        $cedula_usuario
    );
    require_once "../controlador/Conductor.php";
    exit;
} else {
    require_once "../vista/conductor-create.php";
    exit;
}
