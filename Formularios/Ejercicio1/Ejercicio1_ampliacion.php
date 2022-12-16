<html>

<head>
    <title>Ejercicio 1</title>
</head>

<body>
    <form method="post" action="">
        <label for="numero"> ¿Cuantas veces? </label>
        <input type="number" name="numero" min="1" required /></input>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
    
    <?php
    if (isset($_POST['botonEnviar'])) {
        $numero = $_POST['numero'];

        for($i=1; $i<=$numero; $i++) {
            echo "Los bucles son fáciles<br>";
        }

        echo "Se acabo";
    }
    ?>
</body>

</html>