<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$spo_name = $_GET['spo_name'];
$spo_description = $_GET['spo_description'];

// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into spo_setup (spo_name,spo_description, status) values ('$spo_name','$spo_description' ,'Active')");

?>