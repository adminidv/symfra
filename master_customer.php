<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userID = $_SESSION['user'];

//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

$selectLastID = mysqli_query($con, "SELECT * FROM custmaster ORDER BY newCode DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['newCode'];
$newID = $lastID + 1;
$custNewId = $newID;

$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$custNewId' ORDER BY instance DESC LIMIT 1  ");
  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

  $lastID1 = $rowLastID1['instance'];
  $newID1 = $lastID1 + 1;
  $instance = $newID1;

// After Submit 1
if(isset($_POST['submitBtn1']))
{

   $instance =$instance;
  $record_id =$custNewId;
  $createBy =$loginUser;
  $createDate =$todayDate;

  $legCode = $_POST['legCodeC'];
  $cmpTitle = $_POST['cmpTitleC'];
  $newCode = '1111';
  $cmpStreet = $_POST['cmpStreetC'];
  $cmpCity = $_POST['cmpCityC'];
  $cmpCountry = $_POST['cmpCountryC'];

  if (isset($_POST['seaImportC']))
  {
    $seaImport = 1;
  }
  else
  {
    $seaImport = 0;
  }
  if (isset($_POST['airImportC']))
  {
    $airImport = 1;
  }
  else
  {
    $airImport = 0;
  }
  if (isset($_POST['seaExportC']))
  {
    $seaExport = 1;
  }
  else
  {
    $seaExport = 0;
  }
  if (isset($_POST['airExportC']))
  {
    $airExport = 1;
  }
  else
  {
    $airExport = 0;
  }

  if (isset($_POST['cmp_activeC']))
  {
    $cmp_activeC = "Active";
  }
  else
  {
    $cmp_activeC = "Deactive";
  }

  $telCode = $_POST['telCodeC'];
  $telNumber = $_POST['telNumberC'];
  $cmpWebsite = $_POST['cmpWebsiteC'];
  $cmpEmail = $_POST['cmpEmailC'];
  $taxType = $_POST['taxTypeC'];
  $taxNo = $_POST['taxNoC'];
  $SPO = $_POST['txtSPO'];

  // Checking if legacy code is already inserted
  $selectLegacy = mysqli_query($con, "SELECT * FROM custmaster WHERE legCode='$legCode' ");
  $legacyRows = mysqli_num_rows($selectLegacy);

  // echo $legacyRows;
  
  if ($legacyRows > 0)
  {
    // Generating the alert
    $msg = "This legacy code is already inserted. Please enter another one.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);
  }

  else
  {
    // Inserting records to DB
    $insertQuery = mysqli_query($con, "insert into custmaster (cmpType, legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, SPO, seaImport, airImport, seaExport, airExport, cmpStatus, partyType, userBr) values  ('Company', '$legCode', '$custNewId', '$cmpTitle', '$cmpStreet', '$cmpCity', '$cmpCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', '$SPO', '$seaImport', '$airImport', '$seaExport', '$airExport', '$cmp_activeC', 'cust', '$userBr')");

    $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Customer', '$custNewId', '$loginUser', '$todayDate') ");

    // Generating the alert
    $msg = "Company is inserted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_customer_V1.php?custID=".$custNewId);
  }

  }

  // After Save 1
if(isset($_POST['saveBtn1']))
{
  $legCode = $_POST['legCodeC'];
  $cmpTitle = $_POST['cmpTitleC'];
  $newCode = '1111';
  $cmpStreet = $_POST['cmpStreetC'];
  $cmpCity = $_POST['cmpCityC'];
  $cmpCountry = $_POST['cmpCountryC'];

  if (isset($_POST['seaImportC']))
  {
    $seaImport = 1;
  }
  else
  {
    $seaImport = 0;
  }
  if (isset($_POST['airImportC']))
  {
    $airImport = 1;
  }
  else
  {
    $airImport = 0;
  }
  if (isset($_POST['seaExportC']))
  {
    $seaExport = 1;
  }
  else
  {
    $seaExport = 0;
  }
  if (isset($_POST['airExportC']))
  {
    $airExport = 1;
  }
  else
  {
    $airExport = 0;
  }  

  $telCode = $_POST['telCodeC'];
  $telNumber = $_POST['telNumberC'];
  $cmpWebsite = $_POST['cmpWebsiteC'];
  $cmpEmail = $_POST['cmpEmailC'];
  $taxType = $_POST['taxTypeC'];
  $taxNo = $_POST['taxNoC'];
  $SPO = $_POST['txtSPO'];

  // Checking if legacy code is already inserted
  $selectLegacy = mysqli_query($con, "SELECT * FROM custmaster WHERE legCode='$legCode' ");
  $legacyRows = mysqli_num_rows($selectLegacy);

  // echo $legacyRows;
  
  if ($legacyRows > 0)
  {
    // Generating the alert
    $msg = "This legacy code is already inserted. Please enter another one.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);
  }

  else
  {
    // Inserting records to DB
    $insertQuery = mysqli_query($con, "insert into custmaster (cmpType, legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, SPO, seaImport, airImport, seaExport, airExport, cmpStatus, partyType, userBr) values  ('Company', '$legCode', '$custNewId', '$cmpTitle', '$cmpStreet', '$cmpCity', '$cmpCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', '$SPO', '$seaImport', '$airImport', '$seaExport', '$airExport', '0', 'cust', '$userBr')");

    // Generating the alert
    $msg = "Company is inserted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_customer.php");
  }

  }

// After Submit 2
if(isset($_POST['submitBtn2']))
{
  $legCode = $_POST['legCode'];
  $cmpTitle = $_POST['cmpTitle'];
  $newCode = '1111';
  $cmpStreet = $_POST['cmpStreet'];
  $cmpCity = $_POST['cmpCity'];
  $cmpCountry = $_POST['cmpCountry'];
  /*$seaImport = $_POST['seaImport'];
  $airImport = $_POST['airImport'];
  $seaExport = $_POST['seaExport'];
  $airExport = $_POST['airExport'];*/

  if (isset($_POST['seaImport']))
  {
    $seaImport = 1;
  }
  else
  {
    $seaImport = 0;
  }
  if (isset($_POST['airImport']))
  {
    $airImport = 1;
  }
  else
  {
    $airImport = 0;
  }
  if (isset($_POST['seaExport']))
  {
    $seaExport = 1;
  }
  else
  {
    $seaExport = 0;
  }
  if (isset($_POST['airExport']))
  {
    $airExport = 1;
  }
  else
  {
    $airExport = 0;
  }

  if (isset($_POST['cmp_active']))
  {
    $cmp_active = "Active";
  }
  else
  {
    $cmp_active = "Deactive";
  }

  $telCode = $_POST['telCode'];
  $telNumber = $_POST['telNumber'];
  $cmpWebsite = $_POST['cmpWebsite'];
  $cmpEmail = $_POST['cmpEmail'];
  $taxType = $_POST['taxType'];
  $taxNo = $_POST['taxNo'];
  $txtSPOC = $_POST['txtSPOC'];

  // Checking if legacy code is already inserted
  $selectLegacy = mysqli_query($con, "SELECT * FROM custmaster WHERE legCode='$legCode' ");
  $legacyRows = mysqli_num_rows($selectLegacy);

  // echo $legacyRows;
  
  if ($legacyRows > 0)
  {
    // Generating the alert
    $msg = "This legacy code is already inserted. Please enter another one.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);
  }

  else
  {
    // Inserting records to DB
    $insertQuery = mysqli_query($con, "insert into custmaster (cmpType, legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, SPO, seaImport, airImport, seaExport, airExport, cmpStatus, partyType, userBr) values  ('Individual', '$legCode', '$custNewId', '$cmpTitle', '$cmpStreet', '$cmpCity', '$cmpCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', '$txtSPOC', '$seaImport', '$airImport', '$seaExport', '$airExport', '$cmp_active', 'cust', '$userBr')");

    // Generating the alert
    $msg = "Individual is inserted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_customer.php");
  }

  }

  // After Save 2
if(isset($_POST['saveBtn2']))
{
  $legCode = $_POST['legCode'];
  $cmpTitle = $_POST['cmpTitle'];
  $newCode = '1111';
  $cmpStreet = $_POST['cmpStreet'];
  $cmpCity = $_POST['cmpCity'];
  $cmpCountry = $_POST['cmpCountry'];
  $seaImport = $_POST['seaImport'];
  $airImport = $_POST['airImport'];
  $seaExport = $_POST['seaExport'];
  $airExport = $_POST['airExport'];
  $telCode = $_POST['telCode'];
  $telNumber = $_POST['telNumber'];
  $cmpWebsite = $_POST['cmpWebsite'];
  $cmpEmail = $_POST['cmpEmail'];
  $taxType = $_POST['taxType'];
  $taxNo = $_POST['taxNo'];
  $txtSPOC = $_POST['txtSPOC'];

  // Checking if legacy code is already inserted
  $selectLegacy = mysqli_query($con, "SELECT * FROM custmaster WHERE legCode='$legCode' ");
  $legacyRows = mysqli_num_rows($selectLegacy);

  // echo $legacyRows;
  
  if ($legacyRows > 0)
  {
    // Generating the alert
    $msg = "This legacy code is already inserted. Please enter another one.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);
  }

  else
  {
    // Inserting records to DB
    $insertQuery = mysqli_query($con, "insert into custmaster (cmpType, legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, SPO, seaImport, airImport, seaExport, airExport, cmpStatus, partyType, userBr) values  ('Individual', '$legCode', '$custNewId', '$cmpTitle', '$cmpStreet', '$cmpCity', '$cmpCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', $txtSPOC, '$seaImport', '$airImport', '$seaExport', '$airExport', '0', 'cust', '$userBr')");

    // Generating the alert
    $msg = "Individual is inserted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_customer.php");
  }

  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master Customer</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/crm.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
    

    <style type="text/css">
    .main_widget_box .nav-tabs > li > a {
        color: #05417e;
    }
   .main_widget_box  .nav-tabs {
        background: #eee;
    }
    .main_widget_box .tab-pane {
    margin-top: 30px;
    width: 100%;
    float: left;
}

#prtner_Bnk .input-feild input {
    padding: 0 0px;
}
#prtner_Bnk .input-feild {
    width: 70%;
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
          <a href="usermodules.php" class="btn btn-info">CRM Resource</a>
          <a href="master_customer.php" class="btn btn-info active">Master Customer</a>
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

<div class=" add_customer_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
			<form action="" method="POST">

				     <!-- Modal One-->
						 <div class="modal fade confirmTable-modal" id="addModal2" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Confirmation</h4>
							        </div>
							        <div class="modal-body">
							          <p>Are You Sure You Want to Submit?</p>
							          <button type="submit" name="submitBtn2">Yes</button>
					                  <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

							        </div>
							        <div class="modal-footer">
							        	<p>Add Related content if needed</p>
							          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
							        </div>
							      </div>
							    </div>
						 </div>

				       <!-- Modal Two-->
				       <div class="modal fade confirmTable-modal" id="addModal1" role="dialog">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Confirmation</h4>
				                </div>
				                <div class="modal-body">
				                  <p>Are You Sure You Want to Submit?</p>
				                  <button type="submit" name="submitBtn1">Yes</button>
				                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

				                </div>
				                <div class="modal-footer">
				                  <p>Add Related content if needed</p>
				                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				                </div>
				              </div>
				            </div>
				       </div>

               <!-- Modal Three-->
               <div class="modal fade confirmTable-modal" id="saveModal1" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Save?</p>
                          <button type="submit" name="saveBtn1">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>

               <!-- Modal Four-->
               <div class="modal fade confirmTable-modal" id="saveModal2" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Save?</p>
                          <button type="submit" name="saveBtn2">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>

						 <h4><label id="formSummary" style="color: red;"></label></h4>
             <!-- For company -->
             <p id="s_cmpTitleC" style="color: red;"></p>
             <p id="s_legCodeC" style="color: red;"></p>
             <p id="s_cmpStreetC" style="color: red;"></p>
             <p id="s_cmpCityC" style="color: red;"></p>
             <p id="s_cmpCountryC" style="color: red;"></p>
             <p id="s_telCodeC" style="color: red;"></p>
             <p id="s_telNumberC" style="color: red;"></p>
             <p id="s_cmpEmailC" style="color: red;"></p>
             <p id="s_cmpWebsiteC" style="color: red;"></p>
             <p id="s_taxNoC" style="color: red;"></p>

             <!-- For individual -->
             <p id="s_cmpTitle" style="color: red;"></p>
             <p id="s_legCode" style="color: red;"></p>
             <p id="s_cmpStreet" style="color: red;"></p>
             <p id="s_cmpCity" style="color: red;"></p>
             <p id="s_cmpCountry" style="color: red;"></p>
             <p id="s_telCode" style="color: red;"></p>
             <p id="s_telNumber" style="color: red;"></p>
             <p id="s_cmpEmail" style="color: red;"></p>
             <p id="s_cmpWebsite" style="color: red;"></p>
             <p id="s_taxNo" style="color: red;"></p>

					  	<div class="widget_iner_box">
					  		<div class="col-md-6">
					  			<div class="input-label  hide"><label >Customer Type</label></div>	

					  			<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform1" checked> <label>Company</label>
                  </div>  

                  <div class="input-feild input-feild-checkboxs" style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform2" ><label>Individual</label>
                	</div>

					  		</div>
					  		<div class="col-md-6"></div>
					  	</div>

					  	<div class="cls"></div>
					  	<hr>

						<div id="company_form" class="company_form chkform1 chkboxform"  >
								<div class="Bsic_usr_info widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
			                      <!-- Go back button code starting here -->
			                      <?php include('inc_widgets/backBtn.php'); ?>
			                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="FormValidation1();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
													<button type="button" name="cancelBtn" onclick="cancelFunc();"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             

			                                                <div class="input-label"><label > New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input  disabled="" type="text" value="<?php echo $custNewId; ?>" name="newCodeC" id="newCodeC" placeholder="00000">
			                                                       
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Company Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitleC" maxlength="30" id="cmpTitleC"><span class="steric">*</span>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class="" type="text" maxlength="5" name="legCodeC" id="legCodeC" placeholder=""><span class="steric">*</span>
			                                                </div>                                             
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Street" name="cmpStreetC" id="cmpStreetC" maxlength="30"><span class="steric">*</span>
				                                                      <select name="cmpCountryC" id="cmpCountryC" onchange="checkCities();">
                                                                 <option value="">Select Country</option>
                                                                 <?php

                                                                  $selectCountry = mysqli_query($con, "SELECT * FROM country_setup");
                                                                  while ($rowCountry = mysqli_fetch_array($selectCountry))
                                                                  {

                                                                    echo '<option value="'.$rowCountry['country_name'].'">'.$rowCountry['country_name'].'</option>';

                                                                  }

                                                                  ?>
                                                              </select><span class="steric">*</span>
                                                              <select name="cmpCityC" id="cmpCityC">
                                                                 
                                                              </select><span class="steric">*</span>  
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                  <input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"><label>Sea Import</label><br>
				                                                  <input type="checkbox" name="airImportC" id="airImportC" value="Air Import"><label>Air Import</label><br>

				                                                   <input type="checkbox" name="seaExportC" id="seaExportC" value="Sea Export"><label>Sea Export</label><br>
				                                                   <input type="checkbox" name="airExportC" id="airExportC" value="Air Export"><label>Air Export</label>
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="telCodeC" id="telCodeC">
				                                                      		<option value="">Select</option>
                                                                  <option value="+92">+92</option>
                                                                  <option value="+91">+91</option>
                                                                  <option value="+44">+44</option>
				                                                      </select>
				                                                      <input  type="text" class="mini_input_field" name="telNumberC" id="telNumberC" maxlength="10"><span class="steric">*</span>
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Website" name="cmpWebsiteC" id="cmpWebsiteC" maxlength="40">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmailC" id="cmpEmailC" maxlength="40"><span class="steric">*</span>
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																                      <div class="input-feild">
	                                                      <select class="mini_select_field" name="taxTypeC" id="taxTypeC">
	                                                      		<option value="NTN Number">NTN Number</option>
	                                                      		<option value="STRN Number">STRN Number</option>
	                                                      </select>
	                                                      <input class="mini_input_field" type="text" name="taxNoC" id="taxNoC" maxlength="11">
				                                           		</div>

                                                      <div class="input-label"><label >SPO </label></div> 
                                                      <div class="input-feild">
                                                        <select name="txtSPO" id="txtSPO">
                                                          <option value="">Select</option>
                                                          <?php

                                                          $selectSPO = mysqli_query($con, "SELECT * FROM spo_setup");
                                                          while ($rowSPO = mysqli_fetch_array($selectSPO))
                                                          {

                                                            echo '<option value="'.$rowSPO['SrNo'].'">'.$rowSPO['spo_name'].'</option>';

                                                          }

                                                          ?>
                                                        </select>
                                                      </div>

                                                      <div class="input-label"><label >Active</label></div>
                                                      <div class="input-feild act_btn_user">
                                                        <input type="checkbox" name="cmp_activeC" checked id="cmp_activeC" />
                                                      </div>

										</div>	 
								</div>
						</div>

						<div id="individual_form" class="individual_form chkform2 chkboxform" style="display: none;" >
								<div class="Bsic_usr_info widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="FormValidation2();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="svModFunc2();"> <small>Save</small></button>
													<button type="button" name="cancelBtn2" onclick="cancelFunc();"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input disabled="" type="text" value="<?php echo $custNewId; ?>" name="newCode" id="newCode" placeholder="00000">
			                                                       
			                                                </div>
			                                                
			                                                <div class="input-label"><label > Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitle" maxlength="30" id="cmpTitle"><span class="steric">*</span>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class="" type="text" maxlength="5" name="legCode" id="legCode" placeholder=""><span class="steric">*</span>
			                                                </div>                                                      
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label > Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" name="cmpStreet" id="cmpStreet" placeholder="Street" maxlength="30"><span class="steric">*</span>
                                                              <select name="cmpCountry" id="cmpCountry" onchange="checkCities2();">
                                                                 <option value="">Select Country</option>
                                                                 <?php

                                                                  $selectCountry = mysqli_query($con, "SELECT * FROM country_setup");
                                                                  while ($rowCountry = mysqli_fetch_array($selectCountry))
                                                                  {

                                                                    echo '<option value="'.$rowCountry['country_name'].'">'.$rowCountry['country_name'].'</option>';

                                                                  }

                                                                  ?>
                                                              </select><span class="steric">*</span>
                                                              <select name="cmpCity" id="cmpCity">
                                                                
                                                              </select><span class="steric">*</span>
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                  <input type="checkbox" name="seaImport" id="seaImport" value="Sea Import"><label>Sea Import</label><br>
				                                                  <input type="checkbox" name="airImport" id="airImport" value="Air Import"><label>Air Import</label><br>

				                                                   <input type="checkbox" name="seaExport" id="seaExport" value="Sea Export" ><label>Sea Export</label><br>
				                                                   <input type="checkbox" name="airExport" id="airExport" value="Air Export" ><label>Air Export</label>
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" id="telCode" name="telCode" >
				                                                      		<option value="">Select</option>
                                                                  <option value="+92">+92</option>
                                                                  <option value="+91">+91</option>
                                                                  <option value="+44">+44</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="telNumber" id="telNumber" maxlength="10"><span class="steric">*</span>
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" maxlength="40">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" maxlength="40"><span class="steric">*</span>
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																                      <div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType" >
				                                                      		<option value="NTN Number">NTN Number</option>
                                                                  <option value="STRN Number">STRN Number</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNo" id="taxNo" maxlength="11">
				                                           		</div>

                                                      <div class="input-label"><label >SPO </label></div> 
                                                      <div class="input-feild">
                                                        <select name="txtSPOC" id="txtSPOC">
                                                            <option value="">Select</option>
                                                            <?php

                                                            $selectSPO = mysqli_query($con, "SELECT * FROM spo_setup");
                                                            while ($rowSPO = mysqli_fetch_array($selectSPO))
                                                            {

                                                              echo '<option value="'.$rowSPO['SrNo'].'">'.$rowSPO['spo_name'].'</option>';

                                                            }

                                                            ?>
                                                        </select>
                                                      </div>

                                                      <div class="input-label"><label >Active</label></div>
                                                      <div class="input-feild act_btn_user">
                                                        <input type="checkbox" name="cmp_active" checked id="cmp_active" />
                                                      </div>
										</div>	 
								</div>
                
						</div>
                                   
											<div class="cls"></div>
											<hr>
                      
			
		</form>
				
	</div>

</div>

<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chkboxform").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

<script type="text/javascript">
function sbtModFunc1()
{
	$("#addModal1").modal();
}
function sbtModFunc2()
{
	$("#addModal2").modal();
}
function svModFunc1()
{
  $("#saveModal1").modal();
}
function svModFunc2()
{
  $("#saveModal2").modal();
}
</script>

<script type="text/javascript">
   function FormValidation1()
   {
      var regexp = /^[a-z]*$/i;
      var regexp2 = /^[0-9]*$/i;
      var re = /\S+@\S+\.\S+/;
      var web = /\S+\.\S+/;
      var web2 = /(www|http:|https:)+[^\s]+[\w]/;
      var missingVal = 0;
      
      var cmpTitleC = document.getElementById('cmpTitleC').value;
      var legCodeC = document.getElementById('legCodeC').value;
      var cmpStreetC = document.getElementById('cmpStreetC').value;
      var cmpCityC = document.getElementById('cmpCityC').value;
      var cmpCountryC = document.getElementById('cmpCountryC').value;
      var telCodeC = document.getElementById('telCodeC').value;
      var telNumberC = document.getElementById('telNumberC').value;
      var cmpEmailC = document.getElementById('cmpEmailC').value;
      var cmpWebsiteC = document.getElementById('cmpWebsiteC').value;
      var taxNoC = document.getElementById('taxNoC').value;
   
      var summary = "Summary: ";

      if(cmpTitleC == "")
      {
          document.getElementById('cmpTitleC').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_cmpTitleC").innerHTML = "Company title is required.";
      }
      if(cmpTitleC != "")
      {
          document.getElementById('cmpTitleC').style.borderColor = "white";
          document.getElementById("s_cmpTitleC").innerHTML = "";
      }
      
      if(legCodeC == "")
      {
          document.getElementById('legCodeC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Lastname is required.";
          document.getElementById("s_legCodeC").innerHTML = "Legacy code is required.";
      }
      if(legCodeC != "")
      {
          document.getElementById('legCodeC').style.borderColor = "white";
          document.getElementById("s_legCodeC").innerHTML = "";
      }

      if(cmpStreetC == "")
      {
          document.getElementById('cmpStreetC').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " Date of birth is required ";
          document.getElementById("s_cmpStreetC").innerHTML = "Street is required.";
      }
      if(cmpStreetC != "")
      {
          document.getElementById('cmpStreetC').style.borderColor = "white";
          document.getElementById("s_cmpStreetC").innerHTML = "";
      }

      if(cmpCityC == "")
      {
          document.getElementById('cmpCityC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Email id required.";
          document.getElementById("s_cmpCityC").innerHTML = "City is required.";
      }
      if(cmpCityC != "")
      {
          document.getElementById('cmpCityC').style.borderColor = "white";
          document.getElementById("s_cmpCityC").innerHTML = "";
      }

      if(cmpCountryC == "")
      {
          document.getElementById('cmpCountryC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_cmpCountryC").innerHTML = "Country is required.";
      }
      if(cmpCountryC != "")
      {
          document.getElementById('cmpCountryC').style.borderColor = "white";
          document.getElementById("s_cmpCountryC").innerHTML = "";
      }

      if(telCodeC == "")
      {
          document.getElementById('telCodeC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_telCodeC").innerHTML = "Telephone Code is required.";
      }
      if(telCodeC != "")
      {
          document.getElementById('telCodeC').style.borderColor = "white";
          document.getElementById("s_telCodeC").innerHTML = "";
      }

      if(telNumberC == "")
      {
          document.getElementById('telNumberC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_telNumberC").innerHTML = "Telephone Number is required.";
      }
      if(telNumberC != "")
      {
          document.getElementById('telNumberC').style.borderColor = "white";
          document.getElementById("s_telNumberC").innerHTML = "";

          if (!regexp2.test(telNumberC))
          {
            document.getElementById('telNumberC').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_telNumberC").innerHTML = "Telephone number must not contain alphabet or special character.";
          }
      }

      if(cmpEmailC == "")
      {
          document.getElementById('cmpEmailC').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_cmpEmailC").innerHTML = "Email is required.";
      }
      if(cmpEmailC != "")
      {
          document.getElementById('cmpEmailC').style.borderColor = "white";
          document.getElementById("s_cmpEmailC").innerHTML = "";

          if (!re.test(cmpEmailC))
          {
            document.getElementById('cmpEmailC').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_cmpEmailC").innerHTML = "Please follow the email format (user@domain.com).";
          }
      }

      if(cmpWebsiteC != "")
      {
          document.getElementById('cmpWebsiteC').style.borderColor = "white";
          document.getElementById("s_cmpWebsiteC").innerHTML = "";

          if (!web2.test(cmpWebsiteC))
          {
            document.getElementById('cmpWebsiteC').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_cmpWebsiteC").innerHTML = "Please follow the website format (website.com).";
          }
      }

      if(taxNoC != "")
      {
          document.getElementById('taxNoC').style.borderColor = "white";
          document.getElementById("s_taxNoC").innerHTML = "";

          if (!regexp2.test(taxNoC))
          {
            document.getElementById('taxNoC').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_taxNoC").innerHTML = "Tax number must not contain alphabet or special character.";
          }
      }

      if (missingVal != 1)
      {
        document.getElementById('s_cmpTitleC').style.borderColor = "white";
        document.getElementById('s_legCodeC').style.borderColor = "white";
        document.getElementById('s_cmpStreetC').style.borderColor = "white";
        document.getElementById('s_cmpCityC').style.borderColor = "white";
        document.getElementById('s_cmpCountryC').style.borderColor = "white";
        document.getElementById('s_telCodeC').style.borderColor = "white";
        document.getElementById('s_telNumberC').style.borderColor = "white";
        document.getElementById('s_cmpEmailC').style.borderColor = "white";
        document.getElementById('s_cmpWebsiteC').style.borderColor = "white";
       
        $("#addModal1").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      /*if (/^[0-9]+$/.test(document.getElementById("firstname").value)) {
          alert("First Name Contains Numbers!");
          document.getElementById('firstname').style.borderColor = "red";
          return false;
      }else{
          document.getElementById('firstname').style.borderColor = "green";
      }
      if(fn.length <=2){
          alert('Your Name is To Short');
          document.getElementById('firstname').style.borderColor = "red";
          return false;
      }else{
          document.getElementById('firstname').style.borderColor = "green";
      }*/
  }

  function cancelFunc()
  {
    window.location = "master_customer.php";
  }
</script>

<script type="text/javascript">
  function FormValidation2()
   {
      var regexp = /^[a-z]*$/i;
      var regexp2 = /^[0-9]*$/i;
      var re = /\S+@\S+\.\S+/;
      var web = /\S+\.\S+/;
      var web2 = /(www|http:|https:)+[^\s]+[\w]/;
      var missingVal = 0;
      
      var cmpTitle = document.getElementById('cmpTitle').value;
      var legCode = document.getElementById('legCode').value;
      var cmpStreet = document.getElementById('cmpStreet').value;
      var cmpCity = document.getElementById('cmpCity').value;
      var cmpCountry = document.getElementById('cmpCountry').value;
      var telCode = document.getElementById('telCode').value;
      var telNumber = document.getElementById('telNumber').value;
      var cmpEmail = document.getElementById('cmpEmail').value;
      var cmpWebsite = document.getElementById('cmpWebsite').value;
      var taxNo = document.getElementById('taxNo').value;
   
      var summary = "Summary: ";

      if(cmpTitle == "")
      {
          document.getElementById('cmpTitle').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_cmpTitle").innerHTML = "Company title is required.";
      }
      if(cmpTitle != "")
      {
          document.getElementById('cmpTitle').style.borderColor = "white";
          document.getElementById("s_cmpTitle").innerHTML = "";
      }
      
      if(legCode == "")
      {
          document.getElementById('legCode').style.borderColor = "red";
          missingVal = 1;
          // summary += " Lastname is required.";
          document.getElementById("s_legCode").innerHTML = "Legacy code is required.";
      }
      if(legCode != "")
      {
          document.getElementById('legCode').style.borderColor = "white";
          document.getElementById("s_legCode").innerHTML = "";
      }

      if(cmpStreet == "")
      {
          document.getElementById('cmpStreet').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " Date of birth is required ";
          document.getElementById("s_cmpStreet").innerHTML = "Street is required.";
      }
      if(cmpStreet != "")
      {
          document.getElementById('cmpStreet').style.borderColor = "white";
          document.getElementById("s_cmpStreet").innerHTML = "";
      }

      if(cmpCity == "")
      {
          document.getElementById('cmpCity').style.borderColor = "red";
          missingVal = 1;
          // summary += " Email id required.";
          document.getElementById("s_cmpCity").innerHTML = "City is required.";
      }
      if(cmpCity != "")
      {
          document.getElementById('cmpCity').style.borderColor = "white";
          document.getElementById("s_cmpCity").innerHTML = "";
      }

      if(cmpCountry == "")
      {
          document.getElementById('cmpCountry').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_cmpCountry").innerHTML = "Country is required.";
      }
      if(cmpCountry != "")
      {
          document.getElementById('cmpCountry').style.borderColor = "white";
          document.getElementById("s_cmpCountry").innerHTML = "";
      }

      if(telCode == "")
      {
          document.getElementById('telCode').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_telCode").innerHTML = "Telephone Code is required.";
      }
      if(telCode != "")
      {
          document.getElementById('telCode').style.borderColor = "white";
          document.getElementById("s_telCode").innerHTML = "";
      }

      if(telNumber == "")
      {
          document.getElementById('telNumber').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_telNumber").innerHTML = "Telephone Number is required.";
      }
      if(telNumber != "")
      {
          document.getElementById('telNumber').style.borderColor = "white";
          document.getElementById("s_telNumber").innerHTML = "";

          if (!regexp2.test(telNumber))
          {
            document.getElementById('telNumber').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_telNumber").innerHTML = "Telephone number must not contain alphabet or special character.";
          }
      }

      if(cmpEmail == "")
      {
          document.getElementById('cmpEmail').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_cmpEmail").innerHTML = "Email is required.";
      }
      if(cmpEmail != "")
      {
          document.getElementById('cmpEmail').style.borderColor = "white";
          document.getElementById("s_cmpEmail").innerHTML = "";

          if (!re.test(cmpEmail))
          {
            document.getElementById('cmpEmail').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_cmpEmail").innerHTML = "Please follow the email format (user@domain.com).";
          }
      }

      if(cmpWebsite != "")
      {
          document.getElementById('cmpWebsite').style.borderColor = "white";
          document.getElementById("s_cmpWebsite").innerHTML = "";

          if (!web2.test(cmpWebsite))
          {
            document.getElementById('cmpWebsite').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_cmpWebsite").innerHTML = "Please follow the website format (website.com).";
          }
      }

      if(taxNo != "")
      {
          document.getElementById('taxNo').style.borderColor = "white";
          document.getElementById("s_taxNo").innerHTML = "";

          if (!regexp2.test(taxNo))
          {
            document.getElementById('taxNo').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("s_taxNo").innerHTML = "Tax number must not contain alphabet or special character.";
          }
      }

      if (missingVal != 1)
      {
        document.getElementById('s_cmpTitle').style.borderColor = "white";
        document.getElementById('s_legCode').style.borderColor = "white";
        document.getElementById('s_cmpStreet').style.borderColor = "white";
        document.getElementById('s_cmpCity').style.borderColor = "white";
        document.getElementById('s_cmpCountry').style.borderColor = "white";
        document.getElementById('s_telCode').style.borderColor = "white";
        document.getElementById('s_telNumber').style.borderColor = "white";
        document.getElementById('s_cmpEmail').style.borderColor = "white";
        document.getElementById('s_cmpWebsite').style.borderColor = "white";
       
        $("#addModal2").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      /*if (/^[0-9]+$/.test(document.getElementById("firstname").value)) {
          alert("First Name Contains Numbers!");
          document.getElementById('firstname').style.borderColor = "red";
          return false;
      }else{
          document.getElementById('firstname').style.borderColor = "green";
      }
      if(fn.length <=2){
          alert('Your Name is To Short');
          document.getElementById('firstname').style.borderColor = "red";
          return false;
      }else{
          document.getElementById('firstname').style.borderColor = "green";
      }*/
  }
</script>

<script type="text/javascript">
function checkCities()
{
  var bpCountry = document.getElementById("cmpCountryC").value;

  $.ajax({
     url:"checkCities.php",  
            method:"GET",  
            data:{bpCountry:bpCountry}, 
            dataType:"text", 
     success: function(data) {
         $('#cmpCityC').html(data);
     }
  });
}

function checkCities2()
{
  var bpCountry = document.getElementById("cmpCountry").value;

  $.ajax({
     url:"checkCities.php",  
            method:"GET",  
            data:{bpCountry:bpCountry}, 
            dataType:"text", 
     success: function(data) {
         $('#cmpCity').html(data);
     }
  });
}

</script>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>