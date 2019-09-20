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
                      <form action="airport_setup_table.php" method="POST">
                         <li class="sidebar-dropdown">
                                <a class="sidebar_togletitle" href="#">
                                 <span>Advanced Search</span>
                                </a>

                                <div class="sidebar-submenu sidebar-searchbynames  ">
                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_name" placeholder="Enter New Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_iata" placeholder="Enter IATA Code">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_country" id="adv_country">
                                         <option value="">Select Country</option>

                                         <?php

                                         $selectCountry = mysqli_query($con, "SELECT * FROM country_setup");
                                         while ($rowCountry = mysqli_fetch_array($selectCountry))
                                         {
                                          $countryName = $rowCountry['country_name'];
                                          echo '<option value="'.$countryName.'">'.$countryName.'</option>';
                                         }

                                         ?>

                                      </select>
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
                                      <input type="text" class="form-control search-menu" name="adv_website" placeholder="Enter Website">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
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

