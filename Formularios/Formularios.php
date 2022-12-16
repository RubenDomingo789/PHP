<html>

<head>
    <title>Formulario</title>
    <?php
    if (isset($_GET['botonEnviar'])) {
        $nombre = $_GET['nombre'];
        echo "Hola " . $nombre;
    }
    ?>
</head>

<body>
    <form method="get" action="">
        <label for="nombre"> Nombre: </label>
        <input type="text" name="nombre" required /></input>
        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
</body>

</html>