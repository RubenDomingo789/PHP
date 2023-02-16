<?php
include "config.php";
include "utils.php";
$dbConn =  connect($db);
/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['zona'])) {
    //Mostrar un post
    $sql = $dbConn->prepare("SELECT * FROM viviendas where zona=:zona");
    $sql->bindValue(':zona', $_GET['zona']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $json = json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    $tabla = json_decode($json);
    echo '<pre>';
    print_r($tabla);
    echo '</pre>';
    echo '<table>';
    foreach ($tabla as $row => $value) {
      echo '<tr><td>' . $tabla[$row]->id . "</td>";
      echo '<td>' . $tabla[$row]->tipo . "</td>";
      echo '<td>' . $tabla[$row]->zona . "</td>";
      echo '<td>' . $tabla[$row]->direccion . "</td>";
      echo '<td>' . $tabla[$row]->precio . "</td>";
      echo '<td>' . $tabla[$row]->ndormitorios . "</td>";
      echo '<td>' . $tabla[$row]->tamano . "</td></tr>";
    }
    echo '</table>';
    exit();
  } else {
    //Mostrar lista de post
    $sql = $dbConn->prepare("SELECT * FROM viviendas");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    $json = json_encode($sql->fetchAll());
    print_r(json_decode($json));
    exit();
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $input = $_POST;
  $sql = "INSERT INTO viviendas
          (direccion)
          VALUES
          (:direccion)";
  $statement = $dbConn->prepare($sql);
  bindAllValues($statement, $input);
  $statement->execute();
  $postId = $dbConn->lastInsertId();
  if ($postId) {
    $input['id'] = $postId;
    header("HTTP/1.1 200 OK");
    print_r($input);
    exit();
  }
}
header("HTTP/1.1 400 Bad Request");
