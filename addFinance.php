<?php

include('manage/connection.php');

if(isset($_POST["bnkNameS"]))
{
 $bnkName = $_POST["bnkNameS"];
 $bnkBranch = $_POST["bnkBranchS"];
 $bnkCity = $_POST["bnkCityS"];
 $bnkCountry = $_POST["bnkCountryS"];
 $bnkAccN = $_POST["bnkAccNS"];
 $bnkAcc = $_POST["bnkAccS"];
 $crDays = $_POST["crDaysS"];
 $crAmount = $_POST["crAmountS"];
 $custMCode = $_POST["custMCodeS"];
 $query = '';
 $query .= '
   INSERT INTO custFinancedetails(bnkName, bnkBranch, bnkCity, bnkCountry, bnkAccN, bnkAcc, crDays, crAmount, custMCode) 
   VALUES("'.$bnkName.'", "'.$bnkBranch.'", "'.$bnkCity.'", "'.$bnkCountry.'", "'.$bnkAccN.'", "'.$bnkAcc.'", "'.$crDays.'", "'.$crAmount.'", "'.$custMCode.'"); 
   ';
 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
   echo 'Finance Details Inserted';
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