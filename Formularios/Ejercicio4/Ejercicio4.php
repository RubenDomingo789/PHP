<html>

<head>
    <title>Ejercicio 4</title>
</head>

<body>
    <form method="post" action="">
        <label for="nombre"> Nombre de usuario: </label>
        <input type="text" name="nombre" required /></input>
        </p>
        <p>Deportes Prácticados: </p>
        <input type="checkbox" name="deporte[]" value="1">Futbol</input>
        <input type="checkbox" name="deporte[]" value="2">Baloncesto</input>
        <input type="checkbox" name="deporte[]" value="3">Tenis</input>
        <input type="checkbox" name="deporte[]" value="4">Ciclismo</input>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>

    <?php
    if (isset($_POST['botonEnviar'])) {
        $nombre = $_POST['nombre'];

        foreach($_POST['deporte'] as $clave) {
            $contador += 1;
        }

        if ($contador == 1) {
            echo $nombre . " practica un deporte";
        }
        elseif ($contador == 2) {
            echo $nombre . " practica dos deportes";
        }
        elseif ($contador == 3) {
            echo $nombre . " practica tres deportes";
        }
        elseif ($contador == 4) {
            echo $nombre . " practica cuatro deportes";
        }
        else {
            echo $nombre . " no practica ningún deporte";
        }
    }
    ?>
</body>

</html>