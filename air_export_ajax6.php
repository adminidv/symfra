<?php

include('manage/connection.php');
include("manage/session.php");

$soNo = $_GET['soNo'];

// $updateQuery1 = mysqli_query($con, "SELECT * FROM saleorders WHERE SrNo = '$soNo' ") or die(mysqli_error($con));
// // echo $reg_code;
// while ($rowCountry = mysqli_fetch_array($updateQuery1))
// {
//    //echo $rowCountry["subpartyname"];
//     echo $rowCountry['salePcs'];
// } 



$updateQuery1 = mysqli_query($con, "SELECT * FROM saleorders WHERE soNo = '$soNo' ") or die(mysqli_error($con));
// echo $reg_code;
$row = mysqli_fetch_array($updateQuery1);  
echo json_encode($row);  


?>