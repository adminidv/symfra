<?php

include 'manage/connection.php';
include("manage/session.php");
$advSearch = 'Hide';
$ribbon = 'Default';
$subRibbon = 'showUser';
$Quick = 'UnHide';
$Quickhr = '';

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $cmpType_CM = 0;
  $legCode_CM = 0;
  $newCode_CM = 0;
  $cmpTitle_CM = 0;
  $cmpStreet_CM = 0;
  $cmpCity_CM = 0;
  $cmpCountry_CM = 0;
  $telCode_CM = 0;
  $telNumber_CM = 0;
  $cmpWebsite_CM = 0;
  $cmpEmail_CM = 0;
  $taxType_CM = 0;
  $taxNo_CM = 0;
  $seaImport_CM = 0;
  $airImport_CM = 0;
  $seaExport_CM = 0;
  $airExport_CM = 0;
  $repName_CM = 0;
  $repDesig_CM = 0;
  $repOffCell_CM = 0;
  $repPerCell_CM = 0;
  $repEmail_CM = 0;
  $fnBnkName_CM = 0;
  $fnBnkBr_CM = 0;
  $fnCity_CM = 0;
  $fnCountry_CM = 0;
  $fnIban_CM = 0;
  $fnNonIban_CM = 0;
  $fnCrDays_CM = 0;
  $fnCrAmount_CM = 0;
  $cmpStatus_CM = 0;

  // Setting variables if 1
  if (isset($_POST['cmpType_CM']))
  {
    $cmpType_CM = 1;
  }
  if (isset($_POST['legCode_CM']))
  {
    $legCode_CM = 1;
  }
  if (isset($_POST['newCode_CM']))
  {
    $newCode_CM = 1;
  }
  if (isset($_POST['cmpTitle_CM']))
  {
    $cmpTitle_CM = 1;
  }
  if (isset($_POST['cmpStreet_CM']))
  {
    $cmpStreet_CM = 1;
  }
  if (isset($_POST['cmpCity_CM']))
  {
    $cmpCity_CM = 1;
  }
  if (isset($_POST['cmpCountry_CM']))
  {
    $cmpCountry_CM = 1;
  }
  if (isset($_POST['telCode_CM']))
  {
    $telCode_CM = 1;
  }
  if (isset($_POST['telNumber_CM']))
  {
    $telNumber_CM = 1;
  }
  if (isset($_POST['cmpWebsite_CM']))
  {
    $cmpWebsite_CM = 1;
  }
  if (isset($_POST['cmpEmail_CM']))
  {
    $cmpEmail_CM = 1;
  }
  if (isset($_POST['taxType_CM']))
  {
    $taxType_CM = 1;
  }
  if (isset($_POST['taxNo_CM']))
  {
    $taxNo_CM = 1;
  }
  if (isset($_POST['seaImport_CM']))
  {
    $seaImport_CM = 1;
  }
  if (isset($_POST['airImport_CM']))
  {
    $airImport_CM = 1;
  }
  if (isset($_POST['seaExport_CM']))
  {
    $seaExport_CM = 1;
  }
  if (isset($_POST['airExport_CM']))
  {
    $airExport_CM = 1;
  }
  if (isset($_POST['repName_CM']))
  {
    $repName_CM = 1;
  }
  if (isset($_POST['repDesig_CM']))
  {
    $repDesig_CM = 1;
  }
  if (isset($_POST['repOffCell_CM']))
  {
    $repOffCell_CM = 1;
  }
  if (isset($_POST['repPerCell_CM']))
  {
    $repPerCell_CM = 1;
  }
  if (isset($_POST['repEmail_CM']))
  {
    $repEmail_CM = 1;
  }
  if (isset($_POST['fnBnkName_CM']))
  {
    $fnBnkName_CM = 1;
  }
  if (isset($_POST['fnBnkBr_CM']))
  {
    $fnBnkBr_CM = 1;
  }
  if (isset($_POST['fnCity_CM']))
  {
    $fnCity_CM = 1;
  }
  if (isset($_POST['fnCountry_CM']))
  {
    $fnCountry_CM = 1;
  }
  if (isset($_POST['fnIban_CM']))
  {
    $fnIban_CM = 1;
  }
  if (isset($_POST['fnNonIban_CM']))
  {
    $fnNonIban_CM = 1;
  }
  if (isset($_POST['fnCrDays_CM']))
  {
    $fnCrDays_CM = 1;
  }
  if (isset($_POST['fnCrAmount_CM']))
  {
    $fnCrAmount_CM = 1;
  }
  if (isset($_POST['cmpStatus_CM']))
  {
    $cmpStatus_CM = 1;
   }
  // if (isset($_POST['userDOL_UM']))
  // {
  //   $userDOL_UM = 1;
  // }
  // if (isset($_POST['userDOL_UM']))
  // {
  //   $userDOL_UM = 1;
  // }
  // if (isset($_POST['userDOL_UM']))
  // {
  //   $userDOL_UM = 1;
  // }
  // if (isset($_POST['userDOL_UM']))
  // {
  //   $userDOL_UM = 1;
  // }
  // if (isset($_POST['userDOL_UM']))
  // {
  //   $userDOL_UM = 1;
  // }

  $updateUM = mysqli_query($con, "UPDATE  custmaster_cm SET cmpType_CM = '$cmpType_CM', legCode_CM='$legCode_CM', newCode_CM='$newCode_CM', cmpTitle_CM='$cmpTitle_CM', cmpStreet_CM='$cmpStreet_CM', cmpCity_CM='$cmpCity_CM', cmpCountry_CM='$cmpCountry_CM', telCode_CM='$telCode_CM', telNumber_CM='$telNumber_CM', cmpWebsite_CM='$cmpWebsite_CM', cmpEmail_CM='$cmpEmail_CM', taxType_CM='$taxType_CM', taxNo_CM = '$taxNo_CM', seaImport_CM='$seaImport_CM', airImport_CM='$airImport_CM', seaExport_CM='$seaExport_CM', airExport_CM='$airExport_CM', repName_CM='$repName_CM', repDesig_CM='$repDesig_CM', repOffCell_CM='$repOffCell_CM', repPerCell_CM='$repPerCell_CM', repEmail_CM='$repEmail_CM', fnBnkName_CM='$fnBnkName_CM', fnBnkBr_CM='$fnBnkBr_CM', fnCity_CM='$fnCity_CM', fnCountry_CM='$fnCountry_CM', fnIban_CM='$fnIban_CM', fnNonIban_CM='$fnNonIban_CM', fnCrDays_CM='$fnCrDays_CM', fnCrAmount_CM='$fnCrAmount_CM', cmpStatus_CM='$cmpStatus_CM'  WHERE SrNo_CM= '1' ");

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users` ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  //     $search = " SELECT * FROM  custmaster "
  $search = " SELECT * FROM  custmaster WHERE partyType='cust' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);
}

else if(isset($_POST["btnActivate"]))
{
  if (isset($_POST["user_check"]))
  {
    $id = $_POST['user_check'];
    // echo count($id);
    while (list($key, $val) = @each ($id))
    {
      // mysqli_query($con, "UPDATE custmaster SET cmpStatus= '2' WHERE newCode = '$val' ");
      mysqli_query($con, "UPDATE custmaster SET cmpStatus='Active' WHERE newCode = '$val' ");
      // header("Location: ");
    }

    $clause = " WHERE ";//Initial clause
    $searchRecord="SELECT * FROM `users` WHERE userBr='$userBr' ";

        // if user is giving the middle name
        if(!empty($_POST['user_mName']))
        {
            $user_mName = $_POST['user_mName'];
            $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
            $user_mName = 1;
        }
        else
        {
          $user_mName = 0;
        }

        // if user is giving the first name
        if(!empty($_POST['user_fName']))
        {
            if($user_mName == 1)
            {
              $clause = " AND ";
            }
            $user_fName = $_POST['user_fName'];
            $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
            $fNameStatus = 1;
        }
        else
        {
          $fNameStatus = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['dept_list']))
        {
            if($fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['dept_list'] as $c)
            {
                if(!empty($c)){
                    $searchRecord .= $clause."`dept_ID` = '{$c}'";
                    $clause = " OR ";
                }   
            }
            $deptStatus = 1;
        }
        else
        {
          $deptStatus = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['desig_list']))
        {
            if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['desig_list'] as $d)
            {
                if(!empty($d))
                {
                    $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                    $clause = " OR ";
                }   
            }
        }
        else
        {
          // echo "Nothing Selected.";
        }
    // echo $sql; //Remove after testing
    $search = " SELECT * FROM  custmaster WHERE partyType='cust' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to activate.");'; 
    echo 'window.location.href = "master_customer_table.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnDeactivate"]))
{
  if (isset($_POST["user_check"]))
  {
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      // mysqli_query($con, "UPDATE custmaster SET cmpStatus= '2' WHERE newCode = '$val' ");
      mysqli_query($con, "UPDATE custmaster SET cmpStatus='Deactive' WHERE newCode = '$val' ");
    }

    $clause = " WHERE ";//Initial clause
    $searchRecord="SELECT * FROM `users` ";

        // if user is giving the middle name
        if(!empty($_POST['user_mName']))
        {
            $user_mName = $_POST['user_mName'];
            $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
            $user_mName = 1;
        }
        else
        {
          $user_mName = 0;
        }

        // if user is giving the first name
        if(!empty($_POST['user_fName']))
        {
            if($user_mName == 1)
            {
              $clause = " AND ";
            }
            $user_fName = $_POST['user_fName'];
            $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
            $fNameStatus = 1;
        }
        else
        {
          $fNameStatus = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['dept_list']))
        {
            if($fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['dept_list'] as $c)
            {
                if(!empty($c)){
                    $searchRecord .= $clause."`dept_ID` = '{$c}'";
                    $clause = " OR ";
                }   
            }
            $deptStatus = 1;
        }
        else
        {
          $deptStatus = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['desig_list']))
        {
            if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['desig_list'] as $d)
            {
                if(!empty($d))
                {
                    $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                    $clause = " OR ";
                }   
            }
        }
        else
        {
          // echo "Nothing Selected.";
        }
    // echo $sql; //Remove after testing
    $search = " SELECT * FROM  custmaster WHERE partyType='cust' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to deactivate.");'; 
    echo 'window.location.href = "master_customer_table.php";';
    echo '</script>';
  }

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
        mysqli_query($con, "UPDATE users SET dept_ID='$dept_ID_E', desig_ID='$desig_ID_E' WHERE user_ID = '$val' ");
      }

      else if ($dept_ID_E == "Select" && $desig_ID_E != "Select")
      {
        mysqli_query($con, "UPDATE users SET desig_ID='$desig_ID_E' WHERE user_ID = '$val' ");
      }

      else if ($dept_ID_E != "Select" && $desig_ID_E == "Select")
      {
        mysqli_query($con, "UPDATE users SET dept_ID='$dept_ID_E' WHERE user_ID = '$val' ");
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
    $searchRecord="SELECT * FROM `users` ";

        // if user is giving the middle name
        if(!empty($_POST['user_mName']))
        {
            $user_mName = $_POST['user_mName'];
            $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
            $user_mName = 1;
        }
        else
        {
          $user_mName = 0;
        }

        // if user is giving the first name
        if(!empty($_POST['user_fName']))
        {
            if($user_mName == 1)
            {
              $clause = " AND ";
            }
            $user_fName = $_POST['user_fName'];
            $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
            $fNameStatus = 1;
        }
        else
        {
          $fNameStatus = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['dept_list']))
        {
            if($fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['dept_list'] as $c)
            {
                if(!empty($c)){
                    $searchRecord .= $clause."`dept_ID` = '{$c}'";
                    $clause = " OR ";
                }   
            }
            $deptStatus = 1;
        }
        else
        {
          $deptStatus = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['desig_list']))
        {
            if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['desig_list'] as $d)
            {
                if(!empty($d))
                {
                    $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                    $clause = " OR ";
                }   
            }
        }
        else
        {
          // echo "Nothing Selected.";
        }
    $search = " SELECT * FROM custmaster WHERE partyType='cust' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "master_customer_table.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users` ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  $search = " SELECT * FROM  custmaster WHERE partyType='cust' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: excel_CM.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("csv_CM.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pdf_CM.php?search=$search");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users` ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_mName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $search = " SELECT * FROM  custmaster WHERE partyType='cust' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master Customer Table</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
  
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/add_user.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->

	<script src="js/jquery-3.3.1.js"></script>
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
#popupMEdit .modal-content {
    width: 700px;
}
#usrtble th div:focus {
   display: none;
}
#usrtble th:focus {
   display: none;
}

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
#tblebtn ul li {
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

.confirmTable-modal .Popup_bdy button {
    float: none;
}

.confirmTable2-modal .Popup_bdy button {
    float: none;
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
          <a href="Usermodules.php" class="btn btn-info">Financials</a>
          <a href="master_customer_table.php" class="btn btn-info active">Master Table</a>
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
           <?php include 'sidebar_widgets/user_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>
		
		<div class="Usertable">
		<div class="">
			<div class="col-md-12">
				<div class="user_create_btn">
          <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
          </div>
          <button type="button" id="btnNewUser" onclick="newUser();">Add New Customer</button>
				</div>
			</div>

			<div class="col-md-12">
				<div class="user_table-title">
					<h4>Master Customer Table</h4>
				</div>
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM custmaster_cm');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $cmpType_CM = $rowUM['cmpType_CM'];
            $legCode_CM = $rowUM['legCode_CM'];
            $newCode_CM = $rowUM['newCode_CM'];
            $cmpTitle_CM = $rowUM['cmpTitle_CM'];
            $cmpStreet_CM = $rowUM['cmpStreet_CM'];
            $cmpCity_CM = $rowUM['cmpCity_CM'];
            $cmpCountry_CM = $rowUM['cmpCountry_CM'];
            $telCode_CM = $rowUM['telCode_CM'];
            $telNumber_CM = $rowUM['telNumber_CM'];
            $cmpWebsite_CM = $rowUM['cmpWebsite_CM'];
            $cmpEmail_CM = $rowUM['cmpEmail_CM'];
            $taxType_CM = $rowUM['taxType_CM'];
            $taxNo_CM = $rowUM['taxNo_CM'];
            $seaImport_CM = $rowUM['seaImport_CM'];
            $airImport_CM = $rowUM['airImport_CM'];
            $seaExport_CM = $rowUM['seaExport_CM'];
            $airExport_CM = $rowUM['airExport_CM'];
            $repName_CM = $rowUM['repName_CM'];
            $repDesig_CM = $rowUM['repDesig_CM'];
            $repOffCell_CM = $rowUM['repOffCell_CM'];
            $repPerCell_CM = $rowUM['repPerCell_CM'];
            $repEmail_CM = $rowUM['repEmail_CM'];
            $fnBnkName_CM = $rowUM['fnBnkName_CM'];
            $fnBnkBr_CM = $rowUM['fnBnkBr_CM'];
            $fnCity_CM = $rowUM['fnCity_CM'];
            $fnCountry_CM = $rowUM['fnCountry_CM'];
            $fnIban_CM = $rowUM['fnIban_CM'];
            $fnNonIban_CM = $rowUM['fnNonIban_CM'];
            $fnCrDays_CM = $rowUM['fnCrDays_CM'];
            $fnCrAmount_CM = $rowUM['fnCrAmount_CM'];
            $cmpStatus_CM = $rowUM['cmpStatus_CM'];
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
                              if ($cmpType_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpType_CM" checked> <label>Company</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpType_CM" > <label>Company</label> <br>';
                              }

                              if ($legCode_CM == 1)
                              {
                                echo '<input type="checkbox" name="legCode_CM" checked> <label>Legacy Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="legCode_CM" > <label>Legacy Code</label> <br>';
                              }

                              if ($newCode_CM == 1)
                              {
                                echo '<input type="checkbox" name="newCode_CM" checked> <label>New Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="newCode_CM" > <label>New Code</label> <br>';
                              }

                              if ($cmpTitle_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpTitle_CM" checked> <label>Company Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpTitle_CM" > <label>Company Name</label> <br>';
                              }
                              if ($repOffCell_CM == 1)
                              {
                                echo '<input type="checkbox" name="repOffCell_CM" checked> <label> Office no. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repOffCell_CM" > <label> Office no.</label> <br>';
                              }

                              if ($repPerCell_CM == 1)
                              {
                                echo '<input type="checkbox" name="repPerCell_CM" checked> <label> Cell no.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repPerCell_CM" > <label> Cell no.</label> <br>';
                              }

                              if ($repEmail_CM == 1)
                              {
                                echo '<input type="checkbox" name="repEmail_CM" checked> <label>Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repEmail_CM" > <label>Email</label> <br>';
                              }
                              if ($fnCrDays_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnCrDays_CM" checked> <label>Finance Credit Limit</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCrDays_CM" > <label>Finance Credit Day</label> <br>';
                              }

                              if ($fnCrAmount_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnCrAmount_CM" checked> <label>Finance Credit Amount</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCrAmount_CM" > <label>Finance Credit Amount</label> <br>';
                              }
                              if ($repDesig_CM == 1)
                              {
                                echo '<input type="checkbox" name="repDesig_CM" checked> <label>Rep Desg</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repDesig_CM" > <label>Rep Desg</label> <br>';
                              }
                              if ($cmpStatus_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpStatus_CM" checked> <label>Company Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpStatus_CM" > <label>Company Status</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                               if ($fnBnkName_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnBnkName_CM" checked> <label>Bank Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnBnkName_CM" > <label>Bank Name</label> <br>';
                              }

                              if ($fnBnkBr_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnBnkBr_CM" checked> <label>Bank Branch </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnBnkBr_CM" > <label>Bank Branch </label> <br>';
                              }
                               if ($fnCity_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnCity_CM" checked> <label>Office City</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCity_CM" > <label>Office City</label> <br>';
                              }

                              if ($fnCountry_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnCountry_CM" checked> <label>Office Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCountry_CM" > <label>Office Country</label> <br>';
                              }

                              if ($cmpStreet_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpStreet_CM" checked> <label>Company Street</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpStreet_CM" > <label>Company Street</label> <br>';
                              }

                              if ($cmpCity_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpCity_CM" checked> <label>Company City</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpCity_CM" > <label>Company City</label> <br>';
                              }

                              if ($cmpCountry_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpCountry_CM" checked> <label>Company Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpCountry_CM" > <label>Company Country</label> <br>';
                              }

                              if ($telCode_CM == 1)
                              {
                                echo '<input type="checkbox" name="telCode_CM" checked> <label>Tel Code. .</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="telCode_CM" > <label>Tel Code.</label> <br>';
                              }
                              if ($airExport_CM == 1)
                              {
                                echo '<input type="checkbox" name="airExport_CM" checked> <label>Air Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airExport_CM" > <label>Air Export</label> <br>';
                              }

                              if ($repName_CM == 1)
                              {
                                echo '<input type="checkbox" name="repName_CM" checked> <label>Rep Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repName_CM" > <label>Rep Name</label> <br>';
                              }

                              
                              echo '</div>';

                              if ($telNumber_CM == 1)
                              {
                                echo '<input type="checkbox" name="telNumber_CM" checked> <label>Tel no.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="telNumber_CM" > <label>Tel no.</label> <br>';
                              }

                              if ($cmpWebsite_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpWebsite_CM" checked> <label>Company Website</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpWebsite_CM" > <label>Company Website</label> <br>';
                              }

                              if ($cmpEmail_CM == 1)
                              {
                                echo '<input type="checkbox" name="cmpEmail_CM" checked> <label>Company Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpEmail_CM" > <label>Company Email</label> <br>';
                              }

                              if ($taxType_CM == 1)
                              {
                                echo '<input type="checkbox" name="taxType_CM" checked> <label>Tax Type</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="taxType_CM" > <label>Tax Type</label> <br>';
                              }
                              if ($taxNo_CM == 1)
                              {
                                echo '<input type="checkbox" name="taxNo_CM" checked> <label>Tax no.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="taxNo_CM" > <label>Tax no.</label> <br>';
                              }

                              if ($seaImport_CM == 1)
                              {
                                echo '<input type="checkbox" name="seaImport_CM" checked> <label>Sea Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="seaImport_CM" > <label>Sea Import</label> <br>';
                              }
                              if ($airImport_CM == 1)
                              {
                                echo '<input type="checkbox" name="airImport_CM" checked> <label>Air Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airImport_CM" > <label>Air Import</label> <br>';
                              }

                              if ($seaExport_CM == 1)
                              {
                                echo '<input type="checkbox" name="seaExport_CM" checked> <label>Sea Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="seaExport_CM" > <label>Sea Export</label> <br>';
                              }
                              if ($fnIban_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnIban_CM" checked> <label>Finance Iban</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnIban_CM" > <label>Finance Iban</label> <br>';
                              }

                              if ($fnNonIban_CM == 1)
                              {
                                echo '<input type="checkbox" name="fnNonIban_CM" checked> <label>Finance NonIban</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnNonIban_CM" > <label>Finance NonIban</label> <br>';
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
                              echo '<option value="'.$rowDept_E['dept_ID'].'">'.$rowDept_E['dept_name'].'</option>';
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
                              echo '<option value="'.$rowDesig_E['Desig_ID'].'">'.$rowDesig_E['Desig_name'].'</option>';
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

          <div class="confirmTable-modal modal fade" id="activateTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to activate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnActivate">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>

          <div class="confirmTable-modal modal fade" id="deactivateTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to deactivate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDeactivate">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>

          <div class="confirmTable2-modal modal fade" id="deleteTable_C2" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Are you sure you want to delete this record?</p>
                        </div>
                        <button type="button" class="remove">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>
          
          <div class="leave-manage-sec-table widget_iner_box ">
            <div class="tbleDrpdown">
               <div id="tblebtn">
                  <ul>
                    <li><button type="button" id="myBtn"> <i class="fa fa-pencil"></i> Edit</button></li>
                    <li><button type="button" id="btnActivate_C"><i class="fa fa-trash"></i>  Activate</button></li>
                    <li><button type="button" id="btnDeactivate_C"><i class="fa fa-trash"></i>  Deactivate</button></li>
                    <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="print_CM.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExport"> <i class="fa fa-pencil"></i><a href="downloadtable_U.php?searchRecord=<?php echo $searchRecord ?>"> Export to Excel</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExportCSV"> <i class="fa fa-pencil"></i><a href="downloadtableCSV_U.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Export to CSV</a></button></li> -->
                    <!-- <li><button type="button" id="btnExport"><i class="fa fa-pencil"></i>  PDF</button></li> -->
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
                                  if ($cmpType_CM == 1)
                                  {
                                  ?>
                                  <th>Company</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($legCode_CM == 1)
                                  {
                                  ?>
                                  <th>Legacy Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($newCode_CM == 1)
                                  {
                                  ?>
                                  <th>New Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpTitle_CM == 1)
                                  {
                                  ?>
                                  <th>Company Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpStreet_CM == 1)
                                  {
                                  ?>
                                  <th>Company Street</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpCity_CM == 1)
                                  {
                                  ?>
                                  <th>Company City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpCountry_CM == 1)
                                  {
                                  ?>
                                  <th>Company Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telCode_CM == 1)
                                  {
                                  ?>
                                  <th>Tel Code.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telNumber_CM == 1)
                                  {
                                  ?>
                                  <th>Tel No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpWebsite_CM == 1)
                                  {
                                  ?>
                                  <th>Company Website</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpEmail_CM == 1)
                                  {
                                  ?>
                                  <th>Company Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($taxType_CM == 1)
                                  {
                                  ?>
                                  <th>Tax Type</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($taxNo_CM == 1)
                                  {
                                  ?>
                                  <th>Tax No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaImport_CM == 1)
                                  {
                                  ?>
                                  <th>Sea Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airImport_CM == 1)
                                  {
                                  ?>
                                  <th>Air Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaExport_CM == 1)
                                  {
                                  ?>
                                  <th>Sea Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airExport_CM == 1)
                                  {
                                  ?>
                                  <th>Air Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repName_CM == 1)
                                  {
                                  ?>
                                  <th>Rep Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repDesig_CM == 1)
                                  {
                                  ?>
                                  <th>Rep Desg</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repOffCell_CM == 1)
                                  {
                                  ?>
                                  <th>Office no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repPerCell_CM == 1)
                                  {
                                  ?>
                                  <th>Cell no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repEmail_CM == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkName_CM == 1)
                                  {
                                  ?>
                                  <th>Bank Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkBr_CM == 1)
                                  {
                                  ?>
                                  <th>Branch Branch</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCity_CM == 1)
                                  {
                                  ?>
                                  <th>Office City</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCountry_CM == 1)
                                  {
                                  ?>
                                  <th>Office Country</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnIban_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Iban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnNonIban_CM == 1)
                                  {
                                  ?>
                                  <th>Finance NonIban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrDays_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Day</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrAmount_CM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Amount</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($cmpStatus_CM == 1)
                                  {
                                  ?>
                                  <th>Company Status</th>
                                  <?php
                                  }
                                  ?>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Activate/Deactivate</th>
                              </tr>
    					         </thead>
            					        <tbody>

                                               	<?php

                                                while ($searchRow= mysqli_fetch_array($searchQuery))
                                                {
                                                          
                                                $cmpType = $searchRow['cmpType'];            
                                                $legCode = $searchRow['legCode']; 
                                                $cmpTitle = $searchRow['cmpTitle'];
                                                $newCode = $searchRow ['newCode'];
                                                $cmpStreet = $searchRow['cmpStreet'];
                                                $cmpCity = $searchRow['cmpCity'];
                                                $cmpCountry = $searchRow['cmpCountry'];
                                                $seaImport = $searchRow['seaImport'];
                                                $airImport = $searchRow['airImport'];
                                                $seaExport = $searchRow['seaExport'];
                                                $airExport = $searchRow['airExport'];
                                                $telCode = $searchRow['telCode'];
                                                $telNumber = $searchRow['telNumber'];
                                                $cmpWebsite = $searchRow['cmpWebsite'];
                                                $cmpEmail = $searchRow['cmpEmail'];
                                                $taxType = $searchRow['taxType'];
                                                $taxNo = $searchRow['taxNo'];
                                                $repName = $searchRow['repName'];
                                                $repDesig = $searchRow['repDesig'];
                                                $repOffCell = $searchRow['repOffCell'];
                                                $repPerCell = $searchRow['repPerCell'];
                                                $repEmail = $searchRow['repEmail'];
                                                $fnBnkName = $searchRow['fnBnkName'];
                                                $fnBnkBr = $searchRow['fnBnkBr'];
                                                $fnCity = $searchRow['fnCity'];
                                                $fnCountry = $searchRow['fnCountry'];
                                                $fnNonIban = $searchRow['fnNonIban'];
                                                $fnIban = $searchRow['fnIban'];
                                                $fnCrDays = $searchRow['fnCrDays'];
                                                $fnCrAmount = $searchRow['fnCrAmount'];
                                                $cmpStatus = $searchRow['cmpStatus'];
                                                $id = $searchRow['newCode'];

                                                        ?>

                                                          <tr id="<?php echo $searchRow['newCode']; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $searchRow['newCode'] .' " /></td>'; ?>
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->
                                                            <?php
                                                            if ($cmpType_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpType; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($legCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $legCode; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($newCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $newCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpTitle_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpTitle; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpStreet_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpStreet; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpCity_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpCountry_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telCode_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telNumber_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telNumber; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpWebsite_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpWebsite; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpEmail_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($taxType_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxType; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($taxNo_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaImport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airImport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaExport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airExport_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repName_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repDesig_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repDesig; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repOffCell_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repOffCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repPerCell_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repPerCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repEmail_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkName_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkBr_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkBr; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCity_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCountry_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnIban_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnNonIban_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnNonIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrDays_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrDays; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrAmount_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrAmount; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cmpStatus_CM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpStatus; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><a href="master_customer_V.php?custID=<?php echo $searchRow['newCode']; ?>">View</td>
                                                            <td><a href="master_customer_VE.php?custID=<?php echo $searchRow['newCode']; ?>">Edit</td>
                                                           
                                                          <?php
                                                          if ($cmpStatus == "Active")
                                                          {
                                                          ?>

                                                          <td><a href="deleteMasterCode_C.php?newCode=<?php echo $newCode; ?>" >Deactivate</td>

                                                          <?php
                                                          }

                                                          else
                                                          {
                                                          ?>

                                                          <td><a href="deleteMasterCode_C.php?newCode=<?php echo $newCode; ?>" >Activate</td>

                                                          <?php
                                                          }
                                                          ?>

                                                            
                                                        </tr>
                                                        <?php
                                                          }
                                                        ?>

            					        </tbody>		     
    					</table> 
          </div>    
          </form>
			</div>
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
         url: 'deleteMasterCode_C.php?newCode=<?php echo $id; ?>',
         type: 'GET',
         data: {id: id},
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              $("#deleteTable_C2").modal('hide');
               
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
  location.replace("master_customer.php")
}
</script>

<script>
$(document).ready(function(){
  $("#btnActivate_C").click(function(){
    $("#activateTable_C").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#btnDeactivate_C").click(function(){
    $("#deactivateTable_C").modal();
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

<script src="js/bootstrap.min.js"></script>

</body>
</html>