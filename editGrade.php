<?php

include('database_connection.php');

$query = "
SELECT * FROM graderank 
WHERE SrNo = '".$_POST["SrNoGrd"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['gradeTitle'] = $row["gradeTitle"];
 $output['gradeFrom'] = $row["gradeFrom"];
 $output['gradeTo'] = $row["gradeTo"];
}

echo json_encode($output);

?>