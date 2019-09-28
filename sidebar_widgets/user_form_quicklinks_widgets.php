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

  $custView = $rowAuthDet['custView'];
  $custAdd = $rowAuthDet['custAdd'];
  $custEdit = $rowAuthDet['custEdit'];
  $custDelete = $rowAuthDet['custDelete'];
  $vendorView = $rowAuthDet['vendorView'];
  $vendorAdd = $rowAuthDet['vendorAdd'];
  $vendorEdit = $rowAuthDet['vendorEdit'];
  $vendorDelete = $rowAuthDet['vendorDelete'];
  $bpView = $rowAuthDet['bpView'];
  $bpAdd = $rowAuthDet['bpAdd'];
  $bpEdit = $rowAuthDet['bpEdit'];
  $bpDelete = $rowAuthDet['bpDelete'];
  
  $airportView = $rowAuthDet['airportView'];
  $airportAdd = $rowAuthDet['airportAdd'];
  $airportEdit = $rowAuthDet['airportEdit'];
  $airportDelete = $rowAuthDet['airportDelete'];
  $airlineView = $rowAuthDet['airlineView'];
  $airlineAdd = $rowAuthDet['airlineAdd'];
  $airlineEdit = $rowAuthDet['airlineEdit'];
  $airlineDelete = $rowAuthDet['airlineDelete'];
  $businessView = $rowAuthDet['businessView'];
  $businessAdd = $rowAuthDet['businessAdd'];
  $businessEdit = $rowAuthDet['businessEdit'];
  $businessDelete = $rowAuthDet['businessDelete'];
  $cityView = $rowAuthDet['cityView'];
  $cityAdd = $rowAuthDet['cityAdd'];
  $cityEdit = $rowAuthDet['cityEdit'];
  $cityDelete = $rowAuthDet['cityDelete'];
  $commodityView = $rowAuthDet['commodityView'];
  $commodityAdd = $rowAuthDet['commodityAdd'];
  $commodityEdit = $rowAuthDet['commodityEdit'];
  $commodityDelete = $rowAuthDet['commodityDelete'];
  $countryView = $rowAuthDet['countryView'];
  $countryAdd = $rowAuthDet['countryAdd'];
  $countryEdit = $rowAuthDet['countryEdit'];
  $countryDelete = $rowAuthDet['countryDelete'];
  $currencyView = $rowAuthDet['currencyView'];
  $currencyAdd = $rowAuthDet['currencyAdd'];
  $currencyEdit = $rowAuthDet['currencyEdit'];
  $currencyDelete = $rowAuthDet['currencyDelete'];
  $destinationView = $rowAuthDet['destinationView'];
  $destinationAdd = $rowAuthDet['destinationAdd'];
  $destinationEdit = $rowAuthDet['destinationEdit'];
  $destinationDelete = $rowAuthDet['destinationDelete'];
  $mopView = $rowAuthDet['mopView'];
  $mopAdd = $rowAuthDet['mopAdd'];
  $mopEdit = $rowAuthDet['mopEdit'];
  $mopDelete = $rowAuthDet['mopDelete'];
  $regionView = $rowAuthDet['regionView'];
  $regionAdd = $rowAuthDet['regionAdd'];
  $regionEdit = $rowAuthDet['regionEdit'];
  $regionDelete = $rowAuthDet['regionDelete'];
  $sectorView = $rowAuthDet['sectorView'];
  $sectorAdd = $rowAuthDet['sectorAdd'];
  $sectorEdit = $rowAuthDet['sectorEdit'];
  $sectorDelete = $rowAuthDet['sectorDelete'];
  $slView = $rowAuthDet['slView'];
  $slAdd = $rowAuthDet['slAdd'];
  $slEdit = $rowAuthDet['slEdit'];
  $slDelete = $rowAuthDet['slDelete'];
  $spoView = $rowAuthDet['spoView'];
  $spoAdd = $rowAuthDet['spoAdd'];
  $spoEdit = $rowAuthDet['spoEdit'];
  $spoDelete = $rowAuthDet['spoDelete'];
}

// echo $auth_Name;

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

<style type="text/css">
  .finan_subtitle{
    display: none;
  }
</style>

<div class="sidebar-menu">
              <ul>

                <li class="header-menu">
                  <a id="flip" href="#" ><span class="sidebar_togletitle">Quick Links</span></a>
                </li>

                <!-- Sale Orders -->

                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <!-- <img src="images/crm_1.png"> -->
                    <i class="fa fa-tachometer"></i>
                    <span>Sale Orders</span>
                  </a>
                   <div class="sidebar-submenu">
                    <ul>

                      <?php
                      if ($siView == '1' || $seView == '1' || $aiView == '1' || $aeView == '1')
                      {
                      ?>

                      <li>
                        <a href="so_air_export_table.php">View Sale Orders  </a>
                      </li>

                      <?php
                      }
                      ?>
            
                      <?php
                      if ($aeAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="sales_order_air_export.php">Add SO - Air Export  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($aiAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="sales_order_air_import.php">Add SO - Air Import  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($seAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="sales_order_sea_export.php">Add SO - Sea Export  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($siAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="sales_order_sea_import.php">Add SO - Sea Import  </a>
                      </li>

                      <?php
                      }
                      ?>

                    </ul>
                  </div>
                </li>

                <!-- CRM -->
                
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <!-- <img src="images/crm_1.png"> -->
                    <i class="fa fa-tachometer"></i>
                    <span>CRM</span>
                  </a>
                   <div class="sidebar-submenu">
                    <ul>
                      <?php
                      if ($custAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="master_customer.php" >Add Master Customer  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($custView == '1')
                      {
                      ?>

                      <li>
                        <a href="master_customer_table.php" >View Master Customer  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($vendorAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="master_vendor.php" >Add Master Vendor  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($vendorView == '1')
                      {
                      ?>

                      <li>
                        <a href="master_vendor_table.php" >View Master Vendor  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($bpAdd == '1')
                      {
                      ?>

                      <li>
                        <a href="master_bp.php" >Add Master BP  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($bpView == '1')
                      {
                      ?>

                      <li>
                        <a href="master_bp_table.php" >View Master BP  </a>
                      </li>

                      <?php
                      }
                      ?>

                      <li>
                        <a href="customer_activity.php" >Activity </a>
                      </li>
                      <li>
                        <a href="#" target="_blank">Generation Wizard </a>
                      </li>
                      <li>
                        <a href="customer_campaign.php" >Compaign </a>
                      </li>
                      <li>
                        <a href="customer_opportunity.php" >Opportunity </a>
                      </li>
                      <li>
                        <a href="customer_quotation.php" >Sales Quotation </a>
                      </li>
                      <li>
                        <a href="#" >CRM Activty </a>
                      </li>
                     
                    </ul>
                  </div>
                </li>
                

                <!-- Financials -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <!-- <img src="images/financial1.png"> -->
                    <i class="fa fa-tachometer"></i>
                    <span>Financials</span>
                  </a>
                   <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="CoA.php" >Chart of Accounts </a>
                      </li>
                      <li>
                        <a href="editcoa.php" >Edit Chart of Accounts </a>
                      </li>
                      <li>
                        <a href="account_code_generator.php" >Account Code Generator</a>
                      </li>
                      <li>
                        <a href="journal_entry.php" >Journal Entry</a>
                      </li>
                      <li>
                        <a href="posting_template.php" >Posting Template </a>
                      </li>
                      <li>
                        <a href="exchange_rate_differences.php" >Exchange Rate Difference </a>
                      </li>
                      <li>
                        <a href="journal_voucher.php" >Journal Voucher </a>
                      </li>
                      <li>
                        <a href="recurring_posting.php" >Recuring Posting</a>
                      </li>
                      <li>
                        <a href="#" >Reverse Transaction </a>
                      </li>
                       <li>
                        <a href="conversion_difference.php" >Conversion Difference </a>
                      </li>
                       <li>
                        <a href="1099_editing.php" >1099 Editing </a>
                      </li>

                       <li>
                        <a href="financial_report_template.php" >Financial Report Template </a>
                      </li>

                      <li>
                        <a href="#" id="flipmore">More</a>
                      </li>
                      <div class="pnlmore finan_subtitle">
                          </li>

                          <li>
                            <a id="flip4" href="#">Budget Setup</a>
                            <ul class="finan_subtitle pnl4">

                              <li> <a href="budget_scenarios.php">Budget Scenarios</a> </li>
                              <li> <a href="budget_distribution_method.php">Budget Distribution Method</a> </li>
                              <li> <a href="budget.php">Budget </a> </li>


                            </ul>
                          </li>


                          <li>
                            <a id="flip5" href="#">Cost Accounting</a>
                            <ul class="finan_subtitle pnl5">

                              <li> <a href="ca_cost_center.php">Cost Center</a> </li>
                              <li> <a href="ca_distribution_rules.php">Distribution Rules</a> </li>
                              <li> <a href="ca_table_cost_center_distribution_rule.php">Table Distrubution Rule</a> </li>
                              <li> <a href="ca_cost_center_hierarchy.php">Cost Center Hierarchy</a> </li>
                              <li> <a href="ca_cost_center_report.php">Cost Center Report</a> </li>
                              <li> <a href="ca_distribution_report.php"> Distribution Report</a> </li>
                              <li> <a href="ca_summary_report.php">Summary Report</a> </li>
                              <li> <a href="ca_accrual_type.php">Accrual Type</a> </li>
                              <li> <a href="ca_reconciliation.php"> Reconciliation</a> </li>
                              <li> <a href="ca_cost_elements.php">Cost Elements</a> </li>

                            </ul>
                          </li>

                          <li>
                            <a id="flip6" href="#">Financial Reports</a>
                            <ul class="finan_subtitle pnl6">

                              <li> <a href="fr_acc_gl_accounts_and_business_partners.php">G/L Accounts & B.P</a> </li>
                              <li> <a href="fr_acc_general_ledger.php">Accounts General Ledger</a> </li>
                              <li> <a href="fr_aging_customer_recieveable_aging.php">Customer Recieveable Aging</a> </li>
                              <li> <a href="fr_aging_vendor_liabilities_aging.php">Vendor Liabilities Aging</a> </li>
                              <li> <a href="fr_acc_transaction_report_projects.php">Transaction Report Projects</a> </li>
                              <li> <a href="fr_acc_transaction_journal_report.php">Transaction Journal Report</a> </li>
                              <li> <a href="fr_acc_locate_journal_transaction_by_amount_range.php">Locate Journal Transaction</a> </li>
                              <li> <a href="fr_acc_locate_journal_transaction_by_fc_amount_range.php">Locate Journal Transaction By FC</a> </li>
                              <li> <a href="fr_acc_transaction_recieved_voucher_report.php">Transaction Recieved Voucher Report</a> </li>
                              <li> <a href="fr_acc_document_journal.php">Document Journal</a> </li>
                              <li> <a href="fr_acc_1099-1096.php">1099-1096</a> </li>
                              <li> <a href="fr_acc_tax_customer_open_doc_list.php">Tax Customer Open Doc List</a> </li>
                              <li> <a href="fr_acc_financial_cash_flow.php">Financial Cash Flow</a> </li>
                              <li> <a href="fr_acc_financial_cash_statement.php">Financial Cash Statement</a> </li>
                              <li> <a href="fr_acc_financial_cash_flow_ref_report.php">Financial Cash Flow Report</a> </li>
                              <li> <a href="fr_acc_financial_balance_sheet.php">Financial Balance Sheet</a> </li>
                              <li> <a href="fr_acc_financial_trial_balance.php">Financial Trial Balance</a> </li>
                            </ul>
                          </li>

                          <li>
                            <a id="flip7" href="#">Comparison</a>
                            <ul class="finan_subtitle pnl7">

                              <li> <a href="fr_comparison_balance_sheet.php">FR Comparison Balance Sheet</a> </li>
                              <li> <a href="fr_comparison_profit_loss.php">FR Comparison Profit Loss</a> </li>
                              <li> <a href="fr_comparison_trail_balance.php">Fr Comparison Trail Balance </a> </li>

                            </ul>
                          </li>

                          <li>
                            <a id="flip8" href="#">Budget Report</a>
                            <ul class="finan_subtitle pnl8">
                              <li> <a href="fr_budget_report_profit_loss.php">FR Budget Report Profit Loss</a> </li>
                              <li> <a href="fr_budget_report_balance_sheet.php">FR Budget Report Balance Sheet</a> </li>
                              <li> <a href="fr_budget_report_report.php">FR Budget Report Report </a> </li>
                              <li> <a href="fr_budget_report_trial_balance.php">FR Budget Report Trial Balance </a> </li>
                            </ul>
                          </li>

                      </div>    

                    </ul>
                  </div>
                </li>
                <?php
                }
                ?>

                <!-- HR -->

                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Human Resource</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <?php
                      if ($authName == "Super Authorization")
                      {
                      ?>

                      <li>
                        <a data-toggle="modal" data-target="#popup_2">Import Employee</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($empAdd == "1")
                      {
                      ?>

                      <li>
                        <a onclick="addemp()">Add Employee </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($empView == "1")
                      {
                      ?>

                      <li>
                        <a onclick="viewemp()">View Employee </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($empAdd == "1")
                      {
                      ?>

                      <li>
                        <a onclick="leave()">Leave Management</a>
                      </li>

                      <li>
                        <a onclick="Assignleave()">Assign Leave </a>
                      </li>

                      <?php
                      }
                      ?>

                    </ul>
                  </div>
                </li>

                <!-- User Management -->

                <li class="sidebar-dropdown pnl pnl_u">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>User Management</span>
                  </a>
                  <div class="sidebar-submenu u">
                    <ul>
                      <?php
                      if ($add_U == "1")
                      {
                      ?>
                      <li>
                        <a onclick="Adduser()">Add User</a>
                      </li>
                      <?php
                      }
                      ?>

                      <?php
                      if ($deptAdd == "1")
                      {
                      ?>
                      <li>
                        <a onclick="Adddept()">Add Department </a>
                      </li>
                      <?php
                      }
                      ?>

                      <?php
                      if ($deptView == "1")
                      {
                      ?>
                      <li>
                        <a onclick="viewdept()">View Department </a>
                      </li>
                      <?php
                      }
                      ?>
                      
                      <?php
                      if ($desigAdd == "1")
                      {
                      ?>
                      <li>
                        <a onclick="adddesg()">Add Designation </a>
                      </li>
                      <?php
                      }
                      ?>

                      <?php
                      if ($desigView == "1")
                      {
                      ?>
                      <li>
                        <a onclick="viewdesg()">View Designation </a>
                      </li>
                      <?php
                      }
                      ?>

                      <?php
                      if ($view_U == "1")
                      {
                      ?>
                      <li>
                        <a onclick="viewuser()">View Users </a>
                      </li>
                      <?php
                      }
                      ?>

                    </ul>
                  </div>
                </li>

                <!-- Setups -->

                <li class="sidebar-dropdown pnl">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Setups</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>

                      <?php
                      if ($airportView == '1')
                      {
                      ?>

                      <li>
                        <a href="sub_agent_parties_table.php">Sub Agent</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($airportView == '1')
                      {
                      ?>

                      <li>
                        <a href="airport_setup_table.php">Airport</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($airlineView == '1')
                      {
                      ?>

                      <li>
                        <a href="airline_table.php">Airline</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($businessView == '1')
                      {
                      ?>

                      <li>
                        <a href="business_setup_table.php">Business </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($cityView == '1')
                      {
                      ?>

                      <li>
                        <a href="city_setup_table.php">City</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($cityView == '1')
                      {
                      ?>

                      <li>
                        <a href="clearing_agents_table.php">Clearing Agent</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($commodityView == '1')
                      {
                      ?>

                      <li>
                        <a href="commodity_setup.php">Commodity</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($commodityView == '1')
                      {
                      ?>

                      <li>
                        <a href="container_setup.php">Container</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($countryView == '1')
                      {
                      ?>

                      <li>
                        <a href="country_setup_table.php">Country</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($currencyView == '1')
                      {
                      ?>

                      <li>
                        <a href="currency_setup.php">Currency</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($destinationView == '1')
                      {
                      ?>

                      <li>
                        <a href="destination_setup_table.php">Destination</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($mopView == '1')
                      {
                      ?>

                      <li>
                        <a href="mop_setup_table.php">Modes Of Payment</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($sectorView == '1')
                      {
                      ?>

                      <li>
                       <a href="sector_setup.php">Sector</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($slView == '1')
                      {
                      ?>

                      <li>
                        <a href="shipLine_setup_table.php">Shipping Line</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($spoView == '1')
                      {
                      ?>

                      <li>
                        <a href="spo_setup_table.php">SPO</a>
                      </li>

                      <?php
                      }
                      ?>
                      
                    </ul>
                  </div>
                </li>

                <!-- Data Entry -->

                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Data Entry</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <?php
                      if ($aeAdd == "1")
                      {
                      ?>

                      <li>
                        <a href="dataentry_of_mawb_air_export.php">Air Export </a>
                      </li>
                      
                      <?php
                      }
                      ?>

                      <?php
                      if ($aiAdd == "1")
                      {
                      ?>

                      <li>
                        <a href="add_job_air_import.php">Air Import </a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($siAdd == "1")
                      {
                      ?>

                      <li>
                        <a href="sales_order_sea_import.php">Sea Import</a>
                      </li>

                      <?php
                      }
                      ?>

                      <?php
                      if ($seAdd == "1")
                      {
                      ?>

                      <li>
                        <a href="dataentry_of_mawb_sea_export.php">Sea Export </a>
                      </li>

                      <?php
                      }
                      ?>

                    </ul>
                  </div>
                </li>

                <!-- Authorizations -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Assign Roles</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <li>
                        <a href="assigning_authrization.php">Assign Roles </a>
                      </li> 
                      <li>
                        <a href="viewAuthorizations.php">All Roles </a>
                      </li>
                      <!-- <li>
                        <a href="customAuthorization.php?user_id=0">Custom Roles </a>
                      </li>  -->          
                    </ul>
                  </div>
                </li>
                <?php
                }
                ?>

                <!-- Approval Flow -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="sidebar-dropdown pnl pnl_h">
                  <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>Approval Flow</span>
                  </a>
                   <div class="sidebar-submenu h">
                    <ul>
                      <li>
                        <a href="newAppFlow.php">Add Approval Flow </a>
                      </li>             
                    </ul>
                  </div>
                </li>
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
                ?>

                <!-- Extra -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="header-menu">
                   <a  id="flip2"  href="#"> <span class="sidebar_togletitle">Extra</span></a>
                </li>
                <?php
                }
                ?>

                <!-- Documentation -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="pnl2">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Documentation</span>
                  </a>
                </li>
                <?php
                }
                ?>

                <!-- Calendar -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="pnl2">
                  <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                  </a>
                </li>
                <?php
                }
                ?>

                <!-- Examples -->
                <?php
                if ($authName == "Super Authorization")
                {
                ?>
                <li class="pnl2">
                  <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Examples</span>
                  </a>
                </li>
                <?php
                }
                ?>

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

$(document).ready(function(){
  $("#flip3").click(function(){
    $(".pnl3").slideToggle("");
  });
});

$(document).ready(function(){
  $("#flip4").click(function(){
    $(".pnl4").slideToggle("");
  });
});
$(document).ready(function(){
  $("#flip5").click(function(){
    $(".pnl5").slideToggle("");
  });
});
$(document).ready(function(){
  $("#flip6").click(function(){
    $(".pnl6").slideToggle("");
  });
});

$(document).ready(function(){
  $("#flip7").click(function(){
    $(".pnl7").slideToggle("");
  });
});
$(document).ready(function(){
  $("#flip8").click(function(){
    $(".pnl8").slideToggle("");
  });
});

$(document).ready(function(){
  $("#flipmore").click(function(){
    $(".pnlmore").slideToggle("");
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
  location.replace("emp_leave_app.php")
}
</script>

