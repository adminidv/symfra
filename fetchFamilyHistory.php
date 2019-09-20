<?php

include('database_connection.php');
$empNo = $_GET['empNo'];

echo '<link rel="stylesheet" type="text/css" href="css/usertable.css">';
echo '<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">';
echo '<script src="js/jquery.dataTables.min.js"></script>';

echo "<script>
      $(document).ready(function() {
      $('#famTable').DataTable();
    });
  </script>";

$query = "SELECT * FROM familyinfo WHERE empID='$empNo' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
<table id="famTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
            <thead>
              <tr>
                <th>Title</th>
                <th>Relation</th>
                <th>Date of Birth</th>
                <th>Contact</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tbody>
  <tr>
   <td>'.$row["famTitle"].'</td>
   <td>'.$row["famRelation"].'</td>
   <td>'.$row["famDOB"].'</td>
   <td>'.$row["famContanct"].'</td>
   <td><button type="button" class="editFamHst" id="'.$row["SrNo"].'">Edit</button></td>
   <td><button type="button" class="delete" id="" data-image_name="">Delete</button></td>
  </tr>
  </tbody>
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