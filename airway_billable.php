<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// fatch data in airway billable setup
 $selectairway = mysqli_query($con, "select * from airway_billable ");


// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airway_billable WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE airway_billable SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: airway_billable.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airway_billable WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE airway_billable SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: airway_billable.php");
  }
}


// click Edit submit btn
if(isset($_POST['btnedit1']))
{
  // $empNo = $_POST['empNo'];
  $SrNoV= $_POST['SrNoV'];
  $airline_nameV = $_POST['airline_nameV'];
  $awb_codeV = $_POST['awb_codeV'];
   $awb_noV = $_POST['awb_noV'];
  $s_awb_noV = $_POST['s_awb_noV'];
  $e_awb_noV = $_POST['e_awb_noV'];
   $receipt_dateV = $_POST['receipt_dateV'];
  $ownerV = $_POST['ownerV'];

   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }
      
     

          for( $iV=$s_awb_noV; $iV<=$e_awb_noV; $iV++ )

          {

          // update qury
             $updateQuery12 = mysqli_query($con, "UPDATE airway_billable SET airline_name='$airline_nameV',awb_code='$awb_codeV',awb_no='$iV',receipt_date='$receipt_dateV',owner='$ownerV',status='$statusV' WHERE SrNo='$SrNoV' ") or die(mysqli_error($con));

              $msg = "Record is inserted successfully.";
            function alert($msg)
            {
              echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            alert($msg);

            header("Location: airway_billable.php");

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
    header("Location: airway_billable_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airway_billable_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airway_billable_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

// click Add Currency btn

if (isset($_POST['btnadd'])) {

  $airline_name = $_POST['airline_name'];
  $awb_code = $_POST['awb_code'];
   
  
   $receipt_date = $_POST['receipt_date'];
  $owner = $_POST['owner'];
  $airwayType =$_POST['chkfrmname'];

  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }

      if ($airwayType=='chkform2') {
        $s_awb_no  = $_POST['s_awb_no'];
        $e_awb_no = $_POST['e_awb_no'];
        
      
        for( $i=$s_awb_no; $i<=$e_awb_no; $i++ )

        {

        //  insert qurey
        $insertQuery = mysqli_query($con, "insert into airway_billable (airline_name,awb_code,awb_no,receipt_date,owner,status) values ('$airline_name','$awb_code','$i','$receipt_date','$owner','$status')") or die(mysqli_error($con));

        header("Location: airway_billable.php");

        }
       } 
       else
       {
        $awb_no = $_POST['awb_no'];

        //  insert qurey
        $insertQuery = mysqli_query($con, "insert into airway_billable (airline_name,awb_code,awb_no,receipt_date,owner,status) values ('$airline_name','$awb_code','$awb_no',$receipt_date','$owner','$status')");

        header("Location: airway_billable.php");

       
     }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Airway Billable Setup</title>
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
          <a href="usermodules.php" class="btn btn-info">Setup</a>
          <a href="airway_billable.php" class="btn btn-info active">Airway Billable Setup Table</a>
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
              <h4>Airway Billable Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
        <!-- 
          Add Currency Button click btn Add currency
         -->
         
          <button type="button" id="myBtn">  <small>Add Airway Billable</small></button>
      </div>
         

      <!-- Add City Modal -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD City Modal-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airway Billable  Details</h4>
                </div>
                <div class="modal-body">

                  <div class="input-fields">  
                    <label>Airline Name</label> 
                     <select name="airline_name" id="airline_name" class="airline_name" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcommodity = mysqli_query($con, "select * from airline_setup");

                            while ($rowcommodity = mysqli_fetch_array($selectcommodity))
                            {
                              echo '<option value="'.$rowcommodity['SrNo'].'">'.$rowcommodity['air_name'].'</option>';
                            }

                          ?>

                      </select>      
                  </div>
                   

                   <div class="input-fields"> 
                    <label>AWB Code</label> 
                     <input type="text" name="awb_code" id="awb_code" placeholder="Enter Here Business Name !">      
                  </div>
                  <br>
                  <br>

                   <div class="input-feild input-feild-checkboxs"  style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform1" checked> <label>Single AWB</label>
                  </div>  

                  <div class="input-feild input-feild-checkboxs" style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform2" ><label>Select Multiple AWB</label>
                  </div>

                  <!-- <div class="cls"></div>
                      <hr> -->

                      
                   <div class="input-fields chkform1 chkboxform";">
                    <label>AWB No.</label> 
                        <input class="input_field" type="text" name="awb_no"></input>
                    </div>

                        <div class="input-fields chkform2 chkboxform" style="display: none;">
                          <label>Start AWB No.</label>
                        <input class="input_field" type="text" name="s_awb_no"></input>
                        <label>Ending AWB No.</label>
                         <input class="input_field" type="text" name="e_awb_no"></input>
                        </div>
                        </div>
                         <!-- <div class="input-fields chkform2 chkboxform" style="display: none;">
                       
                        </div> -->     
                  

                <!--   <div class="input-fields"> 
                    <label>Commodity</label> 
                     <input type="text" name="bus_sec_nameV" id="bus_sec_nameV" placeholder="Enter Here Business Name !">      
                  </div>

                  <div class="input-fields"> 
                    <label>Commodity</label> 
                     <input type="text" name="bus_sec_nameV" id="bus_sec_nameV" placeholder="Enter Here Business Name !">      
                  </div> -->

                  <div class="input-fields"> 
                    <label>Receipt Date</label> 
                     <input type="text" name="receipt_date" id="receipt_date" placeholder="Enter Here Business Name !">      
                  </div>

                  <div class="input-fields">  
                    <label>Owner</label> 
                     <select name="owner" id="owner" class="owner" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcommodity = mysqli_query($con, "select * from stockowner");

                            while ($rowcommodity = mysqli_fetch_array($selectcommodity))
                            {
                              echo '<option value="'.$rowcommodity['SrNo'].'">'.$rowcommodity['owner_name'].'</option>';
                            }

                          ?>

                      </select>      
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
         <!-- Edit City Modal-->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit City Modal -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Business Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="bus_SrNoV" id="bus_SrNoV" >
                       
                  </div>

                 <div class="input-fields">  
                    <label>Business Name</label> 
                    <input type="text" name="bus_sec_nameV" id="bus_sec_nameV" placeholder="Enter Here Business Name !">    
                  </div>
                   

                   <div class="input-fields"> 
                    <label>Commodity</label> 
                     <select name="commoditiesV" id="commoditiesV" class="commoditiesV" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcommodity = mysqli_query($con, "select * from pro_setup_commodity");

                            while ($rowcommodity = mysqli_fetch_array($selectcommodity))
                            {
                              echo '<option value="'.$rowcommodity['pro_name'].'">'.$rowcommodity['pro_name'].'</option>';
                            }

                          ?>

                      </select>      
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


  

      <div class="leave-manage-sec-table widget_iner_box ">

        <div class="tbleDrpdown">
             <div id="tblebtn">
                <ul>
                

                  <li><button type="button" id="btnDelete_C1"><i class="fa fa-trash"></i> Activate</button></li>
                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i> Deactivate</button></li>
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="bus_print.php" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                    <th>Business Name</th>
                                    <th>Commodity</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowbusiness= mysqli_fetch_array($selectbusiness))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowbusiness['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowbusiness['bus_sec_name']; ?></td>
                          <td><?php echo $rowbusiness['commodities']; ?></td>
                          <td><?php echo $rowbusiness['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowbusiness['SrNo']; ?>" data-target="#btn1" >Edit</td> 
                           <?php
                          if ($rowbusiness['status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteBus_Code.php?id=<?php echo $rowbusiness['SrNo']; ?>" >Deactivate</td>
                          <?php
                          }
                          ?>

                          <?php
                          if ($rowbusiness['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteBus_CodeI.php?id=<?php echo $rowbusiness['SrNo']; ?>" >Activate</td>
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
         url:"fatch_business.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#bus_SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('#bus_sec_nameV').val(data.bus_sec_name);  
              $('.commoditiesV').html(data.commodities);    

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
         url:"fatch_business2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.commoditiesV').html(data);  
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
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chkboxform").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>





<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>