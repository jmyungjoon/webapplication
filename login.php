<?php
$id = $_POST['id'];
$password = $_POST['password'];
echo $id;
echo $password ;

if(david == $id and zxcv1234 == $password) {
    header('Location: index.php');
    } else { echo '<script>alert(" Wrong ID or password!")</script>';
    header('Location: index.html');
}
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic"); 

?>