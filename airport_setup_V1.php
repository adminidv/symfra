<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';



// Id GEt for edit
$userNo = $_GET['id'];
// / click Add btn (sub agents setup) 

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


  $expload = $userNo."-Air";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location:  airport_setup_V1.php?id=".$userNo);

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
 

  $expload = $userNo."-Air";

// update query
   $updateQuery12 = mysqli_query($con, "UPDATE represent_setup SET rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',email='$emailV',status='$statusV' WHERE SrNo='$SrNoV'") or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location:  airport_setup_V1.php?id=".$userNo);
}




	// select Qurey for fatch result by Given id  
 $qry= "SELECT * FROM airport_setup WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {

      $SrNo = $row['SrNo'];
      $airport_name = $row['airport_name'];
      $airport_iata  = $row['airport_iata'];
      $airport_ICAO = $row['airport_ICAO'];
      $country_name = $row['country_name'];
      $city_name = $row['city_name'];
      $cont_per_off = $row['cont_per_off'];
      $fax_no  = $row['fax_no'];
      $email = $row['email'];
      $website = $row['website'];
      $status = $row['status'];
    }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Airport Setup</title>
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
          <a href="usermodules.php" class="btn btn-info">Setups</a>
          <a href="#" class="btn btn-info active">Airport Setup</a>
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

				      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Airport Details-->
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
													<!-- <button type="button" id="btnConfirm_Su" onclick="submitAirlineFunc();" > <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
                          <button type="button" name="cancel"> <small>Cancel</small></button>  -->      
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                    

                                                     
                                                      
                                                       <div class="input-label"><label >Airport Name</label></div> 
                                                      <div class="input-feild">
                                                             <input type="text" name="airport_name" id="airport_name" disabled class="airport_name" value="<?php echo $airport_name ?>">
                                                      </div> 
                                                       <div class="input-label"><label >IATA Code</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="airport_iata" id="airport_iata" disabled class="airport_iata" value="<?php echo $airport_iata ?>">
                                                                
                                                      </div>
                                                      <div class="input-label"><label >ICAO Code</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="airport_ICAO" id="airport_ICAO" disabled class="airport_ICAO" value="<?php echo $airport_ICAO ?>">
                                                                
                                                      </div>
                                                       
                                                       
                                                      <div class="input-label"><label >Country</label></div> 
                                <div class="input-feild"> 
                                             <select name="country_name" disabled id="country_name" class="country_name" required>
                                                  
                                                  <!-- Drop Down list Country Name -->
                                                  <?php

                                                    $selectcountry = mysqli_query($con, "select * from country_setup where SrNo='$country_name' ");

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
                                           <select name="city_name" id="city_name" disabled class="city_name" required>
                                                
                                                <!-- Drop Down list Country Name -->
                                                <?php

                                                  $selectcity = mysqli_query($con, "select * from city_setup where SrNo='$city_name' ");

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

                                                         
                               </div>

                      <div class="col-md-6">
                                                     
                                                     
                                                      <div class="input-label"><label >Contact Office</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="cont_per_off" id="cont_per_off" class="cont_per_off" disabled value="<?php echo $cont_per_off ?>">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Fax No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="fax_no" id="fax_no" disabled value="<?php echo $fax_no ?>">
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Email</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="email" id="email" disabled value="<?php echo $email ?>">
                                                                
                                                      </div> 
                                                       <div class="input-label"><label >Website</label></div>
                                                      <div class="input-feild">
                                                              <input class="website"  type="text" name="website" id="website" disabled value="<?php echo $website ?>" >
                                                                
                                                      </div> 
                                                        <div class="input-label"><label >Active</label></div> 
                                                      <div class="input-feild">
                                                      <input class="" type="checkbox" disabled name="status" id="status" value="<?php echo $status ?>">
                                                      </div>
                                        
                              </div>                
                </div>      
                        <div class="cls"></div>
                        <hr>

								


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

                                                $expload = $userNo."-Air";
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
          </div>>

          
											
								
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
       "scrollX": true,

   });
} );

</script>


<!-- 
<script>

 $(document).ready(function() {
    $('#airlinechargestble').DataTable();
    $('#airlinechargestble2').DataTable();

} );
</script> -->
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
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>