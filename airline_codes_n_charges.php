<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userID = $_SESSION['user'];
//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

$selectSrNo = mysqli_query($con, "SELECT * FROM airline_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
  $newSrNo1 = $SrNo + 1;
  $SrNo = $newSrNo1;

}


$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$SrNo' ORDER BY instance DESC LIMIT 1  ");
  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

  $lastID1 = $rowLastID1['instance'];
  $newID1 = $lastID1 + 1;
  $instance = $newID1;

if (isset($_POST['submitBtn'])) {

  $instance =$instance;
  $record_id =$SrNo;
  $createBy =$loginUser;
  $createDate =$todayDate;  
  $air_name= $_POST['air_name'];
  $flight_name= $_POST['flight_name'];
  $address= $_POST['address'];
  $country= $_POST['country'];
  $city= $_POST['city'];
  $iata_name = $_POST['iata_name'];
  $icao_code = $_POST['icao_code'];
  $account_no= $_POST['account_no'];
  $contact_person= $_POST['contact_person'];
  $con_office= $_POST['con_office'];
  $con_personal= $_POST['con_personal'];
  $fax_no= $_POST['fax_no'];
  $email= $_POST['email'];
  $website= $_POST['website'];
  $kb_adj= $_POST['kb_adj'];
  $awb_standard= $_POST['awb_standard'];
  $iata_mem= $_POST['iata_mem'];
  $sec_charges= $_POST['sec_charges'];
  $fuel_charges= $_POST['fuel_charges'];
  $scan_charges= $_POST['scan_charges'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
    // echo "The file has been uploaded.";

	        // Inserting records to DB
			$insertQuery = mysqli_query($con, "insert into  airline_setup (air_name, flight_name, address, country, city, iata_name, icao_code,account_no, contact_person, con_office, con_personal, fax_no, email, website, kb_adj, awb_standard, iata_mem, sec_charges, fuel_charges, scan_charges, status) values  ('$air_name', '$flight_name', '$address', '$country', '$city', '$iata_name','$icao_code','$account_no', '$contact_person', '$con_office', '$con_personal', '$fax_no', '$email', '$website', '$kb_adj', '$awb_standard', '$iata_mem', '$sec_charges', '$fuel_charges', '$scan_charges', '$status')")or die(mysqli_error($con));

      $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Airline', '$SrNo', '$loginUser', '$todayDate') ");
 

			// echo "The record is inserted successfully.";

    			// Generating the alert
    		$msg = "Record is inserted successfully.";
        function alert($msg)
        {
          echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        alert($msg);

      header("Location: airline_codes_n_charges_V1.php?id=" . $SrNo);
	
	    

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

				      	      

         


						 <h4><label id="formSummary" style="color: red;"></label></h4>
             
             <p id="V_air_name" style="color: red;"></p>
             <p id="V_flight_name" style="color: red;"></p>
             <p id="V_email" style="color: red;"></p>
							

											  
								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="FormValidation();" > <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
													<button type="button" name="cancel"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                              

			                                               
			                                                
			                                                <div class="input-label"><label >Air-Line Name</label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="air_name" id="air_name" class="air_name" maxlength="40"><span class="steric">*</span>
			                                                </div> 
			                                                 <div class="input-label"><label >Account No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class="mini_input_field"  type="text" name="account_no" id="account_no" maxlength="30">
			                                                      		
			                                                </div>
			                                                 
			                                                 <div class="input-label"><label >Flight Name</label></div>
			                                                <div class="input-feild">
			                                                        <input class="mini_input_field"  type="text" name="flight_name" id="flight_name" maxlength="3"><span class="steric">*</span>
			                                                      		
			                                                </div>

			                                                 <div class="input-label"><label >Website</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="website" id="website" maxlength="30" >
			                                                      		
			                                                </div>
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
			                                                <div class="input-feild" >
			                                                    <textarea name="address" id="address" maxlength="100"></textarea>
			                                                </div>                                                                  
			                 				 </div>

											<div class="col-md-6">
			                                             	  <div class="input-label"><label >Person Name</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="contact_person" id="contact_person" maxlength="30">
			                                                      		
			                                                </div> 
			                                                <div class="input-label"><label >Contact No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="con_personal" id="con_personal" maxlength="14">
			                                                      		
			                                                </div>
			                                                <div class="input-label"><label >Contact Office</label></div>	
			                                                <div class="input-feild">
			                                                      <input type="text" name="con_office" id="con_office" maxlength="14">
			                                                       
			                                                </div>
			                                                <div class="input-label"><label >Fax No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="fax_no" id="fax_no" maxlength="14" >
			                                                      		
			                                                </div>

			                                                <div class="input-label"><label >Email</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="email" id="email" maxlength="40" >
			                                                      		
			                                                </div>  

                                                      <div class="input-label"><label >IATA Name</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="iata_name" id="iata_name" maxlength="14" >
                                                                
                                                      </div>

                                                      <div class="input-label"><label >ICAO</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="icao_code" id="icao_code" maxlength="14" >
                                                                
                                                      </div>                                       
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">

																<div class="input-label"><label >KB Adjust in Sale Report  </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="kb_adj" id="kb_adj">
				                                                      	<option>yes</option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 

				                                           		<div class="input-label"><label >Standard AWB No. </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="awb_standard" id="awb_standard">
				                                                      	<option>yes</option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 

				                                           		<div class="input-label"><label >IATA no. </label></div> 
				                                              	<div class="input-feild">
				                                                      <select class="mini_select_field" name="iata_mem" id="iata_mem">
				                                                      	<option>yes</option>
				                                                      	<option>no</option>

				                                                      </select>
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<!-- <div class="input-label"><label >Logo</label></div> -->
		                                               				<!-- <div class="input-feild">
		                                               					<input class="mini_input_field" type="text" name="">
		                                               				</div> -->
		                                               				<!-- <div class="input-feild">	
		                                               				         <img src="images/user.png" style="width: 85px" id="blah">
		                                                  		      <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
		                                               				</div>
 -->
										</div>
										<div class="col-md-6">

																<div class="widget_child_title"><h4>G/L Account Details</h4></div>

																<div class="input-label"><label >Security Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" name="sec_charges" id="sec_charges" maxlength="10">
				                                           		</div>

				                                           		<div class="input-label"><label >Fuel Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" name="fuel_charges" id="fuel_charges" maxlength="10">
				                                           		</div>

				                                           		<div class="input-label"><label >Scaning Charges </label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="text" name="scan_charges" id="scan_charges" maxlength="10">
				                                           		</div>
				                                           		<div class="input-label"><label >Active</label></div> 
																<div class="input-feild">
				   				                                    <input class="" type="checkbox" name="status" id="status">
				                                           		</div>


										</div>	 
								</div>
			
												<div class="cls"></div>
												<hr>


											
								
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
              $('.air_nameV').html(data.air_name);    

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
              $('.air_nameV').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
              
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

        <script type="text/javascript">
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var air_name=document.getElementById('air_name').value;
      var flight_name=document.getElementById('flight_name').value;
      var email=document.getElementById('email').value;
     
     
      var summary = "Summary: ";

      if(air_name == "")
      {
          document.getElementById('air_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_air_name").innerHTML = "Airline Name is required.";
      }
      if(air_name != "")
      {
          document.getElementById('air_name').style.borderColor = "white";
          document.getElementById("V_air_name").innerHTML = "";

      }

      if(flight_name == "")
      {
          document.getElementById('flight_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_name").innerHTML = "Flight Name is required.";
      }
      if(flight_name != "")
      {
          document.getElementById('flight_name').style.borderColor = "white";
          document.getElementById("V_flight_name").innerHTML = "";

          if (!regexp.test(flight_name))
        {
          document.getElementById('flight_name').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_flight_name").innerHTML = "Only alphabets are allowed.";
        }
      }

      // if(email == "")
      // {
      //     document.getElementById('email').style.borderColor = "red";
      //     missingVal = 1;
      //     // summary += "Firstname is required.";
      //     document.getElementById("V_email").innerHTML = "Flight Name is required.";
      // }
      if(email != "")
      {
          document.getElementById('email').style.borderColor = "white";
          document.getElementById("V_email").innerHTML = "";

          if (!re.test(email))
        {
          document.getElementById('email').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_email").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }


      

      
      
      if (missingVal != 1)
      {
        document.getElementById('air_name').style.borderColor = "white";
        document.getElementById('flight_name').style.borderColor = "white";
        document.getElementById('email').style.borderColor = "white";
       
        $("#submitAirline_Modal").modal();
        
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