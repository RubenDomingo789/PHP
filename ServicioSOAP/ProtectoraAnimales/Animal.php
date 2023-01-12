<?php
class Animal
{
    function comprobarAdopcion($id)
    {
        $conn = new PDO("mysql:host=localhost; dbname=protectora_animales", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM adopcion WHERE idAnimal = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
}
