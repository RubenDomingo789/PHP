<!DOCTYPE html>
<html>

<head>
    <title>Actualizar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        input[name="codigo"] {
            background-color: #ddd !important;
        }

        select[type="text"] {
            width: 45% !important;
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
            $stmnt = $conn->prepare("SELECT * FROM empleados WHERE empleado_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($reg <= 0) {
                $msg = "El empleado a modificar es incorrecto o no existe en BBDD";
            } else {
                $datosCorrectos = true;
            }
        } elseif (isset($_POST['botonModificar'])) {
            $stmnt = $conn->prepare("UPDATE empleados SET Nombre = ?, Apellido = ?, Inicial_del_segundo_apellido = ?, Salario = ?, Comision = ?, Fecha_contrato = ?, Jefe_ID = ?, Departamento_ID = ?, Trabajo_ID = ? WHERE empleado_ID = ?");
            $stmnt->bindParam(1, $_POST['nombre']);
            $stmnt->bindParam(2, $_POST['apellido']);
            $stmnt->bindParam(3, $_POST['inicialApe']);
            $stmnt->bindParam(4, $_POST['salario']);
            $stmnt->bindParam(5, $_POST['comision']);
            $stmnt->bindParam(6, $_POST['fechaContrato']);
            $stmnt->bindParam(7, $_POST['jefe']);
            $stmnt->bindParam(8, $_POST['departamento']);
            $stmnt->bindParam(9, $_POST['trabajo']);
            $stmnt->bindParam(10, $_POST['idEmpleado']);

            if ($stmnt->execute()) {
                fwrite($archivo, "OPERACION: UPDATE EMPLEADO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = "El empleado se ha modificado correctamente";
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
                        <option value="">ID de Empleado</option>
                        <?php
                        $query = $conn->prepare("SELECT * FROM empleados");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            echo '<option value="' . $valores["empleado_ID"] . '">' . $valores["empleado_ID"] . " - " . $valores["Nombre"] . '</option>';
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
                    <input type="number" name="codigo" value="<?= $reg['empleado_ID'] ?>" readonly />
                    <input type="text" maxlength="15" placeholder="Nombre" name="nombre" value="<?= $reg['Nombre'] ?>" required />
                    <input type="text" maxlength="15" placeholder="Apellido" name="apellido" value="<?= $reg['Apellido'] ?>" required />
                    <input type="text" maxlength="1" placeholder="Inicial 2º Apellido" name="inicialApe" value="<?= $reg['Inicial_del_segundo_apellido'] ?>" required />
                    <input type="number" min="0.00" placeholder="Salario" name="salario" value="<?= $reg['Salario'] ?>" required />
                    <input type="number" min="0.00" placeholder="Comisión" name="comision" value="<?= $reg['Comision'] ?>" required />
                    <input placeholder="Fecha Contrato" type="text" onfocus="(this.type = 'date')" name="fechaContrato" value="<?= $reg['Fecha_contrato'] ?>" required />
                    <select type="text" name="jefe" required>
                        <?php
                        $query = $conn->prepare("SELECT * FROM empleados");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            if ($valores["empleado_ID"] == $reg['Jefe_ID']) {
                                echo '<option value="' . $valores["empleado_ID"] . '" selected= "selected">' . $valores["Nombre"] . '</option>';
                            } else {
                                echo '<option value="' . $valores["empleado_ID"] . '">' . $valores["Nombre"] . '</option>';
                            }
                        endforeach;
                        ?>
                    </select>
                    <select type="text" name="departamento" required>
                        <?php
                        $query = $conn->prepare("SELECT departamento.*, ubicacion.GrupoRegional FROM departamento
                        INNER JOIN ubicacion ON ubicacion.Ubicacion_ID = departamento.Ubicacion_ID;");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            if ($valores["departamento_ID"] == $reg['Departamento_ID']) {
                                echo '<option value="' . $valores["departamento_ID"] . '" selected= "selected">' . $valores["Nombre"] . " - " . $valores["GrupoRegional"] . '</option>';
                            } else {
                                echo '<option value="' . $valores["departamento_ID"] . '">' . $valores["Nombre"] . " - " . $valores["GrupoRegional"] . '</option>';
                            }
                        endforeach;
                        ?>
                    </select>
                    <select type="text" name="trabajo" required>
                        <?php
                        $query = $conn->prepare("SELECT * FROM trabajoS");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            if ($valores["Trabajo_ID"] == $reg['Trabajo_ID']) {
                                echo '<option value="' . $valores["Trabajo_ID"] . '" selected= "selected">' . $valores["Funcion"] . '</option>';
                            } else {
                                echo '<option value="' . $valores["Trabajo_ID"] . '">' . $valores["Funcion"] . '</option>';
                            }
                        endforeach;
                        ?>
                    </select>
                    <input type="hidden" name="idEmpleado" value="<?= $reg['empleado_ID'] ?>" />
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