<?php
require 'Conexion.php';
class Modelo extends Conexion
{
    private $conexion;
    private $model;

    public function __construct()
    {
        $this->model = array();
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
                $this->model[] = $row;
            }
            return $this->model;
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

    public function comprobarUser($id, $pass)
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
            $query = $conn->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result <= 0) {
                $msg = "ID de usuario incorrecto";
                return $msg;
            } else {
                $sql2 = "SELECT * FROM usuarios WHERE password = ?";
                $query = $conn->prepare($sql2);
                $query->bindParam(1, $pass);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $pass_encrypt = $result['password'];
                $pass_user = password_hash($pass, PASSWORD_DEFAULT);

                if ($result <= 0) {
                    $msg = "Contraseña incorrecta";
                    return $msg;
                } else {
                    if (password_verify($pass_user, $pass_encrypt)) {
                        return $msg= '';
                    }
                }
            }
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
