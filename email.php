<?php
include('manage/connection.php');

// After Submit
if(isset($_POST['submitBtn']))
{
  
  $name = $_POST['name'];
  $email = $_POST['email'];


  $insertquery = mysqli_query($con, "insert into email (name,email) values('$name','$email')");
  
  header(" location: email.php");

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>email shooting</title>
</head>
<body>

	<form action="welcome.php" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit">
	</form>

</body>
</html>