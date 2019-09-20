<?php
include 'manage/connection.php';

// $result=mysqli_query($con, "select * from department");

// echo '<select class="uform_slct_opt" name="dept_ID" id="dept_ID" required>';
// echo '<option value="Select">Select </option>';

$selectDept = mysqli_query($con, "select * from department");

while ($rowDept = mysqli_fetch_array($selectDept))
{
	echo '<option value="'.$rowDept['dept_ID'].'">'.$rowDept['dept_name'].'</option>';
}

echo "</select>";												

?>