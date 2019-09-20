<?php

include('manage/connection.php');

if(isset($_POST["awaFee"]))
{ 
 $mawb_no = $_POST["mawb_No"];
 $awaFee = $_POST["awaFee"];
 $awaCharges = $_POST["awaCharges"];
 $awaPrint = $_POST["awaPrint"];

 $query = '';

 $query .= '
   INSERT INTO dueAgentAirExp (mawb_no, awaFee, awaCharges, awaPrint) 
   VALUES("'.$mawb_no.'", "'.$awaFee.'", "'.$awaCharges.'", "'.$awaPrint.'"); 
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