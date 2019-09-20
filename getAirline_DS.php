<?php

include('manage/connection.php');
include("manage/session.php");

$awbNo = $_GET['awbNo'];

list($awb_code, $awb_no) = explode('-', $awbNo);
// $first = 'hello';
// $second = 'world';

$selectAirlineID = mysqli_query($con, "SELECT * FROM airway_billable WHERE awb_code='$awb_code' AND awb_no='$awb_no' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowAirlineID = mysqli_fetch_array($selectAirlineID))
{
   //echo $rowCountry["subpartyname"];
   $airlineID = $rowAirlineID["airline_name"];
} 


$selectAirlineName = mysqli_query($con, "SELECT * FROM airline_setup WHERE SrNo = '$airlineID' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowAirlineName = mysqli_fetch_array($selectAirlineName))
{
   // echo $rowCountry["cmpTitle"];
   echo '<option value="'.$rowAirlineName["air_name"].'">'.$rowAirlineName["air_name"].'</option>';
} 


// $updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$subAgent' ") or die(mysqli_error($con));
// // echo $reg_code;
// while ($rowCountry = mysqli_fetch_array($updateQuery1))
// {
//    echo $rowCountry["cmpStreet"] . ', ' . $rowCountry["cmpCity"] . ', ' . $rowCountry["cmpCountry"] ;
// } 


?>