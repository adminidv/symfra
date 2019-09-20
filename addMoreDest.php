<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$dest_code = $_GET['dest_code'];
$dest_name = $_GET['dest_name'];
$dest_sector = $_GET['dest_sector'];
$dest_country = $_GET['dest_country'];

// Inserting the records in DB
$insertQuery = mysqli_query($con, "INSERT INTO destination_setup (dest_code, dest_name, dest_sector, dest_country, status) VALUES ('$dest_code', '$dest_name', '$dest_sector', '$dest_country', 'Active') ");

?>