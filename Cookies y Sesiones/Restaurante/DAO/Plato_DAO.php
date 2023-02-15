<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Plato.php';
require_once 'PlatoDAO.php';

class daoPlato extends Conexion implements PlatoDAO
{
    private $conn;
    private $platos;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function findByNombre($nombre)
    {
        try {
            for ($i = 0; $i < count($nombre); $i++) {
                $sql = "SELECT * FROM platos WHERE nombre = ?";
                $stmnt = $this->conn->prepare($sql);
                $stmnt->bindParam(1, $nombre[$i]);
                $stmnt->execute();
                $platos[] = $stmnt->fetch(PDO::FETCH_ASSOC);
            }
            return $platos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function mostrar()
    {
        try {
            $sql = "SELECT * FROM platos";
            $platos = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $platos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertar(Plato $plato)
    {
        try {
            $sql = "INSERT INTO platos (nombre, precio, categoria) VALUES (?, ?, ?)";
            $stmnt = $this->conn->prepare($sql);
            $stmnt->bindParam(1, $nombre);
            $stmnt->bindParam(2, $precio);
            $stmnt->bindParam(3, $categoria);
            $nombre = $plato->__get('nombre');
            $precio = $plato->__get('precio');
            $categoria = $plato->__get('categoria');
            $stmnt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
