<html>

<head>
    <title>Ejercicio 9</title>
</head>

<body>
    <?php
    $dia_semana = 12;

    switch ($dia_semana) {
        case 1:
            echo "Lunes";
            break;
        case 2:
            echo "Martes";
            break;
        case 3:
            echo "Miércoles";
            break;
        case 4:
            echo "Jueves";
            break;
        case 5:
            echo "Viernes";
            break;
        case 6:
            echo "Sábado";
            break;
        case 7:
            echo "Domingo";
            break;
        default:
            echo "No se ha introducido un numero del 1 al 7";
            break;
    }
    ?>
</body>

</html>