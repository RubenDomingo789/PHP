<html>

<head>
    <title>Ejercicio 21</title>
</head>

<body>
    <?php

    $equipo = array(
        "Athletic Club" => array("Puntos" => 55, "Posicion" => 8),
        "Atletico de Madrid" => array("Puntos" => 71, "Posicion" => 3),
        "C.A.Osasuna" => array("Puntos" => 47, "Posicion" => 10),
        "Cadiz C.F" => array("Puntos" => 39, "Posicion" => 17),
        "Deportivo Alavés" => array("Puntos" => 31, "Posicion" => 20),
        "Elche C.F" => array("Puntos" => 42, "Posicion" => 13),
        "F.C. Barcelona" => array("Puntos" => 73, "Posicion" => 2),
        "Getafe C.F." => array("Puntos" => 39, "Posicion" => 15),
        "Granada C.F." => array("Puntos" => 38, "Posicion" => 18),
        "Levante U.D." => array("Puntos" => 35, "Posicion" => 19),
        "Rayo Vallecano" => array("Puntos" => 42, "Posicion" => 12),
        "Real Betis" => array("Puntos" => 65, "Posicion" => 5),
        "R.C. Celta de Vigo" => array("Puntos" => 46, "Posicion" => 11),
        "R.C.D. Espanyol" => array("Puntos" => 42, "Posicion" => 14),
        "Real Madrid C.F." => array("Puntos" => 86, "Posicion" => 1),
        "R.C.D. Mallorca" => array("Puntos" => 39, "Posicion" => 16),
        "Real Sociedad" => array("Puntos" => 62, "Posicion" => 6),
        "Sevilla F.C" => array("Puntos" => 70, "Posicion" => 4),
        "Valencia F.C" => array("Puntos" => 48, "Posicion" => 9),
        "Villareal F.C" => array("Puntos" => 59, "Posicion" => 7)
    );

    
    array_multisort($equipo, SORT_DESC);
    $ganadores = array_slice($equipo, 0, 3);

    foreach($ganadores as $clave => $valor){
        echo "$clave => " . $valor['Posicion'] . " => " . $valor['Puntos'] . "<br>";
    }
    ?>
</body>

</html>
<?php

$conn = new PDO('mysql:host=localhost; dbname=klsdlk, username=root');
$sql = "SELECT * FROM WHERE ID =?";
$consulta = $conn->prepare($sql);
$consulta->bindParam(1, 'sdf');
$consulta->execute();

$registros = $consulta->fetch();
foreach($registros as $row) {
}

?>
