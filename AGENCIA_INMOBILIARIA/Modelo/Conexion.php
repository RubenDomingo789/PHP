<?php
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}
class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "root";
    private $dbname = "inmobiliaria";

    function __construct()
    {
    }

    function conectar()
    {
        try {
            $conn = new PDO("mysql:host=$this->servidor;dbname=$this->dbname;charset=utf8", $this->usuario, $this->clave);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "No conecta la base";
            echo "Error: " . $e->getMessage();
        }
    }
}
