<?php
if (isset($_COOKIE['visitas'])){
    $_COOKIE['visitas']++;
    setcookie('visitas', $_COOKIE['visitas'], time()+ 600);
    setcookie('hora', date("Y-m-d H:i:s"), time()+ 600);
    echo "Numero de visita: " . $_COOKIE['visitas'];
    echo "<br>Hora: " . $_COOKIE['hora'];
}
else {
    setcookie('visitas', 1);
    setcookie('hora', date("Y-m-d H:i:s"));
    echo "Numero de visita: " . $_COOKIE['visitas'];
    echo "<br>Hora: " . $_COOKIE['hora'];
}
?>