<html>

<head>
    <title>Login cifrado</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" placeholder="Nombre" name="nombre" required /><br>
        <input type="password" placeholder="Password" name="password" required /><br>
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
$sql3 = "SELECT NOMBRE FROM alumnos WHERE NOMBRE = ? AND PASSWORD = ?";

if (isset($_POST['botonEnviar'])) {
    try {
        $conn = new PDO("mysql:host=$servidor;dbname = $dbname", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);

        $stmt = $conn->prepare("SELECT NOMBRE FROM alumnos WHERE NOMBRE = ?");
        $stmt->bindParam(1, $_POST['nombre']);
        $stmt->execute();
        $nombre = $stmt->fetchAll();
        
        if (count($nombre) > 0) {
            $stmt = $conn->prepare($sql2);
            $stmt->bindParam(1, strtolower($login));
            $stmt->bindParam(2, password_hash($_POST['password'], PASSWORD_DEFAULT));
        } else {
            echo "Ningun alumno encontrado con ese nombre";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>