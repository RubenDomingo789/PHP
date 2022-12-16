<html>

<head>
    <title>Ejercicio 4</title>
    <style>
        #table{
            text-align: center;
            background-color: rgb(206, 106, 197);
            width: 1000px;
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <table id ="table">
    <tr style="background-color: black; color: white">
        <td>Sueldo inicial</td>
        <td>Retencion</td>
        <td>Sueldo neto</td>
    </tr>
    <tr>
        <td>
            <?php
                $sueldo_inicial = 2750;
                echo $sueldo_inicial;
            ?>
        </td>
        <td>
        <?php
            $retencion = 0.22;
            echo $retencion;
            ?>
        </td>
        <td>
        <?php
            $sueldo_final = $sueldo_inicial - ($sueldo_inicial * $retencion);
            echo $sueldo_final;
            ?>
        </td>
    </tr>
    </table>
</body>

</html>