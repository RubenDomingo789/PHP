<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form method="post" action="Jugada.php">
        <label> ¿Cuantas tiradas? </label><br>
        <input type="number" name="tiradas" /><br>
        <input type="submit" name="Jugar" value="Enviar" />
        <p><?php echo $_GET['msg'] ?? ""?></p>
    </form>
</body>

</html>