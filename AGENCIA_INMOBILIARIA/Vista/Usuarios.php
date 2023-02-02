<html>

<head>
    <title>Usuarios</title>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    }
    include('Menu.php');
    include_once('Estilos/Styles.php');
    ?>
</head>
<script>
    <?php if ($result != "") {
    ?>alert("<?= $result ?>")
    <?php
    } ?>
</script>

<body>
    <br>
    <br>
    <table>
        <tr>
            <th>ID USUARIO</th>
            <th>ACCIONES</th>
        </tr>
        <?php
        foreach ($lista_usuarios as $row) {
        ?>
            <tr>
                <td><?php echo $row['id_usuario'] ?></td>
                <?php if ($row['id_usuario'] != 'admin') { ?>
                    <td>
                        <form method="post" action="index.php">
                            <button class="trash" name="borrar" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                            <input type="hidden" name="id" value="<?php echo $row['id_usuario'] ?>" />
                        </form>
                    </td>
                <?php } else { ?>
                    <td>
                        <form method="post" action="index.php">
                            <button class="insert" name="insertar" title="Insertar"><i class='fas fa-plus' style='font-size:24px'></i></button>
                            <input type="hidden" name="users" value="<?php echo $_POST['users'] ?>" />
                        </form>      
                    </td>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <?php
    include('Paginacion.php');
    ?>
</body>

</html>