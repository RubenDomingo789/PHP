<?php
class Edad
{
    function comprobarEdad($fecha)
    {
        $nacimiento = new DateTime($fecha);
        $ahora = new DateTime(date("Y/m/d"));
        $diferencia = $ahora->diff($nacimiento);
        $edad = $diferencia->format("%y");

        if ($edad < 18) {
            return "El usuario es menor de edad";
        } else {
            return "El usuario es mayor de edad";
        }
    }
}
