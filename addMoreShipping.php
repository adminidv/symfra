<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$ship_code = $_GET['ship_code'];
$ship_name = $_GET['ship_name'];

// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into shipping_setup (ship_code,ship_name, status) values ('$ship_code','$ship_name' ,'Active')");

?>