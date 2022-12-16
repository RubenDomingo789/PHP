<html>

<head>
    <title>Ejercicio 1</title>
    <?php
    if (isset($_POST['botonEnviar'])) {
        $lenguaje = $_POST['fav_language'];

        switch ($lenguaje) {
            case  "HTML":
                echo "Has elegido HTML <br>";
                break;

            case  "CSS":
                echo "Has elegido CSS <br>";
                break;

            case  "JavaScript":
                echo "Has elegido JavaScript <br>";
                break;
        }
    }
    ?>
</head>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Ejercicio 1</legend>
            <input type="radio" name="fav_language" value="HTML" checked>HTML<br>
            <input type="radio" name="fav_language" value="CSS">CSS<br>
            <input type="radio" name="fav_language" value="JavaScript">JavaScript<br>
        </fieldset>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
</body>

</html>