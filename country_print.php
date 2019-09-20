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
// $searchRecord = $_GET["searchRecord"];
// $run= mysqli_query($con, $searchRecord);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Country Table </title>
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
                                  <th>Country Code</th>
                                  <th>Country Name</th>
                                  <th>Region</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          <?php

                                  include 'manage/connection.php';

                                  $selectcount = mysqli_query($con, "select * from country_setup ");

                                  ?>
                          <?php

                                while ($rowcount = mysqli_fetch_array($selectcount))
                                {
                                ?>
                        <tr>
                          
                          <td><?php echo $rowcount['country_code']; ?></td>
                          <td><?php echo $rowcount['country_name']; ?></td>
                          <td><?php echo $rowcount['country_region']; ?></td>
                          <td><?php echo $rowcount['status']; ?></td>
                        </tr>
                        <?php
                          }
                          ?>

                      </tbody>  
</table>

</body>
</html>