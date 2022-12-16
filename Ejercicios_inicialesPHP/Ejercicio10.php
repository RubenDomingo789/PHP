<html>

<head>
    <title>Ejercicio 10</title>
</head>

<body>
    <?php
    $n = 15;
    $num1 = 0;
    $num2 = 1;
    $counter = 0;
    
    while ($counter < $n) {
        echo ' ' . $num1;
        $num3 = $num2 + $num1;
        $num1 = $num2;
        $num2 = $num3;
        $counter = $counter + 1;
    }
    ?>
</body>

</html>