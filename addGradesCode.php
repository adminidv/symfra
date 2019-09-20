<?php

include('manage/connection.php');

if(isset($_POST["gradeTitle"]))
{
 $gradeTitle = $_POST["gradeTitle"];
 $gradeFrom = $_POST["gradeFrom"];
 $gradeTo = $_POST["gradeTo"];
 $query = '';
 for($count = 0; $count<count($gradeTitle); $count++)
 {
  $gradeTitle_clean = mysqli_real_escape_string($con, $gradeTitle[$count]);
  $gradeFrom_clean = mysqli_real_escape_string($con, $gradeFrom[$count]);
  $gradeTo_clean = mysqli_real_escape_string($con, $gradeTo[$count]);
  if($gradeTitle_clean != '' && $gradeFrom_clean != '' && $gradeTo_clean != '')
  {
   $query .= '
   INSERT INTO graderank(gradeTitle, gradeFrom, gradeTo) 
   VALUES("'.$gradeTitle_clean.'", "'.$gradeFrom_clean.'", "'.$gradeTo_clean.'"); 
   ';
  }
 }
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