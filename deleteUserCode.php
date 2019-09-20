<?php

include('manage/connection.php');

if(isset($_GET["user_id"]))
{
  $query = "UPDATE users SET user_status='Inactive' WHERE user_ID = '".$_GET["user_id"]."' ";
  $statement = $con->prepare($query);
  $statement->execute();

  // echo $_GET["empNo"];
 
}

echo "Done";

?>