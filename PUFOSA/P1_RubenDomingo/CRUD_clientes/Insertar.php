<!DOCTYPE html>
<html>

<head>
    <title>Insertar</title>
    <style scoped>

        select[type="text"] {
            width: 45% !important;
        }

        input[name="id"] {
            width: 36% !important;
        }

        input[name="comentarios"] {
            width: 85% !important;
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
                fwrite($archivo, "OPERACION: INSERT CLIENTE - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s"). "\r\n");
                $msg = 'La fila ha sido insertada';
            }
        }
    } catch (Exception $e) {
        $msg = 'La fila no ha sido insertada<br>' . $e;
    }
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
                <!--Campo seleccionable que carga distintos valores de BBDD-->
                <select type="text" name="vendedor" required>
                    <option value="">Vendedor:</option>
                    <?php
                    $query = $conn->prepare("SELECT * FROM empleados");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["empleado_ID"] . '">' . $valores["Nombre"] . '</option>';
                    endforeach;
                    ?>
                </select>
                <input type="number" placeholder="Limite de Credito" name="limiteCredito" required />
                <input type="text" placeholder="Comentarios" name="comentarios" />
                <input type="submit" value="Crear" name="botonEnviar" />
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>