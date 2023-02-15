<?php

class Conexion
{
    //Conexión a la BBDD
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $dbname = "restaurante";

    function __construct()
    {
    }

    function conectar()
    {
        try {
            $conn = new PDO("mysql:host=$this->servidor;dbname = $this->dbname", $this->usuario, $this->clave);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("CREATE DATABASE IF NOT EXISTS $this->dbname");
            $conn->exec("USE $this->dbname");
            $consulta = "CREATE TABLE IF NOT EXISTS usuarios (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(30) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";
            $conn->exec($consulta);

            $consulta2 = "CREATE TABLE IF NOT EXISTS platos (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(30) NOT NULL,
                precio DECIMAL(10, 2) NOT NULL,
                categoria ENUM('V', 'G', 'L', 'N') NOT NULL
            )";
            $conn->exec($consulta2);
            return $conn;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
