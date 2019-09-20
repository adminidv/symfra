<?php

include('manage/connection.php');
include("manage/session.php");

$customerCont = $_GET['customerCont'];

// $updateQuery1 = mysqli_query($con, "SELECT * FROM custmaster WHERE SrNo = '$customerCont' ") or die(mysqli_error($con));
// // echo $reg_code;
// while ($rowCountry = mysqli_fetch_array($updateQuery1))
// {
//    // echo '<option value="'.$rowCountry['SrNo'].'">'.$rowCountry['owner'].'</option>';
// 	$fetchOwner = $rowCountry["newCode"];
// }

$selectName = mysqli_query($con, "SELECT * FROM represent_setup ");
while ($rowOwner = mysqli_fetch_array($selectName))
{
	$repArr = $rowOwner["userNo"];
	list($repID, $second) = explode('-', $repArr);
	if ($repID == $customerCont)
	{
		$finalRep = $repID;
		echo '<option value="'.$rowOwner['rep_name'].'">'.$rowOwner['rep_name'].'</option>';
	}
}

// echo $finalRep;

?>