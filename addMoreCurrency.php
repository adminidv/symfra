<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$cur_coun_name = $_GET['cur_coun_name'];
$cur_name = $_GET['cur_name'];
$cur_code = $_GET['cur_code'];
$cur_symbol = $_GET['cur_symbol'];



// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into currency_setup (cur_coun_name, cur_name, cur_code, cur_symbol, status) values ('$cur_coun_name', '$cur_name', '$cur_code', '$cur_symbol', 'Active')");

?>