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

    $sql1 = "SELECT empleado_ID, Nombre, Apellido, Inicial_del_segundo_apellido, Salario, Comision, Jefe_ID, Departamento_ID, Trabajo_ID FROM empleados";

    echo "</br><table>";
    echo "<tr><th>CÓDIGO</th><th>NOMBRE</th><th>APELLIDO</th><th>INICIAL 2º APELLIDO</th><th>SALARIO</th><th>COMISIÓN</th><th>JEFE</th><th>DEPARTAMENTO</th><th>TRABAJO</th>";
    foreach ($conn->query($sql1) as $row) {
        echo "<tr>";
        echo "<td>$row[empleado_ID]</td>";
        echo "<td>$row[Nombre]</td>";
        echo "<td>$row[Apellido]</td>";
        echo "<td>$row[Inicial_del_segundo_apellido]</td>";
        echo "<td>$row[Salario]</td>";
        echo "<td>$row[Comision]</td>";
        echo "<td>$row[Jefe_ID]</td>";
        echo "<td>$row[Departamento_ID]</td>";
        echo "<td>$row[Trabajo_ID]</td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn = null;
    ?>
</body>

</html>