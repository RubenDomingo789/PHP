<?php
require_once('Controlador/UsuarioController.php');
UsuarioController::index();

if (!isset($_SESSION['usuario'])) {
    require_once 'Controlador/Objects.php';
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }
    require_once 'Vista/Login.php';
} else {
    if (isset($_POST['borrar'])) {
        require_once 'Controlador/PlatoController.php';
        PlatoController::carrito();
    }
    if (isset($_POST['boton'])) {
        require_once 'Controlador/PlatoController.php';
        PlatoController::carrito();
    } else if (isset($_POST['salir'])) {
        if (isset($_COOKIE['precio'])) {
            foreach ($_COOKIE as $key => $value) {
                setcookie($key, '', time() - 3600);
            }
        }
        session_destroy();
        require_once('Vista/Login.php');
    } else {
        require_once 'Controlador/PlatoController.php';
        PlatoController::platos();
    }
}
