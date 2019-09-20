<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE designation SET savedStatus='Active' WHERE Desig_ID = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: designation_setup.php");
}

?>