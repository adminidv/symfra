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
	<title>Customer Campaign</title>
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
                                               			

                                                        
                                                <div class="input-label"><label >Compaign No.</label></div>
                                                <div class="input-feild">
                                                          <input disabled type="number" placeholder="00">
                                                </div>
                                               
                                           
                                                <div class="input-label"><label >Campaign Type </label></div>	
                                                <div class="input-feild">
                                                        <select   name="empGender" id="empGender">
                                                                <option >User</option>
                                                                <option ></option>
                                                                <option ></option>
                                                                <option ></option>
                                                                <option ></option>

                                                        </select>
                                                        
                                                </div>
                                                    
                                                <div class="input-label"><label >Owner  </label></div>  
                                                <div class="input-feild">
                                                        <input  type="text"   placeholder="">
                                                </div>

                                                <div class="input-label"><label >Start Date  </label></div>  
                                                <div class="input-feild">
                                                        <input  type="text"  disabled placeholder="dd-mm-yyyy">
                                                </div>    
                                                      
                                                 <div class="input-label"><label >Start Date  </label></div>  
                                                 <div class="input-feild">
                                                       <textarea></textarea>
                                                 </div> 
								</div>

								<div class="col-md-6">
								 				<div class="input-feild input-feild-checkboxs">
                                                      <input type="checkbox" name="vehicle" value="Bike"> <label>Customer</label><br>
                                                      <input type="checkbox" name="vehicle" value="Bike"> <label>Vendor</label>
                                                </div>
                                                   
                                                    <div class="cls"></div>
                                                    <hr>

                                                <div class="input-label"><label >Campaign Name</label></div>
                                                <div class="input-feild">
                                                          <input disabled type="text">
                                                </div>

                                                <div class="input-label"><label >Target Group </label></div>
                                                <div class="input-feild">
                                                          <input disabled type="text">
                                                </div>
                                                      
                                                <div class="input-label"><label >Status</label></div>
                                                <div class="input-feild ">
                                                        <select name="empGender" id="empGender">
                                                                <option >Open </option>
                                                                <option >Finished </option>
                                                                <option >Cancelled</option>
                                                        </select>
                                                </div> 
                                               
                                              	<div class="input-label"><label >End Date  </label></div>  
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
                                        <li class="active"><a data-toggle="tab" href="#general">Target BPs</a></li>
                                        <li><a data-toggle="tab" href="#lnkddoc">Items</a></li>
                                        <li><a data-toggle="tab" href="#accounting">Partners</a></li>
                                        <li><a data-toggle="tab" href="#remarks">Attachments</a></li>
                                      </ul>
                </div>

                                      <div class="tab-content">


                                        <div id="general" class="tab-pane fade in active">
                                     
									        <table  id="Campaigntable" class="display nowrap no-footer" style="width:100%">
									                          
									                         <thead>
									                                    <tr>
									                                    	<th>#</th>
									                                    <th>Internal </th>
									                                    <th>Bp Code </th>
									                                    <th>Bp Name</th>
									                                    <th>Create Activity</th>
									                                    <th>Assign To</th>
									                                    <th>Name </th>
									                                    <th>BP Group </th>
									                                    <th>Industry  </th>
									                                    <th>Status  </th>
									                                    <th>Contact  </th>
									                                    <th>First Name  </th>
									                                    <th>Middle Name  </th>
									                                    <th>Last Name  </th>
									                                    <th>Title  </th>
									                                    <th>Position  </th>
									                                    <th>E-mail  </th>
									                                    <th>Telephone</th>
									                                    <th>Address</th>
									                                    <th>Address ID</th>
									                                    <th>Response</th>
									                                    <th>Response Type</th>
									                                    <th>Federal Tax ID</th>
									                                    <th>Street No.</th>
									                                    <th>Document Type</th>
									                                    <th>Show Bp Type</th>
									                                    <th>Document Number</th>













									                                     </tr>
									                          </thead>
									                          <tbody>           
									                                     <tr>
									                                     	<td>1</td>		
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox" checked name=""></td>
									                                       <td>User</td>
									                                       <td>Manager</td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>										
									                                   	 </tr>


									                                   	 <tr>
									                                     	<td>1</td>		
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox" checked name=""></td>
									                                       <td>User</td>
									                                       <td>Manager</td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>										
									                                   	 </tr>

									                                   	 <tr>
									                                     	<td>1</td>		
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox" checked name=""></td>
									                                       <td>User</td>
									                                       <td>Manager</td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td></td>
									                                       <td><input type="checkbox"  name=""></td>
									                                       <td></td>										
									                                   	 </tr>
									                          </tbody>
									        </table>

                                        </div>

                                        <div id="lnkddoc" class="tab-pane fade">
        
										        <table  id="Campaigntable1" class="display nowrap no-footer" style="width:100%">
										                          
										                         <thead>
										                                    <tr>
										                                    	<th>#</th>
											                                    <th>Item No. </th>
											                                    <th>Item Description </th>
											                                    <th>Item Type</th>
											                                    <th>Item Group</th>				                                    
										                                    </tr>
										                          </thead>
										                          <tbody>           
										                                     <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>

										                                   	 <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>
										                                   	 <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>





										                          </tbody>
										        </table>                        
                                        </div>

                                        <div id="accounting" class="tab-pane fade">
                                        		<table  id="Campaigntable2" class="display nowrap no-footer" style="width:100%">
										                          
										                         <thead>
										                                    <tr>
										                                    	<th>#</th>
											                                    <th>Item No. </th>
											                                    <th>Item Description </th>
											                                    <th>Item Type</th>
											                                    <th>Item Group</th>				                                    
										                                    </tr>
										                          </thead>
										                          <tbody>           
										                                     <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>

										                                   	 <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>
										                                   	 <tr>
										                                     	<td>1</td>		
										                                       <td><input type="checkbox"  name=""></td>
										                                       <td></td>
										                                       <td></td>
										                                       <td><input type="checkbox" checked name=""></td>			
										                                   	 </tr>





										                          </tbody>
										                        </table> 
                                        </div>

                                        <div id="remarks" class="tab-pane fade">

                                            <div class="col-md-12 ">
                                               <div class="input-feild">
                                                  <textarea></textarea>
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
    $('#Campaigntable1').DataTable();
     $('#Campaigntable2').DataTable();

} );

</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>