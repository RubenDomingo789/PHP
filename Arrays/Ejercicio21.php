<html>

<head>
    <title>Ejercicio 21</title>
</head>

<body>
    <?php
    function comprobarCorreo($correo)
    {
        if (strpos($correo, "@gmail.com")) {
            return true;
        } elseif (strpos($correo, "@educa.madrid.org")) {
            return true;
        } elseif (strpos($correo, "@yahoo.com")) {
            return true;
        } elseif (strpos($correo, "@hotmail.com")) {
            return true;
        } else {
            return false;
        }
    }

    $agenda = array(
        array(
            "Nombre" => "Jorge",
            "Dirección" => "Madrid",
            "Teléfono" => 999999999,
            "Correo" => "jorge@correo.com"
        ),

        array(
            "Nombre" => "Julia",
            "Dirección" => "Valencia",
            "Teléfono" => 235456987,
            "Correo" => "julia@correo.com"
        ),

        array(
            "Nombre" => "Lucas",
            "Dirección" => "Orense",
            "Teléfono" => 222222222,
            "Correo" => "lucas@correo.com"
        ),

        array(
            "Nombre" => "Susana",
            "Dirección" => "Ávila",
            "Teléfono" => 987546321,
            "Correo" => "susana@correo.com"
        ),
    );

    foreach ($agenda as $clave => $valor) {
        if (!comprobarCorreo($valor['Correo'])) {
            echo "Nombre: {$valor['Nombre']} , email no válido: {$valor['Correo']} <br>";
        }
    }
    ?>
</body>

</html>