<?php
if (isset($_POST['salir'])){
    setcookie('conexion', date('d/m/y h:i:s'));
}
require_once('Controlador/index.php');
ModeloController::viviendas();
?>