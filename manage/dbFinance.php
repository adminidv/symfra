<?php

// Building connection
$con = mysqli_connect("localhost", "root", "")
	or die("Error is: " . mysqli_error());

// Selecting DB
mysqli_select_db($con, "finance");

?>