<?php

include('manage/connection.php');
include("manage/session.php");



$country_code = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM country_setup WHERE country_code = '$country_code' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
    echo "<option value=".$row2['country_region'].">".$row2['country_region']."</option>";

    $selectRegion = $row2['country_region'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM region_setup WHERE reg_name!='$selectRegion' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    echo "<option value=".$row3['reg_name'].">".$row3['reg_name']."</option>";
}

// echo json_encode($row);  

?>