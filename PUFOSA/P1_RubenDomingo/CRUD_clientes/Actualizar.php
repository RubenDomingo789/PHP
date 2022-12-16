<!DOCTYPE html>
<html>

<head>
    <title>Actualizar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        select[type="text"] {
            width: 45% !important;
        }

        select[name="id"] {
            width: 85% !important;
        }

        input[name="comentarios"] {
            width: 85% !important;
        }

        input[name="codigo"] {
            background-color: #ddd !important;
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
    include '../InformesLog/CreacionFichero.php';

    $datosCorrectos = false;
    try {
        //Compobación de que el id no este en uso ni el campo vacío
        if (isset($_POST['id'])) {
            $stmnt = $conn->prepare("SELECT * FROM cliente WHERE CLIENTE_ID = ?");
            $stmnt->bindParam(1, $_POST['id']);
            $stmnt->execute();

            $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
            if ($reg <= 0) {
                $msg = "El cliente a modificar es incorrecto o no existe en BBDD";
            } else {
                $datosCorrectos = true;
            }
        }
        //Modificamos cliente cuando damos al boton actualizar a partir de los parámetros pasados en el formulario
        elseif (isset($_POST['botonModificar'])) {
            $stmnt = $conn->prepare("UPDATE cliente SET nombre = ?, Direccion = ?, Ciudad = ?, Estado = ?, CodigoPostal = ?, CodigoDeArea = ?, Telefono = ?, Vendedor_ID = ?, Limite_De_Credito = ?, Comentarios = ? WHERE CLIENTE_ID = ?");
            $stmnt->bindParam(1, $_POST['nombre']);
            $stmnt->bindParam(2, $_POST['direccion']);
            $stmnt->bindParam(3, $_POST['ciudad']);
            $stmnt->bindParam(4, $_POST['estado']);
            $stmnt->bindParam(5, $_POST['codigoPostal']);
            $stmnt->bindParam(6, $_POST['codigoArea']);
            $stmnt->bindParam(7, $_POST['telefono']);
            $stmnt->bindParam(8, $_POST['vendedor']);
            $stmnt->bindParam(9, $_POST['limiteCredito']);
            $stmnt->bindParam(10, $_POST['comentarios']);
            $stmnt->bindParam(11, $_POST['idCliente']);

            if ($stmnt->execute()) {
                fwrite($archivo, "OPERACION: UPDATE CLIENTE - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = "El cliente se ha modificado correctamente";
            } else {
                $msg = 'Algun campo introducido es incorrecto';
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    if (!$datosCorrectos) {
    ?>
        <!--Primer formulario: Buscamos cliente a partir de su id-->
        <div class="wrapper">
            <div id="contenido">
                <form method="post" action="">
                    <select type="number" min="1" name="id">
                        <option value="">ID de Cliente</option>
                        <?php
                        $query = $conn->prepare("SELECT * FROM cliente");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            echo '<option value="' . $valores["CLIENTE_ID"] . '">' . $valores["CLIENTE_ID"] . " - " . $valores["nombre"] . '</option>';
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
        <!--Segundo formulario, con botón de actualizar: Cargamos campos de dicho cliente si los datos del primer formulario son correctos-->
        <div class="wrapper">
            <div id="contenido">
                <form method="post" action="">
                    <input type="number" name="codigo" value="<?= $reg['CLIENTE_ID'] ?>" readonly />
                    <input type="text" maxlength="45" placeholder="Nombre" name="nombre" value="<?= $reg['nombre'] ?>" required />
                    <input type="text" maxlength="40" placeholder="Dirección" name="direccion" value="<?= $reg['Direccion'] ?>" required />
                    <input type="text" maxlength="30" placeholder="Ciudad" name="ciudad" value="<?= $reg['Ciudad'] ?>" required />
                    <input type="text" maxlength="2" placeholder="Estado" name="estado" value="<?= $reg['Estado'] ?>" required />
                    <input type="number" placeholder="Codigo Postal" name="codigoPostal" value="<?= $reg['CodigoPostal'] ?>" required />
                    <input type="number" placeholder="Codigo de Area" name="codigoArea" value="<?= $reg['CodigoDeArea'] ?>" required />
                    <input type="number" placeholder="Telefono" name="telefono" value="<?= $reg['Telefono'] ?>" required />
                    <!--Campo seleccionable que carga distintos valores de BBDD-->
                    <select type="text" name="vendedor" required>
                        <?php
                        $query = $conn->prepare("SELECT * FROM empleados");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            if ($valores["empleado_ID"] == $reg['vendedor_ID']) {
                                echo '<option value="' . $valores["empleado_ID"] . '" selected= "selected">' . $valores["Nombre"] . '</option>';
                            } else {
                                echo '<option value="' . $valores["empleado_ID"] . '">' . $valores["Nombre"] . '</option>';
                            }
                        endforeach;
                        ?>
                    </select>
                    <input type="number" placeholder="Limite de Credito" name="limiteCredito" value="<?= $reg['Limite_De_Credito'] ?>" required />
                    <input type="text" placeholder="Comentarios" name="comentarios" value="<?= $reg['Comentarios'] ?>" />
                    <input type="hidden" name="idCliente" value="<?= $reg['CLIENTE_ID'] ?>" />
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