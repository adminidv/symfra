	<?php

	include('manage/connection.php');
	include("manage/session.php");


	$SrNo = $_GET['employee_id'];
	// $selectRegion = "";

	$updateQuery1 = mysqli_query($con, "SELECT * FROM stock_airline_setup WHERE SrNo = '$SrNo' ") or die(mysqli_error($con));
	// echo $reg_code;
	// $row = mysqli_fetch_array($updateQuery1);
	while ($row2 = mysqli_fetch_array($updateQuery1)) 
	{
	    echo "<option value=".$row2['wht_code'].">".$row2['wht_code']."</option>";

	    $selectwht_code = $row2['wht_code'];
	}

	// echo "<br>This:" .  $selectRegion . "<br>";

	$updateQuery2 = mysqli_query($con, "SELECT * FROM  wht_setup WHERE wht_code!='$selectwht_code' ") or die(mysqli_error($con));

	while ($row3 = mysqli_fetch_array($updateQuery2)) 
	{
	    echo "<option value=".$row3['wht_code'].">".$row3['wht_code']."</option>";
	}

	// echo json_encode($row);  

	?>