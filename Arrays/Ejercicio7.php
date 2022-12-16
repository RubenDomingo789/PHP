<html>

<head>
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    $num_aleatorio = rand(1,100);
    echo "Valor del número: " . $num_aleatorio . "<br>";

    if ($num_aleatorio > 50) {
        echo "El número " . $num_aleatorio . " es mayor que 50";
    }
    elseif ($num_aleatorio < 50) {
        echo "El número " . $num_aleatorio . " es menor que 50";
    }
    else {
        echo "El número " . $num_aleatorio . " es igual a 50";
    }
    ?>
</body>

</html>