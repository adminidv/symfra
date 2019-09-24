<?php
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

  $adv_clause = " WHERE ";//Initial clause
  $adv_searchRecord="select * from airport_setup  ";

      // if user is giving the middle name
      if(!empty($_POST['adv_name']))
      {
          $adv_name = $_POST['adv_name'];
          $adv_searchRecord .= $adv_clause."`airport_name` LIKE '%$adv_name%'";
          $adv_name = 1;
      }
      else
      {
        $adv_name = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['adv_iata']))
      {
          if($adv_name == 1)
          {
            $adv_clause = " AND ";
          }
          $adv_iata = $_POST['adv_iata'];
          $adv_searchRecord .= $adv_clause."`airport_iata` LIKE '%$adv_iata%'";
          $adv_iata = 1;
      }
      else
      {
        $adv_iata = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['adv_country']))
      {
          if($adv_iata == 1 OR $adv_name == 1)
          {
            $adv_clause = " AND ";
          }
          $adv_country = $_POST['adv_country'];
          $adv_searchRecord .= $adv_clause."`country_name` LIKE '%$adv_country%'";
          $adv_country = 1;
      }
      else
      {
        $adv_country = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['adv_email']))
      {
          if($adv_country == 1 OR $adv_iata == 1 OR $adv_name == 1)
          {
            $adv_clause = " AND ";
          }
          $adv_email = $_POST['adv_email'];
          $adv_searchRecord .= $adv_clause."`email` LIKE '%$adv_email%'";
          $adv_email = 1;
      }
      else
      {
        $adv_email = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['adv_website']))
      {
          if($adv_email == 1 OR $adv_country == 1 OR $adv_iata == 1 OR $adv_name == 1)
          {
            $adv_clause = " AND ";
          }
          $adv_website = $_POST['adv_website'];
          $adv_searchRecord .= $adv_clause."`website` LIKE '%$adv_website%'";
          $adv_website = 1;
      }
      else
      {
        // $adv_country = 0;
      }

  // echo $sql; //Remove after testing
  $selectairport = mysqli_query($con, $adv_searchRecord);

/////////////////////////////////////////////////////////////////////

// multi Deactived
if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airport_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
    if ($currentStatus == "Active")
    {
      mysqli_query($con, "UPDATE airport_setup SET status='Deactive' WHERE SrNo = '".$val."' ");
    }
     header("Location: airport_setup_table.php");
}

}
    // multi Actived
    if(isset($_POST["btnDelete1"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    $selectStatus = mysqli_query($con, "SELECT * FROM airport_setup WHERE SrNo='".$val."' ");
    while ($rowStatus = mysqli_fetch_array($selectStatus))
    {
      $currentStatus = $rowStatus['status'];
    }
     if ($currentStatus == "Deactive")
    {
      mysqli_query($con, "UPDATE airport_setup SET status='Active' WHERE SrNo = '".$val."' ");
    }

    header("Location: airport_setup_table.php");
  }
}

// click Edit submit btn
if(isset($_POST['btnedit1']))
{
  // $empNo = $_POST['empNo'];
  $airport_SrNoV= $_POST['airport_SrNoV'];
  $airport_nameV = $_POST['airport_nameV'];
  $airport_iataV = $_POST['airport_iataV'];
  $airport_ICAOV = $_POST['airport_ICAOV'];
  $country_nameV = $_POST['country_nameV'];
  $city_nameV = $_POST['city_nameV'];
  $cont_per_offV = $_POST['cont_per_offV'];
  $fax_noV = $_POST['fax_noV'];
  $emailV = $_POST['emailV'];
  $websiteV = $_POST['websiteV'];

   if (isset($_POST['statusV'])) {
    $statusV='Active';

  }
  else
  {
    $statusV='Deactive';
  }
 

// update qury
   $updateQuery12 = mysqli_query($con, "UPDATE airport_setup SET airport_name='$airport_nameV',airport_iata='$airport_iataV',airport_ICAO='$airport_ICAOV',country_name='$country_nameV',city_name='$city_nameV',cont_per_off='$cont_per_offV',fax_no='$fax_noV',email='$emailV',website='$websiteV',status='$statusV' WHERE SrNo='$airport_SrNoV' ") or die(mysqli_error($con));

    $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

  header("Location: airport_setup_table.php");
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
    header("Location: airport_excel.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airport_csv.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("airport_pdf.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

// click Add Currency btn

if (isset($_POST['btnadd'])) {
  $airport_name = $_POST['airport_name'];
  $airport_iata = $_POST['airport_iata'];
  $airport_ICAO = $_POST['airport_ICAO'];
  $country_name = $_POST['country_name'];
  $city_name = $_POST['city_name'];
  $cont_per_off = $_POST['cont_per_off'];
  $fax_no = $_POST['fax_no'];
  $email = $_POST['email'];
  $website = $_POST['website'];
  if (isset($_POST['status'])) {
    $status='Active';

  }
  else
  {
    $status='Deactive';
  }
//  insert qurey
 $insertQuery = mysqli_query($con, "insert into  airport_setup(airport_name,airport_iata,airport_ICAO,country_name,city_name,cont_per_off,fax_no,email,website,status) values ('$airport_name','$airport_iata','$airport_ICAO','$country_name','$city_name','$cont_per_off','$fax_no','$email','$website','$status')") or die(mysqli_error($con));
 
  $msg = "Record is inserted successfully.";
  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  alert($msg);

 header("Location: airport_setup_table.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Airport Setup Table</title>
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
          <a href="airport_setup_table.php" class="btn btn-info active">Airport Setup Table</a>
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

           <?php include 'sidebar_widgets/airport_advanced_search_widget.php'; ?>

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
              <h4>Airport Table</h4>
            </div>
        <form action="" method="POST">


      <div class="form_sec_action_btn col-md-12">
        <!-- 
          Add Currency Button click btn Add currency
         -->
         
          <button type="button" id="myBtn">  <small>Add Airport</small></button>
      </div>
         

      <!-- Add City Modal -->
      <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- ADD City Modal-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Airport Details</h4>
                </div>
                <div class="modal-body">

                  <div class="input-fields">  
                    <label>Airport Name</label> 
                    <input type="text" name="airport_name" id="airport_name" placeholder="Enter Here City Code !">    
                  </div>
                   <div class="input-fields"> 
                    <label>IATA Code</label> 
                    <input type="text" name="airport_iata" id="airport_iata" placeholder="Enter Here City Name!">    
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

                      </select>      
                  </div>
                   <div class="input-fields"> 
                    <label>City Name</label> 
                     <select name="city_name" id="city_name" class="city_name" required>
                          <option value="Select">Select </option>
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

                  
                  <div class="input-fields">  
                    <label>Person Name</label> 
                    <input type="text" name="contact_name" id="contact_name" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="cont_per_no" id="cont_per_no" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="cont_per_off" id="cont_per_off" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Fax No.</label> 
                    <input type="text" name="fax_no" id="fax_no" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Email</label> 
                    <input type="text" name="email" id="email" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Website</label> 
                    <input type="text" name="website" id="website" placeholder="Enter Here Region Name !">    
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
                  <h4 class="modal-title">Edit City Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="airport_SrNoV" id="airport_SrNoV" >
                       
                  </div>

                  <div class="input-fields">  
                    <label>Airport Name</label> 
                    <input type="text" name="airport_nameV" id="airport_nameV" placeholder="Enter Here City Code !">    
                  </div>
                   <div class="input-fields"> 
                    <label>IATA Code</label> 
                    <input type="text" name="airport_iataV" id="airport_iataV" placeholder="Enter Here City Name!">    
                  </div>

                   <div class="input-fields"> 
                    <label>Country Name</label> 
                     <select name="country_nameV" id="country_nameV" class="country_nameV" required>
                          <option value="Select">Select </option>
                          <!-- Drop Down list Country Name -->
                          <?php

                            $selectcountry = mysqli_query($con, "select * from country_setup");

                            while ($rowcountry = mysqli_fetch_array($selectcountry))
                            {
                              echo '<option value="'.$rowcountry['country_name'].'">'.$rowcountry['country_name'].'</option>';
                            }

                          ?>

                      </select>      
                  </div>
                   <div class="input-fields"> 
                    <label>City Name</label> 
                     <select name="city_nameV" id="city_nameV" class="city_nameV" required>
                          <option value="Select">Select </option>
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

                  
                  <div class="input-fields">  
                    <label>Person Name</label> 
                    <input type="text" name="contact_nameV" id="contact_nameV" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Phone No.</label> 
                    <input type="text" name="cont_per_noV" id="cont_per_noV" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Office No.</label> 
                    <input type="text" name="cont_per_offV" id="cont_per_offV" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Fax No.</label> 
                    <input type="text" name="fax_noV" id="fax_noV" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Email</label> 
                    <input type="text" name="emailV" id="emailV" placeholder="Enter Here Region Name !">    
                  </div>
                  <div class="input-fields">  
                    <label>Website</label> 
                    <input type="text" name="websiteV" id="websiteV" placeholder="Enter Here Region Name !">    
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
                  <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="airport_print.php" target="_blank"> Print</a></button></li> -->
                  <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                 

                </ul>
              </div>
            </div>
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
                        
                       <thead>
                                  <tr>
                                   <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                   <th>Airport Name</th>
                                   <th>IATA Code</th>
                                   <th>ICAO Code</th>
                                   <th>Country Name</th>
                                   <th>City Name</th>
                                   <th>Office No.</th>
                                   <th>fax No.</th>
                                   <th>Email</th>
                                   <th>Website</th>
                                   <th>Status</th>
                                   <th>Edit</th>
                                   <th>View</th>
                                   <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php

                                while ($rowairport= mysqli_fetch_array($selectairport))
                                {
                                ?>
                        <tr>
                          <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $rowairport['SrNo'] .' " /></td>'; ?>
                          <td><?php echo $rowairport['airport_name']; ?></td>
                          <td><?php echo $rowairport['airport_iata']; ?></td>
                          <td><?php echo $rowairport['airport_ICAO']; ?></td>
                          <td><?php echo $rowairport['country_name']; ?></td>
                          <td><?php echo $rowairport['city_name']; ?></td>
                          <td><?php echo $rowairport['cont_per_off']; ?></td>
                          <td><?php echo $rowairport['fax_no']; ?></td>
                          <td><?php echo $rowairport['email']; ?></td>
                          <td><?php echo $rowairport['website']; ?></td>
                          <td><?php echo $rowairport['status']; ?></td>
                          <td><a href="airport_setup_View.php?id=<?php echo $rowairport['SrNo']; ?>">View</td>
                           <td><a href="airport_setup_Edit.php?id=<?php echo $rowairport['SrNo']; ?>">Edit</td>                                 
                          <?php
                          if ($rowairport['status'] == "Active")
                          {
                          ?>
                          <td><a href="deleteAirport_Code.php?id=<?php echo $rowairport['SrNo']; ?>" >Deactivate</td>
                          <?php
                          }
                          ?>

                          <?php
                          if ($rowairport['status'] == "Deactive")
                          {
                          ?>
                          <td><a href="deleteAirport_CodeI.php?id=<?php echo $rowairport['SrNo']; ?>" >Activate</td>
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
         url:"fatch_airport.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"json",  
         success: function(data) {
              $('#airport_SrNoV').val(data.SrNo);  
              //$('.cur_coun_nameV').html(data.cur_coun_name);
              $('#airport_nameV').val(data.airport_name);  
              $('#airport_iataV').val(data.airport_iata);  
              $('#contact_nameV').val(data.contact_name); 
               $('#cont_per_noV').val(data.cont_per_no);  
              $('#cont_per_offV').val(data.cont_per_off);  
              $('#fax_noV').val(data.fax_no);
               $('#emailV').val(data.email);  
              $('#websiteV').val(data.website);   

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
         url:"fatch_airport2.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.country_nameV').html(data);  
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
         url:"fatch_airport3.php",  
                method:"GET",  
                data:{employee_id:employee_id},  
                dataType:"text",  
         success: function(data) {
              /*$('#country_SrNoV').val(data.SrNo);  
              $('#country_codeV').val(data.country_code);  
              $('#country_nameV').val(data.country_name);  */
              $('.city_nameV').html(data);  
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





<script src="js/jquery.dataTables.min.js"></script>
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>