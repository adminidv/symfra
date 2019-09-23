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

// Getting the Customer ID
$bpID = $_GET['bpID'];
$qry= "SELECT * FROM custmaster WHERE newCode = '$bpID'";
$run= mysqli_query($con, $qry);
$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($bpID==$row['newCode'])
{
    $legCode = $row['legCode'];
	$newCode = $row['newCode'];
	$bpTitle = $row['cmpTitle'];
	$bpStreet = $row['cmpStreet'];
	$bpCity = $row['cmpCity'];
	$bpCountry = $row['cmpCountry'];
	$telCode = $row['telCode'];
	$telNumber = $row['telNumber'];
	$cmpWebsite = $row['cmpWebsite'];
	$cmpEmail = $row['cmpEmail'];
	$taxType = $row['taxType'];
	$taxNo = $row['taxNo'];
	$txtSPO = $row['SPO'];
	$txtIATA = $row['IATANo'];
	$seaImport = $row['seaImport'];
	$airImport = $row['airImport'];
	$seaExport = $row['seaExport'];
	$airExport = $row['airExport'];
	$repName = $row['repName'];
	$repDesig = $row['repDesig'];
	$repOffCell = $row['repOffCell'];   
	$repPerCell = $row['repPerCell'];
	$repEmail = $row['repEmail'];
	$fnBnkName = $row['fnBnkName'];
	$fnBnkBr = $row['fnBnkBr'];
	$fnCity = $row['fnCity'];
	$fnCountry = $row['fnCountry'];
	$fnIban = $row['fnIban'];
	$fnNonIban = $row['fnNonIban'];
	$fnCrDays = $row['fnCrDays'];
	$fnCrAmount = $row['fnCrAmount'];
	$cmpStatus = $row['cmpStatus'];

	$selectSPOName = mysqli_query($con, "SELECT * FROM spo_setup WHERE SrNo='$txtSPO' ");
	while ($rowSPOName = mysqli_fetch_array($selectSPOName))
	{
		$SPOName = $rowSPOName['spo_name'];
	}
 }


// After Submit 
if(isset($_POST['updateBtn']))
{
	$legCode = $_POST['legCode'];
  $bpTitle = $_POST['bpTitle'];
  $newCode = '1111';
  $bpStreet = $_POST['bpStreet'];
  $bpCity = $_POST['bpCity'];
  $bpCountry = $_POST['bpCountry'];
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
  $txtSPO = $_POST['txtSPO'];
  $txtIATA = $_POST['txtIATA'];
  // $repName = $_POST['repName'];
  // $repDesig = $_POST['repDesig'];
  // $repOffCell = $_POST['repOffCell'];
  // $repPerCell = $_POST['repPerCell'];
  // $repEmail = $_POST['repEmail'];
  // $fnBnkName = $_POST['fnBnkName'];
  // $fnBnkBr = $_POST['fnBnkBr'];
  // $fnCity = $_POST['fnCity'];
  // $fnCountry = $_POST['fnCountry'];
  // $fnNonIban = $_POST['fnNonIban'];
  // $fnIban = $_POST['fnIban'];
  // $fnCrDays = $_POST['fnCrDays'];
  // $fnCrAmount = $_POST['fnCrAmount'];

	$updateQuery =  mysqli_query($con, "UPDATE custmaster SET legCode='$legCode', cmpTitle='$bpTitle', cmpStreet='$bpStreet', cmpCity='$bpCity', cmpCountry='$bpCountry', telCode='$telCode', telNumber='$telNumber', cmpWebsite='$cmpWebsite', cmpEmail='$cmpEmail', taxType='$taxType', taxNo='$taxNo', SPO='$txtSPO', IATANo-'$txtIATA', seaImport='$seaImport', airImport='$airImport', seaExport='$seaExport', airExport='$airExport', repName='$repName', repDesig='$repDesig', repOffCell='$repOffCell', repPerCell='$repPerCell', repEmail='$repEmail', fnBnkName='$fnBnkName', fnBnkBr='$fnBnkBr', fnCity='$fnCity', fnCountry='$fnCountry', fnIban='$fnIban', fnNonIban='$fnNonIban', fnCrDays='$fnCrDays', fnCrAmount='$fnCrAmount' WHERE newCode='$bpID' ");

	// Generating the alert
	$msg = "Vendor updated successfully.";
	function alert($msg)
	{
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	alert($msg);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master BP Edit</title>
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
          <a href="master_bp.php" class="btn btn-info active">Master BP Edit</a>
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
													<button type="button" id="btnConfirm_Su" name="btnConfirm_Su" onclick="sbtModFunc1();"> <small>Submit</small></button>
													<button type="button" id="btnConfirm_S" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
													<button type="button" name="submitBtn"> <small>Cancel</small></button>					
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input disabled type="text" name="newCode" id="newCode" placeholder="00000" value="<?php echo $newCode; ?>">
			                                                </div>
			                                                
			                                                <div class="input-label"><label >BP Master Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="bpTitle" id="bpTitle" value="<?php echo $bpTitle; ?>">
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">

			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class="" type="text" name="legCode" id="legCode" placeholder="" value="<?php echo $legCode; ?>">
			                                                </div>

			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Street" name="bpStreet" id="bpStreet" value="<?php echo $bpStreet; ?>">
				                                                      <input type="tex" placeholder="City" name="bpCity" id="bpCity" value="<?php echo $bpCity; ?>">
				                                                      <input type="text" placeholder="Country" name="bpCountry" id="bpCountry" value="<?php echo $bpCountry; ?>">
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">

				                                           			<?php 
				                                           			if ($seaImport == 1)
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
				                                           			if ($airImport == 1)
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
				                                           			if ($seaExport == 1)
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
				                                           			if ($airExport == 1)
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
				                                                      		<option value="<?php echo $telCode; ?>"><?php echo $telCode; ?></option>
				                                                      		<option value="+92">+92</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumber" id="telNumber" value="<?php echo $telNumber; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" value="<?php echo $cmpWebsite; ?>">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" value="<?php echo $cmpEmail; ?>">
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType">
				                                                      		<option value="<?php echo $taxType; ?>"><?php echo $taxType; ?></option>
				                                                      		<option value="NTN NUmber">NTN Number</option>
				                                                      		<option value="STRN NUmber">STRN Number</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="taxNo" id="taxNo" value="<?php echo $taxNo; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >SPO </label></div> 
			                                                    <div class="input-feild">
			                                                    	<select name="txtSPO" id="txtSPO">
			                                                    		<option value="<?php echo $SPO; ?>"><?php echo $SPOName; ?></option>

			                                                    		<?php

			                                                            $selectSPO = mysqli_query($con, "SELECT * FROM spo_setup");
			                                                            while ($rowSPO = mysqli_fetch_array($selectSPO))
			                                                            {

			                                                              echo '<option value="'.$rowSPO['SrNo'].'">'.$rowSPO['spo_name'].'</option>';

			                                                            }

			                                                            ?>
			                                                        </select>
			                                                     </div>

			                                                     <div class="input-label"><label >IATA </label></div> 
			                                                      <div class="input-feild">
			                                                        <input type="text" name="txtIATA" id="txtIATA" maxlength="10" value="<?php echo $txtIATA; ?>">
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

<!-- Representative Details -->
<script>
$(document).ready(function(){
  load_repDetails();
  function load_repDetails()
 {
  var newCode = document.getElementById("newCode").value;
  $.ajax({

   url:"fetchRep_bp.php?newCodeC=" + newCode,
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
   url:"editRep_bp.php",
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
    url:"updateEmployement.php",
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
   url:"fetchFinance_bp.php?newCodeC=" + newCode,
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
   url:"editFinance_bp.php",
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
    url:"updateFinance_bp.php",
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
       url:"addFinance_bp.php",
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
       url:"addRep_bp.php",
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


<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>