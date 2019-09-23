<?php

include('manage/connection.php');

if(isset($GET["rel_id"]))
{
  $query = "DELETE FROM emprelation WHERE rel_id = '".$GET["rel_id"]."' ";
  $statement = $connect->prepare($query);
  $statement->execute();
 
}

echo "Working";

?>