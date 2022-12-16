<html>

<head>
    <title>Ejercicio 11</title>
</head>

<body>
    <?php
    $cadena = "Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";
    echo $cadena . "<br/>";
    echo "La longitud de la cadena es: " . mb_Strlen($cadena) . "<br>";
    echo "La primera ocuurencia de la cadena os es en la posicion: " . strpos($cadena, "os") . "<br>";
    echo "La palabra nuestros se encuentra en la posicion: " . strpos($cadena, "nuestros") . "<br>";
    echo "La subcadena 'lenguaje php' se encuentra en la posicion: " . strpos($cadena, "lenguaje php") . "<br>";
    echo "La subcadena 'nuestros primeros pasos' se encuentra en la posicion: " . strpos($cadena, "nuestros primeros pasos") . "<br>";
    $resultado = str_replace("Estamos", "Estoy", $cadena);
    $resultado = str_replace("nuestros", "mis", $resultado);
    echo "Reemplazo de strings: " . $resultado;
    echo "Cadena en minuscula: " . strtolower($cadena);
    echo "Cadena en mayúsculas: " . strtoupper($cadena);
    echo "Letra inicial de la cadena en mayuscula: " . ucwords($cadena);
    ?>
</body>

</html>