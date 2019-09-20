<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE pro_setup_commodity SET pro_active_status='Deactive' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: pro_setup_table.php");
}

?>