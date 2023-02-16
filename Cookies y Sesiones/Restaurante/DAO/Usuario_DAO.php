<?php
require_once 'Modelo/Usuario.php';
require_once 'UsuarioDAO.php';
require_once 'DataSource.php';

class daoUsuario extends Dao implements UsuarioDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function findByName($nombre)
    {
        try {
            $sql = "SELECT nombre FROM usuarios WHERE nombre = ?";
            $stmnt = $this->conn->prepare($sql);
            $stmnt->bindParam(1, $nombre);
            $stmnt->execute();
            $result = $stmnt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertar(Usuario $usuario)
    {
        try {
            $sql = "INSERT INTO usuarios (nombre, password) VALUES (?, ?)";
            $stmnt = $this->conn->prepare($sql);
            $stmnt->bindParam(1, $nombre);
            $stmnt->bindParam(2, $password);
            $nombre = $usuario->__get('nombre');
            $password = password_hash($usuario->__get('password'), PASSWORD_DEFAULT);
            $stmnt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function comprobarUser($nombre, $pass)
    {
        try {
            $result = $this->findByName($nombre);

            if ($result == '') {
                $msg = "Nombre de usuario incorrecto";
                return $msg;
            } else {
                $sql2 = "SELECT * FROM usuarios WHERE nombre = ?";
                $query = $this->conn->prepare($sql2);
                $query->bindParam(1, $nombre);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $passBBDD = $result['password'];

                if (password_verify($pass, $passBBDD)) {
                    return $msg = '';
                } else {
                    $msg = "Contraseña incorrecta";
                    return $msg;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
