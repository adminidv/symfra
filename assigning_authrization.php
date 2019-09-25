<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

if(isset($_POST['btnYes']))
{
  $view_U = 0;
  $add_U = 0;
  $update_U = 0;
  $delete_U = 0;
  $deptView = 0;
  $deptAdd = 0;
  $deptEdit = 0;
  $deptDelete = 0;
  $desigView = 0;
  $desigAdd = 0;
  $desigEdit = 0;
  $desigDelete = 0;
  $roleView = 0;
  $roleAdd = 0;
  $roleEdit = 0;
  $roleDelete = 0;
  $empView = 0;
  $empAdd = 0;
  $empEdit = 0;
  $empDelete = 0;
  $leaveView = 0;
  $leaveAdd = 0;
  $leaveEdit = 0;
  $leaveDelete = 0;
  $siView = 0;
  $siAdd = 0;
  $siEdit = 0;
  $siDelete = 0;
  $seView = 0;
  $seAdd = 0;
  $seEdit = 0;
  $seDelete = 0;
  $aiView = 0;
  $aiAdd = 0;
  $aiEdit = 0;
  $aiDelete = 0;
  $aeView = 0;
  $aeAdd = 0;
  $aeEdit = 0;
  $aeDelete = 0;
  $custView = 0;
  $custAdd = 0;
  $custEdit = 0;
  $custDelete = 0;
  $vendorView = 0;
  $vendorAdd = 0;
  $vendorEdit = 0;
  $vendorDelete = 0;
  $bpView = 0;
  $bpAdd = 0;
  $bpEdit = 0;
  $bpDelete = 0;

  // Setups

  $airportView = 0;
  $airportAdd = 0;
  $airportEdit = 0;
  $airportDelete = 0;

  $airlineView = 0;
  $airlineAdd = 0;
  $airlineEdit = 0;
  $airlineDelete = 0;

  $businessView = 0;
  $businessAdd = 0;
  $businessEdit = 0;
  $businessDelete = 0;

  $cityView = 0;
  $cityAdd = 0;
  $cityEdit = 0;
  $cityDelete = 0;

  $commodityView = 0;
  $commodityAdd = 0;
  $commodityEdit = 0;
  $commodityDelete = 0;

  $countryView = 0;
  $countryAdd = 0;
  $countryEdit = 0;
  $countryDelete = 0;

  $currencyView = 0;
  $currencyAdd = 0;
  $currencyEdit = 0;
  $currencyDelete = 0;

  $destinationView = 0;
  $destinationAdd = 0;
  $destinationEdit = 0;
  $destinationDelete = 0;

  $mopView = 0;
  $mopAdd = 0;
  $mopEdit = 0;
  $mopDelete = 0;

  $regionView = 0;
  $regionAdd = 0;
  $regionEdit = 0;
  $regionDelete = 0;

  $sectorView = 0;
  $sectorAdd = 0;
  $sectorEdit = 0;
  $sectorDelete = 0;

  $slView = 0;
  $slAdd = 0;
  $slEdit = 0;
  $slDelete = 0;

  $spoView = 0;
  $spoAdd = 0;
  $spoEdit = 0;
  $spoDelete = 0;

  if (isset($_POST['view_U']))
  {
    $view_U = 1;
  }
  if (isset($_POST['add_U']))
  {
    $add_U = 1;
  }
  if (isset($_POST['update_U']))
  {
    $update_U = 1;
  }
  if (isset($_POST['delete_U']))
  {
    $delete_U = 1;
  }

  if (isset($_POST['deptView']))
  {
    $deptView = 1;
  }
  if (isset($_POST['deptAdd']))
  {
    $deptAdd = 1;
  }
  if (isset($_POST['deptEdit']))
  {
    $deptEdit = 1;
  }
  if (isset($_POST['deptDelete']))
  {
    $deptDelete = 1;
  }

  if (isset($_POST['desigView']))
  {
    $desigView = 1;
  }
  if (isset($_POST['desigAdd']))
  {
    $desigAdd = 1;
  }
  if (isset($_POST['desigEdit']))
  {
    $desigEdit = 1;
  }
  if (isset($_POST['desigDelete']))
  {
    $desigDelete = 1;
  }

  if (isset($_POST['roleView']))
  {
    $roleView = 1;
  }
  if (isset($_POST['roleAdd']))
  {
    $roleAdd = 1;
  }
  if (isset($_POST['roleEdit']))
  {
    $roleEdit = 1;
  }
  if (isset($_POST['roleDelete']))
  {
    $roleDelete = 1;
  }

  if (isset($_POST['empView']))
  {
    $empView = 1;
  }
  if (isset($_POST['empAdd']))
  {
    $empAdd = 1;
  }
  if (isset($_POST['empEdit']))
  {
    $empEdit = 1;
  }
  if (isset($_POST['empDelete']))
  {
    $empDelete = 1;
  }

  if (isset($_POST['leaveView']))
  {
    $leaveView = 1;
  }
  if (isset($_POST['leaveAdd']))
  {
    $leaveAdd = 1;
  }
  if (isset($_POST['leaveEdit']))
  {
    $leaveEdit = 1;
  }
  if (isset($_POST['leaveDelete']))
  {
    $leaveDelete = 1;
  }

  ///////////////////////////////////

  if (isset($_POST['siView']))
  {
    $siView = 1;
  }
  if (isset($_POST['siAdd']))
  {
    $siAdd = 1;
  }
  if (isset($_POST['siEdit']))
  {
    $siEdit = 1;
  }
  if (isset($_POST['siDelete']))
  {
    $siDelete = 1;
  }

  if (isset($_POST['seView']))
  {
    $seView = 1;
  }
  if (isset($_POST['seAdd']))
  {
    $seAdd = 1;
  }
  if (isset($_POST['seEdit']))
  {
    $seEdit = 1;
  }
  if (isset($_POST['seDelete']))
  {
    $seDelete = 1;
  }

  if (isset($_POST['aiView']))
  {
    $aiView = 1;
  }
  if (isset($_POST['aiAdd']))
  {
    $aiAdd = 1;
  }
  if (isset($_POST['aiEdit']))
  {
    $aiEdit = 1;
  }
  if (isset($_POST['aiDelete']))
  {
    $aiDelete = 1;
  }

  if (isset($_POST['aeView']))
  {
    $aeView = 1;
  }
  if (isset($_POST['aeAdd']))
  {
    $aeAdd = 1;
  }
  if (isset($_POST['aeEdit']))
  {
    $aeEdit = 1;
  }
  if (isset($_POST['aeDelete']))
  {
    $aeDelete = 1;
  }

  //

  if (isset($_POST['custView']))
  {
    $custView = 1;
  }
  if (isset($_POST['custAdd']))
  {
    $custAdd = 1;
  }
  if (isset($_POST['custEdit']))
  {
    $custEdit = 1;
  }
  if (isset($_POST['custDelete']))
  {
    $custDelete = 1;
  }

  //

  if (isset($_POST['vendorView']))
  {
    $vendorView = 1;
  }
  if (isset($_POST['vendorAdd']))
  {
    $vendorAdd = 1;
  }
  if (isset($_POST['vendorEdit']))
  {
    $vendorEdit = 1;
  }
  if (isset($_POST['vendorDelete']))
  {
    $vendorDelete = 1;
  }

  //

  if (isset($_POST['bpView']))
  {
    $bpView = 1;
  }
  if (isset($_POST['bpAdd']))
  {
    $bpAdd = 1;
  }
  if (isset($_POST['bpEdit']))
  {
    $bpEdit = 1;
  }
  if (isset($_POST['bpDelete']))
  {
    $bpDelete = 1;
  }

  //

  if (isset($_POST['airportView']))
  {
    $airportView = 1;
  }
  if (isset($_POST['airportAdd']))
  {
    $airportAdd = 1;
  }
  if (isset($_POST['airportEdit']))
  {
    $airportEdit = 1;
  }
  if (isset($_POST['airportDelete']))
  {
    $airportDelete = 1;
  }

  //

  if (isset($_POST['airlineView']))
  {
    $airlineView = 1;
  }
  if (isset($_POST['airlineAdd']))
  {
    $airlineAdd = 1;
  }
  if (isset($_POST['airlineEdit']))
  {
    $airlineEdit = 1;
  }
  if (isset($_POST['airlineDelete']))
  {
    $airlineDelete = 1;
  }

  //

  if (isset($_POST['businessView']))
  {
    $businessView = 1;
  }
  if (isset($_POST['businessAdd']))
  {
    $businessAdd = 1;
  }
  if (isset($_POST['businessEdit']))
  {
    $businessEdit = 1;
  }
  if (isset($_POST['businessDelete']))
  {
    $businessDelete = 1;
  }

  //

  if (isset($_POST['cityView']))
  {
    $cityView = 1;
  }
  if (isset($_POST['cityAdd']))
  {
    $cityAdd = 1;
  }
  if (isset($_POST['cityEdit']))
  {
    $cityEdit = 1;
  }
  if (isset($_POST['cityDelete']))
  {
    $cityDelete = 1;
  }

  //

  if (isset($_POST['commodityView']))
  {
    $commodityView = 1;
  }
  if (isset($_POST['commodityAdd']))
  {
    $commodityAdd = 1;
  }
  if (isset($_POST['commodityEdit']))
  {
    $commodityEdit = 1;
  }
  if (isset($_POST['commodityDelete']))
  {
    $commodityDelete = 1;
  }

  //

  if (isset($_POST['countryView']))
  {
    $countryView = 1;
  }
  if (isset($_POST['countryAdd']))
  {
    $countryAdd = 1;
  }
  if (isset($_POST['countryEdit']))
  {
    $countryEdit = 1;
  }
  if (isset($_POST['countryDelete']))
  {
    $countryDelete = 1;
  }

  //

  if (isset($_POST['currencyView']))
  {
    $currencyView = 1;
  }
  if (isset($_POST['currencyAdd']))
  {
    $currencyAdd = 1;
  }
  if (isset($_POST['currencyEdit']))
  {
    $currencyEdit = 1;
  }
  if (isset($_POST['currencyDelete']))
  {
    $currencyDelete = 1;
  }

  //

  if (isset($_POST['destinationView']))
  {
    $destinationView = 1;
  }
  if (isset($_POST['destinationAdd']))
  {
    $destinationAdd = 1;
  }
  if (isset($_POST['destinationEdit']))
  {
    $destinationEdit = 1;
  }
  if (isset($_POST['currencyDelete']))
  {
    $destinationDelete = 1;
  }

  //

  if (isset($_POST['mopView']))
  {
    $mopView = 1;
  }
  if (isset($_POST['mopAdd']))
  {
    $mopAdd = 1;
  }
  if (isset($_POST['mopEdit']))
  {
    $mopEdit = 1;
  }
  if (isset($_POST['mopDelete']))
  {
    $mopDelete = 1;
  }

  //

  if (isset($_POST['regionView']))
  {
    $regionView = 1;
  }
  if (isset($_POST['regionAdd']))
  {
    $regionAdd = 1;
  }
  if (isset($_POST['regionEdit']))
  {
    $regionEdit = 1;
  }
  if (isset($_POST['regionDelete']))
  {
    $regionDelete = 1;
  }

  //

  if (isset($_POST['sectorView']))
  {
    $sectorView = 1;
  }
  if (isset($_POST['sectorAdd']))
  {
    $sectorAdd = 1;
  }
  if (isset($_POST['sectorEdit']))
  {
    $sectorEdit = 1;
  }
  if (isset($_POST['sectorDelete']))
  {
    $sectorDelete = 1;
  }

  //

  if (isset($_POST['slView']))
  {
    $slView = 1;
  }
  if (isset($_POST['slAdd']))
  {
    $slAdd = 1;
  }
  if (isset($_POST['slEdit']))
  {
    $slEdit = 1;
  }
  if (isset($_POST['slDelete']))
  {
    $slDelete = 1;
  }

  //

  if (isset($_POST['spoView']))
  {
    $spoView = 1;
  }
  if (isset($_POST['spoAdd']))
  {
    $spoAdd = 1;
  }
  if (isset($_POST['spoEdit']))
  {
    $spoEdit = 1;
  }
  if (isset($_POST['spoDelete']))
  {
    $spoDelete = 1;
  }

  // Setting the POST variables coming from form
  $auth_Name = $_POST['auth_Name'];

  // Inserting records to Authorization Set
  $insertAuthSet = mysqli_query($con, "insert into authorizationset (auth_Name) values ('$auth_Name')");

  // Inserting records to Authorization Details
  $insertAuthDetails = mysqli_query($con, "insert into authdetails (auth_Name, add_U, update_U, delete_U, view_U, deptView, deptAdd, deptDelete, deptEdit, desigView, desigAdd, desigDelete, desigEdit, roleView, roleAdd, roleDelete, roleEdit, empView, empAdd, empDelete, empEdit, leaveView, leaveAdd, leaveDelete, leaveEdit, siView, siAdd, siEdit, siDelete, seView, seAdd, seEdit, seDelete, aiView, aiAdd, aiEdit, aiDelete, aeView, aeAdd, aeEdit, aeDelete, custView, custAdd, custEdit, custDelete, vendorView, vendorAdd, vendorEdit, vendorDelete, bpView, bpAdd, bpEdit, bpDelete, airportView, airportAdd, airportEdit, airportDelete, airlineView, airlineAdd, airlineEdit, airlineDelete, businessView, businessAdd, businessEdit, businessDelete, cityView, cityAdd, cityEdit, cityDelete, commodityView, commodityAdd, commodityEdit, commodityDelete, countryView, countryAdd, countryEdit, countryDelete, currencyView, currencyAdd, currencyEdit, currencyDelete, destinationView, destinationAdd, destinationEdit, destinationDelete, mopView, mopAdd, mopEdit, mopDelete, regionView, regionAdd, regionEdit, regionDelete, sectorView, sectorAdd, sectorEdit, sectorDelete, slView, slAdd, slEdit, slDelete, spoView, spoAdd, spoEdit, spoDelete) values ('$auth_Name', '$add_U', '$update_U', '$delete_U', '$view_U', '$deptView', '$deptAdd', '$deptDelete', '$deptEdit', '$desigView', '$desigAdd', '$desigDelete', '$desigEdit', '$roleView', '$roleAdd', '$roleDelete', '$roleEdit', '$empView', '$empAdd', '$empDelete', '$empEdit', '$leaveView', '$leaveAdd', '$leaveDelete', '$leaveEdit', '$siView', '$siAdd', '$siEdit', '$siDelete', '$seView', '$seAdd', '$seEdit', '$seDelete', '$aiView', '$aiAdd', '$aiEdit', '$aiDelete', '$aeView', '$aeAdd', '$aeEdit', '$aeDelete', '$custView', '$custAdd', '$custEdit', '$custDelete', '$vendorView', '$vendorAdd', '$vendorEdit', '$vendorDelete', '$bpView', '$bpAdd', '$bpEdit', '$bpDelete', '$airportView', '$airportAdd', '$airportEdit', '$airportDelete', '$airlineView', '$airlineAdd', '$airlineEdit', '$airlineDelete', '$businessView', '$businessAdd', '$businessEdit', '$businessDelete', '$cityView', '$cityAdd', '$cityEdit', '$cityDelete', '$commodityView', '$commodityAdd', '$commodityEdit', '$commodityDelete', '$countryView', '$countryAdd', '$countryEdit', '$countryDelete', '$currencyView', '$currencyAdd', '$currencyEdit', '$currencyDelete', '$destinationView', '$destinationAdd', '$destinationEdit', '$destinationDelete', '$mopView', '$mopAdd', '$mopEdit', '$mopDelete', '$regionView', '$regionAdd', '$regionEdit', '$regionDelete', '$sectorView', '$sectorAdd', '$sectorEdit', '$sectorDelete', '$slView', '$slAdd', '$slEdit', '$slDelete', '$spoView', '$spoAdd', '$spoEdit', '$spoDelete')");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Declaring Role</title>
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
          <a href="usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="assigning_authorization.php" class="btn btn-info active">Declare Role</a>
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

                                                <div class="input-label"><label >Role Name </label></div>
                                                <div class="input-feild">
                                                <input type="text" name="auth_Name" id="auth_Name" maxlength="40" required>
                                                </div>                                                                                   
                                 </div>

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
										                                     		<td><input type="checkbox" name="siView"></td>
										                                      	<td><input type="checkbox" name="siAdd"></td>
										                                     		<td><input type="checkbox" name="siEdit"></td>
										                                      	<td><input type="checkbox" name="siDelete"></td>
										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Sea Export</td>
										                                     		<td><input type="checkbox" name="seView"></td>
                                                            <td><input type="checkbox" name="seAdd"></td>
                                                            <td><input type="checkbox" name="seEdit"></td>
                                                            <td><input type="checkbox" name="seDelete"></td>
										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Air Import</td>
										                                     		<td><input type="checkbox" name="aiView"></td>
                                                            <td><input type="checkbox" name="aiAdd"></td>
                                                            <td><input type="checkbox" name="aiEdit"></td>
                                                            <td><input type="checkbox" name="aiDelete"></td>
										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Air Export</td>
										                                     		<td><input type="checkbox" name="aeView"></td>
                                                            <td><input type="checkbox" name="aeAdd"></td>
                                                            <td><input type="checkbox" name="aeEdit"></td>
                                                            <td><input type="checkbox" name="aeDelete"></td>
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
										                                     		<td><input type="checkbox" name="empView"></td>
										                                      	<td><input type="checkbox" name="empAdd"></td>
										                                     		<td><input type="checkbox" name="empEdit"></td>
										                                      	<td><input type="checkbox" name="empDelete"></td>
										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Leaves</td>
										                                     		<td><input type="checkbox" name="leaveView"></td>
										                                      	<td><input type="checkbox" name="leaveAdd"></td>
										                                     		<td><input type="checkbox" name="leaveEdit"></td>
										                                      	<td><input type="checkbox" name="leaveDelete"></td>
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
                                                            <td><input type="checkbox" name="view_U"></td>
                                                            <td><input type="checkbox" name="add_U"></td>
                                                            <td><input type="checkbox" name="update_U"></td>
                                                            <td><input type="checkbox" name="delete_U"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Deparment</td>
                                                            <td><input type="checkbox" name="deptView"></td>
                                                            <td><input type="checkbox" name="deptAdd"></td>
                                                            <td><input type="checkbox" name="deptEdit"></td>
                                                            <td><input type="checkbox" name="deptDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Designation</td>
                                                            <td><input type="checkbox" name="desigView"></td>
                                                            <td><input type="checkbox" name="desigAdd"></td>
                                                            <td><input type="checkbox" name="desigEdit"></td>
                                                            <td><input type="checkbox" name="desigDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Roles</td>
                                                            <td><input type="checkbox" name="roleView"></td>
                                                            <td><input type="checkbox" name="roleAdd"></td>
                                                            <td><input type="checkbox" name="roleEdit"></td>
                                                            <td><input type="checkbox" name="roleDelete"></td>
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
                                                            <td><input type="checkbox" name="custView"></td>
                                                            <td><input type="checkbox" name="custAdd"></td>
                                                            <td><input type="checkbox" name="custEdit"></td>
                                                            <td><input type="checkbox" name="custDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Vendors</td>
                                                            <td><input type="checkbox" name="vendorView"></td>
                                                            <td><input type="checkbox" name="vendorAdd"></td>
                                                            <td><input type="checkbox" name="vendorEdit"></td>
                                                            <td><input type="checkbox" name="vendorDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Business Partners</td>
                                                            <td><input type="checkbox" name="bpView"></td>
                                                            <td><input type="checkbox" name="bpAdd"></td>
                                                            <td><input type="checkbox" name="bpEdit"></td>
                                                            <td><input type="checkbox" name="bpDelete"></td>
                                                         </tr>

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
                                                            <td><input type="checkbox" name="airportView"></td>
                                                            <td><input type="checkbox" name="airportAdd"></td>
                                                            <td><input type="checkbox" name="airportEdit"></td>
                                                            <td><input type="checkbox" name="airportDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Airline</td>
                                                            <td><input type="checkbox" name="airlineView"></td>
                                                            <td><input type="checkbox" name="airlineAdd"></td>
                                                            <td><input type="checkbox" name="airlineEdit"></td>
                                                            <td><input type="checkbox" name="airlineDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Business</td>
                                                            <td><input type="checkbox" name="businessView"></td>
                                                            <td><input type="checkbox" name="businessAdd"></td>
                                                            <td><input type="checkbox" name="businessEdit"></td>
                                                            <td><input type="checkbox" name="businessDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>City</td>
                                                            <td><input type="checkbox" name="cityView"></td>
                                                            <td><input type="checkbox" name="cityAdd"></td>
                                                            <td><input type="checkbox" name="cityEdit"></td>
                                                            <td><input type="checkbox" name="cityDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Commodity</td>
                                                            <td><input type="checkbox" name="commodityView"></td>
                                                            <td><input type="checkbox" name="commodityAdd"></td>
                                                            <td><input type="checkbox" name="commodityEdit"></td>
                                                            <td><input type="checkbox" name="commodityDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Country</td>
                                                            <td><input type="checkbox" name="countryView"></td>
                                                            <td><input type="checkbox" name="countryAdd"></td>
                                                            <td><input type="checkbox" name="countryEdit"></td>
                                                            <td><input type="checkbox" name="countryDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Currency</td>
                                                            <td><input type="checkbox" name="currencyView"></td>
                                                            <td><input type="checkbox" name="currencyAdd"></td>
                                                            <td><input type="checkbox" name="currencyEdit"></td>
                                                            <td><input type="checkbox" name="currencyDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Destination</td>
                                                            <td><input type="checkbox" name="destinationView"></td>
                                                            <td><input type="checkbox" name="destinationAdd"></td>
                                                            <td><input type="checkbox" name="destinationEdit"></td>
                                                            <td><input type="checkbox" name="destinationDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Modes of Payment</td>
                                                            <td><input type="checkbox" name="mopView"></td>
                                                            <td><input type="checkbox" name="mopAdd"></td>
                                                            <td><input type="checkbox" name="mopEdit"></td>
                                                            <td><input type="checkbox" name="mopDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Region</td>
                                                            <td><input type="checkbox" name="regionView"></td>
                                                            <td><input type="checkbox" name="regionAdd"></td>
                                                            <td><input type="checkbox" name="regionEdit"></td>
                                                            <td><input type="checkbox" name="regionDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Sector</td>
                                                            <td><input type="checkbox" name="sectorView"></td>
                                                            <td><input type="checkbox" name="sectorAdd"></td>
                                                            <td><input type="checkbox" name="sectorEdit"></td>
                                                            <td><input type="checkbox" name="sectorDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Shipping Line</td>
                                                            <td><input type="checkbox" name="slView"></td>
                                                            <td><input type="checkbox" name="slAdd"></td>
                                                            <td><input type="checkbox" name="slEdit"></td>
                                                            <td><input type="checkbox" name="slDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>SPO</td>
                                                            <td><input type="checkbox" name="spoView"></td>
                                                            <td><input type="checkbox" name="spoAdd"></td>
                                                            <td><input type="checkbox" name="spoEdit"></td>
                                                            <td><input type="checkbox" name="spoDelete"></td>
                                                         </tr>
										                          </tbody>
								</table> 

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



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>



</body>
</html>