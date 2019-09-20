<?php

include('manage/connection.php');

if(isset($_GET["role_ID"]))
{
	$query = "UPDATE roles SET savedStatus='Inactive' WHERE role_ID = '".$_GET["role_ID"]."' ";
  	$statement = $connect->prepare($query);
  	$statement->execute();
}

?>