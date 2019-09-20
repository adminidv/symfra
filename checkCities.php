<?php

include('manage/connection.php');
include("manage/session.php");

$bpCountry = $_GET['bpCountry'];

$selectCities = mysqli_query($con, "SELECT * FROM city_setup WHERE country_name='$bpCountry' ") or die(mysqli_error($con));

while ($rowCities = mysqli_fetch_array($selectCities))
{
    /* echo "<option value=".$row3['sector_name'].">".$row3['sector_name']."</option>"; */
    echo '<option value="'.$rowCities["city_name"].'">'.$rowCities["city_name"].'</option>';
}

// echo $output;

?>