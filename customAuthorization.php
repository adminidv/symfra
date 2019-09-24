<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

$user_id = $_GET['user_id'];

if ($user_id != 0)
{
  $selectUserAuth = mysqli_query($con, "SELECT * from users WHERE user_ID='$user_id' ");
  while ($rowUserAuth = mysqli_fetch_array($selectUserAuth))
  {
    $Auth_ID = $rowUserAuth['Auth_ID'];
    $desigID = $rowUserAuth['desig_ID'];
    $departID = $rowUserAuth['dept_ID'];
  }

  $selectDesig = mysqli_query($con, "SELECT * from designation WHERE Desig_ID='$desigID' ");
  while ($rowDesig = mysqli_fetch_array($selectDesig))
  {
    $userDesig = $rowDesig['Desig_name'];
  }

  $selectDepart = mysqli_query($con, "SELECT * from department WHERE dept_ID='$departID' ");
  while ($rowDepart = mysqli_fetch_array($selectDepart))
  {
    $userDepart = $rowDepart['dept_name'];
  }

  // Fetching Authorization details
  $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
  while ($rowAuth = mysqli_fetch_array($selectAuth))
  {
    $auth_Name = $rowAuth['auth_Name'];
  }

}

else
{

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Custom Role</title>
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
  <script src="/js/jquery-1.12.4.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
<style type="text/css">
.authtable_subhdingnRow {
background-color: #c1c1c1 !important;

}
.authtable_subhdingnRow th {
background-color: #c1c1c1 !important;

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
          <a href="usermodules.php" class="btn btn-info">Roles</a>
          <a href="#" class="btn btn-info active">Custom Role</a>
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

<div class=" add_user_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
		<form action="" method="POST" enctype="multipart/form-data">

	       <!-- Modal Two-->
	       <div class="modal fade confirmTable-modal" id="submitModal" role="dialog">
	            <div class="modal-dialog">
	              <!-- Modal content-->
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Confirmation</h4>
	                </div>
	                <div class="modal-body">
	                  <p>Are You Sure You Want to Submit?</p>
	                  <button type="submit" name="btnYes" id="btnYes">Yes</button>
	                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

	                </div>
	                <div class="modal-footer">
	                  <p>Add Related content if needed</p>
	                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	                </div>
	              </div>
	            </div>
	       </div>

      
			 <label id="formSummary" style="color: red;"></label>

				<div class="Bsic_usr_info widget_iner_box">

								<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
						                      <!-- Go back button code starting here -->
						                      <?php include('inc_widgets/backBtn.php'); ?>
						                      <!-- Go back button code ending here -->
										</div>
										<button type="button" id="btnSubmimt" onclick="submitMod_F();"> <small>Submit</small></button>
										<button type="button" name="submitBtn"> <small>Cancel</small></button>				
								</div>
												
												<div class="cls"></div>

								 <div class="col-md-6">

                                                <div class="input-label"><label >User</label></div>
                                                <div class="input-feild">
                                                  <?php
                                                  if ($user_id != 0)
                                                  {
                                                  ?>
                                                  <select name="authUser" id="authUser" disabled onchange="fetchRole();">
                                                  <?php
                                                  }
                                                  else
                                                  {
                                                  ?>
                                                  <select name="authUser" id="authUser" onchange="fetchRole();">
                                                    <option value="">Select</option>
                                                  <?php
                                                  }
                                                  ?>
                                                  
                                                     <?php

                                                     if ($user_id != 0)
                                                     {
                                                      $selectUsers = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$user_id'");
                                                       while ($rowUsers = mysqli_fetch_array($selectUsers))
                                                       {
                                                        echo '<option value="'.$rowUsers["user_ID"].'">'.$rowUsers["user_fName"] . ' ' . $rowUsers["user_lName"].'</option>';
                                                       }
                                                     }

                                                     $selectUsers2 = mysqli_query($con, "SELECT * FROM users");
                                                     while ($rowUsers2 = mysqli_fetch_array($selectUsers2))
                                                     {
                                                      echo '<option value="'.$rowUsers2["user_ID"].'">'.$rowUsers2["user_fName"] . ' ' . $rowUsers2["user_lName"].'</option>';
                                                     }

                                                     ?>

                                                  </select>
                                                </div>

                                                <div class="input-label"><label >Role</label></div>
                                                <div class="input-feild">
                                                  <select name="auth_Name" id="auth_Name" disabled>
                                                    <option value="">Select</option>
                                                     <?php

                                                     if ($user_id != 0)
                                                     {
                                                      $selectAuth2 = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                      while ($rowAuth2 = mysqli_fetch_array($selectAuth2))
                                                      {
                                                        $auth_Name2 = $rowAuth2['auth_Name'];
                                                        echo '<option value="'.$Auth_ID.'">'.$auth_Name2.'</option>';
                                                      }
                                                     }

                                                      $selectAuth3 = mysqli_query($con, "SELECT * FROM authdetails ");
                                                      while ($rowAuth3 = mysqli_fetch_array($selectAuth3))
                                                      {
                                                        $auth_id3 = $rowAuth3['SrNo'];
                                                        $auth_Name3 = $rowAuth3['auth_Name'];
                                                        echo '<option value="'.$auth_id3.'">'.$auth_Name3.'</option>';
                                                      }

                                                     ?>

                                                  </select>
                                                </div>

                                                <div class="input-label"><label >Designation </label></div>
                                                <div class="input-feild">
                                                  <?php
                                                  if ($user_id != 0)
                                                  {
                                                  ?>
                                                    <input type="text" name="userDesig" id="userDesig" disabled value="<?php echo $userDesig; ?>">
                                                  <?php
                                                  }
                                                  else
                                                  {
                                                  ?>
                                                    <input type="text" name="userDesig" id="userDesig" disabled >
                                                  <?php
                                                  }
                                                  ?>
                                                
                                                </div>

                                                <div class="input-label"><label >Department </label></div>
                                                <div class="input-feild">
                                                  <?php
                                                  if ($user_id != 0)
                                                  {
                                                  ?>
                                                    <input type="text" name="userDepart" id="userDepart" disabled value="<?php echo $auth_Name; ?>">
                                                  <?php
                                                  }
                                                  else
                                                  {
                                                  ?>
                                                    <input type="text" name="userDepart" id="userDepart" disabled>
                                                  <?php
                                                  }
                                                  ?>
                                                
                                                </div>

                                                <input type="button" value="Custom Role" onclick="JavaScript:return allowCustom();" />

                                                </div>
                                 </div>



                                  <?php
                                  if($user_id != 0)
                                  {
                                  ?>
                                <table  id="authtable" class="display nowrap no-footer" style="width:100%">
                                  <thead>
                                            <tr colspan="">
                                              <th></th>
                                              <th>View</th>
                                              <th>Add</th>
                                              <th>Edit</th>
                                              <th>Delete</th>
                                            </tr>
                                  </thead>
                                  <tbody>
                                             <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">Sale Orders</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>Sea Import</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['siView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siView" id="siView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siView" id="siView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['siAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siAdd" id="siAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siAdd" id="siAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['siEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siEdit" id="siEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siEdit" id="siEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['siDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siDelete" id="siDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="siDelete" id="siDelete"></td>';
                                                }

                                                }
                                                ?>
                                                
                                             </tr>

                                             <tr>
                                                <td>Sea Export</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['seView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seView" id="seView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seView" id="seView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['seAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seAdd" id="seAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seAdd" id="seAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['seEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seEdit" id="seEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seEdit" id="seEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['seDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seDelete" id="seDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="seDelete" id="seDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Air Import</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['aiView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiView" id="aiView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiView" id="aiView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aiAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiAdd" id="aiAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiAdd" id="aiAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aiEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiEdit" id="aiEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiEdit" id="aiEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aiDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiDelete" id="aiDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aiDelete" id="aiDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Air Export</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['aeView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeView" id="aeView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeView" id="aeView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aeAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeAdd" id="aeAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeAdd" id="aeAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aeEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeEdit" id="aeEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeEdit" id="aeEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['aeDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeDelete" id="aeDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="aeDelete" id="aeDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">Human Resources</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>Employee</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['empView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empView" id="empView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empView" id="empView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['empAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empAdd" id="empAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empAdd" id="empAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['empEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empEdit" id="empEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empEdit" id="empEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['empDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empDelete" id="empDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="empDelete" id="empDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Leaves</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['leaveView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveView" id="leaveView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveView" id="leaveView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['leaveAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveAdd" id="leaveAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveAdd" id="leaveAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['leaveEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveEdit" id="leaveEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveEdit" id="leaveEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['leaveDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveDelete" id="leaveDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="leaveDelete" id="leaveDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">User Management</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>User</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['view_U'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="view_U" id="view_U" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="view_U" id="view_U"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['add_U'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="add_U" id="add_U" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="add_U" id="add_U"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['update_U'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="update_U" id="update_U" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="update_U" id="update_U"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['delete_U'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="delete_U" id="delete_U" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="delete_U" id="delete_U"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Deparment</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['deptView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptView" id="deptView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptView" id="deptView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['deptAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptAdd" id="deptAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptAdd" id="deptAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['deptEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptEdit" id="deptEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptEdit" id="deptEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['deptDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptDelete" id="deptDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="deptDelete" id="deptDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Designation</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['desigView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigView" id="desigView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigView" id="desigView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['desigAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigAdd" id="desigAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigAdd" id="desigAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['desigEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigEdit" id="desigEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigEdit" id="desigEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['desigDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="desigDelete" id="desigDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="desigDelete" id="desigDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Roles</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['roleView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleView" id="roleView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleView" id="roleView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['roleAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleAdd" id="roleAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleAdd" id="roleAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['roleEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleEdit" id="roleEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleEdit" id="roleEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['roleDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleDelete" id="roleDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="roleDelete" id="roleDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">CRM</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>Customers</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['custView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox"disabled name="custView" id="custView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox"disabled name="custView" id="custView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['custAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custAdd" id="custAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custAdd" id="custAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['custEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custEdit" id="custEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custEdit" id="custEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['custDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custDelete" id="custDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="custDelete" id="custDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Vendors</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['vendorView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorView" id="vendorView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorView" id="vendorView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['vendorAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorAdd" id="vendorAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorAdd" id="vendorAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['vendorEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorEdit" id="vendorEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorEdit" id="vendorEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['vendorDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorDelete" id="vendorDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="vendorDelete" id="vendorDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Business Partners</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['bpView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpView" id="bpView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpView" id="bpView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['bpAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpAdd" id="bpAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpAdd" id="bpAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['bpEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpEdit" id="bpEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpEdit" id="bpEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['bpDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpDelete" id="bpDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="bpDelete" id="bpDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- //////////////////////////////////////// -->

                                                <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">Setups</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>Airport</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['airportView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportView" id="airportView" checked ></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportView" id="airportView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airportAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportAdd" id="airportAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportAdd" id="airportAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airportEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportEdit" id="airportEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportEdit" id="airportEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airportDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportDelete" id="airportDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airportDelete" id="airportDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Airline</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['airlineView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineView" id="airlineView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineView" id="airlineView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airlineAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineAdd" id="airlineAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineAdd" id="airlineAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airlineEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineEdit" id="airlineEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineEdit" id="airlineEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['airlineDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineDelete" id="airlineDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="airlineDelete" id="airlineDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Business</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['businessView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessView" id="businessView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessView" id="businessView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['businessAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessAdd" id="businessAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessAdd" id="businessAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['businessEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessEdit" id="businessEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessEdit" id="businessEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['businessDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessDelete" id="businessDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="businessDelete" id="businessDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- //////////////////////////////////////// -->

                                             <tr>
                                                <td>City</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['cityView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityView" id="cityView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityView" id="cityView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['cityAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityAdd" id="cityAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityAdd" id="cityAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['cityEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityEdit" id="cityEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityEdit" id="cityEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['cityDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityDelete" id="cityDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="cityDelete" id="cityDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Commodity</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['commodityView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityView" id="commodityView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityView" id="commodityView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['commodityAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityAdd" id="commodityAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityAdd" id="commodityAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['commodityEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityEdit" id="commodityEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityEdit" id="commodityEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['commodityDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityDelete" id="commodityDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="commodityDelete" id="commodityDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Country</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['countryView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryView" id="countryView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryView" id="countryView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['countryAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryAdd" id="countryAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryAdd" id="countryAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['countryEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryEdit" id="countryEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryEdit" id="countryEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['countryDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryDelete" id="countryDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="countryDelete" id="countryDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- //////////////////////////////////////// -->

                                             <tr>
                                                <td>Currency</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['currencyView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyView" id="currencyView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyView" id="currencyView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['currencyAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyAdd" id="currencyAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyAdd" id="currencyAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['currencyEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyEdit" id="currencyEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyEdit" id="currencyEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['currencyDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyDelete" id="currencyDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="currencyDelete" id="currencyDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Destination</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['destinationView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationView" id="destinationView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationView" id="destinationView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['destinationAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationAdd" id="destinationAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationAdd" id="destinationAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['destinationEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationEdit" id="destinationEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationEdit" id="destinationEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['destinationDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationDelete" id="destinationDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="destinationDelete" id="destinationDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Modes of Payment</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['mopView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopView" id="mopView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopView" id="mopView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['mopAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopAdd" id="mopAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopAdd" id="mopAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['mopEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopEdit" id="mopEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopEdit" id="mopEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['mopDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopDelete" id="mopDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="mopDelete" id="mopDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <!-- //////////////////////////////////////// -->

                                             <tr>
                                                <td>Region</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['regionView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionView" id="regionView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionView" id="regionView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['regionAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionAdd" id="regionAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionAdd" id="regionAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['regionEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionEdit" id="regionEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionEdit" id="regionEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['regionDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionDelete" id="regionDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="regionDelete" id="regionDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Sector</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['sectorView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorView" id="sectorView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorView" id="sectorView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['sectorAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorAdd" id="sectorAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorAdd" id="sectorAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['sectorEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorEdit" id="sectorEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorEdit" id="sectorEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['sectorDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorDelete" id="sectorDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="sectorDelete" id="sectorDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>

                                             <tr>
                                                <td>Shipping Line</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['slView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slView" id="slView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slView" id="slView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['slAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slAdd" id="slAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slAdd" id="slAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['slEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slEdit" id="slEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slEdit" id="slEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['slDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slDelete" id="slDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="slDelete" id="slDelete"></td>';
                                                }

                                                }
                                                ?>
                                              </tr>


                                                <!-- //////////////////////////////////////// -->

                                                <tr>
                                                <td>SPO</td>
                                                <?php
                                                $selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$Auth_ID' ");
                                                while ($rowAuth = mysqli_fetch_array($selectAuth))
                                                {

                                                if ($rowAuth['spoView'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoView" id="spoView" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoView" id="spoView"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['spoAdd'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoAdd" id="spoAdd" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoAdd" id="spoAdd"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['spoEdit'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoEdit" id="spoEdit" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoEdit" id="spoEdit"></td>';
                                                }
                                                ?>

                                                <?php
                                                if ($rowAuth['spoDelete'] == '1')
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoDelete" id="spoDelete" checked></td>';
                                                }
                                                else
                                                {
                                                  echo '<td><input type="checkbox" disabled name="spoDelete" id="spoDelete"></td>';
                                                }

                                                }
                                                ?>

                                             </tr>
                                  </tbody>
                                </table>
                                  <?php
                                  }
                                  ?>          
								
              </div>

              <div class="table-responsive" id="rolesTable">
              </div>

                </div>

								
				</div>			
										<div class="cls"></div>
										<hr>
		</form>

	</div>
</div>

<script>

  $(document).ready(function() {
     $('#authtable').DataTable({
  		"ordering": false
		} );
} );

</script>

<script type="text/javascript">
   function submitMod_F()
   {
    $("#submitModal").modal();
   }
</script>

<script type="text/javascript">
  function allowCustom()
  {
    document.getElementById("authUser").disabled='';
    document.getElementById("auth_Name").disabled='';
    /*document.getElementById("userDesig").disabled='';
    document.getElementById("userDepart").disabled='';*/


    document.getElementById("siView").disabled='';
    document.getElementById("siAdd").disabled='';
    document.getElementById("siEdit").disabled='';
    document.getElementById("siDelete").disabled='';

    document.getElementById("seView").disabled='';
    document.getElementById("seAdd").disabled='';
    document.getElementById("seEdit").disabled='';
    document.getElementById("seDelete").disabled='';

    document.getElementById("aiView").disabled='';
    document.getElementById("aiAdd").disabled='';
    document.getElementById("aiEdit").disabled='';
    document.getElementById("aiDelete").disabled='';

    document.getElementById("aeView").disabled='';
    document.getElementById("aeAdd").disabled='';
    document.getElementById("aeEdit").disabled='';
    document.getElementById("aeDelete").disabled='';

    document.getElementById("empView").disabled='';
    document.getElementById("empAdd").disabled='';
    document.getElementById("empEdit").disabled='';
    document.getElementById("empDelete").disabled='';

    document.getElementById("leaveView").disabled='';
    document.getElementById("leaveAdd").disabled='';
    document.getElementById("leaveEdit").disabled='';
    document.getElementById("leaveDelete").disabled='';

    document.getElementById("view_U").disabled='';
    document.getElementById("add_U").disabled='';
    document.getElementById("update_U").disabled='';
    document.getElementById("delete_U").disabled='';

    document.getElementById("deptView").disabled='';
    document.getElementById("deptAdd").disabled='';
    document.getElementById("deptEdit").disabled='';
    document.getElementById("deptDelete").disabled='';

    document.getElementById("desigView").disabled='';
    document.getElementById("desigAdd").disabled='';
    document.getElementById("desigEdit").disabled='';
    document.getElementById("desigDelete").disabled='';

    document.getElementById("roleView").disabled='';
    document.getElementById("roleAdd").disabled='';
    document.getElementById("roleEdit").disabled='';
    document.getElementById("roleDelete").disabled='';

    document.getElementById("custView").disabled='';
    document.getElementById("custAdd").disabled='';
    document.getElementById("custEdit").disabled='';
    document.getElementById("custDelete").disabled='';

    document.getElementById("vendorView").disabled='';
    document.getElementById("vendorAdd").disabled='';
    document.getElementById("vendorEdit").disabled='';
    document.getElementById("vendorDelete").disabled='';

    document.getElementById("bpView").disabled='';
    document.getElementById("bpAdd").disabled='';
    document.getElementById("bpEdit").disabled='';
    document.getElementById("bpDelete").disabled='';

    document.getElementById("airportView").disabled='';
    document.getElementById("airportAdd").disabled='';
    document.getElementById("airportEdit").disabled='';
    document.getElementById("airportDelete").disabled='';

    document.getElementById("airlineView").disabled='';
    document.getElementById("airlineAdd").disabled='';
    document.getElementById("airlineEdit").disabled='';
    document.getElementById("airlineDelete").disabled='';

    document.getElementById("businessView").disabled='';
    document.getElementById("businessAdd").disabled='';
    document.getElementById("businessEdit").disabled='';
    document.getElementById("businessDelete").disabled='';

    document.getElementById("cityView").disabled='';
    document.getElementById("cityAdd").disabled='';
    document.getElementById("cityEdit").disabled='';
    document.getElementById("cityDelete").disabled='';

    document.getElementById("commodityView").disabled='';
    document.getElementById("commodityAdd").disabled='';
    document.getElementById("commodityEdit").disabled='';
    document.getElementById("commodityDelete").disabled='';

    document.getElementById("countryView").disabled='';
    document.getElementById("countryAdd").disabled='';
    document.getElementById("countryEdit").disabled='';
    document.getElementById("countryDelete").disabled='';

    document.getElementById("currencyView").disabled='';
    document.getElementById("currencyAdd").disabled='';
    document.getElementById("currencyEdit").disabled='';
    document.getElementById("currencyDelete").disabled='';

    document.getElementById("destinationView").disabled='';
    document.getElementById("destinationAdd").disabled='';
    document.getElementById("destinationEdit").disabled='';
    document.getElementById("destinationDelete").disabled='';

    document.getElementById("mopView").disabled='';
    document.getElementById("mopAdd").disabled='';
    document.getElementById("mopEdit").disabled='';
    document.getElementById("mopDelete").disabled='';

    document.getElementById("regionView").disabled='';
    document.getElementById("regionAdd").disabled='';
    document.getElementById("regionEdit").disabled='';
    document.getElementById("regionDelete").disabled='';

    document.getElementById("sectorView").disabled='';
    document.getElementById("sectorAdd").disabled='';
    document.getElementById("sectorEdit").disabled='';
    document.getElementById("sectorDelete").disabled='';

    document.getElementById("slView").disabled='';
    document.getElementById("slAdd").disabled='';
    document.getElementById("slEdit").disabled='';
    document.getElementById("slDelete").disabled='';

    document.getElementById("spoView").disabled='';
    document.getElementById("spoAdd").disabled='';
    document.getElementById("spoEdit").disabled='';
    document.getElementById("spoDelete").disabled='';

  }
</script>

<script type="text/javascript">
  function fetchRole()
  {
    var userID = document.getElementById("authUser").value;

    // alert(userID);

    $.ajax({
     url:"fetchRole.php",
     method:"GET",
     data:{userID:userID},
     dataType:"text",
     success:function(data)
     {
      $('#rolesTable').html(data);
     }
    });

  }
</script>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>



</body>
</html>