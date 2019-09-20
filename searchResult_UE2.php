<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

	$user_id= $_GET['user_id'];
	// echo $user_id;
	$qry= "SELECT * FROM users WHERE user_ID = '$user_id'";
	$run= mysqli_query($con , $qry);
	$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

    if ($user_id==$row['user_ID'])
    {
    	$user_ID = $row['user_ID'];
    	$user_fName = $row['user_fName'];
    	$user_mName = $row['user_mName'];
    	$user_lName = $row['user_lName'];
    	$user_pswd = $row['user_pswd'];
    	$user_address = $row['user_address'];
    	$user_contact = $row['user_contact'];
    	$user_email = $row['user_email'];
    	$dept_ID = $row['dept_ID'];
    	$desig_ID = $row['desig_ID'];
    	$role_ID = $row['role_ID'];
    	$Auth_ID = $row['Auth_ID'];
    	$user_manager = $row['user_manager'];
    	$user_status = $row['user_status'];
    	$user_active = $row['user_active'];
    	$user_region = $row['user_region'];
    	$emerg_contact = $row['emerg_contact'];
    	$user_DOB = $row['user_DOB'];
    	$user_DOJ = $row['user_DOJ'];
    	$user_img = $row['user_img'];
    	$user_DOL = $row['user_DOL'];

    	// Selecting department according to the user department ID
		$selectDept = mysqli_query($con , "SELECT * FROM department WHERE dept_ID = '$dept_ID'");
		$rowDept = mysqli_fetch_array($selectDept, MYSQLI_ASSOC);
		if ($dept_ID == $rowDept['dept_ID'])
	    {
	    	$dept_name = $rowDept['dept_name'];
	    }

	    // Selecting designation according to the user designation ID
	    $selectDesig = mysqli_query($con , "SELECT * FROM designation WHERE Desig_ID = '$desig_ID'");
		$rowDesig = mysqli_fetch_array($selectDesig, MYSQLI_ASSOC);
		if ($desig_ID == $rowDesig['Desig_ID'])
	    {
	    	$Desig_name = $rowDesig['Desig_name'];
	    }

	    // Selecting role according to the user role ID
	    $selectRole = mysqli_query($con , "SELECT * FROM roles WHERE role_ID = '$role_ID'");
		$rowRole = mysqli_fetch_array($selectRole, MYSQLI_ASSOC);
		if ($role_ID == $rowRole['role_ID'])
	    {
	    	$role_Name = $rowRole['role_Name'];
	    }

	    // Selecting authorization name according to user auth id
	    $selectAuth = mysqli_query($con , "SELECT * FROM authorizationset WHERE Auth_ID = '$Auth_ID'");
		$rowAuth = mysqli_fetch_array($selectAuth, MYSQLI_ASSOC);
		if ($Auth_ID == $rowAuth['Auth_ID'])
	    {
	    	$auth_Name = $rowAuth['auth_Name'];
	    }
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

    // After Submit
    if(isset($_POST['btnSubmit']))
	{
		// Setting the POST variables coming from form
		//$user_ID = $_POST['user_ID'];
		$user_fName = $_POST['user_fName'];

		$user_mName = $_POST['user_mName'];
		$user_lName = $_POST['user_lName'];

		$user_pswd = $_POST['user_pswd'];
		$user_address = $_POST['user_address'];

		$user_contact = $_POST['user_contact'];
		$user_email = $_POST['user_email'];

		$dept_ID = $_POST['dept_ID'];
		$desig_ID = $_POST['desig_ID'];

		$role_ID = $_POST['role_ID'];
		$user_manager = $_POST['user_manager'];

		$user_status = $_POST['user_status'];
		$user_active = $_POST['user_active'];

		$user_region = $_POST['user_region'];
		$emerg_contact = $_POST['emerg_contact'];

		$user_DOB = $_POST['user_DOB'];
		$user_DOJ = $_POST['user_DOJ'];

		$user_DOL = $_POST['user_DOL'];

		// Inserting records to DB
		$insertQuery = mysqli_query($con, "UPDATE users SET user_fName='$user_fName', user_mName='$user_mName', user_lName='$user_lName', user_pswd='$user_pswd', user_address='$user_address', user_contact='$user_contact', user_email='$user_email', dept_ID='$dept_ID', desig_ID='$desig_ID', role_ID='$role_ID', Auth_ID='$Auth_ID', user_manager='$user_manager', user_status='$user_status', user_region='$user_region', emerg_contact='$emerg_contact', user_DOB='$user_DOB', user_DOJ='$user_DOJ', user_DOL='$user_DOL' WHERE user_ID='$user_ID' ");

		// echo "The record is inserted successfully.";

		// Generating the alert
		/*$msg = "Record is updated successfully.";
		function alert($msg)
        {
        echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        alert($msg);*/

        // header("Location: searchResultU.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/add_user.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-1.12.4.js"></script>

	<!-- Bread crumbs starting here -->
	<link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/modules.css" type="text/css">
	<link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
	<!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

<style type="text/css">
.input-label {
    width: 20%;
    float: left;
    margin: 5px 0;
    clear: both;
}
.input-feild {
    width: 80%;
    margin:0;
    float: right;
}
	.add_user_sec {
    width: 85%;
    position: absolute;
    right: 0;
    padding:15px;
    top: 225px;
}
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
          <a href="searchResult_UE.php" class="btn btn-info active">Edit User</a>
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

<div class=" add_user_sec">
	<div class="">
		<form action="" method="POST" id="myForm" enctype="multipart/form-data">

			<!-- <div class="confirmTable-modal modal fade" id="editRecord_Modal" role="dialog">
	            <div class="modal-dialog">
	                <div class="modal-content pop_up_content">
	                    <div class="modal-header pop_up-header">
	                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
	                        <h4 class="modal-title pop_title">Confirmation</h4>
	                    </div>
	                    <div class="modal-body Popup_bdy">
	                        <div class="input-feild">
	                            <p>Are you sure?</p>
	                        </div>
	                        <button type="submit" name="btnSubmit">Yes</button>
	                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
	                    </div>
	                </div>
	            </div>
	        </div> -->

	        <div class="modal fade symfra_popup1" id="popup_1" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
				          <p>Are You Sure You Want to Submit?.</p>
				          <button type="submit" name="btnSubmit">Yes</button>
				          <button type="submit">No</button>

				        </div>
				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				      
				    </div>
			  </div>

		<div class="Bsic_usr_info">

						<div class="form_sec_action_btn col-md-12">
								<div class="form_action_right_btn">
									<!-- Go back button code starting here -->
			                      <?php include('inc_widgets/backBtn.php'); ?>
			                      <!-- Go back button code ending here -->
								</div>
								<button type="button" id="btnDelete" disabled> <small>Delete</small></button>
								<button type="button" id="btnConfirm_S"> <small>Save</small></button>
								<a id="btnEnable" href="searchResult_U.php?user_id=<?php echo $row['user_ID']; ?>"><small>Cancel</small></a>				
						</div>
										
										<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label >User Id</label></div>

									<div class="input-feild">
										<input  type="text" name="user_ID" disabled id="user_ID" value="<?php echo $user_ID; ?>" placeholder="Enter an ID">
									</div>


									<div class="input-label"><label > Name</label></div>	
							<div class="input-feild">
									<input  type="text" name="user_fName" id="user_fName" value="<?php echo $user_fName; ?>" placeholder="Enter First Name">
									<input  type="text" name="user_mName" id="user_mName" value="<?php echo $user_mName; ?>" placeholder="Enter Mid Name">
									<input  type="text" name="user_lName" id="user_lName" value="<?php echo $user_lName; ?>" required placeholder="Enter Last Name">
							</div>
						</div>

						<div class="col-md-6">
									<div class="input-label"><label > Date of Birth</label></div>
										<div class="input-feild">
											<input type="date" name="user_DOB" id="user_DOB" value="<?php echo $user_DOB; ?>" data-date-inline-picker="false" data-date-open-on-focus="true" />
										</div>
									<div class="input-label"><label > Choose Profile Image</label></div>
										<div class="input-feild">
											<?php echo '<img src="Profile Images/'.$user_img.'" style="width: 85px">';?>
											<input  type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $user_img; ?>">

										</div>
						</div>

										<div class="cls"></div>
		</div>			
										<div class="cls"></div>
										<hr>

		<div class="contct_usr_info">

								<div class="col-md-6">
									<div class="input-label"><label >Email Address</label></div>
									<div class="input-feild">
										<input  type="text" name="user_email" id="user_email" value="<?php echo $user_email; ?>" required placeholder="Enter an Email Address">
									</div>

									<div class="input-label"><label >Contact No.</label></div>	
									<div class="input-feild">
										<input  type="text" name="user_contact" id="user_contact" value="<?php echo $user_contact; ?>"  required placeholder="Enter Number">
										<input  type="text" name="emerg_contact" id="emerg_contact" value="<?php echo $emerg_contact; ?>"  placeholder="Enter Emergency Number">
									</div>
								</div>
				
								<div class="col-md-6">
									
									<div class="input-label"><label >Region</label></div>
									<div class="input-feild">
										<input  type="text" name="user_region" id="user_region" value="<?php echo $user_region; ?>" placeholder="Enter Your Region">
									</div>

									<div class="input-label"><label >Adddress</label></div>
									<div class="input-feild">
										<textarea name="user_address" id="user_address"><?php echo $user_address; ?></textarea>
					 				</div>

								</div>
		</div>		
										<div class="cls"></div>
										<hr>

		<div class="slction_info">
								<div class="col-md-6">
										<div class="input-label"><label >Department</label></div>
									<div class="input-feild">

										<select name="dept_ID" id="dept_ID">
										    <?php

										    echo '<option value="'.$dept_ID.'">'.$dept_name.'</option>';

										    ?>
										</select>

									</div>
									<div class="input-label"><label >Designation</label></div>								
									<div class="input-feild">

										<select name="desig_ID" id="desig_ID">
											<?php
										    
										    echo '<option value="'.$desig_ID.'">'.$Desig_name.'</option>';

										    ?>
										</select>

									</div>
										<div class="input-label"><label >Role</label></div>	
									<div class="input-feild">

										<select name="role_ID" id="role_ID">
										  <?php
										    
										    echo '<option value="'.$role_ID.'">'.$role_Name.'</option>';

										    ?>
										</select>

									</div>				
								</div>

								<div class="col-md-6">
									<div class="input-label"><label >Auth ID</label></div>
									<div class="input-feild">

										<select name="Auth_ID" id="Auth_ID">
										   <option><?php echo $auth_Name; ?></option>
										</select>
										<a href="customAuth.php?user_id=<?php echo $user_id; ?>" target="_blank">Customize</a>

									</div>
									<div class="input-label"><label >Manager</label></div>
									<div class="input-feild">

										<input  type="text" name="user_manager" id="user_manager" value="<?php echo $user_manager; ?>">

									</div>

									<div class="input-label"><label >Status</label></div>
									<div class="input-feild">

										<select name="user_status" id="user_status">
										    <option><?php echo $user_status ; ?></option>
										</select>

									</div>

									<div class="input-label"><label >Active</label></div>
									<div class="input-feild act_btn_user">
										<input name="user_active" id="user_active" type="checkbox" checked />
									</div>

								</div>
		</div>
										<div class="cls"></div>
										<hr>
		<div class="acount_info">

								<div class="col-md-6">
										<div class="input-label"><label >Password</label></div>
									<div class="input-feild">
										<input type="password" name="user_pswd" id="user_pswd" value="<?php echo $user_pswd; ?>" placeholder="Enter Password" />
										<input type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $user_pswd; ?>" placeholder="Confirm Password" />
									</div>
								</div>	
		</div>							
										<div class="cls"></div>
										<hr>
		<div class="efctive_dates_info">
								<div class="col-md-6">	
									<div class="input-label"><label >Date Of Joining</label></div>
									<div class="input-feild">
										<input type="date" name="user_DOJ" id="user_DOJ" value="<?php echo $user_DOJ; ?>" data-date-inline-picker="false" data-date-open-on-focus="true" />
									</div>
								</div>	
								<div class="col-md-6">	
								<div class="input-label"><label >Date Of Leaving</label></div>
								<div class="input-feild">
									<input type="date" name="user_DOL" id="user_DOL" data-date-inline-picker="false" data-date-open-on-focus="true" />
								</div>
								</div>

								<br><br><br>

								<div class="form_sec_action_btn col-md-12">
									<button type="button" id="btnDelete" disabled> <small>Delete</small></button>
									<button type="button" id="btnConfirm_S"> <small>Save</small></button>
									<a id="btnEnable" href="searchResult_U.php?user_id=<?php echo $row['user_ID']; ?>"><small>Cancel</small></a>				
								</div>

								<div class="col-md-12 topscrolbtn">
									<a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
								</div>		
		</div>	
		</form>
							
	</div>
</div>

<script>
$("#scroltop").click(function() {
	  $("html").animate({ scrollTop: 0 }, "slow");
	});
</script>

<script type="text/javascript">
	 function FormValidation()
	 {
	 	regexp = /^[a-z]*$/i;
	 	re = /\S+@\S+\.\S+/;
	    var missingVal = 0;
	    var user_lName=document.getElementById('user_lName').value;
	    var user_fName=document.getElementById('user_fName').value;
	    var user_mName=document.getElementById('user_mName').value;
	    var user_DOB=document.getElementById('user_DOB').value;
	    // var fileToUpload=document.getElementById('fileToUpload').value;
	    var user_email=document.getElementById('user_email').value;
	    var user_contact=document.getElementById('user_contact').value;
	    // var emerg_contact=document.getElementById('emerg_contact').value;
	    // var user_region=document.getElementById('user_region').value;
	    // var user_address=document.getElementById('user_address').value;
	    // var dept_ID=document.getElementById('dept_ID').value;
	    // var desig_ID=document.getElementById('desig_ID').value;
	    // var role_ID=document.getElementById('role_ID').value;
	    // var Auth_ID=document.getElementById('Auth_ID').value;
	    // var user_status=document.getElementById('user_status').value;
	    var user_active=document.getElementById('user_active').value;
	    var user_pswd=document.getElementById('user_pswd').value;
	    var confirmPassword=document.getElementById('confirmPassword').value;
	    // var user_DOJ=document.getElementById('user_DOJ').value;
	    // var city=document.getElementById('city').value;
	    // var country=document.getElementById('country').value;
	    //var lineBr = document.getElementByClass('cls').value;
	    var summary = "Summary: ";

	    if (!regexp.test(user_fName))
	    {
	      document.getElementById('user_fName').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_fName").innerHTML = "Firstname must be string.";
	    }
	    if(user_fName == "")
	    {
	        document.getElementById('user_fName').style.borderColor = "red";
	        missingVal = 1;
	        // summary += "Firstname is required.";
	        document.getElementById("s_fName").innerHTML = "Firstname is required.";
	    }
	    if(user_fName != "")
	    {
	        document.getElementById('user_fName').style.borderColor = "white";
	        document.getElementById("s_fName").innerHTML = "";
	    }

	    if (!regexp.test(user_lName))
	    {
	      document.getElementById('user_lName').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_nName").innerHTML = "Lastname must be string.";
	    }
	    if(user_lName == "")
	    {
	        document.getElementById('user_lName').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Lastname is required.";
	        document.getElementById("s_nName").innerHTML = "Lastname is required.";
	    }
	    if(user_lName != "")
	    {
	        document.getElementById('user_lName').style.borderColor = "white";
	        document.getElementById("s_nName").innerHTML = "";
	    }

	    if (!regexp.test(user_mName))
	    {
	      // document.getElementById('user_mName').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_mName").innerHTML = "Middle name must be string.";
	    }

	    if(user_DOB == "")
	    {
	        document.getElementById('user_DOB').style.borderColor = "red";
	        missingVal = 1;
	        // summary +=  " Date of birth is required ";
	        document.getElementById("s_dob").innerHTML = "Date of birth is required.";
	    }
	    if(user_DOB != "")
	    {
	        document.getElementById('user_DOB').style.borderColor = "white";
	        document.getElementById("s_dob").innerHTML = "";
	    }
	    /*if(fileToUpload == "")
	    {
	        document.getElementById('fileToUpload').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Picture required.";
	        document.getElementById("s_profile").innerHTML = "Picture required.";
	    }*/
	    if(user_email == "")
	    {
	        document.getElementById('user_email').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Email id required.";
	        document.getElementById("s_emailID").innerHTML = "Email id required.";
	    }
	    if (!re.test(user_email))
	    {
	      document.getElementById('user_email').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("s_emailID").innerHTML = "Please follow the email format (user@domain.com).";
	    }
	    if(user_email == "")
	    {
	        document.getElementById('user_email').style.borderColor = "white";
	        document.getElementById("s_emailID").innerHTML = "";
	    }

	    if(user_contact == "")
	    {
	        document.getElementById('user_contact').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Contact number required.";
	        document.getElementById("s_contactNm").innerHTML = "Contact number required.";
	    }
	    if(user_contact != "")
	    {
	        document.getElementById('user_contact').style.borderColor = "white";
	        document.getElementById("s_contactNm").innerHTML = "";
	    }
	    /*if(emerg_contact == "")
	    {
	        document.getElementById('emerg_contact').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Emergency contact required.";
	        document.getElementById("s_emrgCont").innerHTML = "Emergency contact required.";
	    }
	    if(user_region == "")
	    {
	        document.getElementById('user_region').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Region required.";
	        document.getElementById("s_region").innerHTML = "Region required.";
	    }*/
	    /*if(user_address == "")
	    {
	        document.getElementById('user_address').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Address required.";
	        document.getElementById("s_address").innerHTML = "Address required.";
	    }
	    if(dept_ID == "")
	    {
	        document.getElementById('dept_ID').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Department required.";
	        document.getElementById("s_department").innerHTML = "Department required.";
	    }*/
	    /*if(desig_ID == "")
	    {
	        document.getElementById('desig_ID').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Designation of birth is required.";
	        document.getElementById("s_designation").innerHTML = "Designation of birth is required.";
	    }
	    if(role_ID == "")
	    {
	        document.getElementById('role_ID').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Role of birth is required.";
	        document.getElementById("s_role").innerHTML = "Role of birth is required.";
	    }
	    if(user_status == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('user_status').style.borderColor = "red";
	        missingVal = 1;
	    }*/
	    /*if(user_active == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('user_active').style.borderColor = "red";
	        missingVal = 1;
	    }*/
	    if(user_pswd == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('user_pswd').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Password required.";
	        document.getElementById("s_user_pswd").innerHTML = "Password required.";
	    }
	    if(user_pswd != "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('user_pswd').style.borderColor = "white";
	        document.getElementById("s_user_pswd").innerHTML = "";
	    }

	    if(confirmPassword == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('confirmPassword').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Confirm Password required.";
	        document.getElementById("s_confirmPassword").innerHTML = "Confirm Password required.";
	    }
	    if(confirmPassword != "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('confirmPassword').style.borderColor = "white";
	        document.getElementById("s_confirmPassword").innerHTML = "";
	    }

	    if(confirmPassword != user_pswd)
	    {
	        // alert('Please Enter First Name');
	        //document.getElementById('confirmPassword').style.borderColor = "red";
	        document.getElementById('user_pswd').style.borderColor = "red";
	        document.getElementById('confirmPassword').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Passwords doesn't match.";
	        document.getElementById("s_pswdMatch").innerHTML = "Passwords doesn't match.";
	    }
	    /*if(user_DOJ == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('user_DOJ').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Date of joining required.";
	        document.getElementById("s_DOJ").innerHTML = "Date of joining required.";
	    }
	    if(city == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('city').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " City required.";
	        document.getElementById("s_city").innerHTML = "City required.";
	    }*/
	    /*if(country == "")
	    {
	        // alert('Please Enter First Name');
	        document.getElementById('country').style.borderColor = "red";
	        missingVal = 1;
	        // summary += " Country required.";
	        document.getElementById("s_country").innerHTML = "Country required.";
	    }*/

	    if (missingVal != 1)
	    {
	    	document.getElementById('user_fName').style.borderColor = "white";
	    	document.getElementById('user_lName').style.borderColor = "white";
	    	document.getElementById('user_DOB').style.borderColor = "white";
	    	// document.getElementById('fileToUpload').style.borderColor = "white";
	    	document.getElementById('user_email').style.borderColor = "white";
	    	document.getElementById('user_contact').style.borderColor = "white";

	    	// document.getElementById('emerg_contact').style.borderColor = "white";
	    	// document.getElementById('user_region').style.borderColor = "white";
	    	// document.getElementById('user_address').style.borderColor = "white";
	    	// document.getElementById('dept_ID').style.borderColor = "white";
	    	// document.getElementById('desig_ID').style.borderColor = "white";
	    	// document.getElementById('role_ID').style.borderColor = "white";
	    	// document.getElementById('Auth_ID').style.borderColor = "white";

	    	// document.getElementById('user_status').style.borderColor = "white";
	    	document.getElementById('user_active').style.borderColor = "white";
	    	document.getElementById('user_pswd').style.borderColor = "white";
	    	document.getElementById('confirmPassword').style.borderColor = "white";
	    	// document.getElementById('user_DOJ').style.borderColor = "white";
	    	// document.getElementById('city').style.borderColor = "white";
	    	// document.getElementById('country').style.borderColor = "white";

            /*$(document).ready(function(){
		    $("#btnConfirm_S").click(function(){*/
		    $("#popup_1").modal();
		    /*});
			});*/
	    }

	    if (missingVal == 1)
	    {
	    	document.getElementById("formSummary").textContent="Error: ";
	    }
	    /*if (/^[0-9]+$/.test(document.getElementById("firstname").value)) {
	        alert("First Name Contains Numbers!");
	        document.getElementById('firstname').style.borderColor = "red";
	        return false;
	    }else{
	        document.getElementById('firstname').style.borderColor = "green";
	    }
	    if(fn.length <=2){
	        alert('Your Name is To Short');
	        document.getElementById('firstname').style.borderColor = "red";
	        return false;
	    }else{
	        document.getElementById('firstname').style.borderColor = "green";
	    }*/
	}
</script>

<script>
$(document).ready(function(){
  $("#btnConfirm_S").click(function(){
    $("#popup_1").modal();
  });
});
</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>