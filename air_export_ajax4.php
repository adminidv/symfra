<?php

include('manage/connection.php');
include("manage/session.php");

$awbNo = $_GET['awbNo'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM airway_billable WHERE SrNo = '$awbNo' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
   // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
	$fetchOwner = $rowCountry["owner"];
}

$selectName = mysqli_query($con, "SELECT * FROM stockowner WHERE SrNo='$fetchOwner' ");
while ($rowOwner = mysqli_fetch_array($selectName))
{
   // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
	echo $rowOwner["owner_name"];
}

?>