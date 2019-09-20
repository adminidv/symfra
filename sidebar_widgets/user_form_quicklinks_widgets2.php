<?php
include 'manage/connection.php';

$selectUser = mysqli_query($con, "select * from users where user_ID='$username'");
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
}

// echo $authName;

if ($Quick == 'Hide')
{
 echo '<style type="text/css">
 .pnl{
   display: block;
 }
 .pnl2{
   display: none;
 }
 .u{
   display: block !important;
 }
 .pnl_u > a {
    background: #d2d0d0 !important; 
}
</style>';
}
else
{
 echo '<style type="text/css">
 .pnl{
   display: none;
 }
 .pnl2{
   display: none;
 }
 .u{
   display: none;
 }

</style>';
}
?>

<?php
if ($Quickhr == 'Hide')
{
echo '<style type="text/css">
.pnl{
  display: block;
}
.pnl2{
  display: none;
}
.h{
  display: block !important;
}
.pnl_h > a {
    background: #d2d0d0 !important;
}
</style>';
}
else
{
echo '<style type="text/css">
.h pnl{
  display: none;
}
.h pnl2{
  display: none;
}
.h{
  display: none;
}

</style>';
}
?>

<!-- <style type="text/css">
  .pnl{
    display: none;
  }
   .pnl2{
    display: none;
  }
</style> -->

<div class="sidebar-menu">
              <ul>

                <li class="header-menu">
                  <a id="flip" href="#" ><span class="sidebar_togletitle">Quick Links</span></a>
                </li>

                <!-- CRM -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>

                <li class="sidebar-dropdown pnl hide">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>CRM</span>
                  </a>
                   <div class="sidebar-submenu">
                    <ul>
                      <!-- <li>
                        <a href="add_customer.php" target="_blank">Add master Customer </a>
                      </li> -->

                      <li>
                        <a href="master_customer.php" target="_blank">Add Customer Master </a>
                      </li>
                      <li>
                        <a href="master_customer_table.php" target="_blank">View Customer Master </a>
                      </li>

                      <li>
                        <a href="customer_activity.php" target="_blank">Activity </a>
                      </li>
                      <li>
                        <a href="#" target="_blank">Generation Wizard </a>
                      </li>
                      <li>
                        <a href="customer_campaign.php" target="_blank">Compaign </a>
                      </li>
                      <li>
                        <a href="customer_opportunity.php" target="_blank">Opportunity </a>
                      </li>
                      <li>
                        <a href="customer_quotation.php" target="_blank">Sales Quotation </a>
                      </li>
                      <li>
                        <a href="customer_order.php" target="_blank">Sales Order </a>
                      </li>
                      <li>
                        <a href="#" target="_blank">CRM Activty </a>
                      </li>
                     
                    </ul>
                  </div>
                </li>

                <?php
                }
                else
                {
                ?>

                <!-- Hidden because user is HR -->

                <?php
                }
                ?>
                

                <!-- Financials -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl hide">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Financials</span>
                  </a>
                   <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="chart-of-accounts.php" target="_blank">Chart of Accounts </a>
                      </li>
                      <li>
                        <a href="#" target="_blank">Edit Chart of Accounts </a>
                      </li>
                     
                    </ul>
                  </div>
                </li>
                <?php
                }
                else
                {
                ?>

                <!-- Hidden because user is HR -->
                
                <?php
                }
                ?>
                

                <!-- HR -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Human Resource</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <li>
                        <a data-toggle="modal" data-target="#popup_2">Import Employee</a>
                      </li>
                      <li>
                        <a onclick="addemp()">Add Employee </a>
                      </li>
                      <li>
                        <a onclick="viewemp()">View Employee </a>
                      </li>
                      <li>
                        <a onclick="leave()">Leave Management</a>
                      </li>
                      <li>
                        <!-- <a onclick="Assignleave()">Assign Leave </a> -->
                      </li>             
                    </ul>
                  </div>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Human Resource</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <li>
                        <a data-toggle="modal" data-target="#popup_2">Import Employee</a>
                      </li>
                      <li>
                        <a onclick="addemp()">Add Employee </a>
                      </li>
                      <li>
                        <a onclick="viewemp()">View Employee </a>
                      </li>
                      <li>
                        <a onclick="leave()">Leave Management</a>
                      </li>
                      <li>
                        <a onclick="Assignleave()">Assign Leave </a>
                      </li>             
                    </ul>
                  </div>
                </li>
                <?php
                }
                ?>
                

                <!-- User Management -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl pnl_u">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>User Management</span>
                  </a>
                  <div class="sidebar-submenu u">
                    <ul>
                      <li>
                        <a onclick="Adduser()">Add User 
                        </a>
                      </li>
                      <li>
                        <a onclick="Adddept()">Add Department </a>
                      </li>
                      <li>
                        <a onclick="viewdept()">View Department </a>
                      </li>
                      
                      <li>
                        <a onclick="adddesg()">Add Designation </a>
                      </li>
                      <li>
                        <a onclick="viewdesg()">View Designation </a>
                      </li>
                       <li>
                        <a onclick="Addrole()">Add Roles </a>
                      </li>
                      <li>
                        <a onclick="viewrole()">View Roles </a>
                      </li>
                       <li>
                        <a onclick="viewuser()">View Users </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php
                }
                else
                {
                ?>

                <!-- Hidden because user is HR -->
                
                <?php
                }
                ?>
                

                <!-- Analysis -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Analysis</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Sales Report</a>
                      </li>
                      <li>
                        <a href="#">Finance Report</a>
                      </li>
                      <li>
                        <a href="#">add more</a>
                      </li>
                     
                    </ul>
                  </div>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Analysis</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Sales Report</a>
                      </li>
                      <li>
                        <a href="#">Finance Report</a>
                      </li>
                      <li>
                        <a href="#">add more</a>
                      </li>
                     
                    </ul>
                  </div>
                </li>
                <?php
                }
                ?>
                

                <!-- News -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>News</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      
                      <li>
                        <a href="#">Employee News</a>
                      </li>
                      <li>
                        <a href="#">Collections</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>News</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      
                      <li>
                        <a href="#">Employee News</a>
                      </li>
                      <li>
                        <a href="#">Collections</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php
                }
                ?>
                

               
                <li class="header-menu">
                   <a  id="flip2"  href="#"> <span class="sidebar_togletitle">Extra</span></a>
                </li>

                <li class="pnl2">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Documentation</span>
                  </a>
                </li>

                <li  class="pnl2">
                  <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                  </a>
                </li>

                <li  class="pnl2">
                  <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Examples</span>
                  </a>
                </li>


              </ul>
            </div>

<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $(".pnl").slideToggle();
  });
});
$(document).ready(function(){
  $("#flip2").click(function(){
    $(".pnl2").slideToggle("");
  });
});
</script>
<script>
function Adduser() {
  location.replace("add_user.php")
}
</script>
<script>
function Adddept() {
  location.replace("add_department.php")
}
</script>
<script>
function viewdept() {
  location.replace("viewdept.php")
}
</script>
<script>
function adddesg() {
  location.replace("add_designation.php")
}
</script>
<script>
function viewdesg() {
  location.replace("viewdesg.php")
}
</script>
<script>
function Addrole() {
  location.replace("add_roles.php")
}
</script>
<script>
function viewrole() {
  location.replace("viewrole.php")
}
</script>
<script>
function viewuser() {
  location.replace("usertable.php")
}
</script>
<script>
function addemp() {
  location.replace("hr_add_emp_info.php")
}
</script>
<script>
function viewemp() {
  location.replace("emptable.php")
}
</script>
<script>
function leave() {
  location.replace("emp_leave_manage_setup.php")
}
</script>
<script>
function Assignleave() {
  location.replace("emp_leave_app.php?pgSt=AlEmp")
}
</script>

