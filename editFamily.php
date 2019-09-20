<?php

include('database_connection.php');

$query = "
SELECT * FROM familyinfo 
WHERE SrNo = '".$_POST["SrNo"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['famTitle'] = $row["famTitle"];
 $output['famRelation'] = $row["famRelation"];
 $output['famDOB'] = $row["famDOB"];
 $output['famContanct'] = $row["famContanct"];
}

echo json_encode($output);

?>