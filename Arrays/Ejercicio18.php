<html>

<head>
    <title>Ejercicio 18</title>
</head>

<body>
    <?php
        if(isset($_POST['numero'])){
            $numero = $_POST['numero'];
        }
        else {
            $numero = "";
        }
    ?>
    <h1>Suma de pares</h1>
    <form method="post" action="">
        <label for="numero"> Escribe un número entero: </label>
        <input type="number" name="numero" value="<?= $numero ?>" /></input>
        <p><input type="submit" name="botonEnviar" value="Calcular" /></p>
    </form>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $numero = $_POST['numero'];

        $suma = 0;
        for ($i = 1; $i <= $numero; $i++) {
            if ($i % 2 == 0) {
                $suma = $suma + $i;
            }
        }
        echo "Suma de pares: " . $suma;
    }
    ?>
</body>

</html>