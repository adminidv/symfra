<?php

include('manage/connection.php');
include("manage/session.php");

// Fetching the variables from coming file
$pro_name = $_GET['pro_name'];
$pro_description = $_GET['pro_description'];

$insertQuery = mysqli_query($con, "insert into  pro_setup_commodity (pro_name, pro_description, pro_active_status) values ('$pro_name', '$pro_description', 'Active')");

?>