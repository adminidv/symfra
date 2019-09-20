<?php
include('manage/connection.php');

$user_ID= $_GET['user_ID'];

if (isset($_POST['submit'])) {
	
	$user_pswd= $_POST['user_pswd'];

	$qurey = mysqli_query($con, "UPDATE users SET user_pswd='$user_pswd' where user_ID ='$user_ID' ");

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
</head>
<body>


<form action="/action_page.php">
<input type="password" name="user_pswd" id="user_pswd" placeholder="Enter Password" /><br>
<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" />
<input type="submit" name="submit">
</form>



</body>
</html>