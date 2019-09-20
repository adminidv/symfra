<?php

include('manage/connection.php');
include("manage/session.php");

$soNo = $_GET['soNo'];

$updateQuery1 = mysqli_query($con, "SELECT * FROM saleorders WHERE soNo = '$soNo' ") or die(mysqli_error($con));

while ($rowCom = mysqli_fetch_array($updateQuery1))
{
    /* echo "<option value=".$row3['sector_name'].">".$row3['sector_name']."</option>"; */
    $output = '<option value="'.$rowCom["saleCust"].'">'.$rowCom["saleCust"].'</option>';
}

$updateQuery2 = mysqli_query($con, "SELECT * FROM saleorders ") or die(mysqli_error($con));

while ($rowCom2 = mysqli_fetch_array($updateQuery2))
{
    /* echo "<option value=".$row3['sector_name'].">".$row3['sector_name']."</option>"; */
    $output .= '<option value="'.$rowCom2["saleCust"].'">'.$rowCom2["saleCust"].'</option>';
}

echo $output;

?>