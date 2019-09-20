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
 $selectDept = mysqli_query($con, "select * from custmaster ");

// Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM custmaster_cm');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $cmpType_CM = $rowUM['cmpType_CM'];
            $legCode_CM = $rowUM['legCode_CM'];
            $newCode_CM = $rowUM['newCode_CM'];
            $cmpTitle_CM = $rowUM['cmpTitle_CM'];
            $cmpStreet_CM = $rowUM['cmpStreet_CM'];
            $cmpCity_CM = $rowUM['cmpCity_CM'];
            $cmpCountry_CM = $rowUM['cmpCountry_CM'];
            $telCode_CM = $rowUM['telCode_CM'];
            $telNumber_CM = $rowUM['telNumber_CM'];
            $cmpWebsite_CM = $rowUM['cmpWebsite_CM'];
            $cmpEmail_CM = $rowUM['cmpEmail_CM'];
            $taxType_CM = $rowUM['taxType_CM'];
            $taxNo_CM = $rowUM['taxNo_CM'];
            $seaImport_CM = $rowUM['seaImport_CM'];
            $airImport_CM = $rowUM['airImport_CM'];
            $seaExport_CM = $rowUM['seaExport_CM'];
            $airExport_CM = $rowUM['airExport_CM'];
            $repName_CM = $rowUM['repName_CM'];
            $repDesig_CM = $rowUM['repDesig_CM'];
            $repOffCell_CM = $rowUM['repOffCell_CM'];
            $repPerCell_CM = $rowUM['repPerCell_CM'];
            $repEmail_CM = $rowUM['repEmail_CM'];
            $fnBnkName_CM = $rowUM['fnBnkName_CM'];
            $fnBnkBr_CM = $rowUM['fnBnkBr_CM'];
            $fnCity_CM = $rowUM['fnCity_CM'];
            $fnCountry_CM = $rowUM['fnCountry_CM'];
            $fnIban_CM = $rowUM['fnIban_CM'];
            $fnNonIban_CM = $rowUM['fnNonIban_CM'];
            $fnCrDays_CM = $rowUM['fnCrDays_CM'];
            $fnCrAmount_CM = $rowUM['fnCrAmount_CM'];
            $cmpStatus_CM = $rowUM['cmpStatus_CM'];
          }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Records</title>
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
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc">
    <thead>
                                  <tr>
                                   <!-- <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" />Select All </th> -->
                                 <?php
                                  if ($cmpType_CM == 1)
                                  {
                                  ?>
                                  <th>Company</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($legCode_CM == 1)
                                  {
                                  ?>
                                  <th>Legacy Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($newCode_CM == 1)
                                  {
                                  ?>
                                  <th>New Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpTitle_CM == 1)
                                  {
                                  ?>
                                  <th>Company Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpStreet_CM == 1)
                                  {
                                  ?>
                                  <th>Company Street</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpCity_CM == 1)
                                  {
                                  ?>
                                  <th>Company City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpCountry_CM == 1)
                                  {
                                  ?>
                                  <th>Company Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telCode_CM == 1)
                                  {
                                  ?>
                                  <th>Tel Code.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telNumber_CM == 1)
                                  {
                                  ?>
                                  <th>Tel No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpWebsite_CM == 1)
                                  {
                                  ?>
                                  <th>Company Website</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpEmail_CM == 1)
                                  {
                                  ?>
                                  <th>Company Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($taxType_CM == 1)
                                  {
                                  ?>
                                  <th>Tax Type</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($taxNo_CM == 1)
                                  {
                                  ?>
                                  <th>Tax No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaImport_CM == 1)
                                  {
                                  ?>
                                  <th>Sea Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airImport_CM == 1)
                                  {
                                  ?>
                                  <th>Air Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaExport_CM == 1)
                                  {
                                  ?>
                                  <th>Sea Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airExport_CM == 1)
                                  {
                                  ?>
                                  <th>Air Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repName_CM == 1)
                                  {
                                  ?>
                                  <th>Rep Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repDesig_CM == 1)
                                  {
                                  ?>
                                  <th>Rep Desg</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repOffCell_CM == 1)
                                  {
                                  ?>
                                  <th>Office no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repPerCell_CM == 1)
                                  {
                                  ?>
                                  <th>Cell no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repEmail_CM == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkName_CM == 1)
                                  {
                                  ?>
                                  <th>Bank Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkBr_CM == 1)
                                  {
                                  ?>
                                  <th>Branch Branch</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCity_CM == 1)
                                  {
                                  ?>
                                  <th>Office City</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCountry_CM == 1)
                                  {
                                  ?>
                                  <th>Office Country</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnIban_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Iban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnNonIban_CM == 1)
                                  {
                                  ?>
                                  <th>Finance NonIban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrDays_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Day</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrAmount_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Amount</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($cmpStatus_CM == 1)
                                  {
                                  ?>
                                  <th>Company Status</th>
                                  <?php
                                  }
                                  ?>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($searchRow= mysqli_fetch_array($selectDept))
                                {
                                  $cmpType = $searchRow['cmpType'];            
                                                $legCode = $searchRow['legCode']; 
                                                $cmpTitle = $searchRow['cmpTitle'];
                                                $newCode = $searchRow ['newCode'];
                                                $cmpStreet = $searchRow['cmpStreet'];
                                                $cmpCity = $searchRow['cmpCity'];
                                                $cmpCountry = $searchRow['cmpCountry'];
                                                $seaImport = $searchRow['seaImport'];
                                                $airImport = $searchRow['airImport'];
                                                $seaExport = $searchRow['seaExport'];
                                                $airExport = $searchRow['airExport'];
                                                $telCode = $searchRow['telCode'];
                                                $telNumber = $searchRow['telNumber'];
                                                $cmpWebsite = $searchRow['cmpWebsite'];
                                                $cmpEmail = $searchRow['cmpEmail'];
                                                $taxType = $searchRow['taxType'];
                                                $taxNo = $searchRow['taxNo'];
                                                $repName = $searchRow['repName'];
                                                $repDesig = $searchRow['repDesig'];
                                                $repOffCell = $searchRow['repOffCell'];
                                                $repPerCell = $searchRow['repPerCell'];
                                                $repEmail = $searchRow['repEmail'];
                                                $fnBnkName = $searchRow['fnBnkName'];
                                                $fnBnkBr = $searchRow['fnBnkBr'];
                                                $fnCity = $searchRow['fnCity'];
                                                $fnCountry = $searchRow['fnCountry'];
                                                $fnNonIban = $searchRow['fnNonIban'];
                                                $fnIban = $searchRow['fnIban'];
                                                $fnCrDays = $searchRow['fnCrDays'];
                                                $fnCrAmount = $searchRow['fnCrAmount'];
                                                $cmpStatus = $searchRow['cmpStatus'];
                                ?>
                        <tr>
                          
                          <?php
                                                            if ($cmpType_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpType; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($legCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $legCode; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($newCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $newCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpTitle_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpTitle; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpStreet_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpStreet; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpCity_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpCountry_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telNumber_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telNumber; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpWebsite_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpWebsite; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpEmail_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($taxType_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxType; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($taxNo_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaImport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airImport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaExport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airExport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repName_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repDesig_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repDesig; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repOffCell_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repOffCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repPerCell_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repPerCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repEmail_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkName_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkBr_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkBr; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCity_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCountry_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnIban_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnNonIban_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnNonIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrDays_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrDays; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrAmount_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrAmount; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cmpStatus_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpStatus; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                        </tr>
                        <?php
                          }
                          ?>

                      </tbody>  
</table>

<script type="text/javascript">
   function close_popup(){
     window.close();
   }
</script>

</body>
</html>