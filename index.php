<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");  

?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="721638147870-5h0p2mlg88l3u6hgb1grg9a72gcpu8st.apps.googleusercontent.com">
    <title>WEB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        #move {
            display: inline-block;
            transition: all 500ms cubic-bezier(0.680, -0.550, 0.265, 1.550);
            transition-timing-function: cubic-bezier(0.680, -0.550, 0.265, 1.550);
        }
        #move:active {
            transform: translate(-50px,-50px);
        }
        .badge badge-secondary {
            text-align : center;
        }    
    </style>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- <script src="googlelogin.js"></script> -->
</head>
<body id="target">
    <div class="container-fluid">
        <header class="jumbotron text-center">
            <a href = "http://opentutorials.org"><img src="94.png" alt="life coding" class="rounded-circle" id="logo"></a>
            <h1><a href="index.php">WEB Application</a></h1>
        </header>
        <div class="row">
            <nav class="col-md-3">
                <ul >
                    <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).' </a></li>'."\n";    
                } 
                ?>
        </ul>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <div class="badge badge-secondary" > Google Calander</div>
        <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FManila&amp;src=am15dW5nam9vbkBnbWFpbC5jb20&amp;src=dXViYzBxOG1jdXRhN2wzczM5MDkxZTNyaDBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=a28uc291dGhfa29yZWEjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;src=a28ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%234285F4&amp;color=%230B8043&amp;color=%230B8043&amp;color=%23009688" style="border:solid 1px #777" width="180" height="160" frameborder="0" scrolling="no"></iframe>        
    </nav>
    <div class="col-md-9">
    <article>
        <?php
        if(empty($_GET['id']) === false) {
            $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
            echo '<p>'.htmlspecialchars($row['name']).'</p>';
            echo strip_tags($row['description'], '<a><h1><h2><h3><h4><ul><ol><li>') ;
            
            } else { ?>
                <h2>Welcome to Web Application</h2> <?php
            }
        ?>
        

        </article>
        <hr>
        <div id="control">
        <div class="btn-group" role="group" aria-label="...">
            <input type="button" value="white" id="white_btn" class="btn btn-info btn-lg"/>
            <input type="button" value="black" id="black_btn" class="btn btn-info btn-lg"/>
        </div>
        <a href="write.php" id = "move" class="btn btn-success btn-lg">New</a>
        <?php
        if(empty($_GET['id']) === false) { 
            ?>
            <a href="update.php?id=<?=$_GET['id']?>" id = "move" class="btn btn-success btn-lg">Update</a>
            <a href="delete.php?id=<?=$_GET['id']?>" id = "move" class="btn btn-danger btn-lg">Delete</a> 
            
        <div id="disqus_thread"></div>
        <script>
        
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://webapplicationpractice.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <?php } else { 
            
        } ?>
        

    </div>
    </div>
    </div>
    </div>
    <!-- <input type="button" id="loginBtn" value="checking..." onclick="
    if(this.value === 'Login'){
      gauth.signIn().then(function(){
        console.log('gauth.signIn()');
        checkLoginStatus();
      });
    } else {
      gauth.signOut().then(function(){
        console.log('gauth.signOut()');
        checkLoginStatus();
      });
    }
  "> -->
    <script src="script.js"></script>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e6339098d24fc22658644e8/1e3kc889i';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>