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


// fetch data pro_setup_commodity
$selectpros = mysqli_query($con, "select * from pro_setup_commodity ");

 // multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM pro_setup_commodity WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['pro_active_status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE pro_setup_commodity SET pro_active_status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: pro_setup_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM pro_setup_commodity WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['pro_active_status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE pro_setup_commodity SET pro_active_status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: pro_setup_table.php");
  }
}


// Edit btn click event
if(isset($_POST['btnedit1']))
{

  $pro_SrNoV = $_POST['pro_SrNoV'];
  $pro_nameV_n = $_POST['pro_nameV_p'];
  $pro_descriptionV_n = $_POST['pro_descriptionV_p'];

  if (isset($_POST['pro_active_statusV'])) {
    $pro_active_statusV='Active';

  }
  else
  {
    $pro_active_statusV='Deactive';
  }

  $clause = " WHERE SrNo='$pro_SrNoV'";
  $initQuery = "UPDATE pro_setup_commodity SET SrNo='$pro_SrNoV' ";

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
  $initChangeLog .= " VALUES ('$newID1', 'Commodity', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

  if ($pro_nameV_n != $pro_nameV_p)
  {
    $initQuery .= ", pro_name='$pro_nameV_n'";
    $initChangeLog2 = ", '$pro_nameV_p', '$pro_nameV_n') ";
  }

   if ($pro_descriptionV_n != $pro_descriptionV_p)
  {
    $initQuery .= ", pro_description='$pro_descriptionV_n'";
    $initChangeLog2 = ", '$pro_descriptionV_p', '$pro_descriptionV_n') ";
  }

  $finalQuery = $initQuery . $clause;
  // echo $finalQuery . "<br>";

  mysqli_query($con, $finalQuery) or die(mysqli_error($con));

  $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));
   // $updateQuery12 = mysqli_query($con, "UPDATE pro_setup_commodity SET pro_name='$pro_nameV', pro_description='$pro_descriptionV', pro_active_status='$pro_active_statusV' WHERE SrNo='$pro_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: pro_setup_table.php");
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
    header("Location: pro_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pro_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pro_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}


// Add btn click event
if (isset($_POST['submitBtn'])) {
   $instance =$instance;
  $record_id =$SrNo1;
  $createBy =$loginUser;
  $createDate =$todayDate;
  $pro_description=$_POST['pro_description'];
  $pro_name=$_POST['pro_name'];

  if (isset($_POST['pro_active_status'])) {
    $pro_active_status='Active';

  }
  else
  {
    $pro_active_status='Deactive';
  }

 $insertQuery = mysqli_query($con, "insert into pro_setup_commodity (pro_name, pro_description, pro_active_status) values ('$pro_name', '$pro_description', '$pro_active_status')");

 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Commodity', '$SrNo1', '$loginUser1', '$todayDate1') ");
 
 header("Location: pro_setup_table.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Commodity Setup Table</title>
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
          <a href="pro_setup_table.php" class="btn btn-info active">Commodity Setup</a>
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
               <div class="modal fade confirmTable-modal" id="submitComm" role="dialog">
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
  

      <div class="form_sec_action_btn col-md-12">
         <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
         </div>
          
      </div>

      <div class="col-md-12">
            <div class="user_table-title">
              <h4>Commodity Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
         
          <button type="button" id="myBtn"><small>Add Commodity</small></button>
          <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
      </div>

      <!-- Add Commodity -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Commodity-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Commodity Details</h4>
                </div>

                <div class="modal-body">

                  <h4><label id="formSummary" style="color: red;"></label></h4>
                  <p id="V_pro_name" style="color: red;"></p>
                  <p id="V_pro_description" style="color: red;"></p>

                   <div class="input-fields"> 
                    <label>Commodity Code</label> 
                    <input type="text" name="pro_name" id="pro_name" maxlength="10" required placeholder="Enter Commodity Code"><span class="steric">*</span>    
                  </div>

                  <div class="input-fields">  
                    <label>Commodity Description</label> 
                    <input type="text" name="pro_description" id="pro_description" maxlength="100" placeholder="Enter Commodity description"><span class="steric">*</span>    
                  </div>

                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="pro_active_status" id="pro_active_status">    
                  </div>
                  
                   <button type="submit" name="btnadd" onclick="FormValidation(); return false;"  >Submit</button>
                  <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="FormValidation2(); return false;"  >Add More</button>

                 <!--  <button type="submit" name="btnadd"  onclick="FormValidation()">Submit</button>
                  <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="addMore(); return false;"  onclick="FormValidation()">Add More</button> -->
                  <button type="submit" name="btnCancel" class="btnCancel" id="btnCancel" >Cancel</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
         <!-- edit Commodity -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- edit Commodity-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Commodity</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="pro_SrNoV" id="pro_SrNoV" >
                       
                  </div>
                   <div class="input-fields"> 
                    <label>Commodity Code</label> 
                    <input type="text" name="pro_nameV_p" id="pro_nameV_p" maxlength="10" placeholder="Enter Commodity Code" ><span class="steric">*</span>
                       
                  </div>

                  <div class="input-fields">  
                    <label>Production Description</label> 
                    <input type="text" name="pro_descriptionV_p" id="pro_descriptionV_p" maxlength="100"  placeholder="Enter Commodity description "><span class="steric">*</span>   
                  </div>

                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="pro_active_statusV" id="pro_active_statusV" >   
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

      <!-- Deactive popup model confirmation -->
      <div class="confirmTable-modal modal fade" id="deleteTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Deactive selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDelete">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
      </div>

      <!-- Active popup model confirmation -->
      <div class="confirmTable-modal modal fade" id="deleteTable_C1" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to Active selected records?</p>
                            
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Commodity' ");

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
                

                  <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i>Activate</button></li>
                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>Deactivate</button></li>
                  
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Commodity Name</th>
                                  <th>Commodity Description</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowpro= mysqli_fetch_array($selectpros))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowpro['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowpro['pro_name']; ?></td>
                          <td><?php echo $rowpro['pro_description']; ?></td>
                          <td><?php echo $rowpro['pro_active_status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowpro['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                           <?php
                          if ($rowpro['pro_active_status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteComm_Code.php?id=<?php echo $rowpro['SrNo']; ?>" >Deactive</td>
                          <?php
                          }
                          ?>
                          <?php
                          if ($rowpro['pro_active_status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteComm_CodeI.php?id=<?php echo $rowpro['SrNo']; ?>" >Active</td>
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
         url:"fatch_pro.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#pro_SrNoV').val(data.SrNo);  
              $('#pro_descriptionV_p').val(data.pro_description);  
              $('#pro_nameV_p').val(data.pro_name);  
              // $('#pro_active_statusV').val(data.pro_active_status); 
              var checkif = data.pro_active_status;
              if (checkif == "Active") {
                 $('#pro_active_statusV').attr("checked", true);
                 document.getElementByID("pro_active_statusV").checked = true;
              }
              else
              {
                $('#pro_active_statusV').attr("checked", false);
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

      var pro_name=document.getElementById('pro_name').value;
      var pro_description=document.getElementById('pro_description').value;

      var summary = "Summary: ";

      if(pro_name == "")
      {
          document.getElementById('pro_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pro_name").innerHTML = "Code is required.";
      }
      if(pro_name != "")
      {
          document.getElementById('pro_name').style.borderColor = "white";
          document.getElementById("V_pro_name").innerHTML = "";
      }

      if(pro_description == "")
      {
          document.getElementById('pro_description').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pro_description").innerHTML = "Description is required.";
      }
      if(pro_description != "")
      {
          document.getElementById('pro_description').style.borderColor = "white";
          document.getElementById("V_pro_description").innerHTML = "";
      }

      if (missingVal != 1)
      {
        document.getElementById('pro_name').style.borderColor = "white";
        document.getElementById('pro_description').style.borderColor = "white";
       
        $("#submitComm").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

<script type="text/javascript">

  function addMore() {
  var pro_name = document.getElementById("pro_name").value;
  var pro_description = document.getElementById("pro_description").value;

      $.ajax({
         url:"addMoreProComdty.php",
         method:"GET",
         data:{pro_name:pro_name, pro_description:pro_description},
         dataType:"text",
         success: function(data) {
              
              alert("Done");
              document.getElementById("pro_name").value = "";
              document.getElementById("pro_description").value = "";
             
            }
      });

  }

   function FormValidation2()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var pro_name=document.getElementById('pro_name').value;
      var pro_description=document.getElementById('pro_description').value;

      var summary = "Summary: ";

      if(pro_name == "")
      {
          document.getElementById('pro_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pro_name").innerHTML = "Code is required.";
      }
      if(pro_name != "")
      {
          document.getElementById('pro_name').style.borderColor = "white";
          document.getElementById("V_pro_name").innerHTML = "";
      }

      if(pro_description == "")
      {
          document.getElementById('pro_description').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pro_description").innerHTML = "Description is required.";
      }
      if(pro_description != "")
      {
          document.getElementById('pro_description').style.borderColor = "white";
          document.getElementById("V_pro_description").innerHTML = "";
      }

      if (missingVal != 1)
      {
        document.getElementById('pro_name').style.borderColor = "white";
        document.getElementById('pro_description').style.borderColor = "white";
       
        addMore();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>


<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>