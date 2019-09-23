<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

$selectLastID = mysqli_query($con, "SELECT * FROM empinfo ORDER BY empNo DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['empNo'];
$newID = $lastID + 1;
$user_ID = $newID;

// After Submit
if(isset($_POST['submitBtn']))
{
  $empFName = $_POST['empFName'];
  $empMName = $_POST['empMName'];
  $empLName = $_POST['empLName'];
  $empGrdName = $_POST['empGrdName'];
  $cnicNo = $_POST['cnicNo'];
  $empGender = $_POST['empGender'];
  $empDOB = $_POST['empDOB'];
  $empMaritalStatus = $_POST['empMaritalStatus'];
  $empWorkEmail = $_POST['empWorkEmail'];
  $empPerEmail = $_POST['empPerEmail'];
  $empCell = $_POST['empCell'];
  $empEmergencyNo = $_POST['empEmergencyNo'];
  $emergRel = $_POST['emergRel'];
  // $empOffice = $_POST['empOffice'];
  $empHomeNo = $_POST['empHomeNo'];
  $empCountry = $_POST['empCountry'];
  $empCity = $_POST['empCity'];
  $empAddress = $_POST['empAddress'];
  $ntnNo = $_POST['ntnNo'];
  // $empSpouseName = $_POST['empSpouseName'];
  // $empOrgano = $_POST['empOrgano'];
  $empEntity = $_POST['empEntity'];
  $emp_Desig = $_POST['emp_Desig'];
  $empDept = $_POST['empDept'];
  $empGrade = $_POST['empGrade'];
  $lineManager = $_POST['lineManager'];
  // $empChildren = $_POST['empChildren'];
  $empDOJ = $_POST['empDOJ'];
  $empType = $_POST['empType'];
  $leavePckg = $_POST['leavePckg'];
  $passportNo = $_POST['passportNo'];


  // Checking if the user's age is less than 18
  $dateToday = date("Y-m-d");
  $arrayToday = explode("-",$dateToday);
  $dobArray = explode("-",$empDOB);

  $currentYear = $arrayToday[0];
  $dobYear = $dobArray[0];

  $yearDiff = $currentYear - $dobYear;

  if ($yearDiff < 18)
  {
      echo '<script type="text/javascript">'; 
      echo 'alert("User age must be greater than or equals to 18.");';
      // echo 'window.location.href = "master_bp_table.php";';
      echo '</script>';
  }
  else
  {

    $selectAppFlow = mysqli_query($con, "SELECT * FROM appflow WHERE appDepartment = 'Human Resource' ");
    $appFlowRecs = mysqli_num_rows($selectAppFlow);
    if ($appFlowRecs > 0)
    {
      while ($rowAppFlow = mysqli_fetch_array($selectAppFlow))
      {
        $thisApproval = 'Approval on ' . $rowAppFlow['app1'];
      }

      // Inserting records to DB
      $insertQuery = mysqli_query($con, "insert into empinfo (empNo, cnicNo, ntnNo, empFName, empMName, empLName, empGrdName, empDOB, empCell, empHomeNo, empEmergencyNo, emergRel, empMaritalStatus, empDept, empDesig, empGrade, empEntity, lineManager, empCountry, empCity, empAddress, empDOJ, empWorkEmail, empPerEmail, empGender, leavePckg, empType, savedStatus, passportNo, userBr) values  ('$newID', '$cnicNo', '$ntnNo', '$empFName', '$empMName', '$empLName', '$empGrdName', '$empDOB', '$empCell', '$empHomeNo', '$empEmergencyNo', '$emergRel', '$empMaritalStatus', '$empDept', '$emp_Desig', '$empGrade', '$empEntity', '$lineManager', '$empCountry', '$empCity', '$empAddress', '$empDOJ', '$empWorkEmail', '$empPerEmail', '$empGender', '$leavePckg', '$empType', '$thisApproval', '$passportNo', '$userBr')");

      if ($insertQuery)
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee inserted successfully.");';
        echo 'window.location.href = "hr_add_emp_info.php";';
        echo '</script>';
      }

      $leaveEmpName = $empFName . " " . $empMName . " " . $empLName;
      // Inserting Casual Leaves
      $insertCasual = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Casual', '12', '0', '12', '2019')");

      // Inserting Annual Leaves
      $insertAnnual = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Annual', '12', '0', '12', '2019')");

      // Inserting Sick Leaves
      $insertSick = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Sick', '12', '0', '12', '2019')");

      // echo "The record is inserted successfully.";
      $DOBdiffRem = 'Date of birth is greater or equal to 18';
    }

    else
    {
      // Inserting records to DB
      $insertQuery = mysqli_query($con, "insert into empinfo (empNo, cnicNo, ntnNo, empFName, empMName, empLName, empGrdName, empDOB, empCell, empHomeNo, empEmergencyNo, emergRel, empMaritalStatus, empDept, empDesig, empGrade, empEntity, lineManager, empCountry, empCity, empAddress, empDOJ, empWorkEmail, empPerEmail, empGender, leavePckg, empType, savedStatus, passportNo, userBr) values  ('$newID', '$cnicNo', '$ntnNo', '$empFName', '$empMName', '$empLName', '$empGrdName', '$empDOB', '$empCell', '$empHomeNo', '$empEmergencyNo', '$emergRel', '$empMaritalStatus', '$empDept', '$emp_Desig', '$empGrade', '$empEntity', '$lineManager', '$empCountry', '$empCity', '$empAddress', '$empDOJ', '$empWorkEmail', '$empPerEmail', '$empGender', '$leavePckg', '$empType', '$thisApproval', '$passportNo', '$userBr')");

      if ($insertQuery)
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee inserted successfully.");';
        echo 'window.location.href = "hr_add_emp_info.php";';
        echo '</script>';
      }

      $leaveEmpName = $empFName . " " . $empMName . " " . $empLName;
      // Inserting Casual Leaves
      $insertCasual = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Casual', '12', '0', '12', '2019')");

      // Inserting Annual Leaves
      $insertAnnual = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Annual', '12', '0', '12', '2019')");

      // Inserting Sick Leaves
      $insertSick = mysqli_query($con, "insert into leavestaken (empID, leaveType, leaveTotal, leavesAvailed, leavesRemaining, leaveYear) values ('$leaveEmpName', 'Sick', '12', '0', '12', '2019')");

      // echo "The record is inserted successfully.";
      $DOBdiffRem = 'Date of birth is greater or equal to 18';
    }

    
  }

  // Generating the alert
  /*$msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($DOBdiffRem);*/
}
/// After Submit
if(isset($_POST['saveBtn']))
{
  // $empNo = $_POST['empNo'];
 $empFName = $_POST['empFName'];
  $empMName = $_POST['empMName'];
  $empLName = $_POST['empLName'];
  $empGrdName = $_POST['empGrdName'];
  $cnicNo = $_POST['cnicNo'];
  $empGender = $_POST['empGender'];
  $empDOB = $_POST['empDOB'];
  $empMaritalStatus = $_POST['empMaritalStatus'];
  $empWorkEmail = $_POST['empWorkEmail'];
  $empPerEmail = $_POST['empPerEmail'];
  $empCell = $_POST['empCell'];
  $empEmergencyNo = $_POST['empEmergencyNo'];
  $emergRel = $_POST['emergRel'];
  // $empOffice = $_POST['empOffice'];
  $empHomeNo = $_POST['empHomeNo'];
  $empCountry = $_POST['empCountry'];
  $empCity = $_POST['empCity'];
  $empAddress = $_POST['empAddress'];
  $ntnNo = $_POST['ntnNo'];
  // $empSpouseName = $_POST['empSpouseName'];
  // $empOrgano = $_POST['empOrgano'];
  $empEntity = $_POST['empEntity'];
  $emp_Desig = $_POST['emp_Desig'];
  $empDept = $_POST['empDept'];
  $empGrade = $_POST['empGrade'];
  $lineManager = $_POST['lineManager'];
  // $empChildren = $_POST['empChildren'];
  $empDOJ = $_POST['empDOJ'];
  $empType = $_POST['empType'];
  $leavePckg = $_POST['leavePckg'];
  $passportNo = $_POST['passportNo'];

  // Inserting records to DB
    $insertQuery = mysqli_query($con, "insert into empinfo (empNo, cnicNo, ntnNo, empFName, empMName, empLName, empGrdName, empDOB, empCell, empHomeNo, empEmergencyNo, emergRel, empMaritalStatus, empDept, empDesig, empGrade, empEntity, lineManager, empCountry, empCity, empAddress, empDOJ, empWorkEmail, empPerEmail, empGender, leavePckg, empType, savedStatus, passportNo, userBr) values  ('$newID', '$cnicNo', '$ntnNo', '$empFName', '$empMName', '$empLName', '$empGrdName', '$empDOB', '$empCell', '$empHomeNo', '$empEmergencyNo', '$emergRel', '$empMaritalStatus', '$empDept', '$emp_Desig', '$empGrade', '$empEntity', '$lineManager', '$empCountry', '$empCity', '$empAddress', '$empDOJ', '$empWorkEmail', '$empPerEmail', '$empGender', '$leavePckg', '$empType', '0', '$passportNo', '$userBr')");

    if ($insertQuery)
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Employee saved successfully.");';
      echo 'window.location.href = "hr_add_emp_info.php";';
      echo '</script>';
    }

  // echo "The record is inserted successfully.";

  // Generating the alert
  $msg = "Record is updated successfully.";
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
	<title>Add Employee</title>
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

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->

  <style type="text/css">
    /*.steric*/
    /*{*/
    /*  color:red;*/
    /*  font-size: 25px;*/
    /*  margin-left: 4px;*/
    /*}*/
  </style>
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.extensions.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var cnicMask = new Inputmask("#####-#######-#");
            cnicMask.mask($('[id*=cnicNo]'));
        });

        $(function () {
            var passportNo = new Inputmask("#########");
            passportNo.mask($('[id*=passportNo]'));
        });

        $(function () {
            var ntnMask = new Inputmask("########");
            ntnMask.mask($('[id*=ntnNo]'));
        });

        $(function () {
            var phoneMask = new Inputmask("####-#######");
            phoneMask.mask($('[id*=empCell]'));
            phoneMask.mask($('[id*=empEmergencyNo]'));
            // phoneMask.mask($('[id*=empOffice]'));
            phoneMask.mask($('[id*=empHomeNo]'));
            
        });
    </script>

<style type="text/css">
/*.tab-pane {
    padding: 20px 0px;
}
.input-label {
   width: 20%;
   float: left;
   margin: 7px 0;
   clear: both;
}
.input-feild {
   width: 80%;
   margin:3px 0;
   float: right;
}
.input-feild input {
   margin: 0;
}
.input-label label {
   margin: 0 ;
}
.input-feild select {
   margin: 0;
}
    .add_user_sec {
   width: 85%;
   position: absolute;
   right: 0;
   padding:15px;
   top: 225px;
}
.input-feild.namefields input {
   margin: 3px 0;
}

.input-feild.paswrdfields input {
   margin: 3px 0;
}
.input-feild.contactfields input {
   margin: 3px 0;
}
.confirmTable-modal .Popup_bdy button {
    float: none;
}*/

.tab-content td button {
   border: none;
   background: transparent;
   color: #337ab7;
   text-decoration: underline;
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
          <a href="hr_add_emp_info.php" class="btn btn-info active">Add Employee</a>
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

<?php include 'sidebar_widgets/symfra_popups.php'; ?>

<div class=" add_user_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
		<form action="" method="POST" enctype="multipart/form-data">

	     <!-- Modal One-->
			 <div class="modal fade confirmTable-modal" id="draftModal" role="dialog">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Confirmation</h4>
				        </div>
				        <div class="modal-body">
				          <p>Are You Sure You Want to save it to draft?</p>
				          <button type="submit" name="saveBtn">Yes</button>
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
       <div class="modal fade confirmTable-modal" id="addUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure You Want to Submit?</p>
                  <button type="submit" name="submitBtn">Yes</button>
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
       <p id="s_empFName" style="color: red;"></p>
       <p id="s_empLName" style="color: red;"></p>
       <p id="s_empMName" style="color: red;"></p>
       <p id="s_empGrdName" style="color: red;"></p>
       <p id="s_cnicNo" style="color: red;"></p>
       <p id="s_empGender" style="color: red;"></p>
       <p id="s_empDOB" style="color: red;"></p>
       <p id="s_empMaritalStatus" style="color: red;"></p>
       <p id="s_empWorkEmail" style="color: red;"></p>
       <p id="s_empPerEmail" style="color: red;"></p>
       <p id="s_empCell" style="color: red;"></p>
       <p id="s_empHomeNo" style="color: red;"></p>
       <p id="s_emergRel" style="color: red;"></p>
       <p id="s_empEmergencyNo" style="color: red;"></p>
       <p id="s_ntnNo" style="color: red;"></p>
       <p id="s_passportNo" style="color: red;"></p>
       <p id="s_empDOJ" style="color: red;"></p>

				<div class="Bsic_usr_info widget_iner_box">

								<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
                      <!-- Go back button code starting here -->
                      <?php include('inc_widgets/backBtn.php'); ?>
                      <!-- Go back button code ending here -->
										</div>
										<button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
										<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
										<button type="button" name="submitBtn" onclick="cancelFunc();"> <small>Cancel</small></button>			
								</div>
												
												<div class="cls"></div>

								 <div class="col-md-6">
                                                <div class="input-label"><label >Employee #</label></div>
                                                <div class="input-feild">
                                                <input type="text" disabled name="empNo" value="<?php echo $newID; ?>">
                                                </div>

                                                <div class="input-label"><label > Name</label></div>	
                                                <div class="input-feild">
                                                        <input  type="text" name="empFName" id="empFName" placeholder="Enter First Name" maxlength="30"><span class="steric">*</span>
                                                        <input  type="text" name="empMName" id="empMName" placeholder="Enter Middle Name" maxlength="30">
                                                        <input  type="text" name="empLName" id="empLName" placeholder="Enter Last Name" maxlength="30"><span class="steric">*</span>       
                                                </div>

                                                <div class="input-label"><label > Father/Husband Name</label></div>  
                                                <div class="input-feild">
                                                        <input  type="text" name="empGrdName" id="empGrdName" placeholder="Enter Father/Husband Name" maxlength="30"><span class="steric">*</span>      
                                                </div>
                                                
                                                <div class="input-label"><label >CNIC Number</label></div>	
                                                <div class="input-feild">
                                                        <input  type="text" name="cnicNo" id="cnicNo"><span class="steric">*</span>
                                                </div>                                    
                                                <div class="input-label"><label > Gender</label></div>	

                                                <div class="input-feild">
                                                        <select name="empGender" id="empGender">
                                                                <option value="">Select</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Undisclosed">Undisclosed</option>
                                                        </select><span class="steric">*</span>
                                                </div>

                                                <div class="input-label"><label > Marital Status</label></div>
                                                <div class="input-feild">
                                                        <select name="empMaritalStatus" id="empMaritalStatus">
                                                                <option value="">Select</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Widow">Widow</option>
                                                                <option value="Undisclosed">Undisclosed</option>
                                                        </select><span class="steric">*</span>
                                                </div>

                                                <div class="input-label"><label > Date of Birth</label></div>
                                                <div class="input-feild">
                                                        <input type="date" name="empDOB" id="empDOB" data-date-inline-picker="false" data-date-open-on-focus="true" max="2000-12-31" /><span class="steric">*</span>
                                                </div>                                                                          
                                 </div>

								<div class="col-md-6">
                                                <div class="input-label"><label > Choose Profile Image</label></div>
                                                <div class="input-feild">
                                                        <img src="images/user.png" style="width: 150px" id="blah">
                                                        <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
                                                </div>                                                                
                                </div>

												<div class="cls"></div>
				</div>			
										<div class="cls"></div>
										<hr>

				<div class="contct_usr_info widget_iner_box">

								<div class="col-md-6">
                                        <div class="input-label"><label >Email Address</label></div>
                                        <div class="input-feild">
                                                <input type="text" name="empWorkEmail" id="empWorkEmail" placeholder="Enter Work Email" maxlength="40">
                                                <input type="text" name="empPerEmail" id="empPerEmail" placeholder="Enter Personal Email" maxlength="40"><span class="steric">*</span>
                                        </div>

                                        <div class="input-label"><label >Contact No.</label></div>	
                                        <div class="input-feild">
                                                <input  type="text" name="empCell" id="empCell" maxlength="14" placeholder="Enter Number"><span class="steric">*</span>
                                                <input  type="text" name="empHomeNo" id="empHomeNo" maxlength="14" placeholder="Enter Home Number">

                                        </div>

                                        <div class="input-label"><label >Emergency Contact</label></div>  
                                        <div class="input-feild">
                                                <input  type="text" name="emergRel" id="emergRel" maxlength="20" placeholder="Emergency Contact Relation">
                                                <input  type="text" name="empEmergencyNo" maxlength="12" id="empEmergencyNo" placeholder="Emergency Contact Number">
                                        </div>
                                </div>
						
								<div class="col-md-6">

                                        <div class="input-label"><label >Address</label></div>
                                        <div class="input-feild">
                                                <textarea name="empAddress" id="empAddress" maxlength="50"></textarea>
                                        </div>

                                        <div class="input-label"><label >Country</label></div>
                                        <div class="input-feild">
                                                <select name="empCountry" id="empCountry">
                                                        <option value="">Select</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="India">India</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="USA">USA</option>
                                                </select>
                                        </div>

                                        <div class="input-label"><label >City</label></div>
                                        <div class="input-feild">
                                                <select name="empCity" id="empCity">
                                                        <option value="">Select</option>
                                                        <option value="Karachi">Karachi</option>
                                                        <option value="Lahore">Lahore</option>
                                                        <option value="Faisalabad">Faisalabad</option>
                                                        <option value="Rawalpindi">Rawalpindi</option>
                                                        <option value="Multan">Multan</option>
                                                        <option value="Gujranwala">Gujranwala</option>
                                                        <option value="Hyderabad">Hyderabad</option>
                                                        <option value="Peshawar">Peshawar</option>
                                                        <option value="Islamabad">Islamabad</option>
                                                        <option value="Quetta">Quetta</option>
                                                        <option value="Sargodha">Sargodha</option>
                                                        <option value="Sialkot">Sialkot</option>
                                                        <option value="Bahawalpur">Bahawalpur</option>
                                                        <option value="Sukkur">Sukkur</option>
                                                        <option value="Kandhkot">Kandhkot</option>
                                                        <option value="Shekhupura">Shekhupura</option>
                                                        <option value="Mardan">Mardan</option>
                                                        <option value="Gujrat">Gujrat</option>
                                                        <option value="Larkana">Larkana</option>
                                                        <option value="Kasur">Kasur</option>
                                                        <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                                        <option value="Sahiwal">Sahiwal</option>
                                                        <option value="Okara">Okara</option>
                                                        <option value="Wah Cantonment">Wah Cantonment</option>
                                                        <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                                        <option value="Mingora">Mingora</option>
                                                        <option value="Mirpur Khas">Mirpur Khas</option>
                                                        <option value="Chiniot">Chiniot</option>
                                                        <option value="Nawabshah">Nawabshah</option>
                                                        <option value="Kamoke">Kamoke</option>
                                                        <option value="Burewala">Burewala</option>
                                                        <option value="Jhelum">Jhelum</option>
                                                        <option value="Sadiqabad">Sadiqabad</option>
                                                        <option value="Khanewal">Khanewal</option>
                                                        <option value="Hafizabad">Hafizabad</option>
                                                        <option value="Kohat">Kohat</option>
                                                        <option value="Jacobabad">Jacobabad</option>
                                                        <option value="Shikarpur">Shikarpur</option>
                                                        <option value="Muzaffargarh">Muzaffargarh</option>
                                                        <option value="Khanpur">Khanpur</option>
                                                        <option value="Gojra">Gojra</option>
                                                        <option value="Bahawalnagar">Bahawalnagar</option>
                                                        <option value="Abbottabad">Abbottabad</option>
                                                        <option value="Muridke">Muridke</option>
                                                        <option value="Pakpattan">Pakpattan</option>
                                                        <option value="Khuzdar">Khuzdar</option>
                                                        <option value="Jaranwala">Jaranwala</option>
                                                        <option value="Chishtian">Chishtian</option>
                                                        <option value="Daska">Daska</option>
                                                        <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                                        <option value="Ahmadpur East">Ahmadpur East</option>
                                                        <option value="Kamalia">Kamalia</option>
                                                        <option value="Tando Adam">Tando Adam</option>
                                                        <option value="Khairpur">Khairpur</option>
                                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                        <option value="Vehari">Vehari</option>
                                                        <option value="Nowshera">Nowshera</option>
                                                        <option value="Dadu">Dadu</option>
                                                        <option value="Wazirabad">Wazirabad</option>
                                                        <option value="Khushab">Khushab</option>
                                                        <option value="Charsada">Charsada</option>
                                                        <option value="Swabi">Swabi</option>
                                                        <option value="Chakwal">Chakwal</option>
                                                        <option value=" Mianwali"> Mianwali</option>
                                                        <option value="Tando Allahyar">Tando Allahyar</option>
                                                        <option value="Kot Adu">Kot Adu</option>
                                                        <option value="Farooka">Farooka</option>
                                                        <option value="Chichawatni">Chichawatni</option>
                                                        <option value="Vihari">Vihari</option>
                                                </select>
                                        </div>
                                </div>
				</div>		
										<div class="cls"></div>
										<hr>

				<div class="slction_info widget_iner_box">
										  <div class="col-md-6">
                                                <div class="input-label"><label >NTN Number</label></div>
                                                <div class="input-feild">
                                                        <input  type="text" name="ntnNo" id="ntnNo" maxlength="11" placeholder="Enter Ntn Number">
                                                </div>

                                                <div class="input-label"><label >Passport Number</label></div>
                                                <div class="input-feild">
                                                        <input  type="text" name="passportNo" id="passportNo" maxlength="9" placeholder="Enter Passport Number">
                                                </div>

                                                <div class="input-label"><label >Entity</label></div>	
                                                <div class="input-feild">
                                                        <select name="empEntity" id="empEntity">
                                                                <option value="">Select</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label > Date of Joining</label></div>
                                                <div class="input-feild">
                                                        <input type="date" name="empDOJ" id="empDOJ" max="2030-12-31" data-date-inline-picker="false" data-date-open-on-focus="true" /><span class="steric">*</span>
                                                </div>

                                                <div class="input-label"><label >Employee Type</label></div>
                                                <div class="input-feild">
                                                        <select name="empType" id="empType">
                                                                <option value="">Select</option>
                                                                <option value="Permenant">Permenant</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Contract Based">Contract Based</option>
                                                                <option value="Ex-Employee">Ex-Employee</option>
                                                        </select>
                                                </div>
                                      	  </div>

										  <div class="col-md-6">
                                                <div class="input-label"><label >Designation</label></div>
                                                <div class="input-feild">
                                                        <select name="emp_Desig" id="emp_Desig">
                                                                <option value="">Select</option>
                                                                <?php

                                                                $selectDesig = mysqli_query($con, "SELECT * FROM designation");

                                                                while ($rowDesig = mysqli_fetch_array($selectDesig))
                                                                {
                                                                  echo '<option value="'.$rowDesig['Desig_name'].'">'.$rowDesig['Desig_name'].'</option>';
                                                                }

                                                                ?>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label >Department</label></div>
                                                <div class="input-feild">
                                                        <select name="empDept" id="empDept">
                                                                <option value="">Select</option>
                                                                <?php

                                                                $selectDept = mysqli_query($con, "SELECT * FROM department");

                                                                while ($rowDept = mysqli_fetch_array($selectDept))
                                                                {
                                                                  echo '<option value="'.$rowDept['dept_name'].'">'.$rowDept['dept_name'].'</option>';
                                                                }

                                                                ?>
                                                        </select>
                                                </div>
                
                                                <div class="input-label"><label >Grade</label></div>
                                                <div class="input-feild">
                                                        <select name="empGrade" id="empGrade">
                                                                <option value="">Select</option>
                                                                <option value="Grade 1">Grade 1</option>
                                                                <option value="Grade 2">Grade 2</option>
                                                        </select>
                                                </div>
                
                                                <div class="input-label"><label >Reporting Manager</label></div>
                                                <div class="input-feild">
                                                        <select name="lineManager" id="lineManager">
                                                                <option value="">Select</option>
                                                                <option value="Anas Siddiqui">Anas Siddiqui</option>
                                                                <option value="Syed Zaid Ali">Syed Zaid Ali</option>
                                                                <option value="Saad Jafri">Saad Jafri</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label >Leave Package</label></div>
                                                <div class="input-feild">
                                                        <select name="leavePckg" id="leavePckg">
                                                                <option value="">Select</option>
                                                                <?php

                                                                $selectPkg = mysqli_query($con, "SELECT DISTINCT leavePckg FROM leavesetup");

                                                                while ($rowPkg = mysqli_fetch_array($selectPkg))
                                                                {
                                                                  echo '<option value="'.$rowPkg['leavePckg'].'">'.$rowPkg['leavePckg'].'</option>';
                                                                }

                                                                ?>
                                                        </select>
                                                </div>
                        </div>
                        <div class="cls"></div>
                                           <div class="form_sec_action_btn col-md-12">
                                                     
                                                      <button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
                                                      <button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
                                                      <button type="button" name="submitBtn" onclick="cancelFunc();"> <small>Cancel</small></button>        
                                         </div>
				</div>
        <div class="col-md-12 topscrolbtn"> 
          <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
        </div>
										<div class="cls"></div>
										<hr>
	
		</form>
				

	</div>
</div>
<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script>
	$(document).ready(function() {
    $('#usertable').DataTable();
    $('#empusertable').DataTable();
    $('#eduprousertable').DataTable();
    $('#empaddgrades').DataTable();
    $('#remainingleaves').DataTable();
   
  });
</script>

<script type="text/javascript">
  function saveDraft()
  {
    $("#draftModal").modal();
  }
  function submitForm()
  {
    $("#addUser_Modal").modal();
  }
  function eduProfDocs()
  {
    $("#eduProfDocs").modal();
  }
  function eduHistory()
  {
    $("#eduHst").modal();
  }
  function empHistory()
  {
    $("#empHst").modal();
  }

  function cancelFunc()
  {
    window.location = "hr_add_emp_info.php";
  }
</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
   function FormValidation()
   {
      // var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/;
      var re = /\S+@\S+\.\S+/;
      var regexp = /^[a-z .\-]+$/i;
      var regexn = /^(\d+-?)+\d+$/;
      var missingVal = 0;

      var empFName=document.getElementById('empFName').value;
      var empMName=document.getElementById('empMName').value;
      var empLName=document.getElementById('empLName').value;
      var empGrdName=document.getElementById('empGrdName').value;
      var cnicNo=document.getElementById('cnicNo').value;
      var empGender=document.getElementById('empGender').value;
      var empMaritalStatus=document.getElementById('empMaritalStatus').value;
      // var fileToUpload=document.getElementById('fileToUpload').value;
      var empDOB=document.getElementById('empDOB').value;
      // var empChildren=document.getElementById('empChildren').value;
      var empPerEmail=document.getElementById('empPerEmail').value;
      var empWorkEmail=document.getElementById('empWorkEmail').value;
      var empCell=document.getElementById('empCell').value;
      var empHomeNo=document.getElementById('empHomeNo').value;
      var emergRel=document.getElementById('emergRel').value;
      var empEmergencyNo=document.getElementById('empEmergencyNo').value;
      var ntnNo=document.getElementById('ntnNo').value;
      var passportNo=document.getElementById('passportNo').value;
      
      // var empOffice=document.getElementById('empOffice').value;
      /*var empHomeNo=document.getElementById('empHomeNo').value;
      var empCountry=document.getElementById('empCountry').value;
      var empCity=document.getElementById('empCity').value;
      var empAddress=document.getElementById('empAddress').value;
      var empSpouseName=document.getElementById('empSpouseName').value;
      var empEntity=document.getElementById('empEntity').value;*/
      var empDOJ=document.getElementById('empDOJ').value;
      //var lineBr = document.getElementByClass('cls').value;
      /*var empType=document.getElementById('empType').value;
      var emp_Desig=document.getElementById('emp_Desig').value;
      var empDept=document.getElementById('empDept').value;
      var empGrade=document.getElementById('empGrade').value;
      var lineManager=document.getElementById('lineManager').value;
      var leavePckg=document.getElementById('leavePckg').value;*/
      var summary = "Summary: ";

      
      if(empFName == "")
      {
          document.getElementById('empFName').style.borderColor = "red";
          missingVal = 1;
          // summary += "First name is required.";
          document.getElementById("s_empFName").innerHTML = "Firstname is required.";
      }
      if(empFName != "")
      {
          document.getElementById('empFName').style.borderColor = "white";
          document.getElementById("s_empFName").innerHTML = "";

          if (!regexp.test(empFName))
          {
            document.getElementById('empFName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empFName").innerHTML = "Only alphabets are allowed in firstname.";
          }
      }

      if(empMName != "")
      {
          document.getElementById('empMName').style.borderColor = "white";
          document.getElementById("s_empMName").innerHTML = "";

          if (!regexp.test(empMName))
          {
            document.getElementById('empMName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empMName").innerHTML = "Only alphabets are allowed in middle name.";
          }
      }
      
      if(empLName == "")
      {
          document.getElementById('empLName').style.borderColor = "red";
          missingVal = 1;
          // summary += "Last name is required.";
          document.getElementById("s_empLName").innerHTML = "Last required.";
      }
      if(empLName != "")
      {
          document.getElementById('empLName').style.borderColor = "white";
          document.getElementById("s_empLName").innerHTML = "";

          if (!regexp.test(empLName))
          {
              document.getElementById('empLName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empLName").innerHTML = "Only alphabets are allowed in lastname.";
          }
      }

      if(empGrdName == "")
      {
          document.getElementById('empGrdName').style.borderColor = "red";
          missingVal = 1;
          // summary += " Father/Husband name is required.";
          document.getElementById("s_empGrdName").innerHTML = "Father/Guardian is required.";
      }
      if(empGrdName != "")
      {
          document.getElementById('empGrdName').style.borderColor = "white";
          document.getElementById("s_empGrdName").innerHTML = "";

          if (!regexp.test(empGrdName))
          {
              document.getElementById('empGrdName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empGrdName").innerHTML = "Only alphabets are allowed in Father/Husband name.";
          }
      }

      if(cnicNo == "")
      {
          document.getElementById('cnicNo').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("s_cnicNo").innerHTML = "CNIC required.";
      }
      if(cnicNo != "")
      {
          document.getElementById('cnicNo').style.borderColor = "white";
          document.getElementById("s_cnicNo").innerHTML = "";

          if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }
      }

      if(empGender == "")
      {
          document.getElementById('empGender').style.borderColor = "red";
          missingVal = 1;
          // summary += " Gender required.";
          document.getElementById("s_empGender").innerHTML = "Gender required.";
      }
      if(empGender != "")
      {
          document.getElementById('empGender').style.borderColor = "white";
          document.getElementById("s_empGender").innerHTML = "";
      }

      if(empMaritalStatus == "")
      {
          document.getElementById('empMaritalStatus').style.borderColor = "red";
          missingVal = 1;
          // summary += " Marital status is required.";
          document.getElementById("s_empMaritalStatus").innerHTML = "Marital Status required.";
      }
      if(empMaritalStatus != "")
      {
          document.getElementById('empMaritalStatus').style.borderColor = "white";
          document.getElementById("s_empMaritalStatus").innerHTML = "";
      }


      /*if(fileToUpload == "")
      {
          document.getElementById('fileToUpload').style.borderColor = "red";
          missingVal = 1;
          summary += " Profile image is required.";
      }*/
      if(empDOB == "")
      {
          document.getElementById('empDOB').style.borderColor = "red";
          missingVal = 1;
          // summary += " Date of birth is required.";
          document.getElementById("s_empDOB").innerHTML = "Date of Birth required.";
      }
      if(empDOB != "")
      {
          document.getElementById('empDOB').style.borderColor = "white";
          document.getElementById("s_empDOB").innerHTML = "";
      }
      /*if(empChildren == "")
      {
          document.getElementById('empChildren').style.borderColor = "red";
          missingVal = 1;
          summary += " Number of childern is required.";
      }*/
      if(empPerEmail == "")
      {
          document.getElementById('empPerEmail').style.borderColor = "red";
          missingVal = 1;
          // summary += " Personal Email is required.";
          document.getElementById("s_empPerEmail").innerHTML = "Personal Email required.";
      }
      if(empPerEmail != "")
      {
          document.getElementById('empPerEmail').style.borderColor = "white";
          document.getElementById("s_empPerEmail").innerHTML = "";

          if (!re.test(empPerEmail))
          {
            document.getElementById('empPerEmail').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empPerEmail").innerHTML = "Please follow the email format (user@domain.com).";
          }
      }

      if(empWorkEmail != "")
      {
          document.getElementById('empWorkEmail').style.borderColor = "white";
          document.getElementById("s_empWorkEmail").innerHTML = "";

          if (!re.test(empWorkEmail))
          {
            document.getElementById('empWorkEmail').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empWorkEmail").innerHTML = "Please follow the email format in work email (user@domain.com).";
          }
      }
      

      if(empCell == "")
      {
          document.getElementById('empCell').style.borderColor = "red";
          missingVal = 1;
          // summary += " Cell number required.";
          document.getElementById("s_empCell").innerHTML = "Phone #. required.";
      }
      if(empCell != "")
      {
          document.getElementById('empCell').style.borderColor = "white";
          document.getElementById("s_empCell").innerHTML = "";

          if (!regexn.test(empCell))
          {
              document.getElementById('empCell').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empCell").innerHTML = "Phone number must contain 11 numeric characters only.";
          }
      }

      if(empHomeNo != "")
      {
          document.getElementById('empHomeNo').style.borderColor = "white";
          document.getElementById("s_empHomeNo").innerHTML = "";

          if (!regexn.test(empHomeNo))
          {
              document.getElementById('empHomeNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empHomeNo").innerHTML = "Home number must contain 11 numeric characters only.";
          }
      }

      if(emergRel != "")
      {
          document.getElementById('emergRel').style.borderColor = "white";
          document.getElementById("s_emergRel").innerHTML = "";

          if (!regexp.test(emergRel))
          {
              document.getElementById('emergRel').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_emergRel").innerHTML = "Only alphabets are allowed in emergency contact relation.";
          }
      }

      if(empEmergencyNo != "")
      {
          document.getElementById('empEmergencyNo').style.borderColor = "white";
          document.getElementById("s_empEmergencyNo").innerHTML = "";

          if (!regexn.test(empEmergencyNo))
          {
              document.getElementById('empEmergencyNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empEmergencyNo").innerHTML = "Emergency number must contain 11 numeric characters only.";
          }
      }

      if(ntnNo != "")
      {
          document.getElementById('ntnNo').style.borderColor = "white";
          document.getElementById("s_ntnNo").innerHTML = "";

          if (!regexn.test(ntnNo))
          {
              document.getElementById('ntnNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_ntnNo").innerHTML = "NTN number must contain 8 numeric characters only.";
          }
      }

      if(passportNo != "")
      {
          document.getElementById('passportNo').style.borderColor = "white";
          document.getElementById("s_passportNo").innerHTML = "";

          if (!regexn.test(passportNo))
          {
              document.getElementById('passportNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_passportNo").innerHTML = "Passport number must contain 9 numeric characters only.";
          }
      }



      /*if(empEmergencyNo == "")
      {
          document.getElementById('empEmergencyNo').style.borderColor = "red";
          missingVal = 1;
          summary += " Emergency contact is required.";
      }
      if(emergRel == "")
      {
          document.getElementById('emergRel').style.borderColor = "red";
          missingVal = 1;
          summary += " Emergency contact relation required.";
      }*/
      /*if(empOffice == "")
      {
          document.getElementById('empOffice').style.borderColor = "red";
          missingVal = 1;
          summary += " Office number is required.";
      }*/
      /*if(empHomeNo == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empHomeNo').style.borderColor = "red";
          missingVal = 1;
          summary += " Home phone is required.";
      }
      if(empCountry == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empCountry').style.borderColor = "red";
          missingVal = 1;
          summary += " Country is required.";
      }
      if(empCity == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empCity').style.borderColor = "red";
          missingVal = 1;
          summary += " City is required.";
      }
      if(empAddress == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empAddress').style.borderColor = "red";
          missingVal = 1;
          summary += " Email Address is required.";
      }
      if(ntnNo == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('ntnNo').style.borderColor = "red";
          missingVal = 1;
          summary += " NTN Number is required.";
      }
      if(empSpouseName == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empSpouseName').style.borderColor = "red";
          missingVal = 1;
          summary += " Spouse name is required.";
      }
      if(empEntity == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empEntity').style.borderColor = "red";
          missingVal = 1;
          summary += " Entity is required.";
      }*/
      if(empDOJ == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empDOJ').style.borderColor = "red";
          missingVal = 1;
          // summary += " Date of joining is required.";
          document.getElementById("s_empDOJ").innerHTML = "Date of Joining required.";
      }
      if(empDOJ != "")
      {
          document.getElementById('empDOJ').style.borderColor = "white";
          document.getElementById("s_empDOJ").innerHTML = "";
      }
      /*if(empType == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empType').style.borderColor = "red";
          missingVal = 1;
          summary += " Employee Type is required.";
      }
      if(emp_Desig == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('emp_Desig').style.borderColor = "red";
          missingVal = 1;
          summary += " Designation required.";
      }
      if(empDept == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empDept').style.borderColor = "red";
          missingVal = 1;
          summary += " Department is required.";
      }
      if(empGrade == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empGrade').style.borderColor = "red";
          missingVal = 1;
          summary += " Grade is required.";
      }
      if(lineManager == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('lineManager').style.borderColor = "red";
          missingVal = 1;
          summary += " Line Manager is required.";
      }
      if(leavePckg == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('leavePckg').style.borderColor = "red";
          missingVal = 1;
          summary += " Leave Package required.";
      }*/

      if (missingVal != 1)
      {
        document.getElementById('empFName').style.borderColor = "white";
        // document.getElementById('empMName').style.borderColor = "white";
        document.getElementById('empLName').style.borderColor = "white";

        document.getElementById('empGrdName').style.borderColor = "white";
        document.getElementById('cnicNo').style.borderColor = "white";
        document.getElementById('empGender').style.borderColor = "white";
        document.getElementById('empMaritalStatus').style.borderColor = "white";

        // document.getElementById('fileToUpload').style.borderColor = "white";
        document.getElementById('empDOB').style.borderColor = "white";
        // document.getElementById('empChildren').style.borderColor = "white";
        document.getElementById('empPerEmail').style.borderColor = "white";
        // document.getElementById('empPerEmail').style.borderColor = "white";
        document.getElementById('empCell').style.borderColor = "white";
        /*document.getElementById('empEmergencyNo').style.borderColor = "white";
        document.getElementById('emergRel').style.borderColor = "white";*/
        // document.getElementById('empOffice').style.borderColor = "white";

        /*document.getElementById('empHomeNo').style.borderColor = "white";
        document.getElementById('empCountry').style.borderColor = "white";
        document.getElementById('empCity').style.borderColor = "white";
        document.getElementById('empAddress').style.borderColor = "white";
        document.getElementById('ntnNo').style.borderColor = "white";
        document.getElementById('empSpouseName').style.borderColor = "white";
        document.getElementById('empEntity').style.borderColor = "white";*/

        document.getElementById('empDOJ').style.borderColor = "white";
        /*document.getElementById('empType').style.borderColor = "white";
        document.getElementById('emp_Desig').style.borderColor = "white";
        document.getElementById('empDept').style.borderColor = "white";
        document.getElementById('empGrade').style.borderColor = "white";
        document.getElementById('lineManager').style.borderColor = "white";
        document.getElementById('leavePckg').style.borderColor = "white";*/

            /*$(document).ready(function(){
        $("#btnConfirm_S").click(function(){*/
        $("#addUser_Modal").modal();
        /*});
      });*/
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent=summary;
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
    function readURL(input) 
    {
          if (input.files && input.files[0])
          {
              var reader = new FileReader();

              reader.onload = function (e)
              {
                  $('#blah')
                      .attr('src', e.target.result)
                      .width(185)
                      .height(185);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>

</body>
</html>