<html>

<head>
    <title>Ejercicio 23</title>
    <style>
        .div {
            width: 50px;
            height: 50px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php
    $posicion = rand(0, 100);
    $tamaño = 50;

    for ($i = 1; $i <= 2000; $i++) {
        $rgb_aleatorio1 = rand(0, 255);
        $rgb_aleatorio2 = rand(0, 255);
        $rgb_aleatorio3 = rand(0, 255);
        echo "<div class='div' style= 'background-color: rgb($rgb_aleatorio1,$rgb_aleatorio2,$rgb_aleatorio3)'></div>";
    }
    ?>
</body>

</html>