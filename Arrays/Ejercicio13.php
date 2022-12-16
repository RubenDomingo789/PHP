<html>

<head>
    <title>Ejercicio 13</title>
</head>

<body>
    <?php
        $color = ["Azul", "Rojo", "Verde", "Rosa", "Naranja"];
        foreach($color as $valor){
            echo "Color: " . $valor . "<br>";
        }
        
        echo "<br>";

        if (in_array("Rosa", $color)){
            $color = array_diff($color, array("Rosa"));
            foreach($color as $valor){
                echo "Color: " . $valor . "<br>";
            }
        }

    ?>
</body>

</html>