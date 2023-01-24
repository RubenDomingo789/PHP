<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/proxima-nova-2');

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

        .topnav a {
            margin-left: 20px;
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .topnav a:hover,
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
            margin-top: 13px;
        }
    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <div class="dropdown">
            <a href="Principal.php">Viviendas</a>
        </div>
        <div class="dropdown">
            <a href="../InformesLog/InformeDepartamentos.php">Informe</a>
        </div>
        <p>
            <?php
            $user = $_SESSION['usuario'];
            if (isset($_COOKIE['conexion'])) {
                echo ' Ultima conexion: ' . $_COOKIE['conexion'];
            }
            ?>
        </p>
        <div class="icon1">
            <i class='far fa-user' title= 'Usuario: <?php echo $user ?>' style='font-size:24px'></i>
        </div>
        <div class="icon">
            <a href="Login.php"><i class="fa fa-power-off" style="font-size:24px"></i></a>
        </div>
    </div>
</body>

</html>