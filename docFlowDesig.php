<?php

include('manage/connection.php');
include("manage/session.php");

$selectDesig = mysqli_query($con, "SELECT * FROM designation") or die(mysqli_error($con));

while ($rowDesig = mysqli_fetch_array($selectDesig)) 
{
    echo '<option value="'.$rowDesig["Desig_name"].'">'.$rowDesig["Desig_name"].'</option>';
}

?>