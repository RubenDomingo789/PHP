<?php
require_once('Conexion.php');
class Vivienda extends Conexion
{
    private $conexion;
    private $viviendas;

    public function __construct()
    {
        $this->viviendas = array();
        $this->conexion = Conexion::conectar();
    }

    public function mostrarViviendas($inicio, $fin)
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT viviendas.*, COUNT(fotos.foto) AS 'nfotos'  FROM inmobiliaria.viviendas 
            LEFT JOIN fotos ON fotos.id_vivienda = viviendas.id
            GROUP BY viviendas.id
            ORDER BY fecha_anuncio DESC LIMIT $inicio, $fin";
            foreach ($conn->query($sql) as $row) {
                $this->viviendas[] = $row;
            }
            return $this->viviendas;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function mostrarFotos($id)
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT foto FROM fotos WHERE id_vivienda = ?";
            $query = $conn->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarVivienda($id)
    {
        $conn = $this->conexion;
        $sql = "DELETE FROM viviendas WHERE id = ?";
        $query = $conn->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();
        return 'La vivienda ha sido borrada correctamente';
    }
}
