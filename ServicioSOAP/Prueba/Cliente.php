<?php
$options = array('uri' => 'http://localhost/PHP/ServicioSOAP',
    'location' => 'http://localhost/PHP/ServicioSOAP/Prueba/SoapService.php');

try {
    $cliente = new SoapClient(null, $options);
    $response = $cliente->sumar(4,5);
    $response2 = $cliente->restar(10,2);
    echo 'Suma: ' . $response . '</br>';
    echo 'Resta: ' . $response2 . '</br>';
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}
?>