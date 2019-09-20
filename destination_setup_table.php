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
$selectSrNo = mysqli_query($con, "SELECT * FROM pro_setup_commodity ORDER BY SrNo DESC LIMIT 1");
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
$selectSrNo = mysqli_query($con, "SELECT * FROM pro_setup_commodity ORDER BY SrNo DESC LIMIT 1");
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




$selectreg = mysqli_query($con, "select * from destination_setup ");

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM destination_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE destination_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: destination_setup_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM destination_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE destination_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: destination_setup_table.php");
  }
}


if(isset($_POST['btnedit1']))
{
  $dest_SrNoV = $_POST['dest_SrNoV'];
  $dest_sectorV_n = $_POST['dest_sectorV_p'];
  $dest_codeV_n = $_POST['dest_codeV_p'];
  $dest_nameV_n = $_POST['dest_nameV_p'];
  $dest_countryV_n = $_POST['dest_countryV_p'];
  if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }

   $clause = " WHERE SrNo='$dest_SrNoV'";
  $initQuery = "UPDATE destination_setup SET SrNo='$dest_SrNoV' ";

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
  $initChangeLog .= " VALUES ('$newID1', 'Destination', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

  if ($dest_codeV_n != $dest_codeV_p)
  {
    $initQuery .= ", dest_code='$dest_codeV_n'";
    $initChangeLog2 = ", '$dest_codeV_p', '$dest_codeV_n') ";
  }

   if ($dest_nameV_n != $dest_nameV_p)
  {
    $initQuery .= ", dest_name='$dest_nameV_n'";
    $initChangeLog2 = ", '$dest_nameV_p', '$dest_nameV_n') ";
  }

  if ($dest_sectorV_n != $dest_sectorV_p)
  {
    $initQuery .= ", dest_sector='$dest_sectorV_n'";
    $initChangeLog2 = ", '$dest_sectorV_p', '$dest_sectorV_n') ";
  }

  if ($dest_countryV_n != $dest_countryV_p)
  {
    $initQuery .= ", dest_country='$dest_countryV_n'";
    $initChangeLog2 = ", '$dest_countryV_p', '$dest_countryV_n') ";
  }

  $finalQuery = $initQuery . $clause;
  // echo $finalQuery . "<br>";

  mysqli_query($con, $finalQuery) or die(mysqli_error($con));

  $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

  // $updateQuery12 = mysqli_query($con, "UPDATE destination_setup SET dest_code='$dest_codeV', dest_name='$dest_nameV',dest_sector='$dest_sectorV',dest_country='$dest_countryV',status='$statusV' WHERE SrNo='$dest_SrNoV' ") or die(mysqli_error($con));

  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: destination_setup_table.php");
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
    header("Location: dest_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("dest_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("dest_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

if (isset($_POST['btnadd'])) {

  $instance =$instance;
  $record_id =$SrNo1;
  $createBy =$loginUser;
  $createDate =$todayDate;
  $dest_code=$_POST['dest_code'];
  $dest_name=$_POST['dest_name'];
  $dest_country = $_POST['dest_country'];
  $dest_sector = $_POST['dest_sector'];
  if (isset($_POST['status'])) {
    $status='Active';
  }
  else
  {
    $status='Deactive';
  }

 $insertQuery = mysqli_query($con, "insert into destination_setup (dest_code,dest_name,dest_sector,dest_country,status) values ('$dest_code','$dest_name','$dest_sector','$dest_country','$status')");

 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Destination', '$SrNo1', '$loginUser1', '$todayDate1') ");

 $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);
 
 header("Location: destination_setup_table.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Destination Setup Table</title>
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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">Setup</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Destination Setup Table</a>
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
              <h4>Destination Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
         
          <button type="button" id="myBtn">  <small>Add Destination</small></button>
          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
      </div>
         
       <!-- For Validation Box Red Popup -->
         <h4><label id="formSummary" style="color: red;"></label></h4>
         <p id="V_dest_code" style="color: red;"></p>
         <p id="V_dest_name" style="color: red;"></p>
         <p id="V_dest_country" style="color: red;"></p>


      <!-- Add Destination -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Destination-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Destination Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields"> 
                    <label>Destination Code</label> 
                    <input type="text" name="dest_code" id="dest_code" maxlength="5" placeholder="Enter Here Region Code!"><span class="steric">*</span>    
                  </div>
                   <div class="input-fields"> 
                    <label>Destination Name</label> 
                    <input type="text" name="dest_name" id="dest_name" maxlength="40" placeholder="Enter Here Region Code!"><span class="steric">*</span>    
                  </div>
                  <div class="input-fields">  
                    <label>Sector Name</label>
                      <select name="dest_sector" id="dest_sector" class="dest_sector" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectsector = mysqli_query($con, "select * from sector_setup");

                            while ($rowsector = mysqli_fetch_array($selectsector))
                            {
                              echo '<option value="'.$rowsector['sector_name'].'">'.$rowsector['sector_name'].'</option>';
                            }

                          ?>

                      </select>  
                  </div>
                  <div class="input-fields">  
                    <label>Destination Country</label>
                      <select name="dest_country" id="dest_country" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectcountry = mysqli_query($con, "select * from country_setup");

                            while ($rowcountry = mysqli_fetch_array($selectcountry))
                            {
                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
                            }

                          ?>

                      </select><span class="steric">*</span>  
                  </div>
                  <div>
                     <label>Active</label> 
                    <input type="checkbox" name="status" id="status" checked> 
                  </div>
                  <button type="submit" name="btnadd">Submit</button>
                  <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="addMore(); return false;">Add More</button>
                  <button type="submit" name="btnCancel" class="btnCancel" id="btnCancel" >Cancel</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
         <!-- Edit Destination -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Destination-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Destination</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>Destination SrNo</label> 
                    <input type="text" name="dest_SrNoV" id="dest_SrNoV" >
                       
                  </div>
                   <div class="input-fields"> 
                    <label>Destination Code</label> 
                    <input type="text" name="dest_codeV_p" id="dest_codeV_p" class="dest_codeV_p" maxlength="5" ><span class="steric">*</span>
                       
                  </div>

                  <div class="input-fields">  
                    <label>Destination Name</label> 
                    <input type="text" name="dest_nameV_p" id="dest_nameV_p" class="dest_nameV_p" maxlength="40" ><span class="steric">*</span>   
                  </div>
                  <div class="input-fields">  
                     <label>Sector</label>  
                      <select name="dest_sectorV_p" id="dest_sectorV_p" class="dest_sectorV_p">
                          <?php

                            $selectsector = mysqli_query($con, "select * from sector_setup");

                            while ($rowsector = mysqli_fetch_array($selectsector))
                            {
                              echo '<option value="'.$rowsector['sector_name'].'">'.$rowsector['sector_name'].'</option>';
                            }

                          ?>
                         

                      </select>  
                  </div>
                  <div class="input-fields">  
                     <label>Destination Country</label>  
                      <select name="dest_countryV_p" id="dest_countryV_p" class="dest_countryV_p">
                          <?php

                            $selectcountry = mysqli_query($con, "select * from country_setup");

                            while ($rowcountry = mysqli_fetch_array($selectcountry))
                            {
                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
                            }

                          ?>
                      </select><span class="steric">*</span>  
                  </div>
                  <div>
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

       <div class="confirmTable-modal modal fade" id="deleteTable_C1" role="dialog">
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
                        <button type="submit" name="btnDelete1">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
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
                  <h4 class="modal-title">Log Chain Details</h4>
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Destination' ");

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

      <div class="leave-manage-sec-table widget_iner_box ">

        <div class="tbleDrpdown">
         <div id="tblebtn">
            <ul>
              <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i>  Activate</button></li>
               <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Deactivate</button></li>
              <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="dest_print.php" target="_blank"> Print</a></button></li>
              <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
            </ul>
          </div>
        </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                        <tr>
                          <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                          <th>Destination Code</th>
                          <th>Destination Name</th>
                          <th>Sector</th>
                          <th>Destination Country</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Action</th>
                         </tr>
                        </thead>
                        <tbody>
                          
                        <?php

                        while ($rowdest= mysqli_fetch_array($selectreg))
                        {
                        ?>

                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowdest['dest_code'] .' " /></td>'; ?>
                          <td><?php echo $rowdest['dest_code']; ?></td>
                          <td><?php echo $rowdest['dest_name']; ?></td>
                          <td><?php echo $rowdest['dest_sector']; ?></td>
                          <td><?php echo $rowdest['dest_country']; ?></td>
                          <td><?php echo $rowdest['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowdest['dest_code']; ?>" data-target="#btn1" >Edit</td> 

                          <?php
                          if ($rowdest['status'] == "Active")
                          {
                          ?>
                          <td><a href="deletedest_Code.php?id=<?php echo $rowdest['dest_code']; ?>" >Deactive</td>
                          <?php
                          }
                          ?>

                          <?php
                          if ($rowdest['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deletedest_CodeI.php?id=<?php echo $rowdest['dest_code']; ?>" >Active</td>
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
         url:"fatch_dest.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#dest_SrNoV').val(data.SrNo);  
              $('#dest_codeV_p').val(data.dest_code);  
              $('#dest_nameV_p').val(data.dest_name);  
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
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_dest2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.dest_countryV_p').html(data);  
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
         url:"fatch_dest3.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.dest_sectorV_p').html(data);  
              /*$('#employee_id').val(data.id); */
              // $("#"+id).btnedit1();
              // $("#btn1").modal('hide');
              // alert('Running');
               
         }
      });
    
});
</script>

<script type="text/javascript">
  function addMore() {
  var dest_code = document.getElementById("dest_code").value;
  var dest_name = document.getElementById("dest_name").value;
  var dest_sector = document.getElementById("dest_sector").value;
  var dest_country = document.getElementById("dest_country").value;

      $.ajax({
         url:"addMoreDest.php",
         method:"GET",
         data:{dest_code:dest_code, dest_name:dest_name, dest_sector:dest_sector, dest_country:dest_country},
         dataType:"text",
         success: function(data) {
              
              alert("Done");
              document.getElementById("dest_code").value = "";
              document.getElementById("dest_name").value = "";
              document.getElementById("dest_sector").value = "";
              document.getElementById("dest_country").value = "";
            }
      });

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
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var dest_code=document.getElementById('dest_code').value;
      var dest_name=document.getElementById('dest_name').value;
      var dest_country=document.getElementById('dest_country').value;
     
     
      var summary = "Summary: ";

      if(dest_code == "")
      {
          document.getElementById('dest_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_dest_code").innerHTML = "Commodity Code is required.";
      }
      if(dest_code != "")
      {
          document.getElementById('dest_code').style.borderColor = "white";
          document.getElementById("V_dest_code").innerHTML = "";

      }

      
      if(dest_name == "")
      {
          document.getElementById('dest_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_dest_name").innerHTML = "Commodity Code is required.";
      }
      if(dest_name != "")
      {
          document.getElementById('dest_name').style.borderColor = "white";
          document.getElementById("V_dest_name").innerHTML = "";

      }

      
      
      if(dest_country == "")
      {
          document.getElementById('dest_country').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_dest_country").innerHTML = "Commodity Code is required.";
      }
      if(dest_country != "")
      {
          document.getElementById('dest_country').style.borderColor = "white";
          document.getElementById("V_dest_country").innerHTML = "";

      }
      
      if (missingVal != 1)
      {
        document.getElementById('dest_code').style.borderColor = "white";
        document.getElementById('dest_name').style.borderColor = "white";
        document.getElementById('dest_country').style.borderColor = "white";
       
        $("#popupMEdit").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
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