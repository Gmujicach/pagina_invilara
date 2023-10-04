<?php
require_once '../modelo/vehiculomodelo.php';
require_once '../modelo/conexion.php';

if (isset($_POST['serial'], $_POST['numero_vehiculo'], $_POST['color'], $_POST['Fabricante'], $_POST['Tipo'])) {
    $serial = $_POST['serial'];
    $numero_vehiculo = $_POST['numero_vehiculo'];
    $color = $_POST['color'];
    $Fabricante = $_POST['Fabricante'];
    $Tipo = $_POST['Tipo'];

    $sql = "INSERT INTO vehiculo (serial, numero_vehiculo, color, ID_tipo, ID_fabricante) VALUES ('$serial', '$numero_vehiculo', '$color', (SELECT ID_tipo FROM tipovehiculo WHERE nombre_tipo = '$Tipo'), (SELECT ID_fabricante FROM fabricante WHERE nombre_fabricante = '$Fabricante'))";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header('Location: ../vista/admin.php');
    } else {

        echo "Error al insertar en la base de datos.";
    }
} else {
    echo "Faltan valores en el formulario.";
}
?>