<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userNo = $_GET['id'];


$userID = $_SESSION['user'];
//login user
$loginUser= $_SESSION['user'];
// Today date func
$todayDate = date("Y-m-d");

$selectSrNo = mysqli_query($con, "SELECT * FROM sub_agents_parties_setup ORDER BY SrNo DESC LIMIT 1");
while ($rowSrNo = mysqli_fetch_array($selectSrNo))
{
  $SrNo = $rowSrNo['SrNo'];
 

}


// // fatch data in Sub Agent setup
//  $selectagent = mysqli_query($con, "select * from represent_setup where userNo='$userNo' ");


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
 
$expload = $userNo."-Sub";
// update query
   $updateQuery13 = mysqli_query($con, " UPDATE represent_setup SET userNo='$expload',rep_name='$rep_nameV',rep_desg='$rep_desgV',rep_office_no='$rep_office_noV',rep_phone_no='$rep_phone_noV',rep_email='$rep_emailV',status='$statusV' WHERE SrNo='$SrNoV'")or die(mysqli_error($con));

// msg Alert
    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: sub_agent_setup_Edit.php?id=".$userNo);
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

  $expload = $userNo."-Sub";
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into represent_setup(userNo,rep_name,rep_desg,rep_office_no,rep_phone_no,rep_email,status) values ('$expload','$rep_name','$rep_desg','$rep_office_no','$rep_phone_no','$rep_email','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: sub_agent_setup_Edit.php?id=" . $userNo);

}


// After Submit
//$empNo = $_GET['empNo'];

  // echo $user_id;
  $qry= "SELECT * FROM sub_agents_parties_setup WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {

      $SrNo = $row['SrNo'];
      $partyname_P = $row['partyname'];
      $subpartyname_P  = $row['subpartyname'];
      $address_P = $row['address'];
      $country_P = $row['country'];
      $city_P = $row['city'];
      $phone_P = $row['phone'];
      $fax_P  = $row['fax'];
      $email_P = $row['email'];
      $website_P = $row['website'];
      $export_reg_no_P = $row['export_reg_no'];
      $sales_tax_no_P = $row['sales_tax_no'];
      $ntn_no_P = $row['ntn_no'];
      $status_P = $row['status'];
    }



// update code and Query
if (isset($_POST['submitBtn'])) {
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

  // $updateQuery= mysqli_query($con, " UPDATE sub_agents_parties_setup SET partyname='$partyname',subpartyname='$subpartyname',address='$address',country='$country',city='$city',phone='$phone',fax='$fax',email='$email',website='$website',export_reg_no='$export_reg_no',sales_tax_no='$sale_tax',ntn_no='$ntn_no',status='$status' WHERE SrNo='$SrNo'");
 

  $clause = " WHERE SrNo='$SrNo'";
  $initQuery = "UPDATE sub_agents_parties_setup SET SrNo='$SrNo' ";

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

           // $initChangeLog = "UPDATE chainlog SET instance='$newID1',formName='$Agent',record_id='$',createBy='$createBy',createDate='$createDate',updateBy='$loginUser',updateDate='$todayDate',  "

          $initChangeLog = "INSERT INTO chainlog (instance, formName, record_id, createBy, createDate, updateBy, updateDate, perValue, newValue)";
          $initChangeLog .= " VALUES ('$newID1', 'SubAgent', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

          if ($partyname != $partyname_P)
          {
            $initQuery .= ", partyname='$partyname'";
            $initChangeLog2 = ", '$partyname_P', '$partyname') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($subpartyname != $subpartyname_P)
          {
            $initQuery .= ", subpartyname='$subpartyname'";
            $initChangeLog2 = ", '$subpartyname_P', '$subpartyname') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          
          
          if ($address != $address_P)
          {
            $initQuery .= ", address='$address'";
            $initChangeLog2 = ", '$address_P', '$address') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($country != $country_P)
          {
            $initQuery .= ", country='$country'";
            $initChangeLog2 = ", '$country_P', '$country') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($city != $city_P)
          {
            $initQuery .= ", city='$city'";
            $initChangeLog2 = ", '$city_P', '$city') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
           if ($phone != $phone_P)
          {
            $initQuery .= ", phone='$phone'";
            $initChangeLog2 = ", '$phone_P', '$phone') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($fax != $fax_P)
          {
            $initQuery .= ", fax='$fax'";
            $initChangeLog2 = ", '$fax_P', '$fax') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          
          if ($email != $email_P)
          {
            $initQuery .= ", email='$email'";
            $initChangeLog2 = ", '$email_P', '$email') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }

          if ($website != $website_P)
          {
            $initQuery .= ", website='$website'";
            $initChangeLog2 = ", '$website_P', '$website') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }

          if ($export_reg_no != $export_reg_no_P)
          {
            $initQuery .= ", export_reg_no='$export_reg_no'";
            $initChangeLog2 = ", '$export_reg_no_P', '$export_reg_no') ";
            
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($sales_tax_no != $sales_tax_no_P)
          {
            $initQuery .= ", sales_tax_no='$sales_tax_no'";
            $initChangeLog2 = ", '$sales_tax_no_P', '$sales_tax_no') ";

            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }
          if ($ntn_no != $ntn_no_P)
          {
            $initQuery .= ", ntn_no='$ntn_no'";
            $initChangeLog2 = ", '$ntn_no_P', '$ntn_no') ";
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

          }
     
          if ($status != $status_P)
          {
            $initQuery .= ", status='$status'";
            $initChangeLog2 = ", '$status_P', '$status') ";
            // <!-- qurey.. -->
          $finalChangeLog = $initChangeLog . $initChangeLog2 ;
          

          mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
          }

          $finalQuery = $initQuery . $clause;
          // echo $finalQuery . "<br>";

          mysqli_query($con, $finalQuery) or die(mysqli_error($con));

        

 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: sub_agent_setup_Edit.php?id=".$userNo);

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
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info">Setup</a>
          <a href="hr_add_emp_info.php" class="btn btn-info active">Sub Agents Setup Table</a>
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'SubAgent' ");

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
         <!-- Edit agents Modal-->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit agents Modal -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit agents Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV" >
                       
                  </div>
                  <div class="input-fields"> 
                 <label>Representative Name</label> 
                    <input type="text" name="rep_nameV" id="rep_nameV" class="rep_nameV" placeholder="Enter Here Party Nmae !">    
                  </div>
                   <div class="input-fields"> 
                    <label>Designation</label> 
                    <input type="text" name="rep_desgV" id="rep_desgV" class="rep_desgV" placeholder="Enter Here Sub Party Name!">    
                  </div>
                  
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="rep_office_noV" id="rep_office_noV" class="rep_office_noV" placeholder="Enter Here Phone Number !">    
                  </div>
                 
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="rep_phone_noV" id="rep_phone_noV" class="rep_phone_noV" placeholder="Enter Here Fax Number !">    
                  </div>
                  <div class="input-fields">  
                    <label>Email</label> 
                    <input type="text" name="rep_emailV" id="rep_emailV" class="rep_emailV" placeholder="Enter Here Email !">    
                  </div>
                 
                   <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="statusV" id="statusV" class="statusV" >    
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

      <div class="confirmTable-modal modal fade" id="deleteTable_C2" role="dialog">
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
        <p id="V_subpartyname" style="color: red;"></p>
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
                          <button type="button" id="btnConfirm_Su" onclick="FormValidation()" > <small>Submit</small></button>
                          <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                          <button type="button" name="cancel"> <small>Cancel</small></button>       
                      </div>
                              
                              <div class="cls"></div>

                       <div class="col-md-6">
                                                    

                                                     
                                                      
                                                      <div class="input-label"><label >Party Name</label></div>  
                                                      <div class="input-feild">
                                                             <select name="partyname" id="partyname" class="partyname" >
                                                  <!-- <option value="Select">Select </option> -->
                                                  <!-- Drop Down list Country Name -->
                                                  <?php

                                                    $selectcountry = mysqli_query($con, "select * from custmaster where SrNo='$partyname_P' ");

                                                    while ($rowcountry = mysqli_fetch_array($selectcountry))
                                                    {
                                                      echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['cmpTitle'].'</option>';
                                                    }

                                                  ?>
                                                   <?php

                                                      $selectSub = mysqli_query($con, "select * from custmaster");

                                                      while ($rowSub = mysqli_fetch_array($selectSub))
                                                      {
                                                        echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                                                      }
                                                    ?>

                                              </select> 
                                                      </div> 
                                                       <div class="input-label"><label >Sub Party Agent</label></div>
                                                      <div class="input-feild">
                                                              <input class="mini_input_field"  type="text" name="subpartyname" id="subpartyname" value="<?php echo $subpartyname_P ?>" placeholder="Enter Here Sub Party Nmae !">
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Country</label></div> 
                                             <div class="input-feild"> 
                                             <select name="country" id="country" class="country" >
                                                 
                                                  <!-- Drop Down list Country Name -->
                                                  <?php

                                                    $selectcountry = mysqli_query($con, "select * from country_setup where SrNo='$country_P' ");

                                                    while ($rowcountry = mysqli_fetch_array($selectcountry))
                                                    {
                                                      echo '<option value="'.$rowcountry['SrNo'].'">'.$rowcountry['country_name'].'</option>';
                                                    }

                                                  ?>
                                                  <?php

                                                    $selectcountry = mysqli_query($con, "select * from country_setup ");

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
                                               
                                                <!-- Drop Down list Country Name -->
                                                <?php

                                                  $selectcity = mysqli_query($con, "select * from city_setup where SrNo='$city_P'");

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

                                                      <div class="input-label"><label >Address</label></div>  
                                                      <div class="input-feild" >
                                                          <textarea name="address" id="address"><?php echo $address_P ?></textarea>
                                                      </div>                                                                  
                               </div>

                      <div class="col-md-6">
                                                      
                                                      <div class="input-label"><label >Contact No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="phone" id="phone" value="<?php echo $phone_P ?>" >
                                                                
                                                      </div>
                                                      
                                                      <div class="input-label"><label >Fax No.</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="fax" id="fax" value="<?php echo $fax_P ?>">
                                                                
                                                      </div>

                                                      <div class="input-label"><label >Email</label></div>
                                                      <div class="input-feild">
                                                              <input class=""  type="text" name="email" id="email" value="<?php echo $email_P ?>">
                                                                
                                                      </div>   
                                                      <div class="input-label"><label >Website</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="website" id="website" value="<?php echo $website_P ?>">
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Export No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="export_reg_no" id="export_reg_no" value="<?php echo $export_reg_no_P ?>" >
                                                             
                                                      </div>
                                                      <div class="input-label"><label >Sales Tax No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="sales_tax_no" id="sales_tax_no" value="<?php echo $sales_tax_no_P ?>" >
                                                             
                                                      </div>                                      
                                                       <div class="input-label"><label >NTN No.</label></div> 
                                                      <div class="input-feild">
                                                            <input type="text" name="ntn_no" id="ntn_no" value="<?php echo $ntn_no_P ?>">
                                                             
                                                      </div>

                                                       <div class="input-label"><label>Active</label></div> 
                                                       <div class="input-feild"> 
                                                       <input type="checkbox"  name="status" id="status" value="<?php echo $status_P ?>" >
                                                       </div>
                              </div>                
                </div>      
                        <div class="cls"></div>
                        <hr>

               
    <div id="representative" class="tab-pane fade in ">

                 


              <div class="col-md-12">  
                <div class="leave-manage-sec-table widget_iner_box ">
                  <div class="form_sec_action_btn col-md-12">
                    <button type="button" id="myBtn">  <small>Add Representative</small></button>
                  </div>

                      <div class="tbleDrpdown">
                        <div id="tblebtn">
                          <ul>
                              <!-- <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                              <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li> -->
                              <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="airport_print.php" target="_blank"> Print</a></button></li>
                              <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li> -->
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
                                       $expload = $userNo."-Sub";
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
      var subpartyname=document.getElementById('subpartyname').value;
     var email=document.getElementById('email').value;
     
     
      var summary = "Summary: ";

      if(partyname == "")
      {
          document.getElementById('partyname').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_partyname").innerHTML = "Party Name is required.";
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
          // summary += "Firstname is required.";
          document.getElementById("V_subpartyname").innerHTML = "Sub Agent is required.";
      }
      if(subpartyname != "")
      {
          document.getElementById('subpartyname').style.borderColor = "white";
          document.getElementById("V_subpartyname").innerHTML = "";

         
      }

     if(email == "")
      {
          document.getElementById('email').style.borderColor = "red";
          missingVal = 1;
          // summary += " Contact number required.";
          document.getElementById("V_email").innerHTML = "Email is required.";
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
        document.getElementById('partyname').style.borderColor = "white";
        document.getElementById('subpartyname').style.borderColor = "white";
        document.getElementById('email').style.borderColor = "white";
       
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
               $('#rep_emailV').val(data.rep_email);  

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



<!-- java script -->
<script type="text/javascript">
function logUserFunc()
{
  $("#logUser_Modal").modal();
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



<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>