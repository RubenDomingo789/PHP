<?php
require "../Config/Conexion.php";
$sql = "INSERT INTO ALUMNOS (nombre, apellidos, telefono, correo) VALUES (?, ?, ?, ?)";

if (isset($_REQUEST['botonEnviar'])) {
    $stmn = $conn->prepare($sql);
    $stmn->bindParam(1, $_REQUEST['nombre']);
    $stmn->bindParam(2, $_REQUEST['apellidos']);
    $stmn->bindParam(3, $_REQUEST['telefono']);
    $stmn->bindParam(4, $_REQUEST['correo']);
    $stmn->execute();
    echo "Los datos se han insertado correctamente";
}
$conn = null;
