<?php
include 'Edad.php';

$options = array('uri' => 'http://localhost/PHP/ServicioSOAP');

$server = new SoapServer(NULL, $options);

$server->setClass('Edad');
$server->handle();
?>