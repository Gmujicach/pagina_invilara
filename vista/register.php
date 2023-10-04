<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Registro</title>
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

    <article class="card-container short">
        <div class="login">
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

            <form action="../controlador/UsuarioController.php?action=register" method="POST">
                <input type="text" name="cedula_usuario" placeholder="Cedula" required>
                <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                <input type="password" name="contraseña_usuario" placeholder="Contraseña" required>
                <input type="password" name="contraseña_verificar" placeholder="Repite la contraseña" required>

                <br>

                <select name="rol">
                    <option value="2">Usuario
                    <option value="1">Administrador
                </select>

                <br>
                <br>

                <button type="submit" value="registrar">Crear cuenta</button>
            </form>
        </div>
    </article>

    <footer>Invilara - Hecho por Orlando Barrientos</footer>
</body>

</html>