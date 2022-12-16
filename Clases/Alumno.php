<?php

include "Repetidor.php";

class Alumno
{
    public $nombre;
    public $apellido;
    const CICLO = "DAW";
    public static $curso = "Primero";

    function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    function get_nombre()
    {
        return $this->nombre;
    }

    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function get_apellido()
    {
        return $this->apellido;
    }

    function set_apellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public static function get_curso()
    {
        return self::$curso;
    }

    public static function set_curso($curso)
    {
        self::$curso = $curso;
    }
}

$alumno1 = new Alumno("Rubén", "Domingo");
print_r($alumno1);
echo "<br>El nombre del alumno es " . $alumno1->get_nombre() . " y el apellido es " . $alumno1->get_apellido() . " esta matriculado en " . Alumno::CICLO . " en curso " . Alumno::get_curso();

Alumno::set_curso("Segundo");
echo "<br>El nombre del alumno es " . $alumno1->get_nombre() . " y el apellido es " . $alumno1->get_apellido() . " esta matriculado en " . Alumno::CICLO . " en curso " . Alumno::get_curso();

$alumno2 = new Repetidor("BBDD", "Juan", "Delgado"); 
echo "<br>";
print_r($alumno2);
