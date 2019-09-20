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
    $selectStatus = mysqli_query($con, "SELECT * FROM sea_export_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE sea_export_entry SET status_type='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: sea_export_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM sea_export_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE sea_export_entry SET status_type='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: sea_export_table.php");
  }
}


if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $SrNo_SE = 0;
  $so_no_SE = 0;
  $job_no_SE = 0;
  $job_date_SE = 0;
  $consol_no_SE = 0;
  $last_con_no_SE = 0;
  $com_name_SE = 0;
  $com_code_SE = 0;
  $party_SE = 0;
  $agent_party_SE = 0;
  $foreign_agent_SE = 0;
  $nomination_SE = 0;
  $spo_SE = 0;
  $shipping_line_SE = 0;
  $ship_line_agent_SE = 0;
  $port_of_lord_SE = 0;
  $destination_SE = 0;
  $wharf_SE = 0;
  $clearing_agent_SE = 0;
  $form_e_no_SE = 0;
  $date_SE = 0;
  $cut_date_SE = 0;
  $ship_rcv_date_SE = 0;
  $hand_over_s_l_SE = 0;
  $doc_disp_date_SE = 0;
  $cc_date_SE = 0;
  $four_copy_rcv_SE = 0;
  $four_copy_date_SE = 0;
  $s_b_no_SE = 0;
  $s_b_date_SE = 0;
  $egm_SE = 0;
  $mbl_no_SE = 0;
  $mbl_date_SE = 0;
  $hbl_no_SE = 0;
  $hbl_date_SE = 0;
  $cbm_SE = 0;
  $pkgs_SE = 0;
  $grs_weight = 0;
  $uom_SE = 0;
  $net_weight_SE = 0;
  $shipment_no_SE = 0;
  $l_f_SE = 0;
  $f_c_SE = 0;
  $cy_cfs_SE = 0;
  $packages_SE = 0;
  $unit_SE = 0;
  $gross_weight_SE = 0;
  $cbm_ship_SE = 0;
  $net_weight_a_SE = 0;
  $ship_inv_no_SE = 0;
  $ship_inv_date_SE = 0;
  $ship_curr_SE = 0;
  $ship_amount_SE = 0;
  $pre_alert_SE = 0;
  $hbl_printed_SE = 0;
  $local_inv_SE = 0;
  $intl_inv_SE = 0;
  $name_SE = 0;
  $address_a_SE = 0;
  $consignee_name_SE = 0;
  $consignee_address_SE = 0;
  $notify_SE = 0;
  $foreign_name_SE = 0;
  $foreign_address_SE = 0;
  $export_ref_SE = 0;
  $domestic_routing_SE = 0;
  $domestic_address_SE = 0;
  $orignal_fbl_SE = 0;
  $freight_pay_SE = 0;
  $eta_a_date_SE = 0;
  $eta_b_date_SE = 0;
  $eta_c_date_SE = 0;
  $etd_a_date_SE = 0;
  $etd_b_date_SE = 0;
  $etd_c_date_SE = 0;
  $eta_date_a_SE = 0;
  $eta_date_b_SE = 0;
  $eta_date_c_SE = 0;
  $eta_a_date_box_SE = 0;
  $eta_b_date_box_SE = 0;
  $eta_c_date_box_SE = 0;
  $etd_a_date_box_SE = 0;
  $etd_b_date_box_SE = 0;
  $etd_c_date_box_SE = 0;
  $eta_date_a_box_SE = 0;
  $eta_date_b_box_SE = 0;
  $eta_date_c_box_SE = 0;
  $vessel_a_SE = 0;
  $vessel_b_SE = 0;
  $vessel_c_SE = 0;
  $voyage_a_SE = 0;
  $voyage_b_SE = 0;
  $voyage_c_SE = 0;



  // Setting variables if 1
  // if (isset($_POST['cmpType_CM']))
  // {
  //   $cmpType_CM = 1;
  // }
  if (isset($_POST['so_no_SE']))
  {
    $so_no_SE = 1;
  }
  if (isset($_POST['job_no_SE']))
  {
    $job_no_SE = 1;
  }
  if (isset($_POST['job_date_SE']))
  {
    $job_date_SE = 1;
  }
  if (isset($_POST['consol_no_SE']))
  {
    $consol_no_SE = 1;
  }
  if (isset($_POST['last_con_no_SE']))
  {
    $last_con_no_SE = 1;
  }
  if (isset($_POST['com_name_SE']))
  {
    $com_name_SE = 1;
  }
  
  if (isset($_POST['com_code_SE']))
  {
    $com_code_SE = 1;
  }
  if (isset($_POST['party_SE']))
  {
    $party_SE = 1;
  }
  if (isset($_POST['agent_party_SE']))
  {
    $agent_party_SE = 1;
  }
  if (isset($_POST['foreign_agent_SE']))
  {
    $foreign_agent_SE = 1;
  }
  if (isset($_POST['nomination_SE']))
  {
    $nomination_SE = 1;
  }
  if (isset($_POST['spo_SE']))
  {
    $spo_SE = 1;
  }
  if (isset($_POST['shipping_line_SE']))
  {
    $shipping_line_SE = 1;
  }
  if (isset($_POST['port_of_lord_SE']))
  {
    $port_of_lord_SE = 1;
  }
  if (isset($_POST['ship_line_agent_SE']))
  {
    $ship_line_agent_SE = 1;
  }
  if (isset($_POST['destination_SE']))
  {
    $destination_SE = 1;
  }
  if (isset($_POST['wharf_SE']))
  {
    $wharf_SE = 1;
  }
  if (isset($_POST['clearing_agent_SE']))
  {
    $clearing_agent_SE = 1;
  }
  if (isset($_POST['form_e_no_SE']))
  {
    $form_e_no_SE = 1;
  }
  if (isset($_POST['date_SE']))
  {
    $date_SE = 1;
  }
  if (isset($_POST['cut_date_SE']))
  {
    $cut_date_SE = 1;
  }
  if (isset($_POST['ship_rcv_date_SE']))
  {
    $ship_rcv_date_SE = 1;
  }
  if (isset($_POST['hand_over_s_l_SE']))
  {
    $hand_over_s_l_SE = 1;
  }
  if (isset($_POST['doc_disp_date_SE']))
  {
    $doc_disp_date_SE = 1;
  }
  if (isset($_POST['cc_date_SE']))
  {
    $cc_date_SE  = 1;
  }
  if (isset($_POST['four_copy_rcv_SE']))
  {
    $four_copy_rcv_SE = 1;
  }
  if (isset($_POST['four_copy_date_SE']))
  {
    $four_copy_date_SE = 1;
  }
  if (isset($_POST['s_b_no_SE']))
  {
    $s_b_no_SE = 1;
  }
  if (isset($_POST['s_b_date_SE']))
  {
    $s_b_date_SE = 1;
  }
  if (isset($_POST['egm_SE']))
  {
    $egm_SE = 1;
  }
  if (isset($_POST['mbl_no_SE']))
  {
    $mbl_no_SE = 1;
   }
  if (isset($_POST['mbl_date_SE']))
  {
    $mbl_date_SE = 1;
  }
  if (isset($_POST['hbl_no_SE']))
  {
    $hbl_no_SE = 1;
  }
  if (isset($_POST['hbl_date_SE']))
  {
    $hbl_date_SE = 1;
  }
  if (isset($_POST['cbm_SE']))
  {
    $cbm_SE = 1;
  }
  if (isset($_POST['pkgs_SE']))
  {
    $pkgs_SE = 1;
  }
  if (isset($_POST['grs_weight']))
  {
    $grs_weight = 1;
  }
   if (isset($_POST['uom_SE']))
  {
    $uom_SE = 1;
  }
  if (isset($_POST['net_weight_SE']))
  {
    $net_weight_SE = 1;
  }
  if (isset($_POST['shipment_no_SE']))
  {
    $shipment_no_SE = 1;
  }
  if (isset($_POST['l_f_SE']))
  {
    $l_f_SE = 1;
  }
  if (isset($_POST['f_c_SE']))
  {
    $f_c_SE = 1;
  }
  if (isset($_POST['cy_cfs_SE']))
  {
    $cy_cfs_SE = 1;
  }
  if (isset($_POST['packages_SE']))
  {
    $packages_SE = 1;
  }
  if (isset($_POST['unit_SE']))
  {
    $unit_SE = 1;
  }
  if (isset($_POST['gross_weight_SE']))
  {
    $gross_weight_SE = 1;
  }
  if (isset($_POST['cbm_ship_SE']))
  {
    $cbm_ship_SE = 1;
  }
  if (isset($_POST['net_weight_a_SE']))
  {
    $net_weight_a_SE = 1;
  }
  if (isset($_POST['ship_inv_no_SE']))
  {
    $ship_inv_no_SE = 1;
  }
  if (isset($_POST['ship_inv_date_SE']))
  {
    $ship_inv_date_SE = 1;
  }
  if (isset($_POST['ship_curr_SE']))
  {
    $ship_curr_SE = 1;
  }
  if (isset($_POST['ship_amount_SE']))
  {
    $ship_amount_SE = 1;
  }
  if (isset($_POST['pre_alert_SE']))
  {
    $pre_alert_SE = 1;
  }
  if (isset($_POST['hbl_printed_SE']))
  {
    $hbl_printed_SE = 1;
  }
  if (isset($_POST['local_inv_SE']))
  {
    $local_inv_SE = 1;
  }
  if (isset($_POST['intl_inv_SE']))
  {
    $intl_inv_SE = 1;
  }
  if (isset($_POST['name_SE']))
  {
    $name_SE = 1;
  }
  if (isset($_POST['address_a_SE']))
  {
    $address_a_SE = 1;
  }
 
  if (isset($_POST['consignee_name_SE']))
  {
    $consignee_name_SE = 1;
  }
  if (isset($_POST['consignee_address_SE']))
  {
    $consignee_address_SE = 1;
  }
  if (isset($_POST['notify_SE']))
  {
    $notify_SE = 1;
  }
  if (isset($_POST['foreign_name_SE']))
  {
    $foreign_name_SE = 1;
  }
  if (isset($_POST['foreign_address_SE']))
  {
    $foreign_address_SE = 1;
  }
  if (isset($_POST['export_ref_SE']))
  {
    $export_ref_SE = 1;
  }
  if (isset($_POST['domestic_routing_SE']))
  {
    $domestic_routing_SE = 1;
  }
  if (isset($_POST['domestic_address_SE']))
  {
    $domestic_address_SE = 1;
  }
  if (isset($_POST['orignal_fbl_SE']))
  {
    $orignal_fbl_SE = 1;
  }
  if (isset($_POST['freight_pay_SE']))
  {
    $freight_pay_SE = 1;
  }
  if (isset($_POST['eta_a_date_SE']))
  {
    $eta_a_date_SE = 1;
  }
  if (isset($_POST['eta_b_date_SE']))
  {
    $eta_b_date_SE = 1;
  }
  if (isset($_POST['eta_c_date_SE']))
  {
    $eta_c_date_SE = 1;
  }
  if (isset($_POST['etd_a_date_SE']))
  {
    $etd_a_date_SE = 1;
  }
  if (isset($_POST['etd_b_date_SE']))
  {
    $etd_b_date_SE = 1;
  }
  if (isset($_POST['etd_c_date_SE']))
  {
    $etd_c_date_SE = 1;
  }
  if (isset($_POST['eta_date_a_SE']))
  {
    $eta_date_a_SE = 1;
  }
  if (isset($_POST['eta_date_b_SE']))
  {
    $eta_date_b_SE = 1;
  }
  if (isset($_POST['eta_date_c_SE']))
  {
    $eta_date_c_SE = 1;
  }
  if (isset($_POST['eta_a_date_box_SE']))
  {
    $eta_a_date_box_SE = 1;
  }
  if (isset($_POST['eta_b_date_box_SE']))
  {
    $eta_b_date_box_SE = 1;
  }
  if (isset($_POST['eta_c_date_box_SE']))
  {
    $eta_c_date_box_SE = 1;
  }
  if (isset($_POST['etd_a_date_box_SE']))
  {
    $etd_a_date_box_SE = 1;
  }
  if (isset($_POST['etd_b_date_box_SE']))
  {
    $etd_b_date_box_SE = 1;
  }
  if (isset($_POST['etd_c_date_box_SE']))
  {
    $etd_c_date_box_SE = 1;
  }

  if (isset($_POST['eta_date_a_box_SE']))
  {
    $eta_date_a_box_SE = 1;
  }
  if (isset($_POST['eta_date_b_box_SE']))
  {
    $eta_date_b_box_SE = 1;
  }
  if (isset($_POST['eta_date_c_box_SE']))
  {
    $eta_date_c_box_SE = 1;
  }
  if (isset($_POST['vessel_a_SE']))
  {
    $vessel_a_SE = 1;
  }
  if (isset($_POST['vessel_b_SE']))
  {
    $vessel_b_SE = 1;
  }

 if (isset($_POST['vessel_c_SE']))
  {
    $vessel_c_SE = 1;
  }

if (isset($_POST['voyage_a_SE']))
  {
    $voyage_a_SE = 1;
  }

if (isset($_POST['voyage_b_SE']))
  {
    $voyage_b_SE = 1;
  }

if (isset($_POST['voyage_c_SE']))
  {
    $voyage_c_SE = 1;
  }


  $updateUM = mysqli_query($con, "UPDATE  sea_export_table_cuz SET so_no_SE='$so_no_SE', job_no_SE='$job_no_SE', job_date_SE='$job_date_SE', consol_no_SE='$consol_no_SE', last_con_no_SE='$last_con_no_SE', com_name_SE='$com_name_SE', com_code_SE='$com_code_SE',ship_line_agent_SE='$ship_line_agent_SE',port_of_lord_SE='$port_of_lord_SE',party_SE='$party_SE', agent_party_SE='$agent_party_SE', foreign_agent_SE='$foreign_agent_SE', nomination_SE='$nomination_SE' , spo_SE='$spo_SE', shipping_line_SE='$shipping_line_SE', destination_SE='$destination_SE', wharf_SE='$wharf_SE', clearing_agent_SE='$clearing_agent_SE', form_e_no_SE='$form_e_no_SE', date_SE='$date_SE', cut_date_SE='$cut_date_SE', ship_rcv_date_SE='$ship_rcv_date_SE', hand_over_s_l_SE='$hand_over_s_l_SE', doc_disp_date_SE='$doc_disp_date_SE', cc_date_SE='$cc_date_SE', four_copy_rcv_SE='$four_copy_rcv_SE', four_copy_date_SE='$four_copy_date_SE', s_b_no_SE='$s_b_no_SE',s_b_date_SE='$s_b_date_SE' , egm_SE='$egm_SE', mbl_no_SE='$mbl_no_SE',mbl_date_SE='$mbl_date_SE',hbl_no_SE='$hbl_no_SE',hbl_date_SE='$hbl_date_SE',cbm_SE='$cbm_SE',pkgs_SE='$pkgs_SE',grs_weight='$grs_weight',uom_SE='$uom_SE',net_weight_SE='$net_weight_SE',shipment_no_SE='$shipment_no_SE',l_f_SE='$l_f_SE',f_c_SE='$f_c_SE',cy_cfs_SE='$cy_cfs_SE',packages_SE='$packages_SE',unit_SE='$unit_SE',gross_weight_SE='$gross_weight_SE',cbm_ship_SE='$cbm_ship_SE',net_weight_a_SE='$net_weight_a_SE',ship_inv_no_SE='$ship_inv_no_SE',ship_inv_date_SE='$ship_inv_date_SE',ship_curr_SE='$ship_curr_SE',ship_amount_SE='$ship_amount_SE
    ',pre_alert_SE='$pre_alert_SE',hbl_printed_SE='$hbl_printed_SE',local_inv_SE='$local_inv_SE',intl_inv_SE='$intl_inv_SE',name_SE='$name_SE',address_a_SE='$address_a_SE',consignee_name_SE='$consignee_name_SE',consignee_address_SE='$consignee_address_SE',notify_SE='$notify_SE',foreign_name_SE='$foreign_name_SE',foreign_address_SE='$foreign_address_SE',export_ref_SE='$export_ref_SE',domestic_routing_SE='$domestic_routing_SE',domestic_address_SE='$domestic_address_SE',orignal_fbl_SE='$orignal_fbl_SE',freight_pay_SE='$freight_pay_SE',eta_a_date_SE='$eta_a_date_SE',eta_b_date_SE='$eta_b_date_SE',eta_c_date_SE='$eta_c_date_SE',etd_a_date_SE='$etd_a_date_SE',etd_b_date_SE='$etd_b_date_SE',etd_c_date_SE='$etd_c_date_SE',eta_date_a_SE='$eta_date_a_SE',eta_date_b_SE='$eta_date_b_SE' ,eta_date_c_SE='$eta_date_c_SE',eta_a_date_box_SE='$eta_a_date_box_SE',eta_b_date_box_SE='$eta_b_date_box_SE',eta_c_date_box_SE='$eta_c_date_box_SE',etd_a_date_box_SE='$etd_a_date_box_SE',etd_b_date_box_SE='$etd_b_date_box_SE',etd_c_date_box_SE='$etd_c_date_box_SE',eta_date_a_box_SE='$eta_date_a_box_SE',eta_date_b_box_SE='$eta_date_b_box_SE',eta_date_c_box_SE='$eta_date_c_box_SE',vessel_a_SE='$vessel_a_SE',vessel_b_SE='$vessel_b_SE',vessel_c_SE='$vessel_c_SE',voyage_a_SE='$voyage_a_SE',voyage_b_SE='$voyage_b_SE',voyage_c_SE='$voyage_c_SE' WHERE SrNo_SE= '1' ") or die(mysqli_error($con));

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
  $search = " SELECT * FROM sea_export_entry ";
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
 $search = " SELECT * FROM sea_export_entry ";
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
    $search = " SELECT * FROM sea_export_entry ";
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
  $search = " SELECT * FROM sea_export_entry ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: sea_export_table_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sea_export_table_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sea_export_table_pdf.php?searchRecord=$searchRecord");</script>';
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
 $search = " SELECT * FROM sea_export_entry ";
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
          <a href="Usermodules.php" class="btn btn-info">CRM</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Sea Export Table</a>
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

           <?php include 'sidebar_widgets/adv_hr_bar.php'; ?>
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
          <h4>Sea Export Table</h4>
        </div>
        
        <form action="" method="POST">

          <!-- Table Customization -->
           <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM sea_export_table_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            // $cmpType_CM = $rowUM['cmpType_CM'];
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

                              if ($so_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="so_no_SE" checked> <label>So No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="so_no_SE" > <label>So No</label> <br>';
                              }

                              if ($job_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="job_no_SE" checked> <label>Job No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_no_SE" > <label>Job No</label> <br>';
                              }

                              if ($job_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="job_date_SE" checked> <label>Job Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_date_SE" > <label>Job Date</label> <br>';
                              }
                              if ($consol_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="consol_no_SE" checked> <label> MAWB No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="consol_no_SE" > <label> MAWB No. </label> <br>';
                              }

                              if ($last_con_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="last_con_no_SE" checked> <label> MAWB Date </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="last_con_no_SE" > <label> MAWB Date </label> <br>';
                              }

                              if ($com_name_SE == 1)
                              {
                                echo '<input type="checkbox" name="com_name_SE" checked> <label>P/C Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="com_name_SE" > <label>P/C Master</label> <br>';
                              }
                              if ($egm_SE == 1)
                              {
                                echo '<input type="checkbox" name="egm_SE" checked> <label>Air D.O.No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="egm_SE" > <label>Air D.O.No.</label> <br>';
                              }

                              if ($mbl_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="mbl_no_SE" checked> <label>D.O.Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mbl_no_SE" > <label>D.O.Date</label> <br>';
                              }
                              
                              if ($clearing_agent_SE == 1)
                              {
                                echo '<input type="checkbox" name="clearing_agent_SE" checked> <label>Rate House </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="clearing_agent_SE" > <label>Rate House </label> <br>';
                              }
                              if ($form_e_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="form_e_no_SE" checked> <label>Description</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="form_e_no_SE" > <label>Description</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                               

                              if ($com_code_SE == 1)
                              {
                                echo '<input type="checkbox" name="com_code_SE" checked> <label>Pcs. Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="com_code_SE" > <label>Pcs. Master</label> <br>';
                              }
                               if ($party_SE == 1)
                              {
                                echo '<input type="checkbox" name="party_SE" checked> <label>Grs.Weight Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="party_SE" > <label>Grs.Weight Master</label> <br>';
                              }

                              if ($agent_party_SE == 1)
                              {
                                echo '<input type="checkbox" name="agent_party_SE" checked> <label>Ch.Weight Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="agent_party_SE" > <label>Ch.Weight Master</label> <br>';
                              }

                              if ($foreign_agent_SE == 1)
                              {
                                echo '<input type="checkbox" name="foreign_agent_SE" checked> <label>Rate Master</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreign_agent_SE" > <label>Rate Master</label> <br>';
                              }

                              if ($nomination_SE == 1)
                              {
                                echo '<input type="checkbox" name="nomination_SE" checked> <label>HAWB No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="nomination_SE" > <label>HAWB No.</label> <br>';
                              }

                              if ($spo_SE == 1)
                              {
                                echo '<input type="checkbox" name="spo_SE" checked> <label>HAWB Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="spo_SE" > <label>HAWB Date</label> <br>';
                              }

                              if ($shipping_line_SE == 1)
                              {
                                echo '<input type="checkbox" name="shipping_line_SE" checked> <label>P/C House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipping_line_SE" > <label>P/C House</label> <br>';
                              }
                              if ($port_of_lord_SE == 1)
                              {
                                echo '<input type="checkbox" name="port_of_lord_SE" checked> <label>P/C House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="port_of_lord_SE" > <label>P/C House</label> <br>';
                              }
                              if ($ship_line_agent_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_line_agent_SE" checked> <label>Pcs House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_line_agent_SE" > <label>Pcs House</label> <br>';
                              }
                              if ($destination_SE == 1)
                              {
                                echo '<input type="checkbox" name="destination_SE" checked> <label>Grs.Weight House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="destination_SE" > <label>Grs.Weight House</label> <br>';
                              }

                              if ($wharf_SE == 1)
                              {
                                echo '<input type="checkbox" name="wharf_SE" checked> <label>Ch.Weight House</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="wharf_SE" > <label>Ch.Weight House</label> <br>';
                              }

                              echo '</div>';

                              if ($date_SE == 1)
                              {
                                echo '<input type="checkbox" name="date_SE" checked> <label>Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="date_SE" > <label>Party</label> <br>';
                              }

                              if ($cut_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="cut_date_SE" checked> <label>Agent Party Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cut_date_SE" > <label>Agent Party Cell</label> <br>';
                              }

                              if ($ship_rcv_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_rcv_date_SE" checked> <label>Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_rcv_date_SE" > <label>Foreign Agent</label> <br>';
                              }

                              if ($hand_over_s_l_SE == 1)
                              {
                                echo '<input type="checkbox" name="hand_over_s_l_SE" checked> <label>SPO</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="hand_over_s_l_SE" > <label>SPO</label> <br>';
                              }
                              if ($doc_disp_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="doc_disp_date_SE" checked> <label>Origin</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="doc_disp_date_SE" > <label>Origin</label> <br>';
                              }

                              if ($cc_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="cc_date_SE" checked> <label>Destination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cc_date_SE" > <label>Destination</label> <br>';
                              }
                              if ($four_copy_rcv_SE == 1)
                              {
                                echo '<input type="checkbox" name="four_copy_rcv_SE" checked> <label>Flight No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="four_copy_rcv_SE" > <label>Flight No.</label> <br>';
                              }

                              if ($four_copy_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="four_copy_date_SE" checked> <label>Flight Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="four_copy_date_SE" > <label>Flight Date</label> <br>';
                              }
                              if ($s_b_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="s_b_no_SE" checked> <label>IGM No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="s_b_no_SE" > <label>IGM No.</label> <br>';
                              }
                               if ($s_b_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="s_b_date_SE" checked> <label>IGM No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="s_b_date_SE" > <label>IGM No.</label> <br>';
                              }


                            
                              // if ($egm_SE == 1)
                              // {
                              //   echo '<input type="checkbox" name="egm_SE" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="egm_SE" > <label>Credit Days</label> <br>';
                              // }
                              // if ($mbl_no_SE == 1)
                              // {
                              //   echo '<input type="checkbox" name="mbl_no_SE" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="mbl_no_SE" > <label>Credit Days</label> <br>';
                              // }
                              // if ($mbl_date_SE == 1)
                              // {
                              //   echo '<input type="checkbox" name="mbl_date_SE" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="mbl_date_SE" > <label>Credit Days</label> <br>';
                              // }
                              // if ($b_e_date_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="b_e_date_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="b_e_date_AI" > <label>Credit Days</label> <br>';
                              // }
                              if ($hbl_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="hbl_no_SE" checked> <label>Index No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="hbl_no_SE" > <label>Index No.</label> <br>';
                              }
                              if ($hbl_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="hbl_date_SE" checked> <label>Sub Index No.s</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="hbl_date_SE" > <label>Sub Index No</label> <br>';
                              }
                              if ($cbm_SE == 1)
                              {
                                echo '<input type="checkbox" name="cbm_SE" checked> <label>E.T.Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cbm_SE" > <label>E.T.Date</label> <br>';
                              }
                              if ($pkgs_SE == 1)
                              {
                                echo '<input type="checkbox" name="pkgs_SE" checked> <label>E.T.A</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="pkgs_SE" > <label>E.T.A</label> <br>';
                              }
                              if ($grs_weight == 1)
                              {
                                echo '<input type="checkbox" name="grs_weight" checked> <label>L/C</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="grs_weight" > <label>L/C</label> <br>';
                              }
                              if ($uom_SE == 1)
                              {
                                echo '<input type="checkbox" name="uom_SE" checked> <label>Origin D.O.No</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="uom_SE" > <label>Origin D.O.No</label> <br>';
                              }
                              if ($net_weight_SE == 1)
                              {
                                echo '<input type="checkbox" name="net_weight_SE" checked> <label>Passport ID</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="net_weight_SE" > <label>Passport ID</label> <br>';
                              }
                              if ($shipment_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="shipment_no_SE" checked> <label>Foreign Agent Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipment_no_SE" > <label>Foreign Agent Party</label> <br>';
                              }
                              if ($l_f_SE == 1)
                              {
                                echo '<input type="checkbox" name="l_f_SE" checked> <label>Notify</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="l_f_SE" > <label>Notify</label> <br>';
                              }
                              if ($f_c_SE == 1)
                              {
                                echo '<input type="checkbox" name="f_c_SE" checked> <label>Consignee</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="f_c_SE" > <label>Consignee</label> <br>';
                              }
                              if ($cy_cfs_SE == 1)
                              {
                                echo '<input type="checkbox" name="cy_cfs_SE" checked> <label>Remarks</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cy_cfs_SE" > <label>Remarks</label> <br>';
                              }
                              if ($packages_SE == 1)
                              {
                                echo '<input type="checkbox" name="packages_SE" checked> <label>Nomination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="packages_SE" > <label>Nomination</label> <br>';
                              }
                              if ($unit_SE == 1)
                              {
                                echo '<input type="checkbox" name="unit_SE" checked> <label>Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="unit_SE" > <label>Status</label> <br>';
                              }
                              if ($gross_weight_SE == 1)
                              {
                                echo '<input type="checkbox" name="gross_weight_SE" checked> <label>Shipment Remarks </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="gross_weight_SE" > <label>Shipment Remarks</label> <br>';
                              }
                              if ($cbm_ship_SE == 1)
                              {
                                echo '<input type="checkbox" name="cbm_ship_SE" checked> <label>Freight Term</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cbm_ship_SE" > <label>Freight Term</label> <br>';
                              }
                              if ($net_weight_a_SE == 1)
                              {
                                echo '<input type="checkbox" name="net_weight_a_SE" checked> <label>Inv to Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="net_weight_a_SE" > <label>Inv to Foreign Agent</label> <br>';
                              }
                              if ($ship_inv_no_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_inv_no_SE" checked> <label>Local Invoice</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_inv_no_SE" > <label>Local Invoice</label> <br>';
                              }
                              if ($ship_inv_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_inv_date_SE" checked> <label>Inv From Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_inv_date_SE" > <label>Inv From Foreign Agent</label> <br>';
                              }
                             
                              if ($ship_curr_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_curr_SE" checked> <label>Currency</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_curr_SE" > <label>Currency</label> <br>';
                              }
                              if ($ship_amount_SE == 1)
                              {
                                echo '<input type="checkbox" name="ship_amount_SE" checked> <label>Exchange Rate</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_amount_SE" > <label>Exchange Rate</label> <br>';
                              }
                              if ($pre_alert_SE == 1)
                              {
                                echo '<input type="checkbox" name="pre_alert_SE" checked> <label>Sell Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="pre_alert_SE" > <label>Sell Rate Party</label> <br>';
                              }
                              if ($hbl_printed_SE == 1)
                              {
                                echo '<input type="checkbox" name="hbl_printed_SE" checked> <label>Sell Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="hbl_printed_SE" > <label>Sell Amount Party</label> <br>';
                              }
                              if ($local_inv_SE == 1)
                              {
                                echo '<input type="checkbox" name="local_inv_SE" checked> <label>Sell Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="local_inv_SE" > <label>Sell Amount PKR Party</label> <br>';
                              }
                              if ($intl_inv_SE == 1)
                              {
                                echo '<input type="checkbox" name="intl_inv_SE" checked> <label>Buy Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="intl_inv_SE" > <label>Buy Rate Party</label> <br>';
                              }
                              if ($name_SE == 1)
                              {
                                echo '<input type="checkbox" name="name_SE" checked> <label>Buy Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="name_SE" > <label>Buy Amount Party</label> <br>';
                              }
                              if ($address_a_SE == 1)
                              {
                                echo '<input type="checkbox" name="address_a_SE" checked> <label>Buy Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="address_a_SE" > <label>Buy Amount PKR Party</label> <br>';
                              }
                              if ($consignee_name_SE == 1)
                              {
                                echo '<input type="checkbox" name="consignee_name_SE" checked> <label>Diff Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="consignee_name_SE" > <label>Diff Amount Party</label> <br>';
                              }
                              if ($consignee_address_SE == 1)
                              {
                                echo '<input type="checkbox" name="consignee_address_SE" checked> <label>Diff Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="consignee_address_SE" > <label>Diff Amount PKR Party</label> <br>';
                              }
                              if ($notify_SE == 1)
                              {
                                echo '<input type="checkbox" name="notify_SE" checked> <label>Profit Rate Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="notify_SE" > <label>Profit Rate Party</label> <br>';
                              }
                              if ($foreign_name_SE == 1)
                              {
                                echo '<input type="checkbox" name="foreign_name_SE" checked> <label>Profit Amount Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreign_name_SE" > <label>Profit Amount Party</label> <br>';
                              }
                              if ($foreign_address_SE == 1)
                              {
                                echo '<input type="checkbox" name="foreign_address_SE" checked> <label>Profit Amount PKR Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreign_address_SE" > <label>Profit Amount PKR Party</label> <br>';
                              }
                              if ($export_ref_SE == 1)
                              {
                                echo '<input type="checkbox" name="export_ref_SE" checked> <label>Buy Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="export_ref_SE" > <label>Buy Rate Foreign</label> <br>';
                              }
                              if ($domestic_routing_SE == 1)
                              {
                                echo '<input type="checkbox" name="domestic_routing_SE" checked> <label>Buy Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="domestic_routing_SE" > <label>Buy Amount Foreign</label> <br>';
                              }
                              if ($domestic_address_SE == 1)
                              {
                                echo '<input type="checkbox" name="domestic_address_SE" checked> <label>Buy Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="domestic_address_SE" > <label>Buy Amount PKR Foreign</label> <br>';
                              }
                              if ($orignal_fbl_SE == 1)
                              {
                                echo '<input type="checkbox" name="orignal_fbl_SE" checked> <label>Sell Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="orignal_fbl_SE" > <label>Sell Rate Foreign</label> <br>';
                              }
                              if ($freight_pay_SE == 1)
                              {
                                echo '<input type="checkbox" name="freight_pay_SE" checked> <label>Sell Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="freight_pay_SE" > <label>Sell Amount Foreign</label> <br>';
                              }
                              if ($eta_a_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_a_date_SE" checked> <label>Sell Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_a_date_SE" > <label>Sell Amount PKR Foreign</label> <br>';
                              }
                              if ($eta_b_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_b_date_SE" checked> <label>Diff Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_b_date_SE" > <label>Diff Amount Foreign</label> <br>';
                              }
                              if ($eta_c_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_c_date_SE" checked> <label>Diff Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_c_date_SE" > <label>Diff Amount PKR Foreign</label> <br>';
                              }
                              if ($etd_a_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_a_date_SE" checked> <label>Profit Rate Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_a_date_SE" > <label>Profit Rate Foreign</label> <br>';
                              }
                              if ($etd_b_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_b_date_SE" checked> <label>Profit Amount Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_b_date_SE" > <label>Profit Amount Foreign</label> <br>';
                              }
                              if ($etd_c_date_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_c_date_SE" checked> <label>Profit Amount PKR Foreign</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_c_date_SE" > <label>Profit Amount PKR Foreign</label> <br>';
                              }
                              if ($eta_date_a_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_a_SE" checked> <label>Payable Amount</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_a_SE" > <label>Payable Amount</label> <br>';
                              }
                              if ($eta_date_b_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_b_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_b_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($eta_date_c_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_c_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_c_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($eta_a_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_a_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_a_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }
                             
                             if ($eta_b_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_b_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_b_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($eta_c_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_c_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_c_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($etd_a_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_a_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_a_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($etd_b_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_b_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_b_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($etd_c_date_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="etd_c_date_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="etd_c_date_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($eta_date_a_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_a_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_a_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($eta_date_b_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_b_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_b_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }


                              if ($eta_date_c_box_SE == 1)
                              {
                                echo '<input type="checkbox" name="eta_date_c_box_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="eta_date_c_box_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($vessel_a_SE == 1)
                              {
                                echo '<input type="checkbox" name="vessel_a_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="vessel_a_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($vessel_b_SE == 1)
                              {
                                echo '<input type="checkbox" name="vessel_b_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="vessel_b_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($vessel_c_SE == 1)
                              {
                                echo '<input type="checkbox" name="vessel_c_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="vessel_c_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($voyage_a_SE == 1)
                              {
                                echo '<input type="checkbox" name="voyage_a_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="voyage_a_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($voyage_b_SE == 1)
                              {
                                echo '<input type="checkbox" name="voyage_b_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="voyage_b_SE" > <label>Payable Amount PKR</label> <br>';
                              }

                              if ($voyage_c_SE == 1)
                              {
                                echo '<input type="checkbox" name="voyage_c_SE" checked> <label>Payable Amount PKR</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="voyage_c_SE" > <label>Payable Amount PKR</label> <br>';
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
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Action</th>
                              </tr>
                       </thead>
								                                                        
                                <tbody>
                                  <?php

                                                          while ($row= mysqli_fetch_array($searchQuery))
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
                                  <tr id="<?php echo $SrNo; ?>">
                                    <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $id .' " /></td>'; ?>
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


                                                           
                                  <td><a href="add_job_air_import_View.php?id=<?php echo $row['SrNo']; ?>">View</td>
                                  <td><a href="add_job_air_import_Edit.php?id=<?php echo $row['SrNo']; ?>">Edit</td>
                                    <td></td>
                                 
                                     <!-- <?php
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
                                    ?> -->
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