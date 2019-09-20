<?php

include('database_connection.php');

$query = "
SELECT * FROM custrepdetails 
WHERE SrNo = '".$_POST["SrNo"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['repName'] = $row["repName"];
 $output['repDesig'] = $row["repDesig"];
 $output['repPerCn'] = $row["repPerCn"];
 $output['repPeroff'] = $row["repPeroff"];
 $output['repEmail'] = $row["repEmail"];
}

echo json_encode($output);

?>