<?php

include('manage/connection.php');
include("manage/session.php");

$subAgent = $_GET['subAgent'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM sub_agents_parties_setup WHERE partyname = '$subAgent' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowCountry = mysqli_fetch_array($updateQuery1))
{
   //echo $rowCountry["subpartyname"];
    echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['subpartyname'].'</option>';
} 

?>