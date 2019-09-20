<?php

include('manage/connection.php');
include("manage/session.php");

// $subAgent = $_GET['subAgent'];

$selectAWA = mysqli_query($con, "SELECT * FROM invoice_setup ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowAWA = mysqli_fetch_array($selectAWA))
{
   //echo $rowCountry["subpartyname"];
    echo '<option value="'.$rowAWA['inv_name'].'">'.$rowAWA['inv_name'].'</option>';
}


// $updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$subAgent' ") or die(mysqli_error($con));
// // echo $reg_code;
// while ($rowCountry = mysqli_fetch_array($updateQuery1))
// {
//    echo $rowCountry["cmpStreet"] . ', ' . $rowCountry["cmpCity"] . ', ' . $rowCountry["cmpCountry"] ;
// } 


?>