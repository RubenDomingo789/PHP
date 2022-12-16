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
            $stmnt = $conn->prepare("SELECT * FROM ubicacion WHERE Ubicacion_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($reg <= 0) {
                $msg = "La ubicacion a modificar es incorrecta o no existe en BBDD";
            } else {
                $datosCorrectos = true;
            }
        } elseif (isset($_POST['botonModificar'])) {
            $stmnt = $conn->prepare("UPDATE ubicacion SET GrupoRegional = ? WHERE Ubicacion_ID = ?");
            $stmnt->bindParam(1, $_POST['nombre']);
            $stmnt->bindParam(2, $_POST['idUbicacion']);

            if ($stmnt->execute()) {
                fwrite($archivo, "OPERACION: UPDATE UBICACIÓN - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = "La ubicacion se ha modificado correctamente";
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
                        <option value="">ID de Ubicación</option>
                        <?php
                        $query = $conn->prepare("SELECT * FROM ubicacion");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            echo '<option value="' . $valores["Ubicacion_ID"] . '">' . $valores["Ubicacion_ID"] . " - " . $valores["GrupoRegional"] . '</option>';
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
                    <input type="number" name="codigo" value="<?= $reg['Ubicacion_ID'] ?>" readonly />
                    <input type="text" maxlength="20" placeholder="Nombre" name="nombre" value="<?= $reg['GrupoRegional'] ?>" required />
                    <input type="hidden" name="idUbicacion" value="<?= $reg['Ubicacion_ID'] ?>" />
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