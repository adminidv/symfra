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
                                      <input type="text" class="form-control search-menu" name="adv_SoNo" placeholder="Enter Sale Order No.">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_JobNo" placeholder="Enter Job No.">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_MBLNo" placeholder="Enter MBL No.">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <input type="text" class="form-control search-menu" name="adv_HBLNo" placeholder="Enter HBL No.">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_party" id="adv_party">
                                         <option value="">Select Party</option>

                                         <?php

                                         $selectCust = mysqli_query($con, "SELECT * FROM custmaster");
                                         while ($rowCust = mysqli_fetch_array($selectCust))
                                         {
                                          $custName = $rowCust['cmpTitle'];
                                          echo '<option value="'.$custName.'">'.$custName.'</option>';
                                         }

                                         ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_agentParty" id="adv_agentParty">
                                         <option value="">Select Agent Party</option>

                                         <?php

                                         $selectCust = mysqli_query($con, "SELECT * FROM custmaster");
                                         while ($rowCust = mysqli_fetch_array($selectCust))
                                         {
                                          $custName = $rowCust['cmpTitle'];
                                          echo '<option value="'.$custName.'">'.$custName.'</option>';
                                         }

                                         ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_foreignParty" id="adv_foreignParty">
                                         <option value="">Select Foreign Party</option>

                                         <?php

                                         $selectCust = mysqli_query($con, "SELECT * FROM custmaster");
                                         while ($rowCust = mysqli_fetch_array($selectCust))
                                         {
                                          $custName = $rowCust['cmpTitle'];
                                          echo '<option value="'.$custName.'">'.$custName.'</option>';
                                         }

                                         ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_shipLine" id="adv_shipLine">
                                         <option value="">Select Shipping Line</option>

                                         <?php

                                         $selectShipLine = mysqli_query($con, "SELECT * FROM shipping_setup");
                                         while ($rowShipLine = mysqli_fetch_array($selectShipLine))
                                         {
                                          $shipLine = $rowShipLine['ship_name'];
                                          echo '<option value="'.$shipLine.'">'.$shipLine.'</option>';
                                         }

                                         ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_SPO" id="adv_SPO">
                                        <option value="">Select SPO</option>

                                        <?php

                                          $selectSPO = mysqli_query($con, "select * from spo_setup");
                                          while ($rowSPO = mysqli_fetch_array($selectSPO))
                                          {
                                            echo '<option value="'.$rowSPO['SrNo'].'">'.$rowSPO['spo_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_origin" id="adv_origin">
                                        <option value="">Select Origin</option>

                                        <?php

                                          $selectOrigin = mysqli_query($con, "select * from destination_setup");
                                          while ($rowOrigin = mysqli_fetch_array($selectOrigin))
                                          {
                                            echo '<option value="'.$rowOrigin['dest_name'].'">'.$rowOrigin['dest_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_destination" id="adv_destination">
                                        <option value="">Select Destination</option>

                                        <?php

                                          $selectDestination = mysqli_query($con, "select * from destination_setup");
                                          while ($rowDestination = mysqli_fetch_array($selectDestination))
                                          {
                                            echo '<option value="'.$rowDestination['dest_name'].'">'.$rowDestination['dest_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_nom" id="adv_nom">
                                         <option value="">Select Nomination</option>
                                         <option value="Yes">Yes</option>
                                         <option value="No">No</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="sidebar-search">
                                    <div class="input-group">
                                      <select name="adv_shipStatus" id="adv_shipStatus">
                                         <option value="">Select Shipment Status</option>
                                         <option value="In Process">In Process</option>
                                         <option value="Released">Released</option>
                                         <option value="Not Released">Not Released</option>
                                         <option value="Expected">Expected</option>
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

