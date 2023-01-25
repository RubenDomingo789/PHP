<?php
include_once('Modelo/Usuario.php');
include_once('Modelo/Vivienda.php');
include_once('Modelo/Paginacion.php');

class ModeloController
{
    static function index()
    {
        $usuario = new Usuario();
        if (isset($_POST['botonEnviar'])) {
            $resultado = $usuario->comprobarUser($_POST['usuario'], $_POST['password']);
            if ($resultado != '') {
                header("Location:Login.php?msg=$resultado");
            } else {
                session_start();
                $_SESSION['usuario'] = $_POST['usuario'];
                require_once("index2.php");
            }
        }
    }

    static function viviendas()
    {
        $modelo = new Vivienda();
        $paginacion = new Paginacion();

        if (isset($_GET['nPaginas'])) {
            $nPaginas = $paginacion->setProperty('nPaginas', $_GET['nPaginas']);
        }
        else {
            $nPaginas = $paginacion->setProperty('nPaginas', 1);
        }
        $paginas = $paginacion->total('viviendas');
        $fin = $paginacion->getProperty('elementos_pagina');
        $inicio = $paginacion->inicio();

        $lista_viviendas = $modelo->mostrarViviendas($inicio, $fin);
        require_once("Vista/Principal.php");
    }
}
