<?php

include('database_connection.php');

$query = "
SELECT * FROM employmenthistory 
WHERE SrNo = '".$_POST["SrNo"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['empOrganization'] = $row["empOrganization"];
 $output['empDesignation'] = $row["empDesignation"];
 $output['empDuration'] = $row["empDuration"];
 $output['empSalary'] = $row["empSalary"];
}

echo json_encode($output);

?>