<!DOCTYPE html>
<html>

<head>
    <title>Insertar</title>
</head>

<body>
    <?php
    require '../../PUFOSA/P1_RubenDomingo/Configuracion/Conexion.php';
    try {
        //Comprobamos si el ID ya ha sido dado de alta y insertamos los datos del nuevo cliente
        if (isset($_POST['botonEnviar'])) {
            $stmnt = $conn->query("SELECT COUNT(*) AS 'cantidad' FROM cliente WHERE CLIENTE_ID= '" . $_POST['id'] . "';");
            $num = $stmnt->fetch();
            if ($num['cantidad'] > 0) {
                $msg = 'Este ID ya ha sido dado de alta';
            } else {
                $stmnt = $conn->prepare("INSERT INTO cliente VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmnt->bindParam(1, $_POST['id']);
                $stmnt->bindParam(2, $_POST['nombre']);
                $stmnt->bindParam(3, $_POST['direccion']);
                $stmnt->bindParam(4, $_POST['ciudad']);
                $stmnt->bindParam(5, $_POST['estado']);
                $stmnt->bindParam(6, $_POST['codigoPostal']);
                $stmnt->bindParam(7, $_POST['codigoArea']);
                $stmnt->bindParam(8, $_POST['telefono']);
                $stmnt->bindParam(9, $_POST['vendedor']);
                $stmnt->bindParam(10, $_POST['limiteCredito']);
                $stmnt->bindParam(11, $_POST['comentarios']);

                $stmnt->execute();
                $msg = 'La fila ha sido insertada';
            }
        }
    } catch (Exception $e) {
        $msg = 'La fila no ha sido insertada<br>' . $e;
    }
    $conn = null;
    ?>
    <div class="wrapper">
        <div id="contenido">
            <form method="post" action="">
                <input type="number" name="id" min=1 placeholder="ID Cliente" required />
                <input type="text" maxlength="45" placeholder="Nombre" name="nombre" required />
                <input type="text" maxlength="40" placeholder="Dirección" name="direccion" required />
                <input type="text" maxlength="30" placeholder="Ciudad" name="ciudad" required />
                <input type="text" maxlength="2" placeholder="Estado" name="estado" required />
                <input type="number" placeholder="Codigo Postal" name="codigoPostal" required />
                <input type="number" placeholder="Codigo de Area" name="codigoArea" required />
                <input type="number" placeholder="Telefono" name="telefono" required />
                <input type="number" placeholder="Limite de Credito" name="limiteCredito" required />
                <input type="text" placeholder="Comentarios" name="comentarios" />
                <input type="submit" value="Crear" name="botonEnviar" />
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>