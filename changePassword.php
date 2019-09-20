<?php
include('manage/connection.php');

$user_ID= $_GET['user_ID'];

if (isset($_POST['submit'])) {
    
    $user_pswd= $_POST['user_pswd'];

    $qurey = mysqli_query($con, "UPDATE users SET user_pswd='$user_pswd' where user_ID ='$user_ID' ");

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
        <div class="box">
            <!-- IMAGE ---------------------------------------------------------------------------------------------------------------------->
            <div class = "row" >
                <div class="col-md-12">
                    <img style="width:100%; height:185px;"src="assets/k.jpg" alt="" >
                </div>
            </div>
            <!-- FORM ----------------------------------------------------------------------------------------------------------------------->
            <div class="form">
            <div class = "row">
                <div class = "col-md-12">
                        <form action="#"> 
                            <label for="username">New Password   </label>   
                              <input type="new_password" id="new_password" name="user_pswd" placeholder="Enter New Password">

                            <label for="password">Confirm Password  </label>  
                               <input type="confirm_password" id="password" name="confirmPassword" placeholder="Confirm Password">  

                            <div class="row">
                                <div class="col-md-12" style="padding-left:45px;" >
                                    <input  style="float:left;" type="submit" name="submit" value="Submit">  
                                </div>
                            </div>       
                        </form>
                   
                </div>
                </div>
              </div>
      </div>      
</body>
</html>