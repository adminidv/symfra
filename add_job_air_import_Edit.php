<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';



//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");
// After Submit
//$empNo = $_GET['empNo'];
$userNo = $_GET['id'];
  // echo $user_id;
  $qry= "SELECT * FROM  air_import_entry WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {

                  $SrNo_p = $row['SrNo'];
                  $so_no_p = $row['so_no'];
                  $job_no_p = $row['job_no'];
                  $job_date_p  = $row['job_date'];
                  $m_awb_p = $row['m_awb'];
                  $m_date_p = $row['m_date'];
                  $m_pp_cc_p = $row['m_pp_cc'];
                  $m_pieces_p = $row['m_pieces'];
                  $m_grs_weight_p  = $row['m_grs_weight'];
                  $m_ch_weight_p = $row['m_ch_weight'];
                  $m_rate_p = $row['m_rate'];
                  $h_awb_p = $row['h_awb'];
                  $h_date_p = $row['h_date'];
                  $h_pp_cc_p = $row['h_pp_cc'];
                  $h_pieces_p = $row['h_pieces'];
                  $h_grs_weight_p = $row['h_grs_weight'];
                  $h_ch_weight_p = $row['h_ch_weight'];
                  $h_rate_p = $row['h_rate'];
                  $description_p = $row['description'];
                  $party_p = $row['party'];   
                  $agent_party_p = $row['agent_party'];
                  $foreign_party_p = $row['foreign_party'];
                  $spo_p = $row['spo'];
                  $origin_p = $row['origin'];
                  $destination_p = $row['destination'];
                  $flight_no_p = $row['flight_no'];
                  $flight_date_p = $row['flight_date'];
                  $igm_no_p = $row['igm_no'];
                  $igm_date_p = $row['igm_date'];
                  $air_d_o_no_p = $row['air_d_o_no'];
                  $d_o_date_p = $row['d_o_date'];
                  $b_e_no_p = $row['b_e_no'];
                  $b_e_date_p = $row['b_e_date'];
                  $index_no_p = $row['index_no'];
                  $sub_index_no_p = $row['sub_index_no'];
                  $e_t_d_p = $row['e_t_d'];
                  $e_t_a_p = $row['e_t_a'];
                  $l_c_p = $row['l_c'];
                  $origin_d_o_no_p = $row['origin_d_o_no'];
                  $passport_id_p = $row['passport_id'];
                  $foreign_detail_p = $row['foreign_detail'];
                  $notify_detail_p = $row['notify_detail'];
                  $consignee_detail_p = $row['consignee_detail'];
                  $remarks_p = $row['remarks'];
                  $nomination_p = $row['nomination'];
                  $status_p = $row['status'];
                  $remark_p = $row['remark'];
                  $fight_term_p = $row['fight_term'];
                  $invoice_f_agent_p = $row['invoice_f_agent'];
                  $local_inv_p = $row['local_inv'];
                  $inv_from_f_agent_p = $row['inv_from_f_agent'];
                  $status_type_p = $row['status_type'];
                  $checkCurr_p = $row['checkCurr'];
                  $exchangeRate_p = $row['exchangeRate_P'];
                  $sellRate_p = $row['sellRate_P'];
                  $sellAmount_p = $row['sellAmount_P'];
                  $sellAmountPKR_p = $row['sellAmountPKR_P'];
                  $buyRate_p = $row['buyRate_P'];
                  $buyAmount_p = $row['buyAmount_P'];
                  $buyAmountPKR_p = $row['buyAmountPKR_P'];
                  $diffAmount_p = $row['diffAmount_P'];
                  $diffAmountPKR_p = $row['diffAmountPKR_P'];
                  $profitRate_p = $row['profitRate_P'];
                  $profitAmount_p = $row['profitAmount_P'];
                  $profitAmountPKR_p = $row['profitAmountPKR_P'];
                  $buyRate_F_p = $row['buyRate_F'];
                  $buyAmount_F_p = $row['buyAmount_F'];
                  $buyAmountPKR_F_p = $row['buyAmountPKR_F'];
                  $sellRate_F_p = $row['sellRate_F'];
                  $sellAmount_F_p = $row['sellAmount_F'];
                  $sellAmountPKR_F_p = $row['sellAmountPKR_F'];
                  $diffAmount_F_p = $row['diffAmount_F'];
                  $diffAmountPKR_F_p = $row['diffAmountPKR_F'];
                  $profitRate_F_p = $row['profitRate_F'];
                  $profitAmount_F_p = $row['profitAmount_F'];
                  $profitAmountPKR_F_p = $row['profitAmountPKR_F'];
                  $payableAmount_p = $row['payableAmount'];
                  $payableAmountPKR_p = $row['payableAmountPKR'];

    }
    else
    {
        $msg = 'Got some error ';

        function alert($msg)
        {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
        alert($msg);
    }


if(isset($_POST['updateBtn']))
{
                   $so_no = $_POST['so_no'];
                  $job_no = $_POST['job_no'];
                  $job_date  = $_POST['job_date'];
                  $m_awb = $_POST['m_awb'];
                  $m_date = $_POST['m_date'];
                  $m_pp_cc = $_POST['m_pp_cc'];
                  $m_pieces = $_POST['m_pieces'];
                  $m_grs_weight  = $_POST['m_grs_weight'];
                  $m_ch_weight = $_POST['m_ch_weight'];
                  $m_rate = $_POST['m_rate'];
                  $h_awb = $_POST['h_awb'];
                  $h_date = $_POST['h_date'];
                  $h_pp_cc = $_POST['h_pp_cc'];
                  $h_pieces = $_POST['h_pieces'];
                  $h_grs_weight = $_POST['h_grs_weight'];
                  $h_ch_weight = $_POST['h_ch_weight'];
                  $h_rate = $_POST['h_rate'];
                  $description = $_POST['description'];
                  $party = $_POST['party'];
                  $agent_party =$_POST['agent_party'];  
                  $foreign_party = $_POST['foreign_party'];
                  $spo = $_POST['spo'];
                  $origin = $_POST['origin'];
                  $destination = $_POST['destination'];
                  $flight_no = $_POST['flight_no'];
                  $flight_date = $_POST['flight_date'];
                  $igm_no = $_POST['igm_no'];
                  $igm_date = $_POST['igm_date'];
                  $air_d_o_no = $_POST['air_d_o_no'];
                  $d_o_date = $_POST['d_o_date'];
                  $b_e_no = $_POST['b_e_no'];
                  $b_e_date = $_POST['b_e_date'];
                  $index_no = $_POST['index_no'];
                  $sub_index_no = $_POST['sub_index_no'];
                  $e_t_d = $_POST['e_t_d'];
                  $e_t_a = $_POST['e_t_a'];
                  $l_c = $_POST['l_c'];
                  $origin_d_o_no = $_POST['origin_d_o_no'];
                  $passport_id = $_POST['passport_id'];
                  $foreign_detail = $_POST['foreign_detail'];
                  $notify_detail = $_POST['notify_detail'];
                  $consignee_detail = $_POST['consignee_detail'];
                  $remarks = $_POST['remarks'];
                  $nomination = $_POST['nomination'];
                  $status = $_POST['status'];
                  $remark = $_POST['remark'];
                  $fight_term = $_POST['fight_term'];
                  $invoice_f_agent = $_POST['invoice_f_agent'];
                  $local_inv = $_POST['local_inv'];
                  $inv_from_f_agent = $_POST['inv_from_f_agent'];
                  $status_type =  $_POST['status_type'];
                  $checkCurr = $_POST['checkCurr'];
                  $exchangeRate = $_POST['exchangeRate_P'];
                  $sellRate = $_POST['sellRate_P'];
                  $sellAmount = $_POST['sellAmount_P'];
                  $sellAmountPKR = $_POST['sellAmountPKR_P'];
                  $buyRate = $_POST['buyRate_P'];
                  $buyAmount = $_POST['buyAmount_P'];
                  $buyAmountPKR = $_POST['buyAmountPKR_P'];
                  $diffAmount = $_POST['diffAmount_P'];
                  $diffAmountPKR = $_POST['diffAmountPKR_P'];
                  $profitRate = $_POST['profitRate_P'];
                  $profitAmount = $_POST['profitAmount_P'];
                  $profitAmountPKR = $_POST['profitAmountPKR_P'];
                  $buyRate_F = $_POST['buyRate_F'];
                  $buyAmount_F = $_POST['buyAmount_F'];
                  $buyAmountPKR_F = $_POST['buyAmountPKR_F'];
                  $sellRate_F = $_POST['sellRate_F'];
                  $sellAmount_F = $_POST['sellAmount_F'];
                  $sellAmountPKR_F = $_POST['sellAmountPKR_F'];
                  $diffAmount_F = $_POST['diffAmount_F'];
                  $diffAmountPKR_F = $_POST['diffAmountPKR_F'];
                  $profitRate_F = $_POST['profitRate_F'];
                  $profitAmount_F = $_POST['profitAmount_F'];
                  $profitAmountPKR_F = $_POST['profitAmountPKR_F'];
                  $payableAmount = $_POST['payableAmount'];
                  $payableAmountPKR = $_POST['payableAmountPKR'];

                  $clause = " WHERE SrNo='$userNo'";
                  $initQuery = "UPDATE air_import_entry SET SrNo='$userNo'";

                      // change log
                  $selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$userNo' ORDER BY instance DESC LIMIT 1  ");
                  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

                  $lastID1 = $rowLastID1['instance'];
                  $newID1 = $lastID1 + 1;
                  $instance = $newID1;

                  $selectCreate = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$userNo' ");
                  while ($rowCreate = mysqli_fetch_array($selectCreate))
                  {
                  if ($rowCreate['createBy'] != "")
                  {
                    $createBy = $rowCreate['createBy'];
                  }
                  if ($rowCreate['createDate'] != "")
                  {
                    $createDate = $rowCreate['createDate'];
                  }
                  }

                  $initChangeLog = "INSERT INTO chainlog (instance, formName, record_id, createBy, createDate, updateBy, updateDate, perValue, newValue)";
                  $initChangeLog .= " VALUES ('$newID1', 'Air Import', '$userNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

                       if ($so_no != $so_no_p)
                      {
                        $initQuery .= ", so_no='$so_no'";
                        $initChangeLog2 = ", '$so_no_p', '$so_no') ";

                         // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                      if ($job_no != $job_no_p)
                      {
                        $initQuery .= ", job_no='$job_no'";
                        $initChangeLog2 = ", '$job_no_p', '$job_no') ";

                         // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }
                      if ($job_date != $job_date_p)
                      {
                        $initQuery .= ", job_date='$job_date'";
                        $initChangeLog2 = ", '$job_date_p', '$job_date') ";

                         // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

                      }
                      if ($m_awb != $m_awb_p)
                      {
                        $initQuery .= ", m_awb='$m_awb'";
                        $initChangeLog2 = ", '$m_awb_p', '$m_awb') ";

                         // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }
                      if ($m_date != $m_date_p)
                      {
                        $initQuery .= ", m_date='$m_date'";
                        $initChangeLog2 = ", '$m_date_p', '$m_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }
                      if ($m_pp_cc!= $m_pp_cc_p)
                      {
                        $initQuery .= ",m_pp_cc='$m_pp_cc'";
                        $initChangeLog2 = ", '$m_pp_cc_p', '$m_pp_cc') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }    
                      if ($m_pieces != $m_pieces_p)
                      {
                        $initQuery .= ", m_pieces='$m_pieces'";
                        $initChangeLog2 = ", '$m_pieces_p', '$m_pieces') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }  

                      if ($m_grs_weight != $m_grs_weight_p)
                      {
                        $initQuery .= ", m_grs_weight='$m_grs_weight'";
                        $initChangeLog2 = ", '$m_grs_weight_p', '$m_grs_weight') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }  
                      if ($m_ch_weight != $m_ch_weight_p)
                      {
                        $initQuery .= ", m_ch_weight='$m_ch_weight'";
                        $initChangeLog2 = ", '$m_ch_weight_p', '$m_ch_weight') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }
                      if ($m_rate != $m_rate_p)
                      {
                        $initQuery .= ", m_rate='$m_rate'";
                        $initChangeLog2 = ", '$m_rate_p', '$m_rate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                      if ($h_awb != $h_awb_p)
                      {
                        $initQuery .= ", h_awb='$h_awb'";
                        $initChangeLog2 = ", '$h_awb_p', '$h_awb') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                      if ($h_date != $h_date_p)
                      {
                        $initQuery .= ", h_date='$h_date'";
                        $initChangeLog2 = ", '$h_date_p', '$h_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($h_pp_cc != $h_pp_cc_p)
                      {
                        $initQuery .= ", h_pp_cc='$h_pp_cc'";
                        $initChangeLog2 = ", '$h_pp_cc_p', '$h_pp_cc') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($h_pieces != $h_pieces_p)
                      {
                        $initQuery .= ", h_pieces='$h_pieces'";
                        $initChangeLog2 = ", '$h_pieces_p', '$h_pieces') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($h_grs_weight != $h_grs_weight_p)
                      {
                        $initQuery .= ", h_grs_weight='$h_grs_weight'";
                        $initChangeLog2 = ", '$h_grs_weight_p', '$h_grs_weight') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($h_ch_weight != $h_ch_weight_p)
                      {
                        $initQuery .= ", h_ch_weight='$h_ch_weight'";
                        $initChangeLog2 = ", '$h_ch_weight_p', '$h_ch_weight') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($h_rate != $h_rate_p)
                      {
                        $initQuery .= ", h_rate='$h_rate'";
                        $initChangeLog2 = ", '$h_rate_p', '$h_rate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }
                      if ($description != $description_p)
                      {
                        $initQuery .= ", description='$description'";
                        $initChangeLog2 = ", '$description_p', '$description') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($party != $party_p)
                      {
                        $initQuery .= ", party='$party'";
                        $initChangeLog2 = ", '$party_p', '$party') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($agent_party != $agent_party_p)
                      {
                        $initQuery .= ", agent_party='$agent_party'";
                        $initChangeLog2 = ", '$agent_party_p', '$agent_party') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($foreign_party != $foreign_party_p)
                      {
                        $initQuery .= ", foreign_party='$foreign_party'";
                        $initChangeLog2 = ", '$foreign_party_p', '$foreign_party') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($spo != $spo_p)
                      {
                        $initQuery .= ", spo='$spo'";
                        $initChangeLog2 = ", '$spo_p', '$spo') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($origin != $origin_p)
                      {
                        $initQuery .= ", origin='$origin'";
                        $initChangeLog2 = ", '$origin_p', '$origin') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($destination != $destination_p)
                      {
                        $initQuery .= ", destination='$destination'";
                        $initChangeLog2 = ", '$destination_p', '$destination') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($flight_no != $flight_no_p)
                      {
                        $initQuery .= ", flight_no='$flight_no'";
                        $initChangeLog2 = ", '$flight_no_p', '$flight_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($flight_date != $flight_date_p)
                      {
                        $initQuery .= ", flight_date='$flight_date'";
                        $initChangeLog2 = ", '$flight_date_p', '$flight_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($igm_no != $igm_no_p)
                      {
                        $initQuery .= ", igm_no='$igm_no'";
                        $initChangeLog2 = ", '$igm_no_p', '$igm_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($igm_date != $igm_date_p)
                      {
                        $initQuery .= ", igm_date='$igm_date'";
                        $initChangeLog2 = ", '$igm_date_p', '$igm_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($air_d_o_no != $air_d_o_no_p)
                      {
                        $initQuery .= ", air_d_o_no='$air_d_o_no'";
                        $initChangeLog2 = ", '$air_d_o_no_p', '$air_d_o_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($d_o_date != $d_o_date_p)
                      {
                        $initQuery .= ", d_o_date='$d_o_date'";
                        $initChangeLog2 = ", '$d_o_date_p', '$d_o_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($b_e_no != $b_e_no_p)
                      {
                        $initQuery .= ", b_e_no='$b_e_no'";
                        $initChangeLog2 = ", '$b_e_no_p', '$b_e_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($b_e_date != $b_e_date_p)
                      {
                        $initQuery .= ", b_e_date='$b_e_date'";
                        $initChangeLog2 = ", '$b_e_date_p', '$b_e_date') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($index_no != $index_no_p)
                      {
                        $initQuery .= ", index_no='$index_no'";
                        $initChangeLog2 = ", '$index_no_p', '$index_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($sub_index_no != $sub_index_no_p)
                      {
                        $initQuery .= ", sub_index_no='$sub_index_no'";
                        $initChangeLog2 = ", '$sub_index_no_p', '$sub_index_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($e_t_d != $e_t_d_p)
                      {
                        $initQuery .= ", e_t_d='$e_t_d'";
                        $initChangeLog2 = ", '$e_t_d_p', '$e_t_d') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($e_t_a != $e_t_a_p)
                      {
                        $initQuery .= ", e_t_a='$e_t_a'";
                        $initChangeLog2 = ", '$e_t_a_p', '$e_t_a') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($l_c != $l_c_p)
                      {
                        $initQuery .= ", l_c='$l_c'";
                        $initChangeLog2 = ", '$l_c_p', '$l_c') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($origin_d_o_no != $origin_d_o_no_p)
                      {
                        $initQuery .= ", origin_d_o_no='$origin_d_o_no'";
                        $initChangeLog2 = ", '$origin_d_o_no_p', '$origin_d_o_no') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($passport_id != $passport_id_p)
                      {
                        $initQuery .= ", passport_id='$passport_id'";
                        $initChangeLog2 = ", '$passport_id_p', '$passport_id') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($foreign_detail != $foreign_detail_p)
                      {
                        $initQuery .= ", foreign_detail='$foreign_detail'";
                        $initChangeLog2 = ", '$foreign_detail_p', '$foreign_detail') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($notify_detail != $notify_detail_p)
                      {
                        $initQuery .= ", notify_detail='$notify_detail'";
                        $initChangeLog2 = ", '$notify_detail_p', '$notify_detail') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                        if ($consignee_detail != $consignee_detail_p)
                      {
                        $initQuery .= ", consignee_detail='$consignee_detail'";
                        $initChangeLog2 = ", '$consignee_detail_p', '$consignee_detail') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($remarks != $remarks_p)
                      {
                        $initQuery .= ", remarks='$remarks'";
                        $initChangeLog2 = ", '$remarks_p', '$remarks') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($nomination != $nomination_p)
                      {
                        $initQuery .= ", nomination='$nomination'";
                        $initChangeLog2 = ", '$nomination_p', '$nomination') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($status != $status_p)
                      {
                        $initQuery .= ", status='$status'";
                        $initChangeLog2 = ", '$status_p', '$status') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($remark != $remark_p)
                      {
                        $initQuery .= ", remark='$remark'";
                        $initChangeLog2 = ", '$remark_p', '$remark') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                        if ($fight_term != $fight_term_p)
                      {
                        $initQuery .= ", fight_term='$fight_term'";
                        $initChangeLog2 = ", '$fight_term_p', '$fight_term') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                        if ($invoice_f_agent != $invoice_f_agent_p)
                      {
                        $initQuery .= ", invoice_f_agent='$invoice_f_agent'";
                        $initChangeLog2 = ", '$invoice_f_agent_p', '$invoice_f_agent') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($local_inv != $local_inv_p)
                      {
                        $initQuery .= ", local_inv_p='$local_inv'";
                        $initChangeLog2 = ", '$local_inv_p', '$local_inv') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($inv_from_f_agent != $inv_from_f_agent_p)
                      {
                        $initQuery .= ", inv_from_f_agent='$inv_from_f_agent'";
                        $initChangeLog2 = ", '$inv_from_f_agent_p', '$inv_from_f_agent') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                         if ($status_type != $status_type_p)
                      {
                        $initQuery .= ", status_type='$status_type'";
                        $initChangeLog2 = ", '$status_type_p', '$status_type') ";
                      }


                         if ($checkCurr != $checkCurr_p)
                      {
                        $initQuery .= ", checkCurr='$checkCurr'";
                        $initChangeLog2 = ", '$checkCurr_p', '$checkCurr') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($exchangeRate != $exchangeRate_p)
                      {
                        $initQuery .= ", exchangeRate='$exchangeRate'";
                        $initChangeLog2 = ", '$exchangeRate_p', '$exchangeRate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($sellRate != $sellRate_p)
                      {
                        $initQuery .= ", sellRate='$sellRate'";
                        $initChangeLog2 = ", '$sellRate_p', '$sellRate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($sellAmount != $sellAmount_p)
                      {
                        $initQuery .= ", sellAmount='$sellAmount'";
                        $initChangeLog2 = ", '$sellAmount_p', '$sellAmount') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($sellAmountPKR != $sellAmountPKR_p)
                      {
                        $initQuery .= ", sellAmountPKR='$sellAmountPKR'";
                        $initChangeLog2 = ", '$sellAmountPKR_p', '$sellAmountPKR') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                         if ($buyRate != $buyRate_p)
                      {
                        $initQuery .= ", buyRate='$buyRate'";
                        $initChangeLog2 = ", '$buyRate_p', '$buyRate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                         if ($buyAmount != $buyAmount_p)
                      {
                        $initQuery .= ", buyAmount='$buyAmount'";
                        $initChangeLog2 = ", '$buyAmount_p', '$buyAmount') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($buyAmountPKR != $buyAmountPKR_p)
                      {
                        $initQuery .= ", buyAmountPKR='$buyAmountPKR'";
                        $initChangeLog2 = ", '$buyAmountPKR_p', '$buyAmountPKR') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($fight_term != $fight_term_p)
                      {
                        $initQuery .= ", fight_term='$fight_term'";
                        $initChangeLog2 = ", '$fight_term_p', '$fight_term') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      } 


                         if ($diffAmount != $diffAmount_p)
                      {
                        $initQuery .= ", diffAmount='$diffAmount'";
                        $initChangeLog2 = ", '$diffAmount_p', '$diffAmount') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                      //    if ($diffAmount != $diffAmount_p)
                      // {
                      //   $initQuery .= ", diffAmount='$diffAmount'";
                      //   $initChangeLog2 = ", '$', '$') ";
                      // }


                         if ($diffAmountPKR != $diffAmountPKR_p)
                      {
                        $initQuery .= ", diffAmountPKR='$diffAmountPKR'";
                        $initChangeLog2 = ", '$diffAmountPKR_p', '$diffAmountPKR') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($profitRate != $profitRate_p)
                      {
                        $initQuery .= ", profitRate='$profitRate'";
                        $initChangeLog2 = ", '$profitRate_p', '$profitRate') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($profitAmount != $profitAmount_p)
                      {
                        $initQuery .= ", profitAmount='$profitAmount'";
                        $initChangeLog2 = ", '$profitAmount_p', '$profitAmount') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($profitAmountPKR != $profitAmountPKR_p)
                      {
                        $initQuery .= ", profitAmountPKR='$profitAmountPKR'";
                        $initChangeLog2 = ", '$profitAmountPKR_p', '$profitAmountPKR') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                         if ($buyRate_F != $buyRate_F_p)
                      {
                        $initQuery .= ", buyRate_F='$buyRate_F'";
                        $initChangeLog2 = ", '$buyRate_F_p', '$buyRate_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($buyAmount_F != $buyAmount_F_p)
                      {
                        $initQuery .= ", buyAmount_F='$buyAmount_F'";
                        $initChangeLog2 = ", '$buyAmount_F_p', '$buyAmount_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($buyAmountPKR_F != $buyAmountPKR_F_p)
                      {
                        $initQuery .= ", buyAmountPKR_F='$buyAmountPKR_F'";
                        $initChangeLog2 = ", '$buyAmountPKR_F_p', '$buyAmountPKR_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                         if ($sellRate_F != $sellRate_F_p)
                      {
                        $initQuery .= ", sellRate_F='$sellRate_F'";
                        $initChangeLog2 = ", '$sellRate_F_p', '$sellRate_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }




                         if ($sellAmount_F != $sellAmount_F_p)
                      {
                        $initQuery .= ", sellAmount_F='$sellAmount_F'";
                        $initChangeLog2 = ", '$sellAmount_F_p', '$sellAmount_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }




                         if ($sellAmountPKR_F_p != $sellAmountPKR_F_p)
                      {
                        $initQuery .= ", sellAmountPKR_F_p='$sellAmountPKR_F_p'";
                        $initChangeLog2 = ", '$sellAmountPKR_F_p_p', '$sellAmountPKR_F_p') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }




                         if ($sellAmountPKR_F != $sellAmountPKR_F_p)
                      {
                        $initQuery .= ", sellAmountPKR_F='$sellAmountPKR_F'";
                        $initChangeLog2 = ", '$sellAmountPKR_F_p', '$sellAmountPKR_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }



                      //    if ($diffAmount_F != $diffAmount_F_p)
                      // {
                      //   $initQuery .= ", diffAmount_F='$diffAmount_F'";
                      //   $initChangeLog2 = ", '$', '$') ";
                      // }


                         if ($diffAmount_F != $diffAmount_F_p)
                      {
                        $initQuery .= ", diffAmount_F='$diffAmount_F'";
                        $initChangeLog2 = ", '$diffAmount_F_p', '$diffAmount_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($diffAmountPKR_F != $diffAmountPKR_F_p)
                      {
                        $initQuery .= ", diffAmountPKR_F='$diffAmountPKR_F'";
                        $initChangeLog2 = ", '$diffAmountPKR_F_p', '$diffAmountPKR_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($profitRate_F != $profitRate_F_p)
                      {
                        $initQuery .= ", profitRate_F='$profitRate_F'";
                        $initChangeLog2 = ", '$profitRate_F_p', '$profitRate_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                         if ($profitAmount_F != $profitAmount_F_p)
                      {
                        $initQuery .= ", profitAmount_F='$profitAmount_F'";
                        $initChangeLog2 = ", '$profitAmount_F_p', '$profitAmount_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }

                         if ($profitAmountPKR_F != $profitAmountPKR_F_p)
                      {
                        $initQuery .= ", profitAmountPKR_F='$profitAmountPKR_F'";
                        $initChangeLog2 = ", '$profitAmountPKR_F_p', '$profitAmountPKR_F') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($payableAmount != $payableAmount_p)
                      {
                        $initQuery .= ", payableAmount='$payableAmount'";
                        $initChangeLog2 = ", '$payableAmount_p', '$payableAmount') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                         if ($payableAmountPKR != $payableAmountPKR_p)
                      {
                        $initQuery .= ", payableAmountPKR='$payableAmountPKR'";
                        $initChangeLog2 = ", '$payableAmountPKR_p', '$payableAmountPKR') ";
                        // qurey..
                      $finalChangeLog = $initChangeLog . $initChangeLog2;
                      

                      mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
                      }


                      
                      $finalQuery = $initQuery . $clause;
                      // echo $finalQuery;

                      mysqli_query($con, $finalQuery) or die(mysqli_error($con));

                      

                        header("Location: add_job_air_import_Edit.php?id=" . $userNo);


}
?>




<!DOCTYPE html>
<html>
<head>
   <title>Air Import (Job Entry) </title>
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/crm.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
  <script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
  
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
   
    

<style type="text/css">
.main_widget_box .nav-tabs > li > a {
        color: #05417e;
    }
.main_widget_box  .nav-tabs {
        background: #eee;
    }
.main_widget_box .tab-pane {
    margin-top: 30px;
    width: 100%;
    float: left;
}

#prtner_Bnk .input-feild input {
    padding: 0 0px;
}
#prtner_Bnk .input-feild {
    width: 70%;
}
#aimport_form_table_wrapper .dataTables_filter {
    display: none;
}
#aimport_form_table2_wrapper .dataTables_filter {
    display: none;
}

 #aimport_form_table .mini_input_field {
    width: 85% !important;
} 
  th {
    text-align: left !important;
}
.dataTables_filter {
    display: none;
}

</style>

</head>
<body>
<?php include 'header.php';?>
<?php include 'inc_widgets/header_ribbon.php';?>

<!-- Bread Crumbs -->
<div class="breadCrumb_bar">
  <div class="breadCrumb_bar_iner">
    <div class>
        <div class="btn-group btn-breadcrumb">
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info ">Operations</a>

          <a href="Usermodules.php" class="btn btn-info active">Air Import (Job Entry)</a>

        </div>
    </div>
  </div>
</div>

<div class="page-wrapper symfra_theme toggled">

 <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">

           <div class="sidebar-brand">
            <a href="#">SYMFRA</a>
                <div id="close-sidebar">
                  <!-- <i class="fa fa-close"></i> -->
                </div>
           </div>

           <?php include 'sidebar_widgets/user_info_widgets.php'; ?>
                   <!-- sidebar-header  -->

           <div class="sidebar-search">
              <div>
                <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Search...">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
           </div>
                    <!-- sidebar-search  -->

           <?php include 'sidebar_widgets/dai_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class="main_widget_box">
  <div class>
                  <!-- <hr> -->
    <form action="" method="POST" enctype="multipart/form-data">


        <!-- Modal One-->
             <div class="modal fade confirmTable-modal" id="addModal1" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                      </div>
                      <div class="modal-body">
                        <p>Are You Sure You Want to Submit?</p>
                        <button type="submit" name="updateBtn">Yes</button>
                            <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                      </div>
                      <div class="modal-footer">
                        <p>Add Related content if needed</p>
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                      </div>
                    </div>
                  </div>
             </div>



      <!-- Modal_one-->
       <div class="modal fade confirmTable-modal" id="save_Modal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are You Sure You Want to Save?</p>
                <button type="submit" name="saveBtn">Yes</button>
                    <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

              </div>
              <div class="modal-footer">
                <p>Add Related content if needed</p>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
            </div>
            
          </div>
       </div>

              <!-- Show Log Chain -->
      <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Show Log Chain -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Log Chain Details</h4>
                </div>

                  <table id="dpttable" class="display nowrap no-footer" style="width:100%">
                     
                     <thead>
                      <tr>
                      <th>SrNo</th>
                      <th>Instance</th>
                      <th>Record ID</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Update By</th>
                      <th>Update Date</th>
                      <th>Pervious Value</th>
                      <th>New Value</th>
                      </tr>

                     </thead>
                     <tbody>
                      <?php

                              include 'manage/connection.php';

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Air Import' ");

                              ?>
                          <?php

                                while ($rowchainlog = mysqli_fetch_array($selectchainlog))
                                {
                                ?>

                      <tr>
                      <td><?php echo $rowchainlog['SrNo']; ?></td>
                      <td><?php echo $rowchainlog['instance']; ?></td>
                      <td><?php echo $rowchainlog['record_id']; ?></td>
                      <td><?php echo $rowchainlog['createBy']; ?></td>
                      <td><?php echo $rowchainlog['createDate']; ?></td>
                      <td><?php echo $rowchainlog['updateBy']; ?></td>
                      <td><?php echo $rowchainlog['updateDate']; ?></td>
                      <td><?php echo $rowchainlog['perValue']; ?></td>
                      <td><?php echo $rowchainlog['newValue']; ?></td>
                      </tr>
                      <?php
                     }
                     ?>
                     </tbody>

                  </table>
                
              </div>
              
            </div>
        </div>

            <label id="formSummary" style="color: red;"></label>
            <p id="V_m_awb" style="color: red;"></p>
            <p id="V_m_date" style="color: red;"></p>
            <p id="V_m_pp_cc" style="color: red;"></p>
            <p id="V_m_pieces" style="color: red;"></p>
            <p id="V_m_grs_weight" style="color: red;"></p>
            <p id="V_m_ch_weight" style="color: red;"></p>
            <p id="V_h_awb" style="color: red;"></p>
            <p id="V_h_date" style="color: red;"></p>
            <p id="V_h_pp_cc" style="color: red;"></p>
            <p id="V_h_pieces" style="color: red;"></p>
            <p id="V_h_grs_weight" style="color: red;"></p>
            <p id="V_h_ch_weight" style="color: red;"></p>
            <p id="V_party" style="color: red;"></p>
            <p id="V_foreign_party" style="color: red;"></p>
            <p id="V_spo" style="color: red;"></p>
            <p id="V_origin" style="color: red;"></p>
            <p id="V_destination" style="color: red;"></p>
            <p id="V_flight_no" style="color: red;"></p>
            <p id="V_flight_date" style="color: red;"></p>
            <p id="V_foreign_detail" style="color: red;"></p>
            <p id="V_consignee_detail" style="color: red;"></p>

        <div class="widget_iner_box">
              <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                                          <!-- Go back button code starting here -->
                                          <?php include('inc_widgets/backBtn.php'); ?>
                                          <!-- Go back button code ending here -->
                    </div>
                    <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
                    <button type="button" id="btnConfirm_Su" name="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
                    <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                    <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                </div>
                              

                <div class="col-md-6">



                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                   <input type="text" name="job_no" id="job_no"  value="<?php echo $job_no_p ?>">
                  </div>

                  <div class="input-label"><label>So No</label></div>
                  <div class="input-feild">
                   <input class="mini_input_field" type="text"  name="so_no" id="so_no" value="<?php echo $so_no_p ?>" >
                  </div>
                
                </div>

                
                <div class="col-md-6">
                  <div class="input-label"><label>Job Date</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="date"  name="job_date" id="job_date" value="<?php echo $job_date_p ?>" >
                  </div>
                </div>

              <div class="col-md-12">
                <table  id="aimport_form_table" class="display nowrap no-footer" style="width:100%">
                                                                  
                         <thead>
                            <tr>
                              <th></th>
                              <th>AWB No.</th>
                              <th>Date</th>
                              <th>PP/CC</th>
                              <th>Pcs</th>
                              <th>Grs. Weight</th>
                              <th>Ch.Weight</th>
                              <th>Rate</th>
                             
                            </tr>
                          </thead>
                          <tbody>   
                                   <tr>
                                      <th>MAWB No.</th>
                                      <td> <input class="mini_input_field"  type="text" name="m_awb" id="m_awb" value="<?php echo $m_awb_p ?>"maxlength="12"><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="date" name="m_date" id="m_date" value="<?php echo $m_date_p ?>" ><span class="steric">*</span></td>
                                      <td> <select name="m_pp_cc" id="m_pp_cc" >
                                        <option value="<?php echo $m_pp_cc_p ?>"><?php echo $m_pp_cc_p ?></option>
                                        <option value="pp">pp</option>
                                        <option value="cc">cc</option>
                                      </select><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="text" name="m_pieces" id="m_pieces" value="<?php echo $m_pieces_p ?>"maxlength="4" ><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="text" name="m_grs_weight" id="m_grs_weight" value="<?php echo $m_grs_weight_p ?>"  maxlength="10"><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  class="mini_input_field"  type="text" name="m_ch_weight" id="m_ch_weight" value="<?php echo $m_ch_weight_p ?>"><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field" type="text"  maxlength="10" name="m_rate" id="m_rate" value="<?php echo $m_rate_p ?>" onfocusout="calcDetails_Buy_P();"></td>
                                      
                                   </tr>  

                                   <tr>
                                      <th>HAWB No.</th>
                                      <td> <input class="mini_input_field"  type="text" name="h_awb" id="h_awb" value="<?php echo $h_awb_p ?>"maxlength="12" ><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="date" name="h_date" id="h_date" value="<?php echo $h_date_p ?>"><span class="steric">*</span> </td>
                                        <td> <select name="h_pp_cc" id="h_pp_cc">
                                          <option value="<?php echo $h_pp_cc_p ?>"><?php echo $h_pp_cc_p ?></option>
                                        <option value="pp">pp</option>
                                        <option value="cc">cc</option>
                                      </select><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="text" name="h_pieces" id="h_pieces" value="<?php echo $h_pieces_p ?>"maxlength="4" ><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  maxlength="10" type="text" name="h_grs_weight" id="h_grs_weight" value="<?php echo $h_grs_weight_p ?>"><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="text" name="h_ch_weight" id="h_ch_weight" value="<?php echo $h_ch_weight_p ?>"><span class="steric">*</span></td>
                                      <td> <input class="mini_input_field"  type="text" name="h_rate" id="h_rate" value="<?php echo $h_rate_p ?>" maxlength="10" onfocusout="calcDetails_Sell_P();"></td>
                                   </tr>
                                                                      
                          </tbody>
                          </table> 
              </div>
              <div class="cls"></div>
              <hr>

             <div class="col-md-6">
                   
                    <div class="input-label"><label>Goods Description</label></div>
                    <div class="input-feild">
                    <textarea name="description" maxlength="100" id="description"><?php echo $description_p ?></textarea>
                    </div>

                    <div class="input-label"><label>Status</label></div>
                    <div class="input-feild">
                    <input type="checkbox" name="status_type" id="status_type" checked value="<?php echo $status_type_p  ?>"> 
                    
                    </div>

                  </div>
        </div>
        <div class="cls"></div>
        <hr>        

        <div class="widget_iner_box">         
               <div class="col-md-4">

                      <div class="input-label"><label>Party</label></div>
                      <div class="input-feild">
                        <select name="party"  id="party">
                          <!-- <option value><?php echo $party ?></option> -->
                          <!-- <option value="Select">Select </option> -->
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster where SrNo='$party_p' ");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>

                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>

                      </div>

                      <div class="input-label"><label>Agent Party</label></div>
                      <div class="input-feild">
                        <select name="agent_party"  id="agent_party">
                         
                          <?php

                            $selectSub = mysqli_query($con, "select * from sub_agents_parties_setup where SrNo='$agent_party_p'");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['subpartyname'].'</option>';
                            }
                          ?>

                           <?php

                            $selectSub = mysqli_query($con, "select * from sub_agents_parties_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['subpartyname'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Foreign Agent</label></div>
                      <div class="input-feild">
                        <select name="foreign_party"  id="foreign_party">
                           >
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster where SrNo='$party_p' ");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>

                           <?php

                            $selectSub = mysqli_query($con, "select * from custmaster");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                      </div>

               </div> 
                 
                 <div class="col-md-4">

                        <div class="input-label"><label>Nomination</label></div>
                      <div class="input-feild">
                        <select class="mini_select_field nomination"  name="nomination" id="nomination"  >
                          <option value="<?php echo $nomination_p ?>"></option>
                          
                          <option value="N">N</option>
                          <option value="Y">Y</option>
                        </select>
                      </div>
                     

                      <div class="input-label"><label>Origin</label></div>
                      <div class="input-feild">
                       <select name="origin"  id="origin">
                       
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup where SrNo='$origin_p'");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                      </div>

                      <div class="input-label"><label>Flight No.</label></div>
                      <div class="input-feild">
                        <input class type="text"  name="flight_no" id="flight_no"  maxlength="6" value="<?php echo $flight_no_p ?>" ><span class="steric">*</span>
                        
                      </div>

                      


                      
                  </div> 

                  <div class="col-md-4">

                     <div class="input-label" id="spoLable"><label>SPO.</label></div>
                    <div class="input-feild">
                      <select name="spo"  id="spo" >
                        
                        <?php

                          $selectSub = mysqli_query($con, "select * from spo_setup where SrNo='$spo_p'");
                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['spo_name'].'</option>';
                          }

                        ?>

                        <?php

                          $selectSub = mysqli_query($con, "select * from spo_setup");
                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['spo_name'].'</option>';
                          }

                        ?>
                      </select><span class="steric">*</span>
                    </div>

                      <div class="input-label"><label>Destination</label></div>
                      <div class="input-feild">
                        <select name="destination" id="destination">
                        
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup where SrNo='$destination_p'");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>

                           <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup ");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                      </div>
                      
                    
                     
                     <div class="input-label"><label>Flight Date</label></div>
                      <div class="input-feild">
                        <input class type="date"  name="flight_date" id="flight_date" value="<?php echo $flight_date_p  ?>"><span class="steric">*</span>
                      </div>

                  </div>
                  <div class="cls"></div>
                  <hr>

               <div class="col-md-4">
                 
                      <div class="input-label"><label>IGM No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="igm_no" id="igm_no"  maxlength="20" value="<?php echo $igm_no_p  ?>">

                      </div>

                      <div class="input-label"><label>Air D.O.P No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="air_d_o_no"  maxlength="20" id="air_d_o_no"  value="<?php echo $air_d_o_no_p ?>">
                        
                      </div>

                      <div class="input-label"><label>B/E No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="b_e_no" maxlength="20" id="b_e_no"  value="<?php echo $b_e_no_p  ?>">
                        
                      </div>

                      


                      <div class="input-label"><label>E.T.D</label></div>
                      <div class="input-feild">
                        <input  type="date" name="e_t_d" id="e_t_d"  value="<?php echo $e_t_d_p ?>">                        
                      </div>

                      

                      
               </div>
               <div class="col-md-4">
                         <div class="input-label"><label>IGM Date</label></div>
                          <div class="input-feild"><input type="date"  name="igm_date" id="igm_date"  value="<?php  echo $igm_date_p ?>"  data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


                            <div class="input-label"><label>D.O Date</label></div>
                            <div class="input-feild"><input type="date"  name="d_o_date" id="d_o_date"  value="<?php  echo $d_o_date_p ?>"  data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


                            <div class="input-label"><label>B/E Date</label></div>
                            <div class="input-feild"><input type="date"  name="b_e_date"  id="b_e_date" value="<?php  echo $b_e_date_p ?>"   data-date-inline-picker="false" data-date-open-on-focus="true" /></div>
                          

                           

                            <div class="input-label"><label>E.T.A</label></div>
                            <div class="input-feild"><input type="date"  name="e_t_a" id="e_t_a" value="<?php  echo $e_t_a_p ?>"  data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

                            
           
                </div>
                <div class="col-md-4">

                  <div class="input-label"><label>Index No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="index_no" maxlength="20" id="index_no" value="<?php echo $index_no_p ?>">
                        
                      </div>

                   <div class="input-label"><label>Sub Index</label></div>
                            <div class="input-feild"><input type="date"  name="sub_index_no" maxlength="20" id="sub_index_no" value="<?php echo $sub_index_no_p ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

                    <div class="input-label"><label>Origin D.O No.</label></div>
                            <div class="input-feild"><input type="text"  name="origin_d_o_no" id="origin_d_o_no" value="<?php echo $origin_d_o_no_p ?>"></div>

                    <div class="input-label"><label>L/C</label></div>
                      <div class="input-feild">
                        <input  type="text" name="l_c" maxlength="20" id="l_c"  value="<?php echo $l_c_p  ?>">                        
                      </div>

                    <div class="input-label"><label>Passport/ I.D</label></div>
                      <div class="input-feild">
                        <input  type="text" name="passport_id" maxlength="20" id="passport_id"  value="<?php echo $passport_id_p ?>">                        
                      </div>

                </div>

                   
        </div>
         <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
          <div class="col-md-6">
            <div class="input-label"><label>Foreign Agent's Shipper </label></div>
            <div class="input-feild">
               <textarea name="foreign_detail" maxlength="140" id="foreign_detail"><?php echo $foreign_detail_p  ?></textarea><span class="steric">*</span>
            </div>



            <div class="input-label"><label>Notify </label></div>
            <div class="input-feild">
              <textarea name="notify_detail" maxlength="140" id="notify_detail"><?php echo $notify_detail_p ?></textarea>
            </div>

          </div>


           <div class="col-md-6">

            <div class="input-label"><label>Consignee </label></div>
            <div class="input-feild">
              <textarea name="consignee_detail"  maxlength="140" id="consignee_detail" ><?php echo $consignee_detail_p ?></textarea><span class="steric">*</span>
            </div>

             
            <div class="input-label"><label>Remarks</label></div>
            <div class="input-feild">
              <textarea name="remarks"  maxlength="200" id="remarks" ><?php echo $remarks_p ?></textarea>
            </div>

           

          </div>
        </div> 
      <div class="cls"></div>
      <hr>  

      <div class="widget_iner_box">
        <div class="col-md-5">
            <div class="widget_child_title"><h4>Invoice Required</h4></div>
            <div class="cls"></div>
            <hr>


            <div class="input-label"><label>Invoice to F/Agent</label></div>
            <div class="input-feild">
              <select class="mini_select_field"  name="invoice_f_agent" id="invoice_f_agent" >
                <?php echo $invoice_f_agent_p  ?> 
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>


            <div class="input-label"><label>Local Invoice</label></div>
            <div class="input-feild">
              <select class="mini_select_field"  name="local_inv" id="local_inv">
                <?php echo $local_inv_p ?>
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>

            <div class="input-label"><label>Inv. From F/Agent</label></div>
            <div class="input-feild">
              <select class="mini_select_field"  name="inv_from_f_agent" id="inv_from_f_agent" >
                <?php echo $inv_from_f_agent_p  ?>
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>

        </div>
        <div class="col-md-4">

          <div class="widget_child_title"><h4>Shipment Status</h4></div>
            <div class="cls"></div>
            <hr>
         
            <div class="input-label"><label>Status</label></div>
          <div class="input-feild">
            <select class="mini_select_field"  name="status" id="status">
              <?php echo $status_p  ?>
            <option value="In process">In Process</option>
            <option value="Released">Released</option>
            <option value="Not Released">Not Released</option>
            <option value="Expected">Expected</option>
            </select>
          </div>

          <div class="input-label"><label>Freight trem</label></div>
          <div class="input-feild">
            <input class="mini_input_field" type="text"  name="fight_term" id="fight_term" value="<?php echo $fight_term_p  ?>">
          </div>

            
           <div class="input-label"><label>Remarks</label></div>
          <div class="input-feild" >
            <textarea name="remark" id="remark" maxlength="100" ><?php echo $remark_p ?></textarea>
          </div>

        </div>

        <div class="col-md-3">
            
            
            <div class="widget_child_title"><h4>House Airway Bill</h4></div>
            

            <table id="hawbtable" class="display nowrap no-footer" style="width:100%">
              <thead>
                <tr>

                  
                  <th>Job No.</th>
                  <th>House No.</th>


                </tr>
              </thead>
              <tbody>
                <tr>

                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
        </div>

      </div>

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
            <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#local_invoices">Local Invoices</a></li>
                  <li><a data-toggle="tab" href="#party_agent_details">Party & Foreign Agent Details</a></li>
                </ul>
            </div>


           <div class="tab-content">

              <div id="local_invoices" class="tab-pane fade in active">
                 <table id="local_inv_table" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>No.</th>
                        <th>Currency</th>
                        <th>F/Amount</th>
                        <th>PKR Amount</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                      </tr>
                    </tbody>

                 </table>                       
              </div>

              <div id="party_agent_details" class="tab-pane fade">
                <div class="col-md-6">

                  <div class="input-label"><label>Currency</label></div>
                  <div class="input-feild">
                    <select class="mini_select_field"  name="checkCurr" id="checkCurr">
                      
                      <?php

                      $selectCurCheck = mysqli_query($con, "SELECT * FROM currency_setup WHERE SrNo='$checkCurr_p' ");
                      while ($rowCurCheck = mysqli_fetch_array($selectCurCheck))
                      {
                        echo '<option value="'.$rowCurCheck['SrNo'].'">'.$rowCurCheck['cur_code'].'</option>';
                      }

                      ?>

                      <?php

                      $selectCurCheck = mysqli_query($con, "SELECT * FROM currency_setup ");
                      while ($rowCurCheck = mysqli_fetch_array($selectCurCheck))
                      {
                        echo '<option value="'.$rowCurCheck['SrNo'].'">'.$rowCurCheck['cur_code'].'</option>';
                      }

                      ?>
                    </select>
                  </div>

                  <div class="input-label"><label>Exchange Rate</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field"  type="text" name="exchangeRate_P" id="exchangeRate_P" value="<?php echo $exchangeRate_p ?>" 
                    onfocusout="exRate_P();">
                  </div>

                  <table  id="prtytable" class="display nowrap no-footer" style="width:100%">
                       <thead>
                          <tr>
                            <th>..</th>  
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Amount (PKR)</th>
                          </tr>
                       </thead>
                        <tbody>           
                          <tr>
                            <td>Selling</td>
                            <td><input type="text"  name="sellRate_P" id="sellRate_P" value="<?php echo $sellRate_p ?>"></td>
                            <td><input type="text"  name="sellAmount_P" id="sellAmount_P" value="<?php echo $sellAmount_p ?>" ></td>
                            <td><input type="text" name="sellAmountPKR_P" id="sellAmountPKR_P" value="<?php echo $sellAmountPKR_p ?>"></td>
                          </tr>

                          <tr>
                            <td>Buying</td>
                            <td><input type="text"  name="buyRate_P" id="buyRate_P" value="<?php echo $buyRate_p ?>"></td>
                            <td><input type="text"  name="buyAmount_P" id="buyAmount_P" value="<?php echo $buyAmount_p ?>"></td>
                            <td><input type="text"  name="buyAmountPKR_P" id="buyAmountPKR_P" value="<?php echo $buyAmountPKR_p ?>"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text"  name="diffAmount_P" id="diffAmount_P" value="<?php echo $diffAmount_p ?>"></td>
                            <td><input type="text" name="diffAmountPKR_P" id="diffAmountPKR_P" value="<?php echo $diffAmountPKR_p ?>"></td>
                          </tr>

                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text"  name="profitRate_P" id="profitRate_P" value="<?php echo $profitRate_p ?>" onfocusout="calcProfit_P();" >%</td>
                            <td><input type="text"  name="profitAmount_P" id="profitAmount_P" value="<?php echo $profitAmount_p ?>"></td>
                            <td><input type="text"  name="profitAmountPKR_P" id="profitAmountPKR_P" value="<?php echo $profitAmountPKR_p ?>"></td>
                          </tr>
                        </tbody>
                  </table> 
                </div>

                <div class="col-md-6">
                  <!-- <div class="input-label"><label>Exchange Rate</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="text" name="exchangeRate_F" id="exchangeRate_F">
                  </div> -->
                  <table  id="foreigntbale" class="display nowrap no-footer" style="width:100%">
                       <thead>
                          <tr>
                            <th>..</th>  
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Amount (PKR)</th>
                          </tr>
                       </thead>

                        <tbody>           
                          <tr>
                            <td>Buying</td>
                            <td><input type="text"  name="buyRate_F" id="buyRate_F" value="<?php echo $buyRate_F_p ?>" onfocusout="calcDetails_Buy_F();"></td>
                            <td><input type="text"  name="buyAmount_F" id="buyAmount_F" value="<?php echo $buyAmount_F_p ?>"></td>
                            <td><input type="text"  name="buyAmountPKR_F" id="buyAmountPKR_F" value="<?php echo $buyAmountPKR_F_p ?>"></td>
                          </tr>

                          <tr>
                            <td>Selling</td>
                            <td><input type="text"  name="sellRate_F" id="sellRate_F" value="<?php echo $sellRate_F_p ?>" onfocusout="calcDetails_Sell_F();"></td>
                            <td><input type="text"  name="sellAmount_F" id="sellAmount_F" value="<?php echo $sellAmount_F_p ?>"></td>
                            <td><input type="text"  name="sellAmountPKR_F" id="sellAmountPKR_F" value="<?php echo $sellAmountPKR_F_p ?>"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text"  name="diffAmount_F" id="diffAmount_F" value="<?php echo $diffAmount_F_p ?>"></td>
                            <td><input type="text"  name="diffAmountPKR_F" id="diffAmountPKR_F" value="<?php echo $diffAmountPKR_F_p ?>"></td>
                          </tr>
                          
                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text"  name="profitRate_F" id="profitRate_F" value="<?php echo $profitRate_F_p ?>"></td>
                            <td><input type="text"  name="profitAmount_F" id="profitAmount_F" value="<?php echo $profitAmount_F_p ?>"></td>
                            <td><input type="text"   name="profitAmountPKR_F" id="profitAmountPKR_F" value="<?php echo $profitAmountPKR_F_p ?>"></td>
                          </tr>
                        </tbody>
                  </table>

                  <br>

                  <div class="input-label"><label>Payable</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field"  type="text" name="payableAmount" id="payableAmount" value="<?php echo $payableAmount_p ?>">
                    <input class="mini_input_field"  type="text" name="payableAmountPKR" id="payableAmountPKR" value="<?php echo $payableAmountPKR_p ?>">
                  </div>

                </div>

              </div>

           </div> 

        </div>      
          
    </form>

  </div>

</div>

<script>
  $(document).ready(function() {
     $('#aimport_form_table').DataTable( {
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false,
      });

      $('#aimport_form_table2').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
      });

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": true,
        "paging":false,
        "info":false,
      });

     $('#local_inv_table').DataTable( {
        "paging":false,
        "info":false,
      });
  });
</script>

<script>
  $(document).ready(function() {
     $('#prtytable').DataTable( {
        "paging":false,
        "info":false,
    });

    $('#foreigntbale').DataTable( {
        "paging":false,
        "info":false,
    });
  });
</script>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>



<script type="text/javascript">
function saveFunc()
{
  $("#save_Modal").modal();
}
</script>
<!-- <script type="text/javascript">
function submitFunc()
{
  $("#addModal1").modal();
}
</script> -->

<script>
function nomChange()
{
  var nominaton = document.getElementById("nominaton").value;
  if (nominaton == "Y")
  {
    document.getElementById('spo').style.visibility='hidden';
    document.getElementById('spoLable').style.visibility='hidden';
    // alert("Working");
  }
  else if (nominaton == "N")
  {
    document.getElementById('spo').style.visibility='visible';
    document.getElementById('spoLable').style.visibility='visible';
    // alert("Working");
  }
}
</script>

<script type="text/javascript">
  function calcDetails_Buy_P()
  {
    var buyAmount_P;
    var MAWB_rate = document.getElementById("m_rate").value;
    var MAWB_ch_weight = document.getElementById("m_ch_weight").value;
    // alert("Working" + " " + MAWB_rate);
    buyAmount_P = MAWB_rate * MAWB_ch_weight;
    document.getElementById("buyRate_P").value = MAWB_rate;
    document.getElementById("buyAmount_P").value = buyAmount_P;
    
  }

  function calcDetails_Sell_P()
  {
    var sellAmount_P;
    var HAWB_rate = document.getElementById("h_rate").value;
    var HAWB_ch_weight = document.getElementById("h_ch_weight").value;
    // alert("Working" + " " + MAWB_rate);
    sellAmount_P = HAWB_rate * HAWB_ch_weight;
    document.getElementById("sellRate_P").value = HAWB_rate;
    document.getElementById("sellAmount_P").value = sellAmount_P;
  }

  function exRate_P()
  {
    var checkCurr = document.getElementById("checkCurr").value;
    if (checkCurr == "")
    {
      alert("Please select the currency first.");
      document.getElementById("exchangeRate_P").value = "";
    }

    else
    {
      var buyAmountPKR_P;
      var sellAmountPKR_P;
      var diffAmount_P;
      var diffAmountPKR_P;
      var exchangeRate_P = document.getElementById("exchangeRate_P").value;
      
      // For calculating the buying exchange rate
      var buyAmount_P = document.getElementById("buyAmount_P").value;
      buyAmountPKR_P = exchangeRate_P * buyAmount_P;
      document.getElementById("buyAmountPKR_P").value = buyAmountPKR_P;

      // For calculating the selling exchange rate
      var sellAmount_P = document.getElementById("sellAmount_P").value;
      sellAmountPKR_P = exchangeRate_P * sellAmount_P;
      document.getElementById("sellAmountPKR_P").value = sellAmountPKR_P;

      // For calculating the difference of amount (selling - buying)
      diffAmount_P = sellAmount_P - buyAmount_P;
      document.getElementById("diffAmount_P").value = diffAmount_P;

      // For calculating the difference amount in PKR (difference * exchange rate)
      diffAmountPKR_P = diffAmount_P * exchangeRate_P;
      document.getElementById("diffAmountPKR_P").value = diffAmountPKR_P;
    }
  }

  function calcProfit_P()
  {
    var profitAmount_P;
    var profitAmountPKR_P;
    var profitRate_P = document.getElementById("profitRate_P").value;

    // For calculating the profit amount (difference * profit rate / 100)
    var diffAmount_P = document.getElementById("diffAmount_P").value;
    profitAmount_P = (diffAmount_P * profitRate_P) / 100;
    document.getElementById("profitAmount_P").value = profitAmount_P;

    // For calculating the profit amount in PKR (profit amount * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    profitAmountPKR_P = profitAmount_P * exchangeRate_P;
    document.getElementById("profitAmountPKR_P").value = profitAmountPKR_P;
  }

  function calcDetails_Buy_F()
  {
    var buyAmount_F;
    var buyAmountPKR_F;

    // Calculating the amount in USD (foreign rate * charge weight)
    var buyRate_F = document.getElementById("buyRate_F").value;
    var MAWB_ch_weight = document.getElementById("m_ch_weight").value;
    buyAmount_F = buyRate_F * MAWB_ch_weight;
    document.getElementById("buyAmount_F").value = buyAmount_F;

    // Calculating the amount in PKR (amount in USD * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    buyAmountPKR_F = buyAmount_F * exchangeRate_P;
    document.getElementById("buyAmountPKR_F").value = buyAmountPKR_F;
    
  }

  function calcDetails_Sell_F()
  {
    var sellAmount_F;
    var sellAmountPKR_F;
    var diffAmount_F;
    var diffAmountPKR_F;

    // Calculating the amount in USD (foreign rate * charge weight)
    var sellRate_F = document.getElementById("sellRate_F").value;
    var HAWB_ch_weight = document.getElementById("h_ch_weight").value;
    sellAmount_F = sellRate_F * HAWB_ch_weight;
    document.getElementById("sellAmount_F").value = sellAmount_F;

    // Calculating the amount in PKR (amount in USD * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    sellAmountPKR_F = sellAmount_F * exchangeRate_P;
    document.getElementById("sellAmountPKR_F").value = sellAmountPKR_F;

    // For calculating the difference of amount (selling - buying)
    var buyAmount_F = document.getElementById("buyAmount_F").value;
    diffAmount_F = sellAmount_F - buyAmount_F;
    document.getElementById("diffAmount_F").value = diffAmount_F;

    // For calculating the difference amount in PKR (difference * exchange rate)
    var buyAmountPKR_F = document.getElementById("buyAmountPKR_F").value;
    diffAmountPKR_F = sellAmountPKR_F - buyAmountPKR_F;
    document.getElementById("diffAmountPKR_F").value = diffAmountPKR_F;

    // Calculating the profit
    var profitAmount_F;
    var profitAmountPKR_F;
    var profitRate_P = document.getElementById("profitRate_P").value;

    // Displaying profit % in foreign table
    document.getElementById("profitRate_F").value = profitRate_P;

    // For calculating the profit amount (difference * profit rate / 100)
    var diffAmount_F = document.getElementById("diffAmount_F").value;
    profitAmount_F = (diffAmount_F * profitRate_P) / 100;
    document.getElementById("profitAmount_F").value = profitAmount_F;

    // For calculating the profit amount in PKR (profit amount * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    profitAmountPKR_F = profitAmount_F * exchangeRate_P;
    document.getElementById("profitAmountPKR_F").value = profitAmountPKR_F;

    // For calculating the payable in USD (buying USD amount + profit USD amount)
    var buyAmount_F = document.getElementById("buyAmount_F").value;
    var profitAmount_F2 = document.getElementById("profitAmount_F").value;
    var payableAmount;
    payableAmount =  +buyAmount_F + +profitAmount_F2;
    document.getElementById("payableAmount").value = payableAmount;

    // For calculating the payable in PKR (buying PKR amount + profit PKR amount)
    var buyAmountPKR_F = document.getElementById("buyAmountPKR_F").value;
    var profitAmountPKR_F2 = document.getElementById("profitAmountPKR_F").value;
    var payableAmountPKR;
    payableAmountPKR = +profitAmountPKR_F2 + +buyAmountPKR_F;
    document.getElementById("payableAmountPKR").value = payableAmountPKR;


  }

</script>

<script type="text/javascript">

  // For Due Carrier
  function checkCurrency()
  {
    var totalCarrier = document.getElementById("totalCarrier").value;
    var totalCAA = document.getElementById("totalCAA").value;
    var totalAWC = document.getElementById("totalAWC").value;
    var secCharges = document.getElementById("secCharges").value;
    var secDD = document.getElementById("secDD").value;
    var totalSec = document.getElementById("totalSec").value;
    var fuelCharges = document.getElementById("fuelCharges").value;
    var fuelDD = document.getElementById("fuelDD").value;
    var totalFuel = document.getElementById("totalFuel").value;
    var scanCharges = document.getElementById("scanCharges").value;
    var scanDD = document.getElementById("scanDD").value;
    var totalScan = document.getElementById("totalScan").value;

    var mawb_No = document.getElementById("mawb_no").value;

    // rcp = document.getElementById("rcp").value;
    // commision = document.getElementById("commision").value;
    
    $.ajax({
     url:"addDueCarrier.php",
     method:"POST",
     data:{mawb_No:mawb_No, totalCarrier:totalCarrier, totalCAA:totalCAA, totalAWC:totalAWC, secCharges:secCharges, secDD:secDD, totalSec:totalSec, fuelCharges:fuelCharges, fuelDD:fuelDD, totalFuel:totalFuel, scanCharges:scanCharges, scanDD:scanDD, totalScan:totalScan},
     success:function(data){
      // alert('Working.');
      
      // fetch_item_data();
     }
    });

  }
  
</script>

<script type="text/javascript">
   function FormValidation()
   {
      var regexp = /^[a-z]*$/i;
      var regexp2 = /^[0-9]*$/i;
      var re = /\S+@\S+\.\S+/;
      var decimals = /^[-+]?[0-9]+\.[0-9]+$/;
      var missingVal = 0;

      

      var m_awb=document.getElementById('m_awb').value;
      var m_date=document.getElementById('m_date').value;
      var m_pp_cc=document.getElementById('m_pp_cc').value;
      var m_pieces=document.getElementById('m_pieces').value;
      var m_grs_weight=document.getElementById('m_grs_weight').value;
      var m_ch_weight=document.getElementById('m_ch_weight').value;
      var h_awb=document.getElementById('h_awb').value;
      var h_date=document.getElementById('h_date').value;
      var h_pp_cc=document.getElementById('h_pp_cc').value;
      var h_pieces=document.getElementById('h_pieces').value;
      var h_grs_weight=document.getElementById('h_grs_weight').value;
      var h_ch_weight=document.getElementById('h_ch_weight').value;
      var party=document.getElementById('party').value;
      var foreign_party=document.getElementById('foreign_party').value;
      var spo=document.getElementById('spo').value;
      var origin=document.getElementById('origin').value;
      var destination=document.getElementById('destination').value;
      var flight_no=document.getElementById('flight_no').value;
      var flight_date=document.getElementById('flight_date').value;
      var foreign_detail=document.getElementById('foreign_detail').value;
      var consignee_detail=document.getElementById('consignee_detail').value;
     
      var summary = "Summary: ";

      if(m_awb == "")
      {
          document.getElementById('m_awb').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_awb").innerHTML = "MAster AWB Number is required.";
      }
      if(m_awb != "")
      {
          document.getElementById('m_awb').style.borderColor = "white";
          document.getElementById("V_m_awb").innerHTML = "";

      }

      if(m_date == "")
      {
          document.getElementById('m_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_date").innerHTML = "Master Date is required.";
      }
      if(m_date != "")
      {
          document.getElementById('m_date').style.borderColor = "white";
          document.getElementById("V_m_date").innerHTML = "";

      }

      if(m_pp_cc == "")
      {
          document.getElementById('m_pp_cc').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_pp_cc").innerHTML = " Master PP/CC is required.";
      }
      if(m_pp_cc != "")
      {
          document.getElementById('m_pp_cc').style.borderColor = "white";
          document.getElementById("V_m_pp_cc").innerHTML = "";

      }

       
      if(m_pieces == "")
      {
          document.getElementById('m_pieces').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_pieces").innerHTML = "Master pieces is required.";
      }
      if(m_pieces != "")
      {
          document.getElementById('m_pieces').style.borderColor = "white";
          document.getElementById("V_m_pieces").innerHTML = "";

        //   if (!regexp2.test(rate))
        // {
        //   document.getElementById('rate').style.borderColor = "red";
        //     missingVal = 1;
        //     // summary += "Firstname is required.";
        //     document.getElementById("V_rate").innerHTML = "Only numbers and decimals are allowed in rate.";
        // }
      }

       if(m_grs_weight == "")
      {
          document.getElementById('m_grs_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_grs_weight").innerHTML = "Master Gross Weight is required.";
      }
      if(m_grs_weight != "")
      {
          document.getElementById('m_grs_weight').style.borderColor = "white";
          document.getElementById("V_m_grs_weight").innerHTML = "";

        //   if (!regexp2.test(ch_weight))
        // {
        //   document.getElementById('ch_weight').style.borderColor = "red";
        //     missingVal = 1;
        //     // summary += "Firstname is required.";
        //     document.getElementById("V_ch_weight").innerHTML = "Only alphabets are allowed.";
        // }
      }

      if(m_ch_weight == "")
      {
          document.getElementById('m_ch_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_m_ch_weight").innerHTML = "Master Charge Weight is required.";
      }
      if(m_ch_weight != "")
      {
          document.getElementById('m_ch_weight').style.borderColor = "white";
          document.getElementById("V_m_ch_weight").innerHTML = "";

        //   if (!regexp2.test(grs_weight))
        // {
        //   document.getElementById('grs_weight').style.borderColor = "red";
        //     missingVal = 1;
        //     // summary += "Firstname is required.";
        //     document.getElementById("V_grs_weight").innerHTML = "Only numbers are allowed.";
        // }
      }

      if(h_awb == "")
      {
          document.getElementById('h_awb').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_awb").innerHTML = "House AWB is required.";
      }
      if(h_awb != "")
      {
          document.getElementById('h_awb').style.borderColor = "white";
          document.getElementById("V_h_awb").innerHTML = "";

      }

      if(h_date == "")
      {
          document.getElementById('h_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_date").innerHTML = "House Date is required.";
      }
      if(h_date != "")
      {
          document.getElementById('h_date').style.borderColor = "white";
          document.getElementById("V_h_date").innerHTML = "";

      }

      if(h_pp_cc == "")
      {
          document.getElementById('h_pp_cc').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_pp_cc").innerHTML = "House PP/CC is required.";
      }
      if(h_pp_cc != "")
      {
          document.getElementById('h_pp_cc').style.borderColor = "white";
          document.getElementById("V_h_pp_cc").innerHTML = "";

      }

      if(h_pieces == "")
      {
          document.getElementById('h_pieces').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_pieces").innerHTML = "House Pieces is required.";
      }
      if(h_pieces != "")
      {
          document.getElementById('h_pieces').style.borderColor = "white";
          document.getElementById("V_h_pieces").innerHTML = "";

      }

      if(h_grs_weight == "")
      {
          document.getElementById('h_grs_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_grs_weight").innerHTML = "House Gross Weight is required.";
      }
      if(h_grs_weight != "")
      {
          document.getElementById('h_grs_weight').style.borderColor = "white";
          document.getElementById("V_h_grs_weight").innerHTML = "";

      }

      if(h_ch_weight == "")
      {
          document.getElementById('h_ch_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_h_ch_weight").innerHTML = "House Charge Weight is required.";
      }
      if(h_ch_weight != "")
      {
          document.getElementById('h_ch_weight').style.borderColor = "white";
          document.getElementById("V_h_ch_weight").innerHTML = "";

      }

      if(party == "")
      {
          document.getElementById('party').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party").innerHTML = "Party is required.";
      }
      if(party != "")
      {
          document.getElementById('party').style.borderColor = "white";
          document.getElementById("V_party").innerHTML = "";

      }

      if(foreign_party == "")
      {
          document.getElementById('foreign_party').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_foreign_party").innerHTML = "Foreign Party is required.";
      }
      if(foreign_party != "")
      {
          document.getElementById('foreign_party').style.borderColor = "white";
          document.getElementById("V_foreign_party").innerHTML = "";

      }

      //  if(spo == "")
      // {
      //     document.getElementById('spo').style.borderColor = "red";
      //     missingVal = 1;
      //     // summary += "Firstname is required.";
      //     document.getElementById("V_spo").innerHTML = "Spo is required.";
      // }
      // if(spo != "")
      // {
      //     document.getElementById('spo').style.borderColor = "white";
      //     document.getElementById("V_spo").innerHTML = "";

      // }

       if(origin == "")
      {
          document.getElementById('origin').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_origin").innerHTML = "Origin is required.";
      }
      if(origin != "")
      {
          document.getElementById('origin').style.borderColor = "white";
          document.getElementById("V_origin").innerHTML = "";

      }

      if(destination == "")
      {
          document.getElementById('destination').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_destination").innerHTML = "Destination is required.";
      }
      if(destination != "")
      { 
        document.getElementById('destination').style.borderColor = "white";
          document.getElementById("V_destination").innerHTML = "";

      }

      if(flight_no == "")
      {
          document.getElementById('flight_no').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_no").innerHTML = "Flight No. is required.";
      }
      if(flight_no != "")
      {
          document.getElementById('flight_no').style.borderColor = "white";
          document.getElementById("V_flight_no").innerHTML = "";

      }

       if(flight_date == "")
      {
          document.getElementById('flight_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_date").innerHTML = "Flight Date is required.";
      }
      if(flight_date != "")
      {
          document.getElementById('flight_date').style.borderColor = "white";
          document.getElementById("V_flight_date").innerHTML = "";

      }

      if(foreign_detail == "")
      {
          document.getElementById('foreign_detail').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_foreign_detail").innerHTML = "Foreign Details is required.";
      }
      if(foreign_detail != "")
      {
          document.getElementById('foreign_detail').style.borderColor = "white";
          document.getElementById("V_foreign_detail").innerHTML = "";

      }

       if(consignee_detail == "")
      {
          document.getElementById('consignee_detail').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_consignee_detail").innerHTML = "Consignee Details is required.";
      }
      if(consignee_detail != "")
      {
          document.getElementById('consignee_detail').style.borderColor = "white";
          document.getElementById("V_consignee_detail").innerHTML = "";

      }

     

      if (missingVal != 1)
      {
        document.getElementById('m_awb').style.borderColor = "white";
        document.getElementById('m_date').style.borderColor = "white";
        document.getElementById('m_pp_cc').style.borderColor = "white";
        document.getElementById('m_pieces').style.borderColor = "white";
        document.getElementById('m_grs_weight').style.borderColor = "white";
        document.getElementById('m_ch_weight').style.borderColor = "white";
        document.getElementById('h_awb').style.borderColor = "white";
        document.getElementById('h_date').style.borderColor = "white";
        document.getElementById('h_pp_cc').style.borderColor = "white";
        document.getElementById('h_pieces').style.borderColor = "white";
        document.getElementById('h_grs_weight').style.borderColor = "white";
        document.getElementById('h_ch_weight').style.borderColor = "white";
        document.getElementById('party').style.borderColor = "white";
        document.getElementById('foreign_party').style.borderColor = "white";
        document.getElementById('spo').style.borderColor = "white";
        document.getElementById('origin').style.borderColor = "white";
        document.getElementById('destination').style.borderColor = "white";
        document.getElementById('flight_no').style.borderColor = "white";
        document.getElementById('flight_date').style.borderColor = "white";
        document.getElementById('foreign_detail').style.borderColor = "white";
        document.getElementById('consignee_detail').style.borderColor = "white";
       
        $("#addModal1").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
  }
</script>

<!-- java script -->
        <script type="text/javascript">
        function logUserFunc()
        {
          $("#logUser_Modal").modal();
        }
        </script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
