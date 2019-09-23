<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$selectLastID = mysqli_query($con, "SELECT * FROM users ORDER BY user_ID DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['user_ID'];
$newID = $lastID + 1;
$user_ID = $newID;

// Calculating date & time for notification 
$dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$dateTime2 = $dateTime->format("m/d/y  H:i");

$semiFinal2 = date('h:i A', strtotime($dateTime2));

$dateTimeFinal = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$semiFinal3 = $dateTime->format("d/m/y");
$finalDate = $semiFinal3 . ' ' . $semiFinal2;
// echo $final;

// echo $lasID;

$userID = $_SESSION['user'];

// After Submit
if(isset($_POST['submitBtn']))
{
	// Setting the POST variables coming from form
	// $user_ID = $_POST['user_ID'];
	$user_fName = $_POST['user_fName'];

	$user_mName = $_POST['user_mName'];
	$user_lName = $_POST['user_lName'];

	$user_pswd = $_POST['user_pswd'];
	$user_address = $_POST['user_address'];

	$user_contact = $_POST['user_contact'];
	$user_email = $_POST['user_email'];

	$dept_ID = $_POST['dept_ID'];
	$desig_ID = $_POST['desig_ID'];

	// $user_manager = $_POST['user_manager'];

	$user_status = $_POST['user_status'];
	$user_active = $_POST['user_active'];

	$user_region = $_POST['user_region'];
	$emerg_contact = $_POST['emerg_contact'];

	$user_DOB = $_POST['user_DOB'];
	$user_DOJ = $_POST['user_DOJ'];
	$userBr = $_POST['userBr'];
	$Auth_ID = $_POST['Auth_ID'];

	if (isset($_POST['user_active']))
	{
		$user_active='Active';
	}
	else
	{
		$user_active='Inactive';
	}

	/*if ($dept_ID == '1008' && $desig_ID == '2005' && $role_ID == '3006')
	{
		$Auth_ID = '11';
	}
	else
	{
		$Auth_ID = '13';
	}*/

	$userNameArr = explode("@",$user_email);

	$userName = $userNameArr[0];
	//echo '<br>' . $userNameArr[1];

	//$user_DOL = $_POST['user_DOL'];

	// Checking if the user's age is less than 18
	$dateToday = date("Y-m-d");
	$arrayToday = explode("-",$dateToday);
	$dobArray = explode("-",$user_DOB);

	$currentYear = $arrayToday[0];
	$dobYear = $dobArray[0];

	$yearDiff = $currentYear - $dobYear;

	if ($yearDiff < 18)
	{
		echo '<script type="text/javascript">'; 
	    echo 'alert("User age must be greater than or equals to 18.");';
	    // echo 'window.location.href = "master_bp_table.php";';
	    echo '</script>';
	}
	
	else
	{
		// Checking the user credentials
	    $selectManager = mysqli_query($con, "SELECT * FROM users WHERE dept_ID='". $dept_ID ."' AND desig_ID = '2001' ");
	    if(mysqli_num_rows($selectManager) > 0)
		{
			while ($rowManager = mysqli_fetch_array($selectManager))
			{
				$user_manager = $rowManager['user_fName'] . ' ' . $rowManager['user_mName'] . ' ' . $rowManager['user_lName'];
			}
		}
		else
		{
			$user_manager = 0;
		}

		// Setting the image file
		$target_dir = "Profile Images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		$fileTmpName = $_FILES["fileToUpload"]["name"];
		$fileType = $_FILES["fileToUpload"]["type"];

		if($check !== false)
	    {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    }
	    else
	    {
	        // echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    // Check if file already exists
		if (file_exists($target_file))
		{
		    // echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000)
		{
		   //  echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Setting file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
		{
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// If there is some error
		if ($uploadOk == 0)
		{
		    $msg3 = "Sorry, your file was not uploaded.";

		    function alert($msg3)
	        {
	        echo "<script type='text/javascript'>alert('$msg3');</script>";
	        }
	        // alert($msg3);

	        // Inserting records to DB
			$insertQuery = mysqli_query($con, "insert into users (user_ID, user_fName, user_mName, user_lName, userName, user_pswd, user_address, user_contact, user_email, dept_ID, desig_ID, Auth_ID, user_manager, user_status, user_active, user_region, emerg_contact, user_DOB, user_DOJ) values  ('$newID', '$user_fName', '$user_mName', '$user_lName', '$userName', '$user_pswd', '$user_address', '$user_contact', '$user_email', '$dept_ID', '$desig_ID', '$Auth_ID', '$user_manager', '$user_status', '$user_active', '$user_region', '$emerg_contact', '$user_DOB', '-')");

            echo '<script type="text/javascript">'; 
		    echo 'alert("User added successfully.");';
		    echo 'window.location.href = "add_user.php";';
		    echo '</script>';
		}
		// if everything is ok
		else
		{
			$str_array = explode(".",$fileTmpName);
			$img_name = $str_array[0];
			$img_extension = $str_array[1];

			//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			// Giving the desired name to image
			$finalName = $target_dir . $user_ID . '.' . $img_extension;

			// Setting the image name for table entry
			$nameForTable = $user_ID . '.' . $img_extension;

			// Checking for approval if present
			$selectAppFlow = mysqli_query($con, "SELECT * FROM appdoc WHERE appDept = 'User Management' ");
		    $appFlowRecs = mysqli_num_rows($selectAppFlow);
		    if ($appFlowRecs > 0)
		    {
		      while ($rowAppFlow = mysqli_fetch_array($selectAppFlow))
		      {
		        $thisApproval = 'Approval on ' . $rowAppFlow['app1'];
		        // Approval one
		        $notOn = $rowAppFlow['app1'];
		      }

			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalName))
			  {
			  	// echo "The file has been uploaded.";

			    // Inserting records to DB
				$insertQuery = mysqli_query($con, "insert into users (user_ID, user_fName, user_mName, user_lName, userName, user_pswd, user_address, user_contact, user_email, dept_ID, desig_ID, Auth_ID, user_manager, user_status, user_active, user_region, emerg_contact, user_DOB, user_DOJ, userBr, user_img) values  ('$newID', '$user_fName', '$user_mName', '$user_lName', '$userName', '$user_pswd', '$user_address', '$user_contact', '$user_email', '$dept_ID', '$desig_ID', '$Auth_ID', '$user_manager', 'Need Approval', '$thisApproval', '$user_region', '$emerg_contact', '$user_DOB', '-', '$userBr', '$nameForTable')");

				// $userID = $_SESSION['user'];
				$selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
				while ($rowNotUser = mysqli_fetch_array($selectUsername))
				{
					$userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
				}

				// Username for notification
				// $userNot = $user_fName . ' ' . $user_lName;

				// Inserting notification
				$insertNot = mysqli_query($con, "INSERT INTO notTable (notTitle, notDateTime, notStatus, createdBy, notOn, notRecord) VALUES ('User Management', '$finalDate', 'Approval Pending', '$userNot', '$notOn', '$newID') ") or die(mysqli_error($con));

				// echo "The record is inserted successfully.";

				// Generating the alert
				/*$msg = "Record is inserted successfully.";
				function alert($msg)
	            {
	            echo "<script type='text/javascript'>alert('$msg');</script>";
	            }
	            alert($msg);*/

	            echo '<script type="text/javascript">'; 
			    // echo 'alert("User added successfully.");';
			    echo 'window.location.href = "add_user.php";';
			    echo '</script>';
			   }
			   else
			   {
		        $msg2 = "Sorry, there was an error uploading your file. Data is not inserted";

		        // $msg2 = "Record is inserted successfully.";
				function alert($msg2)
	            {
	            echo "<script type='text/javascript'>alert('$msg2');</script>";
	            }
	            alert($msg2);
			   }
			}

			else
			{
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalName))
			  {
			  	// echo "The file has been uploaded.";

			    // Inserting records to DB
				$insertQuery = mysqli_query($con, "insert into users (user_ID, user_fName, user_mName, user_lName, userName, user_pswd, user_address, user_contact, user_email, dept_ID, desig_ID, Auth_ID, user_manager, user_status, user_active, user_region, emerg_contact, user_DOB, user_DOJ, user_img) values  ('$newID', '$user_fName', '$user_mName', '$user_lName', '$userName', '$user_pswd', '$user_address', '$user_contact', '$user_email', '$dept_ID', '$desig_ID', '$Auth_ID', '$user_manager', '$user_status', '$user_active', '$user_region', '$emerg_contact', '$user_DOB', '-', '$nameForTable')");

				// echo "The record is inserted successfully.";

				// Generating the alert
				/*$msg = "Record is inserted successfully.";
				function alert($msg)
	            {
	            echo "<script type='text/javascript'>alert('$msg');</script>";
	            }
	            alert($msg);*/

	            echo '<script type="text/javascript">'; 
			    echo 'alert("User added successfully.");';
			    echo 'window.location.href = "add_user.php";';
			    echo '</script>';
			   }
			   else
			   {
		        $msg2 = "Sorry, there was an error uploading your file. Data is not inserted";

		        // $msg2 = "Record is inserted successfully.";
				function alert($msg2)
	            {
	            echo "<script type='text/javascript'>alert('$msg2');</script>";
	            }
	            alert($msg2);
			   }
			}


		}
	}
}

// After Submit
if(isset($_POST['saveBtn2']))
{
	// Setting the POST variables coming from form
	// $user_ID = $_POST['user_ID'];
	$user_fName = $_POST['user_fName'];

	$user_mName = $_POST['user_mName'];
	$user_lName = $_POST['user_lName'];

	$user_pswd = $_POST['user_pswd'];
	$user_address = $_POST['user_address'];

	$user_contact = $_POST['user_contact'];
	$user_email = $_POST['user_email'];

	$dept_ID = $_POST['dept_ID'];
	$desig_ID = $_POST['desig_ID'];

	// $user_manager = $_POST['user_manager'];

	$user_status = $_POST['user_status'];
	$user_active = $_POST['user_active'];

	$user_region = $_POST['user_region'];
	$emerg_contact = $_POST['emerg_contact'];

	$user_DOB = $_POST['user_DOB'];
	$user_DOJ = $_POST['user_DOJ'];

	if (isset($_POST['user_active']))
	{
		$user_active='Active';
	}
	else
	{
		$user_active='Inactive';
	}

	if ($dept_ID == '1008' && $desig_ID == '2005' && $role_ID == '3006')
	{
		$Auth_ID = '11';
	}
	else
	{
		$Auth_ID = '13';
	}

	$userNameArr = explode("@",$user_email);

	$userName = $userNameArr[0];
	//echo '<br>' . $userNameArr[1];

	//$user_DOL = $_POST['user_DOL'];

	// Checking if the user's age is less than 18
	$dateToday = date("Y-m-d");
	$arrayToday = explode("-",$dateToday);
	$dobArray = explode("-",$user_DOB);

	$currentYear = $arrayToday[0];
	$dobYear = $dobArray[0];

	$yearDiff = $currentYear - $dobYear;

	if ($yearDiff < 18)
	{
		echo '<script type="text/javascript">'; 
	    echo 'alert("User age must be greater than or equals to 18.");';
	    // echo 'window.location.href = "master_bp_table.php";';
	    echo '</script>';
	}
	
	else
	{
		// Checking the user credentials
	    $selectManager = mysqli_query($con, "SELECT * FROM users WHERE dept_ID='". $dept_ID ."' AND desig_ID = '2001' ");
	    if(mysqli_num_rows($selectManager) > 0)
		{
			while ($rowManager = mysqli_fetch_array($selectManager))
			{
				$user_manager = $rowManager['user_fName'] . ' ' . $rowManager['user_mName'] . ' ' . $rowManager['user_lName'];
			}
		}
		else
		{
			$user_manager = 0;
		}

		// Setting the image file
		$target_dir = "Profile Images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		$fileTmpName = $_FILES["fileToUpload"]["name"];
		$fileType = $_FILES["fileToUpload"]["type"];

		if($check !== false)
	    {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    }
	    else
	    {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    // Check if file already exists
		if (file_exists($target_file))
		{
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000)
		{
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Setting file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
		{
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// If there is some error
		if ($uploadOk == 0)
		{
		    $msg3 = "Sorry, your file was not uploaded.";

		    function alert($msg3)
	        {
	        echo "<script type='text/javascript'>alert('$msg3');</script>";
	        }
	        alert($msg3);
		}
		// if everything is ok
		else
		{
			$str_array = explode(".",$fileTmpName);
			$img_name = $str_array[0];
			$img_extension = $str_array[1];

			//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			// Giving the desired name to image
			$finalName = $target_dir . $user_ID . '.' . $img_extension;

			// Setting the image name for table entry
			$nameForTable = $user_ID . '.' . $img_extension;

		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalName))
		    {
		        // echo "The file has been uploaded.";

		        // Inserting records to DB
				$insertQuery = mysqli_query($con, "insert into users (user_ID, user_fName, user_mName, user_lName, userName, user_pswd, user_address, user_contact, user_email, dept_ID, desig_ID, Auth_ID, user_manager, user_status, user_active, user_region, emerg_contact, user_DOB, user_DOJ, user_img) values  ('$newID', '$user_fName', '$user_mName', '$user_lName', '$userName', '$user_pswd', '$user_address', '$user_contact', '$user_email', '$dept_ID', '$desig_ID', '$Auth_ID', '$user_manager', '$user_status', 'Draft', '$user_region', '$emerg_contact', '$user_DOB', '-', '$nameForTable')");

				// echo "The record is inserted successfully.";

				// Generating the alert
				/*$msg = "Record is inserted successfully.";
				function alert($msg)
	            {
	            echo "<script type='text/javascript'>alert('$msg');</script>";
	            }
	            alert($msg);*/

	            echo '<script type="text/javascript">'; 
			    echo 'alert("User saved successfully.");';
			    echo 'window.location.href = "add_user.php";';
			    echo '</script>';
		    }
		    else
		    {
		        $msg2 = "Sorry, there was an error uploading your file. Data is not inserted";

		        // $msg2 = "Record is inserted successfully.";
				function alert($msg2)
	            {
	            echo "<script type='text/javascript'>alert('$msg2');</script>";
	            }
	            alert($msg2);
		    }
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
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

	<script type="text/javascript">
		function readURL(input) 
		{
	        if (input.files && input.files[0])
	        {
	            var reader = new FileReader();

	            reader.onload = function (e)
	            {
	                $('#blah')
	                    .attr('src', e.target.result)
	                    .width(185)
	                    .height(185);
	            };

	            reader.readAsDataURL(input.files[0]);
	        }
    	}
	</script>

	<script type="text/javascript">
		$(document).ready(function() {

		      $.ajax({    //create an ajax request to display.php
		        type: "GET",
		        url: "displayDept.php",             
		        dataType: "html",   //expect html to be returned                
		        success: function(response){                    
		            $("#dept_ID").html(response); 
		            //alert(response);
		        }

		    });

	      	$.ajax({    //create an ajax request to display.php
		        type: "GET",
		        url: "displayDesig.php",             
		        dataType: "html",   //expect html to be returned                
		        success: function(response){                    
		            $("#desig_ID").html(response); 
		            //alert(response);
		        }

		    });

		    $.ajax({    //create an ajax request to display.php
		        type: "GET",
		        url: "displayRole.php",             
		        dataType: "html",   //expect html to be returned                
		        success: function(response){                    
		            $("#role_ID").html(response); 
		            //alert(response);
		        }

		    });

		});
	</script>

	<script type="text/javascript">
	 	setInterval(function(){tab_visibility()},500);

		tab_visibility = function(){

			var hidden, state, visibilityChange;

			if (typeof document.hidden !== "undefined") {
				state = "visibilityState";
			} else if (typeof document.mozHidden !== "undefined") {
				state = "mozVisibilityState";
			} else if (typeof document.msHidden !== "undefined") {
				state = "msVisibilityState";
			} else if (typeof document.webkitHidden !== "undefined") {
				state = "webkitVisibilityState";
			}
			
			if(document[state] == "hidden")
			{
				$(document).ready(function() {

				      $.ajax({    //create an ajax request to display.php
				        type: "GET",
				        url: "displayDept.php",             
				        dataType: "html",   //expect html to be returned                
				        success: function(response){                    
				            $("#dept_ID").html(response); 
				            //alert(response);
				        }

				    });

				});

				$(document).ready(function() {

				      $.ajax({    //create an ajax request to display.php
				        type: "GET",
				        url: "displayDesig.php",             
				        dataType: "html",   //expect html to be returned                
				        success: function(response){                    
				            $("#desig_ID").html(response); 
				            //alert(response);
				        }

				    });

				});

				$(document).ready(function() {

				      $.ajax({    //create an ajax request to display.php
				        type: "GET",
				        url: "displayRole.php",             
				        dataType: "html",   //expect html to be returned                
				        success: function(response){                    
				            $("#role_ID").html(response); 
				            //alert(response);
				        }

				    });

				});
			}
				
			else
			{

			}
				
		}

	</script>

	<script type="text/javascript">
        $(function () {
            var phoneMask = new Inputmask("####-#######");
            phoneMask.mask($('[id*=user_contact]'));
            phoneMask.mask($('[id*=emerg_contact]'));
            // phoneMask.mask($('[id*=empOffice]'));
            // phoneMask.mask($('[id*=empHomeNo]'));
        });
    </script>
<style type="text/css">


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
          <a href="add_user.php" class="btn btn-info active">Add User</a>
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

			 <h4><label id="formSummary" style="color: red;"></label></h4>
			 <p id="s_fName" style="color: red;"></p>
			 <p id="s_mName" style="color: red;"></p>
			 <p id="s_nName" style="color: red;"></p>
			 <p id="s_dob" style="color: red;"></p>
			 <p id="s_profile" style="color: red;"></p>
			 <p id="s_emailID" style="color: red;"></p>
			 <p id="s_contactNm" style="color: red;"></p>
			 <p id="s_emrgCont" style="color: red;"></p>
			 <p id="s_address" style="color: red;"></p>
			 <p id="s_region" style="color: red;"></p>
			 <p id="s_city" style="color: red;"></p>
			 <p id="s_country" style="color: red;"></p>
			 <p id="s_department" style="color: red;"></p>
			 <p id="s_designation" style="color: red;"></p>
			 <p id="s_role" style="color: red;"></p>
			 <p id="s_authID" style="color: red;"></p>
			 <p id="s_manager" style="color: red;"></p>
			 <p id="s_pass" style="color: red;"></p>
			 <p id="s_confirmPass" style="color: red;"></p>
			 <p id="s_confirmPassword" style="color: red;"></p>
			 <p id="s_user_pswd" style="color: red;"></p>
			 <p id="s_pswdMatch" style="color: red;"></p>
			 <p id="s_DOJ" style="color: red;"></p>
		
		<div class="Bsic_usr_info widget_iner_box">

						<div class="form_sec_action_btn col-md-12">
								<div class="form_action_right_btn">
								  <!-- Go back button code starting here -->
			                      <?php include('inc_widgets/backBtn.php'); ?>
			                      <!-- Go back button code ending here -->
								</div>
								<button type="button" id="btnConfirm_S" onclick="FormValidation();"><small>Submit</small></button>
								<button type="button" name="saveBtn" onclick="saveUserFunc();"> <small>Save</small></button>
								<button type="button" name="submitBtn" onclick="cancelFunc();"> <small>Cancel</small></button>				
						</div>
										
										<div class="cls"></div>

						<div class="col-md-6">
									<div class="input-label"><label >User ID</label></div>

									<div class="input-feild">
										<?php echo '<input type="text" name="user_ID" disabled value="'.$newID.'">'; ?>
									</div>


									<div class="input-label"><label > Name</label></div>	
							<div class="input-feild">
									<input  type="text" name="user_fName" id="user_fName" maxlength="30" placeholder="Enter First Name"><span class="steric">*</span>
									<input  type="text" name="user_mName" id="user_mName" maxlength="30" placeholder="Enter Middle Name">
									<input  type="text" name="user_lName" id="user_lName" maxlength="30" placeholder="Enter Last Name"><span class="steric">*</span>
							</div>

							<div class="input-label"><label >Branch</label></div>
							<div class="input-feild">
								<select name="userBr" id="userBr">
								   <option value="">Select</option>
								   <?php

								   $selectBr = mysqli_query($con, "SELECT * FROM branchsetup");
								   while($rowBr = mysqli_fetch_array($selectBr))
								   {
								   	echo '<option value="'.$rowBr['SrNo'].'">'.$rowBr['brName'].'</option>';
								   }

								   ?>
								</select>
							</div>

							
						</div>

						<div class="col-md-6">
									
									<div class="input-label"><label > Choose Profile Image</label></div>
										<div class="input-feild">
												<img src="images/user.png" style="width: 150px" id="blah">
												<input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">

										</div>
						</div>

										<div class="cls"></div>
		</div>			
										<div class="cls"></div>
										<hr>

		<div class="contct_usr_info widget_iner_box">

								<div class="col-md-6">
									<div class="input-label"><label >Email Address</label></div>
									<div class="input-feild">
										<input  type="text" name="user_email" id="user_email" onfocusout="forUsername()" placeholder="Enter an Email Address" maxlength="40"><span class="steric">*</span>
										<p id="showUName"></p>
									</div>

									<div class="input-label"><label >Contact No.</label></div>	
									<div class="input-feild">
										<input type="text" name="user_contact" onkeypress="return numbersOnly(this, event);" onpaste="return false;" id="user_contact" maxlength="11" placeholder="Enter Number"><span class="steric">*</span>
										<input type="text" name="emerg_contact" onkeypress="return numbersOnly(this, event);" onpaste="return false;" id="emerg_contact" maxlength="11" placeholder="Enter Emergency Number">

									</div>

									<div class="input-label"><label > Date of Birth</label></div>
									<div class="input-feild">
											<input type="date" name="user_DOB" id="user_DOB" max="2000-12-31" data-date-inline-picker="false" data-date-open-on-focus="true" /><span class="steric">*</span>
									</div>
								</div>
				
								<div class="col-md-6">
									<div class="input-label"><label >Address</label></div>
									<div class="input-feild">
										<textarea name="user_address" id="user_address" maxlength="50"></textarea>
					 				</div>

					 				<div class="input-label"><label >Region</label></div>
									<div class="input-feild">
										<input  type="text" name="user_region" id="user_region" placeholder="Enter Your Region">
									</div>

									<div class="input-label"><label >City</label></div>
									<div class="input-feild">
										<select name="city" id="city">
										   <option value="">Select</option>
										   <option value="Karachi">Karachi</option>
										   <option value="Hyderabad">Hyderabad</option>
										   <option value="Lahore">Lahore</option>
										   <option value="Islamabad">Islamabad</option>
										</select>
									</div>

									<div class="input-label"><label >Country</label></div>
									<div class="input-feild">
										<select name="country" id="country">
										   <option value="">Select</option>
										   <option value="Pakistan">Pakistan</option>
										   <option value="India">India</option>
										   <option value="United Kingdom">United Kingdom</option>
										   <option value="USA">USA</option>
										</select>
									</div>

									

								</div>
		</div>		
										<div class="cls"></div>
										<hr>

		<div class="slction_info widget_iner_box">
								<div class="col-md-6">
										<div class="input-label"><label >Department</label></div>
									<div class="input-feild">
												<select class="uform_slct_opt" name="dept_ID" id="dept_ID">
												    <option value="Select">Select </option>
												</select>
												<button class="slctfrm_btn" onclick="redirect_dept()" ><i class="fa fa-plus"></i></button>
									</div>
									<div class="input-label"><label >Designation</label></div>								
									<div class="input-feild">
												<select class="uform_slct_opt" name="desig_ID" id="desig_ID">
													<option value="Select">Select </option>
												</select>
												<button class="slctfrm_btn" onclick="redirect_desig()"><i class="fa fa-plus"></i></button>
									</div>				
								</div>

								<div class="col-md-6">
									<div class="input-label"><label >Role</label></div>
									<div class="input-feild">
												<select name="Auth_ID" id="Auth_ID">
												   <option value="">Select</option>
												   <?php

												   $selectAuths = mysqli_query($con, "SELECT * FROM authorizationset");
												   while ($rowAuths = mysqli_fetch_array($selectAuths))
												   {
												   	echo '<option value="'.$rowAuths['Auth_ID'].'">'.$rowAuths['auth_Name'].'</option>';
												   }

												   ?>
												</select>
									</div>
									<div class="input-label"><label >Manager</label></div>
									<div class="input-feild">
										<select name="user_manager" id="user_manager">
										  <option value="Select">Select</option>
										  <?php

											   $userManager = mysqli_query($con, "SELECT * FROM users "); 

											   while ($rowUserMan = mysqli_fetch_array($userManager))
											   {
											   	echo '<option value="'.$rowUserMan['user_fName']. ' ' . $rowUserMan['user_mName'] . '">'.$rowUserMan['user_fName'] . ' ' . $rowUserMan['user_mName'] .'</option>';
											   }

										   ?>
										</select>
									</div>

									<div class="input-label"><label >Status</label></div>
									<div class="input-feild">
										<select name="user_status" id="user_status">
										    <option>Select</option>
										</select>
									</div>

									<div class="input-label"><label >Active</label></div>
									<div class="input-feild act_btn_user">
										<input type="checkbox" name="user_active" checked id="user_active" />
									</div>

								</div>
		</div>
										<div class="cls"></div>
										<hr>
		<div class="acount_info widget_iner_box">

								<div class="col-md-6">
										<div class="input-label"><label >Password</label></div>
									<div class="input-feild">
											<input type="password" name="user_pswd" id="user_pswd" placeholder="Enter Password" /><span class="steric">*</span>
											<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" /><span class="steric">*</span>

									</div>
								</div>	
		</div>							
										<div class="cls"></div>
										<hr>
		<div class="efctive_dates_info widget_iner_box">
								<div class="col-md-6">	
									<div class="input-label"><label >Date Of Joining</label></div>
									<div class="input-feild">
										<input type="date" name="user_DOJ" id="user_DOJ" max="2030-12-31" data-date-inline-picker="false" data-date-open-on-focus="true" />
									</div>
								</div>	
								<div class="col-md-6">
								</div>

								<div class="form_sec_action_btn col-md-12">
									<button type="button" id="btnConfirm_S" onclick="FormValidation();"><small>Submit</small></button>
									<button type="button" name="saveBtn" onclick="saveUserFunc();"> <small>Save</small></button>
									<button type="button" name="submitBtn" onclick="cancelFunc();"> <small>Cancel</small></button>
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
<!--     <script src="js/jquery-3.3.1.js"></script>
 -->

<script type="text/javascript">

function redirect_dept()
{
	var url = "add_department.php";
	window.open(url);
}

function redirect_desig()
{
	var url = "add_designation.php";
	window.open(url);
}

function redirect_role()
{
	var url = "add_roles.php";
	window.open(url);
}

function cancelFunc()
{
	window.location = "add_user.php";
}

</script>

<script type="text/javascript">
	 function FormValidation()
	 {
	 	var regexp = /^[a-z]*$/i;
	 	var regexp2 = /^[0-9]*$/i;
	 	var re = /\S+@\S+\.\S+/;
	    var missingVal = 0;

	    var user_lName=document.getElementById('user_lName').value;
	    var user_fName=document.getElementById('user_fName').value;
	    var user_mName=document.getElementById('user_mName').value;
	    var user_DOB=document.getElementById('user_DOB').value;
	    // var fileToUpload=document.getElementById('fileToUpload').value;
	    var user_email=document.getElementById('user_email').value;
	    var user_contact=document.getElementById('user_contact').value;
	    var emerg_contact=document.getElementById('emerg_contact').value;
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

	        if (!regexp.test(user_fName))
		    {
		      document.getElementById('user_fName').style.borderColor = "red";
	          missingVal = 1;
	          // summary += "Firstname is required.";
	          document.getElementById("s_fName").innerHTML = "Only alphabets are allowed in firstname.";
		    }
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

	        if (!regexp.test(user_lName))
		    {
		      document.getElementById('user_lName').style.borderColor = "red";
	          missingVal = 1;
	          // summary += "Firstname is required.";
	          document.getElementById("s_nName").innerHTML = "Only alphabets are allowed in lastname.";
		    }
	    }

	    if(user_mName != "")
	    {
	        /*document.getElementById('user_mName').style.borderColor = "red";
	        missingVal = 1;
	        // summary +=  " Date of birth is required ";
	        document.getElementById("s_mName").innerHTML = "Date of birth is required.";*/

	        if (!regexp.test(user_mName))
		    {
		      document.getElementById('user_mName').style.borderColor = "red";
	          missingVal = 1;
	          // summary += "Firstname is required.";
	          document.getElementById("s_mName").innerHTML = "Only alphabets are allowed in middle name.";
		    }
	    }

	    if(user_mName == "")
	    {
	        document.getElementById('user_mName').style.borderColor = "white";
	        document.getElementById("s_mName").innerHTML = "";
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
	        // summary += " Contact number required.";
	        document.getElementById("s_emailID").innerHTML = "Email is required.";
	    }
      	if(user_email != "")
      	{
      		document.getElementById('user_email').style.borderColor = "white";
          	document.getElementById("s_emailID").innerHTML = "";

          	if (!re.test(user_email))
          	{
            	document.getElementById('user_email').style.borderColor = "red";
            	missingVal = 1;
            	// summary += "Firstname is required.";
            	document.getElementById("s_emailID").innerHTML = "Please follow the email format (user@domain.com).";
          	}
      	}

	    if(user_contact == "")
	    {
	    	document.getElementById('user_contact').style.borderColor = "red";
          	missingVal = 1;
          	// summary += " Contact number required.";
          	document.getElementById("s_contactNm").innerHTML = "Contact Number is required.";
	    }
      	if(user_contact != "")
      	{
      		document.getElementById('user_contact').style.borderColor = "white";
          	document.getElementById("s_contactNm").innerHTML = "";

          	if (!regexp2.test(user_contact))
          	{
            	document.getElementById('user_contact').style.borderColor = "red";
            	missingVal = 1;
            	// summary += "Firstname is required.";
            	document.getElementById("s_contactNm").innerHTML = "Contact number must not contain alphabet or special character.";
          	}
      	}

      	if(emerg_contact != "")
      	{
      		document.getElementById('emerg_contact').style.borderColor = "white";
          	document.getElementById("s_emrgCont").innerHTML = "";

          	if (!regexp2.test(emerg_contact))
          	{
            	document.getElementById('emerg_contact').style.borderColor = "red";
            	missingVal = 1;
            	// summary += "Firstname is required.";
            	document.getElementById("s_emrgCont").innerHTML = "Emergency Contact number must not contain alphabet or special character.";
          	}
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

  			var totalChar = user_pswd.length;
  			if (totalChar < 6)
  			{
  				document.getElementById('user_pswd').style.borderColor = "red";
	        	missingVal = 1;

  				document.getElementById("s_user_pswd").innerHTML = "Password must be greater than or equals to 6.";
  			}
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
		    $("#addUser_Modal").modal();
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
	function forUsername() {
	  var uName = document.getElementById("user_email").value;
	  var strArray = uName.split("@");
	        
	        // Display array values on page
	        for(var i = 0; i < strArray.length; i++){
	        	var uName = strArray[0];
	        }

	        document.getElementById("showUName").innerHTML = "Username for login will be:  " + uName;
	        //document.getElementById("demo").innerHTML
	        //document.getElementById('showUName').innerHTML = inputBox.value;
	}
	</script>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function saveUserFunc()
{
	$("#saveUser_Modal").modal();
}
</script>

<!-- Checking the profile image format -->
<script type="text/javascript">
	$('input[type=file]').change(function(e){
	  var file = $(this).val();
	  var ext = file.split('.').pop();
	  if (ext == "png" || ext == "jpeg" || ext == "jpg")
	  {
	  	
	  }
	  else
	  {
	  	alert("This file type is not supported.");
	  }
	});
</script>

<script type="text/javascript">
function numbersOnly(oToCheckField, oKeyEvent)
{
	return oKeyEvent.charCode === 0 || /\d/.test(String.fromCharCode(oKeyEvent.charCode));
}
</script>

</body>
</html>