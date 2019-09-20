<?php

include('database_connection.php');

echo '<link rel="stylesheet" type="text/css" href="css/usertable.css">';
echo '<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">';
echo '<script src="js/jquery.dataTables.min.js"></script>';

echo "<script>
      $(document).ready(function() {
      $('#docTable').DataTable();
     
    });
  </script>";

$query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
<table id="docTable" class="display dataTable no-footer emp_hr_tbles" style="width:100%">
  <thead>
    <tr>
      <th>Sr. No</th>
      <th>Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  <thead>
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
     <td>'.$count.'</td>
     <td><img src="files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
     <td>'.$row["image_name"].'</td>
     <td>'.$row["image_description"].'</td>
     <td><button type="button" class="edit" id="'.$row["image_id"].'">Edit</button></td>
     <td><button type="button" class="delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
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