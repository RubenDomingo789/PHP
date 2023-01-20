<?php
require 'Conexion.php';
class Vivienda extends Conexion{
    private $conexion;
    private $viviendas;
    /*private $tipo;
    private $zona;
    private $direccion;
    private $ndormitorios;
    private $precio;
    private $tamano;
    private $extras;
    private $observaciones;
    private $fecha_anuncio;*/

    public function __construct() {
        $this->viviendas= array();
        $this->conexion=Conexion::conectar();
        /*
        $this->tipo=$tipo;
        $this->zona=$zona;
        $this->direccion=$direccion;
        $this->ndormitorios=$ndormitorios;
        $this->precio=$precio;
        $this->tamano=$tamano;
        $this->extras=$extras;
        $this->observaciones=$observaciones;
        $this->fecha_anuncio=$fecha_anuncio;
        */
    }

    public function mostrarViviendas() {
        try {
            $conn=$this->conexion;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "SELECT * FROM viviendas";
            foreach ($conn->query($sql) as $row) {
                $this->viviendas[]=$row;
            }
            return $this->viviendas;
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}

$conn = new Conexion();
$viv1 = new Vivienda();
echo "<pre>";
 print_r($viv1->mostrarViviendas());
 echo "</pre>";
