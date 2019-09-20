<?php

include('database_connection.php');

if(isset($_POST["bnkName"]))
{
  $query = "
   UPDATE custFinanceDetails 
   SET bnkName = '".$_POST["bnkName"]."', bnkBranch = '".$_POST["bnkBranch"]."', bnkCity = '".$_POST["bnkCity"]."', bnkCountry = '".$_POST["bnkCountry"]."', bnkAccN = '".$_POST["bnkAccN"]."', bnkAcc = '".$_POST["bnkAcc"]."', crDays = '".$_POST["crDays"]."', crAmount = '".$_POST["crAmount"]."'
   WHERE SrNo = '".$_POST["SrNo"]."'
   ";
 
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>