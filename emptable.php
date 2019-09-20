<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

if(isset($_POST["btnCustom_U"]))
{
    $empNo_em= 0;
    $cnicNo_em = 0;
    $ntnNo_em = 0;
    $empFName_em = 0;
    $empMName_em = 0;
    $empLName_em = 0;
    $empName_em = 0;
    $empGrdName_em = 0;
    $empDOB_em = 0;
    $empCell_em = 0;
    // $empOffice_em = 0;
    $empHomeNo_em = 0;
    $empEmergencyNo_em = 0;
    $emergRel_em = 0;
    $empMaritalStatus_em = 0;
    // $empSpouseName_em = 0;
    // $empChildren_em = 0;
    $empDept_em = 0;
    $empDesig_em = 0;
    $empGrade_em = 0;
    $empEntity_em = 0;
    $lineManager_em = 0;
    $empCountry_em = 0;
    $empCity_em = 0;
    $empAddress_em = 0;
    $empDOJ_em = 0;
    $empWorkEmail_em = 0;
    $empGender_em = 0;
    $leavePckg_em = 0;
    $savedStatus_em = 0;

  // Setting variables if 1
  if (isset($_POST['empNo_em']))
  {
    $empNo_em = 1;
  }
  if (isset($_POST['empFName_em']))
  {
    $empFName_em = 1;
  }
  if (isset($_POST['empMName_em']))
  {
    $empMName_em = 1;
  }
  if (isset($_POST['empLName_em']))
  {
    $empLName_em = 1;
  }
  if (isset($_POST['empName_em']))
  {
    $empName_em = 1;
  }
  if (isset($_POST['empGrdName_em']))
  {
    $empGrdName_em = 1;
  }
  if (isset($_POST['empCell_em']))
  {
    $empCell_em = 1;
  }
  /*if (isset($_POST['empOffice_em']))
  {
    $empOffice_em = 1;
  }*/
  if (isset($_POST['empHomeNo_em']))
  {
    $empHomeNo_em = 1;
  }
  if (isset($_POST['empEmergencyNo_em']))
  {
    $empEmergencyNo_em = 1;
  }
  if (isset($_POST['emergRel_em']))
  {
    $emergRel_em = 1;
  }
  if (isset($_POST['empWorkEmail_em']))
  {
    $empWorkEmail_em = 1;
  }
  if (isset($_POST['empDept_em']))
  {
    $empDept_em = 1;
  }
  if (isset($_POST['empDesig_em']))
  {
    $empDesig_em = 1;
  }
  if (isset($_POST['empEntity_em']))
  {
    $empEntity_em = 1;
  }
  if (isset($_POST['empGrade_em']))
  {
    $empGrade_em = 1;
  }
  if (isset($_POST['empDOB_em']))
  {
    $empDOB_em = 1;
  }
  if (isset($_POST['empDOJ_em']))
  {
    $empDOJ_em = 1;
  }
  if (isset($_POST['leavePckg_em']))
  {
    $leavePckg_em = 1;
  }
  if (isset($_POST['ntnNo_em']))
  {
    $ntnNo_em = 1;
  }
  if (isset($_POST['cnicNo_em']))
  {
    $cnicNo_em = 1;
  }
  if (isset($_POST['empGender_em']))
  {
    $empGender_em = 1;
  }
  if (isset($_POST['empAddress_em']))
  {
    $empAddress_em = 1;
  }
  if (isset($_POST['empCity_em']))
  {
    $empCity_em = 1;
  }
  if (isset($_POST['empCountry_em']))
  {
    $empCountry_em = 1;
  }
  if (isset($_POST['lineManager_em']))
  {
    $lineManager_em = 1;
  }
  /*if (isset($_POST['empSpouseName_em']))
  {
    $empSpouseName_em = 1;
  }*/
  /*if (isset($_POST['empChildren_em']))
  {
    $empChildren_em = 1;
  }*/
  if (isset($_POST['empMaritalStatus_em']))
  {
    $empMaritalStatus_em = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE table_em SET empNo_em = '$empNo_em', empName_em='$empName_em', empFName_em='$empFName_em', empMName_em='$empMName_em', empLName_em='$empLName_em', empGrdName_em='$empGrdName_em', empAddress_em ='$empAddress_em', empCell_em='$empCell_em', empHomeNo_em='$empHomeNo_em', empEmergencyNo_em='$empEmergencyNo_em', emergRel_em='$emergRel_em', cnicNo_em='$cnicNo_em', empDept_em='$empDept_em', empDesig_em='$empDesig_em', ntnNo_em='$ntnNo_em',empDOB_em='$empDOB_em', empDOJ_em='$empDOJ_em', empMaritalStatus_em='$empMaritalStatus_em', empGrade_em='$empGrade_em', empEntity_em='$empEntity_em' , lineManager_em='$lineManager_em', empCountry_em='$empCountry_em', empCity_em='$empCity_em', empWorkEmail_em='$empWorkEmail_em', empGender_em='$empGender_em', leavePckg_em='$leavePckg_em' WHERE SrNo= '1' ") or die(mysqli_error($con)); 

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo` WHERE userBr='$userBr' ";

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
  $searchQuery = mysqli_query($con, $searchRecord);
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
  $searchRecord="SELECT * FROM `empinfo` WHERE userBr='$userBr' ";

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
  $searchQuery = mysqli_query($con, $searchRecord);
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
    $searchRecord="SELECT * FROM `empinfo` WHERE userBr='$userBr' ";

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
    $searchQuery = mysqli_query($con, $searchRecord);
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
  $searchRecord="SELECT * FROM `empinfo` WHERE userBr='$userBr' ";

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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: downloadtable_e.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("downloadtableCSV_e.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pdftable_em.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo` WHERE userBr='$userBr' ";

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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');
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
          <a href="Usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Show Employees</a>
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
      <button type="button" id="btnAddEmp" onclick="addEmp();">  <small>Add Employee</small></button>
  </div>

      <div class="col-md-12">
        <div class="user_table-title">
          <h4>Employee Info Table</h4>
        </div>
        
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectEM = mysqli_query($con, 'SELECT * FROM table_em');

          while ($rowEM = mysqli_fetch_array($selectEM))
          {
              $empNo_em= $rowEM['empNo_em'];
              $cnicNo_em = $rowEM['cnicNo_em'];
              $ntnNo_em = $rowEM['ntnNo_em'];
              $empName_em = $rowEM['empName_em'];
              $empFName_em = $rowEM['empFName_em'];
              $empMName_em = $rowEM['empMName_em'];
              $empLName_em = $rowEM['empLName_em'];
              $empGrdName_em = $rowEM['empGrdName_em'];
              $empDOB_em = $rowEM['empDOB_em'];
              $empCell_em = $rowEM['empCell_em'];
              // $empOffice_em = $rowEM['empOffice_em'];
              $empHomeNo_em = $rowEM['empHomeNo_em'];
              $empEmergencyNo_em = $rowEM['empEmergencyNo_em'];
              $emergRel_em = $rowEM['emergRel_em'];
              $empMaritalStatus_em = $rowEM['empMaritalStatus_em'];
              // $empSpouseName_em = $rowEM['empSpouseName_em'];
              // $empChildren_em= $rowEM['empChildren_em'];
              $empDept_em = $rowEM['empDept_em'];
              $empDesig_em = $rowEM['empDesig_em'];
              $empGrade_em = $rowEM['empGrade_em'];
              $empEntity_em = $rowEM['empEntity_em'];
              $lineManager_em = $rowEM['lineManager_em'];
              $empCountry_em = $rowEM['empCountry_em'];
              $empCity_em = $rowEM['empCity_em'];
              $empAddress_em = $rowEM['empAddress_em'];
              $empDOJ_em = $rowEM['empDOJ_em'];
              $empWorkEmail_em = $rowEM['empWorkEmail_em'];
              $empGender_em = $rowEM['empGender_em'];
              $leavePckg_em = $rowEM['leavePckg_em'];
              $savedStatus_em = $rowEM['savedStatus_em'];
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
                              if ($empNo_em == 1)
                              {
                                echo '<input type="checkbox" name="empNo_em" checked> <label>Employee ID</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empNo_em" > <label>Employee ID</label> <br>';
                              }

                              if ($cnicNo_em == 1)
                              {
                                echo '<input type="checkbox" name="cnicNo_em" checked> <label>Employee CNIC</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cnicNo_em" > <label>Employee CNIC</label> <br>';
                              }

                              if ($ntnNo_em == 1)
                              {
                                echo '<input type="checkbox" name="ntnNo_em" checked> <label>Employee NTN</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="ntnNo_em" > <label>Employee NTN</label> <br>';
                              }

                              if ($empFName_em == 1)
                              {
                                echo '<input type="checkbox" name="empFName_em" checked> <label>First Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empFName_em" > <label>First Name</label> <br>';
                              }

                              if ($empMName_em == 1)
                              {
                                echo '<input type="checkbox" name="empMName_em" checked> <label>Middle Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empMName_em" > <label>Middle Name</label> <br>';
                              }

                              if ($empLName_em == 1)
                              {
                                echo '<input type="checkbox" name="empLName_em" checked> <label>Last Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empLName_em" > <label>Last Name</label> <br>';
                              }

                              if ($empName_em == 1)
                              {
                                echo '<input type="checkbox" name="empName_em" checked> <label>Employee Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empName_em" > <label>Employee Name</label> <br>';
                              }
                              
                              if ($empGrdName_em == 1)
                              {
                                echo '<input type="checkbox" name="empGrdName_em" checked> <label>Employee Grd Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empGrdName_em" > <label>Employee Grd Name</label> <br>';
                              }
                               if ($leavePckg_em == 1)
                              {
                                echo '<input type="checkbox" name="leavePckg_em" checked> <label>Leave Pakage</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="leavePckg_em" > <label>Leave Pakage</label> <br>';
                              }

                              echo '</div>';

                              echo '<div class="col-md-4">';
                              if ($empGender_em == 1)
                              {
                                echo '<input type="checkbox" name="empGender_em" checked> <label>Gender</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empGender_em" > <label>Gender</label> <br>';
                              }

                              if ($empDOB_em == 1)
                              {
                                echo '<input type="checkbox" name="empDOB_em" checked> <label>Date Of Birth</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empDOB_em" > <label>Date Of Birth</label> <br>';
                              }

                              if ($empCell_em == 1)
                              {
                                echo '<input type="checkbox" name="empCell_em" checked> <label>Contact No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empCell_em" > <label>Contact No.</label> <br>';
                              }

                              /*if ($empOffice_em== 1)
                              {
                                echo '<input type="checkbox" name="empOffice_em" checked> <label>Office No.</label> <br>';
                              }*/
                              /*else
                              {
                                echo '<input type="checkbox" name="empOffice_em" > <label>Office No.</label> <br>';
                              }*/
                              
                              if ($empHomeNo_em == 1)
                              {
                                echo '<input type="checkbox" name="empHomeNo_em" checked> <label>Home No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empHomeNo_em" > <label>Home No.</label> <br>';
                              }

                              if ($empEmergencyNo_em == 1)
                              {
                                echo '<input type="checkbox" name="empEmergencyNo_em" checked> <label>Emergency No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empEmergencyNo_em" > <label>Emergency No.</label> <br>';
                              }
                              if ($emergRel_em == 1)
                              {
                                echo '<input type="checkbox" name="emergRel_em" checked> <label>Emergency Rel.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="emergRel_em" > <label>Emergency Rel.</label> <br>';
                              }
                              

                              if ($empMaritalStatus_em == 1)
                              {
                                echo '<input type="checkbox" name="empMaritalStatus_em" checked> <label>Marital Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empMaritalStatus_em" > <label>Marital Status</label> <br>';
                              }

                              /*if ($empSpouseName_em == 1)
                              {
                                echo '<input type="checkbox" name="empSpouseName_em" checked> <label>Spouse Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empSpouseName_em" > <label>Spouse Name</label> <br>';
                              }*/
                              
                              /* if ($empChildren_em == 1)
                              {
                                echo '<input type="checkbox" name="empChildren_em" checked> <label>Children</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empChildren_em" > <label>Children</label> <br>';
                              }*/
                               if ($empDept_em == 1)
                              {
                                echo '<input type="checkbox" name="empDept_em" checked> <label>Department</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empDept_em" > <label>Department</label> <br>';
                              }
                               if ($empDesig_em == 1)
                              {
                                echo '<input type="checkbox" name="empDesig_em" checked> <label>Designation</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empDesig_em" > <label>Designation</label> <br>';
                              }
                              echo '</div>';
                              echo '<div class="col-md-4">';
                               if ($empGrade_em == 1)
                              {
                                echo '<input type="checkbox" name="empGrade_em" checked> <label>Grade</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empGrade_em" > <label>Grade</label> <br>';
                              }
                               if ($empEntity_em == 1)
                              {
                                echo '<input type="checkbox" name="empEntity_em" checked> <label>Entity</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empEntity_em" > <label>Entity</label> <br>';
                              }
                              
                               if ($lineManager_em == 1)
                              {
                                echo '<input type="checkbox" name="lineManager_em" checked> <label>Reporting Manager</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="lineManager_em" > <label>Reporting Manager</label> <br>';
                              }
                               if ($empCountry_em == 1)
                              {
                                echo '<input type="checkbox" name="empCountry_em" checked> <label>Country</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empCountry_em" > <label>Country</label> <br>';
                              }
                               if ($empCity_em == 1)
                              {
                                echo '<input type="checkbox" name="empCity_em" checked> <label>City</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empCity_em" > <label>City</label> <br>';
                              }
                               if ($empAddress_em == 1)
                              {
                                echo '<input type="checkbox" name="empAddress_em" checked> <label>Address</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empAddress_em" > <label>Address</label> <br>';
                              }
                               
                               if ($empDOJ_em == 1)
                              {
                                echo '<input type="checkbox" name="empDOJ_em" checked> <label>Date of join</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empDOJ_em" > <label>Date of join</label> <br>';
                              }
                              
                               if ($empWorkEmail_em == 1)
                              {
                                echo '<input type="checkbox" name="empWorkEmail_em" checked> <label>Work Email</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empWorkEmail_em" > <label>Work Email</label> <br>';
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
                              <p>Do you really want to delete selected records?</p>
                              
                          </div>
                          <button type="submit" name="btnDelete">Yes</button>
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
                          <button type="button" class="remove" id="remove">Yes</button>
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
                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Delete</button></li>
                  <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printtable_em.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li> -->
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
          if ($empNo_em == 1)
          {
          ?>
          <th>Employee ID</th>
          <?php
          }
          ?>

          <?php
          if ($empFName_em == 1)
          {
          ?>
          <th>First Name</th>
          <?php
          }
          ?>

          <?php
          if ($empMName_em == 1)
          {
          ?>
          <th>Middle Name</th>
          <?php
          }
          ?>

          <?php
          if ($empLName_em == 1)
          {
          ?>
          <th>Last Name</th>
          <?php
          }
          ?>

          <?php
          if ($empName_em == 1)
          {
          ?>
          <th>Employee Name</th>
          <?php
          }
          ?>

          <?php
          if ($empGrdName_em == 1)
          {
          ?>
          <th>Father/Husband</th>
          <?php
          }
          ?>

          <?php
          if ($empCell_em == 1)
          {
          ?>
          <th>Contact No.</th>
          <?php
          }
          ?>
          <!-- <?php
          if ($empOffice_em == 1)
          {
          ?>
          <th>Office No.</th>
          <?php
          }
          ?> -->
          <?php
          if ($empHomeNo_em == 1)
          {
          ?>
          <th>Home No.</th>
          <?php
          }
          ?>
          <?php
          if ($empEmergencyNo_em == 1)
          {
          ?>
          <th>Emergency No.</th>
          <?php
          }
          ?>
          <?php
          if ($emergRel_em == 1)
          {
          ?>
          <th>Emergency Rel.</th>
          <?php
          }
          ?>

          <?php
          if ($empWorkEmail_em == 1)
          {
          ?>
          <th>Email ID</th>
          <?php
          }
          ?>

          <?php
          if ($empDept_em == 1)
          {
          ?>
          <th>Department</th>
          <?php
          }
          ?>

          <?php
          if ($empDesig_em == 1)
          {
          ?>
          <th>Designation</th>
          <?php
          }
          ?>

          <?php
          if ($empEntity_em == 1)
          {
          ?>
          <th>Entity</th>
          <?php
          }
          ?>

          <?php
          if ($empGrade_em == 1)
          {
          ?>
          <th>Grade</th>
          <?php
          }
          ?>

          <?php
          if ($empDOB_em == 1)
          {
          ?>
          <th>Date of Birth</th>
          <?php
          }
          ?>

          <?php
          if ($empDOJ_em == 1)
          {
          ?>
          <th>Date of Joining</th>
          <?php
          }
          ?>

          <?php
          if ($leavePckg_em == 1)
          {
          ?>
          <th>Leave Pakage</th>
          <?php
          }
          ?>

          <?php
          if ($ntnNo_em == 1)
          {
          ?>
          <th>NTN Number</th>
          <?php
          }
          ?>
          <?php
          if ($cnicNo_em == 1)
          {
          ?>
          <th>CNIC Number</th>
          <?php
          }
          ?>
          <?php
          if ($empGender_em == 1)
          {
          ?>
          <th>Gender</th>
          <?php
          }
          ?>
          <?php

          if ($empAddress_em == 1)
          {
          ?>
          <th>Adddress</th>
          <?php
          }
          ?>
          <?php
          if ($empCity_em == 1)
          {
          ?>
          <th>City</th>
          <?php
          }
          ?>
          <?php
          if ($empCountry_em == 1)
          {
          ?>
          <th>Country</th>
          <?php
          }
          ?>
          <?php
          if ($lineManager_em == 1)
          {
          ?>
          <th>Reporting Manager</th>
          <?php
          }
          ?>
          <!-- <?php
          if ($empSpouseName_em == 1)
          {
          ?>
          <th>Spouse Name</th>
          <?php
          }
          ?> -->
          <!-- <?php
          if ($empChildren_em == 1)
          {
          ?>
          <th>Children</th>
          <?php
          }
          ?> -->
          <?php
          if ($empMaritalStatus_em == 1)
          {
          ?>
          <th>Marital Status</th>
          <?php
          }
          ?>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                       </thead>
								                                                        
                                <tbody>
                                  <?php

                                  // $qry1 = mysqli_query($con, "SELECT * FROM empinfo ");

                                    while($row= mysqli_fetch_array($searchQuery)) {
                                      $empNo= $row['empNo'];
                                      $cnicNo = $row['cnicNo'];
                                      $ntnNo = $row['ntnNo'];
                                      $empFName = $row['empFName'];
                                      $empMName = $row['empMName'];
                                      $empLName = $row['empLName'];
                                      $empName = $row['empName'];
                                      $empGrdName = $row['empGrdName'];
                                      $empDOB = $row['empDOB'];
                                      $empCell = $row['empCell'];
                                      // $empOffice = $row['empOffice'];
                                      $empHomeNo = $row['empHomeNo'];
                                      $empEmergencyNo = $row['empEmergencyNo'];
                                      $emergRel = $row['emergRel'];
                                      $empMaritalStatus = $row['empMaritalStatus'];
                                      // $empSpouseName = $row['empSpouseName'];
                                      // $empChildren = $row['empChildren'];
                                      $empDept = $row['empDept'];
                                      $empDesig = $row['empDesig'];
                                      $empGrade = $row['empGrade'];
                                      $empEntity = $row['empEntity'];
                                      $lineManager = $row['lineManager'];
                                      $empCountry = $row['empCountry'];
                                      $empCity = $row['empCity'];
                                      $empAddress = $row['empAddress'];
                                      $empDOJ = $row['empDOJ'];
                                      $empWorkEmail = $row['empWorkEmail'];
                                      $empGender = $row['empGender'];
                                      $leavePckg = $row['leavePckg'];
                                      $savedStatus = $row['savedStatus'];
                                      //$empNo=$row['empNo'];
          
                                  ?>
                                  <tr id="<?php echo $empNo; ?>">
                                    <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $row['empNo'] .' " /></td>'; ?>
                                    <?php
                                            if ($empNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empNo; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empFName_em == 1)
                                            {
                                            ?>
                                            <td><a href="hr_add_emp_info_U.php?empNo=<?php echo $row['empNo']; ?>"><?php echo $empFName; ?></a></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empMName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empMName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empLName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empLName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empName_em == 1)
                                            {
                                            ?>
                                            <td><a href="hr_add_emp_info_U.php?empNo=<?php echo $row['empNo']; ?>"><?php echo $empName; ?></a></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empGrdName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGrdName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empCell_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCell; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <!-- <?php
                                            if ($empOffice_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empOffice; ?></td>
                                            <?php
                                            }
                                            ?> -->
                                            <?php
                                            if ($empHomeNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empHomeNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empEmergencyNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empEmergencyNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($emergRel_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $emergRel; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empWorkEmail_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empWorkEmail; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDept_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDept; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDesig_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDesig; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empEntity_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empEntity; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empGrade_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGrade; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDOB_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDOB; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDOJ_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDOJ; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($leavePckg_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $leavePckg; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($ntnNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $ntnNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($cnicNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $cnicNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empGender_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGender; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php

                                            if ($empAddress_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empAddress; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empCity_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCity; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empCountry_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCountry; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($lineManager_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $lineManager; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <!-- <?php
                                            if ($empSpouseName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empSpouseName; ?></td>
                                            <?php
                                            }
                                            ?> -->
                                            <!-- <?php
                                            if ($empChildren_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empChildren; ?></td>
                                            <?php
                                            }
                                            ?> -->
                                            <?php
                                            if ($empMaritalStatus_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empMaritalStatus; ?></td>
                                            <?php
                                            }
                                            ?>

                                  <td><a href="hr_add_emp_info_U.php?empNo=<?php echo $row['empNo']; ?>">View</td>
                                  <td><a href="hr_add_emp_info_UE.php?empNo=<?php echo $row['empNo']; ?>">Edit</td>
                                  <td><a href="#" data-toggle="modal" data-target="#deleteTable_C2" >Delete</td>

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
  location.replace("hr_add_emp_info.php")
}
</script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>