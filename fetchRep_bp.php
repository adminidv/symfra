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

$query = "SELECT * FROM bprepdetails WHERE custMCode='1111' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table id="eduTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
  <thead>
    <tr>
     <th>Rep. Name</th>
     <th>Designation</th>
     <th>Personal Contact #</th>
     <th>Official Contact #</th>
     <th>Email ID</th>
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
     <td class="editRep" id="'.$row["SrNo"].'">'.$row["repName"].'</td>
     <td>'.$row["repDesig"].'</td>
     <td>'.$row["repPerCn"].'</td>
     <td>'.$row["repPeroff"].'</td>
     <td>'.$row["repEmail"].'</td>
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