<html>

<head>
    <title>Ejercicio 2</title>
</head>

<body>
    <form method="post" action="">
        <p>Productos: </p>
        <input type="checkbox" name="productos[]" value="1">Pan -> 0,60€</input><br>
        <input type="checkbox" name="productos[]" value="2">Leche -> 2.20€</input><br>
        <input type="checkbox" name="productos[]" value="3">Huevos -> 2.50€</input><br>
        <input type="checkbox" name="productos[]" value="4">Lechuga -> 1.35€</input><br><br>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>

    <?php
    if (isset($_POST['botonEnviar']) && isset($_POST['productos'])) {
        $producto = $_POST['productos'];
        $cont = 0;

        foreach ($producto as $clave) {
            switch ($clave) {
                case 1:
                    echo 'Has comprado pan';
                    echo "<br> Precio: 0.60<br>";
                    $cont = $cont + 0.60;
                    break;
                case 2:
                    echo 'Has comprado leche';
                    echo "<br> Precio: 2.20<br>";
                    $cont = $cont + 2.20;
                    break;
                case 3:
                    echo 'Has comprado huevos';
                    echo "<br> Precio: 2.50<br>";
                    $cont = $cont + 2.50;
                    break;
                case 4:
                    echo 'Has comprado lechuga';
                    echo "<br> Precio: 1.35<br>";
                    $cont = $cont + 1.35;
                    break;
            }
        }
        echo '<br>Precio de la compra: ' . $cont;
    }
    ?>
</body>

</html>