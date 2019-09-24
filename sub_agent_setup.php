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
  $partyname= $_POST['partyname'];
  $spar_name= $_POST['spar_name'];
  $address = $_POST['address'];
  $country_name = $_POST['country_name'];
  $city_name = $_POST['city_name'];
  $phone = $_POST['phone'];
  $fax_no = $_POST['fax_no'];
  $email = $_POST['email'];
  $website = $_POST['website'];
  $export_no = $_POST['export_no'];
  $sale_tax = $_POST['sale_tax'];
  $ntn_no = $_POST['ntn_no'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into  sub_agents_parties_setup(partyname,subpartyname,address,country,city,phone,fax,email,website,export_reg_no,sales_tax_no,ntn_no,status) values ('$partyname','$spar_name','$address','$country_name','$city_name','$phone','$fax_no','$email','$website','$export_no','$sale_tax','$ntn_no','$status')") or die(mysqli_error($con));

  $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'SubAgent', '$SrNo', '$loginUser', '$todayDate') ");
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: sub_agent_setup_V1.php?id=" . $SrNo);

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sub Agents Setup Table</title>
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
  <script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
  
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

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
          <a href="usermodules.php" class="btn btn-info">Setup</a>
          <a href="sub_agent_setup.php" class="btn btn-info active">Sub Agents Setup Table</a>
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

           
           
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<form action="" method="POST">
<div class="leave-manage-sec  main_widget_box ">
  

      <div class="form_sec_action_btn col-md-12">
         <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
         </div>
          
      </div>

      <div class="col-md-12">
            <div class="user_table-title">
              <h4>Sub Agents Setup Table</h4>
            </div>
        <form action="" method="POST">


         

      <!-- Add Representative -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Representative-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Representative Details</h4>
                </div>
                <div class="modal-body">

                  <div class="input-fields">  
                    <label>Representative Name</label> 
                    <input type="text" name="rep_name" id="rep_name" placeholder="Enter Here Party Name !">    
                  </div>
                   <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desg" id="rep_desg" placeholder="Enter Here Sub Party Name!">    
                  </div>
                  

                  
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="rep_office_no" id="rep_office_no" placeholder="Enter Here Phone Number !">    
                  </div>
                 
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="rep_phone_no" id="rep_phone_no" placeholder="Enter Here Fax Number !">    
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
         <!-- Edit Representative-->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Representative -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Representative Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="agent_SrNoV" id="agent_SrNoV" class="agent_SrNoV" >
                       
                  </div>
                  <div class="input-fields"> 
                 <label>Representative Name</label> 
                    <input type="text" name="rep_nameV" id="rep_nameV" placeholder="Enter Here Party Name !">    
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

      
      <div class="confirmTable-modal modal fade" id="deleteTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to delete selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
      </div>

      <div class="confirmTable2-modal modal fade" id="deleteTable_C2" role="dialog">
        <div class="modal-dialog">
              <div class="modal-content pop_up_content">
                  <div class="modal-header pop_up-header">
                    <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pop_title">Confirmation</h4>
                  </div>
                  <div class="modal-body Popup_bdy">
                    <div class="input-feild">
                        <p>Are you sure you want to delete this record?</p>
                        
                    </div>
                    <button type="button" class="remove" id="remove">Yes</button>
                    <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                  </div>
             </div>
          </div>
      </div>

   <h4><label id="formSummary" style="color: red;"></label></h4>
       <p id="V_partyname" style="color: red;"></p>
        <p id="V_spar_name" style="color: red;"></p>
        <!-- <p id="V_email" style="color: red;"></p> -->

              

                        
                <div class=" widget_iner_box">

                      <div class="form_sec_action_btn col-md-12">
                          <div class="form_action_right_btn">
                                          <!-- Go back button code starting here -->
                                          <?php include('inc_widgets/backBtn.php'); ?>
                                          <!-- Go back button code ending here -->
                          </div>
                          <button type="button" id="btnConfirm_Su" onclick="FormValidation();" > <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                          <button type="button" name="cancel"> <small>Cancel</small></button>       
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                    

                                                     
                                                      
                                                      <div class="input-label"><label >Party Name</label></div>  
                                                      <div class="input-feild">
                                                             <select name="partyname" id="partyname" class="partyname" required>
                                                  <option value="">Select </option>
                                                  <?php

                                                    $selectparty = mysqli_query($con, "select * from custmaster");

                                                    while ($rowParty = mysqli_fetch_array($selectparty))
                                                    {
                                                      echo '<option value="'.$rowParty['SrNo'].'">'.$rowParty['cmpTitle'].'</option>';
                                                    }

                                                  ?>

                                              </select><span class="steric">*</span>
                                                      </div> 
                                                       <div class="input-label"><label >Sub Party Agent</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="spar_name" maxlength="40" id="spar_name" placeholder="Enter Here Sub Party Name !"><span class="steric">*</span>
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Country</label></div> 
                                             <div class="input-feild"> 
                                             <select name="country_name" id="country_name" class="country_name" required onchange="checkCities();">
                                                  <option value="">Select </option>
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
                                           <select name="city_name" id="city_name" class="city_name" required>
                                                <option value="">Select </option>
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
                                                          <textarea name="address" maxlength="50" id="address"></textarea>
                                                      </div>                                                                  
                               </div>

                      <div class="col-md-6">
                                                      
                                                      <div class="input-label"><label >Contact No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="phone" id="phone" maxlength="14">
                                                                
                                                      </div>
                                                      
                                                      <div class="input-label"><label >Fax No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="fax_no" id="fax_no" maxlength="14">
                                                                 
                                                      </div>

                                                      <div class="input-label"><label >Email</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="email" id="email" maxlength="40">
                                                                
                                                      </div>   
                                                      <div class="input-label"><label >Website</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="website" maxlength="30" id="website">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Export No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" maxlength="20" name="export_no" id="export_no">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Sales Tax No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="sale_tax" id="sale_tax">
                                                             
                                                      </div>                                      
                                                       <div class="input-label"><label >NTN No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" maxlength="20" name="ntn_no" id="ntn_no">
                                                             
                                                      </div>

                                                       <div class="input-label"><label>Active</label></div> 
                                                       <div class="input-feild"> 
                                                       <input type="checkbox"  name="status" id="status" value="<?php echo $status ?>" >
                                                       </div>
                              </div>                
                </div>      
                        <div class="cls"></div>
                        <hr>

               
      
                       



<script>
$(document).ready(function(){
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit").modal();
  });
});
</script>

<script type="text/javascript">
function saveFunc()
{
  $("#save_Modal").modal();
}
</script>

<script type="text/javascript">
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var partyname=document.getElementById('partyname').value;
      var spar_name=document.getElementById('spar_name').value;
     // var email=document.getElementById('email').value;
     
     
      var summary = "Summary: ";

      if(partyname == "")
      {
          document.getElementById('partyname').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_partyname").innerHTML = "Firstname is required.";
      }
      if(partyname != "")
      {
          document.getElementById('partyname').style.borderColor = "white";
          document.getElementById("V_partyname").innerHTML = "";

      }

      if(spar_name == "")
      {
          document.getElementById('spar_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_spar_name").innerHTML = "Sub Agent is required.";
      }
      if(spar_name != "")
      {
          document.getElementById('spar_name').style.borderColor = "white";
          document.getElementById("V_spar_name").innerHTML = "";

         
      }

      // if(email != "")
      // {
      //     document.getElementById('email').style.borderColor = "white";
      //     document.getElementById("V_email").innerHTML = "";

      //     if (!re.test(email))
      //   {
      //     document.getElementById('email').style.borderColor = "red";
      //       missingVal = 1;
      //       // summary += "Firstname is required.";
      //       document.getElementById("V_email").innerHTML = "Please follow the email format (user@domain.com).";
      //   }
      // }

      
      
      if (missingVal != 1)
      {
        document.getElementById('partyname').style.borderColor = "white";
        document.getElementById('spar_name').style.borderColor = "white";
        // document.getElementById('email').style.borderColor = "white";
       
        $("#submit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#usrtble')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        });
    </script>
<!-- <script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_agent.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('#par_nameV').val(data.par_name);  
              $('#spar_nameV').val(data.spar_name);  
              $('#addressV').val(data.address);    
              $('#phoneV').val(data.phone); 
              $('#fax_noV').val(data.fax_no);
               $('#emailV').val(data.email);  
              $('#websiteV').val(data.website); 
               $('#export_noV').val(data.export_no);  
              $('#sale_taxV').val(data.sale_tax);   
              $('#ntn_noV').val(data.ntn_no);  

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
</script> -->
<!-- <script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_agent2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.country_nameV').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
              
         }
      });
    
});
</script> -->

<!-- <script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_agent3.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.city_nameV').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
              
         }
      });
    
});
</script> -->


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

<script>

  $(document).ready(function() {
    $('#dpttable').DataTable({
       "scrollX": true
   });
} );

</script>

<script type="text/javascript">
  function checkCities()
  {
    var bpCountry = document.getElementById("country_name").value;

    $.ajax({
       url:"checkCities.php",  
              method:"GET",  
              data:{bpCountry:bpCountry}, 
              dataType:"text", 
       success: function(data) {
           $('#city_name').html(data);
       }
    });
  }
</script>





<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>