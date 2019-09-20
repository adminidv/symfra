<?php

include('manage/connection.php');

if(isset($_GET["dept_ID"]))
{
	$query = "UPDATE department SET savedStatus='Inactive' WHERE dept_ID = '".$_GET["dept_ID"]."' ";
  	$statement = $connect->prepare($query);
  	$statement->execute();
 
}

?>