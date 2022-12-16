<html>

<head>
    <title>Ejercicio 1</title>
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $dbname = "instituto";

    $sql = "USE $dbname";
    $sql1 = "SELECT * FROM alumnos";
    //$sql1 = "SELECT * FROM alumnos LIMIT " . $inicio . "," . $fin;

    try {
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        $result = $conn->query('SELECT COUNT(*) AS total_alumnos FROM ALUMNOS');
        $row = $result->fetch();
        $num_total_rows = $row['total_alumnos'];
        $alumnos_pagina = 5;
        $paginas = $num_total_rows / $alumnos_pagina;
        $paginas = ceil($paginas);

        echo "<h2>ALUMNOS</h2>";
        echo "<table border='solid black 1px' style='display:center'>";
        echo "<tr style='background-color:black; color:white'><th>CÓDIGO</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELÉFONO</th><th>CORREO</th></tr>";
        foreach ($conn->query($sql1) as $row) {
            echo "<tr style='text-align:center'>";
            echo "<td>$row[CODIGO]</td>";
            echo "<td>$row[NOMBRE]</td>";
            echo "<td>$row[APELLIDOS]</td>";
            echo "<td>$row[TELEFONO]</td>";
            echo "<td>$row[CORREO]</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    <?php
        /*
            $stmnt = $conn -> prepare("INSERT INTO alumnos (NOMBRE, APELLIDOS, TELEFONO, CORREO) VALUES (?, ?, ?, ?)");
            
            $stmnt->bindParam(1, $nombre);
            $stmnt->bindParam(2, $apellidos);
            $stmnt->bindParam(3, $telefono);
            $stmnt->bindParam(4, $correo);

            $nombre = "Pepe";
            $apellidos = "Castro Sánchez";
            $telefono = 662354744;
            $correo = "pepecastro56@yahoo.com";
            $stmnt->execute();

            echo "Nueva fila introducida<br>";

            echo "<table border='solid black 1px' style='display:center'>";
            echo "<tr style='background-color:black; color:white'><th>CÓDIGO</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELÉFONO</th><th>CORREO</th></tr>";
            foreach ($conn -> query($sql1) as $row) {
                echo "<tr style='text-align:center'>";
                echo "<td>$row[CODIGO]</td>";
                echo "<td>$row[NOMBRE]</td>";
                echo "<td>$row[APELLIDOS]</td>";
                echo "<td>$row[TELEFONO]</td>";
                echo "<td>$row[CORREO]</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><hr>"; 
        **/
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</body>


</html>