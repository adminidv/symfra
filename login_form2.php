<?php

include('manage/connection.php');
session_start();


if (isset($_POST['submit'])) {


    $username_email = $_POST['username_email'];

    $query = mysqli_query($con, "select * from users where userName='$username_email' or user_email='$username_email'");

    while ($row= mysqli_fetch_array($query)) {
        
        $user_ID=$row['user_ID'];
        $email=$row['user_email'];
        // echo $email;
    }


    
        $to = $email;
        echo $to;
        $subject = "Account Confirmation | Symfra";

        $message = "
        <html>
        <head>
        <title>Account Confirmation | Symfra</title>
        </head>
        <body>

        <h5>Account Information</h5>

        <p>Your account has been created in Symfra. Please click on the given link to login with the following credentials:</p>
        <a href='http://symfradev.idvtechnologies.com/symfra/changePassword.php?user_ID=".$user_ID."'>http://symfradev.idvtechnologies.com/symfra/changePassword.php</a>
        <br>
        

        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <anas@bitsnpears.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
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
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>
<body>
        <!--Overall Form-->
        <div class="box">
    <div class="row">
        <div class="col-md-12">
            <!--Form Image-->
            <div class="row" >
                <div class="col-md-12" >
                    <img  style="max-width:100%; width:100%;  height:185px;"src="assets/k.jpg" alt="" >
                </div>
            </div>
            <!--Form Content-->
            <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST"> 
                            <label class="label_text" for="username">Username</label>    
                             <input type="text" id="username" name="username_email" placeholder="Enter Username"><br>
                             

                                <div class="row">
                                    <div class="col-md-6">
                                        <input style="float:left;"  type="submit" name="submit" value="Submit">  
                                    </div>
                                        
                                    <div class="col-md-6" style="padding-right:70px;">
                                        <input style="float:right; " type="submit" value="Cancel"> 
                                    </div>
                                </div>
                            
                            
                            
                        </form>  
                    </div>
            </div>
        </div>              
    </div>
</div>
</body>
</html>

