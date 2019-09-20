<?php

include 'manage/connection.php';
include("manage/session.php");
$advSearch = 'Hide';
$ribbon = 'Default';
$subRibbon = 'showUser';
$Quick = 'UnHide';
$Quickhr = '';

/*$selectUser = mysqli_query($con, "select * from users where user_ID='$username'");
while ($rowUser = mysqli_fetch_array($selectUser))
{
  $uID = $rowUser['user_ID'];
  $uAuth = $rowUser['Auth_ID'];
}

$selectAuth = mysqli_query($con, "select * from authorizationset where Auth_ID='$uAuth'");
while ($rowAuth = mysqli_fetch_array($selectAuth))
{
  $authName = $rowAuth['auth_Name'];
  // echo $authName;
}*/

if(isset($_POST["btnCustom_U"]))
{
  // Declaring variables
  $auth_Name_cus = 0;
  $add_U_cus = 0;
  $update_U_cus = 0;
  $delete_U_cus = 0;
  $view_U_cus = 0;
  $deptView_cus = 0;
  $deptAdd_cus = 0;
  $deptDelete_cus = 0;
  $deptEdit_cus = 0;
  $desigView_cus = 0;
  $desigAdd_cus = 0;
  $desigDelete_cus = 0;
  $desigEdit_cus = 0;
  $roleView_cus = 0;
  $roleAdd_cus = 0;
  $roleDelete_cus = 0;
  $roleEdit_cus = 0;
  $empView_cus = 0;
  $empAdd_cus = 0;
  $empDelete_cus = 0;
  $empEdit_cus = 0;
  $leaveView_cus = 0;
  $leaveAdd_cus = 0;
  $leaveDelete_cus = 0;
  $leaveEdit_cus = 0;
  $siView_cus = 0;
  $siAdd_cus = 0;
  $siEdit_cus = 0;
  $siDelete_cus = 0;
  $seView_cus = 0;
  $seAdd_cus = 0;
  $seEdit_cus = 0;
  $seDelete_cus = 0;
  $aiView_cus = 0;
  $aiAdd_cus = 0;
  $aiEdit_cus = 0;
  $aiDelete_cus = 0;
  $aeView_cus = 0;
  $aeAdd_cus = 0;
  $aeEdit_cus = 0;
  $aeDelete_cus = 0;

  // Setting variables if 1
  if (isset($_POST['auth_Name_cus']))
  {
    $auth_Name_cus = 1;
  }
  if (isset($_POST['add_U_cus']))
  {
    $add_U_cus = 1;
  }
  if (isset($_POST['update_U_cus']))
  {
    $update_U_cus = 1;
  }
  if (isset($_POST['delete_U_cus']))
  {
    $delete_U_cus = 1;
  }
  if (isset($_POST['view_U_cus']))
  {
    $view_U_cus = 1;
  }
  if (isset($_POST['deptView_cus']))
  {
    $deptView_cus = 1;
  }
  if (isset($_POST['deptAdd_cus']))
  {
    $deptAdd_cus = 1;
  }
  if (isset($_POST['deptDelete_cus']))
  {
    $deptDelete_cus = 1;
  }
  if (isset($_POST['deptEdit_cus']))
  {
    $deptEdit_cus = 1;
  }
  if (isset($_POST['desigView_cus']))
  {
    $desigView_cus = 1;
  }
  if (isset($_POST['desigAdd_cus']))
  {
    $desigAdd_cus = 1;
  }
  if (isset($_POST['desigDelete_cus']))
  {
    $desigDelete_cus = 1;
  }

  //////////////////////////////////////////

  if (isset($_POST['desigEdit_cus']))
  {
    $desigEdit_cus = 1;
  }
  if (isset($_POST['roleView_cus']))
  {
    $roleView_cus = 1;
  }
  if (isset($_POST['roleAdd_cus']))
  {
    $roleAdd_cus = 1;
  }
  if (isset($_POST['roleDelete_cus']))
  {
    $roleDelete_cus = 1;
  }
  if (isset($_POST['roleEdit_cus']))
  {
    $roleEdit_cus = 1;
  }
  if (isset($_POST['empView_cus']))
  {
    $empView_cus = 1;
  }
  if (isset($_POST['empAdd_cus']))
  {
    $empAdd_cus = 1;
  }
  if (isset($_POST['empDelete_cus']))
  {
    $empDelete_cus = 1;
  }
  if (isset($_POST['empEdit_cus']))
  {
    $empEdit_cus = 1;
  }
  if (isset($_POST['leaveView_cus']))
  {
    $leaveView_cus = 1;
  }
  if (isset($_POST['leaveAdd_cus']))
  {
    $leaveAdd_cus = 1;
  }
  if (isset($_POST['leaveDelete_cus']))
  {
    $leaveDelete_cus = 1;
  }

  //////////////////////////////////////////

  if (isset($_POST['leaveEdit_cus']))
  {
    $leaveEdit_cus = 1;
  }
  if (isset($_POST['siView_cus']))
  {
    $siView_cus = 1;
  }
  if (isset($_POST['siAdd_cus']))
  {
    $siAdd_cus = 1;
  }
  if (isset($_POST['siEdit_cus']))
  {
    $siEdit_cus = 1;
  }
  if (isset($_POST['siDelete_cus']))
  {
    $siDelete_cus = 1;
  }
  if (isset($_POST['seView_cus']))
  {
    $seView_cus = 1;
  }
  if (isset($_POST['seAdd_cus']))
  {
    $seAdd_cus = 1;
  }
  if (isset($_POST['seEdit_cus']))
  {
    $seEdit_cus = 1;
  }
  if (isset($_POST['seDelete_cus']))
  {
    $seDelete_cus = 1;
  }
  if (isset($_POST['aiView_cus']))
  {
    $aiView_cus = 1;
  }
  if (isset($_POST['aiAdd_cus']))
  {
    $aiAdd_cus = 1;
  }
  if (isset($_POST['aiEdit_cus']))
  {
    $aiEdit_cus = 1;
  }

  //////////////////////////////////////////

  if (isset($_POST['aiDelete_cus']))
  {
    $aiDelete_cus = 1;
  }
  if (isset($_POST['aeView_cus']))
  {
    $aeView_cus = 1;
  }
  if (isset($_POST['aeAdd_cus']))
  {
    $aeAdd_cus = 1;
  }
  if (isset($_POST['aeEdit_cus']))
  {
    $aeEdit_cus = 1;
  }
  if (isset($_POST['aeDelete_cus']))
  {
    $aeDelete_cus = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE tableview_UM SET auth_Name_cus = '$auth_Name_cus', add_U_cus='$add_U_cus', update_U_cus='$update_U_cus', delete_U_cus='$delete_U_cus', view_U_cus='$view_U_cus', deptView_cus='$deptView_cus', deptAdd_cus='$deptAdd_cus', deptDelete_cus='$deptDelete_cus', deptEdit_cus='$deptEdit_cus', desigView_cus='$desigView_cus', desigAdd_cus='$desigAdd_cus', desigDelete_cus='$desigDelete_cus', desigEdit_cus='$desigEdit_cus', roleView_cus='$roleView_cus', roleAdd_cus='$roleAdd_cus', roleDelete_cus='$roleDelete_cus', roleEdit_cus='$roleEdit_cus', empView_cus='$empView_cus', empAdd_cus='$empAdd_cus', empDelete_cus='$empDelete_cus', empEdit_cus='$empEdit_cus', leaveView_cus='$leaveView_cus', leaveAdd_cus='$leaveAdd_cus', leaveDelete_cus='$leaveDelete_cus', leaveEdit_cus='$leaveEdit_cus', siView_cus='$siView_cus', siAdd_cus='$siAdd_cus', siEdit_cus='$siEdit_cus', siDelete_cus='$siDelete_cus', seView_cus='$seView_cus', seAdd_cus='$seAdd_cus', seEdit_cus='$seEdit_cus', seDelete_cus='$seDelete_cus', aiView_cus='$aiView_cus', aiAdd_cus='$aiAdd_cus', aiEdit_cus='$aiEdit_cus', aiDelete_cus='$aiDelete_cus', aeView_cus='$aeView_cus', aeAdd_cus='$aeAdd_cus', aeEdit_cus='$aeEdit_cus', aeDelete_cus='$aeDelete_cus' WHERE SrNo= '1' ");

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `authdetails`  ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $searchQuery = mysqli_query($con, $searchRecord);
  // header('Location: usertable.php');
}

else if(isset($_POST["btnDelete"]))
{
  $id = $_POST['user_check'];
  while (list($key, $val) = @each ($id))
  {
    mysqli_query($con, "DELETE FROM users WHERE user_ID = '$val' ");
  }

  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `users`  ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $searchQuery = mysqli_query($con, $searchRecord);
}

else if(isset($_POST["btnEdit"]))
{
  if (isset($_POST["user_check"]))
  {
    $dept_ID_E = $_POST['dept_ID_E'];
    $desig_ID_E = $_POST['desig_ID_E'];
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      if ($dept_ID_E != "Select" && $desig_ID_E != "Select")
      {
        mysqli_query($con, "UPDATE users SET dept_ID='$dept_ID_E', desig_ID='$desig_ID_E' WHERE user_ID = '$val' ");
      }

      else if ($dept_ID_E == "Select" && $desig_ID_E != "Select")
      {
        mysqli_query($con, "UPDATE users SET desig_ID='$desig_ID_E' WHERE user_ID = '$val' ");
      }

      else if ($dept_ID_E != "Select" && $desig_ID_E == "Select")
      {
        mysqli_query($con, "UPDATE users SET dept_ID='$dept_ID_E' WHERE user_ID = '$val' ");
      }

      //echo $val;
      // header("Location: editSelected.php?user_id=$url");
    }

    //echo $dept_ID_E;

    /*$editUsers = $_POST['user_check'];
    $editUsersTwo = serialize($editUsers);
    $str_arr = unserialize($editUsers);*/
    // header("Location: editSelected.php?user_id=$url");

    $clause = " WHERE ";//Initial clause
    $searchRecord="SELECT * FROM `authdetails`  ";

        // if user is giving the middle name
        if(!empty($_POST['user_mName']))
        {
            $user_mName = $_POST['user_mName'];
            $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
            $user_mName = 1;
        }
        else
        {
          $user_mName = 0;
        }

        // if user is giving the first name
        if(!empty($_POST['user_fName']))
        {
            if($user_mName == 1)
            {
              $clause = " AND ";
            }
            $user_fName = $_POST['user_fName'];
            $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
            $fNameStatus = 1;
        }
        else
        {
          $fNameStatus = 0;
        }

        // if user is selecting any department
        if(!empty($_POST['dept_list']))
        {
            if($fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['dept_list'] as $c)
            {
                if(!empty($c)){
                    $searchRecord .= $clause."`dept_ID` = '{$c}'";
                    $clause = " OR ";
                }   
            }
            $deptStatus = 1;
        }
        else
        {
          $deptStatus = 0;
        }

        // if user is selecting any designation
        if(!empty($_POST['desig_list']))
        {
            if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
            {
              $clause = " AND ";
            }
            foreach($_POST['desig_list'] as $d)
            {
                if(!empty($d))
                {
                    $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                    $clause = " OR ";
                }   
            }
        }
        else
        {
          // echo "Nothing Selected.";
        }
    // echo $sql; //Remove after testing
    $searchQuery = mysqli_query($con, $searchRecord);
  }

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "viewAuthorizations.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnExport_D"]))
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `authdetails`  ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $searchQuery = mysqli_query($con, $searchRecord);

  $exportOptions = $_POST['exportOptions'];
  if ($exportOptions == "Select")
  {

  }
  else if ($exportOptions == "excel")
  {
    header("Location: downloadtable_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "csv")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("downloadtableCSV_U.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
  else if ($exportOptions == "pdf")
  {
    echo '<script type="text/javascript" language="Javascript">window.open("pdftable_U.php?searchRecord=$searchRecord");</script>';
    //header("Location: downloadtableCSV_U.php?searchRecord=$searchRecord");
  }
}

else
{
  $clause = " WHERE ";//Initial clause
  $searchRecord="SELECT * FROM `authdetails`  ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $user_mName = $_POST['user_mName'];
          $searchRecord .= $clause."`user_lName` LIKE '%$user_mName%'";
          $user_mName = 1;
      }
      else
      {
        $user_mName = 0;
      }

      // if user is giving the first name
      if(!empty($_POST['user_fName']))
      {
          if($user_mName == 1)
          {
            $clause = " AND ";
          }
          $user_fName = $_POST['user_fName'];
          $searchRecord .= $clause."`user_fName` LIKE '%$user_fName%'";
          $fNameStatus = 1;
      }
      else
      {
        $fNameStatus = 0;
      }

      // if user is selecting any department
      if(!empty($_POST['dept_list']))
      {
          if($fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['dept_list'] as $c)
          {
              if(!empty($c)){
                  $searchRecord .= $clause."`dept_ID` = '{$c}'";
                  $clause = " OR ";
              }   
          }
          $deptStatus = 1;
      }
      else
      {
        $deptStatus = 0;
      }

      // if user is selecting any designation
      if(!empty($_POST['desig_list']))
      {
          if($deptStatus == 1 OR $fNameStatus == 1 OR $user_mName == 1)
          {
            $clause = " AND ";
          }
          foreach($_POST['desig_list'] as $d)
          {
              if(!empty($d))
              {
                  $searchRecord .= $clause."`desig_ID` LIKE '%{$d}%'";
                  $clause = " OR ";
              }   
          }
      }
      else
      {
        // echo "Nothing Selected.";
      }
  // echo $sql; //Remove after testing
  $searchQuery = mysqli_query($con, $searchRecord);
  // echo $searchRecord;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorizations</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
  
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/add_user.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->

	<script src="js/jquery-3.3.1.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

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

<style type="text/css">
#popupMEdit .modal-content {
    width: 700px;
}
#usrtble th div:focus {
   display: none;
}
#usrtble th:focus {
   display: none;
}

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
#tblebtn ul li {
   list-style: none;
   display: inline-block;
}
.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#usrtble_length {
    float: right;
    margin: 3px 10px;
}

.confirmTable-modal .Popup_bdy button {
    float: none;
}

.confirmTable2-modal .Popup_bdy button {
    float: none;
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
          <a href="Usermodules.php" class="btn btn-info">Roles</a>
          <a href="usertable.php" class="btn btn-info active">Show Roles</a>
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
           
           <?php include 'sidebar_widgets/user_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>
		
		<div class="Usertable">
		<div class="">
			<div class="col-md-12">
				<div class="user_create_btn">
          <div class="form_action_right_btn">
            <!-- Go back button code starting here -->
            <?php include('inc_widgets/backBtn.php'); ?>
            <!-- Go back button code ending here -->
          </div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="user_table-title">
					<h4>Roles Info Table</h4>
				</div>
        <form action="" method="POST">

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM authdetails_cus');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $auth_Name_cus = $rowUM['auth_Name_cus'];
            $add_U_cus = $rowUM['add_U_cus'];
            $update_U_cus = $rowUM['update_U_cus'];
            $delete_U_cus = $rowUM['delete_U_cus'];
            $view_U_cus = $rowUM['view_U_cus'];
            $deptView_cus = $rowUM['deptView_cus'];
            $deptAdd_cus = $rowUM['deptAdd_cus'];
            $deptDelete_cus = $rowUM['deptDelete_cus'];
            $deptEdit_cus = $rowUM['deptEdit_cus'];
            $desigView_cus = $rowUM['desigView_cus'];
            $desigAdd_cus = $rowUM['desigAdd_cus'];
            $desigDelete_cus = $rowUM['desigDelete_cus'];
            $desigEdit_cus = $rowUM['desigEdit_cus'];
            $roleView_cus = $rowUM['roleView_cus'];
            $roleAdd_cus = $rowUM['roleAdd_cus'];
            $roleDelete_cus = $rowUM['roleDelete_cus'];
            $roleEdit_cus = $rowUM['roleEdit_cus'];
            $empView_cus = $rowUM['empView_cus'];
            $empAdd_cus = $rowUM['empAdd_cus'];
            $empDelete_cus = $rowUM['empDelete_cus'];
            $empEdit_cus = $rowUM['empEdit_cus'];
            $leaveView_cus = $rowUM['leaveView_cus'];
            $leaveAdd_cus = $rowUM['leaveAdd_cus'];
            $leaveDelete_cus = $rowUM['leaveDelete_cus'];
            $leaveEdit_cus = $rowUM['leaveEdit_cus'];
            $siView_cus = $rowUM['siView_cus'];
            $siAdd_cus = $rowUM['siAdd_cus'];
            $siEdit_cus = $rowUM['siEdit_cus'];
            $siDelete_cus = $rowUM['siDelete_cus'];
            $seView_cus = $rowUM['seView_cus'];
            $seAdd_cus = $rowUM['seAdd_cus'];
            $seEdit_cus = $rowUM['empDelete_cus'];
            $seDelete_cus = $rowUM['seDelete_cus'];
            $aiView_cus = $rowUM['aiView_cus'];
            $aiAdd_cus = $rowUM['aiAdd_cus'];
            $aiEdit_cus = $rowUM['aiEdit_cus'];
            $aiDelete_cus = $rowUM['aiDelete_cus'];
            $aeView_cus = $rowUM['aeView_cus'];
            $aeAdd_cus = $rowUM['aeAdd_cus'];
            $aeEdit_cus = $rowUM['aeEdit_cus'];
            $aeDelete_cus = $rowUM['aeDelete_cus'];
          }

          ?>

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
                        <button type="button" class="remove">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>
          <div class="leave-manage-sec-table widget_iner_box ">
            <div class="tbleDrpdown">
               <div id="tblebtn">
                  <ul>
                    <!-- <li><button type="button" id="myBtn"> <i class="fa fa-pencil"></i> Edit</button></li>
                    <li><button type="button" id="btnDelete_C"><i class="fa fa-trash"></i>  Delete</button></li> -->
                    <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printtable_U.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExport"> <i class="fa fa-pencil"></i><a href="downloadtable_U.php?searchRecord=<?php echo $searchRecord ?>"> Export to Excel</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExportCSV"> <i class="fa fa-pencil"></i><a href="downloadtableCSV_U.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Export to CSV</a></button></li> -->
                    <!-- <li><button type="button" id="btnExport"><i class="fa fa-pencil"></i>  PDF</button></li> -->
                    <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                    <!-- <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li> -->

                  </ul>
                </div>
            </div>

    					<table  id="usrtble" class="display nowrap no-footer" style="width:100%">
                        
    					         <thead>
    					                    <tr>
                                  <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <th>Authorization ID</th>
                                  <th>Authorization Name</th>
                                  <!-- <th>View</th> -->
                                  <th>Edit</th>
                                  <!-- <th>Delete</th> -->
                              </tr>
    					         </thead>
            					        <tbody>

                                               	<?php

                                                          while ($searchRow= mysqli_fetch_array($searchQuery))
                                                          {

                                                            $id = $searchRow['SrNo'];
                                                            $auth_Name = $searchRow['auth_Name'];
                                                            
                                                           // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);

                                                        ?>

                                                          <tr id="<?php echo $id; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $searchRow['SrNo'] .' " /></td>'; ?>
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->
                                                           
                                                            <td><?php echo $id; ?></td>
                                                            <td><?php echo $auth_Name; ?></td>
                                                            <!-- <td><a href="searchResult_U.php?user_id=<?php echo $searchRow['user_ID']; ?>">View</td> -->
                                                            <td><a href="viewAuthorizations_Edit.php?SrNo=<?php echo $searchRow['SrNo']; ?>">Edit</td>
                                                            <!-- <td><a href="#" data-toggle="modal" data-target="#deleteTable_C2" >Delete</td> -->
                                                        </tr>
                                                        <?php
                                                          }
                                                        ?>

            					        </tbody>		     
    					</table> 
          </div>    
          </form>
			</div>
		</div>
	</div>

<script>

  $(document).ready(function() {
    $('#usrtble').DataTable({
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
$(".remove").click(function(){
  var id = $(this).parents("tr").attr("id");

      $.ajax({
         url: 'deleteUserCode.php?user_id=<?php echo $id; ?>',
         type: 'GET',
         data: {id: id},
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              $("#deleteTable_C2").modal('hide');
               
         }
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

<script>
$(document).ready(function(){
  $("#exportBtn").click(function(){
    $("#popupExport").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#cutomizeTable").click(function(){
    $("#customTable").modal();
  });
});
</script>

<script>
function newUser() {
  location.replace("add_user.php")
}
</script>

<script>
$(document).ready(function(){
  $("#btnDelete_C").click(function(){
    $("#deleteTable_C").modal();
  });
});
</script>

<script src="js/jquery.dataTables.min.js"></script>

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

<script src="js/bootstrap.min.js"></script>

</body>
</html>