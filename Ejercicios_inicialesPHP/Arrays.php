<html>

<head>
    <title>
        Ejercicio Arrays
    </title>
</head>

<body>
    <?php
    $mitienda = array("Camiseta", "Vaquero", "Abrigo");
    $mitienda[] = "Chubasquero";
    $mitienda = array("Camiseta" => array("Referencia" => "0001", "Precio" => "14"),
                     "Vaquero" => array("Referencia" => "6090", "Precio" => "35"),
                    "Abrigo" => array("Referencia" => "3689", "Precio" => "90"));
    /*foreach ($mitienda as $productos) {
        echo "El producto es $productos </br>";
    }*/
    foreach ($mitienda as $productos => $datos) {
        echo "El producto es $productos y tiene un precio de {$datos['Precio']}" 
        ." y su referencia es {$datos['Referencia']}</br>";
    }
    ?>
</body>

</html>