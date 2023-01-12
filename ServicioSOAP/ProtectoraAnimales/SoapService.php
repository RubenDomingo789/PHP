<?php
include 'Animal.php';

$options = array('uri' => 'http://localhost/PHP/ServicioSOAP');

$server = new SoapServer(NULL, $options);

$server->setClass('Animal');
$server->handle();
?>