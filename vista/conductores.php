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

    <section class="card card--large">
        <h2>Conductores</h2>
        <table>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Celular</th>
                <th>Número de Licencia</th>
                <th>Vencimiento de Licencia</th>
                <th>Grado de Licencia</th>
                <th>Acciones</th>
            </tr>
            <?php
            foreach ($conductores as $conductor) {
                echo "<tr>";
                echo "<td>{$conductor['cedula_conductor']}</td>";
                echo "<td>{$conductor['nombre_conductor']}</td>";
                echo "<td>{$conductor['apellido_conductor']}</td>";
                echo "<td>{$conductor['direccion_conductor']}</td>";
                echo "<td>{$conductor['celular_conductor']}</td>";
                echo "<td>{$conductor['numero_licencia']}</td>";
                echo "<td>{$conductor['vencimiento_licencia']}</td>";
                echo "<td>{$conductor['grado_licencia']}</td>";
                echo "<td>
                    <a href='../controlador/conductorController.php?action=update&cedula={$conductor['cedula_conductor']}'>Actualizar</a>
                    |
                    <a href='../controlador/conductorController.php?action=delete&cedula={$conductor['cedula_conductor']}'>Eliminar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <footer>Invilara</footer>
</body>

</html>