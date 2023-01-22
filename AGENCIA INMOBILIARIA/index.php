<?php
require "Modelos/Modelo.php";
$modelo = new Modelo();

if (!isset($_POST['usuario'])) {
    require_once("Login.php");
}

if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $resultado = $modelo->comprobarUser($_POST['usuario'], $_POST['password']);
    if ($resultado != "") {
        header("Location:Login.php?msg=$resultado");
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
    }
}

if (isset($_SESSION['usuario'])) {
    $lista_viviendas = $modelo->mostrarViviendas();

    //Paginacion
    $num_total_filas = $modelo->totalViviendas();

    if (isset($_GET['nPaginas'])) {
        $nPaginas = $_GET['nPaginas'];
    } else {
        $nPaginas = 1;
    }

    $viviendas_pagina = 4;
    $inicio = ($nPaginas - 1) * $viviendas_pagina;
    $paginas = $num_total_filas / $viviendas_pagina;
    $paginas = ceil($paginas);
    require_once("Vista/Principal.php");
}
