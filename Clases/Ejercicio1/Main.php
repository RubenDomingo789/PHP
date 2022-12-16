<?php
include "ReadingMaterial.php";
include "Book.php";
include "Magazine.php";

$libro1 = new Book(8, "Pablo Martín Prieto", "El Camino de Santiago. Tras las huellas de los peregrinos medievales", 286, 15);
$libro2 = new Book(10, "César Mayorqui", "La catedral", 256, 11);
$libro3 = new Book(10, "", "A", 256, 11);
$libro4 = new Book(10, "", "B", 256, 11);
$magazine1 = new Magazine("Figura coleccionable", "Autofacil", 56, 7);

$array_libros = array();
$array_libros[0] = $libro1;
$array_libros[1] = $libro2;
$array_libros[2] = $libro3;
$array_libros[3] = $libro4;
$array_revistas = array();
$array_revistas[0] = $magazine1;

//Mostramos libros disponibles
echo "<h2><b>Libros disponibles: </b></h2><hr>";
foreach ($array_libros as $libro) {
    echo "<b>Titulo: </b>" . $libro->get_Title();
    echo "<br><b>Autor: </b>" . $libro->get_authors();
    echo "<br><b>Capitulos: </b>" . $libro->get_chapters();
    echo "<br><b>Paginas: </b>" . $libro->get_pages();
    echo "<br><b>Precio: </b>" . $libro->get_price() . "€";
    echo "<br><b>Editorial: </b>" . $libro->get_editor()->get_name() . "<br><br>";
}

//Cambiamos precio del libro
$libro1->set_price(20);
echo "<br><b>Nuevo precio del libro: </b>" . $libro1->get_price() . "€";

//Mostramos revistas disponibles
echo "<h2><b>Revistas disponibles: </b></h2><hr>";
foreach ($array_revistas as $revista) {
    echo "<b>Titulo: </b>" . $revista->get_Title();
    echo "<br><b>Recursos Adiccionales: </b>" . $revista->get_additionalResources();
    echo "<br><b>Paginas: </b>" . $revista->get_pages();
    echo "<br><b>Precio: </b>" . $revista->get_price() . "€";
    echo "<br><b>Editorial: </b>" . $revista->get_editor()->get_name();
}

//Ordenamos array de libros por título
function ordenar_titulo($array){
    foreach ($array as $element => $titulo){
        $titulos[$element] = $titulo -> get_Title();
    }
    array_multisort($array, $titulos, SORT_DESC);
    return $array;
}
echo "<pre>";
print_r(ordenar_titulo($array_libros));
echo "</pre>";
