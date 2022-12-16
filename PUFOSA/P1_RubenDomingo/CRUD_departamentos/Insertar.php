<!DOCTYPE html>
<html>

<head>
    <title>Insertar</title>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        input[type="text"],
        input[type="number"] {
            width: 85% !important;
        }

        select[type= "text"] {
            width: 95% !important;
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
            $stmnt = $conn->query("SELECT COUNT(*) AS 'cantidad' FROM departamento WHERE departamento_ID= '" . $_POST['id'] . "';");
            $num = $stmnt->fetch();
            if ($num['cantidad'] > 0) {
                $msg = 'Este ID ya ha sido dado de alta';
            } else {
                $stmnt = $conn->prepare("INSERT INTO departamento VALUES (?, ?, ?)");
                $stmnt->bindParam(1, $_POST['id']);
                $stmnt->bindParam(2, $_POST['nombre']);
                $stmnt->bindParam(3, $_POST['idUbicacion']);
                $stmnt->execute();
                fwrite($archivo, "OPERACION: INSERT DEPARTAMENTO - EMPLEADO: " . $_SESSION['login'] . " - FECHA: " . date("Y-m-d H:i:s") . "\r\n");
                $msg = 'La fila ha sido insertada';
            }
        }
    } catch (Exception $e) {
        $msg = 'Algun campo introducido es incorrecto';
    }
    ?>
    <div class="wrapper">
        <div id="contenido">
            <form method="post" action="">
                <input type="number" min=1 placeholder="ID Departamento" name="id" required/>
                <input type="text" maxlength="20" placeholder="Nombre" name="nombre" required/>
                <select type="text" name="idUbicacion" required>
                    <option value="">Ubicación:</option>
                    <?php
                    $query = $conn->prepare("SELECT * FROM ubicacion");
                    $query->execute();
                    $data = $query->fetchAll();

                    foreach ($data as $valores) :
                        echo '<option value="' . $valores["Ubicacion_ID"] . '">' . $valores["GrupoRegional"] . '</option>';
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