<?php
    $nombre = $_GET['nombre'];
    $edad = $_GET['edad'];
    
    if($edad <18){
        echo "$nombre es menor de edad";
    }
    else{
        echo "$nombre es mayor de edad";
    }
?>