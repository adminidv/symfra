<?php

include('manage/connection.php');

if(isset($_POST["totalCarrier"]))
{ 
 $mawb_no = $_POST["mawb_No"];
 $totalCarrier = $_POST["totalCarrier"];
 $totalCAA = $_POST["totalCAA"];
 $totalAWC = $_POST["totalAWC"];
 $secCharges = $_POST["secCharges"];
 $secDD = $_POST["secDD"];
 $totalSec = $_POST["totalSec"];
 $fuelCharges = $_POST["fuelCharges"];
 $fuelDD = $_POST["fuelDD"];
 $totalFuel = $_POST["totalFuel"];
 $scanCharges = $_POST["scanCharges"];
 $scanDD = $_POST["scanDD"];
 $totalScan = $_POST["totalScan"];

 $query = '';

 $query .= '
   INSERT INTO dueCarriers (mawb_No, totalCarrier, totalCAA, totalAWC, secCharges, secDD, totalSec, fuelCharges, fuelDD, totalFuel, scanCharges, scanDD, totalScan) 
   VALUES("'.$mawb_no.'", "'.$totalCarrier.'", "'.$totalCAA.'", "'.$totalAWC.'", "'.$secCharges.'", "'.$secDD.'", "'.$totalSec.'", "'.$fuelCharges.'", "'.$fuelDD.'", "'.$totalFuel.'", "'.$scanCharges.'", "'.$scanDD.'", "'.$totalScan.'"); 
   ';

 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }

 else
 {
  echo 'All Fields are Required';
 }

}

// echo "Working.";
?>