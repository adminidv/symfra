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
	    echo "<option value=".$row2['agency_comm'].">".$row2['agency_comm']."</option>";

	    $selectagency_comm = $row2['agency_comm'];
	}

	// echo "<br>This:" .  $selectRegion . "<br>";

	$updateQuery2 = mysqli_query($con, "SELECT * FROM  agency_comm_setup WHERE agency_comm_name!='$selectagency_comm' ") or die(mysqli_error($con));

	while ($row3 = mysqli_fetch_array($updateQuery2)) 
	{
	    echo "<option value=".$row3['agency_comm_name'].">".$row3['agency_comm_name']."</option>";
	}

	// echo json_encode($row);  

	?>