<html>

<head>
    <title>Mostrar</title>
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

    $sql1 = "SELECT * FROM departamento";

    echo "</br><table>";
    echo "<tr><th>CÓDIGO</th><th>NOMBRE</th><th>UBICACIÓN</th>";
    foreach ($conn->query($sql1) as $row) {
        echo "<tr>";
        echo "<td>$row[departamento_ID]</td>";
        echo "<td>$row[Nombre]</td>";
        echo "<td>$row[Ubicacion_ID]</td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn = null;
    ?>
</body>

</html>