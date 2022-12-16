<?php
require "../Config/Conexion.php";
$sql = "UPDATE ALUMNOS SET NOMBRE = ?, APELLIDOS = ?, TELEFONO = ?, CORREO = ? WHERE CODIGO = ?";

if (isset($_REQUEST['botonEnviar'])) {
    $stmn = $conn->prepare($sql);
    $stmn->bindValue(1, $_REQUEST['nombre']);
    $stmn->bindValue(2, $_REQUEST['apellidos']);
    $stmn->bindValue(3, $_REQUEST['telefono']);
    $stmn->bindValue(4, $_REQUEST['correo']);
    $stmn->bindValue(5, intval($_REQUEST['codigo']));
    if($stmn->execute()){
        echo "Los datos se han modificado correctamente";
    }
}
else {
    echo "Hay algún error con los datos";
}
$conn = null;