<?php

include('manage/connection.php');
include("manage/session.php");

$conName = $_GET['conName'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$conName' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
  echo $rowCountry["cmpStreet"] . ', ' . $rowCountry["cmpCity"] . ', ' . $rowCountry["cmpCountry"] ;
} 

?>