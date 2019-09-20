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
	<title>Add_Customer</title>
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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">Human Resource</a>
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

<div class=" add_customer_sec main_widget_box">
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
                                                <div class="input-label"><label >Code </label></div>
                                                <div class="input-feild">
                                                <input class="mini_input_field" type="text" disabled name="empNo">
                                                <input class="mini_input_field" type="text"  name="empNo">
                                                </div>

                                                <div class="input-label"><label > Name</label></div>	
                                                <div class="input-feild">
                                                        <input  type="text" name="empName" id="empName" placeholder="Enter Your Name">
                                                        <input  type="text" name="empGrdName" id="empGrdName" placeholder="Enter Your Foreign Name">
                                                </div>
                                                
                                                <div class="input-label"><label >Group </label></div>	
                                                <div class="input-feild">
                                                        <select name="empGender" id="empGender">
                                                                <option value=""></option>
                                                                <option ></option>
                                                                <option ></option>
                                                                <option ></option>
                                                                <option > </option>

                                                        </select>
                                                </div>               

                                                <div class="input-label"><label > Currency</label></div>	

                                                <div class="input-feild">
                                                        <select name="empGender" id="empGender">
                                                                <option value="">Select</option>
                                                                <option >Canadian Dollar</option>
                                                                <option >Euro</option>
                                                                <option >US Dollar</option>
                                                                <option >All Currencies</option>

                                                        </select>
                                                </div>


                                                <div class="input-label"><label > Federal Tax ID</label></div> 
                                                <div class="input-feild">
                                                        <input  type="text"  placeholder="">
                                                </div>                                                                                       
                 </div>

								<div class="col-md-6">
                                             
                                                <div class="input-feild">
                                                        <select class="mini_input_field" name="empMaritalStatus" id="empMaritalStatus">
                                                                <option value="">Bp Currency</option>
                                                                <option >Local Currency</option>
                                                                <option >System Currency</option>
                                                                <option >Bp Currency </option>
                                                        </select>
                                                </div>     
                                                <div class="cls"></div>
                                                <hr>

                                                <div class="input-label"><label >Orders</label></div>
                                                <div class="input-feild">
                                                        <input type="text" name="empChildren" id="empChildren"/>
                                                </div>

                                                <div class="input-label"><label > Opportunities</label></div>
                                                <div class="input-feild">
                                                        <input type="text" disabled name="empChildren" id="empChildren"/>
                                                </div>   
                                                <div class="input-label"><label > Days to Pay</label></div>
                                                <div class="input-feild">
                                                        <input type="number" placeholder="0.00">
                                                </div>                                                              
                </div>

												<div class="cls"></div>
				</div>			
										<div class="cls"></div>
										<hr>

				<div class="contct_usr_info widget_iner_box">
                <div class="col-md-12"> 
                                      <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#general">General</a></li>
                                        <li><a data-toggle="tab" href="#payment">Payment Terms</a></li>
                                        <li><a data-toggle="tab" href="#accounting">Accounting</a></li>
                                        <li><a data-toggle="tab" href="#remarks">Remarks</a></li>
                                      </ul>
                </div>

                                      <div class="tab-content">


                                        <div id="general" class="tab-pane fade in active">
                                            <div class="col-md-6 ">
                                              <div class="input-label"><label >Contact </label></div> 
                                              <div class="input-feild">
                                                      <input  type="number" placeholder="Tel 1 Number">
                                                      <input  type="number" placeholder="Tel 2 Number">
                                                      <input  type="number" placeholder="Mobile Number">
                                                      <input  type="number"  placeholder="Fax Number">
                                              </div> 

                                              <div class="cls"></div>
                                              <hr>

                                              <div class="input-label"><label >Email </label></div> 
                                              <div class="input-feild">
                                                      <input  type="text"  placeholder="Enter Email Address">
                                              </div> 
                                              <div class="input-label"><label >Web Site</label></div> 
                                              <div class="input-feild">
                                                      <input  type="text"  placeholder="">
                                              </div>
                                              <div class="cls"></div>
                                              <hr>
                                              <div class="input-label"><label >Alias Name</label></div> 
                                              <div class="input-feild">
                                                      <input  type="text"  placeholder="">
                                              </div>
                                               <div class="input-feild input-feild-checkboxs">
                                                  <input type="checkbox" name="vehicle" value="Bike"> <label>Active</label><br>
                                                  <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Inactive</label><br>
                                                   <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Advanced</label><br>
                                              </div>
                                              
                                            

                                            </div>  

                                            <div class="col-md-6">
                                              <div class="input-label"><label >Shiping Type</label></div>  
                                              <div class="input-feild">
                                                      <select name="empGender" id="empGender">
                                                              <option value="">Select</option>
                                                              <option > </option>
                                                              <option ></option>
                                                              <option > </option>
                                                              <option > </option>

                                                      </select>
                                              </div>
                                              <div class="input-label"><label >Cotact Person </label></div> 
                                              <div class="input-feild">
                                                      <input  type="text"  placeholder="">
                                              </div>                

                                              <div class="input-label"><label >ID no.2 </label></div> 
                                              <div class="input-feild">
                                                <input  type="number"  placeholder="">
                                              </div>

                                              <div class="input-label"><label >Remarks </label></div> 
                                              <div class="input-feild">
                                                <textarea></textarea>
                                              </div>
                                              <div class="cls"></div>
                                              <hr>
                                              <div class="input-label"><label >Logistics Note </label></div> 
                                              <div class="input-feild">
                                                <textarea></textarea>
                                              </div>
                                              <div class="input-label"><label >GLN </label></div> 
                                              <div class="input-feild">
                                                 <input  type="number"  placeholder="">
                                              </div>

                                               <div class="input-feild input-feild-checkboxs">
                                                  <input type="checkbox" name="vehicle" value="Bike"> <label>Block Sending Marketing Content</label><br>
                                               </div>


                                            </div> 
                                        </div>

                                        <div id="payment" class="tab-pane fade">
                                                  <div class="col-md-6">
                                                      <div class="input-label"><label >Payment Terms</label></div> 
                                                      <div class="input-feild">
                                                               <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option ></option>
                                                                      <option ></option>
                                                               </select>
                                                      </div> 

                                                      <div class="input-label"><label >Euler Approval  </label></div> 
                                                      <div class="input-feild">
                                                              <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option >Yes</option>
                                                                      <option >No</option>
                                                             </select>
                                                      </div>
                                                          <div class="cls"></div>
                                                          <hr>
                                                      <div class="input-label"><label >Price List </label></div> 
                                                      <div class="input-feild">
                                                              <select name="empGender" id="empGender">
                                                                      <option value="">Select</option>
                                                                      <option >Price List 1</option>
                                                                      <option >Last Purchase Price</option>
                                                                      <option >Last Evaluated Price</option>

                                                             </select>
                                                      </div>

                                                      <div class="input-label"><label >Total Discount % </label></div> 
                                                      <div class="input-feild">
                                                              <input  type="number"  placeholder="Enter Number">
                                                      </div> 

                                                      <div class="input-label"><label >Credit Limit </label></div> 
                                                      <div class="input-feild">
                                                              <input  type="text"  placeholder="0.00">
                                                      </div> 

                                                      <div class="input-label"><label >Commitment Limit</label></div> 
                                                      <div class="input-feild">
                                                              <input  type="text"  placeholder="0.00">
                                                      </div> 

                                                      <div class="input-label"><label >Credit App on Fire</label></div> 
                                                      <div class="input-feild">
                                                            <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option >No</option>
                                                                      <option >Yes</option>
                                                             </select>
                                                      </div>

                                                        
                                                      <div class="input-label"><label >Effective Discount </label></div> 
                                                      <div class="input-feild">
                                                             <select name="empGender" id="empGender">
                                                                      <option value="">Lowest</option>
                                                                      <option >Highest</option>
                                                                      <option >Average</option>
                                                                      <option >Total</option>
                                                                      <option >Discount Multiplies</option>


                                                             </select>
                                                      </div>

                                                      <div class="input-label"><label >Effective Price</label></div> 
                                                      <div class="input-feild">
                                                              <select name="empGender" id="empGender">
                                                                      <option value="">Default Priority</option>
                                                                      <option >Lowest Price </option>
                                                                      <option >Highest Price</option>
                                                             </select>
                                                      </div>
                                                      <div class="cls"></div>
                                                        <hr>
                                                      <ul class="nav nav-tabs iner_col_tabs ">
                                                        <li class="active"> <a data-toggle="tab" href="#prtner_Bnk">Business Partner Bank</a></li>
                                                        <li><a data-toggle="tab" href="#house_Bnk">House Bank</a></li>
                                                      </ul>
                                                         
                                                  </div>  

                                                  <div class="col-md-6">
                                                      <div class="input-label"><label >Credit Card Type</label></div>  
                                                      <div class="input-feild">
                                                              <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option >Define Type</option>
                                                                      <option ></option>
                                                                      <option > </option>
                                                                      <option > </option>

                                                              </select>
                                                      </div>
                                                      <div class="input-label"><label >Credit Card No. </label></div> 
                                                      <div class="input-feild">
                                                          <input  type="number"  placeholder="">
                                                      </div>                

                                                      <div class="input-label"><label >Expiration Date</label></div> 
                                                      <div class="input-feild">
                                                        <input  type="number"  placeholder="">
                                                      </div>

                                                      <div class="input-label"><label >ID Number </label></div> 
                                                      <div class="input-feild">
                                                        <input  type="number"  placeholder="">
                                                      </div>
                                                      <div class="input-label"><label >Average Delay </label></div> 
                                                      <div class="input-feild">
                                                        <input  type="number"  placeholder="">
                                                      </div>

                                                      <div class="input-label"><label >Priority </label></div> 
                                                      <div class="input-feild">
                                                         <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option ></option>
                                                                      <option ></option>
                                                                      <option > </option>
                                                                      <option > </option>

                                                         </select>
                                                      </div>

                                                      <div class="input-label"><label >Default IBAN </label></div> 
                                                      <div class="input-feild">
                                                        <input  type="number"  placeholder="">
                                                      </div>

                                                      <div class="input-label"><label >Holidays </label></div> 
                                                      <div class="input-feild">
                                                        <select name="empGender" id="empGender">
                                                                      <option value=""></option>
                                                                      <option > </option>
                                                                      <option ></option>
                                                                      <option > </option>
                                                                      <option > </option>

                                                         </select>
                                                      </div>

                                                        <div class="cls"></div>
                                                        <hr>
                                                      <div class="input-feild input-feild-checkboxs">
                                                          <input type="checkbox" name="vehicle" value="Bike"> <label>Allow Partial Delivery Sales Order</label><br>
                                                          <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Allow Partial Delivery per Row</label><br>
                                                           <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Don't Apply Discount Groups</label><br>
                                                           <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Endorsable Checks from This BP</label><br>
                                                           <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>This BP Accepts Endorsed Checks</label><br>

                                                      </div>
                                                  </div>

                                                    <div class="cls"></div>
                                                    <!-- <hr> -->
                                                    

                                                      <div class="tab-content">
                                                        <div id="prtner_Bnk" class="tab-pane fade in active">
                                                          <div class="col-md-6">
                                                              <div class="input-label"><label >Bank Country</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>
                                                              
                                                              <div class="input-label"><label >Bank Name</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >Bank Code</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >Bank BIC</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >Bank Account </label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>                                               
                                                          </div> 

                                                          <div class="col-md-6">
                                                             
                                                              <div class="input-label"><label >Branch</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >Ctrl Int. ID</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >IBAN</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >Mandate</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div> 
                                                              <div class="input-label"><label >Date of Signature</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>
                                                          </div> 
                                                        </div>  
                                                        <div id="house_Bnk" class="tab-pane fade">
                                                          <div class="col-md-6">
                                                              <div class="input-label"><label > Country</label></div>  
                                                              <div class="input-feild">
                                                                      <select name="empGender" id="empGender">
                                                                                <option value=""></option>
                                                                                <option > </option>
                                                                                <option ></option>
                                                                      </select>
                                                              </div>
                                                              
                                                              <div class="input-label"><label >Bank </label></div>  
                                                              <div class="input-feild">
                                                                       <select name="empGender" id="empGender">
                                                                                <option value=""></option>
                                                                                <option > </option>
                                                                                <option ></option>
                                                                       </select>
                                                              </div>

                                                              <div class="input-label"><label >Account</label></div>  
                                                              <div class="input-feild">
                                                                       <select name="empGender" id="empGender">
                                                                                <option value=""></option>
                                                                                <option > </option>
                                                                                <option ></option>
                                                                       </select>
                                                              </div>
                                                              <div class="input-label"><label >Branch</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>

                                                              <div class="input-label"><label >IBAN</label></div>  
                                                              <div class="input-feild">
                                                                      <select name="empGender" id="empGender">
                                                                                <option value=""></option>
                                                                                <option > </option>
                                                                                <option ></option>
                                                                      </select>
                                                              </div>

                                                              <div class="input-label"><label >BIC </label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>  
                                                              <div class="input-label"><label >Control No. </label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="number" disabled  placeholder="">
                                                              </div>                                               
                                                          </div> 
                                                        <!--     <div class="cls"></div> -->
                                                              <hr>
                                                          <div class="col-md-6">
                                                             <div class="input-label"><label >Allocation Code</label></div>  
                                                              <div class="input-feild">
                                                                      <input  type="text"   placeholder="">
                                                              </div>
                                                             <div class="input-feild input-feild-checkboxs">
                                                                  <input type="checkbox" name="vehicle" value="Bike"> <label>Payment Block</label><br>
                                                                  <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Single Payment</label><br>
                                                                   <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Collection Authorization</label>
                                                              </div>
                                                              
                                                          </div> 
                                                        </div>
                                                      </div>  
                                        </div>

                                        <div id="accounting" class="tab-pane fade">

                                            <div class="col-md-6 ">
                                             <ul><li>  <a class="active" data-toggle="tab" href="#acntinggenral">General Accouting</a></li></ul>
                                                <div id="acntinggenral" class="tab-pane fade in active">
                                                   <div class="input-label"><label >Consolidating BP</label></div> 
                                                    <div class="input-feild">
                                                            <input  type="text"   placeholder="">
                                                    </div> 

                                                    <div class="input-feild input-feild-checkboxs">
                                                          <input type="checkbox" name="vehicle" value="Bike"><label>Payment Consolidation</label><br>
                                                          <input type="checkbox" name="vehicle" value="Car" checked="checked"><label>Delivery Consolidation</label>
                                                      </div>
                                                </div>                                                                                     
                                            </div>  

                                            <div class="col-md-6">
                                              
                                               <ul><li> <a class="active" data-toggle="tab" href="#acntingtax">Tax</a></li></ul>
                                                <div id="acntingtax" class="tab-pane fade ">
                                                   <div class="input-label"><label >Tax Status</label></div> 
                                                    <div class="input-feild">
                                                          <select name="empGender" id="empGender">
                                                                            <option value=""></option>
                                                                            <option >Liable</option>
                                                                            <option >Exempt</option>
                                                          </select>
                                                    </div>      
                                                    <div class="input-feild input-feild-checkboxs">
                                                          <input type="checkbox" name="vehicle" value="Bike"> <label>Deferred Tax</label>
                                                      </div>
                                                </div>        

                                            </div> 
                                        </div>

                                        <div id="remarks" class="tab-pane fade">

                                            <div class="col-md-12 ">
                                               <div class="input-feild">
                                                  <textarea></textarea>
                                               </div>
                                            </div>
		</form>
				

	</div>
<div class="col-md-12 topscrolbtn"> 
          <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
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