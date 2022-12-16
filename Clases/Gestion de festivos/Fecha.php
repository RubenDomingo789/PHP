<?php

class Fecha
{
    private int $dia;
    private int $mes;
    private int $annio;
    private int $tipo;

    function __construct($dia, $mes, $annio, $tipo)
    {
        $this->dia = $dia;
        $this->mes = $mes;

        if ($annio >= 2022) {
            $this->annio = $annio;
        }
        if (!($tipo == 0 | $tipo == 1 | $tipo == 2)) {
            echo "Debes elegir un número entre 0 y 2 para el atributo tipo.";
        }

        if ($tipo == 0 | $tipo == 1 | $tipo == 2) {
            $this->tipo = $tipo;
        }
        if (!($tipo == 0 | $tipo == 1 | $tipo == 2)) {
            echo "Debes elegir un número entre 0 y 2 para el atributo tipo.";
        }
    }

    function get_dia()
    {
        return $this->dia;
    }

    function set_dia($dia)
    {
        $this->dia = $dia;
    }

    function get_mes()
    {
        return $this->mes;
    }

    function set_mes($mes)
    {
        $this->mes = $mes;
    }

    function get_annio()
    {
        return $this->annio;
    }

    function set_annio($annio)
    {
        $this->annio = $annio;
    }

    function get_tipo()
    {
        return $this->tipo;
    }

    function set_tipo($tipo)
    {
        $this->tipo = $tipo;
    }

    function __toString()
    {
        switch ($this->tipo) {
            case 1:
                setlocale(LC_TIME, 'es_ES');
                $fecha = DateTime::createFromFormat('!m', $this->mes);
                $monthName = strftime("%B", $fecha->getTimestamp());
                return $this->get_dia() . " - " . $monthName . " - " . $this->get_annio(); 
                break;

            default:
                return $this->get_dia() . "/" . $this->get_mes() . "/" . $this->get_annio();
                break;
        }
    }
}

$fecha = new Fecha(4, 5, 2022, 1);
echo $fecha->__toString();
