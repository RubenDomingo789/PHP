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
            <h1 style="color: white;">BUSCAR VIVIENDA</h1>
            <hr>
            <form method="post" action="index.php">
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

                        <div id="cuadroCheckbox">
                            <label for="tipo_tipo">Nº DORMITORIOS: </label>
                            <div id="checkbox">
                                <?php
                                foreach ($ndormitorios as $row) {
                                ?>
                                    <input type="radio" name="ndormitorios" value="<?php echo $row ?>"/>
                                    <span><?php echo $row ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="flex2">
                        <label for="tipo_tipo">PRECIO: </label>
                        <input type="number" min="1" name="precio" />

                        <label for="tipo_tipo">TAMAÑO: </label>
                        <input type="number" min="1" name="tamano" />

                        <div id="cuadroCheckbox">
                            <label for="tipo_tipo">EXTRAS: </label>
                            <div id="checkbox">
                                <?php
                                foreach ($extras as $row) {
                                ?>
                                    <input type="checkbox" name="extras[]" value="<?php echo $row ?>" />
                                    <span class="checkmark"><?php echo $row ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Buscar" name="botonInsertar" style="margin-left: 37% !important;"/>
                </div>
            </form>
        </div>
    </div>
</body>

</html>