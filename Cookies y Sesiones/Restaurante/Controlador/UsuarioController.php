<?php
session_start();

require_once('DAO/Usuario_DAO.php');

class UsuarioController
{
    static function index()
    {
        $dao = new daoUsuario();
        if (isset($_POST['botonEnviar'])) {
            $resultado = $dao->comprobarUser($_POST['usuario'], $_POST['password']);
            if ($resultado != '') {
                header("Location:Index.php?msg=$resultado");
            } else {
                $_SESSION['usuario'] = $_POST['usuario'];
                require_once("index.php");
            }
        }
    }
}