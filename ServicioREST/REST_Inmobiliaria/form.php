<html>

<head>
    <title>Formulario Zona</title>
</head>

<body>
    <form method="post" action="">
        <select name="zona">
            <option value="Centro">Centro</option>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
        </select>

        <p><input type="submit" name="botonEnviar" value="Enviar datos" /></p>
    </form>
</body>

</html>

<?php
if (isset($_POST['zona'])){
    header('location:operaciones.php?zona='. $_POST['zona']);
}
?>