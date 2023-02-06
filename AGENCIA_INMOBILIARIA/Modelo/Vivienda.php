<?php
require_once('Conexion.php');
class Vivienda extends Conexion
{
    private $conexion;
    private $viviendas;
    private $ids;

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
            $sql = "SELECT column_type AS 'columna' FROM information_schema.COLUMNS WHERE column_name = ?";
            $query = $conn->prepare($sql);
            $query->bindParam(1, $campo);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['columna'];
            $result = str_replace("','", "'", $result);
            $result = explode("'", $result);
            array_pop($result);
            array_shift($result);
            return $result;
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

    public function insertarVivienda($tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones)
    {
        try {
            $conn = $this->conexion;
            $sql = "INSERT INTO viviendas (tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $tipo);
            $stmnt->bindParam(2, $zona);
            $stmnt->bindParam(3, $direccion);
            $stmnt->bindParam(4, $ndormitorios);
            $stmnt->bindParam(5, $precio);
            $stmnt->bindParam(6, $tamano);
            $stmnt->bindParam(7, $extras);
            $stmnt->bindParam(8, $observaciones);
            $stmnt->execute();
            return 'El anuncio ha sido publicado correctamente';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function ultimoId(){
        try {
            $conn = $this->conexion;
            $sql = "SELECT MAX(id) FROM viviendas";
            foreach ($conn->query($sql) as $row) {
                $this->ids[] = $row;
            }
            return $this->ids;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertarFoto($idVivienda, $ruta){
        try {
            $conn = $this->conexion;
            $sql = "INSERT INTO fotos (id_vivienda, foto) VALUES ( ?, ?)";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $idVivienda);
            $stmnt->bindParam(2, $ruta);
            $stmnt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarVivienda($id)
    {
        try {
            $conn = $this->conexion;
            $sql = "DELETE FROM viviendas WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return 'La vivienda ha sido borrada correctamente';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function filtrarVivienda($tipo, $zona, $precio, $tamano, $ndormitorios, $extras)
    {
        $conn = $this->conexion;
        $sql = "SELECT viviendas.*, COUNT(fotos.foto) AS 'nfotos'  FROM inmobiliaria.viviendas 
        LEFT JOIN fotos ON fotos.id_vivienda = viviendas.id WHERE ";

        if ($tipo != "") {
            $sql .= "tipo = :tipo AND ";
        }

        if ($zona != "") {
            $sql .= "zona = :zona AND ";
        }

        if ($precio != '') {
            $sql .= "precio $precio AND ";
        }

        if ($tamano != '') {
            $sql .= "tamano $tamano AND ";
        }

        if ($ndormitorios != '') {
            $sql .= "ndormitorios = :ndormitorios AND ";
        }

        if ($extras != '') {
            $sql .= "extras = :extras AND ";
        }

        $sql .= "true = true GROUP BY viviendas.id";
        $query = $conn->prepare($sql);

        if ($tipo != '') {
            $query->bindValue(":tipo", $tipo);
        }

        if ($zona != '') {
            $query->bindValue(":zona", $zona);
        }

        if ($ndormitorios != '') {
            $query->bindValue(":ndormitorios", strval($ndormitorios));
        }

        if ($extras != '') {
            $query->bindValue(":extras", $extras);
        }

        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return 'No se ha encontrado ninguna vivienda para los filtros seleccionados';
        } else {
            return $result;
        }
    }
}
