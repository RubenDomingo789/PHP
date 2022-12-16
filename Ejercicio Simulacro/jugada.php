<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugada</title>
</head>
<body>
<?php
    if (isset($_POST['limite1']) and isset($_POST['limite2'])) {
        if ($_POST['limite2'] > $_POST['limite1']) {
        } else {
            header("location:limites.php?alerta=El limite superior tiene que ser mayor que el inferior");
        }
        $rand = rand($_POST['limite1'], $_POST['limite2']);
        $min = $_POST['limite1'];
        $max = $_POST['limite2'];
        $intentos = 0;
    }

    if (isset($_POST['num'])) {
        $rand = $_POST['rand'];
        $intentos = $_POST['intentos'];
        $min = $_POST['limite1'];
        $max = $_POST['limite2'];
        $intentos++;
        
        if ($_POST['num'] > $rand) {
            echo "Tu número introducido es mayor que el generado";
        } else {
            if ($_POST['num'] < $rand) {
                echo "Tu número introducido es menor que el generado";
            } else {
                header("location:acierto.php?intentos=$intentos");
            }
        }
    }
    ?>
    
    <form method="post" action="">
        <label for="num"> Introduce un numero: </label>
        <input type="number" name="num" min="<?php echo $min ?>" max="<?php echo $max ?>" required></input>
        <input type="hidden" name="rand" value="<?php echo $rand ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
        <input type="hidden" name="limite1" value="<?php echo $min ?>">
        <input type="hidden" name="limite2" value="<?php echo $max ?>">
        <p><input type="submit" name="botonEnviar" value="comprobar"></p>
    </form>
    <p>Llevas <?php echo $intentos ?> intentos</p>
</body>

</html>