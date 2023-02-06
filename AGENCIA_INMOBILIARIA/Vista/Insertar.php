<!DOCTYPE html>
<html>

<head>
    <title>Anuncio</title>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    }
    include_once('Estilos/Styles2.php');
    include_once('Menu.php');
    ?>
</head>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">NUEVO ANUNCIO</h1>
            <hr>
            <form method="post" action="index.php" enctype="multipart/form-data">
                <div id="campos">
                    <div id="flex">
                        <label for="tipo_tipo">TIPO DE VIVIENDA: </label>
                        <select type="text" name="tipo" required>
                            <?php
                            foreach ($tipos_vivienda as $row) {
                            ?>
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php } ?>
                        </select>

                        <label for="tipo_tipo">ZONA: </label>
                        <select type="text" name="zona" required>
                            <?php
                            foreach ($zonas_vivienda as $row) {
                            ?>
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <label for="tipo_tipo">DIRECCIÓN: </label>
                        <input type="text" name="direccion" required />

                        <label for="tipo_tipo">Nº DORMITORIOS: </label>
                        <select type="number" name="ndormitorios" required>
                            <?php
                            foreach ($ndormitorios as $row) {
                            ?>
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <label for="tipo_tipo">FOTO: </label>
                        <input type="file" name="foto" accept="image/*"/>
                    </div>
                    <div id="flex2">
                        <label for="tipo_tipo">PRECIO (€): </label>
                        <input type="number" min="1" name="precio" required />

                        <label for="tipo_tipo">TAMAÑO (m<sup>2</sup>): </label>
                        <input type="number" min="1" name="tamano" required />

                        <label for="tipo_tipo">FECHA DE ANUNCIO: </label>
                        <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>" disabled />

                        <div id="cuadroCheckbox">
                            <label for="tipo_tipo">EXTRAS: </label>
                            <div id="checkbox">
                                <?php
                                foreach ($extras as $row) {
                                ?>
                                    <input type="checkbox" name="extras[]" value="<?php echo $row ?>"/>
                                    <span class="checkmark"><?php echo $row ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <label for="tipo_tipo" style="margin-left: 55px !important">OBSERVACIONES: </label>
                    <textarea type="text" name="observaciones"></textarea>

                    <input type="hidden" name="anuncios" value="<?php echo $_POST['anuncios'] ?>" />
                    <input type="submit" value="Insertar" name="botonInsertar" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>