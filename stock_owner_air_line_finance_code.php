<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


if (isset($_POST['submitBtn'])) {
	$owner_name = $_POST['owner_name'];
	$owner_add = $_POST['owner_add'];
	$owner_country = $_POST['owner_country'];
	$owner_city = $_POST['owner_city'];
	$owner_phone = $_POST['owner_phone'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$iata_code = $_POST['iata_code'];
	$commesion = $_POST['commesion'];
	$wht = $_POST['wht'];
	 if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

   $insertQuery = mysqli_query($con, "insert into stockowner (owner_name,owner_add,owner_country,owner_city,owner_phone,fax,email,website,iata_code,commesion,wht,status) values ('$owner_name','$owner_add' ,'$owner_country','$owner_city','$owner_phone','$fax','$email','$website','$iata_code','$commesion','$wht','$status')") or die(mysqli_error($con));


  header("Location: stock_owner_air_line_finance_code.php");
}





 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Owner & Airlines Finance</title>
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
          <a href="#" class="btn btn-info">Setups</a>
          <a href="#" class="btn btn-info active">Stock Owner & Airlines Finance Code</a>
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

				     	 <!-- Modal_one-->
			 <div class="modal fade confirmTable-modal" id="save_Modal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Confirmation</h4>
			        </div>
			        <div class="modal-body">
			          <p>Are You Sure You Want to Save?</p>
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
				       <div class="modal fade confirmTable-modal" id="submit_Modal" role="dialog">
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

								        <!-- ADD Airport Details -->
				      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
				            <div class="modal-dialog">
				              <!-- ADD Airport Details-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Stock Owner Details</h4>
				                </div>
				                <div class="modal-body">


				                  <div class="input-fields">  
				                    <label>Airline</label> 
				                    <select name="air_name" id="air_name">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectair = mysqli_query($con, "select * from airline_setup");

				                            while ($rowair = mysqli_fetch_array($selectair))
				                            {
				                              echo '<option value="'.$rowair['air_name'].'">'.$rowair['air_name'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                   <div class="input-fields"> 
				                    <label>Due To Airline</label> 
				                    <select name="due_air_name" id="due_air_name">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from due_airline_setup");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['due_name'].'">'.$rowair_due['due_name'].'</option>';
				                            }

				                          ?>
				                    </select>       
				                  </div>
				                  <div class="input-fields"> 
				                    <label>Agency Commission</label> 
				                    <select name="agency_comm" id="agency_comm">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectagency_comm = mysqli_query($con, "select * from agency_comm_setup");

				                            while ($rowagency_comm = mysqli_fetch_array($selectagency_comm))
				                            {
				                              echo '<option value="'.$rowagency_comm['agency_comm_name'].'">'.$rowagency_comm['agency_comm_name'].'</option>';
				                            }

				                          ?>
				                    </select>           
				                  </div>
				                  <div class="input-fields">  
				                    <label>WHT Code</label> 
				                    <select name="wht_code" id="wht_code">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectwht = mysqli_query($con, "select * from wht_setup");

				                            while ($rowwht = mysqli_fetch_array($selectwht))
				                            {
				                              echo '<option value="'.$rowwht['wht_code'].'">'.$rowwht['wht_code'].'</option>';
				                            }

				                          ?>
				                    </select> 
				                  </div>
				                  <div class="input-fields">  
				                    <label>KB. Income</label> 
				                    <select name="kb_income" id="kb_income">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectkb = mysqli_query($con, "select * from kb_setup");

				                            while ($rowkb = mysqli_fetch_array($selectkb))
				                            {
				                              echo '<option value="'.$rowkb['kb_income'].'">'.$rowkb['kb_income'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                 
				                   <div class="input-fields">  
				                    <label>Active</label> 
				                    <input type="checkbox" name="status" id="status">    
				                  </div>
				                  <button type="submit" name="btnadd" >Submit</button>
				                </div>
				                <div class="modal-footer">
				                  <p>Add Related content if needed</p>
				                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				                </div>
				              </div>
				              
				            </div>
				        </div>


									        <!-- Edit Airport Details -->
					      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
					            <div class="modal-dialog">
					              <!-- Edit Airport Details-->
					              <div class="modal-content">
					                <div class="modal-header">
					                  <button type="button" class="close" data-dismiss="modal">&times;</button>
					                  <h4 class="modal-title">Edit Stock Owner Details</h4>
				                </div>
				                <div class="modal-body">
				                	<div class="input-fields hide"> 
					                    <label>SrNo</label> 
					                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV" >    
					                  </div>

				                  <div class="input-fields">  
				                    <label>Airline</label> 
				                    <select name="air_nameV" id="air_nameV" class="air_nameV">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectair = mysqli_query($con, "select * from airline_setup");

				                            while ($rowair = mysqli_fetch_array($selectair))
				                            {
				                              echo '<option value="'.$rowair['air_name'].'">'.$rowair['air_name'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                   <div class="input-fields"> 
				                    <label>Due To Airline</label> 
				                    <select name="due_air_nameV" id="due_air_nameV" class="due_air_nameV">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from due_airline_setup");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['due_name'].'">'.$rowair_due['due_name'].'</option>';
				                            }

				                          ?>
				                    </select>       
				                  </div>
				                  <div class="input-fields"> 
				                    <label>Agency Commission</label> 
				                    <select name="agency_commV" id="agency_commV" class="agency_commV">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectagency_comm = mysqli_query($con, "select * from agency_comm_setup");

				                            while ($rowagency_comm = mysqli_fetch_array($selectagency_comm))
				                            {
				                              echo '<option value="'.$rowagency_comm['agency_comm_name'].'">'.$rowagency_comm['agency_comm_name'].'</option>';
				                            }

				                          ?>
				                    </select>           
				                  </div>
				                  <div class="input-fields">  
				                    <label>WHT Code</label> 
				                    <select name="wht_codeV" id="wht_codeV" class="wht_codeV">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectwht = mysqli_query($con, "select * from wht_setup");

				                            while ($rowwht = mysqli_fetch_array($selectwht))
				                            {
				                              echo '<option value="'.$rowwht['wht_code'].'">'.$rowwht['wht_code'].'</option>';
				                            }

				                          ?>
				                    </select> 
				                  </div>
				                  <div class="input-fields">  
				                    <label>KB. Income</label> 
				                    <select name="kb_incomeV" id="kb_incomeV" class="kb_incomeV">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          <?php

				                            $selectkb = mysqli_query($con, "select * from kb_setup");

				                            while ($rowkb = mysqli_fetch_array($selectkb))
				                            {
				                              echo '<option value="'.$rowkb['kb_income'].'">'.$rowkb['kb_income'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                 
				                   <div class="input-fields">  
				                    <label>Active</label> 
				                    <input type="checkbox" name="statusV" id="statusV">    
				                  </div>
				                  <button type="submit" name="btnadd" >Submit</button>
				                </div>
				                <div class="modal-footer">
				                  <p>Add Related content if needed</p>
				                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				                </div>
				              </div>
				              
				            </div>
				        </div>

				      

						 <label id="formSummary" style="color: red;"></label>

							

											  	<div class="cls"></div>
											  	<hr>

								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="submitFunc();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
													<button type="button" name="cancel"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                               

			                                                
			                                                
			                                                <div class="input-label"><label >Owner Name </label></div>	
			                                                <div class="input-feild"> 
			                                                       <input type="text" name="owner_name" id="owner_name" class="owner_name">
			                                                      

			                                                </div> 

			                                                <div class="input-label"><label >Country</label></div>	
			                                                <div class="input-feild">
			                                                     <select name="owner_country" id="owner_country" class="owner_country" required>
											                          <option value="Select">Select </option>
											                          <?php

											                            $selectsector = mysqli_query($con, "select * from country_setup");

											                            while ($rowcountry = mysqli_fetch_array($selectsector))
											                            {
											                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
											                            }

											                          ?>
											                      </select> 
			                                                </div> 
			                                                <div class="input-label"><label >City</label></div>	
			                                                <div class="input-feild">
			                                                      <select name="owner_city" id="owner_city" class="owner_city" required>
											                          <option value="Select">Select </option>
											                          <?php

											                            $selectsector = mysqli_query($con, "select * from city_setup");

											                            while ($rowsector = mysqli_fetch_array($selectsector))
											                            {
											                              echo '<option value="'.$rowsector['city_name'].'">'.$rowsector['city_name'].'</option>';
											                            }

											                          ?>

											                      </select>    
			                                                       
			                                                </div>
			                                                 <div class="input-label"><label >Address</label></div>	
			                                                <div class="input-feild">
			                                                      <textarea name="owner_add" id="owner_add"></textarea>
			                                                       
			                                                </div>

			                                                 <div class="cls"></div>
			                                                <hr>

			                                                <div class="input-label"><label >IATA Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input class="mini_input_field" type="text" name="iata_code" id="iata_code">
			                                                       
			                                                </div>
			                                                 <div class="input-label"><label >Comm %</label></div>	
			                                                <div class="input-feild">
			                                                      <input class="mini_input_field" type="text" name="commesion" id="commesion">
			                                                       
			                                                </div>

			                                                 <div class="input-label"><label >WHT </label></div>	
			                                                <div class="input-feild">
			                                                    <select class="mini_select_field" name="wht" id="wht">
			                                                    	<option>Yes</option>
			                                                    	<option>No</option>

			                                                    </select>
			                                                </div>             
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                             	<div class="input-label"><label >Contact No. </label></div>	
			                                                <div class="input-feild">
			                                                       <input  type="text" name="owner_phone" id="owner_phone" placeholder="Phone No.">
			                                                       </div>
			                                                 <div class="input-label"><label >Fax No. </label></div>	
			                                                <div class="input-feild">   
			                                                       <input  type="text" name="fax" id="fax" placeholder="Fax No.">

			                                                </div>
			                                                <div class="input-label"><label >Email Address</label></div>	
			                                                <div class="input-feild">
			                                                       <input  type="text" name="email" id="email">
			                                                </div>

			                                                <div class="input-label"><label >Website</label></div>	
			                                                <div class="input-feild">
			                                                       <input  type="text" name="website" id="website">
			                                                </div>

			                                               <div>
											                    <div class="input-label"><label >Active</label></div>	
			                                                <div class="input-feild">
											                    <input type="checkbox" name="status" id="status"> 
											                </div>

			                                                                                                 
			             				    </div>								
								</div>

											
												
				                                    


 
                                      
					
		</form>
				

	</div>

</div>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>

<script>

 $(document).ready(function() {
    $('#airlinefinancetble').DataTable();
} );
</script>


<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script type="text/javascript">
function submitFunc()
{
	$("#submit_Modal").modal();
}
</script>
<script type="text/javascript">
function saveFunc()
{
	$("#save_Modal").modal();
}
</script>

<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('.air_nameV').html(data.air_name);  
              $('.due_air_nameV').html(data.due_air_name);    
              $('.agency_commV').html(data.agency_comm);  
              $('.wht_codeV').html(data.wht_code);  
              $('.kb_incomeV').html(data.kb_income);      

              var checkif = data.status;
              if (checkif == "Active") {
                 $('#statusV').attr("checked", true);
                 document.getElementByID("statusV").checked = true;
              }
              else
              {
                $('#statusV').attr("checked", false);
              }
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
               
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.air_nameV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock3.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.due_air_nameV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock4.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.agency_commV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock5.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.wht_codeV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock6.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.kb_incomeV').html(data);  
              
              
         }
      });
    
});
</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>