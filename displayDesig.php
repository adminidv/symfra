<?php
include 'manage/connection.php';

// $result=mysqli_query($con, "select * from department");

// echo '<select class="uform_slct_opt" name="dept_ID" id="dept_ID" required>';
// echo '<option value="Select">Select </option>';

$selectDesig = mysqli_query($con, "select * from designation");

while ($rowDesig = mysqli_fetch_array($selectDesig))
{
	echo '<option value="'.$rowDesig['Desig_ID'].'">'.$rowDesig['Desig_name'].'</option>';
}
											      												

?>