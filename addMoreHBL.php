<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$hbl_desc = $_GET['hbl_desc'];

$insertQuery = mysqli_query($con, "insert into  hbl_setup (hbl_desc, status) values ('$hbl_desc', '$status')");

?>