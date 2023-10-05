<?php

// Instancias
require_once "../modelo/BaseDatosModel.php";
require_once "../modelo/UsuarioModel.php";

$bd = new BaseDatos();
$user = new Usuario($bd->crear_conexion());

// Logica
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
    $id_rol
);

if ($result == true) {
    header("Location: ../vista/admin.php");
} else {
    header('Location: ../vista/register.php?error=cedula_repetida');
}

?>