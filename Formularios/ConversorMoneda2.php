<html>

<head>
    <title>Conversor Moneda</title>
</head>

<body>
    <form method="post" action="">
        <label for="euro"> Euros a convertir: </label>
        <input type="number" name="euro" min="1" required /></input>
        <p></p>

        <input type="checkbox" name="moneda1" value="1">Bitcoin</input>
        <input type="checkbox" name="moneda2" value="2">Yen</input>
        <input type="checkbox" name="moneda3" value="3">Dolar</input>
        <input type="checkbox" name="moneda4" value="4">Libra</input>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $euro = $_POST['euro'];

        if (isset($_POST['moneda1'])){
            echo "Has elegido bitcoin <br>";
            $result = $euro * 0.00012;
            echo "$euro € equivalen a $result ₿ <br>";
        }

        if (isset($_POST['moneda2'])) {
            echo "Has elegido yen <br>";
            $result = $euro * 120.82;
            echo "$euro € equivalen a $result ¥ <br>";
        }

        if (isset($_POST['moneda3'])){
            echo "Has elegido dolar <br>";
            $result = $euro * 1.12;
            echo "$euro € equivalen a $result $ <br>";
        }

        if (isset($_POST['moneda4'])) {
            echo "Has elegido libra <br>";
            $result = $euro * 0.86;
            echo "$euro € equivalen a $result £ <br>";
        }
    }
    ?>
</body>

</html>