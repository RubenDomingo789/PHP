<html>

<head>
    <title>Ejercicio 3</title>
</head>

<body>
    <form method="post" action="">
        <label for="nombre"> Nombre de usuario: </label>
        <input type="text" name="nombre" required /></input>
        </p>
        <p>Estudios:</p>
        <input type="radio" name="estudio" value="1" checked>No tiene estudios</input></p>
        <input type="radio" name="estudio" value="2">Estudios primarios</input></p>
        <input type="radio" name="estudio" value="3">Estudios secundarios</input></p>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>

    <?php
    if (isset($_POST['botonEnviar'])) {
        $nombre = $_POST['nombre'];
        $estudio = $_POST['estudio'];

        if ($estudio == 1) {
            echo $nombre . " no tiene estudios";
        }
        elseif ($estudio == 2) {
            echo $nombre . " tiene estudios primarios";
        }
        else {
            echo $nombre . " tiene estudios secundarios";
        }
    }
    ?>
</body>

</html>