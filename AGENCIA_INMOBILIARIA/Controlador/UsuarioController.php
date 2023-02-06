<?php
session_start();

require_once('Modelo/Usuario.php');
require_once('Modelo/Paginacion.php');

class UsuarioController
{
    static function index()
    {
        $usuario = new Usuario();
        if (isset($_POST['botonEnviar'])) {
            $resultado = $usuario->comprobarUser($_POST['usuario'], $_POST['password']);
            if ($resultado != '') {
                header("Location:Login.php?msg=$resultado");
            } else {
                $_SESSION['usuario'] = $_POST['usuario'];
                require_once("index.php");
            }
        }
    }

    static function usuarios()
    {
        $usuario = new Usuario();
        /************Botones****************/
        /*Borrar*/
        if (isset($_POST['borrar'])) {
            $id = $_POST['id'];
            $result = $usuario->borrarUsuario($id);
        }

        /*Insertar*/
        if (isset($_POST['insertar'])) {
            if (isset($_POST['botonInsertar'])) {
                $array = $usuario->insertarUsuario(
                    $_POST['id_usuario']
                );
                $password = $array[1];
                $result = $array[0];
                require_once("Vista/InsertarUsuario.php");
            } else {
                require_once("Vista/InsertarUsuario.php");
            }
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
            $paginas = $paginacion->total('usuarios');
            $fin = $paginacion->getProperty('elementos_pagina');
            $inicio = $paginacion->inicio();

            /*Mostrar usuarios*/
            $lista_usuarios = $usuario->mostrarUsuarios($inicio, $fin);
            require_once("Vista/Usuarios.php");
        }
    }
}
