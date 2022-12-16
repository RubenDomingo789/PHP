<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "instituto";
$sql_inicial = "USE $dbname";

try {
    $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql_inicial);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
