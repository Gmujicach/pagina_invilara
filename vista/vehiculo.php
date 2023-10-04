<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <<link rel="stylesheet" type="text/css" href="css/styles.css">
        <title>Vehiculo</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar__item">
            <a href="#">Cancelar</a>
        </div>

        <div class="navbar__item">
            <img src="assets/logo.png" class="navbar__logo navbar__logo--right"></img>
        </div>
    </nav>

    <main class="layout">
        <section class="card card--short">
            <form class="form-label" action="../controlador/vehiculocontroller.php" method="POST">
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
                    <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "invilara";


                    $conn = new mysqli($servername, $username, $password, $dbname);


                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }


                    $sql = "SELECT nombre_fabricante FROM fabricante";
                    $result = $conn->query($sql);


                    echo "<label for='Fabricante'>Fabricante:</label>";
                    echo "<select name='Fabricante'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nombre_fabricante"] . "'>" . $row["nombre_fabricante"] . "</option>";
                    }
                    echo "</select>";


                    $sql = "SELECT nombre_tipo FROM tipovehiculo";
                    $result = $conn->query($sql);


                    echo "<label for='Tipo'>Tipo:</label>";
                    echo "<select name='Tipo'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nombre_tipo"] . "'>" . $row["nombre_tipo"] . "</option>";
                    }
                    echo "</select>";


                    $conn->close();
                    ?>

                </div>

                <button type="submit" value="Registrar">Confirmar</button>
            </form>
        </section>
    </main>

    <footer>Invilara - Hecho por Gabriel Mujica</footer>
</body>

</html>