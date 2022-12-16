<html>

<head>
    <title>Main</title>
</head>

<body>
    <?php
    if (isset($_POST['opcion'])) {
        $ganadas = $_POST['ganadas'];
        $perdidas = $_POST['perdidas'];
        $empatadas = $_POST['empatadas'];
        $partidas = $_POST['partidas'];
        $rand = rand(1, 3);

        switch ($_POST['opcion']) {
            case 1:
                echo "Has elegido piedra<br>";
                break;
            case 2:
                echo "Has elegido papel<br>";
                break;
            case 3:
                echo "Has elegido tijera<br>";
                break;
        }

        switch ($rand) {
            case 1:
                echo "La máquina ha elegido piedra<br>";
                break;
            case 2:
                echo "La máquina ha elegido papel<br>";
                break;
            case 3:
                echo "La máquina ha elegido tijera<br>";
                break;
        }

        if ($rand == $_POST['opcion']) {
            $empatadas++;
            echo "Has empatado la partida<br>";
        } else if (($rand == 1 && $_POST['opcion'] == 2) || ($rand == 2 && $_POST['opcion'] == 3) || ($rand == 3 && $_POST['opcion'] == 1)) {
            $ganadas++;
            echo "Has ganado la partida<br>";
        } else {
            $perdidas++;
            echo "Has perdido la partida<br>";
        }

        if ($ganadas + $perdidas + $empatadas == $partidas) {
            header("location:Resultado.php?ganadas=$ganadas&perdidas=$perdidas");
        }
    }
    ?>

    <form method="post" action="">
        <label for="numero"><hr> Selecciona una opción para jugar </label><br>
        <input type="radio" name="opcion" value=1 checked />Piedra</input><br>
        <input type="radio" name="opcion" value=2 />Papel</input><br>
        <input type="radio" name="opcion" value=3 />Tijera</input><br>
        <input type="hidden" name="ganadas" value="<?= $ganadas ?? 0 ?>">
        <input type="hidden" name="perdidas" value="<?= $perdidas ?? 0 ?>">
        <input type="hidden" name="empatadas" value="<?= $empatadas ?? 0 ?>">
        <input type="hidden" name="partidas" value="<?= $_POST['partidas'] ?? 0 ?>">
        <input type="submit" name="Jugar" value="Enviar" />

        <p>Partidas ganadas por el usuario: <?php echo $ganadas ?? 0 ?></p>
        <p>Partidas ganadas por la máquina: <?php echo $perdidas ?? 0 ?></p>
        <p>Partidas empatadas: <?php echo $empatadas ?? 0 ?></p>
        <hr>
    </form>
</body>

</html>