<!DOCTYPE html>
<html>

<head>
    <title>InsertUsuario</title>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    }
    include_once('Estilos/Styles2.php');
    include_once('Menu.php');
    ?>
</head>
<script>
    <?php if ($result != "") {
    ?>alert("<?= $result ?>")
    <?php
    } ?>
</script>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">NUEVO USUARIO</h1>
            <hr>
            <form method="post" action="index.php">
                <div id="campos" style="margin-left: 30px !important;">
                    <label for="tipo_tipo">ID USUARIO: </label>
                    <input type="text" name="id_usuario" required style="width: 83% !important;" value="<?php if (isset($_POST['botonInsertar'])) { echo $_POST['id_usuario'];} ?>" />

                    <label for="tipo_tipo">NUEVA CONTRASEÑA: </label>
                    <input type="text" name="pass" style="width: 83% !important;background-color:darkgrey;border:darkgray" readonly value="<?php if (isset($_POST['botonInsertar'])) {echo $password;} ?>" />

                    <input type="hidden" name="users" value="<?php echo $_POST['users'] ?>" />
                    <input type="hidden" name="insertar" value="<?php echo $_POST['insertar'] ?>" />
                    <input type="submit" value="Insertar" name="botonInsertar" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>