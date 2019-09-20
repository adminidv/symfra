<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$name = $_GET['name'];

$insertQuery = mysqli_query($con, "insert into  pro_setup_commodity (name,status) values ('$name','$status')");

?>