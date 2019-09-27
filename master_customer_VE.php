<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

// Getting the Customer ID
$custID = $_GET['custID'];
$qry= "SELECT * FROM custmaster WHERE newCode = '$custID'";
$run= mysqli_query($con, $qry);
$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($custID==$row['newCode'])
{
  $cmpType_p = $row['cmpType'];
  $legCode_p = $row['legCode'];
  $newCode_p = $row['newCode'];
  $cmpTitle_p = $row['cmpTitle'];
  $cmpStreet_p = $row['cmpStreet'];
  $cmpCity_p = $row['cmpCity'];
  $cmpCountry_p = $row['cmpCountry'];
  $telCode_p = $row['telCode'];
  $telNumber_p = $row['telNumber'];
  $cmpWebsite_p = $row['cmpWebsite'];
  $cmpEmail_p = $row['cmpEmail'];
  $taxType_p = $row['taxType'];
  $taxNo_p = $row['taxNo'];
  $SPO_p = $row['SPO'];
  $businessSector_p = $row['businessSector'];
  $seaImport_p = $row['seaImport'];
  $airImport_p = $row['airImport'];
  $seaExport_p = $row['seaExport'];
  $airExport_p = $row['airExport'];

  $selectSPOName = mysqli_query($con, "SELECT * FROM spo_setup WHERE SrNo='$SPO_p' ");
  while ($rowSPOName = mysqli_fetch_array($selectSPOName))
  {
  	$SPOName_p = $rowSPOName['spo_name'];
  }
 }


// After Submit 
if(isset($_POST['submitBtn1']))
{
	  $cmpType = $_POST['cmpType'];
	  $legCode = $_POST['legCode'];
	  $newCode = $_POST['newCode'];
	  $cmpTitle = $_POST['cmpTitle'];
	  $cmpStreet = $_POST['cmpStreet'];
	  $cmpCity = $_POST['cmpCity'];
	  $cmpCountry = $_POST['cmpCountry'];
	  $telCode = $_POST['telCode'];
	  $telNumber = $_POST['telNumber'];
	  $cmpWebsite = $_POST['cmpWebsite'];
	  $cmpEmail = $_POST['cmpEmail'];
	  $taxType = $_POST['taxType'];
	  $taxNo = $_POST['taxNo'];
	  $SPOId = $_POST['SPO'];
	 

	$clause = " WHERE newCode='$custID'";
	$initQuery = "UPDATE custmaster SET legCode='$legCode' ";

	  $selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$custID' ORDER BY instance DESC LIMIT 1  ");
	  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

	  $lastID1 = $rowLastID1['instance'];
	  $newID1 = $lastID1 + 1;
	  $instance = $newID1;

	  $selectCreate = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$custID' ");
	  while ($rowCreate = mysqli_fetch_array($selectCreate))
	  {
	    if ($rowCreate['createBy'] != "")
	    {
	      $createBy = $rowCreate['createBy'];
	    }
	    if ($rowCreate['createDate'] != "")
	    {
	      $createDate = $rowCreate['createDate'];
	    }
	  }

	  $initChangeLog = "INSERT INTO chainlog (instance, formName, record_id, createBy, createDate, updateBy, updateDate, perValue, newValue)";
	  $initChangeLog .= " VALUES ('$newID1', 'Customer', '$custID', '$createBy', '$createDate', '$loginUser', '$todayDate'";




	   if ($cmpType != $cmpType_p)
	  {
	    $initQuery .= ", cmpType='$cmpType'";
	    $initChangeLog2 = ", '$cmpType_p', '$cmpType') ";
	  }

	  if ($legCode != $legCode_p)
	  {
	    $initQuery .= ", legCode='$legCode'";
	    $initChangeLog2 = ", '$legCode_p', '$legCode') ";
	  }

	  if ($newCode != $newCode_p)
	  {
	    $initQuery .= ", newCode='$newCode'";
	    $initChangeLog2 = ", '$newCode_p', '$newCode') ";
	  }




	  if ($cmpTitle != $cmpTitle_p)
	  {
	    $initQuery .= ", cmpTitle='$cmpTitle'";
	    $initChangeLog2 = ", '$cmpTitle_p', '$cmpTitle') ";
	  }


	  if ($cmpStreet != $cmpStreet_p)
	  {
	    $initQuery .= ", cmpStreet='$cmpStreet'";
	    $initChangeLog2 = ", '$cmpStreet_p', '$cmpStreet') ";
	  }

	  if ($cmpCity != $cmpCity_p)
	  {
	    $initQuery .= ", cmpCity='$cmpCity'";
	    $initChangeLog2 = ", '$cmpCity_p', '$cmpCity') ";
	  }


	  if ($cmpCountry != $cmpCountry_p)
	  {
	    $initQuery .= ", cmpCountry='$cmpCountry'";
	    $initChangeLog2 = ", '$cmpCountry_p', '$cmpCountry') ";
	  }


	  if ($telCode != $telCode_p)
	  {
	    $initQuery .= ", telCode='$telCode'";
	    $initChangeLog2 = ", '$telCode_p', '$telCode') ";
	  }



	  if ($telNumber != $telNumber_p)
	  {
	    $initQuery .= ", telNumber='$telNumber'";
	    $initChangeLog2 = ", '$telNumber_p', '$telNumber') ";
	  }


	  if ($cmpWebsite != $cmpWebsite_p)
	  {
	    $initQuery .= ", cmpWebsite='$cmpWebsite'";
	    $initChangeLog2 = ", '$cmpWebsite_p', '$cmpWebsite') ";
	  }


	  if ($cmpEmail != $cmpEmail_p)
	  {
	    $initQuery .= ",cmpEmail='$cmpEmail'";
	    $initChangeLog2 = ", '$cmpEmail_p', '$cmpEmail') ";
	  }


	  if ($taxType != $taxType_p)
	  {
	    $initQuery .= ", taxType='$taxType'";
	    $initChangeLog2 = ", '$taxType_p', '$taxType') ";
	  }
	  

	    if ($taxNo != $taxNo_p)
	  {
	    $initQuery .= ", taxNo='$taxNo'";
	    $initChangeLog2 = ", '$taxNo_p', '$taxNo') ";
	  }


	    if ($SPO != $SPO_p)
	  {
	    $initQuery .= ", SPO='$SPO'";
	    $initChangeLog2 = ", '$SPO_p', '$SPO') ";
	  }


	    if ($seaImport != $seaImport_p)
	  {
	    $initQuery .= ", seaImport='$seaImport'";
	    $initChangeLog2 = ", '$seaImport_p', '$seaImport') ";
	  }  

	     if ($airImport != $airImport_p)
	  {
	    $initQuery .= ", airImport='$airImport'";
	    $initChangeLog2 = ", '$airImport_p', '$airImport') ";
	  }  


	     if ($seaExport != $seaExport_p)
	  {
	    $initQuery .= ", seaExport='$seaExport'";
	    $initChangeLog2 = ", '$seaExport_p', '$seaExport') ";
	  }  


	     if ($airExport != $airExport_p)
	  {
	    $initQuery .= ", airExport='$airExport'";
	    $initChangeLog2 = ", '$airExport_p', '$airExport') ";
	  }  


	  $finalQuery = $initQuery . $clause;
			// echo $finalQuery;

	  mysqli_query($con, $finalQuery) or die(mysqli_error($con));



		 //qurey..
	  $finalChangeLog = $initChangeLog . $initChangeLog2;
	  

	  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));



	 header("Location: master_customer_VE.php?custID=" . $custID);



}

// add Representative
if (isset($_POST['btnadd'])) {
 $rep_name= $_POST['rep_name'];
  $rep_desg= $_POST['rep_desg'];
  $rep_office_no = $_POST['rep_office_no'];
  $rep_phone_no = $_POST['rep_phone_no'];
  $email = $_POST['email'];
  
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }


  $expload = $custID."-Cust";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  //header("Location:  airport_setup_V1.php?id=".$userNo);

}

// click Edit Representative 
if(isset($_POST['btnedit1']))
{
  // valuse save in variable
  $SrNoV = $_POST['SrNoV'];
  $rep_nameV= $_POST['rep_nameV'];
  $rep_desgV = $_POST['rep_desgV'];
  $rep_office_noV = $_POST['rep_office_noV'];
  $rep_phone_noV = $_POST['rep_phone_noV'];
  $emailV = $_POST['emailV'];
   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }
 

  $expload = $custID."-Cust";

// update query
   $updateQuery12 = mysqli_query($con, "UPDATE represent_setup SET rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',email='$emailV',status='$statusV' WHERE SrNo='$SrNoV'") or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  //header("Location:  airport_setup_V1.php?id=".$userNo);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Master Customer Edit</title>
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
    </style>
<style type="text/css">
  
  
 .tbleDrpdown ul {
   padding: 0;
}
.tbleDrpdown {
   display: inline-block;
   float: left;
   position: relative;
   top: 33px;
   z-index: 999;
}
#dpttable ul li {
   list-style: none;
   display: inline-block;
}

#dpttable_rEp ul li {
   list-style: none;
   display: inline-block;
}

.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#dpttable_length {
    float: right;
    margin: 3px 10px;
}

#dpttable_rEp_length {
    float: right;
    margin: 3px 10px;
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
          <a href="master_customer.php" class="btn btn-info active">Master Customer Edit</a>
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

<div class=" add_customer_sec main_widget_box">
	<div class="">
									<!-- <hr> -->
			<form action="" method="POST">

				     	<!-- Modal One-->
						 <div class="modal fade confirmTable-modal" id="addModal2" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Confirmation</h4>
							        </div>
							        <div class="modal-body">
							          <p>Are You Sure You Want to Submit?</p>
							          <button type="submit" name="submitBtn2">Yes</button>
					                  <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

							        </div>
							      </div>
							    </div>
						 </div>

				       <!-- Modal Two-->
				       <div class="modal fade confirmTable-modal" id="addModal1" role="dialog">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Confirmation</h4>
				                </div>
				                <div class="modal-body">
				                  <p>Are You Sure You Want to Submit?</p>
				                  <button type="submit" name="submitBtn1">Yes</button>
				                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

				                </div>
				              </div>
				            </div>
				       </div>

				      <!-- Add Representative popup -->
		<div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Representative Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                <h4 class="modal-title">Add Representative Details</h4>
                        </div>
                        <div class="modal-body">
                          <div class="input-fields">  
                            <label>Name</label> 
                            <input type="text" name="rep_name" id="rep_name" class="rep_name" placeholder="Organization Name">    
                          </div>

                         <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desg" id="rep_desgs" placeholder="Enter Here Sub Party Name!">    
                  </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_no" id="rep_office_no" class="rep_office_no" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_no" id="rep_phone_no" class="rep_phone_no" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="email" id="email" class="email" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="status" id="status" class="status">    
                          </div>

                          <button type="submit" name="btnadd">Submit</button>

                        </div>
                      </div>
                    </div>
                </div>

              <!-- Edit Representative popup -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Representative Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Representative Details</h4>
                </div>

                  

                 <div class="modal-body">

                  <div class="input-fields"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV" placeholder="Sr No. goes here">    
                  </div>

                  <div class="input-fields">  
                    <label>Name</label> 
                    <input type="text" name="rep_nameV" id="rep_nameV" class="rep_nameV" placeholder="Organization Name">    
                  </div>

                 <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desgV" id="rep_desgV" placeholder="Enter Here Sub Party Name!">    
                 </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_noV" id="rep_office_noV" class="rep_office_noV" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_noV" id="rep_phone_noV" class="rep_phone_noV" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="emailV" id="emailV" class="emailV" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="statusV" id="statusV" class="status">    
                          </div>

                          <button type="submit" name="btnedit1">Submit</button>

                        </div>
                      </div>
                    </div>
                </div>   
                </div>

				      <!-- Modal Four (Finance History)-->
				       <div class="modal fade symfra_popup2" id="eduHst" role="dialog">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Finance History</h4>
				                </div>
				                <div class="modal-body">
				                  <div class="input-fields">  
				                    <label>Bank Name</label> 
				                    <input type="text" name="bnkNameS" id="bnkNameS" placeholder="Bank Name">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Branch</label> 
				                    <input type="text" name="bnkBranchS" id="bnkBranchS" placeholder="Bank Branch">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>City</label> 
				                    <input type="text" name="bnkCityS" id="bnkCityS" placeholder="City">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Country</label> 
				                    <input type="text" name="bnkCountryS" id="bnkCountryS" placeholder="Country">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Account (Non-IBAN)</label> 
				                    <input type="text" name="bnkAccNS" id="bnkAccNS" placeholder="Account (Non-IBAN)">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Account (IBAN)</label> 
				                    <input type="text" name="bnkAccS" id="bnkAccS" placeholder="Account (IBAN)">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Credit Days</label> 
				                    <input type="text" name="crDaysS" id="crDaysS" placeholder="Credit Days">    
				                  </div>

				                  <div class="input-fields">  
				                    <label>Credit Amount</label> 
				                    <input type="text" name="crAmountS" id="crAmountS" placeholder="Credit Amount">    
				                  </div>

				                  <button type="submit" name="saveFinance" id="saveFinance">Submit</button>

				                </div>
				              </div>
				            </div>
				        </div>

				        <!-- LOG CHANGE -->
				        <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
				            <div class="modal-dialog">
				              <!-- Show Log Chain -->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Log Chain Details</h4>
				                </div>

				                  <table id="dpttable" class="display nowrap no-footer" style="width:100%">
				                     
				                     <thead>
				                      <tr>
				                      <th>SrNo</th>
				                      <th>Instance</th>
				                      <th>Record ID</th>
				                      <th>Created By</th>
				                      <th>Created Date</th>
				                      <th>Update By</th>
				                      <th>Update Date</th>
				                      <th>Pervious Value</th>
				                      <th>New Value</th>
				                      </tr>

				                     </thead>
				                     <tbody>
				                      <?php

				                              include 'manage/connection.php';

				                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Customer' ");

				                              ?>
				                          <?php

				                                while ($rowchainlog = mysqli_fetch_array($selectchainlog))
				                                {
				                                ?>

				                      <tr>
				                      <td><?php echo $rowchainlog['SrNo']; ?></td>
				                      <td><?php echo $rowchainlog['instance']; ?></td>
				                      <td><?php echo $rowchainlog['record_id']; ?></td>
				                      <td><?php echo $rowchainlog['createBy']; ?></td>
				                      <td><?php echo $rowchainlog['createDate']; ?></td>
				                      <td><?php echo $rowchainlog['updateBy']; ?></td>
				                      <td><?php echo $rowchainlog['updateDate']; ?></td>
				                      <td><?php echo $rowchainlog['perValue']; ?></td>
				                      <td><?php echo $rowchainlog['newValue']; ?></td>
				                      </tr>
				                      <?php
				                     }
				                     ?>
				                     </tbody>

				                  </table>
				                
				              </div>
				              
				            </div>
				        </div>

						<label id="formSummary" style="color: red;"></label>

					  	<div class="widget_iner_box">
					  		<div class="col-md-6">
					  			<div class="input-label  hide"><label >Customer Type</label></div>	

					  			

					  				<?php
					  				if ($cmpType_p == "Company")
					  				{
					  				?>
					  				
					  				<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
					  					<input type="radio" name="chkfrmname" value="chkform1" checked> <label>Company</label>
									</div>

									<div class="input-feild input-feild-checkboxs" style="width: 25%;">
	                                  <input type="radio" name="chkfrmname" value="chkform2"><label>Individual</label>
	                              	</div>
					  				
					  				<?php
					  				}
					  				?>
                                  
                                  	<?php
					  				if ($cmpType_p == "Individual")
					  				{
					  				?>

					  				<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
					  					<input type="radio" name="chkfrmname" value="chkform1"> <label>Company</label>
									</div>

					  				<div class="input-feild input-feild-checkboxs" style="width: 25%;">
	                                  <input type="radio" name="chkfrmname" value="chkform2" checked><label>Individual</label>
	                              	</div>

					  				<?php
					  				}
					  				?>

					  		</div>
					  		<div class="col-md-6"></div>
					  	</div>

					  	<div class="cls"></div>
					  	<hr>

						<div id="company_form" class="company_form chkform1 chkboxform"  >
								<div class="Bsic_usr_info widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="sbtModFunc1();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
													<button type="button" name="submitBtn"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             

			                                                <div class="input-label"><label > New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input type="text"  name="newCodeC" id="newCodeC" placeholder="00000" value="<?php echo $newCode_p ?>" disabled>
			                                                       
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Company Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitleC" id="cmpTitleC" value="<?php echo $cmpTitle_p ?>">
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="legCodeC" id="legCodeC" placeholder="" value="<?php echo $legCode_p ?>">
			                                                </div>                                             
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Street" name="cmpStreetC" id="cmpStreetC" value="<?php echo $cmpStreet_p ?>">
				                                                      <input  type="tex" placeholder="City" name="cmpCityC" id="cmpCityC" value="<?php echo $cmpCity_p ?>">
				                                                      <input  type="text" placeholder="Country" name="cmpCountryC" id="cmpCountryC" value="<?php echo $cmpCountry_p ?>">
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">

				                                           			<?php
				                                           			if ($seaImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import" checked><label>Sea Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import"><label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImportC" id="airImportC" value="Air Import" checked><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImportC" id="airImportC" value="Air Import"><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($seaExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExportC" id="seaExportC" value="Sea Export" checked><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExportC" id="seaExportC" value="Sea Export"><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExportC" id="airExportC" value="Air Export" checked><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExportC" id="airExportC" value="Air Export"><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			?>

				                                              	</div>
										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="telCodeC" id="telCodeC">
				                                                      		<option value="<?php echo $telCode_p; ?>"><?php echo $telCode_p; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumberC" id="telNumberC" value="<?php echo $telNumber_p; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsiteC" id="cmpWebsiteC" value="<?php echo $cmpWebsite_p; ?>">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmailC" id="cmpEmailC" value="<?php echo $cmpEmail_p; ?>">
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxTypeC" id="taxTypeC">
				                                                      		<option value="<?php echo $taxType_p; ?>"><?php echo $taxType_p; ?></option>
				                                                      		<option value="STRN Number">STRN Number</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNoC" id="taxNoC" value="<?php echo $taxNo_p; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >SPO </label></div> 
			                                                    <div class="input-feild">
			                                                    	<select name="txtSPO" id="txtSPO">
			                                                    		<option value="<?php echo $SPOName_p; ?>"><?php echo $SPOName_p; ?></option>

			                                                    		<?php

			                                                            $selectSPO = mysqli_query($con, "SELECT * FROM spo_setup");
			                                                            while ($rowSPO = mysqli_fetch_array($selectSPO))
			                                                            {

			                                                              echo '<option value="'.$rowSPO['SrNo'].'">'.$rowSPO['spo_name'].'</option>';

			                                                            }

			                                                            ?>
			                                                        </select>
			                                                     </div>

                                                          <div class="input-label"><label >Business Sector </label></div> 
                                                          <div class="input-feild">
                                                            <select name="businessSector" id="businessSector">
                                                              <?php

                                                              echo '<option value="'.$businessSector_p.'">'.$businessSector_p.'</option>';

                                                              $selectBS = mysqli_query($con, "SELECT * FROM business_setup");
                                                              while ($rowBS = mysqli_fetch_array($selectBS))
                                                              {

                                                                echo '<option value="'.$rowBS['bus_sec_name'].'">'.$rowBS['bus_sec_name'].'</option>';

                                                              }

                                                              ?>
                                                            </select>
                                                          </div>
										</div>	 
								</div>
						</div>

						<div id="individual_form" class="individual_form chkform2 chkboxform" style="display: none;" >
								<div class="Bsic_usr_info widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="sbtModFunc2();"> <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
													<button type="button" name="submitBtn"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             

			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input type="text" name="newCode" id="newCode" placeholder="00000" value="<?php echo $newCode_p; ?>" disabled>   
			                                                </div>
			                                                
			                                                <div class="input-label"><label > Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitle" id="cmpTitle" value="<?php echo $cmpTitle_p; ?>">
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="legCode" id="legCode" placeholder="" value="<?php echo $legCode_p; ?>">
			                                                </div>

			                                                                                                 
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label > Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" name="cmpStreet" id="cmpStreet" placeholder="Street" value="<?php echo $cmpStreet_p; ?>">
				                                                      <input  type="tex" name="cmpCity" id="cmpCity" placeholder="City" value="<?php echo $cmpCity_p; ?>">
				                                                      <input  type="text" name="cmpCountry" id="cmpCountry" placeholder="Country" value="<?php echo $cmpCountry_p; ?>">
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                  <?php
				                                           			if ($seaImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="Sea Import" checked> <label>Sea Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="Sea Import"> <label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airImport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import" checked><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import"><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($seaExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export" checked><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export"><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airExport_p == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export" checked><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export"><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			?>
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" id="telCode" name="telCode">
				                                                      		<option value="<?php echo $telCode_p; ?>"><?php echo $telCode_p; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumber" id="telNumber" value="<?php echo $telNumber_p; ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" value="<?php echo $cmpWebsite_p; ?>">
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" value="<?php echo $cmpEmail_p; ?>">
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType">
				                                                      		<option value="<?php echo $taxType_p; ?>"><?php echo $taxType_p; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNo" id="taxNo" value="<?php echo $taxNo_p; ?>">
				                                           		</div>
										</div>	 
								</div>	
						</div>
							

				       	

											<div class="cls"></div>
											<hr>
						<div>					
						
						<div class="cls"></div>
										<hr>
				          <div class="acount_info widget_iner_box">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Finance Details</a></li>
                        <li><a data-toggle="tab" href="#menu1">Representative Details </a></li>
                        <li><a data-toggle="tab" href="#">Attachment details </a></li>

                    </ul>
                </div>
	                <div class="tab-content">
	                  
	                  <div id="home" class="tab-pane fade in active">

		                    <div class="col-md-12">
                            <div class="widget_iner_box">
                              <div class="col-md-12">
      		                      <br />
      		                      <div align="right">
      		                        <button type="button" id="eduHist" onclick="eduHistory();"> <small> Add New</small></button>
      		                      </div>
      		                      <br />
                              </div>  
    		                     <!--  <div class="table-responsive" id="image_table">
    		                          
    		                      </div> -->
    		                    </div>
                        </div>
	                      
		                    <div class="table-responsive" id="financeTable">
		                              
		                    </div>
	                  </div>

	                 <div id="menu1" class="tab-pane fade in ">

                 


                    <div class="col-md-12">  
                      <div class="leave-manage-sec-table widget_iner_box ">
                        <div class="form_sec_action_btn col-md-12">
                          <button type="button"  id="myBtn">  <small>Add Representative</small></button>
                        </div>

                            <div class="tbleDrpdown">
                              <div id="tblebtn">
                                <ul>
                                    <li><button type="button"  id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                                    <li><button type="button"  id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                                   
                                    
                                </ul>
                              </div>
                            </div>

              
                            <table  id="dpttable_rEp" class="display nowrap no-footer" style="width:100%">
                                              
                                 <thead>
                                            <tr>
                                             <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                             <th>Representative Name</th>
                                             <th>Representative Designation</th>
                                             <th>Office No.</th>
                                             <th>Phone No.</th>
                                             <th>Email</th>
                                             <th>Status</th>
                                             <th>Edit</th>
                                             <th>Action</th>

                                             </tr>
                                  </thead>
                                    <tbody>
                                                
                                           
                                                          <?php

                                                      $expload = $custID."-Cust";
                                                      $selectairport = mysqli_query($con, " SELECT * FROM represent_setup where userNo='$expload' ");
                                                      while ($rowairport= mysqli_fetch_array($selectairport))
                                                      {
                                                        $rep_name =$rowairport['rep_name'];
                                                        $rep_desg =$rowairport['rep_desg'];
                                                        $rep_office_no =$rowairport['rep_office_no'];
                                                        $rep_phone_no =$rowairport['rep_phone_no'];
                                                        $email =$rowairport['email'];
                                                        $status =$rowairport['status'];
                                                                                                         

                                                      ?>
                                          <tr>
                                                <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairport['SrNo'] .' " /></td>'; ?>
                                                <td><?php echo $rep_name ?></td>
                                                <td><?php echo $rep_desg ?></td>
                                                <td><?php echo $rep_office_no ?></td>
                                                <td><?php echo $rep_phone_no ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $status ?></td>
                                                <td><a href="#" class="editData"  data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                                                <?php
                                                if ($rowairport['status'] == "Active")
                                                {
                                                ?>
                                                <td><a href="deleteRep_Code.php?id=<?php echo $rowairport['SrNo']; ?>&SrNo=<?php echo $SrNo; ?>" >Deactivate</td>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($rowairport['status'] == "Deactive")
                                                {
                                                ?>
                                                <td><a href="deleteRep_CodeI.php?id=<?php echo $rowairport['SrNo']; ?>&SrNo=<?php echo $SrNo; ?>" >Activate</td>
                                                <?php
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
                    </div>

	                </div>


		</form>
				
	</div>

</div>


<div class="cls"></div>

<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chkboxform").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_rep.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#SrNoV').val(data.SrNo);  
              $('#rep_nameV').val(data.rep_name);  
              $('#rep_desgV').val(data.rep_desg);  
              $('#rep_office_noV').val(data.rep_office_no); 
              $('#rep_phone_noV').val(data.rep_phone_no);
              $('#emailV').val(data.email);  
            
              var checkif = data.status;
              if (checkif == "Active") {
                 $('#statusV').attr("checked", true);
                 document.getElementByID("statusV").checked = true;
              }
              else
              {
                $('#statusV').attr("checked", false);
              }
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');**
              // alert('Running');
               
         }
      });
});
</script>

<script type="text/javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByTagName('input');
         if (ele.checked) {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = true;
                 }
             }
         } else {
             for (var i = 0; i < checkboxes.length; i++) {
                 console.log(i)
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = false;
                 }
             }
         }
     }
</script>

<script type="text/javascript">
function sbtModFunc1()
{
	$("#addModal1").modal();
}
function sbtModFunc2()
{
	$("#addModal2").modal();
}

</script>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>

<script>

  $(document).ready(function() {
    $('#dpttable').DataTable({
       "scrollX": true
   });
} );

</script>

<script>

  $(document).ready(function() {
    $('#dpttable_rEp').DataTable({
       "scrollX": true
   });
} );

</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>