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

$selectSrNo = mysqli_query($con, "SELECT * FROM sub_agents_parties_setup ORDER BY SrNo DESC LIMIT 1");
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
  $partyname= $_POST['partyname'];
  $subpartyname= $_POST['subpartyname'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  $fax = $_POST['fax'];
  $email = $_POST['email'];
  $website = $_POST['website'];
  $export_reg_no = $_POST['export_reg_no'];
  $sales_tax_no = $_POST['sales_tax_no'];
  $ntn_no = $_POST['ntn_no'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

     // Checking currency name if it is already been added
     $existCurName = "0";
     $selectCurName = mysqli_query($con, "SELECT * FROM sub_agents_parties_setup WHERE subpartyname='$subpartyname' ");
     while ($rowCurName = mysqli_fetch_array($selectCurName))
     {
       $existCurName = $rowCurName['subpartyname'];
     }
     if ($existCurName != "0")
     {
       echo '<script type="text/javascript">
         alert("This Sub Party Name is already added");
         location.replace("sub_agent_setup.php");
       </script>';
       // header("Location: currency_setup.php");
     }
     else
     {
    //  insert qurey
     $insertQuery = mysqli_query($con, "insert into sub_agents_parties_setup(partyname,subpartyname,address,country,city,phone,fax,email,website,export_reg_no,sales_tax_no,ntn_no,status) values ('$partyname','$subpartyname','$address','$country','$city','$phone','$fax','$email','$website','$export_reg_no','$sales_tax_no','$ntn_no','$status')") or die(mysqli_error($con));

      $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'SubAgent', '$SrNo1', '$loginUser', '$todayDate') ");
     
     

     header("Location: sub_agent_setup_V1.php?id=" . $SrNo1);

}
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
        <p id="V_subpartyname" style="color: red;"></p>
        <p id="V_email" style="color: red;"></p>
        <p id="V_phone" style="color: red;"></p>
        <p id="V_fax" style="color: red;"></p>
        <p id="V_export_reg_no" style="color: red;"></p>
        <p id="V_sales_tax_no" style="color: red;"></p>
        <p id="V_ntn_no" style="color: red;"></p>

              

                        
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
                                                             <select name="partyname" id="partyname" class="partyname" >
                                                  <option value="">Select </option>
                                                  <?php

                                                    $selectparty = mysqli_query($con, "select * from custmaster");

                                                    while ($rowParty = mysqli_fetch_array($selectparty))
                                                    {
                                                      echo '<option value="'.$rowParty['cmpTitle'].'">'.$rowParty['cmpTitle'].'</option>';
                                                    }

                                                  ?>

                                              </select><span class="steric">*</span>
                                                      </div> 
                                                       <div class="input-label"><label >Sub Party Agent</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="subpartyname" maxlength="40" id="subpartyname" placeholder="Enter Here Sub Party Name !"><span class="steric">*</span>
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Country</label></div> 
                                             <div class="input-feild"> 
                                             <select name="country" id="country" class="country"  onchange="checkCities();">
                                                  <option >Select </option>
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
                                           <select name="city" id="city" class="city" >
                                                <option>Select </option>
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
                                                              <input class=""  type="text" name="fax" id="fax" maxlength="14">
                                                                 
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
                                                            <input type="text" maxlength="20" name="export_reg_no" id="export_reg_no">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Sales Tax No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="sales_tax_no" id="sales_tax_no">
                                                             
                                                      </div>                                      
                                                       <div class="input-label"><label >NTN No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" maxlength="20" name="ntn_no" id="ntn_no">
                                                             
                                                      </div>

                                                       <div class="input-label"><label>Active</label></div> 
                                                       <div class="input-feild"> 
                                                       <input type="checkbox"  name="status" id="status">
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
    var regexp2 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
    var regexp3 = /^[0-9, . , 0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var partyname=document.getElementById('partyname').value;
      var subpartyname=document.getElementById('subpartyname').value;
      var email=document.getElementById('email').value;
      var phone=document.getElementById('phone').value;
      var fax=document.getElementById('fax').value;
      var export_reg_no=document.getElementById('export_reg_no').value;
      var sales_tax_no=document.getElementById('sales_tax_no').value;
      var ntn_no=document.getElementById('ntn_no').value;
     
     
      var summary = "Summary: ";

      if(partyname == "")
      {
          document.getElementById('partyname').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is .";
          document.getElementById("V_partyname").innerHTML = "Firstname is required.";
      }
      if(partyname != "")
      {
          document.getElementById('partyname').style.borderColor = "white";
          document.getElementById("V_partyname").innerHTML = "";

      }

      if(subpartyname == "")
      {
          document.getElementById('subpartyname').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is .";
          document.getElementById("V_subpartyname").innerHTML = "Sub Agent is required.";
      }
      if(subpartyname != "")
      {
          document.getElementById('subpartyname').style.borderColor = "white";
          document.getElementById("V_subpartyname").innerHTML = "";

         
      }

       if(phone != "")
      {
          document.getElementById('phone').style.borderColor = "white";
          document.getElementById("V_phone").innerHTML = "";

          if (!regexp2.test(phone))
        {
          document.getElementById('phone').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is .";
            document.getElementById("V_phone").innerHTML = "Only Number are allowed in Contact No.";
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
            // summary += "Firstname is .";
            document.getElementById("V_fax").innerHTML = "Only Number are allowed in Fax No.";
        }
      }

      if(export_reg_no != "")
      {
          document.getElementById('export_reg_no').style.borderColor = "white";
          document.getElementById("V_export_reg_no").innerHTML = "";

          if (!regexp3.test(export_reg_no))
        {
          document.getElementById('export_reg_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is .";
            document.getElementById("V_export_reg_no").innerHTML = "Only Number are allowed in Export No.";
        }
      }

      if(sales_tax_no != "")
      {
          document.getElementById('sales_tax_no').style.borderColor = "white";
          document.getElementById("V_sales_tax_no").innerHTML = "";

          if (!regexp3.test(sales_tax_no))
        {
          document.getElementById('sales_tax_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is .";
            document.getElementById("V_sales_tax_no").innerHTML = "Only Number are allowed in Sales Tax No.";
        }
      }

       if(ntn_no != "")
      {
          document.getElementById('ntn_no').style.borderColor = "white";
          document.getElementById("V_ntn_no").innerHTML = "";

          if (!regexp3.test(ntn_no))
        {
          document.getElementById('ntn_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is .";
            document.getElementById("V_ntn_no").innerHTML = "Only Number are allowed in Ntn No.";
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
            // summary += "Firstname is .";
            document.getElementById("V_email").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }

      
      
      if (missingVal != 1)
      {
        document.getElementById('partyname').style.borderColor = "";
        document.getElementById('subpartyname').style.borderColor = "white";
         document.getElementById('email').style.borderColor = "white";
         document.getElementById('phone').style.borderColor = "white";
         document.getElementById('fax').style.borderColor = "white";
         document.getElementById('export_reg_no').style.borderColor = "white";
         document.getElementById('sales_tax_no').style.borderColor = "white";
         document.getElementById('ntn_no').style.borderColor = "white";
       
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