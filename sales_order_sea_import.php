<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// Calculating date & time for notification 
$dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$dateTime2 = $dateTime->format("m/d/y  H:i");

$semiFinal2 = date('h:i A', strtotime($dateTime2));

$dateTimeFinal = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$semiFinal3 = $dateTime->format("d/m/y");
$finalDate = $semiFinal3 . ' ' . $semiFinal2;
// echo $final;

$userID = $_SESSION['user'];

// Today date func
$todayDate = date("Y-m-d");

// auto increment
$selectLastID = mysqli_query($con, "SELECT * FROM saleorders ORDER BY soNo DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['soNo'];
$newID = $lastID + 1;
$soNo = $newID;

if (isset($_POST['submitBtn'])) {

   $soNo =$soNo;
   $saleCust =$_POST['saleCust'];
   $conPerson =$_POST['conPerson'];
   $conRef =$_POST['conRef'];
   $saleCurr =$_POST['saleCurr'];
   $postDate =$_POST['postDate'];
   $docDate =$_POST['docDate'];
   $agentParty =$_POST['agentParty'];
   $foreignAgent =$_POST['foreignAgent'];
   $saleNom =$_POST['saleNom'];
   $saleSPO =$_POST['saleSPO'];
   $mblNo =$_POST['mblNo'];
   $mblDate =$_POST['mblDate'];
   $salePcs =$_POST['salePcs'];
   $saleCBM =$_POST['saleCBM'];
   $grsWeight =$_POST['grsWeight'];
   $saleComm =$_POST['saleComm'];
   $chWeight =$_POST['chWeight'];
   $saleRate =$_POST['saleRate'];
   $totalFreight =$_POST['totalFreight'];
   $goodsDesc =$_POST['goodsDesc'];
   $saleOrigin =$_POST['saleOrigin'];
   $saleDest =$_POST['saleDest'];
   $shipLine =$_POST['shipLine'];
   $saleVessel =$_POST['saleVessel'];
   $saleVoyage =$_POST['saleVoyage'];
   $saleRem =$_POST['saleRem'];
   $totalBefDisc =$_POST['totalBefDisc'];
   $saleDisc =$_POST['saleDisc'];
   $saleTax =$_POST['saleTax'];
   $saleTotal =$_POST['saleTotal'];
   $saleReason =$_POST['saleReason'];
   $lastNotification =$_POST['lastNotification'];

   // Checking for approval if present
  $selectAppFlow = mysqli_query($con, "SELECT * FROM appdoc WHERE appDept='Sales' AND appForm='Sea Import' ");
  $appFlowRecs = mysqli_num_rows($selectAppFlow);
  if ($appFlowRecs > 0)
  {
    while ($rowAppFlow = mysqli_fetch_array($selectAppFlow))
    {
      $thisApproval = 'Approval on ' . $rowAppFlow['app1'];
      // Approval one
      $notOn = $rowAppFlow['app1'];
      $appFlowID = $rowAppFlow['SrNo'];
    }

    $insertQurey= mysqli_query($con, " insert into saleorders (soNo, saleCust, conPerson, conRef, saleCurr, saleStatus, postDate, docDate, agentParty, foreignAgent, saleNom, saleSPO, mblNo, mblDate, salePcs, saleCBM, grsWeight, saleComm, chWeight, saleRate, totalFreight, goodsDesc, saleOrigin, saleDest, shipLine, saleVessel, saleVoyage, saleRem, totalBefDisc, saleDisc, saleTax, saleTotal, saleReason, saleType, lastNotification) value ('$soNo', '$saleCust', '$conPerson', '$conRef', '$saleCurr', 'Waiting for first approval', '$postDate', '$docDate', '$agentParty', '$foreignAgent', '$saleNom', '$saleSPO', '$mblNo', '$mblDate', '$salePcs', '$saleCBM', '$grsWeight', '$saleComm', '$chWeight', '$saleRate', '$totalFreight', '$goodsDesc', '$saleOrigin', '$saleDest', '$shipLine', '$saleVessel', '$saleVoyage', '$saleRem', '$totalBefDisc', '$saleDisc', '$saleTax', '$saleTotal', '$saleReason', 'Sea Import', '$lastNotification')")or die(mysqli_error($con));

    $selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
    while ($rowNotUser = mysqli_fetch_array($selectUsername))
    {
      $userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
    }

    // Inserting notification
    $insertNot = mysqli_query($con, "INSERT INTO nottable (notTitle, notDateTime, notStatus, creatorID, createdBy, notOn, notRecord, appFlowID, mainCreator, notApp) VALUES ('Sea Import', '$finalDate', 'Approval Pending', '$userID', '$userNot', '$notOn', '$newID', '$appFlowID', '$userID', '1') ") or die(mysqli_error($con));

    header("Location: sales_order_sea_import.php");
  }

  else
  {
    $insertQurey= mysqli_query($con, " insert into saleorders (soNo, saleCust, conPerson, conRef, saleCurr, saleStatus, postDate, docDate, agentParty, foreignAgent, saleNom, saleSPO, mblNo, mblDate, salePcs, saleCBM, grsWeight, saleComm, chWeight, saleRate, totalFreight, goodsDesc, saleOrigin, saleDest, shipLine, saleVessel, saleVoyage, saleRem, totalBefDisc, saleDisc, saleTax, saleTotal, saleReason, saleType, lastNotification) value ('$soNo', '$saleCust', '$conPerson', '$conRef', '$saleCurr', 'Active', '$postDate', '$docDate', '$agentParty', '$foreignAgent', '$saleNom', '$saleSPO', '$mblNo', '$mblDate', '$salePcs', '$saleCBM', '$grsWeight', '$saleComm', '$chWeight', '$saleRate', '$totalFreight', '$goodsDesc', '$saleOrigin', '$saleDest', '$shipLine', '$saleVessel', '$saleVoyage', '$saleRem', '$totalBefDisc', '$saleDisc', '$saleTax', '$saleTotal', '$saleReason', 'Sea Import', '$lastNotification')")or die(mysqli_error($con));

    header("Location: sales_order_sea_import.php");
  }

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Order(Sea Import)</title>
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
    .dataTables_filter {
        display: none;
        }


 #aimport_form_table .mini_input_field {
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
          <a href="usermodules.php" class="btn btn-info">CRM</a>
          <a href="sales_order_sea_import.php" class="btn btn-info active">Sales Order(Sea Import)</a>
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

           <?php include 'sidebar_widgets/si_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class=" add_customer_sec main_widget_box">

	<div class="">
      		<form action="" method="POST">

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
                          <!-- <button type="submit" name="submitBtn1"> Add More House</button> -->
                          <button type="submit" name="submitBtn">Yes</button>
                          <button type="button" name="btnDelete_N" data-dismiss="modal">No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                         
                        </div>
                      </div>
                    </div>
               </div>

       <!-- Modal_one-->
       <div class="modal fade confirmTable-modal" id="save_Modal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are You Sure You Want to Save?</p>
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

            			 <label id="formSummary" style="color: red;"></label>
                   <p id="saleCust" style="color: red;"></p>
                   <p id="conPerson" style="color: red;"></p>
                   <p id="saleCurr" style="color: red;"></p>
                   <p id="postDate" style="color: red;"></p>
                   <p id="docDate" style="color: red;"></p>
                   <p id="saleSPO" style="color: red;"></p>
                   <p id="mblNo" style="color: red;"></p>
                   <p id="salePcs" style="color: red;"></p>
                   <p id="saleCBM" style="color: red;"></p>
                   <p id="grsWeight" style="color: red;"></p>
                   <p id="chWeight" style="color: red;"></p>
                   <p id="saleRate" style="color: red;"></p>
                   <p id="totalFreight" style="color: red;"></p>
                   <p id="goodsDesc" style="color: red;"></p>
                   <p id="saleOrigin" style="color: red;"></p>
                   <p id="saleDest" style="color: red;"></p>
                   <p id="totalBefDisc" style="color: red;"></p>
                   <p id="saleDisc" style="color: red;"></p>
                   <p id="saleTax" style="color: red;"></p>
                   <p id="saleTotal" style="color: red;"></p>

            				<div class="Bsic_usr_info widget_iner_box">

            								<div class="form_sec_action_btn col-md-12">
            										<div class="form_action_right_btn">
						                      <!-- Go back button code starting here -->
						                      <?php include('inc_widgets/backBtn.php'); ?>
						                      <!-- Go back button code ending here -->
            										</div>
            										  <button type="submit" id="btnSome" name="btnSome" onclick="FormValidation(); return false;"> <small>Submit</small></button>
                                  <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                                  <button type="button" > <small>Cancel</small></button>        
                                  </div>
            										                    <div class="cls"></div>

            								<div class="col-md-6">

                                                             <div class="input-label"><label >Sales Order No. </label></div>
                                                            <div class="input-feild">
                                                                      <input disabled="" type="text" placeholder="" name="soNo" value="<?php echo $soNo ?>">
                                                            </div>

                                                            <div class="input-label"><label >Customer</label></div>
                                                            <div class="input-feild">
                                                                    <select name="saleCust" id="saleCust" class="saleCust" onchange="checkValues()">
                                                                            <option value="">Select </option>
                                                                            <?php

                                                                              $selectCust = mysqli_query($con, "select * from custmaster");

                                                                              while ($rowCust = mysqli_fetch_array($selectCust))
                                                                              {
                                                                                echo '<option value="'.$rowCust['newCode'].'">'.$rowCust['cmpTitle'].'</option>';
                                                                              }
                                                                            ?>
                                                                    </select><span class="steric">*</span>
                                                            </div>
                                                           
                                                       
                                                            <!-- <div class="input-label"><label >Name</label></div>  
                                                            <div class="input-feild">
                                                                   <input disabled  type="text" placeholder="" name="conPerson" id="conPerson" class="conPerson">
                                                            </div> -->
                                                                
                                                            <div class="input-label"><label >Contact Person </label></div>  
                                                            <div class="input-feild">
                                                                     <select name="conPerson" id="conPerson" class="conPerson">
                                                                            <option > </option>
                                                                            <option > </option>
                                                                            <option ></option>
                                                                    </select><span class="steric">*</span>
                                                            </div>

                                                            <div class="input-label"><label >Contact Ref. No.  </label></div>  
                                                            <div class="input-feild">
                                                                    <input  type="text" maxlength="30" placeholder="" name="conRef" id="conRef" class="conRef">
                                                            </div>    
                                                                  
                                                            <div class="input-label"><label >Currency  </label></div>
                                                            <div class="input-feild">
                                                                     <select class="mini_select_field" name="saleCurr" id="saleCurr" >
                                                                            <option value="">Select </option>
                                                                            <?php

                                                                              $selectCust = mysqli_query($con, "select * from currency_setup");

                                                                              while ($rowCust = mysqli_fetch_array($selectCust))
                                                                              {
                                                                                echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cur_name'].'</option>';
                                                                              }
                                                                            ?>
                                                                    </select><span class="steric">*</span>
                                                            </div>   

                                                            <div class="cls"></div>
                                                            <hr>

                                                             <div class="input-label"><label >Agent Party   </label></div>  
                                                            <div class="input-feild">
                                                                  <select class="mini_select_field agentParty" name="agentParty" id="agentParty" >
                                                                             <option value="">Select </option>
                                                                            <?php

                                                                              $selectCust = mysqli_query($con, "select * from sub_agents_parties_setup");

                                                                              while ($rowCust = mysqli_fetch_array($selectCust))
                                                                              {
                                                                                echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['subpartyname'].'</option>';
                                                                              }
                                                                            ?>
                                                                    </select>
                                                            </div> 

                                                             <div class="input-label"><label >Foreign Agent </label></div>  
                                                            <div class="input-feild">
                                                                   <select class="mini_select_field foreignAgent" name="foreignAgent" id="foreignAgent">
                                                                            <option value="">Select </option>
                                                                            <?php

                                                                              $selectCust = mysqli_query($con, "select * from custmaster");

                                                                              while ($rowCust = mysqli_fetch_array($selectCust))
                                                                              {
                                                                                echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                                                                              }
                                                                            ?>
                                                                    </select>
                                                            </div> 

                                                           <div class="input-label"><label >Nomination </label></div>
                                                            <div class="input-feild ">
                                                                    <select class="mini_select_field saleNom" name="saleNom" 
                                                                      id="saleNom">
                                                                            <option value="No">No</option>
                                                                            <option value="Yes" >Yes</option>
                                                                    </select>
                                                            </div> 

                                                            <div id="slctshow">
                                                               <div class="input-label"><label >SPO </label></div>
                                                                <div class="input-feild ">
                                                                        <select class="mini_select_field saleSPO" name="saleSPO" id="saleSPO">
                                                                                 <option value="">Select </option>
                                                                            <?php

                                                                              $selectCust = mysqli_query($con, "select * from spo_setup");

                                                                              while ($rowCust = mysqli_fetch_array($selectCust))
                                                                              {
                                                                                echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['spo_name'].'</option>';
                                                                              }
                                                                            ?>
                                                                    </select><span class="steric">*</span>
                                                                </div>
                                                            </div>    
                                                                           
                            </div>

                            <div class="col-md-6">

                              <div class="input-label"><label >Posting Date  </label></div>  
                              <div class="input-feild">
                                <input type="date" name="postDate" id="postDate" class="postDate"><span class="steric">*</span>
                              </div>

                              <div class="input-label"><label >Document Date</label></div>  
                              <div class="input-feild">
                                <input type="date" name="docDate" id="docDate" class="docDate"><span class="steric">*</span>
                              </div>
                                                                                                                     
                            </div>
                    </div>      

                    <div class="cls"></div>
                    <hr>
            		     <div class="widget_iner_box">
                        <div class="col-md-6">
                            <div class="input-label"><label >MBl No.</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="mblNo" id="mblNo" class="mblNo" maxlength="20">
                            </div>

                            

                            <div class="input-label"><label >Pcs</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="salePcs" id="salePcs" class="salePcs" maxlength="5"><span class="steric">*</span>
                            </div>

                            <div class="input-label"><label >CBM</label></div>  
                            <div class="input-feild">
                                    <input type="text" name="saleCBM" id="saleCBM" class="saleCBM" maxlength="10"><span class="steric">*</span>
                            </div>

                            <div class="input-label"><label >Gross Weight</label></div>  
                            <div class="input-feild">
                                    <input type="text" name="grsWeight" id="grsWeight" class="grsWeight" maxlength="10"><span class="steric">*</span>
                            </div>

                            <div class="input-label"><label >Commodity</label></div>  
                              <div class="input-feild">
                                  <select class="saleComm" name="saleComm" id="saleComm">
                                     <option value="">Select </option>
                                        <?php

                                          $selectCust = mysqli_query($con, "select * from pro_setup_commodity");

                                          while ($rowCust = mysqli_fetch_array($selectCust))
                                          {
                                            echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['pro_name'].'</option>';
                                          }
                                        ?>
                                  </select>
                              </div>

                              <div class="input-label"><label >Charge Weight</label></div>  
                              <div class="input-feild">
                                      <input  type="text" name="chWeight" id="chWeight" class="chWeight"><span class="steric">*</span>
                              </div>

                              <div class="widget_child_title"><h4>Shipping Info</h4></div>

                        </div>


                        <div class="col-md-6">  
                           
                            <div class="input-label"><label >MBL Date</label></div>  
                            <div class="input-feild">
                                    <input  type="date" name="mblDate" id="mblDate" class="mblDate">
                            </div>
                           

                            <div class="input-label"><label >Rate</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="saleRate" id="saleRate" class="saleRate" onfocusout="calcFreight();" maxlength="10" onfocus="calcFreight();"><span class="steric">*</span>
                            </div>

                            <div class="input-label"><label >Total</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="totalFreight" id="totalFreight" class="totalFreight"><span class="steric">*</span>
                            </div>

                             <div class="input-label"><label >Goods & Description</label></div>  
                            <div class="input-feild">
                                    <textarea name="goodsDesc" id="goodsDesc" class="goodsDesc" maxlength="200"></textarea><span class="steric">*</span>
                            </div>
                            </div>
                            <div class="cls"></div>
                           
                            <div class="col-md-6">
                              
                                   <div class="input-label"><label >Origin</label></div>  
                                   <div class="input-feild">
                                      <select name="saleOrigin" id="saleOrigin" class="saleOrigin">
                                               <option value="">Select </option>
                                                    <?php

                                                      $selectCust = mysqli_query($con, "select * from destination_setup");

                                                      while ($rowCust = mysqli_fetch_array($selectCust))
                                                      {
                                                        echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                                      }
                                                    ?>
                                      </select> <span class="steric">*</span>
                                  </div>

                                    <div class="input-label"><label >Destination</label></div>  
                                    <div class="input-feild">
                                           
                                            <select name="saleDest" id="saleDest" class="saleDest">
                                                     <option value="">Select </option>
                                                          <?php

                                                            $selectCust = mysqli_query($con, "select * from destination_setup");

                                                            while ($rowCust = mysqli_fetch_array($selectCust))
                                                            {
                                                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                                            }
                                                          ?>
                                            </select><span class="steric">*</span>
                                    </div>

                                    <div class="input-label"><label >Shipping Line</label></div>  
                                    <div class="input-feild">
                                         <select name="shipLine" id="shipLine" class="shipLine">
                                          <option value="">Select </option>
                                                        <?php

                                                          $selectCust = mysqli_query($con, "select * from shipping_setup");

                                                          while ($rowCust = mysqli_fetch_array($selectCust))
                                                          {
                                                            echo '<option value="'.$rowCust['ship_name'].'">'.$rowCust['ship_name'].'</option>';
                                                          }
                                                        ?>
                                         </select>
                                    </div>

                           </div>

                            <div class="col-md-6"> 

                             <div class="input-label"><label >Vessel</label></div>  
                            <div class="input-feild">
                                    <input type="text" name="saleVessel" id="saleVessel" class="saleVessel" maxlength="40">
                            </div>

                            <div class="input-label"><label >Voyage</label></div>  
                            <div class="input-feild">
                                    <input type="text" name="saleVoyage" id="saleVoyage" class="saleVoyage" maxlength="20">
                            </div>

                        </div>

                            <div class="cls"></div>
                            <hr>
                        
                     </div>            

                    <div class="cls"></div>
                    <hr>
                 		   					<div class="cls"></div>
            										<hr>

                 		   <div class="widget_iner_box">
                 		   		 <div class="col-md-6">
                                                    
                              <div class="input-label"><label >Remarks</label></div>
                              <div class="input-feild">
                                <textarea name="saleRem" id="saleRem" class="saleRem" maxlength="200"></textarea>
                              </div>

                              <div class="input-label"><label>Select Final Notification:</label></div>  
                              <div class="input-feild">
                                <select name="lastNotification" id="lastNotification">
                                  <option value="">Select</option>
                                  <?php

                                    $selectUser = mysqli_query($con, "SELECT * FROM users");

                                    while ($rowUser = mysqli_fetch_array($selectUser))
                                    {
                                      // Searching for the designation name against user's ID
                                      $desig_ID = $rowUser['desig_ID'];

                                      $selectDesig = mysqli_query($con, "SELECT * FROM designation WHERE Desig_ID='$desig_ID' ");
                                      while ($rowDesig = mysqli_fetch_array($selectDesig))
                                      {
                                        $desig = $rowDesig['Desig_name'];
                                      }

                                      echo '<option value="'.$rowUser['user_ID'].'">'.$rowUser['user_fName']. ' ' .$rowUser['user_lName']. ' - ' . $desig . '</option>';
                                    }

                                  ?>
                                </select>
                              </div>                                                         
                                                        </div>  

                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Total Freight Before Discount</label></div>
                                                            <div class="input-feild">
                                                                <input type="text"  name="totalBefDisc" id="totalBefDisc" class="totalBefDisc"><span class="steric">*</span>
                                                            </div>
                                                            
                                                            <div class="input-label"><label >Discount %</label></div>
                                                            <div class="input-feild">
                                                                 <input class="mini_input_field" type="text" name="saleDisc" id="saleDisc" class="saleDisc" maxlength="8">
                                                            </div>

                                                            <div class="input-label"><label >Tax</label></div>
                                                            <div class="input-feild">
                                                                 <input type="text" name="saleTax" id="saleTax" class="saleTax" onfocusout="afterDisc();" maxlength="10">
                                                            </div>

                                                            <div class="input-label"><label >Total</label></div>
                                                            <div class="input-feild">
                                                                 <input  type="text" name="saleTotal" id="saleTotal" class="saleTotal"><span class="steric">*</span>
                                                            </div>

                                                            <div class="input-label"><label >Reason For Sale</label></div>
                                                            <div class="input-feild">
                                                              <textarea name="saleReason" id="saleReason" class="saleReason" maxlength="200"></textarea>
                                                            </div>                                                       
                                                        </div>    
                       </div>  

                       <div class="cls"></div>
                       <hr>

      		</form>
	</div>

</div>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script>
  $('#nominationdrpdwn').on('change',function(){
    if( $(this).val()==="yes"){
    $("#slctshow").hide()
    }
    else{
    $("#slctshow").show()
    }
});

</script>

<script type="text/javascript">
function saveFunc()
{
  $("#save_Modal").modal();
}
</script>
<script type="text/javascript">
function submitFunc()
{
  $("#submit_Modal").modal();
}
</script>


<script type="text/javascript">
function checkValues() {
 var customerCont = document.getElementById("saleCust").value;

      $.ajax({
         url:"sales_air_export_ajax.php",  
                method:"GET",  
                data:{customerCont:customerCont},  
                dataType:"text",  
         success: function(data) {
              $('.conPerson').html(data); 
                }
      });
 
}
</script>

<script type="text/javascript">
  function calcFreight()
  {
    var totalFreight;
    var chWeight = document.getElementById("chWeight").value;
    var saleRate = document.getElementById("saleRate").value;
    // alert("Working" + " " + MAWB_rate);
    totalFreight = chWeight * saleRate;
    document.getElementById("totalFreight").value = totalFreight;
    document.getElementById("totalBefDisc").value = totalFreight;
  }

  function afterDisc()
  {
    var saleTotal;
    var saleDisc = document.getElementById("saleDisc").value;
    var saleTax = document.getElementById("saleTax").value;
    var totalBefDisc = document.getElementById("totalBefDisc").value;
    // alert("Working" + " " + MAWB_rate);
    // saleTotal = 1 - (saleDisc / 100);
    totalDis = 1 - (saleDisc / 100);
    totalTax = +saleTax + +totalBefDisc;
    saleTotal = totalTax * totalDis;
    //saleTotal = saleTax + +totalBefDisc (1 - (saleDisc / 100));
    document.getElementById("saleTotal").value = saleTotal;
    // document.getElementById("totalBefDisc").value = totalFreight;
  }
</script>

<!-- <script>

  $(document).ready(function() {
    $('#Campaigntable').DataTable({
       "scrollX": true
   });
    $('#Campaigntable1').DataTable({
       "scrollX": true
   });
     $('#Campaigntable2').DataTable({
       "scrollX": true,
   });

     $('#aimport_form_table').DataTable({
       "scrollX": true,
       "ordering":false,
       "paging":false,
       "info":false
   });


     $('#aimport_form_table2').DataTable({
       "scrollX": true,
       "ordering":false,
       "paging":false,
       "info":false
   });


} );

</script> -->

<script type="text/javascript">
   function FormValidation()
   {
      // var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/;
      var re = /\S+@\S+\.\S+/;
      var regexp = /^[a-z .\-]+$/i;
      var regexp3 = /^[a-z, -, 0-9]+$/i;
      var regexp2 = /^[0-9]*$/i;
      var regexp4 = /^[0-9, . , 0-9]*$/i;
      var regexn = /^(\d+-?)+\d+$/;
      var missingVal = 0;

      var saleCust=document.getElementById('saleCust').value;
      var conPerson=document.getElementById('conPerson').value;
      var saleCurr=document.getElementById('saleCurr').value;
      var postDate=document.getElementById('postDate').value;
      var docDate=document.getElementById('docDate').value;
      var saleSPO=document.getElementById('saleSPO').value;
      var mblNo=document.getElementById('mblNo').value;
      var salePcs=document.getElementById('salePcs').value;
      var saleCBM=document.getElementById('saleCBM').value;
      var grsWeight=document.getElementById('grsWeight').value;
      var chWeight=document.getElementById('chWeight').value;
      var saleRate=document.getElementById('saleRate').value;
      var totalFreight=document.getElementById('totalFreight').value;
      var goodsDesc=document.getElementById('goodsDesc').value;
      var saleOrigin=document.getElementById('saleOrigin').value;
      var saleDest=document.getElementById('saleDest').value;
      var totalBefDisc=document.getElementById('totalBefDisc').value;
      var saleDisc=document.getElementById('saleDisc').value;
      var saleTax=document.getElementById('saleTax').value;
      var saleTotal=document.getElementById('saleTotal').value;

      var summary = "Summary: ";

      if(saleCust == "")
      {
          document.getElementById('saleCust').style.borderColor = "red";
          missingVal = 1;
          // summary += "First name is required.";
          document.getElementById("V_saleCust").innerHTML = "Customer is required.";
      }
      if(saleCust != "")
      {
          document.getElementById('saleCust').style.borderColor = "white";
          document.getElementById("V_saleCust").innerHTML = "";
      }

      if(conPerson == "")
      {
          document.getElementById('conPerson').style.borderColor = "red";
          missingVal = 1;
          // summary += "First name is required.";
          document.getElementById("V_conPerson").innerHTML = "Contact person is required.";
      }
      if(conPerson != "")
      {
          document.getElementById('conPerson').style.borderColor = "white";
          document.getElementById("V_conPerson").innerHTML = "";
      }

      if(saleCurr == "")
      {
          document.getElementById('saleCurr').style.borderColor = "red";
          missingVal = 1;
          // summary += "Last name is required.";
          document.getElementById("V_saleCurr").innerHTML = "Currency required.";
      }
      if(saleCurr != "")
      {
          document.getElementById('saleCurr').style.borderColor = "white";
          document.getElementById("V_saleCurr").innerHTML = "";
      }

      if(postDate == "")
      {
          document.getElementById('postDate').style.borderColor = "red";
          missingVal = 1;
          // summary += " Father/Husband name is required.";
          document.getElementById("V_postDate").innerHTML = "Post Date is required.";
      }
      if(postDate != "")
      {
          document.getElementById('postDate').style.borderColor = "white";
          document.getElementById("V_postDate").innerHTML = "";
      }

      if(docDate == "")
      {
          document.getElementById('docDate').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_docDate").innerHTML = "Document date required.";
      }
      if(docDate != "")
      {
          document.getElementById('docDate').style.borderColor = "white";
          document.getElementById("V_docDate").innerHTML = "";
      }

      if(saleSPO == "")
      {
          document.getElementById('saleSPO').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleSPO").innerHTML = "SPO required.";
      }
      if(saleSPO != "")
      {
          document.getElementById('saleSPO').style.borderColor = "white";
          document.getElementById("V_saleSPO").innerHTML = "";
      }

      if(mblNo != "")
      {
          document.getElementById('mblNo').style.borderColor = "white";
          document.getElementById("V_mblNo").innerHTML = "";

          if (!regexp3.test(mblNo))
          {
              document.getElementById('mblNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_mblNo").innerHTML = "Sale pieces must contain numbers only.";
          }
      }

      if(salePcs == "")
      {
          document.getElementById('salePcs').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_salePcs").innerHTML = "Sale pieces required.";
      }
      if(salePcs != "")
      {
          document.getElementById('salePcs').style.borderColor = "white";
          document.getElementById("V_salePcs").innerHTML = "";

          if (!regexp2.test(salePcs))
          {
              document.getElementById('salePcs').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_salePcs").innerHTML = "Sale pieces must contain numbers only.";
          }
      }

      if(saleCBM == "")
      {
          document.getElementById('saleCBM').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleCBM").innerHTML = "CBM required.";
      }
      if(saleCBM != "")
      {
          document.getElementById('saleCBM').style.borderColor = "white";
          document.getElementById("V_saleCBM").innerHTML = "";

          if (!regexp4.test(saleCBM))
          {
              document.getElementById('saleCBM').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleCBM").innerHTML = "CBM must contain numbers or decimals only.";
          }
      }

      if(grsWeight == "")
      {
          document.getElementById('grsWeight').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_grsWeight").innerHTML = "Gross Weight required.";
      }
      if(grsWeight != "")
      {
          document.getElementById('grsWeight').style.borderColor = "white";
          document.getElementById("V_grsWeight").innerHTML = "";

          if (!regexp4.test(grsWeight))
          {
              document.getElementById('grsWeight').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_grsWeight").innerHTML = "Gross must contain numbers or decimals only.";
          }
      }

      if(chWeight == "")
      {
          document.getElementById('chWeight').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_chWeight").innerHTML = "Charge weight required.";
      }
      if(chWeight != "")
      {
          document.getElementById('chWeight').style.borderColor = "white";
          document.getElementById("V_chWeight").innerHTML = "";
      }

      if(saleRate == "")
      {
          document.getElementById('saleRate').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleRate").innerHTML = "Sale rate is required.";
      }
      if(saleRate != "")
      {
          document.getElementById('saleRate').style.borderColor = "white";
          document.getElementById("V_saleRate").innerHTML = "";

          if (!regexp4.test(saleRate))
          {
              document.getElementById('saleRate').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleRate").innerHTML = "Sale rate must contain numbers or decimals only.";
          }
      }

      if(totalFreight == "")
      {
          document.getElementById('totalFreight').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_totalFreight").innerHTML = "Total freight is required.";
      }
      if(totalFreight != "")
      {
          document.getElementById('totalFreight').style.borderColor = "white";
          document.getElementById("V_totalFreight").innerHTML = "";
      }

      if(goodsDesc == "")
      {
          document.getElementById('goodsDesc').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_goodsDesc").innerHTML = "Goods description required.";
      }
      if(goodsDesc != "")
      {
          document.getElementById('goodsDesc').style.borderColor = "white";
          document.getElementById("V_goodsDesc").innerHTML = "";
      }

      if(saleOrigin == "")
      {
          document.getElementById('saleOrigin').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleOrigin").innerHTML = "Sale origin required.";
      }
      if(saleOrigin != "")
      {
          document.getElementById('saleOrigin').style.borderColor = "white";
          document.getElementById("V_saleOrigin").innerHTML = "";
      }

      if(saleDest == "")
      {
          document.getElementById('saleDest').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleDest").innerHTML = "Sale destination required.";
      }
      if(saleDest != "")
      {
          document.getElementById('saleDest').style.borderColor = "white";
          document.getElementById("V_saleDest").innerHTML = "";
      }

      if(totalBefDisc == "")
      {
          document.getElementById('totalBefDisc').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_totalBefDisc").innerHTML = "Origin required.";
      }
      if(totalBefDisc != "")
      {
          document.getElementById('totalBefDisc').style.borderColor = "white";
          document.getElementById("V_totalBefDisc").innerHTML = "";
      }

      if(saleDisc != "")
      {
          if (!regexp4.test(saleDisc))
          {
              document.getElementById('saleDisc').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleDisc").innerHTML = "Discount must contain numbers or decimals only.";
          }
      }

      if(saleTax != "")
      {
          document.getElementById('saleTax').style.borderColor = "white";
          document.getElementById("V_saleTax").innerHTML = "";

          if (!regexp4.test(saleTax))
          {
              document.getElementById('saleTax').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleTax").innerHTML = "Tax must contain numbers or decimals only.";
          }
      }

      if(saleTotal == "")
      {
          document.getElementById('saleTotal').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleTotal").innerHTML = "Sale Total required.";
      }
      if(saleTotal != "")
      {
          document.getElementById('saleTotal').style.borderColor = "white";
          document.getElementById("V_saleTotal").innerHTML = "";
      }

      ///////////////////////////////////////

      if (missingVal != 1)
      {
        document.getElementById('saleCust').style.borderColor = "white";
        document.getElementById('conPerson').style.borderColor = "white";
        document.getElementById('saleCurr').style.borderColor = "white";
        document.getElementById('postDate').style.borderColor = "white";
        document.getElementById('docDate').style.borderColor = "white";
        document.getElementById('saleSPO').style.borderColor = "white";
        document.getElementById('mblNo').style.borderColor = "white";
        document.getElementById('salePcs').style.borderColor = "white";
        document.getElementById('saleCBM').style.borderColor = "white";
        document.getElementById('grsWeight').style.borderColor = "white";
        document.getElementById('chWeight').style.borderColor = "white";
        document.getElementById('saleRate').style.borderColor = "white";
        document.getElementById('totalFreight').style.borderColor = "white";
        document.getElementById('goodsDesc').style.borderColor = "white";
        document.getElementById('saleOrigin').style.borderColor = "white";
        document.getElementById('saleDest').style.borderColor = "white";
        document.getElementById('totalBefDisc').style.borderColor = "white";
        document.getElementById('saleDisc').style.borderColor = "white";
        document.getElementById('saleTax').style.borderColor = "white";
        document.getElementById('saleTotal').style.borderColor = "white";
        
        $("#submit_Modal").modal();
       
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent=summary;
      }
  }
</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>