<?php

include('manage/connection.php');

if(isset($_POST["eduDegree"]))
{
 $empDegree = $_POST["eduDegree"];
 $empInstitute = $_POST["eduInst"];
 $empGPA = $_POST["eduGPA"];
 $empYear = $_POST["eduYear"];
 $empNo = $_POST["empNo"];
 $query = '';
 $query .= '
   INSERT INTO empEducation(empNo, empDegree, empInstitute, empGPA, empYear) 
   VALUES("'.$empNo.'", "'.$empDegree.'", "'.$empInstitute.'", "'.$empGPA.'", "'.$empYear.'"); 
   ';
 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
   echo 'Education Inserted';
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