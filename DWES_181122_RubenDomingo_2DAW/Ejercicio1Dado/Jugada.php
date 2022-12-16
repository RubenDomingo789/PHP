<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
    if (isset($_POST['tiradas'])) {
        if (!is_int($_POST['tiradas']) && $_POST['tiradas'] < 1) {
            header("location:index.php?msg='Debes introducir un numero mayor que 1'");
        } else {
            $tiradas = $_POST['tiradas'];
            $contadores = [];
            for ($i = 0; $i <= 5; $i++) {
                array_push($contadores, 0);
            }

            $randoms = [];
            for ($i = 1; $i <= $tiradas; $i++) {
                $rand = mt_rand(1, 6);
                array_push($randoms, $rand);
            }
            print_r($randoms);
            echo "<br>";

            foreach ($randoms as $rand) {
                switch ($rand) {
                    case 1:
                        $contadores[0]++;
                        break;
                    case 2:
                        $contadores[1]++;
                        break;
                    case 3:
                        $contadores[2]++;
                        break;
                    case 4:
                        $contadores[3]++;
                        break;
                    case 5:
                        $contadores[4]++;
                        break;
                    case 6:
                        $contadores[5]++;
                        break;
                }
            }
            
            echo "El resultado de las tiradas es: <br>";
            foreach ($contadores as $cont => $value) {
                if ($value == 1) {
                    echo "El numero " . $cont + 1 . " aparece " . $value . " vez <br>";
                }
                if ($value > 1) {
                    echo "El numero " . $cont + 1 . " aparece " . $value . " veces <br>";
                }
            }
        }
    }
    ?>
</body>

</html>