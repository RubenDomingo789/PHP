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

    //Consulta pedida en el informe mostrada en tabla
    $sql1 = "SELECT UPPER(departamento.Nombre) AS 'Departamento', ubicacion.GrupoRegional AS 'Ubicacion', COUNT(empleados.Departamento_ID) AS 'NEmpleados', 
    ROUND(MAX(empleados.salario),2) AS 'SueldoMax', ROUND(MIN(empleados.salario),2) AS 'SueldoMin', ROUND(AVG(empleados.salario),2) AS 'SueldoMedio' FROM departamento
	INNER JOIN empleados ON empleados.Departamento_ID = departamento.departamento_ID
	INNER JOIN ubicacion ON ubicacion.Ubicacion_ID = departamento.Ubicacion_ID
    GROUP BY ubicacion.GrupoRegional, departamento.Nombre;";

    echo "</br><table>";
    echo "<tr><th>DEPARTAMENTO</th><th>UBICACIÓN</th><th>Nº EMPLEADOS</th><th>SUELDO MÁXIMO</th><th>SUELDO MÍNIMO</th><th>SUELDO MEDIO</th>";
    foreach ($conn->query($sql1) as $row) {
        echo "<tr>";
        echo "<td>$row[Departamento]</td>";
        echo "<td>$row[Ubicacion]</td>";
        echo "<td>$row[NEmpleados]</td>";
        echo "<td>$row[SueldoMax]</td>";
        echo "<td>$row[SueldoMin]</td>";
        echo "<td>$row[SueldoMedio]</td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn = null;
    ?>
</body>

</html>