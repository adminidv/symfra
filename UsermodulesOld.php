<?php

include("manage/session.php");
include('manage/connection.php');

$selectUser = mysqli_query($con, "select * from users where user_ID='$username'");
while ($rowUser = mysqli_fetch_array($selectUser))
{
  $uID = $rowUser['user_ID'];
  $uName = $rowUser['user_fName'] . " " . $rowUser['user_mName'];
  $uImg = $rowUser['user_img'];
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

<link rel="shortcut icon" type="image/png" href="images/favicon.png">



<script src="js/jquery-1.12.4.js"></script>

<style type="text/css">
.module_sec img {
    width: 50px;
    transition: all .5s ease-in-out;
    height: 50px;
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
                  <li><a href="#"> <span class="glyphicon glyphicon-user"></span> <?php echo $uName; ?></a></li>
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

                                    <div class="col-md-2">
                                      <img src="images/account_dashboard.jpeg">
                                      <h5> <a href="acount.php"> Acount Dashboard </a></h5>
                                    </div>  
                                    <div class="col-md-2">
                                      <img src="images/account_recievable.jpeg">
                                        <h5> <a href="#"> Acount Recieveables </a></a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/activities.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#">Activities </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/air_import.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5>  <a href="air_freight_import.php"> Air Import </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/air_export.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="air_freight_export.php">Air Export </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/Analytics.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#">Analytics </a></h5>
                                    </div> 
                </div>
                <div class="row">
                                    <div class="col-md-2">
                                       <img src="images/Analytics.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#">Billing </a></h5>
                                    </div>  
                                    <div class="col-md-2">
                                      <img src="images/Expense_reporting.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Expense Reporting </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/Invoices.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="table.php"> Invoices </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/revenue.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Revenue </br>Management </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/leads.jpeg">                                      
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="create_lead.php"> leads </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/my_receipts.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> My Receipts </a></h5>
                                    </div> 
                </div>

                <div class="row">
                                    <div class="col-md-2">
                                      <img src="images/Oppertunities.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="Opportunities.php"> Opportunities  </a></h5>
                                    </div>  
                                    <div class="col-md-2">
                                      <img src="images/Payable_dashboard.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Payable Dashboard </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/payment_distribution.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Payment Distribution </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/payments.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Payments </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/payroll_calculation.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Payroll Calculation </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/payroll_dashboard.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Payroll Dashboard </a></h5>
                                    </div> 
                </div>


                 <div class="row">
                                    <div class="col-md-2">
                                      <img src="images/payroll_agrement.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Purchase Agreement </a></h5>
                                    </div>  
                                    <div class="col-md-2">
                                      <img src="images/Purchase_order.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Purchase Order </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/purchase_requestion.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Purchase Requestion </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/quotes.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5><a href="#"> Quotes </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/payroll_calculation.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Reconciliation </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/regulatory_tax.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Regularity & Tax </a></h5>
                                    </div> 
                </div>



                 <div class="row">
                                    <div class="col-md-2">
                                      <img src="images/revenue.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Revenue </a></h5>
                                    </div>  
                                    <div class="col-md-2">
                                      <img src="images/sea_export.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Sea Export </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/sea_import.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Sea Import </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/supplier.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> supplier </a> </h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/territories.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Territories </a></h5>
                                    </div> 
                                    <div class="col-md-2">
                                      <img src="images/transection.jpeg">
<!--                                       <i class="glyphicon glyphicon-equalizer"></i>
 -->                                        <h5> <a href="#"> Transection </a></h5>
                                    </div> 
                </div>
 </div>
</div>



</div>     
    

<script src="js/bootstrap.min.js"></script>

</body>
</html>
