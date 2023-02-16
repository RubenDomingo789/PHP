<?php
require_once 'Modelo/Conexion.php';

class Dao extends Conexion
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function mostrar($tabla)
    {
        try {
            $sql = "SELECT * FROM $tabla";
            $array = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}