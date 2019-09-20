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
	<title>Customer Sales Quotation</title>
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
      		<form action="" method="POST" enctype="multipart/form-data">

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
                                                           			

                                                                    
                                                            <div class="input-label"><label >Customer</label></div>
                                                            <div class="input-feild">
                                                                      <input  type="text" placeholder="">
                                                            </div>
                                                           
                                                       
                                                            <div class="input-label"><label >Name</label></div>	
                                                            <div class="input-feild">
                                                                   <input disabled  type="text" placeholder="">
                                                            </div>
                                                                
                                                            <div class="input-label"><label >Contact Person </label></div>  
                                                            <div class="input-feild">
                                                                     <select name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                    </select>
                                                            </div>

                                                            <div class="input-label"><label >Contact Ref. No.  </label></div>  
                                                            <div class="input-feild">
                                                                    <input  type="text"   placeholder="">
                                                            </div>    
                                                                  
                                                            
                                                            <div class="input-feild">
                                                                     <select class="mini_select_field" name="empGender" id="empGender">
                                                                            <option > Local Currency </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                    </select>
                                                            </div>                                                  
            								</div>

            								<div class="col-md-6">
            								 			  

                                                            <div class="input-label"><label >No. Name</label></div>
                                                            <div class="input-feild">
                                                                     <select class="mini_select_field" name="empGender" id="empGender">
                                                                            <option >Primary </option>
                                                                            <option >Manual </option>
                                                                    </select>
                                                                      <input class="mini_input_field" disabled type="text">

                                                            </div>
                                                                  
                                                            <div class="input-label"><label >Status</label></div>
                                                            <div class="input-feild ">
                                                                    <select name="empGender" id="empGender">
                                                                            <option >Open </option>
                                                                            <option >Finished </option>
                                                                            <option >Cancelled</option>
                                                                    </select>
                                                            </div> 

                                                            <div class="input-label"><label >Posting Date  </label></div>  
                                                            <div class="input-feild">
                                                                    <input  type="text"  disabled placeholder="dd-mm-yyyy">
                                                            </div>
                                                           
                                                          	<div class="input-label"><label >Valid Until</label></div>  
                                                            <div class="input-feild">
                                                                    <input  type="text"  disabled placeholder="dd-mm-yyyy">
                                                            </div>

                                                            <div class="input-label"><label >Document Date</label></div>  
                                                            <div class="input-feild">
                                                                    <input  type="text"  disabled placeholder="dd-mm-yyyy">
                                                            </div>                                                          
                            				</div>
            				</div>			
            										<div class="cls"></div>
            										<hr>

            				<div class="contct_usr_info widget_iner_box">
	                            <div class="col-md-12"> 
	                                                  <ul class="nav nav-tabs">
	                                                    <li class="active"><a data-toggle="tab" href="#content">Contents</a></li>
	                                                    <li><a data-toggle="tab" href="#logistics">Logistics</a></li>
	                                                    <li><a data-toggle="tab" href="#accounting">Accounting</a></li>
	                                                     <!--    <li><a data-toggle="tab" href="#partners">Partners</a></li> -->
	                                                  </ul>
	                            </div>

                                            <div class="tab-content">



                                                    <div id="content" class="tab-pane fade in active">
                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Item/Service Type</label></div>
                                                            <div class="input-feild">
                                                                 <select  name="empGender" id="empGender">
                                                                            <option >Item</option>
                                                                            <option >Service</option>

                                                                 </select>
                                                            </div>
                                                            <div class="input-feild">
                                                                 <select class="mini_select_field"  name="empGender" id="empGender">
                                                                            <option >No Summary</option>
                                                                            <option >By Items</option>
                                                                 </select>
                                                            </div>
                                                        </div>
                                                        <div class="cls"></div>
                                                        <hr>
                                                      

                                						<table  id="Campaigntable1" class="display nowrap no-footer" style="width:100%">
                                                                
                                                               <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Item No. </th>
                                                                            <th>Bp Catalog No. </th>
                                                                            <th>Quantity</th>
                                                                            <th>Unit Price</th>
                                                                            <th>Total (LC)</th>
                                                                            <th>Whse</th>

                                                                          </tr>
                                                                </thead>
                                                                <tbody>           
                                                                           <tr>
                                                                            <td></td>
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 

                                                                           </tr>
                                                                             <tr>
                                                                            <td></td>
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                             
                                                                           </tr>
                                                                             <tr>
                                                                            <td></td>
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                            <td></td> 
                                                                             
                                                                           </tr>

                                                                </tbody>
                                                        </table> 

                                                        	<div class="cls"></div>
                                                       		 <hr>
                                                       	                  
                                                    </div>

                                                    <div id="logistics" class="tab-pane fade">
                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Ship To</label></div>
                                                            <div class="input-feild">
                                                                <select class="mini_select_field"  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                <textarea class="mini_input_field"></textarea>
                                                            </div>
                                                                  
                                                            <div class="input-label"><label >Bill To</label></div>
                                                            <div class="input-feild">
                                                                <select class="mini_select_field"  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                <textarea class="mini_input_field"></textarea>
                                                            </div>

                                                            <div class="input-label"><label >Shipping Type </label></div>
                                                            <div class="input-feild">
                                                                <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                        
                                                           <div class="input-feild input-feild-checkboxs">
                                                                  <input type="checkbox" name="vehicle" value="Bike"> <label>Proc, Doc, For Non Drop-Ship Whse Lines</label><br>
                                                                  <input type="checkbox" name="vehicle" value="Bike"> <label>Proc, Doc, For Drop-Ship Whse Lines</label><br>
                                                            </div> 
                                                            <div class="cls"></div>
                                                            <hr>

                                                            <div class="input-label"><label >BP Channel Name </label></div>
                                                            <div class="input-feild ">
                                                                   <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                   </select>
                                                            </div> 

                                                            <div class="input-label"><label >BP Channel Contact  </label></div>  
                                                            <div class="input-feild">
                                                                    <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                    </select>
                                                            </div>  
                                                        </div>		                   
                                                    </div>

                                                    <div id="accounting" class="tab-pane fade">
                                                    	
                                                    	<div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Journal Remark</label></div>
                                                            <div class="input-feild">
                                                                <input type="textarea" name="">
                                                            </div>       

                                                            <div class="input-label"><label >Payment Terms </label></div>
                                                            <div class="input-feild">
                                                                <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                
                                                            </div>


                                                            <div class="input-label"><label >Payment Method </label></div>
                                                            <div class="input-feild">
                                                                <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                
                                                            </div>

                                                            <div class="input-label"><label >Central Bank Ind. </label></div>
                                                            <div class="input-feild">
                                                                <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="input-label input-label-togle">
                                                            	<ul><li>  <a class="" data-toggle="tab" href="#acntinggenral">Manually Recalculate </a></li></ul>
                                                            </div>
                                                            	
                                                            <div id="acntinggenral" class="fade">
			                                                   <div class="input-label">
			                                                   	<label >Due Date</label>
			                                                   </div> 
			                                                    <div class="input-feild">
			                                                            <select class="mini_select_field"  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                		</select>
                                                                		<div class="input-feild mini_input_field">
			                                                           		 <input class="mini_input_field" type="text"   placeholder="">
			                                                           		 <input class="mini_input_field" type="text"   placeholder="">
			                                                        	</div>
			                                                    </div> 
			                                                    <div class="input-label"><label >Cash Discount Date Offset:</label></div>
	                                                            <div class="input-feild">
	                                                                <input type="text" disabled name="">
	                                                            </div>

			                                                    <div class="input-feild input-feild-checkboxs">
			                                                          <input type="checkbox" name="vehicle" value="Bike"> <label>Use Shipped Goods Account</label>
			                                                      </div>
			                                                </div>


			                                                

                                                        </div>

                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >BP Project </label></div>
                                                            <div class="input-feild ">
                                                                  <input type="text" name="">
                                                            </div>
                                                          

                                                            <div class="input-label"><label >Indicator </label></div>
                                                            <div class="input-feild ">
                                                                   <select  name="empGender" id="empGender">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                   </select>
                                                            </div> 

                                                            <div class="input-label"><label >Federal Tax ID  </label></div>  
                                                            <div class="input-feild">
                                                                    <input type="text" disabled name="">
                                                            </div>

                                                            <div class="input-label"><label >Referenced Doc   </label></div>  
                                                            <div class="input-feild">
                                                                    <button>...</button>
                                                            </div>  
                                                        </div>

                                                    </div>
                                            </div>

                                                    <div id="partners" class="tab-pane fade">
                                                       
                                                    </div>    
                 		   	</div>  
                 		   							<div class="cls"></div>
            										<hr>

                 		   <div class="widget_iner_box">
                 		   		 <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Sales Employee</label></div>
                                                            <div class="input-feild">
                                                                 <select  name="empGender" id="empGender">
                                                                            <option >Item</option>
                                                                            <option >Service</option>

                                                                 </select>
                                                            </div>
                                                            
                                                            <div class="input-label"><label >Owner</label></div>
                                                            <div class="input-feild">
                                                                 <input type="text" name="">
                                                            </div>

                                                            <div class="input-label"><label >Sales Employee</label></div>
                                                            <div class="input-feild">
                                                                 <select  name="empGender" id="empGender">
                                                                            <option >Item</option>
                                                                            <option >Service</option>

                                                                 </select>
                                                            </div>

                                                            <div class="input-label"><label >Remarks</label></div>
                                                            <div class="input-feild">
                                                            	<textarea></textarea>
                                                            </div>                                                         
                                                        </div>	

                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Total Before Discount</label></div>
                                                            <div class="input-feild">
                                                                <input type="text" disabled name="">
                                                            </div>
                                                            
                                                            <div class="input-label"><label >Discount %</label></div>
                                                            <div class="input-feild">
                                                                 <input class="mini_input_field" type="text" name="">
                                                                 <input class="mini_input_field" type="text" name="">
                                                            </div>

                                                            <div class="input-label"><label >Tax</label></div>
                                                            <div class="input-feild">
                                                                 <input type="text" name="">
                                                            </div>

                                                            <div class="input-label"><label >Total</label></div>
                                                            <div class="input-feild">
                                                            	<input type="text" name="">
                                                            </div>                                                         
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
<script>

  $(document).ready(function() {
    $('#Campaigntable').DataTable({
       "scrollX": true
   });
    $('#Campaigntable1').DataTable({
       "scrollX": true
   });
     $('#Campaigntable2').DataTable({
       "scrollX": true
   });

} );

</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>