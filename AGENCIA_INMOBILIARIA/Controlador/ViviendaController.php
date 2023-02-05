<?php
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}
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
                $id = $vivienda->ultimoId()[0][0];
                //move_uploaded_file($_FILES['file']['tmp_name'], 'C:/xampp/htdocs/PHP/AGENCIA_INMOBILIARIA/Vista/fotos/'. $_FILES['file']['name']);
                $vivienda->insertarFoto($id, $_POST['foto']);
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

    static function filtrarViviendas()
    {
        $vivienda = new Vivienda();

        if (isset($_POST['botonBuscar'])) {
            if (isset($_POST['extras'])) {
                $extras = implode(",", $_POST['extras']);
            } else {
                $extras = '';
            }

            if (!isset($_POST['ndormitorios'])) {
                $ndormitorios = '';
            } else {
                $ndormitorios = $_POST['ndormitorios'];
            }
            $fotos = [];

            $viviendas_filtradas = $vivienda->filtrarVivienda($_POST['tipo'], $_POST['zona'], $_POST['precio'], $_POST['tamano'], $ndormitorios, $extras);

            if (is_string($viviendas_filtradas)) {
                $result = $viviendas_filtradas;
                $tipos_vivienda = $vivienda->getEnum('tipo');
                $zonas_vivienda = $vivienda->getEnum('zona');
                $ndormitorios = $vivienda->getEnum('ndormitorios');
                $extras = $vivienda->getEnum('extras');
                require_once("Vista/Filtrar.php");
            } else {
                foreach ($viviendas_filtradas as $row) {
                    $foto = $vivienda->mostrarFotos($row['id']);
                    array_push($fotos, $foto);
                }
                require_once("Vista/TablaFiltrar.php");
            }
        } else {
            $tipos_vivienda = $vivienda->getEnum('tipo');
            $zonas_vivienda = $vivienda->getEnum('zona');
            $ndormitorios = $vivienda->getEnum('ndormitorios');
            $extras = $vivienda->getEnum('extras');
            require_once("Vista/Filtrar.php");
        }
    }
}
