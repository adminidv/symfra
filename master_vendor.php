<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

$selectLastID = mysqli_query($con, "SELECT * FROM custmaster ORDER BY newCode DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['newCode'];
$newID = $lastID + 1;
$vendNewID = $newID;

$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$vendNewID' ORDER BY instance DESC LIMIT 1  ");
  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

  $lastID1 = $rowLastID1['instance'];
  $newID1 = $lastID1 + 1;
  $instance = $newID1;


// After Submit 1
if(isset($_POST['submitBtn1']))
{

  $instance =$instance;
  $record_id =$vendNewID;
  $createBy =$loginUser;
  $createDate =$todayDate;
  
  $legCode = $_POST['legCode'];
  $vndTitle = $_POST['vndTitle'];
  $newCode = '1118';
  $vndStreet = $_POST['vndStreet'];
  $vndCity = $_POST['vndCity'];
  $vndCountry = $_POST['vndCountry'];
  
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

  // Checkbox active
  if (isset($_POST['vnd_active']))
  {
    $vnd_active = "Active";
  }
  else
  {
    $vnd_active = "Deactive";
  }

  $telCode = $_POST['telCode'];
  $telNumber = $_POST['telNumber'];
  $cmpWebsite = $_POST['cmpWebsite'];
  $cmpEmail = $_POST['cmpEmail'];
  $taxType = $_POST['taxType'];
  $taxNo = $_POST['taxNo'];
  $txtSPO = $_POST['txtSPO'];
  $businessSector = $_POST['businessSector'];

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
    $insertQuery = mysqli_query($con, "insert into custmaster (legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, SPO, seaImport, airImport, seaExport, airExport, cmpStatus, businessSector, partyType, userBr) values  ('$legCode', '$vendNewID', '$vndTitle', '$vndStreet', '$vndCity', '$vndCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', '$txtSPO', '$seaImport', '$airImport', '$seaExport', '$airExport', '$vnd_active', '$businessSector', 'vnd', '$userBr')");

   $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Vendor', '$vendNewID', '$loginUser', '$todayDate') ");

    // Generating the alert
    $msg = "Vendor submitted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_vendor.php");

  }
}

// After Save 1
if(isset($_POST['saveBtn1']))
{
  $legCode = $_POST['legCode'];
  $vndTitle = $_POST['vndTitle'];
  $newCode = '1118';
  $vndStreet = $_POST['vndStreet'];
  $vndCity = $_POST['vndCity'];
  $vndCountry = $_POST['vndCountry'];
  
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

  $telCode = $_POST['telCode'];
  $telNumber = $_POST['telNumber'];
  $cmpWebsite = $_POST['cmpWebsite'];
  $cmpEmail = $_POST['cmpEmail'];
  $taxType = $_POST['taxType'];
  $taxNo = $_POST['taxNo'];

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
    $insertQuery = mysqli_query($con, "insert into custmaster (legCode, newCode, cmpTitle, cmpStreet, cmpCity, cmpCountry, telCode, telNumber, cmpWebsite, cmpEmail, taxType, taxNo, seaImport, airImport, seaExport, airExport, cmpStatus, partyType, userBr) values  ('$legCode', '$vendNewID', '$vndTitle', '$vndStreet', '$vndCity', '$vndCountry', '$telCode', '$telNumber', '$cmpWebsite', '$cmpEmail', '$taxType', '$taxNo', '$seaImport', '$airImport', '$seaExport', '$airExport', 'Active', 'vnd', '$userBr')");

    // Generating the alert
    $msg = "Vendor saved successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: master_vendor.php");
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Master Vendor</title>
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
          <a href="Usermodules.php" class="btn btn-info">CRM</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Master Vendor</a>
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

						 <h4><label id="formSummary" style="color: red;"></label></h4>
             <p id="s_vndTitle" style="color: red;"></p>
             <p id="s_legCode" style="color: red;"></p>
             <p id="s_vndStreet" style="color: red;"></p>
             <p id="s_vndCity" style="color: red;"></p>
             <p id="s_vndCountry" style="color: red;"></p>
             <p id="s_telCode" style="color: red;"></p>
             <p id="s_telNumber" style="color: red;"></p>
             <p id="s_cmpEmail" style="color: red;"></p>
             <p id="s_cmpWebsite" style="color: red;"></p>
             <p id="s_taxNo" style="color: red;"></p>
            
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
													<button type="button" id="btnConfirm_Su" onclick="FormValidation1();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
													<button type="button" name="cancelBtn" onclick="cancelFunc();"> <small>Cancel</small></button>				
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input disabled type="text" name="newCode" value="<?php echo $vendNewID; ?>" id="newCode" placeholder="">
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Vendor Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="vndTitle" maxlength="30" id="vndTitle"><span class="steric">*</span>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">

			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class="" type="text" name="legCode" maxlength="5" id="legCode" placeholder=""><span class="steric">*</span>
			                                                </div>

			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Street" name="vndStreet" id="vndStreet" maxlength="30"><span class="steric">*</span>
                                                              <select name="vndCountry" id="vndCountry" onchange="checkCities();">
                                                                 <option value="">Select Country</option>
                                                                 <option value="Pakistan">Pakistan</option>
                                                                 <option value="India">India</option>
                                                                 <option value="United Kingdom">United Kingdom</option>
                                                                 <option value="USA">USA</option>
                                                              </select><span class="steric">*</span>
                                                              <select name="vndCity" id="vndCity">
                                                                 <option value="">Select City</option>
                                                                 
                                                              </select><span class="steric">*</span>
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                  <input type="checkbox" name="seaImport" id="seaImport" value="Sea Import"><label>Sea Import</label><br>
				                                                  <input type="checkbox" name="airImport" id="airImport" value="Air Import"><label>Air Import</label><br>

				                                                   <input type="checkbox" name="seaExport" id="seaExport" value="Sea Export"><label>Sea Export</label><br>
				                                                   <input type="checkbox" name="airExport" id="airExport" value="Air Export"><label>Air Export</label>
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="telCode" id="telCode">
				                                                      		<option>Country Code</option>
				                                                      		<option value="+92">+92</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="telNumber" id="telNumber" maxlength="10"><span class="steric">*</span>
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" maxlength="40">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" maxlength="40"><span class="steric">*</span>
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																                      <div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType">
				                                                      		<option value="NTN NUmber">NTN NUmber</option>
				                                                      		<option value="STRN NUmber">STRN NUmber</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNo" id="taxNo" maxlength="11">
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

                                                      <div class="input-label"><label >Business Sector </label></div> 
                                                      <div class="input-feild">
                                                        <select name="businessSector" id="businessSector">
                                                          <option value="">Select</option>
                                                          <?php

                                                          $selectBS = mysqli_query($con, "SELECT * FROM business_setup");
                                                          while ($rowBS = mysqli_fetch_array($selectBS))
                                                          {

                                                            echo '<option value="'.$rowBS['bus_sec_name'].'">'.$rowBS['bus_sec_name'].'</option>';

                                                          }

                                                          ?>
                                                        </select><span class="steric">*</span>
                                                      </div>

                                                      <div class="input-label"><label >Active</label></div>
                                                      <div class="input-feild act_btn_user">
                                                        <input type="checkbox" name="vnd_active" checked id="vnd_active" />
                                                      </div>

										</div>	 
								</div>
												<div class="cls"></div>
												<hr>
                        
                      <div class="form_sec_action_btn col-md-12">
                          <button type="button" id="btnConfirm_Su" onclick="FormValidation1();"> <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
                          <button type="button" name="cancelBtn" onclick="cancelFunc();"> <small>Cancel</small></button>        
                      </div>
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
function svModFunc1()
{
  $("#saveModal1").modal();
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
      
      var vndTitle = document.getElementById('vndTitle').value;
      var legCode = document.getElementById('legCode').value;
      var vndStreet = document.getElementById('vndStreet').value;
      var vndCity = document.getElementById('vndCity').value;
      var vndCountry = document.getElementById('vndCountry').value;
      var telCode = document.getElementById('telCode').value;
      var telNumber = document.getElementById('telNumber').value;
      var cmpEmail = document.getElementById('cmpEmail').value;
      var cmpWebsite = document.getElementById('cmpWebsite').value;
      var taxNo = document.getElementById('taxNo').value;
      
      var summary = "Summary: ";

      if(vndTitle == "")
      {
          document.getElementById('vndTitle').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_vndTitle").innerHTML = "Vendor title is required.";
      }
      if(vndTitle != "")
      {
          document.getElementById('vndTitle').style.borderColor = "white";
          document.getElementById("s_vndTitle").innerHTML = "";
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

      if(vndStreet == "")
      {
          document.getElementById('vndStreet').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " Date of birth is required ";
          document.getElementById("s_vndStreet").innerHTML = "Street is required.";
      }
      if(vndStreet != "")
      {
          document.getElementById('vndStreet').style.borderColor = "white";
          document.getElementById("s_vndStreet").innerHTML = "";
      }

      if(vndCity == "")
      {
          document.getElementById('vndCity').style.borderColor = "red";
          missingVal = 1;
          // summary += " Email id required.";
          document.getElementById("s_vndCity").innerHTML = "City is required.";
      }
      if(vndCity != "")
      {
          document.getElementById('vndCity').style.borderColor = "white";
          document.getElementById("s_vndCity").innerHTML = "";
      }

      if(vndCountry == "")
      {
          document.getElementById('vndCountry').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("s_vndCountry").innerHTML = "Country is required.";
      }
      if(vndCountry != "")
      {
          document.getElementById('vndCountry').style.borderColor = "white";
          document.getElementById("s_vndCountry").innerHTML = "";
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
        document.getElementById('s_vndTitle').style.borderColor = "white";
        document.getElementById('s_legCode').style.borderColor = "white";
        document.getElementById('s_vndStreet').style.borderColor = "white";
        document.getElementById('s_vndCity').style.borderColor = "white";
        document.getElementById('s_vndCountry').style.borderColor = "white";
        document.getElementById('s_telCode').style.borderColor = "white";
        document.getElementById('s_telNumber').style.borderColor = "white";
        document.getElementById('s_cmpEmail').style.borderColor = "white";
        
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
    window.location = "master_vendor.php";
  }
</script>

<script type="text/javascript">
function checkCities()
{
  var bpCountry = document.getElementById("vndCountry").value;

  $.ajax({
     url:"checkCities.php",  
            method:"GET",  
            data:{bpCountry:bpCountry}, 
            dataType:"text", 
     success: function(data) {
         $('#vndCity').html(data);
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