<?php

include('manage/connection.php');
include("manage/session.php");

$customerCont = $_GET['customerCont'];

// $updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$customerCont' ") or die(mysqli_error($con));
// // echo $reg_code;
// while ($rowCountry = mysqli_fetch_array($updateQuery1))
// {
//    // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
// 	$fetchOwner = $rowCountry["newCode"];
// }

$selectName = mysqli_query($con, "SELECT * FROM custrepdetails WHERE custMCode='$customerCont' ");
while ($rowOwner = mysqli_fetch_array($selectName))
{
   echo '<option value="'.$rowOwner['SrNo'].'">'.$rowOwner['repName'].'</option>';
	// echo $rowOwner["repName"];
}

?>