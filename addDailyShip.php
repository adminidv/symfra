<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userID = $_SESSION['user'];

// After Submit
if(isset($_POST['submitBtn']))
{
	$shipDate = $_POST['shipDate'];
	$shipDay = $_POST['shipDay'];
	$shipperName = $_POST['shipperName'];
	$awbNo = $_POST['awbNo'];
	$shipAirline = $_POST['shipAirline'];
	$shipPcs = $_POST['shipPcs'];
	$shipWeight = $_POST['shipWeight'];
	$finalPcs = $_POST['finalPcs'];
	$f_GrWeight = $_POST['f_GrWeight'];
	$f_ChWeight = $_POST['f_ChWeight'];
	$shipDest = $_POST['shipDest'];
	$shipHAWB = $_POST['shipHAWB'];
	$shipStatus = $_POST['shipStatus'];

	mysqli_query($con, "INSERT INTO expectedship (shipDate, shipDay, shipperName, awbNo, shipAirline, shipPcs, shipWeight, finalPcs, f_GrWeight, f_ChWeight, shipDest, shipHAWB, shipStatus) VALUES ('$shipDate', '$shipDay', '$shipperName', '$awbNo', '$shipAirline', '$shipPcs', '$shipWeight', '$finalPcs', '$f_GrWeight', '$f_ChWeight', '$shipDest', '$shipHAWB', '$shipStatus') ");

    echo '<script type="text/javascript">'; 
    echo 'alert("Shipment added successfully.");';
    echo 'window.location.href = "addDailyShip.php";';
    echo '</script>';
			
}

// After Save
if(isset($_POST['saveBtn2']))
{

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daily Expected Shipment</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
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
    <script src="js/jquery.min.js"></script>

    <style type="text/css">
    	/*.steric*/
    	/*{*/
    	/*	color:red;*/
    	/*	font-size: 25px;*/
    	/*	margin-left: 4px;*/
    	/*}*/
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
          <a href="usermodules.php" class="btn btn-info">Operations</a>
          <a href="addDailyShip.php" class="btn btn-info active">Add Daily Expected Shipment</a>
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


<div class=" add_user_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
		<form action="" method="POST" enctype="multipart/form-data" onsubmit="return FormValidation();">

	        <!-- Modal_one-->
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

			 <!-- Modal_one-->
			 <div class="modal fade confirmTable-modal" id="saveUser_Modal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Confirmation</h4>
			        </div>
			        <div class="modal-body">
			          <p>Are You Sure You Want to Save?</p>
			          <button type="submit" name="saveBtn2">Yes</button>
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
			<hr>

		<div class="contct_usr_info widget_iner_box">

			<div class="form_sec_action_btn col-md-12">
				<div class="form_action_right_btn">
				  <!-- Go back button code starting here -->
                  <?php include('inc_widgets/backBtn.php'); ?>
                  <!-- Go back button code ending here -->
				</div>
				<button type="button" id="btnConfirm_S" onclick="FormValidation();"><small>Submit</small></button>
				<button type="button" name="submitBtn" onclick="cancelFunc();"> <small>Cancel</small></button>				
			</div>

			<div class="col-md-6">

				<div class="input-label"><label>Date</label></div>
				<div class="input-feild">
					<input  type="date" name="shipDate" id="shipDate" placeholder="Select Date" >
				</div>

				<div class="input-label"><label>Day</label></div>	
				<div class="input-feild">
					<input type="text" name="shipDay" placeholder="Enter Day">
				</div>

				<div class="input-label"><label>Shipper Name</label></div>
				<div class="input-feild">
					<select name="shipperName" id="shipperName">
					   <option value="">Select</option>

					   <?php

					   $selectShipperName = mysqli_query($con, "SELECT * FROM custmaster");
					   while ($rowShipperName = mysqli_fetch_array($selectShipperName))
					   {
					   	echo '<option value="'.$rowShipperName["newCode"].'">'.$rowShipperName["cmpTitle"].'</option>';
					   }

					   ?>

					</select>
				</div>

				<div class="input-label"><label>AWB No.</label></div>
				<div class="input-feild">
					<select name="awbNo" id="awbNo" onchange="fetchAirline();">
					   <option value="">Select</option>

					   <?php

					   $selectAWBNo = mysqli_query($con, "SELECT * FROM airway_billable");
					   while ($rowAWBNo = mysqli_fetch_array($selectAWBNo))
					   {
					   	echo '<option value="'.$rowAWBNo["awb_code"] . '-' . $rowAWBNo["awb_no"] .'">'.$rowAWBNo["awb_code"] . '-' . $rowAWBNo["awb_no"] .'</option>';
					   }

					   ?>

					</select>
 				</div>

 				<div class="input-label"><label>Airline</label></div>
				<div class="input-feild">
					<select name="shipAirline" id="shipAirline" class="shipAirline">
					   <option value="">Select</option>
					</select>
 				</div>

 				<div class="input-label"><label >Booking Pcs.</label></div>
				<div class="input-feild">
					<input  type="text" name="shipPcs" id="shipPcs" placeholder="Enter Pcs.">
				</div>

				<div class="input-label"><label >Booking Weight</label></div>
				<div class="input-feild">
					<input  type="text" name="shipWeight" id="shipWeight" placeholder="Enter Weight">
				</div>

			</div>
				
			<div class="col-md-6">

				<div class="input-label"><label >Final Details - Pcs</label></div>
				<div class="input-feild">
					<input  type="text" name="finalPcs" id="finalPcs" placeholder="Enter Final Details - Pcs">
				</div>

				<div class="input-label"><label >Final Details - Gr. Weight</label></div>
				<div class="input-feild">
					<input  type="text" name="f_GrWeight" id="f_GrWeight" placeholder="Enter Final Details - Gr. Weight">
				</div>

				<div class="input-label"><label >Final Details - Ch. Weight</label></div>
				<div class="input-feild">
					<input  type="text" name="f_ChWeight" id="f_ChWeight" placeholder="Enter Final Details - Ch. Weight">
				</div>

				<div class="input-label"><label >Destination</label></div>
				<div class="input-feild">
					<select name="shipDest" id="shipDest">
					   <option value="">Select</option>

					   <?php

					   $selectDest = mysqli_query($con, "SELECT * FROM destination_setup");
					   while ($rowDest = mysqli_fetch_array($selectDest))
					   {
					   	echo '<option value="'.$rowDest["dest_code"].'">'.$rowDest["dest_name"].'</option>';
					   }

					   ?>

					</select>
				</div>

				<div class="input-label"><label >HAWB No.</label></div>
				<div class="input-feild">
					<input  type="text" name="shipHAWB" id="shipHAWB" placeholder="Enter HAWB No.">
				</div>

				<div class="input-label"><label >Status</label></div>
				<div class="input-feild">
					<select name="shipStatus" id="shipStatus">
					   <option value="Pending">Pending</option>
					   <option value="Completed">Completed</option>
					   <option value="Cancelled">Cancelled</option>
					</select>
				</div>

			</div>

		</div>		
		
		<div class="cls"></div>
		<hr>	

	</form>
							
	</div>
</div>

<script type="text/javascript">
	 function FormValidation()
	 {
	 	$("#addUser_Modal").modal();
	}
</script>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function saveUserFunc()
{
	$("#saveUser_Modal").modal();
}
</script>

<script type="text/javascript">
function numbersOnly(oToCheckField, oKeyEvent)
{
	return oKeyEvent.charCode === 0 || /\d/.test(String.fromCharCode(oKeyEvent.charCode));
}
</script>

<script type="text/javascript">
function fetchAirline() {
  var awbNo = document.getElementById("awbNo").value;

  $.ajax({
     url:"getAirline_DS.php",  
            method:"GET",  
            data:{awbNo:awbNo},
            dataType:"text",  
     success: function(data) {
          $('.shipAirline').html(data); 
          // $('.party_name').html(data);
        }

});
}
</script>

</body>
</html>