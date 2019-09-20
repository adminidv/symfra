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
			echo "Cookies Set Successfuly";
		} else {
			setcookie("username","");
			setcookie("pswd","");
			echo "Cookies Not Set";
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

if (isset($_POST['submit'])) {


	$query = mysqli_query($con, "select * From users where userName='$username_email' or user_email='$username_email'");

	while ($row= mysqli_fetch_array($query)) {
		
		$user_ID=$row['user_ID'];
		$email=$row['user_email'];
	}


	
        $to = $email;
		$subject = "Account Confirmation | Symfra";

		$message = "
		<html>
		<head>
		<title>Account Confirmation | Symfra</title>
		</head>
		<body>

		<h5>Account Information</h5>

		<p>Your account has been created in Symfra. Please click on the given link to login with the following credentials:</p>
		<a href='http://symfradev.idvtechnologies.com/symfra/forget.php?user_ID=".$user_ID."'>http://symfradev.idvtechnologies.com/symfra/forget.php</a>
		<br>
		

		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <anas@bitsnpears.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="shortcut icon" type="image/png" href="images/favicon.png">
<link rel="stylesheet" href="css/login_form.css" type="text/css">

<script src="js/jquery-1.12.4.js"></script>
</head>

<body>
<div class="container-fluid header">
	<div class="row">
			<div class=" col-xs-12 col-sm-12 col-md-4">
				<div class="logo">
				<img src="images/logo_here.png">
<!-- 					<a href="#"> <h4>SYMFRA</h4> </a>
 -->				</div>
			</div>
			<div class=" col-xs-12 col-sm-12 col-md-8">
				<div class="banner_content">
					<div class="white_title">
						<h5>SIGN IN</h5>
					</div>
					<div class="blck_title">
						<h4>SYMFRA <small>&#174;</small> </h4>
					</div>
				</div>
			</div>
	</div>	
</div>
<div class="container-fluid shadow_bnr_top">	
</div>
	<div class="d-flex justify-content-center h-100card">
		<div class="card">
			<div class="card-body form-body">
				<form action="" method="POST">

					

			 <!-- Modal_one-->
			  <div class="modal fade symfra_popup2" id="popup_2" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
					        <div class="input-fields">	
					          <label>Username/Email Address</label>	
					          <input type="text" name="username_email" placeholder="Enter Here !">		
					        </div>
				          <button type="submit">Submit</button>
				          <button type="submit1">Cancel</button>

				        </div>
				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				      
				    </div>
			  </div>

									<div class="col-md-12 input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class="form-control" placeholder="Username" name="username"  value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" class="input-field">	
									</div>
									<div class="col-md-12 input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-key"></i></span>
										</div>
										<input type="password" class="form-control" placeholder="Password" name="pswd" value="<?php if(isset($_COOKIE["pswd"])) { echo $_COOKIE["pswd"]; } ?>">
									</div>
									<div class="col-md-12 row align-items-center remember">
										<input type="checkbox" name="remember" 
										<?php if(isset($_COOKIE["username"])) { ?>
										 checked <?php
										  }
										   ?>
										  ><p class="checkbox_rem">Remember Me</p>
									</div>
									<div class="col-md-12 form-group">
										<!-- <a href="usermodules.php"> Login</a> -->
									
										<input type="submit" name="submitBtn" class="float-right" value="Login">
 				 					</div>
				

									<div class="card-footer cls">
										<!-- <div class="d-flex justify-content-center links">
											<p>Don't have an account?</p>
											<a href="#">Sign Up</a>
										</div> -->
										<div class="d-flex justify-content-center">
											 <button type="button"  data-toggle="modal" data-target="#popup_2">Forget Password</button>
										</div>
									</div>
									</form>
			</div>
		</div>
	</div>
			

<script src="js/bootstrap.min.js"></script>
<!-- <script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script> -->

</body>
</html>
