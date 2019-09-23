<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

//  multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM air_import_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE air_import_entry SET status_type='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: air_import_tab.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM air_import_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE air_import_entry SET status_type='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: air_import_tab.php");
  }
}


if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $so_no_AI = 0;
  $job_no_AI = 0;
  $job_date_AI = 0;
  $m_awb_AI = 0;
  $m_date_AI = 0;
  $m_pp_cc_AI = 0;
  $m_pieces_AI = 0;
  $m_grs_weight_AI = 0;
  $m_ch_weight_AI = 0;
  $m_rate_AI = 0;
  $h_awb_AI = 0;
  $h_date_AI = 0;
  $h_pp_cc_AI = 0;
  $h_grs_weight_AI = 0;
  $h_ch_weight_AI = 0;
  $h_rate_AI = 0;
  $description_AI = 0;
  $party_AI = 0;
  $agent_party_AI = 0;
  $foreign_party_AI = 0;
  $spo_AI = 0;
  $origin_AI = 0;
  $destination_AI = 0;
  $flight_no_AI = 0;
  $flight_date_AI = 0;
  $igm_no_AI = 0;
  $igm_date_AI = 0;
  $air_d_o_no_AI = 0;
  $d_o_date_AI = 0;
  $b_e_no_AI = 0;
  $b_e_date_AI = 0;
  $index_no_AI = 0;
  $sub_index_no_AI = 0;
  $e_t_d_AI = 0;
  $e_t_a_AI = 0;
  $l_c_AI = 0;
  $origin_d_o_no_AI = 0;
  $passport_id_AI = 0;
  $foreign_detail_AI = 0;
  $notify_detail_AI = 0;
  $consignee_detail_AI = 0;
  $remarks_AI = 0;
  $nomination_AI = 0;
  $status_AI = 0;
  $remark_AI = 0;
  $fight_term_AI = 0;
  $invoice_f_agent_AI = 0;
  $local_inv_AI = 0;
  $inv_from_f_agent_AI = 0;
  $checkCurr_AI = 0;
  $exchangeRate_P_AI = 0;
  $sellRate_P_AI = 0;
  $sellAmount_P_AI = 0;
  $sellAmountPKR_P_AI = 0;
  $buyRate_P_AI = 0;
  $buyAmount_P_AI = 0;
  $buyAmountPKR_P_AI = 0;
  $diffAmount_P_AI = 0;
  $diffAmountPKR_P_AI = 0;
  $profitRate_P_AI = 0;
  $profitAmount_P_AI = 0;
  $profitAmountPKR_P_AI = 0;
  $buyRate_F_AI = 0;
  $buyAmount_F_AI = 0;
  $buyAmountPKR_F_AI = 0;
  $sellRate_F_AI = 0;
  $sellAmount_F_AI = 0;
  $sellAmountPKR_F_AI = 0;
  $diffAmount_F_AI = 0;
  $diffAmountPKR_F_AI = 0;
  $profitRate_F_AI = 0;
  $profitAmount_F_AI = 0;
  $profitAmountPKR_F_AI = 0;
  $payableAmount_AI = 0;
  $payableAmountPKR_AI = 0;


  // Setting variables if 1
  // if (isset($_POST['cmpType_CM']))
  // {
  //   $cmpType_CM = 1;
  // }
  if (isset($_POST['so_no_AI']))
  {
    $so_no_AI = 1;
  }
  if (isset($_POST['job_no_AI']))
  {
    $job_no_AI = 1;
  }
  if (isset($_POST['job_date_AI']))
  {
    $job_date_AI = 1;
  }
  if (isset($_POST['m_awb_AI']))
  {
    $m_awb_AI = 1;
  }
  if (isset($_POST['m_date_AI']))
  {
    $m_date_AI = 1;
  }
  if (isset($_POST['m_pp_cc_AI']))
  {
    $m_pp_cc_AI = 1;
  }
  
  if (isset($_POST['m_pieces_AI']))
  {
    $m_pieces_AI = 1;
  }
  if (isset($_POST['m_grs_weight_AI']))
  {
    $m_grs_weight_AI = 1;
  }
  if (isset($_POST['m_ch_weight_AI']))
  {
    $m_ch_weight_AI = 1;
  }
  if (isset($_POST['m_rate_AI']))
  {
    $m_rate_AI = 1;
  }
  if (isset($_POST['h_awb_AI']))
  {
    $h_awb_AI = 1;
  }
  if (isset($_POST['h_date_AI']))
  {
    $h_date_AI = 1;
  }
  if (isset($_POST['h_pp_cc_AI']))
  {
    $h_pp_cc_AI = 1;
  }
  if (isset($_POST['h_pieces_AI']))
  {
    $h_pieces_AI = 1;
  }
  if (isset($_POST['h_grs_weight_AI']))
  {
    $h_grs_weight_AI = 1;
  }
  if (isset($_POST['h_ch_weight_AI']))
  {
    $h_ch_weight_AI = 1;
  }
  if (isset($_POST['h_rate_AI']))
  {
    $h_rate_AI = 1;
  }
  if (isset($_POST['description_AI']))
  {
    $description_AI = 1;
  }
  if (isset($_POST['party_AI']))
  {
    $party_AI = 1;
  }
  if (isset($_POST['agent_party_AI']))
  {
    $agent_party_AI = 1;
  }
  if (isset($_POST['foreign_party_AI']))
  {
    $foreign_party_AI = 1;
  }
  if (isset($_POST['spo_AI']))
  {
    $spo_AI = 1;
  }
  if (isset($_POST['origin_AI']))
  {
    $origin_AI = 1;
  }
  if (isset($_POST['destination_AI']))
  {
    $destination_AI  = 1;
  }
  if (isset($_POST['flight_no_AI']))
  {
    $flight_no_AI = 1;
  }
  if (isset($_POST['flight_date_AI']))
  {
    $flight_date_AI = 1;
  }
  if (isset($_POST['igm_no_AI']))
  {
    $igm_no_AI = 1;
  }
  if (isset($_POST['igm_date_AI']))
  {
    $igm_date_AI = 1;
  }
  if (isset($_POST['air_d_o_no_AI']))
  {
    $air_d_o_no_AI = 1;
  }
  if (isset($_POST['d_o_date_AI']))
  {
    $d_o_date_AI = 1;
   }
  if (isset($_POST['b_e_no_AI']))
  {
    $b_e_no_AI = 1;
  }
  if (isset($_POST['index_no_AI']))
  {
    $index_no_AI = 1;
  }
  if (isset($_POST['sub_index_no_AI']))
  {
    $sub_index_no_AI = 1;
  }
  if (isset($_POST['e_t_d_AI']))
  {
    $e_t_d_AI = 1;
  }
  if (isset($_POST['e_t_a_AI']))
  {
    $e_t_a_AI = 1;
  }
  if (isset($_POST['l_c_AI']))
  {
    $l_c_AI = 1;
  }
   if (isset($_POST['origin_d_o_no_AI']))
  {
    $origin_d_o_no_AI = 1;
  }
  if (isset($_POST['passport_id_AI']))
  {
    $passport_id_AI = 1;
  }
  if (isset($_POST['foreign_detail_AI']))
  {
    $foreign_detail_AI = 1;
  }
  if (isset($_POST['notify_detail_AI']))
  {
    $notify_detail_AI = 1;
  }
  if (isset($_POST['consignee_detail_AI']))
  {
    $consignee_detail_AI = 1;
  }
  if (isset($_POST['remarks_AI']))
  {
    $remarks_AI = 1;
  }
  if (isset($_POST['nomination_AI']))
  {
    $nomination_AI = 1;
  }
  if (isset($_POST['status_AI']))
  {
    $status_AI = 1;
  }
  if (isset($_POST['remark_AI']))
  {
    $remark_AI = 1;
  }
  if (isset($_POST['fight_term_AI']))
  {
    $fight_term_AI = 1;
  }
  if (isset($_POST['invoice_f_agent_AI']))
  {
    $invoice_f_agent_AI = 1;
  }
  if (isset($_POST['local_inv_AI']))
  {
    $local_inv_AI = 1;
  }
  if (isset($_POST['inv_from_f_agent_AI']))
  {
    $inv_from_f_agent_AI = 1;
  }
  if (isset($_POST['checkCurr_AI']))
  {
    $checkCurr_AI = 1;
  }
  if (isset($_POST['exchangeRate_P_AI']))
  {
    $exchangeRate_P_AI = 1;
  }
  if (isset($_POST['sellRate_P_AI']))
  {
    $sellRate_P_AI = 1;
  }
  if (isset($_POST['sellAmount_P_AI']))
  {
    $sellAmount_P_AI = 1;
  }
  if (isset($_POST['sellAmountPKR_P_AI']))
  {
    $sellAmountPKR_P_AI = 1;
  }
  if (isset($_POST['buyRate_P_AI']))
  {
    $buyRate_P_AI = 1;
  }
  if (isset($_POST['buyAmount_P_AI']))
  {
    $buyAmount_P_AI = 1;
  }
  if (isset($_POST['buyAmountPKR_P_AI']))
  {
    $buyAmountPKR_P_AI = 1;
  }
 
  if (isset($_POST['diffAmount_P_AI']))
  {
    $diffAmount_P_AI = 1;
  }
  if (isset($_POST['diffAmountPKR_P_AI']))
  {
    $diffAmountPKR_P_AI = 1;
  }
  if (isset($_POST['profitRate_P_AI']))
  {
    $profitRate_P_AI = 1;
  }
  if (isset($_POST['profitAmount_P_AI']))
  {
    $profitAmount_P_AI = 1;
  }
  if (isset($_POST['profitAmountPKR_P_AI']))
  {
    $profitAmountPKR_P_AI = 1;
  }
  if (isset($_POST['buyRate_F_AI']))
  {
    $buyRate_F_AI = 1;
  }
  if (isset($_POST['buyAmount_F_AI']))
  {
    $buyAmount_F_AI = 1;
  }
  if (isset($_POST['buyAmountPKR_F_AI']))
  {
    $buyAmountPKR_F_AI = 1;
  }
  if (isset($_POST['sellRate_F_AI']))
  {
    $sellRate_F_AI = 1;
  }
  if (isset($_POST['sellAmount_F_AI']))
  {
    $sellAmount_F_AI = 1;
  }
  if (isset($_POST['sellAmountPKR_F_AI']))
  {
    $sellAmountPKR_F_AI = 1;
  }
  if (isset($_POST['diffAmount_F_AI']))
  {
    $diffAmount_F_AI = 1;
  }
  if (isset($_POST['diffAmountPKR_F_AI']))
  {
    $diffAmountPKR_F_AI = 1;
  }
  if (isset($_POST['profitRate_F_AI']))
  {
    $profitRate_F_AI = 1;
  }
  if (isset($_POST['profitAmount_F_AI']))
  {
    $profitAmount_F_AI = 1;
  }
  if (isset($_POST['profitAmountPKR_F_AI']))
  {
    $profitAmountPKR_F_AI = 1;
  }
  if (isset($_POST['payableAmount_AI']))
  {
    $payableAmount_AI = 1;
  }
  if (isset($_POST['payableAmountPKR_AI']))
  {
    $payableAmountPKR_AI = 1;
  }


  $updateUM = mysqli_query($con, "UPDATE air_import_table_cuz SET so_no_AI='$so_no_AI', job_no_AI='$job_no_AI', job_date_AI='$job_date_AI', m_awb_AI='$m_awb_AI', m_date_AI='$m_date_AI', m_pp_cc_AI='$m_pp_cc_AI', m_pieces_AI='$m_pieces_AI',h_pieces_AI='$h_pieces_AI',m_grs_weight_AI='$m_grs_weight_AI', m_ch_weight_AI='$m_ch_weight_AI', m_rate_AI='$m_rate_AI', h_awb_AI = '$h_awb_AI', h_date_AI='$h_date_AI', h_pp_cc_AI='$h_pp_cc_AI', h_grs_weight_AI='$h_grs_weight_AI', h_ch_weight_AI='$h_ch_weight_AI', h_rate_AI='$h_rate_AI', description_AI='$description_AI', party_AI='$party_AI', agent_party_AI='$agent_party_AI', foreign_party_AI='$foreign_party_AI', spo_AI='$spo_AI', origin_AI='$origin_AI', destination_AI='$destination_AI', flight_no_AI='$flight_no_AI', flight_date_AI='$flight_date_AI', igm_no_AI='$igm_no_AI', igm_date_AI='$igm_date_AI', air_d_o_no_AI='$air_d_o_no_AI', d_o_date_AI='$d_o_date_AI',b_e_no_AI='$b_e_no_AI',b_e_date_AI='$b_e_date_AI',index_no_AI='$index_no_AI',sub_index_no_AI='$sub_index_no_AI',e_t_d_AI='$e_t_d_AI',e_t_a_AI='$e_t_a_AI',l_c_AI='$l_c_AI',origin_d_o_no_AI='$origin_d_o_no_AI',passport_id_AI='$passport_id_AI',foreign_detail_AI='$foreign_detail_AI',notify_detail_AI='$notify_detail_AI',consignee_detail_AI='$consignee_detail_AI',remarks_AI='$remarks_AI',nomination_AI='$nomination_AI',status_AI='$status_AI',remark_AI='$remark_AI',fight_term_AI='$fight_term_AI',invoice_f_agent_AI='$invoice_f_agent_AI',local_inv_AI='$local_inv_AI',inv_from_f_agent_AI='$inv_from_f_agent_AI',checkCurr_AI='$checkCurr_AI',exchangeRate_P_AI='$exchangeRate_P_AI
    ',sellRate_P_AI='$sellRate_P_AI',sellAmount_P_AI='$sellAmount_P_AI',sellAmountPKR_P_AI='$sellAmountPKR_P_AI',buyRate_P_AI='$buyRate_P_AI',buyAmount_P_AI='$buyAmount_P_AI',buyAmountPKR_P_AI='$buyAmountPKR_P_AI',diffAmount_P_AI='$diffAmount_P_AI',diffAmountPKR_P_AI='$diffAmountPKR_P_AI',profitRate_P_AI='$profitRate_P_AI',profitAmount_P_AI='$profitAmount_P_AI',profitAmountPKR_P_AI='$profitAmountPKR_P_AI',buyRate_F_AI='$buyRate_F_AI',buyAmount_F_AI='$buyAmount_F_AI',buyAmountPKR_F_AI='$buyAmountPKR_F_AI',sellRate_F_AI='$sellRate_F_AI',sellAmount_F_AI='$sellAmount_F_AI',sellAmountPKR_F_AI='$sellAmountPKR_F_AI',diffAmount_F_AI='$diffAmount_F_AI',diffAmountPKR_F_AI='$diffAmountPKR_F_AI',profitRate_F_AI='$profitRate_F_AI',profitAmount_F_AI='$profitAmount_F_AI',profitAmountPKR_F_AI='$profitAmountPKR_F_AI',payableAmount_AI='$payableAmount_AI',payableAmountPKR_AI='$payableAmountPKR_AI' WHERE SrNo_AI= '1' ") or die(mysqli_error($con));

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the first name
      if(!empty($_POST['empFName']))
      {
          $empFName = $_POST['empFName'];
          $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
          $empFNameStatus = 1;
      }
      else
      {
        $empFNameStatus = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameStatus = 1;
      }
      else
      {
        $empLNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameStatus == 1 OR $empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDept'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`empDept` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $empDeptStatus = 1;
      }
      else
      {
        $empDeptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDesig'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $search = " SELECT * FROM air_import_entry ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');
}

else if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    mysqli_query($con, "DELETE FROM empinfo WHERE empNo = '$val' ");
  }

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the first name
      if(!empty($_POST['empFName']))
      {
          $empFName = $_POST['empFName'];
          $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
          $empFNameStatus = 1;
      }
      else
      {
        $empFNameStatus = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameStatus = 1;
      }
      else
      {
        $empLNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameStatus == 1 OR $empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDept'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`empDept` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $empDeptStatus = 1;
      }
      else
      {
        $empDeptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDesig'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
 $search = " SELECT * FROM air_import_entry ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');
}

else if(isset($_POST["btnEdit"]))
{
  if (isset($_POST["user_check"]))
  {
    $dept_ID_E = $_POST['dept_ID_E'];
    $desig_ID_E = $_POST['desig_ID_E'];
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      if ($dept_ID_E != "Select" && $desig_ID_E != "Select")
      {
        mysqli_query($con, "UPDATE empinfo SET empDept='$dept_ID_E', empDesig='$desig_ID_E' WHERE empNo = '$val' ");
      }

      else if ($dept_ID_E == "Select" && $desig_ID_E != "Select")
      {
        mysqli_query($con, "UPDATE empinfo SET empDesig='$desig_ID_E' WHERE empNo = '$val' ");
      }

      else if ($dept_ID_E != "Select" && $desig_ID_E == "Select")
      {
        mysqli_query($con, "UPDATE empinfo SET empDept='$dept_ID_E' WHERE empNo = '$val' ");
      }

      //echo $val;
      // header("Location: editSelected.php?user_id=$url");
    }

    //echo $dept_ID_E;

    /*$editUsers = $_POST['user_check'];
    $editUsersTwo = serialize($editUsers);
    $str_arr = unserialize($editUsers);*/
    // header("Location: editSelected.php?user_id=$url");

    $clause = " WHERE ";//Initial clause
    $searchRecord="SELECT * FROM `empinfo`  ";

        // if user is giving the first name
        if(!empty($_POST['empFName']))
        {
            $empFName = $_POST['empFName'];
            $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
            $empFNameStatus = 1;
        }
        else
        {
          $empFNameStatus = 0;
        }

        // if user is giving the middle name
        if(!empty($_POST['empLName']))
        {
            if($empFNameStatus == 1)
            {
              $clause = " AND ";
            }
            $empLName = $_POST['empLName'];
            $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
            $empLNameStatus = 1;
        }
        else
        {
          $empLNameStatus = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['empDept']))
        {
            if($empLNameStatus == 1 OR $empFNameStatus == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['empDept'] as $c)
            {
                if(!empty($c)){
                    $searchRecord .= $clause."`empDept` = '{$c}'";
                    $clause = " OR ";
                }   
            }
            $empDeptStatus = 1;
        }
        else
        {
          $empDeptStatus = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['empDesig']))
        {
            if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLNameStatus == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['empDesig'] as $d)
            {
                if(!empty($d))
                {
                    $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
                    $clause = " OR ";
                }   
            }
        }
        else
        {
          // echo "Nothing Selected.";
        }
    // echo $sql; //Remove after testing
    $search = " SELECT * FROM air_import_entry ";
    $searchQuery = mysqli_query($con, $search);
    // header('Location: usertable.php');
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "emptable.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the first name
      if(!empty($_POST['empFName']))
      {
          $empFName = $_POST['empFName'];
          $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
          $empFNameStatus = 1;
      }
      else
      {
        $empFNameStatus = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameStatus = 1;
      }
      else
      {
        $empMNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLName == 1 OR $empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDept'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`empDept` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $empDeptStatus = 1;
      }
      else
      {
        $empDeptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDesig'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $search = " SELECT * FROM air_import_entry ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: air_import_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("air_import_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("air_import_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the first name
      if(!empty($_POST['empFName']))
      {
          $empFName = $_POST['empFName'];
          $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
          $empFNameStatus = 1;
      }
      else
      {
        $empFNameStatus = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameStatus = 1;
      }
      else
      {
        $empLNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameStatus == 1 OR $empFNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDept'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`empDept` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $empDeptStatus = 1;
      }
      else
      {
        $empDeptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLNameStatus == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['empDesig'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
 $search = " SELECT * FROM air_import_entry ";
    $searchQuery = mysqli_query($con, $search);;
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Table</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByTagName('input');
         if (ele.checked) {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = true;
                 }
             }
         } else {
             for (var i = 0; i < checkboxes.length; i++) {
                 console.log(i)
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = false;
                 }
             }
         }
     }
   </script>
 <style type="text/css">
 	
 	.tbleDrpdown ul {
   padding: 0;
}
.tbleDrpdown {
   display: inline-block;
   float: left;
   position: relative;
   top: 33px;
   z-index: 999;
}
#usrtble ul li {
   list-style: none;
   display: inline-block;
}
.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#usrtble_length {
    float: right;
    margin: 3px 10px;
}

 </style>   
</head>
<body>
<?php include 'header.php';?>
<?php include 'inc_widgets/header_ribbon.php';?>

<!-- Bread Crumbs -->
<div class="breadCrumb_bar">
  <div class="breadCrumb_bar_iner">
    <div class="">
        <div class="btn-group btn-breadcrumb">
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="sermodules.php" class="btn btn-info">Human Resource</a>
          <a href="air_import_tab.php" class="btn btn-info active">Show Employees</a>
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

<form action="" method="POST">
<div class="leave-manage-sec  main_widget_box ">
  <div class="form_sec_action_btn col-md-12">
     <div class="form_action_right_btn">
      <!-- Go back button code starting here -->
      <?php include('inc_widgets/backBtn.php'); ?>
      <!-- Go back button code ending here -->
    </div>
      <button type="button" id="btnAddEmp" onclick="addEmp();">  <small>Add Job Entry</small></button>
  </div>

      <div class="col-md-12">
        <div class="user_table-title">
          <h4>Job Entry Table P/C House</h4>
        </div>
        
        <form action="" method="POST">

          <!-- Table Customization -->
           <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM air_import_table_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            // $cmpType_CM = $rowUM['cmpType_CM'];
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

      <div class="modal fade symfra_popup3" id="customTable" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select Fields to view on Table</h4>
                          </div>
                          <div class="modal-body">
                            
                               <?php

                              echo '<div class="col-md-4">';
                              // if ($cmpType_CM == 1)
                              // {
                              //   echo '<input type="checkbox" name="cmpType_CM" checked> <label>Company</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="cmpType_CM" > <label>Company</label> <br>';
                              // }

                              if ($so_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="so_no_AI" checked> <label>So No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="so_no_AI" > <label>So No</label> <br>';
                              }

                              if ($job_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="job_no_AI" checked> <label>Job No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_no_AI" > <label>Job No</label> <br>';
                              }

                              if ($job_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="job_date_AI" checked> <label>Job Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_date_AI" > <label>Job Date</label> <br>';
                              }
                              if ($m_awb_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_awb_AI" checked> <label> MAWB No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_awb_AI" > <label> MAWB No. </label> <br>';
                              }

                              if ($m_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_date_AI" checked> <label> MAWB Date </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_date_AI" > <label> MAWB Date </label> <br>';
                              }

                              if ($m_pp_cc_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_pp_cc_AI" checked> <label>P/C Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_pp_cc_AI" > <label>P/C Master</label> <br>';
                              }
                              if ($air_d_o_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="air_d_o_no_AI" checked> <label>Air D.O.No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="air_d_o_no_AI" > <label>Air D.O.No.</label> <br>';
                              }

                              if ($d_o_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="d_o_date_AI" checked> <label>D.O.Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="d_o_date_AI" > <label>D.O.Date</label> <br>';
                              }
                              
                              if ($h_rate_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_rate_AI" checked> <label>Rate House </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_rate_AI" > <label>Rate House </label> <br>';
                              }
                              if ($description_AI == 1)
                              {
                                echo '<input type="checkbox" name="description_AI" checked> <label>Description</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="description_AI" > <label>Description</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                               

                              if ($m_pieces_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_pieces_AI" checked> <label>Pcs. Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_pieces_AI" > <label>Pcs. Master</label> <br>';
                              }
                               if ($m_grs_weight_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_grs_weight_AI" checked> <label>Grs.Weight Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_grs_weight_AI" > <label>Grs.Weight Master</label> <br>';
                              }

                              if ($m_ch_weight_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_ch_weight_AI" checked> <label>Ch.Weight Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_ch_weight_AI" > <label>Ch.Weight Master</label> <br>';
                              }

                              if ($m_rate_AI == 1)
                              {
                                echo '<input type="checkbox" name="m_rate_AI" checked> <label>Rate Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="m_rate_AI" > <label>Rate Master</label> <br>';
                              }

                              if ($h_awb_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_awb_AI" checked> <label>HAWB No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_awb_AI" > <label>HAWB No.</label> <br>';
                              }

                              if ($h_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_date_AI" checked> <label>HAWB Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_date_AI" > <label>HAWB Date</label> <br>';
                              }

                              if ($h_pp_cc_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_pp_cc_AI" checked> <label>P/C House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_pp_cc_AI" > <label>P/C House</label> <br>';
                              }
                              if ($h_pieces_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_pieces_AI" checked> <label>Pcs House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_pieces_AI" > <label>Pcs House</label> <br>';
                              }
                              if ($h_grs_weight_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_grs_weight_AI" checked> <label>Grs.Weight House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_grs_weight_AI" > <label>Grs.Weight House</label> <br>';
                              }

                              if ($h_ch_weight_AI == 1)
                              {
                                echo '<input type="checkbox" name="h_ch_weight_AI" checked> <label>Ch.Weight House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="h_ch_weight_AI" > <label>Ch.Weight House</label> <br>';
                              }

                              echo '</div>';

                              if ($party_AI == 1)
                              {
                                echo '<input type="checkbox" name="party_AI" checked> <label>Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="party_AI" > <label>Party</label> <br>';
                              }

                              if ($agent_party_AI == 1)
                              {
                                echo '<input type="checkbox" name="agent_party_AI" checked> <label>Agent Party Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="agent_party_AI" > <label>Agent Party Cell</label> <br>';
                              }

                              if ($foreign_party_AI == 1)
                              {
                                echo '<input type="checkbox" name="foreign_party_AI" checked> <label>Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreign_party_AI" > <label>Foreign Agent</label> <br>';
                              }

                              if ($spo_AI == 1)
                              {
                                echo '<input type="checkbox" name="spo_AI" checked> <label>SPO</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="spo_AI" > <label>SPO</label> <br>';
                              }
                              if ($origin_AI == 1)
                              {
                                echo '<input type="checkbox" name="origin_AI" checked> <label>Origin</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="origin_AI" > <label>Origin</label> <br>';
                              }

                              if ($destination_AI == 1)
                              {
                                echo '<input type="checkbox" name="destination_AI" checked> <label>Destination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="destination_AI" > <label>Destination</label> <br>';
                              }
                              if ($flight_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="flight_no_AI" checked> <label>Flight No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_no_AI" > <label>Flight No.</label> <br>';
                              }

                              if ($flight_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="flight_date_AI" checked> <label>Flight Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_date_AI" > <label>Flight Date</label> <br>';
                              }
                              if ($igm_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="igm_no_AI" checked> <label>IGM No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="igm_no_AI" > <label>IGM No.</label> <br>';
                              }

                              if ($igm_date_AI == 1)
                              {
                                echo '<input type="checkbox" name="igm_date_AI" checked> <label>IGM Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="igm_date_AI" > <label>IGM Date</label> <br>';
                              }
                              // if ($air_d_o_no_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="air_d_o_no_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="air_d_o_no_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($d_o_date_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="d_o_date_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="d_o_date_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($b_e_no_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="b_e_no_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="b_e_no_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($b_e_date_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="b_e_date_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="b_e_date_AI" > <label>Credit Days</label> <br>';
                              // }
                              if ($index_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="index_no_AI" checked> <label>Index No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="index_no_AI" > <label>Index No.</label> <br>';
                              }
                              if ($sub_index_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="sub_index_no_AI" checked> <label>Sub Index No.s</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sub_index_no_AI" > <label>Sub Index No</label> <br>';
                              }
                              if ($e_t_d_AI == 1)
                              {
                                echo '<input type="checkbox" name="e_t_d_AI" checked> <label>E.T.Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="e_t_d_AI" > <label>E.T.Date</label> <br>';
                              }
                              if ($e_t_a_AI == 1)
                              {
                                echo '<input type="checkbox" name="e_t_a_AI" checked> <label>E.T.A</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="e_t_a_AI" > <label>E.T.A</label> <br>';
                              }
                              if ($l_c_AI == 1)
                              {
                                echo '<input type="checkbox" name="l_c_AI" checked> <label>L/C</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="l_c_AI" > <label>L/C</label> <br>';
                              }
                              if ($origin_d_o_no_AI == 1)
                              {
                                echo '<input type="checkbox" name="origin_d_o_no_AI" checked> <label>Origin D.O.No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="origin_d_o_no_AI" > <label>Origin D.O.No</label> <br>';
                              }
                              if ($passport_id_AI == 1)
                              {
                                echo '<input type="checkbox" name="passport_id_AI" checked> <label>Passport ID</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="passport_id_AI" > <label>Passport ID</label> <br>';
                              }
                              if ($foreign_detail_AI == 1)
                              {
                                echo '<input type="checkbox" name="foreign_detail_AI" checked> <label>Foreign Agent Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreign_detail_AI" > <label>Foreign Agent Party</label> <br>';
                              }
                              if ($notify_detail_AI == 1)
                              {
                                echo '<input type="checkbox" name="notify_detail_AI" checked> <label>Notify</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="notify_detail_AI" > <label>Notify</label> <br>';
                              }
                              if ($consignee_detail_AI == 1)
                              {
                                echo '<input type="checkbox" name="consignee_detail_AI" checked> <label>Consignee</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="consignee_detail_AI" > <label>Consignee</label> <br>';
                              }
                              if ($remarks_AI == 1)
                              {
                                echo '<input type="checkbox" name="remarks_AI" checked> <label>Remarks</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="remarks_AI" > <label>Remarks</label> <br>';
                              }
                              if ($nomination_AI == 1)
                              {
                                echo '<input type="checkbox" name="nomination_AI" checked> <label>Nomination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="nomination_AI" > <label>Nomination</label> <br>';
                              }
                              if ($status_AI == 1)
                              {
                                echo '<input type="checkbox" name="status_AI" checked> <label>Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="status_AI" > <label>Status</label> <br>';
                              }
                              if ($remark_AI == 1)
                              {
                                echo '<input type="checkbox" name="remark_AI" checked> <label>Shipment Remarks </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="remark_AI" > <label>Shipment Remarks</label> <br>';
                              }
                              if ($fight_term_AI == 1)
                              {
                                echo '<input type="checkbox" name="fight_term_AI" checked> <label>Freight Term</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fight_term_AI" > <label>Freight Term</label> <br>';
                              }
                              if ($invoice_f_agent_AI == 1)
                              {
                                echo '<input type="checkbox" name="invoice_f_agent_AI" checked> <label>Inv to Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="invoice_f_agent_AI" > <label>Inv to Foreign Agent</label> <br>';
                              }
                              if ($local_inv_AI == 1)
                              {
                                echo '<input type="checkbox" name="local_inv_AI" checked> <label>Local Invoice</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="local_inv_AI" > <label>Local Invoice</label> <br>';
                              }
                              if ($inv_from_f_agent_AI == 1)
                              {
                                echo '<input type="checkbox" name="inv_from_f_agent_AI" checked> <label>Inv From Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="inv_from_f_agent_AI" > <label>Inv From Foreign Agent</label> <br>';
                              }
                             
                              if ($checkCurr_AI == 1)
                              {
                                echo '<input type="checkbox" name="checkCurr_AI" checked> <label>Currency</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="checkCurr_AI" > <label>Currency</label> <br>';
                              }
                              if ($exchangeRate_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="exchangeRate_P_AI" checked> <label>Exchange Rate</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="exchangeRate_P_AI" > <label>Exchange Rate</label> <br>';
                              }
                              if ($sellRate_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellRate_P_AI" checked> <label>Sell Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellRate_P_AI" > <label>Sell Rate Party</label> <br>';
                              }
                              if ($sellAmount_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellAmount_P_AI" checked> <label>Sell Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellAmount_P_AI" > <label>Sell Amount Party</label> <br>';
                              }
                              if ($sellAmountPKR_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellAmountPKR_P_AI" checked> <label>Sell Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellAmountPKR_P_AI" > <label>Sell Amount PKR Party</label> <br>';
                              }
                              if ($buyRate_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyRate_P_AI" checked> <label>Buy Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyRate_P_AI" > <label>Buy Rate Party</label> <br>';
                              }
                              if ($buyAmount_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyAmount_P_AI" checked> <label>Buy Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyAmount_P_AI" > <label>Buy Amount Party</label> <br>';
                              }
                              if ($buyAmountPKR_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyAmountPKR_P_AI" checked> <label>Buy Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyAmountPKR_P_AI" > <label>Buy Amount PKR Party</label> <br>';
                              }
                              if ($diffAmount_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="diffAmount_P_AI" checked> <label>Diff Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="diffAmount_P_AI" > <label>Diff Amount Party</label> <br>';
                              }
                              if ($diffAmountPKR_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="diffAmountPKR_P_AI" checked> <label>Diff Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="diffAmountPKR_P_AI" > <label>Diff Amount PKR Party</label> <br>';
                              }
                              if ($profitRate_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitRate_P_AI" checked> <label>Profit Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitRate_P_AI" > <label>Profit Rate Party</label> <br>';
                              }
                              if ($profitAmount_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitAmount_P_AI" checked> <label>Profit Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitAmount_P_AI" > <label>Profit Amount Party</label> <br>';
                              }
                              if ($profitAmountPKR_P_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitAmountPKR_P_AI" checked> <label>Profit Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitAmountPKR_P_AI" > <label>Profit Amount PKR Party</label> <br>';
                              }
                              if ($buyRate_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyRate_F_AI" checked> <label>Buy Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyRate_F_AI" > <label>Buy Rate Foreign</label> <br>';
                              }
                              if ($buyAmount_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyAmount_F_AI" checked> <label>Buy Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyAmount_F_AI" > <label>Buy Amount Foreign</label> <br>';
                              }
                              if ($buyAmountPKR_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="buyAmountPKR_F_AI" checked> <label>Buy Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="buyAmountPKR_F_AI" > <label>Buy Amount PKR Foreign</label> <br>';
                              }
                              if ($sellRate_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellRate_F_AI" checked> <label>Sell Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellRate_F_AI" > <label>Sell Rate Foreign</label> <br>';
                              }
                              if ($sellAmount_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellAmount_F_AI" checked> <label>Sell Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellAmount_F_AI" > <label>Sell Amount Foreign</label> <br>';
                              }
                              if ($sellAmountPKR_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="sellAmountPKR_F_AI" checked> <label>Sell Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sellAmountPKR_F_AI" > <label>Sell Amount PKR Foreign</label> <br>';
                              }
                              if ($diffAmount_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="diffAmount_F_AI" checked> <label>Diff Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="diffAmount_F_AI" > <label>Diff Amount Foreign</label> <br>';
                              }
                              if ($diffAmountPKR_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="diffAmountPKR_F_AI" checked> <label>Diff Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="diffAmountPKR_F_AI" > <label>Diff Amount PKR Foreign</label> <br>';
                              }
                              if ($profitRate_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitRate_F_AI" checked> <label>Profit Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitRate_F_AI" > <label>Profit Rate Foreign</label> <br>';
                              }
                              if ($profitAmount_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitAmount_F_AI" checked> <label>Profit Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitAmount_F_AI" > <label>Profit Amount Foreign</label> <br>';
                              }
                              if ($profitAmountPKR_F_AI == 1)
                              {
                                echo '<input type="checkbox" name="profitAmountPKR_F_AI" checked> <label>Profit Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="profitAmountPKR_F_AI" > <label>Profit Amount PKR Foreign</label> <br>';
                              }
                              if ($payableAmount_AI == 1)
                              {
                                echo '<input type="checkbox" name="payableAmount_AI" checked> <label>Payable Amount</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="payableAmount_AI" > <label>Payable Amount</label> <br>';
                              }
                              if ($payableAmountPKR_AI == 1)
                              {
                                echo '<input type="checkbox" name="payableAmountPKR_AI" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="payableAmountPKR_AI" > <label>Payable Amount PKR</label> <br>';
                              }
                             
                              
                              
                              
                              ?>
                          
                            <button type="submit" name="btnCustom_U">Submit</button>

                          <div class="modal-footer">
                            <p>Add Related content if needed</p>
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                          </div>
                        </div>
                        
                      </div>
                  </div>
              </div>


      <div class="modal fade symfra_popup2" id="popupExport" role="dialog">
            <div class="modal-dialog">

              <!-- Export Options -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Export Options</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields"> 
                      <label>Options</label>  
                      <select name="exportOptions" required>
                          <option value="Select">Select </option>
                          <option value="excel">Export to Excel </option>
                          <option value="csv">Export to CSV </option>
                          <option value="pdf">Export to PDF </option>
                      </select>  
                  </div>

                  <button type="submit" name="btnExport_D" >Submit</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>

      <!-- Edit -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- Multi Edit-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Multi Edit</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields"> 
                      <label>Department</label>  
                      <select name="dept_ID_E" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectDept_E = mysqli_query($con, "select * from department");

                            while ($rowDept_E = mysqli_fetch_array($selectDept_E))
                            {
                              echo '<option value="'.$rowDept_E['dept_name'].'">'.$rowDept_E['dept_name'].'</option>';
                            }

                            ?>
                      </select>  
                  </div>
                  <div class="input-fields"> 
                      <label>Designation</label>  
                      <select name="desig_ID_E" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectDesig_E = mysqli_query($con, "select * from designation");

                            while ($rowDesig_E = mysqli_fetch_array($selectDesig_E))
                            {
                              echo '<option value="'.$rowDesig_E['Desig_name'].'">'.$rowDesig_E['Desig_name'].'</option>';
                            }

                            ?>

                      </select>  
                  </div>
                  <button type="submit" name="btnEdit" >Submit</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>

        <div class="confirmTable-modal modal fade" id="deleteTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Deactivate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
      </div>

       <div class="confirmTable-modal modal fade" id="deleteTable_C1" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Activate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete1">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
      </div>
	

	    <div class="leave-manage-sec-table widget_iner_box ">

	    	<div class="tbleDrpdown">
             <div id="tblebtn">
                <ul>
                  <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i>  Activate</button></li>
                   <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Deactivate</button></li>
                 
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                  <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li>

                </ul>
              </div>
          	</div>
	    	
		  <table  id="usrtble" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                  <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
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
                                  <th> </th>
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
                                  <th>Status</th>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Action</th>
                              </tr>
                       </thead>
								                                                        
                                <tbody>
                                  <?php

                                                          while ($row= mysqli_fetch_array($searchQuery))
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
                                                          //   $Ch.Weight Master = $searchRow['user_Ch.Weight Master'];
                                                          //   $contact = $searchRow['user_contact'];
                                                          //   $address = $searchRow['user_address'];
                                                          //   $doj = $searchRow['user_DOJ'];
                                                          //   $dob = $searchRow['user_DOB'];
                                                          //   $dol = $searchRow['user_DOL'];
                                                          //   $region = $searchRow['user_region'];

                                                //            // $user_arr[] = array($userName,$Ch.Weight Master,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);
                                                // $cmpType = $searchRow['cmpType'];            
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

                                                $id = $row['SrNo'];

                                                        ?>
                                  <tr id="<?php echo $SrNo; ?>">
                                    <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $id .' " /></td>'; ?>
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

                                  <td><a href="add_job_air_import_View.php?id=<?php echo $row['SrNo']; ?>">View</td>
                                  <td><a href="add_job_air_import_Edit.php?id=<?php echo $row['SrNo']; ?>">Edit</td>
                                 
                                     <?php
                                    if ($row['status_type'] == "Active")
                                    {
                                    ?>
                                    <td><a href="deleteAI_Code.php?id=<?php echo $row['SrNo']; ?>" >Deactive</td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row['status_type'] == "Deactive")
                                    {
                                    ?>
                                    <td><a href="deleteAI_CodeI.php?id=<?php echo $row['SrNo']; ?>" >Active</td>
                                    <?php
                                    }
                                    ?>
                                  </tr>
                              <?php
                            }
                            ?>
					                             
					            </tbody>                      
		  </table>
      </form>	 	 
		</div>
	
</div>

<script>

  $(document).ready(function() {
    $('#usrtble').DataTable({
       "scrollX": true
   });
} );

</script>

<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#btnDelete_C1").click(function(){
    $("#deleteTable_C1").modal();
  });
});
</script>

<script>
  var tables = document.getElementsByTagName('table');
  for (var i=0; i<tables.length;i++){
   resizableGrid(tables[i]);
  }

  function resizableGrid(table) {
   var row = table.getElementsByTagName('tr')[0],
   cols = row ? row.children : undefined;
   if (!cols) return;
  
   table.style.overflow = 'hidden';
  
   var tableHeight = table.offsetHeight;
  
   for (var i=0;i<cols.length;i++){
    var div = createDiv(tableHeight);
    cols[i].appendChild(div);
    cols[i].style.position = 'relative';
    setListeners(div);
   }

   function setListeners(div){
    var pageX,curCol,nxtCol,curColWidth,nxtColWidth;

    div.addEventListener('mousedown', function (e) {
     curCol = e.target.parentElement;
     nxtCol = curCol.nextElementSibling;
     pageX = e.pageX;
  
     var padding = paddingDiff(curCol);
  
     curColWidth = curCol.offsetWidth - padding;
     if (nxtCol)
      nxtColWidth = nxtCol.offsetWidth - padding;
    });

    // div.addEventListener('mouseover', function (e) {
    //  e.target.style.borderRight = '2px solid #0000ff';
    // })

    // div.addEventListener('mouseout', function (e) {
    //  e.target.style.borderRight = '';
    // })

    document.addEventListener('mousemove', function (e) {
     if (curCol) {
      var diffX = e.pageX - pageX;
  
      if (nxtCol)
       nxtCol.style.width = (nxtColWidth - (diffX))+'px';

      curCol.style.width = (curColWidth + diffX)+'px';
     }
    });

    document.addEventListener('mouseup', function (e) {
     curCol = undefined;
     nxtCol = undefined;
     pageX = undefined;
     nxtColWidth = undefined;
     curColWidth = undefined
    });
   }
  
   function createDiv(height){
    var div = document.createElement('div');
    div.style.top = 0;
    div.style.right = 0;
    div.style.width = '5px';
    div.style.position = 'absolute';
    div.style.cursor = 'col-resize';
    div.style.userSelect = 'none';
    div.style.height = height + 'px';
    return div;
   }
  
   function paddingDiff(col){
  
    if (getStyleVal(col,'box-sizing') == 'border-box'){
     return 0;
    }
  
    var padLeft = getStyleVal(col,'padding-left');
    var padRight = getStyleVal(col,'padding-right');
    return (parseInt(padLeft) + parseInt(padRight));

   }

   function getStyleVal(elm,css){
    return (window.getComputedStyle(elm, null).getPropertyValue(css))
   }
  };
</script>

<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteEmpCode.php?empNo=<?php echo $empNo; ?>',
         type: 'GET',
         data: {id: id},
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              $("#deleteTable_C2").modal('hide');
              alert('Running');
               
         }
      });
    
});
</script>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
  });
});
</script>

<script>
function newUser() {
  location.replace("add_user.php")
}
</script>

<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>

<script src="js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#usrtble')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        });
    </script>

<script>
function addEmp() {
  location.replace("add_job_air_import.php")
}
</script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>