<?php
include "Cuenta.php";
$cuenta1 = new Cuenta("Juan González", "ES00 0049 1459 27 5698723450", 3.14, 5489.78);
$cuenta2 = new Cuenta("Marta Sánchez", "ES00 2100 7563 12 4100233887", 2.14, 10456.8);

echo "<pre>";
print_r($cuenta1); 
echo "</pre>";

echo "<pre>";
print_r($cuenta2); 
echo "</pre>";

echo "---------------------------";
$cuenta1 -> transferencia($cuenta2, 2634.89);

echo "<pre>";
print_r($cuenta1); 
echo "</pre>";

echo "<pre>";
print_r($cuenta2); 
echo "</pre>";

?>