<?php

include('database_connection.php');

if(isset($_POST["empDegree"]))
{
  $query = "
   UPDATE empeducation 
   SET empDegree = '".$_POST["empDegree"]."', empInstitute = '".$_POST["empInstitute"]."', empGPA = '".$_POST["empGPA"]."', empYear = '".$_POST["empYear"]."'
   WHERE SrNo = '".$_POST["SrNoEdu"]."'
   ";
 
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>