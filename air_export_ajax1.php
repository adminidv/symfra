<?php

include('manage/connection.php');
include("manage/session.php");

$chargeCode = $_GET['chargeCode'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM mop_setup WHERE SrNo = '$chargeCode' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
   echo $rowCountry["mop_p_c"];
} 

?>