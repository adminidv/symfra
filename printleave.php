<?php

include 'manage/connection.php';
// $rowDept = $_GET["rowDept"];
// $run= mysqli_query($con, $rowDept);

// For search result field customization
/*$selectUM = mysqli_query($con, 'SELECT * FROM tableview_UM');

while ($rowUM = mysqli_fetch_array($selectUM))
{
  $userID_UM = $rowUM['userID_UM'];
  $userName_UM = $rowUM['userName_UM'];
  $userAddress_UM = $rowUM['userAddress_UM'];
  $userContact_UM = $rowUM['userContact_UM'];
  $userEmail_UM = $rowUM['userEmail_UM'];
  $userDept_UM = $rowUM['userDept_UM'];
  $userDesig_UM = $rowUM['userDesig_UM'];
  $userRole_UM = $rowUM['userRole_UM'];
  $userRegion_UM = $rowUM['userRegion_UM'];
  $userDOB_UM = $rowUM['userDOB_UM'];
  $userDOJ_UM = $rowUM['userDOJ_UM'];
  $userDOL_UM = $rowUM['userDOL_UM'];
}*/

?>

<!DOCTYPE html>
<html>
<head>
  <title>usertable2</title>
  <style type="text/css">
  .abc {

  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.abc td, .abc th {
  border: 1px solid #ddd;
  padding: 8px;
}

.abc th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fff;
  color: black;
}

  }
  </style>

<script type="text/javascript">
  window.onload = function() {
   window.print(); 
 }
</script>

<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();
}
</script>

</head>
<body onload="window.print()">
  <table class="abc">
    <thead>
                                  <tr>
                                   <!-- <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" />Select All </th> -->
                                  <th>Emp ID</th>
                                  <th>Week Day</th>
                                  <th>leave Type</th>
                                  <th>Hours</th>
                                  <th>Approved By</th>
                                  <th>Cancelled By</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          <?php

                                  include 'manage/connection.php';

                                  $selectlea = mysqli_query($con, "select * from leavemanagement ");

                                  ?>
                          <?php

                                while ($data = mysqli_fetch_array($selectlea))
                                {
                                  $empID = $data['empID'];
                                  $weekDate = $data['weekDate'];
                                  $leaveType = $data['leaveType'];
                                  $hoursTaken = $data['hoursTaken'];
                                  $approvedBy = $data['approvedBy'];
                                  $leaveReason = $data['leaveReason'];
                                  $status = $data['status'];

                                ?>
                        <tr>
                          
                          <td><?php echo $empID; ?></td>
                          <td><?php echo $weekDate; ?></td>
                          <td><?php echo $leaveType; ?></td>
                          <td><?php echo $hoursTaken; ?></td>
                          <td><?php echo $approvedBy; ?></td>
                          <td><?php echo $leaveReason; ?></td>
                          <td><?php echo $status; ?></td>
                        </tr>
                        <?php
                          }
                          ?>

                      </tbody>  
</table>

</body>
</html>
