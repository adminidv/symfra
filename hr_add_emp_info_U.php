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

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Employee</title>
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
          $("#cnicNo").prop("disabled", true);
          $("#ntnNo").prop("disabled", true);
          $("#empFName").prop("disabled", true);
          $("#empMName").prop("disabled", true);
          $("#empLName").prop("disabled", true);
          $("#empGrdName").prop("disabled", true);
          $("#empDOB").prop("disabled", true);
          $("#empCell").prop("disabled", true);;
          // $("#empOffice").prop("disabled", true);
          $("#empHomeNo").prop("disabled", true);
          $("#empEmergencyNo").prop("disabled", true);
          $("#empMaritalStatus").prop("disabled", true);
          // $("#empSpouseName").prop("disabled", true);
          // $("#empChildren").prop("disabled", true);
          $("#empDept").prop("disabled", true);
          $("#empDesig").prop("disabled", true);
          $("#empGrade").prop("disabled", true);
          $("#costCenter").prop("disabled", true);
          $("#empEntity").prop("disabled", true);
          $("#lineManager").prop("disabled", true);
          $("#empCountry").prop("disabled", true);
          $("#empCity").prop("disabled", true);
          $("#empAddress").prop("disabled", true);
          $("#empOrgano").prop("disabled", true);
          $("#empDOJ").prop("disabled", true);
          $("#empWorkEmail").prop("disabled", true);
          $("#empGender").prop("disabled", true);
          $("#leavePckg").prop("disabled", true);
          $("#savedStatus").prop("disabled", true);
          $("#empType").prop("disabled", true);
          $("#passportNo").prop("disabled", true);

      });
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
          <a href="hr_add_emp_info.php" class="btn btn-info active">View Employee</a>
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
				          <p>Are You Sure You Want to Edit?</p>
				          <button type="submit" name="saveBtn"><a href="hr_add_emp_info_UE.php?empNo=<?php echo $row['empNo']; ?>">Yes</a></button>
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
      
			 <label id="formSummary" style="color: red;"></label>

				<div class="Bsic_usr_info widget_iner_box">

								<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
											<!-- Go back button code starting here -->
                      <?php include('inc_widgets/backBtn.php'); ?>
                      <!-- Go back button code ending here -->
										</div>
										
										<button type="button" name="btnConfirm_S" onclick="saveDraft();"><small>Edit</small></button>
														
								</div>
												
												<div class="cls"></div>

								 <div class="col-md-6">
                                                <div class="input-label"><label >Employee #</label></div>

                                                <div class="input-feild">
                                                <input type="text" name="empNo" id="empNo" value="<?php echo $empNo ?>"  >
                                                </div>

                                                <div class="input-label"><label > Name</label></div>	
                                                <div class="input-feild">
                                                        <input  type="text"  name="empFName" id="empFName" value="<?php echo $empFName; ?>">
                                                        <input  type="text"  name="empMName" id="empMName" value="<?php echo $empMName; ?>">
                                                        <input  type="text"  name="empLName" id="empLName" value="<?php echo $empLName; ?>">      
                                                </div>

                                                <div class="input-label"><label > Father/Guardian Name</label></div>  
                                                <div class="input-feild">
                                                        <input  type="text" name="empGrdName" id="empGrdName" value="<?php echo $empGrdName ?>">        
                                                </div>
                                                
                                                <div class="input-label"><label >CNIC Number</label></div>	
                                                <div class="input-feild">
                                                        <input  type="text" name="cnicNo" id="cnicNo" value="<?php echo $cnicNo; ?>">
                                                </div>                                    
                                                <div class="input-label"><label > Gender</label></div>	

                                                <div class="input-feild">
                                                        <select name="empGender" id="empGender"> 
                                                                <option value=""><?php echo $empGender ?></option>
                                                                <option >Male</option>
                                                                <option >Female</option>
                                                                <option >Not Specified</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label > Marital Status</label></div>  

                                                <div class="input-feild">
                                                        <select name="empMaritalStatus" id="empMaritalStatus">
                                                                <option value="<?php echo $empMaritalStatus ?>"><?php echo $empMaritalStatus ?></option>
                                                                <option >Single</option>
                                                                <option >Married</option>
                                                                <option >Not Married</option>
                                                                <option>Widow</option>
                                                        </select>
                                                </div>

                                                <div class="input-label"><label > Date of Birth</label></div>
                                                <div class="input-feild">
                                                        <input type="date" name="empDOB" value="<?php echo $empDOB ?>" id="empDOB" data-date-inline-picker="false" data-date-open-on-focus="true" />
                                                </div>                                                                              
                 </div>

								<div class="col-md-6">
                                                <div class="input-label"><label > Choose Profile Image</label></div>
                                                <div class="input-feild">
                                                        <img src="images/user.png" style="width: 185px" id="blah">
                                                        <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">

                                                                                                              
                                                </div>

												<div class="cls"></div>
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
                                                <input  type="text" name="empCell" id="empCell" value="<?php echo $empCell ?>">
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
                                                        <input type="date" name="empDOJ" id="empDOJ" value="<?php echo $empDOJ ?>" data-date-inline-picker="false" data-date-open-on-focus="true" />
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
                        <button type="button" disabled id="eduHist" onclick="eduHistory();">Add New</button>
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
                        <button type="button" id="empHist" disabled onclick="empHistory();">Add New</button>
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
                        <button type="button" id="famHist" disabled onclick="famHistory();">Add New</button>
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
                            <button type="button" id="eduProf" disabled onclick="eduProfDocs();">Add Document</button>
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
      <button type="button" disabled>Apply Leave</button>
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
   url:"fetchDocuments_V.php",
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

   url:"fetchEmpHistory_V.php?empNo=" + empNo,
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

   url:"fetchFamilyHistory_V.php?empNo=" + empNo,
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
   url:"fetchEduHistory_V.php?empNo=" + empNo,
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

</body>
</html>