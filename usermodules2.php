<?php

include("manage/session.php");
include('manage/connection.php');
//session_start();

$selectUser = mysqli_query($con, "select * from users where user_ID='$username'");
while ($rowUser = mysqli_fetch_array($selectUser))
{
  $uID = $rowUser['user_ID'];
  $uName = $rowUser['user_fName'] . " " . $rowUser['user_mName'];
  $uImg = $rowUser['user_img'];
  $uAuth = $rowUser['Auth_ID'];
}

$selectAuth = mysqli_query($con, "select * from authorizationset where Auth_ID='$uAuth'");
while ($rowAuth = mysqli_fetch_array($selectAuth))
{
  $authName = $rowAuth['auth_Name'];
  // echo $authName;
}

$selectAuthDet = mysqli_query($con, "select * from authdetails where SrNo='$uAuth'");
while ($rowAuthDet = mysqli_fetch_array($selectAuthDet))
{
  $add_U = $rowAuthDet['add_U'];
  $update_U = $rowAuthDet['update_U'];
  $delete_U = $rowAuthDet['delete_U'];
  $view_U = $rowAuthDet['view_U'];
  $deptView = $rowAuthDet['deptView'];
  $deptAdd = $rowAuthDet['deptAdd'];
  $deptDelete = $rowAuthDet['deptDelete'];
  // echo $authName;
  $deptEdit = $rowAuthDet['deptEdit'];
  $desigView = $rowAuthDet['desigView'];
  $desigAdd = $rowAuthDet['desigAdd'];
  $desigDelete = $rowAuthDet['desigDelete'];
  $desigEdit = $rowAuthDet['desigEdit'];
  $roleView = $rowAuthDet['roleView'];
  $roleAdd = $rowAuthDet['roleAdd'];
  // echo $authName;
  $roleDelete = $rowAuthDet['roleDelete'];
  $roleEdit = $rowAuthDet['roleEdit'];
  $empView = $rowAuthDet['empView'];
  $empAdd = $rowAuthDet['empAdd'];
  $empDelete = $rowAuthDet['empDelete'];
  $empEdit = $rowAuthDet['empEdit'];
  $leaveView = $rowAuthDet['leaveView'];
  // echo $authName;
  $leaveAdd = $rowAuthDet['leaveAdd'];
  $leaveDelete = $rowAuthDet['leaveDelete'];
  $leaveEdit = $rowAuthDet['leaveEdit'];
  $siView = $rowAuthDet['siView'];
  $siAdd = $rowAuthDet['siAdd'];
  $siEdit = $rowAuthDet['siEdit'];
  $siDelete = $rowAuthDet['siDelete'];
  // echo $authName;
  $seView = $rowAuthDet['seView'];
  $seAdd = $rowAuthDet['seAdd'];
  $seEdit = $rowAuthDet['seEdit'];
  $seDelete = $rowAuthDet['seDelete'];
  $aiView = $rowAuthDet['aiView'];
  $aiAdd = $rowAuthDet['aiAdd'];
  $aiEdit = $rowAuthDet['aiEdit'];
  // echo $authName;
  $aiDelete = $rowAuthDet['aiDelete'];
  $aeView = $rowAuthDet['aeView'];
  $aeAdd = $rowAuthDet['aeAdd'];
  $aeEdit = $rowAuthDet['aeEdit'];
  $aeDelete = $rowAuthDet['aeDelete'];
}

// echo $auth_Name;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Modules</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
<link rel="stylesheet" href="css/modules.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/mega_menu.css">

<link rel="shortcut icon" type="image/png" href="images/favicon.png">

<script src="js/jquery-1.12.4.js"></script>

<style type="text/css">
.module_sec img {
    width: 50px;
    transition: all .5s ease-in-out;
    height: 50px;
    border-radius: 10px;
}
.col-md-2
{
  opacity: 0.5;
  pointer-events: none;
}
.active
{
  opacity: 1;
  pointer-events: auto;
}
/*.module_sec img:hover {
    width: 60px;
 
    height: 60px;
    border-radius: 100%;
}*/
/*.module_sec .col-md-2 h5 a:hover img{
    width: 60px;
 
    height: 60px;
    border-radius: 100%;
}*/
</style>
</head>

<body>


<?php include 'header.php';?>


<div class="user_info-bar">
  <div class="container">
    <div class="row">

          <div class="col-md-3">
            <div class="user_img">
            <?php echo '<img src="Profile Images/'.$uImg.'">'; ?>
            </div>
          </div>

          <div class="col-md-9">
              <div class="user_info_list">
                <ul>
                  <li><a href="#"> <span class="glyphicon glyphicon-user"></span><?php echo $uName; ?></a></li>
                  <li><a href="table.php"><span class="glyphicon glyphicon-credit-card"></span>Invoices</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-list"></span>Journal Batches</a></li>
                 </ul> 
                 <ul>
                  <li><a href="#"><span class="glyphicon glyphicon-flag"></span>My Flags</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-time"></span>Period Statuses</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-stats"></span>Report</a></li>
                </ul>
              </div>
          </div>

    </div>
  </div>
</div>

<div class="module_sec">
  <div class="container">
                <div class="row">
                                  <!--   <div class="hover04 column col-md-2">
                                    <div>
                                    <figure><img src="images/account_dashboard.jpeg"/></figure>
                                    <span>Hover Text</span>
                                    </div>
                                    </div> -->

                                    <?php
                                    if ($add_U == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                      <a href="add_user.php"><img src="images/user_management.jpg"></a>
                                      <h5> <a href="add_user.php"> User Management </a></h5>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <div class="col-md-2">
                                      <a href="add_user.php"><img src="images/user_management.jpg"></a>
                                      <h5> <a href="add_user.php"> User Management </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($empAdd == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                     <a href="hr_add_emp_info.php"><img src="images/account_dashboard.jpeg"></a> 
                                      <h5> <a href="hr_add_emp_info.php"> Human Resources </a></h5>
                                    </div>

                                    <?php
                                    }

                                    else
                                    {
                                    ?>

                                    <div class="col-md-2">
                                     <a href="hr_add_emp_info.php"><img src="images/account_dashboard.jpeg"></a> 
                                      <h5> <a href="hr_add_emp_info.php"> Human Resources </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="col-md-2 ">
                                      <a href="chart-of-accounts.php"><img src="images/activities.jpeg"></a>
                                 <h5> <a href="chart-of-accounts.php">Finance </a></h5>
                                    </div> 

                                    <?php
                                    if ($aiAdd == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                      <a href="air_freight_import.php"><img src="images/air_import.jpeg"></a>
                                  <h5>  <a href="air_freight_import.php"> Air Import </a></h5>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <div class="col-md-2 ">
                                      <a href="air_freight_import.php"><img src="images/air_import.jpeg"></a>
                                  <h5>  <a href="air_freight_import.php"> Air Import </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($aeAdd == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                      <a href="air_freight_export.php"><img src="images/air_export.jpeg"></a>
                                 <h5> <a href="air_freight_export.php">Air Export </a></h5>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <div class="col-md-2 ">
                                      <a href="air_freight_export.php"><img src="images/air_export.jpeg"></a>
                                 <h5> <a href="air_freight_export.php">Air Export </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="col-md-2 ">
                                      <img src="images/analytics.jpeg">
                                 <h5> <a href="#">Analytics </a></h5>
                                    </div>

                </div>
                <div class="row">

                                    <div class="col-md-2 ">
                                       <img src="images/analytics.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                   <h5> <a href="#">Billing </a></h5>
                                    </div>  
                                    <div class="col-md-2 ">
                                      <img src="images/expense_reporting.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Expense Reporting </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/invoices.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="table.php"> Invoices </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/revenue.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Revenue </br>Management </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/leads.jpeg">                                      
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="create_lead.php"> Leads </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/my_receipts.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> My Receipts </a></h5>
                                    </div>

                </div>

                <div class="row">

                                    <div class="col-md-2 ">
                                      <img src="images/oppertunities.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="Opportunities.php"> Opportunities  </a></h5>
                                    </div>  
                                    <div class="col-md-2 ">
                                      <img src="images/payable_dashboard.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Payable Dashboard </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/payment_distribution.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Payment Distribution </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/payments.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Payments </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/payroll_calculation.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Payroll Calculation </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/payroll_dashboard.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Payroll Dashboard </a></h5>
                                    </div>

                </div>


                 <div class="row">

                                    <div class="col-md-2 ">
                                      <img src="images/payroll_agrement.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Purchase Agreement </a></h5>
                                    </div>  
                                    <div class="col-md-2 ">
                                      <img src="images/purchase_order.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Purchase Order </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/purchase_requestion.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Purchase Request </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/quotes.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5><a href="#"> Quotes </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/payroll_calculation.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Reconciliation </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/regulatory_tax.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Regularity & Tax </a></h5>
                                    </div>

                </div>



                 <div class="row">

                                    <div class="col-md-2 ">
                                      <img src="images/revenue.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Revenue </a></h5>
                                    </div>

                                    <?php
                                    if ($seAdd == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                      <img src="images/sea_export.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Sea Export </a></h5>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <div class="col-md-2 ">
                                      <img src="images/sea_export.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Sea Export </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($siAdd == '1')
                                    {
                                    ?>

                                    <div class="col-md-2 active">
                                      <img src="images/sea_import.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Sea Import </a></h5>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <div class="col-md-2 ">
                                      <img src="images/sea_import.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Sea Import </a></h5>
                                    </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="col-md-2 ">
                                      <img src="images/supplier.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Supplier </a> </h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/territories.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Territories </a></h5>
                                    </div> 
                                    <div class="col-md-2 ">
                                      <img src="images/transection.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                  <h5> <a href="#"> Transaction </a></h5>
                                    </div>

                </div>
 </div>
</div>

</div>     

<script src="js/bootstrap.min.js"></script>

</body>
</html>
