<?php

include('manage/connection.php');
session_start();

if(isset($_COOKIE["username"]) && isset($_COOKIE["pswd"]) )
 {
    echo $_COOKIE["username"];

    // Fetching User ID
    $query = mysqli_query($con, "SELECT * FROM users WHERE userName='". $_COOKIE["username"] ."' ");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $userID = $row['user_ID'];
    $_SESSION['user'] = $userID;

    echo "<br>" . $_SESSION["user"];
    header("Location: usermodules.php");
 }

if(isset($_POST['submitBtn']))
{
    $username = $_POST['username'];
    $pswd = $_POST['pswd'];

    if(!empty($_POST["remember"])) {
            setcookie ("username",$_POST["username"],time()+ 3600);
            setcookie ("pswd",$_POST["pswd"],time()+ 3600);
            // echo "Cookies Set Successfuly";
        } else {
            setcookie("username","");
            setcookie("pswd","");
            // echo "Cookies Not Set";
        }

    // Checking the user credentials
    $query = mysqli_query($con, "SELECT * FROM users WHERE userName='". $username ."' AND user_pswd = '". $pswd ."' ");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($username==$row['userName'] && $pswd==$row['user_pswd'])
    {
        
        $userID = $row['user_ID'];
        $_SESSION['user'] = $userID;
        header("Location: usermodules.php");
    }
    else
    {
        $msg = 'Got some error';

        function alert($msg)
        {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
        alert($msg);
    }

    
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
    <title>Login</title>
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
                            <input type="text" id="username" maxlength="30" name="username" placeholder="Enter Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>

                            


                            <label class="label_text"  for="password">Password</label>     
                            <input type="password" id="password" name="pswd" maxlength="30" minlength="3" placeholder="Enter Password" value="<?php if(isset($_COOKIE["pswd"])) { echo $_COOKIE["pswd"]; } ?>"><br>  
                           

                            <label class="container">Remember Me 
                                    <input type="checkbox" name="remember"
                                    <?php if(isset($_COOKIE["username"])) { ?>
                                     checked <?php
                                      }
                                       ?>
                                       >
                                    <span class="checkmark"></span>
                                  </label>    

<<<<<<< HEAD
                                  <a href="login_form2.php" style="float:right;" > Forgot Password?</a>       
=======
                                  <a href="forget.php" style="float:right;" > Forgot Password?</a>       
>>>>>>> 92ef3d6df93ae12110e9137c280966485def5b10
                            
                            <br><input  type="submit"  name="submitBtn" value="Login" > <br> 
                           
                        </form>  
                    </div>
            </div>
        </div>              
    </div>
</div>
</body>
</html>

