
<?php
require_once 'Modelo/Categoria.php';
require_once 'DAO/Plato_DAO.php';
require_once 'DAO/Usuario_DAO.php';

$daoPlato = new daoPlato();
$daoUsuario = new daoUsuario();
$result = $daoUsuario->findByName('Ruben');

if ($result == '') {
    $plato1 = new Plato('Arroz a la cubana', 12.22, Categoria::Vegano);
    $plato2 = new Plato('Huevos rotos', 15.00, Categoria::Normal);
    $plato3 = new Plato('Macarrones', 8.57, Categoria::SinGluten);
    $plato4 = new Plato('Pasta Carbonara', 13.22, Categoria::SinLactosa);
    $plato5 = new Plato('Lentejas', 12.22, Categoria::Normal);
    $plato6 = new Plato('Verduras a la plancha', 9.99, Categoria::Vegano);
    $plato7 = new Plato('Guisantes', 7.00, Categoria::Vegano);
    $plato8 = new Plato('Albondigas', 11.87, Categoria::Normal);
    $plato9 = new Plato('Patatas bravas', 12.22, Categoria::Normal);
    $usuario1 = new Usuario('Ruben', 'admin');
    $usuario2 = new Usuario('Ivan', 'ivan');

    $daoPlato->insertar($plato1);
    $daoPlato->insertar($plato2);
    $daoPlato->insertar($plato3);
    $daoPlato->insertar($plato4);
    $daoPlato->insertar($plato5);
    $daoPlato->insertar($plato6);
    $daoPlato->insertar($plato7);
    $daoPlato->insertar($plato8);
    $daoPlato->insertar($plato9);
    $daoUsuario->insertar($usuario1);
    $daoUsuario->insertar($usuario2);
}
