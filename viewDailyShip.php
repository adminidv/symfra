<?php

include 'manage/connection.php';
include("manage/session.php");
$advSearch = 'Hide';
$ribbon = 'Default';
$subRibbon = 'showUser';
$Quick = 'UnHide';
$Quickhr = '';

if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $shipDate_cus = 0;
  $shipDay_cus = 0;
  $shipperName_cus = 0;
  $awbNo_cus = 0;
  $shipAirline_cus = 0;
  $shipPcs_cus = 0;
  $shipWeight_cus = 0;
  $finalPcs_cus = 0;
  $f_GrWeight_cus = 0;
  $f_ChWeight_cus = 0;
  $shipDest_cus = 0;
  $shipHAWB_cus = 0;
  $shipStatus_cus = 0;

  // Setting variables if 1
  if (isset($_POST['shipDate_cus']))
  {
    $shipDate_cus = 1;
  }
  if (isset($_POST['shipDay_cus']))
  {
    $shipDay_cus = 1;
  }
  if (isset($_POST['shipDay_cus']))
  {
    $shipDay_cus = 1;
  }
  if (isset($_POST['awbNo_cus']))
  {
    $awbNo_cus = 1;
  }
  if (isset($_POST['shipAirline_cus']))
  {
    $shipAirline_cus = 1;
  }
  if (isset($_POST['shipPcs_cus']))
  {
    $shipPcs_cus = 1;
  }
  if (isset($_POST['shipWeight_cus']))
  {
    $shipWeight_cus = 1;
  }
  if (isset($_POST['finalPcs_cus']))
  {
    $finalPcs_cus = 1;
  }
  if (isset($_POST['f_GrWeight_cus']))
  {
    $f_GrWeight_cus = 1;
  }
  if (isset($_POST['f_ChWeight_cus']))
  {
    $f_ChWeight_cus = 1;
  }
  if (isset($_POST['shipDest_cus']))
  {
    $shipDest_cus = 1;
  }
  if (isset($_POST['shipHAWB_cus']))
  {
    $shipHAWB_cus = 1;
  }
  if (isset($_POST['shipStatus_cus']))
  {
    $shipStatus_cus = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE expectedship_cus SET shipDate_cus = '$shipDate_cus', shipDay_cus='$shipDay_cus', shipperName_cus='$shipperName_cus', awbNo_cus='$awbNo_cus', shipAirline_cus='$shipAirline_cus', shipPcs_cus='$shipPcs_cus', shipWeight_cus='$shipWeight_cus', finalPcs_cus='$finalPcs_cus', f_GrWeight_cus='$f_GrWeight_cus', f_ChWeight_cus='$f_ChWeight_cus', shipDest_cus='$shipDest_cus', shipHAWB_cus='$shipHAWB_cus', shipStatus_cus='$shipStatus_cus' WHERE SrNo= '1' ");

  $clause = " WHERE ";//Initial clause
  $searchRecord = "SELECT * FROM expectedship";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
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
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');
}

else if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    mysqli_query($con, "DELETE FROM users WHERE user_ID = '$val' ");
  }

  $clause = " WHERE ";//Initial clause
  $searchRecord = "SELECT * FROM expectedship";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
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
  $searchQuery = mysqli_query($con, $searchRecord);
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
    $searchRecord = "SELECT * FROM expectedship";

        // if user is giving the middle name
        if(!empty($_POST['user_mName']))
        {
            $user_mName = $_POST['user_mName'];
            $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
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
    $searchQuery = mysqli_query($con, $searchRecord);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "usertable.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord = "SELECT * FROM expectedship";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
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
  $searchQuery = mysqli_query($con, $searchRecord);

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: dailyShip_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("dailyShip_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("dailyShip_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord = "SELECT * FROM expectedship";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
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
  $searchRecord = "SELECT * FROM expectedship";
  $searchQuery = mysqli_query($con, $searchRecord);
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Expected Shipment</title>
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
          <a href="usermodules.php" class="btn btn-info">User Management</a>
          <a href="viewDailyShip.php" class="btn btn-info active">Show Users</a>
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
          <button type="button" id="btnNewUser" onclick="newUser();">New User</button>
				</div>
			</div>

			<div class="col-md-12">
				<div class="user_table-title">
					<h4>Daily Expected Shipments</h4>
				</div>
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM expectedship_cus');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $shipDate_cus = $rowUM['shipDate_cus'];
            $shipDay_cus = $rowUM['shipDay_cus'];
            $shipperName_cus= $rowUM['shipperName_cus'];
            $awbNo_cus = $rowUM['awbNo_cus'];
            $shipAirline_cus = $rowUM['shipAirline_cus'];
            $shipPcs_cus= $rowUM['shipPcs_cus'];
            $shipWeight_cus = $rowUM['shipWeight_cus'];
            $finalPcs_cus = $rowUM['finalPcs_cus'];
            $f_GrWeight_cus = $rowUM['f_GrWeight_cus'];
            $f_ChWeight_cus = $rowUM['f_ChWeight_cus'];
            $shipDest_cus = $rowUM['shipDest_cus'];
            $shipHAWB_cus = $rowUM['shipHAWB_cus'];
            $shipStatus_cus = $rowUM['shipStatus_cus'];
          }

          ?>
          <div class="modal fade symfra_popup3" id="customTable" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select fields to view on Table</h4>
                          </div>
                          <div class="modal-body">
                            
                              <?php

                              echo '<div class="col-md-4">';
                              if ($shipDate_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipDate_cus" checked> <label>Ship Date</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipDate_cus" > <label>Ship Date</label> <br>';
                              }

                              if ($shipDay_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipDay_cus" checked> <label>Ship Day</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipDay_cus" > <label>Ship Day</label> <br>';
                              }

                              if ($shipperName_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipperName_cus" checked> <label>Shipper Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipperName_cus" > <label>Shipper Name</label> <br>';
                              }

                              if ($awbNo_cus == 1)
                              {
                                echo '<input type="checkbox" name="awbNo_cus" checked> <label>AWB No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="awbNo_cus" > <label>AWB No.</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                              if ($shipAirline_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipAirline_cus" checked> <label>Airline</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipAirline_cus" > <label>Airline</label> <br>';
                              }

                              if ($shipPcs_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipPcs_cus" checked> <label>Pcs.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipPcs_cus" > <label>Pcs.</label> <br>';
                              }

                              if ($shipWeight_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipWeight_cus" checked> <label>Grs. Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipWeight_cus" > <label>Grs. Weight</label> <br>';
                              }

                              if ($finalPcs_cus == 1)
                              {
                                echo '<input type="checkbox" name="finalPcs_cus" checked> <label>Final Pcs.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="finalPcs_cus" > <label>Final Pcs.</label> <br>';
                              }
                              echo '</div>';

                              if ($f_GrWeight_cus == 1)
                              {
                                echo '<input type="checkbox" name="f_GrWeight_cus" checked> <label>Grs. Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="f_GrWeight_cus" > <label>Grs. Weight</label> <br>';
                              }

                              if ($f_ChWeight_cus == 1)
                              {
                                echo '<input type="checkbox" name="f_ChWeight_cus" checked> <label>Final Ch. Weight</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="f_ChWeight_cus" > <label>Final Ch. Weight</label> <br>';
                              }

                              if ($shipDest_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipDest_cus" checked> <label>Destination</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipDest_cus" > <label>Destination</label> <br>';
                              }

                              if ($shipHAWB_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipHAWB_cus" checked> <label>AWB No.</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipHAWB_cus" > <label>AWB No.</label> <br>';
                              }

                              if ($shipStatus_cus == 1)
                              {
                                echo '<input type="checkbox" name="shipStatus_cus" checked> <label>Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="shipStatus_cus" > <label>Status</label> <br>';
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
                    <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Delete</button></li>
                    
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
                                  if ($shipDate_cus == 1)
                                  {
                                  ?>
                                  <th>Ship Date</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipDay_cus == 1)
                                  {
                                  ?>
                                  <th>Ship Day</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipperName_cus == 1)
                                  {
                                  ?>
                                  <th>Shipper Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($awbNo_cus == 1)
                                  {
                                  ?>
                                  <th>AWB No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipAirline_cus == 1)
                                  {
                                  ?>
                                  <th>Airline</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipPcs_cus == 1)
                                  {
                                  ?>
                                  <th>Pcs.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipWeight_cus == 1)
                                  {
                                  ?>
                                  <th>Weight</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($finalPcs_cus == 1)
                                  {
                                  ?>
                                  <th>Final Pcs.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($f_GrWeight_cus == 1)
                                  {
                                  ?>
                                  <th>Final Gr. Weight</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($f_ChWeight_cus == 1)
                                  {
                                  ?>
                                  <th>Final Ch. Weight</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipDest_cus == 1)
                                  {
                                  ?>
                                  <th>Destination</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipHAWB_cus == 1)
                                  {
                                  ?>
                                  <th>HAWB</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($shipStatus_cus == 1)
                                  {
                                  ?>
                                  <th>Status</th>
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

                                                          while ($searchRow= mysqli_fetch_array($searchQuery))
                                                          {
                                                            $shipDate = $searchRow['shipDate'];
                                                            $shipDay = $searchRow['shipDay'];
                                                            $shipperName = $searchRow['shipperName'];
                                                            $awbNo = $searchRow['awbNo'];
                                                            $shipAirline = $searchRow['shipAirline'];
                                                            $shipPcs = $searchRow['shipPcs'];
                                                            $shipWeight = $searchRow['shipWeight'];
                                                            $finalPcs = $searchRow['finalPcs'];
                                                            $f_GrWeight = $searchRow['f_GrWeight'];
                                                            $f_ChWeight = $searchRow['f_ChWeight'];
                                                            $shipDest = $searchRow['shipDest'];
                                                            $shipHAWB = $searchRow['shipHAWB'];
                                                            $shipStatus = $searchRow['shipStatus'];
                                                            $id = $searchRow['SrNo'];

                                                        ?>

                                                          <tr id="<?php echo $id; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $searchRow['SrNo'] .' " /></td>'; ?>
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->
                                                            <?php
                                                            if ($shipDate_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipDate; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipDay_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipDay; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipperName_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipperName; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($awbNo_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awbNo; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipAirline_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipAirline; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipPcs_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipPcs; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipWeight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipWeight; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($finalPcs_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $finalPcs; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($f_GrWeight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $f_GrWeight; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($f_ChWeight_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $f_ChWeight; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipDest_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipDest; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipHAWB_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipHAWB; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($shipStatus_cus == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $shipStatus; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><a href="#">View</td>
                                                            <td><a href="#">Edit</td>
                                                            <td><a href="#">Deactivate</td>
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
         url: 'deleteUserCode.php?user_id=<?php echo $id; ?>',
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

<script src="js/bootstrap.min.js"></script>

</body>
</html>