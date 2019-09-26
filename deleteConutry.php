<?php

include('manage/connection.php');

if(isset($_GET["contID"]))
{
	$selectStatus = mysqli_query($con, "SELECT * FROM country_setup WHERE SrNo='".$_GET["contID"]."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }

    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE country_setup SET status='Deactive' WHERE SrNo = '".$_GET["contID"]."' ");
    }
    else if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE country_setup SET status='Active' WHERE SrNo = '".$_GET["contID"]."' ");
    }

    header("Location: country_setup_table.php");
 
}

?>