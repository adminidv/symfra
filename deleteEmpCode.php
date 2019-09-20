<?php

include('manage/connection.php');

if(isset($_GET["empNo"]))
{
  $query = "UPDATE empinfo SET savedStatus='Inactive' WHERE empNo = '".$_GET["empNo"]."' ";
  $statement = $con->prepare($query);
  $statement->execute();

  // echo $_GET["empNo"];
 
}

echo "Done";

?>