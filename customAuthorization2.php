<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

$user_id = $_GET['user_id'];

$selectUserAuth = mysqli_query($con, "SELECT * from users WHERE user_ID='$user_id' ");
while ($rowUserAuth = mysqli_fetch_array($selectUserAuth))
{
  $Auth_ID = $
}

// Fetching Authorization details

while ($rowAuth = mysqli_fetch_array($selectAuth))
{
  $auth_Name = $rowAuth['auth_Name'];
  $add_U = $rowAuth['add_U'];
  $update_U = $rowAuth['update_U'];
  $delete_U = $rowAuth['delete_U'];
  $view_U = $rowAuth['view_U'];
  $deptView = $rowAuth['deptView'];
  $deptAdd = $rowAuth['deptAdd'];
  $deptDelete = $rowAuth['deptDelete'];
  $deptEdit = $rowAuth['deptEdit'];
  $desigView = $rowAuth['desigView'];
  $desigAdd = $rowAuth['desigAdd'];
  $desigDelete = $rowAuth['desigDelete'];
  $desigEdit = $rowAuth['desigEdit'];
  $roleView = $rowAuth['roleView'];
  $roleAdd = $rowAuth['roleAdd'];
  $roleDelete = $rowAuth['roleDelete'];
  $roleEdit = $rowAuth['roleEdit'];
  $empView = $rowAuth['empView'];
  $empAdd = $rowAuth['empAdd'];
  $empDelete = $rowAuth['empDelete'];
  $empEdit = $rowAuth['empEdit'];
  $leaveView = $rowAuth['leaveView'];
  $leaveAdd = $rowAuth['leaveAdd'];
  $leaveDelete = $rowAuth['leaveDelete'];
  $leaveEdit = $rowAuth['leaveEdit'];
  $siView = $rowAuth['siView'];
  $siAdd = $rowAuth['siAdd'];
  $siEdit = $rowAuth['siEdit'];
  $siDelete = $rowAuth['siDelete'];
  $seView = $rowAuth['seView'];
  $seAdd = $rowAuth['seAdd'];
  $seEdit = $rowAuth['empDelete'];
  $seDelete = $rowAuth['seDelete'];
  $aiView = $rowAuth['aiView'];
  $aiAdd = $rowAuth['aiAdd'];
  $aiEdit = $rowAuth['aiEdit'];
  $aiDelete = $rowAuth['aiDelete'];
  $aeView = $rowAuth['aeView'];
  $aeAdd = $rowAuth['aeAdd'];
  $aeEdit = $rowAuth['aeEdit'];
  $aeDelete = $rowAuth['aeDelete'];

  $custView = $rowAuth['custView'];
  $custAdd = $rowAuth['custAdd'];
  $custEdit = $rowAuth['custEdit'];
  $custDelete = $rowAuth['custDelete'];
  $vendorView = $rowAuth['vendorView'];
  $vendorAdd = $rowAuth['vendorAdd'];
  $vendorEdit = $rowAuth['vendorEdit'];
  $vendorDelete = $rowAuth['vendorDelete'];
  $bpView = $rowAuth['bpView'];
  $bpAdd = $rowAuth['bpAdd'];
  $bpEdit = $rowAuth['bpEdit'];
  $bpDelete = $rowAuth['bpDelete'];
  
  $airportView = $rowAuth['airportView'];
  $airportAdd = $rowAuth['airportAdd'];
  $airportEdit = $rowAuth['airportEdit'];
  $airportDelete = $rowAuth['airportDelete'];
  $airlineView = $rowAuth['airlineView'];
  $airlineAdd = $rowAuth['airlineAdd'];
  $airlineEdit = $rowAuth['airlineEdit'];
  $airlineDelete = $rowAuth['airlineDelete'];
  $businessView = $rowAuth['businessView'];
  $businessAdd = $rowAuth['businessAdd'];
  $businessEdit = $rowAuth['businessEdit'];
  $businessDelete = $rowAuth['businessDelete'];
  $cityView = $rowAuth['cityView'];
  $cityAdd = $rowAuth['cityAdd'];
  $cityEdit = $rowAuth['cityEdit'];
  $cityDelete = $rowAuth['cityDelete'];
  $commodityView = $rowAuth['commodityView'];
  $commodityAdd = $rowAuth['commodityAdd'];
  $commodityEdit = $rowAuth['commodityEdit'];
  $commodityDelete = $rowAuth['commodityDelete'];
  $countryView = $rowAuth['countryView'];
  $countryAdd = $rowAuth['countryAdd'];
  $countryEdit = $rowAuth['countryEdit'];
  $countryDelete = $rowAuth['countryDelete'];
  $currencyView = $rowAuth['currencyView'];
  $currencyAdd = $rowAuth['currencyAdd'];
  $currencyEdit = $rowAuth['currencyEdit'];
  $currencyDelete = $rowAuth['currencyDelete'];
  $destinationView = $rowAuth['destinationView'];
  $destinationAdd = $rowAuth['destinationAdd'];
  $destinationEdit = $rowAuth['destinationEdit'];
  $destinationDelete = $rowAuth['destinationDelete'];
  $mopView = $rowAuth['mopView'];
  $mopAdd = $rowAuth['mopAdd'];
  $mopEdit = $rowAuth['mopEdit'];
  $mopDelete = $rowAuth['mopDelete'];
  $regionView = $rowAuth['regionView'];
  $regionAdd = $rowAuth['regionAdd'];
  $regionEdit = $rowAuth['regionEdit'];
  $regionDelete = $rowAuth['regionDelete'];
  $sectorView = $rowAuth['sectorView'];
  $sectorAdd = $rowAuth['sectorAdd'];
  $sectorEdit = $rowAuth['sectorEdit'];
  $sectorDelete = $rowAuth['sectorDelete'];
  $slView = $rowAuth['slView'];
  $slAdd = $rowAuth['slAdd'];
  $slEdit = $rowAuth['slEdit'];
  $slDelete = $rowAuth['slDelete'];
  $spoView = $rowAuth['spoView'];
  $spoAdd = $rowAuth['spoAdd'];
  $spoEdit = $rowAuth['spoEdit'];
  $spoDelete = $rowAuth['spoDelete'];
}

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
  if (isset($_POST['destinationDelete']))
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
  $insertAuthSet = mysqli_query($con, "insert into authorizationSet (auth_Name) values ('$auth_Name')");

  // Inserting records to Authorization Details
  $insertAuthDetails = mysqli_query($con, "insert into authDetails (auth_Name, add_U, update_U, delete_U, view_U, deptView, deptAdd, deptDelete, deptEdit, desigView, desigAdd, desigDelete, desigEdit, roleView, roleAdd, roleDelete, roleEdit, empView, empAdd, empDelete, empEdit, leaveView, leaveAdd, leaveDelete, leaveEdit, siView, siAdd, siEdit, siDelete, seView, seAdd, seEdit, seDelete, aiView, aiAdd, aiEdit, aiDelete, aeView, aeAdd, aeEdit, aeDelete) values ('$auth_Name', '$add_U', '$update_U', '$delete_U', '$view_U', '$deptView', '$deptAdd', '$deptDelete', '$deptEdit', '$desigView', '$desigAdd', '$desigDelete', '$desigEdit', '$roleView', '$roleAdd', '$roleDelete', '$roleEdit', '$empView', '$empAdd', '$empDelete', '$empEdit', '$leaveView', '$leaveAdd', '$leaveDelete', '$leaveEdit', '$siView', '$siAdd', '$siEdit', '$siDelete', '$seView', '$seAdd', '$seEdit', '$seDelete', '$aiView', '$aiAdd', '$aiEdit', '$aiDelete', '$aeView', '$aeAdd', '$aeEdit', '$aeDelete')");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Custom Authorization</title>
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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">Roles</a>
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

                                                <div class="input-label"><label >Authorization Name </label></div>
                                                <div class="input-feild">
                                                <input type="text" name="auth_Name" id="auth_Name" value="<?php echo $auth_Name; ?>" required>
                                                </div>

                                                <div class="input-label"><label >Select User</label></div>
                                                <div class="input-feild">
                                                  <select name="authUser" id="authUser">
                                                     <option value="">Select</option>
                                                     <?php

                                                     $selectUsers = mysqli_query($con, "SELECT * FROM users");
                                                     while ($rowUsers = mysqli_fetch_array($selectUsers))
                                                     {
                                                      echo '<option value="'.$rowUsers["user_ID"].'">'.$rowUsers["user_fName"] . ' ' . $rowUsers["user_lName"].'</option>';
                                                     }

                                                     ?>
                                                     
                                                     <option value="India">India</option>
                                                     <option value="United Kingdom">United Kingdom</option>
                                                     <option value="USA">USA</option>
                                                  </select>
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
                                                            <?php
                                                            if ($siView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="siView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="siView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($siAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="siAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="siAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($siEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="siEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="siEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($siDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="siDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="siDelete"></td>';
                                                            }
                                                            ?>
										                                     		
										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Sea Export</td>
                                                            <?php
                                                            if ($seView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="seView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="seView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($seAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="seAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="seAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($seEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="seEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="seEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($seDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="seDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="seDelete"></td>';
                                                            }
                                                            ?>

										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Air Import</td>
                                                            <?php
                                                            if ($aiView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aiView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aiView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aiAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aiAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aiAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aiEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aiEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aiEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aiDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aiDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aiDelete"></td>';
                                                            }
                                                            ?>

										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Air Export</td>
                                                            <?php
                                                            if ($aeView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aeView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aeView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aeAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aeAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aeAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aeEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aeEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aeEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($aeDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="aeDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="aeDelete"></td>';
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
                                                            if ($empView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="empView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="empView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($empAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="empAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="empAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($empEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="empEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="empEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($empDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="empDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="empDelete"></td>';
                                                            }
                                                            ?>

										                                   	 </tr>

										                                   	 <tr>
										                                     		<td>Leaves</td>
                                                            <?php
                                                            if ($leaveView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($leaveAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($leaveEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($leaveDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="leaveDelete"></td>';
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
                                                            if ($view_U == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="view_U" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="view_U"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($add_U == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="add_U" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="add_U"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($update_U == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="update_U" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="update_U"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($delete_U == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="delete_U" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="delete_U"></td>';
                                                            }
                                                            ?>

                                                         </tr>

                                                         <tr>
                                                            <td>Deparment</td>
                                                            <?php
                                                            if ($deptView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="deptView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="deptView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($deptAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="deptAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="deptAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($deptEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="deptEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="deptEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($deptDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="deptDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="deptDelete"></td>';
                                                            }
                                                            ?>

                                                         </tr>

                                                         <tr>
                                                            <td>Designation</td>
                                                            <?php
                                                            if ($desigView == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="desigView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="desigView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigAdd == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="desigAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="desigAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigEdit == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="desigEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="desigEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="desigDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="desigDelete"></td>';
                                                            }
                                                            ?>

                                                         </tr>

                                                         <tr>
                                                            <td>Roles</td>
                                                            <?php
                                                            if ($desigDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="roleView" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="roleView"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="roleAdd" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="roleAdd"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="roleEdit" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="roleEdit"></td>';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($desigDelete == '1')
                                                            {
                                                              echo '<td><input type="checkbox" name="roleDelete" checked></td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td><input type="checkbox" name="roleDelete"></td>';
                                                            }
                                                            ?>

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