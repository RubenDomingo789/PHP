<?php
$pagina = "https://www.20minutos.es/";
$textoPagina = file_get_contents($pagina);

function buscarH2 ($texto, $html){
    $buscarText = "<h2";
    echo "La etiqueta h2 aparece: ". substr_count($texto, $buscarText) .
            " veces en " . $html. "<br>";
}

buscarH2($textoPagina, $pagina);
?>