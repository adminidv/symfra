<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'hide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';



if(isset($_POST["btnCustom_U"]))
{
    $SrNo_lm= 0;
    $empID_lm = 0;
    $weekDate_lm = 0;
    $leaveType_lm = 0;
    $hoursTaken_lm = 0;
    $approvedBy_lm = 0;
    $cancelled_by_lm = 0;
    $dept_lm = 0;
    $desg_lm = 0;
    $status_lm = 0;
   

  // Setting variables if 1
  if (isset($_POST['SrNo_lm']))
  {
    $SrNo_lm = 1;
  }
  if (isset($_POST['empID_lm']))
  {
    $empID_lm = 1;
  }
  if (isset($_POST['weekDate_lm']))
  {
    $weekDate_lm = 1;
  }
  if (isset($_POST['leaveType_lm']))
  {
    $leaveType_lm = 1;
  }
  if (isset($_POST['hoursTaken_lm']))
  {
    $hoursTaken_lm = 1;
  }
  if (isset($_POST['approvedBy_lm']))
  {
    $approvedBy_lm = 1;
  }
  if (isset($_POST['cancelled_by_lm']))
  {
    $cancelled_by_lm = 1;
  }
  if (isset($_POST['dept_lm']))
  {
    $dept_lm = 1;
  }
  if (isset($_POST['desg_lm']))
  {
    $desg_lm = 1;
  }
  if (isset($_POST['status_lm']))
  {
    $status_lm = 1;
  }
 

  $updateUM = mysqli_query($con, "UPDATE  leavecustom SET empID_lm='$empID_lm', weekDate_lm='$weekDate_lm', leaveType_lm='$leaveType_lm', hoursTaken_lm='$hoursTaken_lm', approvedBy_lm='$approvedBy_lm', cancelled_by_lm ='$cancelled_by_lm', dept_lm='$dept_lm ', desg_lm='$desg_lm', status_lm='$status_lm' WHERE SrNo_lm= '1' ") or die(mysqli_error($con)); 

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `  empinfo`  ";

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

// else if(isset($_POST["btnDelete"]))
// {
//   $id = $_POST['user_check'];
//   while (list($key, $val) = @each ($id))
//   {
//     mysqli_query($con, "DELETE FROM empinfo WHERE empNo = '$val' ");
//   }

//   $clause = " WHERE ";//Initial clause
//   $searchRecord="SELECT * FROM `empinfo`  ";

//       // if user is giving the first name
//       if(!empty($_POST['empFName']))
//       {
//           $empFName = $_POST['empFName'];
//           $searchRecord .= $clause."`empFName` LIKE '%$empFName%'";
//           $empFNameStatus = 1;
//       }
//       else
//       {
//         $empFNameStatus = 0;
//       }

//       // if user is giving the middle name
//       if(!empty($_POST['empLName']))
//       {
//           if($empFNameStatus == 1)
//           {
//             $clause = " AND ";
//           }
//           $empLName = $_POST['empLName'];
//           $searchRecord .= $clause."`empLName` LIKE '%$empLName%'";
//           $empLNameStatus = 1;
//       }
//       else
//       {
//         $empLNameStatus = 0;
//       }

//       // if user is selecting any department
//       if(!empty($_POST['empDept']))
//       {
//           if($empLNameStatus == 1 OR $empFNameStatus == 1)
//           {
//             $clause = " AND ";
//           }
//           foreach($_POST['empDept'] as $c)
//           {
//               if(!empty($c)){
//                   $searchRecord .= $clause."`empDept` = '{$c}'";
//                   $clause = " OR ";
//               }   
//           }
//           $empDeptStatus = 1;
//       }
//       else
//       {
//         $empDeptStatus = 0;
//       }

//       // if user is selecting any designation
//       if(!empty($_POST['empDesig']))
//       {
//           if($empDeptStatus == 1 OR $empFNameStatus == 1 OR $empLNameStatus == 1)
//           {
//             $clause = " AND ";
//           }
//           foreach($_POST['empDesig'] as $d)
//           {
//               if(!empty($d))
//               {
//                   $searchRecord .= $clause."`empDesig` LIKE '%{$d}%'";
//                   $clause = " OR ";
//               }   
//           }
//       }
//       else
//       {
//         // echo "Nothing Selected.";
//       }
//   // echo $sql; //Remove after testing
//   $searchQuery = mysqli_query($con, $searchRecord);
//   // header('Location: usertable.php');


if(isset($_POST["btnEdit"]))
{
  $lineManager = $_POST['dept_ID_E'];
  $can_reason = $_POST['can_reason'];
  $id = $_POST['user_check'];
 while (list($key, $val) = @each ($id))
  {
 $updateQuery = mysqli_query($con, "UPDATE leavemanagement SET cancelled_by='$lineManager',can_reason='$can_reason',status ='cancelled' WHERE SrNo='$val' ") or die(mysqli_error($con)); 
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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');
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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');

  
   if(isset($_POST["btnExport_D"]))
{
  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: excelleave.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("csvleave.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pdfleave.php?searchRecord=$searchRecord");</script>';
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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');
  // echo $searchRecord;
}




//multi cancel
// if(isset($_POST["btnEdit"]))
// {
//   $lineManager = $_POST['dept_ID_E'];
//   $can_reason = $_POST['can_reason'];
//   $id = $_POST['user_check'];
//  while (list($key, $val) = @each ($id))
//   {
//  $updateQuery = mysqli_query($con, "UPDATE leavemanagement SET cancelled_by='$lineManager',can_reason='$can_reason',status ='cancelled' WHERE SrNo='$val' ") or die(mysqli_error($con)); 
// }
}
// if(isset($_POST["btnEdit"]))
// {
//   $dept_ID_E = $_POST['dept_ID_E'];
//   $desig_ID_E = $_POST['desig_ID_E'];
//   $id = $_POST['user_check'];
//   while (list($key, $val) = @each ($id))
//   {
//     if ($dept_ID_E != "Select" && $desig_ID_E != "Select")
//     {
//       mysqli_query($con, "UPDATE users SET dept_ID='$dept_ID_E', desig_ID='$desig_ID_E' WHERE user_ID = '$val' ");
//     }

// if(isset($_POST["btnDelete"]))
// {
//   $id = $_POST['user_check'];
//   while (list($key, $val) = @each ($id))
//   {
//     mysqli_query($con, "DELETE FROM roles WHERE role_ID = '$val' ");
//   }
// }

 // Export


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
#dpttable ul li {
   list-style: none;
   display: inline-block;
}
.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#dpttable_length {
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

           <?php include 'sidebar_widgets/adv_leave_bar.php'; ?>
           
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<form action="" method="POST">
  <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM  leavecustom');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $empID_lm = $rowUM['empID_lm'];
            $weekDate_lm = $rowUM['weekDate_lm'];
            $leaveType_lm = $rowUM['leaveType_lm'];
            $hoursTaken_lm = $rowUM['hoursTaken_lm'];
            $approvedBy_lm = $rowUM['approvedBy_lm'];
            $cancelled_by_lm = $rowUM['cancelled_by_lm'];
            $dept_lm = $rowUM['dept_lm'];
            $desg_lm = $rowUM['desg_lm'];
            $status_lm = $rowUM['status_lm'];
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
                              if ($empID_lm == 1)
                              {
                                echo '<input type="checkbox" name="empID_lm" checked> <label>Emp Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="empID_lm" > <label>Emp Name</label> <br>';
                              }

                              if ($weekDate_lm == 1)
                              {
                                echo '<input type="checkbox" name="weekDate_lm" checked> <label>Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="weekDate_lm" > <label>Date</label> <br>';
                              }

                              if ($leaveType_lm == 1)
                              {
                                echo '<input type="checkbox" name="leaveType_lm" checked> <label>leave Type</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="leaveType_lm" > <label>leave Type</label> <br>';
                              }

                              if ($hoursTaken_lm == 1)
                              {
                                echo '<input type="checkbox" name="hoursTaken_lm" checked> <label>Hours</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="hoursTaken_lm" > <label>Hours</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                              if ($approvedBy_lm == 1)
                              {
                                echo '<input type="checkbox" name="approvedBy_lm" checked> <label>Approved By</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="approvedBy_lm" > <label>Approved By</label> <br>';
                              }

                              if ($cancelled_by_lm == 1)
                              {
                                echo '<input type="checkbox" name="cancelled_by_lm" checked> <label>Cancelled By</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="cancelled_by_lm" > <label>Cancelled By</label> <br>';
                              }

                              if ($dept_lm == 1)
                              {
                                echo '<input type="checkbox" name="dept_lm" checked> <label>Deptartment</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="dept_lm" > <label>Deptartment</label> <br>';
                              }

                              if ($desg_lm == 1)
                              {
                                echo '<input type="checkbox" name="desg_lm" checked> <label>Desigination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="desg_lm" > <label>Desigination</label> <br>';
                              }
                              echo '</div>';

                              if ($status_lm == 1)
                              {
                                echo '<input type="checkbox" name="status_lm" checked> <label>Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="status_lm" > <label>Status</label> <br>';
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
<div class="leave-manage-sec  main_widget_box ">
  

      <div class="form_sec_action_btn col-md-12">
         <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
         </div>
          <button type="button" id="btnAddEmp" onclick="addrole();">  <small>Add role</small></button>
      </div>

      <div class="col-md-12">
            <div class="user_table-title">
              <h4>Employee Info Table</h4>
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

      
      <!-- <div class="confirmTable-modal modal fade" id="deleteTable_C" role="dialog">
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
      </div> -->

      <!-- <div class="confirmTable2-modal modal fade" id="deleteTable_C2" role="dialog">
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
      </div> -->
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
                      <label>Cancelled By</label>  
                      <select name="dept_ID_E" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectDept_E = mysqli_query($con, "select * from empinfo");

                            while ($rowDept_E = mysqli_fetch_array($selectDept_E))
                            {
                              echo '<option value="'.$rowDept_E['lineManager'].'">'.$rowDept_E['lineManager'].'</option>';
                            }

                            ?>

                      </select>  
                  </div>
                  <div class="input-fields"> 
                      <label>Reason</label>  
                       <input type="text" name="can_reason">
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


  

      <div class="leave-manage-sec-table widget_iner_box ">

        <div class="tbleDrpdown">
             <div id="tblebtn">
                <ul>
                  <li><button type="button" id="myBtn"> <i class="fa fa-pencil"></i> Edit</button></li>
                  
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printleave.php" target="_blank"> Print</a></button></li>                     
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                  <li><button type="button" id="popup_1btn"><i class="fa fa-table"></i>  Table Customization</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                   
                                  <?php
                                  if ($empID_lm == 1)
                                  {
                                  ?>
                                  <th>Emp Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($weekDate_lm == 1)
                                  {
                                  ?>
                                  <th>Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($leaveType_lm == 1)
                                  {
                                  ?>
                                  <th>Leave Table</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($hoursTaken_lm == 1)
                                  {
                                  ?>
                                  <th>Hours</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($approvedBy_lm == 1)
                                  {
                                  ?>
                                  <th>Approved By.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cancelled_by_lm == 1)
                                  {
                                  ?>
                                  <th>Cancelled By</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($dept_lm == 1)
                                  {
                                  ?>
                                  <th>Department</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($desg_lm == 1)
                                  {
                                  ?>
                                  <th>Desigination</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($status_lm == 1)
                                  {
                                  ?>
                                  <th>Status</th>
                                  <?php
                                  }
                                  ?>

                                 
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Cancel</th>

                                   </tr>
                        </thead>
                        <tbody>



                          <?php

                              include 'manage/connection.php';

                              $selectleave = mysqli_query($con, "select * from  leavemanagement ");

                              ?>
                          <?php

                                while ($rowleave = mysqli_fetch_array($selectleave))
                                {
                                  $id = $rowleave['SrNo'];


                                ?>
                        <tr id="<?php echo $id; ?>">
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowleave['SrNo'] .' " /></td>'; ?>
                          
                          <?php
                                  if ($empID_lm == 1)
                                  {
                                  ?>
                                  <td><a href="cancel_leave_V.php?SrNo=<?php echo $rowleave['SrNo']; ?>"><?php echo $rowleave['empID']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($weekDate_lm == 1)
                                  {
                                  ?>
                                 <td><?php echo $rowleave['weekDate']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($leaveType_lm == 1)
                                  {
                                  ?>
                                  <td><?php echo $rowleave['leaveType']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($hoursTaken_lm == 1)
                                  {
                                  ?>
                                  <td><?php echo $rowleave['hoursTaken']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($approvedBy_lm == 1)
                                  {
                                  ?>
                                  <td><?php echo $rowleave['approvedBy']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($cancelled_by_lm == 1)
                                  {
                                  ?>
                                  <td><?php echo $rowleave['cancelled_by']; ?></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($dept_lm == 1)
                                  {
                                  ?>
                                  <td></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($desg_lm == 1)
                                  {
                                  ?>
                                  <td></td>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($status_lm == 1)
                                  {
                                  ?>
                                  <td><?php echo $rowleave['status']; ?></td>
                                  <?php
                                  }
                                  ?>
                          
                          <td><a href="cancel_leave_V.php?SrNo=<?php echo $rowleave['SrNo']; ?>">View</td>
                          <td><a href="cancel_leave_VE.php?SrNo=<?php echo $rowleave['SrNo']; ?>">Edit</td>
                          <td><a href="cancel_leave_cancel.php?SrNo=<?php echo $rowleave['SrNo']; ?>">Cancel</td>
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
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>





<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>



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
function addrole() {
  location.replace("add_role.php")
}
</script>

<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteroleCode_U.php?role_ID=<?php echo $role_ID; ?>',
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

<script>

  $(document).ready(function() {
    $('#dpttable').DataTable({
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
  $("#popup_1btn").click(function(){
    $("#customTable").modal();
  });
});
</script>





<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>


</body>
</html>