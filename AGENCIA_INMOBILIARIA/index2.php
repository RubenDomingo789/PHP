<?php
if (isset($_POST['anuncios'])){
    require_once('Controlador/index.php');
    ModeloController::publicarAnuncio();
}
else {
    require_once('Controlador/index.php');
    ModeloController::viviendas();
}
