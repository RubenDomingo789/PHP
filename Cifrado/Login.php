<html>

<head>
    <title>Login cifrado</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" placeholder="Nombre" name="nombre" required /><br>
        <input type="password" placeholder="Password" name="password" /><br>
        <input type="submit" value="Entrar" name="botonEnviar" /></br></br>
    </form>
</body>

</html>
<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "instituto";
$sql = "USE $dbname";
$sql2 = "SELECT CONTRASEÑA FROM alumnos WHERE NOMBRE = ?";

if (isset($_POST['botonEnviar'])) {
    try {
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        $stmt = $conn->prepare("SELECT NOMBRE FROM alumnos WHERE NOMBRE = ?");
        $stmt->bindParam(1, $_POST['nombre']);
        $stmt->execute();
        $nombre = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($nombre > 0) {
            $stmt = $conn->prepare($sql2);
            $stmt->bindParam(1, $_POST['nombre']);
            $stmt->execute();
            $reg = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($reg) > 0) {
                if (password_verify($_POST['password'], $reg[1]['CONTRASEÑA'])) {
                    echo "Bienvenido " . $_POST['nombre'];
                } else {
                    echo "Credenciales incorrectas";
                }
            }
        } else {
            echo "Ningun alumno encontrado con ese nombre";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>