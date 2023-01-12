<html>

<head>
    <title>Edad</title>
</head>

<body>
    <form method="post" action="">
        <label for="fecha"> Fecha Nacimiento: </label>
        <input type="date" name="fecha" required /></input>
        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $options = array(
            'uri' => 'http://localhost/PHP/ServicioSOAP',
            'location' => 'http://localhost/PHP/ServicioSOAP/Edad/SoapService.php'
        );

        try {
            $cliente = new SoapClient(null, $options);
            $response = $cliente->comprobarEdad($_POST['fecha']);
            echo $response;
        } catch (SoapFault $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>