<?php

include('database_connection.php');

if(isset($_POST["famTitle"]))
{
  $query = "
   UPDATE familyinfo 
   SET famTitle = '".$_POST["famTitle"]."', famRelation = '".$_POST["famRelation"]."', famDOB = '".$_POST["famDOB"]."', famContanct = '".$_POST["famContanct"]."'
   WHERE SrNo = '".$_POST["SrNo"]."'
   ";
 
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>