<?php
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

require_once 'DAO/Plato_DAO.php';

class PlatoController
{
    static function platos()
    {
        $dao = new daoPlato();
        $lista_platos = $dao->mostrar();
        require_once("Vista/Carta.php");
    }

    static function carrito()
    {
        $dao = new daoPlato();
        $nombres = $_POST['carrito'];
        $lista_platos = $dao->mostrar();
        if (!isset($_SESSION['carrito'])){
            $products = $dao->findBynombre($nombres);
            array_push($_SESSION['carrito'], $products);
        }
        else {
            $products = $dao->findBynombre($nombres);
            array_push($_SESSION['carrito'], $products);
        }
        require_once("Vista/Carta.php");
    }
}
