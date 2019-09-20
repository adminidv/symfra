<?php

include('manage/connection.php');
include("manage/session.php");

$dept_ID = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM  department WHERE dept_ID = '$dept_ID' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>