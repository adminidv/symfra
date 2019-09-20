<?php

include('database_connection.php');

$query = "SELECT * FROM graderank";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table class="table table-bordered table-striped">
  <tr>
   <th>Grade/Rank Title</th>
   <th>From</th>
   <th>To</th>
   <th>Edit</th>
   <th>Delete</th>
  </tr>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tr>
   <td>'.$row["gradeTitle"].'</td>
   <td>'.$row["gradeFrom"].'</td>
   <td>'.$row["gradeTo"].'</td>
   <td><button type="button" class="editGrdHst" id="'.$row["SrNo"].'">Edit</button></td>
   <td><button type="button" class="delete" id="" data-image_name="">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</table>';
echo $output;
?>