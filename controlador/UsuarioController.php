<?php

require_once '../modelo/UsuarioModelo.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    $user = new Usuario();

    if ($action == 'register') {
        $cedula_usuario = $_POST['cedula_usuario'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $contraseña_usuario = $_POST['contraseña_usuario'];
        $contraseña_verificar = $_POST['contraseña_verificar'];
        $id_rol = $_POST['rol'];

        if ($contraseña_usuario != $contraseña_verificar) {
            header('Location: ../vista/register.php?error=no_coincide');
        }

        $result = $user->register(
            $cedula_usuario,
            $nombre_usuario,
            $contraseña_usuario,
            intval($id_rol)
        );
        if (!$result) {
            header('Location: ../vista/register.php?error=cedula_repetida');
        } else {
            header("Location: ../vista/admin.php");
        }
        //----------------------------------------------------------------------
    } else if ($action == 'login') {
        session_start();

        $cedula_usuario = $_POST['cedula_usuario'];
        $contraseña_usuario = $_POST['contraseña_usuario'];

        $id = $user->login($cedula_usuario, $contraseña_usuario);

        if ($id) {
            $_SESSION['cedula_usuario'] = $cedula_usuario;
            $_SESSION['id'] = $id;

            if ($id == 1) {
                header('Location: ../vista/admin.php');
            } elseif ($id == 2) {
                header('Location: ../vista/usuario.php');
            }
        } else {
            header('Location: ../vista/login.php?error=1');
        }
    }
}

?>