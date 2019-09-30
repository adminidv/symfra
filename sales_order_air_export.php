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

// echo $lasID;

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
   $saleStatus;
   $postDate =$_POST['postDate'];
   $docDate =$_POST['docDate'];
   $agentParty =$_POST['agentParty'];
   $foreignAgent =$_POST['foreignAgent'];
   $saleNom =$_POST['saleNom'];
   $saleSPO =$_POST['saleSPO'];
   // $mawbNo =$_POST['mawbNo'];
   // $mawbDate =$_POST['mawbDate'];
   // $mblNo =$_POST['mblNo'];
   // $mblDate =$_POST['mblDate'];
   $salePcs =$_POST['salePcs'];
   $saleCBM =$_POST['volWeight'];
   $grsWeight =$_POST['grsWeight'];
   $saleComm =$_POST['saleComm'];
   $chWeight =$_POST['chWeight'];
   $saleRate =$_POST['saleRate'];
   $totalFreight =$_POST['totalFreight'];
   $goodsDesc =$_POST['goodsDesc'];
   $saleOrigin =$_POST['saleOrigin'];
   $saleDest =$_POST['saleDest'];
   $saleRem =$_POST['saleRem'];
   $totalBefDisc =$_POST['totalBefDisc'];
   $saleDisc =$_POST['saleDisc'];
   $saleTax =$_POST['saleTax'];
   $saleTotal =$_POST['saleTotal'];
   $saleReason =$_POST['saleReason'];
   $saleLength =$_POST['volLength'];
   $saleWidth =$_POST['volWidth'];
   $saleHight =$_POST['volHeight'];
   $lastNotification =$_POST['lastNotification'];
   // $saleVolWt =$_POST['saleVolWt'];
   // $saleType ="$_POST['saleType']";

   // Checking for approval if present
  $selectAppFlow = mysqli_query($con, "SELECT * FROM appdoc WHERE appDept='Sales' AND appForm='Air Export' ");
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

      $insertQurey= mysqli_query($con, "insert into saleorders (soNo,saleCust,conPerson,conRef,saleCurr,saleStatus,postDate,docDate,agentParty,foreignAgent,saleNom,saleSPO,salePcs,saleCBM,grsWeight,saleComm,chWeight,saleRate,totalFreight,goodsDesc,saleOrigin,saleDest,saleRem,totalBefDisc,saleDisc,saleTax,saleTotal,saleReason,saleLength,saleWidth,saleHeight,saleType, lastNotification) value ('$soNo','$saleCust','$conPerson','$conRef','$saleCurr','Waiting for first approval','$postDate','$docDate','$agentParty','$foreignAgent','$saleNom','$saleSPO','$salePcs','$saleCBM','$grsWeight','$saleComm','$chWeight','$saleRate','$totalFreight','$goodsDesc','$saleOrigin','$saleDest','$saleRem','$totalBefDisc','$saleDisc','$saleTax','$saleTotal','$saleReason','$saleLength','$saleWidth','$saleHight','Air Export', '$lastNotification')")or die(mysqli_error($con));

        // $userID = $_SESSION['user'];
        $selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
        while ($rowNotUser = mysqli_fetch_array($selectUsername))
        {
          $userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
        }

        // Username for notification
        // $userNot = $user_fName . ' ' . $user_lName;

        // Inserting notification
        $insertNot = mysqli_query($con, "INSERT INTO nottable (notTitle, notDateTime, notStatus, creatorID, createdBy, notOn, notRecord, appFlowID, mainCreator, notApp) VALUES ('Air Export', '$finalDate', 'Approval Pending', '$userID', '$userNot', '$notOn', '$newID', '$appFlowID', '$userID', '1') ") or die(mysqli_error($con));

      header("Location: sales_order_air_export.php");
    }

    else
    {
      $insertQurey= mysqli_query($con, "insert into saleorders (soNo,saleCust,conPerson,conRef,saleCurr,saleStatus,postDate,docDate,agentParty,foreignAgent,saleNom,saleSPO,salePcs,saleCBM,grsWeight,saleComm,chWeight,saleRate,totalFreight,goodsDesc,saleOrigin,saleDest,saleRem,totalBefDisc,saleDisc,saleTax,saleTotal,saleReason,saleLength,saleWidth,saleHeight,saleType, lastNotification) value ('$soNo','$saleCust','$conPerson','$conRef','$saleCurr','Active','$postDate','$docDate','$agentParty','$foreignAgent','$saleNom','$saleSPO','$salePcs','$saleCBM','$grsWeight','$saleComm','$chWeight','$saleRate','$totalFreight','$goodsDesc','$saleOrigin','$saleDest','$saleRem','$totalBefDisc','$saleDisc','$saleTax','$saleTotal','$saleReason','$saleLength','$saleWidth','$saleHight','Air Export', '$lastNotification')")or die(mysqli_error($con));

      header("Location: sales_order_air_export.php");
    }

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Order(Air Export)</title>
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
          <a href="sales_order_air_export.php" class="btn btn-info active">Sales Order(Air Export)</a>
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

           <?php include 'sidebar_widgets/ae_advanced_search_widget.php'; ?>
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
      		<form action="" method="POST" enctype="multipart/form-data">

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

       <h4><label id="formSummary" style="color: red;"></label></h4>
       <p id="V_saleCust" style="color: red;"></p>
       <p id="V_saleCurr" style="color: red;"></p>
       <p id="V_postDate" style="color: red;"></p>
       <p id="V_docDate" style="color: red;"></p>
       <p id="V_saleSPO" style="color: red;"></p>
       <p id="V_salePcs" style="color: red;"></p>
       <p id="V_grsWeight" style="color: red;"></p>
       <p id="V_saleComm" style="color: red;"></p>
       <p id="V_chWeight" style="color: red;"></p>
       <p id="V_saleRate" style="color: red;"></p>
       <p id="V_totalFreight" style="color: red;"></p>
       <p id="V_goodsDesc" style="color: red;"></p>
       <p id="V_saleDest" style="color: red;"></p>
       <p id="V_saleOrigin" style="color: red;"></p>
       <p id="V_totalBefDisc" style="color: red;"></p>
       <p id="V_saleTotal" style="color: red;"></p>
       <p id="V_conRef" style="color: red;"></p>
       <p id="V_saleDisc" style="color: red;"></p>

            				<div class="Bsic_usr_info widget_iner_box">

            								<div class="form_sec_action_btn col-md-12">
            										<div class="form_action_right_btn">
						                      <!-- Go back button code starting here -->
						                      <?php include('inc_widgets/backBtn.php'); ?>
						                      <!-- Go back button code ending here -->
            										</div>
            										<button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
                                <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                                <button type="button" name="submitBtn"> <small>Cancel</small></button>				
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
                                                                    <input  type="text" maxlength="30"  placeholder="" name="conRef" id="conRef" class="conRef">
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
                          <div class="input-label"><label >Pcs</label></div>  
                          <div class="input-feild">
                                  <input  type="text" maxlength="5" name="salePcs" id="salePcs" class="salePcs"><span class="steric">*</span> 
                          </div>

                          <div class="input-label"><label >Gross Weight</label></div>  
                          <div class="input-feild">
                                  <input  type="text" name="grsWeight" id="grsWeight" class="grsWeight"><span class="steric">*</span> 
                          </div>

                          <div class="input-label"><label >Commodity</label></div>  
                          <div class="input-feild">
                              <select class="saleComm" name="saleComm" id="saleComm"><span class="steric">*</span> 
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


                          <div class="cls"></div>
                          <hr>

                          <div class="widget_child_title"><h4>Shipping Info</h4></div>

                          <div class="input-label"><label >Origin</label></div>  
                          <div class="input-feild">
                                  <select name="saleDest" id="saleDest" class="saleDest"><span class="steric">*</span> 
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
                                 
                                  <select name="saleOrigin" id="saleOrigin" class="saleOrigin"><span class="steric">*</span> 
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


                      </div>
                      <div class="col-md-6"> 

                          <div class="col-md-3">
    
             
              <!-- volumatic popup-->
              <!-- Modal_one-->
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
        </div>

                          <div class="input-label"><label >Volumatic Weight</label></div>  
                           <div class="input-feild">
                              <button type="button"  data-toggle="modal" data-target="#popup_4">Check Volume.</button>
                          </div>

                          <div class="input-label"><label >Charge Weight</label></div>  
                          <div class="input-feild">
                              <input  type="text" name="chWeight" id="chWeight" class="chWeight"><span class="steric">*</span> 
                          </div>

                          <div class="input-label"><label >Rate</label></div>  
                          <div class="input-feild">
                              <input  type="text" name="saleRate" id="saleRate" maxlength="10" class="saleRate" onfocusout="calcFreight();"><span class="steric">*</span> 
                          </div>

                          <div class="input-label"><label >Total Freight</label></div>  
                          <div class="input-feild">
                              <input  type="text" name="totalFreight" id="totalFreight" class="totalFreight"><span class="steric">*</span> 
                          </div>

                          <div class="input-label"><label >Goods & Description</label></div>  
                          <div class="input-feild">
                              <textarea name="goodsDesc" id="goodsDesc" class="goodsDesc" maxlength="200"></textarea><span class="steric">*</span> 
                          </div>

                      </div>
                    </div>            

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
                                   <input class="mini_input_field" type="text" maxlength="8" name="saleDisc" id="saleDisc" class="saleDisc">
                              </div>

                              <div class="input-label"><label >Tax</label></div>
                              <div class="input-feild">
                                   <input  type="text" name="saleTax" id="saleTax" maxlength="10" class="saleTax" onfocusout="afterDisc();">
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
   </div> 

      		</form>
	</div>
                    <!-- <div class="col-md-12 topscrolbtn"> 
                       <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
                    </div>  -->
</div>

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

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
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
  var grsWeight = document.getElementById("grsWeight").value;
  var volWeightInt = parseInt(volWeight);
  var grs_weightInt = parseInt(grsWeight);
  $('#popup_4').modal('hide');
  if (grsWeight > volWeightInt)
  {
    document.getElementById("chWeight").value = grsWeight;
  }
  else if (grsWeight < volWeightInt)
  {
    document.getElementById("chWeight").value = volWeight;
  }
  // alert(volWeight);
}

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

<script type="text/javascript">
   function FormValidation()
   {
      // var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/;
      var re = /\S+@\S+\.\S+/;
      var regexp = /^[a-z .\-]+$/i;
      var regexp2 = /^[0-9]*$/i;
      var regexn = /^(\d+-?)+\d+$/;
      var missingVal = 0;

      var saleCust=document.getElementById('saleCust').value;
      var saleCurr=document.getElementById('saleCurr').value;
      var postDate=document.getElementById('postDate').value;
      var docDate=document.getElementById('docDate').value;
      var saleSPO=document.getElementById('saleSPO').value;
      var salePcs=document.getElementById('salePcs').value;
      var grsWeight=document.getElementById('grsWeight').value;
      // var fileToUpload=document.getElementById('fileToUpload').value;
      var saleComm=document.getElementById('saleComm').value;
      // var empChildren=document.getElementById('empChildren').value;
      var chWeight=document.getElementById('chWeight').value;
      var saleRate=document.getElementById('saleRate').value;
      var totalFreight=document.getElementById('totalFreight').value;
      var goodsDesc=document.getElementById('goodsDesc').value;
      var saleDest=document.getElementById('saleDest').value;
      var saleOrigin=document.getElementById('saleOrigin').value;
      var totalBefDisc=document.getElementById('totalBefDisc').value;
      var saleTotal=document.getElementById('saleTotal').value;
      var conRef=document.getElementById('conRef').value;
      var saleDisc=document.getElementById('saleDisc').value;
    
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

          /*if (!regexp.test(empFName))
          {
            document.getElementById('empFName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empFName").innerHTML = "Only alphabets are allowed in firstname.";
          }*/
      }

      if(conRef != "")
      {
          if (!regexp2.test(conRef))
          {
            document.getElementById('conRef').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_conRef").innerHTML = "Only numbers are allowed in contact reference.";
          }
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

          /*if (!regexp.test(empLName))
          {
              document.getElementById('empLName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empLName").innerHTML = "Only alphabets are allowed in lastname.";
          }*/
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

          /*if (!regexp.test(empGrdName))
          {
              document.getElementById('empGrdName').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_empGrdName").innerHTML = "Only alphabets are allowed in Father/Husband name.";
          }*/
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

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
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

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
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

          if (!regexn.test(salePcs))
          {
              document.getElementById('salePcs').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_salePcs").innerHTML = "Sale pieces must contain numbers only.";
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

          if (!regexn.test(grsWeight))
          {
              document.getElementById('grsWeight').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_grsWeight").innerHTML = "Gross must contain numbers only.";
          }
      }

      if(saleComm == "")
      {
          document.getElementById('saleComm').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleComm").innerHTML = "Commodity required.";
      }
      if(saleComm != "")
      {
          document.getElementById('saleComm').style.borderColor = "white";
          document.getElementById("V_saleComm").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(chWeight == "")
      {
          document.getElementById('chWeight').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_chWeight").innerHTML = "Charge Weight required.";
      }
      if(chWeight != "")
      {
          document.getElementById('chWeight').style.borderColor = "white";
          document.getElementById("V_chWeight").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(saleRate == "")
      {
          document.getElementById('saleRate').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleRate").innerHTML = "Sale Rate required.";
      }
      if(saleRate != "")
      {
          document.getElementById('saleRate').style.borderColor = "white";
          document.getElementById("V_saleRate").innerHTML = "";

          if (!regexn.test(saleRate))
          {
              document.getElementById('saleRate').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleRate").innerHTML = "Sale Rate must contain numbers only.";
          }
      }

      if(totalFreight == "")
      {
          document.getElementById('totalFreight').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_totalFreight").innerHTML = "Total Freight required.";
      }
      if(totalFreight != "")
      {
          document.getElementById('totalFreight').style.borderColor = "white";
          document.getElementById("V_totalFreight").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(goodsDesc == "")
      {
          document.getElementById('goodsDesc').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_goodsDesc").innerHTML = "Goods Description required.";
      }
      if(goodsDesc != "")
      {
          document.getElementById('goodsDesc').style.borderColor = "white";
          document.getElementById("V_goodsDesc").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(saleDest == "")
      {
          document.getElementById('saleDest').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleDest").innerHTML = "Destination required.";
      }
      if(saleDest != "")
      {
          document.getElementById('saleDest').style.borderColor = "white";
          document.getElementById("V_saleDest").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(saleOrigin == "")
      {
          document.getElementById('saleOrigin').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_saleOrigin").innerHTML = "Origin required.";
      }
      if(saleOrigin != "")
      {
          document.getElementById('saleOrigin').style.borderColor = "white";
          document.getElementById("V_saleOrigin").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      if(saleDisc != "")
      {
          if (!regexn.test(saleDisc))
          {
              document.getElementById('saleDisc').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("V_saleDisc").innerHTML = "Discount must contain numbers only.";
          }
      }

      if(totalBefDisc == "")
      {
          document.getElementById('totalBefDisc').style.borderColor = "red";
          missingVal = 1;
          // summary +=  " CNIC number is required ";
          document.getElementById("V_totalBefDisc").innerHTML = "Total before Discount required.";
      }
      if(totalBefDisc != "")
      {
          document.getElementById('totalBefDisc').style.borderColor = "white";
          document.getElementById("V_totalBefDisc").innerHTML = "";

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
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

          /*if (!regexn.test(cnicNo))
          {
              document.getElementById('cnicNo').style.borderColor = "red";
              missingVal = 1;
              // summary += "Firstname is required.";
              document.getElementById("s_cnicNo").innerHTML = "CNIC must contain numbers only.";
          }*/
      }

      ///////////////////////////////////////

      if (missingVal != 1)
      {
        document.getElementById('saleCust').style.borderColor = "white";
        // document.getElementById('empMName').style.borderColor = "white";
        document.getElementById('saleCurr').style.borderColor = "white";

        document.getElementById('postDate').style.borderColor = "white";
        document.getElementById('docDate').style.borderColor = "white";
        document.getElementById('saleSPO').style.borderColor = "white";
        document.getElementById('salePcs').style.borderColor = "white";

        // document.getElementById('fileToUpload').style.borderColor = "white";
        document.getElementById('grsWeight').style.borderColor = "white";
        // document.getElementById('empChildren').style.borderColor = "white";
        document.getElementById('saleComm').style.borderColor = "white";
        // document.getElementById('empPerEmail').style.borderColor = "white";
        document.getElementById('chWeight').style.borderColor = "white";

        document.getElementById('saleRate').style.borderColor = "white";

        document.getElementById('totalFreight').style.borderColor = "white";
        document.getElementById('goodsDesc').style.borderColor = "white";
        document.getElementById('saleDest').style.borderColor = "white";
        document.getElementById('saleOrigin').style.borderColor = "white";

        document.getElementById('totalBefDisc').style.borderColor = "white";
        document.getElementById('saleTotal').style.borderColor = "white";
        document.getElementById('conRef').style.borderColor = "white";
        document.getElementById('saleDisc').style.borderColor = "white";
        
        $("#submit_Modal").modal();
       
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