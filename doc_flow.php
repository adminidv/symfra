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
	<title>Document Flow</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
	<link rel="stylesheet" type="text/css" href="css/crm.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/js1.6.2.js"></script>
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
          <a href="doc_flow.php" class="btn btn-info active">Document Flow</a>
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

						<form action="doc_flowCode.php" method="POST">

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
										<button type="button" id="btnConfirm_Su"> <small>Submit</small></button>
										<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
										<button type="button" name="submitBtn"> <small>Cancel</small></button>				
								</div>
										

						<div class="col-md-6">
									<div class="input-label"><label >Title</label></div>
									<div class="input-feild">
										<input type="text" name="flowTitle">
									</div>

									<div class="input-label"><label >Departments</label></div>
									<div class="input-feild">
										<select name="flowDept" id="flowDept" onchange="checkDept();">
											<option>Select</option>
											<option value="Sales">Sales </option>
											<option value="Human Resource">Human Resource </option>
											<option value="CRM">CRM </option>
											<option value="User Management">User Management </option>
											<option value="Finance">Finance </option>

										</select>
									</div>

									<div class="input-label"><label >Forms</label></div>
									<div class="input-feild">
										<select name="flowForm" id="flowForm" onchange="checkForm();">
											<option>Select</option>
										</select>
									
									</div>									
						</div>
						
						<div class="col-md-6">
								
								<div class="input-label"><label >Approval Sets</label></div>
									<div class="input-feild">
										<select name="appSet">
											<option value="">Select</option>
											<?php

											$selectAppSet = mysqli_query($con, "SELECT * FROM appflow");
											while ($rowAppSet = mysqli_fetch_array($selectAppSet))
											{
												echo '<option value="'. $rowAppSet['appTitle'] .'">'. $rowAppSet['appTitle'] .'</option>';
											}

											?>
										</select>
									
									</div>
						</div>

						<div class="cls"></div>
						<hr>

						<div class="col-md-6">
							<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
	                    		<input type="radio" name="flowType" value="Basic Flow" checked> <label>Basic Flow</label>
	                  		</div>  

	                  		<div class="input-feild input-feild-checkboxs" style="width: 25%;">
	                    		<input type="radio" name="flowType" value="Fields Flow" ><label>Fields Flow</label>
	                		</div>
                		</div>

						<div class="col-md-6"></div>				

						<!-- Main div to add fields and values -->
						<div class="col-md-6">
						
						<div class="cls"></div>
						<hr>
							
						<!-- <div class="input-label">
							<input type="radio" name="chkfrmname" value="And"> <label>And</label>
							<input type="radio" name="chkfrmname" value="Or"> <label>Or</label>
						</div> -->

						<div class="input-label"><label >Fields</label></div>
						<div class="input-feild">
							<select class="mini_select_field flowFields" name="flowFields" id="flowFields" onchange="checkValues();">
								<option value="">Select</option>
							</select>
						</div>

						<div class="input-label"><label >Values</label></div>
						<div class="input-feild">
							<select class="mini_select_field flowValues" name="flowValues" id="flowValues">
								<option value="Value 1">Value 1 </option>
								<option value="Value 2">Value 2 </option>
								<option value="Value 3">Value 3 </option>
							</select>						
						</div>

						</div>

						<!-- Main div to add fields and values -->
						<div class="col-md-6" id="conditionDiv">
						
						<div class="cls"></div>
						<hr>
							
						<div class="input-label">
							<input type="radio" name="flowCondition" value="And"> <label>And</label>
							<input type="radio" name="flowCondition" value="Or"> <label>Or</label>
						</div>

						<div class="input-label"><label >Fields</label></div>
						<div class="input-feild">
							<select class="mini_select_field flowFields2" name="flowFields2" id="flowFields2" onchange="checkValues2();">
								<option value="Feild 1">Field 1 </option>
								<option value="Feild 2">Field 2 </option>
								<option value="Feild 3">Field 3 </option>
							</select>
						</div>	

						<div class="input-label"><label >Values</label></div>
						<div class="input-feild">
							<select class="mini_select_field flowValues2" name="flowValues2" id="flowValues2">
								<option value="">Select</option>
							</select>						
						</div>

						</div>

			</form>	
						<div class="col-md-6">
							<button name="addDom" id="addDom">Add More</button>
						</div>

						</div>					<div class="cls"></div>
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

<script type="text/javascript">
	$(document).ready(function() {
		document.getElementById('conditionDiv').style.visibility = 'hidden';
       
	    $("button[name='addDom']").click(function() {
	        /*var domElement = $('<div class="col-md-12"><div class="cls"></div><hr><div class="input-label"><input type="radio" name="chkfrmname2" value="And"> <label>And</label><input type="radio" name="chkfrmname2" value="Or"> <label>Or</label></div><div class="input-label"><label >Fields</label></div><div class="input-feild"><select class="mini_select_field" name="flowFields2"><option>Feild 1 </option></select></div><div class="input-label"><label >Values</label></div><div class="input-feild"><select class="mini_select_field" name="flowValues2"><option>Value 1 </option></select></div></div>');
	        $(this).after(domElement);*/

	        document.getElementById('conditionDiv').style.visibility = 'visible';
	    });
	    
	});
</script>

<script>
function checkDept() {
  var deptValue = document.getElementById("flowDept").value;

  if (deptValue == 'Sales')
  {
  	// alert('1');
  	var salesOptions = {
    val0 : 'Select'
	};
	$('#flowForm').empty()
	$.each(salesOptions, function(val, text) {
	    $('#flowForm').append( new Option(text, text) );
	});
  }
  else if (deptValue == 'Human Resource')
  {
  	// alert('2');
  	var hrOptions = {
    val0 : 'Select',
    val1 : 'Add Employee'
	};
	$('#flowForm').empty()
	$.each(hrOptions, function(val, text) {
	    $('#flowForm').append( new Option(text, text) );
	});
  }
  else if (deptValue == 'CRM')
  {
  	// alert('3');
  	var crmOptions = {
  	val0 : 'Select',
    val1 : 'Add Customer',
    val2 : 'Add Vendor',
    val3 : 'Add Business Partner'
	};
	$('#flowForm').empty()
	$.each(crmOptions, function(val, text) {
	    $('#flowForm').append( new Option(text, text) );
	});
  }
  else if (deptValue == 'User Management')
  {
  	// alert('3');
  	var umOptions = {
    val0 : 'Select',
    val1 : 'Add User'
	};
	$('#flowForm').empty()
	$.each(umOptions, function(val, text) {
	    $('#flowForm').append( new Option(text, text) );
	});
  }
  else if (deptValue == 'Finance')
  {
  	// alert('4');
  	var financeOptions = {
    val0 : 'Select'
	};
	$('#flowForm').empty()
	$.each(financeOptions, function(val, text) {
	    $('#flowForm').append( new Option(text, text) );
	});
  }

}
</script>

<script>
function checkForm() {
  var deptForm = document.getElementById("flowForm").value;

  // Checking for the Add User form fields
  if (deptForm == 'Add User')
  {
  	// alert('1');
  	var userOptions = {
    val0 : 'Select',
    val1 : 'Departments',
    val2 : 'Designations',
    val3 : 'Roles',
    val4 : 'Authorizations',
    val6 : 'Cities',
    val6 : 'Countries'
	};
	$('#flowFields').empty()
	$.each(userOptions, function(val, text) {
	    $('#flowFields').append( new Option(text, text) );
	});
	$('#flowFields2').empty()
	$.each(userOptions, function(val, text) {
	    $('#flowFields2').append( new Option(text, text) );
	});
  }

  // Checking for the Add Employee form fields
  else if (deptForm == 'Add Employee')
  {
  	// alert('2');
  	var employeeOptions = {
    val0 : 'Select',
    val1 : 'Cities',
    val2 : 'Countries',
    val3 : 'Departments',
    val4 : 'Designations'
	};
	$('#flowFields').empty()
	$.each(employeeOptions, function(val, text) {
	    $('#flowFields').append( new Option(text, text) );
	});
	$('#flowFields2').empty()
	$.each(employeeOptions, function(val, text) {
	    $('#flowFields2').append( new Option(text, text) );
	});
  }

  // Checking for the Add Customer form fields
  else if (deptForm == 'Add Customer')
  {
  	// alert('3');
  	var customer = {
  	val0 : 'Select',
    val1 : 'Countries',
    val2 : 'Cities'
	};
	$('#flowFields').empty()
	$.each(crmOptions, function(val, text) {
	    $('#flowFields').append( new Option(text, text) );
	});
	$('#flowFields2').empty()
	$.each(crmOptions, function(val, text) {
	    $('#flowFields2').append( new Option(text, text) );
	});
  }

  // Checking for the Add Vendor form fields
  else if (deptForm == 'Add Vendor')
  {
  	// alert('3');
  	var umOptions = {
    val0 : 'Select',
    val1 : 'Countries',
    val2 : 'Cities'
	};
	$('#flowFields').empty()
	$.each(umOptions, function(val, text) {
	    $('#flowFields').append( new Option(text, text) );
	});
	$('#flowFields2').empty()
	$.each(umOptions, function(val, text) {
	    $('#flowFields2').append( new Option(text, text) );
	});
  }

  // Checking for the Add Business Partner form fields
  else if (deptForm == 'Add Business Partner')
  {
  	// alert('4');
  	var financeOptions = {
    val0 : 'Select',
    val1 : 'Countries',
    val2 : 'Cities'
	};
	$('#flowFields').empty()
	$.each(financeOptions, function(val, text) {
	    $('#flowFields').append( new Option(text, text) );
	});
	$('#flowFields2').empty()
	$.each(financeOptions, function(val, text) {
	    $('#flowFields2').append( new Option(text, text) );
	});
  }
  
}
</script>

<script>
function checkValues() {
  var flowFields = document.getElementById("flowFields").value;

  // If the selected field is Countries
  if (flowFields == 'Countries')
  {
  	$.ajax({
         url:"docFlowCountries.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues').html(data);  
              // alert('Running'); 
         }
      });
  }

  // If the selected field is Departments
  else if (flowFields == 'Departments')
  {
  	$.ajax({
         url:"docFlowDept.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues').html(data);  
              // alert('Running'); 
         }
      });
  }

  // If the selected field is Designations
  else if (flowFields == 'Designations')
  {
  	$.ajax({
         url:"docFlowDesig.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues').html(data);  
              // alert('Running'); 
         }
      });
  }
  
}
</script>

<script>
function checkValues2() {
  var flowFields2 = document.getElementById("flowFields2").value;

  // If the selected field is Countries
  if (flowFields2 == 'Countries')
  {
  	$.ajax({
         url:"docFlowCountries.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues2').html(data);  
              // alert('Running'); 
         }
      });
  }

  // If the selected field is Departments
  else if (flowFields2 == 'Departments')
  {
  	$.ajax({
         url:"docFlowDept.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues2').html(data);  
              // alert('Running'); 
         }
      });
  }

  // If the selected field is Designations
  else if (flowFields2 == 'Designations')
  {
  	$.ajax({
         url:"docFlowDesig.php",  
                method:"GET",  
                dataType:"text",  
         success: function(data) {
              $('.flowValues2').html(data);  
              // alert('Running'); 
         }
      });
  }
  
}
</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>