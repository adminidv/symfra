<?php

include('manage/connection.php');

if(isset($_POST["famTitle"]))
{
 $famTitle = $_POST["famTitle"];
 $famRelation = $_POST["famRelation"];
 $famDOB = $_POST["famDOB"];
 $famContanct = $_POST["famContanct"];
 $empNo = $_POST["empNo"];
 $query = '';
 $query .= '
   INSERT INTO familyinfo(empID, famTitle, famRelation, famDOB, famContanct) 
   VALUES("'.$empNo.'", "'.$famTitle.'", "'.$famRelation.'", "'.$famDOB.'", "'.$famContanct.'"); 
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