<?php
$url = 'http://localhost/PHP/ServicioREST/REST_Inmobiliaria/operaciones.php';
$data = array('direccion' => 'Avenida');

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo "Error al realizar la petición";
} else {
    echo "Respuesta: " . $response;
}
?>