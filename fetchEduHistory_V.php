<?php

// include('hr_add_emp_info_UE.php');
// userNo
include('database_connection.php');
$empNo = $_GET['empNo'];
// echo $empNo;

echo '<link rel="stylesheet" type="text/css" href="css/usertable.css">';
echo '<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">';
echo '<script src="js/jquery.dataTables.min.js"></script>';

echo "<script>
      $(document).ready(function() {
      $('#eduTable').DataTable();
     
    });
  </script>";

$query = "SELECT * FROM empeducation WHERE empNo='$empNo' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table id="eduTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
  <thead>
    <tr>
     <th>Degree</th>
     <th>Institution</th>
     <th>GPA</th>
     <th>Year</th>
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
     <td>'.$row["empDegree"].'</td>
     <td>'.$row["empInstitute"].'</td>
     <td>'.$row["empGPA"].'</td>
     <td>'.$row["empYear"].'</td>
     <td><button type="button" disabled class="editEduHst" id="'.$row["SrNo"].'">Edit</button></td>
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