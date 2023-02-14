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
}
