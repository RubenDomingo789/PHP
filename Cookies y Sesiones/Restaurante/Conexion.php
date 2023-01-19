<?php
//Conexión a la BBDD
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "restaurante";
$sql_inicial = "CREATE DATABASE IF NOT EXISTS $dbname";
$sql = "USE $dbname IF EXISTS";

try {
    $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql_inicial);
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
