<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

// Searching for Authorization ID of logged in user
$userID = $_SESSION['user'];
$selectAuthID = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowAuthID = mysqli_fetch_array($selectAuthID))
{
  $rowAuthID = $rowAuthID['Auth_ID'];
}

// Fetching the Authorization details
$selectAuthDet = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$rowAuthID' ");
while ($rowAuthDet = mysqli_fetch_array($selectAuthDet))
{
  $siView = $rowAuthDet['siView'];
  $seView = $rowAuthDet['seView'];
  $aiView = $rowAuthDet['aiView'];
  $aeView = $rowAuthDet['aeView'];
}

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM saleorders WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE saleorders SET status_type='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: saleorders.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM saleorders WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status_type'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE saleorders SET status_type='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: saleorders.php");
  }
}


if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $SoNo_cus = 0;
  $saleCust_cus = 0;
  $conPerson_cus = 0;
  $conRef_cus = 0;
  $saleCurr_cus = 0;
  $saleStatus_cus = 0;
  $postDate_cus = 0;
  $docDate_cus = 0;
  $agentParty_cus = 0;
  $foreignAgent_cus = 0;
  $saleNom_cus = 0;
  $saleNom_cus = 0;
  $mawbNo_cus = 0;
  $mawbDate_cus = 0;
  $mblNo_cus = 0;
  $mblDate_cus = 0;
  $salePcs_cus = 0;
  $saleCBM_cus = 0;
  $grsWeight_cus = 0;
  $chWeight_cus = 0;
  $saleRate_cus = 0;
  $totalFreight_cus = 0;
  $goodsDesc_cus = 0;
  $saleDest_cus = 0;
  $shipLine_cus = 0;
  $saleVessel_cus = 0;
  $saleVoyage_cus = 0;
  $flightNo_cus = 0;
  $flightDate_cus = 0;
  $saleRem_cus = 0;
  $totalBefDisc_cus = 0;
  $saleDisc_cus = 0;
  $saleTax_cus = 0;
  $saleTotal_cus = 0;
  $shipApp_O_cus = 0;
  $appReason_O_cus = 0;
  $shipApp_F_cus = 0;
  $appReason_F_cus = 0;
  $saleLength_cus = 0;
  $saleWidth_cus = 0;
  $saleHight_cus = 0;
  $saleVolWt_cus = 0;
  $saleType_cus = 0;
  $saleComm_cus = 0;
  $saleOrigin_cus = 0;
  $saleReason_cus = 0;
  // $spo_AE = 0;
  // $freight_AE = 0;
  // $due_carrier_AE = 0;
  // $due_agent_AE = 0;
  // $awb_total_AE = 0;
  // $payable_airline_AE = 0;


  // Setting variables if 1
  // if (isset($_POST['cmpType_CM']))
  // {
  //   $cmpType_CM = 1;
  // }
  if (isset($_POST['SoNo_cus']))
  {
    $SoNo_cus = 1;
  }
  if (isset($_POST['saleCust_cus']))
  {
    $saleCust_cus = 1;
  }
  if (isset($_POST['conPerson_cus']))
  {
    $conPerson_cus = 1;
  }
  if (isset($_POST['conRef_cus']))
  {
    $conRef_cus = 1;
  }
  
  if (isset($_POST['saleCurr_cus']))
  {
    $saleCurr_cus = 1;
  }
  if (isset($_POST['saleStatus_cus']))
  {
    $saleStatus_cus = 1;
  }
  if (isset($_POST['postDate_cus']))
  {
    $postDate_cus = 1;
  }
  if (isset($_POST['docDate_cus']))
  {
    $docDate_cus = 1;
  }
  if (isset($_POST['agentParty_cus']))
  {
    $agentParty_cus = 1;
  }
  if (isset($_POST['foreignAgent_cus']))
  {
    $foreignAgent_cus = 1;
  }
  if (isset($_POST['saleNom_cus']))
  {
    $saleNom_cus = 1;
  }
  // if (isset($_POST['party_name_AI']))
  // {
  //   $party_name_AI = 1;
  // }
  if (isset($_POST['saleNom_cus']))
  {
    $saleNom_cus = 1;
  }
  if (isset($_POST['mawbNo_cus']))
  {
    $mawbNo_cus = 1;
  }
  if (isset($_POST['mawbDate_cus']))
  {
    $mawbDate_cus = 1;
  }
  if (isset($_POST['mblNo_cus']))
  {
    $mblNo_cus = 1;
  }
  if (isset($_POST['mblDate_cus']))
  {
    $mblDate_cus = 1;
  }
  if (isset($_POST['salePcs_cus']))
  {
    $salePcs_cus = 1;
  }
  if (isset($_POST['saleCBM_cus']))
  {
    $saleCBM_cus = 1;
  }
  if (isset($_POST['grsWeight_cus']))
  {
    $grsWeight_cus = 1;
  }
  if (isset($_POST['chWeight_cus']))
  {
    $chWeight_cus = 1;
  }
  if (isset($_POST['saleRate_cus']))
  {
    $saleRate_cus  = 1;
  }
  if (isset($_POST['totalFreight_cus']))
  {
    $totalFreight_cus = 1;
  }
  if (isset($_POST['goodsDesc_cus']))
  {
    $goodsDesc_cus = 1;
  }
  if (isset($_POST['saleDest_cus']))
  {
    $saleDest_cus = 1;
  }
  if (isset($_POST['shipLine_cus']))
  {
    $shipLine_cus = 1;
  }
  if (isset($_POST['saleVessel_cus']))
  {
    $saleVessel_cus = 1;
   }
  if (isset($_POST['saleVoyage_cus']))
  {
    $saleVoyage_cus = 1;
  }
  
  if (isset($_POST['flightNo_cus']))
  {
    $flightNo_cus = 1;
  }
  if (isset($_POST['flight_no_a_date_AE']))
  {
    $flight_no_a_date_AE = 1;
  }
  if (isset($_POST['flightDate_cus']))
  {
    $flightDate_cus = 1;
  }
  if (isset($_POST['saleRem_cus']))
  {
    $saleRem_cus = 1;
  }
  if (isset($_POST['totalBefDisc_cus']))
  {
    $totalBefDisc_cus = 1;
  }
  if (isset($_POST['saleDisc_cus']))
  {
    $saleDisc_cus = 1;
  }
   if (isset($_POST['saleTax_cus']))
  {
    $saleTax_cus = 1;
  }
  if (isset($_POST['saleTotal_cus']))
  {
    $saleTotal_cus = 1;
  }
  if (isset($_POST['shipApp_O_cus']))
  {
    $shipApp_O_cus = 1;
  }
  if (isset($_POST['appReason_O_cus']))
  {
    $appReason_O_cus = 1;
  }
  if (isset($_POST['shipApp_F_cus']))
  {
    $shipApp_F_cus = 1;
  }
  if (isset($_POST['appReason_F_cus']))
  {
    $appReason_F_cus = 1;
  }
  if (isset($_POST['saleLength_cus']))
  {
    $saleLength_cus = 1;
  }
  if (isset($_POST['saleWidth_cus']))
  {
    $saleWidth_cus = 1;
  }
  if (isset($_POST['saleHight_cus']))
  {
    $saleHight_cus = 1;
  }
  if (isset($_POST['saleVolWt_cus']))
  {
    $saleVolWt_cus = 1;
  }
  if (isset($_POST['saleType_cus']))
  {
    $saleType_cus = 1;
  }
 
 if (isset($_POST['saleReason_cus']))
  {
    $saleReason_cus = 1;
  }
 
 if (isset($_POST['saleOrigin_cus']))
  {
    $saleOrigin_cus = 1;
  }
 
 if (isset($_POST['saleComm_cus']))
  {
    $saleComm_cus  = 1;
  }
 

  $updateUM = mysqli_query($con, "UPDATE saleorders_cuz SET SoNo_cus='$SoNo_cus', saleCust_cus='$saleCust_cus', conPerson_cus='$conPerson_cus', conRef_cus='$conRef_cus', saleCurr_cus='$saleCurr_cus',saleStatus_cus='$saleStatus_cus', postDate_cus='$postDate_cus', docDate_cus='$docDate_cus', agentParty_cus ='$agentParty_cus', foreignAgent_cus='$foreignAgent_cus', saleNom_cus='$saleNom_cus', mawbNo_cus='$mawbNo_cus', mawbDate_cus='$mawbDate_cus', mblNo_cus='$mblNo_cus', mblDate_cus='$mblDate_cus', salePcs_cus='$salePcs_cus', saleCBM_cus='$saleCBM_cus', grsWeight_cus='$grsWeight_cus',saleComm_cus='$saleComm_cus', chWeight_cus='$chWeight_cus', saleRate_cus='$saleRate_cus', totalFreight_cus='$totalFreight_cus', goodsDesc_cus='$goodsDesc_cus',saleOrigin_cus='$saleOrigin_cus', saleDest_cus='$saleDest_cus', shipLine_cus='$shipLine_cus', saleVessel_cus='$saleVessel_cus',saleVoyage_cus='$saleVoyage_cus',flightNo_cus='$flightNo_cus',flightDate_cus='$flightDate_cus',saleRem_cus='$saleRem_cus',totalBefDisc_cus='$totalBefDisc_cus',saleDisc_cus='$saleDisc_cus',saleTax_cus='$saleTax_cus',saleTotal_cus='$saleTotal_cus',saleReason_cus='$saleReason_cus',shipApp_O_cus='$shipApp_O_cus',appReason_O_cus='$appReason_O_cus',shipApp_F_cus='$shipApp_F_cus',appReason_F_cus='$appReason_F_cus',saleLength_cus='$saleLength_cus',saleWidth_cus='$saleWidth_cus',saleHight_cus='$saleHight_cus',saleVolWt_cus='$saleVolWt_cus',saleType_cus='$saleType_cus' WHERE SrNo_cus='1' ") or die(mysqli_error($con));

  
  // echo $sql; //Remove after testing
  $search = " SELECT * FROM saleorders ";
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
 $search = " SELECT * FROM saleorders ";
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
    $search = " SELECT * FROM saleorders ";
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
  $search = " SELECT * FROM saleorders ";
    $searchQuery = mysqli_query($con, $search);
  // header('Location: usertable.php');

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: so_air_export_table_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("so_air_export_table_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("so_air_export_table_pdf.php?searchRecord=$searchRecord");</script>';
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

  /*if ($siView == "1" && $seView == "1" && $aiView == "1" && $aeView == "1")
  {
    $search = " SELECT * FROM saleorders ";
  }
  else if ($siView == "1")
  {
    $search = " SELECT * FROM saleorders WHERE saleType='Sea Import' ";
  }
  else if ($seView == "1")
  {
    $search = " SELECT * FROM saleorders WHERE saleType='Sea Export' ";
  }
  else if ($aiView == "1")
  {
    $search = " SELECT * FROM saleorders WHERE saleType='Air Import' ";
  }
  else if ($aeView == "1")
  {
    $search = " SELECT * FROM saleorders WHERE saleType='Air Export' ";
  }*/

 $search = " SELECT * FROM saleorders ";
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">Operations</a>
          <a href="so_air_export_table.php" class="btn btn-info active">Sale Orders</a>
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

           <?php include 'sidebar_widgets/ae_advanced_search_widget.php'; ?>
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
          $selectUM = mysqli_query($con, 'SELECT * FROM saleorders_cuz');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $SrNo_cus = $rowUM['SrNo_cus'];
            $SoNo_cus = $rowUM['SoNo_cus'];
            $saleCust_cus = $rowUM['saleCust_cus'];
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

                              if ($SoNo_cus == 1)
                              {
                                echo '<input type="checkbox" name="SoNo_cus" checked> <label>Sales Order No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="SoNo_cus" > <label>Sales Order No.</label> <br>';
                              }

                              if ($saleCust_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleCust_cus" checked> <label> Customer </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleCust_cus" > <label> Customer </label> <br>';
                              }

                              if ($conPerson_cus == 1)
                              {
                                echo '<input type="checkbox" name="conPerson_cus" checked> <label>Contact Person </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="conPerson_cus" > <label> Contact Person </label> <br>';
                              }

                              if ($conRef_cus == 1)
                              {
                                echo '<input type="checkbox" name="conRef_cus" checked> <label>Contact Ref. No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="conRef_cus" > <label>Contact Ref. No. </label> <br>';
                              }

                              if ($saleCurr_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleCurr_cus" checked> <label>Currency</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleCurr_cus" > <label>Currency</label> <br>';
                              }

                              if ($saleStatus_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleStatus_cus" checked> <label>Sale Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleStatus_cus" > <label>Sale Status</label> <br>';
                              }
                              
                              if ($postDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="postDate_cus" checked> <label> Posting Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="postDate_cus" > <label>Posting Date</label> <br>';
                              }

                              if ($docDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="docDate_cus" checked> <label>Document Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="docDate_cus" > <label>Document Date</label> <br>';
                              }

                              if ($agentParty_cus == 1)
                              {
                                echo '<input type="checkbox" name="agentParty_cus" checked> <label>Agent Party</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="agentParty_cus" > <label>Agent Party</label> <br>';
                              }

                              if ($foreignAgent_cus == 1)
                              {
                                echo '<input type="checkbox" name="foreignAgent_cus" checked> <label>Foreign Agent</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="foreignAgent_cus" > <label>Foreign Agent</label> <br>';
                              }

                              if ($saleNom_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleNom_cus" checked> <label>Nomination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleNom_cus" > <label>Nomination</label> <br>';
                              }

                              if ($saleSPO_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleSPO_cus" checked> <label>SPO</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleSPO_cus" > <label>SPO</label> <br>';
                              }

                              if ($mawbNo_cus == 1)
                              {
                                echo '<input type="checkbox" name="mawbNo_cus" checked> <label>MAWB No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mawbNo_cus" > <label>MAWB No.</label> <br>';
                              }

                              if ($mawbDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="mawbDate_cus" checked> <label>MAWB Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mawbDate_cus" > <label>MAWB Date</label> <br>';
                              }

                              if ($mblNo_cus == 1)
                              {
                                echo '<input type="checkbox" name="mblNo_cus" checked> <label>MBL No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mblNo_cus" > <label>MBL No.</label> <br>';
                              }

                              echo '</div>';

                              ///////////////////////////////////////////////////////////////////

                              echo '<div class="col-md-4">';

                              if ($mblDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="mblDate_cus" checked> <label>MBL Date </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="mblDate_cus" > <label>MBL Date </label> <br>';
                              }

                              echo '</div>';

                              if ($salePcs_cus == 1)
                              {
                                echo '<input type="checkbox" name="salePcs_cus" checked> <label>Pcs.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="salePcs_cus" > <label>Pcs.</label> <br>';
                              }

                              if ($saleCBM_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleCBM_cus" checked> <label>CBM</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleCBM_cus" > <label>CBM</label> <br>';
                              }

                              if ($grsWeight_cus == 1)
                              {
                                echo '<input type="checkbox" name="grsWeight_cus" checked> <label>Gross Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="grsWeight_cus" > <label>Gross Weight</label> <br>';
                              }

                              if ($saleComm_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleComm_cus" checked> <label>Commodity</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleComm_cus" > <label>Commodity</label> <br>';
                              }

                              if ($chWeight_cus == 1)
                              {
                                echo '<input type="checkbox" name="chWeight_cus" checked> <label>Charge Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="chWeight_cus" > <label>Charge Weight</label> <br>';
                              }

                              if ($saleRate_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleRate_cus" checked> <label>Sale Rate</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleRate_cus" > <label>Sale Rate</label> <br>';
                              }

                              if ($totalFreight_cus == 1)
                              {
                                echo '<input type="checkbox" name="totalFreight_cus" checked> <label>Total Freight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="totalFreight_cus" > <label>Total Freight</label> <br>';
                              }

                              if ($goodsDesc_cus == 1)
                              {
                                echo '<input type="checkbox" name="goodsDesc_cus" checked> <label>Goods Description</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="goodsDesc_cus" > <label>Goods Description</label> <br>';
                              }

                              if ($saleOrigin_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleOrigin_cus" checked> <label>Origin</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleOrigin_cus" > <label>Origin</label> <br>';
                              }
                              
                              if ($saleDest_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleDest_cus" checked> <label>Destination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleDest_cus" > <label>Destination</label> <br>';
                              }

                              if ($shipLine_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipLine_cus" checked> <label>Shipping Line</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipLine_cus" > <label>Shipping Line</label> <br>';
                              }
                              
                              if ($saleVessel_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleVessel_cus" checked> <label>Vessel</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleVessel_cus" > <label>Vessel</label> <br>';
                              }

                              if ($saleVoyage_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleVoyage_cus" checked> <label>Voyage</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleVoyage_cus" > <label>Voyage</label> <br>';
                              }

                              if ($flightNo_cus == 1)
                              {
                                echo '<input type="checkbox" name="flightNo_cus" checked> <label>Flight No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flightNo_cus" > <label>Flight No.</label> <br>';
                              }

                              if ($flightDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="flightDate_cus" checked> <label>Flight Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flightDate_cus" > <label>Flight Date</label> <br>';
                              }

                              if ($saleRem_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleRem_cus" checked> <label>Remarks</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleRem_cus" > <label>Remarks</label> <br>';
                              }

                              echo '</div>';

                              ////////////////////////////////////////////

                              echo '<div class="col-md-4">';

                              if ($totalBefDisc_cus == 1)
                              {
                                echo '<input type="checkbox" name="totalBefDisc_cus" checked> <label>Total Bef. Disc.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="totalBefDisc_cus" > <label>Total Bef. Disc.</label> <br>';
                              }

                              if ($saleDisc_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleDisc_cus" checked> <label>Sale Disc.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleDisc_cus" > <label>Sale Disc.</label> <br>';
                              }

                              if ($saleTax_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleTax_cus" checked> <label>Sale Tax</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleTax_cus" > <label>Sale Tax</label> <br>';
                              }

                              if ($saleTotal_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleTotal_cus" checked> <label>Sale Total</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleTotal_cus" > <label>Sale Total</label> <br>';
                              }

                              if ($saleReason_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleReason_cus" checked> <label>Sale Reason</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleReason_cus" > <label>Sale Reason</label> <br>';
                              }

                             






                              if ($saleLength_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleLength_cus" checked> <label>Sale Length</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleLength_cus" > <label>Sale Length</label> <br>';
                              }

                              if ($saleWidth_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleWidth_cus" checked> <label>Sale Width</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleWidth_cus" > <label>Sale Width</label> <br>';
                              }

                              if ($saleHight_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleHight_cus" checked> <label>Sale Height</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleHight_cus" > <label>Sale Height</label> <br>';
                              }

                              if ($saleVolWt_cus == 1)
                              {
                                echo '<input type="checkbox" name="saleVolWt_cus" checked> <label>Volumetic Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="saleVolWt_cus" > <label>Volumetic Weight</label> <br>';
                              }

                              echo '</div>';
                              
                              
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
                  <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="dest_print.php" target="_blank"> Print</a></button></li> -->
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                  <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li>

                </ul>
              </div>
            </div>
        
      <table  id="usrtble" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                  <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                      <!-- <?php
                                         if ($SrNo == 1)
                                          {
                                      ?> 


                                  <th>Sale Order No</th>
                                  <?php
                                  }
                                  ?> -->

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
                                                            // $td_flash = $row['td_flash'];
                                                            // $clearing_agent = $row['clearing_agent'];
                                                            // $spo = $row['spo'];
                                                            // $freight = $row['freight'];
                                                            // $due_carrier = $row['due_carrier'];
                                                            // $due_agent = $row['due_agent'];
                                                            // $awb_total = $row['awb_total'];
                                                            // $payable_airline = $row['payable_airline'];
                                                            // $status_type = $row['status_type'];
                       

                                                            // $id = $row['SrNo'];
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

                                                $id = $row['SrNo'];

                                                        ?>
                                  <tr id="<?php echo $id; ?>">
                                    <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $row['SrNo'] .' " /></td>'; ?>
                                    <!--  <?php
                                                            if ($SrNo == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $so_no; ?></a></td>
                                                            <?php
                                                            }
                                                            ?> -->

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
                                                           
                                                            <td></td>
                                  <td><a href="sales_order_air_export_Edit.php?soNo=<?php echo $row['SrNo']; ?>">View</td>
                                  <td><a href="sales_order_air_export_Edit.php?soNo=<?php echo $row['SrNo']; ?>">Edit</td>
                                  <td></td>
                                    
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