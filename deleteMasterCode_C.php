<?php

include('manage/connection.php');

if(isset($_GET["newCode"]))
{
  $query = "UPDATE custmaster SET cmpStatus='Inactive' WHERE newCode = '".$_GET["newCode"]."' ";
  $statement = $con->prepare($query);
  $statement->execute();

  // echo $_GET["newCode"];
 
}

echo "Done";

?>