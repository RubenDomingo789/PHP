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
<script>
    <?php if ($result != "") {
    ?>alert("<?= $result ?>")
    <?php
    } ?>
</script>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">BUSCAR VIVIENDA</h1>
            <hr>
            <form method="post" action="index.php">
                <div id="campos">
                    <div id="flex">
                        <label for="tipo_tipo">TIPO DE VIVIENDA: </label>
                        <select type="text" name="tipo">
                            <option value="" default></option>
                            <?php
                            foreach ($tipos_vivienda as $row) {
                            ?>
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php } ?>
                        </select>

                        <label for="tipo_tipo" style="margin-top: 30px !important;">ZONA: </label>
                        <select type="text" name="zona">
                            <option value="" default></option>
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
                            <div id="checkbox" style="margin-top: 6px !important;">
                                <?php
                                foreach ($ndormitorios as $row) {
                                ?>
                                    <input type="radio" name="ndormitorios" value="<?php echo $row ?>" />
                                    <span><?php echo $row ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="flex2">
                        <label for="tipo_tipo">PRECIO (€): </label>
                        <select type="text" name="precio">
                            <option value="" default></option>
                            <option value="< 100000">&lt 100000</option>
                            <option value="BETWEEN 100000 AND 200000">100000 - 200000</option>
                            <option value="BETWEEN 200000 AND 300000">200000 - 300000</option>
                            <option value="> 300000">&gt 300000</option>

                        </select>

                        <label for="tipo_tipo">TAMAÑO (m<sup>2</sup>): </label>
                        <select type="text" name="tamano">
                            <option value="" default></option>
                            <option value="< 100">&lt 100</option>
                            <option value="BETWEEN 100 AND 150">100 - 150</option>
                            <option value="BETWEEN 150 AND 200">150 - 200</option>
                            <option value="> 200">&gt 200</option>
                        </select>

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
                    <input type="hidden" name="buscar" value="<?php echo $_POST['buscar'] ?>" />
                    <input type="submit" value="Buscar" name="botonBuscar" style="margin-left: 37% !important;" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>