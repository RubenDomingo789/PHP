<!DOCTYPE html>
<html>

<head>
    <title>Insertar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }
        input[name="id"] {
            width: 36% !important;
        }
        <?php
        include "../Configuracion/Estilos.php";
        require '../MenuNavegacion/Menu.php';
        ?>
    </style>
</head>

<body>
    <?php
    require '../Configuracion/Conexion.php';
    require '../InformesLog/CreacionFichero.php';

    try {
        if (isset($_POST['botonEnviar'])) {
            $stmnt = $conn->query("SELECT COUNT(*) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID= '" . $_POST['id'] . "';");
            $num = $stmnt->fetch();
            if ($num['cantidad'] > 0) {
                $msg = 'Este ID ya ha sido dado de alta';
            } else {
                $stmnt = $conn->prepare("INSERT INTO ubicacion (Ubicacion_ID, GrupoRegional) VALUES (?, ?)");
                $stmnt->bindParam(1, $_POST['id']);
                $stmnt->bindParam(2, $_POST['nombre']);

                $stmnt->execute();
                fwrite($archivo, "OPERACION: INSERT UBICACIÓN - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = 'La fila ha sido insertada';
            }
        }
    } catch (Exception $e) {
        $msg = 'Algun campo introducido es incorrecto';
    }
    $conn = null;
    ?>
    <div class="wrapper">
        <div id="contenido">
            <form method="post" action="">
                <input type="number" min= 1 placeholder="ID Ubicacion" name="id" required/>
                <input type="text" maxlength="20" placeholder="Grupo Regional" name="nombre" required/>
                <input type="submit" value="Crear" name="botonEnviar" />
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>