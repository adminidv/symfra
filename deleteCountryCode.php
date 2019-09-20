<?php

include('manage/connection.php');

if(isset($_GET["countryID"]))
{
	$query = "UPDATE country_setup SET savedStatus='Inactive' WHERE SrNo = '".$_GET["countryID"]."' ";
  	$statement = $connect->prepare($query);
  	$statement->execute();
 
}

?>