<?php

include('manage/connection.php');

if(isset($_GET["Desig_ID"]))
{
	$query = "UPDATE designation SET savedStatus='Inactive' WHERE Desig_ID = '".$_GET["Desig_ID"]."' ";
  	$statement = $connect->prepare($query);
  	$statement->execute();
}

?>