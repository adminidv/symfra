<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");



  // $user_id= $_GET['user_id'];
  // // echo $user_id;
  // $qry= "SELECT * FROM users WHERE user_ID = '$user_id'";
  // $run= mysqli_query($con , $qry);
  // $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

// Getting the Customer ID
$vndID = $_GET['vndID'];
$qry= "SELECT * FROM custmaster WHERE newCode = '$vndID'";
$run= mysqli_query($con, $qry);
$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($vndID==$row['newCode'])
{
  $legCode_p = $row['legCode'];
  $newCode_p = $row['newCode'];
  $vndTitle_p = $row['cmpTitle'];
  $vndStreet_p = $row['cmpStreet'];
  $vndCity_p = $row['cmpCity'];
  $vndCountry_p = $row['cmpCountry'];
  $telCode_p = $row['telCode'];
  $telNumber_p = $row['telNumber'];
  $cmpWebsite_p = $row['cmpWebsite'];
  $cmpEmail_p = $row['cmpEmail'];
  $taxType_p = $row['taxType'];
  $taxNo_p = $row['taxNo'];
  $seaImport_p = $row['seaImport'];
  $airImport_p = $row['airImport'];
  $seaExport_p = $row['seaExport'];
  $airExport_p = $row['airExport'];
  $cmpStatus_p = $row['cmpStatus'];
 }
else
{
    $msg = 'Got some error ';

    function alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
    alert($msg);
}

// After Submit 
if(isset($_POST['updateBtn']))
{
	$legCode = $_POST['legCode'];
	$vndTitle = $_POST['vndTitle'];
	$vndStreet = $_POST['vndStreet'];
	$vndCity = $_POST['vndCity'];
	$vndCountry = $_POST['vndCountry'];
	$telCode = $_POST['telCode'];
	$telNumber = $_POST['telNumber'];
	$cmpWebsite = $_POST['cmpWebsite'];
	$cmpEmail = $_POST['cmpEmail'];
	$taxType = $_POST['taxType'];
	$taxNo = $_POST['taxNo'];
	$cmpStatus= '1';

	$clause = " WHERE newCode='$vndID'";
	$initQuery = "UPDATE custmaster SET legCode='$legCode' ";

	$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$vndID' ORDER BY instance DESC LIMIT 1  ");
	$rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

	$lastID1 = $rowLastID1['instance'];
	$newID1 = $lastID1 + 1;
	$instance = $newID1;

	$selectCreate = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$vndID' ");
	while ($rowCreate = mysqli_fetch_array($selectCreate))
	{
		if ($rowCreate['createBy'] != "")
		{
			$createBy = $rowCreate['createBy'];
		}
		if ($rowCreate['createDate'] != "")
		{
			$createDate = $rowCreate['createDate'];
		}
	}

	$initChangeLog = "INSERT INTO chainlog (instance, formName, record_id, createBy, createDate, updateBy, updateDate, perValue, newValue)";
	$initChangeLog .= " VALUES ('$newID1', 'Vendor', '$vndID', '$createBy', '$createDate', '$loginUser', '$todayDate'";

	if ($vndTitle != $vndTitle_p)
	{
		$initQuery .= ", cmpTitle='$vndTitle'";
		$initChangeLog2 = ", '$vndTitle_p', '$vndTitle') ";
	}
	if ($vndStreet != $vndStreet_p)
	{
		$initQuery .= ", cmpStreet='$vndStreet'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($vndCity != $vndCity_p)
	{
		$initQuery .= ", cmpCity='$vndCity'";
		$initChangeLog2 = ", '$vndCity_p', '$vndCity') ";
	}
	if ($vndCountry != $vndCountry_p)
	{
		$initQuery .= ", cmpCountry='$vndCountry'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($telCode != $telCode_p)
	{
		$initQuery .= ", telCode='$telCode'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($telNumber != $telNumber_p)
	{
		$initQuery .= ", telNumber='$telNumber'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($cmpWebsite != $cmpWebsite_p)
	{
		$initQuery .= ", cmpWebsite='$cmpWebsite'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($cmpEmail != $cmpEmail_p)
	{
		$initQuery .= ", cmpEmail='$cmpEmail'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($taxType != $taxType_p)
	{
		$initQuery .= ", taxType='$taxType'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}
	if ($taxNo != $taxNo_p)
	{
		$initQuery .= ", taxNo='$taxNo'";
		$initChangeLog2 = ", '$vndStreet_p', '$vndStreet') ";
	}

	$finalQuery = $initQuery . $clause;
	// echo $finalQuery . "<br>";

	mysqli_query($con, $finalQuery) or die(mysqli_error($con));

	$finalChangeLog = $initChangeLog . $initChangeLog2;
	// echo $finalChangeLog;

	mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

	

	// $insertQuery2 = mysqli_query($con, "insert into chainlog (instance,formName,record_id,createBy,createDate,updateBy,updateDate,perValue,newValue) values('$newID1','Add User','$vndID','','','$loginUser','$todayDate','$perValue','$newValue')");

	header("Location: master_vendor_VE.php?vndID=" . $vndID);

    // echo $finalQuery;

	// Generating the alert
	/*$msg = "Vendor updated successfully.";
	function alert($msg)
	{
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	alert($msg);*/
}

// After Save 1
/*if(isset($_POST['saveBtn1']))
{
  $legCode = $_POST['legCode'];
  $vndTitle = $_POST['vndTitle'];
  $newCode = '1111';
  $vndStreet = $_POST['vndStreet'];
  $vndCity = $_POST['vndCity'];
  $vndCountry = $_POST['vndCountry'];
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
  $repName = $_POST['repName'];
  $repDesig = $_POST['repDesig'];
  $repOffCell = $_POST['repOffCell'];
  $repPerCell = $_POST['repPerCell'];
  $repEmail = $_POST['repEmail'];
  $fnBnkName = $_POST['fnBnkName'];
  $fnBnkBr = $_POST['fnBnkBr'];
  $fnCity = $_POST['fnCity'];
  $fnCountry = $_POST['fnCountry'];
  $fnNonIban = $_POST['fnNonIban'];
  $fnIban = $_POST['fnIban'];
  $fnCrDays = $_POST['fnCrDays'];
  $fnCrAmount = $_POST['fnCrAmount'];
  $cmpStatus= '0';

  $updateQuery =  mysqli_query($con, "UPDATE vndmaster SET legCode='$legCode', vndTitle='$vndTitle', vndStreet='$vndStreet', vndCity='$vndCity', vndCountry='$vndCountry', telCode='$telCode', telNumber='$telNumber', cmpWebsite='$cmpWebsite', cmpEmail='$cmpEmail', taxType='$taxType', taxNo='$taxNo', seaImport='$seaImport', airImport='$airImport', seaExport='$seaExport', airExport='$airExport', repName='$repName', repDesig='$repDesig', repOffCell='$repOffCell', repPerCell='$repPerCell', repEmail='$repEmail', fnBnkName='$fnBnkName', fnBnkBr='$fnBnkBr', fnCity='$fnCity', fnCountry='$fnCountry', fnIban='$fnIban', fnNonIban='$fnNonIban', fnCrDays='$fnCrDays', fnCrAmount='$fnCrAmount', cmpStatus='0' WHERE newCode='$vndID' ");

	// Generating the alert
	$msg = "Vendor updated successfully.";
	function alert($msg)
	{
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	alert($msg);
}*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master Vendor Edit</title>
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
          <a href="usermodules.php" class="btn btn-info">CRM</a>
          <a href="master_vendor.php" class="btn btn-info active">Master Vendor</a>
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

<div class="  main_widget_box">
	<div class="">
									<!-- <hr> -->
			<form action="" method="POST">

				<!-- Show Log Chain -->
      <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Show Log Chain -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Log Chain Details</h4>
                </div>

                  <table id="dpttable" class="display nowrap no-footer" style="width:100%">
                     
                     <thead>
                      <tr>
                      <th>SrNo</th>
                      <th>Instance</th>
                      <th>Record ID</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Update By</th>
                      <th>Update Date</th>
                      <th>Pervious Value</th>
                      <th>New Value</th>
                      </tr>

                     </thead>
                     <tbody>
                      <?php

                              include 'manage/connection.php';

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Vendor' ");

                              ?>
                          <?php

                                while ($rowchainlog = mysqli_fetch_array($selectchainlog))
                                {
                                ?>

                      <tr>
                      <td><?php echo $rowchainlog['SrNo']; ?></td>
                      <td><?php echo $rowchainlog['instance']; ?></td>
                      <td><?php echo $rowchainlog['record_id']; ?></td>
                      <td><?php echo $rowchainlog['createBy']; ?></td>
                      <td><?php echo $rowchainlog['createDate']; ?></td>
                      <td><?php echo $rowchainlog['updateBy']; ?></td>
                      <td><?php echo $rowchainlog['updateDate']; ?></td>
                      <td><?php echo $rowchainlog['perValue']; ?></td>
                      <td><?php echo $rowchainlog['newValue']; ?></td>
                      </tr>
                      <?php
                     }
                     ?>
                     </tbody>

                  </table>
                
              </div>
              
            </div>
        </div>


				     	<!-- Modal One-->
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
							          <button type="submit" name="updateBtn">Yes</button>
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

               <!-- Modal Three (Employement History)-->
				       <div class="modal fade symfra_popup2" id="empHst" role="dialog">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Add Representative Details</h4>
				                </div>
				                <div class="modal-body">
				                  <div class="input-fields">  
				                    <label>Name</label> 
				                    <input type="text" name="repNameS" id="repNameS" placeholder="Organization Name">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Designation</label> 
				                    <input type="text" name="repDesigS" id="repDesigS" placeholder="Designation">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Personal #</label> 
				                    <input type="text" name="repPerCnS" id="repPerCnS" placeholder="Personal Contact">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Official #</label> 
				                    <input type="text" name="repPeroffS" id="repPeroffS" placeholder="Official Contact">    
				                  </div>

				                  <button type="submit" name="saveEmployment" id="saveEmployment">Submit</button>

				                </div>
				              </div>
				            </div>
				        </div>

				      <!-- Modal Four (Finance History)-->
				       <div class="modal fade symfra_popup2" id="eduHst" role="dialog">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Finance History</h4>
				                </div>
				                <div class="modal-body">
				                  <div class="input-fields">  
				                    <label>Bank Name</label> 
				                    <input type="text" name="bnkNameS" id="bnkNameS" placeholder="Bank Name">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Branch</label> 
				                    <input type="text" name="bnkBranchS" id="bnkBranchS" placeholder="Bank Branch">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>City</label> 
				                    <input type="text" name="bnkCityS" id="bnkCityS" placeholder="City">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Country</label> 
				                    <input type="text" name="bnkCountryS" id="bnkCountryS" placeholder="Country">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Account (Non-IBAN)</label> 
				                    <input type="text" name="bnkAccNS" id="bnkAccNS" placeholder="Account (Non-IBAN)">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Account (IBAN)</label> 
				                    <input type="text" name="bnkAccS" id="bnkAccS" placeholder="Account (IBAN)">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Credit Days</label> 
				                    <input type="text" name="crDaysS" id="crDaysS" placeholder="Credit Days">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Credit Amount</label> 
				                    <input type="text" name="crAmountS" id="crAmountS" placeholder="Credit Amount">    
				                  </div>

				                  <button type="submit" name="saveFinance" id="saveFinance">Submit</button>

				                </div>
				              </div>
				            </div>
				        </div>

						 <label id="formSummary" style="color: red;"></label>

							  	<!-- <div class="widget_iner_box hide">
							  		<div class="col-md-6">
							  			<div class="input-label  hide"><label >Customer Type</label></div>	

							  			<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
		                                  
		                                  <input type="radio" name="chkfrmname" value="chkform1" checked=""> <label>Company</label>

		                                </div>  

		                                <div class="input-feild input-feild-checkboxs" style="width: 25%;">
		                                  <input type="radio" name="chkfrmname" value="chkform2" ><label>Individual</label>

		                              	</div>

							  		</div>
							  		<div class="col-md-6"></div>
							  	</div> -->

											  	<!-- <div class="cls"></div>
											  	<hr> -->

								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													 <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
													<button type="button" id="btnConfirm_Su" name="btnConfirm_Su" onclick="sbtModFunc1();"> <small>Submit</small></button>
													<button type="button" id="btnConfirm_S" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
													<button type="button" name="submitBtn"> <small>Cancel</small></button>					
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input disabled type="text" name="newCode" id="newCode" placeholder="00000" value="<?php echo $newCode_p; ?>">
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Vendor Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="vndTitle" id="vndTitle" value="<?php echo $vndTitle_p; ?>">
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">

			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class="" type="text" name="legCode" id="legCode" placeholder="" value="<?php echo $legCode_p; ?>">
			                                                </div>

			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Street" name="vndStreet" id="vndStreet" value="<?php echo $vndStreet_p; ?>">
				                                                      <input type="tex" placeholder="City" name="vndCity" id="vndCity" value="<?php echo $vndCity_p; ?>">
				                                                      <input type="text" placeholder="Country" name="vndCountry" id="vndCountry" value="<?php echo $vndCountry_p; ?>">
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">

				                                           			<?php 
				                                           			if ($seaImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="Sea Import" checked><label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="
				                                           			Sea Import"><label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php 
				                                           			if ($airImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import" checked><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import"><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php 
				                                           			if ($seaExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export" checked><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export"><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php 
				                                           			if ($airExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export" checked><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export"><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			?>
				                                                   
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="telCode" id="telCode">
				                                                      		<option value="<?php echo $telCode_p; ?>"><?php echo $telCode_p; ?></option>
				                                                      		<option value="+92">+92</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumber" id="telNumber" value="<?php echo $telNumber_p; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" value="<?php echo $cmpWebsite_p; ?>">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" value="<?php echo $cmpEmail_p; ?>">
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType">
				                                                      		<option value="<?php echo $taxType_p; ?>"><?php echo $taxType_p; ?></option>
				                                                      		<option value="NTN NUmber">NTN Number</option>
				                                                      		<option value="STRN NUmber">STRN Number</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="taxNo" id="taxNo" value="<?php echo $taxNo_p; ?>">
				                                           		</div>
										</div>	 
								</div>
												<div class="cls"></div>
												<hr>

				<div class="acount_info widget_iner_box">
                  <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Finance Details</a></li>
                      <li><a data-toggle="tab" href="#menu1">Representative Details </a></li>
                  </ul>

                <div class="tab-content">
                  
                  <div id="home" class="tab-pane fade in active">

                    <div class="container">
                      <br />
                      <div align="right">
                        <button type="button" id="eduHist" onclick="eduHistory();">Add New</button>
                      </div>
                      <br />
                     <!--  <div class="table-responsive" id="image_table">
                          
                      </div> -->
                    </div>
                      
                       <div class="table-responsive" id="financeTable">
                              
                       </div>

                  </div>

                  <div id="menu1" class="tab-pane fade">
                    <div class="container">
                      <br />
                      <div align="right">
                        <button type="button" id="empHist" onclick="empHistory();">Add New</button>
                      </div>
                      <br />
                     <!--  <div class="table-responsive" id="image_table">
                          
                      </div> -->
                    </div>

                    <div class="table-responsive" id="repDetails">
                              
                    </div>
                  </div>

        		</div>              
            
            <div class="cls"></div>
            <hr>
				</div>

				</form>
		</div>

	</div>
						
<!-- Edit Employement -->
<div id="repModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_empHistory_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Representative Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Representative Name</label>
      <input type="text" name="repName" id="repName" class="form-control" />
     </div>
     <div class="form-group">
      <label>Designation</label>
      <input type="text" name="repDesig" id="repDesig" class="form-control" />
     </div>
     <div class="form-group">
      <label>Personal Contact #</label>
      <input type="text" name="repPerCn" id="repPerCn" class="form-control" />
     </div>
     <div class="form-group">
      <label>Official Contact #</label>
      <input type="text" name="repPeroff" id="repPeroff" class="form-control" />
     </div>
     <div class="form-group">
      <label>Email ID</label>
      <input type="text" name="repEmail" id="repEmail" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="SrNo" id="SrNo" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>

<!-- Edit Education -->
<div id="financeModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_finance_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Financial Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Serial #</label>
      <input type="text" name="SrNo_EF" id="SrNo_EF" class="form-control" />
     </div>
     <div class="form-group">
      <label>Bank Name</label>
      <input type="text" name="bnkName" id="bnkName" class="form-control" />
     </div>
     <div class="form-group">
      <label>Branch</label>
      <input type="text" name="bnkBranch" id="bnkBranch" class="form-control" />
     </div>
     <div class="form-group">
      <label>City</label>
      <input type="text" name="bnkCity" id="bnkCity" class="form-control" />
     </div>
     <div class="form-group">
      <label>Country</label>
      <input type="text" name="bnkCountry" id="bnkCountry" class="form-control" />
     </div>
     <div class="form-group">
      <label>Acc. Non-IBAN</label>
      <input type="text" name="bnkAccN" id="bnkAccN" class="form-control" />
     </div>
     <div class="form-group">
      <label>Acc. IBAN</label>
      <input type="text" name="bnkAcc" id="bnkAcc" class="form-control" />
     </div>
     <div class="form-group">
      <label>Credit Days</label>
      <input type="text" name="crDays" id="crDays" class="form-control" />
     </div>
     <div class="form-group">
      <label>Credit Amount</label>
      <input type="text" name="crAmount" id="crAmount" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="SrNoEdu" id="SrNoEdu" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>
<div class="cls"></div>          
					
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

<script>
  $(document).ready(function() {
    $('#usertable').DataTable();
    $('#empusertable').DataTable();
    $('#eduprousertable').DataTable();
  });
</script>

<script type="text/javascript">
   function eduHistory()
   {
    $("#eduHst").modal();
   }
   function empHistory()
   {
    $("#empHst").modal();
   }
</script>

<script type="text/javascript">
function logUserFunc()
{
  $("#logUser_Modal").modal();
}
</script>

<!-- Representative Details -->
<script>
$(document).ready(function(){
  load_repDetails();
  function load_repDetails()
 {
  var newCode = document.getElementById("newCode").value;
  $.ajax({

   url:"fetchRep_V.php?newCodeC=" + newCode,
   method:"POST",
   success:function(data)
   {
    $('#repDetails').html(data);
   }
  });
 }

 $(document).on('click', '.editRep', function(){
  var SrNo = $(this).attr("id");
  $.ajax({
   url:"editRep_V.php",
   method:"post",
   data:{SrNo:SrNo},
   dataType:"json",
   success:function(data)
   {
    $('#repModal').modal('show');
    // $('#empOrganization').val(empOrganization);
    $('#SrNo').val(SrNo);
    $('#repName').val(data.repName);
    $('#repDesig').val(data.repDesig);
    $('#repPerCn').val(data.repPerCn);
    $('#repPeroff').val(data.repPeroff);
    $('#repEmail').val(data.repEmail);
   }
  });
 });

 $('#edit_empHistory_form').on('submit', function(event){
  event.preventDefault();
   $.ajax({
    url:"updateEmployement_V.php",
    method:"POST",
    data:$('#edit_empHistory_form').serialize(),
    success:function(data)
    {
     $('#repModal').modal('hide');
     load_repDetails();
     alert('Representative details updated');
    }
   });
 }); 

 
});
</script>

<!-- Finance History -->
<script>
$(document).ready(function(){
  load_finance_data();
  function load_finance_data()
 {
  var newCode = document.getElementById("newCode").value;
  $.ajax({
   url:"fetchFinance_V.php?newCodeC=" + newCode,
   method:"POST",
   success:function(data)
   {
    $('#financeTable').html(data);
   }
  });
 }

 $(document).on('click', '.editFn', function(){
  var SrNoEdu = $(this).attr("id");
  $.ajax({
   url:"editFinance_V.php",
   method:"post",
   data:{SrNoEdu:SrNoEdu},
   dataType:"json",
   success:function(data)
   {
    $('#financeModal').modal('show');
    // $('#empOrganization').val(empOrganization);
    $('#SrNo_EF').val(SrNo);
    $('#bnkName').val(data.bnkName);
    $('#bnkBranch').val(data.bnkBranch);
    $('#bnkCity').val(data.bnkCity);
    $('#bnkCountry').val(data.bnkCountry);
    $('#bnkAccN').val(data.bnkAccN);
    $('#bnkAcc').val(data.bnkAcc);
    $('#crDays').val(data.crDays);
    $('#crAmount').val(data.crAmount);
   }
  });
 });

 $('#edit_finance_form').on('submit', function(event){
  event.preventDefault();
   $.ajax({
    url:"updateFinance_V.php",
    method:"POST",
    data:$('#edit_finance_form').serialize(),
    success:function(data)
    {
     $('#financeModal').modal('hide');
     load_finance_data();
     alert('Financial details updated');
    }
   });
 }); 
 
});
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#saveFinance').click(function(){
    var bnkNameS = [];
    var bnkBranchS = [];
    var bnkCityS = [];
    var bnkCountryS = [];
    var bnkAccNS = [];
    var bnkAccS = [];
    var crDaysS = [];
    var crAmountS = [];
    bnkNameS = document.getElementById("bnkNameS").value;
    bnkBranchS = document.getElementById("bnkBranchS").value;
    bnkCityS = document.getElementById("bnkCityS").value;
    bnkCountryS = document.getElementById("bnkCountryS").value;
    bnkAccNS = document.getElementById("bnkAccNS").value;
    bnkAccS = document.getElementById("bnkAccS").value;
    crDaysS = document.getElementById("crDaysS").value;
    crAmountS = document.getElementById("crAmountS").value;
    newCodeCS = document.getElementById("newCode").value;
    
      $.ajax({
       url:"addFinance_V.php",
       method:"POST",
       data:{bnkNameS:bnkNameS, bnkBranchS:bnkBranchS, bnkCityS:bnkCityS, bnkCountryS:bnkCountryS, bnkAccNS:bnkAccNS, bnkAccS:bnkAccS, bnkAccS:bnkAccS, crDaysS:crDaysS, crAmountS:crAmountS, newCodeCS:newCodeCS},
       success:function(data){
        alert(data);
        // fetch_item_data();
        load_finance_data();
       }
      });
    });

    });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#saveEmployment').click(function(){
    var repName = [];
    var repDesig = [];
    var repPerCn = [];
    var repPeroff = [];
    var newCode = [];
    repName = document.getElementById("empOrgS").value;
    repDesig = document.getElementById("empDesigS").value;
    repPerCn = document.getElementById("empDurationS").value;
    repPeroff = document.getElementById("empSalaryS").value;
    newCode = document.getElementById("newCode").value;
    
      $.ajax({
       url:"addRep_V.php",
       method:"POST",
       data:{repName:repName, repDesig:repDesig, repPerCn:repPerCn, repPeroff:repPeroff, newCode:newCode},
       success:function(data){
        alert(data);
        // fetch_item_data();
        load_repDetails();
       }
      });
    });

    });
</script>

<script type="text/javascript">
function sbtModFunc1()
{
	$("#addModal1").modal();
}
function svModFunc1()
{
  $("#saveModal1").modal();
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