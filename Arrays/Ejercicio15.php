<html>

<head>
    <title>Ejercicio 15</title>
</head>

<body>
    <?php
        $array = array(1 => 90, 30 => 7, "e" => 99, "hola" => 43);

        foreach($array as $clave => $valor){
            echo "El elemento de índice " . $clave . " vale " . $valor . "<br>";
        }
    ?>
</body>

</html>