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
        /************Botones****************/
        /*Borrar*/
        if (isset($_POST['borrar'])) {
            $id = $_POST['id'];
            $result = $modelo->borrarVivienda($id);
        }

        /*Editar*/
        if (isset($_POST['editar'])) {
            if (isset($_POST['botonEditar'])) {
                $result = $modelo->editarVivienda($_POST['id'], $_POST['tipo'], $_POST['zona'], $_POST['ndormitorios'], $_POST['precio'], $_POST['tamano']);
                header("location:index2.php?result=$result");
            }

            if (isset($_POST['botonVolver'])) {
                header("location: index2.php");
            }

            $tipos_vivienda = $modelo->getEnum('tipo');
            $zonas_vivienda = $modelo->getEnum('zona');
            $ndormitorios = $modelo->getEnum('ndormitorios');
            require_once("Vista/Editar.php");
        } else {
            /************Paginacion****************/
            if (isset($_GET['result'])) {
                $result = $_GET['result'];
            }
            $paginacion = new Paginacion();
            if (isset($_GET['nPaginas'])) {
                $nPaginas = $paginacion->setProperty('nPaginas', $_GET['nPaginas']);
            } else {
                $nPaginas = $paginacion->setProperty('nPaginas', 1);
            }
            $paginas = $paginacion->total('viviendas');
            $fin = $paginacion->getProperty('elementos_pagina');
            $inicio = $paginacion->inicio();

            /*Mostrar viviendas y fotos*/
            $lista_viviendas = $modelo->mostrarViviendas($inicio, $fin);
            $fotos = [];
            foreach ($lista_viviendas as $row) {
                $foto = $modelo->mostrarFotos($row['id']);
                array_push($fotos, $foto);
            }
            require_once("Vista/Principal.php");
        }
    }

    static function publicarAnuncio()
    {
        $modelo = new Vivienda();

        if (isset($_POST['botonVolver'])) {
            header("location: index2.php");
        }
        
        if (isset($_POST['botonInsertar'])) {
            $result = $modelo->insertarVivienda($_POST['tipo'], $_POST['zona'], $_POST['direccion'], $_POST['ndormitorios'], 
            $_POST['precio'], $_POST['tamano'], $_POST['extras'], $_POST['observaciones'], $_POST['fecha_anuncio']);
            header("location:index2.php?result=$result");
        }

        if (isset($_GET['result'])) {
            $result = $_GET['result'];
        }

        $tipos_vivienda = $modelo->getEnum('tipo');
        $zonas_vivienda = $modelo->getEnum('zona');
        $ndormitorios = $modelo->getEnum('ndormitorios');
        $extras = $modelo->getEnum('extras');
        require_once("Vista/Insertar.php");
    }
}
