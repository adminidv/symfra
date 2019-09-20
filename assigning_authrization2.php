<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide'; 


if (isset($_POST['btnSubmit']))
{
  // Setting the POST variables coming from form
  $dept_Name = $_POST['dept'];
  $desig_Name = $_POST['desig'];
  $auth_Name = $_POST['auth'];

  //Inserting records to Assign Authorization table
  $insertAuthSet = mysqli_query($con, "insert into authAssign (dept_Name, desig_Name, auth_Name) values ('$dept_Name', '$desig_Name', '$auth_Name')");

  if ($insertAuthSet)
  {
    //updating the user and autorization id

    // Generating the alert
    $msg = "Authorization assigned successfully.";
    function alert($msg)
      {
      echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      alert($msg);
  }

  else
  {
    // Generating the alert
    $msg2 = "Got error.";
    function alert($msg2)
      {
      echo "<script type='text/javascript'>alert('$msg2');</script>";
      }
      alert($msg2);
  }

  $upqry= mysqli_query($con, "UPDATE users SET Auth_ID = '$auth_Name' WHERE dept_ID= '$dept_Name' AND desig_ID='$desig_Name' ");
  if ($upqry) {
    // echo 'all done';
  }
  else
  {
    echo mysqli_error($con);
  }

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Assign Authorization</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>
  <script src="/js/jquery-1.12.4.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
<style type="text/css">
.authtable_subhdingnRow {
background-color: #c1c1c1 !important;

}
.authtable_subhdingnRow th {
background-color: #c1c1c1 !important;

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
          <a href="#" class="btn btn-info active">Assign Authorization</a>
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

<div class=" add_user_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
		<form action="" method="POST" enctype="multipart/form-data">

	     
	    <!-- Modal_one-->
        <div class="modal fade symfra_popup1" id="draftModal" role="dialog">
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
                  <button type="submit" name="abcd">No</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>

			 <label id="formSummary" style="color: red;"></label>

				<div class="Bsic_usr_info widget_iner_box">

								<div class="form_sec_action_btn col-md-12">
										<div class="form_action_right_btn">
						                      <!-- Go back button code starting here -->
						                      <?php include('inc_widgets/backBtn.php'); ?>
						                      <!-- Go back button code ending here -->
										</div>
										<button type="button" id="btnSubmitauth" onclick="saveDraft()"> <small>Submit</small></button>
										
										<button type="button" name="submitBtn"> <small>Cancel</small></button>				
								</div>
												
												<div class="cls"></div>

								 <div class="col-md-6">

                                                <div class="input-label"><label >Select Authorization </label></div>
                                                <div class="input-feild">
                                                  <select name="auth" required>
                                                    <option value="Select">Select </option>
                                                    <?php

                                                      $selectDept = mysqli_query($con, "select * from authorizationset");

                                                      while ($rowDept = mysqli_fetch_array($selectDept))
                                                      {
                                                        echo '<option value="'.$rowDept['Auth_ID'].'">'.$rowDept['auth_Name'].'</option>';
                                                      }

                                                    ?>
                                                  </select>
                                                </div>         
                 </div>

        </div>
                 <div class="cls"></div>
                 <hr>

          <div class=" widget_iner_box">
                 

                                          <div class="col-md-6">
                                                <div class="input-label"><label >Select Department </label></div>
                                                <div class="input-feild">
                                                
                                                <select name="dept" required>
                                                    <option value="Select">Select </option>
                                                    <?php

                                                      $selectDept = mysqli_query($con, "select * from department");

                                                      while ($rowDept = mysqli_fetch_array($selectDept))
                                                      {
                                                        echo '<option value="'.$rowDept['dept_ID'].'">'.$rowDept['dept_name'].'</option>';
                                                      }

                                                    ?>
                                                </select>
                                                </div>

                                          </div>

                                          <div class="col-md-6">   

                                                <div class="input-label"><label >Select Designation </label></div>
                                                <div class="input-feild">
                                                <select name="desig" required>
                                                  <option value="Select">Select </option>
                                                  <?php

                                                    $selectDesig = mysqli_query($con, "select * from designation");

                                                    while ($rowDesig = mysqli_fetch_array($selectDesig))
                                                    {
                                                      echo '<option value="'.$rowDesig['Desig_ID'].'">'.$rowDesig['Desig_name'].'</option>';
                                                    }

                                                  ?>
                                              </select>
                                                </div>     


                                          </div>
                </div>
		
				</div>			
										<div class="cls"></div>
										<hr>

			
		</form>
				

	</div>
</div>




</script>




<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
   function saveDraft()
   {
    $("#draftModal").modal();
   }
   
   
</script>



</body>
</html>