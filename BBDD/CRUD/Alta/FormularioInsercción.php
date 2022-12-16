<html>

<head>
    <title>Formulario Insercción</title>
</head>

<body>
    <h1>Alta Alumnos</h1>
    <form style="width:30%" method="post" action="Insertar.php">
        <fieldset>
            <legend><b>Datos del alumno</b></legend><br>
            Nombre de alumno:
            <input type="text" name="nombre" required /><br><br>
            Apellidos de alumno:
            <input type="text" name="apellidos" required /><br><br>
            Telefono de alumno:
            <input type="number" name="telefono" required /><br><br>
            Mail de contacto:
            <input type="text" name="correo" required /><br><br>
            <input type="submit" name="botonEnviar" value="Enviar" />
        </fieldset>
    </form>
</body>

</html>