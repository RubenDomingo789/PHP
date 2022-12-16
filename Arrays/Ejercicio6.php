<html>

<head>
    <title>Ejercicio 6</title>
</head>

<body>
    <?php 
        $numero= -2001.02;

        echo "Valor del número: " . $numero . "<br>";

        if (is_int($numero)) {
            if ($numero %2 == 0){
                echo "El número " . $numero . " es par";
            }
            else {
                echo "El número " . $numero . " es impar";
            }
        }
        else {
            echo "El número " . $numero . " no es número entero";
        }
    ?>

</body>

</html>