<!DOCTYPE html>
<html>

<head>
    <title>Actualizar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        input[name="codigo"] {
            background-color: #ddd;
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

    $datosCorrectos = false;
    try {
        if (isset($_POST['id'])) {
            $stmnt = $conn->prepare("SELECT * FROM trabajos WHERE Trabajo_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($reg <= 0) {
                $msg = "El trabajo a modificar es incorrecto o no existe en BBDD";
            } else {
                $datosCorrectos = true;
            }
        } elseif (isset($_POST['botonModificar'])) {
            $stmnt = $conn->prepare("UPDATE trabajos SET Funcion = ? WHERE Trabajo_ID = ?");
            $stmnt->bindParam(1, $_POST['funcion']);
            $stmnt->bindParam(2, $_POST['idTrabajo']);

            if ($stmnt->execute()) {
                fwrite($archivo, "OPERACION: UPDATE TRABAJO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = "El trabajo se ha modificado correctamente";
            } else {
                $msg = 'Algun campo introducido es incorrecto';
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    if (!$datosCorrectos) {
    ?>
        <div class="wrapper">
            <div id="contenido">
                <form method="post" action="">
                    <select type="number" min="1" name="id">
                        <option value="">ID de Trabajo</option>
                        <?php
                        $query = $conn->prepare("SELECT * FROM trabajos");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            echo '<option value="' . $valores["Trabajo_ID"] . '">' . $valores["Trabajo_ID"] . " - " . $valores["Funcion"] . '</option>';
                        endforeach;
                        ?>
                    </select>
                    <input type="submit" value="Buscar" name="botonEnviar" />
                    <p style="color:white"><?= $msg ?? "" ?></p>
                </form>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="wrapper">
            <div id="contenido">
                <form method="post" action="">
                    <input type="number" name="codigo" value="<?= $reg['Trabajo_ID'] ?>" readonly />
                    <input type="text" maxlength="30" placeholder="Funcion" name="funcion" value="<?= $reg['Funcion'] ?>" required />
                    <input type="hidden" name="idTrabajo" value="<?= $reg['Trabajo_ID'] ?>" />
                    <input type="submit" value="Actualizar" name="botonModificar" />
                    <p style="color:white"><?= $msg ?? "" ?></p>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>