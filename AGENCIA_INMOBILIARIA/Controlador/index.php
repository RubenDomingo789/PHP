<?php
require_once('Modelo/Usuario.php');
require_once('Modelo/Vivienda.php');
require_once('Modelo/Paginacion.php');

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

        /************Paginacion****************/ 
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

        /************Botones****************/ 
        if (isset($_POST['borrar'])) {
            $id = $_POST['id'];
            $result = $modelo -> borrarVivienda($id);
        }
        $lista_viviendas = $modelo->mostrarViviendas($inicio, $fin);
        require_once("Vista/Principal.php");
    }
}
