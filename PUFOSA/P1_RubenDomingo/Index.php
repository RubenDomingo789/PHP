<html>

<head>
    <?php
    session_start();
    ?>
    <style scoped>
        body {
            background-color: #39ace7;
        }

        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
        }

        #contenido {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #332966;
            padding: 50px;
            width: 100%;
            max-width: 500px;
            position: relative;
            padding: 40px;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        input[type="submit"] {
            background-color: #ffe766;
            border: none;
            color: #0d0d0d;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin-top: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #fff12e;
        }

        input[type="number"] {
            background-color: white;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 25px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type="number"]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type="number"]:placeholder {
            color: #cccccc;
        }

        input[type="password"] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type="password"]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type="password"]:placeholder {
            color: #cccccc;
        }

        .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }

            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }

            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fadeIn {
            opacity: 0;
            -webkit-animation: fadeIn ease-in 1;
            -moz-animation: fadeIn ease-in 1;
            animation: fadeIn ease-in 1;

            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;

            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
        }

        .fadeIn.first {
            -webkit-animation-delay: 0.4s;
            -moz-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }

        .fadeIn.second {
            -webkit-animation-delay: 0.6s;
            -moz-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .fadeIn.third {
            -webkit-animation-delay: 0.8s;
            -moz-animation-delay: 0.8s;
            animation-delay: 0.8s;
        }

        .fadeIn.fourth {
            -webkit-animation-delay: 1s;
            -moz-animation-delay: 1s;
            animation-delay: 1s;
        }

        #icon {
            width: 30%;
        }
    </style>
</head>

<body>
    <?php
    require 'Configuracion/Password.php';
    require 'Configuracion/Conexion.php';

    //Validación formulario de login a partir de ID de usuario y contraseña y creación de array SESSION
    if (isset($_POST['botonEnviar'])) {
        $empleado_ID = $_POST['empleado'];
        $contraseña = $_POST['contraseña'];
        $_SESSION['login'] = $empleado_ID;

        //Comprobamos si el usuario existe en la BBDD
        $query = $conn->prepare("SELECT * FROM empleados WHERE empleado_ID= ?");
        $query->bindParam(1, $empleado_ID);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result <= 0) {
            $msg = "El ID del usuario introducido no existe";
        } else {
            //Comprobamos si la contraseña coincide con la establecida en los parametros de configuración
            if (!password_verify($contraseña, $password_hash)) {
                $msg = "La contraseña introducida es incorrecta";
            } else {
                //Creacion fichero log
                echo "<script>window.location='CRUD_clientes/Mostrar.php'</script>";
            }
        }
    }
    ?>
    <div class="wrapper fadeInDown">
        <div id="contenido">

            <!-- Icono -->
            <div class="fadeIn first">
                <img src="Configuracion/PUFOSA.png" id="icon" alt="User Icon" />
            </div>

            <!-- Formulario -->
            <form method="post" action="">
                <input type="number" min=7000 class="fadeIn second" placeholder="ID de empleado" name="empleado" required />
                <input type="password" class="fadeIn third" placeholder="Contraseña" name="contraseña" required />
                <input type="submit" class="fadeIn fourth" value="Entrar" name="botonEnviar" /></br></br>
                <p style="color:white"><?= $msg ?? "" ?></p>
            </form>
        </div>
    </div>
</body>

</html>