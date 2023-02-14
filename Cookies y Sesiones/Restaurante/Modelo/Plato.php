<?php
class Plato
{
    private $nombre;
    private $precio;
    private $categoria;

    public function __construct($nombre, $precio, $categoria)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }

    public function __get($propiedad)
    {
        if ($propiedad == "nombre") {
            return $this->nombre;
        } elseif ($propiedad == "precio") {
            return $this->precio;
        } elseif ($propiedad == "categoria") {
            return $this->categoria;
        }
    }

    public function __set($propiedad, $valor)
    {
        if ($propiedad == "nombre") {
            $this->nombre = $valor;
        } elseif ($propiedad == "precio") {
            $this->precio = $valor;
        } elseif ($propiedad == "categoria") {
            $this->categoria = $valor;
        }
    }
}
