<?php

include('manage/connection.php');

if(isset($_POST["empOrg"]))
{
 $empOrg = $_POST["empOrg"];
 $empDesig = $_POST["empDesig"];
 $empDuration = $_POST["empDuration"];
 $empSalary = $_POST["empSalary"];
$empNo = $_POST["empNo"];
 $query = '';
 $query .= '
   INSERT INTO employmenthistory(empNo, empOrganization, empDesignation, empDuration, empSalary) 
   VALUES("'.$empNo.'", "'.$empOrg.'", "'.$empDesig.'", "'.$empDuration.'", "'.$empSalary.'"); 
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