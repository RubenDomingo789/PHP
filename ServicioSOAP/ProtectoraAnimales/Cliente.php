<?php
$options = array('uri' => 'http://localhost/PHP/ServicioSOAP',
    'location' => 'http://localhost/PHP/ServicioSOAP/ProtectoraAnimales/SoapService.php');

try {
    $cliente = new SoapClient(null, $options);
    $response = $cliente->comprobarAdopcion(6);
    if ($response != null) {
        echo 'Este animal ha sido adoptado';
    }
    else {
        echo 'El animal no esta adoptado';
    }
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}
?>