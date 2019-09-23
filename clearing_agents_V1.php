<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$viewvar = $_GET['id'];
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
 
$expload = $viewvar."-CA";
// update query
   $updateQuery13 = mysqli_query($con, " UPDATE represent_setup SET userNo='$expload',rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',email='$emailV',status='$statusV' WHERE SrNo='$SrNoV'")or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: clearing_agents_V1.php?id=".$viewvar);
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

  $expload = $viewvar."-CA";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: clearing_agents_V1.php?id=" . $viewvar);

}

  $viewvar = $_GET['id'];
  $qry= "SELECT * FROM  clearing_agents WHERE SrNo = '$viewvar'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($viewvar==$row['SrNo'])

 {

	$code	 = $row['code'];
	$name    = $row['name'];
	$address = $row['address'];
	$country = $row['country'];
	$city    = $row['city'];
	$phone   = $row['phone'];
	$fax     = $row['fax'];
	$email   = $row['email'];
	$website = $row['website'];
	$status  = $row['status'];
		
	}

	    
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Clearing Agents</title>
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




<script type="text/javascript">
      $(document).ready(function(){
          $("#code").prop("disabled", true);
          $("#name").prop("disabled", true);
          $("#country").prop("disabled", true);
          $("#city").prop("disabled", true);
          $("#address").prop("disabled", true);
          $("#phone").prop("disabled", true);
          $("#fax").prop("disabled", true);
          $("#website").prop("disabled", true);
           
           });
</script>

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
          <a href="#" class="btn btn-info active">View Clearing Agents</a>
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
         <!-- Edit agents Modal-->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit agents Modal -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit agents Details</h4>
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

				     

				     


						 <label id="formSummary" style="color: red;"></label>

							

											  
								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="submitAirlineFunc();" > <small>Edit</small></button>
																
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                              

			                                               
			                                                
			                                                <div class="input-label"><label >Code</label></div>	
			                                                <div class="input-feild">
			                                                        <input   type="text" name="code" id="code" value="<?php echo $code ?>"> 
			                                                </div> 
			                                                 <div class="input-label"><label > Name</label></div>
			                                                <div class="input-feild">
			                                                        <input   type="text" name="name" id="name" value="<?php echo $name ?>">
			                                                      		
			                                                </div>
			                                                 
			                                                 

			                                                

			                                                                                                                
			                 				 </div>

											<div class="col-md-6">


															<div class="input-label"><label >Country</label></div> 
																<div class="input-feild"> 
												                     <select name="country" id="country" class="country" required>
												                          <option value="Select">Select </option>
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
											                     <select name="city" id="city" class="city" required>
											                          <option value="Select">Select </option>
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
			                                                <div class="input-feild">
			                                                        <textarea name="address" id="address"> <?php echo $address; ?></textarea>
			                                                      		
			                                                </div>
			                                             	  
			                                                                                   
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
															<div class="input-label"><label >Phone</label></div>
			                                                <div class="input-feild">
			                                                        <input type="text" name="phone" id="phone" value="<?php echo $phone ?>">
			                                                      		
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Fax No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="fax" id="fax" value="<?php echo $fax ?>">
			                                                      		
			                                                </div>			                                                    
										</div>

										<div class="col-md-6">

															<div class="input-label"><label >Email</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="email" id="email" disabled value="<?php echo $email ?>">
			                                                      		
			                                                </div> 

			                                                <div class="input-label"><label >Website</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="website" id="website" value="<?php echo $website ?>">
			                                                      		
			                                                </div>

			                                                <div class="input-label"><label >Active</label></div> 
															<div class="input-feild">
								                                    <input class="" type="checkbox" name="status" id="status" disabled value="<?php echo $status ?>">
					                                   		</div>




																			                                           		
										</div>
											 
								</div>

			<div id="representative" class="tab-pane fade in ">

                 


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
                                       $expload = $viewvar."-CA";
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




<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>