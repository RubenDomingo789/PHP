<?php
if (isset($_POST['editar'])) {
    $borrado = $modelo->borrarVivienda($_POST['id']);
    require_once("Vista/Principal.php");
    echo '<script>alert(' . $borrado . ')</script>';
}
if (isset($_POST['borrar'])) {
    require_once('../index.php');
    $borrado = $modelo->borrarVivienda($_POST['id']);
    echo '<script>alert(' . $borrado . ')</script>';
}
if (!isset($_POST['editar']) || !isset($_POST['borrar'])) {
    require_once('index.php');
    $lista_viviendas = $modelo->mostrarViviendas();

    //Paginacion
    /*
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
    */
    require_once("Vista/Principal.php");
}
