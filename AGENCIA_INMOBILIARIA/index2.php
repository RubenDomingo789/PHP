<?php
if (isset($_POST['salir'])) {
    setcookie('conexion', date('d/m/y h:i:s'));
}

if (isset($_GET['nPaginas'])) {
    $paginacion->setNpaginas($_GET['nPaginas']);
    require_once('Modelo/index.php');
    $paginacion->setProperty('nPaginas', $_GET['nPaginas']);
    require_once('Controlador/index.php');
    ModeloController::viviendas();
}
require_once('Controlador/index.php');
ModeloController::viviendas();
