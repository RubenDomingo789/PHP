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

    echo "<br>-------------------------------<br>";

    //RECURSIVIDAD 
    function fibbonacci(int $n){
        if ($n == 0) return 0;
        else if ($n == 1) return 1;
        else return (fibbonacci ($n - 1) + fibbonacci ($n - 2));
    }

    $n = 6;
    echo "Serie fibonacci: " . fibbonacci($n);
    ?>
</body>

</html>