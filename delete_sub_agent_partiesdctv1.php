<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE sub_agents_parties_setup SET status='Active' WHERE SrNo = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: sub_agent_parties_table.php");
}

?>