<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


// fatch data in currency setup
 $selectairport = mysqli_query($con, "select * from airport_setup ");

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airport_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE airport_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: airport_setup_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airport_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE airport_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: airport_setup_table.php");
  }
}


 // Export
 if(isset($_POST["btnExport_D"]))
{
  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: airline_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airline_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airline_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}


// fatch data in currency setup
   $selectairline = mysqli_query($con, "select * from  airline_charges_setup ");

// click Edit submit btn
if(isset($_POST['btnedit1']))
{
  $airport_SrNoV = $_POST['airport_SrNoV']; 
  $airport_nameV = $_POST['airport_nameV'];
  $w_e_fV = $_POST['w_e_fV'];
  $airport_secV = $_POST['airport_secV'];
  $airport_fuelV = $_POST['airport_fuelV'];
  $airport_screenV = $_POST['airport_screenV'];
  $airport_awcV = $_POST['airport_awcV'];
  $airport_awbV = $_POST['airport_awbV']; 

   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Inactive';
  }
 

// update qury
   $updateQuery12 = mysqli_query($con, "UPDATE  airline_charges_setup SET airport_name='$airport_nameV', w_e_f='$w_e_fV', airport_sec='$airport_secV', airport_fuel='$airport_fuelV',airport_screen='$airport_screenV',airport_awc='$airport_awcV',airport_awb='$airport_awbV',status='$statusV' WHERE SrNo='$airport_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: airline_codes_n_charges.php");
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
          <a href="usermodules.php" class="btn btn-info">Setups</a>
          <a href="airport_setup_1.php" class="btn btn-info active">Airline Codes & Charges</a>
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
                  
                <h4 class="modal-title">Add Representative Details</h4>
                        </div>
                        <div class="modal-body">
                          <div class="input-fields">  
                            <label>Name</label> 
                            <input type="text" name="rep_name" id="rep_name" class="rep_name" placeholder="Organization Name">    
                          </div>

                          <div class="input-fields">  
                            <label>Designation</label> 
                            <input type="text" name="rep_desg" id="rep_desg" class="rep_desg" placeholder="Designation">    
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
                    <input type="text" name="SrNoV" id="SrNoV" >    
                  </div>

                 <div class="modal-body">
                          <div class="input-fields">  
                            <label>Name</label> 
                            <input type="text" name="rep_nameV" id="rep_nameV" class="rep_nameV" placeholder="Organization Name">    
                          </div>

                          <div class="input-fields">  
                            <label>Designation</label> 
                            <input type="text" name="rep_desgV" id="rep_desgV" class="rep_desgV" placeholder="Designation">    
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

                          <button type="submit" name="btnadd">Submit</button>

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
                          <button type="button" id="btnConfirm_Su" onclick="submitAirlineFunc();" > <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
                          <button type="button" name="cancel"> <small>Cancel</small></button>       
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                    

                                                     
                                                      
                                                      <div class="input-label"><label >Airport Name</label></div> 
                                                      <div class="input-feild">
                                                             <input type="text" name="airport_name" id="airport_name" class="airport_name">
                                                      </div> 
                                                       <div class="input-label"><label >IATA Code</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="airport_iata" id="airport_iata" class="airport_iata">
                                                                
                                                      </div>
                                                      <div class="input-label"><label >ICAO Code</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="icao_code" id="icao_code" class="icao_code">
                                                                
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

                                                      <    
                               </div>

                      <div class="col-md-6">
                                                     
                                                     
                                                      <div class="input-label"><label >Contact Office</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="cont_per_off" id="cont_per_off" class="cont_per_off">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Fax No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="fax_no" id="fax_no">
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Email</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="email" id="email">
                                                                
                                                      </div> 
                                                       <div class="input-label"><label >Website</label></div>
                                                      <div class="input-feild">
                                                              <input class="website"  type="text" name="website" id="website">
                                                                
                                                      </div> 
                                                        <div class="input-label"><label >Active</label></div> 
                                                      <div class="input-feild">
                                                      <input class="" type="checkbox" name="status" id="status">
                                                      </div>
                                        
                              </div>                
                </div>      
                        <div class="cls"></div>
                        <hr>

                <div class="widget_iner_box">
            <!-- <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#airline_charges">Airline Charges</a></li>
                </ul>
            </div> -->


           <div class="tab-content">


              <div id="airline_charges" class="tab-pane fade in active">

                <div class="col-md-12">  
                   <div class="form_sec_action_btn col-md-12">
        <!-- 
          Add Currency Button click btn Add currency
         -->
         
          <button type="button" id="myBtn">  <small>Add Representative</small></button>
      </div>
                  <div class="leave-manage-sec-table widget_iner_box ">

                      <div class="tbleDrpdown">
             <div id="tblebtn">
                <ul>
                

                  <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="airport_print.php" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
                      </div>
        
                      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                                        
                                       <thead>
                                                  <tr>
                                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                                   <th>Airport Name</th>
                                                   <th>W.E.F</th>
                                                   <th>Security Chg</th>
                                                   <th></th>
                                                   <th>Person Name</th>
                                                   <th>Phone No.</th>
                                                   <th>Office No.</th>
                                                   <th>fax No.</th>
                                                   <th>Email</th>
                                                   <th>Wesite</th>
                                                   <th>Status</th>
                                                   <th>Edit</th>
                                                   <th>Action</th>

                                                   </tr>
                                        </thead>
                              <tbody>
                                          
                                      <?php

                                                while ($rowairport= mysqli_fetch_array($selectairport))
                                                {
                                                ?>
                                        <tr>
                                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairport['SrNo'] .' " /></td>'; ?>
                                          <td><?php echo $rowairport['airport_name']; ?></td>
                                          <td><?php echo $rowairport['airport_iata']; ?></td>
                                          <td><?php echo $rowairport['country_name']; ?></td>
                                          <td><?php echo $rowairport['city_name']; ?></td>
                                          <td><?php echo $rowairport['contact_name']; ?></td>
                                          <td><?php echo $rowairport['cont_per_no']; ?></td>
                                          <td><?php echo $rowairport['cont_per_off']; ?></td>
                                          <td><?php echo $rowairport['fax_no']; ?></td>
                                          <td><?php echo $rowairport['email']; ?></td>
                                          <td><?php echo $rowairport['website']; ?></td>
                                          <td><?php echo $rowairport['status']; ?></td>
                                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairport['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                                          <?php
                                          if ($rowairport['status'] == "Active")
                                          {
                                          ?>
                                          <td><a href="deleteAirport_Code.php?id=<?php echo $rowairport['SrNo']; ?>" >Deactivate</td>
                                          <?php
                                          }
                                          ?>

                                          <?php
                                          if ($rowairport['status'] == "Deactive")
                                          {
                                          ?>
                                          <td><a href="deleteAirport_CodeI.php?id=<?php echo $rowairport['SrNo']; ?>" >Activate</td>
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

<!-- table script -->
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