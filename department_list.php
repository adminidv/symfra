<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

if(isset($_POST["btnCustom_U"]))
{
    $empNo_em= 0;
    $cnicNo_em = 0;
    $ntnNo_em = 0;
    $empName_em = 0;
    $empGrdName_em = 0;
    $empDOB_em = 0;
    $empCell_em = 0;
    $empOffice_em = 0;
    $empHomeNo_em = 0;
    $empEmergencyNo_em = 0;
    $empMaritalStatus_em = 0;
    $empSpouseName_em = 0;
    $empChildren_em = 0;
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

  // Declaring variables
  // $userID_UM = 0;
  // $userName_UM = 0;
  // $userAddress_UM = 0;
  // $userContact_UM = 0;
  // $userEmail_UM = 0;
  // $userDept_UM = 0;
  // $userDesig_UM = 0;
  // $userRole_UM = 0;
  // $userRegion_UM = 0;
  // $userDOB_UM = 0;
  // $userDOJ_UM = 0;
  // $userDOL_UM = 0;

  // Setting variables if 1
  if (isset($_POST['empNo_em']))
  {
    $empNo_em = 1;
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
  if (isset($_POST['empOffice_em']))
  {
    $empOffice_em = 1;
  }
  if (isset($_POST['empHomeNo_em']))
  {
    $empHomeNo_em = 1;
  }
  if (isset($_POST['empEmergencyNo_em']))
  {
    $empEmergencyNo_em = 1;
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
  if (isset($_POST['empSpouseName_em']))
  {
    $empSpouseName_em = 1;
  }
  if (isset($_POST['empChildren_em']))
  {
    $empChildren_em = 1;
  }
  if (isset($_POST['empMaritalStatus_em']))
  {
    $empMaritalStatus_em = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE table_em SET empNo_em = '$empNo_em', empName_em='$empName_em', empGrdName_em='$empGrdName_em', empAddress_em ='$empAddress_em', empCell_em='$empCell_em', empOffice_em='$empOffice_em', empHomeNo_em='$empHomeNo_em', empEmergencyNo_em='$empEmergencyNo_em', cnicNo_em='$cnicNo_em', empDept_em='$empDept_em', empDesig_em='$empDesig_em', ntnNo_em='$ntnNo_em',empDOB_em='$empDOB_em', empDOJ_em='$empDOJ_em', empMaritalStatus_em='$empMaritalStatus_em', empSpouseName_em='$empSpouseName_em', empChildren_em='$empChildren_em', empGrade_em='$empGrade_em', empEntity_em='$empEntity_em' , lineManager_em='$lineManager_em', empCountry_em='$empCountry_em', empCity_em='$empCity_em', empWorkEmail_em='$empWorkEmail_em', empGender_em='$empGender_em', leavePckg_em='$leavePckg_em' WHERE SrNo= '1' ") or die(mysqli_error($con)); 

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the m name
      if(!empty($_POST['empName']))
      {
          $empName = $_POST['empName'];
          $searchRecord .= $clause."`empName` LIKE '%$empName%'";
          $empName = 1;
      }
      else
      {
        $empName = 0;
      }

      // // if user is giving the  name
      // if(!empty($_POST['empName']))
      // {
      //     if($empGrdName == 1)
      //     {
      //       $clause = " AND ";
      //     }
      //     $empGrdName = $_POST['empGrdName'];
      //     $searchRecord .= $clause."`empGrdName` LIKE '%$empGrdName%'";
      //     $empGrdName = 1;
      // }
      // else
      // {
      //   $empGrdName = 0;
      // }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empName == 1)
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
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($deptStatus == 1  OR $empName == 1)
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
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the middle name
      if(!empty($_POST['empName']))
      {
          $empName = $_POST['empName'];
          $searchRecord .= $clause."`empName` LIKE '%$empName%'";
          $empName = 1;
      }
      else
      {
        $empName = 0;
      }

      // // if user is giving the first name
      // if(!empty($_POST['user_fName']))
      // {
      //     if($user_mName == 1)
      //     {
      //       $clause = " AND ";
      //     }
      //     $user_fName = $_POST['user_fName'];
      //     $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
      //     $fNameStatus = 1;
      // }
      // else
      // {
      //   $fNameStatus = 0;
      // }

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if($empName == 1)
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
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($deptStatus == 1 OR $empName == 1)
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
}

else if(isset($_POST["btnEdit"]))
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

      // if user is giving the middle name
      if(!empty($_POST['empName']))
      {
          $empName = $_POST['empName'];
          $searchRecord .= $clause."`empName` LIKE '%$empName%'";
          $empName = 1;
      }
      else
      {
        $empName = 0;
      }

      

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if(  $empName == 1)
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
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($deptStatus == 1 OR empName == 1)
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
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the middle name
      if(!empty($_POST['empName']))
      {
          $empName = $_POST['empName'];
          $searchRecord .= $clause."`empName` LIKE '%$empName%'";
          $empName = 1;
      }
      else
      {
        $empName = 0;
      }

      

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if( $empName == 1)
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
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($deptStatus == 1  OR $empName == 1)
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
  $searchRecord="SELECT * FROM `empinfo`  ";

      // if user is giving the middle name
      if(!empty($_POST['empName']))
      {
          $empName = $_POST['empName'];
          $searchRecord .= $clause."`empName` LIKE '%$empName%'";
          $empName = 1;
      }
      else
      {
        $empName = 0;
      }

      

      // if user is selecting any department
      if(!empty($_POST['empDept']))
      {
          if( $empName == 1)
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
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['empDesig']))
      {
          if($deptStatus == 1  OR $empName == 1)
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
<!-- <script type="text/javascript">
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
  </script> -->
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="#" class="btn btn-info active">Show Employees</a>
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
          

      <div class="modal fade symfra_popup3" id="customTable" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select Fields to view on Table</h4>
                          </div>
                          <div class="modal-body">
                            
                             
                          
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
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printtable_em.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                  <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li>

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                  <th><input type="checkbox">Select All </th>
                                  <th>Depart ID</th>
                                  <th>Depart ID</th>
                                  <th>Depart ID</th>
                                  <th>Depart ID</th>
                                  <th>Depart ID</th>
                                  <th>Depart ID</th>

                                   </tr>
                        </thead>
                        <tbody>           
                                   <tr>
                                     <td>asdasd</td>
                                     <td>as</td>
                                     <td>assssssssa</td>
                                     <td>aaaaaaaa</td>
                                     <td>aaaaaaaaa</td>
                                     <td>ccccccccc</td>
                                     <td>ccccccc</td>


                                   </tr>
                        </tbody>
      </table>
      </form>    
    </div>
  
</div>

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

<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteUserCode.php?empNo=<?php echo $empNo; ?>',
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