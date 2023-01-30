<!DOCTYPE html>
<html>

<head>
    <title>Actualizar</title>
    <?php
    include('Menu.php');
    include_once('Estilos/Styles.php');
    ?>
</head>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">EDITAR VIVIENDA</h1>
            <hr>
            <br>
            <?php
            print_r($element3)
            ?>
            <form method="post" action="index2.php">
                <label for="tipo_tipo">TIPO DE VIVIENDA: </label>
                <select type="text" name="tipo" required>
                    <?php
                    foreach ($tipos_vivienda as $row) :
                        if ($row == $_POST['tipo']) {
                    ?>
                            <option value="<?= $row ?>" selected="selected"><?= $row ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                </select>
                <label for="tipo_tipo">ZONA: </label>
                <select type="text" name="zona" required>
                    <?php
                    foreach ($zonas_vivienda as $row) :
                        if ($row == $_POST['zona']) {
                    ?>
                            <option value="<?= $row ?>" selected="selected"><?= $row ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                </select>
                <label for="tipo_tipo">Nº DORMITORIOS: </label>
                <select type="number" name="ndormitorios" required>
                    <?php
                    foreach ($ndormitorios as $row) :
                        if ($row == $_POST['ndormitorios']) {
                    ?>
                            <option value="<?= $row ?>" selected="selected"><?= $row ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                </select>
                <label for="tipo_tipo"> PRECIO: </label>
                <input type="number" min="1" placeholder="Precio" name="precio" value="<?= $_POST['precio'] ?>" required/>
                <label for="tipo_tipo"> TAMAÑO: </label>
                <input type="number" min="1" placeholder="Tamaño" name="tamano" value="<?= $_POST['tamano'] ?>" required/>
                <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>" />
                <input type="hidden" name="editar" value="<?php echo $_POST['editar'] ?>" />
                <input type="submit" value="Editar" name="botonEditar" />
                <input type="submit" value="Volver" name="botonVolver" />
            </form>
        </div>
    </div>
</body>

</html>