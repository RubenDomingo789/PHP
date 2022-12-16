<html>

<head>
    <title>Conversor Moneda</title>
</head>

<body>
    <form method="post" action="ConversorMoneda1.1.php">
        <label for="euro"> Euros a convertir: </label>
        <input type="number" name="euro" min="1" required /></input>
        <p></p>

        <select name="moneda">
            <option value="1">Bitcoin</option>
            <option value="2">Yen Japonés</option>
            <option value="3">Dolar Americano</option>
            <option value="4">Libra Esterlina</option>
        </select>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
</body>

</html>