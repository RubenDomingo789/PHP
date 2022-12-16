<?php
include 'Usuario.php';
$conexion = new Conexion();
$usuario1 = new Usuario('Juan', 'Rodriguez', 'Masculino', 'sgsgdsfgsd', 654285963, 78);


$usuario1->crear();

?>