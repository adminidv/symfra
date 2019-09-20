<?php

include 'manage/connection.php';
include("manage/session.php");

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

// $searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, "SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ");

// For search result field customization
 $selectUM = mysqli_query($con, 'SELECT * FROM custmaster_cm');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            // $cmpType_CM = $rowUM['cmpType_CM'];
           $legCode_BM = $rowUM['legCode_CM'];
            $newCode_BM = $rowUM['newCode_CM'];
            $bpTitle_BM = $rowUM['cmpTitle_CM'];
            $bpStreet_BM = $rowUM['cmpStreet_CM'];
            $bpCity_BM = $rowUM['cmpCity_CM'];
            $bpCountry_BM = $rowUM['cmpCountry_CM'];
            $telCode_BM = $rowUM['telCode_CM'];
            $telNumber_BM = $rowUM['telNumber_CM'];
            $cmpWebsite_BM = $rowUM['cmpWebsite_CM'];
            $cmpEmail_BM = $rowUM['cmpEmail_CM'];
            $taxType_BM = $rowUM['taxType_CM'];
            $taxNo_BM = $rowUM['taxNo_CM'];
            $seaImport_BM = $rowUM['seaImport_CM'];
            $airImport_BM = $rowUM['airImport_CM'];
            $seaExport_BM = $rowUM['seaExport_CM'];
            $airExport_BM = $rowUM['airExport_CM'];
            $repName_BM = $rowUM['repName_CM'];
            $repDesig_BM = $rowUM['repDesig_CM'];
            $repOffCell_BM = $rowUM['repOffCell_CM'];
            $repPerCell_BM = $rowUM['repPerCell_CM'];
            $repEmail_BM = $rowUM['repEmail_CM'];
            $fnBnkName_BM = $rowUM['fnBnkName_CM'];
            $fnBnkBr_BM = $rowUM['fnBnkBr_CM'];
            $fnCity_BM = $rowUM['fnCity_CM'];
            $fnCountry_BM = $rowUM['fnCountry_CM'];
            $fnIban_BM = $rowUM['fnIban_CM'];
            $fnNonIban_BM = $rowUM['fnNonIban_CM'];
            $fnCrDays_BM = $rowUM['fnCrDays_CM'];
            $fnCrAmount_BM = $rowUM['fnCrAmount_CM'];
            $cmpStatus_BM = $rowUM['cmpStatus_CM'];
          }
?>

<!DOCTYPE html>
<html>
<head>
  <title>BP Records | PDF</title>
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

</head>
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc" id="usrtble">
    <thead>
     <tr>
                                  <!-- <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th> -->
                                  <?php
                                  if ($legCode_BM == 1)
                                  {
                                  ?>
                                  <th>Legacy Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($newCode_BM == 1)
                                  {
                                  ?>
                                  <th>New Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpTitle_BM == 1)
                                  {
                                  ?>
                                  <th>Company Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpStreet_BM == 1)
                                  {
                                  ?>
                                  <th>Company Street</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpCity_BM == 1)
                                  {
                                  ?>
                                  <th>Company City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpCountry_BM == 1)
                                  {
                                  ?>
                                  <th>Company Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telCode_BM == 1)
                                  {
                                  ?>
                                  <th>Tel Code.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telNumber_BM == 1)
                                  {
                                  ?>
                                  <th>Tel No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpWebsite_BM == 1)
                                  {
                                  ?>
                                  <th>Company Website</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpEmail_BM == 1)
                                  {
                                  ?>
                                  <th>Company Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($taxType_BM == 1)
                                  {
                                  ?>
                                  <th>Tax Type</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($taxNo_BM == 1)
                                  {
                                  ?>
                                  <th>Tax No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaImport_BM == 1)
                                  {
                                  ?>
                                  <th>Sea Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airImport_BM == 1)
                                  {
                                  ?>
                                  <th>Air Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaExport_BM == 1)
                                  {
                                  ?>
                                  <th>Sea Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airExport_BM == 1)
                                  {
                                  ?>
                                  <th>Air Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repName_BM == 1)
                                  {
                                  ?>
                                  <th>Rep Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repDesig_BM == 1)
                                  {
                                  ?>
                                  <th>Rep Desg</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repOffCell_BM == 1)
                                  {
                                  ?>
                                  <th>Office no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repPerCell_BM == 1)
                                  {
                                  ?>
                                  <th>Cell no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repEmail_BM == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkName_BM == 1)
                                  {
                                  ?>
                                  <th>Bank Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkBr_BM == 1)
                                  {
                                  ?>
                                  <th>Branch Branch</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCity_BM == 1)
                                  {
                                  ?>
                                  <th>Office City</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCountry_BM == 1)
                                  {
                                  ?>
                                  <th>Office Country</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnIban_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Iban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnNonIban_BM == 1)
                                  {
                                  ?>
                                  <th>Finance NonIban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrDays_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Day</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrAmount_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Amount</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($cmpStatus_BM == 1)
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
                                                          while ($row= mysqli_fetch_array($run))
                                                          {
                                                          //   //$userID = $row['user_ID'];
                                                          //   $dept_ID = $searchRow['dept_ID'];
                                                          //   $selectDept = mysqli_query($con , "SELECT * FROM department WHERE dept_ID = '$dept_ID'");
                                                          //   $rowDept = mysqli_fetch_array($selectDept, MYSQLI_ASSOC);
                                                          //   if ($dept_ID == $rowDept['dept_ID'])
                                                          //   {
                                                          //     $dept_name = $rowDept['dept_name'];
                                                          //   }

                                                          //   $desig_ID = $searchRow['desig_ID'];
                                                          //   $selectDesig = mysqli_query($con , "SELECT * FROM designation WHERE Desig_ID = '$desig_ID'");
                                                          //   $rowDesig = mysqli_fetch_array($selectDesig, MYSQLI_ASSOC);
                                                          //   if ($desig_ID == $rowDesig['Desig_ID'])
                                                          //   {
                                                          //     $Desig_name = $rowDesig['Desig_name'];
                                                          //   }

                                                          //   $role_ID = $searchRow['role_ID'];
                                                          //   $selectRole = mysqli_query($con , "SELECT * FROM roles WHERE role_ID = '$role_ID'");
                                                          //   $rowRole = mysqli_fetch_array($selectRole, MYSQLI_ASSOC);
                                                          //   if ($role_ID == $rowRole['role_ID'])
                                                          //   {
                                                          //     $role_Name = $rowRole['role_Name'];
                                                          //   }
                                                          //   $id = $searchRow['user_ID'];

                                                          //   $userName = $searchRow['user_fName'] . ' ' . $searchRow['user_mName'] .' '.$searchRow['user_lName'];
                                                          //   $email = $searchRow['user_email'];
                                                          //   $contact = $searchRow['user_contact'];
                                                          //   $address = $searchRow['user_address'];
                                                          //   $doj = $searchRow['user_DOJ'];
                                                          //   $dob = $searchRow['user_DOB'];
                                                          //   $dol = $searchRow['user_DOL'];
                                                          //   $region = $searchRow['user_region'];

                                                //            // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);
                                                // $cmpType = $searchRow['cmpType'];            
                                                $legCode = $row['legCode'];
                                                $newCode = $row['newCode'];
                                                $bpTitle = $row['cmpTitle'];
                                                $bpStreet = $row['cmpStreet'];
                                                $bpCity = $row['cmpCity'];
                                                $bpCountry = $row['cmpCountry'];
                                                $telCode = $row['telCode'];
                                                $telNumber = $row['telNumber'];
                                                $cmpWebsite = $row['cmpWebsite'];
                                                $cmpEmail = $row['cmpEmail'];
                                                $taxType = $row['taxType'];
                                                $taxNo = $row['taxNo'];
                                                $seaImport = $row['seaImport'];
                                                $airImport = $row['airImport'];
                                                $seaExport = $row['seaExport'];
                                                $airExport = $row['airExport'];
                                                $repName = $row['repName'];
                                                $repDesig = $row['repDesig'];
                                                $repOffCell = $row['repOffCell'];   
                                                $repPerCell = $row['repPerCell'];
                                                $repEmail = $row['repEmail'];
                                                $fnBnkName = $row['fnBnkName'];
                                                $fnBnkBr = $row['fnBnkBr'];
                                                $fnCity = $row['fnCity'];
                                                $fnCountry = $row['fnCountry'];
                                                $fnIban = $row['fnIban'];
                                                $fnNonIban = $row['fnNonIban'];
                                                $fnCrDays = $row['fnCrDays'];
                                                $fnCrAmount = $row['fnCrAmount'];
                                                $cmpStatus = $row['cmpStatus'];
                                                

                                                        ?>

                                                          <tr >
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->

                                                             <?php
                                                            if ($legCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $legCode; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($newCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $newCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpTitle_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpTitle; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpStreet_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpStreet; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpCity_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpCountry_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telNumber_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telNumber; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpWebsite_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpWebsite; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpEmail_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($taxType_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxType; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($taxNo_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaImport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airImport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaExport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airExport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repName_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repDesig_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repDesig; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repOffCell_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repOffCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repPerCell_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repPerCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repEmail_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkName_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkBr_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkBr; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCity_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCountry_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnIban_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnNonIban_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnNonIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrDays_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrDays; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrDays_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrAmount; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cmpStatus_BM == 1)
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

<button type="button" id="btnExport">Click</button>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function () {
            html2canvas($('#usrtble')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("BP Records.pdf");
                    
                    // Close the tab here
                }
            });


        });
        /*window.close();*/

    </script>

    <script type="text/javascript">
     function close_popup(){
       window.close();
     }
  </script>
</body>
</html>