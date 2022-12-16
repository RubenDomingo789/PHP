<html>

<head>
    <title>Formulario Insercción</title>
</head>
<?php
    require "../Config/Conexion.php";
    $datosCorrectos = false;
    $sql = "SELECT * FROM ALUMNOS WHERE codigo = ?";

    if (isset($_REQUEST['codigo'])){
        $stmnt= $conn->prepare($sql);
        $stmnt->bindValue(1, intval($_REQUEST['codigo']));
        $stmnt->execute();
        $reg = $stmnt->fetch(PDO::FETCH_ASSOC);
        if ($reg <= 0){
            echo "El alumn@ a modificar no existe";
            $datosCorrectos = false;
        }
        else {
            $datosCorrectos = true;
        }
    }
?>
<body>
    <h1>Modificar Alumnos</h1>
    <?php
        if(!$datosCorrectos){
    ?>
    <form style="width:30%" method="post">
        <fieldset>
            <legend><b>Código de alumno a modificar</b></legend><br>
            Código de alumno:
            <input type="number" name="codigo" min=0 required /><br><br>
            <input type="submit" name="botonEnviar" value="Enviar" />
        </fieldset>
    </form>
    <?php
        }
        else {
    ?>
    <form style="width:30%" method="post" action="Actualizar.php">
        <fieldset>
            <legend><b>Datos actuales del alumno</b></legend><br>
            Nombre de alumno:
            <input type="text" name="nombre" value="<?= $reg["NOMBRE"]?>"/><br><br>
            Apellidos de alumno:
            <input type="text" name="apellidos" value="<?= $reg["APELLIDOS"]?>"/><br><br>
            Telefono de alumno:
            <input type="number" name="telefono" value="<?= $reg["TELEFONO"]?>"/><br><br>
            Mail de contacto:
            <input type="text" name="correo" value="<?= $reg["CORREO"]?>"/><br><br>
            <input type="hidden" name="codigo" value="<?= $reg["CODIGO"]?>"/><br><br>
            <input type="submit" name="botonEnviar" value="Enviar" />
        </fieldset>
    </form>
    <?php
        }
        $conn = null;
    ?>
</body>

</html>