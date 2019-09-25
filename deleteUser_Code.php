<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE users SET status='Deactive' WHERE user_ID = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: usertable.php");
}

?>