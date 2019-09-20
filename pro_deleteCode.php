<?php

include('manage/connection.php');

if(isset($_GET["SrNo"]))
{
	$query = "UPDATE pro_setup_commodity SET savedStatus='Inactive' WHERE SrNo = '".$_GET["SrNo"]."' ";
  	$statement = $connect->prepare($query);
  	$statement->execute();
 
}

?>