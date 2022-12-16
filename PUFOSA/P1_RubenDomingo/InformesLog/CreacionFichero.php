<?php
$archivo = fopen("../InformesLog/log.txt", "a+");
if ($archivo == false) {
    echo "Error en la creación del fichero";
}
?>