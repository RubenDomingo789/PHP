<html>

<head>
    <title>Viviendas</title>
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
            <th>TIPO VIVIENDA</th>
            <th>ZONA</th>
            <th>Nº DORMITORIOS</th>
            <th>TAMAÑO</th>
            <th>PRECIO</th>
            <th>FOTOS</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <?php
        $contArray = 0;
        $contArray2 = 0;
        foreach ($lista_viviendas as $row) {
        ?>
            <tr>
                <td><?php echo $row['tipo'] ?></td>
                <td><?php echo $row['zona'] ?></td>
                <td><?php echo $row['ndormitorios'] ?></td>
                <td><?php echo $row['tamano'] ?></td>
                <td><?php echo $row['precio'] ?></td>
                <?php
                if ($row['nfotos'] > 1) {
                ?>
                    <td>
                        <?php
                        for ($i = 0; $i < $row['nfotos']; $i++) {
                        ?>
                            <a href="Vista/fotos/<?php echo $fotos[$contArray][$contArray2]['foto'] ?>" target="_blank" style="text-decoration: none">Foto <?php echo $i + 1 . '&nbsp&nbsp&nbsp' ?></a>
                        <?php
                            $contArray2++;
                        }
                        $contArray2 = 0;
                        $contArray++ ?>
                    </td>
                    <?php
                }
                if ($row['nfotos'] == 1) {
                    for ($i = 0; $i < $row['nfotos']; $i++) {
                    ?>
                        <td>
                            <a href="Vista/fotos/<?php echo $fotos[$contArray][$contArray2]['foto'] ?>" target="_blank" style="text-decoration: none">Foto <?php echo $i + 1 . '&nbsp&nbsp&nbsp' ?></a>
                        </td>
                    <?php
                        $contArray++;
                    } ?>
                    </td>
                <?php
                }
                ?>
                <?php
                if ($row['nfotos'] == 0) {
                    $contArray++;
                ?>
                    <td></td>
                <?php
                } ?>
                <td>
                    <form method="post" action="index.php">
                        <button class="edit" name="editar" title="Editar"><i class='fas fa-edit' style='font-size:24px'></i></button>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                        <input type="hidden" name="tipo" value="<?php echo $row['tipo'] ?>" />
                        <input type="hidden" name="zona" value="<?php echo $row['zona'] ?>" />
                        <input type="hidden" name="ndormitorios" value="<?php echo $row['ndormitorios'] ?>" />
                        <input type="hidden" name="tamano" value="<?php echo $row['tamano'] ?>" />
                        <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <button class="trash" name="borrar" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                    </form>
                </td>
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