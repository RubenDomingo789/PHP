<?php
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

require_once 'DAO/Plato_DAO.php';
require_once 'DAO/DataSource.php';

class PlatoController
{
    static function platos()
    {
        $dao = new dao();
        $lista_platos = $dao->mostrar('platos');
        require_once("Vista/Carta.php");
    }

    static function carrito()
    {
        $daoPlato = new daoPlato();
        $dao = new dao();

        if (isset($_POST['borrar'])) {
            foreach ($_SESSION['carrito'] as $key => $value) {
                if ($value['id'] == $_POST['id']) {
                    if ($_COOKIE[$value['id']] <= 1) {
                        unset($_SESSION['carrito'][$key]);
                    }   
                    else {
                        $_COOKIE[$value['id']]--;
                        setcookie($value['id'], $_COOKIE[$value['id']]);
                    }                  
                }
            }
            $lista_platos = $dao->mostrar('platos');
            require_once("Vista/Carta.php");
        } else {
            $nombres = $_POST['carrito'];
            $lista_platos = $dao->mostrar('platos');

            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = $daoPlato->findBynombre($nombres);
                foreach ($_SESSION['carrito'] as $row => $value) {
                    if ($value['id'] == 1) {
                        setcookie(1, 1);
                    }
                    if ($value['id'] == 2) {
                        setcookie(2, 1);
                    }
                    if ($value['id'] == 3) {
                        setcookie(3, 1);
                    }
                    if ($value['id'] == 4) {
                        setcookie(4, 1);
                    }
                    if ($value['id'] == 5) {
                        setcookie(5, 1);
                    }
                    if ($value['id'] == 6) {
                        setcookie(6, 1);
                    }
                    if ($value['id'] == 7) {
                        setcookie(7, 1);
                    }
                    if ($value['id'] == 8) {
                        setcookie(8, 1);
                    }
                    if ($value['id'] == 9) {
                        setcookie(9, 1);
                    }
                }
            } else {
                $products = $daoPlato->findBynombre($nombres);
                foreach ($products as $key => $value) {
                    if (!isset($_COOKIE[$value['id']])) {
                        if ($value['id'] == 1) {
                            setcookie(1, 1);
                        }
                        if ($value['id'] == 2) {
                            setcookie(2, 1);
                        }
                        if ($value['id'] == 3) {
                            setcookie(3, 1);
                        }
                        if ($value['id'] == 4) {
                            setcookie(4, 1);
                        }
                        if ($value['id'] == 5) {
                            setcookie(5, 1);
                        }
                        if ($value['id'] == 6) {
                            setcookie(6, 1);
                        }
                        if ($value['id'] == 7) {
                            setcookie(7, 1);
                        }
                        if ($value['id'] == 8) {
                            setcookie(8, 1);
                        }
                        if ($value['id'] == 9) {
                            setcookie(9, 1);
                        }
                    } else {
                        if (in_array($value, $_SESSION['carrito'])) {

                            if ($value['id'] == 1) {
                                $_COOKIE[1]++;
                                setcookie(1, $_COOKIE[1]);
                            }
                            if ($value['id'] == 2) {
                                $_COOKIE[2]++;
                                setcookie(2, $_COOKIE[2]);
                            }
                            if ($value['id'] == 3) {
                                $_COOKIE[3]++;
                                setcookie(3, $_COOKIE[3]);
                            }
                            if ($value['id'] == 4) {
                                $_COOKIE[4]++;
                                setcookie(4, $_COOKIE[4]);
                            }
                            if ($value['id'] == 5) {
                                $_COOKIE[5]++;
                                setcookie(5, $_COOKIE[5]);
                            }
                            if ($value['id'] == 6) {
                                $_COOKIE[6]++;
                                setcookie(6, $_COOKIE[6]);
                            }
                            if ($value['id'] == 7) {
                                $_COOKIE[7]++;
                                setcookie(7, $_COOKIE[7]);
                            }
                            if ($value['id'] == 8) {
                                $_COOKIE[8]++;
                                setcookie(8, $_COOKIE[8]);
                            }
                            if ($value['id'] == 9) {
                                $_COOKIE[9]++;
                                setcookie(9, $_COOKIE[9]);
                            }

                            unset($products[$key]);
                        }
                    }
                }
                $_SESSION['carrito'] = array_merge($_SESSION['carrito'], $products);
            }
            require_once("Vista/Carta.php");
        }
    }
}
