<html>

<head>
    <title>Viviendas</title>
    <?php
    ?>
    <style>
        table {
            background-color: white;
            text-align: center;
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            margin-top: 30px;
            font-size: 18px;
        }

        th,
        td {
            padding: 20px;
        }

        th {
            background-color: #542854;
            border-bottom: solid 5px #0F362D;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ed8ced;
        }

        tr:nth-child(odd) {
            background-color: white;
        }

        tr:hover td {
            background-color: #d147ed;
            color: white;
        }

        button.edit {
            background-color: #008CBA;
            border-radius: 5px;
            width: 50px;
            height: 50px;
        }

        button.trash {
            background-color: #f44336;
            border-radius: 5px;
            width: 50px;
            height: 50px;
        }

        .alert {
            position: absolute;
            margin-top: 20px;
            background-color: darkmagenta;
            left: 380px;
            padding: 10px;
        }
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<script>
    <?php if ($result != "") {
    ?>alert("<?= $result ?>")
    <?php
    } ?>
</script>

<body>
    <?php
    include('Menu.php');
    ?>
    <br>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>TIPO VIVIENDA</th>
            <th>ZONA</th>
            <th>Nº DORMITORIOS</th>
            <th>TAMAÑO</th>
            <th>PRECIO</th>
            <th>FOTOS</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <?php
        foreach ($lista_viviendas as $row) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
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
                            <a href="Vista/fotos/<?php echo strtolower($row['tipo']) . $i + 1 . ".jpg" ?>" target="_blank" style="text-decoration: none">Foto <?php echo $i + 1 . '&nbsp&nbsp&nbsp' ?></a>
                        <?php
                        } ?>
                    </td>
                    <?php
                }
                if ($row['nfotos'] == 1) {
                    for ($i = 0; $i < $row['nfotos']; $i++) {
                    ?>
                        <td>
                            <a href="Vista/fotos/<?php echo strtolower($row['tipo']) . $i + 1 . ".jpg" ?>" target="_blank" style="text-decoration: none">Foto <?php echo $i + 1 . '&nbsp&nbsp&nbsp' ?></a>
                        </td>
                    <?php
                    } ?>
                    </td>
                <?php
                }
                ?>
                <?php
                if ($row['nfotos'] == 0) {
                ?>
                    <td></td>
                <?php
                } ?>
                <td>
                    <form method="post" action="index2.php">
                        <button class="edit" name="editar"><i class='fas fa-edit' style='font-size:24px'></i></button>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index2.php">
                        <button class="trash" name="borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
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