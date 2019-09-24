<?php

include('manage/connection.php');
include("manage/session.php");


// Add Change log
//login user
$loginUser1= $_SESSION['user'];
// Today date func
$todayDate1 = date("Y-m-d");

// for Change log ID Add
$selectSrNo = mysqli_query($con, "SELECT * FROM mop_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
  $newSrNo1 = $SrNo + 1;
  $SrNo1 = $newSrNo1;

}

// For Change Log Record
$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$SrNo' ORDER BY instance DESC LIMIT 1  ");
  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

  $lastID1 = $rowLastID1['instance'];
  $newID1 = $lastID1 + 1;
  $instance = $newID1;


// Fetching the variables from coming file
$mop_code = $_GET['mop_code'];
$mop_description = $_GET['mop_description'];
$mop_p_c = $_GET['mop_p_c'];


// Inserting the records in DB
// $insertQuery = mysqli_query($con, "INSERT INTO spo_setup (spo_name, spo_description, status) VALUES ('$spo_name', '$spo_description',', 'Active') ") or die(mysqli_error($con));

$insertQuery = mysqli_query($con, "insert into mop_setup (mop_code, mop_description, mop_p_c, status) values ('$mop_code', '$mop_description', '$mop_p_c', 'Active')") or die(mysqli_error($con));

$insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'MOP', '$SrNo1', '$loginUser1', '$todayDate1') ") or die(mysqli_error($con));

?>