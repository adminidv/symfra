<?php

include('manage/connection.php');
include("manage/session.php");

$Desig_ID = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM designation WHERE Desig_ID = '$Desig_ID' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>