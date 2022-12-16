<!DOCTYPE html>
<html>

<head>
    <title>Actualizar</title>
    <?php
    require '../MenuNavegacion/Menu.php';
    ?>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        input[name="codigo"] {
            background-color: #ddd !important;
        }

        input[type="text"],
        input[type="number"] {
            width: 85% !important;
        }

        select[type="text"] {
            width: 95% !important;
        }

        select[name="id"] {
            width: 85% !important;
        }

        <?php
        include "../Configuracion/Estilos.php";
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
            $stmnt = $conn->prepare("SELECT * FROM departamento WHERE departamento_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($reg <= 0) {
                $msg = "El departamento a modificar es incorrecto o no existe en BBDD";
            } else {
                $datosCorrectos = true;
            }
        } elseif (isset($_POST['botonModificar'])) {
            $stmnt = $conn->prepare("UPDATE departamento SET Nombre = ?, Ubicacion_ID = ? WHERE departamento_ID = ?");
            $stmnt->bindParam(1, $_POST['nombre']);
            $stmnt->bindParam(2, $_POST['idUbicacion']);
            $stmnt->bindParam(3, $_POST['idDepartamento']);

            if ($stmnt->execute()) {
                fwrite($archivo, "OPERACION: UPDATE DEPARTAMENTO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = "El departamento se ha modificado correctamente";
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
                    <input type="number" name="codigo" value="<?= $reg['departamento_ID'] ?>" readonly />
                    <input type="text" maxlength="14" placeholder="Nombre" name="nombre" value="<?= $reg['Nombre'] ?>" required />
                    <select type="text" name="idUbicacion" required>
                        <?php
                        $query = $conn->prepare("SELECT * FROM ubicacion");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            if ($valores["Ubicacion_ID"] == $reg['Ubicacion_ID']) {
                                echo '<option value="' . $valores["Ubicacion_ID"] . '" selected= "selected">' . $valores["GrupoRegional"] . '</option>';
                            } else {
                                echo '<option value="' . $valores["Ubicacion_ID"] . '">' . $valores["GrupoRegional"] . '</option>';
                            }
                        endforeach;
                        ?>
                    </select>
                    <input type="hidden" name="idDepartamento" value="<?= $reg['departamento_ID'] ?>" />
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