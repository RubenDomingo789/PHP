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

        if (isset($_POST['borrar'])) {
            foreach ($_SESSION['carrito'] as $key => $value) {
                if ($value['id'] == $_POST['id']) {
                    unset($_SESSION['carrito'][$key]);
                }
            }
            $dao = new daoPlato();
            $lista_platos = $dao->mostrar();
            require_once("Vista/Carta.php");
        } else {
            $nombres = $_POST['carrito'];
            $lista_platos = $dao->mostrar();
            $cont = 1;

            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = $dao->findBynombre($nombres);
                foreach ($_SESSION['carrito'] as $row => $value) {
                    if ($value['id'] == 1) {
                        setcookie(1, $cont);
                    } else if ($value['id'] == 2) {
                        setcookie(2, $cont);
                    } else if ($value['id'] == 3) {
                        setcookie(3, $cont);
                    } else if ($value['id'] == 4) {
                        setcookie(4, $cont);
                    } else if ($value['id'] == 5) {
                        setcookie(5, $cont);
                    } else if ($value['id'] == 6) {
                        setcookie(6, $cont);
                    } else if ($value['id'] == 7) {
                        setcookie(7, $cont);
                    } else if ($value['id'] == 8) {
                        setcookie(8, $cont);
                    } else if ($value['id'] == 9) {
                        setcookie(9, $cont);
                    }
                }
            } else {
                $products = $dao->findBynombre($nombres);
                foreach ($products as $key => $value) {
                    if (in_array($value, $_SESSION['carrito'])) {
                        if ($value['id'] == 1) {
                            setcookie(1, $cont++);
                        } else if ($value['id'] == 2) {
                            setcookie(2, $cont++);
                        } else if ($value['id'] == 3) {
                            setcookie(3, $cont++);
                        } else if ($value['id'] == 4) {
                            setcookie(4, $cont++);
                        } else if ($value['id'] == 5) {
                            setcookie(5, $cont++);
                        } else if ($value['id'] == 6) {
                            setcookie(6, $cont++);
                        } else if ($value['id'] == 7) {
                            setcookie(7, $cont++);
                        } else if ($value['id'] == 8) {
                            setcookie(8, $cont++);
                        } else if ($value['id'] == 9) {
                            setcookie(9, $cont++);
                        }
                        unset($products[$key]);
                    }
                }
                $_SESSION['carrito'] = array_merge($_SESSION['carrito'], $products);
            }
            require_once("Vista/Carta.php");
        }
    }
}
