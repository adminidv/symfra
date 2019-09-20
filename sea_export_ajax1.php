<?php

include('manage/connection.php');
include("manage/session.php");

$comName = $_GET['comName'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM pro_setup_commodity WHERE SrNo = '$comName' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
   echo $rowCountry["pro_name"];
} 

?>