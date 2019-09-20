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
	<title>Document Journal </title>
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
          <a href="Usermodules.php" class="btn btn-info">Financials</a>
          <a href="hr_add_emp_info.php" class="btn btn-info ">Financial Reports</a>
          <a href="hr_add_emp_info.php" class="btn btn-info ">Accounting</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active ">Document Journal </a>
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

        <div class="widget_iner_box">
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
                  <div class="input-label"><label>Selection Criteria Name</label></div>
                  <div class="input-feild">
                    <input type="text" name="">
                  </div>
                </div>                        

        </div>

        <div class="cls"></div>
        <hr>

				<div class=" widget_iner_box">

		             <div class="col-md-6">
                                               
                                                <div class="input-label"><label > Code  </label></div>  
                                                <div class="input-feild">
                                                 <input class="mini_input_field" type="text" name="" placeholder="From">
                                                 <input class="mini_input_field" type="text" name="" placeholder="To">

                                                </div>

                                                <div class="cls"></div>
                                                <hr>

                                                <div class="input-label"><label >Customer Group  </label></div>  
                                                <div class="input-feild">
                                                  <select>
                                                    <option>All</option>
                                                  </select>
                                                </div>

                                               <div class="input-label"><label >Vendor Group  </label></div>  
                                                <div class="input-feild">
                                                  <select>
                                                    <option>All</option>
                                                  </select>
                                                </div>
                                                <div class="input-feild">
                                                 <input class="mini_input_field" type="submit" name="" value="Properties">
                                                 <input class="mini_input_field" disabled="" type="text" name="" placeholder="Ignore">
                                                </div>

                                              
                 </div>
                
                 <div class="col-md-6"> 
                                       
                                          <div class="input-feild input-feild-checkboxs">                                                 
                                            <input checked="" type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"> <label>Busniness Partner</label><br>
                                            <input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"> <label>Accounts</label>
                                          </div> 

                                            <div class="cls"></div>
                                            <hr>                             

                                           <table  id="budgtdistable" class="display nowrap no-footer" style="width:100%">
                                                                  
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
                                                                              <td></td> 
                                                                              <td></td>           

                                                                             </tr>
                                                                              <tr>
                                                                              <td>1</td>
                                                                              <td></td> 
                                                                              <td></td>           
                                                                                        
                                                                             </tr>
                                                                              <tr>
                                                                              <td>1</td>
                                                                              <td></td> 
                                                                              <td></td>           
                                                                                        
                                                                             </tr>
                                                                              <tr>
                                                                              <td>1</td>
                                                                              <td></td> 
                                                                              <td></td>           
                                                                                        
                                                                             </tr>
                                                                              <tr>
                                                                              <td>1</td>
                                                                              <td></td> 
                                                                              <td></td>           
                                                                                        
                                                                             </tr>
                                                                            
                                                                  </tbody>
                                           </table>                                                                   
                </div>							
				</div>			
										<div class="cls"></div>
										<hr>

        <div class="widget_iner_box">
            <div class="widget_child_title"><h4>Selection</h4></div>
            <div class="col-md-6">
                 <div class="input-label"><input type="checkbox" name=""><label >Due Date </label></div> 
                 <div class="input-feild">
                      <input class="mini_input_field" type="text" placeholder="From">
                      <input class="mini_input_field" type="text" placeholder="To">
                </div> 
                <div class="input-label"><input type="checkbox" name=""><label >Posting Date </label></div> 
                <div class="input-feild">
                      <input class="mini_input_field" type="text" placeholder="From">
                      <input class="mini_input_field" type="text" placeholder="To">
                </div> 
                <div class="input-label"><input type="checkbox" name=""><label >Document Date </label></div> 
                <div class="input-feild">
                      <input class="mini_input_field" type="text" placeholder="From">
                      <input class="mini_input_field" type="text" placeholder="To">
                      <button>Expanded</button>
                </div> 
            </div>
        </div>  
                    <div class="cls"></div>
                    <hr>

        <div class="widget_iner_box">
          <div class="col-md-6">

             <div class="widget_child_title"><h4>Output Mode</h4></div>
             
              <div class="input-feild input-feild-checkboxs">                                                 
                <input type="radio" name="radiochk" > <label>No Total</label><br>
                <input type="radio" name="radiochk" > <label>Month (Posting Date)</label><br>
                <input type="radio" name="radiochk" > <label>Month (Posting Date) & Original Journal </label><br>
                <input type="radio" name="radiochk" > <label>Period (Posting Date) & Original Journal</label><br>
               

              </div>
          </div>
          <div class="col-md-6">
              <div class="input-label"><label>Select Mode</label></div>
              <div class="input-feild">
               <select>
                 <option>Detailed</option>
               </select>
             </div>
             <div class="cls"></div>
             <hr>
              <div class="input-feild input-feild-checkboxs">                                                 
                  <input checked="" type="checkbox" > <label>Display Posting Summary </label><br>
                  <input type="checkbox" > <label>Display OB for Periods</label><br>
                  <input type="checkbox" > <label>Ignore Adjustments </label><br>
                  <input type="checkbox"  name="radiochk"> <label>Display Installments in One Row </label><br>
              </div>             
          </div>

          <div class="cls"></div>
          <hr>
            
          <div class="col-md-10">
            <div class="widget_child_title"><h4>Numbering For Detail Mode</h4></div>
            <div class="input-label"><label>First Seq. No.</label></div>
            <div class="input-feild">
              <input class="mini_input_field" type="text" name="">
            </div>

            <div class="input-label"><label>No. on First Printed page-wrapper</label></div>
            <div class="input-feild">
              <input class="mini_input_field" type="text" name="">
            </div>

             <div class="input-feild input-feild-checkboxs">                                                 
                <input type="checkbox"> <label>Sort</label>
             </div> 
          </div>

         

        </div>          

				                          

					
		</form>
				
        

	</div>

  
</div>
<script>
  $(document).ready(function() {
    $('#budgtdistable').DataTable( {
        "scrollY": 70,
        "scrollX": true,
        "paging":   false,
        "info":     false
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
