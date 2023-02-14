<?php
interface UsuarioDAO {
    public function insertar(Usuario $usuario);
    public function findByName($nombre);
}
?>