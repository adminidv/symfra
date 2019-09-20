<?php

include('database_connection.php');

if(isset($_POST["empOrganization"]))
{
  $query = "
   UPDATE employmenthistory 
   SET empOrganization = '".$_POST["empOrganization"]."', empDesignation = '".$_POST["empDesignation"]."', empDuration = '".$_POST["empDuration"]."', empSalary = '".$_POST["empSalary"]."'
   WHERE SrNo = '".$_POST["SrNo"]."'
   ";
 
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>