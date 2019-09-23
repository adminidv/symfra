<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


 // multi delete
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    mysqli_query($con, "DELETE FROM roles WHERE role_ID = '$val' ");
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
    header("Location: roletable_excel_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("roletable_CSV_U.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("roletable_pdf_U.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>View Role</title>
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
          <a href="usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="viewrole.php" class="btn btn-info active">View Role</a>
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
          <button type="button" id="btnAddEmp" onclick="addrole();">  <small>Add role</small></button>
      </div>

      <div class="col-md-12">
            <div class="user_table-title">
              <h4>Employee Info Table</h4>
            </div>
        <form action="" method="POST">

         


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
                  <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printtable_role_U.php?rowRole=<?php echo $rowRole ?>" target="_blank"> Print</a></button></li>
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Role ID</th>
                                  <th>Role Name</th>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Delete</th>

                                   </tr>
                        </thead>
                        <tbody>
                          <?php

                              include 'manage/connection.php';

                              $selectRole = mysqli_query($con, "select * from roles ");

                              ?>
                          <?php

                                while ($rowRole = mysqli_fetch_array($selectRole))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowRole['role_ID'] .' " /></td>'; ?>
                          <td><?php echo $rowRole['role_ID']; ?></td>
                          <td><?php echo $rowRole['role_Name']; ?></td>
                          <td><a href="viewroletable.php?role_ID=<?php echo $rowRole['role_ID']; ?>">View</td>
                          <td><a href="editrole.php?role_ID=<?php echo $rowRole['role_ID']; ?>">Edit</td>
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

<script>
function addrole() {
  location.replace("add_role.php")
}
</script>

<script type="text/javascript">
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteroleCode_U.php?role_ID=<?php echo $role_ID; ?>',
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





<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>