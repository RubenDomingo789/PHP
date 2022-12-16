<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="Login.php">
        <input type="text" placeholder="Usuario" name="usuario" value="<?php echo $_GET['nombre'] ?? "" ?>"/><br>
        <input type="password" placeholder="Contraseña" name="contraseña" required /><br>
        <input type="submit" value="Entrar" name="botonEnviar" /><br>
        <p><?= $_GET['msg'] ?? "" ?></p>
        <a href="Registro.php">Registro de usuario</a>
    </form>
</body>

</html>