<!DOCTYPE html>
<html>

<head>
    <title>Borrar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        select[name="id"] {
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

    if (isset($_POST['botonEnviar'])) {
        try {
            $stmnt = $conn->prepare("SELECT departamento_ID FROM departamento WHERE departamento_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $registros = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($registros > 0) {
                $stmnt = $conn->prepare("DELETE FROM departamento WHERE departamento_ID = ?");
                $stmnt->bindParam(1, $_POST['id']);
                $stmnt->execute();
                fwrite($archivo, "OPERACION: DELETE DEPARTAMENTO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = 'El departamento ha sido borrado correctamente';
            } else {
                $msg = 'El id del departamento introducido es incorrecto o no existe<br>';
            }
        } catch (Exception $e) {
            $msg = "Este departamento no puede borrarse ya que tiene empleados asociados";
        }
    }

    ?>
    <div class="wrapper">
        <div id="contenido">
            <form method="post" action="">
                <select type="number" min="1" name="id">
                    <option value="">ID de Departamento</option>
                    <?php
                    $query = $conn->prepare("SELECT * FROM departamento");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["departamento_ID"] . '">' . $valores["departamento_ID"] . " - " . $valores["Nombre"] . '</option>';
                    endforeach;
                    ?>
                </select>
                <input type="submit" value="Borrar" name="botonEnviar" />
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>