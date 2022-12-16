<?php
class Repetidor extends Alumno
{
    private $asignatura;

    function __construct($asig, $nombre, $apellido)
    {
        $this->asignatura = $asig;
        parent::__construct($nombre, $apellido);
    }

    function get_asignatura()
    {
        return $this->asignatura;
    }

    function set_asignatura($asignatura)
    {
        $this->$asignatura = $asignatura;
    }
}
