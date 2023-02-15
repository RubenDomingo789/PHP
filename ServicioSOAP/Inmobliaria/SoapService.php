<?php
include 'Vivienda.php';

$options = array('uri' => 'http://localhost/PHP/ServicioSOAP');

$server = new SoapServer(NULL, $options);

$server->setClass('Vivienda');
$server->handle();
?>