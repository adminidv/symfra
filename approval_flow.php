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
	<title>Approval Flow</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
	<link rel="stylesheet" type="text/css" href="css/crm.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/sidebar.js"></script>
	<script src="js/jquery.min.js"></script>

	<!-- Bread crumbs starting here -->
	<link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/modules.css" type="text/css">
	<link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
	<!-- Bread crumbs ending here -->

	<style type="text/css">
		.confirmTable-modal .Popup_bdy button {
			float: none;
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
          <a href="usermodules.php" class="btn btn-info">User Management</a>
          <a href="approval_flow.php" class="btn btn-info active">Approval Flow</a>
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

           <?php include 'sidebar_widgets/user_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class=" add_department_form_sec main_widget_box">
								
		<div class="dpt_form widget_iner_box">

						<form action="approval_flowCode.php" method="POST">

							<!-- Modal_one-->
							 <div class="modal fade confirmTable-modal" id="addDept_Modal" role="dialog">
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
									
						<div class="col-md-6">
									<div class="input-label"><label >Departments</label></div>
									<div class="input-feild">
										<select name="appDept">
											<option value="Sales">Sales</option>
											<option value="Human Resource">Human Resource</option>
											<option value="CRM">CRM</option>
											<option value="User Management">User Management</option>
											<option value="Finance">Finance</option>
										</select>
									</div>

									<div class="input-label"><label >Title</label></div>
									<div class="input-feild">
										<input type="text" name="appTitle">
									</div>									
						</div>
						
						<div class="col-md-6">

									<div class="input-label"><label >Description</label></div>	
									<div class="input-feild">
										<textarea name="appDescription"></textarea>
									</div>	
									
						</div>

										<div class="cls"></div>
										<hr>

						<div class="col-md-6">
									<div class="input-label"><label >No. of Approvals</label></div>	
									<div class="input-feild">
										<select name="noApp" id="noApp" onchange="checkNoApp();">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
						</div>				

						<div class="col-md-6">
											
									<div class="input-label"><label > Active</label></div>
									<div class="input-feild act_btn_user">
										<input type="checkbox" checked required /> 
									</div>
						</div>

						<div class="col-md-6">
									<div class="input-label"><label >Select Approval:</label></div>	
									<div class="input-feild">
										<select name="app1" id="app1">
											<option>Select</option>
											<?php

                                            $selectUser = mysqli_query($con, "SELECT * FROM users");

                                            while ($rowUser = mysqli_fetch_array($selectUser))
                                            {
                                            	// Searching for the designation name against user's ID
                                            	$desig_ID = $rowUser['desig_ID'];

                                            	$selectDesig = mysqli_query($con, "SELECT * FROM designation WHERE Desig_ID='$desig_ID' ");
                                            	while ($rowDesig = mysqli_fetch_array($selectDesig))
                                            	{
                                            		$desig = $rowDesig['Desig_name'];
                                            	}

                                            	echo '<option value="'.$rowUser['user_ID'].'">'.$rowUser['user_fName']. ' ' .$rowUser['user_lName']. ' - ' . $desig . '</option>';
                                            }

                                            ?>
										</select>
									</div>
						</div>

						<div class="col-md-6" id="approval2">
									<div class="input-label"><label >Select Approval 2:</label></div>	
									<div class="input-feild">
										<select name="app2" id="app2">
											<option>Select</option>
											<?php

                                            $selectUser2 = mysqli_query($con, "SELECT * FROM users");

                                            while ($rowUser2 = mysqli_fetch_array($selectUser2))
                                            {
                                            	// Searching for the designation name against user's ID
                                            	$desig_ID2 = $rowUser2['desig_ID'];

                                            	$selectDesig2 = mysqli_query($con, "SELECT * FROM designation WHERE Desig_ID='$desig_ID2' ");
                                            	while ($rowDesig2 = mysqli_fetch_array($selectDesig2))
                                            	{
                                            		$desig2 = $rowDesig2['Desig_name'];
                                            	}

                                            	echo '<option value="'.$rowUser2['user_ID'].'">'.$rowUser2['user_fName']. ' ' .$rowUser2['user_lName']. ' - ' . $desig2 . '</option>';
                                            }

                                            ?>
										</select>
									</div>
						</div>

						<div class="col-md-6" id="approval3">
									<div class="input-label"><label >Select Approval 3:</label></div>	
									<div class="input-feild">
										<select name="app3" id="app3">
											<option>Select</option>
											<?php

                                            $selectUser3 = mysqli_query($con, "SELECT * FROM users");

                                            while ($rowUser3 = mysqli_fetch_array($selectUser3))
                                            {
                                            	// Searching for the designation name against user's ID
                                            	$desig_ID3 = $rowUser3['desig_ID'];

                                            	$selectDesig3 = mysqli_query($con, "SELECT * FROM designation WHERE Desig_ID='$desig_ID3' ");
                                            	while ($rowDesig3 = mysqli_fetch_array($selectDesig3))
                                            	{
                                            		$desig3 = $rowDesig3['Desig_name'];
                                            	}

                                            	echo '<option value="'.$rowUser3['user_ID'].'">'.$rowUser3['user_fName']. ' ' .$rowUser3['user_lName']. ' - ' . $desig3 . '</option>';
                                            }

                                            ?>
										</select>
									</div>
						</div>	

			</form>							
			<div class="cls"></div>
		</div>
									<hr>

</div>

<script>
$(document).ready(function(){
  $("#btnConfirm_Su").click(function(){
    $("#addDept_Modal").modal();
  });
});
</script>

<script>
$(document).ready(function() {
	document.getElementById('approval2').style.visibility = 'hidden';
	document.getElementById('approval3').style.visibility = 'hidden';
});

function checkNoApp() {
  var x = document.getElementById("noApp").value;

  if (x == '1')
  {
  	// alert('1');
  	document.getElementById('approval2').style.visibility = 'hidden';
	document.getElementById('approval3').style.visibility = 'hidden';
  }
  else if (x == '2')
  {
  	// alert('2');
  	document.getElementById('approval2').style.visibility = 'visible';
	document.getElementById('approval3').style.visibility = 'hidden';
  }
  else if (x == '3')
  {
  	// alert('3');
  	document.getElementById('approval2').style.visibility = 'visible';
	document.getElementById('approval3').style.visibility = 'visible';
  }

  // document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>


<script src="js/bootstrap.min.js"></script>

</body>
</html>