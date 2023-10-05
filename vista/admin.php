<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Menu Administrador</title>
</head>

<body>
    <nav class="navbar navbar--center">
        <div class="navbar__item navbar__item--dropdown">
            <a href="#">Crear</a>
            <div class="navbar__dropdown__content">
                <a href="register.php">Usuarios</a>
                <a href="conductor.php">Conductores</a>
                <a href="../controlador/VehiculoTemplate.php">Vehiculos</a>
            </div>
        </div>

        <div class="navbar__item navbar__item--dropdown">
            <a href="#">Modificar</a>
            <div class="navbar__dropdown__content">
                <a href="#">Conductores</a>
                <a href="#">Vehiculos</a>
            </div>
        </div>

        <div class="navbar__item navbar__item--dropdown">
            <a href="#">Reportes</a>
            <div class="navbar__dropdown__content">
                <a href="#">Vehiculos</a>
                <a href="#">Conductores</a>
                <a href="#">Actividades</a>
            </div>
        </div>

        <img src="assets/logo.png" class="navbar__logo navbar__logo--right"></img>
    </nav>

    <section class="card card--short">
        <h2>Fabricantes</h2>
        <table>
            <tr>
                <?php foreach ($fabricantes as $fab) {
                    echo "<td>$fab</td>";
                }
                ?>
            </tr>
        </table>
    </section>

    <footer>Invilara</footer>
</body>

</html>