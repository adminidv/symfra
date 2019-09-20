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
                                      <input type="text" class="form-control search-menu" name="user_fName" placeholder="Enter First Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="user_mName" placeholder="Enter Last Name">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>


                                  <a href="#">
                                    <i class="fa fa-tachometer"></i>
                                    <span>Departments </span>
                                  </a>
                                    <ul>
                                      <?php

                                          $selectDept = mysqli_query($con, "select * from department");

                                              while ($rowDept = mysqli_fetch_array($selectDept))
                                              {

                                          echo '<li><label>'.$rowDept['dept_name'].'</label><input type="checkbox" value="'.$rowDept['dept_ID'].'" name="dept_list[]"></li>';

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

                                          echo '<li><label>'.$rowDesig['Desig_name'].'</label><input type="checkbox" value="'.$rowDesig['Desig_ID'].'" name="desig_list[]"></li>';

                                          }

                                        ?>
                                    </ul> 

                                      <a href="#">
                                        <i class="fa fa-tachometer"></i>
                                        <span>Roles </span>
                                      </a>

                                    <ul>
                                      <?php

                                          $selectRole = mysqli_query($con, "select * from roles");

                                              while ($rowRole = mysqli_fetch_array($selectRole))
                                              {

                                          echo '<li><label>'.$rowRole['role_Name'].'</label><input type="checkbox" value="'.$rowRole['role_ID'].'" name="desig_list[]"></li>';

                                          }

                                        ?>
                                        <li><input type="submit" name="submit" value="Submit" ></li>
                                    </ul>

                                              
                                </div>
                         </li> 

                      
                         </form>
                    </ul>
             </div>

