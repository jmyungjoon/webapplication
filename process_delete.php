<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$sql = "DELETE FROM topic WHERE topic.id = $id;";
$result = mysqli_query($conn, $sql);  
header('Location: index.php');
?>