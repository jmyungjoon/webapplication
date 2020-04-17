<?php
require("config/config.php");
require("lib/db.php");
$id = $_POST['id'];
$password = $_POST['password'];
$sql = "SELECT * FROM `user` WHERE name='".$id."' and password='".$password."'";
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(empty($row) === false) {
    echo Json_encode(array('data'=>true));
    } else  { 
        echo Json_encode(array('data'=>false));
        }    

?>