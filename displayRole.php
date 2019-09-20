<?php
include 'manage/connection.php';

// $result=mysqli_query($con, "select * from department");

// echo '<select class="uform_slct_opt" name="dept_ID" id="dept_ID" required>';
// echo '<option value="Select">Select </option>';

$selectRole = mysqli_query($con, "select * from roles");

while ($rowRole = mysqli_fetch_array($selectRole))
{
	echo '<option value="'.$rowRole['role_ID'].'">'.$rowRole['role_Name'].'</option>';
}
											

?>