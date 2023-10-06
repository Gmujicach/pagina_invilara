<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vista/css/index.css">
    <title>Inicio de sesión</title>
</head>

<body>

    <?php include_once "../vista/componentes/navbar-main.php"; ?>

    <main class="layout">
        <section class="card card--grid">
            <div class="card__desc">
                <h3>¡Bienvenido!</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolorem neque dolor dolore
                    exercitationem quos in similique, itaque quo consequuntur quam corrupti beatae, quas, ex sed
                    explicabo?
                    Facere, et. Quidem.</p>
            </div>
            <div class="card__login">
                <h3>Inicio de sección</h3>

                <?php
                if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger'>
                            <strong>Error:</strong> Cedula de usuario o contraseña incorrectos.
                        </div>";
                }
                ?>

                <form action="../controlador/loginController.php" method="POST">
                    <input type="text" name="cedula_usuario" placeholder="Cedula" required>
                    <input type="text" name="contraseña_usuario" placeholder="Contraseña" required>
                    <button type="submit" name="submit">Iniciar sesión</button>
                </form>
            </div>
        </section>
    </main>

    <footer>Invilara</footer>

</body>

</html>