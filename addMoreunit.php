<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$title = $_GET['title'];

$insertQuery = mysqli_query($con, "insert into  unit (title,status) values ('$title','$status')");

?>