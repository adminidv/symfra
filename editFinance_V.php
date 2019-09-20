<?php

include('database_connection.php');

$query = "
SELECT * FROM vendorfinancedetails 
WHERE SrNo = '".$_POST["SrNoEdu"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 // $file_array = explode(".", $row["image_name"]);
 // $output['image_name'] = $file_array[0];
 $output['SrNo'] = $row["SrNo"];
 $output['bnkName'] = $row["bnkName"];
 $output['bnkBranch'] = $row["bnkBranch"];
 $output['bnkCity'] = $row["bnkCity"];
 $output['bnkCountry'] = $row["bnkCountry"];
 $output['bnkAccN'] = $row["bnkAccN"];
 $output['bnkAcc'] = $row["bnkAcc"];
 $output['crDays'] = $row["crDays"];
 $output['crAmount'] = $row["crAmount"];
}

echo json_encode($output);

?>