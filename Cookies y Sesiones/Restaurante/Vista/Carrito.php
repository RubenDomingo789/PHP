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

<body>
    <div>
        <h2>CARRITO</h2>
        <hr>
        <br>
        <table>
            <?php
            print_r($products);
            $cont = 1;
            $precio = 0;

            foreach ($_SESSION['carrito'] as $key => $value) {
            ?>
                <tr>
                    <?php if (isset($_COOKIE[$value['id']])) { ?>
                        <td><?php echo $_COOKIE[$value['id']] ?></td>
                    <?php $precio += $value['precio'] * $_COOKIE[$value['id']];
                    } ?>
                    <td><?php echo $value['nombre'] ?></td>
                    <td><?php echo $value['precio'] ?></td>
                    <td>
                        <form method="post" action="">
                            <button class="trash" name="borrar" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" />
                        </form>
                    </td>
                </tr>
            <?php
            } ?>
        </table>
        <hr>
        <?php if (isset($_COOKIE[$value['id']])) { ?>
            <p>Precio final: <?php echo $precio ?></p>
        <?php } ?>
    </div>
</body>

</html>