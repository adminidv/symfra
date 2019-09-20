<?php

include('manage/connection.php');
include("manage/session.php");



$SrNo = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM represent_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
    echo "<option value=".$row2['SrNo'].">".$row2['rep_desg']."</option>";

    $selectairport = $row2['rep_desg'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM designation WHERE Desig_name!='$selectairport' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    echo "<option value=".$row3['Desig_name'].">".$row3['Desig_name']."</option>";
}

// echo json_encode($row);  

?>