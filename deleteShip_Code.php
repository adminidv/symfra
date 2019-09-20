<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE shipping_setup SET status='Deactive' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: shipping_setup_table.php");
}

?>