<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$sector_name = $_GET['sector_name'];

// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into sector_setup (sector_name, status) values ('$sector_name','Active')");

?>