<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$country_code = $_GET['country_code'];
$country_name = $_GET['country_name'];
$country_region = $_GET['country_region'];

$insertQuery = mysqli_query($con, "insert into country_setup (country_code, country_name, country_region, status) values ('$country_code', '$country_name', '$country_region',  'Active')");

?>