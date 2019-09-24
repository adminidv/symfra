<?php

include 'manage/connection.php';
include("manage/session.php");

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

$qry1 = mysqli_query($con, "SELECT * FROM custmaster WHERE userBr='$userBr' AND partyType='Customer' ");

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
    <title>Download File to CSV</title>

    <script type="text/javascript">
         function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {type: "text/csv"});

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }

         function exportTableToCSV(filename) {
            var csv = [];
            var rows = document.querySelectorAll("table tr");
            
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");
                
                for (var j = 0; j < cols.length; j++) 
                    row.push(cols[j].innerText);
                
                csv.push(row.join(","));        
            }

            // Download CSV file
            downloadCSV(csv.join("\n"), filename);
            window.close();
           
            
    }

     </script>
</head>
<body onload="exportTableToCSV('Customer Records.csv')">

    <table>
        <thead>
           <tr>
                                   
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

                                while ($searchRow= mysqli_fetch_array($qry1))
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

</body>
</html>