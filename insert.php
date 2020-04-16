<?php
//insert.php  
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
// $result = mysqli_query($conn, "SELECT * FROM topic ORDER BY topic.title ASC");  

if(!empty($_POST))
{
    $output = '';
    $name = mysqli_real_escape_string($conn, $_POST["name"]);  
    $email = mysqli_real_escape_string($conn, $_POST["email"]);  
    $profile = mysqli_real_escape_string($conn, $_POST["profile"]);  
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    echo $name;
    echo $email;
    echo $profile;
    echo $password;
    die();
    $sql = "INSERT INTO user(name, email, profile, password) VALUES('$name', '$email', '$profile', '$password')";
    if(mysqli_query($conn, $sql))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM user ORDER BY id DESC";
     $result = mysqli_query($conn, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["name"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>