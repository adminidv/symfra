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
$selectSrNo = mysqli_query($con, "SELECT * FROM sector_setup ORDER BY SrNo DESC LIMIT 1");
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
$selectSrNo = mysqli_query($con, "SELECT * FROM sector_setup ORDER BY SrNo DESC LIMIT 1");
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

// fetch data in sector setup
 $selectsector = mysqli_query($con, "select * from  sector_setup ");


// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM sector_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE sector_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: sector_setup.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM sector_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE sector_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: sector_setup.php");
  }
}

if(isset($_POST['btnedit1']))
{

  $sector_SrNoV = $_POST['sector_SrNoV'];
  $sector_nameV_n = $_POST['sector_nameV_p'];
  if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }



  $selectPrev = mysqli_query($con, "SELECT * FROM sector_setup WHERE SrNo='$sector_SrNoV' ");
  while ($rowPrev = mysqli_fetch_array($selectPrev))
  {
    $sector_nameV_p = $rowPrev['sector_name'];
    $statusV_p = $rowPrev['status'];
  }

  
  $clause = " WHERE SrNo='$sector_SrNoV'";
  $initQuery = "UPDATE sector_setup SET SrNo='$sector_SrNoV' ";

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
  $initChangeLog .= " VALUES ('$newID1', 'Sector', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

  if ($sector_nameV_n != $sector_nameV_p)
  {
    $initQuery .= ", sector_name='$sector_nameV_n'";
    $initChangeLog2 = ", '$sector_nameV_p', '$sector_nameV_n') ";
  }

  //  if ($pro_descriptionV_n != $pro_descriptionV_p)
  // {
  //   $initQuery .= ", pro_description='$pro_descriptionV_n'";
  //   $initChangeLog2 = ", '$pro_descriptionV_p', '$pro_descriptionV_n') ";
  // }

  $finalQuery = $initQuery . $clause;
  // echo $finalQuery . "<br>";

  mysqli_query($con, $finalQuery) or die(mysqli_error($con));

  $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));


   // $updateQuery12 = mysqli_query($con, "UPDATE sector_setup SET sector_name='$sector_nameV_p', status='$statusV' WHERE SrNo='$sector_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: sector_setup.php");
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
    header("Location: sector_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sector_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sector_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}



if (isset($_POST['btnadd'])) {

  $instance =$instance;
  $record_id =$SrNo1;
  $createBy =$loginUser;
  $createDate =$todayDate;
  $sector_name=$_POST['sector_name'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
 

 $insertQuery = mysqli_query($con, "insert into sector_setup (sector_name, status) values ('$sector_name', '$status')");

 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Sector', '$SrNo1', '$loginUser1', '$todayDate1') ");
 
 header("Location: sector_setup.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sector Setup Table</title>
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
          <a href="sector_setup.php" class="btn btn-info active">Sector Setup Table</a>
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
              <h4>Sector Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
         
          <button type="button" id="myBtn">  <small>Add Sector</small></button>
          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Change Logs</small></button>
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
                          <button type="submit" name="btnadd">Yes</button>
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
               <div class="modal fade confirmTable-modal" id="popupMEdit3" role="dialog">
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
         

      <!-- Add Sector -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Sector-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sector Details</h4>
                </div>
                <div class="modal-body">

                   <!-- For Validation Box Red Popup -->
         <h4><label id="formSummary" style="color: red;"></label></h4>
       <p id="V_sector_name" style="color: red;"></p>

                   <div class="input-fields"> 
                    <label>Sector Name</label> 
                    <input type="text" name="sector_name" id="sector_name" maxlength="30" placeholder="Enter Here Sector Name!" maxlength="30" ><span class="steric">*</span>     
                  </div>

                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="status" id="status" >    
                  </div>
                   <button type="submit" name="btnadd1" onclick="FormValidation(); return false;">Submit</button>
                  <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="FormValidation2(); return false;">Add More</button>

                   <!-- <button type="submit" name="btnadd" onclick="FormValidation()" >Submit</button>

                  <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="FormValidation()" onclick="addMore(); return false;">Add More</button> -->
                  <button type="submit" name="btnCancel" class="btnCancel" id="btnCancel" >Cancel</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
         <!-- edit Sector -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- edit Sector-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Sector</h4>
                </div>
                <div class="modal-body">

                  <!-- For Validation Box Red Popup -->
         <h4><label id="formSummary2" style="color: red;"></label></h4>
       <p id="EV_sector_nameV_p" style="color: red;"></p>

                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="sector_SrNoV" id="sector_SrNoV" >
                       
                  </div>
                   <div class="input-fields"> 
                    <label>Sector Name</label> 
                    <input type="text" name="sector_nameV_p" id="sector_nameV_p" class="sector_nameV_p" maxlength="30" ><span class="steric">*</span>
                       
                  </div>

                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="statusV" id="statusV" >   
                  </div>
                  <button type="submit" name="btnedit2" onclick="FormValidation3(); return false;">Submit</button>
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Sector' ");

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
                  
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Sector Name</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowsector= mysqli_fetch_array($selectsector))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowsector['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowsector['sector_name']; ?></td>
                          <td><?php echo $rowsector['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowsector['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                          <?php
                          if ($rowsector['status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteSec_Code.php?id=<?php echo $rowsector['SrNo']; ?>" >Deactivate</td>
                          <?php
                          }
                          ?>

                          <?php
                          if ($rowsector['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteSec_CodeI.php?id=<?php echo $rowsector['SrNo']; ?>" >Activate</td>
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
         url:"fatch_sector.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#sector_SrNoV').val(data.SrNo); 
              $('#sector_nameV_p').val(data.sector_name);
               
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




<!-- addmore ajaxpopup -->

<script type="text/javascript">
  function addMore() {
  var sector_name = document.getElementById("sector_name").value;

      $.ajax({
         url:"addMoreSector.php",
         method:"GET",
         data:{sector_name:sector_name},
         dataType:"text",
         success: function(data) {
              
              alert("Done");
              document.getElementById("sector_name").value = "";
             
            }
      });

  }

   function FormValidation2()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var sector_name=document.getElementById('sector_name').value;
     
     
      var summary = "Summary: ";

      if(sector_name == "")
      {
          document.getElementById('sector_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_sector_name").innerHTML = "Sector Name is required.";
      }
      if(sector_name != "")
      {
          document.getElementById('sector_name').style.borderColor = "white";
          document.getElementById("V_sector_name").innerHTML = "";

      }

      
     

      
      
      if (missingVal != 1)
      {
        document.getElementById('sector_name').style.borderColor = "white";
       
        addMore();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

<!-- addmore ajaxpopup -->




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

      var sector_name=document.getElementById('sector_name').value;
     
     
      var summary = "Summary: ";

      if(sector_name == "")
      {
          document.getElementById('sector_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_sector_name").innerHTML = "Sector Name is required.";
      }
      if(sector_name != "")
      {
          document.getElementById('sector_name').style.borderColor = "white";
          document.getElementById("V_sector_name").innerHTML = "";

      }

      
     

      
      
      if (missingVal != 1)
      {
        document.getElementById('sector_name').style.borderColor = "white";
       
        $("#popupMEdit2").modal();
        
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

      var sector_nameV_p=document.getElementById('sector_nameV_p').value;
     
     
      var summary = "Summary: ";

      if(sector_nameV_p == "")
      {
          document.getElementById('sector_nameV_p').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("EV_sector_nameV_p").innerHTML = "Sector Name is required.";
      }
      if(sector_nameV_p != "")
      {
          document.getElementById('sector_nameV_p').style.borderColor = "white";
          document.getElementById("EV_sector_nameV_p").innerHTML = "";

      }

      if (missingVal != 1)
      {
        document.getElementById('sector_nameV_p').style.borderColor = "white";
       
        $("#popupMEdit3").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary2").textContent="Error: ";
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