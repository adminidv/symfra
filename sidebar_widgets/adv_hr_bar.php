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
                      <form action="emptable.php" method="POST">
                         <li class="sidebar-dropdown">
                                <a class="sidebar_togletitle" href="#">
                                 <span>Advanced Search</span>
                                </a>

                                <div class="sidebar-submenu sidebar-searchbynames  ">
                                  
                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="empFName" placeholder="Enter First Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="empLName" placeholder="Enter Last Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                  <a href="#">
                                    <i class="fa fa-tachometer"></i>
                                    <span>Departments </span>
                                  </a>
                                    <ul>
                                      <?php

                                          $selectDept = mysqli_query($con, "select * from department");

                                              while ($rowDept = mysqli_fetch_array($selectDept))
                                              {

                                          echo '<li><label>'.$rowDept['dept_name'].'</label><input type="checkbox" value="'.$rowDept['dept_name'].'" name="empDept[]"></li>';

                                          }
                                        ?>
                                    </ul>



                                     <a href="#">
                                        <i class="fa fa-tachometer"></i>
                                        <span>Designation </span>
                                     </a>
                                    <ul>
                                      <?php

                                          $selectDesig = mysqli_query($con, "select * from designation");

                                              while ($rowDesig = mysqli_fetch_array($selectDesig))
                                              {

                                          echo '<li><label>'.$rowDesig['Desig_name'].'</label><input type="checkbox" value="'.$rowDesig['Desig_name'].'" name="empDesig[]"></li>';

                                          }

                                        ?>

                                        <li><input style="width:auto;" type="submit" name="submit" value="Submit" ></li>
                                    </ul>

                                              
                                </div>
                         </li> 

                      
                         </form>
                    </ul>
             </div>

