<!DOCTYPE html>
<html>

<head>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Proxima Nova', sans-serif;
            background-color: #916491;
        }

        .topnav {
            overflow: hidden;
            background-color: #542854;
            text-align: center;
        }

        .topnav button {
            margin-left: 20px;
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 19px;
            border: none;
            background-color: #542854;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .topnav button:hover,
        .dropdown:hover .dropbtn {
            background-color: #d147ed;
            color: white;
        }

        p {
            color: white;
            float: right;
            margin-right: 20px;
        }

        div.icon {
            float: right;
            margin-right: 18px;
        }

        div.icon1 {
            float: right;
            margin-right: 18px;
            color: white;
            margin-top: 12px;
        }
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <div class="dropdown">
            <form method='post' action='index.php'>
                <button name="viviendas">Viviendas</button>
            </form>
        </div>
        <div class="dropdown">
            <form method='post' action='index.php'>
                <button name="anuncios">Publicar Anuncio</button>
            </form>
        </div>
        <div class="dropdown">
            <form method='post' action='index.php'>
                <button name="buscar">Buscar Viviendas</button>
            </form>
        </div>
        <?php
        if ($_SESSION['usuario'] == 'admin') {
        ?>
            <div class="dropdown">
                <form method='post' action='index.php'>
                    <button name="users">Usuarios</button>
                </form>
            </div>
        <?php
        }
        ?>
        <p>
            <?php
            $user = $_SESSION['usuario'];
            if (isset($_COOKIE['conexion'])) {
                echo ' Ultima conexion: ' . $_COOKIE['conexion'];
            }
            ?>
        </p>
        <div class="icon1">
            <i class='far fa-user' title='Usuario: <?php echo $user ?>' style='font-size:24px'></i>
        </div>
        <div class="icon">
            <form method='post' action='index.php'>
                <button name="salir"><i class="fa fa-power-off" style="font-size:24px"></i></button>
            </form>
        </div>
    </div>
</body>

</html>