<?php

include 'manage/connection.php';


// Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM saleorders_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
             $SrNo_cus = $rowUM['SrNo_cus'];
            $SoNo_cus = $rowUM['SoNo_cus'];
            $saleCust_cus = $rowUM['saleCust_cus'];
            $conPerson_cus = $rowUM['conPerson_cus'];
            $conRef_cus = $rowUM['conRef_cus'];
            $saleCurr_cus = $rowUM['saleCurr_cus'];
            $saleStatus_cus = $rowUM['saleStatus_cus'];
            $postDate_cus = $rowUM['postDate_cus'];
            $docDate_cus = $rowUM['docDate_cus'];
            $agentParty_cus = $rowUM['agentParty_cus'];
            $foreignAgent_cus = $rowUM['foreignAgent_cus'];
            $saleNom_cus = $rowUM['saleNom_cus'];
            $saleNom_cus = $rowUM['saleNom_cus'];
            $mawbNo_cus = $rowUM['mawbNo_cus'];
            $mawbDate_cus = $rowUM['mawbDate_cus'];
            $mblNo_cus = $rowUM['mblNo_cus'];
            $mblDate_cus = $rowUM['mblDate_cus'];
            $salePcs_cus = $rowUM['salePcs_cus'];
            $saleCBM_cus = $rowUM['saleCBM_cus'];
            $grsWeight_cus = $rowUM['grsWeight_cus'];
            $chWeight_cus = $rowUM['chWeight_cus'];
            $saleRate_cus = $rowUM['saleRate_cus'];
            $totalFreight_cus = $rowUM['totalFreight_cus'];
            $goodsDesc_cus = $rowUM['goodsDesc_cus'];
            $saleDest_cus = $rowUM['saleDest_cus'];
            $shipLine_cus = $rowUM['shipLine_cus'];
            $saleVessel_cus = $rowUM['saleVessel_cus'];
            $saleVoyage_cus = $rowUM['saleVoyage_cus'];
            $flightNo_cus = $rowUM['flightNo_cus'];
            $flightDate_cus = $rowUM['flightDate_cus'];
            $saleRem_cus = $rowUM['saleRem_cus'];
            $totalBefDisc_cus = $rowUM['totalBefDisc_cus'];
            $saleDisc_cus = $rowUM['saleDisc_cus'];
            $saleTax_cus = $rowUM['saleTax_cus'];
            $saleTotal_cus = $rowUM['saleTotal_cus'];
            $shipApp_O_cus = $rowUM['shipApp_O_cus'];
            $appReason_O_cus = $rowUM['appReason_O_cus'];
            $shipApp_F_cus = $rowUM['shipApp_F_cus'];
            $appReason_F_cus = $rowUM['appReason_F_cus'];
            $saleLength_cus = $rowUM['saleLength_cus'];
            $saleWidth_cus = $rowUM['saleWidth_cus'];
            $saleHight_cus = $rowUM['saleHight_cus'];
            $saleVolWt_cus = $rowUM['saleVolWt_cus'];
            $saleType_cus = $rowUM['saleType_cus'];
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
<body onload="exportTableToCSV('members_dept.csv')">

    <table>
        <thead>
           <tr>
                                   
                                    <?php
                                  if ($SoNo_cus == 1)
                                  {
                                  ?>

                                  <th>Sales Order No.</th>
                                  <?php
                                  }
                                  ?>

                                  
                                  

                                  <?php
                                  if ($saleCust_cus == 1)
                                  {
                                  ?>
                                  <th>Customer</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($conPerson_cus == 1)
                                  {
                                  ?>
                                  <th>Contact Person</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($conRef_cus == 1)
                                  {
                                  ?>
                                  <th>Contact Ref. No.</th>
                                  <?php
                                  }
                                  ?>

                                  

                                  <?php
                                  if ($saleCurr_cus == 1)
                                  {
                                  ?>
                                  <th>Currency</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($saleStatus_cus == 1)
                                  {
                                  ?>
                                  <th>Status</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($postDate_cus == 1)
                                  {
                                  ?>
                                  <th>Posting Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($docDate_cus == 1)
                                  {
                                  ?>
                                  <th>Document Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($agentParty_cus == 1)
                                  {
                                  ?>
                                  <th>Agent Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($foreignAgent_cus == 1)
                                  {
                                  ?>
                                  <th>Foreign Agent</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleNom_cus == 1)
                                  {
                                  ?>
                                  <th>Nomination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleNom_cus == 1)
                                  {
                                  ?>
                                  <th>Nomination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($mawbNo_cus == 1)
                                  {
                                  ?>
                                  <th>SPO</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($mawbDate_cus == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($mblNo_cus == 1)
                                  {
                                  ?>
                                  <th>Consolidation</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($mblDate_cus == 1)
                                  {
                                  ?>
                                  <th>Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($salePcs_cus == 1)
                                  {
                                  ?>
                                  <th>Pcs</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleCBM_cus == 1)
                                  {
                                  ?>
                                  <th>Airport Dep</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($grsWeight_cus == 1)
                                  {
                                  ?>
                                  <th>Gross Weight</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($chWeight_cus == 1)
                                  {
                                  ?>
                                  <th>Charge Weight</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleRate_cus == 1)
                                  {
                                  ?>
                                  <th>Rate </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($totalFreight_cus == 1)
                                  {
                                  ?>
                                  <th>Total Freight</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($goodsDesc_cus == 1)
                                  {
                                  ?>
                                  <th>Goods & Description</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleDest_cus == 1)
                                  {
                                  ?>
                                  <th>Destination</th>
                                  <?php
                                  }
                                  ?>
                                 
                                  <?php
                                  if ($shipLine_cus == 1)
                                  {
                                  ?>
                                  <th>Remarks</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleVessel_cus == 1)
                                  {
                                  ?>
                                  <th>Total Freight Before Discount</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleVoyage_cus == 1)
                                  {
                                  ?>
                                  <th>Discount % </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($flightNo_cus == 1)
                                  {
                                  ?>
                                  <th>Tax</th>
                                  <?php
                                  }
                                  ?>
                                 
                                  <?php
                                  if ($flightDate_cus == 1)
                                  {
                                  ?>
                                  <th>Reason For Sale</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleRem_cus == 1)
                                  {
                                  ?>
                                  <th>Select Final Notification:</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($totalBefDisc_cus == 1)
                                  {
                                  ?>
                                  <th>Flight No B </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleDisc_cus == 1)
                                  {
                                  ?>
                                  <th>Flight Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleTax_cus == 1)
                                  {
                                  ?>
                                  <th>Ship Inv. No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleTotal_cus == 1)
                                  {
                                  ?>
                                  <th> Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($shipApp_O_cus == 1)
                                  {
                                  ?>
                                  <th>Job No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($appReason_O_cus == 1)
                                  {
                                  ?>
                                  <th>Insurance</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($shipApp_F_cus == 1)
                                  {
                                  ?>
                                  <th>Declare Val Carriage</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($appReason_F_cus == 1)
                                  {
                                  ?>
                                  <th>Declare Val Carriage</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleLength_cus == 1)
                                  {
                                  ?>
                                  <th>Nomination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleWidth_cus == 1)
                                  {
                                  ?>
                                  <th>Handling Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleHight_cus == 1)
                                  {
                                  ?>
                                  <th>Other Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleVolWt_cus == 1)
                                  {
                                  ?>
                                  <th>Account Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($saleType_cus == 1)
                                  {
                                  ?>
                                  <th>Said To Contain</th>
                                  <?php
                                  }
                                  ?>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $qry1 = mysqli_query($con, "SELECT * FROM saleorders ");

                                while ($row= mysqli_fetch_array($qry1))
                                {
                                        $soNo = $row['soNo'];
                                        $saleCust = $row['saleCust'];
                                        // $job_date_a  = $row['job_date_a'];
                                        $conPerson = $row['conPerson'];
                                        $conRef = $row['conRef'];
                                        $saleCurr = $row['saleCurr'];
                                        $saleStatus = $row['saleStatus'];
                                        $postDate  = $row['postDate'];
                                        $docDate = $row['docDate'];
                                        $agentParty = $row['agentParty'];
                                        $foreignAgent = $row['foreignAgent'];
                                        $saleNom = $row['saleNom'];
                                        $saleSPO = $row['saleSPO'];
                                        $mawbNo = $row['mawbNo'];
                                        $mawbDate = $row['mawbDate'];
                                        $mblNo = $row['mblNo'];
                                        $mblDate = $row['mblDate'];
                                        $salePcs = $row['salePcs'];
                                        $saleCBM = $row['saleCBM'];
                                        $grsWeight = $row['grsWeight'];   
                                        $saleComm = $row['saleComm'];
                                        $chWeight = $row['chWeight'];
                                        $saleRate = $row['saleRate'];
                                        $totalFreight = $row['totalFreight'];
                                        $goodsDesc = $row['goodsDesc'];
                                        $saleOrigin = $row['saleOrigin'];
                                        $saleDest = $row['saleDest'];
                                        $shipLine = $row['shipLine'];
                                        $saleVessel = $row['saleVessel'];
                                        $saleVoyage = $row['saleVoyage'];
                                        $flightNo = $row['flightNo'];
                                        $flightDate = $row['flightDate'];
                                        $saleRem = $row['saleRem'];
                                        $totalBefDisc = $row['totalBefDisc'];
                                        $saleDisc = $row['saleDisc'];
                                        $saleTax = $row['saleTax'];
                                        $saleTotal = $row['saleTotal'];
                                        $saleReason = $row['saleReason'];
                                        $shipApp_O = $row['shipApp_O'];
                                        $appReason_O = $row['appReason_O'];
                                        $shipApp_F = $row['shipApp_F'];
                                        $appReason_F = $row['appReason_F'];
                                        $saleLength = $row['saleLength'];
                                        $saleWidth = $row['saleWidth'];
                                        $saleHight = $row['saleHight'];
                                        $saleVolWt = $row['saleVolWt'];
                                        $saleType = $row['saleType'];
                                ?>
                        <tr>
                          
                            <?php
                                                            if ($SoNo_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $soNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($saleCust_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleCust; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($conPerson_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $conPerson; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($conRef_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $conRef; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($saleCurr_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleCurr; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($saleStatus_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleStatus; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($postDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $postDate; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($docDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $docDate  ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($agentParty_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $agentParty; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($foreignAgent_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreignAgent; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleNom_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleNom; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                           
                                                            <?php
                                                            if ($saleNom_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleNom; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mawbNo_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mawbNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mawbDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mawbDate; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mblNo_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mblNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mblDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mblDate; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($salePcs_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $salePcs; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleCBM_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleCBM; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($grsWeight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $grsWeight; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($chWeight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $chWeight; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleRate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleRate; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($totalFreight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $totalFreight; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($goodsDesc_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $goodsDesc; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleDest_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleDest; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($shipLine_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipLine; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleVessel_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleVessel; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleVoyage_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleVoyage ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flightNo_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flightNo ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                           
                                                            <?php
                                                            if ($flightDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flightDate ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleRem_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleRem ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($totalBefDisc_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $totalBefDisc; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleDisc_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleDisc ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleTax_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleTax ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleTotal_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleTotal ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($shipApp_O_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipApp_O ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($appReason_O_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $appReason_O ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($shipApp_F_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipApp_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($appReason_F_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $appReason_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleLength_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleLength ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleWidth_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleWidth ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleHight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleHight ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleVolWt_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleVolWt ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($saleType_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $saleType ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                            <td></td>
                        </tr>
                        <?php
                          }
                          ?>
        </tbody>
    </table>

</body>
</html>