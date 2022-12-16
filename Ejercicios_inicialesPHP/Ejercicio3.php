<html>

<head>
    <title>Ejercicio 3</title>
    <?php
    function restar(){
        global $numero1;
        global $numero2;
        return $numero1 - $numero2;
    }
    function multiplicar($num1, $num2){
        $multiplicacion = $num1 * $num2;
        return ($multiplicacion);
    }
    ?>
</head>

<body>
    <?php
    $numero1 = 5;
    $numero2 = 15;
    $suma = $numero1 + $numero2;
    echo $suma . "<br>";
    echo restar() . "<br>";
    echo multiplicar($numero1, $numero2);
    ?>
</body>

</html>