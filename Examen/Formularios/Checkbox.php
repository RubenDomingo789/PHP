<html>

<head>
    <title>Conversor Moneda</title>
</head>

<body>
    <form method="post" action="">
        <label> Euros a convertir: </label>

        <input type="checkbox" name="moneda1" value="1">Bitcoin</input>
        <input type="checkbox" name="moneda2" value="2">Yen</input>
        <input type="checkbox" name="moneda3" value="3">Dolar</input>
        <input type="checkbox" name="moneda4" value="4">Libra</input>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {

        if (isset($_POST['moneda1'])){
            echo "Has elegido bitcoin <br>";
        }

        if (isset($_POST['moneda2'])) {
            echo "Has elegido yen <br>";
        }

        if (isset($_POST['moneda3'])){
            echo "Has elegido dolar <br>";
        }

        if (isset($_POST['moneda4'])) {
            echo "Has elegido libra <br>";
        }
    }
    ?>
</body>

</html>