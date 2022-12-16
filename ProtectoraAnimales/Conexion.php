<?php
class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $dbname = "protectora_animales";

    protected function conectar()
    {
        try {
            $conn = new PDO("mysql:host=$this->servidor;dbname=$this->dbname", $this->usuario, $this->clave);
            return $conn;
        } catch (Exception $e) {
            echo $e;
        }
    }
}