<html>

<head>
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    $posicion = "AIBA";

    switch ($posicion) {
        case ("ARRIBA"):
            echo "Valor de la variable: " . $posicion . "<br>";
            break;
        case ("ABAJO"):
            echo "Valor de la variable: " . $posicion . "<br>";
            break;
        default:
            echo "La variable contiene otro valor distinto de arriba y abajo";
            break;
    }

    ?>
</body>

</html>