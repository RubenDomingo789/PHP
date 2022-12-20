<html>

<head>
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
        if (isset($_COOKIE['nombre'])) {
            header("location: Ejercicio1.2.php");
        }
    ?>
    <form method="post" action="Ejercicio1.2.php">
        <label for="color"> Color prferido </label></br>
        <input type="radio" name="color" value="lightblue" checked>Azul</input>
        <input type="radio" name="color" value="red">Rojo</input>
        <input type="radio" name="color" value="lightgreen">Verde</input></p>

        <label for="letra"> Color letra </label></br>
        <input type="radio" name="letra" value="darkblue" checked>Azul</input>
        <input type="radio" name="letra" value="red">Rojo</input>
        <input type="radio" name="letra" value="lightgreen">Verde</input></p>

        <label for="font"> Tipografía </label></br>
        <input type="radio" name="font" value="Arial" checked>Arial</input>
        <input type="radio" name="font" value="Calibri">Calibri</input>
        <input type="radio" name="font" value="Verdana">Verdana</input></p>

        <label for="nombre"> Nombre </label>
        <input type="text" name="nombre" required></input></p>


        <label for="apellidos"> Apellidos </label>
        <input type="text" name="apellidos" required></input></p>

        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
</body>

</html>
