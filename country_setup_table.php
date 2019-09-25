<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$selectcoun = mysqli_query($con, "select * from country_setup");

if(isset($_POST['btnedit1']))
{


  $country_codeV = $_POST['country_codeV'];
  $country_nameV = $_POST['country_nameV'];
  $country_SrNoV = $_POST['country_SrNoV'];
  $country_regionV = $_POST['country_regionV'];
   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Inactive';
  }

  $updateQuery12 = mysqli_query($con, "UPDATE country_setup SET country_code='$country_codeV', country_name='$country_nameV', country_region='$country_regionV',status='$status' WHERE SrNo='$country_SrNoV' ") or die(mysqli_error($con));

  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: country_setup_table.php");
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
    header("Location: country_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("country_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("country_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}



if (isset($_POST['submitBtn'])) {
  $country_code=$_POST['country_code'];
  $country_name=$_POST['country_name'];
  $country_region =$_POST['country_region'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Inactive';
  }

 $insertQuery = mysqli_query($con, "insert into country_setup (country_code,country_name,country_region,status ) values ('$country_code', '$country_name','$country_region','$status')");

 $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);
 
 header("Location: country_setup_table.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Country Setup Table</title>
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
          <a href="country_setup_table.php" class="btn btn-info active">Country Setup Table</a>
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
               <div class="modal fade confirmTable-modal" id="submitCountry" role="dialog">
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
              <h4>Country Table</h4>
            </div>


      <div class="form_sec_action_btn col-md-12">
         
          <button type="button" id="myBtn">  <small>Add Country</small></button>
      </div>
         

      <!-- Add Region -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Region-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Country Details</h4>
                </div>
                <div class="modal-body">

                  <h4><label id="formSummary" style="color: red;"></label></h4>
                  <p id="V_country_code" style="color: red;"></p>
                  <p id="V_country_name" style="color: red;"></p>

                  <div class="input-fields"> 
                    <label>Country Code</label> 
                    <input type="text" name="country_code" id="country_code" maxlength="30" placeholder="Enter Here Country Code!">    
                  </div>
                   <div class="input-fields"> 
                    <label>Country Name</label> 
                    <input type="text" name="country_name" id="country_name" placeholder="Enter Here Country Code!">    
                  </div>

                  <div class="input-fields">  
                     <label>Region</label>  
                      <select name="country_region" id="country_region">
                          <option value="Select">Select </option>
                          <?php

                            $selectregion = mysqli_query($con, "select * from region_setup");

                            while ($rowregion = mysqli_fetch_array($selectregion))
                            {
                              echo '<option value="'.$rowregion['reg_name'].'">'.$rowregion['reg_name'].'</option>';
                            }

                          ?>

                      </select>  
                  </div>
                  <div class="input-fields">  
                    <label>Active</label> 
                    <input type="checkbox" name="status" id="status" checked>    
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
         <!-- edit Region -->
      <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- edit Region-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Country</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>Country SrNo</label> 
                    <input type="text" name="country_SrNoV" id="country_SrNoV" >
                       
                  </div>
                   <div class="input-fields"> 
                    <label>Country Code</label> 
                    <input type="text" name="country_codeV" id="country_codeV" >
                       
                  </div>

                  <div class="input-fields">  
                    <label>Country Name</label> 
                    <input type="text" name="country_nameV" id="country_nameV" maxlength="30" >   
                  </div>
                  <div class="input-fields">  
                     <label>Region</label>  
                      <select name="country_regionV" id="country_regionV" class="country_regionV">
                          <?php

                            $selectregion = mysqli_query($con, "select * from region_setup");

                            while ($rowregion = mysqli_fetch_array($selectregion))
                            {
                              echo '<option value="'.$rowregion['reg_name'].'">'.$rowregion['reg_name'].'</option>';
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


  

      <div class="leave-manage-sec-table widget_iner_box ">

        <div class="tbleDrpdown">
             <div id="tblebtn">
                <ul>
                

                  <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Delete</button></li>
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="country_print.php" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Country Code</th>
                                  <th>Country Name</th>
                                  <th>Region</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Delete</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowcoun= mysqli_fetch_array($selectcoun))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowcoun['country_code'] .' " /></td>'; ?>
                          <td><?php echo $rowcoun['country_code']; ?></td>
                          <td><?php echo $rowcoun['country_name']; ?></td>
                          <td><?php echo $rowcoun['country_region']; ?></td>
                          <td><?php echo $rowcoun['status']; ?></td>
                          <td><a href="#" class="editData" data-toggle="modal" id="<?php echo $rowcoun['country_code']; ?>" data-target="#btn1" >Edit</td> 
                          <td><a href="#" data-toggle="modal" data-target="#deleteTable_C2" >Delete</td>
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
         url:"fatch_country.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  
              $('.country_regionV').html(data.country_region);  
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
         url:"fatch_country2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.country_regionV').html(data);  
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
  
</script>

<script src="js/jquery.dataTables.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
   function FormValidation()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var country_code=document.getElementById('country_code').value;
      var country_name=document.getElementById('country_name').value;

      var summary = "Summary: ";

      if(country_code == "")
      {
          document.getElementById('country_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_country_code").innerHTML = "Code is required.";
      }
      if(country_code != "")
      {
          document.getElementById('country_code').style.borderColor = "white";
          document.getElementById("V_country_code").innerHTML = "";
      }

      if(country_name == "")
      {
          document.getElementById('country_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_country_name").innerHTML = "Name is required.";
      }
      if(country_name != "")
      {
          document.getElementById('country_name').style.borderColor = "white";
          document.getElementById("V_country_name").innerHTML = "";

        if (!regexp.test(country_name))
        {
          document.getElementById('country_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_country_name").innerHTML = "Only alphabets are allowed in Conutry Name.";
        }
      }

      if (missingVal != 1)
      {
        document.getElementById('country_code').style.borderColor = "white";
        document.getElementById('country_name').style.borderColor = "white";
       
        $("#submitCountry").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

<script type="text/javascript">

 function addMore() {
  var country_code = document.getElementById("country_code").value;
  var country_name = document.getElementById("country_name").value;
  var country_region = document.getElementById("country_region").value;

      $.ajax({
         url:"addMoreCountry.php",
         method:"GET",
         data:{country_code:country_code, country_name:country_name, country_region:country_region},
         dataType:"text",
         success: function(data) {
              
              alert("Done");
              document.getElementById("country_code").value = "";
              document.getElementById("country_name").value = "";
             
            }
      });

  }

   function FormValidation2()
   {
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var country_code=document.getElementById('country_code').value;
      var country_name=document.getElementById('country_name').value;

      var summary = "Summary: ";

      if(country_code == "")
      {
          document.getElementById('country_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_country_code").innerHTML = "Code is required.";
      }
      if(country_code != "")
      {
          document.getElementById('country_code').style.borderColor = "white";
          document.getElementById("V_country_code").innerHTML = "";
      }

      if(country_name == "")
      {
          document.getElementById('country_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_country_name").innerHTML = "Name is required.";
      }
      if(country_name != "")
      {
          document.getElementById('country_name').style.borderColor = "white";
          document.getElementById("V_country_name").innerHTML = "";
      }

      if (missingVal != 1)
      {
        document.getElementById('country_code').style.borderColor = "white";
        document.getElementById('country_name').style.borderColor = "white";
       
        addMore();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

</body>
</html>