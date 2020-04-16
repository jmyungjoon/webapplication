<!-- <?php  
//index.php
// $connect = mysqli_connect("localhost", "root", "", "testing");
// $query = "SELECT * FROM employee ORDER BY id DESC";
// $result = mysqli_query($connect, $query);
//  ?>   -->
<!DOCTYPE html>  
<html>  
 <head>  
  <!-- <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
  <br /><br />  
  <div class="container" style="width:700px;">  
   <!-- <h3 align="center">Sign Up</h3>   -->
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Login</button>
    </div>
    <br />
    <!-- <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Employee Name</th>  
       <th width="30%">View</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["name"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div> -->
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Create New Member</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Enter Email Address</label>
     <input type="text" name="email" id="email" class="form-control"></textarea>
     <br />
     <label>Enter Profile</label>
     <input type="text" name="profile" id="profile" class="form-control" />
     <br />  
     <label>Enter Password</label>
     <input type="text" name="password" id="password" class="form-control" placeholder="******" />
     <br />
     <label>Enter Confirm Password</label>
     <input type="text" name="password" id="password" class="form-control" placeholder="******"/>
     <br />
     <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<!-- <div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div> -->

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#email').val() == '')  
  {  
   alert("email is required");  
  }  
  else if($('#profile').val() == '')
  {  
   alert("Profile is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
    //  $('#employee_table').html(data);  
    }  
   });  
  }  
 });

//  $(document).on('click', '.view_data', function(){
//   //$('#dataModal').modal();
//   var employee_id = $(this).attr("id");
//   $.ajax({
//    url:"select.php",
//    method:"POST",
//    data:{employee_id:employee_id},
//    success:function(data){
//     $('#employee_detail').html(data);
//     $('#dataModal').modal('show');
//    }
//   });
//  });
// });  
 </script>