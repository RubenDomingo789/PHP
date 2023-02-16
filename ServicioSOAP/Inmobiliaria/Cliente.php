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
$options = array(
    'uri' => 'http://localhost/PHP/ServicioSOAP',
    'location' => 'http://localhost/PHP/ServicioSOAP/Inmobiliaria/SoapService.php'
);
if (isset($_POST['botonEnviar'])) {
    try {
        $zona = new SoapClient(null, $options);
        $tabla = $zona->filtrarZonas($_POST['zona']);
        
        echo '<table>';
        foreach ($tabla as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . "</td>";
            echo '<td>' . $row['tipo'] . "</td>";
            echo '<td>' . $row['zona'] . "</td>";
            echo '<td>' . $row['direccion'] . "</td>";
            echo '<td>' . $row['ndormitorios'] . "</td>";
            echo '<td>' . $row['precio'] . "</td>";
            echo '</tr>';
        }
        echo '</table>';
    } catch (SoapFault $e) {
        echo "ERROR: " . $e->getMessage();
    }
}
?>