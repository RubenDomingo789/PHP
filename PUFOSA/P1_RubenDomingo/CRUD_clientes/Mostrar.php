<html>

<head>
    <title>Tabla Inicial</title>
    <style>
        body {
            background-color: #39ace7;
            font-family: Arial;
        }

        table {
            background-color: white;
            text-align: center;
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            margin-top: 15px;
            margin-bottom: 25px;
        }

        th,
        td {
            padding: 20px;
        }

        th {
            background-color: #332966;
            border-bottom: solid 5px #0F362D;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }

        tr:hover td {
            background-color: #3281cf;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include '../MenuNavegacion/Menu.php';
    require '../Configuracion/Conexion.php';

    $sql1 = "SELECT * FROM cliente";

    echo "</br><table>";
    echo "<tr><th>CÓDIGO</th><th>NOMBRE</th><th>DIRECCIÓN</th><th>CIUDAD</th><th>ESTADO</th><th>CÓDIGO POSTAL</th><th>CÓDIGO DE ÁREA</th><th>TELÉFONO</th><th>CÓDIGO DE VENDEDOR</th><th>LÍMITE DE CREDITO</th><th>COMENTARIOS</th></tr>";
    foreach ($conn->query($sql1) as $row) {
        echo "<tr>";
        echo "<td>$row[CLIENTE_ID]</td>";
        echo "<td>$row[nombre]</td>";
        echo "<td>$row[Direccion]</td>";
        echo "<td>$row[Ciudad]</td>";
        echo "<td>$row[Estado]</td>";
        echo "<td>$row[CodigoPostal]</td>";
        echo "<td>$row[CodigoDeArea]</td>";
        echo "<td>$row[Telefono]</td>";
        echo "<td>$row[Vendedor_ID]</td>";
        echo "<td>$row[Limite_De_Credito]</td>";
        echo "<td>$row[Comentarios]</td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn = null;
    ?>
</body>


</html>