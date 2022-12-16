<!DOCTYPE html>
<html>

<head>
    <title>Insertar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        select[type="text"] {
            width: 45% !important;
        }
        input[name = "id"]{
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
            $stmnt = $conn->query("SELECT COUNT(*) AS 'cantidad' FROM empleados WHERE empleado_ID= '" . $_POST['id'] . "';");
            $num = $stmnt->fetch();
            if ($num['cantidad'] > 0) {
                $msg = 'Este ID ya ha sido dado de alta';
            } else {
                $stmnt = $conn->prepare("INSERT INTO empleados (empleado_ID, Nombre, Apellido, Inicial_del_segundo_apellido, Salario, Comision, Fecha_contrato, Jefe_ID, Departamento_ID, Trabajo_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmnt->bindParam(1, $_POST['id']);
                $stmnt->bindParam(2, $_POST['nombre']);
                $stmnt->bindParam(3, $_POST['apellido']);
                $stmnt->bindParam(4, $_POST['inicialApe']);
                $stmnt->bindParam(5, $_POST['salario']);
                $stmnt->bindParam(6, $_POST['comision']);
                $stmnt->bindParam(7, $_POST['fechaContrato']);
                $stmnt->bindParam(8, $_POST['jefe']);
                $stmnt->bindParam(9, $_POST['departamento']);
                $stmnt->bindParam(10, $_POST['trabajo']);
                $stmnt->execute();
                fwrite($archivo, "OPERACION: INSERT EMPLEADO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = 'La fila ha sido insertada';
            }
        }
    } catch (Exception $e) {
        echo $e;
    }
    ?>
    <div class="wrapper">
        <div id="contenido">
            <form method="post" action="">
                <input type="number" name="id" min=1 placeholder="ID Departamento" required />
                <input type="text" maxlength="15" placeholder="Nombre" name="nombre" required/>
                <input type="text" maxlength="15" placeholder="Apellido" name="apellido" required/>
                <input type="text" maxlength="1" placeholder="Inicial 2º Apellido" name="inicialApe" required/>
                <input type="number" min="0.00" placeholder="Salario" name="salario" required />
                <input type="number" min="0.00" placeholder="Comisión" name="comision" required />
                <input placeholder="Fecha Contrato" type="text" onfocus="(this.type = 'date')" name="fechaContrato" required />
                <select type="text" name="jefe" required>
                    <option value="">Jefe:</option>
                    <?php
                    $query = $conn->prepare("SELECT * FROM empleados");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["empleado_ID"] . '">' . $valores["Nombre"] . '</option>';
                    endforeach;
                    ?>
                </select>
                <select type="text" name="departamento" required>
                    <option value="">Departamento:</option>
                    <?php
                    $query = $conn->prepare("SELECT departamento.*, ubicacion.GrupoRegional FROM departamento
                    INNER JOIN ubicacion ON ubicacion.Ubicacion_ID = departamento.Ubicacion_ID;");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["departamento_ID"] . '">' . $valores["Nombre"] . " - " . $valores["GrupoRegional"] .'</option>';
                    endforeach;
                    ?>
                </select>
                <select type="text" name="trabajo" required>
                    <option value="">Trabajo:</option>
                    <?php
                    $query = $conn->prepare("SELECT * FROM trabajos");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["Trabajo_ID"] . '">' . $valores["Funcion"] . '</option>';
                    endforeach;
                    ?>
                </select>
                <input type="submit" value="Crear" name="botonEnviar" />
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>