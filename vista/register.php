<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vista/css/index.css">
    <title>Registrarse</title>
</head>

<body>

    <?php include_once "../vista/componentes/navbar-main.php"; ?>

    <main class="layout">
        <section class="card card--short">
            <div class="card__login">
                <h3>Registro</h3>

                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'cedula_repetida') {
                        echo "<div class='alert alert-danger'>
                        <strong>Error:</strong> La cédula ya está registrada en la base de datos.
                    </div>";
                    } else if ($_GET["error"] == "no_coincide") {
                        echo "<div class='alert alert-danger'>
                        <strong>Error:</strong> Las contraseñas no coinciden.
                    </div>";
                    }
                }
                ?>

                <form action="../controlador/registerController.php" method="POST">
                    <input type="text" name="cedula_usuario" placeholder="Cedula" required>
                    <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                    <input type="password" name="contraseña_usuario" placeholder="Contraseña" required>
                    <input type="password" name="contraseña_verificar" placeholder="Repite la contraseña" required>

                    <select name="rol">
                        <?php
                        foreach ($roles as $rol) {
                            echo "<option value={$rol['ID_rol']}>{$rol['Nombre']}";
                        }
                        ?>
                    </select>

                    <button type="submit" value="registrar">Crear cuenta</button>
                </form>
            </div>
        </section>
    </main>

    <footer>Invilara</footer>
</body>

</html>