<?php
class Usuario
{
    private $nombre;
    private $password;

    public function __construct($nombre, $password)
    {
        $this->nombre = $nombre;
        $this->password = $password;
    }

    public function __get($propiedad)
    {
        if ($propiedad == "nombre") {
            return $this->nombre;
        } elseif ($propiedad == "password") {
            return $this->password;
        }
    }

    public function __set($propiedad, $valor)
    {
        if ($propiedad == "nombre") {
            $this->nombre = $valor;
        } elseif ($propiedad == "password") {
            $this->password = $valor;
        }
    }
}
