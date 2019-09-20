<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE stockowner SET status='Active' WHERE dest_code = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: stock_owner_table.php");
}

?>