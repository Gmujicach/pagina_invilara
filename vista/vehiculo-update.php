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
            <form class="form-label" action="../controlador/VehiculoUpdate.php?id=<?php echo $_GET["id"] ?>" method="POST">
                <h1>VEHICULO</h1>

                <div>
                    <p><strong>Editando vehiculo con el serial:</strong> <?php echo $_GET["id"] ?> </p>
                </div>

                <div>
                    <label for="serial">Serial</label>
                    <input type="text" name="serial" id="serial" maxlength="11" required>
                </div>

                <div>
                    <label for="numero_vehiculo">Numero de vehiculo</label>
                    <input type="text" name="numero_vehiculo" id="numero_vehiculo" maxlength="11" required>
                </div>

                <div>
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" maxlength="30" required>
                </div>

                <div>
                    <select name="ID_fabricante" required>
                        <?php
                        foreach ($fabricantes as $fab) {
                            echo "<option value={$fab['ID_fabricante']}>{$fab['nombre_fabricante']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <select name="ID_tipo" required>
                        <?php
                        foreach ($tipos_vehiculo as $tipo) {
                            echo "<option value={$tipo['ID_tipo']}>{$tipo['nombre_tipo']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit">Confirmar</button>
            </form>
        </section>
    </main>

    <footer>Invilara - Hecho por Gabriel Mujica</footer>
</body>

</html>