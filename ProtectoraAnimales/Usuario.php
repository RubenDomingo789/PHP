<?php
include 'Crud.php';
class Usuario extends Crud
{
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $edad;
    private $conexion;
    const Tabla = 'usuarios';

    function __construct($nombre, $apellido, $sexo, $direccion, $telefono, $edad, $conexion)
    {
        parent::__construct($conexion, self::Tabla);
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->edad = $edad;
        $this->conexion = parent::conectar();
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }

    public function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function get_apellido()
    {
        return $this->apellido;
    }

    public function set_apellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function get_sexo()
    {
        return $this->sexo;
    }

    public function set_sexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function get_direccion()
    {
        return $this->direccion;
    }

    public function set_direccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function get_telefono()
    {
        return $this->telefono;
    }

    public function set_telefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function get_edad()
    {
        return $this->edad;
    }

    public function set_edad($edad)
    {
        $this->edad = $edad;
    }

    public function crear()
    {
        try {
            $conn = $this->conexion;
            $sql = "INSERT INTO " . self::Tabla . "VALUES (?, ?, ?, ?, ?, ?)";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $this->get_nombre());
            $stmnt->bindParam(2, $this->get_apellido());
            $stmnt->bindParam(3, $this->get_sexo());
            $stmnt->bindParam(4, $this->get_direccion());
            $stmnt->bindParam(5, $this->get_telefono());
            $stmnt->bindParam(6, $this->get_edad());

            $stmnt->execute();
            return 'La fila ha sido insertada con exito';
            $this->obtieneTodos();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function actualizar()
    {
        try {
            $sql = "UPDATE " . self::Tabla . " SET nombre = ?, apellido = ?, sexo = ?, direccion = ?, telefono = ?, edad = ? WHERE id = ?";
            $stmnt = $this->conn->prepare($sql);
            $stmnt->bindParam(1, $this->set_nombre($this->get_nombre()));
            $stmnt->bindParam(2, $this->set_apellido($this->get_apellido()));
            $stmnt->bindParam(3, $this->get_sexo());
            $stmnt->bindParam(4, $this->get_direccion());
            $stmnt->bindParam(5, $this->get_telefono());
            $stmnt->bindParam(6, $this->get_edad());
            $stmnt->bindParam(7, $this->get_id());

            $stmnt->execute();
            return 'La fila ha sido insertada con exito';
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
