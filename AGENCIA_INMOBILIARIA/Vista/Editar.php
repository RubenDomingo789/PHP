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
            <form method="post" action="index2.php">
                <label for="tipo_tipo">TIPO DE VIVIENDA: </label>
                <select type="text" name="tipo" required>
                    <?php
                    foreach ($tipos_vivienda as $row) :
                        if ($row["tipo"] == $_POST['tipo']) {
                    ?>
                            <option value="<?= $row["tipo"] ?>" selected="selected"><?= $row["tipo"] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row["tipo"] ?>"><?= $row["tipo"] ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                </select>
                <label for="tipo_tipo">ZONA: </label>
                <select type="text" name="zona" required>
                    <?php
                    foreach ($zonas_vivienda as $row) :
                        if ($row["zona"] == $_POST['zona']) {
                    ?>
                            <option value="<?= $row["zona"] ?>" selected="selected"><?= $row["zona"] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row["zona"] ?>"><?= $row["zona"] ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                </select>
                <label for="tipo_tipo">Nº DORMITORIOS: </label>
                <input type="number" min="1" max="5" step="1" placeholder="Nº dormitorios" name="ndormitorios" value="<?= $_POST['ndormitorios'] ?>" required/>
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