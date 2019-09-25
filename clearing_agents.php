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

$selectSrNo = mysqli_query($con, "SELECT * FROM clearing_agents ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
  $SnewID1 = $SrNo + 1;
  $SrNo1 = $SnewID1;

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
	$code	= $_POST['code'];
	$name= $_POST['name'];
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
	        // echo "The file has been uploaded.";

	        // Inserting records to DB
			$insertQuery = mysqli_query($con, "insert into  clearing_agents (code, name, country, city, address, phone, fax, email, website, status) values  ('$code', '$name',  '$country', '$city','$address', '$phone', '$fax', '$email', '$website', '$status')") or die( mysqli_error($con));

			 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Clearing', '$SrNo', '$loginUser', '$todayDate') ");


			// echo "The record is inserted successfully.";

 			header("Location: clearing_agents_V1.php?id=" . $SrNo1);
		
	    }
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Clearing Agents</title>
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
          <a href="clearing_agents.php" class="btn btn-info active">Clearing Agents</a>
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
      					 <p id="V_name" style="color: red;"></p>
      					  <p id="V_email" style="color: red;"></p>
      					 <p id="V_phone" style="color: red;"></p>
      					  <p id="V_fax" style="color: red;"></p>
							

											  
								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<button type="button" id="btnConfirm_Su" onclick="FormValidation()" > <small>Submit</small></button>
													<button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
													<button type="button" name="cancel"> <small>Cancel</small></button>				
											</div>
															
															<div class="cls"></div>

											 <div class="col-md-6">
			                                              

			                                               
			                                                
			                                                <div class="input-label"><label >Code</label></div>	
			                                                <div class="input-feild">
			                                                        <input   type="text" name="code" id="code">
			                                                </div> 
			                                                 <div class="input-label"><label > Name</label></div>
			                                                <div class="input-feild">
			                                                        <input   type="text" name="name" id="name" maxlength="40"><span class="steric">*</span>
			                                                      		
			                                                </div>
			                                                 
			                                                 

			                                                

			                                                                                                                
			                 				 </div>

											<div class="col-md-6">


															<div class="input-label"><label >Country</label></div> 
																<div class="input-feild"> 
												                     <select name="country" id="country" class="country" onchange="checkCities();" >
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
			                                                        <textarea name="address" maxlength="50" id="address"></textarea>
			                                                      		
			                                                </div>
			                                             	  
			                                                                                   
			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
															<div class="input-label"><label >Phone</label></div>
			                                                <div class="input-feild">
			                                                        <input type="text" name="phone" id="phone" maxlength="14" >
			                                                      		
			                                                </div>
			                                                
			                                                <div class="input-label"><label >Fax No.</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="fax" id="fax" maxlength="14">
			                                                      		
			                                                </div>			                                                    
										</div>

										<div class="col-md-6">

															<div class="input-label"><label >Email</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="email" id="email" maxlength="40" >
			                                                      		
			                                                </div> 

			                                                <div class="input-label"><label >Website</label></div>
			                                                <div class="input-feild">
			                                                        <input class=""  type="text" name="website" id="website" maxlength="30">
			                                                      		
			                                                </div>

			                                                <div class="input-label"><label >Active</label></div> 
															<div class="input-feild">
								                                    <input class="" type="checkbox" name="status" id="status">
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
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
     var regexp2 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var name=document.getElementById('name').value;
      var email=document.getElementById('email').value;
      var phone=document.getElementById('phone').value;
      var fax=document.getElementById('fax').value;



     
     
      var summary = "Summary: ";

      if(name == "")
      {
          document.getElementById('name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_name").innerHTML = "Firstname is required.";
      }
      if(name != "")
      {
          document.getElementById('name').style.borderColor = "white";
          document.getElementById("V_name").innerHTML = "";

      }

      // if(user_fName == "")
      // {
      //     document.getElementById('user_fName').style.borderColor = "red";
      //     missingVal = 1;
      //     // summary += "Firstname is required.";
      //     document.getElementById("s_fName").innerHTML = "Firstname is required.";
      // }
      // if(airport_ICAO != "")
      // {
      //     document.getElementById('airport_ICAO').style.borderColor = "white";
      //     document.getElementById("V_airport_ICAO").innerHTML = "";

      //     if (!regexp.test(airport_ICAO))
      //   {
      //     document.getElementById('airport_ICAO').style.borderColor = "red";
      //       missingVal = 1;
      //       // summary += "Firstname is required.";
      //       document.getElementById("V_airport_ICAO").innerHTML = "Only alphabets are allowed in ICAO.";
      //   }
      // }

       if(phone != "")
      {
          document.getElementById('phone').style.borderColor = "white";
          document.getElementById("V_phone").innerHTML = "";

          if (!regexp2.test(phone))
        {
          document.getElementById('phone').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_phone").innerHTML = "Only Number are allowed in Phone No.";
        }
       } 


       if(fax != "")
      {
          document.getElementById('fax').style.borderColor = "white";
          document.getElementById("V_fax").innerHTML = "";

          if (!regexp2.test(fax))
        {
          document.getElementById('fax').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_fax").innerHTML = "Only Number are allowed in Fax No.";
        }
       } 

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
        document.getElementById('name').style.borderColor = "white";
        document.getElementById('email').style.borderColor = "white";
        document.getElementById('phone').style.borderColor = "white";
        document.getElementById('fax').style.borderColor = "white";
       
        $("#submitAirline_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>


<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script type="text/javascript">
    function checkCities()
    {
      var bpCountry = document.getElementById("country").value;

      $.ajax({
         url:"checkCities.php",  
                method:"GET",  
                data:{bpCountry:bpCountry}, 
                dataType:"text", 
         success: function(data) {
             $('#city').html(data);
         }
      });
    }
</script>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>