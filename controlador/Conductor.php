<?php

// Instancias
require_once "../modelo/BaseDatos.php";
require_once "../modelo/Conductor.php";

$bd = new BaseDatos();
$conductor = new Conductor($bd->crear_conexion());

// Logica
// Esto carga la vista principal.
$conductores = $conductor->listarConductores();
require_once "../vista/conductor.php";
