<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/conductorModel.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

// Logica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET["action"] == "update") {
        $conductor->actualizarConductor(
            $_POST["cedula"],
            $_POST["nombre"],
            $_POST["apellido"],
            $_POST["direccion"],
            $_POST["celular"],
            $_POST["num_licencia"],
            $_POST["vencimiento_licencia"],
            $_POST["grado_licencia"]
        );
        include "../controlador/adminController.php";

    } elseif ($_GET["action"] == "delete") {
        $conductor->eliminarConductor($_GET["cedula"]);
        header("Location: ../controlador/adminController.php");

    } else {
        session_start();
        $cedula_usuario = isset($_SESSION['cedula_usuario']) ? $_SESSION['cedula_usuario'] : null;

        $result = $conductor->insertarConductor(
            $_POST['cedula'],
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['direccion'],
            $_POST['celular'],
            $_POST['num_licencia'],
            $_POST['vencimiento_licencia'],
            intval($_POST['grado_licencia']),
            $cedula_usuario
        );

        if ($result) {
            header("Location: ../controlador/adminController.php");
        } else {
            echo "Error al guardar el conductor.";
            exit;
        }
    }

} else {
    include "../vista/conductores.php";
}

?>