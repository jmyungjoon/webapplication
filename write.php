<?php
require("config/config.php");
require("lib/db.php");
require("lib/readingDB.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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
                            echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";    
                            } 
                    ?>
                </ul>
            </nav>
            <script src="resize.js"></script>
            <div class="col-md-9">
                <article>
                    <form action="process.php" method="POST">
                        <div class="form-group">
                                <label for="form-title">Title</label>
                                <input type="text" class="form-control" name="title" id="form-title" placeholder="Write a title here.">
                        </div>
                        <div class="form-group">
                            <label for="form-author">Author</label>
                            <input type="text" class="form-control" name="author" id="form-author" placeholder="Write an author.">
                        </div>
                        <div class="form-group">
                            <label for="form-description">Description</label>
                            <textarea class="form-control" rows="10" name="description"  id="form-description" placeholder="Write a description."></textarea>
                        </div>
                        <input type="submit" name="name" id = "move" class="btn btn-success btn-lg" />
                            <script>
                                    CKEDITOR.replace( 'form-description' );
                            </script>
                    </form>
                    <hr>
                </article>
                   <div id="control">
                        <div class="btn-group" role="group" aria-label="...">
                            <input type="button" value="white" id="white_btn" class="btn btn-info btn-lg"/>
                            <input type="button" value="black" id="black_btn" class="btn btn-info btn-lg"/>
                        </div>
                        <a href="write.php" id = "move" class="btn btn-success btn-lg">New</a> 
                    </div>     
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>