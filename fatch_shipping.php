<?php

include('manage/connection.php');
include("manage/session.php");

$ship_code = $_GET['employee_id'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM   shipping_setup WHERE ship_code = '$ship_code' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  

?>