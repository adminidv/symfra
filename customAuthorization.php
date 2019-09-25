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
    $nameForAuth = $rowUserAuth['user_fName'];
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
  $auth_Name = $_POST['auth_Name'] . '-' . $nameForAuth;

  // Inserting records to Authorization Set
  $insertAuthSet = mysqli_query($con, "insert into authorizationset (auth_Name) values ('$auth_Name')");

  $insertAuthDetails = mysqli_query($con, "insert into authdetails (auth_Name, add_U, update_U, delete_U, view_U, deptView, deptAdd, deptDelete, deptEdit, desigView, desigAdd, desigDelete, desigEdit, roleView, roleAdd, roleDelete, roleEdit, empView, empAdd, empDelete, empEdit, leaveView, leaveAdd, leaveDelete, leaveEdit, siView, siAdd, siEdit, siDelete, seView, seAdd, seEdit, seDelete, aiView, aiAdd, aiEdit, aiDelete, aeView, aeAdd, aeEdit, aeDelete, custView, custAdd, custEdit, custDelete, vendorView, vendorAdd, vendorEdit, vendorDelete, bpView, bpAdd, bpEdit, bpDelete, airportView, airportAdd, airportEdit, airportDelete, airlineView, airlineAdd, airlineEdit, airlineDelete, businessView, businessAdd, businessEdit, businessDelete, cityView, cityAdd, cityEdit, cityDelete, commodityView, commodityAdd, commodityEdit, commodityDelete, countryView, countryAdd, countryEdit, countryDelete, currencyView, currencyAdd, currencyEdit, currencyDelete, destinationView, destinationAdd, destinationEdit, destinationDelete, mopView, mopAdd, mopEdit, mopDelete, regionView, regionAdd, regionEdit, regionDelete, sectorView, sectorAdd, sectorEdit, sectorDelete, slView, slAdd, slEdit, slDelete, spoView, spoAdd, spoEdit, spoDelete) values ('$auth_Name', '$add_U', '$update_U', '$delete_U', '$view_U', '$deptView', '$deptAdd', '$deptDelete', '$deptEdit', '$desigView', '$desigAdd', '$desigDelete', '$desigEdit', '$roleView', '$roleAdd', '$roleDelete', '$roleEdit', '$empView', '$empAdd', '$empDelete', '$empEdit', '$leaveView', '$leaveAdd', '$leaveDelete', '$leaveEdit', '$siView', '$siAdd', '$siEdit', '$siDelete', '$seView', '$seAdd', '$seEdit', '$seDelete', '$aiView', '$aiAdd', '$aiEdit', '$aiDelete', '$aeView', '$aeAdd', '$aeEdit', '$aeDelete', '$custView', '$custAdd', '$custEdit', '$custDelete', '$vendorView', '$vendorAdd', '$vendorEdit', '$vendorDelete', '$bpView', '$bpAdd', '$bpEdit', '$bpDelete', '$airportView', '$airportAdd', '$airportEdit', '$airportDelete', '$airlineView', '$airlineAdd', '$airlineEdit', '$airlineDelete', '$businessView', '$businessAdd', '$businessEdit', '$businessDelete', '$cityView', '$cityAdd', '$cityEdit', '$cityDelete', '$commodityView', '$commodityAdd', '$commodityEdit', '$commodityDelete', '$countryView', '$countryAdd', '$countryEdit', '$countryDelete', '$currencyView', '$currencyAdd', '$currencyEdit', '$currencyDelete', '$destinationView', '$destinationAdd', '$destinationEdit', '$destinationDelete', '$mopView', '$mopAdd', '$mopEdit', '$mopDelete', '$regionView', '$regionAdd', '$regionEdit', '$regionDelete', '$sectorView', '$sectorAdd', '$sectorEdit', '$sectorDelete', '$slView', '$slAdd', '$slEdit', '$slDelete', '$spoView', '$spoAdd', '$spoEdit', '$spoDelete')");

  // Updating the user Auth
  $selectLastID = mysqli_query($con, "SELECT * FROM authdetails ORDER BY SrNo DESC LIMIT 1");
  $rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

  $newAuthID = $rowLastID['SrNo'];
  // $newAuthID = $_POST['auth_id'] + 1;
  $user_id = $_POST['authUser'];

  $updateUserAuth = mysqli_query($con, "UPDATE users SET Auth_ID='$newAuthID' WHERE user_ID='$user_id' ");

  header("Location: customAuthorization.php?user_id=" . $user_id);

  // $updateAuth = mysqli_query($con, "UPDATE authdetails SET auth_Name='$auth_Name', add_U='$add_U', update_U='$update_U', delete_U='$delete_U', view_U='$view_U', deptView='$deptView', deptAdd='$deptAdd', deptDelete='$deptDelete', deptEdit='$deptEdit', desigView='$desigView', desigAdd='$desigAdd', desigDelete='$desigDelete', desigEdit='$desigEdit', roleView='$roleView', roleAdd='$roleAdd', roleDelete='$roleDelete', roleEdit='$roleEdit', empView='$empView', empAdd='$empAdd', empDelete='$empDelete', empEdit='$empEdit', leaveView='$leaveView', leaveAdd='$leaveAdd', leaveDelete='$leaveDelete', leaveEdit='$leaveEdit', siView='$siView', siAdd='$siAdd', siEdit='$siEdit', siDelete='$siDelete', seView='$seView', seAdd='$seAdd', seEdit='$seEdit', seDelete='$seDelete', aiView='$aiView', aiAdd='$aiAdd', aiEdit='$aiEdit', aiDelete='$aiDelete', aeView='$aeView', aeAdd='$aeAdd', aeEdit='$aeEdit', aeDelete='$aeDelete', custView='$custView', custAdd='$custAdd', custEdit='$custEdit', custDelete='$custDelete', vendorView='$vendorView', vendorAdd='$vendorAdd', vendorEdit='$vendorEdit', vendorDelete='$vendorDelete', bpView='$bpView', bpAdd='$bpAdd', bpEdit='$bpEdit', bpDelete='$bpDelete', airportView='$airportView', airportAdd='$airportAdd', airportEdit='$airportEdit', airportDelete='$airportDelete', airlineView='$airlineView', airlineAdd='$airlineAdd', airlineEdit='$airlineEdit', airlineDelete='$airlineDelete', businessView='$businessView', businessAdd='$businessAdd', businessEdit='$businessEdit', businessDelete='$businessDelete', cityView='$cityView', cityAdd='$cityAdd', cityEdit='$cityEdit', cityDelete='$cityDelete', commodityView='$commodityView', commodityAdd='$commodityAdd', commodityEdit='$commodityEdit', commodityDelete='$commodityDelete', countryView='$countryView', countryAdd='$countryAdd', countryEdit='$countryEdit', countryDelete='$countryDelete', currencyView='$currencyView', currencyAdd='$currencyAdd', currencyEdit='$currencyEdit', currencyDelete='$currencyDelete', destinationView='$destinationView', destinationAdd='$destinationAdd', destinationEdit='$destinationEdit', destinationDelete='$destinationDelete', mopView='$mopView', mopAdd='$mopAdd', mopEdit='$mopEdit', mopDelete='$mopDelete', regionView='$regionView', regionAdd='$regionAdd', regionEdit='$regionEdit', regionDelete='$regionDelete', sectorView='$sectorView', sectorAdd='$sectorAdd', sectorEdit='$sectorEdit', sectorDelete='$sectorDelete', slView='$slView', slAdd='$slAdd', slEdit='$slEdit', slDelete='$slDelete', spoView='$spoView', spoAdd='$spoAdd', spoEdit='$spoEdit', spoDelete='$spoDelete' WHERE Auth_ID='$Auth_ID' ");

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
                                                <div class="input-label hidden"><label >Authorization ID </label></div>
                                                <div class="input-feild hidden">
                                                <input type="text" name="auth_id" id="auth_id" value="<?php echo $Auth_ID; ?>" required>
                                                </div>

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

                                                     else
                                                     {
                                                      echo '<option value="">Select</option>';
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
                                                    <input type="text" name="userDepart" id="userDepart" disabled value="<?php echo $userDepart; ?>">
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