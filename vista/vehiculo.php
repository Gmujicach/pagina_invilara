<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Vehiculo</title>
</head>

<body>
    <?php include_once "./componentes/navbar-edit.php"; ?>

    <main class="layout">
        <section class="card card--short">
            <form class="form-label" action="../controlador/vehiculoController.php" method="POST">
                <h1>VEHICULO</h1>

                <div>
                    <label for="serial">Serial</label>
                    <input type="text" name="serial" id="serial">
                </div>

                <div>
                    <label for="numero_vehiculo">Numero de vehiculo</label>
                    <input type="text" name="numero_vehiculo" id="numero_vehiculo">
                </div>

                <div>
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color">
                </div>

                <div>
                    <select>
                        <?php
                        foreach ($_SESSION["fabricantes"] as $fab) {
                            echo "<option>$fab</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <select>
                        <?php
                        foreach ($_SESSION["tipovehiculo"] as $tipo) {
                            echo "<option>$tipo</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" value="Registrar">Confirmar</button>
            </form>
        </section>
    </main>

    <footer>Invilara - Hecho por Gabriel Mujica</footer>
</body>

</html>