<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'HR';
$subRibbon = 'addEmp';
$Quick = 'UnHide';
$Quickhr = 'Hide';

if(isset($_POST['saveBtn']))
{
  // Setting the POST variables coming from form
  $auth_Name = $_POST['auth_Name'];
  $user_ID = $_POST['user'];

  $view_U = 0;
  $add_U = 0;
  $update_U = 0;
  $delete_U = 0;
  $deptView = 0;
  $deptAdd = 0;
  $deptEdit = 0;
  $deptDelete = 0;
  $desigView = 0;
  $desigAdd = 0;
  $desigEdit = 0;
  $desigDelete = 0;
  $roleView = 0;
  $roleAdd = 0;
  $roleEdit = 0;
  $roleDelete = 0;
  $empView = 0;
  $empAdd = 0;
  $empEdit = 0;
  $empDelete = 0;
  $leaveView = 0;
  $leaveAdd = 0;
  $leaveEdit = 0;
  $leaveDelete = 0;

  if (isset($_POST['view_U']))
  {
    $view_U = 1;
  }
  if (isset($_POST['add_U']))
  {
    $add_U = 1;
  }
  if (isset($_POST['update_U']))
  {
    $update_U = 1;
  }
  if (isset($_POST['delete_U']))
  {
    $delete_U = 1;
  }

  if (isset($_POST['deptView']))
  {
    $deptView = 1;
  }
  if (isset($_POST['deptAdd']))
  {
    $deptAdd = 1;
  }
  if (isset($_POST['deptEdit']))
  {
    $deptEdit = 1;
  }
  if (isset($_POST['deptDelete']))
  {
    $deptDelete = 1;
  }

  if (isset($_POST['desigView']))
  {
    $desigView = 1;
  }
  if (isset($_POST['desigAdd']))
  {
    $desigAdd = 1;
  }
  if (isset($_POST['desigEdit']))
  {
    $desigEdit = 1;
  }
  if (isset($_POST['desigDelete']))
  {
    $desigDelete = 1;
  }

  if (isset($_POST['roleView']))
  {
    $roleView = 1;
  }
  if (isset($_POST['roleAdd']))
  {
    $roleAdd = 1;
  }
  if (isset($_POST['roleEdit']))
  {
    $roleEdit = 1;
  }
  if (isset($_POST['roleDelete']))
  {
    $roleDelete = 1;
  }

  if (isset($_POST['empView']))
  {
    $empView = 1;
  }
  if (isset($_POST['empAdd']))
  {
    $empAdd = 1;
  }
  if (isset($_POST['empEdit']))
  {
    $empEdit = 1;
  }
  if (isset($_POST['empDelete']))
  {
    $empDelete = 1;
  }

  if (isset($_POST['leaveView']))
  {
    $leaveView = 1;
  }
  if (isset($_POST['leaveAdd']))
  {
    $leaveAdd = 1;
  }
  if (isset($_POST['leaveEdit']))
  {
    $leaveEdit = 1;
  }
  if (isset($_POST['leaveDelete']))
  {
    $leaveDelete = 1;
  }

  // Inserting records to Authorization Set
  $insertAuthSet = mysqli_query($con, "insert into authorizationSet (auth_Name) values ('$auth_Name')");

  // Inserting records to Authorization Details
  $insertAuthDetails = mysqli_query($con, "insert into authDetails (auth_Name, add_U, update_U, delete_U, view_U, deptView, deptAdd, deptDelete, deptEdit, desigView, desigAdd, desigDelete, desigEdit, roleView, roleAdd, roleDelete, roleEdit, empView, empAdd, empDelete, empEdit, leaveView, leaveAdd, leaveDelete, leaveEdit) values ('$auth_Name', '$add_U', '$update_U', '$delete_U', '$view_U', '$deptView', '$deptAdd', '$deptDelete', '$deptEdit', '$desigView', '$desigAdd', '$desigDelete', '$desigEdit', '$roleView', '$roleAdd', '$roleDelete', '$roleEdit', '$empView', '$empAdd', '$empDelete', '$empEdit', '$leaveView', '$leaveAdd', '$leaveDelete', '$leaveEdit')");

  $selectAuthName = mysqli_query($con, "SELECT * FROM authorizationSet WHERE auth_Name = '$auth_Name' ");
  while ($rowAuthName = mysqli_fetch_array($selectAuthName))
  {
    $sendAuthID = $rowAuthName['Auth_ID'];
  }

  //Inserting records to Assign Authorization table
  $insertAuthSet = mysqli_query($con, "insert into authAssign (dept_Name, desig_Name, auth_Name) values ('0', '0', '$sendAuthID')");

  if ($insertAuthSet)
  {
    // Generating the alert
    $msg = "Authorization assigned successfully.";
    function alert($msg)
    {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    alert($msg);
  }

  else
  {
    // Generating the alert
    $msg2 = "Got error.";
    function alert($msg2)
    {
      echo "<script type='text/javascript'>alert('$msg2');</script>";
    }
    alert($msg2);
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Custom Authorization</title>
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
  <script src="/js/jquery-1.12.4.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->

  <script src="js/sidebar.js"></script>
  <script src="js/jquery.min.js"></script>

<style type="text/css">
.authtable_subhdingnRow {
background-color: #c1c1c1 !important;

}
.authtable_subhdingnRow th {
background-color: #c1c1c1 !important;

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
          <a href="Usermodules.php" class="btn btn-info">Human Resource</a>
          <a href="#" class="btn btn-info active">Custom Authorization</a>
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

           <?php include 'sidebar_widgets/adv_hr_bar.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class=" add_user_sec main_widget_box">
  <div class="">
                  <!-- <hr> -->
    <form action="" method="POST" enctype="multipart/form-data">

       <!-- Modal One-->
       <div class="modal fade confirmTable-modal" id="submitModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure You Want to save it to draft?</p>
                  <button type="submit" name="saveBtn">Yes</button>
                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
       </div>

       <label id="formSummary" style="color: red;"></label>

        <div class="Bsic_usr_info widget_iner_box">

                <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                                  <!-- Go back button code starting here -->
                                  <?php include('inc_widgets/backBtn.php'); ?>
                                  <!-- Go back button code ending here -->
                    </div>
                    <button type="button" id="btnConfirm_Su" onclick="submitMod_F();"> <small>Submit</small></button>
                    <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                </div>
                        
                        <div class="cls"></div>

                 <div class="col-md-6">         

                                                <div class="input-label"><label >Select User </label></div>
                                                <div class="input-feild">
                                                <select name="user" title="user">
                                                  <?php

                                                    $selectUser = mysqli_query($con, "select * from users");
                                                    while ($rowUser = mysqli_fetch_array($selectUser))
                                                    {
                                                      $userName = $rowUser['user_fName'] . ' ' . $rowUser['user_mName'] . ' ' . $rowUser['user_lName'];
                                                      echo '<option value="'.$rowUser['user_ID'].'">'.$userName.'</option>';
                                                    }

                                                    $selectHR = mysqli_query($con, "select * from empinfo");
                                                    while ($rowHR = mysqli_fetch_array($selectHR))
                                                    {
                                                      $userNameHR = $rowHR['empFName'] . ' ' . $rowHR['empMName'] . ' ' . $rowHR['empLName'];
                                                      echo '<option value="'.$rowHR['user_ID'].'">'.$userNameHR.'</option>';
                                                    }

                                                  ?>
                                                </select>
                                                </div>     

                                                <div class="input-label"><label >Authorization Name </label></div>
                                                <div class="input-feild">
                                                <input type="text" name="auth_Name">
                                                </div>                                                                                   
                                 </div>

                                <table  id="authtable" class="display nowrap no-footer" style="width:100%">
                                              
                                             <thead >
                                                        <tr colspan="">
                                                          <th></th>
                                                          <th>View</th>
                                                          <th>Add</th>
                                                          <th>Edit</th>
                                                          <th>Delete</th>

                                                        </tr>
                                              </thead>
                                              <tbody>
                                                         <!-- authrow title_row -->
                                                         <tr class="authtable_subhdingnRow">
                                                            <th rowspan="">User Management</th>
                                                            <td><input type="checkbox" name="umView"></td>
                                                            <td><input type="checkbox" name="umAdd"></td>
                                                            <td><input type="checkbox" name="umEdit"></td>
                                                            <td><input type="checkbox" name="umDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>User</td>
                                                            <td><input type="checkbox" name="view_U"></td>
                                                            <td><input type="checkbox" name="add_U"></td>
                                                            <td><input type="checkbox" name="update_U"></td>
                                                            <td><input type="checkbox" name="delete_U"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Deparment</td>
                                                            <td><input type="checkbox" name="deptView"></td>
                                                            <td><input type="checkbox" name="deptAdd"></td>
                                                            <td><input type="checkbox" name="deptEdit"></td>
                                                            <td><input type="checkbox" name="deptDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Designation</td>
                                                            <td><input type="checkbox" name="desigView"></td>
                                                            <td><input type="checkbox" name="desigAdd"></td>
                                                            <td><input type="checkbox" name="desigEdit"></td>
                                                            <td><input type="checkbox" name="desigDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Roles</td>
                                                            <td><input type="checkbox" name="roleView"></td>
                                                            <td><input type="checkbox" name="roleAdd"></td>
                                                            <td><input type="checkbox" name="roleEdit"></td>
                                                            <td><input type="checkbox" name="roleDelete"></td>
                                                         </tr>

                                                         <!-- authrow title_row -->
                                                         <tr class="authtable_subhdingnRow">
                                                            <th rowspan="">Human Resources</th>
                                                            <td><input type="checkbox" name="hrView"></td>
                                                            <td><input type="checkbox" name="hrAdd"></td>
                                                            <td><input type="checkbox" name="hrEdit"></td>
                                                            <td><input type="checkbox" name="hrDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Employee</td>
                                                            <td><input type="checkbox" name="empView"></td>
                                                            <td><input type="checkbox" name="empAdd"></td>
                                                            <td><input type="checkbox" name="empEdit"></td>
                                                            <td><input type="checkbox" name="empDelete"></td>
                                                         </tr>

                                                         <tr>
                                                            <td>Leaves</td>
                                                            <td><input type="checkbox" name="leaveView"></td>
                                                            <td><input type="checkbox" name="leaveAdd"></td>
                                                            <td><input type="checkbox" name="leaveEdit"></td>
                                                            <td><input type="checkbox" name="leaveDelete"></td>
                                                         </tr>
                                              </tbody>
                </table> 

                </div>

                
        </div>      
                    <div class="cls"></div>
                    <hr>

      
    </form>
        

  </div>
</div>



<script>

  $(document).ready(function() {
     $('#authtable').DataTable({
      "ordering": false
    } );
} );

</script>

<script type="text/javascript">
   function submitMod_F()
   {
    $("#submitModal").modal();
   }
</script>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>



</body>
</html>