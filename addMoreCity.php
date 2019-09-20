<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$city_code = $_GET['city_code'];
$city_name = $_GET['city_name'];
$country_name = $_GET['country_name'];
$city_tel_code = $_GET['city_tel_code'];

$insertQuery = mysqli_query($con, "insert into  city_setup (city_code, city_name, country_name, city_tel_code,  status) values ('$city_code', '$city_name', '$country_name', '$city_tel_code',  'Active')");

?>