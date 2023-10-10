<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vista/css/index.css">
    <title>Vehiculo</title>
</head>

<body>
    <?php require_once "../vista/componentes/navbar-admin-edit.php"; ?>

    <main class="layout">
        <section class="card card--short">
            <form class="form-label" action="../controlador/ConductorUpdate.php?id=<?php echo $_GET["id"] ?>" method="POST">
                <h1>CONDUCTOR</h1>

                <div>
                    <p><strong>Editando conductor con la cédula:</strong> <?php echo $_GET["id"] ?> </p>
                </div>

                <div>
                    <label for="cedula">Nueva cédula:</label>
                    <input type="text" name="cedula" id="cedula" required>
                </div>

                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>

                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" required>
                </div>

                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" required>
                </div>

                <div>
                    <label for="celular">Celular:</label>
                    <input type="text" name="celular" id="celular" required>
                </div>

                <div>
                    <label for="num_licencia">Número de Licencia:</label>
                    <input type="text" name="num_licencia" id="num_licencia" required>
                </div>

                <div>
                    <label for="vencimiento_licencia">Vencimiento de Licencia:</label>
                    <input type="date" name="vencimiento_licencia" id="vencimiento_licencia" required>
                </div>

                <div>
                    <label for="grado_licencia">Grado de Licencia:</label>
                    <input type="text" name="grado_licencia" id="grado_licencia" required>
                </div>

                <button type="submit" type="text" name="grado_licencia" required>Confirmar
            </form>
        </section>
    </main>

    <footer>Invilara - Hecho por Jesus Viloria</footer>
</body>

</html>