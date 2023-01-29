<?php
require_once('Controlador/index.php');
ModeloController::index();
if (!isset($_SESSION['usuario'])) {
    require_once('Login.php');
}
