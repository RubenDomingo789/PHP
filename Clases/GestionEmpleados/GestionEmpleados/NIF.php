<?php

class NIF
{
    private $numero;
    private $letra;

    function __construct($numero)
    {
        $this->numero = $numero;
    }

    function leer()
    {
        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $indice = intval($this->numero) % 23;
        $this->letra = $letras[$indice];
    }

    function __toString()
    {
        if (strlen($this->numero) < 8) {
            $numeroConCeros = str_pad($this->numero, 8, "0", STR_PAD_LEFT);
            return $numeroConCeros . "-" . $this->letra;
        }
        else {
            return $this->numero . "-" . $this->letra;
        }
    }
}
?>
<html>

<head>
    <title>Ejercicio 1</title>
</head>

<body>
    <form method="post" action="">
        <label for="dni"> DNI sin letra </label><br>
        <input type="number" name="dni" min= "1" required /></input><br>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
    
    <?php
    if (isset($_POST['botonEnviar'])) {
        $dni = new NIF($_POST['dni']);
        $dni->leer();
        echo $dni->__toString();
    }
    ?>
</body>

</html>
