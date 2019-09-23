<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'leaveMng';
$Quick = 'UnHide';
$Quickhr = 'Hide';

if(!isset($_POST['checkLeaves']))
{
	$pgSt = $_GET['pgSt'];

	if ($pgSt != 'AlEmp')
	{
		$userNo = $_GET['empNo'];

		// Fetching user info according to employee
		$qry= "SELECT * FROM empinfo WHERE empNo = '$userNo'";
		$run= mysqli_query($con , $qry);
		$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

		if ($userNo==$row['empNo'])
		{
		  $empName = $row['empFName'] . ' ' . $row['empLName'];
		  $empDept = $row['empDept'];
		  $empDesig = $row['empDesig'];
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
	}
	
}

$allow = '0';

if(isset($_POST['checkLeaves']))
{

$allow = '1';
$emp = $_POST['selectEmp'];
// $appBy = $_POST['appBy'];
$appBy = 'Anas Siddiqui';
$leaveHead = $_POST['leaveHead'];
$empReason = $_POST['empReason'];

// Code for getting week number of given date (from)
$ddate = $_POST['txtFrom'];
// $ddate = "2019-05-27";
$duedt = explode("-",$ddate);
$date = mktime(0, 0, 0, $duedt[1], $duedt[2],$duedt[0]);
$week = (int)date('W', $date);

$start =  $duedt[1] . '-' . $duedt[2];

// Code for getting week number of given date (from)
$endDdate = $_POST['txtTo'];
$endDuedt = explode("-",$endDdate);
$endDate = mktime(0, 0, 0, $endDuedt[1], $endDuedt[2],$endDuedt[0]);
$endWeek = (int)date('W', $endDate);
// $endWeek = '23';

// echo '<br>';
$end =  $endDuedt[1] . '-' . $endDuedt[2];
if($start < $end)
{
	$date1=date_create($ddate);
	$date2=date_create($endDdate);
	$diff=date_diff($date1,$date2);
	$diff2 = $diff->format("%a");
}

}

if(isset($_POST['submitBtn']))
{
	// Declaring variables for daily off hours
	$dday1 = 0;
	$dday2 = 0;
	$dday3 = 0;
	$dday4 = 0;
	$dday5 = 0;
	$dailyWorkingHrs = 8;
	$emp = 'Anas Siddiqui';
	$empDept = 'IT Department';
	$empDesig = 'Developer';

	$ddate = $_POST['txtFrom'];
	$endDdate = $_POST['txtTo'];
	$date1=date_create($ddate);
	$date2=date_create($endDdate);
	$diff=date_diff($date1,$date2);
	$diff2 = $diff->format("%a");
	$diff3 = $diff->format("%a");
	$diff3 = $diff3 + 1;
	// echo $diff2;
	$newDiff = 0;

	$leaveType = $_POST['leaveHead'];

	// Code for getting week number of given date (from)
	$ddate = $_POST['txtFrom'];
	// $ddate = "2019-05-27";
	$duedt = explode("-",$ddate);
	$date = mktime(0, 0, 0, $duedt[1], $duedt[2],$duedt[0]);
	$week = (int)date('W', $date);

	$start =  $duedt[1] . '-' . $duedt[2];

	// Code for getting week number of given date (from)
	$endDdate = $_POST['txtTo'];
	$endDuedt = explode("-",$endDdate);
	$endDate = mktime(0, 0, 0, $endDuedt[1], $endDuedt[2],$endDuedt[0]);
	$endWeek = (int)date('W', $endDate);
	// $endWeek = '23';

	// echo '<br>';
	$end =  $endDuedt[1] . '-' . $endDuedt[2];

	// echo '<br><br>';

	// echo '<br><br>';

	for ($i=$week ; $i<=$endWeek; $i++)
	{

	$date = new DateTime();
	$yy = '2019';
	$ww = $i;

	// echo '<br><br>';
	// echo "Week Nummer: ".$ww;

	// For Day 1
	$day1 = $date->setISODate($yy, $ww, "1")->format('m-d');
	if ($day1 >= $start && $day1 <= $end)
	{
		$newDiff = $newDiff + 1;
		$dday1 = $_POST[$day1];

		mysqli_query($con, "INSERT INTO leavemanagement (empID, empDept, empDesig, leaveType, leaveFrom, leaveTo, approvedBy, leaveReason, weekNo, weekDate, hoursTaken, status) VALUES ('".$emp."', '".$empDept."', '".$empDesig."', '".$leaveType."', '".$ddate."', '".$endDdate."', 'Anas Siddiqui', 'Some reason goes here', '".$ww."', '".$day1."', '".$dday1."' , 'taken')" ) or die(mysqli_error($con));
		// echo $dday1;

		// echo '<br>Date: ' . $day1;
	}
	else
	{
		// echo '<br><input type="text" name="'.$day1.'" value="'.$day1.'" disabled> Monday - '.$date->setISODate($yy, $ww, "1")->format('m-d');
	}

	// For Day 2
	$day2 = $date->setISODate($yy, $ww, "2")->format('m-d');
	if ($day2 >= $start && $day2 <= $end)
	{
		$newDiff = $newDiff + 1;
		$dday2 = $_POST[$day2];

		mysqli_query($con, "INSERT INTO leavemanagement (empID, empDept, empDesig, leaveType, leaveFrom, leaveTo, approvedBy, leaveReason, weekNo, weekDate, hoursTaken,status) VALUES ('".$emp."', '".$empDept."', '".$empDesig."', 'Sick', '".$ddate."', '".$endDdate."', 'Anas Siddiqui', 'Some reason goes here', '".$ww."', '".$day2."', '".$dday2."' ,'taken')" ) or die(mysqli_error($con));

		// echo '<br>Date: ' . $day2;
	}
	else
	{
		// echo '<br><input type="text" name="'.$day2.'" value="'.$day2.'" disabled>Tuesday - '.$date->setISODate($yy, $ww, "2")->format('m-d');
	}

	// For Day 3
	$day3 = $date->setISODate($yy, $ww, "3")->format('m-d');
	if ($day3 >= $start && $day3 <= $end)
	{
		$newDiff = $newDiff + 1;
		$dday3 = $_POST[$day3];

		mysqli_query($con, "INSERT INTO leavemanagement (empID, empDept, empDesig, leaveType, leaveFrom, leaveTo, approvedBy, leaveReason, weekNo, weekDate, hoursTaken ,status) VALUES ('".$emp."', '".$empDept."', '".$empDesig."', 'Sick', '".$ddate."', '".$endDdate."', 'Anas Siddiqui', 'Some reason goes here', '".$ww."', '".$day3."', '8' ,'taken')" ) or die(mysqli_error($con));

		// echo '<br>Date: ' . $day3;
	}
	else
	{
		// echo '<br><input type="text" name="'.$day3.'" value="8" disabled>Wednesday - '.$date->setISODate($yy, $ww, "3")->format('m-d');
	}

	// For Day 4
	$day4 = $date->setISODate($yy, $ww, "4")->format('m-d');
	if ($day4 >= $start && $day4 <= $end)
	{
		$newDiff = $newDiff + 1;
		$dday4 = $_POST[$day4];

		mysqli_query($con, "INSERT INTO leavemanagement (empID, empDept, empDesig, leaveType, leaveFrom, leaveTo, approvedBy, leaveReason, weekNo, weekDate, hoursTaken, status) VALUES ('".$emp."', '".$empDept."', '".$empDesig."', 'Sick', '".$ddate."', '".$endDdate."', 'Anas Siddiqui', 'Some reason goes here', '".$ww."', '".$day4."', '8','taken')" ) or die(mysqli_error($con));

		// echo '<br>Date: ' . $day4;
	}
	else
	{
		// echo '<br><input type="text" name="'.$day4.'" value="8" disabled>Thursday - '.$date->setISODate($yy, $ww, "4")->format('m-d');
	}

	// For Day 5
	$day5 = $date->setISODate($yy, $ww, "5")->format('m-d');
	if ($day5 >= $start && $day5 <= $end)
	{
		$newDiff = $newDiff + 1;
		$dday5 = $_POST[$day5];

		mysqli_query($con, "INSERT INTO leavemanagement (empID, empDept, empDesig, leaveType, leaveFrom, leaveTo, approvedBy, leaveReason, weekNo, weekDate, hoursTaken, status) VALUES ('".$emp."', '".$empDept."', '".$empDesig."', 'Sick', '".$ddate."', '".$endDdate."', 'Anas Siddiqui', 'Some reason goes here', '".$ww."', '".$day5."', '8', 'taken')" ) or die(mysqli_error($con));

		// echo '<br>Date: ' . $day5;
	}
	else
	{
		// echo '<br><input type="text" name="'.$day5.'" value="8" disabled>Friday - '.$date->setISODate($yy, $ww, "5")->format('m-d');
	}

	// For Day 6
	$day6 = $date->setISODate($yy, $ww, "6")->format('m-d');
	if ($day6 >= $start && $day6 <= $end)
	{
		// echo '<br><input type="text" name="'.$day6.'" value="8" disabled>Saturday - '.$date->setISODate($yy, $ww, "6")->format('m-d');
	}
	else
	{
		// echo '<br><input type="text" name="'.$day6.'" value="8" disabled>Saturday - '.$date->setISODate($yy, $ww, "6")->format('m-d');
	}

	// For Day 7
	$day7 = $date->setISODate($yy, $ww, "7")->format('m-d');
	if ($day7 >= $start && $day7 <= $end)
	{
		// echo '<br><input type="text" name="'.$day7.'" value="8" disabled>Sunday - '.$date->setISODate($yy, $ww, "7")->format('m-d');
	}
	else
	{
		// echo '<br><input type="text" name="'.$day7.'" value="8" disabled>Sunday - '.$date->setISODate($yy, $ww, "7")->format('m-d');
	}


	}

	$totalOffHrs = $dday1 + $dday2 + $dday3 + $dday4 + $dday5;
	// echo '<br>Total Off Hours are: '.$totalOffHrs.'<br>';
	$totalOffDays = $totalOffHrs / $dailyWorkingHrs;
	// echo '<br>Total Off Days: '.$totalOffDays.'<br>';

	$selectEmployeeL = mysqli_query($con, "SELECT * FROM leavestaken WHERE empID='Anas Siddiqui' AND leaveType='".$leaveType."' ");

	while ($rowL = mysqli_fetch_array($selectEmployeeL))
	{
		$leaveTotal =  $rowL['leaveTotal'];
		$leavesAvailed =  $rowL['leavesAvailed'];
		$leavesRemaining =  $rowL['leavesRemaining'];
		$leaveYear =  $rowL['leaveYear'];

		$leavesAvailed = $leavesAvailed + $totalOffDays;
		$leavesRemaining = $leavesRemaining - $totalOffDays;
		// echo '<br><br>';
		// echo $leavesAvailed . '<br>' . $leavesRemaining;
		// echo '<br><br>';

		mysqli_query($con, "UPDATE leavestaken SET leavesAvailed='".$leavesAvailed."', leavesRemaining='".$leavesRemaining."' WHERE empID='Anas Siddiqui' AND leaveType='".$leaveType."' AND leaveYear='2019' ") or die(mysqli_error($con));
	}

	header("Location: emptable.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Assign Leave</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/add_user.css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
   <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
		<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>

	<!-- Bread crumbs starting here -->
	<link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/modules.css" type="text/css">
	<link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
	<!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

    <script>
	function showRem(str) {
	    if (str == "") {
	        document.getElementById("txtRemLv").innerHTML = "";
	        return;
	    } else { 
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtRemLv").innerHTML = this.responseText;
	            }
	        };
	        document.getElementById("availShow1").style.display = "none";
	        document.getElementById("availShow2").style.display = "none";
	        xmlhttp.open("GET","availableLeaves.php?leaveType="+str,true);
	        xmlhttp.send();
	    }
	}
	</script>


<style type="text/css">
table#usertable input {
    text-align: center;
    width: 30px;
    margin-right: 15px;
}	
		.tab-pane {
		    padding: 20px 0px;
		}
		.input-label {
		   width: 20%;
		   float: left;
		   margin: 7px 0;
		   clear: both;
		}
		.input-feild {
		   width: 80%;
		   margin:3px 0;
		   float: right;
		}
		.input-feild input {
		   margin: 0;
		}
		.input-label label {
		   margin: 0 ;
		}
		.input-feild select {
		   margin: 0;
		}
		    /*.add_user_sec {
		   width: 85%;
		   position: absolute;
		   right: 0;
		   padding:15px;
		   top: 225px;
		}*/
		.input-feild.namefields input {
		   margin: 3px 0;
		}

		.input-feild.paswrdfields input {
		   margin: 3px 0;
		}
		.input-feild.contactfields input {
		   margin: 3px 0;
		}
		.confirmTable-modal .Popup_bdy button {
		    float: none;
		}

		.acount_info .tab-content {
		    background: #f3f3f3;
		}

		.acount_info  th {
		    padding: 4px 10px !important;
		    text-align: left;
		    background: #fff;
		}
		.acount_info  td {
		    padding: 4px 10px !important;
		    text-align: left;
		    border: none !important;
		}
		.acount_info input {
		    box-shadow: 0px 0px 6px -6px;
		    padding: 0px 0px;
		    width: 70%;
		    height: auto;
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
          <a href="usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="emp_leave_app2.php" class="btn btn-info active">Assign Leaves</a>
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
		<form action="emp_leave_app.php" method="POST" enctype="multipart/form-data" >

	        <!-- Modal_one-->
			 <div class="modal fade confirmTable-modal" id="assignLeavesModal" role="dialog">
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
			 <div class="modal fade confirmTable-modal" id="checkLeavesMod" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Confirmation</h4>
				        </div>
				        <div class="modal-body">
				          <p>Are You Sure You Want to Check?</p>
				          <button type="submit" name="checkLeaves">Yes</button>
		                  <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

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
										<button type="button" id="btnConfirm_S" onclick="FormValidation1();"><small>Submit</small></button>
										<button type="button"><small>Cancel</small></button>				
								</div>
												
												<div class="cls"></div>

								 <div class="col-md-6">
                                                <div class="input-label"><label >Select Employee</label></div>

                                                <?php

                                                if ($allow == '1')
                                                {
                                                
                                                ?>

                                                <div class="input-feild">
	                                                <select name="selectEmp" id="selectEmp" >
                                                        <?php echo '<option selected>'.$emp.'</option>'; ?>
	                                                </select>
                                                </div>

                                                <?php

                                                }

                                                else
                                                {
                                                	if ($pgSt == 'AlEmp')
													{

                                                ?>

                                                <div class="input-feild">
	                                                <select name="selectEmp" id="selectEmp" >
                                                        <?php echo '<option selected>'.$empName.'</option>'; ?>
	                                                </select>
                                                </div>

                                                <?php

                                            		}

                                            		else
                                            		{
                                            	
                                            	?>

                                            	<!-- Put the code here -->
                                            	<div class="input-feild">
	                                                <select name="selectEmp" id="selectEmp" >
	                                                	<?php

	                                                	// Fetching user info of all employees
														$qry= "SELECT * FROM empinfo WHERE ";
														$run= mysqli_query($con , $qry);
														while ($row = mysqli_fetch_array($run))
														{
															$empName = $row['empFName'] . ' ' . $row['empLName'];
															$empDept = $row['empDept'];
															$empDesig = $row['empDesig'];
		                                                	
		                                                	echo '<option selected>'.$empName.'</option>';
		                                                ?>
	                                                </select>
                                                </div>

                                            	<?php
                                            			}
                                            		}

                                                }

                                                ?>

                                                

                                                <?php

                                                if ($allow == '1')
                                                {
                                                
                                                ?>

                                                <div class="input-label"><label > Leave Type</label></div>	
                                                <div class="input-feild">
                                                        <select name="leaveHead" id="leaveHead" onchange="showRem(this.value)">
                                                            <option value="">Select</option>
                                                            <?php echo '<option value="Sick" selected>'.$leaveHead.'</option>'; ?>
                                                            <option value="Sick">Sick</option>
                                                            <option value="Casual">Casual</option>
	                                               		</select>        
                                                </div>

                                                <?php

                                                }

                                                else
                                                {

                                                ?>

                                                <div class="input-label"><label > Leave Type</label></div>	
                                                <div class="input-feild">
                                                    <select name="leaveHead" id="leaveHead" onchange="showRem(this.value)">
                                                        <option value="">Select</option>
                                                        <option value="Sick">Sick</option>
                                                        <option value="Casual">Casual</option>
                                               		</select>        
                                                </div>

                                                <div class="input-label" id="availShow1"><label>Available Leaves</label></div>
                                                <div class="input-feild" id="availShow2">
                                                    <input type="text" disabled>
                                                </div>

                                                <div id="txtRemLv"></div>

                                                <?php

                                                }

                                                ?>
                                                
                                                <?php

                                                if ($allow == '1')
                                                {
                                                
                                                ?>

                                                <div class="input-label"><label >From Date</label></div>	
                                                <div class="input-feild">
                                                    <?php echo '<input type="date"  name="txtFrom" id="txtFrom" data-date-inline-picker="false" data-date-open-on-focus="true" value="'.$ddate.'" />'; ?>
                                                </div> 

                                                <?php

                                                }

                                                else
                                                {

                                                ?>

                                                <div class="input-label"><label >From Date</label></div>	
                                                <div class="input-feild">
                                                    <input type="date"  name="txtFrom" id="txtFrom" data-date-inline-picker="false" data-date-open-on-focus="true" />
                                                </div>

                                                <?php

                                                }

                                                ?>

                                                <div class="input-feild">
                                                	<button type="button" id="chck" onclick="FormValidation();" >Check Leaves</button>
                                                </div>                                                                              
                                 </div>

								<div class="col-md-6">

                                    <?php

                                    if ($allow == '1')
                                    {
                                    
                                    ?>

                                    <div class="input-label"><label >To Date</label></div>
                                    <div class="input-feild">
                                        <?php echo '<input type="date"  name="txtTo" id="txtTo" data-date-inline-picker="false" data-date-open-on-focus="true" value="'.$endDdate.'" />'; ?>
                                    </div>

                                    <?php

                                    }

                                    else
                                    {

                                    ?>

                                    <div class="input-label"><label >To Date</label></div>
                                    <div class="input-feild">
                                        <input type="date"  name="txtTo" id="txtTo" data-date-inline-picker="false" data-date-open-on-focus="true" />
                                    </div>

                                    <?php

                                    }

                                    ?>

                                    <?php

                                    if ($allow == '1')
                                    {
                                    
                                    ?>

                                    <div class="input-label"><label >Reason</label></div>
                                    <div class="input-feild">
                                        <textarea name="empReason" id="empReason" ><?php echo $empReason; ?></textarea>
                                    </div>

                                    <?php

                                    }

                                    else 
                                    {

                                    ?>

                                    <div class="input-label"><label >Reason</label></div>
                                    <div class="input-feild">
                                        <textarea name="empReason" id="empReason" ></textarea>
                                    </div>

                                    <?php

                                    }

                                    ?> 

                                    
                                                                     
                                                                                                        
                                </div>

												<div class="cls"></div>
				</div>			
										<div class="cls"></div>
										<hr>
												
  
</p>

<?php

if ($allow == '1')
{

?>
<div class="acount_info widget_iner_box">
<div id="showleaves">
  <table id="usertable" class="display compact dataTable no-footer emp_hr_tbles" style="width:100%">
        <thead>
            <tr>
                <th>Week Number</th>  
                <th>Monday </th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
        </thead>
                                                
        <tbody>
        	<?php

			// echo '<br><br>';

			for ($i=$week ; $i<=$endWeek; $i++)
			{

			$date = new DateTime();
			$yy = '2019';
			$ww = $i;

			// echo '<br><br>';
			// echo "Week Nummer: ".$ww;
			?>

            <tr>
                <td><?php echo $ww; ?></td>

                <?php

                $day1 = $date->setISODate($yy, $ww, "1")->format('m-d');
				if ($day1 >= $start && $day1 <= $end)
				{
					echo '<td><input type="text" name="'.$day1.'" value="8" max="8" enabled>'.$date->setISODate($yy, $ww, "1")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day1.'" value="8" max="8" enabled> Monday - '.$date->setISODate($yy, $ww, "1")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day1.'" value="8" max="8" disabled>'.$date->setISODate($yy, $ww, "1")->format('m-d-Y').'</td>';
				}

				// For Day 2
				$day2 = $date->setISODate($yy, $ww, "2")->format('m-d');
				if ($day2 >= $start && $day2 <= $end)
				{
					echo '<td><input type="text" name="'.$day2.'" value="8" max="8" enabled>'.$date->setISODate($yy, $ww, "2")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day2.'" value="8" max="8" enabled>Tuesday - '.$date->setISODate($yy, $ww, "2")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day2.'" value="8" max="8" disabled>'.$date->setISODate($yy, $ww, "2")->format('m-d-Y').'</td>';
				}

				// For Day 3
				$day3 = $date->setISODate($yy, $ww, "3")->format('m-d');
				if ($day3 >= $start && $day3 <= $end)
				{
					echo '<td><input type="text" name="'.$day3.'" value="8" enabled>'.$date->setISODate($yy, $ww, "3")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day3.'" value="8" enabled>Wednesday - '.$date->setISODate($yy, $ww, "3")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day3.'" value="8" disabled>'.$date->setISODate($yy, $ww, "3")->format('m-d-Y').'</td>';
				}

				// For Day 4
				$day4 = $date->setISODate($yy, $ww, "4")->format('m-d');
				if ($day4 >= $start && $day4 <= $end)
				{
					echo '<td><input type="text" name="'.$day4.'" value="8" enabled>'.$date->setISODate($yy, $ww, "4")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day4.'" value="8" enabled>Thursday - '.$date->setISODate($yy, $ww, "4")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day4.'" value="8" disabled>'.$date->setISODate($yy, $ww, "4")->format('m-d-Y').'</td>';
				}

				// For Day 5
				$day5 = $date->setISODate($yy, $ww, "5")->format('m-d');
				if ($day5 >= $start && $day5 <= $end)
				{
					echo '<td><input type="text" name="'.$day5.'" value="8" enabled>'.$date->setISODate($yy, $ww, "5")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day5.'" value="8" enabled>Friday - '.$date->setISODate($yy, $ww, "5")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day5.'" value="8" disabled>'.$date->setISODate($yy, $ww, "5")->format('m-d-Y').'</td>';
				}

				// For Day 6
				$day6 = $date->setISODate($yy, $ww, "6")->format('m-d');
				if ($day6 >= $start && $day6 <= $end)
				{
					echo '<td><input type="text" name="'.$day6.'" value="8" disabled>'.$date->setISODate($yy, $ww, "6")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day6.'" value="8" disabled>Saturday - '.$date->setISODate($yy, $ww, "6")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day6.'" value="8" disabled>'.$date->setISODate($yy, $ww, "6")->format('m-d-Y').'</td>';
				}

				// For Day 7
				$day7 = $date->setISODate($yy, $ww, "7")->format('m-d');
				if ($day7 >= $start && $day7 <= $end)
				{
					echo '<td><input type="text" name="'.$day7.'" value="8" disabled>'.$date->setISODate($yy, $ww, "7")->format('m-d-Y').'</td>';
					// echo '<br><input type="text" name="'.$day7.'" value="8" disabled>Sunday - '.$date->setISODate($yy, $ww, "7")->format('m-d');
				}
				else
				{
					echo '<td><input type="text" name="'.$day7.'" value="8" disabled>'.$date->setISODate($yy, $ww, "7")->format('m-d-Y').'</td>';
				}

                ?>
            </tr>

            <?php

        	}

            ?>

        </tbody>                      
  </table>
</div>
</div>
<?php

}

?>

				</div>							
					
		</form>
				

	</div>
</div>





<script>
	$(document).ready(function() {
    $('#usertable').DataTable();  
} );
</script>

<script type="text/javascript">
   function assignLeavesModal()
   {
    $("#assignLeavesModal").modal();
   }

   function checkLeavesModal()
   {
    $("#checkLeavesMod").modal();
   }
</script>
<script type="text/javascript">
	 function FormValidation()
	 {
	    var missingVal = 0;
	    var selectEmp=document.getElementById('selectEmp').value;
	    var leaveHead=document.getElementById('leaveHead').value;
	    var txtFrom=document.getElementById('txtFrom').value;
	    var txtTo=document.getElementById('txtTo').value;
	    var empReason=document.getElementById('empReason').value;
	   
	    //var lineBr = document.getElementByClass('cls').value;
	    var summary = "Summary: ";

	    if(selectEmp == "")
	    {
	        document.getElementById('selectEmp').style.borderColor = "red";
	        missingVal = 1;
	        summary += "Employee Name is required.";
	    }
	    if(leaveHead == "")
	    {
	        document.getElementById('leaveHead').style.borderColor = "red";
	        missingVal = 1;
	        summary += " Leave type is required.";
	    }
	    if(txtFrom == "")
	    {
	        document.getElementById('txtFrom').style.borderColor = "red";
	        missingVal = 1;
	        summary +=  " Form Date is required ";
	    }
	    if(txtTo == "")
	    {
	        document.getElementById('txtTo').style.borderColor = "red";
	        missingVal = 1;
	        summary += " To Date required.";
	    }
	    if(empReason == "")
	    {
	        document.getElementById('empReason').style.borderColor = "red";
	        missingVal = 1;
	        summary += " Reason required.";
	    }

	    if (missingVal != 1)
	    {
	    	document.getElementById('selectEmp').style.borderColor = "white";
	    	document.getElementById('leaveHead').style.borderColor = "white";
	    	document.getElementById('txtFrom').style.borderColor = "white";
	    	document.getElementById('txtTo').style.borderColor = "white";
	    	document.getElementById('empReason').style.borderColor = "white";

	    	// document.getElementById('emerg_contact').style.borderColor = "white";
	    	// document.getElementById('user_region').style.borderColor = "white";
	    	// document.getElementById('user_address').style.borderColor = "white";
	    	// document.getElementById('dept_ID').style.borderColor = "white";
	    	// document.getElementById('desig_ID').style.borderColor = "white";
	    	// document.getElementById('role_ID').style.borderColor = "white";
	    	// document.getElementById('Auth_ID').style.borderColor = "white";

	    	// document.getElementById('user_status').style.borderColor = "white";
	    	// document.getElementById('user_active').style.borderColor = "white";
	    	// document.getElementById('user_pswd').style.borderColor = "white";
	    	// document.getElementById('confirmPassword').style.borderColor = "white";
	    	// document.getElementById('user_DOJ').style.borderColor = "white";
	    	// document.getElementById('city').style.borderColor = "white";
	    	// document.getElementById('country').style.borderColor = "white";

            /*$(document).ready(function(){
		    $("#btnConfirm_S").click(function(){*/
		    $("#checkLeavesMod").modal();
		    
		    /*});
			});*/
	    }

	    if (missingVal == 1)
	    {
	    	document.getElementById("formSummary").textContent=summary;
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
<script type="text/javascript">
	 function FormValidation1()
	 {

	    var missingVal = 0;
	    var selectEmp=document.getElementById('selectEmp').value;
	    var leaveHead=document.getElementById('leaveHead').value;
	    var txtFrom=document.getElementById('txtFrom').value;
	    var txtTo=document.getElementById('txtTo').value;
	    var empReason=document.getElementById('empReason').value;
	   
	    //var lineBr = document.getElementByClass('cls').value;
	    var summary = "Summary:"; 
	    
	    if(selectEmp == "")
	    {
	        document.getElementById('selectEmp').style.borderColor = "red";
	        missingVal = 1;
	        summary  += " Employee Name is required."; 
	    } 


	    if(leaveHead == "")
	    {
	        document.getElementById('leaveHead').style.borderColor = "red";
	        missingVal = 1;
	        summary += " Leave Type is required.";
	    }
	   
	    if(txtFrom == "")
	    {
	        document.getElementById('txtFrom').style.borderColor = "red";
	        missingVal = 1;
	        summary  +=  " Form Date is required ";
	    }
	    if(txtTo == "")
	    {
	        document.getElementById('txtTo').style.borderColor = "red";
	        missingVal = 1;
	        summary += "To Date required.";

	    }
	    if(empReason == "")
	    {
	        document.getElementById('empReason').style.borderColor = "red";
	        missingVal = 1;
	        summary += " Reason required.";
	    }

	    if (missingVal != 1)
	    {
	    	document.getElementById('selectEmp').style.borderColor = "white";
	    	document.getElementById('leaveHead').style.borderColor = "white";
	    	document.getElementById('txtFrom').style.borderColor = "white";
	    	document.getElementById('txtTo').style.borderColor = "white";
	    	document.getElementById('empReason').style.borderColor = "white";

	    	// document.getElementById('emerg_contact').style.borderColor = "white";
	    	// document.getElementById('user_region').style.borderColor = "white";
	    	// document.getElementById('user_address').style.borderColor = "white";
	    	// document.getElementById('dept_ID').style.borderColor = "white";
	    	// document.getElementById('desig_ID').style.borderColor = "white";
	    	// document.getElementById('role_ID').style.borderColor = "white";
	    	// document.getElementById('Auth_ID').style.borderColor = "white";

	    	// document.getElementById('user_status').style.borderColor = "white";
	    	// document.getElementById('user_active').style.borderColor = "white";
	    	// document.getElementById('user_pswd').style.borderColor = "white";
	    	// document.getElementById('confirmPassword').style.borderColor = "white";
	    	// document.getElementById('user_DOJ').style.borderColor = "white";
	    	// document.getElementById('city').style.borderColor = "white";
	    	// document.getElementById('country').style.borderColor = "white";

            /*$(document).ready(function(){
		    $("#btnConfirm_S").click(function(){*/
		    $("#assignLeavesModal").modal();
		    /*});
			});*/
	    }

	    if (missingVal == 1)
	    {
	    	document.getElementById("formSummary").textContent=summary;
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

<script src="js/jquery.dataTables.min.js"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>