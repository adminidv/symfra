<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$selectLastID = mysqli_query($con, "SELECT * FROM grade ORDER BY grade_id DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['grade_id'];
$newID = $lastID + 1;
$grade_id = $newID;

if(isset($_POST['submitBtn']))
{
	// Setting the POST variables coming from form
	// $dept_ID = $_POST['dept_ID'];
	$grade_title = $_POST['grade_title'];

	// Inserting records to DB
	$insertQuery = mysqli_query($con, "insert into grade (grade_id, grade_tittle) values ('$grade_id', '$grade_title')");

	// echo "The record is inserted successfully.";

	// Generating the alert
	$msg = "Department is inserted successfully.";
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
	<title>Add Grade</title>
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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">User Management</a>
          <a href="add_department.php" class="btn btn-info active">Add Department</a>
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


<div class=" main_widget_box">

									
										
		<div class="dpt_form widget_iner_box">

						<form action="" method="POST">


										
					<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label >Grade Id</label></div>

									<div class="input-feild">
										<?php echo '<input type="text" name="grade_id" disabled value="'.$grade_id.'">'; ?>
									</div>


									<div class="input-label"><label >Grade Title</label></div>	
									
									<div class="input-feild">
										<input  type="text" name="grade_title"  required placeholder="Enter Grade Title">
									
									</div>

									<div class="input-label"><label > Active</label></div>

									<div class="input-feild act_btn_user">
												<input type="checkbox" checked required /> 
									</div>

									<div class="submitdptbtn">
										<button type="submit" name="submitBtn" id="submitBtn">Submit</button>
									</div>
									
						</div>

						<div class="col-md-6">
						
						</div>

			</form>							<div class="cls"></div>
		</div>
									<hr>
		
							

</div>


<script src="js/bootstrap.min.js"></script>

</body>
</html>