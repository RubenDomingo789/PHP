<html>

<head>
    <title>Formulario Zona</title>
</head>

<body>
    <form method="post" action="">
        <select name="zona">
            <option value="Centro">Centro</option>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
        </select>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
</body>

</html>
<?php
if (isset($_POST['botonEnviar'])) {
    $options = array(
        'uri' => 'http://localhost/PHP/ServicioSOAP',
        'location' => 'http://localhost/PHP/ServicioSOAP/Inmobiliaria/SoapService.php'
    );

    try {
        $zona = new SoapClient(null, $options);
        $response = $zona->filtrarzonas($_POST['zona']);
        if ($response != null) {
            echo 'No hay ninguna zona';
        } else {
            echo 'El animal no esta adoptado';
        }
    } catch (SoapFault $e) {
        echo "ERROR: " . $e->getMessage();
    }
}
?>