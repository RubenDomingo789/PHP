<!DOCTYPE html>
<html>

<head>
    <title>Anuncio</title>
    <?php
    include_once('Menu.php');
    ?>
    <style>
        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100%;
        }

        #contenido {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #542854;
            width: 100%;
            max-width: 900px;
            height: 100%;
            position: relative;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 40px;
            padding: 20PX;
        }

        #campos {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        #flex,
        #flex2 {
            width: 45%;
            height: 100%;
            text-align: left;
            margin-left: 30px;
        }

        input[type="submit"] {
            background-color: #ed8ced;
            border: none;
            color: #0d0d0d;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin-top: 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            margin-left: 17% !important;
        }

        input[type="submit"]:hover {
            background-color: #d147ed;
        }

        input[type="text"],
        input[type="number"],
        select[type="text"],
        select[type="number"],
        input[type="date"] {
            background-color: white;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            width: 75%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin-right: 20px !important;
        }

        #cuadroCheckbox {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }

        #checkbox {
            display: flex;
            flex-direction: row;
            column-gap: 5px;
            padding: 10px;
            margin-left: 10px !important;
            column-gap: 10px;
        }

        input[type="checkbox"] {
            width: 28px;
            height: 28px;
        }

        .checkmark {
            color: white;
            font-size: 20px;
            margin-top: 5px;
        }

        select[type="text"],
        select[type="number"] {
            width: 92% !important;
        }

        textarea[name='observaciones'] {
            background-color: white;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            width: 84%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin-right: 20px !important;
            margin-left: 30px !important;
            height: 40px !important;
        }

        label {
            color: white;
            font-size: 20px;
            margin-top: 24px;
            margin-left: 30px;
            float: left;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div id="contenido">
            <h1 style="color: white;">NUEVO ANUNCIO</h1>
            <hr>
            <div id="campos">
                <div id="flex">
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
                    </form>
                </div>
                <div id="flex2">
                    <label for="tipo_tipo">PRECIO: </label>
                    <input type="number" min="1" name="precio" required />

                    <label for="tipo_tipo">TAMAÑO: </label>
                    <input type="number" min="1" name="tamano" required />

                    <label for="tipo_tipo">FECHA DE ANUNCIO: </label>
                    <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>" disabled />

                    <div id="cuadroCheckbox">
                        <label for="tipo_tipo">EXTRAS: </label>
                        <div id="checkbox">
                            <?php
                            foreach ($extras as $row) {
                            ?>
                                <input type="checkbox" name="extras" value="<?php echo $row ?>" />
                                <span class="checkmark"><?php echo $row ?></span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <label for="tipo_tipo" style="margin-left: 55px !important">OBSERVACIONES: </label>
                <textarea type="text" name="observaciones"></textarea>

                <input type="submit" value="Insertar" name="botonInsertar" />
                <input type="submit" value="Volver" name="botonVolver" />
            </div>
        </div>
    </div>
</body>

</html>