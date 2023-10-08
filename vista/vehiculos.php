<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vista/css/index.css">
    <title>Administrador</title>
</head>

<body>
    <?php include_once "../vista/componentes/navbar-admin.php"; ?>

    <section class="card">
        <h2>Vehiculos</h2>
        <a href="../controlador/vehiculoController.php?action=put">Añadir</a>
        <table>
            <tr>
                <th>Serial</th>
                <th>Numero de vehiculo</th>
                <th>Color</th>
                <th>Tipo</th>
                <th>Fabricante</th>
            </tr>
            <?php
            foreach ($vehiculos as $vehiculo) {
                echo "<tr>";
                echo "<td>{$vehiculo['serial']}</td>";
                echo "<td>{$vehiculo['numero_vehiculo']}</td>";
                echo "<td>{$vehiculo['color']}</td>";
                echo "<td>{$vehiculo['ID_tipo']}</td>";
                echo "<td>{$vehiculo['ID_fabricante']}</td>";
                echo "<td>
                    <a href='../controlador/vehiculoController.php?action=update&id={$vehiculo['serial']}'>Actualizar</a>
                    |
                    <a href='../controlador/vehiculoController.php?action=delete&id={$vehiculo['serial']}'>Eliminar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <footer>Invilara</footer>
</body>

</html>