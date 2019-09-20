<?php
include('manage/connection.php');
// include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$userID = $_SESSION['user'];

// Fetching 
$dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$dateTime2 = $dateTime->format("m/d/y  H:i");

$semiFinal2 = date('h:i A', strtotime($dateTime2));

$dateTimeFinal = new DateTime('now', new DateTimeZone('Asia/Karachi')); 
$semiFinal3 = $dateTime->format("d/m/y");
$final = $semiFinal3 . ' ' . $semiFinal2;
// echo $final;

$selectNote = mysqli_query($con, "SELECT * FROM notTable WHERE notOn='$userID' ");
while ($rowNote = mysqli_fetch_array($selectNote))
{
  $noteRecord = $rowNote['notRecord'];
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Modules</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/modules.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/mega_menu.css">
<link rel="stylesheet" type="text/css" href="css/notification_drpdwn.css">
<link rel="shortcut icon" type="image/png" href="images/favicon.png">

<script src="js/jquery-1.12.4.js"></script>

<style type="text/css">
 span.noti_numb_counts {
   position: absolute;
   top: 10px;
   right: 5px;
   color: var(--yt-notification-button-bubble_-_color);
   background-color: #000;
   width: 14px;
   height: 14px;
   border-radius: 50%;
   line-height: 14px;
   font-size: 10px;
   text-align: center;
   cursor: pointer;
}
</style>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" onclick="openNav()">&#9776;</a>
      <a class="navbar-brand" href="usermodules.php">SYMFRA</a>

    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="nav_tooltip" href="usermodules.php"><span class="nv_tip_txt">Home</span><span class="glyphicon glyphicon-home"></span></a></li>
        <li>
          <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </form>
        </li>
        <li><a class="nav_tooltip" href="#"><span class="nv_tip_txt">Favourites</span><span class="glyphicon glyphicon-star"></span></a></li>
        <li><a class="nav_tooltip" href="#"><span class="nv_tip_txt">Watchlist</span><span class="glyphicon glyphicon-flag"></span></a></li>
        <li class="dropdown">

          
          <?php

          $selectNot = mysqli_query($con, "SELECT * FROM notTable WHERE notOn='$userID' ORDER BY SrNo DESC  ");
          $totalNot = mysqli_num_rows($selectNot);

          ?>

          <a class="nav_tooltip dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><span class="nv_tip_txt">Notifications</span><span class="glyphicon glyphicon-bell"></span><span class="noti_numb_counts"><?php echo $totalNot; ?></span></a>

           <ul class="dropdown-menu notify-drop">
                          <div class="notify-drop-title">
                            <div class="row">
                              
                              <div class="col-md-6 col-sm-6 col-xs-6">Notifications (<b><?php echo $totalNot; ?></b>)</div>
                              <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="notifications.php" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="View All"><i class="fa fa-eye"></i> <small>View All</small></a></div>
                            </div>
                          </div>
                          <!-- end notify title -->
                          <!-- notify content -->
                          <div class="drop-content">

                            <?php

                            while ($rowNot = mysqli_fetch_array($selectNot))
                            {

                            ?>

                            <li>
                              <div class="col-md-12 col-sm-12 col-xs-12"><a href="notifications.php"><?php echo $rowNot['notTitle']; ?></a> <?php echo $rowNot['notStatus']; ?><a href="" class="rIcon"><i class="fa fa-close"></i></a>
                                <small class="time"><?php echo $rowNot['notDateTime']; ?></small>
                                <hr>
                                <a class="time" href="notifications.php">View</a>
                                <a class="time">Accept</a>
                                <a class="time">Reject</a>
                                <a class="time">Approval Info</a>
                              </div>
                            </li>

                            <?php

                            }

                            ?>
                            
            </ul>

        </li>
        <li><a class="nav_tooltip" href="#"><span class="nv_tip_txt">Help</span><span class="glyphicon glyphicon-question-sign"></span></a></li>

        <li>
          <div class="dropdown tp_dropdwn">
            <button class="dropdown-toggle" id="showDD" type="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span></button>
            <ul id="drp_show" class="dropdown-menu  tp_sting_dropdwn">
              <!-- <button type="button" class="logout_btn" id="logout_btn">Logout</button> -->
              <h4>Settings and Actions</h3>
              <ul>
                <li><h5> Personilzation</h5></li>
                <li><a href="set_prefences.php">Set prefences</a></li>
              </ul>
              <ul>
                <li><h5> Addministration</h5></li>
                <li><a href="add_user.php">User Management</a></li>
                <li><a href="#">Customize Pages</a></li>
                <li><a href="#">Customize Global Page Template</a></li>
                <li><a href="#">Manage Customization</a></li>
                <li><a href="#">Manage Sendboxes</a></li>
                <li><a href="#">Setup and Maintenance</a></li>
                <li><a href="#">Highlight Flexfields</a></li>

              </ul>
              <ul>
                <li><h5> Troubleshooting</h5></li>
                <li><a href="#">Run Diagnostics Tests..</a></li>
                <li><a href="#">Record Issue</a></li>

              </ul>
              <ul>
                <li><a href="#">Print Me</a></li>
              </ul>
               <ul>
                <li><a href="#">Application Help </a></li>
              </ul>
               <ul>
                <li><a href="#">About This Page</a></li>
                <li><a href="manage/logout.php">Logout</a></li>
              </ul>
            </ul>
          </div>
        </li>
          


      </ul>
    </div>
  </div>
</nav>



<div id="myNav" class="nav_overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="nav_overlay-content">
          <div class="nav_list_item">

          <ul>
            <li> <h5>Sales</h5> </li>

            <li><a href="#">Activities</a></li>
            <li><a href="create_lead.php">Leads</a></li>
            <li><a href="leadtable.php">Opportunities</a></li>
            <li><a href="acount.php">Acount</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li><a href="#">Sales Analytics</a></li>
            <li><a href="#">Tasks</a></li>

          </ul>

          <ul>
            <li> <h5>Operations</h5> </li>

            <li><h6>Export</h6></li>
            <li><a href="air_freight_export.php">Air Freight</a></li>
            <li><a href="#">Sea Freight</a></li>

            <li><h6>Import</h6></li>
            <li><a href="air_freight_import.php">Air Freight</a></li>
            <li><a href="#">Sea Freight</a></li>
          </ul>

           <!--  <ul>
              <li><h5>Payroll</h5> </li>
            <li><a href="#">Payroll Dashboard</a></li>
            <li><a href="#">Checklist</a></li>
            <li><a href="#">Payroll Calculation</a></li>
            <li><a href="#">Payment Distribution</a></li>
         
            </ul> -->
          <ul>
            <li> <h5>Recieveables </h5> </li>

            <li><a href="#">Billing</a></li>
            <li><a href="#">Acount Recieveable</a></li>
            <li><a href="#">Revenue</a></li>
          </ul>

           <ul>
              <li> <h5> Payables  </h5> </li>

              <li><a href="#">Payments</a></li>
              <li><a href="#">Invoices</a></li>
              <li><a href="#">Payment Dashboard</a></li>
          </ul>

          <ul>
              <li> <h5>General Acounting  </h5> </li>

              <li><a href="#">General Acounting Dashboard</a></li>
              <li><a href="#">Journals</a></li>
              <li><a href="#">Period Close</a></li>
          </ul>
</div>

<div class="nav_list_item">

  
          <ul>
              <li><h5>Payroll</h5> </li>
            <li><a href="#">Payroll Dashboard</a></li>
            <li><a href="#">Checklist</a></li>
            <li><a href="#">Payroll Calculation</a></li>
            <li><a href="#">Payment Distribution</a></li>
         
          </ul>

          <ul>

            <li> <h5>Procurement</h5> </li>
            
            <li><a href="#">Purchase Recustions</a></li>
            <li><a href="#">Purchase Agreement</a></li>
            <li><a href="#">Purchase Orders</a></li>
            <li><a href="#">My Reciepts</a></li>
            <li><a href="#">Suppliers</a></li>

          </ul>

            <ul>
            <li> <h5>Partner Management</h5> </li>
            
            <li><a href="#">Partners</a></li>
            <li><a href="#">Enrolments</a></li>
            <li><a href="#">Programs</a></li>
            <li><a href="#">MDF</a></li>

          </ul>

          <ul>
            <li> <h5>Intercompany Accounting</h5> </li>
            
            <li><a href="#">Transaction</a></li>
            <li><a href="#">Reconcilation</a></li>
          </ul>
</div>    
<div class="nav_list_item">

         <ul>
            <li> <h5>Contract Management</h5> </li>

            <li><a href="#">Contracts</a></li>
            <li><a href="#"> Terms Library</a></li>
          </ul>

          <ul>
              <li><a href="#"><h5>Revenue Management</h5></a> </li>
              <li><a href="#"> Collection </a> </li>

          </ul>

          <ul>
            <li> <h5> Cash Management</h5> </li>
            <li><a href="#">Cash Balance</a></li>
          </ul>
</div>     
     

        

  

         
          
          </div>
      </div>
</div>


<!-- <div class="cls"></div>
<hr>
<div class="symfra_footer">
  <div class="footer_inner">
    <div class="footer_right">
      <p></p>
    </div>
    <div class="footer_left"></div>

  </div>
</div> -->

<script type="text/javascript">
 $(document).ready(function(){
        // Show hide popover
        $("#showDD").click(function(){
            $(this).find(".drp_show").slideToggle("fast");
        });
    });
    $(document).on("click", function(event){
        var $trigger = $("#showDD");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".drp_show").slideUp("fast");
        }            
    });
</script>

 
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>


</body>
</html>
