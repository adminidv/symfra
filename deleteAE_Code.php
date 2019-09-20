<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE air_export_entry SET status_type='Deactive' WHERE dest_code = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: air_export_table.php");
}

?>