<?php

include('manage/connection.php');
include("manage/session.php");

$comoCode = $_GET['comoCode'];

$selectCom = mysqli_query($con, "SELECT * FROM pro_setup_commodity WHERE SrNo = '$comoCode' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCom = mysqli_fetch_array($selectCom))
{
   echo $rowCom["pro_name"];
} 

?>