<?php
require_once('Conexion.php');
class Usuario extends Conexion
{
    private $conexion;
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = array();
        $this->conexion = Conexion::conectar();
    }

    public function mostrarUsuarios($inicio, $fin)
    {
        try {
            $conn = $this->conexion;
            $sql = "SELECT * FROM usuarios LIMIT $inicio, $fin";
            foreach ($conn->query($sql) as $row) {
                $this->usuarios[] = $row;
            }
            return $this->usuarios;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrarUsuario($id)
    {
        $conn = $this->conexion;
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $query = $conn->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();
        return 'El usuario ha sido borrado correctamente';
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
}
