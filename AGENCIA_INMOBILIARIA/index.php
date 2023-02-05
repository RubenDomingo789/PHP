<?php
require_once('Controlador/UsuarioController.php');
UsuarioController::index();

if (!isset($_SESSION['usuario'])) {
    require_once('Login.php');
}
else {
    if (isset($_POST['users'])){
        require_once('Controlador/UsuarioController.php');
        UsuarioController::usuarios();
    }
    else if (isset($_POST['anuncios'])){
        require_once('Controlador/ViviendaController.php');
        ViviendaController::publicarAnuncio();
    }
    else if (isset($_POST['buscar']) || isset($_GET['buscar'])){
        require_once('Controlador/ViviendaController.php');
        ViviendaController::filtrarViviendas();
    }
    else if (isset($_POST['salir'])){
        session_destroy();

        if (isset($_COOKIE['conexion'])){
            setcookie('conexion', '', time() - 1);
        }
		setcookie('conexion', date('d/m/y h:i:s'));
        require_once('Login.php');
    }
    else {
        require_once('Controlador/ViviendaController.php');
        ViviendaController::viviendas();
    }
}
