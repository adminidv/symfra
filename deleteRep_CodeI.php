<?php

include('manage/connection.php');
$id = $_GET['id'];
$userNo = $_GET['userNo'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE  represent_setup SET status='Active' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: sub_agent_setup_Edit.php?id=" .$userNo);
}

?>