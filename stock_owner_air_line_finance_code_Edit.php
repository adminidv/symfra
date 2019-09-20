<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


$userNo = $_GET['id'];

 $qry= "SELECT * FROM stockowner WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {
      $owner_name = $row['owner_name'];
      $owner_add = $row['owner_add'];
      $owner_country = $row['owner_country'];
      $owner_city = $row['owner_city'];
      $owner_phone = $row['owner_phone'];
      $fax = $row['fax'];
      $email = $row['email'];
      $website = $row['website'];
      $iata_code = $row['iata_code'];
      $commesion = $row['commesion'];
      $wht = $row['wht'];
      $status = $row['status'];   
      }

if (isset($_POST['submitBtn'])) {
	$owner_name = $_POST['owner_name'];
	$owner_add = $_POST['owner_add'];
	$owner_country = $_POST['owner_country'];
	$owner_city = $_POST['owner_city'];
	$owner_phone = $_POST['owner_phone'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$iata_code = $_POST['iata_code'];
	$commesion = $_POST['commesion'];
	$wht = $_POST['wht'];
	 if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

   $insertQuery = mysqli_query($con, " UPDATE stockowner SET owner_name='$owner_name',owner_add='$owner_add',owner_country='$owner_country',owner_city='$owner_city',owner_phone='$owner_phone',fax='$fax',email='$email',website='$website',iata_code='$iata_code',commesion='$commesion',wht='$wht',status='$status' WHERE SrNo='$userNo' ") or die(mysqli_error($con));


  header("Location: stock_owner_air_line_finance_code_Edit.php?id=".$userNo);
}

if (isset($_POST['btnadd1'])) {
	
	$air_name=$_POST['air_name'];
	$due_air_name=$_POST['due_air_name'];
	$agency_comm=$_POST['agency_comm'];
	$wht_code=$_POST['wht_code'];
	$kb_income=$_POST['kb_income'];
	if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

	$insertStockairline = mysqli_query($con, " insert into stock_airline_setup (air_name,due_air_name,agency_comm,wht_code,kb_income,status) values ('$air_name','$due_air_name','$agency_comm','$wht_code','$kb_income','$status') ")or die (mysqli_error($con));


 header("Location: stock_owner_air_line_finance_code_Edit.php?id=".$userNo);
}

if (isset($_POST['btnedit'])) {
	
	$air_nameV=$_POST['air_nameV'];
	$due_air_nameV=$_POST['due_air_nameV'];
	$agency_commV=$_POST['agency_commV'];
	$wht_codeV=$_POST['wht_codeV'];
	$kb_incomeV=$_POST['kb_incomeV'];
	if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }

	$insertStockairline = mysqli_query($con, " UPDATE stock_airline_setup SET air_name='$air_nameV',due_air_name='$due_air_nameV',agency_comm='$agency_commV',wht_code='$wht_codeV',kb_income='$kb_incomeV',status='$statusV' WHERE SrNo='$SrNoV' ")or die (mysqli_error($con));


 header("Location: stock_owner_air_line_finance_code_Edit.php?id=".$userNo);
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
  $emailV = $_POST['emailV'];
   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }
 
$expload = $userNo."-SA";
// update query
   $updateQuery13 = mysqli_query($con, " UPDATE represent_setup SET userNo='$expload',rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',email='$emailV',status='$statusV' WHERE SrNo='$SrNoV'")or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: stock_owner_air_line_finance_code_Edit.php?id=".$userNo);
}



// click Add btn (sub agents setup) 

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

  $expload = $userNo."-SA";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: stock_owner_air_line_finance_code_Edit.php?id=".$userNo);

}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Owner & Airlines Finance</title>
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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="#" class="btn btn-info">Setups</a>
          <a href="#" class="btn btn-info active">Stock Owner & Airlines Finance Code</a>
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

					<!-- ADD Airport Details -->
				      <div class="modal fade symfra_popup2" id="popupMEdit1" role="dialog">
				            <div class="modal-dialog">
				              <!-- ADD Airport Details-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Stock Airline Details</h4>
				                </div>
				                <div class="modal-body">


				                  <div class="input-fields">  
				                    <label>Airline</label> 
				                    <select name="air_name" id="air_name" >
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                          
				                           <?php

				                            $selectair = mysqli_query($con, "select * from airline_setup");

				                            while ($rowair = mysqli_fetch_array($selectair))
				                            {
				                              echo '<option value="'.$rowair['air_name'].'">'.$rowair['air_name'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                   <div class="input-fields"> 
				                    <label>Due To Airline</label> 
				                    <select name="due_air_name" id="due_air_name">
				                    	<option value="Select">Select </option>
				                          <!-- Drop Down list Country Name -->
				                         
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['cmpTitle'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>       
				                  </div>
				                  <div class="input-fields"> 
				                    <label>Agency Commission</label> 
				                    <select name="agency_comm" id="agency_comm">
				                    	<option value="Select">Select </option>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['cmpTitle'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>           
				                  </div>
				                  <div class="input-fields">  
				                    <label>WHT Code</label> 
				                    <select name="wht_code" id="wht_code">
				                    	<option value="Select">Select </option>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['cmpTitle'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select> 
				                  </div>
				                  <div class="input-fields">  
				                    <label>KB. Income</label> 
				                    <select name="kb_income" id="kb_income">
				                    	<option value="Select">Select </option>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['cmpTitle'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                 
				                   <div class="input-fields">  
				                    <label>Active</label> 
				                    <input type="checkbox" name="status" id="status">    
				                  </div>
				                  <button type="submit" name="btnadd1" >Submit</button>
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
					                  <h4 class="modal-title">Edit Stock Owner Details</h4>
				                </div>
				                <div class="modal-body">
				                	<div class="input-fields hide"> 
					                    <label>SrNo</label> 
					                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV" >    
					                  </div>

				                  <div class="input-fields">  
				                    <label>Airline</label> 
				                    <select name="air_nameV" id="air_nameV" >
				                    	 <?php

				                            $selectair = mysqli_query($con, "select * from airline_setup where SrNo='$air_nameV' ");

				                            while ($rowair = mysqli_fetch_array($selectair))
				                            {
				                              echo '<option value="'.$rowair['SrNo'].'">'.$rowair['air_name'].'</option>';
				                            }

				                          ?>
				                           <?php

				                            $selectair = mysqli_query($con, "select * from airline_setup");

				                            while ($rowair = mysqli_fetch_array($selectair))
				                            {
				                              echo '<option value="'.$rowair['SrNo'].'">'.$rowair['air_name'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                   <div class="input-fields"> 
				                    <label>Due To Airline</label> 
				                    <select name="due_air_nameV" id="due_air_nameV">
				                    	<?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster where SrNoV='$due_air_nameV' ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                         
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>       
				                  </div>
				                  <div class="input-fields"> 
				                    <label>Agency Commission</label> 
				                    <select name="agency_commV" id="agency_commV">
				                    	<?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster where SrNoV='$agency_commV' ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>           
				                  </div>
				                  <div class="input-fields">  
				                    <label>WHT Code</label> 
				                    <select name="wht_codeV" id="wht_codeV">
				                    	<?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster where SrNoV='$wht_codeV' ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select> 
				                  </div>
				                  <div class="input-fields">  
				                    <label>KB. Income</label> 
				                    <select name="kb_incomeV" id="kb_incomeV">
				                    	<?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster where SrNoV='$kb_incomeV' ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    	
				                          <?php

				                            $selectair_due = mysqli_query($con, "select * from  custmaster ");

				                            while ($rowair_due = mysqli_fetch_array($selectair_due))
				                            {
				                              echo '<option value="'.$rowair_due['SrNo'].'">'.$rowair_due['cmpTitle'].'</option>';
				                            }

				                          ?>
				                    </select>    
				                  </div>
				                 
				                   <div class="input-fields">  
				                    <label>Active</label> 
				                    <input type="checkbox" name="statusV" id="statusV">    
				                  </div>
				                  <button type="submit" name="btnEdit" >Submit</button>
				                </div>
				                <div class="modal-footer">
				                  <p>Add Related content if needed</p>
				                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				                </div>
				              </div>
				              
				            </div>
				        </div>

				          <!-- Add agents Modal -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD agents Modal-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Representative Details</h4>
                </div>
                <div class="modal-body">

                  <!-- <div class="input-fields hide">  
                    <label>Party Name</label> 
                    <input type="text" name="userNo" id="userNo" placeholder="Enter Here Representative Namee !">    
                  </div>
 -->
                  <div class="input-fields">  
                    <label>Representative Name</label> 
                    <input type="text" name="rep_name" id="rep_name" placeholder="Enter Here Representative Namee !">    
                  </div>
                   <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desg" id="rep_desg" placeholder="Enter Here Representative Designation!">    
                  </div>
                  
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="rep_office_no" id="rep_office_no" placeholder="Enter Here Office Number !">    
                  </div>
                 
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="rep_phone_no" id="rep_phone_no" placeholder="Enter Here Phone Number !">    
                  </div>
                  <div class="input-fields">  
                    <label>Email</label> 
                    <input type="text" name="email" id="email" placeholder="Enter Here Email !">    
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
         <!-- Edit Representative Modal-->
      <div class="modal fade symfra_popup2" id="btn2" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Representative Modal -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Representative Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV" >
                       
                  </div>
                  <div class="input-fields"> 
                 <label>Representative Name</label> 
                    <input type="text" name="rep_nameV" id="rep_nameV" placeholder="Enter Here Party Nmae !">    
                  </div>
                   <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desgV" id="rep_desgV" placeholder="Enter Here Sub Party Name!">    
                  </div>
                  

                  
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="rep_office_noV" id="rep_office_noV" placeholder="Enter Here Phone Number !">    
                  </div>
                 
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="rep_phone_noV" id="rep_phone_noV" placeholder="Enter Here Fax Number !">    
                  </div>
                  <div class="input-fields">  
                    <label>Email</label> 
                    <input type="text" name="emailV" id="emailV" placeholder="Enter Here Email !">    
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

				      

<label id="formSummary" style="color: red;"></label>



				  	<div class="cls"></div>
				  	<hr>

	<div class=" widget_iner_box">

				<div class="form_sec_action_btn col-md-12">
						<div class="form_action_right_btn">
			                      <!-- Go back button code starting here -->
			                      <?php include('inc_widgets/backBtn.php'); ?>
			                      <!-- Go back button code ending here -->
						</div>
						<button type="button" id="btnConfirm_Su" onclick="submitFunc();"> <small>Submit</small></button>
						<button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
						<button type="button" name="cancel"> <small>Cancel</small></button>				
				</div>
								
								<div class="cls"></div>

				 <div class="col-md-6">
                               

                                
                                
                                <div class="input-label"><label >Owner Name </label></div>	
                                <div class="input-feild"> 
                                       <input type="text" name="owner_name" id="owner_name" class="owner_name" value="<?php echo $owner_name ?>">
                                      

                                </div> 

                                <div class="input-label"><label >Country</label></div>	
                                <div class="input-feild">
                                     <select name="owner_country" id="owner_country" class="owner_country" required>
				                         <?php

				                            $selectsector = mysqli_query($con, "select * from country_setup where SrNo='$owner_country' ");

				                            while ($rowcountry = mysqli_fetch_array($selectsector))
				                            {
				                              echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
				                            }

				                          ?>
				                          <?php

				                            $selectsector = mysqli_query($con, "select * from country_setup");

				                            while ($rowcountry = mysqli_fetch_array($selectsector))
				                            {
				                              echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
				                            }

				                          ?>
				                      </select> 
                                </div> 
                                <div class="input-label"><label >City</label></div>	
                                <div class="input-feild">
                                      <select name="owner_city" id="owner_city" class="owner_city" required>
				                           <?php

				                            $selectsector = mysqli_query($con, "select * from city_setup where SrNo='$owner_city' ");

				                            while ($rowsector = mysqli_fetch_array($selectsector))
				                            {
				                              echo '<option value="'.$rowsector['SrNo'].'">'.$rowsector['city_name'].'</option>';
				                            }

				                          ?>
				                          <?php

				                            $selectsector = mysqli_query($con, "select * from city_setup");

				                            while ($rowsector = mysqli_fetch_array($selectsector))
				                            {
				                              echo '<option value="'.$rowsector['SrNo'].'">'.$rowsector['city_name'].'</option>';
				                            }

				                          ?>

				                      </select>    
                                       
                                </div>
                                 <div class="input-label"><label >Address</label></div>	
                                <div class="input-feild">
                                      <textarea name="owner_add" id="owner_add"><?php echo $owner_add ?></textarea>
                                       
                                </div>

                                 <div class="cls"></div>
                                <hr>

                                <div class="input-label"><label >IATA Code</label></div>	
                                <div class="input-feild">
                                      <input class="mini_input_field" type="text" name="iata_code" id="iata_code" value="<?php echo $iata_code ?>" >
                                       
                                </div>
                                 <div class="input-label"><label >Comm %</label></div>	
                                <div class="input-feild">
                                      <input class="mini_input_field" type="text" name="commesion" id="commesion" value="<?php echo $commesion ?>" ">
                                       
                                </div>

                                 <div class="input-label"><label >WHT </label></div>	
                                <div class="input-feild">
                                    <select class="mini_select_field" name="wht" id="wht">
                                    	<?php echo $wht ?>
                                    	<option>Yes</option>
                                    	<option>No</option>

                                    </select>
                                </div>             
                         	                                                                          
			 				 </div>

							<div class="col-md-6">
                             	<div class="input-label"><label >Contact No. </label></div>	
                                <div class="input-feild">
                                       <input  type="text" name="owner_phone" id="owner_phone" placeholder="Phone No." value="<?php echo $owner_phone ?>" >
                                       </div>
                                 <div class="input-label"><label >Fax No. </label></div>	
                                <div class="input-feild">   
                                       <input  type="text" name="fax" id="fax" value="<?php echo $fax ?>" placeholder="Fax No.">

                                </div>
                                <div class="input-label"><label >Email Address</label></div>	
                                <div class="input-feild">
                                       <input  type="text" name="email" id="email" value="<?php echo $email ?>" >
                                </div>

                                <div class="input-label"><label >Website</label></div>	
                                <div class="input-feild">
                                       <input  type="text" name="website" id="website" value="<?php echo $website ?>" >
                                </div>

                               <div>
				                    <div class="input-label"><label >Active</label></div>	
                                <div class="input-feild">
				                    <input type="checkbox" name="status" id="status" value="<?php echo $status ?>"> 
				                </div>

                                                                                 
						    </div>								
						</div>

						<div class="cls"></div>
					<hr>

                          <div class="acount_info widget_iner_box">
                            <ul class="nav nav-tabs">
                                
                                <li><a data-toggle="tab" href="#menu1">Airline Code</a></li>
                                <li><a data-toggle="tab" href="#menu4">Representative </a></li>
                            </ul>
                          </div>		
												
				              <div class="tab-content">
                          <div id="menu1" class="tab-pane fade">
                              <div class="container">
                                <br />
                                <div align="right">
                                    <button type="button" id="myBtn1">  <small>Add Stock Owner</small></button>
                                  </div>
                                
                               
                               </div>

                                 <div class="tbleDrpdown">
                                         <div id="tblebtn">
                                            <ul>
                                            

                                             
                                              
                                             

                                            </ul>
                                          </div>
                                  </div>

                                <table  id="airlinechargestble" class="display nowrap no-footer" style="width:100%">
                                                            
                                       <thead>
				                                    <tr>
				                                    	 <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
				                                    	 <th>Owner Name</th>
					                                    <th>Air Cd</th>
					                                    <th>Due To Air Line</th>
					                                    <th>Agency Comm.</th>
					                                    <th>WHT (Dr.)</th>
					                                    <th>KB Income</th>	
					                                    <th>Status</th>
					                                    <th>Edit</th>
					                                    <th>Action</th>			
				                                    </tr>
				                          </thead>
				                          <tbody>  
				                          <?php
																								                          		
											// fatch data in currency setup
											   $selectstock = mysqli_query($con, "select * from stock_airline_setup ");

					                                while ($rowstock= mysqli_fetch_array($selectstock))
					                                {
					                                ?>           
				                                     <tr>
				                                     	<?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowstock['SrNo'] .' " /></td>'; ?>
				                                     	<td><?php echo $owner_name ?></td>
				                                     	<td><?php echo $rowstock['air_name']; ?></td>
				                                     	<td><?php echo $rowstock['due_air_name'];?></td>	
				                                     	<td><?php echo $rowstock['agency_comm'];?></td>
				                                     	<td><?php echo $rowstock['wht_code'];?></td>
				                                     	<td><?php echo $rowstock['kb_income'];?></td>
				                                     	<td><?php echo $rowstock['status'];?></td>
				                                     	<td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowstock['SrNo']; ?>" data-target="#btn1" >Edit</td> 
		                                     		<?php
	                                                  if ($rowstock['status'] == "Active")
	                                                  {
	                                                  ?>
	                                                  <td><a href="deleteRep_Code.php?id=<?php echo $rowstock['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Deactivate</td>
	                                                  <?php
	                                                  }
	                                                  ?>

	                                                  <?php
	                                                  if ($rowstock['status'] == "Deactive")
	                                                  {
	                                                  ?>
	                                                  <td><a href="deleteRep_CodeI.php?id=<?php echo $rowstock['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Activate</td>
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
                               <button type="button" id="myBtn">  <small>Add Representative</small></button>
                              </div>
                              <br />
                             
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
                                               <th>Owner Name</th>
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
                                               $expload = $userNo."-SA";
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
                                                  <td><?php echo $owner_name ?></td>
                                                  <td><?php echo $rep_name ?></td>
                                                  <td><?php echo $rep_desg ?></td>
                                                  <td><?php echo $rep_office_no ?></td>
                                                  <td><?php echo $rep_phone_no ?></td>
                                                  <td><?php echo $email ?></td>
                                                  <td><?php echo $status ?></td>
                                                  <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn2" >Edit</td> 
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


 
                                      
					
		</form>
				

	</div>

</div>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#myBtn1").click(function(){
    $("#popupMEdit1").modal();
  });
});
</script>

<script>

  $(document).ready(function() {
    $('#airlinechargestble').DataTable({
       "scrollX": true
   });
} );

</script>
<script>

  $(document).ready(function() {
    $('#dpttable').DataTable({
       "scrollX": true
   });
} );

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
function saveFunc()
{
	$("#save_Modal").modal();
}
</script>

<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('.air_nameV').html(data.air_name);  
              $('.due_air_nameV').html(data.due_air_name);    
              $('.agency_commV').html(data.agency_comm);  
              $('.wht_codeV').html(data.wht_code);  
              $('.kb_incomeV').html(data.kb_income);      

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
         url:"fatch_stock2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.air_nameV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock3.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.due_air_nameV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock4.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.agency_commV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock5.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.wht_codeV').html(data);  
              
              
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_stock6.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
             
              $('.kb_incomeV').html(data);  
              
              
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

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>