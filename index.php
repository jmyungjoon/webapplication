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
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
</head>
<body id="target">
    <div class="container-fluid">
        <header class="jumbotron text-center">
            <div data-aos="fade-down">
                <a href = "http://ittcserver.com"><img src="ittc.jpeg" alt="life coding" class="border border-success rounded-circle" id="logo" ></a>
                <h1><a href="index.php">WEB Application</a></h1>
            </div>
        </header>
        <div class="row">
            <nav class="col-md-3 col-xs-3">
                <div data-aos="fade-right">
                    <ul >
                        <?php
                            while($row = mysqli_fetch_assoc($result)){ 
                            echo '<li><button onclick="getData('.$row['id'].')" value="'.$row['id'].'" >'.htmlspecialchars($row['title']).'</button></li>'."\n";
                            } 
                        ?>
                    </ul>
                </div>    
                
                <!-- Clock -->
                <div data-aos="fade-right">
                    <canvas id="canvas" width="120" height="120"
                    style="background-color:#333" class="border-bottom border-primary rounded-circle">
                    </canvas>
                    <script src="clock.js"></script>
                    <script>
                            $(window).resize(function() {
                                if($( window ).width()>1500) {
                                $("nav").removeClass("col-md-3").addClass("col-md-2");
                                } else { $("nav").removeClass("col-md-2").addClass("col-md-3");

                                }
                            });
                    </script>
                </div>
                    <!-- google Login -->
                <div class="g-signin2" data-onsuccess="onSignIn" data-aos="fade-right"></div>
                <script src="googlesignin2.js"></script>
                <!-- Google Calendar -->
                <div class="badge badge-secondary" data-aos="fade-right"> Google Calendar</div>
                <div></div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FManila&amp;src=Y2hvZGF2aWQxOTcwQGdtYWlsLmNvbQ&amp;color=%23039BE5&amp;showTz=0" style="border:solid 1px #777" width="185" height="200" frameborder="0" scrolling="no" data-aos="fade-right"></iframe>
            </nav>
            
            
    <div class="col-md-9 col-xs-9">
    <article data-aos="zoom-in">
        <div id="demo"><h2 data-aos="zoom-in">Welcome to Web Application</h2></div>
            <script>
                function getData(d1){
                    $.ajax({  
                        url:"read.php",
                        method:"POST", 
                        data:'id='+d1,
                        success:function(data){
                            document.getElementById('demo').innerHTML=data; 
                        }
                    });
                }
            </script>
    </article>
        <hr>
        <div id="control">
            <div class="btn-group" role="group" aria-label="..." data-aos="zoom-in">
                <input type="button" value="white" id="white_btn" class="btn btn-info btn-lg"/>
                <input type="button" value="black" id="black_btn" class="btn btn-info btn-lg"/>
            </div>
            <a href="write.php" id = "move" class="btn btn-success btn-lg" data-aos="zoom-in">New</a>
            <a href="update.php" id = "move" class="btn btn-success btn-lg" data-aos="zoom-in">Update</a>
            <a href="delete.php" id = "move" class="btn btn-danger btn-lg" data-aos="zoom-in">Delete</a> 
        
            <div id="disqus_thread"></div>
                <script>
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://webapplicationpractice.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>
    </div>
    
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
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>