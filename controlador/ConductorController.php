<?php

session_start();

require_once '../modelo/ConductorModelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $num_licencia = $_POST['num_licencia'];
    $vencimiento_licencia = $_POST['vencimiento_licencia'];
    $grado_licencia = $_POST['grado_licencia'];

    $cedula_usuario = isset($_SESSION['cedula_usuario']) ? $_SESSION['cedula_usuario'] : null;

    $modeloConductor = new Conductor();

    if (
        $modeloConductor->insertarConductor(
            $cedula,
            $nombre,
            $apellido,
            $direccion,
            $celular,
            $num_licencia,
            $vencimiento_licencia,
            $grado_licencia,
            $cedula_usuario
        )
    ) {
        header("Location: ../vista/admin.php");
    } else {
        echo "Error al guardar el conductor.";
    }
}

?>