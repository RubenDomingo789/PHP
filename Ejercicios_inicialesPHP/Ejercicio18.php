<html>

<head>
    <title>Ejercicio 18</title>
</head>

<body>
    <?php
    $num_aleatorio = rand(1,100);

    echo "El numero elegido es el $num_aleatorio <br>";

    $suma = 0;

    for ($i= 1; $i <= $num_aleatorio; $i++){
        if ($i % 2 == 0) {
            $suma = $suma + $i;
            echo "$i + ";
        }
    }

    echo "= $suma";
    ?>
</body>

</html>