<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

// After Submit
//$empNo = $_GET['empNo'];
$userNo = $_GET['empNo'];
  // echo $user_id;
  $qry= "SELECT * FROM  empinfo WHERE empNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

    if ($userNo==$row['empNo'])
    {
      $empNo= $row['empNo'];
      $cnicNo = $row['cnicNo'];
      $ntnNo = $row['ntnNo'];
      $empFName = $row['empFName'];
      $empMName = $row['empMName'];
      $empLName = $row['empLName'];
      $empGrdName = $row['empGrdName'];
      $empDOB = $row['empDOB'];
      $empCell = $row['empCell'];
      // $empOffice = $row['empOffice'];
      $empHomeNo = $row['empHomeNo'];
      $empEmergencyNo = $row['empEmergencyNo'];
      $empMaritalStatus = $row['empMaritalStatus'];
      // $empSpouseName = $row['empSpouseName'];
      // $empChildren = $row['empChildren'];
      $empDept = $row['empDept'];
      $empDesig = $row['empDesig'];
      $empGrade = $row['empGrade'];
      $empEntity = $row['empEntity'];
      $lineManager = $row['lineManager'];
      $empCountry = $row['empCountry'];
      $empCity = $row['empCity'];
      $empAddress = $row['empAddress'];
      $empDOJ = $row['empDOJ'];
      $empWorkEmail = $row['empWorkEmail'];
      $empGender = $row['empGender'];
      $leavePckg = $row['leavePckg'];
      $savedStatus = $row['savedStatus'];
      $empType = $row['empType'];
      $passportNo = $row['passportNo'];
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
if(isset($_POST['submitBtn']))
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
  $empCell = $_POST['empCell'];
  $empEmergencyNo = $_POST['empEmergencyNo'];
  // $empOffice = $_POST['empOffice'];
  $empHomeNo = $_POST['empHomeNo'];
  $empCountry = $_POST['empCountry'];
  $empCity = $_POST['empCity'];
  $empAddress = $_POST['empAddress'];
  $ntnNo = $_POST['ntnNo'];
  // $empSpouseName = $_POST['empSpouseName'];
  $empEntity = $_POST['empEntity'];
  $empDesig = $_POST['empDesig'];
  $empDept = $_POST['empDept'];
  $empGrade = $_POST['empGrade'];
  $lineManager = $_POST['lineManager'];
  // $empChildren = $_POST['empChildren'];
  $empDOJ = $_POST['empDOJ'];
  $leavePckg = $_POST['leavePckg'];
  $empType = $_POST['empType'];
  $passportNo = $row['passportNo'];

  // Inserting records to DB
  $updateQuery = mysqli_query($con, "UPDATE empinfo SET cnicNo='$cnicNo',ntnNo='$ntnNo',empFName='$empFName', empMName='$empMName', empLName='$empLName',empGrdName='$empGrdName',empDOB='$empDOB',empCell='$empCell', empHomeNo='$empHomeNo',empEmergencyNo='$empEmergencyNo',empMaritalStatus='$empMaritalStatus',empDept='$empDept',empDesig='$empDesig',empGrade='$empGrade',empEntity='$empEntity',lineManager='$lineManager',empCountry='$empCountry',empCity='$empCity',empAddress='$empAddress',empDOJ='$empDOJ',empWorkEmail='$empWorkEmail',empGender='$empGender',leavePckg='$leavePckg',savedStatus= '1', empType='$empType', passportNo='$passportNo' WHERE empNo='$userNo' ") or die(mysqli_error($con));

  // Generating the alert
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);
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
  $empCell = $_POST['empCell'];
  $empEmergencyNo = $_POST['empEmergencyNo'];
  // $empOffice = $_POST['empOffice'];
  $empHomeNo = $_POST['empHomeNo'];
  $empCountry = $_POST['empCountry'];
  $empCity = $_POST['empCity'];
  $empAddress = $_POST['empAddress'];
  $ntnNo = $_POST['ntnNo'];
  // $empSpouseName = $_POST['empSpouseName'];
  $empEntity = $_POST['empEntity'];
  $empDesig = $_POST['empDesig'];
  $empDept = $_POST['empDept'];
  $empGrade = $_POST['empGrade'];
  $lineManager = $_POST['lineManager'];
  // $empChildren = $_POST['empChildren'];
  $empDOJ = $_POST['empDOJ'];
  $leavePckg = $_POST['leavePckg'];
  $empType = $_POST['empType'];
  $passportNo = $row['passportNo'];

  // Inserting records to DB
  $updateQuery = mysqli_query($con, "UPDATE empinfo SET cnicNo='$cnicNo',ntnNo='$ntnNo',empFName='$empFName', empMName='$empMName', empLName='$empLName',empGrdName='$empGrdName',empDOB='$empDOB',empCell='$empCell', empHomeNo='$empHomeNo',empEmergencyNo='$empEmergencyNo',empMaritalStatus='$empMaritalStatus',empDept='$empDept',empDesig='$empDesig',empGrade='$empGrade',empEntity='$empEntity',lineManager='$lineManager',empCountry='$empCountry',empCity='$empCity',empAddress='$empAddress',empDOJ='$empDOJ',empWorkEmail='$empWorkEmail',empGender='$empGender',leavePckg='$leavePckg',savedStatus= '0', empType='$empType', passportNo='$passportNo' WHERE empNo='$userNo' ") or die(mysqli_error($con));

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
	<title>Edit Employee</title>
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
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
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
<script type="text/javascript">
  $(document).ready(function(){
          $("#empNo").prop("disabled", true);
</script>


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
          <a href="hr_add_emp_info.php" class="btn btn-info active">Edit Employee</a>
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

       <!-- Modal Three (For Choose file - Educational & Professional documents)-->
       <div class="modal fade symfra_popup2" id="eduProfDocs" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload Document</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields">  
                    <label>Attach Document</label> 
                    <input type="file" onchange="readURL(this);" name="docUpload" id="docUpload">  
                  </div>

                  <div class="input-fields">  
                    <label>Title</label> 
                    <input type="text" name="docTitle" id="docTitle" placeholder="Document Title">    
                  </div>

                  <div class="input-fields">  
                    <label>Description</label> 
                    <textarea name="docDesc"></textarea>
                  </div>

                  <button type="submit">Submit</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>

       <!-- Modal Four (Employement History)-->
       <div class="modal fade symfra_popup2" id="empHst" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Employement History</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields">  
                    <label>Organization</label> 
                    <input type="text" name="empOrg" id="empOrg" placeholder="Organization Name">    
                  </div>

                  <div class="input-fields">  
                    <label>Designation</label> 
                    <input type="text" name="empDesig" id="empDesig" placeholder="Designation">    
                  </div>

                  <div class="input-fields">  
                    <label>Duration</label> 
                    <input type="text" name="empDuration" id="empDuration" placeholder="Duration">    
                  </div>

                  <div class="input-fields">  
                    <label>Salary</label> 
                    <input type="text" name="empSalary" id="empSalary" placeholder="Salary">    
                  </div>

                  <button type="submit" name="saveEmployment" id="saveEmployment">Submit</button>

                </div>
              </div>
            </div>
        </div>

      <!-- Modal Five (Education History)-->
       <div class="modal fade symfra_popup2" id="eduHst" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Education History</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields">  
                    <label>Degree</label> 
                    <input type="text" name="eduDegree" id="eduDegree" placeholder="Degree Name">    
                  </div>

                  <div class="input-fields">  
                    <label>Institution</label> 
                    <input type="text" name="eduInst" id="eduInst" placeholder="Institute/University">    
                  </div>

                  <div class="input-fields">  
                    <label>GPA/Percentage</label> 
                    <input type="text" name="eduGPA" id="eduGPA" placeholder="GPA/Percentage">    
                  </div>

                  <div class="input-fields">  
                    <label>Year</label> 
                    <input type="text" name="eduYear" id="eduYear" placeholder="Year">    
                  </div>

                  <button type="submit" name="saveEdu" id="saveEdu">Submit</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
        </div>

        <!-- Modal Six (Family History)-->
       <div class="modal fade symfra_popup2" id="famHst" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Family Information</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields">  
                    <label>Name</label> 
                    <input type="text" name="familyTitle" id="familyTitle" placeholder="Name">    
                  </div>

                  <div class="input-fields">  
                    <label>Relation</label> 
                    <input type="text" name="familyRelation" id="familyRelation" placeholder="Relation">    
                  </div>

                  <div class="input-fields">  
                    <label>Date of Birth</label> 
                    <input type="text" name="familyDOB" id="familyDOB" placeholder="Date of Birth">    
                  </div>

                  <div class="input-fields">  
                    <label>Contact</label> 
                    <input type="text" name="familyContact" id="familyContact" placeholder="Contact">    
                  </div>

                  <button type="submit" name="saveFamily" id="saveFamily">Submit</button>

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
										<button type="button" id="btnConfirm_S" onclick="submitForm();"> <small>Submit</small></button>
										<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
										<button type="button" name="submitBtn"> <small><a href="hr_add_emp_info_UE.php?empNo=<?php echo $row['empNo']; ?>">Cancel</a></small></button>				
								</div>
												
												  <div class="cls"></div>

                 <div class="col-md-6">
                                                <div class="input-label"><label >Employee #</label></div>

                                                <div class="input-feild">
                                                <input type="text" name="empNo" id="empNo" disabled value="<?php echo $empNo; ?>" >
                                                </div>

                                                <div class="input-label"><label > Name</label></div>  
                                                <div class="input-feild">
                                                        <input  type="text" name="empFName" id="empFName" value="<?php echo $empFName; ?>"><span class="steric">*</span>
                                                        <input  type="text" name="empMName" id="empMName" value="<?php echo $empMName; ?>">
                                                        <input  type="text" name="empLName" id="empLName" value="<?php echo $empLName; ?>"><span class="steric">*</span>  
                                                </div>

                                                <div class="input-label"><label > Father/Guardian Name</label></div>  
                                                <div class="input-feild">
                                                        <input  type="text" name="empGrdName" id="empGrdName" value="<?php echo $empGrdName ?>">   <span class="steric">*</span>     
                                                </div>
                                                
                                                <div class="input-label"><label >CNIC Number</label></div>  
                                                <div class="input-feild">
                                                        <input  type="text" name="cnicNo" id="cnicNo" value="<?php echo $cnicNo ?>"><span class="steric">*</span>
                                                </div>                                    
                                                <div class="input-label"><label > Gender</label></div>  

                                                <div class="input-feild">
                                                        <select name="empGender" id="empGender">
                                                                <option value=""><?php echo $empGender ?></option>
                                                                <option >Male</option>
                                                                <option >Female</option>
                                                                <option >Not Specified</option>
                                                        </select><span class="steric">*</span>
                                                </div>

                                                <div class="input-label"><label > Marital Status</label></div>  

                                                <div class="input-feild">
                                                        <select name="empMaritalStatus" id="empMaritalStatus">
                                                                <option value="<?php echo $empMaritalStatus ?>"><?php echo $empMaritalStatus ?></option>
                                                                <option >Single</option>
                                                                <option >Married</option>
                                                                <option >Not Married</option>
                                                                <option>Widow</option>
                                                        </select><span class="steric">*</span>
                                                </div> 
                                                <div class="input-label"><label > Date of Birth</label></div>
                                                <div class="input-feild">
                                                        <input type="date" name="empDOB" value="<?php echo $empDOB ?>" id="empDOB" data-date-inline-picker="false" data-date-open-on-focus="true" /><span class="steric">*</span>
                                                </div>                                                                            
                                 </div>

                <div class="col-md-6">
                                                <div class="input-label"><label > Choose Profile Image</label></div>
                                                <div class="input-feild">
                                                        <img src="images/user.png" style="width: 185px" id="blah">
                                                        <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload"/>
                                                      </div>

                       <!--  <div class="cls"></div> -->
                </div> 
        </div>     
                    <div class="cls"></div>
                    <hr>


        <div class="contct_usr_info widget_iner_box">

                <div class="col-md-6">
                                        <div class="input-label"><label >Work Email</label></div>
                                        <div class="input-feild">
                                                <input  type="text" name="empWorkEmail" id="empWorkEmail" value="<?php echo $empWorkEmail ?>">
                                        </div>

                                        <div class="input-label"><label >Contact No.</label></div>  
                                        <div class="input-feild">
                                                <input  type="text" name="empCell" id="empCell" value="<?php echo $empCell ?>"><span class="steric">*</span>
                                                <input  type="text" name="empEmergencyNo" id="empEmergencyNo" value="<?php echo $empEmergencyNo ?>">
                                                <!-- <input  type="text" name="empOffice" id="empOffice" value="<?php echo $empOffice ?>"> -->
                                                <input  type="text" name="empHomeNo" id="empHomeNo" value="<?php echo $empHomeNo ?>">

                                        </div>
                                </div>
            
                <div class="col-md-6">

                                        <div class="input-label"><label >Address</label></div>
                                        <div class="input-feild">
                                                <textarea name="empAddress" id="empAddress"><?php echo $empAddress; ?></textarea>
                                        </div>

                                        <div class="input-label"><label >City</label></div>
                                        <div class="input-feild">
                                                <select name="empCity" id="empCity">
                                                        <option value="<?php echo $empCity ?>"><?php echo $empCity ?></option>
                                                        <option >Karachi</option>
                                                        <option >Hyderabad</option>
                                                        <option >Lahore</option>
                                                        <option >Islamabad</option>
                                                </select>
                                        </div>

                                        <div class="input-label"><label >Country</label></div>
                                        <div class="input-feild">
                                                <select name="empCountry" id="empCountry">
                                                        <option value="<?php echo $empCountry ?>"><?php echo $empCountry ?></option>
                                                        <option >Pakistan</option>
                                                        <option >India</option>
                                                        <option >United Kingdom</option>
                                                        <option >USA</option>
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
                                                        <input  type="number" name="ntnNo" id="ntnNo"  value="<?php echo $ntnNo ?>">
                                                </div>
                                               
                                                <div class="input-label"><label >Entity</label></div> 
                                                <div class="input-feild">
                                                        <input  type="text" name="empEntity" id="empEntity" value="<?php echo $empEntity ?>">
                                                </div>

                                                <div class="input-label"><label > Date of Joining</label></div>
                                                <div class="input-feild">
                                                        <input type="date" name="empDOJ" id="empDOJ" value="<?php echo $empDOJ ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /><span class="steric">*</span>
                                                </div>

                                                <div class="input-label"><label > Employee Type</label></div>
                                                <div class="input-feild">
                                                        <select name="empType" id="empType"> 
                                                                <option value=""><?php echo $empType ?></option>
                                                                <option value="">Select</option>
                                                                <option value="Permenant">Permenant</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Contract">Contract</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label >Passport No</label></div> 
                                                <div class="input-feild">
                                                        <input  type="number" name="passportNo" id="passportNo" value="<?php echo $passportNo ?>">
                                                </div>
                                          </div>

                      <div class="col-md-6">
                                                <div class="input-label"><label >Designation</label></div>
                                                <div class="input-feild">
                                                  <input  type="text" name="empDesig" id="empDesig" value="<?php echo $empDesig ?>">

                                                </div>
                
                                                <div class="input-label"><label >Department</label></div>
                                                <div class="input-feild">
                                                        <select name="empDept" id="empDept">
                                                                <option value="<?php echo $empDept; ?>"><?php echo $empDept; ?></option>
                                                                <option >Sales</option>
                                                                <option >Finance</option>
                                                                <option >H R</option>
                                                                <option >Administration</option>
                                                        </select>
                                                </div>
                
                                                <div class="input-label"><label >Grade</label></div>
                                                <div class="input-feild">
                                                        <select name="empGrade" id="empGrade">
                                                                <option value="<?php echo $empGrade ?>"><?php echo $empGrade ?></option>
                                                                <option >Grade 1</option>
                                                                <option >Grade 2</option>
                                                        </select>
                                                </div>
                
                                                <div class="input-label"><label>Reporting Manager</label></div>
                                                <div class="input-feild">
                                                        <select name="lineManager" id="lineManager">
                                                                <option value="<?php echo $lineManager ?>"><?php echo $lineManager ?></option>
                                                                <option >Anas Siddiqui</option>
                                                                <option >Syed Zaid Ali</option>
                                                                <option >Saad Jafri</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label >Leave Package</label></div>
                                               <div class="input-feild">
                                                       <select name="leavePckg" id="leavePckg">
                                                               <option value="">Select</option>
                                                               <option value="Package 1">Package 1</option>
                                                               <option value="Package 2">Package 2</option>
                                                               <option value="Package 3">Package 3</option>
                                                       </select>
                                               </div>
                                          </div>
        </div>
										<div class="cls"></div>
										<hr>
				<div class="acount_info widget_iner_box">
                  <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Education History</a></li>
                      <li><a data-toggle="tab" href="#menu1">Employement History </a></li>
                      <li><a data-toggle="tab" href="#menu4">Family Info </a></li>
                      <li><a data-toggle="tab" href="#menu2">Documents</a></li>
                      <li><a data-toggle="tab" href="#menu3">Leaves</a></li>
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
                      
                       <div class="table-responsive" id="education_table">
                              
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

                    <div class="table-responsive" id="employement_table">
                              
                    </div>
                  </div>

                  <div id="menu4" class="tab-pane fade">
                    <div class="container">
                      <br />
                      <div align="right">
                        <button type="button" id="famHist" onclick="famHistory();">Add New</button>
                      </div>
                      <br />
                     <!--  <div class="table-responsive" id="image_table">
                          
                      </div> -->
                    </div>

                    <div class="table-responsive" id="family_table">
                              
                    </div>
                  </div>

                  <div id="menu2" class="tab-pane fade">
                        <div class="">
                          <br />
                          <div align="right">
                            <button type="button" id="eduProf" onclick="eduProfDocs();">Add Document</button>
                            <span id="error_multiple_files"></span>
                          </div>
                          <br />
                          <div class="table-responsive" id="image_table">
                              
                          </div>
                        </div>
                  </div>

  <div id="menu3" class="tab-pane fade">
    <br>
    <div align="right">
      <button type="button"><a href="emp_leave_app.php?empNo=<?php echo $row['empNo']; ?>">Apply Leave</a></button>
    </div>
    <br>
        <table id="remainingleaves" class="display  dataTable no-footer emp_hr_tbles " style="width:100%">
                            <thead>
                              <tr>
                                <th colspan="4" style="text-align: center;">Year: 2019</th>
                              </tr>
                              <tr>
                                <th>Leave Detail</th>
                                <th>Total</th>
                                <th>Avail</th>
                                <th>Remaining</th>
                              </tr>
                            </thead>

                            <tbody>

                              <?php

                              $selectLeaves = mysqli_query($con, "SELECT * FROM leavestaken WHERE empID='Anas Siddiqui' AND leaveYear='2019' ");

                              while ($rowLeaves = mysqli_fetch_array($selectLeaves))
                              {

                              ?>

                              <tr>
                                <td><?php echo $rowLeaves['leaveType']; ?></td>
                                <td><?php echo $rowLeaves['leaveTotal']; ?></td>
                                <td><?php echo $rowLeaves['leavesAvailed']; ?></td>
                                <td><?php echo $rowLeaves['leavesRemaining']; ?></td>
                              </tr>

                              <?php

                              }

                              ?>

                            </tbody>
                        </table>

  </div>    
                            
        </div>              
            
            <div class="cls"></div>
            <hr>
          
    </form>
        

  </div>
</div>

<!-- Edit Document -->
<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_image_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Image Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="image_name" id="image_name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image Description</label>
      <input type="text" name="image_description" id="image_description" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="image_id" id="image_id" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>

<!-- Edit Employement -->
<div id="employementModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_empHistory_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Employement History</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Organization</label>
      <input type="text" name="empOrganization" id="empOrganization" class="form-control" />
     </div>
     <div class="form-group">
      <label>Designation</label>
      <input type="text" name="empDesignation" id="empDesignation" class="form-control" />
     </div>
     <div class="form-group">
      <label>Duration</label>
      <input type="text" name="empDuration" id="empDuration" class="form-control" />
     </div>
     <div class="form-group">
      <label>Salary</label>
      <input type="text" name="empSalary" id="empSalary" class="form-control" />
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

<!-- Edit Family -->
<div id="familyModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_famHistory_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Family History</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Name</label>
      <input type="text" name="famTitle" id="famTitle" class="form-control" />
     </div>
     <div class="form-group">
      <label>Relation</label>
      <input type="text" name="famRelation" id="famRelation" class="form-control" />
     </div>
     <div class="form-group">
      <label>Date of Birth</label>
      <input type="text" name="famDOB" id="famDOB" class="form-control" />
     </div>
     <div class="form-group">
      <label>Contact</label>
      <input type="text" name="famContanct" id="famContanct" class="form-control" />
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
<div id="educationModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_eduHistory_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Education History</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Degree</label>
      <input type="text" name="empDegree" id="empDegree" class="form-control" />
     </div>
     <div class="form-group">
      <label>Institute</label>
      <input type="text" name="empInstitute" id="empInstitute" class="form-control" />
     </div>
     <div class="form-group">
      <label>GPA</label>
      <input type="text" name="empGPA" id="empGPA" class="form-control" />
     </div>
     <div class="form-group">
      <label>Year</label>
      <input type="text" name="empYear" id="empYear" class="form-control" />
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
                                           <div class="form_sec_action_btn col-md-12">
                                                     
                                                      <button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
                                                      <button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
                                                      <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                                         </div>
                                         <div class="col-md-12 topscrolbtn"> 
                  <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
                </div>

<script>
  $(document).ready(function() {
    $('#usertable').DataTable();
    $('#empusertable').DataTable();
    $('#eduprousertable').DataTable();
    $('#empaddgrades').DataTable();
    $('#remainingleaves').DataTable();
   
  });
</script>
<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
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
   function famHistory()
   {
    $("#famHst").modal();
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

<!-- Educational & Professional Documents -->
<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"fetchDocuments.php",
   method:"POST",
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 } 
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"uploadDocuments.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var image_id = $(this).attr("id");
  $.ajax({
   url:"editDocuments.php",
   method:"post",
   data:{image_id:image_id},
   dataType:"json",
   success:function(data)
   {
    $('#imageModal').modal('show');
    $('#image_id').val(image_id);
    $('#image_name').val(data.image_name);
    $('#image_description').val(data.image_description);
   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"deleteDocuments.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"updateDocuments.php",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
     $('#imageModal').modal('hide');
     load_image_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>

<!-- Employement History -->
<script>
$(document).ready(function(){
  load_employement_data();
  function load_employement_data()
 {
  var empNo = document.getElementById("empNo").value;
  $.ajax({

   url:"fetchEmpHistory.php?empNo=" + empNo,
   method:"POST",
   success:function(data)
   {
    $('#employement_table').html(data);
   }
  });
 }

 $(document).on('click', '.editEmpHst', function(){
  var SrNo = $(this).attr("id");
  $.ajax({
   url:"editEmployement.php",
   method:"post",
   data:{SrNo:SrNo},
   dataType:"json",
   success:function(data)
   {
    $('#employementModal').modal('show');
    //$('#empOrganization').val(empOrganization);
    $('#SrNo').val(SrNo);
    $('#empOrganization').val(data.empOrganization);
    $('#empDesignation').val(data.empDesignation);
    $('#empDuration').val(data.empDuration);
    $('#empSalary').val(data.empSalary);
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
     $('#employementModal').modal('hide');
     load_employement_data();
     alert('Employement details updated');
    }
   });
 }); 

 
});
</script>

<!-- Family History -->
<script>
$(document).ready(function(){
  load_family_data();
  function load_family_data()
 {
  var empNo = document.getElementById("empNo").value;
  $.ajax({

   url:"fetchFamilyHistory.php?empNo=" + empNo,
   method:"POST",
   success:function(data)
   {
    $('#family_table').html(data);
   }
  });
 }

 $(document).on('click', '.editFamHst', function(){
  var SrNo = $(this).attr("id");
  $.ajax({
   url:"editFamily.php",
   method:"post",
   data:{SrNo:SrNo},
   dataType:"json",
   success:function(data)
   {
    $('#familyModal').modal('show');
    $('#SrNo').val(SrNo);
    $('#famTitle').val(data.famTitle);
    $('#famRelation').val(data.famRelation);
    $('#famDOB').val(data.famDOB);
    $('#famContanct').val(data.famContanct);
   }
  });
 });

 $('#edit_famHistory_form').on('submit', function(event){
  event.preventDefault();
   $.ajax({
    method:"POST",
    data:$('#edit_famHistory_form').serialize(),
    success:function(data)
    {
     $('#familyModal').modal('hide');
     load_family_data();
     alert('Family details updated');
    }
   });
 }); 

 
});
</script>

<!-- Education History -->
<script>
$(document).ready(function(){
  load_education_data();
  function load_education_data()
 {
  var empNo = document.getElementById("empNo").value;
  $.ajax({
   url:"fetchEduHistory.php?empNo=" + empNo,
   method:"POST",
   success:function(data)
   {
    $('#education_table').html(data);
   }
  });
 }

 $(document).on('click', '.editEduHst', function(){
  var SrNoEdu = $(this).attr("id");
  $.ajax({
   url:"editEducation.php",
   method:"post",
   data:{SrNoEdu:SrNoEdu},
   dataType:"json",
   success:function(data)
   {
    $('#educationModal').modal('show');
    //$('#empOrganization').val(empOrganization);
    $('#SrNoEdu').val(SrNoEdu);
    $('#empDegree').val(data.empDegree);
    $('#empInstitute').val(data.empInstitute);
    $('#empGPA').val(data.empGPA);
    $('#empYear').val(data.empYear);
   }
  });
 });

 $('#edit_eduHistory_form').on('submit', function(event){
  event.preventDefault();
   $.ajax({
    url:"updateEducation.php",
    method:"POST",
    data:$('#edit_eduHistory_form').serialize(),
    success:function(data)
    {
     $('#educationModal').modal('hide');
     load_education_data();
     alert('Employement details updated');
    }
   });
 }); 
 
});
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#saveEdu').click(function(){
    var eduDegree = [];
    var eduInst = [];
    var eduGPA = [];
    var eduYear = [];
    var empNo = [];
    eduDegree = document.getElementById("eduDegree").value;
    eduInst = document.getElementById("eduInst").value;
    eduGPA = document.getElementById("eduGPA").value;
    eduYear = document.getElementById("eduYear").value;
    empNo = document.getElementById("empNo").value;
    
      $.ajax({
       url:"addEducation.php",
       method:"POST",
       data:{eduDegree:eduDegree, eduInst:eduInst, eduGPA:eduGPA, eduYear:eduYear, empNo:empNo},
       success:function(data){
        alert(data);
        // fetch_item_data();
        load_education_data();
       }
      });
    });

    });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#saveEmployment').click(function(){
    var empOrg = [];
    var empDesig = [];
    var empDuration = [];
    var empSalary = [];
    var empNo = [];
    empOrg = document.getElementById("empOrg").value;
    empDesig = document.getElementById("empDesig").value;
    empDuration = document.getElementById("empDuration").value;
    empSalary = document.getElementById("empSalary").value;
    empNo = document.getElementById("empNo").value;
    
      $.ajax({
       url:"addEmployment.php",
       method:"POST",
       data:{empOrg:empOrg, empDesig:empDesig, empDuration:empDuration, empSalary:empSalary, empNo:empNo},
       success:function(data){
        alert(data);
        // fetch_item_data();
        load_employement_data();
       }
      });
    });

    });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#saveFamily').click(function(){
    var empOrg = [];
    var empDesig = [];
    var empDuration = [];
    var empSalary = [];
    var empNo = [];
    famTitle = document.getElementById("familyTitle").value;
    famRelation = document.getElementById("familyRelation").value;
    famDOB = document.getElementById("familyDOB").value;
    famContanct = document.getElementById("familyContact").value;
    empNo = document.getElementById("empNo").value;
    
      $.ajax({
       url:"addFamily.php",
       method:"POST",
       data:{famTitle:famTitle, famRelation:famRelation, famDOB:famDOB, famContanct:famContanct, empNo:empNo},
       success:function(data){
        alert(data);
        // fetch_item_data();
        load_family_data();
       }
      });
    });

    });
</script>

<script type="text/javascript">
  $('#docUpload').change(function() {
    //$('#title').val(this.value ? this.value.match(/([\w-_]+)(?=\.)/)[0] : '');
    $('#docTitle').val(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');

  });
</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
   function FormValidation()
   {
      var missingVal = 0;
      var empFName=document.getElementById('empFName').value;
      // var empMName=document.getElementById('empMName').value;
      var empLName=document.getElementById('empLName').value;
      var empGrdName=document.getElementById('empGrdName').value;
      var cnicNo=document.getElementById('cnicNo').value;
      var empGender=document.getElementById('empGender').value;
      var empMaritalStatus=document.getElementById('empMaritalStatus').value;
      var fileToUpload=document.getElementById('fileToUpload').value;
      var empDOB=document.getElementById('empDOB').value;
      // var empChildren=document.getElementById('empChildren').value;
      var empWorkEmail=document.getElementById('empWorkEmail').value;
      var empCell=document.getElementById('empCell').value;
      var empEmergencyNo=document.getElementById('empEmergencyNo').value;
      // var empOffice=document.getElementById('empOffice').value;
      var empHomeNo=document.getElementById('empHomeNo').value;
      var empCountry=document.getElementById('empCountry').value;
      var empCity=document.getElementById('empCity').value;
      var empAddress=document.getElementById('empAddress').value;
      var ntnNo=document.getElementById('ntnNo').value;
      // var empSpouseName=document.getElementById('empSpouseName').value;
      var empEntity=document.getElementById('empEntity').value;
      var empDOJ=document.getElementById('empDOJ').value;
      //var lineBr = document.getElementByClass('cls').value;
      var empType=document.getElementById('empType').value;
      var empDesig=document.getElementById('empDesig').value;
      var empDept=document.getElementById('empDept').value;
      var empGrade=document.getElementById('empGrade').value;
      var lineManager=document.getElementById('lineManager').value;
      var leavePckg=document.getElementById('leavePckg').value;
      var summary = "Summary: ";

      if(empFName == "")
      {
          document.getElementById('empFName').style.borderColor = "red";
          missingVal = 1;
          summary += "First name is required.";
      }
      /*if(empMName == "")
      {
          document.getElementById('empMName').style.borderColor = "red";
          missingVal = 1;
          summary += "Middle name is required.";
      }*/
      if(empLName == "")
      {
          document.getElementById('empLName').style.borderColor = "red";
          missingVal = 1;
          summary += "Last name is required.";
      }

      if(empGrdName == "")
      {
          document.getElementById('empGrdName').style.borderColor = "red";
          missingVal = 1;
          summary += " Father/Husband name is required.";
      }
      if(cnicNo == "")
      {
          document.getElementById('cnicNo').style.borderColor = "red";
          missingVal = 1;
          summary +=  " CNIC number is required ";
      }
      if(empGender == "")
      {
          document.getElementById('empGender').style.borderColor = "red";
          missingVal = 1;
          summary += " Gender required.";
      }
      if(empMaritalStatus == "")
      {
          document.getElementById('empMaritalStatus').style.borderColor = "red";
          missingVal = 1;
          summary += " Marital status is required.";
      }
      if(fileToUpload == "")
      {
          document.getElementById('fileToUpload').style.borderColor = "red";
          missingVal = 1;
          summary += " Profile image is required.";
      }
      if(empDOB == "")
      {
          document.getElementById('empDOB').style.borderColor = "red";
          missingVal = 1;
          summary += " Date of birth is required.";
      }
      /*if(empChildren == "")
      {
          document.getElementById('empChildren').style.borderColor = "red";
          missingVal = 1;
          summary += " Number of childern is required.";
      }*/
      if(empWorkEmail == "")
      {
          document.getElementById('empWorkEmail').style.borderColor = "red";
          missingVal = 1;
          summary += " Work Email is required.";
      }
      if(empCell == "")
      {
          document.getElementById('empCell').style.borderColor = "red";
          missingVal = 1;
          summary += " Cell number required.";
      }
      if(empEmergencyNo == "")
      {
          document.getElementById('empEmergencyNo').style.borderColor = "red";
          missingVal = 1;
          summary += " Emergency contact is required.";
      }
      /*if(empOffice == "")
      {
          document.getElementById('empOffice').style.borderColor = "red";
          missingVal = 1;
          summary += " Office number is required.";
      }*/
      if(empHomeNo == "")
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
      /*if(empSpouseName == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empSpouseName').style.borderColor = "red";
          missingVal = 1;
          summary += " Spouse name is required.";
      }*/
      if(empEntity == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empEntity').style.borderColor = "red";
          missingVal = 1;
          summary += " Entity is required.";
      }
      if(empDOJ == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empDOJ').style.borderColor = "red";
          missingVal = 1;
          summary += " Date of joining is required.";
      }
      if(empType == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empType').style.borderColor = "red";
          missingVal = 1;
          summary += " Employee Type is required.";
      }
      if(empDesig == "")
      {
          // alert('Please Enter First Name');
          document.getElementById('empDesig').style.borderColor = "red";
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
      }

      if (missingVal != 1)
      {
        document.getElementById('empFName').style.borderColor = "white";
        // document.getElementById('empMName').style.borderColor = "white";
        document.getElementById('empLName').style.borderColor = "white";
        document.getElementById('empGrdName').style.borderColor = "white";
        document.getElementById('cnicNo').style.borderColor = "white";
        document.getElementById('empGender').style.borderColor = "white";
        document.getElementById('empMaritalStatus').style.borderColor = "white";

        document.getElementById('fileToUpload').style.borderColor = "white";
        document.getElementById('empDOB').style.borderColor = "white";
        // document.getElementById('empChildren').style.borderColor = "white";
        document.getElementById('empWorkEmail').style.borderColor = "white";
        document.getElementById('empCell').style.borderColor = "white";
        document.getElementById('empEmergencyNo').style.borderColor = "white";
        // document.getElementById('empOffice').style.borderColor = "white";

        document.getElementById('empHomeNo').style.borderColor = "white";
        document.getElementById('empCountry').style.borderColor = "white";
        document.getElementById('empCity').style.borderColor = "white";
        document.getElementById('empAddress').style.borderColor = "white";
        document.getElementById('ntnNo').style.borderColor = "white";
        // document.getElementById('empSpouseName').style.borderColor = "white";
        document.getElementById('empEntity').style.borderColor = "white";

        document.getElementById('empDOJ').style.borderColor = "white";
        document.getElementById('empType').style.borderColor = "white";
        document.getElementById('empDesig').style.borderColor = "white";
        document.getElementById('empDept').style.borderColor = "white";
        document.getElementById('empGrade').style.borderColor = "white";
        document.getElementById('lineManager').style.borderColor = "white";
        document.getElementById('leavePckg').style.borderColor = "white";

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

</body>
</html>