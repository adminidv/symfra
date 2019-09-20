<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, $searchRecord);

// For search result field customization
$selectEM = mysqli_query($con, 'SELECT * FROM table_em');

while ($rowEM = mysqli_fetch_array($selectEM))
{
              $empNo_em= $rowEM['empNo_em'];
              $cnicNo_em = $rowEM['cnicNo_em'];
              $ntnNo_em = $rowEM['ntnNo_em'];
              $empName_em = $rowEM['empName_em'];
              $empGrdName_em = $rowEM['empGrdName_em'];
              $empDOB_em = $rowEM['empDOB_em'];
              $empCell_em = $rowEM['empCell_em'];
              $empOffice_em = $rowEM['empOffice_em'];
              $empHomeNo_em = $rowEM['empHomeNo_em'];
              $empEmergencyNo_em = $rowEM['empEmergencyNo_em'];
              $empMaritalStatus_em = $rowEM['empMaritalStatus_em'];
              $empSpouseName_em = $rowEM['empSpouseName_em'];
              $empChildren_em= $rowEM['empChildren_em'];
              $empDept_em = $rowEM['empDept_em'];
              $empDesig_em = $rowEM['empDesig_em'];
              $empGrade_em = $rowEM['empGrade_em'];
              $empEntity_em = $rowEM['empEntity_em'];
              $lineManager_em = $rowEM['lineManager_em'];
              $empCountry_em = $rowEM['empCountry_em'];
              $empCity_em = $rowEM['empCity_em'];
              $empAddress_em = $rowEM['empAddress_em'];
              $empDOJ_em = $rowEM['empDOJ_em'];
              $empWorkEmail_em = $rowEM['empWorkEmail_em'];
              $empGender_em = $rowEM['empGender_em'];
              $leavePckg_em = $rowEM['leavePckg_em'];
              $savedStatus_em = $rowEM['savedStatus_em'];
          }

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
          <tr>                   
          <?php
          if ($empNo_em == 1)
          {
          ?>
          <th>User ID</th>
          <?php
          }
          ?>

          <?php
          if ($empName_em == 1)
          {
          ?>
          <th>User Name</th>
          <?php
          }
          ?>

          <?php
          if ($empGrdName_em == 1)
          {
          ?>
          <th>Father Name</th>
          <?php
          }
          ?>

          <?php
          if ($empCell_em == 1)
          {
          ?>
          <th>Contact No.</th>
          <?php
          }
          ?>
          <?php
          if ($empOffice_em == 1)
          {
          ?>
          <th>Office No.</th>
          <?php
          }
          ?>
          <?php
          if ($empHomeNo_em == 1)
          {
          ?>
          <th>Home No.</th>
          <?php
          }
          ?>
          <?php
          if ($empEmergencyNo_em == 1)
          {
          ?>
          <th>Emergency No.</th>
          <?php
          }
          ?>

          <?php
          if ($empWorkEmail_em == 1)
          {
          ?>
          <th>Email ID</th>
          <?php
          }
          ?>

          <?php
          if ($empDept_em == 1)
          {
          ?>
          <th>Department</th>
          <?php
          }
          ?>

          <?php
          if ($empDesig_em == 1)
          {
          ?>
          <th>Designation</th>
          <?php
          }
          ?>

          <?php
          if ($empEntity_em == 1)
          {
          ?>
          <th>Entity</th>
          <?php
          }
          ?>

          <?php
          if ($empGrade_em == 1)
          {
          ?>
          <th>Grade</th>
          <?php
          }
          ?>

          <?php
          if ($empDOB_em == 1)
          {
          ?>
          <th>Date of Birth</th>
          <?php
          }
          ?>

          <?php
          if ($empDOJ_em == 1)
          {
          ?>
          <th>Date of Joining</th>
          <?php
          }
          ?>

          <?php
          if ($leavePckg_em == 1)
          {
          ?>
          <th>Leave Pakage</th>
          <?php
          }
          ?>

          <?php
          if ($ntnNo_em == 1)
          {
          ?>
          <th>NTN Number</th>
          <?php
          }
          ?>
          <?php
          if ($cnicNo_em == 1)
          {
          ?>
          <th>CNIC Number</th>
          <?php
          }
          ?>
          <?php
          if ($empGender_em == 1)
          {
          ?>
          <th>Gender</th>
          <?php
          }
          ?>
          <?php

          if ($empAddress_em == 1)
          {
          ?>
          <th>Adddress</th>
          <?php
          }
          ?>
          <?php
          if ($empCity_em == 1)
          {
          ?>
          <th>City</th>
          <?php
          }
          ?>
          <?php
          if ($empCountry_em == 1)
          {
          ?>
          <th>Country</th>
          <?php
          }
          ?>
          <?php
          if ($lineManager_em == 1)
          {
          ?>
          <th>Manager</th>
          <?php
          }
          ?>
          <?php
          if ($empSpouseName_em == 1)
          {
          ?>
          <th>Spouse Name</th>
          <?php
          }
          ?>
          <?php
          if ($empChildren_em == 1)
          {
          ?>
          <th>Children</th>
          <?php
          }
          ?>
          <?php
          if ($empMaritalStatus_em == 1)
          {
          ?>
          <th>Marital Status</th>
          <?php
          }
          ?>
          
      </tr>
    </thead>
    <tbody>
<?php

while ($data = mysqli_fetch_array($run))
{
  $empNo = $data['empNo'];
  $empName = $data['empName']; 
  $empGrdName = $data['empGrdName'];
  $empAddress = $data['empAddress'];
  $empCell = $data['empCell'];
  $empOffice = $data['empOffice'];
  $empHomeNo = $data['empHomeNo'];
  $empEmergencyNo = $data['empEmergencyNo']; 
  $cnicNo = $data['cnicNo'];
  $empDept = $data['empDept'];
  $empDesig = $data['empDesig'];
  $ntnNo = $data['ntnNo'];
  $empDOB = $data['empDOB'];
  $empDOJ = $data['empDOJ'];
  $empMaritalStatus = $data['empMaritalStatus'];
  $empSpouseName = $data['empSpouseName'];
  $empChildren = $data['empChildren'];
  $empGrade = $data['empGrade'];
  $empEntity = $data['empEntity'];
  $lineManager = $data['lineManager'];
  $empCountry = $data['empCountry'];
  $empCity = $data['empCity'];
  $empWorkEmail = $data['empWorkEmail'];
  $empGender = $data['empGender'];
  $leavePckg = $data['leavePckg'];
  ?>

 <tr>                   
          <?php
          if ($empNo_em == 1)
          {
          ?>
          <th><?php echo $empNo; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empName_em == 1)
          {
          ?>
          <th><?php echo $empName; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empGrdName_em == 1)
          {
          ?>
          <th><?php echo $empGrdName; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empCell_em == 1)
          {
          ?>
          <th><?php echo $empCell; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empOffice_em == 1)
          {
          ?>
          <th><?php echo $empOffice; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empHomeNo_em == 1)
          {
          ?>
          <th><?php echo $empHomeNo; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empEmergencyNo_em == 1)
          {
          ?>
          <th><?php echo $empEmergencyNo; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empWorkEmail_em == 1)
          {
          ?>
          <th><?php echo $empWorkEmail; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empDept_em == 1)
          {
          ?>
          <th><?php echo $empDept; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empDesig_em == 1)
          {
          ?>
          <th><?php echo $empDesig; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empEntity_em == 1)
          {
          ?>
          <th><?php echo $empEntity; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empGrade_em == 1)
          {
          ?>
          <th><?php echo $empGrade; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empDOB_em == 1)
          {
          ?>
          <th><?php echo $empDOB; ?></th>
          <?php
          }
          ?>

          <?php
          if ($empDOJ_em == 1)
          {
          ?>
          <th><?php echo $empDOJ; ?></th>
          <?php
          }
          ?>

          <?php
          if ($leavePckg_em == 1)
          {
          ?>
          <th><?php echo $leavePckg; ?></th>
          <?php
          }
          ?>

          <?php
          if ($ntnNo_em == 1)
          {
          ?>
          <th><?php echo $ntnNo; ?></th>
          <?php
          }
          ?>
          <?php
          if ($cnicNo_em == 1)
          {
          ?>
          <th><?php echo $cnicNo; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empGender_em == 1)
          {
          ?>
          <th><?php echo $empGender; ?></th>
          <?php
          }
          ?>
          <?php

          if ($empAddress_em == 1)
          {
          ?>
          <th><?php echo $empAddress; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empCity_em == 1)
          {
          ?>
          <th><?php echo $empCity; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empCountry_em == 1)
          {
          ?>
          <th><?php echo $empCountry; ?></th>
          <?php
          }
          ?>
          <?php
          if ($lineManager_em == 1)
          {
          ?>
          <th><?php echo $lineManager; ?>r</th>
          <?php
          }
          ?>
          <?php
          if ($empSpouseName_em == 1)
          {
          ?>
          <th><?php echo $empSpouseName; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empChildren_em == 1)
          {
          ?>
          <th><?php echo $empChildren; ?></th>
          <?php
          }
          ?>
          <?php
          if ($empMaritalStatus_em == 1)
          {
          ?>
          <th><?php echo $empMaritalStatus; ?></th>
          <?php
          }
          ?>
          
      </tr>
  <?php

}

?>
                     
</tbody>
</table>

</body>
</html>