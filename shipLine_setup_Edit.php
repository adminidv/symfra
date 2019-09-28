<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


  $viewvar = $_GET['id'];


$userID = $_SESSION['user'];
//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

$selectSrNo = mysqli_query($con, "SELECT * FROM shipping_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
 

}


// click Edit submit btn 
if(isset($_POST['btnedit1']))
{
  // valuse save in variable
  $SrNoV = $_POST['$SrNoV'];
  $rep_nameV= $_POST['rep_nameV'];
  $rep_desgV = $_POST['rep_desgV'];
  $rep_office_noV = $_POST['rep_office_noV'];
  $rep_phone_noV = $_POST['rep_phone_noV'];
  $rep_emailV = $_POST['rep_emailV'];
   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }
 
$exploadV = $viewvar."-Sl";
// update query
   $updateQuery13 = mysqli_query($con, "UPDATE represent_setup SET userNo='$exploadV',rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',rep_email='$rep_emailV',status='$statusV' WHERE SrNo='$SrNoV'")or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: shipLine_setup_Edit.php?id=" . $viewvar);
}



// click Add btn (sub agents setup) 

if (isset($_POST['btnadd'])) {
  $rep_name= $_POST['rep_name'];
  $rep_desg= $_POST['rep_desg'];
  $rep_office_no = $_POST['rep_office_no'];
  $rep_phone_no = $_POST['rep_phone_no'];
  $rep_email = $_POST['rep_email'];
  
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

  $expload = $viewvar."-SL";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,rep_email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$rep_email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: shipLine_setup_Edit.php?id=" . $viewvar);

}

  $qry= "SELECT * FROM  shipping_setup WHERE SrNo = '$viewvar'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($viewvar==$row['SrNo'])

 {

	$ship_code_P	= $row['ship_code'];
	$ship_name_P = $row['ship_name'];
	$address_P = $row['address'];
	$country_P = $row['country'];
	$city_P    = $row['city'];
	$phone_P   = $row['phone'];
	$fax_P     = $row['fax'];
	$email_P   = $row['email'];
	$website_P = $row['website'];
	$status_P  = $row['status'];

}
if (isset($_POST['submitBtn'])) {
	$ship_code	= $_POST['ship_code'];
	$ship_name= $_POST['ship_name'];
	$address= $_POST['address'];
	$country= $_POST['country'];
	$city= $_POST['city'];
	$phone= $_POST['phone'];
	$fax= $_POST['fax'];
	$email= $_POST['email'];
	$website= $_POST['website'];


	
	    	if (isset($_POST['status'])) {
			    $status='Active';

			  }
			  else
			  {
			    $status='Deactive';
			  }

        $existCurName = "0";
       $existShipCode = "1";
       $selectCurName = mysqli_query($con, "SELECT * FROM shipping_setup WHERE  ship_code='$ship_code' OR ship_name='$ship_name'");
       while ($rowCurName = mysqli_fetch_array($selectCurName))
       {
         $existCurName = $rowCurName['ship_name'];
         $existShipCode = $rowCurName['ship_code'];
       }
        if ($existShipCode != "1")
       {
         echo '<script type="text/javascript">
           alert("This Record is already added");
           location.replace("shipLine_setup.php");
         </script>';
         // header("Location: currency_setup.php");
       }
       
       else if ($existCurName != "0")
       {
         echo '<script type="text/javascript">
           alert("This Ship Name is already added");
           location.replace("shipLine_setup.php");
         </script>';
         // header("Location: currency_setup.php");
       }

       else
        {

        $clause = " WHERE SrNo='$SrNo'";
        $initQuery = "UPDATE shipping_setup SET SrNo='$SrNo' ";

    	// $updateQuery= mysqli_query($con, " UPDATE shipping_setup SET ship_code='$ship_code',ship_name='$ship_name',country='$country',city='$city',address='$address',phone='$phone',fax='$fax',email='$email',website='$website',status='$status' WHERE SrNo='$viewvar' ");

       $selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$SrNo' ORDER BY instance DESC LIMIT 1  ");
          $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

          $lastID1 = $rowLastID1['instance'];
          $newID1 = $lastID1 + 1;
          $instance = $newID1;

          $selectCreate = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$SrNo' ");
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
          $initChangeLog .= " VALUES ('$newID1', 'Ship', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

          if ($ship_code != $ship_code_P)
          {
            $initQuery .= ", ship_code='$ship_code'";
            $initChangeLog2 = ", '$ship_code_P', '$ship_code') ";
          }
          if ($ship_name != $ship_name_P)
          {
            $initQuery .= ", ship_name='$ship_name'";
            $initChangeLog2 = ", '$ship_name_P', '$ship_name') ";
          }
          
          if ($country != $country_P)
          {
            $initQuery .= ", country='$country'";
            $initChangeLog2 = ", '$country_P', '$country') ";
          }
          if ($city != $city_P)
          {
            $initQuery .= ", city='$city'";
            $initChangeLog2 = ", '$city_P', '$city') ";
          }
          if ($address != $address_P)
          {
            $initQuery .= ", address='$address'";
            $initChangeLog2 = ", '$address_P', '$address') ";
          }
           if ($phone != $phone_P)
          {
            $initQuery .= ", phone='$phone'";
            $initChangeLog2 = ", '$phone_P', '$phone') ";
          }
          if ($fax != $fax_P)
          {
            $initQuery .= ", fax='$fax'";
            $initChangeLog2 = ", '$fax_P', '$fax') ";
          }
          
          if ($email != $email_P)
          {
            $initQuery .= ", email='$email'";
            $initChangeLog2 = ", '$email_P', '$email') ";
          }

          if ($website != $website_P)
          {
            $initQuery .= ", website='$website'";
            $initChangeLog2 = ", '$website_P', '$website') ";
          }
     
          if ($status != $status_P)
          {
            $initQuery .= ", status='$status'";
            $initChangeLog2 = ", '$status_P', '$status') ";
          }

           $finalQuery = $initQuery . $clause;
            // echo $finalQuery . "<br>";

          mysqli_query($con, $finalQuery) or die(mysqli_error($con));

          // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));


    
          
          header("Location: shipLine_setup_Edit.php?id=" . $viewvar);
		
	}

	  
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Shipping Line</title>
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



<!-- <script type="text/javascript">
      $(document).ready(function(){
          $("#ship_code").prop("disabled", true);
          $("#ship_name").prop("disabled", true);
          $("#country").prop("disabled", true);
          $("#city").prop("disabled", true);
          $("#address").prop("disabled", true);
          $("#phone").prop("disabled", true);
          $("#fax").prop("disabled", true);
          $("#email").prop("disabled", true);
          $("#website").prop("disabled", true);
          $("#status").prop("disabled", true);

           
           });
</script> -->

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
          <a href="#" class="btn btn-info active">Edit Shipping Line </a>
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


<!-- Show Log Chain -->
      <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Show Log Chain -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Log Chain Details</h4>
                </div>

                  <table id="dpttable1" class="display nowrap no-footer" style="width:100%">
                     
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Ship' ");

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
                          <button type="submit" name="btnadd">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>

               <!-- valdition Edit popup -->
               <div class="modal fade confirmTable-modal" id="Edit_Modal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Submit?</p>
                          <button type="submit" name="btnedit1">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>


          <div class="modal fade symfra_popup2" id="popupMEdit4" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                <h4 class="modal-title">Add Representative Details</h4>
                        </div>
                        <div class="modal-body">

                           <!-- For Validation Box Red Popup -->
                   <h4><label id="formSummary1" style="color: red;"></label></h4>
                 <p id="V_rep_name" style="color: red;"></p>
                  <p id="V_rep_desg" style="color: red;"></p>
                  <p id="V_rep_email" style="color: red;"></p>
                  <p id="V_rep_office_no" style="color: red;"></p>
                  <p id="V_rep_phone_no" style="color: red;"></p>

                            <div class="input-fields">  
                              <label>Name</label> 
                              <input type="text" name="rep_name" id="rep_name" class="rep_name" maxlength="40" placeholder="Organization Name"><span class="steric">*</span>
                            </div>

                          <div class="input-fields"> 
                            <label>Designation</label> 
                            <input type="text" name="rep_desg" id="rep_desg" maxlength="30" placeholder="Enter Here Sub Party Name!">    
                          </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_no" id="rep_office_no" class="rep_office_no" maxlength="14" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_no" id="rep_phone_no" class="rep_phone_no" maxlength="14" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="rep_email" id="rep_email" class="rep_email" maxlength="50" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="status" id="status" class="status">    
                          </div>

                          <button type="submit" name="btnadd" onclick="FormValidation2(); return false;">Submit</button>

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
                <h4 class="modal-title">Add Representative Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV">    
                  </div>

                 <div class="modal-body">

                  <<!-- For Validation Box Red Popup -->
                   <h4><label id="formSummary2" style="color: red;"></label></h4>
                  <p id="EV_rep_nameV" style="color: red;"></p>
                  <p id="EV_rep_desgV" style="color: red;"></p>
                  <p id="EV_rep_emailV" style="color: red;"></p>
                  <p id="EV_rep_office_noV" style="color: red;"></p>
                  <p id="EV_rep_phone_noV" style="color: red;"></p>


                            <div class="input-fields">  
                              <label>Name</label> 
                              <input type="text" name="rep_nameV" id="rep_nameV" class="rep_nameV" maxlength="40" placeholder="Organization Name"><span class="steric">*</span>    
                            </div>

                           <div class="input-fields"> 
                            <label>Designation</label> 
                            <input type="text" name="rep_desgV" id="rep_desgV" maxlength="30" placeholder="Enter Here Sub Party Name!">    
                           </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_noV" id="rep_office_noV" class="rep_office_noV" maxlength="14" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_noV" id="rep_phone_noV" class="rep_phone_noV" maxlength="14" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="rep_emailV" id="rep_emailV" class="rep_emailV" maxlength="50" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="statusV" id="statusV" class="status">    
                          </div>

                           <button type="submit" name="btnedit2" onclick="FormValidation4(); return false;">Submit</button>

                        </div>
                      </div>
                    </div>
                </div>   
          </div>
				       

				     

				     


						 <h4><label id="formSummary" style="color: red;"></label></h4>
       <p id="V_ship_code" style="color: red;"></p>
        <p id="V_ship_name" style="color: red;"></p>
        <p id="V_email" style="color: red;"></p>
        <p id="V_phone" style="color: red;"></p>
        <p id="V_fax" style="color: red;"></p>

							

											  
								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button ship_code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button ship_code ending here -->
													</div>
                           <!-- log change btn -->
                          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
													<button type="button" id="btnConfirm_Su" onclick="submitAirlineFunc();" > <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
													<button type="button" name="cancel"> <small>Cancel</small></button>					
																
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                              

			                                               
			                                                
			                                                <div class="input-label"><label >Code</label></div>	
			                                                <div class="input-feild">
			                                                        <input   type="text" name="ship_code" id="ship_code" value="<?php echo $ship_code_P ?>"><span class="steric">*</span> 
			                                                </div> 
			                                                 <div class="input-label"><label >Name</label></div>
			                                                <div class="input-feild">
			                                                        <input   type="text" name="ship_name" id="ship_name" value="<?php echo $ship_name_P ?>"><span class="steric">*</span>
			                                                      		
			                                                </div>
			                                                 
			                                                 

			                                                

			                                                                                                                
			                 				 </div>

											<div class="col-md-6">


												<div class="input-label"><label >Country</label></div> 
													<div class="input-feild"> 
									                     <select name="country" id="country" class="country" required>
									                          
									                          <!-- Drop Down list Country Name -->
									                          <?php

									                            $selectcountry = mysqli_query($con, "select * from country_setup where SrNo ='$country_P' ");

									                            while ($rowcountry = mysqli_fetch_array($selectcountry))
									                            {
									                              echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
									                            }

									                          ?>
									                           <?php

									                            $selectcountry = mysqli_query($con, "select * from country_setup");

									                            while ($rowcountry = mysqli_fetch_array($selectcountry))
									                            {
									                              echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
									                            }

									                          ?>

									                      </select>     
	                                           		</div>
	                                           		<div class="input-label"><label >City</label></div> 
													<div class="input-feild">
								                     <select name="city" id="city" class="city" required>
								                         
								                          <!-- Drop Down list Country Name -->
								                          <?php

								                            $selectcity = mysqli_query($con, "select * from city_setup where SrNo ='$city_P' ");

								                            while ($rowcity = mysqli_fetch_array($selectcity))
								                            {
								                              echo '<option value="'.$rowcity['SrNo'].'">'.$rowcity['city_name'].'</option>';
								                            }

								                          ?>
								                           <?php

								                            $selectcity = mysqli_query($con, "select * from city_setup");

								                            while ($rowcity = mysqli_fetch_array($selectcity))
								                            {
								                              echo '<option value="'.$rowcity['SrNo'].'">'.$rowcity['city_name'].'</option>';
								                            }

								                          ?>

								                      </select>     
	                                           		</div>

															<div class="input-label"><label >Address</label></div>
			                                                <div class="input-feild">
			                                                        <textarea name="address" id="address"><?php echo $address_P; ?></textarea>
			                                                      		
			                                                </div>
			                                             	  
			                                                                                   
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
															<div class="input-label"><label >Phone</label></div>
			                                                <div class="input-feild">
			                                                        <input type="text" name="phone" id="phone" value="<?php echo $phone_P ?>">
			                                                      		
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Fax No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="fax" id="fax" value="<?php echo $fax_P ?>">
			                                                      		
			                                                </div>			                                                    
										</div>

										<div class="col-md-6">

															<div class="input-label"><label >Email</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="email" id="email" value="<?php echo $email_P ?>">
			                                                      		
			                                                </div> 

			                                                <div class="input-label"><label >Website</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="website" id="website" value="<?php echo $website_P ?>">
			                                                      		
			                                                </div>

			                                                <div class="input-label"><label >Active</label></div> 
															<div class="input-feild">
								                                    <input class="" type="checkbox" name="status" id="status" value="<?php echo $status_P ?>">
					                                   		</div>




																			                                           		
										</div>
											 
								</div>

			<div id="representative" class="tab-pane fade in ">

                 


              <div class="col-md-12">  
                <div class="leave-manage-sec-table widget_iner_box ">
                  <div class="form_sec_action_btn col-md-12">
                    <button type="button" id="myBtn">  <small>Add Representative</small></button>
                  </div>

                      <div class="tbleDrpdown">
                        <div id="tblebtn">
                          <ul>
                              
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
                                       $expload = $viewvar."-SL";
                                                $selectairport = mysqli_query($con, " SELECT * FROM represent_setup where userNo='$expload' ");
                                                while ($rowairport= mysqli_fetch_array($selectairport))
                                                {
                                                  $rep_name =$rowairport['rep_name'];
                                                  $rep_desg =$rowairport['rep_desg'];
                                                  $rep_office_no =$rowairport['rep_office_no'];
                                                  $rep_phone_no =$rowairport['rep_phone_no'];
                                                  $rep_email =$rowairport['rep_email'];
                                                  $status =$rowairport['status'];
                                                                                                   

                                                ?>
                                    <tr>
                                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairport['SrNo'] .' " /></td>'; ?>
                                          <td><?php echo $rep_name ?></td>
                                          <td><?php echo $rep_desg ?></td>
                                          <td><?php echo $rep_office_no ?></td>
                                          <td><?php echo $rep_phone_no ?></td>
                                          <td><?php echo $rep_email ?></td>
                                          <td><?php echo $status ?></td>
                                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                                          <?php
                                          if ($rowairport['status'] == "Active")
                                          {
                                          ?>
                                          <td><a href="deleteRep_ship_code.php?id=<?php echo $rowairport['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Deactivate</td>
                                          <?php
                                          }
                                          ?>

                                          <?php
                                          if ($rowairport['status'] == "Deactive")
                                          {
                                          ?>
                                          <td><a href="deleteRep_ship_codeI.php?id=<?php echo $rowairport['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Activate</td>
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
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>

<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_representative.php",  
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
               
         }
      });
    
});
</script>

<!-- java script -->
<script type="text/javascript">
function logUserFunc()
{
  $("#logUser_Modal").modal();
}
</script>

<!-- validation on add rep -->
<script type="text/javascript">
   function FormValidation2()
   {

    var regexp4 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
     var regexp3 = /^[a-z, ,a-z]*$/i;
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var rep_name=document.getElementById('rep_name').value;
      var rep_desg=document.getElementById('rep_desg').value;
      var rep_email=document.getElementById('rep_email').value;
      var rep_office_no=document.getElementById('rep_office_no').value;
      var rep_phone_no=document.getElementById('rep_phone_no').value;
     
      var summary = "Summary: ";


      //  if(rep_desg == "")
      // {
      //   document.getElementById('rep_desg').style.borderColor = "red";
      //       missingVal = 1;
      //       // summary += " Contact number required.";
      //       document.getElementById("V_rep_desg").innerHTML = "Designation is required.";
      // }
      if(rep_desg != "")
      {
          document.getElementById('rep_desg').style.borderColor = "white";
          document.getElementById("V_rep_desg").innerHTML = "";

          if (!regexp3.test(rep_desg))
        {
          document.getElementById('rep_desg').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_desg").innerHTML = "Only alphabets are allowed in Designation.";
        }
      }


       if(rep_name == "")
      {
        document.getElementById('rep_name').style.borderColor = "red";
            missingVal = 1;
            // summary += " Contact number required.";
            document.getElementById("V_rep_name").innerHTML = "Name is required.";
      }
       if(rep_name != "")
      {
          document.getElementById('rep_name').style.borderColor = "white";
          document.getElementById("V_rep_name").innerHTML = "";

          if (!regexp.test(rep_name))
        {
          document.getElementById('rep_name').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_name").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

       if(rep_office_no != "")
      {
          document.getElementById('rep_office_no').style.borderColor = "white";
          document.getElementById("V_rep_office_no").innerHTML = "";

          if (!regexp4.test(rep_office_no))
        {
          document.getElementById('rep_office_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_office_no").innerHTML = "Only Number are allowed.";
        }
      }

       if(rep_phone_no != "")
      {
          document.getElementById('rep_phone_no').style.borderColor = "white";
          document.getElementById("V_rep_phone_no").innerHTML = "";

          if (!regexp4.test(rep_phone_no))
        {
          document.getElementById('rep_phone_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_phone_no").innerHTML = "Only Number are allowed.";
        }
      }

      
      if(rep_email != "")
      {
          document.getElementById('rep_email').style.borderColor = "white";
          document.getElementById("V_rep_email").innerHTML = "";

          if (!re.test(rep_email))
        {
          document.getElementById('rep_email').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_email").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }


     

      
      
      if (missingVal != 1)
      {
        document.getElementById('rep_name').style.borderColor = "white";
        document.getElementById('rep_desg').style.borderColor = "white";
        document.getElementById('rep_email').style.borderColor = "white";
        document.getElementById('rep_office_no').style.borderColor = "white";
        document.getElementById('rep_phone_no').style.borderColor = "white";
       
        $("#submit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary1").textContent="Error: ";
      }
   }
</script>



<!-- validation on Edit rep -->
<script type="text/javascript">
   function FormValidation4()
   {


    var regexp4 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
    var regexp3 = /^[a-z, ,a-z]*$/i;
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var rep_nameV=document.getElementById('rep_nameV').value;
      var rep_desgV=document.getElementById('rep_desgV').value;
      var rep_emailV=document.getElementById('rep_emailV').value;
      var rep_office_noV=document.getElementById('rep_office_noV').value;
      var rep_phone_noV=document.getElementById('rep_phone_noV').value;
     
      var summary = "Summary: ";

      if(rep_desgV != "")
      {
          document.getElementById('rep_desgV').style.borderColor = "white";
          document.getElementById("EV_rep_desgV").innerHTML = "";

          if (!regexp3.test(rep_desgV))
        {
          document.getElementById('rep_desgV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_desgV").innerHTML = "Only alphabets are allowed in Designation.";
        }
      }


      if(rep_nameV == "")
      {
        document.getElementById('rep_nameV').style.borderColor = "red";
            missingVal = 1;
            // summary += " Contact number required.";
            document.getElementById("EV_rep_nameV").innerHTML = "Name is required.";
      }
       if(rep_nameV != "")
      {
          document.getElementById('rep_nameV').style.borderColor = "white";
          document.getElementById("EV_rep_nameV").innerHTML = "";

          if (!regexp.test(rep_nameV))
        {
          document.getElementById('rep_nameV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_nameV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      if(rep_office_noV != "")
      {
          document.getElementById('rep_office_noV').style.borderColor = "white";
          document.getElementById("EV_rep_office_noV").innerHTML = "";

          if (!regexp4.test(rep_nameV))
        {
          document.getElementById('rep_office_noV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_office_noV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      if(rep_phone_noV != "")
      {
          document.getElementById('rep_phone_noV').style.borderColor = "white";
          document.getElementById("EV_rep_phone_noV").innerHTML = "";

          if (!regexp4.test(rep_nameV))
        {
          document.getElementById('rep_phone_noV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_phone_noV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      
      if(rep_emailV != "")
      {
          document.getElementById('rep_emailV').style.borderColor = "white";
          document.getElementById("EV_rep_emailV").innerHTML = "";

          if (!re.test(rep_emailV))
        {
          document.getElementById('rep_emailV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_emailV").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }


     

      
      
      if (missingVal != 1)
      {
        document.getElementById('rep_nameV').style.borderColor = "white";
        document.getElementById('rep_desgV').style.borderColor = "white";
        document.getElementById('rep_emailV').style.borderColor = "white";
        document.getElementById('rep_office_noV').style.borderColor = "white";
        document.getElementById('rep_phone_noV').style.borderColor = "white";
       
        $("#Edit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary2").textContent="Error: ";
      }
   }
</script>

<script>
 $(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit4").modal();
  });
 });
</script>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>