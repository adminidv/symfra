<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE airport_setup SET status='Active' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: airport_setup_table.php");
}

?>