<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$selectLastID = mysqli_query($con, "SELECT * FROM designation ORDER BY Desig_ID DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['Desig_ID'];
$newID = $lastID + 1;
$Desig_ID = $newID;

if(isset($_POST['submitBtn']))
{
	// Setting the POST variables coming from form
	// $Desig_ID = $_POST['Desig_ID'];
	$Desig_name = $_POST['Desig_name'];

	// Inserting records to DB
	$insertQuery = mysqli_query($con, "insert into designation (Desig_ID, Desig_name) values ('$Desig_ID', '$Desig_name')");

	// echo "The record is inserted successfully.";

	// Generating the alert
	$msg = "Designation is inserted successfully.";
	function alert($msg)
    {
    echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    echo "<script>window.close();</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Designation</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/add_designation.css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">

	<!-- Bread crumbs starting here -->
	<link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/modules.css" type="text/css">
	<link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
	<!-- Bread crumbs ending here -->

	<script src="js/jquery-1.12.4.js"></script>
	  	<script src="js/sidebar.js"></script>

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
          <a href="Usermodules.php" class="btn btn-info">User Management</a>
          <a href="add_designation.php" class="btn btn-info active">Add Designation</a>
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


<div class="add_designation_form_sec main_widget_box" >

		<div class="dsgnation_form widget_iner_box">
			<form action="" method="POST">

			 <!-- Modal_one-->
			 <div class="modal fade confirmTable-modal" id="addDesig_Modal" role="dialog">
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
										
							</div>


					<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label >Designation Id</label></div>

									<div class="input-feild">
										<?php echo '<input type="text" name="Desig_ID" disabled value="'.$Desig_ID.'">'; ?>
									</div>


									<div class="input-label"><label > Title</label></div>	
									
									<div class="input-feild">
										<input  type="text" name="Desig_name" required placeholder="Enter Designation Title">
									
									</div>

									<div class="input-label"><label > Active</label></div>

									<div class="input-feild act_btn_user">
												<input type="checkbox" checked required /> 
									</div>

									<div class="submitdptbtn">
										<button type="button" name="btnDesig" id="btnDesig">Submit</button>
									</div>
									
						</div>

						<div class="col-md-6">
						
						</div>

				</form>						<div class="cls"></div>
		</div>
									<hr>
		
							
</div>

<script>
$(document).ready(function(){
  $("#btnDesig").click(function(){
    $("#addDesig_Modal").modal();
  });
});
</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>