<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
    require "identificador.php";

    //Clase alumno
    class Alumno
    {
        private $codigo;
        private $nombre;
        private $apellidos;
        private $telefono;
        private $correo;

        function __construct($nombre, $apellidos, $telefono, $correo)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->telefono = $telefono;
            $this->correo = $correo;
        }

        function get_codigo()
        {
            return $this->codigo;
        }

        function set_codigo($codigo)
        {
            $this->codigo = $codigo;
        }

        function get_nombre()
        {
            return $this->nombre;
        }

        function set_nombre($nombre)
        {
            $this->nombre = $nombre;
        }

        function get_apellidos()
        {
            return $this->apellidos;
        }

        function set_apellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }

        function get_telefono()
        {
            return $this->telefono;
        }

        function set_telefono($telefono)
        {
            $this->telefono = $telefono;
        }

        function get_correo()
        {
            return $this->correo;
        }

        function set_correo($correo)
        {
            $this->correo = $correo;
        }

        function comprobarCorreo($email)
        {
            if (str_contains($email, "@") == true && str_contains($email, ".") == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    //Fichero log
    $archivo = fopen("log.txt", "a+");
    if ($archivo == false) {
        echo "Error en la creación del fichero";
    }

    try {
        if (isset($_POST['botonEnviar'])) {
            //Instanciamos objeto alumno con valores del formulario
            $alumno = new Alumno($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo']);
            $lastUser = $fila['cantidad'];
            $alumno->set_codigo($lastUser+1);

            print_r($alumno);
            $codigo = $alumno->get_codigo();
            $nombre = $alumno->get_nombre();
            $apellido = $alumno->get_apellidos();
            $telefono = $alumno->get_telefono();
            $correo = $alumno->get_correo();

            //ComprobarCorreo
            if ($alumno->comprobarCorreo($correo) == true) {
                $sql = "INSERT INTO ALUMNOS VALUES (?, ?, ?, ?, ?)";
                $stmnt = $conn->prepare($sql);
                $stmnt->bindParam(1, $codigo);
                $stmnt->bindParam(2, $nombre);
                $stmnt->bindParam(3, $apellido);
                $stmnt->bindParam(4, $telefono);
                $stmnt->bindParam(5, $correo);

                if ($stmnt->execute()) {
                    fwrite($archivo, $sql . "\r\n");
                    $msg = "Registro insertado correctamente";
                };
            } else {
                $msg = "El correo introducido debe contener una @ y un .";
                $_POST['intentos']++;
                
                //Comprobamos los 3 intentos
                if ($_POST['intentos'] == 3){
                    header("location:error.php");
                }
            }
        }
    } catch (Exception $e) {
        $msg = 'La fila no ha sido insertada<br>' . $e;
    }
    ?>
    <form method="post" action="">
        <input type="text" placeholder="Nombre" name="nombre" required/><br>
        <input type="text" placeholder="Apellido" name="apellido" required/><br>
        <input type="number" placeholder="Telefono" name="telefono" required/><br>
        <input type="text" placeholder="Correo" name="correo" required/><br>
        <input type="hidden" name= "intentos" value="<?php echo $_POST['intentos'] ?? 0 ?>" /> 
        <p><?php echo $msg ?? "" ?></p>
        <input type="submit" value="Entrar" name="botonEnviar" /><br>
    </form>
</body>

</html>