<?php

include('manage/connection.php');
include("manage/session.php");

$dest_code = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM destination_setup WHERE dest_code = '$dest_code' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>