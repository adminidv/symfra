<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userNo = $_GET['SrNo'];
  // echo $user_id;
  $qry= "SELECT * FROM   airline_setup WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {
      $SrNo= $row['SrNo'];
      $air_name = $row['air_name'];
      $flight_name = $row['flight_name'];
      $address = $row['address'];
      $country = $row['country'];
      $city = $row['city'];
      $iata_name = $row['iata_name'];
      $icao_code = $row['icao_code'];
      $account_no = $row['account_no'];
      $contact_person = $row['contact_person'];
      $con_office = $row['con_office'];
      $con_personal = $row['con_personal'];
      $fax_no = $row['fax_no'];
      $email = $row['email'];
      $website = $row['website'];
      $kb_adj = $row['kb_adj'];
      $awb_standard = $row['awb_standard'];
      $iata_mem = $row['iata_mem'];
      $sec_charges = $row['sec_charges'];
      $fuel_charges = $row['fuel_charges'];
      $scan_charges = $row['scan_charges'];
      $status = $row['status'];   
      }
  


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Airline Codes & Charges</title>
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
#airlinechargestble ul li {
   list-style: none;
   display: inline-block;
}
.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#airlinechargestble_length {
    float: right;
    margin: 3px 10px;
}

#dpttable ul li {
   list-style: none;
   display: inline-block;
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
          <a href="usermodules.php" class="btn btn-info">Setups</a>
          <a href="airline_codes_n_charges.php" class="btn btn-info active">Airline Codes & Charges</a>
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

<div class="  main_widget_box">
	<div class="">
									<!-- <hr> -->
			<form action="" method="POST" enctype="multipart/form-data">

				     	 <!-- Modal_one-->
			 <div class="modal fade confirmTable-modal" id="saveAirline_Modal" role="dialog">
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

				       <!-- Modal Two-->
				       <div class="modal fade confirmTable-modal" id="submitAirline_Modal" role="dialog">
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

				      <!-- ADD Airport Details -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airport Charges Details</h4>
                </div>
                <div class="modal-body">

                  <div class="input-fields">  
                    <label>Airport Departure</label> 
                    <select name="airport_name" id="airport_name">
                    	<option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectairport = mysqli_query($con, "select * from airport_setup");

                            while ($rowairport = mysqli_fetch_array($selectairport))
                            {
                              echo '<option value="'.$rowairport['airport_name'].'">'.$rowairport['airport_name'].'</option>';
                            }

                          ?>
                    </select>    
                  </div>
                   <div class="input-fields"> 
                    <label>W.E.F.</label> 
                    <input type="date" name="w_e_f" id="w_e_f" placeholder="Enter Here City Name!">    
                  </div>
                  <div class="input-fields"> 
                    <label>Security Charges.</label> 
                    <input type="text" name="airport_sec" id="airport_sec" placeholder="Enter Here City Name!">    
                  </div>
                  <div class="input-fields">  
                    <label>Fuel Charges</label> 
                    <input type="text" name="airport_fuel" id="airport_fuel" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Screen Charges</label> 
                    <input type="text" name="airport_screen" id="airport_screen" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWC Charges</label> 
                    <input type="text" name="airport_awc" id="airport_awc" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWB Charges</label> 
                    <input type="text" name="airport_awb" id="airport_awb" placeholder="Enter Here Region Name !">    
                  </div>
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="status" id="status">    
                  </div>
                  <button type="submit" name="btnadd" >Submit</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>

				      <!-- Edit Airport Details -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airport Charges Details</h4>
                </div>
                <div class="modal-body">
                	<div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="airport_SrNoV" id="airport_SrNoV" >    
                  </div>

                  <div class="input-fields">  
                    <label>Airport Departure</label> 
                    <select name="airport_nameV" id="airport_nameV" class="airport_nameV">
                    	<option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectairport = mysqli_query($con, "select * from airport_setup");

                            while ($rowairport = mysqli_fetch_array($selectairport))
                            {
                              echo '<option value="'.$rowairport['airport_name'].'">'.$rowairport['airport_name'].'</option>';
                            }

                          ?>
                    </select>    
                  </div>
                   <div class="input-fields"> 
                    <label>W.E.F.</label> 
                    <input type="date" name="w_e_fV" id="w_e_fV" placeholder="Enter Here W.E.F !">    
                  </div>
                  <div class="input-fields"> 
                    <label>Security Charges.</label> 
                    <input type="text" name="airport_secV" id="airport_secV" placeholder="Enter Here Security Charges!">    
                  </div>
                  <div class="input-fields">  
                    <label>Fuel Charges</label> 
                    <input type="text" name="airport_fuelV" id="airport_fuelV" placeholder="Enter Here Fuel Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>Screen Charges</label> 
                    <input type="text" name="airport_screenV" id="airport_screenV" placeholder="Enter Here Screen Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWC Charges</label> 
                    <input type="text" name="airport_awcV" id="airport_awcV" placeholder="Enter Here AWC Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWB Charges</label> 
                    <input type="text" name="airport_awbV" id="airport_awbV" placeholder="Enter Here AwB Charges !">    
                  </div>
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="statusV" id="statusV">    
                  </div>
                  <button type="submit" name="btnedit1" >Submit</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>		      

         <div class="modal fade symfra_popup2" id="popupExport" role="dialog">
            <div class="modal-dialog">

              <!-- Export Options -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Export Options</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields"> 
                      <label>Options</label>  
                      <select name="exportOptions" required>
                          <option value="Select">Select </option>
                          <option value="excel">Export to Excel </option>
                          <option value="csv">Export to CSV </option>
                          <option value="pdf">Export to PDF </option>
                      </select>  
                  </div>

                  <button type="submit" name="btnExport_D" >Submit</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
             
            </div>
      </div>


						 <label id="formSummary" style="color: red;"></label>

							

											  
								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
																	 <button type="button" id="btnNewUser" onclick="edit();">Edit</button>
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                              

			                                               
			                                                
			                                                <div class="input-label"><label >Air-Line Name</label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="air_name" id="air_name" disabled value="<?php echo $air_name ?>">
			                                                </div> 
			                                                 <div class="input-label"><label >Account No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class="mini_input_field"  type="text" name="account_no" id="account_no" disabled value="<?php echo $account_no ?>">
			                                                      		
			                                                </div>
			                                                 
			                                                 <div class="input-label"><label >Flight Name</label></div>
			                                                <div class="input-feild">
			                                                        <input class="mini_input_field"  type="text" name="flight_name" id="flight_name" disabled value="<?php echo $flight_name ?>">
			                                                      		
			                                                </div>

			                                                 <div class="input-label"><label >Website</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="website" id="website" disabled value="<?php echo $flight_name ?>">
			                                                      		
			                                                </div>
			                                                <div class="input-label"><label >Country</label></div> 
																<div class="input-feild"> 
												                     <select name="country" id="country" class="country" disabled>
												                          <option value="<?php echo $country ?>"><?php echo $country ?> </option>
												                          <!-- Drop Down list Country Name -->
												                          <?php

												                            $selectcountry = mysqli_query($con, "select * from country_setup");

												                            while ($rowcountry = mysqli_fetch_array($selectcountry))
												                            {
												                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
												                            }

												                          ?>

												                      </select>     
				                                           		</div>
				                                           		<div class="input-label"><label >City</label></div> 
																<div class="input-feild">
											                     <select name="city" id="city" class="city" disabled>
											                          <option value="<?php echo $city ?>"><?php echo $city ?> </option>
											                          <!-- Drop Down list Country Name -->
											                          <?php

											                            $selectcity = mysqli_query($con, "select * from city_setup");

											                            while ($rowcity = mysqli_fetch_array($selectcity))
											                            {
											                              echo '<option value="'.$rowcity['city_name'].'">'.$rowcity['city_name'].'</option>';
											                            }

											                          ?>

											                      </select>     
				                                           		</div>

			                                                <div class="input-label"><label >Address</label></div>	
			                                                <div class="input-feild" >
			                                                    <textarea disabled name="address" id="address"><?php echo $address ?></textarea>
			                                                </div>                                                                  
			                 				 </div>

											<div class="col-md-6">
			                                             	  <div class="input-label"><label >Person Name</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="contact_person" id="contact_person" value="<?php echo $contact_person ?>" disabled >
			                                                      		
			                                                </div> 
			                                                <div class="input-label"><label >Contact No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="con_personal" id="con_personal" value="<?php echo $con_personal ?>" disabled>
			                                                      		
			                                                </div>
			                                                <div class="input-label"><label >Contact Office</label></div>	
			                                                <div class="input-feild">
			                                                      <input type="text" name="con_office" id="con_office" value="<?php echo $con_office ?>" disabled>
			                                                       
			                                                </div>
			                                                <div class="input-label"><label >Fax No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="fax_no" id="fax_no" value="<?php echo $fax_no ?>" disabled>
			                                                      		
			                                                </div>

			                                                <div class="input-label"><label >Email</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="email" id="email" value="<?php echo $email ?>" disabled >
			                                                      		
			                                                </div>

                                                       <div class="input-label"><label >IATA Name</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="iata_name" id="iata_name" disabled maxlength="14"  value="<?php echo $iata_name ?>" >
                                                                
                                                      </div>

                                                      <div class="input-label"><label >ICAO</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="icao_code" id="icao_code" disabled maxlength="14"  value="<?php echo $icao_code ?>" >
                                                                
                                                      </div>                                              
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">

																<div class="input-label"><label >KB Adjust in Sale Report  </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="kb_adj" id="kb_adj" disabled>
				                                                      	<option value="<?php echo $kb_adj ?>"><?php echo $kb_adj ?></option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 

				                                           		<div class="input-label"><label >Standard AWB No. </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="awb_standard" id="awb_standard" disabled>
				                                                      	<option value="<?php echo $awb_standard ?>"><?php echo $awb_standard ?></option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 

				                                           		<div class="input-label"><label >IATA no. </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="iata_mem" id="iata_mem" disabled>
				                                                      	<option value="<?php echo $iata_mem ?>"><?php echo $iata_mem ?></option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<!-- <div class="input-label"><label >Logo</label></div>
		                                               				
		                                               				<div class="input-feild"> 
                                                                   <img src="Airline Images/<?php echo $img_logo; ?>" style="width: 185px" id="blah">
                                                                <input type="file"  name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
                                                          </div>
 -->
										</div>
										<div class="col-md-6">

																<div class="widget_child_title"><h4>G/L Account Details</h4></div>

																<div class="input-label"><label >Security Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" disabled name="sec_charges" id="sec_charges" value="<?php echo $sec_charges ?>" >
				                                           		</div>

				                                           		<div class="input-label"><label >Fuel Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" disabled name="fuel_charges" id="fuel_charges" value="<?php echo $fuel_charges ?>">
				                                           		</div>

				                                           		<div class="input-label"><label >Scaning Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" disabled name="scan_charges" id="scan_charges" value="<?php echo $scan_charges ?>">
				                                           		</div>
				                                           		<div class="input-label"><label >Active</label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="checkbox" disabled name="status" id="status" value="<?php echo $status ?>">
				                                           		</div>


										</div>	 
								</div>
			
												<div class="cls"></div>
												<hr>

												<div class="acount_info widget_iner_box">
                            <ul class="nav nav-tabs">
                                
                                <li><a data-toggle="tab" href="#menu1">Airpoet Charges</a></li>
                                <li><a data-toggle="tab" href="#menu4">Representative </a></li>
                            </ul>
                          

                        <div class="tab-content">
                          <div id="menu1" class="tab-pane fade">
                              <div class="container">
                                <br />
                                <div align="right">
                                    <button type="button" disabled id="myBtn1">  <small>Add Airport</small></button>
                                  </div>
                                
                               
                               </div>

                                 <div class="tbleDrpdown">
                                         <div id="tblebtn">
                                            <ul>
                                            <li><button type="button" disabled id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                                            <li><button type="button" disabled id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                                             

                                            </ul>
                                          </div>
                                  </div>

                                <table  id="airlinechargestble" class="display nowrap no-footer" style="width:100%">
                                                            
                                       <thead>
                                                  <tr>
                                                     <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                                    <th>Airline Name</th>
                                                    <th>Airport D </th>
                                                    <th>W.E.F</th>
                                                    <th>Security Chg</th>
                                                    <th>Fuel Chg</th>                 
                                                    <th>Screen Chg</th>                
                                                    <th>AWC Chg</th>                  
                                                    <th>AWC Fee</th>                   
                                                    <th>Status</th>       
                                                  <th>Edit</th>
                                                  <th>Action</th>

                                                  </tr>
                                        </thead>
                                        <tbody>   

                                          <?php
                                              

                                            // fatch data in currency setup
                                               $selectairline = mysqli_query($con, "select * from  airline_charges_setup ");

                                            while ($rowairline= mysqli_fetch_array($selectairline))
                                            {
                                            ?>        
                                               <tr>
                                                 <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairline['SrNo'] .' " /></td>'; ?>
                                                <td><?php echo $air_name ?></td> 
                                                <td><?php echo $rowairline['airport_name']; ?></td> 
                                                <td><?php echo $rowairline['w_e_f'];?></td> 
                                                <td><?php echo $rowairline['airport_sec'];?></td>
                                                <td><?php echo $rowairline['airport_fuel'];?></td>
                                                <td><?php echo $rowairline['airport_screen'];?></td>
                                                <td><?php echo $rowairline['airport_awc'];?></td>
                                                <td><?php echo $rowairline['airport_awb'];?></td>
                                                <td><?php echo $rowairline['status'];?></td>
                                                <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairline['SrNo']; ?>" data-target="#btn2" >Edit</td> 
                                                <?php
                                                  if ($rowairline['status'] == "Active")
                                                  {
                                                  ?>
                                                  <td><a href="deleteAirline_Code.php?id=<?php echo $rowairline['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Deactivate</td>
                                                  <?php
                                                  }
                                                  ?>

                                                  <?php
                                                  if ($rowairline['status'] == "Deactive")
                                                  {
                                                  ?>
                                                  <td><a href="deleteAirline_CodeI.php?id=<?php echo $rowairline['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Activate</td>
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

                          <div id="menu4" class="tab-pane fade">
                            <div class="container">
                              <br />
                              <div align="right">
                               <button type="button" disabled id="myBtn">  <small>Add Representative</small></button>
                              </div>
                              <br />
                             
                            </div>

                            <div class="tbleDrpdown">
                              <div id="tblebtn">
                                <ul>
                                    <li><button type="button" disabled id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                                    <li><button type="button" disabled id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                                    
                                </ul>
                              </div>
                            </div>

        
                              <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                                                
                                   <thead>
                                              <tr>
                                               <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                               <th>Sub Party Name</th>
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
                                               $expload = $userNo."-AL";
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
                                                  <td><?php echo $air_name ?></td>
                                                  <td><?php echo $rep_name ?></td>
                                                  <td><?php echo $rep_desg ?></td>
                                                  <td><?php echo $rep_office_no ?></td>
                                                  <td><?php echo $rep_phone_no ?></td>
                                                  <td><?php echo $email ?></td>
                                                  <td><?php echo $status ?></td>
                                                  <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                                                  <?php
                                                  if ($rowairport['status'] == "Active")
                                                  {
                                                  ?>
                                                  <td><a href="deleteRep_Code.php?id=<?php echo $rowairport['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Deactivate</td>
                                                  <?php
                                                  }
                                                  ?>

                                                  <?php
                                                  if ($rowairport['status'] == "Deactive")
                                                  {
                                                  ?>
                                                  <td><a href="deleteRep_CodeI.php?id=<?php echo $rowairport['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Activate</td>
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
		</form>
				

	</div>

</div>

<script>

  $(document).ready(function() {
    $('#airlinechargestble').DataTable({
       "scrollX": true
   });
} );

</script>

<!-- popup for edit btn to redirect -->
<script>
function edit() {
  location.replace(" airline_codes_n_charges_E.php?SrNo=".$userNo)
}
</script>


<!-- 
<script>

 $(document).ready(function() {
    $('#airlinechargestble').DataTable();
    $('#airlinechargestble2').DataTable();

} );
</script> -->

<script>

  $(document).ready(function() {
    $('#dpttable').DataTable({
       "scrollX": true
   });
} );

</script>
<script type="text/javascript">
function saveAirlineFunc()
{
	$("#saveAirline_Modal").modal();
}
</script>
<script type="text/javascript">
function submitAirlineFunc()
{
	$("#submitAirline_Modal").modal();
}
</script>
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
	<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>


<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>


<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_airline.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#airport_SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('#w_e_fV').val(data.w_e_f);  
              $('#airport_secV').val(data.airport_sec);    
              $('#airport_fuelV').val(data.airport_fuel);  
              $('#airport_screenV').val(data.airport_screen);  
              $('#airport_awcV').val(data.airport_awc);    
              $('#airport_awbV').val(data.airport_awb);  
              $('.airport_nameV').html(data.airport_name);    

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
              // $("#btn1").modal('hide');
              // alert('Running');
               
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_airline2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.airport_nameV').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
              
         }
      });
    
});
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>