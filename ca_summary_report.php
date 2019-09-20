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
	<title>Summary Report</title>
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
          <a href="Usermodules.php" class="btn btn-info">Financials</a>
           <a href="Usermodules.php" class="btn btn-info">Cost Accounting</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Summary Report</a>
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
			<form action="" method="POST">

				     	<!-- Modal One-->
						 <div class="modal fade confirmTable-modal" id="addModal2" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Confirmation</h4>
							        </div>
							        <div class="modal-body">
							          <p>Are You Sure You Want to Submit?</p>
							          <button type="submit" name="submitBtn2">Yes</button>
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
					  		<div class="col-md-6">
					  			<div class="input-label  hide"><label >Cost Center Report </label></div>	

					  			<div class="input-feild input-feild-checkboxs"  style="width: 30%;">
                      <input type="radio" name="chkfrmname" value="chkform1" checked> <label>Hierarchy Template</label>
                  </div>  

                  <div class="input-feild input-feild-checkboxs" style="width: 25%;">
                      <input type="radio" name="chkfrmname" value="chkform2" ><label>Cost Center</label>
                	</div>

					  		</div>
					  		<div class="col-md-6"></div>
					  	</div>

					  	<div class="cls"></div>
					  	<hr>

						<div id="company_form" class="company_form chkform1 chkboxform"  >
								<div class="widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="sbtModFunc1();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
													<button type="button" name="submitBtn"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             

			                                                <div class="input-label"><label > Template</label></div>	
			                                                <div class="input-feild">
			                                                      <select>
                                                                <option></option>   
                                                            </select>
			                                                </div>                                                  
			                                         	                                                                          
			                 </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
															                     <!--    <div class="input-label"><label >Cost Center Type </label></div> 
			                                              	<div class="input-feild">
			                                                      <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                    	</div> 
                                                      <div class="input-label"><label >Sort Code </label></div> 
                                                      <div class="input-feild">
                                                            <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                      </div> -->
                                                      <div class="input-label"><label >Date </label></div> 
                                                      <div class="input-feild">
                                                            <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                      </div> 

                                                      <div class="input-feild input-feild-checkboxs">
                                                        <input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"> <label>G/L Accounts</label>
                                                        <button style="margin: 10px 30px;">...</button><br>
                                                        <input type="checkbox" name="Chkbox" > <label>Add Journal Voucher</label><br>
                                                        <input type="checkbox" name="Chkbox"> <label>Exclude Closing Balance </label><br>
                                                        <input type="checkbox" name="Chkbox"> <label>Project</label>
                                                        <button style="margin: 10px 30px;">...</button>
                                                      </div>
                                                     
                    </div>
                    <div class="col-md-6">         
                                                      <div class="widget_child_title"><h4>Display in Report:</h4></div>

                                                      <div class="input-feild input-feild-checkboxs">
                                                          <input type="radio" name="radiobox"> <label>Display in LC</label><br>
                                                          <input type="radio" name="radiobox"> <label>Display in SC</label><br>
                                                          <input type="radio" name="radiobox"> <label>Display LC & SC</label>
                                                      </div>
                                                      <div class="cls"></div>
                                                      <hr>
                                                      <div class="input-feild input-feild-checkboxs">    
                                                          <input type="radio" name="radiobox"> <label>Annual Report </label><br>
                                                          <input type="radio" name="radiobox"> <label>Quaterly Report </label><br>
                                                          <input type="radio" name="radiobox"> <label>Monthly Report </label><br>
                                                          
                                                      </div>


										</div>
										 
								</div>
						</div>

						<div id="individual_form" class="individual_form chkform2 chkboxform" style="display: none;" >
								  <div class="widget_iner_box">

                      <div class="form_sec_action_btn col-md-12">
                          <div class="form_action_right_btn">
                                          <!-- Go back button code starting here -->
                                          <?php include('inc_widgets/backBtn.php'); ?>
                                          <!-- Go back button code ending here -->
                          </div>
                          <button type="button" id="btnConfirm_Su" onclick="sbtModFunc1();"> <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="svModFunc1();"> <small>Save</small></button>
                          <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                   

                                                      <div class="input-label"><label > Cost Center</label></div>  
                                                      <div class="input-feild">
                                                          <button>...</button>
                                                      </div>                                                  
                                                                                                                          
                       </div>               
                </div>      
                        <div class="cls"></div>
                        <hr>

                <div class=" widget_iner_box">
                    <div class="col-md-6">
                                                      <div class="input-label"><label >Cost Center Type </label></div> 
                                                      <div class="input-feild">
                                                            <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                      </div> 
                                                      <div class="input-label"><label >Sort Code </label></div> 
                                                      <div class="input-feild">
                                                            <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                      </div>
                                                      <div class="input-label"><label >Date </label></div> 
                                                      <div class="input-feild">
                                                            <input class="mini_input_field" type="text" placeholder="From">
                                                            <input class="mini_input_field" type="text" placeholder="To">
                                                      </div> 

                                                      <div class="input-feild input-feild-checkboxs">
                                                        <input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"> <label>G/L Accounts</label>
                                                        <button style="margin: 10px 30px;">...</button><br>
                                                        <input type="checkbox" name="Chkbox" > <label>Add Journal Voucher</label><br>
                                                        <input type="checkbox" name="Chkbox"> <label>Exclude Closing Balance </label><br>
                                                        <input type="checkbox" name="Chkbox"> <label>Project</label>
                                                        <button style="margin: 10px 30px;">...</button>
                                                      </div>
                                                     
                    </div>
                    <div class="col-md-6">         
                                                      <div class="widget_child_title"><h4>Display in Report:</h4></div>

                                                      <div class="input-feild input-feild-checkboxs">
                                                          <input type="radio" name="radiobox"> <label>Display in LC</label><br>
                                                          <input type="radio" name="radiobox"> <label>Display in SC</label><br>
                                                          <input type="radio" name="radiobox"> <label>Display LC & SC</label>
                                                      </div>
                                                      <div class="cls"></div>
                                                      <hr>
                                                      <div class="input-feild input-feild-checkboxs">    
                                                          <input type="radio" name="radiobox"> <label>Annual Report </label><br>
                                                          <input type="radio" name="radiobox"> <label>Quaterly Report </label><br>
                                                          <input type="radio" name="radiobox"> <label>Monthly Report </label><br>
                                                          
                                                      </div>


                    </div>
                     
                </div>	
						</div>
							
											<div class="cls"></div>
											<hr>
						                       

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



<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>