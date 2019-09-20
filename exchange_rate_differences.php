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
	<title>Exchange Rate Differences - Selection Criteria</title>
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
          <a href="Usermodules.php" class="btn btn-info">Human Resource</a>
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

                                                      <div class="input-feild input-feild-checkboxs">
                                                        <input checked="" type="checkbox" name="vehicle" value="Bike"> <label>Bussiness Partner </label><br>
                                                        <input  type="checkbox" name="vehicle" value="Bike"> <label>Include Inactive Business Partners</label><br>
                                                        <input checked="" type="checkbox" name="vehicle" value="Bike"> <label>G/L Accounts</label>
                                                      </div>

                                                        <div class="cls"></div>
                                                         <hr>


                                                      <div class="input-label "><label >Code </label></div>
                                                      <div class="input-feild">
                                                        <input class="mini_input_field" type="text" name="" placeholder="From">
                                                        <input class="mini_input_field" type="text" name="" placeholder="To">
                                                      </div>  

                                                       <div class="input-label "><label >Customer Group </label></div>
                                                        <div class="input-feild">
                                                              <select>
                                                                    <option>All</option>
                                                              </select>
                                                        </div> 

                                                        <div class="input-label "><label >Vendor Group </label></div>
                                                        <div class="input-feild">
                                                              <select>
                                                                    <option>All</option>
                                                              </select>
                                                        </div> 

                                                        <div class="input-feild">
                                                            <button>Properties</button>
                                                            <input class="mini_input_field" type="text" disabled="" name="">
                                                        </div>

                                                                                                                  
                       </div>

      								<div class="col-md-6">

                                                      <div class="input-label"><label >Show Level</label></div> 
                                                      <div class="input-feild">
                                                            <select class="mini_select_field">
                                                              <option>10</option>
                                                              <option>9</option>
                                                              <option>8</option>
                                                              <option>7</option>
                                                              <option>6</option>
                                                              <option>5</option>
                                                              <option>4</option>
                                                              <option>3</option>
                                                              <option>2</option>
                                                              <option>1</option>

                                                            </select>
                                                      </div>        

                                                      <table  id="exchngerate_tble" class="display nowrap no-footer" style="width:100%">
                                              
                                                           <thead>
                                                                      <tr>
                                                                        <th>#</th>
                                                                        <th>X</th>
                                                                        <th>Account</th>
                                                                      </tr>
                                                            </thead>
                                                            <tbody>           
                                                                       <tr>
                                                                        <td>1</td>    
                                                                         <td>x</td>
                                                                         <td>Assets</td>      
                                                                       </tr>

                                                                      
                                                            </tbody>
                                                      </table> 
                      </div>  
      				</div>			
      										<div class="cls"></div>
      										<hr>

               <div class=" widget_iner_box">
                    <div class="col-md-6">
                           <div class="input-feild input-feild-checkboxs">
                             <input type="checkbox" name="vehicle" value="Bike"> <label>Enable  Opening Row Details  </label><br>
                             <input checked="" type="checkbox" name="vehicle" value="Bike"> <label>Save Unselected Rows/Transactions When Choosing Add</label>
                               
                            </div>

                            <div class="input-label " style="width: 40%;"><label >Exclude Gains with Due Date After </label></div>
                            <div class="input-feild" style="width: 60%;">
                                 <input type="text" name="">
                            </div> 



                            <div class="cls"></div>
                            <hr>

                            <div class="input-label "><label >Due Date </label></div>
                            <div class="input-feild">
                              <input class="mini_input_field" type="text" name="" placeholder="From">
                              <input class="mini_input_field" type="text" name="" placeholder="To">
                            </div> 


                            <div class="input-label "><label >Execution Date </label></div>
                            <div class="input-feild">
                              <input class="mini_input_field" type="text" name="">  
                            </div>

                            <div class="input-feild input-feild-checkboxs">
                             <input type="checkbox" name="vehicle" value="Bike"> <label>Consider Recon. Date  </label>
                            </div>


                              <div class="input-label "><label >Currency  </label></div>
                              <div class="input-feild">
                                    <select class="mini_select_field">
                                          <option>##</option>
                                    </select>
                                    <input class="mini_input_field" disabled="" type="text" name="" placeholder="All Currencies">
                              </div>

                              
                    </div>        
               </div>
                          <div class="cls"></div>
                          <hr>

               <div class=" widget_iner_box">
                    <div class="col-md-6">
                            <div class="input-label "><label >Exch. Rate Gain Acct(A/R) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 

                            <div class="input-label "><label >Exch. Rate Gain Acct(A/P) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 

                            <div class="input-label "><label >Exch. Rate Gain Acct(G/L) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 
                     
                    </div> 

                    <div class="col-md-6">
                            <div class="input-label "><label >Exch. Rate Loss Acct(A/R) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 

                            <div class="input-label "><label >Exch. Rate Loss Acct(A/P) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 

                            <div class="input-label "><label >Exch. Rate Loss Acct(G/L) </label></div>
                            <div class="input-feild">
                              <input class="" type="text" name="" placeholder="">
                            </div> 

                            <div class="cls"></div>
                            <hr>

                             <div class="input-label "><label >Data Side</label></div>
                             <div class="input-feild">
                              <select class="mini_select_field">
                                <option>Both Sides</option>
                                <option>Gain Sides</option>
                                <option>Loss Sides</option>

                              </select>
                            </div> 
                     
                    </div>       
               </div>           
          </form>

  </div>
				
</div>






<script>
$(document).ready(function() {
    $('#exchngerate_tble').DataTable( {
        "scrollX": true,
        "paging":   false,
        "info":     false,
        "lengthChange": false
    } );
} );
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