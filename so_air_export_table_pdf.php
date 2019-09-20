<?php

include 'manage/connection.php';

/*$searchRecord = $_GET["searchRecord"];*/

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
            $saleSPO_cus = $rowUM['saleSPO_cus'];
            $mawbNo_cus = $rowUM['mawbNo_cus'];
            $mawbDate_cus = $rowUM['mawbDate_cus'];
            $mblNo_cus = $rowUM['mblNo_cus'];
            $mblDate_cus = $rowUM['mblDate_cus'];
            $salePcs_cus = $rowUM['salePcs_cus'];
            $saleCBM_cus = $rowUM['saleCBM_cus'];
            $grsWeight_cus = $rowUM['grsWeight_cus'];
            $saleComm_cus = $rowUM['saleComm_cus'];
            $chWeight_cus = $rowUM['chWeight_cus'];
            $saleRate_cus = $rowUM['saleRate_cus'];
            $totalFreight_cus = $rowUM['totalFreight_cus'];
            $goodsDesc_cus = $rowUM['goodsDesc_cus'];
            $saleOrigin_cus = $rowUM['saleOrigin_cus'];
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
            $saleReason_cus = $rowUM['saleReason_cus'];
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

</head>
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc" id="usrtble">
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
                          $run = mysqli_query($con, "SELECT * FROM saleorders");


                                while ($row= mysqli_fetch_array($run))
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
                                        $saleHight = $row['saleHeight'];
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
                    pdfMake.createPdf(docDefinition).download("Sale Orders.pdf");
                    
                    // Close the tab here
                }
            });

        });

    </script>
    <script type="text/javascript">
       function close_popup(){
         window.close();
       }
    </script>

</body>
</html>