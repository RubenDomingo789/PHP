<!DOCTYPE html>
<html>

<head>
    <title>Consulta</title>
</head>

<body>
    <p>Buscar alumno</p>
    <form method="post" action="">
        <input type="text" name="nombre" placeholder="Nombre" required /><br>
        <input type="submit" value="Crear" name="botonEnviar" />
        <p style="color:white"><?= $msg ?? "" ?></p>
    </form>

    <?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "root";
    $dbname = "instituto";
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("USE $dbname");

        if (isset($_POST['botonEnviar'])) {
            $sql = "SELECT * FROM ALUMNOS WHERE NOMBRE = ?";
            $stmnt = $conn->prepare($sql);
            $stmnt->bindParam(1, $_POST['nombre']);
            $stmnt->execute();
            $result = $stmnt->fetchAll();
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "CODIGO: " . $row['CODIGO'] .
                        "<br>NOMBRE: " . $row['NOMBRE'] .
                        "<br>APELLIDOS: " . $row['APELLIDOS'] .
                        "<br>TELEFONO: " . $row['TELEFONO'] .
                        "<br>CORREO: " . $row['CORREO'] . "<hr>";
                }
            } else {
                echo "Ningun alumno encontrado con ese nombre";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</body>

</html>