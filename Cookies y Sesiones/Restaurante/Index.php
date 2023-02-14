<?php
require_once('Controlador/UsuarioController.php');
UsuarioController::index();

if (!isset($_SESSION['usuario'])) {
    require_once 'Controlador/Objects.php';
    if (isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
    require_once 'Vista/Login.php';
} else {
    if (isset($_POST['salir'])) {
        session_destroy();
        require_once('Vista/Login.php');
    } else {
        require_once 'Controlador/PlatoController.php';
        PlatoController::platos();
    }
}
