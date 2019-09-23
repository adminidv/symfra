<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userNo = $_GET['SrNo'];
  // echo $user_id;
  $qry= "SELECT * FROM  leavemanagement WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {
    	$SrNo= $row['SrNo'];
      $empID= $row['empID'];
      $leaveType = $row['leaveType'];
      $leaveFrom = $row['leaveFrom'];
      $leaveTo = $row['leaveTo'];
      $approvedBy = $row['approvedBy'];
      $leaveReason = $row['leaveReason'];
      $weekNo = $row['weekNo'];
      $weekDate = $row['weekDate'];
      $hoursTaken = $row['hoursTaken'];
      $status = $row['status'];
      $can_reason = $row['can_reason'];
     
      }
    else
    {
        $msg = 'Got some error ';

        function alert($msg)
        {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
        alert($msg);
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cancel Leave</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

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
          <a href="usermodules.php" class="btn btn-info">User Management</a>
          <a href="#" class="btn btn-info active">Add Department</a>
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
										
										<a id="btnEnable" href="cancel_leave_VE.php?SrNo=<?php echo $row['SrNo']; ?>"> <small>Edit</small></a>				
								</div>
										

						<div class="col-md-6">
									<div class="input-label"><label >Employee Name</label></div>

									<div class="input-feild">
											<input type="text" disabled name="empID" value="<?php echo $empID ?>">
									</div>

									<div class="input-label"><label >Date</label></div>

									<div class="input-feild">
											<input type="text" disabled name="weekDate"  value="<?php echo $weekDate ?>">
									</div>


									<div class="input-label"><label >Leave Type </label></div>

									<div class="input-feild">
											<input type="text" disabled name="leaveType"  value="<?php echo $leaveType ?>">
									</div>
						</div>
				
						<div class="col-md-6">
									<div class="input-label"><label >Hours</label></div>

									<div class="input-feild">
											<input type="text" disabled name="hoursTaken"  value="<?php echo $hoursTaken ?>">
									</div>

									<div class="input-label"><label >Approved By</label></div>

									<div class="input-feild">
											<input type="text" disabled name="approvedBy"  value="<?php echo $approvedBy ?>">
									</div>


									<div class="input-label"><label >Reason </label></div>

									<div class="input-feild">
											<textarea disabled name="leaveReason"  > <?php echo $leaveReason; ?></textarea>
									</div>
						</div>								
		</div>

					<div class="cls"></div>
					<hr>

			<div class="dpt_form widget_iner_box">
					<div class="col-md-6">
									<div class="input-label"><label >Cancelled By</label></div>

									<div class="input-feild">
											<select disabled>
												<!-- <option>Employee 1</option> -->
												 <?php

                                                                $selectDesig = mysqli_query($con, "SELECT * FROM  empinfo");

                                                                while ($rowDesig = mysqli_fetch_array($selectDesig))
                                                                {
                                                                  echo '<option value="'.$rowDesig['lineManager'].'">'.$rowDesig['lineManager'].'</option>';
                                                                }

                                                                ?>
											</select>
									</div>
					</div>				
					<div class="col-md-6">

									<div class="input-label"><label >Reason For Cancellation</label></div>

									<div class="input-feild">
											<textarea name="can_reason" disabled ><?php echo $can_reason; ?></textarea>
									</div>
						</div>
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
<script type="text/javascript">
	function saveDraft()
   {
    $("#draftModal").modal();
   }
</script>

</body>
</html>