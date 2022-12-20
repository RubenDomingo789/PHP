<html>

<head>
    <title>Ejercicio 1</title>
    <style>
        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination li:first-child a {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .pagination li:last-child a {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        ul.pagination li a:hover:not(.active) {
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

    try {
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        if (isset($_GET['nPaginas'])) {
            $nPaginas = $_GET['nPaginas'];
        } else {
            $nPaginas = 1;
        }

        $alumnos_pagina = 10;
        $inicio = ($nPaginas - 1) * $alumnos_pagina;

        $result = $conn->query('SELECT COUNT(*) AS total_alumnos FROM ALUMNOS');
        $row = $result->fetch();
        $num_total_filas = $row['total_alumnos'];
        $paginas = $num_total_filas / $alumnos_pagina;
        $paginas = ceil($paginas);

        echo "<h2>ALUMNOS</h2>";
        echo "<table border='solid black 1px' style='display:center'>";
        echo "<tr style='background-color:black; color:white'><th>CÓDIGO</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELÉFONO</th><th>CORREO</th></tr>";
        foreach ($conn->query("SELECT * FROM alumnos LIMIT $inicio, $alumnos_pagina") as $row) {
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
        <ul class="pagination">
            <li class="<?php if ($nPaginas <= 1) {
                            echo 'disabled';
                        } ?>">
                <a href="<?php if ($nPaginas <= 1) {
                                echo '#';
                            } else {
                                echo "?nPaginas=" . ($nPaginas - 1);
                            } ?>">Anterior
                </a>
            </li>
            <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li>
                    <a href="<?php echo "?nPaginas=" . $i; ?>">
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } ?>
            <li class="<?php if ($nPaginas >= $paginas) {
                            echo 'disabled';
                        } ?>">
                <a href="<?php if ($nPaginas >= $paginas) {
                                echo '#';
                            } else {
                                echo "?nPaginas=" . ($nPaginas + 1);
                            } ?>">Siguiente
                </a>
            </li>
            <form method="post" action="">
                <input type="submit" value="Crear" name="botonEnviar" /></br></br>
            </form>
        </ul>
    <?php
        if (isset($_POST['botonEnviar'])) {
            $stmnt = $conn->prepare("INSERT INTO alumnos (NOMBRE, APELLIDOS, TELEFONO, CORREO, LOGIN, PASSWORD) VALUES (?, ?, ?, ?, ?, ?)");

            $stmnt->bindParam(1, $nombre);
            $stmnt->bindParam(2, $apellidos);
            $stmnt->bindParam(3, $telefono);
            $stmnt->bindParam(4, $correo);
            $stmnt->bindParam(5, $login);
            $stmnt->bindParam(6, $password);

            $nombre = "Pepe";
            $apellidos = "Castro Sánchez";
            $telefono = 662354744;
            $correo = "pepecastro56@yahoo.com";
            $login = strtolower($nombre);
            $password = password_hash('Clase', PASSWORD_DEFAULT);
            $stmnt->execute();

            echo "Nueva fila introducida<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

</body>


</html>