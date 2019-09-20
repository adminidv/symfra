<?php

include('manage/connection.php');
include("manage/session.php");

$subAgent = $_GET['subAgent'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$subAgent' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
   echo $rowCountry["cmpTitle"];
   // echo $rowCountry["cmpStreet"] . ', ' . $rowCountry["cmpCity"] . ', ' . $rowCountry["cmpCountry"] ;
} 

?>