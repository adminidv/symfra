<?php

include('manage/connection.php');
include("manage/session.php");

// Add Change log
//login user
$loginUser1= $_SESSION['user'];
// Today date func
$todayDate1 = date("Y-m-d");

// for Change log ID Add
$selectSrNo = mysqli_query($con, "SELECT * FROM sector_setup ORDER BY SrNo DESC LIMIT 1");
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
$city_code = $_GET['city_code'];
$city_name = $_GET['city_name'];
$country_name = $_GET['country_name'];
$city_tel_code = $_GET['city_tel_code'];

$insertQuery = mysqli_query($con, "insert into  city_setup (city_code, city_name, country_name, city_tel_code,  status) values ('$city_code', '$city_name', '$country_name', '$city_tel_code',  'Active')");


 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'City', '$SrNo1', '$loginUser1', '$todayDate1') ");

?>