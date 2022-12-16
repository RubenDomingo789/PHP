<?php
include 'Conexion.php';
abstract class Crud extends Conexion
{
    private $tabla;
    private $conn;

    function __construct($tabla, $conn)
    {
        $this->tabla = $tabla;
        $this->conn = $conn;
    }

    public function obtieneTodos()
    {
        try {
            $sql = "SELECT * FROM " . $this->tabla;
            $objects = $this -> conn -> query($sql)->fetchAll(PDO::FETCH_OBJ);
            return $objects;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function obtieneDeId($id)
    {
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);

            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function borrar($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->tabla . " WHERE id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                return "Registro eliminado correctamente";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public abstract function crear();
    public abstract function actualizar();
}
