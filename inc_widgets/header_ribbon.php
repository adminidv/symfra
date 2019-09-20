<!DOCTYPE html>
<html>
<head>
  <title>header_ribbon</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">


<!--   <script src="js/jquery-1.12.4.js"></script>
 --> 
</head>
<body>


        <div class="user_info-bar">
          <div class="container-fluid">
            <div class="row">
                  <div class="col-md-12 user_prefence_modules">

                        <!-- Default Ribbon -->
                        <?php

                        if ($ribbon == 'Default')
                        {

                        ?>

                       <div class="prefence_module">

                          <div class="prf_module_img">
                             <div class="module_img active" target="1"  id="prfmodule1" onclick="changestation('prfmodule1')">
                               <img src="images/account.jpeg">
                               <div class="module_txt">
                                <label> <a href="#"> User Administration </a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>
                           <div class="prf_module_img">
                             <div class="module_img " target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">User List</a></label>
                               </div>
                             </div>
                                       
                          </div>
                      

                          <?php

                          }

                          else
                          {
                          
                          ?>

                         <div class="prf_module_img">
                             <div class="module_img " target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                                 <label> <a href="#">User List</a></label>
                               </div>
                             </div>
                                       
                          </div> 

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <div class="module_img " target="3"  id="prfmodule3" onclick="changestation('prfmodule3')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                                 <label> <a href="#">User Setup</a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                           <div class="prf_module_img">
                             <div class="module_img " target="3"  id="prfmodule3" onclick="changestation('prfmodule3')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">User Setup</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <?php
                          
                          }

                          ?>

                         
                          <div class="prf_module_img">
                             <div class="module_img " target="4"  id="prfmodule4" onclick="changestation('prfmodule4')">
                               <img src="images/invoices.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Authorization</a></label>
                               </div>
                             </div>
                                       
                          </div>

                       
                          <div class="prf_module_img">
                             <div class="module_img " target="5"  id="prfmodule5" onclick="changestation('prfmodule5')">
                               <img src="images/territories.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Territories</a></label>
                               </div>
                             </div>
                                       
                          </div>
 
                      
                           <div class="prf_module_img">
                             <div class="module_img " target="6"  id="prfmodule6" onclick="changestation('prfmodule6')">
                               <img src="images/leads.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Leads</a></label>
                             </div>
                             </div>
                                       
                          </div>

                        
                            <div class="prf_module_img">
                             <div class="module_img " target="7"  id="prfmodule7" onclick="changestation('prfmodule7')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Predefined Text</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <div class="prf_module_img">
                             <div class="module_img " target="8"  id="prfmodule8" onclick="changestation('prfmodule8')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Message Prefrences</a></label>
                               </div>
                             </div>
                                       
                           </div>


                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Show Users</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>


                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="add_user.php">Add User</a></li>
                              <li><a href="add_department.php">Add Department</a></li>
                              <li><a href="add_designation.php">Add Designation</a></li>
                              <li><a href="add_roles.php">Add Roles</a></li>
                             

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="add_user.php">Add User</a></li>
                              <li><a href="add_department.php">Add Department</a></li>
                              <li><a href="add_designation.php">Add Designation</a></li>
                              <li><a href="add_roles.php">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>
                           <div id="div8" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                      </div>
                      <!--   <div class="prefence_module">

                          <div class="prf_module_img">
                             <img class="module_img " target="1" src="images/account.jpeg" id="prfmodule1" onclick="changestation('prfmodule1')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Administration </a></label>
                              </div>               
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img active" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img active" target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img " target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div class="prf_module_img">
                             <img class="module_img" target="4" src="images/invoices.jpeg" id="prfmodule4" onclick="changestation('prfmodule4')">
                              <div class="module_txt">
                                <label><a href="#"> Authorization </a></label>
                              </div>
                          </div>

                          <div class="prf_module_img">
                            <img class="module_img" target="5" src="images/territories.jpeg" id="prfmodule5" onclick="changestation('prfmodule5')">    <div class="module_txt">
                                  <label><a href="#"> Territories </a></label>
                                </div>
                          </div>
 
                          <div class="prf_module_img">
                             <img class="module_img" target="6" src="images/leads.jpeg" id="prfmodule6" onclick="changestation('prfmodule6')">
                              <div class="module_txt">
                                <label><a href="#"> Leads </a></label>
                              </div>
                          </div>

                           <div class="prf_module_img">
                             <img class="module_img" target="7" src="images/activities.jpeg" id="prfmodule7" onclick="changestation('prfmodule7')">
                              <div class="module_txt">
                                <label><a href="#"> Activities  </a></label>
                              </div>
                           </div>

                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                        </div> -->
                        
                        <?php

                        }

                        ?>
                        
                        <!-- Chart of Accounts Ribbon -->
                        <?php

                        if ($ribbon == 'CoA')
                        {

                        ?>

                       <div class="prefence_module">

                          <div class="prf_module_img">
                             <div class="module_img  active" target="1"  id="prfmodule1" onclick="changestation('prfmodule1')">
                               <img src="images/account.jpeg">
                               <div class="module_txt">
                                <label> <a href="#"> Chart of Accounts </a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php

                          if ($subRibbon == 'chartofAccounts')
                          {
                            
                          ?>
                           <div class="prf_module_img">
                             <div class="module_img " target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Account Code Generator</a></label>
                               </div>
                             </div>
                                       
                          </div>
                      

                          <?php

                          }

                          else
                          {
                          
                          ?>

                         <div class="prf_module_img">
                             <div class="module_img " target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                                 <label> <a href="#">Account Code Generator</a></label>
                               </div>
                             </div>
                                       
                          </div> 

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <div class="module_img " target="3"  id="prfmodule3" onclick="changestation('prfmodule3')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                                 <label> <a href="#">Journal Entry</a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                           <div class="prf_module_img">
                             <div class="module_img " target="3"  id="prfmodule3" onclick="changestation('prfmodule3')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Journal Entry</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <?php
                          
                          }

                          ?>

                         
                          <div class="prf_module_img">
                             <div class="module_img " target="4"  id="prfmodule4" onclick="changestation('prfmodule4')">
                               <img src="images/invoices.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Journal Voucher</a></label>
                               </div>
                             </div>
                                       
                          </div>

                       
                          <div class="prf_module_img">
                             <div class="module_img " target="5"  id="prfmodule5" onclick="changestation('prfmodule5')">
                               <img src="images/territories.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Posting Templates</a></label>
                               </div>
                             </div>
                                       
                          </div>
 
                      
                           <div class="prf_module_img">
                             <div class="module_img " target="6"  id="prfmodule6" onclick="changestation('prfmodule6')">
                               <img src="images/leads.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Recurring Postings</a></label>
                             </div>
                             </div>
                                       
                          </div>

                        
                            <div class="prf_module_img">
                             <div class="module_img " target="7"  id="prfmodule7" onclick="changestation('prfmodule7')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Reverse Transactions</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <div class="prf_module_img">
                             <div class="module_img " target="8"  id="prfmodule8" onclick="changestation('prfmodule8')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Exchange Rate Differences</a></label>
                               </div>
                             </div>
                                       
                           </div>


                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'chartofAccounts')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Edit Chart of Accounts</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>
                           <div id="div8" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                      </div>
                      <!--   <div class="prefence_module">

                          <div class="prf_module_img">
                             <img class="module_img " target="1" src="images/account.jpeg" id="prfmodule1" onclick="changestation('prfmodule1')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Administration </a></label>
                              </div>               
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img active" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img active" target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img " target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div class="prf_module_img">
                             <img class="module_img" target="4" src="images/invoices.jpeg" id="prfmodule4" onclick="changestation('prfmodule4')">
                              <div class="module_txt">
                                <label><a href="#"> Authorization </a></label>
                              </div>
                          </div>

                          <div class="prf_module_img">
                            <img class="module_img" target="5" src="images/territories.jpeg" id="prfmodule5" onclick="changestation('prfmodule5')">    <div class="module_txt">
                                  <label><a href="#"> Territories </a></label>
                                </div>
                          </div>
 
                          <div class="prf_module_img">
                             <img class="module_img" target="6" src="images/leads.jpeg" id="prfmodule6" onclick="changestation('prfmodule6')">
                              <div class="module_txt">
                                <label><a href="#"> Leads </a></label>
                              </div>
                          </div>

                           <div class="prf_module_img">
                             <img class="module_img" target="7" src="images/activities.jpeg" id="prfmodule7" onclick="changestation('prfmodule7')">
                              <div class="module_txt">
                                <label><a href="#"> Activities  </a></label>
                              </div>
                           </div>

                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                        </div> -->
                        
                        <?php

                        }

                        ?>

                        <!-- HR Ribbon -->
                        <?php

                        if ($ribbon == 'HR')
                        {

                        ?>

                       <div class="prefence_module">

                          <?php

                          if ($subRibbon == 'addEmp')
                          {
                            
                          ?>
                           <div class="prf_module_img">
                             <div class="module_img  active" target="1"  id="prfmodule1" onclick="changestation('prfmodule1')">
                               <img src="images/account.jpeg">
                               <div class="module_txt">
                                <label> <a href="#"> Employee Management </a></label>
                               </div>
                             </div>
                                       
                          </div>
                      

                          <?php

                          }

                          else
                          {
                          
                          ?>

                         <div class="prf_module_img">
                             <div class="module_img" target="1"  id="prfmodule1" onclick="changestation('prfmodule1')">
                               <img src="images/account.jpeg">
                               <div class="module_txt">
                                <label> <a href="#"> Employee Management </a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'leaveMng')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <div class="module_img active" target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                                 <label> <a href="#">Leave Management</a></label>
                               </div>
                             </div>
                                       
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                           <div class="prf_module_img">
                             <div class="module_img " target="2"  id="prfmodule2" onclick="changestation('prfmodule2')">
                               <img src="images/analytics.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Leave Management</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <?php
                          
                          }

                          ?>

                         
                          <div class="prf_module_img">
                             <div class="module_img " target="4"  id="prfmodule4" onclick="changestation('prfmodule4')">
                               <img src="images/invoices.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Talent Management</a></label>
                               </div>
                             </div>
                                       
                          </div>

                       
                          <div class="prf_module_img">
                             <div class="module_img " target="5"  id="prfmodule5" onclick="changestation('prfmodule5')">
                               <img src="images/territories.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Training & Development</a></label>
                               </div>
                             </div>
                                       
                          </div>
 
                      
                           <div class="prf_module_img">
                             <div class="module_img " target="6"  id="prfmodule6" onclick="changestation('prfmodule6')">
                               <img src="images/leads.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Organogram</a></label>
                             </div>
                             </div>
                                       
                          </div>

                        
                            <div class="prf_module_img">
                             <div class="module_img " target="7"  id="prfmodule7" onclick="changestation('prfmodule7')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Recruitment</a></label>
                               </div>
                             </div>
                                       
                          </div>
                          <div class="prf_module_img">
                             <div class="module_img " target="8"  id="prfmodule8" onclick="changestation('prfmodule8')">
                               <img src="images/activities.jpeg">
                               <div class="module_txt">
                               <label> <a href="#">Payroll</a></label>
                               </div>
                             </div>
                                       
                           </div>


                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add Employee</a></li>
                              <li><a href="#">View Employee</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'addEmp')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add Employee</a></li>
                              <li><a href="#">View Employee</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add Employee</a></li>
                              <li><a href="#">View Employee</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'leaveMng')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Leave Management</a></li>
                              <li><a href="#">Assign Leaves</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Leave Management</a></li>
                              <li><a href="#">Assign Leaves</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>
                           <div id="div8" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                      </div>
                      <!--   <div class="prefence_module">

                          <div class="prf_module_img">
                             <img class="module_img " target="1" src="images/account.jpeg" id="prfmodule1" onclick="changestation('prfmodule1')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Administration </a></label>
                              </div>               
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img active" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                            <img class="module_img" target="3" src="images/activities.jpeg" id="prfmodule3" onclick="changestation('prfmodule3')" >
                              <div class="module_txt">
                                <label> <a href="#"> User List </a></label>
                              </div>             
                          </div>

                          <?php
                          
                          }

                          ?>

                          
                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img active" target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div class="prf_module_img">
                             <img class="module_img " target="2" src="images/analytics.jpeg" id="prfmodule2" onclick="changestation('prfmodule2')" >
                              <div class="module_txt">
                                <label> <a href="#"> User Setup </a></label>
                              </div>
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div class="prf_module_img">
                             <img class="module_img" target="4" src="images/invoices.jpeg" id="prfmodule4" onclick="changestation('prfmodule4')">
                              <div class="module_txt">
                                <label><a href="#"> Authorization </a></label>
                              </div>
                          </div>

                          <div class="prf_module_img">
                            <img class="module_img" target="5" src="images/territories.jpeg" id="prfmodule5" onclick="changestation('prfmodule5')">    <div class="module_txt">
                                  <label><a href="#"> Territories </a></label>
                                </div>
                          </div>
 
                          <div class="prf_module_img">
                             <img class="module_img" target="6" src="images/leads.jpeg" id="prfmodule6" onclick="changestation('prfmodule6')">
                              <div class="module_txt">
                                <label><a href="#"> Leads </a></label>
                              </div>
                          </div>

                           <div class="prf_module_img">
                             <img class="module_img" target="7" src="images/activities.jpeg" id="prfmodule7" onclick="changestation('prfmodule7')">
                              <div class="module_txt">
                                <label><a href="#"> Activities  </a></label>
                              </div>
                           </div>

                         
                          <div id="div1" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          if ($subRibbon == 'showUser')
                          {
                            
                          ?>

                          <div id="div2" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div2" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <?php

                          if ($subRibbon == 'addUser')
                          {
                            
                          ?>

                          <div id="div3" class="targetDiv" style="display:block;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php

                          }

                          else
                          {
                          
                          ?>

                          <div id="div3" class="targetDiv" style="display:none;"> 
                            <ul>
                              <li><a href="#">Add User</a></li>
                              <li><a href="#">Add Department</a></li>
                              <li><a href="#">Add Designation</a></li>
                              <li><a href="#">Add Roles</a></li>

                            </ul> 
                          </div>

                          <?php
                          
                          }

                          ?>

                          <div id="div4" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div5" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div6" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>

                          <div id="div7" class="targetDiv" style="display:none">
                            <ul>
                                <li><a href="#">Add User</a></li>
                                <li><a href="#">Add Department</a></li>
                                <li><a href="#">Add Designation</a></li>
                                <li><a href="#">Add Roles</a></li>

                            </ul>
                          </div>


                        </div> -->
                        
                        <?php

                        }

                        ?>

                  </div>

            </div>
          </div>
        </div>
 <script type="text/javascript">
$('.module_img').click(function () {
    $('.targetDiv').hide();
    $('#div' + $(this).attr('target')).show();
});
 </script>


 <script type="text/javascript">
   function changestation(stationid) {
    mystation = document.getElementById(stationid);
    allofclass = document.getElementsByClassName("module_img");
        for (i = 0; i < allofclass.length; i++) {
            allofclass[i].classList.remove('active');
        }
    mystation.classList.add('active');
    currentstation = stationid;
    //loadnext();
}

 </script>       
</body>
</html>



















