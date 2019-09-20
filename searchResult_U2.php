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
	<title>View User</title>
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

	<script type="text/javascript">
	    $(document).ready(function(){
	        $("#user_ID").prop("disabled", true);
	        $("#user_fName").prop("disabled", true);
	        $("#user_mName").prop("disabled", true);
	        $("#user_lName").prop("disabled", true);
	        $("#user_DOB").prop("disabled", true);
	        $("#fileToUpload").prop("disabled", true);
	        $("#user_email").prop("disabled", true);;
	        $("#user_contact").prop("disabled", true);
	        $("#emerg_contact").prop("disabled", true);
	        $("#user_region").prop("disabled", true);
	        $("#user_address").prop("disabled", true);
	        $("#dept_ID").prop("disabled", true);
	        $("#desig_ID").prop("disabled", true);
	        $("#role_ID").prop("disabled", true);
	        $("#Auth_ID").prop("disabled", true);
	        $("#user_manager").prop("disabled", true);
	        $("#user_status").prop("disabled", true);
	        $("#user_active").prop("disabled", true);
	        $("#user_pswd").prop("disabled", true);
	        $("#confirmPassword").prop("disabled", true);
	        $("#user_DOJ").prop("disabled", true);
	        $("#user_DOL").prop("disabled", true);
	        $("#btnSubmit").prop("disabled", true);
	        $("#btnDelete").prop("disabled", true);

	    });
	</script>

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
          <a href="searchResult_U.php" class="btn btn-info active">View User</a>
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

		<div class="Bsic_usr_info">

						<div class="form_sec_action_btn col-md-12">
								<div class="form_action_right_btn">
									<!-- Go back button code starting here -->
			                      <?php include('inc_widgets/backBtn.php'); ?>
			                      <!-- Go back button code ending here -->
								</div>
								<button type="button" id="btnDelete"> <small>Delete</small></button>
								<button type="button" id="btnSubmit"> <small>Save</small></button>
								<a id="btnEnable" href="searchResult_UE.php?user_id=<?php echo $row['user_ID']; ?>"> <small>Edit</small></a>				
						</div>
										
										<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label >User Id</label></div>

									<div class="input-feild">
										<input  type="text" name="user_ID" id="user_ID" value="<?php echo $user_ID; ?>" placeholder="Enter an ID">
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
										<input  type="text" name="user_region" id="user_region" value="<?php echo $user_region; ?>" placeholder="Enter Your Region">									</div>

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
											<option><?php echo $dept_name; ?> </option>
										</select>

									</div>
									<div class="input-label"><label >Designation</label></div>								
									<div class="input-feild">

										<select name="desig_ID" id="desig_ID">
											<option><?php echo $Desig_name ; ?> </option>
										</select>

									</div>
										<div class="input-label"><label >Role</label></div>	
									<div class="input-feild">

										<select name="role_ID" id="role_ID">
										  <option><?php echo $role_Name ; ?> </option>
										</select>

									</div>				
								</div>

								<div class="col-md-6">
									<div class="input-label"><label >Auth ID</label></div>
									<div class="input-feild">

										<select name="Auth_ID" id="Auth_ID">
										   <option><?php echo $Auth_ID; ?></option>
										</select>

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

<script src="js/bootstrap.min.js"></script>

</body>
</html>