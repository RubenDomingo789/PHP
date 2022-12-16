<html>

<head>
    <title>Ejercicio 5</title>
</head>

<body>
    <?php 
        $numero1= 2000;
        $numero2= 1000;

        echo "Valor del primer número: " . $numero1 . "<br>";
        echo "Valor del segundo número: " . $numero2 . "<br>";

        if ($numero1 > $numero2) {
            echo "El número " . $numero1 . " es mayor que el número " . $numero2;
        }
        else {
            echo "El número " . $numero2 . " es mayor que el número " . $numero1;
        }
    ?>

</body>

</html>