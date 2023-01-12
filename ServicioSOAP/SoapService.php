<?php
include 'Calculadora.php';

$options = array('uri' => 'http://localhost/PHP/ServicioSOAP');

$server = new SoapServer(NULL, $options);

$server->setClass('Calculadora');
$server->handle();
?>