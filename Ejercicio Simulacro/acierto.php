<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $intentos = $_GET['intentos'];
    echo "Ganaste tras " . $intentos . " intentos";
    ?>
    <a href="limites.php">
        <button>Volver a jugar</button>
    </a>
</body>

</html>