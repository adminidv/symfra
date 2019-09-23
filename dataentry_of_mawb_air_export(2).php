<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// pick branch for station use
$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
 $userBr = $rowBr['userBr'];
}

$selectBranch = mysqli_query($con, "SELECT * FROM branchsetup WHERE SrNo='$userBr' ");
while ($rowBranch = mysqli_fetch_array($selectBranch))
{
 $brName = $rowBranch['brName'];
}

// current date function
$todayDate = date("Y-m-d");

// auto increment job
$selectLastjob = mysqli_query($con, "SELECT * FROM air_export_entry ORDER BY job_no_a DESC LIMIT 1");
$rowLastjob = mysqli_fetch_array($selectLastjob, MYSQLI_ASSOC);

$lastjob = $rowLastjob['job_no_a'];
$jobID = $lastjob + 1;
$job_no_a = $jobID;



if (isset($_POST['submitBtn'])) {

 
  $mawb_no =$_POST['mawb_no'];
  $awb_no =$_POST['awb_no'];
  $sale_date =$_POST['sale_date'];
  $owner_name =$_POST['owner_name'];
  $charge_code =$_POST['charge_code'];
  $charge_type =$_POST['charge_type'];
  $booking_date =$_POST['booking_date'];
  $station =$_POST['station'];
  $party =$_POST['party'];
  $agent_party =$_POST['agent_party'];
  $party_name =$_POST['party_name'];
  $party_address =$_POST['party_address'];
  $con_consolidation =$_POST['con_consolidation'];
  $con_code =$_POST['con_code'];
  $con_name =$_POST['con_name'];
  $con_address =$_POST['con_address'];
  $airport_dep =$_POST['airport_dep'];
  $airport_to_a =$_POST['airport_to_a'];
  $airport_to_b =$_POST['airport_to_b'];
  $airport_to_c =$_POST['airport_to_c'];
  $airport_by_a =$_POST['airport_by_a'];
  $airport_by_b =$_POST['airport_by_b'];
  $airport_by_c =$_POST['airport_by_c'];
  $currency =$_POST['currency'];
  $destination =$_POST['destination'];
  $account_no =$_POST['account_no'];
  $flight_no_a =$_POST['flight_no_a'];
  $flight_no_a_date =$_POST['flight_no_a_date'];
  $form_e_no =$_POST['form_e_no'];
  $form_e_date =$_POST['form_e_date'];
  $flight_no_b =$_POST['flight_no_b'];
  $flight_no_b_date =$_POST['flight_no_b_date'];
  $ship_inv_no =$_POST['ship_inv_no'];
  $ship_inv_no_date =$_POST['ship_inv_no_date'];
  $job_no =$_POST['job_no'];
  $insurance =$_POST['insurance'];
  $decl_val_carriage =$_POST['decl_val_carriage'];
  $decl_val_custom =$_POST['decl_val_custom'];
  $nominaton =$_POST['nominaton'];
  $handling_info =$_POST['handling_info'];
  $other_info =$_POST['other_info'];
  $account_info =$_POST['account_info'];
  $said_chain =$_POST['said_chain'];
  $ref_no =$_POST['ref_no'];
  $td_flash =$_POST['td_flash'];
  $clearing_agent =$_POST['clearing_agent'];
  $spo =$_POST['spo'];
  $freight =$_POST['freight'];
  $due_carrier =$_POST['due_carrier'];
  $due_agent =$_POST['due_agent'];
  $awb_total =$_POST['awb_total'];
  $payable_airline =$_POST['payable_airline'];

 // Fetching Owner ID
  $selectName = mysqli_query($con, "SELECT * FROM stockowner WHERE owner_name='$owner_name' ");
  while ($rowOwner = mysqli_fetch_array($selectName))
  {
     // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
    $ownerID =  $rowOwner["SrNo"];
  }

 

  // insert query
    $insertquery = mysqli_query($con," INSERT INTO air_export_entry (job_no_a,job_date_a,mawb_no,awb_no,sale_date,owner_name,charge_code,charge_type,booking_date,station,party,agent_party,party_name,party_address,con_consolidation,con_code,con_name,con_address,airport_dep,airport_to_a,airport_to_b,airport_to_c,airport_by_a,airport_by_b,airport_by_c,currency,destination,account_no,flight_no_a,flight_no_a_date,flight_no_b,flight_no_b_date,form_e_no,form_e_date,ship_inv_no,ship_inv_no_date,job_no,insurance,decl_val_carriage,decl_val_custom,nominaton,handling_info,other_info,account_info,said_chain,ref_no,td_flash,clearing_agent,spo,freight,due_carrier,due_agent,awb_total,payable_airline) VALUES ('$job_no_a','$job_date_a','$mawb_no','$awb_no','$sale_date','$ownerID','$charge_code','$charge_type','$booking_date','$station','$party','$agent_party','$party_name','$party_address','$con_consolidation','$con_code','$con_name','$con_address','$airport_to_a','$airport_to_b','$airport_to_c','$airport_by_a','$airport_by_b','$airport_by_c','$cc_port','$currency','$destination','$account_no','$flight_no_a','$flight_no_a_date','$flight_no_b','$flight_no_b_date','$form_e_no','$form_e_date','$ship_inv_no','$ship_inv_no_date','$job_no','$insurance','$decl_val_carriage','$decl_val_custom','$nominaton','$handling_info','$other_info','$account_info','$said_chain','$ref_no','$td_flash','$clearing_agent','$spo','$freight','$due_carrier','$due_agent','$awb_total','$payable_airline') ") or die(mysqli_error($con));

    // Generating the alert
    $msg = "Individual is inserted successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);

    header("Location: dataentry_of_mawb_air_export.php");

}




 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Entry of MAWB (Air Export)</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/crm.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
    

<style type="text/css">
.main_widget_box .nav-tabs > li > a {
        color: #05417e;
    }
.main_widget_box  .nav-tabs {
        background: #eee;
    }
.main_widget_box .tab-pane {
    margin-top: 30px;
    width: 100%;
    float: left;
}

#prtner_Bnk .input-feild input {
    padding: 0 0px;
}
#prtner_Bnk .input-feild {
    width: 70%;
}
#aimport_form_table_wrapper #aimport_form_table_filter {
    display: none;
}

 #invoicestable_filter {
    display: none;
}
#chrgestable_filter {
    display: none;
}
.dataTables_filter {
    display: none;
}

 #chrgestable .mini_input_field {
    width: 85% !important;
} 
  th {
    text-align: left !important;
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
          <a href="usermodules.php" class="btn btn-info ">Operations</a>

          <a href="#" class="btn btn-info active">Data Entry of MAWB (Air Export)</a>

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

<div class="main_widget_box">
	<div class="">
									<!-- <hr> -->
		<form action="" method="POST" enctype="multipart/form-data">

	     <!-- Modal One-->
			 <div class="modal fade confirmTable-modal" id="draftModal" role="dialog">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Confirmation</h4>
				        </div>
				        <div class="modal-body">
				          <p>Are You Sure You Want to save it to draft?</p>
				          <button type="submit" name="saveBtn">Yes</button>
		                  <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
				        </div>
				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				    </div>
			 </div>

       <!-- Modal Two-->
       <div class="modal fade confirmTable-modal" id="submit_Modal" role="dialog">
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

			 <label id="formSummary" style="color: red;"></label>

        <div class="widget_iner_box">
              <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                      <!-- Go back button code starting here -->
                      <?php include('inc_widgets/backBtn.php'); ?>
                      <!-- Go back button code ending here -->
                    </div>
                     <button type="button" id="btnConfirm_Su" class="something" onclick="submitFunc();"> <small>Submit</small></button>
                    <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                    <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                </div>
                              

                <div class="col-md-6">
                   <div class="input-label"><label>Sale Order No.</label></div>
                  <div class="input-feild">
                    <input type="text" name="so_no">
                  </div>

                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                     <?php echo '<input class="mini_input_field" disabled="" type="text" name="job_no_a" value="'.$jobID.'">'; ?>
                  </div>

                  <div class="input-label"><label>MAWB No.</label></div>
                  <div class="input-feild">
                   <select name="mawb_no" id="mawb_no" class="mawb_no" onchange="checkValues5();">
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airway_billable");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['awb_no'].'</option>';
                            }
                          ?>
                      </select>
                  </div>


                  <div class="cls"></div>
                  <hr>
                </div>
                <div class="col-md-6">
                  
                  <div class="input-label"><label>Job Date</label></div>
                  <div class="input-feild">
                    <input type="date" name="job_date_a" value="<?php echo $todayDate?>">
                  </div>

                    <div class="input-label"><label>AWB Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="awb_no">
                  </div>

                </div>
                <div class="cls"></div>





                <div class="col-md-6">  

                   <div class="input-label"><label>Sale Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="sale_date">
                  </div>

                   <div class="input-label"><label>Owner.</label></div>
                  <div class="input-feild">
                    <input type="text" name="owner_name" disabled="" id="owner_name" class="owner_name">
                  </div>

                  <div class="input-label"><label>Charge Code.</label></div>
                  <div class="input-feild">
                   <select class="mini_select_field charge_code" name="charge_code" id="charge_code" required onchange="checkValues()">
                          <option value="Select">Select </option>
                          <?php

                            $selectCode = mysqli_query($con, "select * from mop_setup");

                            while ($rowCode = mysqli_fetch_array($selectCode))
                            {
                              echo '<option value="'.$rowCode['SrNo'].'">'.$rowCode['mop_code'].'</option>';
                            }
                          ?>
                      </select>
                    <input  class="mini_input_field charge_type" disabled="" type="text" name="charge_type" id="charge_type">
                  </div>


                  




                </div>
                
                <div class="col-md-6">

                   <div class="input-label"><label>Booking  Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="booking_date">
                  </div>

                  <div class="input-label"><label>Station</label></div>
                  <div class="input-feild">
                  <input type="text" name="station" disabled="" value="<?php echo $brName; ?>">
                  </div>

                <!--   <div class="input-label"><label>Handling Information</label></div>
                  <div class="input-feild">
                    <textarea></textarea>
                  </div> -->


                </div>
                
               
               

            
               
        </div>

        <div class="cls"></div>
        <hr>        

        <div class="widget_iner_box">         
              <div class="col-md-6">

                      <div class="widget_child_title"><h4>Party </h4></div>


                      <div class="input-label"><label>Party</label></div>
                      <div class="input-feild">
                         <select name="party" class="party" id="party" onchange="checkValues1()" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from custmaster");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Agent Party </label></div>
                      <div class="input-feild">

                          <select name="agent_party" class="agent_party" id="agent_party" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from sub_agents_parties_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['subpartyname'].'</option>';
                            }
                          ?>
                      </select> 
                        
                      </div>



                      <div class="input-label"><label>Name </label></div>
                      <div class="input-feild">
                       
                        <input  class="input_field party_name" type="text" name="party_name" id="party_name">
                      </div>

                      <div class="input-label"><label>Address</label></div>
                      <div class="input-feild">
                        <textarea name="party_address" class="party_address" id="party_address"></textarea>
                        
                      </div>

                       
              </div>

              <div class="col-md-6">

                      <div class="widget_child_title"><h4>Consignee</h4></div>

                      <div class="input-label"><label>Consolidation</label></div>
                      <div class="input-feild">
                       <select class="mini_select_field" name="con_consolidation">
                         <option>No</option>
                         <option>Yes</option>

                       </select>


                      </div>

                      <!-- <div class="input-label"><label>Code </label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="con_code">                        
                        
                      </div> -->

                      <div class="input-label"><label>Name </label></div>
                      <div class="input-feild">
                       
                        <input  class="input_field " class="con_name" type="text" name="con_name" id="con_name">
                      </div>

                      <div class="input-label"><label>Address</label></div>
                      <div class="input-feild">
                          <textarea name="con_address" id="con_address" class="con_address"></textarea>                        
                      </div>

                      
              </div>
 
                 
                 
        </div>

        <div class="cls"></div>
        <hr>				

        <div class="widget_iner_box">         
              <div class="col-md-6">

                      <div class="input-label"><label>Airport Dep.</label></div>
                      <div class="input-feild">
                         <select name="airport_dep" id="airport_dep" class="airport_dep" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from airport_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['airport_iata'].'</option>';
                            }
                          ?>
                      </select>

                      </div>

                      <!-- <div class="input-label"><label>CC Port</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="cc_port">
                        
                      </div> -->

                      <div class="input-label"><label>Currency</label></div>
                      <div class="input-feild">
                      <select name="currency" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from currency_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['cur_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Account No.</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="account_no">
                      </div>

                      <div class="input-label"><label>Nomination</label></div>
                      <div class="input-feild">
                        <select class="mini_select_field" name="nominaton" id="nominaton" class="nominaton" onchange="nomChange();">
                          <option value="">Select</option>
                          <option value="N">N</option>
                          <option value="Y">Y</option>
                        </select>
                      </div>

                      <div class="cls"></div>
                      <hr>
              </div>

              <div class="col-md-6">
                <div class="col-md-"> <div class="input-label"><label>To</label></div></div>
                <div class="col-md-3"><div class="input-feild">
                 <select name="airport_to_a" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from airport_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['airport_iata'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>
                <div class="col-md-3"><div class="input-feild"> 
                  <select name="airport_to_b" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from airport_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['airport_iata'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>
                <div class="col-md-3"><div class="input-feild"> 
                  <select name="airport_to_c" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from airport_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['airport_iata'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>
                  

                  <div class="cls"></div>

                <div class="col-md-"> <div class="input-label"><label>By</label></div></div>
                <div class="col-md-3"><div class="input-feild">
                  <select name="airport_by_a " required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airline_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['flight_name'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>
                <div class="col-md-3"><div class="input-feild">
                  <select name="airport_by_b" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airline_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['flight_name'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>
                <div class="col-md-3"><div class="input-feild">
                  <select name="airport_by_c" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airline_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['flight_name'].'</option>';
                            }
                          ?>
                      </select>
                    </div></div>

                    <div class="input-label"><label>Destination</label></div>
                    <div class="input-feild">
                      <select name="destination" required>
                        <option value="Select">Select </option>
                        <?php

                          $selectSub = mysqli_query($con, "select * from destination_setup");

                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['dest_name'].'</option>';
                          }
                        ?>
                      </select>
                    </div>

                    <div class="input-label"><label id="spoLable">SPO.</label></div>
                    <div class="input-feild">
                      <select name="spo" id="spo" class="spo" required>
                        <option value="Select">Select </option>
                        <?php

                          $selectSub = mysqli_query($con, "select * from spo_setup");
                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['spo_name'].'</option>';
                          }

                        ?>
                      </select>
                    </div>

              </div>
              <div class="cls"></div>


              <div class="col-md-6">        
                      <div class="input-label"><label>Flight No.1</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="flight_no_a">
                        
                      </div>

                      <div class="input-label"><label>Flight No.2</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="flight_no_b">
                        
                      </div>


                      <div class="input-label"><label>Form 'E' No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="form_e_no">
                        
                      </div>

                      <div class="input-label"><label>Ship Inv. No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="ship_inv_no">
                        
                      </div>

                      <div class="input-label"><label>Job No</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="job_no">
                        
                      </div>

                      <div class="input-label"><label>Insurance</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="insurance">
                        
                      </div>                   
              </div>
              
              <div class="col-md-6">        

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="text" name="flight_no_a_date">
                        
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="text" name="flight_no_b_date">
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="text" name="form_e_date">
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="text" name="ship_inv_no_date">
                      </div>

                      <div class="input-label"><label>Declared Val Carriage</label></div>
                      <div class="input-feild">
                        <input  type="text" name="decl_val_carriage">
                      </div>

                      <div class="input-label"><label>Declared Val Customs</label></div>
                      <div class="input-feild">
                        <input  type="text" name="decl_val_custom" >
                      </div>
                 
              </div>  
        </div>

        <div class="cls"></div>
        <hr>  
      
         <div class="widget_iner_box">

            <table id="chrgestable" class="display nowrap no-footer" style="width:100%">
                  <thead>
                    <tr>
                      <th>RCP</th>
                      <th>Commision</th>
                      <th>Pcs</th>
                      <th>Grs. Wt</th>
                      <th>CI</th>
                      <th>Comdty</th>
                      <th>Charg. Wt</th>
                      <th>Rate</th>
                      <th>Total Freight</th>
                    </tr>
                  </thead>

                  <tbody>
                   <tr>
                      <td></td> 
                      <td></td>
                      <td><input class="mini_input_field" type="text" name="pcs" id="pcs"></td>
                      <td><input class="mini_input_field" type="text" name="grs_weight" id="grs_weight"></td>
                      <td><input class="mini_input_field" type="text" name="cl" id="cl"></td>
                      <td><select class="mini_select_field" name="commodity" id="commodity" required>
                            <option value="Select">Select </option>
                            <?php
                              $selectSub = mysqli_query($con, "select * from stockowner");
                              while ($rowSub = mysqli_fetch_array($selectSub))
                              {
                                echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['owner_name'].'</option>';
                              }
                            ?>
                          </select>
                      </td>
                      <td><input class="mini_input_field" type="text" name="ch_weight" id="ch_weight"></td>
                      <td><input class="mini_input_field" type="text" name="rate" id="rate"></td>
                      <td><input class="mini_input_field" type="text" name="total_freight" id="total_freight"></td>
                    </tr>

                  </tbody>
             </table>

             <div align="right">
              <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
             </div>

         </div>

         <div class="cls"></div>
         <hr> 

				 <div class="widget_iner_box">
              <div class="col-md-6">

                <div class="input-label"><label>Handling Information</label></div>
                <div class="input-feild"><textarea name="handling_info"></textarea></div>

                <div class="input-label"><label>Accounting Information</label></div>
                <div class="input-feild"><textarea name="account_info"></textarea></div>

              </div>

              <div class="col-md-6">

                 <div class="input-label"><label>Other Information</label></div>
                 <div class="input-feild"><textarea name="other_info"></textarea></div>

                <div class="input-label"><label>Said To Contain</label></div>
                <div class="input-feild"><textarea name="said_chain"></textarea></div>

              </div>    
         </div>    

         <div class="cls"></div>
         <hr> 

         <div class="widget_iner_box">
           <div class="col-md-4">
                <div class="widget_child_title"><h4>House Airway Bill</h4></div>
                  <table id="hawbtable" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Job No.</th>


                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                      </tr>

                      <tr>
                        <td>1</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
           </div>

           <div class="col-md-4">
                <div class="input-label"><label>Reference No.</label></div>
                <div class="input-feild"><input type="text" name="ref_no"></div>  

                <div class="input-label"><label>Td Flash.</label></div>
                <div class="input-feild"><input type="text" name="td_flash"></div> 

                <div class="input-label"><label>Clearing Agent.</label></div>
                <div class="input-feild">
                  <select name="clearing_agent" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from clearing_agents");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['name'].'</option>';
                            }
                          ?>
                      </select>
                </div>

           </div>
           <div class="col-md-4">
             <div class="input-label"><label>Freight</label></div>
             <div class="input-feild">
               <input type="text" disabled="" name="freight">
             </div>

            <div class="input-label"><label>Due Carrier</label></div>
             <div class="input-feild">
               <input disabled="" type="text" name="due_carrier">
             </div>


            <div class="input-label"><label>Due Agent</label></div>
             <div class="input-feild">
               <input disabled="" type="text" name="due_agent">
             </div>

            <div class="input-label"><label>AWB Total</label></div>
             <div class="input-feild">
               <input disabled="" type="text" name="awb_total">
             </div>


             <div class="input-label"><label>Payable to Airline</label></div>
             <div class="input-feild">
               <input disabled="" type="text" name="payable_airline">
             </div>


           </div>

         </div>

         <div class="cls"></div>
         <hr> 




                  

        <div class="widget_iner_box">
            <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li><a data-toggle="tab" href="#local_invoice">Local Invoice</a></li>
                  <li class="active"><a data-toggle="tab" href="#duecarrier">Due Carrier</a></li>
                  <li><a data-toggle="tab" href="#dueagent">Due Agent</a></li>
                </ul>
            </div>

           <div class="tab-content">

              <div id="duecarrier" class="tab-pane fade in active">

                  <div class="col-md-12">  
                    <table id="duechargetable"  class="display nowrap no-footer" style="width:100%" >
                          <thead>
                            <tr>
                              <th></th>
                              <th></th>
                              <th>Rate</th>
                              <th></th>
                              <th>Charges</th>
                            </tr>  
                          </thead>

                          <tbody>
                            <tr>
                                <td>Due Carrier</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type='text' name='totalCarrier' id='totalCarrier'></td>
                            </tr>
                            <tr>
                                <td>C.A.A Charges</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type='text' name='totalCAA' id='totalCAA'></td>
                            </tr>
                            <tr>
                                <td>AWC Charges</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type='text' name='totalAWC' id='totalAWC'></td>
                            </tr>
                            <tr>
                                <td>Security Charges</td>
                                <td></td>
                                <td><input type='text' name='secCharges' id='secCharges'></td>
                                <td><select name='secDD' id='secDD' onchange='multiplyFunc();'><option value=''>Select</option>
                                  <option value='CW'>CW</option>
                                  <option value='GW'>GW</option></select></td>
                                <td><input type='text' name='totalSec' id='totalSec'></td>
                            </tr>
                            <tr>
                                <td>Fuel Surcharge</td>
                                <td></td>
                                <td><input type='text' name='fuelCharges' id='fuelCharges'></td>
                                <td><select name='fuelDD' id='fuelDD' onchange="multiplyFunc();"><option value=''>Select</option>
                                  <option value='CW'>CW</option>
                                  <option value='GW'>GW</option></select></td>
                                <td><input type='text' name='totalFuel' id='totalFuel'></td>
                            </tr>
                            <tr>
                                <td>Scanning Charges</td>
                                <td></td>
                                <td><input type='text' name='scanCharges' id='scanCharges'></td>
                                <td><select name='scanDD' id='scanDD' onchange="multiplyFunc();"><option value=''>Select</option>
                                  <option value='CW'>CW</option>
                                  <option value='GW'>GW</option></select></td>
                                <td><input type='text' name='totalScan' id='totalScan'></td>
                            </tr>
                          </tbody>
                    </table>

                    <div align="right">
                      <button type="button" name="add2" id="add2" class="btn btn-success btn-xs">+</button>
                    </div>

                  </div> 

                  <div class="cls"></div>
                    <hr>

                  <div class="col-md-6">
                     <div class="input-label"><label>Gross Weight .</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>

                     <div class="input-label"><label>Charge Weight.</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>

                     <div class="input-label"><label>Rate</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-label"><label>CC Due Carrier Payable .</label></div>
                     <div class="input-feild">
                      <select class="mini_select_field">
                        <option>N</option>
                      </select>
                     </div>

                     <div class="input-label"><label>CC Scanning Payable</label></div>
                     <div class="input-feild">
                      <select class="mini_select_field">
                        <option>N</option>
                      </select>
                     </div>

                     <div class="input-label"><label>CC Due Agent Payable</label></div>
                     <div class="input-feild">
                      <select class="mini_select_field">
                        <option>N</option>
                      </select>
                     </div>

                     <div class="cls"></div>
                     <hr>

                      <div class="input-label"><label>Total Due Carrier</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>

                      <div class="input-label"><label>Total DUE Agent</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>

                      <div class="input-label"><label>Due Freight Amount</label></div>
                     <div class="input-feild">
                      <input type="text" name="">
                     </div>

                      <div class="input-label"><label>Total AWB Amount</label></div>
                     <div class="input-feild">
                      <input disabled="" type="text" name="">
                     </div>
                  </div>

              </div>

              <div id="local_invoice" class="tab-pane fade in ">

                <div class="col-md-12">

                 <table id="local_inv_table" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>No.</th>
                        <th>Currency</th>
                        <th>F/Amount</th>
                        <th>PKR Amount</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                      </tr>
                    </tbody>

                 </table>              
                </div>          
              </div>

              <div id="dueagent" class="tab-pane fade in ">

                <div class="col-md-12">

                 <table id="dueagent_table" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>AWA Fee</th>
                        <th>Charges</th>
                        <th>Print On Awb</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>

                 </table>              
                </div>          
              </div>

           </div> 

        </div>
	
		</form>

	</div>
  
</div>
<script>

  $(document).ready(function() {
     $('#chrgestable').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false
    });

      $('#duechargetable').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false
    });

      $('#local_inv_table').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false
    });
     
      $('#dueagent_table').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false
    });

      $('#duechargetable1').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false
    });

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false
    });

      $('#invoicestable').DataTable( {
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false
    });

});
</script>

<script>
  $(document).ready(function() {
     $('#prtytable').DataTable( {
        "paging":false,
        "info":false,
    });

    $('#foreigntbale').DataTable( {
        "paging":false,
        "info":false,
    });
  });
</script>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script type="text/javascript">
function submitFunc()
{
  $("#submit_Modal").modal();
}
</script>

<script type="text/javascript">
  function checkValues() {
 var chargeCode = document.getElementById("charge_code").value;

      $.ajax({
         url:"air_export_ajax1.php",  
                method:"GET",  
                data:{chargeCode:chargeCode},  
                dataType:"text",  
         success: function(data) {
              $('.charge_type').val(data);  
                }
      }); 
} 

</script>

<script type="text/javascript">
  function checkValues1() {
  var subAgent = document.getElementById("party").value;

      $.ajax({
         url:"air_export_ajax2.php",  
                method:"GET",  
                data:{subAgent:subAgent},  
                dataType:"text",  
         success: function(data) {
              $('.agent_party').html(data); 
              // $('.party_name').html(data); 
              $('.party_address').html(data);
            }
      });

      $.ajax({
         url:"air_export_ajax5.php",  
                method:"GET",  
                data:{subAgent:subAgent},  
                dataType:"text",  
         success: function(data) {
              // $('.agent_party').html(data); 
              $('.party_name').val(data); 
              // $('.party_address').html(data);
            }
      });
}

</script>
<script type="text/javascript">
  function checkValues3() {
  var conName = document.getElementById("con_name").value;

      $.ajax({
         url:"air_export_ajax3.php",  
                method:"GET",  
                data:{conName:conName},  
                dataType:"text",  
         success: function(data) {
              $('.con_address').html(data);  
                }
      });
} 

</script>

<script type="text/javascript">
  function checkValues5() {
  var awbNo = document.getElementById("mawb_no").value;

      $.ajax({
         url:"air_export_ajax4.php",  
                method:"GET",  
                data:{awbNo:awbNo},  
                dataType:"text",  
         success: function(data) {
              $('.owner_name').val(data);  
                }
      });
}
</script>

<script>
$(document).ready(function(){
 var count = 1;

 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td><select name='rcp' id='rcp"+count+"'><option>NEW</option></select></td>";
   html_code += "<td><select name='commision' id='commision"+count+"'><option>NEW</option></select></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='pcs' id='pcs"+count+"'></td>"

   html_code += "<td><input class='mini_input_field' type='text' name='grs_weight' id='grs_weight"+count+"'></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='cl' id='cl"+count+"'></td>";
   html_code += "<td> <select class='mini_select_field' name='commodity' id='commodity"+count+"' required>"
   html_code += "<option value='Select'>Select</option>"
   html_code += "</select></td>"

   html_code += "<td><input class='mini_input_field' type='text' name='ch_weight' id='ch_weight"+count+"'></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='rate' id='rate"+count+"'></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='total_freight' id='total_freight"+count+"'></td>";
   
   // html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#chrgestable').append(html_code);
 });

$('.something').click(function(){
  var rcp = [];
  var commision = [];
  var pcs = [];
  var grs_weight = [];
  var cl = [];
  var commodity = [];
  var ch_weight = [];
  var rate = [];
  var total_freight = [];
  var mawb_No = document.getElementById("mawb_no").value;

  // rcp = document.getElementById("rcp").value;
  // commision = document.getElementById("commision").value;
  pcs = document.getElementById("pcs").value;
  grs_weight = document.getElementById("grs_weight").value;
  cl = document.getElementById("cl").value;
  commodity = document.getElementById("commodity").value;
  ch_weight = document.getElementById("ch_weight").value;
  rate = document.getElementById("rate").value;
  total_freight = document.getElementById("total_freight").value;
  
  $.ajax({
   url:"addExportWeight.php",
   method:"POST",
   data:{mawb_No:mawb_No, pcs:pcs, grs_weight:grs_weight, cl:cl, commodity:commodity, ch_weight:ch_weight, rate:rate, total_freight:total_freight},
   success:function(data){
    // alert('Working.');
    
    // fetch_item_data();
    // If we have two rows
    
    if (count == 2)
    {
      pcs = document.getElementById("pcs2").value;
      grs_weight = document.getElementById("grs_weight2").value;
      cl = document.getElementById("cl2").value;
      commodity = document.getElementById("commodity2").value;
      ch_weight = document.getElementById("ch_weight2").value;
      rate = document.getElementById("rate2").value;
      total_freight = document.getElementById("total_freight2").value;
      
      $.ajax({
       url:"addExportWeight.php",
       method:"POST",
       data:{mawb_No:mawb_No, pcs:pcs, grs_weight:grs_weight, cl:cl, commodity:commodity, ch_weight:ch_weight, rate:rate, total_freight:total_freight},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });
    }

    if (count == 3)
    {
      pcs = document.getElementById("pcs2").value;
      grs_weight = document.getElementById("grs_weight2").value;
      cl = document.getElementById("cl2").value;
      commodity = document.getElementById("commodity2").value;
      ch_weight = document.getElementById("ch_weight2").value;
      rate = document.getElementById("rate2").value;
      total_freight = document.getElementById("total_freight2").value;
      
      $.ajax({
       url:"addExportWeight.php",
       method:"POST",
       data:{mawb_No:mawb_No, pcs:pcs, grs_weight:grs_weight, cl:cl, commodity:commodity, ch_weight:ch_weight, rate:rate, total_freight:total_freight},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      pcs = document.getElementById("pcs3").value;
      grs_weight = document.getElementById("grs_weight3").value;
      cl = document.getElementById("cl3").value;
      commodity = document.getElementById("commodity3").value;
      ch_weight = document.getElementById("ch_weight3").value;
      rate = document.getElementById("rate3").value;
      total_freight = document.getElementById("total_freight3").value;
      
      $.ajax({
       url:"addExportWeight.php",
       method:"POST",
       data:{mawb_No:mawb_No, pcs:pcs, grs_weight:grs_weight, cl:cl, commodity:commodity, ch_weight:ch_weight, rate:rate, total_freight:total_freight},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

   }
  });

});

// For Due Carrier
$('.something').click(function(){
  var totalCarrier = document.getElementById("totalCarrier").value;
  var totalCAA = document.getElementById("totalCAA").value;
  var totalAWC = document.getElementById("totalAWC").value;
  var secCharges = document.getElementById("secCharges").value;
  var secDD = document.getElementById("secDD").value;
  var totalSec = document.getElementById("totalSec").value;
  var fuelCharges = document.getElementById("fuelCharges").value;
  var fuelDD = document.getElementById("fuelDD").value;
  var totalFuel = document.getElementById("totalFuel").value;
  var scanCharges = document.getElementById("scanCharges").value;
  var scanDD = document.getElementById("scanDD").value;
  var totalScan = document.getElementById("totalScan").value;

  var mawb_No = document.getElementById("mawb_no").value;

  // rcp = document.getElementById("rcp").value;
  // commision = document.getElementById("commision").value;
  
  $.ajax({
   url:"addDueCarrier.php",
   method:"POST",
   data:{mawb_No:mawb_No, totalCarrier:totalCarrier, totalCAA:totalCAA, totalAWC:totalAWC, secCharges:secCharges, secDD:secDD, totalSec:totalSec, fuelCharges:fuelCharges, fuelDD:fuelDD, totalFuel:totalFuel, scanCharges:scanCharges, scanDD:scanDD, totalScan:totalScan},
   success:function(data){
    // alert('Working.');
    
    // fetch_item_data();
   }
  });

});
 
});
</script>

<script>
$(document).ready(function(){
 var count = 1;

 $('#add2').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td><input type='text' name=''></td>";
   html_code += "<td></td>";
   html_code += "<td><input type='text' name=''></td>"
   html_code += "<td><select> <option>CW</option></select></td>";
   html_code += "<td><input type='text' name=''></td>";
   
   // html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#duechargetable').append(html_code);
 });
 
});
</script>

<script type="text/javascript">
  function multiplyFunc()
  {
    var totalSec;
    var totalFuel;
    var totalScan;

    var secDD = document.getElementById("secDD").value;
    var fuelDD = document.getElementById("fuelDD").value;
    var scanDD = document.getElementById("scanDD").value;

    var chWeight = document.getElementById("ch_weight").value;
    var grWeight = document.getElementById("grs_weight").value;
    var secCharges = document.getElementById("secCharges").value;
    var fuelCharges = document.getElementById("fuelCharges").value;
    var scanCharges = document.getElementById("scanCharges").value;

    if (secDD == "CW")
    {
      totalSec = secCharges * chWeight;
      document.getElementById("totalSec").value = totalSec;
    }
    else if (secDD == "GW")
    {
      totalSec = secCharges * grWeight;
      document.getElementById("totalSec").value = totalSec;
    }

    if (fuelDD == "CW")
    {
      totalFuel = fuelCharges * chWeight;
      document.getElementById("totalFuel").value = totalFuel;
    }
    else if (fuelDD == "GW")
    {
      totalFuel = fuelCharges * grWeight;
      document.getElementById("totalFuel").value = totalFuel;
    }

    if (scanDD == "CW")
    {
      totalScan = scanCharges * chWeight;
      document.getElementById("totalScan").value = totalScan;
    }
    else if (scanDD == "GW")
    {
      totalScan = scanCharges * grWeight;
      document.getElementById("totalScan").value = totalScan;
    }
  }
</script>

<script>
function nomChange()
{
  var nominaton = document.getElementById("nominaton").value;
  if (nominaton == "Y")
  {
    document.getElementById('spo').style.visibility='hidden';
    document.getElementById('spoLable').style.visibility='hidden';
    // alert("Working");
  }
  else if (nominaton == "N")
  {
    document.getElementById('spo').style.visibility='visible';
    document.getElementById('spoLable').style.visibility='visible';
    // alert("Working");
  }
}
</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
