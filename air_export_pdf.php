<?php

include 'manage/connection.php';

/*$searchRecord = $_GET["searchRecord"];*/
$qry1 = mysqli_query($con, "SELECT * FROM air_export_entry ");

// Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM air_export_table_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            // $cmpType_CM = $rowUM['cmpType_CM'];
             $so_no_AE = $rowUM['so_no_AE'];
            $job_no_a_AE = $rowUM['job_no_a_AE'];
            $job_date_a_AE = $rowUM['job_date_a_AE'];
            $mawb_no_AE = $rowUM['mawb_no_AE'];
            $awb_no_AE = $rowUM['awb_no_AE'];
            
            $sale_date_AE = $rowUM['sale_date_AE'];
            $owner_name_AE = $rowUM['owner_name_AE'];
            $charge_code_AE = $rowUM['charge_code_AE'];
            $charge_type_AE = $rowUM['charge_type_AE'];
            $booking_date_AE = $rowUM['booking_date_AE'];
            $station_AE = $rowUM['station_AE'];
            $party_AE = $rowUM['party_AE'];
            // $party_name_AI = $rowUM['party_name_AI'];
            $agent_party_AE = $rowUM['agent_party_AE'];
            $party_name_AE = $rowUM['party_name_AE'];
            $party_address_AE = $rowUM['party_address_AE'];
            $con_consolidation_AE = $rowUM['con_consolidation_AE'];
            $con_name_AE = $rowUM['con_name_AE'];
            $con_address_AE = $rowUM['con_address_AE'];
            $airport_dep_AE = $rowUM['airport_dep_AE'];
            $airport_to_a_AE = $rowUM['airport_to_a_AE'];
            $airport_to_b_AE = $rowUM['airport_to_b_AE'];
            $airport_to_c_AE = $rowUM['airport_to_c_AE'];
            $airport_by_a_AE = $rowUM['airport_by_a_AE'];
            $airport_by_b_AE = $rowUM['airport_by_b_AE'];
            $airport_by_c_AE = $rowUM['airport_by_c_AE'];
            $currency_AE = $rowUM['currency_AE'];
            $destination_AE = $rowUM['destination_AE'];
            $account_no_AE = $rowUM['account_no_AE'];
            $flight_no_a_AE = $rowUM['flight_no_a_AE'];
            $flight_no_a_date_AE = $rowUM['flight_no_a_date_AE'];
            $form_e_no_AE = $rowUM['form_e_no_AE'];
            $form_e_date_AE = $rowUM['form_e_date_AE'];
            $flight_no_b_AE = $rowUM['flight_no_b_AE'];
            $flight_no_b_date_AE = $rowUM['flight_no_b_date_AE'];
            $ship_inv_no_AE = $rowUM['ship_inv_no_AE'];
            $ship_inv_no_date_AE = $rowUM['ship_inv_no_date_AE'];
            $job_no_AE = $rowUM['job_no_AE'];
            $insurance_AE = $rowUM['insurance_AE'];
            $decl_val_carriage_AE = $rowUM['decl_val_carriage_AE'];
            $decl_val_custom_AE = $rowUM['decl_val_custom_AE'];
            $nominaton_AE = $rowUM['nominaton_AE'];
            $handling_info_AE = $rowUM['handling_info_AE'];
            $other_info_AE = $rowUM['other_info_AE'];
            $account_info_AE = $rowUM['account_info_AE'];
            $said_chain_AE = $rowUM['said_chain_AE'];
            $ref_no_AE = $rowUM['ref_no_AE'];
            $td_flash_AE = $rowUM['td_flash_AE'];
            $clearing_agent_AE = $rowUM['clearing_agent_AE'];
            $spo_AE = $rowUM['spo_AE'];
            $freight_AE = $rowUM['freight_AE'];
            $due_carrier_AE = $rowUM['due_carrier_AE'];
            $due_agent_AE = $rowUM['due_agent_AE'];
            $awb_total_AE = $rowUM['awb_total_AE'];
            $payable_airline_AE = $rowUM['payable_airline_AE'];
            // $buyAmountPKR_P_AI = $rowUM['buyAmountPKR_P_AI'];
            // $diffAmount_P_AI = $rowUM['diffAmount_P_AI'];
            // $diffAmountPKR_P_AI = $rowUM['diffAmountPKR_P_AI'];
            // $profitRate_P_AI = $rowUM['profitRate_P_AI'];
            // $profitAmount_P_AI = $rowUM['profitAmount_P_AI'];
            // $profitAmountPKR_P_AI = $rowUM['profitAmountPKR_P_AI'];
            // $buyRate_F_AI = $rowUM['buyRate_F_AI'];
            // $buyAmount_F_AI = $rowUM['buyAmount_F_AI'];
            // $buyAmountPKR_F_AI = $rowUM['buyAmountPKR_F_AI'];
            // $sellRate_F_AI = $rowUM['sellRate_F_AI'];
            // $sellAmount_F_AI = $rowUM['sellAmount_F_AI'];
            // $sellAmountPKR_F_AI = $rowUM['sellAmountPKR_F_AI'];
            // $diffAmount_F_AI = $rowUM['diffAmount_F_AI'];
            // $diffAmountPKR_F_AI = $rowUM['diffAmountPKR_F_AI'];
            // $profitRate_F_AI = $rowUM['profitRate_F_AI'];
            // $profitAmount_F_AI = $rowUM['profitAmount_F_AI'];
            // $profitAmountPKR_F_AI = $rrowUMow['profitAmountPKR_F_AI'];
            // $payableAmount_AI = $rowUM['payableAmount_AI'];
            // $payableAmountPKR_AI = $rowUM['payableAmountPKR_AI'];
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
                                  if ($so_no_AE == 1)
                                  {
                                  ?>
                                  <th>Sale Order No</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($job_no_a_AE == 1)
                                  {
                                  ?>
                                  <th>Job No</th>
                                  <?php
                                  }
                                  ?>

                                  
                                  

                                  <?php
                                  if ($job_date_a_AE == 1)
                                  {
                                  ?>
                                  <th>Job Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($mawb_no_AE == 1)
                                  {
                                  ?>
                                  <th>MAWB No</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($awb_no_AE == 1)
                                  {
                                  ?>
                                  <th>AWB Date</th>
                                  <?php
                                  }
                                  ?>

                                  

                                  <?php
                                  if ($sale_date_AE == 1)
                                  {
                                  ?>
                                  <th>Sale Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($owner_name_AE == 1)
                                  {
                                  ?>
                                  <th>Owner</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($charge_code_AE == 1)
                                  {
                                  ?>
                                  <th>Charge Code</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($charge_type_AE == 1)
                                  {
                                  ?>
                                  <th>Charge Type</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($booking_date_AE == 1)
                                  {
                                  ?>
                                  <th>Booking Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($station_AE == 1)
                                  {
                                  ?>
                                  <th>Station</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($party_AE == 1)
                                  {
                                  ?>
                                  <th>Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($agent_party_AE == 1)
                                  {
                                  ?>
                                  <th>Agent Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($party_name_AE == 1)
                                  {
                                  ?>
                                  <th>Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($party_address_AE == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($con_consolidation_AE == 1)
                                  {
                                  ?>
                                  <th>Consolidation</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($con_name_AE == 1)
                                  {
                                  ?>
                                  <th>Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($con_address_AE == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_dep_AE == 1)
                                  {
                                  ?>
                                  <th>Airport Dep</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_to_a_AE == 1)
                                  {
                                  ?>
                                  <th>Airport A To</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_to_b_AE == 1)
                                  {
                                  ?>
                                  <th>Airport B To</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_to_c_AE == 1)
                                  {
                                  ?>
                                  <th>Airport C To </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_by_a_AE == 1)
                                  {
                                  ?>
                                  <th>Airport A BY</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_by_b_AE == 1)
                                  {
                                  ?>
                                  <th>Airport B By</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airport_by_c_AE == 1)
                                  {
                                  ?>
                                  <th>Airport C By</th>
                                  <?php
                                  }
                                  ?>
                                 
                                  <?php
                                  if ($currency_AE == 1)
                                  {
                                  ?>
                                  <th>Currency</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($destination_AE == 1)
                                  {
                                  ?>
                                  <th>Destination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($account_no_AE == 1)
                                  {
                                  ?>
                                  <th>Account No/th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($flight_no_a_AE == 1)
                                  {
                                  ?>
                                  <th>Flight No A</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($flight_no_a_date_AE == 1)
                                  {
                                  ?>
                                  <th>Flight Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($form_e_no_AE == 1)
                                  {
                                  ?>
                                  <th>Form 'E' No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($form_e_date_AE == 1)
                                  {
                                  ?>
                                  <th>Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($flight_no_b_AE == 1)
                                  {
                                  ?>
                                  <th>Flight No B </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($flight_no_b_date_AE == 1)
                                  {
                                  ?>
                                  <th>Flight Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_inv_no_AE == 1)
                                  {
                                  ?>
                                  <th>Ship Inv. No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_inv_no_date_AE == 1)
                                  {
                                  ?>
                                  <th> Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($job_no_AE == 1)
                                  {
                                  ?>
                                  <th>Job No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($insurance_AE == 1)
                                  {
                                  ?>
                                  <th>Insurance</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($decl_val_carriage_AE == 1)
                                  {
                                  ?>
                                  <th>Declare Val Carriage</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($decl_val_custom_AE == 1)
                                  {
                                  ?>
                                  <th>Declare Val Carriage</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($nominaton_AE == 1)
                                  {
                                  ?>
                                  <th>Nomination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($handling_info_AE == 1)
                                  {
                                  ?>
                                  <th>Handling Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($other_info_AE == 1)
                                  {
                                  ?>
                                  <th>Other Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($account_info_AE == 1)
                                  {
                                  ?>
                                  <th>Account Information</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($said_chain_AE == 1)
                                  {
                                  ?>
                                  <th>Said To Contain</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ref_no_AE == 1)
                                  {
                                  ?>
                                  <th>Referance No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($td_flash_AE == 1)
                                  {
                                  ?>
                                  <th>Td Flash</th>
                                  <?php
                                  }
                                  ?> 
                                  <?php
                                  if ($clearing_agent_AE  == 1)
                                  {
                                  ?>
                                  <th>Clearing Agent</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($spo_AE == 1)
                                  {
                                  ?>
                                  <th>SPO</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($freight_AE  == 1)
                                  {
                                  ?>
                                  <th>Freight</th>
                                  <?php
                                  }
                                  ?>
                                   <?php
                                  if ($due_carrier_AE  == 1)
                                  {
                                  ?>
                                  <th>Due Carrier</th>
                                  <?php
                                  }
                                  ?>
                                   <?php
                                  if ($due_agent_AE  == 1)
                                  {
                                  ?>
                                  <th>Due Agent</th>
                                  <?php
                                  }
                                  ?>
                                   <?php
                                  if ($awb_total_AE  == 1)
                                  {
                                  ?>
                                  <th>AWB Total</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($payable_airline_AE  == 1)
                                  {
                                  ?>
                                  <th>Payable To Airline</th>
                                  <?php
                                  }
                                  ?>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($row= mysqli_fetch_array($qry1))
                                {
                                                $so_no = $row['so_no'];
                                                            $job_no_a = $row['job_no_a'];
                                                            $job_date_a  = $row['job_date_a'];
                                                            $mawb_no = $row['mawb_no'];
                                                            $awb_no = $row['awb_no'];
                                                            $sale_date = $row['sale_date'];
                                                            $owner_name = $row['owner_name'];
                                                            $charge_code  = $row['charge_code'];
                                                            $charge_type = $row['charge_type'];
                                                            $booking_date = $row['booking_date'];
                                                            $station = $row['station'];
                                                            $party = $row['party'];
                                                            $agent_party = $row['agent_party'];
                                                            $party_name = $row['party_name'];
                                                            $party_address = $row['party_address'];
                                                            $con_consolidation = $row['con_consolidation'];
                                                            $con_name = $row['con_name'];
                                                            $con_address = $row['con_address'];
                                                            $airport_dep = $row['airport_dep'];   
                                                            $airport_to_a = $row['airport_to_a'];
                                                            $airport_to_b = $row['airport_to_b'];
                                                            $airport_to_c = $row['airport_to_c'];
                                                            $airport_by_a = $row['airport_by_a'];
                                                            $airport_by_b = $row['airport_by_b'];
                                                            $airport_by_c = $row['airport_by_c'];
                                                            $currency = $row['currency'];
                                                            $destination = $row['destination'];
                                                            $account_no = $row['account_no'];
                                                            $flight_no_a = $row['flight_no_a'];
                                                            $flight_no_a_date = $row['flight_no_a_date'];
                                                            $form_e_no = $row['form_e_no'];
                                                            $form_e_date = $row['form_e_date'];
                                                            $flight_no_b = $row['flight_no_b'];
                                                            $flight_no_b_date = $row['flight_no_b_date'];
                                                            $ship_inv_no = $row['ship_inv_no'];
                                                            $ship_inv_no_date = $row['ship_inv_no_date'];
                                                            $job_no = $row['job_no'];
                                                            $insurance = $row['insurance'];
                                                            $decl_val_carriage = $row['decl_val_carriage'];
                                                            $decl_val_custom = $row['decl_val_custom'];
                                                            $nominaton = $row['nominaton'];
                                                            $handling_info = $row['handling_info'];
                                                            $other_info = $row['other_info'];
                                                            $account_info = $row['account_info'];
                                                            $said_chain = $row['said_chain'];
                                                            $ref_no = $row['ref_no'];
                                                            $td_flash = $row['td_flash'];
                                                            $clearing_agent = $row['clearing_agent'];
                                                            $spo = $row['spo'];
                                                            $freight = $row['freight'];
                                                            $due_carrier = $row['due_carrier'];
                                                            $due_agent = $row['due_agent'];
                                                            $awb_total = $row['awb_total'];
                                                            $payable_airline = $row['payable_airline'];
                                ?>
                        <tr>
                          
                           <?php
                                                            if ($so_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $so_no; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_no_a_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_no_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_date_a_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_date_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($mawb_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mawb_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($awb_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awb_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($sale_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sale_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($owner_name_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $owner_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($charge_code_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $charge_code; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($charge_type_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $charge_type  ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($booking_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $booking_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($station_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $station; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($party_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $party; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                           
                                                            <?php
                                                            if ($agent_party_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $agent_party; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($party_name_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $party_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($party_address_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $party_address; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($con_consolidation_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_consolidation; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($con_name_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($con_address_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_address; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_dep_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_dep; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_to_a_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_to_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_to_b_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_to_b; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_to_c_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_to_c; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_by_a_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_by_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_by_b_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_by_b; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airport_by_c_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airport_by_c; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($currency_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $currency; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($destination_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $destination; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($account_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $account_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_no_a_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_no_a ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_no_a_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_no_a_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($form_e_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $form_e_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($form_e_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $form_e_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_no_b_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_no_b ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_no_b_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_no_b_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_inv_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_inv_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_inv_no_date_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_inv_no_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($job_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($insurance_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $insurance ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($decl_val_carriage_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $decl_val_carriage ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($decl_val_custom_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $decl_val_custom ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($nominaton_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $nominaton ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($handling_info_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $handling_info ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($other_info_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $other_info ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($account_info_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $account_info ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($said_chain_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $said_chain ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ref_no_AE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ref_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($td_flash_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $td_flash ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if ($clearing_agent_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $clearing_agent ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if ($spo_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $spo ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if ($freight_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $freight ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($due_carrier_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $due_carrier ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($due_agent_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $due_agent ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($awb_total_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awb_total ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($payable_airline_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $payable_airline ; ?></td>
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
                    pdfMake.createPdf(docDefinition).download("Customers.pdf");
                    
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