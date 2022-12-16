<html>

<head>
    <title>Ejercicio 16</title>
</head>

<body>
    <?php
    $numeros = array();

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $numeros[$i][$j] = rand(1, 100);
        }
    }
    echo "<table border style= 'width:100px; height: 100px'>";
    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) {
            echo "<td>";
            echo $numeros[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "Numero mas mayor generado: " . max(array_values($numeros))

    ?>
</body>

</html>