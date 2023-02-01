<?php
require_once('Modelo/Vivienda.php');
require_once('Modelo/Paginacion.php');

class ViviendaController
{
    static function viviendas()
    {
        $vivienda = new Vivienda();
        /************Botones****************/
        /*Borrar*/
        if (isset($_POST['borrar'])) {
            $id = $_POST['id'];
            $result = $vivienda->borrarVivienda($id);
        }

        /*Editar*/
        if (isset($_POST['editar'])) {
            if (isset($_POST['botonEditar'])) {
                $result = $vivienda->editarVivienda($_POST['id'], $_POST['tipo'], $_POST['zona'], $_POST['ndormitorios'], $_POST['precio'], $_POST['tamano']);
                header("location:index.php?result=$result");
            }

            if (isset($_POST['botonVolver'])) {
                header("location: index.php");
            }

            $tipos_vivienda = $vivienda->getEnum('tipo');
            $zonas_vivienda = $vivienda->getEnum('zona');
            $ndormitorios = $vivienda->getEnum('ndormitorios');
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
            $lista_viviendas = $vivienda->mostrarViviendas($inicio, $fin);
            $fotos = [];
            foreach ($lista_viviendas as $row) {
                $foto = $vivienda->mostrarFotos($row['id']);
                array_push($fotos, $foto);
            }
            require_once("Vista/Principal.php");
        }
    }

    static function publicarAnuncio()
    {
        $vivienda = new Vivienda();

        if (isset($_POST['botonInsertar'])) {
            if (isset($_POST['extras'])) {
                $extras = $_POST['extras'];
                $extras = implode(",", $extras);
                $result = $vivienda->insertarVivienda(
                    $_POST['tipo'],
                    $_POST['zona'],
                    $_POST['direccion'],
                    $_POST['ndormitorios'],
                    $_POST['precio'],
                    $_POST['tamano'],
                    $extras,
                    $_POST['observaciones']
                );
                header("location: index.php?result=$result");
            } else {
                echo "<script>alert('Debes marcar al menos una opción en el checkbox')</script>";
                $tipos_vivienda = $vivienda->getEnum('tipo');
                $zonas_vivienda = $vivienda->getEnum('zona');
                $ndormitorios = $vivienda->getEnum('ndormitorios');
                $extras = $vivienda->getEnum('extras');
                require_once("Vista/Insertar.php");
            }
        } else {
            $tipos_vivienda = $vivienda->getEnum('tipo');
            $zonas_vivienda = $vivienda->getEnum('zona');
            $ndormitorios = $vivienda->getEnum('ndormitorios');
            $extras = $vivienda->getEnum('extras');
            require_once("Vista/Insertar.php");
        }
    }
}
