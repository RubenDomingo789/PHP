<html>

<head>
    <title>Ejercicio 2</title>
</head>

<body>
    <form method="post" action="">
        <p>Productos: </p>
        <input type="checkbox" name="productos[]" value="0.60">Pan -> 0,60€</input><br>
        <input type="checkbox" name="productos[]" value="2.20">Leche -> 2.20€</input><br>
        <input type="checkbox" name="productos[]" value="2.50">Huevos -> 2.50€</input><br>
        <input type="checkbox" name="productos[]" value="1.35">Lechuga -> 1.35€</input><br><br>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>

    <?php
    if (isset($_POST['botonEnviar'])) {
        $producto = $_POST['productos'];
        print_r($producto);
        foreach ($_POST['productos'] as $clave) {
            if ($producto[0])
        setcookie('pan', $_POST['productos']);
        }
    }
    ?>
</body>

</html>