<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE mop_setup SET status='Deactive' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: mop_setup_table.php");
}

?>