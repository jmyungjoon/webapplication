<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic ORDER BY topic.title ASC");  

if(!empty($_POST["id"])) {
    $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_POST["id"];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo  '<h2  data-aos="zoom-in">'.htmlspecialchars($row['title']).'</h2>'; 
    echo '<p  data-aos="zoom-in">'.htmlspecialchars($row['name']).'</p>';
    echo '<p  data-aos="zoom-in">'.strip_tags($row['description'], '<a><h1><h2><h3><h4><ul><ol><li>').'</p>' ;
    } else { ?>
         <h2 data-aos="zoom-in">Welcome to Web Application</h2> <?php
    }
?>