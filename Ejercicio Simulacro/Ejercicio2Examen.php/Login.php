<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php

    $archivo = fopen("log.txt", "a+");
    if ($archivo == false) {
        echo "Error en la creación del fichero";
    }

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $dbname = "instituto";

    $sql = "USE $dbname";

    try {
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        if (isset($_POST['botonEnviar'])) {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            $query = $conn->prepare("SELECT * FROM alumnos WHERE NOMBRE= ?");
            $query->bindParam(1, $usuario);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result <= 0) {
                $msg = 'Identificación incorrecta';
                header("location:FormularioLogin.php?msg=$msg");
                fwrite($archivo, $msg . "  " . date("Y-m-d H:i:s") . "\r\n");
            } else {
                if ($contraseña != strtolower($usuario)) {
                    $msg = 'Identificación incorrecta';
                    header("location:FormularioLogin.php?msg=$msg");
                    fwrite($archivo, $msg . "  " . date("Y-m-d H:i:s") . "\r\n");
                } else {
                    echo "Bienvenid@ " . $usuario;
                }
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</body>

</html>