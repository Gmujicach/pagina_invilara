<?php

// Instancias
require_once "../modelo/baseDatosModel.php";
require_once "../modelo/usuarioModel.php";

$bd = new BaseDatos();
$user = new Usuario($bd->crear_conexion());

// Logica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula_usuario = $_POST['cedula_usuario'];
    $contraseña_usuario = $_POST['contraseña_usuario'];

    // Si encuentra el usuario en el sistema procesara la información
    $info = $user->login($cedula_usuario, $contraseña_usuario);

    if ($info) {
        session_start();
        $id = $info["ID_rol"];

        $_SESSION['cedula_usuario'] = $cedula_usuario;
        $_SESSION['id'] = $id;

        if ($id == 1) {
            header('Location: ../controlador/conductorController.php');
        } elseif ($id == 2) {
            header('Location: ../controlador/conductorController.php');
        }
    } else {
        header('Location: ../vista/login.php?error=1');
    }
}

include "../vista/login.php";
