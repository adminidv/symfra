<?php

include('manage/connection.php');
include("manage/session.php");

$role_ID = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM roles WHERE role_ID = '$role_ID' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>