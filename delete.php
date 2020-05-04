<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic ORDER BY topic.title ASC");  



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        #logo {
            width: 100px;
        }
    </style>
</head>
<body id="target">
<div class="container-fluid">
    <header class="jumbotron text-center">
        <a href = "http://ittcserver.com"><img src="ittc.jpeg" alt="life coding" class="border border-success rounded-circle" id="logo" ></a>
        <h1><a href="index.php">WEB Application</a></h1>
    </header>
    <div class="row">
    <nav class="col-md-3">
        <ul >
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo '<li><a href="delete.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";    
                    } 
            ?>
        </ul>
    </nav>
    <div class="col-md-9">
    <?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $select_form = '<select name="user_id">';
    while($row = mysqli_fetch_array($result)){
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    $select_form .= '</select>';
    ?>
    <article>
        <?php
        if(empty($_GET['id']) === false) {
            $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            }
            $description = strip_tags($row['description'], '<a><h1><h2><h3><h4><ul><ol><li>') ;
        ?>

        <form action="process_delete.php" method="POST">
            <input type="hidden" name="id" value="<?php $_GET['id']?>">
            <div class="form-group">
                    <label for="form-title">Title</label>
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <input type="text" class="form-control" name="title" id="form-title" placeholder="title" value="<?=$row['title']?>">
            </div>
            <div class="form-group">
                <label for="form-author">Author</label>
                <?=$select_form?>
            </div>
            <div class="form-group">
                <label for="form-description">Description</label>
                <textarea class="form-control" rows="10" name="description"  id="form-description" placeholder="description"><?php print $row['description'] ;?></textarea>
            </div>
          <input type="submit" name="name" id = "move" class="btn btn-danger btn-lg" value="Delete" title="Are you SURE?"/>
        </form>
        <hr>
        <div id="control">
        <div class="btn-group" role="group" aria-label="...">
            <input type="button" value="white" id="white_btn" class="btn btn-info btn-lg"/>
            <input type="button" value="black" id="black_btn" class="btn btn-info btn-lg"/>
        </div>
        <a href="write.php" id = "move" class="btn btn-success btn-lg">New</a> 
        <a href="delete.php" id = "move" class="btn btn-danger btn-lg">Delete</a> 
        
        
    </article>
                </div>
                </div>
    </div>
    </div>
</body>
</html>