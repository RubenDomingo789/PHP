<html>

<head>
    <title>Limites</title>
</head>

<body>
    <form method="post" action="jugada.php">
        <label for="numero"> Establecer limites para adivinar el número </label><br>
        <input type="number" name="limite1" min="0" required /></input><br>
        <input type="number" name="limite2" min="1" required /></input><br>
        <!--Condicional php reducido -->
        <p><?= $_GET['msg'] ?? "" ?></p>
        <input type="submit" name="botonEnviar" value="Enviar" />
    </form>
</body>

</html>