<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE destination_setup SET status='Deactive' WHERE dest_code = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: destination_setup_table.php");
}

?>