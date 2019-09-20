<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE foreign_associate SET status='Deactive' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: foreign_associates_table.php");
}

?>