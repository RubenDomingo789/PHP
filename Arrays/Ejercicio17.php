<html>

<head>
    <title>Ejercicio 17</title>
</head>

<body>
    <?php
    $supermercado = array(
        "Frutas" => array("Pera", "Manzana", "Plátano"),
        "Verduras" => array("Berenjena", "Calabacín"),
        "Lácteos" => array("Leche", "Yogur", "Queso", "Kéfir")
    );

    foreach($supermercado as $clave => $valor){
        echo "$clave : ";
        foreach($valor as $x){
            echo $x . ", ";
        }
        echo "<br>";
    } 
    ?>
</body>

</html>