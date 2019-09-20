<?php

include 'manage/connection.php';

?>

<li>

				<a href="#advsearchli" data-toggle="collapse" data-parent="accrdion"><h4><i class="fa fa-fw fa-tasks"></i>Advance Search <i class="fa fa-fw fa-angle-double-down"></i></h4></a>

				<ul>
					<li class="br_srch_li"><a href="#advserchli" data-toggle="collapse" data-parent="accrdion"> <input type="text" name="" placeholder="Search"><i class="fa fa-search"></i></a>
					</li>
				</ul>

				<form action="usertable.php" method="POST">
				<ul id="advsearchli" class="collapse">
					<li><label>First Name</label> <input type="text" name="user_fName" placeholder="Enter Name"></li>
					<li><label>Last Name</label> <input type="text" name="user_mName" placeholder="Enter Name"></li>
					<li><a href="#">Department</a>
						<ul class="dptmntli">

							<?php

							$selectDept = mysqli_query($con, "select * from department");

					        while ($rowDept = mysqli_fetch_array($selectDept))
					        {

							echo '<li><label>'.$rowDept['dept_name'].'</label><input type="checkbox" value="'.$rowDept['dept_ID'].'" name="dept_list[]"></li>';

							}

							?>
						</ul>

					</li>

					<li><a href="#">Designation </a>
						<ul class="Desigli">

							<?php

							$selectDesig = mysqli_query($con, "select * from designation");

					        while ($rowDesig = mysqli_fetch_array($selectDesig))
					        {

							echo '<li><label>'.$rowDesig['Desig_name'].'</label><input type="checkbox" value="'.$rowDesig['Desig_ID'].'" name="desig_list[]"></li>';

							}

							?>

						</ul>
					</li>
					
					<li><a href="#">Roles </a>
						<ul class="rolesli">

							<?php

							$selectRole = mysqli_query($con, "select * from roles");

					        while ($rowRole = mysqli_fetch_array($selectRole))
					        {

							echo '<li><label>'.$rowRole['role_Name'].'</label><input type="checkbox" value="'.$rowRole['role_ID'].'" name="desig_list[]"></li>';

							}

							?>

						</ul>
					</li>
					<li><input type="submit" name="submit" value="Submit" ></li>


				</ul>
			</form>
</li>
