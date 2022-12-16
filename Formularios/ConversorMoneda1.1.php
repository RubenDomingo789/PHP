<?php
$euro = $_POST['euro'];
$moneda = $_POST['moneda'];

switch ($moneda) {
    case  1:
        echo "Has elegido bitcoin <br>";
        $result = $euro * 0.00012;
        echo "$euro € equivalen a $result ₿";
        break;

    case  2:
        echo "Has elegido yen <br>";
        $result = $euro * 120.82;
        echo "$euro € equivalen a $result ¥";
        break;

    case  3:
        echo "Has elegido dolar <br>";
        $result = $euro * 1.12;
        echo "$euro € equivalen a $result $";
        break;

    case  4:
        echo "Has elegido libra <br>";
        $result = $euro * 0.86;
        echo "$euro € equivalen a $result £";
        break;
}
?>
