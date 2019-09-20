<?php

include('manage/connection.php');
include("manage/session.php");

$selectDept = mysqli_query($con, "SELECT * FROM department") or die(mysqli_error($con));

while ($rowDept = mysqli_fetch_array($selectDept)) 
{
    echo '<option value="'.$rowDept["dept_name"].'">'.$rowDept["dept_name"].'</option>';
}

?>