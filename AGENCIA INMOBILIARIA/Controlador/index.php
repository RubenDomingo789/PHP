<?php
//Llamada al modelo
require_once("Login/Login.php");

if (isset($_POST["botonEnviar"])){
    header("Location:principal.php");
}
?>
