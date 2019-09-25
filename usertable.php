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
  $userID_UM = 0;
  $userName_UM = 0;
  $userAddress_UM = 0;
  $userContact_UM = 0;
  $userEmail_UM = 0;
  $userDept_UM = 0;
  $userDesig_UM = 0;
  $userRole_UM = 0;
  $userRegion_UM = 0;
  $userDOB_UM = 0;
  $userDOJ_UM = 0;
  $userDOL_UM = 0;

  // Setting variables if 1
  if (isset($_POST['userID_UM']))
  {
    $userID_UM = 1;
  }
  if (isset($_POST['userName_UM']))
  {
    $userName_UM = 1;
  }
  if (isset($_POST['userAddress_UM']))
  {
    $userAddress_UM = 1;
  }
  if (isset($_POST['userContact_UM']))
  {
    $userContact_UM = 1;
  }
  if (isset($_POST['userEmail_UM']))
  {
    $userEmail_UM = 1;
  }
  if (isset($_POST['userDept_UM']))
  {
    $userDept_UM = 1;
  }
  if (isset($_POST['userDesig_UM']))
  {
    $userDesig_UM = 1;
  }
  if (isset($_POST['userRole_UM']))
  {
    $userRole_UM = 1;
  }
  if (isset($_POST['userRegion_UM']))
  {
    $userRegion_UM = 1;
  }
  if (isset($_POST['userDOB_UM']))
  {
    $userDOB_UM = 1;
  }
  if (isset($_POST['userDOJ_UM']))
  {
    $userDOJ_UM = 1;
  }
  if (isset($_POST['userDOL_UM']))
  {
    $userDOL_UM = 1;
  }

  $updateUM = mysqli_query($con, "UPDATE tableview_um SET userID_UM = '$userID_UM', userName_UM='$userName_UM', userAddress_UM='$userAddress_UM', userContact_UM='$userContact_UM', userEmail_UM='$userEmail_UM', userDept_UM='$userDept_UM', userDesig_UM='$userDesig_UM', userRole_UM='$userRole_UM', userRegion_UM='$userRegion_UM', userDOB_UM='$userDOB_UM', userDOJ_UM='$userDOJ_UM', userDOL_UM='$userDOL_UM' WHERE SrNo= '1' ");

  $clause = " WHERE user_active='Active' AND ";//Initial clause
  $searchRecord="SELECT * FROM `users` WHERE user_active='Active' OR user_active='Deactived' ";

      // if user is giving the middle name
      if(!empty($_POST['user_mName']))
      {
          $searchRecord="SELECT * FROM `users` ";
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
          $searchRecord="SELECT * FROM `users` ";
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
              $searchRecord="SELECT * FROM `users` ";
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
                  $searchRecord="SELECT * FROM `users` ";
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

else if(isset($_POST["btnActivate"]))
{
  if (isset($_POST["user_check"]))
  {
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      mysqli_query($con, "UPDATE users SET user_active='Active' WHERE user_ID = '$val' ");
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

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to activate.");'; 
    echo 'window.location.href = "usertable.php";';
    echo '</script>';
  }
}

else if(isset($_POST["btnDeactivate"]))
{
  if (isset($_POST["user_check"]))
  {
    $id = $_POST['user_check'];
    while (list($key, $val) = @each ($id))
    {
      mysqli_query($con, "UPDATE users SET user_active='Deactived' WHERE user_ID = '$val' ");
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

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to deactivate.");'; 
    echo 'window.location.href = "usertable.php";';
    echo '</script>';
  }
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

  else
  {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please select something to edit.");'; 
    echo 'window.location.href = "usertable.php";';
    echo '</script>';
  }
  
}

else if(isset($_POST["btnExport_D"]))
{
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
  $searchRecord="SELECT * FROM `users` WHERE user_active='Active' OR user_active='Deactived' ";

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
	<title>Search User Result</title>
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">User Management</a>
          <a href="usertable.php" class="btn btn-info active">Show Users</a>
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
          <button type="button" id="btnNewUser" onclick="newUser();">New User</button>
				</div>
			</div>

			<div class="col-md-12">
				<div class="user_table-title">
					<h4>User Info Table</h4>
				</div>
        <form action="" method="POST">

          <div class="confirmTable-modal modal fade" id="activateTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to activate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnActivate">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>

          <div class="confirmTable-modal modal fade" id="deactivateTable_C" role="dialog">
            <div class="modal-dialog">
                  <div class="modal-content pop_up_content">
                      <div class="modal-header pop_up-header">
                        <button type="button" class="close pop_close_btn" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title pop_title">Confirmation</h4>
                      </div>
                      <div class="modal-body Popup_bdy">
                        <div class="input-feild">
                            <p>Do you really want to deactivate selected records?</p>
                            
                        </div>
                        <button type="submit" name="btnDeactivate">Yes</button>
                        <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>
                      </div>
                 </div>
              </div>
          </div>

          <!-- Table Customization -->
          <?php

          // Searching for search field customization
          $selectUM = mysqli_query($con, 'SELECT * FROM tableview_um');

          while ($rowUM = mysqli_fetch_array($selectUM))
          {
            $userID_UM = $rowUM['userID_UM'];
            $userName_UM = $rowUM['userName_UM'];
            $userAddress_UM = $rowUM['userAddress_UM'];
            $userContact_UM = $rowUM['userContact_UM'];
            $userEmail_UM = $rowUM['userEmail_UM'];
            $userDept_UM = $rowUM['userDept_UM'];
            $userDesig_UM = $rowUM['userDesig_UM'];
            $userRole_UM = $rowUM['userRole_UM'];
            $userRegion_UM = $rowUM['userRegion_UM'];
            $userDOB_UM = $rowUM['userDOB_UM'];
            $userDOJ_UM = $rowUM['userDOJ_UM'];
            $userDOL_UM = $rowUM['userDOL_UM'];
          }

          ?>
          <div class="modal fade symfra_popup3" id="customTable" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select Fields to view on Table</h4>
                          </div>
                          <div class="modal-body">
                            
                              <?php

                              echo '<div class="col-md-4">';
                              if ($userID_UM == 1)
                              {
                                echo '<input type="checkbox" name="userID_UM" checked> <label>User ID</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userID_UM" > <label>User ID</label> <br>';
                              }

                              if ($userName_UM == 1)
                              {
                                echo '<input type="checkbox" name="userName_UM" checked> <label>User Name</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userName_UM" > <label>User Name</label> <br>';
                              }

                              if ($userAddress_UM == 1)
                              {
                                echo '<input type="checkbox" name="userAddress_UM" checked> <label>Address</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userAddress_UM" > <label>Address</label> <br>';
                              }

                              if ($userContact_UM == 1)
                              {
                                echo '<input type="checkbox" name="userContact_UM" checked> <label>Contact</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userContact_UM" > <label>Contact</label> <br>';
                              }
                              echo '</div>';

                              echo '<div class="col-md-4">';
                              if ($userEmail_UM == 1)
                              {
                                echo '<input type="checkbox" name="userEmail_UM" checked> <label>Email Address</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userEmail_UM" > <label>Email Address</label> <br>';
                              }

                              if ($userDept_UM == 1)
                              {
                                echo '<input type="checkbox" name="userDept_UM" checked> <label>Department</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userDept_UM" > <label>Department</label> <br>';
                              }

                              if ($userDesig_UM == 1)
                              {
                                echo '<input type="checkbox" name="userDesig_UM" checked> <label>Designation</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userDesig_UM" > <label>Designation</label> <br>';
                              }

                              if ($userRole_UM == 1)
                              {
                                echo '<input type="checkbox" name="userRole_UM" checked> <label>Role</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userRole_UM" > <label>Role</label> <br>';
                              }
                              echo '</div>';

                              if ($userRegion_UM == 1)
                              {
                                echo '<input type="checkbox" name="userRegion_UM" checked> <label>Region</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userRegion_UM" > <label>Region</label> <br>';
                              }

                              if ($userDOB_UM == 1)
                              {
                                echo '<input type="checkbox" name="userDOB_UM" checked> <label>Date of Birth</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userDOB_UM" > <label>Date of Birth</label> <br>';
                              }

                              if ($userDOJ_UM == 1)
                              {
                                echo '<input type="checkbox" name="userDOJ_UM" checked> <label>Date of Joining</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userDOJ_UM" > <label>Date of Joining</label> <br>';
                              }

                              if ($userDOL_UM == 1)
                              {
                                echo '<input type="checkbox" name="userDOL_UM" checked> <label>Date of Leaving</label> <br>';
                              }
                              else
                              {
                                echo '<input type="checkbox" name="userDOL_UM" > <label>Date of Leaving</label> <br>';
                              }
                              
                              ?>
                            
                            <button type="submit" name="btnCustom_U">Submit</button>

                          <div class="modal-footer">
                            <p>Add Related content if needed</p>
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                          </div>
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

          <div class="modal fade symfra_popup2" id="popupMEdit" role="dialog">
            <div class="modal-dialog">
              <!-- Multi Edit-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Multi Edit</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields"> 
                      <label>Department</label>  
                      <select name="dept_ID_E" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectDept_E = mysqli_query($con, "select * from department");

                            while ($rowDept_E = mysqli_fetch_array($selectDept_E))
                            {
                              echo '<option value="'.$rowDept_E['dept_ID'].'">'.$rowDept_E['dept_name'].'</option>';
                            }

                            ?>

                      </select>  
                  </div>
                  <div class="input-fields"> 
                      <label>Designation</label>  
                      <select name="desig_ID_E" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectDesig_E = mysqli_query($con, "select * from designation");

                            while ($rowDesig_E = mysqli_fetch_array($selectDesig_E))
                            {
                              echo '<option value="'.$rowDesig_E['Desig_ID'].'">'.$rowDesig_E['Desig_name'].'</option>';
                            }

                            ?>

                      </select>  
                  </div>

                  <button type="submit" name="btnEdit" >Submit</button>

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
                    <li><button type="button" id="myBtn"> <i class="fa fa-pencil"></i> Edit</button></li>
                    <li><button type="button" id="btnActivate_C"><i class="fa fa-trash"></i>  Activate</button></li>
                    <li><button type="button" id="btnDeactivate_C"><i class="fa fa-trash"></i>  Deactivate</button></li>
                    <!-- <li><button type="submit" id="btnExport_P"> <i class="fa fa-print"></i><a href="printtable_U.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Print</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExport"> <i class="fa fa-pencil"></i><a href="downloadtable_U.php?searchRecord=<?php echo $searchRecord ?>"> Export to Excel</a></button></li> -->
                    <!-- <li><button type="submit" id="btnExportCSV"> <i class="fa fa-pencil"></i><a href="downloadtableCSV_U.php?searchRecord=<?php echo $searchRecord ?>" target="_blank"> Export to CSV</a></button></li> -->
                    <!-- <li><button type="button" id="btnExport"><i class="fa fa-pencil"></i>  PDF</button></li> -->
                    <li><button type="button" id="exportBtn"><i class="fa fa-download"></i>  Export</button></li>
                    <li><button type="button" id="cutomizeTable"><i class="fa fa-table"></i>  Table Customization</button></li>

                  </ul>
                </div>
            </div>

    					<table  id="usrtble" class="display nowrap no-footer" style="width:100%">
                        
    					         <thead>
    					                    <tr>
                                  <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
                                  <?php
                                  if ($userID_UM == 1)
                                  {
                                  ?>
                                  <th>User ID</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userName_UM == 1)
                                  {
                                  ?>
                                  <th>User Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userAddress_UM == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userContact_UM == 1)
                                  {
                                  ?>
                                  <th>Contact No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userEmail_UM == 1)
                                  {
                                  ?>
                                  <th>Email ID</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userDept_UM == 1)
                                  {
                                  ?>
                                  <th>Department</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userDesig_UM == 1)
                                  {
                                  ?>
                                  <th>Designation</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userRole_UM == 1)
                                  {
                                  ?>
                                  <th>Role</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userRegion_UM == 1)
                                  {
                                  ?>
                                  <th>Region</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userDOB_UM == 1)
                                  {
                                  ?>
                                  <th>Date of Birth</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userDOJ_UM == 1)
                                  {
                                  ?>
                                  <th>Date of Joining</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($userDOL_UM == 1)
                                  {
                                  ?>
                                  <th>Date of Leaving</th>
                                  <?php
                                  }
                                  ?>
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Activate/Deactivate</th>
                              </tr>
    					         </thead>
            					        <tbody>

                                               	<?php

                                                          while ($searchRow= mysqli_fetch_array($searchQuery))
                                                          {
                                                            //$userID = $row['user_ID'];
                                                            $dept_ID = $searchRow['dept_ID'];
                                                            $selectDept = mysqli_query($con , "SELECT * FROM department WHERE dept_ID = '$dept_ID'");
                                                            $rowDept = mysqli_fetch_array($selectDept, MYSQLI_ASSOC);
                                                            if ($dept_ID == $rowDept['dept_ID'])
                                                            {
                                                              $dept_name = $rowDept['dept_name'];
                                                            }

                                                            $desig_ID = $searchRow['desig_ID'];
                                                            $selectDesig = mysqli_query($con , "SELECT * FROM designation WHERE Desig_ID = '$desig_ID'");
                                                            $rowDesig = mysqli_fetch_array($selectDesig, MYSQLI_ASSOC);
                                                            if ($desig_ID == $rowDesig['Desig_ID'])
                                                            {
                                                              $Desig_name = $rowDesig['Desig_name'];
                                                            }

                                                            $role_ID = $searchRow['role_ID'];
                                                            $selectRole = mysqli_query($con , "SELECT * FROM roles WHERE role_ID = '$role_ID'");
                                                            $rowRole = mysqli_fetch_array($selectRole, MYSQLI_ASSOC);
                                                            if ($role_ID == $rowRole['role_ID'])
                                                            {
                                                              $role_Name = $rowRole['role_Name'];
                                                            }
                                                            $id = $searchRow['user_ID'];

                                                            $userName = $searchRow['user_fName'] . ' ' . $searchRow['user_mName'] .' '.$searchRow['user_lName'];
                                                            $email = $searchRow['user_email'];
                                                            $contact = $searchRow['user_contact'];
                                                            $address = $searchRow['user_address'];
                                                            $doj = $searchRow['user_DOJ'];
                                                            $dob = $searchRow['user_DOB'];
                                                            $dol = $searchRow['user_DOL'];
                                                            $region = $searchRow['user_region'];
                                                            $user_active = $searchRow['user_active'];

                                                           // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);

                                                        ?>

                                                          <tr id="<?php echo $id; ?>">
                                                            <?php echo '<td><input type="checkbox" name="user_check[]" value="'. $searchRow['user_ID'] .' " /></td>'; ?>
                                                            <!-- Put if condition for variables and the put all td according to respective conditions -->
                                                            <?php
                                                            if ($userID_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $id; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userName_UM == 1)
                                                            {
                                                            ?>
                                                            <td><a href="searchResult_U.php?user_id=<?php echo $searchRow['user_ID']; ?>"><?php echo $userName; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userAddress_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $address; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userContact_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $contact; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userEmail_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $email; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userDept_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $dept_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userDesig_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $Desig_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userRole_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $role_Name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userRegion_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $region; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userDOB_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $dob; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userDOJ_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $doj; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($userDOL_UM == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $dol; ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><a href="searchResult_U.php?user_id=<?php echo $searchRow['user_ID']; ?>">View</td>
                                                            <td><a href="searchResult_UE.php?user_id=<?php echo $searchRow['user_ID']; ?>">Edit</td>
                                                            

                                                            <?php
                                                            if ($user_active == "Active")
                                                            {
                                                            ?>

                                                            <td><a href="deleteUser_Code.php?id=<?php echo $id; ?>" >Deactivate</td>

                                                            <?php
                                                            }

                                                            else
                                                            {
                                                            ?>

                                                            <td><a href="deleteUser_CodeI.php?id=<?php echo $id; ?>" >Activate</td>

                                                            <?php
                                                            }
                                                            ?>

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

<script>
$(document).ready(function(){
  $("#btnActivate_C").click(function(){
    $("#activateTable_C").modal();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#btnDeactivate_C").click(function(){
    $("#deactivateTable_C").modal();
  });
});
</script>

</body>
</html>