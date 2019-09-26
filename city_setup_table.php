<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';



// For Change log Edit
$userID = $_SESSION['user'];
//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

// for Change log ID Edit
$selectSrNo = mysqli_query($con, "SELECT * FROM city_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
  
}


// Add Change log
//login user
$loginUser1= $_SESSION['user'];
// Today date func
$todayDate1 = date("Y-m-d");

// for Change log ID Add
$selectSrNo = mysqli_query($con, "SELECT * FROM city_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
  $newSrNo1 = $SrNo + 1;
  $SrNo1 = $newSrNo1;

}

// For Change Log Record
$selectLastID1 = mysqli_query($con, "SELECT * FROM chainlog WHERE record_id = '$SrNo' ORDER BY instance DESC LIMIT 1  ");
  $rowLastID1 = mysqli_fetch_array($selectLastID1, MYSQLI_ASSOC);

  $lastID1 = $rowLastID1['instance'];
  $newID1 = $lastID1 + 1;
  $instance = $newID1;

// fatch data in currency setup
 $selectCity = mysqli_query($con, "select * from   city_setup ");

 // multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM city_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE city_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: city_setup_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM city_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE city_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: city_setup_table.php");
  }
}


// click Edit submit btn
if(isset($_POST['btnedit1']))
{
  // $empNo = $_POST['empNo'];
  $city_SrNoV= $_POST['city_SrNoV'];
  $city_codeV_n = $_POST['city_codeV_p'];
  $city_nameV_n = $_POST['city_nameV_p'];
  $country_nameV_n = $_POST['country_nameV_p'];
  $city_tel_codeV_n = $_POST['city_tel_codeV_p'];

   if (isset($_POST['statusV_p'])) {
    $statusV_n='Active';

  }
  else
  {
    $statusV_n='Deactive';
  }

  $selectPrev = mysqli_query($con, "SELECT * FROM city_setup WHERE SrNo='$city_SrNoV' ");
  while ($rowPrev = mysqli_fetch_array($selectPrev))
  {
    $city_codeV_p = $rowPrev['city_code'];
    $city_nameV_p = $rowPrev['city_name'];
    $country_nameV_p = $rowPrev['country_name'];
    $city_tel_codeV_p = $rowPrev['city_tel_code'];
    $statusV_p = $rowPrev['status'];
  }

   $clause = " WHERE SrNo='$city_SrNoV'";
  $initQuery = "UPDATE city_setup SET SrNo='$city_SrNoV' ";

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
  $initChangeLog .= " VALUES ('$newID1', 'City', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

  if ($city_codeV_n != $city_codeV_p)
  {
    $initQuery .= ", city_code='$city_codeV_n'";
    $initChangeLog2 = ", '$city_codeV_p','$city_codeV_n')";

     $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
  }

   if ($city_nameV_n != $city_nameV_p)
  {
    $initQuery .= ", city_name='$city_nameV_n'";
    $initChangeLog2 = ",'$city_nameV_p','$city_nameV_n') ";

     $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
  }

  if ($country_nameV_n != $country_nameV_p)
  {
    $initQuery .= ", country_name='$country_nameV_n'";
    $initChangeLog2 = ",'$country_nameV_p','$country_nameV_n') ";

     $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
  }

 

  if ($city_tel_codeV_n != $city_tel_codeV_p)
  {
    $initQuery .= ", city_tel_code='$city_tel_codeV_n'";
    $initChangeLog2 = ",'$city_tel_codeV_p','$city_tel_codeV_n') ";

     $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
  }

   if ($statusV_n != $statusV_p)
  {
    $initQuery .= ", status='$statusV_n'";
    $initChangeLog2 = ",'$statusV_p','$statusV_n') ";

     $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
  }

  // if ($statusV_n != $statusV_p)
  // {
  //   $initQuery .= ", status='$statusV_n'";
  //   $initChangeLog2 = ", '$statusV_p', '$statusV_n') ";
  // }

  $finalQuery = $initQuery . $clause;
  // echo $finalQuery . "<br>";

  mysqli_query($con, $finalQuery) or die(mysqli_error($con));

 

// update qury
   // $updateQuery12 = mysqli_query($con, "UPDATE  city_setup SET city_code='$city_codeV',city_name='$city_nameV',country_name='$country_nameV',city_tel_code='$city_tel_codeV',status='$statusV' WHERE SrNo='$city_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: city_setup_table.php");
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
    header("Location: city_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("city_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("city_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

// click Add Currency btn

if (isset($_POST['submitBtn'])) {

  $instance =$instance;
  $record_id =$SrNo1;
  $createBy =$loginUser;
  $createDate =$todayDate;
  $city_code = $_POST['city_code'];
  $city_name = $_POST['city_name'];
  $country_name = $_POST['country_name'];
  $city_tel_code = $_POST['city_tel_code'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into city_setup (city_code,city_name,country_name,city_tel_code, status) values ('$city_code','$city_name' ,'$country_name','$city_tel_code','$status')");

  $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'City', '$SrNo1', '$loginUser1', '$todayDate1') ");
 
 header("Location: city_setup_table.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>City Setup Table</title>
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
          <a href="city_setup_table.php" class="btn btn-info active">City Setup Table</a>
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

               <!-- Modal Two-->
               <div class="modal fade confirmTable-modal" id="submitCity" role="dialog">
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


                <!-- Modal Two-->
               <div class="modal fade confirmTable-modal" id="popupMEdit2" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Submit?</p>
                          <button type="submit" name="btnedit1">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>
  

      <div class="form_sec_action_btn col-md-12">
         <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
         </div>
          
      </div>

      <div class="col-md-12">
            <div class="user_table-title">
              <h4>City Table</h4>
            </div>

      <div class="form_sec_action_btn col-md-12">
        <!-- 
          Add Currency Button click btn Add currency
         -->
         
          <button type="button" id="myBtn">  <small>Add City</small></button>
          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Change Logs</small></button>
      </div>
         

      <!-- Add City Modal -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD City Modal-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">City Details</h4>
                </div>
                <div class="modal-body">

                  <h4><label id="formSummary" style="color: red;"></label></h4>
                  <p id="V_city_code" style="color: red;"></p>
                  <p id="V_city_name" style="color: red;"></p>
                  <p id="V_city_tel_code" style="color: red;"></p>

                  <div class="input-fields">  
                    <label>City Code</label> 
                    <input type="text" name="city_code" id="city_code" maxlength="5" placeholder="Enter Here City Code ">    
                  </div>
                   <div class="input-fields"> 
                    <label>City Name</label> 
                    <input type="text" name="city_name" id="city_name" maxlength="30" placeholder="Enter Here City Name"><span class="steric">*</span>    
                  </div>

                   <div class="input-fields"> 
                    <label>Country Name</label> 
                     <select name="country_name" id="country_name" class="country_name" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcountry = mysqli_query($con, "select * from country_setup");

                            while ($rowcountry = mysqli_fetch_array($selectcountry))
                            {
                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
                            }

                          ?>

                      </select><span class="steric">*</span>      
                  </div>

                  
                  <div class="input-fields">  
                    <label>City Telephone Code</label> 
                    <input type="text" name="city_tel_code" id="city_tel_code" maxlength="5" placeholder="Enter telephone code">    
                  </div>
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="status" id="status">    
                  </div>
                    <button type="submit" name="btnadd" onclick="FormValidation(); return false;">Submit</button>
                    <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="FormValidation2(); return false;">Add More</button>
                    <button type="submit" name="btnCancel" class="btnCancel" id="btnCancel" >Cancel</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
         <!-- Edit City Modal-->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit City Modal -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit City Details</h4>
                </div>
                <div class="modal-body">

                  <h4><label id="formSummary2" style="color: red;"></label></h4>
                  <p id="EV_city_codeV_p" style="color: red;"></p>
                  <p id="EV_city_nameV_p" style="color: red;"></p>
                  <p id="EV_city_tel_codeV_p" style="color: red;"></p>

                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="city_SrNoV" id="city_SrNoV" >
                       
                  </div>

                  <div class="input-fields">  
                    <label>City Code</label> 
                    <input type="text" name="city_codeV_p" id="city_codeV_p" maxlength="5" placeholder="Enter Here City Code !">    
                  </div>
                   <div class="input-fields"> 
                    <label>City Name</label> 
                    <input type="text" name="city_nameV_p" id="city_nameV_p" maxlength="30" placeholder="Enter Here City Name!"><span class="steric">*</span>    
                  </div>

                   <div class="input-fields"> 
                    <label>Country Name</label> 
                     <select name="country_nameV_p" id="country_nameV_p" class="country_nameV_p" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcountry = mysqli_query($con, "select * from country_setup");

                            while ($rowcountry = mysqli_fetch_array($selectcountry))
                            {
                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
                            }

                          ?>

                      </select><span class="steric">*</span>      
                  </div>

                  
                  <div class="input-fields">  
                    <label>City Telephone Code</label> 
                    <input type="text" name="city_tel_codeV_p" id="city_tel_codeV_p" maxlength="5" placeholder="Enter Here Telephone Code">
                  </div>
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="statusV_p" id="statusV_p" class="statusV_p">    
                  </div>

                  <button type="submit" name="btnedit2" onclick="FormValidation3(); return false;">Submit</button>
                  <!-- <button type="submit" name="btnedit1" >Submit</button> -->
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
      </div>

      <!-- Show Log Chain -->
      <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Show Log Chain -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Logs Details</h4>
                </div>

                  <table id="dpttable1" class="display nowrap no-footer" style="width:100%">
                     
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'City' ");

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
                

                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                   <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                  
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                   <th>City Code</th>
                                  <th>City Name</th>
                                  <th>Country Name</th>
                                  <th>City Tel.Code</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowCity= mysqli_fetch_array($selectCity))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowCity['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowCity['city_code']; ?></td>
                          <td><?php echo $rowCity['city_name']; ?></td>
                          <td><?php echo $rowCity['country_name']; ?></td>
                          <td><?php echo $rowCity['city_tel_code']; ?></td>
                          <td><?php echo $rowCity['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowCity['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                          <?php
                          if ($rowCity['status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteCity_Code.php?id=<?php echo $rowCity['SrNo']; ?>" >Deactive</td>
                          <?php
                          }
                          ?>
                          <?php
                          if ($rowCity['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteCity_CodeI.php?id=<?php echo $rowCity['SrNo']; ?>" >Active</td>
                          <?php
                          }
                          ?>
                        </tr>
                        <?php
                         }
                          ?>

                      </tbody>  
      </table>
      </form>    
    </div>
  
</div>



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
  $("#btnDelete_C1").click(function(){
    $("#deleteTable_C1").modal();
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
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_city.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#city_SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('#city_codeV_p').val(data.city_code);  
              $('#city_nameV_p').val(data.city_name);  
              $('#city_tel_codeV_p').val(data.city_tel_code);    

              var checkif = data.status;
              if (checkif == "Active") {
                 $('#statusV_p').attr("checked", true);
                 document.getElementByID("statusV_p").checked = true;
              }
              else
              {
                $('#statusV_p').attr("checked", false);
              }
             
               
         }
      });
    
});
</script>
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_city2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.country_nameV_p').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
              
         }
      });
    
});
</script>



<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deletedepartCode_U.php?dept_ID=<?php echo $dept_ID; ?>',
         type: 'GET',
         data: {id: id},
         error: function() {

            alert('Something is wrong');
         },
         success: function(data) { 
              $("#"+id).remove();
              $("#deleteTable_C2").modal('hide');
              alert('Running');
               
         }
      });
    
});
</script>

<script type="text/javascript">
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var city_code=document.getElementById('city_code').value;
      var city_name=document.getElementById('city_name').value;
      var country_name=document.getElementById('country_name').value;
      var city_tel_code=document.getElementById('city_tel_code').value;

      var summary = "Summary: ";

      if(city_code == "")
      {
          document.getElementById('city_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_code").innerHTML = "Code is required.";
      }
      if(city_code != "")
      {
          document.getElementById('city_code').style.borderColor = "white";
          document.getElementById("V_city_code").innerHTML = "";
      }

      if(city_name == "")
      {
          document.getElementById('city_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_name").innerHTML = "Name is required.";
      }
      if(city_name != "")
      {
          document.getElementById('city_name').style.borderColor = "white";
          document.getElementById("V_city_name").innerHTML = "";

        if (!regexp.test(city_name))
        {
          document.getElementById('city_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_name").innerHTML = "Only alphabets are allowed in City Name.";
        }
      }

      if(city_tel_code == "")
      {
          document.getElementById('city_tel_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_tel_code").innerHTML = "Telephone code is required.";
      }
      if(city_tel_code != "")
      {
          document.getElementById('city_tel_code').style.borderColor = "white";
          document.getElementById("V_city_tel_code").innerHTML = "";

        if (!regexp2.test(city_tel_code))
        {
          document.getElementById('city_tel_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_tel_code").innerHTML = "Only numbers are allowed in Telephone Code.";
        }
      }

      if (missingVal != 1)
      {
        document.getElementById('city_code').style.borderColor = "white";
        document.getElementById('city_name').style.borderColor = "white";
        document.getElementById('city_tel_code').style.borderColor = "white";
       
        $("#submitCity").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

<script type="text/javascript">
   function FormValidation3()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var city_codeV_p=document.getElementById('city_codeV_p').value;
      var city_nameV_p=document.getElementById('city_nameV_p').value;
      var country_nameV_p=document.getElementById('country_nameV_p').value;
      var city_tel_codeV_p=document.getElementById('city_tel_codeV_p').value;

      var summary = "Summary: ";

      if(city_codeV_p == "")
      {
          document.getElementById('city_codeV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_city_codeV_p").innerHTML = "Code is required.";
      }
      if(city_codeV_p != "")
      {
          document.getElementById('city_codeV_p').style.borderColor = "white";
          document.getElementById("EV_city_codeV_p").innerHTML = "";
      }

      if(city_nameV_p == "")
      {
          document.getElementById('city_nameV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_city_nameV_p").innerHTML = "Name is required.";
      }
      if(city_nameV_p != "")
      {
          document.getElementById('city_nameV_p').style.borderColor = "white";
          document.getElementById("EV_city_nameV_p").innerHTML = "";

        if (!regexp.test(city_nameV_p))
        {
          document.getElementById('city_nameV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_city_nameV_p").innerHTML = "Only alphabets are allowed in City Name.";
        }
      }

      if(city_tel_codeV_p == "")
      {
          document.getElementById('city_tel_codeV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_city_tel_codeV_p").innerHTML = "Telephone code is required.";
      }
      if(city_tel_codeV_p != "")
      {
          document.getElementById('city_tel_codeV_p').style.borderColor = "white";
          document.getElementById("EV_city_tel_codeV_p").innerHTML = "";

        if (!regexp2.test(city_tel_codeV_p))
        {
          document.getElementById('city_tel_codeV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_city_tel_codeV_p").innerHTML = "Only numbers are allowed in Telephone Code.";
        }
      }

      if (missingVal != 1)
      {
        document.getElementById('city_codeV_p').style.borderColor = "white";
        document.getElementById('city_nameV_p').style.borderColor = "white";
        document.getElementById('city_tel_codeV_p').style.borderColor = "white";
       
        $("#popupMEdit2").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary2").textContent="Error: ";
      }
      
  }
</script>

<script type="text/javascript">

 function addMore() {
  var city_code = document.getElementById("city_code").value;
  var city_name = document.getElementById("city_name").value;
  var country_name = document.getElementById("country_name").value;
  var city_tel_code = document.getElementById("city_tel_code").value;


      $.ajax({
         url:"addMoreCity.php",
         method:"GET",
         data:{city_code:city_code, city_name:city_name, country_name:country_name, city_tel_code:city_tel_code},
         dataType:"text",
         success: function(data) {
              
              alert("Done");
              document.getElementById("city_code").value = "";
              document.getElementById("city_name").value = "";
              document.getElementById("country_name").value = "";
              document.getElementById("city_tel_code").value = "";
             
            }
      });

  }

   function FormValidation2()
   {
    var regexp = /^[a-z\S, ]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var city_code=document.getElementById('city_code').value;
      var city_name=document.getElementById('city_name').value;
      var country_name=document.getElementById('country_name').value;
      var city_tel_code=document.getElementById('city_tel_code').value;

      var summary = "Summary: ";

      if(city_code == "")
      {
          document.getElementById('city_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_code").innerHTML = "Code is required.";
      }
      if(city_code != "")
      {
          document.getElementById('city_code').style.borderColor = "white";
          document.getElementById("V_city_code").innerHTML = "";
      }

      if(city_name == "")
      {
          document.getElementById('city_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_name").innerHTML = "Name is required.";
      }
      if(city_name != "")
      {
          document.getElementById('city_name').style.borderColor = "white";
          document.getElementById("V_city_name").innerHTML = "";

        if (!regexp.test(city_name))
        {
          document.getElementById('city_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_name").innerHTML = "Only alphabets are allowed in City Name.";
        }
      }

      if(city_tel_code == "")
      {
          document.getElementById('city_tel_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_tel_code").innerHTML = "Telephone code is required.";
      }
      if(city_tel_code != "")
      {
          document.getElementById('city_tel_code').style.borderColor = "white";
          document.getElementById("V_city_tel_code").innerHTML = "";

        if (!regexp2.test(city_tel_code))
        {
          document.getElementById('city_tel_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_city_tel_code").innerHTML = "Only numbers are allowed in Telephone Code.";
        }
      }

      if (missingVal != 1)
      {
        document.getElementById('city_code').style.borderColor = "white";
        document.getElementById('city_name').style.borderColor = "white";
        document.getElementById('city_tel_code').style.borderColor = "white";
       
        addMore();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
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
  function logUserFunc()
  {
  $("#logUser_Modal").modal();
  }
</script>




<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>