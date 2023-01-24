<?php
require_once('Controlador/index.php');

if (isset($_SESSION['usuario'])){
    ModeloController::viviendas();
}
if (!isset($_SESSION['usuario'])){ 
    ModeloController::index();
}