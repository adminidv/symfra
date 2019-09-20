<?php

include('manage/connection.php');
include("manage/session.php");

$selectCountry = mysqli_query($con, "SELECT * FROM country_setup") or die(mysqli_error($con));

while ($rowCountry = mysqli_fetch_array($selectCountry)) 
{
    echo '<option value="'.$rowCountry["country_name"].'">'.$rowCountry["country_name"].'</option>';
}

?>