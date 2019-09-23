<?php

include 'manage/connection.php';
include("manage/session.php");
$advSearch = 'Hide';
$ribbon = 'Default';
$subRibbon = 'showUser';
$Quick = 'UnHide';
$Quickhr = '';

// table customization 

if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $SrNo_Ar = 0;
  $air_name_Ar = 0;
  $flight_name_Ar = 0;
  $address_Ar = 0;
  $country_Ar = 0;
  $city_Ar = 0;
  $account_no_Ar = 0;
  $contact_person_Ar = 0;
  $con_office_Ar = 0;
  $con_personal_Ar = 0;
  $fax_no_Ar = 0;
  $email_Ar = 0;
  $website_Ar = 0;
  $kb_adj_Ar = 0;
  $awb_standard_Ar = 0;
  $iata_mem_Ar = 0;
  $sec_charges_Ar = 0;
  $fuel_charges_Ar = 0;
  $scan_charges_Ar = 0;
  $status_Ar = 0;

  // Setting variables if 1
   if (isset($_POST['SrNo_Ar']))
  {
    $SrNo_Ar = 1;
  }
  if (isset($_POST['air_name_Ar']))
  {
    $air_name_Ar = 1;
  }
  if (isset($_POST['flight_name_Ar']))
  {
    $flight_name_Ar = 1;
  }
  if (isset($_POST['address_Ar']))
  {
    $address_Ar = 1;
  }
  if (isset($_POST['country_Ar']))
  {
    $country_Ar = 1;
  }
  if (isset($_POST['city_Ar']))
  {
    $city_Ar = 1;
  }
  if (isset($_POST['account_no_Ar']))
  {
    $account_no_Ar = 1;
  }
  if (isset($_POST['contact_person_Ar']))
  {
    $contact_person_Ar = 1;
  }
  if (isset($_POST['con_office_Ar']))
  {
    $con_office_Ar = 1;
  }
  if (isset($_POST['con_personal_Ar']))
  {
    $con_personal_Ar = 1;
  }
  if (isset($_POST['fax_no_Ar']))
  {
    $fax_no_Ar = 1;
  }
  if (isset($_POST['email_Ar']))
  {
    $email_Ar = 1;
  }
  if (isset($_POST['website_Ar']))
  {
    $website_Ar = 1;
  }
  if (isset($_POST['kb_adj_Ar']))
  {
    $kb_adj_Ar = 1;
  }
  if (isset($_POST['awb_standard_Ar']))
  {
    $awb_standard_Ar = 1;
  }
  if (isset($_POST['iata_mem_Ar']))
  {
    $iata_mem_Ar = 1;
  }
  if (isset($_POST['sec_charges_Ar']))
  {
    $sec_charges_Ar = 1;
  }
  if (isset($_POST['fuel_charges_Ar']))
  {
    $fuel_charges_Ar = 1;
  }
  if (isset($_POST['scan_charges_Ar']))
  {
    $scan_charges_Ar = 1;
  }
  if (isset($_POST['status_Ar']))
  {
    $status_Ar = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE airlinecustomize SET air_name_Ar = '$air_name_Ar', flight_name_Ar='$flight_name_Ar', address_Ar='$address_Ar', country_Ar='$country_Ar', city_Ar='$city_Ar', account_no_Ar='$account_no_Ar', contact_person_Ar='$contact_person_Ar', con_office_Ar='$con_office_Ar', con_personal_Ar='$con_personal_Ar', fax_no_Ar='$fax_no_Ar', email_Ar='$email_Ar', website_Ar='$website_Ar', kb_adj_Ar='$kb_adj_Ar', awb_standard_Ar='$awb_standard_Ar', iata_mem_Ar='$iata_mem_Ar', sec_charges_Ar='$sec_charges_Ar', fuel_charges_Ar='$fuel_charges_Ar', scan_charges_Ar='$scan_charges_Ar', status_Ar='$status_Ar' WHERE SrNo_Ar= '$SrNo_Ar' ")or die(mysqli_error($con));

}

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airline_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE airline_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: airline_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airline_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE airline_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: airline_table.php");
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
    header("Location: airline_form_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airline_form_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airline_form_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Airline Table</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">

  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/add_user.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->

  <script src="js/jquery-3.3.1.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">Setup</a>
          <a href="airline_table.php" class="btn btn-info active">Airline Table</a>
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

           
           <?php include 'sidebar_widgets/user_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>


    
    <div class="Usertable">
    <div class="">
      <div class="col-md-12">
        <div class="user_create_btn">
          <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
          </div>
          <button type="button" id="btnNewUser" onclick="newairline();">New Airline</button>
        </div>
      </div>

      <div class="col-md-12">
        <div class="user_table-title">
          <h4>Airline Table</h4>
        </div>
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectAr = mysqli_query($con, 'SELECT * FROM airlineCustomize');

          while ($rowAr = mysqli_fetch_array($selectAr))
          {
            $SrNo_Ar = $rowAr['SrNo_Ar'];
            $air_name_Ar = $rowAr['air_name_Ar'];
            $flight_name_Ar = $rowAr['flight_name_Ar'];
            $address_Ar = $rowAr['address_Ar'];
            $country_Ar = $rowAr['country_Ar'];
            $city_Ar = $rowAr['city_Ar'];
            $account_no_Ar = $rowAr['account_no_Ar'];
            $contact_person_Ar = $rowAr['contact_person_Ar'];
            $con_office_Ar = $rowAr['con_office_Ar'];
            $con_personal_Ar = $rowAr['con_personal_Ar'];
            $fax_no_Ar = $rowAr['fax_no_Ar'];
            $email_Ar = $rowAr['email_Ar'];
            $website_Ar = $rowAr['website_Ar'];
            $kb_adj_Ar = $rowAr['kb_adj_Ar'];
            $awb_standard_Ar = $rowAr['awb_standard_Ar'];
            $iata_mem_Ar = $rowAr['iata_mem_Ar'];
            $sec_charges_Ar = $rowAr['sec_charges_Ar'];
            $fuel_charges_Ar = $rowAr['fuel_charges_Ar'];
            $scan_charges_Ar = $rowAr['scan_charges_Ar'];
            $status_Ar = $rowAr['status_Ar'];
          }

          ?>
          <div class="modal fade symfra_popup3" id="customTable" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select Fields to view on Table</h4>
                          </div>
                          <div class="modal-body">
                            
                              <?php

                              echo '<div class="col-md-4">';
                              if ($SrNo_Ar == 1)
                              {
                                echo '<input type="checkbox" class="hide"  name="SrNo_Ar" checked> <label class="hide">SrNo</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" class="hide" name="SrNo_Ar" > <label class="hide">SrNo</label> <br>';
                              }
                              if ($air_name_Ar == 1)
                              {
                                echo '<input type="checkbox" name="air_name_Ar" checked> <label>Airline Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="air_name_Ar" > <label>Airline Name</label> <br>';
                              }

                              if ($flight_name_Ar == 1)
                              {
                                echo '<input type="checkbox" name="flight_name_Ar" checked> <label>Flight Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="flight_name_Ar" > <label>Flight Name</label> <br>';
                              }

                              if ($address_Ar == 1)
                              {
                                echo '<input type="checkbox" name="address_Ar" checked> <label>Address</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="address_Ar" > <label>Address</label> <br>';
                              }

                              if ($country_Ar == 1)
                              {
                                echo '<input type="checkbox" name="country_Ar" checked> <label>Country </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="country_Ar" > <label>Country </label> <br>';
                              }
                               if ($city_Ar == 1)
                              {
                                echo '<input type="checkbox" name="city_Ar" checked> <label>City </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="city_Ar" > <label>City </label> <br>';
                              }

                              if ($account_no_Ar == 1)
                              {
                                echo '<input type="checkbox" name="account_no_Ar" checked> <label>Account No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="account_no_Ar" > <label>Account No. </label> <br>';
                              }

                              if ($contact_person_Ar == 1)
                              {
                                echo '<input type="checkbox" name="contact_person_Ar" checked> <label>Contact Person </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="contact_person_Ar" > <label>Contact Person </label> <br>';
                              }

                              if ($con_office_Ar == 1)
                              {
                                echo '<input type="checkbox" name="con_office_Ar" checked> <label>Contact No. Office </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="con_office_Ar" > <label>Contact No. Office </label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                              if ($con_personal_Ar == 1)
                              {
                                echo '<input type="checkbox" name="con_personal_Ar" checked> <label>Contact No. Personal </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="con_personal_Ar" > <label>Contact No. Personal </label> <br>';
                              }

                              if ($fax_no_Ar == 1)
                              {
                                echo '<input type="checkbox" name="fax_no_Ar" checked> <label>Fax No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fax_no_Ar" > <label>Fax No. </label> <br>';
                              }

                              if ($email_Ar == 1)
                              {
                                echo '<input type="checkbox" name="email_Ar" checked> <label>Email </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="email_Ar" > <label>Email </label> <br>';
                              }

                              if ($website_Ar == 1)
                              {
                                echo '<input type="checkbox" name="website_Ar" checked> <label>Website </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="website_Ar" > <label>Website </label> <br>';
                              }
                               if ($kb_adj_Ar == 1)
                              {
                                echo '<input type="checkbox" name="kb_adj_Ar" checked> <label>KB Adjusted </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="kb_adj_Ar" > <label>KB Adjusted </label> <br>';
                              }

                              if ($awb_standard_Ar == 1)
                              {
                                echo '<input type="checkbox" name="awb_standard_Ar" checked> <label>Standard AWB No. </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="awb_standard_Ar" > <label>Standard AWB No. </label> <br>';
                              }

                              if ($iata_mem_Ar == 1)
                              {
                                echo '<input type="checkbox" name="iata_mem_Ar" checked> <label>IATA</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="iata_mem_Ar" > <label>IATA</label> <br>';
                              }

                              if ($sec_charges_Ar == 1)
                              {
                                echo '<input type="checkbox" name="sec_charges_Ar" checked> <label>Security Charges </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="sec_charges_Ar" > <label>Security Charges </label> <br>';
                              }
                              echo '</div>';

                              if ($fuel_charges_Ar == 1)
                              {
                                echo '<input type="checkbox" name="fuel_charges_Ar" checked> <label>Fuel Charges </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="fuel_charges_Ar" > <label>Fuel Charges </label> <br>';
                              }

                              if ($scan_charges_Ar == 1)
                              {
                                echo '<input type="checkbox" name="scan_charges_Ar" checked> <label>Scanning Charges </label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="scan_charges_Ar" > <label>Scanning Charges </label> <br>';
                              }

                              if ($status_Ar == 1)
                              {
                                echo '<input type="checkbox" name="status_Ar" checked> <label>Status</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="status_Ar" > <label>Status</label> <br>';
                              }

                              ?>
                            
                            <button type="submit" name="btnCustom_U">Submit</button>

                          <div class="modal-footer">
                            <p>Add Related content if needed</p>
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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

         

          <div class="confirmTable-modal modal fade" id="deleteTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Deactivate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>

          <div class="confirmTable-modal modal fade" id="deleteTable_C1" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Activate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete1">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>


          <div class="leave-manage-sec-table widget_iner_box ">
            <div class="tbleDrpdown">
               <div id="tblebtn">
                  <ul>
                   <!--  <li><button type="button" id="myBtn"> <i class="fa fa-pencil"></i> Edit</button></li> -->
                    <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i>Activate</button></li>
                    <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>Deactivate</button></li>
                    <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                    <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li>

                  </ul>
                </div>
            </div>

              <table  id="airlinechargestble" class="display nowrap no-footer" style="width:100%">
                                                  
                                                 <thead>
                                  <tr>
                                  <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <?php
                                  if ($SrNo_Ar == 1)
                                  {
                                  ?>
                                  <th>SrNo</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($air_name_Ar == 1)
                                  {
                                  ?>
                                  <th>Airline Name </th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($flight_name_Ar == 1)
                                  {
                                  ?>
                                  <th>Flight Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($address_Ar == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($country_Ar == 1)
                                  {
                                  ?>
                                  <th>Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($city_Ar == 1)
                                  {
                                  ?>
                                  <th>City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($account_no_Ar == 1)
                                  {
                                  ?>
                                  <th>Account No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($contact_person_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Person Airline</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($con_office_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Office</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($con_personal_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Personal</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($fax_no_Ar == 1)
                                  {
                                  ?>
                                  <th>Fax No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($email_Ar == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($website_Ar == 1)
                                  {
                                  ?>
                                  <th>Website</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($kb_adj_Ar == 1)
                                  {
                                  ?>
                                  <th>KB Adjusted</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($awb_standard_Ar == 1)
                                  {
                                  ?>
                                  <th>Standard AWB No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($iata_mem_Ar == 1)
                                  {
                                  ?>
                                  <th>IATA</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($sec_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Security Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($fuel_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Fuel Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($scan_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Scanning Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($status_Ar == 1)
                                  {
                                  ?>
                                  <th>Status</th>
                                  <?php
                                  }
                                  ?>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Action</th>
                              </tr>
                       </thead>
                                                  <tbody>   

                                                    <?php
                                                         
                                                         // fatch data in currency setup
                                                             $selectairline = mysqli_query($con, "select * from  airline_setup ");
                                                          while ($rowairline= mysqli_fetch_array($selectairline))
                                                          {
                                                            
                                                            $air_name = $rowairline['air_name'];
                                                            $flight_name = $rowairline['flight_name'];
                                                            $address = $rowairline['address'];
                                                            $country = $rowairline['country'];
                                                            $city = $rowairline['city'];
                                                            $account_no = $rowairline['account_no'];
                                                            $contact_person = $rowairline['contact_person'];
                                                            $con_office = $rowairline['con_office'];
                                                            $con_personal = $rowairline['con_personal'];
                                                            $fax_no = $rowairline['fax_no'];
                                                            $email = $rowairline['email'];
                                                            $website = $rowairline['website'];
                                                            $kb_adj = $rowairline['kb_adj'];
                                                            $awb_standard = $rowairline['awb_standard'];;
                                                            $iata_mem = $rowairline['iata_mem'];
                                                            $sec_charges = $rowairline['sec_charges'];
                                                            $fuel_charges = $rowairline['fuel_charges'];
                                                            $scan_charges = $rowairline['scan_charges'];
                                                            $status = $rowairline['status'];
                                                            $id = $rowairline['SrNo'];


                                                          ?>        
                                                          
                                                               <tr id="<?php echo $id; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairline['SrNo'] .' " /></td>'; ?>
                                                            <?php
                                   
                                                            if ($SrNo_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $id; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($air_name_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $air_name; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($flight_name_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($address_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $address; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($country_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $country; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($city_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $city; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($account_no_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $account_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($contact_person_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $contact_person; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($con_office_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_office; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($con_personal_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_personal; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($fax_no_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fax_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($email_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $email; ?></td>
                                                            <?php
                                                            }
                                                            ?> <?php
                                                            if ($website_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $website; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($kb_adj_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $kb_adj; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($awb_standard_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awb_standard; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($iata_mem_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $iata_mem; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($sec_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sec_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($fuel_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fuel_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($scan_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $scan_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($status_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $status; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                              <td><a href="airline_codes_n_charges_V.php?SrNo=<?php echo $rowairline['SrNo']; ?>">View</td>
                                                            <td><a href="airline_codes_n_charges_E.php?SrNo=<?php echo $rowairline['SrNo']; ?>">Edit</td>
                                                             <?php
                                                              if ($rowairline['status'] == "Active")
                                                              {
                                                              ?>
                                                              <td><a href="deleteAir_Code.php?id=<?php echo $rowairline['SrNo']; ?>" >Deactive</td>
                                                              <?php
                                                              }
                                                              ?>

                                                              <?php
                                                              if ($rowairline['status'] == "Deactive")
                                                              {
                                                              ?>
                                                              <td><a href="deleteAir_CodeI.php?id=<?php echo $rowairline['SrNo']; ?>" >Active</td>
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
          </form>
      </div>
    </div>
  </div>


  <!-- Table customize script  -->
  <script>
$(document).ready(function(){
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
  });
});
</script>

<!-- Table scrole -->
<script>

  $(document).ready(function() {
    $('#airlinechargestble').DataTable({
       "scrollX": true
   });
} );

</script>

<script>
  var tables = document.getElementsByTagName('table');
  for (var i=0; i<tables.length;i++){
   resizableGrid(tables[i]);
  }

  function resizableGrid(table) {
   var row = table.getElementsByTagName('tr')[0],
   cols = row ? row.children : undefined;
   if (!cols) return;
  
   table.style.overflow = 'hidden';
  
   var tableHeight = table.offsetHeight;
  
   for (var i=0;i<cols.length;i++){
    var div = createDiv(tableHeight);
    cols[i].appendChild(div);
    cols[i].style.position = 'relative';
    setListeners(div);
   }

   function setListeners(div){
    var pageX,curCol,nxtCol,curColWidth,nxtColWidth;

    div.addEventListener('mousedown', function (e) {
     curCol = e.target.parentElement;
     nxtCol = curCol.nextElementSibling;
     pageX = e.pageX;
  
     var padding = paddingDiff(curCol);
  
     curColWidth = curCol.offsetWidth - padding;
     if (nxtCol)
      nxtColWidth = nxtCol.offsetWidth - padding;
    });

    // div.addEventListener('mouseover', function (e) {
    //  e.target.style.borderRight = '2px solid #0000ff';
    // })

    // div.addEventListener('mouseout', function (e) {
    //  e.target.style.borderRight = '';
    // })

    document.addEventListener('mousemove', function (e) {
     if (curCol) {
      var diffX = e.pageX - pageX;
  
      if (nxtCol)
       nxtCol.style.width = (nxtColWidth - (diffX))+'px';

      curCol.style.width = (curColWidth + diffX)+'px';
     }
    });

    document.addEventListener('mouseup', function (e) {
     curCol = undefined;
     nxtCol = undefined;
     pageX = undefined;
     nxtColWidth = undefined;
     curColWidth = undefined
    });
   }
  
   function createDiv(height){
    var div = document.createElement('div');
    div.style.top = 0;
    div.style.right = 0;
    div.style.width = '5px';
    div.style.position = 'absolute';
    div.style.cursor = 'col-resize';
    div.style.userSelect = 'none';
    div.style.height = height + 'px';
    return div;
   }
  
   function paddingDiff(col){
  
    if (getStyleVal(col,'box-sizing') == 'border-box'){
     return 0;
    }
  
    var padLeft = getStyleVal(col,'padding-left');
    var padRight = getStyleVal(col,'padding-right');
    return (parseInt(padLeft) + parseInt(padRight));

   }

   function getStyleVal(elm,css){
    return (window.getComputedStyle(elm, null).getPropertyValue(css))
   }
  };
</script>

<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteUserCode.php?user_id=<?php echo $id; ?>',
         type: 'GET',
         data: {id: id},
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              $("#deleteTable_C2").modal('hide');
               
         }
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

<script>
$(document).ready(function(){
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
  });
});
</script>

<script>
function newairline() {
  location.replace("airline_codes_n_charges.php")
}
</script>

<!-- For multi deactivate conformaation -->
<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>


<!-- For multi Activate conformaation -->
<script>
$(document).ready(function(){
  $("#btnDelete_C1").click(function(){
    $("#deleteTable_C1").modal();
  });
});
</script>

<script src="js/jquery.dataTables.min.js"></script>

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

<script src="js/bootstrap.min.js"></script>

</body>
</html>