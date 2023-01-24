<?php
require_once('Modelo/index.php');
session_start();

class ModeloController
{
    private $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }

    static function index()
    {
        $modelo = new Modelo();
        require_once("Login.php");
        if (isset($_POST['usuario'])){
            $resultado = $modelo->comprobarUser($_POST['usuario'], $_POST['password']);
            if ($resultado != "") {
                header("Location:Login.php?msg=$resultado");
            } else {
                $_SESSION['usuario'] = $_POST['usuario'];
                require_once('index.php');
            }
        }
    }

    static function viviendas(){
        $modelo = new Modelo();
        $lista_viviendas = $modelo->mostrarViviendas();
        require_once("Vista/Principal.php");

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
    }
}
