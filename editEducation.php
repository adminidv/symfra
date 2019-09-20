<?php

include('database_connection.php');

$query = "
SELECT * FROM empeducation 
WHERE SrNo = '".$_POST["SrNoEdu"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['empDegree'] = $row["empDegree"];
 $output['empInstitute'] = $row["empInstitute"];
 $output['empGPA'] = $row["empGPA"];
 $output['empYear'] = $row["empYear"];
}

echo json_encode($output);

?>