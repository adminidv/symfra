<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE roles SET savedStatus='Active' WHERE role_ID = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: role_setup.php");
}

?>