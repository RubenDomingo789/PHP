<html>

<head>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    }
    include('Menu.php');
    include_once('Estilos/Styles.php');
    ?>
</head>

<body>
    <br>
    <br>
    <table>
        <tr>
            <th colspan="6" style="font-size: 28px; border:none; padding-bottom: 0px;">VIVIENDAS FILTRADAS: </th>
        </tr>
        <tr>
            <th colspan="6" style="font-size: 24px; border:none; padding-bottom: 5px; padding-top: 5px">
                <hr>
            </th>
        </tr>
        <tr>
            <th>TIPO VIVIENDA</th>
            <th>ZONA</th>
            <th>Nº DORMITORIOS</th>
            <th>TAMAÑO</th>
            <th>PRECIO</th>
            <th>FOTOS</th>
        </tr>
        <?php
        $contArray = 0;
        $contArray2 = 0;
        foreach ($viviendas_filtradas as $row) {
        ?>
            <tr>
                <td><?php echo $row['tipo'] ?></td>
                <td><?php echo $row['zona'] ?></td>
                <td><?php echo $row['ndormitorios'] ?></td>
                <td><?php echo $row['tamano'] ?> m<sup>2</sup></td>
                <td><?php echo $row['precio'] ?> €</td>

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
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <form method="post" action="index.php">
        <input type="hidden" name="buscar" value="<?php echo $_POST['buscar']; ?>">
        <input type="submit" value="Volver" name="botonVolver" style="position: relative; left: 39.5%; margin-bottom: 20px"/>
    </form>
</body>

</html>