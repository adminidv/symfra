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

  $so_no =$_POST['so_no'];
  $job_no_a =$jobID;
  $job_date_a =$_POST['job_date_a'];
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
  $awaPrint =$_POST['awaPrint1'];
  $awaCharges =$_POST['awaCharges1'];
  $awaFee =$_POST['awaFee1'];
  $totalCarrier =$_POST['totalCarrier'];
  $totalCAA =$_POST['totalCAA'];
  $totalAWC =$_POST['totalAWC'];
  $secCharges =$_POST['secCharges'];
  $secDD =$_POST['secDD'];
  $totalSec =$_POST['totalSec'];
  $fuelCharges =$_POST['fuelCharges'];
  $fuelDD =$_POST['fuelDD'];
  $totalFuel =$_POST['totalFuel'];
  $scanCharges =$_POST['scanCharges'];
  $scanDD =$_POST['scanDD'];
  $totalScan =$_POST['totalScan'];
  $rcp ="rcp";
  $commision ="commision";
  $pcs =$_POST['pcs'];
  $grs_weight =$_POST['grs_weight'];
  $cl =$_POST['cl'];
  $commodity =$_POST['commodity'];
  $volLength =$_POST['volLength'];
  $volWidth =$_POST['volWidth'];
  $volHeight =$_POST['volHeight'];
  $volWeight =$_POST['volWeight'];
  $ch_weight =$_POST['ch_weight'];
  $rate =$_POST['rate'];
  $total_freight =$_POST['total_freight'];
   if (isset($_POST['status_type'])) {
    $status_type='Active';
  }
  else
  {
    $status_type='Deactive';
  }


 // Fetching Owner ID
  $selectName = mysqli_query($con, "SELECT * FROM stockowner WHERE owner_name='$owner_name' ");
  while ($rowOwner = mysqli_fetch_array($selectName))
  {
     // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
    $ownerID =  $rowOwner["SrNo"];
  }

 

  // insert query
    $insertquery = mysqli_query($con," INSERT INTO air_export_entry (so_no,job_no_a,job_date_a,mawb_no,awb_no,sale_date,owner_name,charge_code,charge_type,booking_date,station,party,agent_party,party_name,party_address,con_consolidation,con_name,con_address,airport_dep,airport_to_a,airport_to_b,airport_to_c,airport_by_a,airport_by_b,airport_by_c,currency,destination,account_no,flight_no_a,flight_no_a_date,flight_no_b,flight_no_b_date,form_e_no,form_e_date,ship_inv_no,ship_inv_no_date,job_no,insurance,decl_val_carriage,decl_val_custom,nominaton,handling_info,other_info,account_info,said_chain,ref_no,td_flash,clearing_agent,spo,freight,due_carrier,due_agent,awb_total,payable_airline,status_type) VALUES ('$so_no','$job_no_a','$job_date_a','$mawb_no','$awb_no','$sale_date','$ownerID','$charge_code','$charge_type','$booking_date','$station','$party','$agent_party','$party_name','$party_address','$con_consolidation','$con_name','$con_address','$airport_dep','$airport_to_a','$airport_to_b','$airport_to_c','$airport_by_a','$airport_by_b','$airport_by_c','$currency','$destination','$account_no','$flight_no_a','$flight_no_a_date','$flight_no_b','$flight_no_b_date','$form_e_no','$form_e_date','$ship_inv_no','$ship_inv_no_date','$job_no','$insurance','$decl_val_carriage','$decl_val_custom','$nominaton','$handling_info','$other_info','$account_info','$said_chain','$ref_no','$td_flash','$clearing_agent','$spo','$freight','$due_carrier','$due_agent','$awb_total','$payable_airline','$status_type') ") or die(mysqli_error($con));


    $insertquery2 = mysqli_query($con, "insert into air_export_weight_info (mawb_no,rcp,commission,pcs,grs_weight,cl,commodity,volLength,volWidth,volHeight,volWeight,ch_weight,rate,total_freight) values ('$mawb_no','$rcp','$commision','$pcs','$grs_weight','$cl','$commodity','$volLength','$volWidth','$volHeight','$volWeight','$ch_weight','$rate','$total_freight')") or die(mysqli_error($con));

    $insertquery3 = mysqli_query($con,"insert into duecarriers (mawb_No,totalCarrier,totalCAA,totalAWC,secCharges,secDD,totalSec,fuelCharges,fuelDD,totalFuel,scanCharges,scanDD,totalScan) values ('$mawb_No','$totalCarrier','$totalCAA','$totalAWC','$secCharges','$secDD','$totalSec','$fuelCharges','$fuelDD','$totalFuel','$scanCharges','$scanDD','$totalScan')") or die(mysqli_error($con));

    $insertquery4 = mysqli_query($con,"insert into dueagentairexp (mawb_No,awaFee,awaCharges,awaPrint) values ('$mawb_No','$awaFee','$awaCharges','$awaPrint') ") or die(mysqli_error($con));

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

/*.mini_select_field {

    float: left;
    margin: 0 auto !important;
    width: 100% !important;
}*/
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
          <a href="Usermodules.php" class="btn btn-info ">Operations</a>

          <a href="Usermodules.php" class="btn btn-info active">Data Entry of MAWB (Air Export)</a>

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

           <?php include 'sidebar_widgets/dae_advanced_search_widget.php'; ?>
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

       <!-- Volumatic popup-->
              <div class="modal fade symfra_popup2" id="popup_4" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Volumetic Weight Calculation</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-fields">    
                              <label>Length</label>
                              <input type="text" name="volLength" id="volLength" placeholder="Enter Length">        
                            </div>
                            <div class="input-fields">    
                              <label>Width</label>
                              <input type="text" name="volWidth" id="volWidth" placeholder="Enter Width">        
                            </div>
                           <div class="input-fields">    
                              <label>Height</label>
                              <input type="text" name="volHeight" id="volHeight" onfocusout="calcVolume();" placeholder="Enter Height">        
                            </div>
                             <div class="input-fields">    
                              <label>Volumatic Weight</label>
                              <input type="text" name="volWeight" id="volWeight" placeholder="Volumetic Weight">        
                            </div>
                          <div style="clear: both"><button type="submit" name="volumeSubmit" id="volumeSubmit" onclick="checking(); return false;">Submit</button></div>
                        </div>
                        <div class="modal-footer">
                            <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                      
                    </div>
              </div>

			 <label id="formSummary" style="color: red;"></label>

        <p id="V_mawb_no" style="color: red;"></p>
        <p id="V_awb_no" style="color: red;"></p>
        <p id="V_sale_date" style="color: red;"></p>
        <p id="V_booking_date" style="color: red;"></p>
        <p id="V_charge_code" style="color: red;"></p>
        <p id="V_station" style="color: red;"></p>
        <p id="V_party" style="color: red;"></p>
        <p id="V_party_name" style="color: red;"></p>
        <p id="V_party_address" style="color: red;"></p>
        <p id="V_con_name" style="color: red;"></p>
        <p id="V_airport_dep" style="color: red;"></p>
        <p id="V_airport_to_a" style="color: red;"></p>
        <p id="V_airport_by_a" style="color: red;"></p>
        <p id="V_currency" style="color: red;"></p>
        <p id="V_destination" style="color: red;"></p>
        <p id="V_flight_no_a" style="color: red;"></p>
        <p id="V_flight_no_a_date" style="color: red;"></p>
        <p id="V_pcs" style="color: red;"></p>
        <p id="V_grs_weight" style="color: red;"></p>
        <p id="V_commodity" style="color: red;"></p>
        <p id="V_ch_weight" style="color: red;"></p>
        <p id="V_rate" style="color: red;"></p>
        <p id="V_nominaton" style="color: red;"></p>
        <p id="V_spo" style="color: red;"></p>
        <p id="V_said_chain" style="color: red;"></p>



     
     

        <div class="widget_iner_box">
              <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                      <!-- Go back button code starting here -->
                      <?php include('inc_widgets/backBtn.php'); ?>
                      <!-- Go back button code ending here -->
                    </div>
                     <button type="button" id="btnConfirm_Su" class="something"  onclick="FormValidation();"> <small>Submit</small></button>
                    <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                    <button type="button" name="submitBtn1"> <small>Cancel</small></button>        
                </div>

                <div class="col-md-6">
                  <div class="input-label"><label>Sale Order No.</label></div>
                 <div class="input-feild">
                  <select name="so_no" id="so_no" class="so_no" >
                         <option value="Select">Select </option>
                         <?php
                           $selectSub = mysqli_query($con, "select * from saleorders");
                           while ($rowSub = mysqli_fetch_array($selectSub))
                           {
                             echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['soNo'].'</option>';
                           }
                         ?>
                     </select>
                 </div>

                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                     <?php echo '<input class="mini_input_field" disabled="" type="text" name="job_no_a" value="'.$jobID.'">'; ?>
                  </div>

                  <div class="input-label"><label>MAWB No.</label></div>
                  <div class="input-feild">
                   <select name="mawb_no" id="mawb_no" class="mawb_no" onchange="checkValues5();">
                          <option value="">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airway_billable");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['awb_no'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                  </div>

                  <div class="cls"></div>
                  <hr>
                </div>
                <div class="col-md-6">
                  
                  <div class="input-label"><label>Job Date</label></div>
                  <div class="input-feild">
                    <input type="date" name="job_date_a" id="job_date_a" value="<?php echo $todayDate?>">
                  </div>

                    <div class="input-label"><label>AWB Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="awb_no" id="awb_no"><span class="steric">*</span>
                  </div>

                </div>
                <div class="cls"></div>

                <div class="col-md-6">  

                   <div class="input-label"><label>Sale Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="sale_date" id="sale_date"><span class="steric">*</span>
                  </div>

                   <div class="input-label"><label>Owner.</label></div>
                  <div class="input-feild">
                    <input type="text" name="owner_name" id="owner_name" class="owner_name">
                  </div>

                  <div class="input-label"><label>Charge Code.</label></div>
                  <div class="input-feild">
                   <select class="mini_select_field charge_code" name="charge_code" id="charge_code" required onchange="checkValues()">
                          <option value="">Select </option>
                          <?php

                            $selectCode = mysqli_query($con, "select * from mop_setup");

                            while ($rowCode = mysqli_fetch_array($selectCode))
                            {
                              echo '<option value="'.$rowCode['SrNo'].'">'.$rowCode['mop_code'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                    <input  class="mini_input_field charge_type" type="text" name="charge_type" id="charge_type">
                  </div>

                </div>
                
                <div class="col-md-6">

                  <div class="input-label"><label>Booking  Date.</label></div>
                  <div class="input-feild">
                    <input type="date" name="booking_date" id="booking_date">
                  </div>

                  <div class="input-label"><label>Station</label></div>
                  <div class="input-feild">
                  <input type="text" name="station" id="station" value="Karachi Branch"><span class="steric">*</span>
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
                          <option value="">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from custmaster");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
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
                       
                        <input  class="input_field party_name" type="text" name="party_name" id="party_name"><span class="steric">*</span>
                      </div>

                      <div class="input-label"><label>Address</label></div>
                      <div class="input-feild">
                        <textarea name="party_address" class="party_address" id="party_address"></textarea><span class="steric">*</span>
                        
                      </div>
 
              </div>

              <div class="col-md-6">

                      <div class="widget_child_title"><h4>Consignee</h4></div>

                      <div class="input-label"><label>Consolidation</label></div>
                      <div class="input-feild">
                       <select class="mini_select_field" name="con_consolidation" id="con_consolidation">
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
                       
                        <input  class="input_field con_name "  type="text" name="con_name" id="con_name"><span class="steric">*</span>
                      </div>

                      <div class="input-label"><label>Address</label></div>
                      <div class="input-feild">
                          <textarea name="con_address" id="con_address" class="con_address"></textarea><span class="steric">*</span>                        
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
                          <option value="">Select </option>
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
                      <select name="currency" id="currency"  required>
                          <option value="">Select </option>
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
                        <input class="mini_input_field" type="text" name="account_no" id="account_no">
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
                 <select name="airport_to_a" id="airport_to_a" required>
                          <option value="">Select </option>
                          <?php

                            $selectCurr = mysqli_query($con, "select * from airport_setup");

                            while ($rowCurr = mysqli_fetch_array($selectCurr))
                            {
                              echo '<option value="'.$rowCurr['SrNo'].'">'.$rowCurr['airport_iata'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                    </div></div>
                <div class="col-md-3"><div class="input-feild"> 
                  <select name="airport_to_b" id="airport_to_b" required>
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
                  <select name="airport_to_c" id="airport_to_c" required>
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
                  <select name="airport_by_a" id="airport_by_a" required>
                          <option value="">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from airline_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['flight_name'].'</option>';
                            }
                          ?>
                      </select><span class="steric">*</span>
                    </div></div>
                <div class="col-md-3"><div class="input-feild">
                  <select name="airport_by_b" id="airport_by_b" required>
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
                  <select name="airport_by_c" id="airport_by_c" required>
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
                      <select name="destination" id="destination" required>
                        <option value="">Select </option>
                        <?php

                          $selectSub = mysqli_query($con, "select * from destination_setup");

                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['dest_name'].'</option>';
                          }
                        ?>
                      </select>
                    </div>

                    <div class="input-label" id="spoLable"><label>SPO.</label></div>
                    <div class="input-feild">
                      <select name="spo" id="spo" required>
                        <option value="">Select </option>
                        <?php

                          $selectSub = mysqli_query($con, "select * from spo_setup");
                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['spo_name'].'</option>';
                          }

                        ?>
                      </select><span class="steric">*</span>
                    </div>

              </div>
              <div class="cls"></div>


              <div class="col-md-6">        
                      <div class="input-label"><label>Flight No.1</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="flight_no_a" id="flight_no_a"><span class="steric">*</span>
                        
                      </div>

                      <div class="input-label"><label>Flight No.2</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="flight_no_b" id="flight_no_b">
                        
                      </div>


                      <div class="input-label"><label>Form 'E' No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="form_e_no" id="form_e_no">
                        
                      </div>

                      <div class="input-label"><label>Ship Inv. No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="ship_inv_no" id="ship_inv_no">
                        
                      </div>

                      <div class="input-label"><label>Job No</label></div>
                      <div class="input-feild">
                        <input class="mini_input_field" type="text" name="job_no" id="job_no">
                        
                      </div>

                      <div class="input-label"><label>Insurance</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="insurance" id="insurance">
                        
                      </div>                   
              </div>
              
              <div class="col-md-6">        

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="date" name="flight_no_a_date" id="flight_no_a_date"><span class="steric">*</span>
                        
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="date" name="flight_no_b_date" id="flight_no_b_date">
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="date" name="form_e_date" id="form_e_date">
                      </div>

                      <div class="input-label"><label>Date</label></div>
                      <div class="input-feild">
                        <input  type="date" name="ship_inv_no_date" id="ship_inv_no_date">
                      </div>

                      <div class="input-label"><label>Declared Val Carriage</label></div>
                      <div class="input-feild">
                        <input  type="text" name="decl_val_carriage" id="decl_val_carriage">
                      </div>

                      <div class="input-label"><label>Declared Val Customs</label></div>
                      <div class="input-feild">
                        <input  type="text" name="decl_val_custom" id="decl_val_custom" >
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
                      <th>Volumatic Weight</th>
                      <th>Charg. Wt</th>
                      <th>Rate</th>
                      <th>Total Freight</th>
                    </tr>
                  </thead>

                  <tbody>
                   <tr>
                      <td></td> 
                      <td></td>
                      <td><input class="mini_input_field pcs" type="text" name="pcs" id="pcs"><span class="steric">*</span></td>
                      <td><input class="mini_input_field grs_weight" type="text" name="grs_weight" id="grs_weight"><span class="steric">*</span></td>
                      <td><input class="mini_input_field cl" type="text" name="cl" id="cl"><span class="steric">*</span></td>
                      <td>
                        <select class="mini_select_field commodity" name="commodity" id="commodity" onchange="checkCommodity();" required>
                          <option value="Select">Select</option>
                          <?php
                            $selectSub = mysqli_query($con, "select * from pro_setup_commodity");
                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['pro_description'].'</option>';
                            }
                          ?>
                        </select><span class="steric">*</span>
                      </td>
                      <td>
                        <button type='button' data-toggle='modal' data-target='#popup_4' style='line-height: 2px; padding: 5px; display: block; margin:0 auto;'>Volume Check</button>
                      </td>
                      <td><input class="mini_input_field ch_weight" type="text" name="ch_weight" id="ch_weight"><span class="steric">*</span></td>
                      <td><input class="mini_input_field rate" type="text" name="rate" id="rate" onfocusout="calcFreight();"><span class="steric">*</span></td>
                      <td><input class="mini_input_field total_freight" type="text" name="total_freight" id="total_freight"></td>
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
                <div class="input-feild"><textarea name="handling_info" id="handling_info"></textarea></div>

                <div class="input-label"><label>Accounting Information</label></div>
                <div class="input-feild"><textarea name="account_info" id="account_info"></textarea></div>

              </div>

              <div class="col-md-6">

                 <div class="input-label"><label>Other Information</label></div>
                 <div class="input-feild"><textarea name="other_info" id="other_info"></textarea></div>

                <div class="input-label"><label>Said To Contain</label></div>
                <div class="input-feild"><textarea name="said_chain" id="said_chain"></textarea><span class="steric">*</span></div>

                <div class="input-label"><label>Status</label></div>
                <div class="input-feild">
                  <input type="checkbox" name="status_type" id="status_type">
                </div>

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
                <div class="input-feild"><input type="text" name="ref_no" id="ref_no"></div>  

                <div class="input-label"><label>Td Flash.</label></div>
                <div class="input-feild"><input type="text" name="td_flash" id="td_flash"></div> 

                <div class="input-label"><label>Clearing Agent.</label></div>
                <div class="input-feild">
                  <select name="clearing_agent" id="clearing_agent" required>
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
               <input type="text" name="freight" id="freight">
             </div>

            <div class="input-label"><label>Due Carrier</label></div>
             <div class="input-feild">
               <input type="text" name="due_carrier" id="due_carrier">
             </div>


            <div class="input-label"><label>Due Agent</label></div>
             <div class="input-feild">
               <input type="text" name="due_agent" id="due_agent" value="3000">
             </div>

            <div class="input-label"><label>AWB Total</label></div>
             <div class="input-feild">
               <input type="text" name="awb_total" id="awb_total">
             </div>


             <div class="input-label"><label>Payable to Airline</label></div>
             <div class="input-feild">
               <input type="text" name="payable_airline" id="payable_airline">
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
                        <td><input class='mini_input_field' type='text' name='awaFee1' id='awaFee1' value='AWA Fee'></td>
                        <td><input class='mini_input_field' type='text' name='awaCharges1' id='awaCharges1' value='3000'></td>
                        <td><input class='mini_input_field' type='text' name='awaPrint1' id='awaPrint1'></td>
                      </tr>
                    </tbody>
                 </table>

                <div class="input-label"><label>Total</label></div>
                <div class="mini-input-feild"><input type="text" name="totalAWA" clas="totalAWA" id="totalAWA"></div>  

                 <div align="right">
                  <button type="button" name="addAWA" id="addAWA" class="btn btn-success btn-xs">+</button>
                 </div>

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

<!-- <script type="text/javascript">
function submitFunc()
{
  $("#submit_Modal").modal();
}
</script> -->

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

 var count2 = 1;
 
 var totalAWA = document.getElementById("awaCharges1").value;
 document.getElementById("totalAWA").value = totalAWA; 

 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td><select name='rcp' id='rcp"+count+"'><option>NEW</option></select></td>";
   html_code += "<td><select name='commision' id='commision"+count+"'><option>NEW</option></select></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='pcs' id='pcs"+count+"'></td>"

   html_code += "<td><input class='mini_input_field' type='text' name='grs_weight' id='grs_weight"+count+"'></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='cl' id='cl"+count+"'></td>";
   html_code += "<td><select class='mini_select_field' name='commodity' id='commodity"+count+"' required>"
   html_code += "<option value='Select'>Select</option>"
   html_code += "</select></td>"
   html_code += "<td><button type='button' data-toggle='modal' data-target='#popup_4' style='line-height: 2px; padding: 5px; display: block; margin:0 auto;'>Volume Check</button></td>"

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
    var allCarrier;

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

    var totalSec;
    var totalFuel;
    var totalScan;

    // Calculating Total Carrier
    var totalCarrier = document.getElementById("totalCarrier").value;
    var totalCAA = document.getElementById("totalCAA").value;
    var totalAWC = document.getElementById("totalAWC").value;

    allCarrier = +totalSec + +totalFuel + +totalScan + +totalCarrier + +totalCAA + +totalAWC;
    document.getElementById("due_carrier").value = allCarrier;


  }
</script>

<script>
function calcVolume()
{
  var volWeight;
  var volLength = document.getElementById("volLength").value;
  var volWidth = document.getElementById("volWidth").value;
  var volHeight = document.getElementById("volHeight").value;
  // alert("Working" + " " + MAWB_rate);
  volWeight = volLength * volWidth * volHeight;
  document.getElementById("volWeight").value = volWeight;
  
}

function checking()
{
  // alert("Working");
  var volWeight = document.getElementById("volWeight").value;
  var grs_weight = document.getElementById("grs_weight").value;
  var volWeightInt = parseInt(volWeight);
  var grs_weightInt = parseInt(grs_weight);
  $('#popup_4').modal('hide');
  if (grs_weightInt > volWeightInt)
  {
    document.getElementById("ch_weight").value = grs_weight;
  }
  else if (grs_weightInt < volWeightInt)
  {
    document.getElementById("ch_weight").value = volWeight;
  }
  // alert(volWeight);
}

function calcFreight()
{
  var total_freight;
  var ch_weight = document.getElementById("ch_weight").value;
  var rate = document.getElementById("rate").value;
  // alert("Working" + " " + MAWB_rate);
  total_freight = ch_weight * rate;
  document.getElementById("total_freight").value = total_freight;
  document.getElementById("freight").value = total_freight;
}
</script>

<script type="text/javascript">
$(document).ready(function(){
 var count = 1;
 
 var totalAWA = document.getElementById("awaCharges1").value;
 document.getElementById("totalAWA").value = totalAWA; 

 $('#addAWA').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td><select class='mini_select_field awaFee"+count+"' name='awaFee"+count+"' class='awaFee"+count+"' id='awaFee"+count+"' required>"
   html_code += "<option value='Select'>Select</option>"
   html_code += "</select></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='awaCharges"+count+"' id='awaCharges"+count+"' ></td>";
   html_code += "<td><input class='mini_input_field' type='text' name='awaPrint"+count+"' id='awaPrint"+count+"'></td>";
   
   // html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#dueagent_table').append(html_code);

   if (count == 2)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee2').html(data);
        }
     });

    // Calculating Total
    var awaCharges2_Event = document.getElementById("awaCharges2");
    awaCharges2_Event.addEventListener("focusout", add2Func);
    function add2Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges2 = document.getElementById("awaCharges2").value; 
      var totalAWA2 = +totalAWA + +awaCharges2;
      document.getElementById("totalAWA").value = totalAWA2;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 3)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee3').html(data);
        }
     });

    // Calculating Total
    var awaCharges3_Event = document.getElementById("awaCharges3");
    awaCharges3_Event.addEventListener("focusout", add3Func);
    function add3Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges3 = document.getElementById("awaCharges3").value; 
      var totalAWA3 = +totalAWA + +awaCharges3;
      document.getElementById("totalAWA").value = totalAWA3;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 4)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee4').html(data);
        }
     });

    // Calculating Total
    var awaCharges4_Event = document.getElementById("awaCharges4");
    awaCharges4_Event.addEventListener("focusout", add4Func);
    function add4Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges4 = document.getElementById("awaCharges4").value; 
      var totalAWA4 = +totalAWA + +awaCharges4;
      document.getElementById("totalAWA").value = totalAWA4;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 5)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee5').html(data);
        }
     });

    // Calculating Total
    var awaCharges5_Event = document.getElementById("awaCharges5");
    awaCharges5_Event.addEventListener("focusout", add5Func);
    function add5Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges5 = document.getElementById("awaCharges5").value; 
      var totalAWA5 = +totalAWA + +awaCharges5;
      document.getElementById("totalAWA").value = totalAWA5;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 6)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee6').html(data);
        }
     });

    // Calculating Total
    var awaCharges6_Event = document.getElementById("awaCharges6");
    awaCharges6_Event.addEventListener("focusout", add6Func);
    function add6Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges6 = document.getElementById("awaCharges6").value; 
      var totalAWA6 = +totalAWA + +awaCharges6;
      document.getElementById("totalAWA").value = totalAWA6;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 7)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee7').html(data);
        }
     });

    // Calculating Total
    var awaCharges7_Event = document.getElementById("awaCharges7");
    awaCharges7_Event.addEventListener("focusout", add7Func);
    function add7Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges7 = document.getElementById("awaCharges7").value; 
      var totalAWA7 = +totalAWA + +awaCharges7;
      document.getElementById("totalAWA").value = totalAWA7;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 8)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee8').html(data);
        }
     });

    // Calculating Total
    var awaCharges8_Event = document.getElementById("awaCharges8");
    awaCharges8_Event.addEventListener("focusout", add8Func);
    function add8Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges8 = document.getElementById("awaCharges8").value; 
      var totalAWA8 = +totalAWA + +awaCharges8;
      document.getElementById("totalAWA").value = totalAWA8;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 9)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee9').html(data);
        }
     });

    // Calculating Total
    var awaCharges9_Event = document.getElementById("awaCharges9");
    awaCharges9_Event.addEventListener("focusout", add9Func);
    function add9Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges9 = document.getElementById("awaCharges9").value; 
      var totalAWA9 = +totalAWA + +awaCharges9;
      document.getElementById("totalAWA").value = totalAWA9;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

   if (count == 10)
   {
    $.ajax({
     url:"addAWA_ajax.php",
            method:"GET", 
            dataType:"text",
     success: function(data) {
          $('.awaFee10').html(data);
        }
     });

    // Calculating Total
    var awaCharges10_Event = document.getElementById("awaCharges10");
    awaCharges4_Event.addEventListener("focusout", add10Func);
    function add10Func() {
      var totalAWA = document.getElementById("totalAWA").value;
      var awaCharges10 = document.getElementById("awaCharges10").value; 
      var totalAWA10 = +totalAWA + +awaCharges10;
      document.getElementById("totalAWA").value = totalAWA10;
      document.getElementById("due_agent").value = totalAWA2;
    }

   }

 });

$('.something').click(function(){
  var awaFee = [];
  var awaCharges = [];
  var awaPrint = [];
  var mawb_No = document.getElementById("mawb_no").value;

  // rcp = document.getElementById("rcp").value;
  // commision = document.getElementById("commision").value;
  awaFee = document.getElementById("awaFee1").value;
  awaCharges = document.getElementById("awaCharges1").value;
  awaPrint = document.getElementById("awaPrint1").value;
  
  $.ajax({
   url:"addAWA_ajax2.php",
   method:"POST",
   data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
   success:function(data){
    // alert('Working.');
    
    // fetch_item_data();
    // If we have two rows
    if (count == 2)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });
    }

    // If we have three rows
    if (count == 3)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee3").value;
      awaCharges = document.getElementById("awaCharges3").value;
      awaPrint = document.getElementById("awaPrint3").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

    // If we have four rows
    if (count == 4)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee3").value;
      awaCharges = document.getElementById("awaCharges3").value;
      awaPrint = document.getElementById("awaPrint3").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee4").value;
      awaCharges = document.getElementById("awaCharges4").value;
      awaPrint = document.getElementById("awaPrint4").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

    // If we have five rows
    if (count == 5)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee3").value;
      awaCharges = document.getElementById("awaCharges3").value;
      awaPrint = document.getElementById("awaPrint3").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee4").value;
      awaCharges = document.getElementById("awaCharges4").value;
      awaPrint = document.getElementById("awaPrint4").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee5").value;
      awaCharges = document.getElementById("awaCharges5").value;
      awaPrint = document.getElementById("awaPrint5").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

    // If we have six rows
    if (count == 6)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee3").value;
      awaCharges = document.getElementById("awaCharges3").value;
      awaPrint = document.getElementById("awaPrint3").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee4").value;
      awaCharges = document.getElementById("awaCharges4").value;
      awaPrint = document.getElementById("awaPrint4").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee5").value;
      awaCharges = document.getElementById("awaCharges5").value;
      awaPrint = document.getElementById("awaPrint5").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee6").value;
      awaCharges = document.getElementById("awaCharges6").value;
      awaPrint = document.getElementById("awaPrint6").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

    // If we have seven rows
    if (count == 7)
    {
      awaFee = document.getElementById("awaFee2").value;
      awaCharges = document.getElementById("awaCharges2").value;
      awaPrint = document.getElementById("awaPrint2").value;
      
      $.ajax({
       url:"addAWA_ajax2addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee3").value;
      awaCharges = document.getElementById("awaCharges3").value;
      awaPrint = document.getElementById("awaPrint3").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee4").value;
      awaCharges = document.getElementById("awaCharges4").value;
      awaPrint = document.getElementById("awaPrint4").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee5").value;
      awaCharges = document.getElementById("awaCharges5").value;
      awaPrint = document.getElementById("awaPrint5").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee6").value;
      awaCharges = document.getElementById("awaCharges6").value;
      awaPrint = document.getElementById("awaPrint6").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

      awaFee = document.getElementById("awaFee7").value;
      awaCharges = document.getElementById("awaCharges7").value;
      awaPrint = document.getElementById("awaPrint7").value;
      
      $.ajax({
       url:"addAWA_ajax2.php",
       method:"POST",
       data:{mawb_No:mawb_No, awaFee:awaFee, awaCharges:awaCharges, awaPrint:awaPrint},
       success:function(data){
        // alert('Working.');
        
        // fetch_item_data();
       }
      });

    }

   }
  });

}); 

});
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

<!-- <script type="text/javascript">
 function checkValues6() {
 var soNo = document.getElementById("so_no").value;
 $.ajax({
    url:"air_export_ajax6.php",
           method:"GET",
           data:{soNo:soNo},
           dataType:"json",
    success: function(data) {
         $('.pcs').val(data.salePcs);
         $('.grs_weight').val(data.grsWeight);
         $('.ch_weight').val(data.chWeight);
         $('.rate').val(data.saleRate);
         $('.total_freight').val(data.totalFreight);
         }
 });
}
</script> -->

<script type="text/javascript">

$(document).ready(function(){
 var count = 1;

$('#so_no').change(function(){
  var soNo = document.getElementById("so_no").value;

  $.ajax({
     url:"air_export_ajax6.php",  
            method:"GET",  
            data:{soNo:soNo},  
            dataType:"json",  
     success: function(data) {
         $('.pcs').val(data.salePcs);
         $('.grs_weight').val(data.grsWeight);
         $('.ch_weight').val(data.chWeight);
         $('.rate').val(data.saleRate);
         $('.total_freight').val(data.totalFreight); 
     }
  });

  $.ajax({
     url:"air_export_ajax8.php",  
            method:"GET",  
            data:{soNo:soNo}, 
            dataType:"text", 
     success: function(data) {
         $('#party').html(data);
     }
  });

});

});

</script>

<script type="text/javascript">
function checkCommodity() {
 var comoCode = document.getElementById("commodity").value;

      $.ajax({
         url:"air_export_ajax7.php",  
                method:"GET",  
                data:{comoCode:comoCode},  
                dataType:"text",  
         success: function(data) {
              $('.cl').val(data);  
                }
      }); 
} 
</script>

</script>
<!-- java script -->
        <script type="text/javascript">
        function logUserFunc()
        {
          $("#logUser_Modal").modal();
        }
        </script>

<script type="text/javascript">
   function FormValidation()
   {
      var regexp = /^[a-z]*$/i;
      var regexp2 = /^[0-9]*$/i;
      var re = /\S+@\S+\.\S+/;
      var decimals = /^[-+]?[0-9]+\.[0-9]+$/;
      var missingVal = 0;

      var mawb_no=document.getElementById('mawb_no').value;
      var awb_no=document.getElementById('awb_no').value;
      var sale_date=document.getElementById('sale_date').value;
      var booking_date=document.getElementById('booking_date').value;
      var charge_code=document.getElementById('charge_code').value;
      var station=document.getElementById('station').value;
      var party=document.getElementById('party').value;
      var party_name=document.getElementById('party_name').value;
      var party_address=document.getElementById('party_address').value;
      var con_name=document.getElementById('con_name').value;
      var airport_dep=document.getElementById('airport_dep').value;
      var airport_to_a=document.getElementById('airport_to_a').value;
      var airport_by_a=document.getElementById('airport_by_a').value;
      var currency=document.getElementById('currency').value;
      var destination=document.getElementById('destination').value;
      var flight_no_a=document.getElementById('flight_no_a').value;
      var flight_no_a_date=document.getElementById('flight_no_a_date').value;
      var pcs=document.getElementById('pcs').value;
      var grs_weight=document.getElementById('grs_weight').value;
      var commodity=document.getElementById('commodity').value;
      var ch_weight=document.getElementById('ch_weight').value;
      var rate=document.getElementById('rate').value;
      var nominaton=document.getElementById('nominaton').value;
      var spo=document.getElementById('spo').value;
      var said_chain=document.getElementById('said_chain').value;
     
      var summary = "Summary: ";

      if(said_chain == "")
      {
          document.getElementById('said_chain').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_said_chain").innerHTML = "Said is required.";
      }
      if(said_chain != "")
      {
          document.getElementById('said_chain').style.borderColor = "white";
          document.getElementById("V_said_chain").innerHTML = "";

      }

      if(spo == "")
      {
          document.getElementById('spo').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_spo").innerHTML = "SPO is required.";
      }
      if(spo != "")
      {
          document.getElementById('spo').style.borderColor = "white";
          document.getElementById("V_spo").innerHTML = "";

      }

      if(nominaton == "")
      {
          document.getElementById('nominaton').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_nominaton").innerHTML = "Nomination is required.";
      }
      if(nominaton != "")
      {
          document.getElementById('nominaton').style.borderColor = "white";
          document.getElementById("V_nominaton").innerHTML = "";

      }

       
      if(rate == "")
      {
          document.getElementById('rate').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("rate").innerHTML = "Rate is required.";
      }
      if(rate != "")
      {
          document.getElementById('rate').style.borderColor = "white";
          document.getElementById("V_rate").innerHTML = "";

          if (!regexp2.test(rate))
        {
          document.getElementById('rate').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rate").innerHTML = "Only numbers and decimals are allowed in rate.";
        }
      }

       if(ch_weight == "")
      {
          document.getElementById('ch_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_ch_weight").innerHTML = "Charge Weight is required.";
      }
      if(ch_weight != "")
      {
          document.getElementById('ch_weight').style.borderColor = "white";
          document.getElementById("V_ch_weight").innerHTML = "";

          if (!regexp2.test(ch_weight))
        {
          document.getElementById('ch_weight').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_ch_weight").innerHTML = "Only alphabets are allowed.";
        }
      }

      if(grs_weight == "")
      {
          document.getElementById('grs_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_grs_weight").innerHTML = "Gross Weight is required.";
      }
      if(grs_weight != "")
      {
          document.getElementById('grs_weight').style.borderColor = "white";
          document.getElementById("V_grs_weight").innerHTML = "";

          if (!regexp2.test(grs_weight))
        {
          document.getElementById('grs_weight').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_grs_weight").innerHTML = "Only numbers are allowed.";
        }
      }

      if(pcs == "")
      {
          document.getElementById('pcs').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pcs").innerHTML = "Pieces is required.";
      }
      if(pcs != "")
      {
          document.getElementById('pcs').style.borderColor = "white";
          document.getElementById("V_pcs").innerHTML = "";

      }

      if(commodity == "")
      {
          document.getElementById('commodity').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_commodity").innerHTML = "Commodity is required.";
      }
      if(commodity != "")
      {
          document.getElementById('commodity').style.borderColor = "white";
          document.getElementById("V_commodity").innerHTML = "";

      }

      if(flight_no_a_date == "")
      {
          document.getElementById('flight_no_a_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_no_a_date").innerHTML = "Flight Date is required.";
      }
      if(flight_no_a_date != "")
      {
          document.getElementById('flight_no_a_date').style.borderColor = "white";
          document.getElementById("V_flight_no_a_date").innerHTML = "";

      }

      if(flight_no_a == "")
      {
          document.getElementById('flight_no_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_no_a").innerHTML = "Flight Date is required.";
      }
      if(flight_no_a != "")
      {
          document.getElementById('flight_no_a').style.borderColor = "white";
          document.getElementById("V_flight_no_a").innerHTML = "";

      }

      if(destination == "")
      {
          document.getElementById('destination').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_destination").innerHTML = "Destination is required.";
      }
      if(destination != "")
      {
          document.getElementById('destination').style.borderColor = "white";
          document.getElementById("V_destination").innerHTML = "";

      }

      if(currency == "")
      {
          document.getElementById('currency').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_currency").innerHTML = "Currency is required.";
      }
      if(currency != "")
      {
          document.getElementById('currency').style.borderColor = "white";
          document.getElementById("V_currency").innerHTML = "";

      }

      if(airport_by_a == "")
      {
          document.getElementById('airport_by_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_by_a").innerHTML = "Airport is required.";
      }
      if(airport_by_a != "")
      {
          document.getElementById('airport_by_a').style.borderColor = "white";
          document.getElementById("V_airport_by_a").innerHTML = "";

      }

       if(airport_to_a == "")
      {
          document.getElementById('airport_to_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_to_a").innerHTML = "Airport is required.";
      }
      if(airport_to_a != "")
      {
          document.getElementById('airport_to_a').style.borderColor = "white";
          document.getElementById("V_airport_to_a").innerHTML = "";

      }

       if(airport_dep == "")
      {
          document.getElementById('airport_dep').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_dep").innerHTML = "Airport Dep is required.";
      }
      if(airport_dep != "")
      {
          document.getElementById('airport_dep').style.borderColor = "white";
          document.getElementById("V_airport_dep").innerHTML = "";

      }

      if(con_name == "")
      {
          document.getElementById('con_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_con_name").innerHTML = "Consignee name is required.";
      }
      if(con_name != "")
      {
          document.getElementById('con_name').style.borderColor = "white";
          document.getElementById("V_con_name").innerHTML = "";

      }

      if(party_address == "")
      {
          document.getElementById('party_address').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party_address").innerHTML = "Party Address is required.";
      }
      if(party_address != "")
      {
          document.getElementById('party_address').style.borderColor = "white";
          document.getElementById("V_party_address").innerHTML = "";

      }

       if(party_name == "")
      {
          document.getElementById('party_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party_name").innerHTML = "Party Name is required.";
      }
      if(party_name != "")
      {
          document.getElementById('party_name').style.borderColor = "white";
          document.getElementById("V_party_name").innerHTML = "";

      }

      if(party == "")
      {
          document.getElementById('party').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party").innerHTML = "Party is required.";
      }
      if(party != "")
      {
          document.getElementById('party').style.borderColor = "white";
          document.getElementById("V_party").innerHTML = "";

      }

       if(station == "")
      {
          document.getElementById('station').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_station").innerHTML = "Station is required.";
      }
      if(station != "")
      {
          document.getElementById('station').style.borderColor = "white";
          document.getElementById("V_station").innerHTML = "";

      }

      if(charge_code == "")
      {
          document.getElementById('charge_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_charge_code").innerHTML = "Charge Code is required.";
      }
      if(charge_code != "")
      {
          document.getElementById('charge_code').style.borderColor = "white";
          document.getElementById("V_charge_code").innerHTML = "";

      }

      if(booking_date == "")
      {
          document.getElementById('booking_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_booking_date").innerHTML = "Boo Date is required.";
      }
      if(booking_date != "")
      {
          document.getElementById('booking_date').style.borderColor = "white";
          document.getElementById("V_booking_date").innerHTML = "";

      }

      if(sale_date == "")
      {
          document.getElementById('sale_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_sale_date").innerHTML = "Sale date is required.";
      }
      if(sale_date != "")
      {
          document.getElementById('sale_date').style.borderColor = "white";
          document.getElementById("V_sale_date").innerHTML = "";

      }

      if(awb_no == "")
      {
          document.getElementById('awb_no').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_awb_no").innerHTML = "AWB No. is required.";
      }
      if(awb_no != "")
      {
          document.getElementById('awb_no').style.borderColor = "white";
          document.getElementById("V_awb_no").innerHTML = "";

      }

      if(mawb_no == "")
      {
          document.getElementById('mawb_no').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_mawb_no").innerHTML = "MAWB No. is required.";
      }
      if(mawb_no != "")
      {
          document.getElementById('mawb_no').style.borderColor = "white";
          document.getElementById("V_mawb_no").innerHTML = "";

      }

      if (missingVal != 1)
      {
        document.getElementById('flight_no_a_date').style.borderColor = "white";
        document.getElementById('flight_no_a').style.borderColor = "white";
        document.getElementById('destination').style.borderColor = "white";
        document.getElementById('currency').style.borderColor = "white";
        document.getElementById('airport_by_a').style.borderColor = "white";
        document.getElementById('airport_to_a').style.borderColor = "white";
        document.getElementById('airport_dep').style.borderColor = "white";
        document.getElementById('con_name').style.borderColor = "white";
        document.getElementById('party_address').style.borderColor = "white";
        document.getElementById('party_name').style.borderColor = "white";
        document.getElementById('party').style.borderColor = "white";
        document.getElementById('station').style.borderColor = "white";
        document.getElementById('charge_code').style.borderColor = "white";
        document.getElementById('booking_date').style.borderColor = "white";
        document.getElementById('sale_date').style.borderColor = "white";
        document.getElementById('awb_no').style.borderColor = "white";
        document.getElementById('mawb_no').style.borderColor = "white";
        document.getElementById('pcs').style.borderColor = "white";
        document.getElementById('grs_weight').style.borderColor = "white";
        document.getElementById('commodity').style.borderColor = "white";
        document.getElementById('ch_weight').style.borderColor = "white";
        document.getElementById('rate').style.borderColor = "white";
        document.getElementById('nominaton').style.borderColor = "white";
        document.getElementById('spo').style.borderColor = "white";
        document.getElementById('said_chain').style.borderColor = "white";
       
        $("#submit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
