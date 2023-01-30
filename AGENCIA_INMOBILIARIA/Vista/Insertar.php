<!DOCTYPE html>
<html>

<head>
    <title>Anuncio</title>
    <?php
    include('Menu.php');
    include_once('Estilos/Styles.php');
    ?>
</head>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">NUEVO ANUNCIO</h1>
            <hr>
            <br>
            <form method="post" action="index2.php">
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
                <label for="tipo_tipo">PRECIO: </label>
                <input type="number" min="1" name="precio" required />
                <label for="tipo_tipo">TAMAÑO: </label>
                <input type="number" min="1" name="tamano" required />
                <label for="tipo_tipo">EXTRAS: </label>
                <select type="number" name="extras">
                    <?php
                    foreach ($extras as $row) {
                    ?>
                        <option value="<?= $row ?>"><?= $row ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="id" />
                <input type="hidden" name="editar" />
                <input type="submit" value="Editar" name="botonEditar" />
                <input type="submit" value="Volver" name="botonVolver" />
            </form>
        </div>
    </div>
</body>

</html>