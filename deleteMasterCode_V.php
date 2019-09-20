<?php

include('manage/connection.php');

if(isset($_GET["newCode"]))
{
	$selectStatus = mysqli_query($con, "SELECT * FROM vndmaster WHERE newCode='".$_GET["newCode"]."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['cmpStatus'];
    }

    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE vndmaster SET cmpStatus='Deactive' WHERE newCode = '".$_GET["newCode"]."' ");
    }
    else if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE vndmaster SET cmpStatus='Active' WHERE newCode = '".$_GET["newCode"]."' ");
    }

    header("Location: master_vendor_table.php");

  /*$query = "UPDATE custmaster SET cmpStatus='Inactive' WHERE newCode = '".$_GET["newCode"]."' ";
  $statement = $con->prepare($query);
  $statement->execute();*/

   // echo $_GET["newCode"];
 
}

// echo "Done";

?>