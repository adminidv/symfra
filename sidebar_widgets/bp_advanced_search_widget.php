<?php

include 'manage/connection.php';

if (isset($_POST['submit'])){

if ($advSearch == 'Hide')
{
echo '<style type="text/css">

  .sidebar-wrapper .sidebar_adv_serch_options .sidebar-submenu  {
  display: block;

</style>';
}
}
else{
 echo '<style type="text/css">

  .sidebar-wrapper .sidebar_adv_serch_options .sidebar-submenu  {
  display: none;

</style>';
}

?>
          
 
            <!-- sidebar-advanced-search  -->

             <div class="sidebar-menu sidebar_adv_serch_options">
                    <ul>
                      <form action="usertable.php" method="POST">
                         <li class="sidebar-dropdown">
                                <a class="sidebar_togletitle" href="#">
                                 <span>Advanced Search</span>
                                </a>

                                <div class="sidebar-submenu sidebar-searchbynames  ">
                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_NewCode" placeholder="Enter New Code">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_LegacyCode" placeholder="Enter Legacy Code">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_custName" placeholder="Customer Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_bs" id="adv_bs">
                                         <option value="">Select Business Sector</option>
                                         <option value="Pakistan">Pakistan</option>
                                         <option value="India">India</option>
                                         <option value="United Kingdom">United Kingdom</option>
                                         <option value="USA">USA</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_country" id="adv_country">
                                         <option value="">Select Conutry</option>
                                         <option value="Pakistan">Pakistan</option>
                                         <option value="India">India</option>
                                         <option value="United Kingdom">United Kingdom</option>
                                         <option value="USA">USA</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_website" placeholder="Enter Website">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_email" placeholder="Enter Email">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_tax" placeholder="Enter Tax">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_ba" id="adv_ba">
                                         <option value="">Select Business Area</option>
                                         <option value="Sea Import">Sea Import</option>
                                         <option value="Sea Export">Sea Export</option>
                                         <option value="Air Import">Air Import</option>
                                         <option value="Air Export">Air Export</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_ba" id="adv_ba">
                                         <option value="">Select SPO</option>
                                         <option value="Sea Import">Sea Import</option>
                                         <option value="Sea Export">Sea Export</option>
                                         <option value="Air Import">Air Import</option>
                                         <option value="Air Export">Air Export</option>
                                      </select>
                                    </div>
                                  </div>

                                  <ul>
                                    <li><input type="submit" name="submit" value="Submit" ></li>
                                  </ul>

                                              
                                </div>
                         </li> 

                      
                         </form>
                    </ul>
             </div>

