<html>

<head>
    <meta charset="UTF-8">
    <title>Tabla Inicial</title>
</head>

<body>
    <p>Operacion de lectura</p><br><br>
    <?php
    $archivo = fopen("fichero.txt", "r+b");
    if (!$archivo) {
        echo "Error al abrir el fichero";
    }
    $cadena = fread($archivo, filesize("fichero.txt"));
    echo $cadena;

    fwrite($archivo, "mañana");

    $archivo2 = fopen("fichero.txt", "r+b");

    $cadena2 = fread($archivo2, filesize("fichero.txt"));
    echo $cadena2;

    echo "<br>---------------------<br>";

    /*pagina
    $pagina= file_get_contents("https://elpais.com/");
    echo $pagina;
*/
    $aCadena = file("fichero.txt", "r+b");
    print_r($aCadena);

    echo "<br>---------------------<br>";
    while (feof($archivo2) == false) {
        echo fgets($archivo2);
        echo "<br>";
    }

    ?>
</body>


</html>