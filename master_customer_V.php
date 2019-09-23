<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// Getting the Customer ID
$custID = $_GET['custID'];
$qry= "SELECT * FROM custmaster WHERE newCode = '$custID'";
$run= mysqli_query($con, $qry);
$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($custID==$row['newCode'])
{
  $cmpType= $row['cmpType'];
  $legCode = $row['legCode'];
  $newCode = $row['newCode'];
  $cmpTitle = $row['cmpTitle'];
  $cmpStreet = $row['cmpStreet'];
  $cmpCity = $row['cmpCity'];
  $cmpCountry = $row['cmpCountry'];
  $telCode = $row['telCode'];
  $telNumber = $row['telNumber'];
  $cmpWebsite = $row['cmpWebsite'];
  $cmpEmail = $row['cmpEmail'];
  $taxType = $row['taxType'];
  $taxNo = $row['taxNo'];
  $SPO = $row['SPO'];
  $seaImport = $row['seaImport'];
  $airImport = $row['airImport'];
  $seaExport = $row['seaExport'];
  $airExport = $row['airExport'];
  $cmpStatus = $row['cmpStatus'];
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
	<title>Master Customer View</title>
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

.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#dpttable_length {
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
          <a href="master_customer.php" class="btn btn-info active">Master Customer View</a>
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
							        <div class="modal-footer">
							        	<p>Add Related content if needed</p>
							          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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
				                <div class="modal-footer">
				                  <p>Add Related content if needed</p>
				                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				                </div>
				              </div>
				            </div>
				       </div>

						 <label id="formSummary" style="color: red;"></label>

					  	<div class="widget_iner_box">
					  		<div class="col-md-6">
					  			<div class="input-label  hide"><label >Customer Type</label></div>	

					  				<?php
					  				if ($cmpType == "Company")
					  				{
					  				?>
					  				
					  				<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
					  					<input type="radio" name="chkfrmname" value="chkform1" checked disabled> <label>Company</label>
									</div>

									<div class="input-feild input-feild-checkboxs" style="width: 25%;">
	                                  <input type="radio" name="chkfrmname" value="chkform2" disabled><label>Individual</label>
	                              	</div>
					  				
					  				<?php
					  				}
					  				?>
                                  
                                  	<?php
					  				if ($cmpType == "Individual")
					  				{
					  				?>

					  				<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
					  					<input type="radio" name="chkfrmname" value="chkform1" disabled> <label>Company</label>
									</div>

					  				<div class="input-feild input-feild-checkboxs" style="width: 25%;">
	                                  <input type="radio" name="chkfrmname" value="chkform2" checked disabled><label>Individual</label>
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
													<a id="btnEnable" href="master_customer_VE.php?custID=<?php echo $newCode; ?>"> <small>Edit</small></a>
													
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             
			                                                <div class="input-label"><label > New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input  disabled type="text" name="newCodeC" id="newCodeC" placeholder="00000" value="<?php echo $newCode ?>">
			                                                       
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Company Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitleC" id="cmpTitleC" value="<?php echo $cmpTitle ?>" disabled>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="legCodeC" id="legCodeC" placeholder="" value="<?php echo $legCode ?>" disabled>
			                                                </div>                                             
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label >Official Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Street" name="cmpStreetC" id="cmpStreetC" value="<?php echo $cmpStreet ?>" disabled>
				                                                      <input  type="tex" placeholder="City" name="cmpCityC" id="cmpCityC" value="<?php echo $cmpCity ?>" disabled>
				                                                      <input  type="text" placeholder="Country" name="cmpCountryC" id="cmpCountryC" value="<?php echo $cmpCountry ?>" disabled>
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">

				                                           			<?php
				                                           			if ($seaImport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import" checked disabled> <label>Sea Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImportC" id="seaImportC" value="Sea Import" disabled> <label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airImport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImportC" id="airImportC" value="Air Import" checked disabled><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImportC" id="airImportC" value="Air Import" disabled><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($seaExport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExportC" id="seaExportC" value="Sea Export" checked disabled><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExportC" id="seaExportC" value="Sea Export" disabled><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airExport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExportC" id="airExportC" value="Air Export" checked disabled><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExportC" id="airExportC" value="Air Export" disabled><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			?>

				                                              	</div>
										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="telCodeC" id="telCodeC" disabled>
				                                                      		<option value="<?php echo $telCode; ?>"><?php echo $telCode; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumberC" id="telNumberC" value="<?php echo $telNumber; ?>" disabled>
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsiteC" id="cmpWebsiteC" value="<?php echo $cmpWebsite; ?>" disabled>
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmailC" id="cmpEmailC" value="<?php echo $cmpEmail; ?>" disabled>
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxTypeC" id="taxTypeC" disabled>
				                                                      		<option value="<?php echo $taxType; ?>"><?php echo $taxType; ?></option>
				                                                      		<option value="STRN Number">STRN Number</option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNoC" id="taxNoC" value="<?php echo $taxNo; ?>" disabled>
				                                           		</div>

				                                           		<div class="input-label"><label >SPO </label></div> 
			                                                    <div class="input-feild">
			                                                    	<select name="txtSPO" id="txtSPO" disabled>
			                                                    		<option value="<?php echo $SPO; ?>"><?php echo $SPO; ?></option>
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
													<button type="button" id="btnConfirm_Su"> <small><a href="master_customer_VE.php?custID=<?php echo $newCode; ?>">Edit</a></small></button>	
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                             

			                                                <div class="input-label"><label >New Code</label></div>	
			                                                <div class="input-feild">
			                                                      <input type="text" value="00000" name="newCode" id="newCode" placeholder="00000" value="<?php echo $newCode; ?>" disabled>   
			                                                </div>
			                                                
			                                                <div class="input-label"><label > Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="cmpTitle" id="cmpTitle" value="<?php echo $cmpTitle; ?>" disabled>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">
			                                                <div class="input-label"><label >Legacy Code</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="legCode" id="legCode" placeholder="" value="<?php echo $legCode; ?>" disabled>
			                                                </div>

			                                                                                                 
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label > Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" name="cmpStreet" id="cmpStreet" placeholder="Street" value="<?php echo $cmpStreet; ?>" disabled>
				                                                      <input  type="tex" name="cmpCity" id="cmpCity" placeholder="City" value="<?php echo $cmpCity; ?>" disabled>
				                                                      <input  type="text" name="cmpCountry" id="cmpCountry" placeholder="Country" value="<?php echo $cmpCountry; ?>" disabled>
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                  <?php
				                                           			if ($seaImport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="Sea Import" checked disabled><label>Sea Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaImport" id="seaImport" value="Sea Import" disabled><label>Sea Import</label><br>
				                                           			
				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airImport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import" checked disabled><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airImport" id="airImport" value="Air Import" disabled><label>Air Import</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($seaExport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export" checked disabled><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="seaExport" id="seaExport" value="Sea Export" disabled><label>Sea Export</label><br>

				                                           			<?php
				                                           			}
				                                           			?>

				                                           			<?php
				                                           			if ($airExport == 1)
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export" checked> disabled<label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			else
				                                           			{
				                                           			?>

				                                           			<input type="checkbox" name="airExport" id="airExport" value="Air Export" disabled><label>Air Export</label>

				                                           			<?php
				                                           			}
				                                           			?>
				                                              	</div>

										</div>
										<div class="col-md-6">
																<div class="input-label"><label >Telephone </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" id="telCode" name="telCode" disabled>
				                                                      		<option value="<?php echo $telCode; ?>"><?php echo $telCode; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="number" name="telNumber" id="telNumber" value="<?php echo $telNumber; ?>" disabled>
				                                           		</div>

				                                           		<div class="input-label"><label >Website </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Website" name="cmpWebsite" id="cmpWebsite" value="<?php echo $cmpWebsite; ?>" disabled>
				                                           		</div> 
				                                           		<div class="input-label"><label >Email Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input  type="text" placeholder="Email Address" name="cmpEmail" id="cmpEmail" value="<?php echo $cmpEmail; ?>" disabled>
				                                           		</div>  

				                                           		<div class="input-label"><label >Tax Number </label></div> 
																<div class="input-feild">
				                                                      <select class="mini_select_field" name="taxType" id="taxType" disabled>
				                                                      		<option value="<?php echo $taxType; ?>"><?php echo $taxType; ?></option>
				                                                      </select>
				                                                      <input class="mini_input_field" type="text" name="taxNo" id="taxNo" value="<?php echo $taxNo; ?>" disabled>
				                                           		</div>
										</div>	 
								</div>	
						</div>
							
											<div class="cls"></div>
											<hr>

				<div id="representative" class="tab-pane fade in ">

                 


              <div class="col-md-12">  
                <div class="leave-manage-sec-table widget_iner_box ">
                  <div class="form_sec_action_btn col-md-12">
                    <button type="button"  id="myBtn" disabled="">  <small>Add Representative</small></button>
                  </div>

                      <div class="tbleDrpdown">
                        <div id="tblebtn">
                          <ul>
                              <li><button type="button"  disabled id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                              <li><button type="button" disabled id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                             
                              
                          </ul>
                        </div>
                      </div>

        
                      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                                        
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
                                          <td><a href="#" class="editData" disabled  data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn1" >Edit</td> 
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
											
											<!-- <div class="form_sec_action_btn col-md-12">
												<a id="btnEnable" href="master_customer_VE.php?custID=<?php echo $newCode; ?>"> <small>Edit</small></a>
											</div> -->
		</form>
				
	</div>

</div>

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

  $(document).ready(function() {
    $('#dpttable').DataTable({
       "scrollX": true
   });
} );

</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>