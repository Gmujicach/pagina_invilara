<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../modelo/ConductorModelo.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$num_licencia = $_POST['num_licencia'];
$vencimiento_licencia = $_POST['vencimiento_licencia'];
$grado_licencia = $_POST['grado_licencia'];

session_start();
$cedula_usuario = isset($_SESSION['cedula_usuario']) ? $_SESSION['cedula_usuario'] : null;

$conductor = new Conductor();
$result = $conductor->insertarConductor(
    $cedula,
    $nombre,
    $apellido,
    $direccion,
    $celular,
    $num_licencia,
    $vencimiento_licencia,
    intval($grado_licencia),
    $cedula_usuario
);

if ($result) {
    header("Location: ../vista/admin.php");
} else {
    echo "Error al guardar el conductor.";
    exit;
}


?>