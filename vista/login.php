<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar">
            <a href="#">Inicio</a>
            <a href="#">Información</a>
            <a href="#">Ayuda</a>
        </div>
        <div class="navbar">
            <a href="login.php">Iniciar Sesión</a>
            <a href="register.php">Registrarse</a>
            <img src="assets/logo.png" class="logo">
        </div>
    </nav>

    <article class="card-container">
        <div class="welcome">
            <h3>¡Bienvenido!</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolorem neque dolor dolore
                exercitationem quos in similique, itaque quo consequuntur quam corrupti beatae, quas, ex sed explicabo?
                Facere, et. Quidem.</p>
        </div>
        <div class="login">
            <h3>INICIO DE SESION</h3>

            <?php
            if (isset($_GET['error'])) {
                echo "<div class='alert alert-danger'>
                            <strong>Error:</strong> Cedula de usuario o contraseña incorrectos.
                        </div>";
            }
            ?>

            <form action="../controlador/UsuarioController.php?action=login" method="POST">
                <input type="text" name="cedula_usuario" placeholder="Cedula de Usuario" required>
                <input type="password" name="contraseña_usuario" placeholder="Contraseña" required>
                <button type="submit" value="Iniciar Sesión">Iniciar sesión</button>
            </form>
        </div>
    </article>

    <footer>Invilara - Hecho por Orlando Barrientos</footer>
</body>

</html>