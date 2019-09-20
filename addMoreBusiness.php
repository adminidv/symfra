<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$bus_sec_name = $_GET['bus_sec_name'];
$commodities = $_GET['commodities'];



// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into  business_setup (bus_sec_name, commodities,  status) values ('$bus_sec_name', '$commodities',  'Active')");

?>