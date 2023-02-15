<?php
class Vivienda
{
    function filtrarzonas($zona)
    {
        $conn = new PDO("mysql:host=localhost; dbname=inmobiliaria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM viviendas WHERE zona = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $zona);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
}
?>