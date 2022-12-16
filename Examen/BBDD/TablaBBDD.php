<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "root";
    $dbname = "dsada";
    try {
        $conn = new PDO("mysql:host=$servidor", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = ("CREATE DATABASE IF NOT EXISTS $dbname");
        $conn->exec($sql);
        $sql1 = "USE $dbname";
        $conn->exec($sql1);

        $sql2 = "CREATE TABLE Persons (
            PersonID int,
            LastName varchar(255),
            FirstName varchar(255),
            Address varchar(255),
            City varchar(255)
        );";
        $conn->exec($sql2);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</body>

</html>