<?php

include('manage/connection.php');
include("manage/session.php");



$dest_code = $_GET['employee_id'];
// $selectRegion = "";

$updateQuery1 = mysqli_query($con, "SELECT * FROM destination_setup WHERE dest_code = '$dest_code' ") or die(mysqli_error($con));
// echo $reg_code;
// $row = mysqli_fetch_array($updateQuery1);
while ($row2 = mysqli_fetch_array($updateQuery1)) 
{
    /* echo "<option value=".$row2['dest_sector'].">".$row2['dest_sector']."</option>"; */
    echo '<option value="'.$row2["dest_sector"].'">'.$row2["dest_sector"].'</option>';

    $selectSector = $row2['dest_sector'];
}

// echo "<br>This:" .  $selectRegion . "<br>";

$updateQuery2 = mysqli_query($con, "SELECT * FROM sector_setup WHERE sector_name!='$selectSector' ") or die(mysqli_error($con));

while ($row3 = mysqli_fetch_array($updateQuery2)) 
{
    /* echo "<option value=".$row3['sector_name'].">".$row3['sector_name']."</option>"; */
    echo '<option value="'.$row3["sector_name"].'">'.$row3["sector_name"].'</option>';
}

// echo json_encode($row);  

?>