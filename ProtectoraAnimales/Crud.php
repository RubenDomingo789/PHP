<?php
include 'Conexion.php';
abstract class Crud extends Conexion
{
    private $tabla;
    private $conexion;

    function __construct($tabla, $conn)
    {
        parent::__construct($conn);
        $this->tabla = $tabla;
        $this->conexion = parent::conectar();
    }

    public function obtieneTodos()
    {
        try {
            $conn=$this->conexion;
            $sql = "SELECT * FROM " . $this->tabla;
            $objects = $conn -> query($sql)->fetchAll(PDO::FETCH_OBJ);
            return $objects;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function obtieneDeId($id)
    {
        try {
            $conn=$this->conexion;
            $sql = "SELECT * FROM " . $this->tabla . " WHERE id = ?";
            $stmt = $conn->prepare($sql);
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
            $conn=$this->conexion;
            $stmt = $conn->prepare("DELETE FROM " . $this->tabla . " WHERE id = ?");
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
