<?php

include('manage/connection.php');

if(isset($_POST["repName"]))
{
 $repName = $_POST["repName"];
 $repDesig = $_POST["repDesig"];
 $repPerCn = $_POST["repPerCn"];
 $repPeroff = $_POST["repPeroff"];
 $newCode = $_POST["newCode"];
 $query = '';
 $query .= '
   INSERT INTO vendorrepdetails(repName, repDesig, repPerCn, repPeroff, custMCode) 
   VALUES("'.$repName.'", "'.$repDesig.'", "'.$repPerCn.'", "'.$repPeroff.'", "'.$custMCode.'"); 
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
?>