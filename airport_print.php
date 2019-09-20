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
  <title>Currency Table</title>
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
                                 <th>Airport Name</th>
                                   <th>IATA Code</th>
                                   <th>Country Name</th>
                                   <th>City Name</th>
                                   <th>Person Name</th>
                                   <th>Phone No.</th>
                                   <th>Office No.</th>
                                   <th>fax No.</th>
                                   <th>Email</th>
                                   <th>Wesite</th>
                                   <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                          
                                $selectairport= mysqli_query($con, "SELECT * FROM  airport_setup");

                                while ($rowairport = mysqli_fetch_array($selectairport))
                                {
                                ?>
                        <tr>
                          
                         <td><?php echo $rowairport['airport_name']; ?></td>
                          <td><?php echo $rowairport['airport_iata']; ?></td>
                          <td><?php echo $rowairport['country_name']; ?></td>
                          <td><?php echo $rowairport['city_name']; ?></td>
                          <td><?php echo $rowairport['contact_name']; ?></td>
                          <td><?php echo $rowairport['cont_per_no']; ?></td>
                          <td><?php echo $rowairport['cont_per_off']; ?></td>
                          <td><?php echo $rowairport['fax_no']; ?></td>
                          <td><?php echo $rowairport['email']; ?></td>
                          <td><?php echo $rowairport['website']; ?></td>
                          <td><?php echo $rowairport['status']; ?></td>
                        </tr>
                        <?php
                          }
                          ?>

                      </tbody>  
</table>

</body>
</html>