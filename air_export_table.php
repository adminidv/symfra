<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM air_export_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE air_export_entry SET status_type='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: air_export_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM air_export_entry WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE air_export_entry SET status_type='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: air_export_table.php");
  }
}


if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  // $so_no_AE = 0;
  $so_no_AE = 0;
  $job_no_a_AE = 0;
  $job_date_a_AE = 0;
  $mawb_no_AE = 0;
  $awb_no_AE = 0;
  $sale_date_AE = 0;
  $owner_name_AE = 0;
  $charge_code_AE = 0;
  $charge_type_AE = 0;
  $booking_date_AE = 0;
  $station_AE = 0;
  $party_AE = 0;
  $agent_party_AE = 0;
  $party_name_AE = 0;
  $party_address_AE = 0;
  $con_consolidation_AE = 0;
  $con_name_AE = 0;
  $con_address_AE = 0;
  $airport_dep_AE = 0;
  $airport_to_a_AE = 0;
  $airport_to_b_AE = 0;
  $airport_to_c_AE = 0;
  $airport_by_a_AE = 0;
  $airport_by_b_AE = 0;
  $airport_by_c_AE = 0;
  $currency_AE = 0;
  $destination_AE = 0;
  $account_no_AE = 0;
  $flight_no_a_AE = 0;
  $flight_no_a_date_AE = 0;
  $form_e_no_AE = 0;
  $form_e_date_AE = 0;
  $flight_no_b_AE = 0;
  $flight_no_b_date_AE = 0;
  $ship_inv_no_AE = 0;
  $ship_inv_no_date_AE = 0;
  $job_no_AE = 0;
  $insurance_AE = 0;
  $decl_val_carriage_AE = 0;
  $decl_val_custom_AE = 0;
  $nominaton_AE = 0;
  $handling_info_AE = 0;
  $other_info_AE = 0;
  $account_info_AE = 0;
  $said_chain_AE = 0;
  $ref_no_AE = 0;
  $td_flash_AE = 0;
  $clearing_agent_AE = 0;
  $spo_AE = 0;
  $freight_AE = 0;
  $due_carrier_AE = 0;
  $due_agent_AE = 0;
  $awb_total_AE = 0;
  $payable_airline_AE = 0;


  // Setting variables if 1
  // if (isset($_POST['cmpType_CM']))
  // {
  //   $cmpType_CM = 1;
  // }
  if (isset($_POST['so_no_AE']))
  {
    $so_no_AE = 1;
  }
  if (isset($_POST['job_no_a_AE']))
  {
    $job_no_a_AE = 1;
  }
  if (isset($_POST['job_date_a_AE']))
  {
    $job_date_a_AE = 1;
  }
  if (isset($_POST['mawb_no_AE']))
  {
    $mawb_no_AE = 1;
  }
  if (isset($_POST['awb_no_AE']))
  {
    $awb_no_AE = 1;
  }
  
  if (isset($_POST['sale_date_AE']))
  {
    $sale_date_AE = 1;
  }
  if (isset($_POST['owner_name_AE']))
  {
    $owner_name_AE = 1;
  }
  if (isset($_POST['charge_code_AE']))
  {
    $charge_code_AE = 1;
  }
  if (isset($_POST['charge_type_AE']))
  {
    $charge_type_AE = 1;
  }
  if (isset($_POST['booking_date_AE']))
  {
    $booking_date_AE = 1;
  }
  if (isset($_POST['station_AE']))
  {
    $station_AE = 1;
  }
  if (isset($_POST['party_AE']))
  {
    $party_AE = 1;
  }
  // if (isset($_POST['party_name_AI']))
  // {
  //   $party_name_AI = 1;
  // }
  if (isset($_POST['agent_party_AE']))
  {
    $agent_party_AE = 1;
  }
  if (isset($_POST['party_name_AE']))
  {
    $party_name_AE = 1;
  }
  if (isset($_POST['party_address_AE']))
  {
    $party_address_AE = 1;
  }
  if (isset($_POST['con_consolidation_AE']))
  {
    $con_consolidation_AE = 1;
  }
  if (isset($_POST['con_name_AE']))
  {
    $con_name_AE = 1;
  }
  if (isset($_POST['con_address_AE']))
  {
    $con_address_AE = 1;
  }
  if (isset($_POST['airport_dep_AE']))
  {
    $airport_dep_AE = 1;
  }
  if (isset($_POST['airport_to_a_AE']))
  {
    $airport_to_a_AE = 1;
  }
  if (isset($_POST['airport_to_b_AE']))
  {
    $airport_to_b_AE = 1;
  }
  if (isset($_POST['airport_to_c_AE']))
  {
    $airport_to_c_AE  = 1;
  }
  if (isset($_POST['airport_by_a_AE']))
  {
    $airport_by_a_AE = 1;
  }
  if (isset($_POST['airport_by_b_AE']))
  {
    $airport_by_b_AE = 1;
  }
  if (isset($_POST['airport_by_c_AE']))
  {
    $airport_by_c_AE = 1;
  }
  if (isset($_POST['currency_AE']))
  {
    $currency_AE = 1;
  }
  if (isset($_POST['destination_AE']))
  {
    $destination_AE = 1;
   }
  if (isset($_POST['account_no_AE']))
  {
    $account_no_AE = 1;
  }
  
  if (isset($_POST['flight_no_a_AE']))
  {
    $flight_no_a_AE = 1;
  }
  if (isset($_POST['flight_no_a_date_AE']))
  {
    $flight_no_a_date_AE = 1;
  }
  if (isset($_POST['form_e_no_AE']))
  {
    $form_e_no_AE = 1;
  }
  if (isset($_POST['form_e_date_AE']))
  {
    $form_e_date_AE = 1;
  }
  if (isset($_POST['flight_no_b_AE']))
  {
    $flight_no_b_AE = 1;
  }
  if (isset($_POST['flight_no_b_date_AE']))
  {
    $flight_no_b_date_AE = 1;
  }
   if (isset($_POST['ship_inv_no_AE']))
  {
    $ship_inv_no_AE = 1;
  }
  if (isset($_POST['ship_inv_no_date_AE']))
  {
    $ship_inv_no_date_AE = 1;
  }
  if (isset($_POST['job_no_AE']))
  {
    $job_no_AE = 1;
  }
  if (isset($_POST['insurance_AE']))
  {
    $insurance_AE = 1;
  }
  if (isset($_POST['decl_val_carriage_AE']))
  {
    $decl_val_carriage_AE = 1;
  }
  if (isset($_POST['decl_val_custom_AE']))
  {
    $decl_val_custom_AE = 1;
  }
  if (isset($_POST['nominaton_AE']))
  {
    $nominaton_AE = 1;
  }
  if (isset($_POST['handling_info_AE']))
  {
    $handling_info_AE = 1;
  }
  if (isset($_POST['other_info_AE']))
  {
    $other_info_AE = 1;
  }
  if (isset($_POST['account_info_AE']))
  {
    $account_info_AE = 1;
  }
  if (isset($_POST['said_chain_AE']))
  {
    $said_chain_AE = 1;
  }
  if (isset($_POST['ref_no_AE']))
  {
    $ref_no_AE = 1;
  }
  if (isset($_POST['td_flash_AE']))
  {
    $td_flash_AE = 1;
  }
  // if (isset($_POST['due_carrier']))
  // {
  //   $due_carrier = 1;
  // }
  if (isset($_POST['clearing_agent_AE']))
  {
    $clearing_agent_AE = 1;
  }
  if (isset($_POST['spo_AE']))
  {
    $spo_AE = 1;
  }
  if (isset($_POST['freight_AE']))
  {
    $freight_AE = 1;
  }
  if (isset($_POST['due_carrier_AE']))
  {
    $due_carrier_AEv = 1;
  }
  if (isset($_POST['due_agent_AE']))
  {
    $due_agent_AE = 1;
  }
  if (isset($_POST['awb_total_AE']))
  {
    $awb_total_AE = 1;
  }
  if (isset($_POST['payable_airline_AE']))
  {
    $payable_airline_AE = 1;
  }
 
  // if (isset($_POST['diffAmount_P_AI']))
  // {
  //   $diffAmount_P_AI = 1;
  // }
  // if (isset($_POST['diffAmountPKR_P_AI']))
  // {
  //   $diffAmountPKR_P_AI = 1;
  // }
  // if (isset($_POST['profitRate_P_AI']))
  // {
  //   $profitRate_P_AI = 1;
  // }
  // if (isset($_POST['profitAmount_P_AI']))
  // {
  //   $profitAmount_P_AI = 1;
  // }
  // if (isset($_POST['profitAmountPKR_P_AI']))
  // {
  //   $profitAmountPKR_P_AI = 1;
  // }
  // if (isset($_POST['buyRate_F_AI']))
  // {
  //   $buyRate_F_AI = 1;
  // }
  // if (isset($_POST['buyAmount_F_AI']))
  // {
  //   $buyAmount_F_AI = 1;
  // }
  // if (isset($_POST['buyAmountPKR_F_AI']))
  // {
  //   $buyAmountPKR_F_AI = 1;
  // }
  // if (isset($_POST['sellRate_F_AI']))
  // {
  //   $sellRate_F_AI = 1;
  // }
  // if (isset($_POST['sellAmount_F_AI']))
  // {
  //   $sellAmount_F_AI = 1;
  // }
  // if (isset($_POST['sellAmountPKR_F_AI']))
  // {
  //   $sellAmountPKR_F_AI = 1;
  // }
  // if (isset($_POST['diffAmount_F_AI']))
  // {
  //   $diffAmount_F_AI = 1;
  // }
  // if (isset($_POST['diffAmountPKR_F_AI']))
  // {
  //   $diffAmountPKR_F_AI = 1;
  // }
  // if (isset($_POST['profitRate_F_AI']))
  // {
  //   $profitRate_F_AI = 1;
  // }
  // if (isset($_POST['profitAmount_F_AI']))
  // {
  //   $profitAmount_F_AI = 1;
  // }
  // if (isset($_POST['profitAmountPKR_F_AI']))
  // {
  //   $profitAmountPKR_F_AI = 1;
  // }
  // if (isset($_POST['payableAmount_AI']))
  // {
  //   $payableAmount_AI = 1;
  // }
  // if (isset($_POST['payableAmountPKR_AI']))
  // {
  //   $payableAmountPKR_AI = 1;
  // }


  $updateUM = mysqli_query($con, "UPDATE air_import_table_cuz SET so_no_AE='$so_no_AE', job_no_a_AE='$job_no_a_AE', job_date_a_AE='$job_date_a_AE', mawb_no_AE='$mawb_no_AE', awb_no_AE='$awb_no_AE', sale_date_AE='$sale_date_AE',party_name_AI='$party_name_AI',owner_name_AE='$owner_name_AE', charge_code_AE='$charge_code_AE', charge_type_AE='$charge_type_AE', booking_date_AE = '$booking_date_AE', station_AE='$station_AE', party_AE='$party_AE', agent_party_AE='$agent_party_AE', party_name_AE='$party_name_AE', party_address_AE='$party_address_AE', con_consolidation_AE='$con_consolidation_AE', con_name_AE='$con_name_AE', con_address_AE='$con_address_AE', airport_dep_AE='$airport_dep_AE', airport_to_a_AE='$airport_to_a_AE', airport_to_b_AE='$airport_to_b_AE', airport_to_c_AE='$airport_to_c_AE', airport_by_a_AE='$airport_by_a_AE', airport_by_b_AE='$airport_by_b_AE', airport_by_c_AE='$airport_by_c_AE', currency_AE='$currency_AE', destination_AE='$destination_AE',account_no_AE='$account_no_AE',flight_no_a_AE='$flight_no_a_AE',flight_no_a_date_AE='$flight_no_a_date_AE',form_e_no_AE='$form_e_no_AE',form_e_date_AE='$form_e_date_AE',flight_no_b_AE='$flight_no_b_AE',flight_no_b_AE_date_AE='$flight_no_b_AE_date_AE',ship_inv_no_AE='$ship_inv_no_AE',ship_inv_no_date_AE='$ship_inv_no_date_AE',job_no_AE='$job_no_AE',insurance_AE='$insurance_AE',decl_val_carriage_AE='$decl_val_carriage_AE',decl_val_custom_AE='$decl_val_custom_AE',nominaton_AE='$nominaton_AE',handling_info_AE='$handling_info_AE',other_info_AE='$other_info_AE',account_info_AE='$account_info_AE',said_chain_AE='$said_chain_AE',ref_no_AE='$ref_no_AE',td_flash_AE='$td_flash_AE',clearing_agent_AE='$clearing_agent_AE',spo_AE='$spo_AE
    ',freight_AE='$freight_AE',due_carrier_AE='$payable_airline',due_agent_AE='$due_agent_AE',awb_total_AE='$awb_total_AE'/*payable_airline_AE='$payable_airline_AE',buyAmountPKR_P='$buyAmountPKR_P_AI',diffAmount_P='$diffAmount_P_AI',diffAmountPKR_P='$diffAmountPKR_P_AI',profitRate_P='$profitRate_P_AI',profitAmount_P='$profitAmount_P_AI',profitAmountPKR_P='$profitAmountPKR_P_AI',buyRate_F='$buyRate_F_AI',buyAmount_F='$buyAmount_F_AI',buyAmountPKR_F='$buyAmountPKR_F_AI',sellRate_F='$sellRate_F_AI',sellAmount_F='$sellAmount_F_AI',sellAmountPKR_F='$sellAmountPKR_F_AI',diffAmount_F='$diffAmount_F_AI',diffAmountPKR_F='$diffAmountPKR_F_AI',profitRate_F='$profitRate_F_AI',profitAmount_F='$profitAmount_F_AI',profitAmountPKR_F='$profitAmountPKR_F_AI',payableAmount='$payableAmount_AI',payableAmountPKR='$payableAmountPKR_AI'*/ WHERE SrNo_AI= '1' ") or die(mysqli_error($con));

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the first name
      if(!empty($_POST['empFName']))
      {
          $empFName = $_POST['empFName'];
          $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
          $empFNameaccount_info = 1;
      }
      else
      {
        $empFNameaccount_info = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameaccount_info == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameaccount_info = 1;
      }
      else
      {
        $empLNameaccount_info = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameaccount_info == 1 OR $empFNameaccount_info == 1)
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
          $empDeptaccount_info = 1;
      }
      else
      {
        $empDeptaccount_info = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptaccount_info == 1 OR $empFNameaccount_info == 1 OR $empLNameaccount_info == 1)
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
  $search = " SELECT * FROM air_export_entry ";
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
          $empFNameaccount_info = 1;
      }
      else
      {
        $empFNameaccount_info = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameaccount_info == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameaccount_info = 1;
      }
      else
      {
        $empLNameaccount_info = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameaccount_info == 1 OR $empFNameaccount_info == 1)
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
          $empDeptaccount_info = 1;
      }
      else
      {
        $empDeptaccount_info = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptaccount_info == 1 OR $empFNameaccount_info == 1 OR $empLNameaccount_info == 1)
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
 $search = " SELECT * FROM air_export_entry ";
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
            $empFNameaccount_info = 1;
        }
        else
        {
          $empFNameaccount_info = 0;
        }

        // if user is giving the middle name
        if(!empty($_POST['empLName']))
        {
            if($empFNameaccount_info == 1)
            {
              $clause = " AND ";
            }
            $empLName = $_POST['empLName'];
            $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
            $empLNameaccount_info = 1;
        }
        else
        {
          $empLNameaccount_info = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['empDept']))
        {
            if($empLNameaccount_info == 1 OR $empFNameaccount_info == 1)
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
            $empDeptaccount_info = 1;
        }
        else
        {
          $empDeptaccount_info = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['empDesig']))
        {
            if($empDeptaccount_info == 1 OR $empFNameaccount_info == 1 OR $empLNameaccount_info == 1)
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
    $search = " SELECT * FROM air_export_entry ";
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
          $empFNameaccount_info = 1;
      }
      else
      {
        $empFNameaccount_info = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameaccount_info == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameaccount_info = 1;
      }
      else
      {
        $empMNameaccount_info = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLName == 1 OR $empFNameaccount_info == 1)
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
          $empDeptaccount_info = 1;
      }
      else
      {
        $empDeptaccount_info = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptaccount_info == 1 OR $empFNameaccount_info == 1 OR $empLName == 1)
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
  $search = " SELECT * FROM air_export_entry ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: air_export_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("air_export_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("air_export_pdf.php?searchRecord=$searchRecord");</script>';
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
          $empFNameaccount_info = 1;
      }
      else
      {
        $empFNameaccount_info = 0;
      }

      // if user is giving the middle name
      if(!empty($_POST['empLName']))
      {
          if($empFNameaccount_info == 1)
          {
            $clause = " AND ";
          }
          $empLName = $_POST['empLName'];
          $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
          $empLNameaccount_info = 1;
      }
      else
      {
        $empLNameaccount_info = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empLNameaccount_info == 1 OR $empFNameaccount_info == 1)
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
          $empDeptaccount_info = 1;
      }
      else
      {
        $empDeptaccount_info = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($empDeptaccount_info == 1 OR $empFNameaccount_info == 1 OR $empLNameaccount_info == 1)
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
 $search = " SELECT * FROM air_export_entry ";
    $searchQuery = mysqli_query($con, $search);;
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Air Export Table</title>
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
          <a href="Usermodules.php" class="btn btn-info">Operations</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Job Entry Air Export</a>
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
          <h4>Job Entry Air Export</h4>
        </div>
        
        <form action="" method="POST">

          <!-- Table Customization -->
           <?php

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

                              if ($so_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="so_no_AE" checked> <label>Legacy Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="so_no_AE" > <label>Legacy Code</label> <br>';
                              }

                              if ($job_no_a_AE == 1)
                              {
                                echo '<input type="checkbox" name="job_no_a_AE" checked> <label>New Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_no_a_AE" > <label>New Code</label> <br>';
                              }

                             
                              if ($job_date_a_AE == 1)
                              {
                                echo '<input type="checkbox" name="job_date_a_AE" checked> <label> Street </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_date_a_AE" > <label> Street </label> <br>';
                              }

                              if ($mawb_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="mawb_no_AE" checked> <label> City </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mawb_no_AE" > <label> City </label> <br>';
                              }

                              if ($awb_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="awb_no_AE" checked> <label>Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="awb_no_AE" > <label>Country</label> <br>';
                              }
                              if ($currency_AE == 1)
                              {
                                echo '<input type="checkbox" name="currency_AE" checked> <label></label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="currency_AE" > <label>s</label> <br>';
                              }

                              if ($destination_AE == 1)
                              {
                                echo '<input type="checkbox" name="destination_AE" checked> <label>Company account_info</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="destination_AE" > <label>Company account_info</label> <br>';
                              }
                              
                              if ($party_address_AE == 1)
                              {
                                echo '<input type="checkbox" name="party_address_AE" checked> <label>Rep Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="party_address_AE" > <label>Rep Name</label> <br>';
                              }
                              if ($con_consolidation_AE == 1)
                              {
                                echo '<input type="checkbox" name="con_consolidation_AE" checked> <label>Rep Desig.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="con_consolidation_AE" > <label>Rep Desig.</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                               

                              if ($sale_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="sale_date_AE" checked> <label>Tel. Number</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sale_date_AE" > <label>Tel. Number</label> <br>';
                              }
                               if ($owner_name_AE == 1)
                              {
                                echo '<input type="checkbox" name="owner_name_AE" checked> <label>Website</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="owner_name_AE" > <label>Website</label> <br>';
                              }

                              if ($charge_code_AE == 1)
                              {
                                echo '<input type="checkbox" name="charge_code_AE" checked> <label>Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="charge_code_AE" > <label>Email</label> <br>';
                              }

                              if ($charge_type_AE == 1)
                              {
                                echo '<input type="checkbox" name="charge_type_AE" checked> <label>Tax Type</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="charge_type_AE" > <label>Tax Type</label> <br>';
                              }

                              if ($booking_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="booking_date_AE" checked> <label>Tax No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="booking_date_AE" > <label>Tax No.</label> <br>';
                              }

                              if ($station_AE == 1)
                              {
                                echo '<input type="checkbox" name="station_AE" checked> <label>Sea Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="station_AE" > <label>Sea Import</label> <br>';
                              }

                              if ($party_AE == 1)
                              {
                                echo '<input type="checkbox" name="party_AE" checked> <label>Air Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="party_AE" > <label>Air Import</label> <br>';
                              }
                             
                              if ($agent_party_AE == 1)
                              {
                                echo '<input type="checkbox" name="agent_party_AE" checked> <label>Sea Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="agent_party_AE" > <label>Sea Export</label> <br>';
                              }

                              if ($party_name_AE == 1)
                              {
                                echo '<input type="checkbox" name="party_name_AE" checked> <label>Air Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="party_name_AE" > <label>Air Export</label> <br>';
                              }

                              echo '</div>';

                              if ($con_name_AE == 1)
                              {
                                echo '<input type="checkbox" name="con_name_AE" checked> <label>Rep. Off. Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="con_name_AE" > <label>Rep. Off. Cell</label> <br>';
                              }

                              if ($con_address_AE == 1)
                              {
                                echo '<input type="checkbox" name="con_address_AE" checked> <label>Rep. Per. Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="con_address_AE" > <label>Rep. Per. Cell</label> <br>';
                              }

                              if ($airport_dep_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_dep_AE" checked> <label>Rep. Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_dep_AE" > <label>Rep. Email</label> <br>';
                              }

                              if ($airport_to_a_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_to_a_AE" checked> <label>Bank Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_to_a_AE" > <label>Bank Name</label> <br>';
                              }
                              if ($airport_to_b_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_to_b_AE" checked> <label>Bank Br.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_to_b_AE" > <label>Bank Br.</label> <br>';
                              }

                              if ($airport_to_c_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_to_c_AE" checked> <label>Bank City</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_to_c_AE" > <label>Bank City</label> <br>';
                              }
                              if ($airport_by_a_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_by_a_AE" checked> <label>Bank Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_by_a_AE" > <label>Bank Country</label> <br>';
                              }

                              if ($airport_by_b_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_by_b_AE" checked> <label>IBAN</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_by_b_AE" > <label>IBAN</label> <br>';
                              }
                              if ($airport_by_c_AE == 1)
                              {
                                echo '<input type="checkbox" name="airport_by_c_AE" checked> <label>Non-IBAN</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airport_by_c_AE" > <label>Non-IBAN</label> <br>';
                              }


                              
                              if ($account_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="account_no_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="account_no_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($flight_no_a_AE == 1)
                              {
                                echo '<input type="checkbox" name="flight_no_a_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_no_a_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($flight_no_a_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="flight_no_a_date_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_no_a_date_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($form_e_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="form_e_no_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="form_e_no_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($form_e_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="form_e_date_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="form_e_date_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($flight_no_b_AE == 1)
                              {
                                echo '<input type="checkbox" name="flight_no_b_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_no_b_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($flight_no_b_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="flight_no_b_date_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_no_b_date_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($ship_inv_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="ship_inv_no_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_inv_no_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($ship_inv_no_date_AE == 1)
                              {
                                echo '<input type="checkbox" name="ship_inv_no_date_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ship_inv_no_date_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($job_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="job_no_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="job_no_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($insurance_AE == 1)
                              {
                                echo '<input type="checkbox" name="insurance_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="insurance_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($decl_val_carriage_AE == 1)
                              {
                                echo '<input type="checkbox" name="decl_val_carriage_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="decl_val_carriage_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($decl_val_custom_AE == 1)
                              {
                                echo '<input type="checkbox" name="decl_val_custom_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="decl_val_custom_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($nominaton_AE == 1)
                              {
                                echo '<input type="checkbox" name="nominaton_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="nominaton_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($handling_info_AE == 1)
                              {
                                echo '<input type="checkbox" name="handling_info_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="handling_info_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($other_info_AE == 1)
                              {
                                echo '<input type="checkbox" name="other_info_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="other_info_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($account_info_AE == 1)
                              {
                                echo '<input type="checkbox" name="account_info_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="account_info_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($said_chain_AE == 1)
                              {
                                echo '<input type="checkbox" name="said_chain_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="said_chain_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($ref_no_AE == 1)
                              {
                                echo '<input type="checkbox" name="ref_no_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ref_no_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($td_flash_AE == 1)
                              {
                                echo '<input type="checkbox" name="td_flash_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="td_flash_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($clearing_agent_AE == 1)
                              {
                                echo '<input type="checkbox" name="clearing_agent_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="clearing_agent_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($spo_AE == 1)
                              {
                                echo '<input type="checkbox" name="spo_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="spo_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($freight_AE == 1)
                              {
                                echo '<input type="checkbox" name="freight_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="freight_AE" > <label>Credit Days</label> <br>';
                              }
                             
                              if ($due_carrier_AE == 1)
                              {
                                echo '<input type="checkbox" name="due_carrier_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="due_carrier_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($due_agent_AE == 1)
                              {
                                echo '<input type="checkbox" name="due_agent_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="due_agent_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($awb_total_AE == 1)
                              {
                                echo '<input type="checkbox" name="awb_total_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="awb_total_AE" > <label>Credit Days</label> <br>';
                              }
                              if ($payable_airline_AE == 1)
                              {
                                echo '<input type="checkbox" name="payable_airline_AE" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="payable_airline_AE" > <label>Credit Days</label> <br>';
                              }
                              // if ($due_agent_AE_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="due_agent_AE_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="due_agent_AE_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($buyRate_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="buyRate_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="buyRate_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($payable_airline_AE == 1)
                              // {
                              //   echo '<input type="checkbox" name="payable_airline_AE" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="payable_airline_AE" > <label>Credit Days</label> <br>';
                              // }
                              // if ($buyAmountPKR_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="buyAmountPKR_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="buyAmountPKR_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($diffAmount_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="diffAmount_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="diffAmount_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($diffAmountPKR_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="diffAmountPKR_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="diffAmountPKR_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitRate_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitRate_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitRate_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitAmount_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitAmount_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitAmount_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitAmountPKR_P_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitAmountPKR_P_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitAmountPKR_P_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($buyRate_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="buyRate_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="buyRate_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($buyAmount_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="buyAmount_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="buyAmount_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($buyAmountPKR_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="buyAmountPKR_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="buyAmountPKR_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($sellRate_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="sellRate_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="sellRate_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($sellAmount_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="sellAmount_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="sellAmount_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($sellAmountPKR_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="sellAmountPKR_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="sellAmountPKR_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($diffAmount_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="diffAmount_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="diffAmount_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($diffAmountPKR_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="diffAmountPKR_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="diffAmountPKR_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitRate_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitRate_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitRate_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitAmount_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitAmount_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitAmount_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($profitAmountPKR_F_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="profitAmountPKR_F_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="profitAmountPKR_F_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($payableAmount_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="payableAmount_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="payableAmount_AI" > <label>Credit Days</label> <br>';
                              // }
                              // if ($payableAmountPKR_AI == 1)
                              // {
                              //   echo '<input type="checkbox" name="payableAmountPKR_AI" checked> <label>Credit Days</label> <br>';
                              // }
                              // else
                              // {
                              //   echo '<input type="checkbox" name="payableAmountPKR_AI" > <label>Credit Days</label> <br>';
                              // }
                             
                              
                              
                              
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
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="dest_print.php" target="_blank"> Print</a></button></li>
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
                                                            $status_type = $row['status_type'];
                       

                                                            $id = $row['SrNo'];
                                                // $due_agent_AE = $row['due_agent_AE'];
                                                // $buyRate_P = $row['buyRate_P'];
                                                // $payable_airline_AE = $row['payable_airline_AE'];
                                                // $buyAmountPKR_P = $row['buyAmountPKR_P'];
                                                // $diffAmount_P = $row['diffAmount_P'];
                                                // $diffAmountPKR_P = $row['diffAmountPKR_P'];
                                                // $profitRate_P = $row['profitRate_P'];
                                                // $profitAmount_P = $row['profitAmount_P'];
                                                // $profitAmountPKR_P = $row['profitAmountPKR_P'];
                                                // $buyRate_F = $row['buyRate_F'];
                                                // $buyAmount_F = $row['buyAmount_F'];
                                                // $buyAmountPKR_F = $row['buyAmountPKR_F'];
                                                // $sellRate_F = $row['sellRate_F'];
                                                // $sellAmount_F = $row['sellAmount_F'];
                                                // $sellAmountPKR_F = $row['sellAmountPKR_F'];
                                                // $diffAmount_F = $row['diffAmount_F'];
                                                // $diffAmountPKR_F = $row['diffAmountPKR_F'];
                                                // $profitRate_F = $row['profitRate_F'];
                                                // $profitAmount_F = $row['profitAmount_F'];
                                                // $profitAmountPKR_F = $row['profitAmountPKR_F'];
                                                // $payableAmount = $row['payableAmount'];
                                                // $payableAmountPKR = $row['payableAmountPKR'];

                                                // $id = $row['SrNo'];

                                                        ?>
                                                      <tr id="<?php echo $SrNo; ?>">
                                                        <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $row['SrNo'] .' " /></td>'; ?>
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
                                                            <td><?php echo $flight_no_b_date_AE ; ?></td>
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

                                                           <!--  <?php
                                                            if ($due_agent_AE_AI  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $due_agent_AE ; ?></td>
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
                                                            if ($payable_airline_AE  == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $payable_airline_AE ; ?></td>
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
                                                            <td><?php echo $freight ; ?></td>

 -->
                                  <td><?php echo $status_type ?></td>
                                  <td><a href="dataentry_of_mawb_air_export_View.php?id=<?php echo $row['SrNo']; ?>">View</td>
                                  <td><a href="dataentry_of_mawb_air_export_Edit.php?id=<?php echo $row['SrNo']; ?>">Edit</td>
                                 
                                     <?php
                                    if ($row['status_type'] == "Active")
                                    {
                                    ?>
                                    <td><a href="deleteAE_Code.php?id=<?php echo $row['SrNo']; ?>" >Deactive</td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row['status_type'] == "Deactive")
                                    {
                                    ?>
                                    <td><a href="deleteAE_CodeI.php?id=<?php echo $row['SrNo']; ?>" >Active</td>
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

  $(document).ready(function() {
    $('#usrtble').DataTable({
       "scrollX": true
   });
} );

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
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
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

<!-- <script>
$(document).ready(function(){
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
  });
});
</script> -->

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