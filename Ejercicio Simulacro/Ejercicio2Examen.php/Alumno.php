<?php
class Alumno {
    private $nombre;
    private $apellidos;
    private $telefono;
    private $correo;

    function __construct(){}

    function get_nombre()
    {
        return $this->nombre;
    }

    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function get_apellidos()
    {
        return $this->apellidos;
    }

    function set_apellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    function get_telefono()
    {
        return $this->telefono;
    }

    function set_telefono($telefono)
    {
        $this->telefono = $telefono;
    }

    function get_correo()
    {
        return $this->correo;
    }

    function set_correo($correo)
    {
        $this->correo = $correo;
    }

    function comprobarCorreo($email){
        if (str_contains($email, "@") == true && str_contains($email,".") == true){
            return true;
        }
        else {
            return false;
        }
    }
}
