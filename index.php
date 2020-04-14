<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic ORDER BY topic.title ASC");  

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        #move {
            display: inline-block;
            transition: all 500ms cubic-bezier(0.680, -0.550, 0.265, 1.550);
            transition-timing-function: cubic-bezier(0.680, -0.550, 0.265, 1.550);
        }
        #move:active {
            transform: translate(-50px,-50px);
        }
        .badge-secondary {
            width: 184.6px;
        }    
        @media(max-width:1600px) {

        }
    </style>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- <script src="googlelogin.js"></script> -->
</head>
<body id="target">
    <div class="container-fluid">
        <header class="jumbotron text-center">
            <a href = "http://ittcserver.com"><img src="ittc.jpeg" alt="life coding" class="border border-success rounded-circle" id="logo" ></a>
            <h1><a href="index.php">WEB Application</a></h1>
        </header>
        <div class="row">
            <nav class="col-md-2">
                <ul >
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                        echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).' </a></li>'."\n";    
                        } 
                    ?>
                </ul>
                
                
                <!-- Clock -->
                    <canvas id="canvas" width="120" height="120"
                    style="background-color:#333" class="border-bottom border-primary rounded-circle">
                    </canvas>

                    <script>
                    var canvas = document.getElementById("canvas");
                    var ctx = canvas.getContext("2d");
                    var radius = canvas.height / 2;
                    ctx.translate(radius, radius);
                    radius = radius * 0.90
                    setInterval(drawClock, 1000);

                    function drawClock() {
                    drawFace(ctx, radius);
                    drawNumbers(ctx, radius);
                    drawTime(ctx, radius);
                    }

                    function drawFace(ctx, radius) {
                    var grad;
                    ctx.beginPath();
                    ctx.arc(0, 0, radius, 0, 2*Math.PI);
                    ctx.fillStyle = 'white';
                    ctx.fill();
                    grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                    grad.addColorStop(0, '#333');
                    grad.addColorStop(0.5, 'white');
                    grad.addColorStop(1, '#333');
                    ctx.strokeStyle = grad;
                    ctx.lineWidth = radius*0.1;
                    ctx.stroke();
                    ctx.beginPath();
                    ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                    ctx.fillStyle = '#333';
                    ctx.fill();
                    }

                    function drawNumbers(ctx, radius) {
                    var ang;
                    var num;
                    ctx.font = radius*0.15 + "px arial";
                    ctx.textBaseline="middle";
                    ctx.textAlign="center";
                    for(num = 1; num < 13; num++){
                        ang = num * Math.PI / 6;
                        ctx.rotate(ang);
                        ctx.translate(0, -radius*0.85);
                        ctx.rotate(-ang);
                        ctx.fillText(num.toString(), 0, 0);
                        ctx.rotate(ang);
                        ctx.translate(0, radius*0.85);
                        ctx.rotate(-ang);
                    }
                    }

                    function drawTime(ctx, radius){
                        var now = new Date();
                        var hour = now.getHours();
                        var minute = now.getMinutes();
                        var second = now.getSeconds();
                        //hour
                        hour=hour%12;
                        hour=(hour*Math.PI/6)+
                        (minute*Math.PI/(6*60))+
                        (second*Math.PI/(360*60));
                        drawHand(ctx, hour, radius*0.5, radius*0.07);
                        //minute
                        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                        drawHand(ctx, minute, radius*0.8, radius*0.07);
                        // second
                        second=(second*Math.PI/30);
                        drawHand(ctx, second, radius*0.9, radius*0.02);
                    }

                    function drawHand(ctx, pos, length, width) {
                        ctx.beginPath();
                        ctx.lineWidth = width;
                        ctx.lineCap = "round";
                        ctx.moveTo(0,0);
                        ctx.rotate(pos);
                        ctx.lineTo(0, -length);
                        ctx.stroke();
                        ctx.rotate(-pos);
                    }
                    
                    </script>
                    <script>
                            $(window).resize(function() {
                                if($( window ).width()>1500) {
                                $("nav").removeClass("col-md-3").addClass("col-md-2");
                                } else { $("nav").removeClass("col-md-2").addClass("col-md-3");

                                }
                            });
                    </script>
                    <!-- google Login -->
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <script>
                    document.cookie = "safeCookie1=foo; SameSite=Lax";
                    document.cookie = "safeCookie2=foo";
                    document.cookie = "crossCookie=bar; SameSite=None; Secure";
                    function onSignIn(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                    console.log('Name: ' + profile.getName());
                    console.log('Image URL: ' + profile.getImageUrl());
                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                    log_id = profile.getId();
                    Name = profile.getName();
                    if(log_id != "") { 
                        $(".g-signin2").append("Hi!  "+Name);
                        } else {
                        };
                    }
                </script>
                <!-- Google Calendar -->
                <div class="badge badge-secondary" > Google Calendar</div>
                <div></div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FManila&amp;src=Y2hvZGF2aWQxOTcwQGdtYWlsLmNvbQ&amp;color=%23039BE5&amp;showTz=0" style="border:solid 1px #777" width="185" height="200" frameborder="0" scrolling="no"></iframe>
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