<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'UnHide';
$Quickhr = 'Hide';

$selectLastID = mysqli_query($con, "SELECT * FROM emprelation ORDER BY rel_id DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['rel_id'];
$newID = $lastID + 1;
$rel_id = $newID;

if(isset($_POST['submitBtn']))
{
	// Setting the POST variables coming from form
	// $rel_id = $_POST['rel_id'];
	$rel_name = $_POST['rel_name'];

	// Inserting records to DB
	$insertQuery = mysqli_query($con, "insert into emprelation (rel_id, rel_name) values ('$rel_id', '$rel_name')");

	// echo "The record is inserted successfully.";

	// Generating the alert
	$msg = "Relation is inserted successfully.";
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
	<title>Add Relation</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/add_department.css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
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
          <a href="usermodules.php" class="btn btn-info">Human Resourse</a>
          <a href="relation.php" class="btn btn-info active">Add Relation</a>
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
	<div class=" row">

									
										
		<div class="dpt_form widget_iner_box">

						<form action="" method="POST">

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
										
					<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label > Relation Id</label></div>

									<div class="input-feild">
										<?php echo '<input type="text" name="rel_id" disabled value="'.$rel_id.'">'; ?>
									</div>


									<div class="input-label"><label > Relation Name</label></div>	
									
									<div class="input-feild">
										<input  type="text" name="rel_name" required placeholder="Enter Relation Title">
									
									</div>

									<div class="input-label"><label > Active</label></div>

									<div class="input-feild act_btn_user">
												<input type="checkbox" checked required /> 
									</div>

									<div class="submitdptbtn">
										<button type="button" name="btnDept" id="btnDept">Submit</button>
									</div>
									
						</div>

						<div class="col-md-6">
						
						</div>

			</form>							<div class="cls"></div>
		</div>
									<hr>
		
							
	</div>
</div>

<script>
$(document).ready(function(){
  $("#btnDept").click(function(){
    $("#addDept_Modal").modal();
  });
});
</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>