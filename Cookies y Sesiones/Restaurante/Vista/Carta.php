<html>

<head>
    <title>Menu</title>
</head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
    body {
        background: #FFF;
        text-align: center;
    }

    div {
        background-color: darkkhaki;
        width: 45%;
        border-radius: 20px;
        border: 2px solid #73AD21;
        padding: 20px;
        padding-top: 0px;
    }

    h2 {
        color: darkorange;
        font-size: 250%;
        text-align: center
    }

    dl {
        width: 100%;
        overflow: auto;
        margin: 0 0 1em;
    }

    input {
        float: left;
        width: 20px;
        height: 20px;
    }

    input[type='submit'] {
        width: 100px;
        height: 30px;
        margin-left: 40%;
    }

    dt,
    dd.price {
        font-size: 130%;
        font-weight: bold
    }

    dt {
        float: left;
        padding-left: 5px;
        padding-right: 3px;
        color: #F70000
    }

    dd {
        margin: 0
    }

    dd.price {
        float: right;
        padding-left: 3px;
        color: black
    }

    dd.ingredients {
        float: left;
        width: 100%;
        padding: 3px 0;
        font: italic 100% Georgia, Times, sans-serif;
        color: #555
    }

    hr {
        border: 1px solid black;
    }

    table,
    td {
        padding: 10px;
    }

    #contenedor {
        display: flex;
        flex-direction: row;
        width: 800px;
        column-gap: 50px;
    }
</style>
<?php

?>

<body>
    <div id='contenedor'>
        <div>
            <h2>RESTAURANTE</h2>
            <form method='post' action='index.php'>
                <button name="salir"><i class="fa fa-power-off"></i></button>
            </form>
            <hr>
            <br>
            <table>
                <form method="post" action="">
                    <?php
                    foreach ($lista_platos as $platos => $valor) {
                        $plato = implode(',', $valor);
                    ?>
                        <tr>
                            <td><input type='checkbox' name=carrito[] value='<?php echo $plato ?>'><?php echo $valor['nombre'] ?></input></td>
                            <td><?php echo $valor['categoria'] ?></td>
                            <td><?php echo $valor['precio'] ?>€</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td><input type="submit" name="boton" value="Enviar" /></td>
                    </tr>
                </form>
            </table>
        </div>
        <div>
            <h2>CARRITO</h2>
            <hr>
            <br>
            <table>
                <?php
                $cont = 1;
                $precio = 0;

                if (isset($_POST['boton']) && isset($_POST['carrito'])) {
                    for ($i = 0; $i < count($_POST['carrito']); $i++) {
                        $linea = explode(',', $_POST['carrito'][$i]);
                        $_SESSION['carrito'][] = $linea;
                    }

                    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                        print_r($_SESSION['carrito'][$i]);
                ?>
                        <tr>
                            <td><?php echo $_SESSION['carrito'][$i][1] ?></td>
                            <td><?php echo $_SESSION['carrito'][$i][2] ?></td>
                            <td>
                                <form method="post" action="">
                                    <button class="trash" name="borrar" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                                    
                                </form>
                            </td>
                        </tr>
                    <?php
                        if (isset($_POST['borrar'])) {
                            unset($_SESSION['carrito'][$i]);
                            $precio -= floatval($_SESSION['carrito'][$i][2]);
                        }
                        $precio += floatval($_SESSION['carrito'][$i][2]);
                    }
                    ?>
            </table>
            <hr>
            <p>Precio final: <?php echo $precio ?></p>
        <?php
                }
        ?>
        </div>

    </div>
</body>

</html>