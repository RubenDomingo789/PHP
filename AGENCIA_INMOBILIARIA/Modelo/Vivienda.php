<?php
require_once('Conexion.php');
class Vivienda extends Conexion
{
    private $conexion;
    private $viviendas;
    private $tipos;
    private $zonas;
    private $ndormitorios;

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
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getEnum($campo)
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT column_type FROM information_schema.COLUMNS WHERE column_name = ?";
            $query = $conn->prepare($sql);
            $query->bindParam(1, $campo);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['COLUMN_TYPE'];
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function extras()
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT column_type FROM information_schema.COLUMNS WHERE column_name = 'extras'";
            foreach ($conn->query($sql) as $row) {
                $this->ndormitorios[] = $row[0];
            }
            $parentesis = explode("(", $this->ndormitorios[0]);
            $array = explode(",", $parentesis[1]);
            $array[4] = substr($array[4], 1, -2);
            for ($i = 0; $i <= 3; $i++) {
                $array[$i] = substr($array[$i], 1, -1);
            }
            return $array;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function editarVivienda($id, $tipo, $zona, $ndormitorios, $precio, $tamano)
    {
        try {
            $conn = $this->conexion;
            $sql = "UPDATE viviendas SET tipo = ?, zona = ?, ndormitorios = ?, 
            precio = ?, tamano = ? WHERE id = ?";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $tipo);
            $stmnt->bindParam(2, $zona);
            $stmnt->bindParam(3, $ndormitorios);
            $stmnt->bindParam(4, $precio);
            $stmnt->bindParam(5, $tamano);
            $stmnt->bindParam(6, $id);
            $stmnt->execute();
            return 'La vivienda ha sido modificada correctamente';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertarVivienda($tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio)
    {
        try {
            $conn = $this->conexion;
            $sql = "INSERT INTO viviendas VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $tipo);
            $stmnt->bindParam(2, $zona);
            $stmnt->bindParam(3, $direccion);
            $stmnt->bindParam(4, $ndormitorios);
            $stmnt->bindParam(5, $precio);
            $stmnt->bindParam(6, $tamano);
            $stmnt->bindParam(6, $extras);
            $stmnt->bindParam(6, $observaciones);
            $stmnt->bindParam(6, $fecha_anuncio);
            $stmnt->execute();
            return 'El anuncio ha sido publicado correctamente';
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
