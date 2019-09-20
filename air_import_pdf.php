<?php

include 'manage/connection.php';

/*$searchRecord = $_GET["searchRecord"];*/

// Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM air_import_table_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $so_no_AI = $rowUM['so_no_AI'];
            $job_no_AI = $rowUM['job_no_AI'];
            $job_date_AI = $rowUM['job_date_AI'];
            $m_awb_AI = $rowUM['m_awb_AI'];
            $m_date_AI = $rowUM['m_date_AI'];
            $m_pp_cc_AI = $rowUM['m_pp_cc_AI'];
            
            $m_pieces_AI = $rowUM['m_pieces_AI'];
            $m_grs_weight_AI = $rowUM['m_grs_weight_AI'];
            $m_ch_weight_AI = $rowUM['m_ch_weight_AI'];
            $m_rate_AI = $rowUM['m_rate_AI'];
            $h_awb_AI = $rowUM['h_awb_AI'];
            $h_date_AI = $rowUM['h_date_AI'];
            $h_pp_cc_AI = $rowUM['h_pp_cc_AI'];
            $h_pieces_AI = $rowUM['h_pieces_AI'];
            $h_grs_weight_AI = $rowUM['h_grs_weight_AI'];
            $h_ch_weight_AI = $rowUM['h_ch_weight_AI'];
            $h_rate_AI = $rowUM['h_rate_AI'];
            $description_AI = $rowUM['description_AI'];
            $party_AI = $rowUM['party_AI'];
            $agent_party_AI = $rowUM['agent_party_AI'];
            $foreign_party_AI = $rowUM['foreign_party_AI'];
            $spo_AI = $rowUM['spo_AI'];
            $origin_AI = $rowUM['origin_AI'];
            $destination_AI = $rowUM['destination_AI'];
            $flight_no_AI = $rowUM['flight_no_AI'];
            $flight_date_AI = $rowUM['flight_date_AI'];
            $igm_no_AI = $rowUM['igm_no_AI'];
            $igm_date_AI = $rowUM['igm_date_AI'];
            $air_d_o_no_AI = $rowUM['air_d_o_no_AI'];
            $d_o_date_AI = $rowUM['d_o_date_AI'];
            $b_e_no_AI = $rowUM['b_e_no_AI'];
            $b_e_date_AI = $rowUM['b_e_date_AI'];
            $index_no_AI = $rowUM['index_no_AI'];
            $sub_index_no_AI = $rowUM['sub_index_no_AI'];
            $e_t_d_AI = $rowUM['e_t_d_AI'];
            $e_t_a_AI = $rowUM['e_t_a_AI'];
            $l_c_AI = $rowUM['l_c_AI'];
            $origin_d_o_no_AI = $rowUM['origin_d_o_no_AI'];
            $passport_id_AI = $rowUM['passport_id_AI'];
            $foreign_detail_AI = $rowUM['foreign_detail_AI'];
            $notify_detail_AI = $rowUM['notify_detail_AI'];
            $consignee_detail_AI = $rowUM['consignee_detail_AI'];
            $remarks_AI = $rowUM['remarks_AI'];
            $nomination_AI = $rowUM['nomination_AI'];
            $status_AI = $rowUM['status_AI'];
            $remark_AI = $rowUM['remark_AI'];
            $fight_term_AI = $rowUM['fight_term_AI'];
            $invoice_f_agent_AI = $rowUM['invoice_f_agent_AI'];
            $local_inv_AI = $rowUM['local_inv_AI'];
            $inv_from_f_agent_AI = $rowUM['inv_from_f_agent_AI'];
            $checkCurr_AI = $rowUM['checkCurr_AI'];
            $exchangeRate_P_AI = $rowUM['exchangeRate_P_AI'];
            $sellRate_P_AI = $rowUM['sellRate_P_AI'];
            $sellAmount_P_AI = $rowUM['sellAmount_P_AI'];
            $sellAmountPKR_P_AI = $rowUM['sellAmountPKR_P_AI'];
            $buyRate_P_AI = $rowUM['buyRate_P_AI'];
            $buyAmount_P_AI = $rowUM['buyAmount_P_AI'];
            $buyAmountPKR_P_AI = $rowUM['buyAmountPKR_P_AI'];
            $diffAmount_P_AI = $rowUM['diffAmount_P_AI'];
            $diffAmountPKR_P_AI = $rowUM['diffAmountPKR_P_AI'];
            $profitRate_P_AI = $rowUM['profitRate_P_AI'];
            $profitAmount_P_AI = $rowUM['profitAmount_P_AI'];
            $profitAmountPKR_P_AI = $rowUM['profitAmountPKR_P_AI'];
            $buyRate_F_AI = $rowUM['buyRate_F_AI'];
            $buyAmount_F_AI = $rowUM['buyAmount_F_AI'];
            $buyAmountPKR_F_AI = $rowUM['buyAmountPKR_F_AI'];
            $sellRate_F_AI = $rowUM['sellRate_F_AI'];
            $sellAmount_F_AI = $rowUM['sellAmount_F_AI'];
            $sellAmountPKR_F_AI = $rowUM['sellAmountPKR_F_AI'];
            $diffAmount_F_AI = $rowUM['diffAmount_F_AI'];
            $diffAmountPKR_F_AI = $rowUM['diffAmountPKR_F_AI'];
            $profitRate_F_AI = $rowUM['profitRate_F_AI'];
            $profitAmount_F_AI = $rowUM['profitAmount_F_AI'];
            $profitAmountPKR_F_AI = $rowUM['profitAmountPKR_F_AI'];
            $payableAmount_AI = $rowUM['payableAmount_AI'];
            $payableAmountPKR_AI = $rowUM['payableAmountPKR_AI'];
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
if ($so_no_AI == 1)
{
?>
<th>So No</th>
<?php
}
?>

<?php
if ($job_no_AI == 1)
{
?>
<th>Job No</th>
<?php
}
?>

<?php
if ($job_date_AI == 1)
{
?>
<th>Job Date</th>
<?php
}
?>

<?php
if ($m_awb_AI == 1)
{
?>
<th>MAWB No</th>
<?php
}
?>

<?php
if ($m_date_AI == 1)
{
?>
<th>MAWB Date</th>
<?php
}
?>

<?php
if ($m_pp_cc_AI == 1)
{
?>
<th>P/C Master</th>
<?php
}
?>



<?php
if ($m_pieces_AI == 1)
{
?>
<th>Pcs Master</th>
<?php
}
?>

<?php
if ($m_grs_weight_AI == 1)
{
?>
<th>Grs.Weight Master</th>
<?php
}
?>

<?php
if ($m_ch_weight_AI == 1)
{
?>
<th>Ch.Weight Master</th>
<?php
}
?>

<?php
if ($m_rate_AI == 1)
{
?>
<th>Rate Master</th>
<?php
}
?>
<?php
if ($h_awb_AI == 1)
{
?>
<th>HAWB No</th>
<?php
}
?>
<?php
if ($h_date_AI == 1)
{
?>
<th>HAWB Date</th>
<?php
}
?>
<?php
if ($h_pp_cc_AI == 1)
{
?>
<th>P/C House</th>
<?php
}
?>
<?php
if ($h_pieces_AI == 1)
{
?>
<th>Pcs House</th>
<?php
}
?>
<?php
if ($h_grs_weight_AI == 1)
{
?>
<th>Grs.Weight House</th>
<?php
}
?>
<?php
if ($h_ch_weight_AI == 1)
{
?>
<th>Ch.Weight House</th>
<?php
}
?>
<?php
if ($h_rate_AI == 1)
{
?>
<th>Rate House</th>
<?php
}
?>
<?php
if ($description_AI == 1)
{
?>
<th>Description</th>
<?php
}
?>
<?php
if ($party_AI == 1)
{
?>
<th>Party</th>
<?php
}
?>
<?php
if ($agent_party_AI == 1)
{
?>
<th>Agent Party</th>
<?php
}
?>
<?php
if ($foreign_party_AI == 1)
{
?>
<th>Foreign Party</th>
<?php
}
?>
<?php
if ($spo_AI == 1)
{
?>
<th>SPO</th>
<?php
}
?>
<?php
if ($origin_AI == 1)
{
?>
<th>Origin</th>
<?php
}
?>
<?php
if ($destination_AI == 1)
{
?>
<th>Destination</th>
<?php
}
?>
<?php
if ($flight_no_AI == 1)
{
?>
<th>Flight No</th>
<?php
}
?>

<?php
if ($flight_date_AI == 1)
{
?>
<th>Flight Date</th>
<?php
}
?>

<?php
if ($igm_no_AI == 1)
{
?>
<th>IGM No</th>
<?php
}
?>

<?php
if ($igm_date_AI == 1)
{
?>
<th>IGM Date</th>
<?php
}
?>

<?php
if ($air_d_o_no_AI == 1)
{
?>
<th>Air D.O.P No.</th>
<?php
}
?>

<?php
if ($d_o_date_AI == 1)
{
?>
<th>D.O Date</th>
<?php
}
?>
<?php
if ($b_e_no_AI == 1)
{
?>
<th>B.E.No</th>
<?php
}
?>
<?php
if ($b_e_date_AI == 1)
{
?>
<th>B.E.date</th>
<?php
}
?>
<?php
if ($index_no_AI == 1)
{
?>
<th>Index No</th>
<?php
}
?>
<?php
if ($sub_index_no_AI == 1)
{
?>
<th>Sub Index No</th>
<?php
}
?>
<?php
if ($e_t_d_AI == 1)
{
?>
<th>E.T.D</th>
<?php
}
?>
<?php
if ($e_t_a_AI == 1)
{
?>
<th> E.T.A</th>
<?php
}
?>
<?php
if ($l_c_AI == 1)
{
?>
<th>L/C</th>
<?php
}
?>
<?php
if ($origin_d_o_no_AI == 1)
{
?>
<th>Origin D.O.No</th>
<?php
}
?>
<?php
if ($passport_id_AI == 1)
{
?>
<th> Passport ID</th>
<?php
}
?>
<?php
if ($foreign_detail_AI == 1)
{
?>
<th>Foreign Agent</th>
<?php
}
?>
<?php
if ($notify_detail_AI == 1)
{
?>
<th>Notify </th>
<?php
}
?>
<?php
if ($consignee_detail_AI == 1)
{
?>
<th>Consignee</th>
<?php
}
?>
<?php
if ($remarks_AI == 1)
{
?>
<th>Remarks</th>
<?php
}
?>
<?php
if ($nomination_AI == 1)
{
?>
<th>Nomition</th>
<?php
}
?>
<?php
if ($status_AI == 1)
{
?>
<th> Status Shipment</th>
<?php
}
?>
<?php
if ($remark_AI == 1)
{
?>
<th>Shimp Remarks </th>
<?php
}
?>
<?php
if ($fight_term_AI == 1)
{
?>
<th>Freight Term</th>
<?php
}
?>
<?php
if ($invoice_f_agent_AI == 1)
{
?>
<th>Invoice To F/Agent</th>
<?php
}
?>
<?php
if ($local_inv_AI == 1)
{
?>
<th>Local Invoice</th>
<?php
}
?>
<?php
if ($inv_from_f_agent_AI == 1)
{
?>
<th>Invoice Form F/Agent</th>
<?php
}
?> 
<?php
if ($checkCurr_AI  == 1)
{
?>
<th>Currency</th>
<?php
}
?>
<?php
if ($exchangeRate_P_AI  == 1)
{
?>
<th>Exchange Rate</th>
<?php
}
?>
<?php
if ($sellRate_P_AI  == 1)
{
?>
<th>Sell Rate Party</th>
<?php
}
?>
<?php
if ($sellAmount_P_AI  == 1)
{
?>
<th>Sell Amount Party</th>
<?php
}
?>
<?php
if ($sellAmountPKR_P_AI  == 1)
{
?>
<th>Sell Amount PKR Party</th>
<?php
}
?>
<?php
if ($buyRate_P_AI  == 1)
{
?>
<th>Buy Rate Party</th>
<?php
}
?>
<?php
if ($buyAmount_P_AI  == 1)
{
?>
<th>Buy Amount Party</th>
<?php
}
?>
<?php
if ($buyAmountPKR_P_AI  == 1)
{
?>
<th>Buy Amount PKR Party</th>
<?php
}
?>
<?php
if ($diffAmount_P_AI  == 1)
{
?>
<th>Diff Amount Party</th>
<?php
}
?>
<?php
if ($diffAmountPKR_P_AI  == 1)
{
?>
<th>Diff Amount PKR Party</th>
<?php
}
?>
<?php
if ($profitRate_P_AI  == 1)
{
?>
<th>Profit Rate Party</th>
<?php
}
?>
<?php
if ($profitAmount_P_AI  == 1)
{
?>
<th>Profit Amount Party</th>
<?php
}
?>
<?php
if ($profitAmountPKR_P_AI  == 1)
{
?>
<th>Profit Amount PKR Party</th>
<?php
}
?>
<?php
if ($buyRate_F_AI  == 1)
{
?>
<th>Buy Rate Foreign</th>
<?php
}
?>

<?php
if ($buyAmount_F_AI  == 1)
{
?>
<th>Buy Amount Foreign</th>
<?php
}
?>
<?php
if ($buyAmountPKR_F_AI  == 1)
{
?>
<th>Buy Amount PKR Foreign</th>
<?php
}
?>
<?php
if ($sellRate_F_AI  == 1)
{
?>
<th>Sell Rate Foreign</th>
<?php
}
?>

<?php
if ($sellAmount_F_AI  == 1)
{
?>
<th>Sell Amount Foreign</th>
<?php
}
?>
<?php
if ($sellAmountPKR_F_AI  == 1)
{
?>
<th>Sell Amount PKR Foreign</th>
<?php
}
?>
<?php
if ($diffAmount_F_AI  == 1)
{
?>
<th>Diff Amount Foreign</th>
<?php
}
?>
<?php
if ($diffAmountPKR_F_AI  == 1)
{
?>
<th>Diff Amount PKR Foreign</th>
<?php
}
?>
<?php
if ($profitRate_F_AI  == 1)
{
?>
<th>Profit Rate Foregn</th>
<?php
}
?>
<?php
if ($profitAmount_F_AI  == 1)
{
?>
<th>Profit Amount Foreign</th>
<?php
}
?>
<?php
if ($profitAmountPKR_F_AI  == 1)
{
?>
<th>Profit Amount PKR Foreign</th>
<?php
}
?>
<?php
if ($payableAmount_AI  == 1)
{
?>
<th>Payable Amount</th>
<?php
}
?>
<?php
if ($payableAmountPKR_AI  == 1)
{
?>
<th>Payable Amount PKR</th>
<?php
}
?>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                          $run = mysqli_query($con, "SELECT * FROM air_import_entry ");


                                while ($row= mysqli_fetch_array($run))
                                {
                                  
                                                $so_no = $row['so_no'];
                                                $job_no = $row['job_no'];
                                                $job_date  = $row['job_date'];
                                                $m_awb = $row['m_awb'];
                                                $m_date = $row['m_date'];
                                                $m_pp_cc = $row['m_pp_cc'];
                                                $m_pieces = $row['m_pieces'];
                                                $m_grs_weight  = $row['m_grs_weight'];
                                                $m_ch_weight = $row['m_ch_weight'];
                                                $m_rate = $row['m_rate'];
                                                $h_awb = $row['h_awb'];
                                                $h_date = $row['h_date'];
                                                $h_pp_cc = $row['h_pp_cc'];
                                                $h_pieces = $row['h_pieces'];
                                                $h_grs_weight = $row['h_grs_weight'];
                                                $h_ch_weight = $row['h_ch_weight'];
                                                $h_rate = $row['h_rate'];
                                                $description = $row['description'];
                                                $party = $row['party'];   
                                                $agent_party = $row['agent_party'];
                                                $foreign_party = $row['foreign_party'];
                                                $spo = $row['spo'];
                                                $origin = $row['origin'];
                                                $destination = $row['destination'];
                                                $flight_no = $row['flight_no'];
                                                $flight_date = $row['flight_date'];
                                                $igm_no = $row['igm_no'];
                                                $igm_date = $row['igm_date'];
                                                $air_d_o_no = $row['air_d_o_no'];
                                                $d_o_date = $row['d_o_date'];
                                                $b_e_no = $row['b_e_no'];
                                                $b_e_date = $row['b_e_date'];
                                                $index_no = $row['index_no'];
                                                $sub_index_no = $row['sub_index_no'];
                                                $e_t_d = $row['e_t_d'];
                                                $e_t_a = $row['e_t_a'];
                                                $l_c = $row['l_c'];
                                                $origin_d_o_no = $row['origin_d_o_no'];
                                                $passport_id = $row['passport_id'];
                                                $foreign_detail = $row['foreign_detail'];
                                                $notify_detail = $row['notify_detail'];
                                                $consignee_detail = $row['consignee_detail'];
                                                $remarks = $row['remarks'];
                                                $nomination = $row['nomination'];
                                                $status = $row['status'];
                                                $remark = $row['remark'];
                                                $fight_term = $row['fight_term'];
                                                $invoice_f_agent = $row['invoice_f_agent'];
                                                $local_inv = $row['local_inv'];
                                                $inv_from_f_agent = $row['inv_from_f_agent'];
                                                $status_type = $row['status_type'];
                                                $checkCurr = $row['checkCurr'];
                                                $exchangeRate_P = $row['exchangeRate_P'];
                                                $sellRate_P = $row['sellRate_P'];
                                                $sellAmount_P = $row['sellAmount_P'];
                                                $sellAmountPKR_P = $row['sellAmountPKR_P'];
                                                $buyRate_P = $row['buyRate_P'];
                                                $buyAmount_P = $row['buyAmount_P'];
                                                $buyAmountPKR_P = $row['buyAmountPKR_P'];
                                                $diffAmount_P = $row['diffAmount_P'];
                                                $diffAmountPKR_P = $row['diffAmountPKR_P'];
                                                $profitRate_P = $row['profitRate_P'];
                                                $profitAmount_P = $row['profitAmount_P'];
                                                $profitAmountPKR_P = $row['profitAmountPKR_P'];
                                                $buyRate_F = $row['buyRate_F'];
                                                $buyAmount_F = $row['buyAmount_F'];
                                                $buyAmountPKR_F = $row['buyAmountPKR_F'];
                                                $sellRate_F = $row['sellRate_F'];
                                                $sellAmount_F = $row['sellAmount_F'];
                                                $sellAmountPKR_F = $row['sellAmountPKR_F'];
                                                $diffAmount_F = $row['diffAmount_F'];
                                                $diffAmountPKR_F = $row['diffAmountPKR_F'];
                                                $profitRate_F = $row['profitRate_F'];
                                                $profitAmount_F = $row['profitAmount_F'];
                                                $profitAmountPKR_F = $row['profitAmountPKR_F'];
                                                $payableAmount = $row['payableAmount'];
                                                $payableAmountPKR = $row['payableAmountPKR'];
                                ?>
                        <tr>
                          
                          <?php
                                                            if ($so_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $so_no; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($job_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $job_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_awb_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_awb; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_pp_cc_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_pp_cc; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            
                                                            <?php
                                                            if ($m_pieces_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_pieces; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_grs_weight_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_grs_weight; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_ch_weight_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_ch_weight; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($m_rate_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $m_rate  ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_awb_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_awb; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_pp_cc_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_pp_cc; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_pieces_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_pieces; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_grs_weight_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_grs_weight; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_ch_weight_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_ch_weight; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($h_rate_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $h_rate; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($description_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $description; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($party_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $party; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($agent_party_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $agent_party; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($foreign_party_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreign_party; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($spo_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $spo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($origin_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $origin; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($destination_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $destination; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($flight_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($igm_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $igm_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($igm_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $igm_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($air_d_o_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $air_d_o_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($d_o_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $d_o_date; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($b_e_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $b_e_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($b_e_date_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $b_e_date ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($index_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $index_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sub_index_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sub_index_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($e_t_d_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $e_t_d ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($e_t_a_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $e_t_a ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($l_c_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $l_c ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($origin_d_o_no_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $origin_d_o_no ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($passport_id_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $passport_id ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($foreign_detail_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $foreign_detail ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($notify_detail_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $notify_detail ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($consignee_detail_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $consignee_detail ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($remarks_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $remarks ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($nomination_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $nomination ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $status ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($remark_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $remark ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fight_term_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fight_term ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($invoice_f_agent_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $invoice_f_agent ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($local_inv_AI == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $local_inv ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($inv_from_f_agent_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $inv_from_f_agent ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($checkCurr_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $checkCurr ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($exchangeRate_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $exchangeRate_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sellRate_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellRate_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sellAmount_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellAmount_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sellAmountPKR_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellAmountPKR_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($buyRate_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyRate_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($buyAmount_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyAmount_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($buyAmountPKR_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyAmountPKR_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($diffAmount_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $diffAmount_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($diffAmountPKR_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $diffAmountPKR_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitRate_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitRate_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitAmount_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitAmount_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitAmountPKR_P_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitAmountPKR_P ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($buyRate_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyRate_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                           
                                                            <?php
                                                            if ($buyAmount_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyAmount_F; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($buyAmountPKR_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $buyAmountPKR_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sellRate_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellRate_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                            <?php
                                                            if ($sellAmount_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellAmount_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($sellAmountPKR_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sellAmountPKR_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($diffAmount_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $diffAmount_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($diffAmountPKR_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $diffAmountPKR_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitRate_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitRate_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitAmount_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitAmount_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($profitAmountPKR_F_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $profitAmountPKR_F ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($payableAmount_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $payableAmount ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($payableAmountPKR_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $payableAmountPKR ; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $status_type ; ?></td>
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