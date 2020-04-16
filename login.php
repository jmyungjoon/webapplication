<?php
require("config/config.php");
require("lib/db.php");
$id = $_POST['id'];
$password = $_POST['password'];
$sql = "SELECT * FROM `user` WHERE name='$id' and password='$password'";
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(empty($row) === false) {
    header('Location: index.php');
    } else if(empty($row) === true) { echo '<script>confirm(" Wrong ID or password! Or you are not signed up.\n Do you want to sign up?")</script>';
    
    
    
        // header('Location: signup.php');
    } else {

}

?>