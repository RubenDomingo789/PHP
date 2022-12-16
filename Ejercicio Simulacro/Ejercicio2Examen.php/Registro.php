<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" placeholder="Nombre" name="nombre" required /><br>
        <input type="text" placeholder="Apellido" name="apellido" required /><br>
        <input type="number" placeholder="Telefono" name="telefono" required /><br>
        <input type="text" placeholder="Correo" name="correo" required /><br>
        <input type="submit" value="Entrar" name="botonEnviar" /><br>
        <a href="FormularioLogin.php">Loguin de usuario</a>
    </form>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $dbname = "instituto";

    $sql = "USE $dbname";

    try {
        require "Alumno.php";
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        if (isset($_POST['botonEnviar'])) {
            $alumno = new Alumno();
            $alumno->set_nombre($_POST['nombre']);
            $alumno->set_apellidos($_POST['apellido']);
            $alumno->set_telefono($_POST['telefono']);
            $alumno->set_correo($_POST['correo']);

            $nombre = $alumno->get_nombre();
            $apellido = $alumno->get_apellidos();
            $telefono = $alumno->get_telefono();
            $correo = $alumno->get_correo();

            $stmnt = $conn->query("SELECT COUNT(*) AS 'cantidad' FROM alumnos WHERE CORREO= '" . $correo . "';");
            $num = $stmnt->fetch();

            if ($num['cantidad'] > 0) {
                echo 'Este alumno ya ha sido dado de alta';
            } else {
                if ($alumno->comprobarCorreo($correo) == true){
                    $sql1 = "INSERT INTO ALUMNOS (nombre, apellidos, telefono, correo) VALUES (?, ?, ?, ?)";
                    $stmnt = $conn->prepare($sql1);
                    $stmnt->bindParam(1, $nombre);
                    $stmnt->bindParam(2, $apellido);
                    $stmnt->bindParam(3, $telefono);
                    $stmnt->bindParam(4, $correo);
    
                    if ($stmnt->execute()){
                        header("location:FormularioLogin.php?nombre=$nombre");
                    };
                }
                else {
                    echo "El correo introducido debe contener una @ y un .";
                }
            }
        }
    } catch (Exception $e) {
        echo 'La fila no ha sido insertada<br>' . $e;
    }
    $conn = null;
    ?>
</body>

</html>