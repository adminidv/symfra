<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Code Generator</title>
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
          <a href="usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Master Customer</a>
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
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
        </div>

      <!-- Modal Four (Education History)-->
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

			 <label id="formSummary" style="color: red;"></label>

				<div class="Bsic_usr_info widget_iner_box">

								<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
                      <!-- Go back button code starting here -->
                      <?php include('inc_widgets/backBtn.php'); ?>
                      <!-- Go back button code ending here -->
										</div>
										<button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
										<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
										<button type="button" name="submitBtn"> <small>Cancel</small></button>				
								</div>
												
												<div class="cls"></div>

								  <div class="col-md-6">
                                          <div class="widget_child_title"><h4>G/L Account Details</h4></div>
                                                <div class="input-label "><label >Natural Account </label></div>
                                                <div class="input-feild">
                                                  <input type="text" name="">
                                                </div>

                                                <div class="input-label "><label >Account Name </label></div>
                                                <div class="input-feild">
                                                  <input type="text" name="">
                                                </div>

                                                <div class="input-label "><label >Currrency </label></div>
                                                <div class="input-feild">
                                                  <select>
                                                    <option>Canadian Dollar </option>
                                                    <option>Euro </option>
                                                    <option>US Dollar </option>
                                                    <option>All Currencies </option>


                                                  </select>
                                                </div>

                                                <div class="input-label "><label >Level </label></div>
                                                <div class="input-feild">
                                                  <select>
                                                    <option>1</option>
                                                    <option>2</option>

                                                  </select>
                                                </div>  
                  </div>

    							<div class="col-md-6">
                             <div class="widget_child_title"><h4>G/L Account Location</h4></div>
                                                  <div class="input-label "><label >Drawer </label></div>
                                                  <div class="input-feild">
                                                    <select>
                                                      <option>Assests</option>
                                                      <option>Liabilities</option>
                                                      <option>Equity</option>
                                                      <option>Revenues</option>
                                                      <option>Code Of Sales</option>
                                                      <option>Expenses</option>
                                                      <option>Financing</option>
                                                      <option>Other</option>
                                                      <option>#9</option>
                                                      <option>#10</option>



                                                    </select>
                                                  </div>

                                                  <div class="input-label "><label >Particle Article </label></div>
                                                  <div class="input-feild">
                                                    <select>
                                                      <option>Assets</option>
                                                      <option>1000000000000   -Assets</option>

                                                    </select>
                                                  </div>                                                                               
                  </div>								
				</div>			
										<div class="cls"></div>
										<hr>

        <div class="widget_iner_box"> 
            <div class="col-md-6">
              <div class="widget_child_title"><h4>G/L Account Properties</h4></div>
                    <div class="input-feild input-feild-checkboxs">
                      <input type="checkbox" name="vehicle" value="Bike"> <label>Control Account</label><br>
                      <input type="checkbox" name="vehicle" value="Bike"> <label>Cash Account</label><br>
                      <input type="checkbox" name="vehicle" value="Bike"> <label>Indexed</label><br>
                      <input type="checkbox" name="vehicle" value="Bike"> <label>Reval. (Currency)</label>
                    </div>
            </div>


            <div class="col-md-6">
                    <div class="input-feild input-feild-checkboxs">
                      <input type="checkbox" name="vehicle" value="Bike"> <label>Depart</label><br>
                    </div>
                    <div class="input-label"> <button>...</button></div>
            </div>
        </div>            


                                      
					
		</form>
				

	</div>
     
</div>










<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>