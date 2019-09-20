<?php

// include('hr_add_emp_info_UE.php');
// userNo
include('database_connection.php');
$newCodeC = $_GET['newCodeC'];
// echo $empNo;

echo '<link rel="stylesheet" type="text/css" href="css/usertable.css">';
echo '<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">';
echo '<script src="js/jquery.dataTables.min.js"></script>';

echo "<script>
      $(document).ready(function() {
      $('#eduTable').DataTable();
     
    });
  </script>";

$query = "SELECT * FROM bpfinancedetails WHERE custMCode='$newCodeC' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table id="eduTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
  <thead>
    <tr>
     <th>Bank Name</th>
     <th>Branch</th>
     <th>City</th>
     <th>Country</th>
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
     <td class="editFn" id="'.$row["SrNo"].'">'.$row["bnkName"].'</td>
     <td>'.$row["bnkBranch"].'</td>
     <td>'.$row["bnkCity"].'</td>
     <td>'.$row["bnkCountry"].'</td>
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