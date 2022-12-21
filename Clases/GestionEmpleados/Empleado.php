<?php
include "NIF.php";
class Empleado
{
    private $nombre;
    private $NIF;
    private $sueldoBase;
    private $horasExtra;
    private $IRPF;
    private $casado;
    private $numHijos;
    private $importeHorasExtra;

    function __construct($NIF)
    {
        $this->NIF = $NIF->leer();
    }

    function get_nombre()
    {
        return $this->nombre;
    }

    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function calculoComplementoHorasExtra()
    {
        return ($this->horasExtra * $this->importeHorasExtra) - $this->IRPF;
    }

    function calculoSueldoBruto()
    {
        return $this->sueldoBase + $this->calculoComplementoHorasExtra();
    }

    function calculoIRPF(){
        if($this->calculoSueldoBruto() <= 12450) {
            
        }
    }
}
