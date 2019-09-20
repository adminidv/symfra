<?php

include('manage/connection.php');
include("manage/session.php");



$SrNo = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM airline_charges_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
    echo "<option value=".$row2['SrNo'].">".$row2['airport_addCharges']."</option>";

    $selectairport = $row2['airport_name'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM invoice_setup WHERE inv_code!='$selectairport' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    echo "<option value=".$row3['SrNo'].">".$row3['inv_code']."</option>";
}

// echo json_encode($row);  

?>