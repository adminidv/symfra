<?php

include('database_connection.php');
$empNo = $_GET['empNo'];

echo '<link rel="stylesheet" type="text/css" href="css/usertable.css">';
echo '<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">';
echo '<script src="js/jquery.dataTables.min.js"></script>';

echo "<script>
      $(document).ready(function() {
      $('#empTable').DataTable();
     
    });
  </script>";

$query = "SELECT * FROM employmenthistory WHERE empNo='$empNo' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
<table id="empTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
            <thead>
              <tr>
                <th>Organization</th>
                <th>Designation</th>
                <th>Duration</th>
                <th>Salary</th>
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
   <td>'.$row["empOrganization"].'</td>
   <td>'.$row["empDesignation"].'</td>
   <td>'.$row["empDuration"].'</td>
   <td>'.$row["empSalary"].'</td>
   <td><button type="button" disabled class="editEmpHst" id="'.$row["SrNo"].'">Edit</button></td>
   <td><button type="button" disabled class="delete" id="" data-image_name="">Delete</button></td>
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