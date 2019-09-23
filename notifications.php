<?php
include('manage/connection.php');
include("manage/session.php");
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
$finalDate = $semiFinal3 . ' ' . $semiFinal2;
// echo $final;

// echo "<br>" . $userID;

$selectNote = mysqli_query($con, "SELECT * FROM nottable WHERE notOn='$userID' AND  notStatus='Approval Pending' ");
while ($rowNote = mysqli_fetch_array($selectNote))
{
  $noteRecord = $rowNote['notRecord'];
}

if(isset($_POST['notView']))
{
  // alert("Check title not working");
  header("Location: notificationsView.php?noteRecord=$noteRecord");
}

if(isset($_POST['notView_AE']))
{
  header("Location: sales_order_air_export_V.php?soNo=$noteRecord");
}

if(isset($_POST['notView_AI']))
{
  header("Location: sales_order_air_import_V.php?soNo=$noteRecord");
}

if(isset($_POST['notView_SI']))
{
  header("Location: sales_order_sea_import_V.php?soNo=$noteRecord");
}

if(isset($_POST['accept']))
{
  $txtSrNo = $_POST['txtSrNo'];

  // Searching for approval flow Id
  $selectNext = mysqli_query($con, "SELECT * FROM nottable WHERE SrNo='$txtSrNo' ");
  while ($rowNext = mysqli_fetch_array($selectNext))
  {
    $appFlowID = $rowNext['appFlowID'];

    $notTitle = $rowNext['notTitle'];
    $notStatus = $rowNext['notStatus'];
    $notRecord = $rowNext['notRecord'];
    $appFlowID = $rowNext['appFlowID'];
    $mainCreator = $rowNext['mainCreator'];
    $notApp = $rowNext['notApp'];
    $notRecord = $rowNext['notRecord'];
  }

  if ($notTitle == "User Management")
  {
    $updateUser = mysqli_query($con, "UPDATE users SET user_active='Active' WHERE user_ID='$notRecord' ");
    $updateNot = mysqli_query($con, "UPDATE nottable SET notStatus='Accepted' WHERE SrNo='$txtSrNo' ");
  }

  if ($notApp == 1)
  {
    // Fetching the next approval, if present
    $selectAppFlow = mysqli_query($con, "SELECT * FROM appdoc WHERE SrNo='$appFlowID' ");
    while ($rowNext = mysqli_fetch_array($selectAppFlow))
    {
      $approval2 = $rowNext['app2'];
    }

    if ($approval2 != "")
    {
      // Working for creater ID and Name
      $selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
      while ($rowNotUser = mysqli_fetch_array($selectUsername))
      {
        $userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
      }

      // Creating notification for second approval
      $insertNot = mysqli_query($con, "INSERT INTO nottable (notTitle, notDateTime, notStatus, creatorID, createdBy, notOn, notRecord, appFlowID, mainCreator, notApp) VALUES ('$notTitle', '$finalDate', '$notStatus', '$userID', '$userNot', '$approval2', '$notRecord', '$appFlowID', '$mainCreator', '2') ") or die(mysqli_error($con));

      // Updating current notification
      $updateNot = mysqli_query($con, "UPDATE nottable SET notStatus='Accepted' WHERE SrNo='$txtSrNo' ");

      // Updating the main record
      $updateRecord = mysqli_query($con, "UPDATE saleorders SET saleStatus='Waiting for second approval' WHERE SrNo='$notRecord' ");
    }
  }

  else if ($notApp == 2)
  {
    // Working for creater ID and Name
    $selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
    while ($rowNotUser = mysqli_fetch_array($selectUsername))
    {
      $userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
    }

    // Searching for main approval
    $selectNext = mysqli_query($con, "SELECT * FROM nottable WHERE SrNo='$txtSrNo' ");
    while ($rowNext = mysqli_fetch_array($selectNext))
    {
      $appFlowID = $rowNext['appFlowID'];

      $notTitle = $rowNext['notTitle'];
      $notStatus = $rowNext['notStatus'];
      $notRecord = $rowNext['notRecord'];
      $appFlowID = $rowNext['appFlowID'];
      $mainCreator = $rowNext['mainCreator'];
      // $notApp = $rowNext['notApp'];

      // Creating notification for second approval
      $insertNot = mysqli_query($con, "INSERT INTO nottable (notTitle, notDateTime, notStatus, creatorID, createdBy, notOn, notRecord, appFlowID, mainCreator) VALUES ('$notTitle', '$finalDate', '$notStatus', '$userID', '$userNot', '$mainCreator', '$notRecord', '$appFlowID', '$mainCreator') ") or die(mysqli_error($con));

      // Updating current notification
      $updateNot = mysqli_query($con, "UPDATE nottable SET notStatus='Accepted' WHERE SrNo='$txtSrNo' ");

      // Updating the main record
      $updateRecord = mysqli_query($con, "UPDATE saleorders SET saleStatus='Approved' WHERE SrNo='$notRecord' ");
    }
  }

  // echo '<script type="text/javascript"> alert("'.$approval2.'"); </script>';
}

if(isset($_POST['acceptFinal']))
{
  $txtSrNo = $_POST['txtSrNo'];

  // Working for creater ID and Name
  $selectUsername = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
  while ($rowNotUser = mysqli_fetch_array($selectUsername))
  {
    $userNot = $rowNotUser['user_fName'] . ' ' .$rowNotUser['user_lName'] ;
  }

  // Searching for record ID on which notification is created
  $selectNext = mysqli_query($con, "SELECT * FROM nottable WHERE SrNo='$txtSrNo' ");
  while ($rowNext = mysqli_fetch_array($selectNext))
  {
    $appFlowID = $rowNext['appFlowID'];

    $notTitle = $rowNext['notTitle'];
    // $notStatus = $rowNext['notStatus'];
    $notRecord = $rowNext['notRecord'];
    // $appFlowID = $rowNext['appFlowID'];
    $mainCreator = $rowNext['mainCreator'];
    // $notApp = $rowNext['notApp'];
  }

  // Fetching the next approval, if present
  $selectFinalNot = mysqli_query($con, "SELECT * FROM saleorders WHERE soNo='$notRecord' ");
  while ($rowFinalNot = mysqli_fetch_array($selectFinalNot))
  {
    $FinalNot = $rowFinalNot['lastNotification'];
  }

  // Creating final notification to add job entry
  $insertNot = mysqli_query($con, "INSERT INTO nottable (notTitle, notDateTime, notStatus, creatorID, createdBy, notOn, notRecord, appFlowID, mainCreator) VALUES ('$notTitle', '$finalDate', 'A sale order has been created. You may add the job entry', '$userID', '$userNot', '$FinalNot', '$notRecord', '$appFlowID', '$mainCreator') ") or die(mysqli_error($con));

  // Updating current notification
  $updateNot = mysqli_query($con, "UPDATE nottable SET notStatus='Accepted' WHERE SrNo='$txtSrNo' ");

  // Updating the main record
  $updateRecord = mysqli_query($con, "UPDATE saleorders SET saleStatus='Active' WHERE SrNo='$notRecord' ");

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Notifications</title>
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
.Notification_bar_hdings {
    margin: 0 0 20px 0;
    width: 100%;
    border-bottom: 1px solid #dddd;
    float: left;
    background: #eee;
}
.Notification_bar button i {
    margin: 0 3px 0 0px;
}

.Notification_bar {
    width: 100%;
    padding: 10px 0;
    float: left;
}
.Notification_bar:hover {
    background: #eeeeee45;
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
          <a href="#" class="btn btn-info active">Notifications</a>
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

<form method="POST">
<div class="main_widget_box ">
  
<div class="widget_iner_box">
	<div class="form_sec_action_btn col-md-12">
    <div class="form_action_right_btn">
      <!-- Go back button code starting here -->
      <?php include('inc_widgets/backBtn.php'); ?>
      <!-- Go back button code ending here -->
    </div>
  </div>

    <div class="Notification_bar_hdings">
      <div class="col-md-2">
      	<div class="widget_child_title"><h4>Notifications </h4></div>
      </div>

      <div class="col-md-2">
      	<div class="widget_child_title"><h4>Status </h4></div>
      </div>

      <div class="col-md-2">
        <div class="widget_child_title"><h4>Sent By </h4></div>
      </div>

      <div class="col-md-6">
      	<div class="widget_child_title"><h4>Actions </h4></div>
      </div>
    </div>

    <?php

    $selectNot = mysqli_query($con, "SELECT * FROM nottable WHERE notOn='$userID' AND  notStatus!='Accepted' ORDER BY SrNo DESC  ");
    while ($rowNot = mysqli_fetch_array($selectNot))
    {
      $checkTitle = $rowNot['notTitle'];
      $checkMC = $rowNot['mainCreator'];
      $notStatus = $rowNot['notStatus'];

    ?>

    <div class="Notification_bar" id="<?php echo $rowNot['SrNo']; ?>">
    	<!-- <div class="col-md-1">
    		<i class="fa fa-users"></i>
    	</div> -->
      <div class="col-md-2">
      	<a href="#"><?php echo $rowNot['notTitle']; ?></a>
      	<small style="border-top: 1px solid #eee;display: block;padding: 5px 0;"><?php echo $rowNot['notDateTime']; ?></small>
      </div>

      <div class="col-md-2">
      	<p><?php echo $rowNot['notStatus']; ?></p>
      </div>

      <div class="col-md-2">
        <p><?php echo $rowNot['createdBy']; ?></p>
        <input type="text" class="hidden" name="txtSrNo" value="<?php echo $rowNot['SrNo']; ?>">
      </div>

      <?php

      // If the logged in user is the one who started the notification
      if ($checkMC == $userID)
      {
      ?>

      <div class="col-md-5">
        <button><small><i class="fa fa-check"></i></small>Approval Info</button>
        <button type="submit" name="acceptFinal"><small><i class="fa fa-thumbs-up"></i></small>Submit</button>
        <button><small><i class="fa fa-thumbs-down"></i></small>Cancel</button>

        <?php

        if ($checkTitle == "Air Export")
        {
        ?>
          <button type="submit" name="notView_AE"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        else if ($checkTitle == "Air Import")
        {
        ?>
          <button type="submit" name="notView_AI"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        else if ($checkTitle == "Sea Import")
        {
        ?>
          <button type="submit" name="notView_SI"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        else
        {
        ?>
          <button type="submit" name="notView"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        ?>

      </div>
      
      <?php
      }
      else
      {
      ?>

      <div class="col-md-5">
        <button><small><i class="fa fa-check"></i></small>Approval Info</button>

        <?php

        if ($notStatus != "Accepted" && $notStatus != "Approval Pending")
        {
        ?>

        <button type="submit" name="accept" class="hidden"><small><i class="fa fa-thumbs-up"></i></small>Accept</button>
        <button class="hidden"><small><i class="fa fa-thumbs-down"></i></small>Reject</button>

        <?php
        }
        else
        {
        ?>

        <button type="submit" name="accept"><small><i class="fa fa-thumbs-up"></i></small>Accept</button>
        <button><small><i class="fa fa-thumbs-down"></i></small>Reject</button>

        <?php
        }
        ?>

        <?php

        if ($checkTitle == "Air Export")
        {
        ?>
          <button type="submit" name="notView_AE"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        else if ($checkTitle == "Air Import")
        {
        ?>
          <button type="submit" name="notView_AI"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        else
        {
        ?>
          <button type="submit" name="notView"><small><i class="fa fa-eye"></i></small>View</button>
        <?php
        }

        ?>

      </div>

      <?php
      }
      ?>

      <div class="col-md-1" id="closeNotfication1" onclick="closeNot('<?php echo $rowNot['SrNo']; ?>')">
        <a href="#"><i class="fa fa-close"></i></a>
      </div>

    </div>

    <div class="cls"></div>
    <hr>

    <?php

    }

    ?>

</div>

</div>

<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
  function closeNot(closeNotfication)
  {
    event.preventDefault(); // cancel default behavior
    document.getElementById(closeNotfication).style.visibility = 'hidden';
  }
</script>

</body>
</html>