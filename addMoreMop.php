<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$mop_code = $_GET['mop_code'];
$mop_description = $_GET['mop_description'];
$mop_p_c = $_GET['mop_p_c'];


// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into mop_setup (mop_code, mop_description, mop_p_c, status) values ('$mop_code', '$mop_description', '$mop_p_c', 'Active')");

?>