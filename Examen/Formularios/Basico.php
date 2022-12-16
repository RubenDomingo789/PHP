<html>

<head>
    <title>Ejercicio 1</title>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $numero = $_POST['numero'];
        $i = 1;
        while ($i <= $numero) {
            echo "Los bucles son fáciles<br>";
            $i++;
        }
        echo "Se acabo";
    }
    ?>
</head>

<body>
    <form method="post" action="">
        <label for="numero"> ¿Cuantas veces? </label>
        <input type="number" name="numero" min="1" required /></input>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
</body>

</html>