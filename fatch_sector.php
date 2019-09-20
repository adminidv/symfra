<?php

include('manage/connection.php');
include("manage/session.php");

$SrNo = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM   sector_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>