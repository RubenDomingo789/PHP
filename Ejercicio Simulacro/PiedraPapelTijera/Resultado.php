<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <?php
    $ganadas = $_GET['ganadas'];
    $perdidas = $_GET['perdidas'];
    echo "Resultado final: Usuario " . $ganadas . " - Máquina " . $perdidas ."<br>";
    ?>
    <a href="index.php">
        <button>Volver a jugar</button>
    </a>
</body>

</html>