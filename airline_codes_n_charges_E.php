<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userNo = $_GET['SrNo'];



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

  // echo $user_id;
  $qry= "SELECT * FROM   airline_setup WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {
      $SrNo= $row['SrNo'];
      $air_name_P = $row['air_name'];
      $flight_name_P = $row['flight_name'];
      $address_P = $row['address'];
      $country_P = $row['country'];
      $city_P = $row['city'];
      $iata_name_P = $row['iata_name'];
      $icao_code_P = $row['icao_code'];
      $account_no_P = $row['account_no'];
      $contact_person_P = $row['contact_person'];
      $con_office_P = $row['con_office'];
      $con_personal_P = $row['con_personal'];
      $fax_no_P = $row['fax_no'];
      $email_P = $row['email'];
      $website_P = $row['website'];
      $kb_adj_P = $row['kb_adj'];
      $awb_standard_P = $row['awb_standard'];
      $iata_mem_P = $row['iata_mem'];
      $sec_charges_P = $row['sec_charges'];
      $fuel_charges_P = $row['fuel_charges'];
      $scan_charges_P = $row['scan_charges'];
      $status_P = $row['status'];   
      }
   
    // After Submit
    if (isset($_POST['submitBtn'])) {

  $air_name= $_POST['air_name'];
  $flight_name= $_POST['flight_name'];
  $address= $_POST['address'];
  $country= $_POST['country'];
  $city= $_POST['city'];
  $iata_name= $_POST['iata_name'];
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

        $clause = " WHERE SrNo='$SrNo'";
        $initQuery = "UPDATE airline_setup SET SrNo='$SrNo' ";
          


        // $updateQuery = mysqli_query($con, " UPDATE airline_setup SET air_name='$air_name2', flight_name='$flight_name', address='$address', country='$country', city='$city', account_no='$account_no', contact_person='$contact_person', con_office='$con_office', con_personal='$con_personal', fax_no='$fax_no', email='$email', website='$website', kb_adj='$kb_adj', awb_standard='$awb_standard', iata_mem='$iata_mem', sec_charges='$sec_charges', fuel_charges='$fuel_charges', scan_charges='$scan_charges', status='$status', img_logo='$nameForTable' WHERE SrNo='$SrNo'") or die(mysqli_error($con));

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
          $initChangeLog .= " VALUES ('$newID1', 'Airline', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

          if ($air_name != $air_name_P)
          {
            $initQuery .= ", air_name='$air_name'";
            $initChangeLog2 = ", '$air_name_P', '$air_name') ";
          }
          if ($flight_name != $flight_name_P)
          {
            $initQuery .= ", flight_name='$flight_name'";
            $initChangeLog2 = ", '$flight_name_P', '$flight_name') ";
          }
          if ($address != $address_P)
          {
            $initQuery .= ", address='$address'";
            $initChangeLog2 = ", '$address_P', '$address') ";
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
           if ($iata_name != $iata_name_P)
          {
            $initQuery .= ", iata_name='$iata_name'";
            $initChangeLog2 = ", '$iata_name_P', '$iata_name') ";
          }
           if ($icao_code != $icao_code_P)
          {
            $initQuery .= ", icao_code='$icao_code'";
            $initChangeLog2 = ", '$icao_code_P', '$icao_code') ";
          }
          if ($account_no != $account_no_P)
          {
            $initQuery .= ", account_no='$account_no'";
            $initChangeLog2 = ", '$account_no_P', '$account_no') ";
          }
          if ($contact_person != $contact_person_P)
          {
            $initQuery .= ", contact_person='$contact_person'";
            $initChangeLog2 = ", '$contact_person_P', '$contact_person') ";
          }
          if ($con_office != $con_office_P)
          {
            $initQuery .= ", con_office='$con_office'";
            $initChangeLog2 = ", '$con_office_P', '$con_office') ";
          }
          if ($con_personal != $con_personal_P)
          {
            $initQuery .= ", con_personal='$con_personal'";
            $initChangeLog2 = ", '$con_personal_P', '$con_personal') ";
          }
          if ($fax_no != $fax_no_P)
          {
            $initQuery .= ", fax_no='$fax_no'";
            $initChangeLog2 = ", '$fax_no_P', '$fax_no') ";
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

          if ($kb_adj != $kb_adj_P)
          {
            $initQuery .= ", kb_adj='$kb_adj'";
            $initChangeLog2 = ", '$kb_adj_P', '$kb_adj') ";
          }

          if ($awb_standard != $awb_standard_P)
          {
            $initQuery .= ", awb_standard='$awb_standard'";
            $initChangeLog2 = ", '$awb_standard_P', '$awb_standard') ";
          }

          if ($iata_mem != $iata_mem_P)
          {
            $initQuery .= ", iata_mem='$iata_mem'";
            $initChangeLog2 = ", '$iata_mem_P', '$iata_mem') ";
          }

          if ($sec_charges != $sec_charges_P)
          {
            $initQuery .= ", sec_charges='$sec_charges'";
            $initChangeLog2 = ", '$sec_charges_P', '$sec_charges') ";
          }

          if ($fuel_charges != $fuel_charges_P)
          {
            $initQuery .= ", fuel_charges='$fuel_charges'";
            $initChangeLog2 = ", '$fuel_charges_P', '$fuel_charges') ";
          }

          if ($scan_charges != $scan_charges_P)
          {
            $initQuery .= ", scan_charges='$scan_charges'";
            $initChangeLog2 = ", '$scan_charges_P', '$scan_charges') ";
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
          $finalChangeLog = $initChangeLog . $initChangeLog2;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

          // Inserting records to DB

        header("Location: airline_codes_n_charges_E.php?SrNo=" . $userNo);
      

      // echo "The record is inserted successfully.";

      // Generating the alert
      $msg = "Record is inserted successfully.";
      function alert($msg)
            {
            echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            alert($msg);
      }
     
  


    // echo "The record is inserted successfully.";

    // Generating the alert
    /*$msg = "Record is updated successfully.";
    function alert($msg)
        {
        echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        alert($msg);*/

        // header("Location: searchResultU.php");
  

// Add airport charges 

if (isset($_POST['btnadd1'])) {
  $airport_name = $_POST['airport_name'];
  $w_e_f = $_POST['w_e_f'];
  $airport_sec = $_POST['airport_sec'];
  $airport_fuel = $_POST['airport_fuel'];
  $airport_screen = $_POST['airport_screen'];
  $airport_awc = $_POST['airport_awc'];
  $airport_awb = $_POST['airport_awb']; 
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
  // insertQuery
   $insertQuery = mysqli_query($con, "insert into airline_charges_setup (airport_name,w_e_f,airport_sec,airport_fuel,airport_screen,airport_awc,airport_awb, status) values ('$airport_name','$w_e_f' ,'$airport_sec','$airport_fuel','$airport_screen','$airport_awc','$airport_awb','$status')");

  header("Location: airline_codes_n_charges_E.php?SrNo=".$userNo);
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
if(isset($_POST['btnedit']))
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
    $statusV='Deactive';
  }
 

// update qury
   $updateQuery12 = mysqli_query($con, "UPDATE  airline_charges_setup SET airport_name='$airport_nameV', w_e_f='$w_e_fV', airport_sec='$airport_secV', airport_fuel='$airport_fuelV',airport_screen='$airport_screenV',airport_awc='$airport_awcV',airport_awb='$airport_awbV',status='$statusV' WHERE SrNo='$airport_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: airline_codes_n_charges_E.php?SrNo=".$userNo);
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
 
$expload = $userNo."-AL";
// update query
   $updateQuery13 = mysqli_query($con, " UPDATE represent_setup SET userNo='$expload',rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',email='$rep_emailV',status='$statusV' WHERE SrNo='$SrNoV'")or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: airline_codes_n_charges_E.php?SrNo=".$userNo);
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

  $expload = $userNo."-AL";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$rep_email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: airline_codes_n_charges_E.php?SrNo=".$userNo);

}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Airline Codes & Charges Edit</title>
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">Setups</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Airline Codes & Charges</a>
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

                  <table id="dpttable2" class="display nowrap no-footer" style="width:100%">
                     
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Airline' ");

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
                    <input type="text" name="rep_email" id="rep_email" placeholder="Enter Here Email !">    
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
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
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
                    <input type="text" name="rep_emailV" id="rep_emailV" placeholder="Enter Here Email !">    
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

              <!-- ADD Airport Details -->
      <div class="modal fade symfra_popup2" id="popupMEdit1" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airport Charges Details</h4>
                </div>
                <div class="modal-body">

                  <div class="input-fields">  
                    <label>Airport Departure</label> 
                    <select name="airport_name" id="airport_name">
                      <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectairport = mysqli_query($con, "select * from airport_setup");

                            while ($rowairport = mysqli_fetch_array($selectairport))
                            {
                              echo '<option value="'.$rowairport['airport_name'].'">'.$rowairport['airport_name'].'</option>';
                            }

                          ?>
                    </select>    
                  </div>
                   <div class="input-fields"> 
                    <label>W.E.F.</label> 
                    <input type="date" name="w_e_f" id="w_e_f" placeholder="Enter Here City Name!">    
                  </div>
                  <div class="input-fields"> 
                    <label>Security Charges.</label> 
                    <input type="text" name="airport_sec" id="airport_sec" placeholder="Enter Here City Name!">    
                  </div>
                  <div class="input-fields">  
                    <label>Fuel Charges</label> 
                    <input type="text" name="airport_fuel" id="airport_fuel" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Screen Charges</label> 
                    <input type="text" name="airport_screen" id="airport_screen" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWC Charges</label> 
                    <input type="text" name="airport_awc" id="airport_awc" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWB Charges</label> 
                    <input type="text" name="airport_awb" id="airport_awb" placeholder="Enter Here Region Name !">    
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
      <div class="modal fade symfra_popup2" id="btn2" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airport Charges Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="airport_SrNoV" id="airport_SrNoV" >    
                  </div>

                  <div class="input-fields">  
                    <label>Airport Departure</label> 
                    <select name="airport_nameV" id="airport_nameV" class="airport_nameV">
                      <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectairport = mysqli_query($con, "select * from airport_setup");

                            while ($rowairport = mysqli_fetch_array($selectairport))
                            {
                              echo '<option value="'.$rowairport['airport_name'].'">'.$rowairport['airport_name'].'</option>';
                            }

                          ?>
                    </select>    
                  </div>
                   <div class="input-fields"> 
                    <label>W.E.F.</label> 
                    <input type="date" name="w_e_fV" id="w_e_fV" placeholder="Enter Here W.E.F !">    
                  </div>
                  <div class="input-fields"> 
                    <label>Security Charges.</label> 
                    <input type="text" name="airport_secV" id="airport_secV" placeholder="Enter Here Security Charges!">    
                  </div>
                  <div class="input-fields">  
                    <label>Fuel Charges</label> 
                    <input type="text" name="airport_fuelV" id="airport_fuelV" placeholder="Enter Here Fuel Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>Screen Charges</label> 
                    <input type="text" name="airport_screenV" id="airport_screenV" placeholder="Enter Here Screen Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWC Charges</label> 
                    <input type="text" name="airport_awcV" id="airport_awcV" placeholder="Enter Here AWC Charges !">    
                  </div>
                  <div class="input-fields">  
                    <label>AWB Charges</label> 
                    <input type="text" name="airport_awbV" id="airport_awbV" placeholder="Enter Here AwB Charges !">    
                  </div>
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="statusV" id="statusV">    
                  </div>
                  <button type="submit" name="btnedit" >Submit</button>
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
                          <!-- log change btn -->
                          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
                          <button type="button" id="btnConfirm_Su" onclick="FormValidation();"  > <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="saveAirlineFunc();"> <small>Save</small></button>
                          <button type="button" name="cancel"> <small>Cancel</small></button>       
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                    

                                                     
                                                      
                                                      <div class="input-label"><label >Air-Line Name</label></div>  
                                                      <div class="input-feild">
                                                             <input type="text" name="air_name" id="air_name"  value="<?php echo $air_name_P ?>"><span class="steric">*</span>
                                                      </div> 
                                                       <div class="input-label"><label >Account No.</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="account_no" id="account_no"  value="<?php echo $account_no_P ?>">
                                                                
                                                      </div>
                                                       
                                                       <div class="input-label"><label >Flight Name</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="flight_name" id="flight_name"  value="<?php echo $flight_name_P ?>"><span class="steric">*</span>
                                                                
                                                      </div>

                                                       <div class="input-label"><label >Website</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="website" id="website"  value="<?php echo $flight_name_P ?>">
                                                                
                                                      </div>
                                                      <div class="input-label"><label >Country</label></div> 
                                <div class="input-feild"> 
                                             <select name="country" id="country" class="country" >
                                                  
                                                  <?php

                                                    $selectcountry = mysqli_query($con, "select * from country_setup where SrNo='$country_P' ");

                                                    while ($rowcountry = mysqli_fetch_array($selectcountry))
                                                    {
                                                      echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
                                                    }

                                                  ?>
                                                  <!-- Drop Down list Country Name -->
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
                                           <select name="city" id="city" class="city" >
                                                
                                                 <?php

                                                  $selectcity = mysqli_query($con, "select * from city_setup where SrNo='$city_P' ");

                                                  while ($rowcity = mysqli_fetch_array($selectcity))
                                                  {
                                                    echo '<option value="'.$rowcity['city_name'].'">'.$rowcity['city_name'].'</option>';
                                                  }

                                                ?>
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
                                                          <textarea  name="address" id="address"><?php echo $address_P ?></textarea>
                                                      </div>                                                                  
                               </div>

                      <div class="col-md-6">
                                                      <div class="input-label"><label >Person Name</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="contact_person" id="contact_person" value="<?php echo $contact_person_P ?>"  >
                                                                
                                                      </div> 
                                                      <div class="input-label"><label >Contact No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="con_personal" id="con_personal" value="<?php echo $con_personal_P ?>" >
                                                                
                                                      </div>
                                                      <div class="input-label"><label >Contact Office</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="con_office" id="con_office" value="<?php echo $con_office_P ?>" >
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Fax No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="fax_no" id="fax_no" value="<?php echo $fax_no_P ?>" >
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Email</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="email" id="email" value="<?php echo $email_P ?>"  >
                                                                
                                                      </div>
                                                       <div class="input-label"><label >IATA Name</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="iata_name" id="iata_name"  maxlength="14"  value="<?php echo $iata_name_P ?>" >
                                                                
                                                      </div>

                                                      <div class="input-label"><label >ICAO</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="icao_code" id="icao_code"  maxlength="14"  value="<?php echo $icao_code_P ?>" >
                                                                
                                                      </div>                                              
                              </div>                
                </div>      
                        <div class="cls"></div>
                        <hr>

                <div class=" widget_iner_box">
                    <div class="col-md-6">

                                <div class="input-label"><label >KB Adjust in Sale Report  </label></div> 
                                                        <div class="input-feild">
                                                              <select class="mini_select_field" name="kb_adj" id="kb_adj" >
                                                                <option value="<?php echo $kb_adj_P ?>"><?php echo $kb_adj_P ?></option>
                                                                <option>no</option>

                                                              </select>
                                                              
                                                      </div> 

                                                      <div class="input-label"><label >Standard AWB No. </label></div> 
                                                        <div class="input-feild">
                                                              <select class="mini_select_field" name="awb_standard" id="awb_standard" >
                                                                <option value="<?php echo $awb_standard_P ?>"><?php echo $awb_standard_P ?></option>
                                                                <option>no</option>

                                                              </select>
                                                              
                                                      </div> 

                                                      <div class="input-label"><label >IATA no. </label></div> 
                                                        <div class="input-feild">
                                                              <select class="mini_select_field" name="iata_mem" id="iata_mem" >
                                                                <option value="<?php echo $iata_mem_P ?>"><?php echo $iata_mem_P ?></option>
                                                                <option>no</option>

                                                              </select>
                                                              
                                                      </div> 
                                                      <div class="cls"></div>
                                                      <hr>

                                                      <!-- <div class="input-label"><label >Logo</label></div>
                                                          
                                                          <div class="input-feild"> 
                                                                   <img src="Airline Images/<?php echo $img_logo ; ?>" style="width: 185px" id="blah">
                                                                <input type="file"  name="fileToUpload" id="fileToUpload" value="<?php echo $img_logo ; ?>" onchange="readURL(this);">
                                                          </div>
 -->
                    </div>
                    <div class="col-md-6">

                                <div class="widget_child_title"><h4>G/L Account Details</h4></div>

                                <div class="input-label"><label >Security Charges </label></div> 
                                <div class="input-feild">
                                                      <input class="" type="text"  name="sec_charges" id="sec_charges" value="<?php echo $sec_charges_P ?>" >
                                                      </div>

                                                      <div class="input-label"><label >Fuel Charges </label></div> 
                                <div class="input-feild">
                                                      <input class="" type="text"  name="fuel_charges" id="fuel_charges" value="<?php echo $fuel_charges_P ?>">
                                                      </div>

                                                      <div class="input-label"><label >Scaning Charges </label></div> 
                                <div class="input-feild">
                                                      <input class="" type="text"  name="scan_charges" id="scan_charges" value="<?php echo $scan_charges_P ?>">
                                                      </div>
                                                      <div class="input-label"><label >Active</label></div> 
                                <div class="input-feild">
                                                      <input class="" type="checkbox"  name="status" id="status" value="<?php echo $status_P ?>">
                                                      </div>



                    </div>   
                </div>
      
                        <div class="cls"></div>
                        <hr>

                          <div class="acount_info widget_iner_box">
                            <ul class="nav nav-tabs">
                                
                                <li><a data-toggle="tab" href="#menu1">Airpoet Charges</a></li>
                                <li><a data-toggle="tab" href="#menu4">Representative </a></li>
                            </ul>
                          

                        <div class="tab-content">
                          <div id="menu1" class="tab-pane fade">
                              <div class="container">
                                <br />
                                <div align="right">
                                    <button type="button" id="myBtn1">  <small>Add Airport</small></button>
                                  </div>
                                
                               
                               </div>

                                 <div class="tbleDrpdown">
                                         <div id="tblebtn">
                                            <ul>
                                            <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                                            <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                                             

                                            </ul>
                                          </div>
                                  </div>

                                <table  id="airlinechargestble" class="display nowrap no-footer" style="width:100%">
                                                            
                                       <thead>
                                                  <tr>
                                                     <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                                    <th>Airport D </th>
                                                    <th>W.E.F</th>
                                                    <th>Security Chg</th>
                                                    <th>Fuel Chg</th>                 
                                                    <th>Screen Chg</th>                
                                                    <th>AWC Chg</th>                  
                                                    <th>AWC Fee</th>                   
                                                    <th>Status</th>       
                                                  <th>Edit</th>
                                                  <th>Action</th>

                                                  </tr>
                                        </thead>
                                        <tbody>   

                                          <?php
                                              

                                            while ($rowairline= mysqli_fetch_array($selectairline))
                                            {
                                            ?>        
                                               <tr>
                                                 <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairline['SrNo'] .' " /></td>'; ?>
                                                <td><?php echo $rowairline['airport_name']; ?></td> 
                                                <td><?php echo $rowairline['w_e_f'];?></td> 
                                                <td><?php echo $rowairline['airport_sec'];?></td>
                                                <td><?php echo $rowairline['airport_fuel'];?></td>
                                                <td><?php echo $rowairline['airport_screen'];?></td>
                                                <td><?php echo $rowairline['airport_awc'];?></td>
                                                <td><?php echo $rowairline['airport_awb'];?></td>
                                                <td><?php echo $rowairline['status'];?></td>
                                                <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowairline['SrNo']; ?>" data-target="#btn2" >Edit</td> 
                                                <?php
                                                  if ($rowairline['status'] == "Active")
                                                  {
                                                  ?>
                                                  <td><a href="deleteAirline_Code.php?id=<?php echo $rowairline['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Deactivate</td>
                                                  <?php
                                                  }
                                                  ?>

                                                  <?php
                                                  if ($rowairline['status'] == "Deactive")
                                                  {
                                                  ?>
                                                  <td><a href="deleteAirline_CodeI.php?id=<?php echo $rowairline['SrNo']; ?>&userNo=<?php echo $userNo; ?>" >Activate</td>
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
                                    <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                                    <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                                    <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="airport_print.php" target="_blank"> Print</a></button></li> -->
                                   <!--  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li> -->
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
                                               $expload = $userNo."-AL";
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
               $('#rep_emailV').val(data.email);  

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
  $("#myBtn1").click(function(){
    $("#popupMEdit1").modal();
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

<!-- java script -->
        <script type="text/javascript">
        function logUserFunc()
        {
          $("#logUser_Modal").modal();
        }
        </script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>