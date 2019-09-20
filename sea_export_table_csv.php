<?php

include 'manage/connection.php';


// Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM sea_export_table_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
             $so_no_SE = $rowUM['so_no_SE'];
            $job_no_SE = $rowUM['job_no_SE'];
            $job_date_SE = $rowUM['job_date_SE'];
            $consol_no_SE = $rowUM['consol_no_SE'];
            $last_con_no_SE = $rowUM['last_con_no_SE'];
            $com_name_SE = $rowUM['com_name_SE'];    
            $com_code_SE = $rowUM['com_code_SE'];
            $party_SE = $rowUM['party_SE'];
            $agent_party_SE = $rowUM['agent_party_SE'];
            $foreign_agent_SE = $rowUM['foreign_agent_SE'];
            $nomination_SE = $rowUM['nomination_SE'];
            $spo_SE = $rowUM['spo_SE'];
            $shipping_line_SE = $rowUM['shipping_line_SE'];
            $port_of_lord_SE = $rowUM['port_of_lord_SE'];
            $ship_line_agent_SE = $rowUM['ship_line_agent_SE'];
            $destination_SE = $rowUM['destination_SE'];
            $wharf_SE = $rowUM['wharf_SE'];
            $clearing_agent_SE = $rowUM['clearing_agent_SE'];
            $form_e_no_SE = $rowUM['form_e_no_SE'];
            $date_SE = $rowUM['date_SE'];
            $cut_date_SE = $rowUM['cut_date_SE'];
            $ship_rcv_date_SE = $rowUM['ship_rcv_date_SE'];
            $hand_over_s_l_SE = $rowUM['hand_over_s_l_SE'];
            $doc_disp_date_SE = $rowUM['doc_disp_date_SE'];
            $cc_date_SE = $rowUM['cc_date_SE'];
            $four_copy_rcv_SE = $rowUM['four_copy_rcv_SE'];
            $four_copy_date_SE = $rowUM['four_copy_date_SE'];
            $s_b_no_SE = $rowUM['s_b_no_SE'];
            $s_b_date_SE= $rowUM['s_b_date_SE'];
            $egm_SE = $rowUM['egm_SE'];
            $mbl_no_SE = $rowUM['mbl_no_SE'];
            $mbl_date_SE = $rowUM['mbl_date_SE'];
            $hbl_no_SE = $rowUM['hbl_no_SE'];
            $hbl_date_SE = $rowUM['hbl_date_SE'];
            $cbm_SE = $rowUM['cbm_SE'];
            $pkgs_SE = $rowUM['pkgs_SE'];
            $grs_weight = $rowUM['grs_weight'];
            $uom_SE = $rowUM['uom_SE'];
            $net_weight_SE = $rowUM['net_weight_SE'];
            $shipment_no_SE = $rowUM['shipment_no_SE'];
            $l_f_SE = $rowUM['l_f_SE'];
            $f_c_SE = $rowUM['f_c_SE'];
            $cy_cfs_SE = $rowUM['cy_cfs_SE'];
            $packages_SE = $rowUM['packages_SE'];
            $unit_SE = $rowUM['unit_SE'];
            $gross_weight_SE = $rowUM['gross_weight_SE'];
            $cbm_ship_SE = $rowUM['cbm_ship_SE'];
            $net_weight_a_SE = $rowUM['net_weight_a_SE'];
            $ship_inv_no_SE = $rowUM['ship_inv_no_SE'];
            $ship_inv_date_SE = $rowUM['ship_inv_date_SE'];
            $ship_curr_SE = $rowUM['ship_curr_SE'];
            $ship_amount_SE = $rowUM['ship_amount_SE'];
            $pre_alert_SE = $rowUM['pre_alert_SE'];
            $hbl_printed_SE = $rowUM['hbl_printed_SE'];
            $local_inv_SE = $rowUM['local_inv_SE'];
            $intl_inv_SE = $rowUM['intl_inv_SE'];
            $name_SE = $rowUM['name_SE'];
            $address_a_SE = $rowUM['address_a_SE'];
            $consignee_name_SE = $rowUM['consignee_name_SE'];
            $consignee_address_SE = $rowUM['consignee_address_SE'];
            $notify_SE = $rowUM['notify_SE'];
            $foreign_name_SE = $rowUM['foreign_name_SE'];
            $foreign_address_SE = $rowUM['foreign_address_SE'];
            $export_ref_SE = $rowUM['export_ref_SE'];
            $domestic_routing_SE = $rowUM['domestic_routing_SE'];
            $domestic_address_SE = $rowUM['domestic_address_SE'];
            $orignal_fbl_SE = $rowUM['orignal_fbl_SE'];
            $freight_pay_SE = $rowUM['freight_pay_SE'];
            $eta_a_date_SE = $rowUM['eta_a_date_SE'];
            $eta_b_date_SE = $rowUM['eta_b_date_SE'];
            $eta_c_date_SE = $rowUM['eta_c_date_SE'];
            $etd_a_date_SE = $rowUM['etd_a_date_SE'];
            $etd_b_date_SE = $rowUM['etd_b_date_SE'];
            $etd_c_date_SE = $rowUM['etd_c_date_SE'];
            $eta_date_a_SE = $rowUM['eta_date_a_SE'];
            $eta_date_b_SE = $rowUM['eta_date_b_SE'];
            $eta_date_c_SE = $rowUM['eta_date_c_SE'];
            $eta_a_date_box_SE = $rowUM['eta_a_date_box_SE'];
            $eta_b_date_box_SE = $rowUM['eta_b_date_box_SE'];
            $eta_c_date_box_SE = $rowUM['eta_c_date_box_SE'];
            $etd_a_date_box_SE = $rowUM['etd_a_date_box_SE'];
            $etd_b_date_box_SE = $rowUM['etd_b_date_box_SE'];
            $etd_c_date_box_SE = $rowUM['etd_c_date_box_SE'];
            $eta_date_a_box_SE = $rowUM['eta_date_a_box_SE'];
            $eta_date_b_box_SE = $rowUM['eta_date_b_box_SE'];
            $eta_date_c_box_SE = $rowUM['eta_date_c_box_SE'];
            $vessel_a_SE = $rowUM['vessel_a_SE'];
            $vessel_b_SE = $rowUM['vessel_b_SE'];
            $vessel_c_SE = $rowUM['vessel_c_SE'];
            $voyage_a_SE = $rowUM['voyage_a_SE'];
            $voyage_b_SE = $rowUM['voyage_b_SE'];
            $voyage_c_SE = $rowUM['voyage_c_SE'];
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
                                  if ($so_no_SE == 1)
                                  {
                                  ?>
                                  <th>So No</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($job_no_SE == 1)
                                  {
                                  ?>
                                  <th>Job No</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($job_date_SE == 1)
                                  {
                                  ?>
                                  <th>Job Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($consol_no_SE == 1)
                                  {
                                  ?>
                                  <th>MAWB No</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($last_con_no_SE == 1)
                                  {
                                  ?>
                                  <th>MAWB Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($com_name_SE == 1)
                                  {
                                  ?>
                                  <th>P/C Master</th>
                                  <?php
                                  }
                                  ?>

                                  

                                  <?php
                                  if ($com_code_SE == 1)
                                  {
                                  ?>
                                  <th>Pcs Master</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($party_SE == 1)
                                  {
                                  ?>
                                  <th>Grs.Weight Master</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($agent_party_SE == 1)
                                  {
                                  ?>
                                  <th>Ch.Weight Master</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($foreign_agent_SE == 1)
                                  {
                                  ?>
                                  <th>Rate Master</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($nomination_SE == 1)
                                  {
                                  ?>
                                  <th>HAWB No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($spo_SE == 1)
                                  {
                                  ?>
                                  <th>HAWB Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($shipping_line_SE == 1)
                                  {
                                  ?>
                                  <th>P/C House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($port_of_lord_SE == 1)
                                  {
                                  ?>
                                  <th>P/C House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_line_agent_SE == 1)
                                  {
                                  ?>
                                  <th>Pcs House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($destination_SE == 1)
                                  {
                                  ?>
                                  <th>Grs.Weight House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($wharf_SE == 1)
                                  {
                                  ?>
                                  <th>Ch.Weight House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($clearing_agent_SE == 1)
                                  {
                                  ?>
                                  <th>Rate House</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($form_e_no_SE == 1)
                                  {
                                  ?>
                                  <th>Description</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($date_SE == 1)
                                  {
                                  ?>
                                  <th>Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($cut_date_SE == 1)
                                  {
                                  ?>
                                  <th>Agent Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_rcv_date_SE == 1)
                                  {
                                  ?>
                                  <th>Foreign Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($hand_over_s_l_SE == 1)
                                  {
                                  ?>
                                  <th>SPO</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($doc_disp_date_SE == 1)
                                  {
                                  ?>
                                  <th>Origin</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($cc_date_SE == 1)
                                  {
                                  ?>
                                  <th>Destination</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($four_copy_rcv_SE == 1)
                                  {
                                  ?>
                                  <th>Flight No</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($four_copy_date_SE == 1)
                                  {
                                  ?>
                                  <th>Flight Date</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($s_b_no_SE == 1)
                                  {
                                  ?>
                                  <th>IGM No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($s_b_date_SE == 1)
                                  {
                                  ?>
                                  <th>IGM No</th>
                                  <?php
                                  }
                                  ?>
                                  
                                 
                                  
                                  <?php
                                  if ($egm_SE == 1)
                                  {
                                  ?>
                                  <th>Air D.O.P No.</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($mbl_no_SE == 1)
                                  {
                                  ?>
                                  <th>D.O Date</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($mbl_date_SE == 1)
                                  {
                                  ?>
                                  <th>B.E.No</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($hbl_no_SE == 1)
                                  {
                                  ?>
                                  <th>Index No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($hbl_date_SE == 1)
                                  {
                                  ?>
                                  <th>Sub Index No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($cbm_SE == 1)
                                  {
                                  ?>
                                  <th>E.T.D</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($pkgs_SE == 1)
                                  {
                                  ?>
                                  <th> E.T.A</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($grs_weight == 1)
                                  {
                                  ?>
                                  <th>L/C</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($uom_SE == 1)
                                  {
                                  ?>
                                  <th>Origin D.O.No</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($net_weight_SE == 1)
                                  {
                                  ?>
                                  <th> Passport ID</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($shipment_no_SE == 1)
                                  {
                                  ?>
                                  <th>Foreign Agent</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($l_f_SE == 1)
                                  {
                                  ?>
                                  <th>Notify </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($f_c_SE == 1)
                                  {
                                  ?>
                                  <th>Consignee</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($cy_cfs_SE == 1)
                                  {
                                  ?>
                                  <th>Remarks</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($packages_SE == 1)
                                  {
                                  ?>
                                  <th>Nomition</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($unit_SE == 1)
                                  {
                                  ?>
                                  <th> Status Shipment</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($gross_weight_SE == 1)
                                  {
                                  ?>
                                  <th> </th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($cbm_ship_SE == 1)
                                  {
                                  ?>
                                  <th>Freight Term</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($net_weight_a_SE == 1)
                                  {
                                  ?>
                                  <th>Invoice To F/Agent</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_inv_no_SE == 1)
                                  {
                                  ?>
                                  <th>Local Invoice</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_inv_date_SE == 1)
                                  {
                                  ?>
                                  <th>Invoice Form F/Agent</th>
                                  <?php
                                  }
                                  ?> 
                                  <?php
                                  if ($ship_curr_SE  == 1)
                                  {
                                  ?>
                                  <th>Currency</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($ship_amount_SE  == 1)
                                  {
                                  ?>
                                  <th>Exchange Rate</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($pre_alert_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Rate Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($hbl_printed_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Amount Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($local_inv_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Amount PKR Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($intl_inv_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Rate Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($name_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Amount Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($address_a_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Amount PKR Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($consignee_name_SE  == 1)
                                  {
                                  ?>
                                  <th>Diff Amount Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($consignee_address_SE  == 1)
                                  {
                                  ?>
                                  <th>Diff Amount PKR Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($notify_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Rate Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($foreign_name_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Amount Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($foreign_address_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Amount PKR Party</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($export_ref_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Rate Foreign</th>
                                  <?php
                                  }
                                  ?>
                                 
                                  <?php
                                  if ($domestic_routing_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Amount Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($domestic_address_SE  == 1)
                                  {
                                  ?>
                                  <th>Buy Amount PKR Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($orignal_fbl_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Rate Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($freight_pay_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Amount Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($eta_a_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Sell Amount PKR Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($eta_b_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Diff Amount Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($eta_c_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Diff Amount PKR Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($etd_a_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Rate Foregn</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($etd_b_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Amount Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($etd_c_date_SE  == 1)
                                  {
                                  ?>
                                  <th>Profit Amount PKR Foreign</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($eta_date_a_SE  == 1)
                                  {
                                  ?>
                                  <th>Payable Amount</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($eta_date_b_SE  == 1)
                                  {
                                  ?>
                                  <th>Payable Amount PKR</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_date_c_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_a_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_b_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_c_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($etd_a_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($etd_b_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($etd_c_date_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_date_a_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_date_b_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($eta_date_c_box_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($vessel_a_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($vessel_b_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($vessel_c_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($voyage_a_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($voyage_b_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($voyage_c_SE  == 1)
                                  {
                                  ?>
                                  <th></th>
                                  <?php
                                  }
                                  ?>
                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $qry1 = mysqli_query($con, "SELECT * FROM sea_export_entry ");

                                while ($row= mysqli_fetch_array($qry1))
                                {
                                                
                                                $so_no = $row['so_no'];
                                                $job_no = $row['job_no'];
                                                $job_date = $row['job_date'];
                                                $consol_no = $row['consol_no'];
                                                $last_con_no = $row['last_con_no'];
                                                $com_name = $row['com_name'];    
                                                $com_code = $row['com_code'];
                                                $party = $row['party'];
                                                $agent_party = $row['agent_party'];
                                                $foreign_agent = $row['foreign_agent'];
                                                $nomination = $row['nomination'];
                                                $spo = $row['spo'];
                                                $shipping_line = $row['shipping_line'];
                                                $port_of_lord = $row['port_of_lord'];
                                                $ship_line_agent = $row['ship_line_agent'];
                                                $destination = $row['destination'];
                                                $wharf = $row['wharf'];
                                                $clearing_agent = $row['clearing_agent'];
                                                $form_e_no = $row['form_e_no'];
                                                $date = $row['date'];
                                                $cut_date = $row['cut_date'];
                                                $ship_rcv_date = $row['ship_rcv_date'];
                                                $hand_over_s_l = $row['hand_over_s_l'];
                                                $doc_disp_date = $row['doc_disp_date'];
                                                $cc_date = $row['cc_date'];
                                                $four_copy_rcv = $row['four_copy_rcv'];
                                                $four_copy_date = $row['four_copy_date'];
                                                $s_b_no = $row['s_b_no'];
                                                $s_b_date= $row['s_b_date'];
                                                $egm = $row['egm'];
                                                $mbl_no = $row['mbl_no'];
                                                $mbl_date = $row['mbl_date'];
                                                $hbl_no = $row['hbl_no'];
                                                $hbl_date = $row['hbl_date'];
                                                $cbm = $row['cbm'];
                                                $pkgs = $row['pkgs'];
                                                $grs_weight = $row['grs_weight'];
                                                $uom = $row['uom'];
                                                $net_weight = $row['net_weight'];
                                                $shipment_no = $row['shipment_no'];
                                                $l_f = $row['l_f'];
                                                $f_c = $row['f_c'];
                                                $cy_cfs = $row['cy_cfs'];
                                                $packages = $row['packages'];
                                                $unit = $row['unit'];
                                                $gross_weight = $row['gross_weight'];
                                                $cbm_ship = $row['cbm_ship'];
                                                $net_weight_a = $row['net_weight_a'];
                                                $ship_inv_no = $row['ship_inv_no'];
                                                $ship_inv_date = $row['ship_inv_date'];
                                                $ship_curr = $row['ship_curr'];
                                                $ship_amount = $row['ship_amount'];
                                                $pre_alert = $row['pre_alert'];
                                                $hbl_printed = $row['hbl_printed'];
                                                $local_inv = $row['local_inv'];
                                                $intl_inv = $row['intl_inv'];
                                                $name = $row['name'];
                                                $address_a = $row['address_a'];
                                                $consignee_name = $row['consignee_name'];
                                                $consignee_address = $row['consignee_address'];
                                                $notify = $row['notify'];
                                                $foreign_name = $row['foreign_name'];
                                                $foreign_address = $row['foreign_address'];
                                                $export_ref = $row['export_ref'];
                                                $domestic_routing = $row['domestic_routing'];
                                                $domestic_address = $row['domestic_address'];
                                                $orignal_fbl = $row['orignal_fbl'];
                                                $freight_pay = $row['freight_pay'];
                                                $eta_a_date = $row['eta_a_date'];
                                                $eta_b_date = $row['eta_b_date'];
                                                $eta_c_date = $row['eta_c_date'];
                                                $etd_a_date = $row['etd_a_date'];
                                                $etd_b_date = $row['etd_b_date'];
                                                $etd_c_date = $row['etd_c_date'];
                                                $eta_date_a = $row['eta_date_a'];
                                                $eta_date_b = $row['eta_date_b'];
                                                $eta_date_c = $row['eta_date_c'];
                                                $eta_a_date_box = $row['eta_a_date_box'];
                                                $eta_b_date_box = $row['eta_b_date_box'];
                                                $eta_c_date_box = $row['eta_c_date_box'];
                                                $etd_a_date_box = $row['etd_a_date_box'];
                                                $etd_b_date_box = $row['etd_b_date_box'];
                                                $etd_c_date_box = $row['etd_c_date_box'];
                                                $eta_date_a_box = $row['eta_date_a_box'];
                                                $eta_date_b_box = $row['eta_date_b_box'];
                                                $eta_date_c_box = $row['eta_date_c_box'];
                                                $vessel_a = $row['vessel_a'];
                                                $vessel_b = $row['vessel_b'];
                                                $vessel_c = $row['vessel_c'];
                                                $voyage_a = $row['voyage_a'];
                                                $voyage_b = $row['voyage_b'];
                                                $voyage_c = $row['voyage_c'];
                                                $id= $row['SrNo'];
                                ?>
                        <tr>
                          
                          <?php
                                                            if ($so_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $so_no; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($consol_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $consol_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($last_con_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $last_con_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($com_name_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $com_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($com_code_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $com_code; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($party_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $party; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($agent_party_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $agent_party; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($foreign_agent_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreign_agent  ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($nomination_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $nomination; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($spo_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $spo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($shipping_line_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipping_line; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($port_of_lord_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $port_of_lord; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_line_agent_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_line_agent; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($destination_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $destination; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($wharf_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $wharf; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($clearing_agent_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $clearing_agent; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($form_e_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $form_e_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cut_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cut_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_rcv_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_rcv_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($hand_over_s_l_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $hand_over_s_l; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($doc_disp_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $doc_disp_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cc_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cc_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($four_copy_rcv_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $four_copy_rcv; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($four_copy_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $four_copy_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($s_b_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $s_b_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if ($s_b_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $s_b_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                            <?php
                                                            if ($egm_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $egm; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mbl_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mbl_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($mbl_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $mbl_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!-- <?php
                                                            if ($b_e_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $b_e_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?> -->
                                                            <?php
                                                            if ($hbl_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $hbl_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($hbl_date_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $hbl_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cbm_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cbm ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($pkgs_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $pkgs ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($grs_weight == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $grs_weight ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($uom_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $uom ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($net_weight_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $net_weight ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($shipment_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipment_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($l_f_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $l_f ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($f_c_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $f_c ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cy_cfs_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cy_cfs ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($packages_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $packages ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($unit_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $unit ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($gross_weight_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $gross_weight ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cbm_ship_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cbm_ship ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($net_weight_a_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $net_weight_a ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_inv_no_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_inv_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_inv_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_inv_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_curr_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_curr ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($ship_amount_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $ship_amount ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($pre_alert_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $pre_alert ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($hbl_printed_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $hbl_printed ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($local_inv_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $local_inv ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($intl_inv_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $intl_inv ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($name_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $name ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($address_a_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $address_a ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($consignee_name_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $consignee_name ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($consignee_address_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $consignee_address ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($notify_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $notify ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($foreign_name_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreign_name ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($foreign_address_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreign_address ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($export_ref_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $export_ref ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                            <?php
                                                            if ($domestic_routing_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $domestic_routing; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($domestic_address_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $domestic_address; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($orignal_fbl_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $orignal_fbl ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                            <?php
                                                            if ($freight_pay_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $freight_pay; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($eta_a_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_a_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($eta_b_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_b_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($eta_c_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_c_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($etd_a_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_a_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($etd_b_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_b_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($etd_c_date_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_c_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($eta_date_a_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_a ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($eta_date_b_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_b ; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                        
                                                            <?php
                                                            if ($eta_date_c_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_c; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_a_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_a_date_box; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_b_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_b_date_box; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_c_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_c_date_box; ?></td>
                                                            <?php
                                                            }
                                                            ?>


                                                            <?php
                                                            if ($etd_a_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_a_date_box; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($etd_b_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_b_date_box ; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($etd_c_date_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $etd_c_date_box; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_date_a_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_a_box ; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_date_b_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_b_box ; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($eta_date_c_box_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $eta_date_c_box ; ?></td>
                                                            <?php
                                                            }
                                                            ?>


                                                            <?php
                                                            if ($vessel_a_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $vessel_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>


                                                            <?php
                                                            if ($vessel_b_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $vessel_b ; ?></td>
                                                            <?php
                                                            }
                                                            ?>


                                                            <?php
                                                            if ($vessel_c_SE == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $vessel_c; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($voyage_a_SE    == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $voyage_a; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($voyage_b_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $voyage_b; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($voyage_c_SE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $voyage_c; ?></td>
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