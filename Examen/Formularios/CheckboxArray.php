<html>

<head>
    <title>Conversor Moneda</title>
</head>

<body>
    <form method="post" action="">
        <label> Euros a convertir: </label>

        <input type="checkbox" name="moneda[]" value="Bitcoin">Bitcoin</input>
        <input type="checkbox" name="moneda[]" value="Yen">Yen</input>
        <input type="checkbox" name="moneda[]" value="Dolar">Dolar</input>
        <input type="checkbox" name="moneda[]" value="Libra">Libra</input>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {
        foreach ($_POST['moneda'] as $clave => $value) {
            echo "Has seleccionado " . $value . "<br />";
        }
    }
    ?>
</body>

</html>