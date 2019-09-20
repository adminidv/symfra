<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$reg_code = $_GET['reg_code'];
$reg_name = $_GET['reg_name'];


// Inserting the records in DB
$insertQuery = mysqli_query($con, "insert into region_setup (reg_code, reg_name, status) values ('$reg_code', '$reg_name', 'Active')");

?>