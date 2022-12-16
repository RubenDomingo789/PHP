<html>

<head>
    <title>Conversor Moneda</title>
</head>

<body>
    <form method="post" action="">
        <label for="euro"> Euros a convertir: </label>
        <input type="number" name="euro" min="1" required /></input>

        <select name="moneda">
            <option value="1">Bitcoin</option>
            <option value="2">Yen Japonés</option>
            <option value="3">Dolar Americano</option>
            <option value="4">Libra Esterlina</option>
        </select>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $euro = $_POST['euro'];
        $moneda = $_POST['moneda'];

        switch ($moneda) {
            case  1:
                echo "Has elegido bitcoin <br>";
                $result = $euro * 0.00012;
                echo "$euro € equivalen a $result ₿";
                break;

            case  2:
                echo "Has elegido yen <br>";
                $result = $euro * 120.82;
                echo "$euro € equivalen a $result ¥";
                break;

            case  3:
                echo "Has elegido dolar <br>";
                $result = $euro * 1.12;
                echo "$euro € equivalen a $result $";
                break;

            case  4:
                echo "Has elegido libra <br>";
                $result = $euro * 0.86;
                echo "$euro € equivalen a $result £";
                break;
        }
    }
    ?>
</body>

</html>