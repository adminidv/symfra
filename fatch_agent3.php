<?php

include('manage/connection.php');
include("manage/session.php");


$SrNo = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM sub_agent_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
    echo "<option value=".$row2['city_name'].">".$row2['city_name']."</option>";

    $selectCity = $row2['city_name'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM city_setup WHERE city_name!='$selectCity' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    echo "<option value=".$row3['city_name'].">".$row3['city_name']."</option>";
}

// echo json_encode($row);  

?>