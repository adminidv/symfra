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
$selectSrNo = mysqli_query($con, "SELECT * FROM unit ORDER BY SrNo DESC LIMIT 1");
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
$selectSrNo = mysqli_query($con, "SELECT * FROM unit ORDER BY SrNo DESC LIMIT 1");
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

// fatch data in signatory table
 $selectsig = mysqli_query($con, "select * from  unit ");

// multi Actived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM unit WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE unit SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: unit_measur.php");
}

}
    // multi Deactived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM unit WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE unit SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: unit_measur.php");
  }
}

// Edit btn click event
if(isset($_POST['btnedit1']))
{
  
  $SrNoV = $_POST['SrNoV'];
  $titleV_n = $_POST['titleV_p'];
  if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }

  $clause = " WHERE SrNo='$SrNoV'";
  $initQuery = "UPDATE unit SET SrNo='$SrNoV' ";

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
  $initChangeLog .= " VALUES ('$newID1', 'Unit', '$SrNo', '$createBy', '$createDate', '$loginUser', '$todayDate'";

  if ($titleV_n != $titleV_p)
  {
    $initQuery .= ", title='$titleV_n'";
    $initChangeLog2 = ", '$titleV_p', '$titleV_n') ";
  }

  
  $finalQuery = $initQuery . $clause;
  // echo $finalQuery . "<br>";

  mysqli_query($con, $finalQuery) or die(mysqli_error($con));

  $finalChangeLog = $initChangeLog . $initChangeLog2;
  // echo $finalChangeLog;

  mysqli_query($con, $finalChangeLog) or die(mysqli_error($con));

   // $updateQuery12 = mysqli_query($con, "UPDATE unit SET  title='$titleV', status='$statusV' WHERE SrNo='$SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: unit_measur.php");
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
    header("Location: sig_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sig_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("sig_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

// 

if (isset($_POST['btnadd'])) {

   $instance =$instance;
  $record_id =$SrNo1;
  $createBy =$loginUser;
  $createDate =$todayDate;
  $title=$_POST['title'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

 $insertQuery = mysqli_query($con, "insert into unit (title,status) values ('$title','$status')");

 $insertQuery2 = mysqli_query($con, "insert into chainlog (instance, formName, record_id,createBy, createDate) values ('$newID1', 'Unit', '$SrNo1', '$loginUser1', '$todayDate1') ");
 
 header("Location: unit_measur.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Unit Setup Table</title>
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
          <a href="hr_add_emp_info.php" class="btn btn-info active">Unit Setup Table</a>
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
              <h4>Unit Setup Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
         
          <button type="button" id="myBtn">  <small>Add Unit measurement</small></button>
      <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
      </div>

      
         
        <!-- For Validation Box Red Popup -->
         <h4><label id="formSummary" style="color: red;"></label></h4>
       <p id="V_title" style="color: red;"></p>

      <!-- Add Signatory Detail Modal -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Signatory-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Unit Details</h4>
                </div>
                 <div class="modal-body">
                  <div class="input-fields">  
                    <label>Title</label> 
                    <input type="text" name="title" id="title" class="title" placeholder="Enter Here Signatory Name !">    
                  </div>
                  
                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="status" id="status">    
                  </div>
                  <button type="submit" name="btnadd" >Submit</button>
                   <button type="submit" name="btnadd2" class="btnadd2" id="btnadd2" onclick="addMore(); return false;"  >Add More</button>
                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
        </div>
         <!-- Edit Signatory Detail Modal -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- edit Signatory-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Unit</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="sig_SrNoV" >
                  </div>
                  <div class="input-fields">  
                    <label>Title</label> 
                    <input type="text" name="titleV_p" id="titleV_p" class="titleV_p" placeholder="Enter Here Signatory Name !">    
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
                        <button type="button" name="btnDelete_N1" data-dismiss="modal" >No</button>
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

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Unit' ");

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
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="sig_print.php" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Title</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowsig= mysqli_fetch_array($selectsig))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowsig['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowsig['title']; ?></td>
                          <td><?php echo $rowsig['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowsig['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                           <?php
                          if ($rowsig['status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteUnit_Code.php?id=<?php echo $rowsig['SrNo']; ?>" >Deactive</td>
                          <?php
                          }
                          ?>
                          <?php
                          if ($rowsig['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteUnit_CodeI.php?id=<?php echo $rowsig['SrNo']; ?>" >Active</td>
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


    <!-- Edit View ajax Script 
        
     -->
<script type="text/javascript">
$(document).on('click', '.editData', function(){  
  var employee_id = $(this).attr("id"); 

      $.ajax({
         url:"fatch_unit.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#SrNoV').val(data.SrNo);  
              $('#titleV_p').val(data.title); 
 

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

  <!-- Edit View ajax Script 
        only for drop down value
     -->


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

<!-- addmore ajaxpopup -->

<script type="text/javascript">
  function addMore() {
  var pro_name = document.getElementById("pro_name").value;
  var pro_description = document.getElementById("pro_description").value;

      $.ajax({
         url:"addMoreunit.php",
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
</script>

<!-- addmore ajaxpopup -->

<script type="text/javascript">
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var title=document.getElementById('title').value;
     
     
      var summary = "Summary: ";

      if(title == "")
      {
          document.getElementById('title').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_title").innerHTML = "Commodity Code is required.";
      }
      if(title != "")
      {
          document.getElementById('title').style.borderColor = "white";
          document.getElementById("V_title").innerHTML = "";

      }

      
     

      
      
      if (missingVal != 1)
      {
        document.getElementById('title').style.borderColor = "white";
       
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