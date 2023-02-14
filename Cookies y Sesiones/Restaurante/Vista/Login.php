<html>

<head>
    <title>Login</title>
</head>

<body>
    <form method="post" action="Index.php">
        <input type="text" placeholder="Nombre" name="usuario" required /><br>
        <input type="password" placeholder="Password" name="password" /><br>
        <input type="submit" value="Entrar" name="botonEnviar" /></br></br>
        <p ><?= $_GET['msg'] ?? "" ?></p>
    </form>
</body>

</html>