<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'leaveMng';
$Quick = 'UnHide';
$Quickhr = 'Hide';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave Management</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">

	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
			<link rel="stylesheet" type="text/css" href="css/usertable.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<!-- Bread crumbs starting here -->
	<link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/modules.css" type="text/css">
	<link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
	<!-- Bread crumbs ending here -->

	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/sidebar.js"></script>
  	<script src="js/jquery.min.js"></script>

<style>
.leave-manage-sec  th {
    padding: 4px 10px !important;
    text-align: left;
    background: #fff;
}
.leave-manage-sec td {
    padding: 4px 10px !important;
    text-align: left;
    border: none !important;
}
.leave-manage-sec-table {
    margin-top: 15px;
}
.leave-manage-sec-table input {
    box-shadow: 0px 0px 6px -6px;
    padding: 0px 0px;
    width: 70%;
    height: auto;
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
          <a href="#" class="btn btn-info active">Leave Management Setup</a>
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
<form action="leaveMngSetupCode.php" method="POST">
<div class="leave-manage-sec  main_widget_box ">
			<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
											<!-- Go back button code starting here -->
					                      <?php include('inc_widgets/backBtn.php'); ?>
					                      <!-- Go back button code ending here -->
										</div>
										<button type="submit" id="btnConfirm_S" onclick="FormValidation();"><small>Submit</small></button>
										<button type="button" name="submitBtn"><small><a href="emp_leave_manage_setup.php">Cancel</a></small></button>				
			</div>
		<div class="col-md-6">
			<div class="input-label"><label >Leave Package </label></div>
	        <div class="input-feild">
		            <input  type="text" name="LeavePckg" id=""  placeholder="Enter Here">
		    </div>
	    </div> 
	    <div class="col-md-6">
	    	
	    </div>

	    <div class="leave-manage-sec-table widget_iner_box ">
	    	
		  <table id="usertable"  class="display compact  no-footer" style="width:100%">
                                <thead>
                                        <tr>
                                                <th> Leave Managemant</th>    
                                                <th></th>                                      
                                                <th>Encashment</th>
                                                <th>Carry Forward</th>
                                                <th>None</th>
                                        </tr>
                                </thead>
								                                                        
                                <tbody>
                            	
					                <tr>
					                        <td>Casual</td>
					                        <td><input type="text" name="casualDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Casual" value="None"></td>
					                        <td><input type="radio" name="Casual" value="Encashment"></td>
					                        <td><input type="radio" name="Casual" value="Carry Forward"></td>
					                </tr>


					                <tr>
					                        <td>Sick</td>
					                        <td><input type="text" name="SickDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Sick" value="None"></td>
					                        <td><input type="radio" name="Sick" value="Encashment"></td>
					                        <td><input type="radio" name="Sick" value="Carry Forward"></td>
					                </tr>

					                <tr>
					                        <td>Annual</td>
					                        <td><input type="text" name="AnnualDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Annual" value="None"></td>
					                        <td><input type="radio" name="Annual" value="Encashment"></td>
					                        <td><input type="radio" name="Annual" value="Carry Forward"></td>
					                </tr>


					                <tr>
					                        <td>Paternity</td>
					                        <td><input type="text" name="PaternityDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Paternity" value="None"></td>
					                        <td><input type="radio" name="Paternity" value="Encashment"></td>
					                        <td><input type="radio" name="Paternity" value="Carry Forward"></td>
					                </tr>


					                <tr>
					                        <td>Maternity</td>
					                        <td><input type="text" name="MaternityDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Maternity" value="None"></td>
					                        <td><input type="radio" name="Maternity" value="Encashment"></td>
					                        <td><input type="radio" name="Maternity" value="Carry Forward"></td>
					                </tr>

					                 <tr>
					                        <td>Bereavement</td>
					                        <td><input type="text" name="BereavementDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Bereavement" value="None"></td>
					                        <td><input type="radio" name="Bereavement" value="Encashment"></td>
					                        <td><input type="radio" name="Bereavement" value="Carry Forward"></td>
					                </tr>

					                 <tr>
					                        <td>Others</td>
					                       	<td><input type="text" name="OthersDays" placeholder="No. of days"></td>
					                        <td><input type="radio" name="Others" value="None"></td>
					                        <td><input type="radio" name="Others" value="Encashment"></td>
					                        <td><input type="radio" name="Others" value="Carry Forward"></td>
					                </tr>
					                                   
					            </tbody>                      
		  </table>	 
		 
		</div>
	
</div>
 </form>

<script>
	$(document).ready(function() {
    $('#usertable').DataTable();
} );
</script>



<script src="js/jquery.dataTables.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>