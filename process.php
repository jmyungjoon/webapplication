<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
  
if(empty($_POST['title']) === false) {
  $sql = "SELECT * FROM user WHERE name='".$author."'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0) {
      $sql = "INSERT INTO user (name, password) VALUES ('".$author."','111111')";
      mysqli_query($conn, $sql);
      $user_id = mysqli_insert_id($conn);
    } else {
      $row = mysqli_fetch_assoc($result);
      $user_id = $row['id'];
    }
    $sql = "INSERT INTO topic (title, description, author,created) VALUE('".$title."','".$description."','".$user_id."',now())";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, "SELECT * FROM topic ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    header('Location: index.php?id='.$row['id'].'');
} else {
  header('Location: write.php');
  }
?>