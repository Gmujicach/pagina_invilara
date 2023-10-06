<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/usuarioModel.php";

$bd = new BaseDatos();
$user = new Usuario($bd->crear_conexion());

// Si se envia un POST, ingresara los datos del formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($contraseña_usuario != $_POST['contraseña_verificar']) {
        header('Location: ../vista/register.php?error=no_coincide');
    }

    $result = $user->register(
        $_POST['cedula_usuario'],
        $_POST['nombre_usuario'],
        $_POST['contraseña_usuario'],
        $_POST['rol']
    );

    if ($result == true) {
        header("Location: ../controlador/conductorController.php");
    } else {
        header('Location: ../vista/register.php?error=cedula_repetida');
    }
}

$roles = $user->listarRoles();
include "../vista/register.php";


?>