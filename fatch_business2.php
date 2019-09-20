<?php

include('manage/connection.php');
include("manage/session.php");



$SrNo = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM business_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
	 echo '<option value="'.$row2["commodities"].'">'.$row2["commodities"].'</option>';

    $selectcommodities = $row2['commodities'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM pro_setup_commodity WHERE pro_name!='$selectcommodities' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    echo '<option value="'.$row3["pro_name"].'">'.$row3["pro_name"].'</option>';
}

// echo json_encode($row);  

?>