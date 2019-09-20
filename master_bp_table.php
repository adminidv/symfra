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
  $legCode_BM = 0;
  $newCode_BM = 0;
  $bpTitle_BM = 0;
  $bpStreet_BM = 0;
  $bpCity_BM = 0;
  $bpCountry_BM = 0;
  $telCode_BM = 0;
  $telNumber_BM = 0;
  $cmpWebsite_BM = 0;
  $cmpEmail_BM = 0;
  $taxType_BM = 0;
  $taxNo_BM = 0;
  $seaImport_BM = 0;
  $airImport_BM = 0;
  $seaExport_BM = 0;
  $airExport_BM = 0;
  $repName_BM = 0;
  $repDesig_BM = 0;
  $repOffCell_BM = 0;
  $repPerCell_BM = 0;
  $repEmail_BM = 0;
  $fnBnkName_BM = 0;
  $fnBnkBr_BM = 0;
  $fnCity_BM = 0;
  $fnCountry_BM = 0;
  $fnIban_BM = 0;
  $fnNonIban_BM = 0;
  $fnCrDays_BM = 0;
  $fnCrAmount_BM = 0;
  $cmpStatus_BM = 0;

  // Setting variables if 1
  // if (isset($_POST['cmpType_CM']))
  // {
  //   $cmpType_CM = 1;
  // }
  if (isset($_POST['legCode_BM']))
  {
    $legCode_BM = 1;
  }
  if (isset($_POST['newCode_BM']))
  {
    $newCode_BM = 1;
  }
  if (isset($_POST['bpTitle_BM']))
  {
    $bpTitle_BM = 1;
  }
  if (isset($_POST['bpStreet_BM']))
  {
    $bpStreet_BM = 1;
  }
  if (isset($_POST['bpCity_BM']))
  {
    $bpCity_BM = 1;
  }
  if (isset($_POST['bpCountry_BM']))
  {
    $bpCountry_BM = 1;
  }
  if (isset($_POST['telCode_BM']))
  {
    $telCode_BM = 1;
  }
  if (isset($_POST['telNumber_BM']))
  {
    $telNumber_BM = 1;
  }
  if (isset($_POST['cmpWebsite_BM']))
  {
    $cmpWebsite_BM = 1;
  }
  if (isset($_POST['cmpEmail_BM']))
  {
    $cmpEmail_BM = 1;
  }
  if (isset($_POST['taxType_BM']))
  {
    $taxType_BM = 1;
  }
  if (isset($_POST['taxNo_BM']))
  {
    $taxNo_BM = 1;
  }
  if (isset($_POST['seaImport_BM']))
  {
    $seaImport_BM = 1;
  }
  if (isset($_POST['airImport_BM']))
  {
    $airImport_BM = 1;
  }
  if (isset($_POST['seaExport_BM']))
  {
    $seaExport_BM = 1;
  }
  if (isset($_POST['airExport_BM']))
  {
    $airExport_BM = 1;
  }
  if (isset($_POST['repName_BM']))
  {
    $repName_BM = 1;
  }
  if (isset($_POST['repDesig_BM']))
  {
    $repDesig_BM = 1;
  }
  if (isset($_POST['repOffCell_BM']))
  {
    $repOffCell_BM = 1;
  }
  if (isset($_POST['repPerCell_BM']))
  {
    $repPerCell_BM = 1;
  }
  if (isset($_POST['repEmail_BM']))
  {
    $repEmail_BM = 1;
  }
  if (isset($_POST['fnBnkName_BM']))
  {
    $fnBnkName_BM = 1;
  }
  if (isset($_POST['fnBnkBr_BM']))
  {
    $fnBnkBr_BM = 1;
  }
  if (isset($_POST['fnCity_BM']))
  {
    $fnCity_BM  = 1;
  }
  if (isset($_POST['fnCountry_BM']))
  {
    $fnCountry_BM = 1;
  }
  if (isset($_POST['fnIban_BM']))
  {
    $fnIban_BM = 1;
  }
  if (isset($_POST['fnNonIban_BM']))
  {
    $fnNonIban_BM = 1;
  }
  if (isset($_POST['fnCrDays_BM']))
  {
    $fnCrDays_BM = 1;
  }
  if (isset($_POST['fnCrAmount_BM']))
  {
    $fnCrAmount_BM = 1;
  }
  if (isset($_POST['cpmStatus_BM']))
  {
    $cmpStatus_BM = 1;
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

  $updateUM = mysqli_query($con, "UPDATE custmaster_cm SET legCode_CM='$legCode_BM', newCode_CM='$newCode_BM', cmpTitle_CM='$bpTitle_BM', cmpStreet_CM='$bpStreet_BM', cmpCity_CM='$bpCity_BM', cmpCountry_CM='$bpCountry_BM', telCode_CM='$telCode_BM', telNumber_CM='$telNumber_BM', cmpWebsite_CM='$cmpWebsite_BM', cmpEmail_CM='$cmpEmail_BM', taxType_CM='$taxType_BM', taxNo_CM = '$taxNo_BM', seaImport_CM='$seaImport_BM', airImport_CM='$airImport_BM', seaExport_CM='$seaExport_BM', airExport_CM='$airExport_BM', repName_CM='$repName_BM', repDesig_CM='$repDesig_BM', repOffCell_CM='$repOffCell_BM', repPerCell_CM='$repPerCell_BM', repEmail_CM='$repEmail_BM', fnBnkName_CM='$fnBnkName_BM', fnBnkBr_CM='$fnBnkBr_BM', fnCity_CM='$fnCity_BM', fnCountry_CM='$fnCountry_BM', fnIban_CM='$fnIban_BM', fnNonIban_CM='$fnNonIban_BM', fnCrDays_CM='$fnCrDays_BM', fnCrAmount_CM='$fnCrAmount_BM', cmpStatus_CM='$cmpStatus_BM'  WHERE SrNo_cm= '1' ") or die(mysqli_error($con));

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users`  ";

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
  $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);
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
    $searchRecord="SELECT * FROM `users`  ";

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
    $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to deactivate.");';
    echo 'window.location.href = "master_bp_table.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnActivate"]))
{
  if (isset($_POST["user_check"]))
  {
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      // mysqli_query($con, "UPDATE custmaster SET cmpStatus= '2' WHERE newCode = '$val' ");
      mysqli_query($con, "UPDATE custmaster SET cmpStatus='Active' WHERE newCode = '$val' ");
    }

    $clause = " WHERE ";//Initial clause
    $searchRecord="SELECT * FROM `users`  ";

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
    $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to activate.");'; 
    echo 'window.location.href = "master_bp_table.php";';
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
    $searchRecord="SELECT * FROM `users`  ";

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
    $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
    $searchQuery = mysqli_query($con, $search);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "master_bp_table.php";';
    echo '</script>';
  }

  
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users`  ";

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
  $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: master_bp_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("master_bp_csv.php?searchQuery=$searchQuery");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("master_bp_pdf.php?searchQuery=$searchQuery");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users`  ";

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
  $search = " SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ";
  $searchQuery = mysqli_query($con, $search);
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master BP Table</title>
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">CRM</a>
          <a href="master_bp_table.php" class="btn btn-info active">Master BP Table</a>
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
          <button type="button" id="btnNewUser" onclick="newUser();">New Master BP </button>
				</div>
			</div>

			<div class="col-md-12">
				<div class="user_table-title">
					<h4>Master BP Table</h4>
				</div>
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM custmaster_cm');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            // $cmpType_CM = $rowUM['cmpType_CM'];
            $legCode_BM = $rowUM['legCode_CM'];
            $newCode_BM = $rowUM['newCode_CM'];
            $bpTitle_BM = $rowUM['cmpTitle_CM'];
            $bpStreet_BM = $rowUM['cmpStreet_CM'];
            $bpCity_BM = $rowUM['cmpCity_CM'];
            $bpCountry_BM = $rowUM['cmpCountry_CM'];
            $telCode_BM = $rowUM['telCode_CM'];
            $telNumber_BM = $rowUM['telNumber_CM'];
            $cmpWebsite_BM = $rowUM['cmpWebsite_CM'];
            $cmpEmail_BM = $rowUM['cmpEmail_CM'];
            $taxType_BM = $rowUM['taxType_CM'];
            $taxNo_BM = $rowUM['taxNo_CM'];
            $seaImport_BM = $rowUM['seaImport_CM'];
            $airImport_BM = $rowUM['airImport_CM'];
            $seaExport_BM = $rowUM['seaExport_CM'];
            $airExport_BM = $rowUM['airExport_CM'];
            $repName_BM = $rowUM['repName_CM'];
            $repDesig_BM = $rowUM['repDesig_CM'];
            $repOffCell_BM = $rowUM['repOffCell_CM'];
            $repPerCell_BM = $rowUM['repPerCell_CM'];
            $repEmail_BM = $rowUM['repEmail_CM'];
            $fnBnkName_BM = $rowUM['fnBnkName_CM'];
            $fnBnkBr_BM = $rowUM['fnBnkBr_CM'];
            $fnCity_BM = $rowUM['fnCity_CM'];
            $fnCountry_BM = $rowUM['fnCountry_CM'];
            $fnIban_BM = $rowUM['fnIban_CM'];
            $fnNonIban_BM = $rowUM['fnNonIban_CM'];
            $fnCrDays_BM = $rowUM['fnCrDays_CM'];
            $fnCrAmount_BM = $rowUM['fnCrAmount_CM'];
            $cmpStatus_BM = $rowUM['cmpStatus_CM'];
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

                              if ($legCode_BM == 1)
                              {
                                echo '<input type="checkbox" name="legCode_BM" checked> <label>Legacy Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="legCode_BM" > <label>Legacy Code</label> <br>';
                              }

                              if ($newCode_BM == 1)
                              {
                                echo '<input type="checkbox" name="newCode_BM" checked> <label>New Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="newCode_BM" > <label>New Code</label> <br>';
                              }

                              if ($bpTitle_BM == 1)
                              {
                                echo '<input type="checkbox" name="bpTitle_BM" checked> <label>Company Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="bpTitle_BM" > <label>Company Name</label> <br>';
                              }
                              if ($bpStreet_BM == 1)
                              {
                                echo '<input type="checkbox" name="bpStreet_BM" checked> <label> Street </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="bpStreet_BM" > <label> Street </label> <br>';
                              }

                              if ($bpCity_BM == 1)
                              {
                                echo '<input type="checkbox" name="bpCity_BM" checked> <label> City </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="bpCity_BM" > <label> City </label> <br>';
                              }

                              if ($bpCountry_BM == 1)
                              {
                                echo '<input type="checkbox" name="bpCountry_BM" checked> <label>Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="bpCountry_BM" > <label>Country</label> <br>';
                              }
                              if ($fnCrAmount_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnCrAmount_BM" checked> <label>Finance Credit Amount</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCrAmount_BM" > <label>Finance Credit Amounts</label> <br>';
                              }

                              if ($cmpStatus_BM == 1)
                              {
                                echo '<input type="checkbox" name="cpmStatus_BM" checked> <label>Company Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cpmStatus_BM" > <label>Company Status</label> <br>';
                              }
                              
                              if ($repName_BM == 1)
                              {
                                echo '<input type="checkbox" name="repName_BM" checked> <label>Rep Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repName_BM" > <label>Rep Name</label> <br>';
                              }
                              if ($repDesig_BM == 1)
                              {
                                echo '<input type="checkbox" name="repDesig_BM" checked> <label>Rep Desig.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repDesig_BM" > <label>Rep Desig.</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                               if ($telCode_BM == 1)
                              {
                                echo '<input type="checkbox" name="telCode_BM" checked> <label>Tel. Code</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="telCode_BM" > <label>Tel. Code</label> <br>';
                              }

                              if ($telNumber_BM == 1)
                              {
                                echo '<input type="checkbox" name="telNumber_BM" checked> <label>Tel. Number</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="telNumber_BM" > <label>Tel. Number</label> <br>';
                              }
                               if ($cmpWebsite_BM == 1)
                              {
                                echo '<input type="checkbox" name="cmpWebsite_BM" checked> <label>Website</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpWebsite_BM" > <label>Website</label> <br>';
                              }

                              if ($cmpEmail_BM == 1)
                              {
                                echo '<input type="checkbox" name="cmpEmail_BM" checked> <label>Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cmpEmail_BM" > <label>Email</label> <br>';
                              }

                              if ($taxType_BM == 1)
                              {
                                echo '<input type="checkbox" name="taxType_BM" checked> <label>Tax Type</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="taxType_BM" > <label>Tax Type</label> <br>';
                              }

                              if ($taxNo_BM == 1)
                              {
                                echo '<input type="checkbox" name="taxNo_BM" checked> <label>Tax No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="taxNo_BM" > <label>Tax No.</label> <br>';
                              }

                              if ($seaImport_BM == 1)
                              {
                                echo '<input type="checkbox" name="seaImport_BM" checked> <label>Sea Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="seaImport_BM" > <label>Sea Import</label> <br>';
                              }

                              if ($airImport_BM == 1)
                              {
                                echo '<input type="checkbox" name="airImport_BM" checked> <label>Air Import</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airImport_BM" > <label>Air Import</label> <br>';
                              }
                              if ($seaExport_BM == 1)
                              {
                                echo '<input type="checkbox" name="seaExport_BM" checked> <label>Sea Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="seaExport_BM" > <label>Sea Export</label> <br>';
                              }

                              if ($airExport_BM == 1)
                              {
                                echo '<input type="checkbox" name="airExport_BM" checked> <label>Air Export</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="airExport_BM" > <label>Air Export</label> <br>';
                              }

                              echo '</div>';

                              if ($repOffCell_BM == 1)
                              {
                                echo '<input type="checkbox" name="repOffCell_BM" checked> <label>Rep. Off. Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repOffCell_BM" > <label>Rep. Off. Cell</label> <br>';
                              }

                              if ($repPerCell_BM == 1)
                              {
                                echo '<input type="checkbox" name="repPerCell_BM" checked> <label>Rep. Per. Cell</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repPerCell_BM" > <label>Rep. Per. Cell</label> <br>';
                              }

                              if ($repEmail_BM == 1)
                              {
                                echo '<input type="checkbox" name="repEmail_BM" checked> <label>Rep. Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="repEmail_BM" > <label>Rep. Email</label> <br>';
                              }

                              if ($fnBnkName_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnBnkName_BM" checked> <label>Bank Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnBnkName_BM" > <label>Bank Name</label> <br>';
                              }
                              if ($fnBnkBr_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnBnkBr_BM" checked> <label>Bank Br.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnBnkBr_BM" > <label>Bank Br.</label> <br>';
                              }

                              if ($fnCity_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnCity_BM" checked> <label>Bank City</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCity_BM" > <label>Bank City</label> <br>';
                              }
                              if ($fnCountry_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnCountry_BM" checked> <label>Bank Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCountry_BM" > <label>Bank Country</label> <br>';
                              }

                              if ($fnIban_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnIban_BM" checked> <label>IBAN</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnIban_BM" > <label>IBAN</label> <br>';
                              }
                              if ($fnNonIban_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnNonIban_BM" checked> <label>Non-IBAN</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnNonIban_BM" > <label>Non-IBAN</label> <br>';
                              }

                              if ($fnCrDays_BM == 1)
                              {
                                echo '<input type="checkbox" name="fnCrDays_BM" checked> <label>Credit Days</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fnCrDays_BM" > <label>Credit Days</label> <br>';
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
                    <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="master_bp_print.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li> -->
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
                                  if ($legCode_BM == 1)
                                  {
                                  ?>
                                  <th>Legacy Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($newCode_BM == 1)
                                  {
                                  ?>
                                  <th>New Code</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpTitle_BM == 1)
                                  {
                                  ?>
                                  <th>Company Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpStreet_BM == 1)
                                  {
                                  ?>
                                  <th>Company Street</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpCity_BM == 1)
                                  {
                                  ?>
                                  <th>Company City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($bpCountry_BM == 1)
                                  {
                                  ?>
                                  <th>Company Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telCode_BM == 1)
                                  {
                                  ?>
                                  <th>Tel Code.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($telNumber_BM == 1)
                                  {
                                  ?>
                                  <th>Tel No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpWebsite_BM == 1)
                                  {
                                  ?>
                                  <th>Company Website</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cmpEmail_BM == 1)
                                  {
                                  ?>
                                  <th>Company Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($taxType_BM == 1)
                                  {
                                  ?>
                                  <th>Tax Type</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($taxNo_BM == 1)
                                  {
                                  ?>
                                  <th>Tax No.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaImport_BM == 1)
                                  {
                                  ?>
                                  <th>Sea Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airImport_BM == 1)
                                  {
                                  ?>
                                  <th>Air Import</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($seaExport_BM == 1)
                                  {
                                  ?>
                                  <th>Sea Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($airExport_BM == 1)
                                  {
                                  ?>
                                  <th>Air Export</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repName_BM == 1)
                                  {
                                  ?>
                                  <th>Rep Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repDesig_BM == 1)
                                  {
                                  ?>
                                  <th>Rep Desg</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repOffCell_BM == 1)
                                  {
                                  ?>
                                  <th>Office no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repPerCell_BM == 1)
                                  {
                                  ?>
                                  <th>Cell no.</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($repEmail_BM == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkName_BM == 1)
                                  {
                                  ?>
                                  <th>Bank Name</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnBnkBr_BM == 1)
                                  {
                                  ?>
                                  <th>Branch Branch</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCity_BM == 1)
                                  {
                                  ?>
                                  <th>Office City</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($fnCountry_BM == 1)
                                  {
                                  ?>
                                  <th>Office Country</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnIban_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Iban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnNonIban_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Non-Iban</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrDays_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Day</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($fnCrAmount_BM == 1)
                                  {
                                  ?>
                                  <th>Finance Credit Amount</th>
                                  <?php
                                  }
                                  ?>
                                  
                                  <?php
                                  if ($cmpStatus_BM == 1)
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
                                                          //   $email = $searchRow['user_email'];
                                                          //   $contact = $searchRow['user_contact'];
                                                          //   $address = $searchRow['user_address'];
                                                          //   $doj = $searchRow['user_DOJ'];
                                                          //   $dob = $searchRow['user_DOB'];
                                                          //   $dol = $searchRow['user_DOL'];
                                                          //   $region = $searchRow['user_region'];

                                                //            // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);
                                                // $cmpType = $searchRow['cmpType'];            
                                                $legCode = $row['legCode'];
                                                $newCode = $row['newCode'];
                                                $bpTitle = $row['cmpTitle'];
                                                $bpStreet = $row['cmpStreet'];
                                                $bpCity = $row['cmpCity'];
                                                $bpCountry = $row['cmpCountry'];
                                                $telCode = $row['telCode'];
                                                $telNumber = $row['telNumber'];
                                                $cmpWebsite = $row['cmpWebsite'];
                                                $cmpEmail = $row['cmpEmail'];
                                                $taxType = $row['taxType'];
                                                $taxNo = $row['taxNo'];
                                                $seaImport = $row['seaImport'];
                                                $airImport = $row['airImport'];
                                                $seaExport = $row['seaExport'];
                                                $airExport = $row['airExport'];
                                                $repName = $row['repName'];
                                                $repDesig = $row['repDesig'];
                                                $repOffCell = $row['repOffCell'];   
                                                $repPerCell = $row['repPerCell'];
                                                $repEmail = $row['repEmail'];
                                                $fnBnkName = $row['fnBnkName'];
                                                $fnBnkBr = $row['fnBnkBr'];
                                                $fnCity = $row['fnCity'];
                                                $fnCountry = $row['fnCountry'];
                                                $fnIban = $row['fnIban'];
                                                $fnNonIban = $row['fnNonIban'];
                                                $fnCrDays = $row['fnCrDays'];
                                                $fnCrAmount = $row['fnCrAmount'];
                                                $cmpStatus = $row['cmpStatus'];

                                                $id = $row['newCode'];

                                                        ?>

                                                          <tr id="<?php echo $id; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $row['newCode'] .' " /></td>'; ?>
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->
                                                           

                                                            <?php
                                                            if ($legCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $legCode; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($newCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $newCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpTitle_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpTitle; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpStreet_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpStreet; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpCity_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($bpCountry_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $bpCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telCode_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telCode; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($telNumber_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $telNumber; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpWebsite_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpWebsite; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($cmpEmail_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($taxType_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxType; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($taxNo_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $taxNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaImport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airImport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airImport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($seaExport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $seaExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($airExport_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airExport; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repName_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repDesig_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repDesig; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repOffCell_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repOffCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repPerCell_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repPerCell; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($repEmail_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $repEmail; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkName_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkName; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnBnkBr_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnBnkBr; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCity_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCity; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCountry_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCountry; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnIban_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnNonIban_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnNonIban; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrDays_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrDays; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($fnCrAmount_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fnCrAmount; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($cmpStatus_BM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $cmpStatus; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><a href="master_bp_V.php?bpID=<?php echo $row['newCode']; ?>">View</td>
                                                            <td><a href="master_bp_E.php?bpID=<?php echo $row['newCode']; ?>">Edit</td>
                                                            <?php
                                                            if ($cmpStatus == "Active")
                                                            {
                                                            ?>

                                                            <td><a href="deleteMasterCode_BP.php?newCode=<?php echo $newCode; ?>" >Deactivate</td>

                                                            <?php
                                                            }

                                                            else
                                                            {
                                                            ?>

                                                            <td><a href="deleteMasterCode_BP.php?newCode=<?php echo $newCode; ?>" >Activate</td>

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
  location.replace("master_bp.php")
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