<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/conductorModel.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

if ($_GET["action"] == "put") {
    // `put` significa "meter". Esto mostrara la vista de `añadir`.
    include "../vista/conductor-edit.php";
    exit;

} elseif ($_GET["action"] == "update") {
    // Si inicia con un POST, actualizara los datos.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    } else {
        // De lo contrario, cargara la vista de ediciòn. La vista deberia retornar un POST devuelta.
        include "../vista/conductor-update.php";
        exit;
    }

} elseif ($_GET["action"] == "delete" && $_GET["id"]) {
    // Eliminara el conductor por su ID (Ejemplo: cedula_conductor)
    $conductor->eliminarConductor($_GET["id"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $cedula_usuario = isset($_SESSION['cedula_usuario']) ? $_SESSION['cedula_usuario'] : null;

    // Ingresra 
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

    // Si el insertar falla, mostrar error.
    if (!$result) {
        echo "Error al guardar el conductor.";
        exit;
    }
}

// Actualizar pagina
$conductores = $conductor->listarConductores();
include "../vista/conductores.php";
