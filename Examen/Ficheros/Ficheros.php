<?php
$archivo = fopen("log.txt", "a+");

if ($archivo == false) {
    echo "Error en la creación del fichero";
} else {
    fwrite($archivo, "djsfnsfkkdsf\r\n");
    fwrite($archivo, "djsfnsfkkdsf\r\n");
    fwrite($archivo, "djsfnsfkkdsf\r\n");
    fwrite($archivo, "djsfnsfkkdsf\r\n");
    fclose($archivo);
}

$archivo = fopen("log.txt", "r+");
if ($archivo == false) {
    echo "Error en la creación del fichero";
} else {
    //Linea
    //$content = fread($archivo, filesize("log.txt"));
    //echo "<p>" . $content . "</p>";

    while (feof($archivo) == false) {
        echo fgets($archivo) . '<br/>';
    }

    fclose($archivo);
}
