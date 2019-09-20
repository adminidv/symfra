<?php

include('database_connection.php');

if(isset($_POST["gradeTitle"]))
{
  $query = "
   UPDATE graderank 
   SET gradeTitle = '".$_POST["gradeTitle"]."', gradeFrom = '".$_POST["gradeFrom"]."', gradeTo = '".$_POST["gradeTo"]."'
   WHERE SrNo = '".$_POST["SrNoGrd"]."'
   ";
 
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>