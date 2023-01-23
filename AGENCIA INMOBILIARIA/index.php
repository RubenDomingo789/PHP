<?php
require "Modelos/Modelo.php";
$modelo = new Modelo();

if (!isset($_POST['usuario'])) {
    require_once("Login.php");
}

else {
    $resultado = $modelo->comprobarUser($_POST['usuario'], $_POST['password']);
    if ($resultado != "") {
        header("Location:Login.php?msg=$resultado");
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        require("Controlador/ViviendaController.php");
    }
}
