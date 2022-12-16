<?php
//Conexión a la BBDD
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "pufosa";
$sql_inicial = "USE $dbname";

try {
    $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql_inicial);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
