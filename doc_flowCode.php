<?php

include('manage/connection.php');
include("manage/session.php");

// Basic flow variable declaration
$flowTitle = $_POST['flowTitle'];
$flowDept = $_POST['flowDept'];
$flowForm = $_POST['flowForm'];
$appSet = $_POST['appSet'];
$flowType = $_POST['flowType'];
$flowFields = $_POST['flowFields'];
$flowValues = $_POST['flowValues'];

// Fields flow variable declaration
$flowFields2 = $_POST['flowFields2'];
$flowValues2 = $_POST['flowValues2'];

// If user is selected the fields flow condition
if ($flowType == "Fields Flow")
{
	// If flow type has two conditions
	if(isset($_POST['flowCondition']))
	{
		// Declartion of flow condition
		$flowCondition = $_POST['flowCondition'];

		echo $flowTitle . "<br>";
		echo $flowDept . "<br>";
		echo $flowForm . "<br>";
		echo $appSet . "<br>";
		echo $flowType . "<br>";
		echo $flowFields . "<br>";
		echo $flowValues . "<br>";

		// Second field's vairables
		echo $flowCondition . "<br>";
		echo $flowFields2 . "<br>";
		echo $flowValues2 . "<br>";

		// Inserting for second fields flow
		$insertQuery = mysqli_query($con, "INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowFields, flowValues, condtionType, flowStatus, flowFields2, flowValues2) VALUES ('$flowTitle', '$flowDept', '$flowForm', '$appSet', '$flowType', '$flowFields', '$flowValues', '$flowCondition', 'Active', '$flowFields2', '$flowValues2')") or die(mysqli_error($con));

		// Inserting for second fields flow
		/*$insertQuery = mysqli_query("INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowFields, flowValues, condtionType, flowStatus) VALUES '$', '$', '$', '$', '$', '$', '$' ");*/
	}

	// If flow type has one condition
	else
	{
		echo $flowTitle . "<br>";
		echo $flowDept . "<br>";
		echo $flowForm . "<br>";
		echo $appSet . "<br>";
		echo $flowType . "<br>";
		echo $flowFields . "<br>";
		echo $flowValues . "<br>";
		/*echo $flowCondition . "<br>";
		echo $flowFields2 . "<br>";
		echo $flowValues2 . "<br>";*/

		// Inserting for first fields flow
		$insertQuery = mysqli_query($con, "INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowFields, flowValues, condtionType, flowStatus, flowFields2, flowValues2) VALUES ('$flowTitle', '$flowDept', '$flowForm', '$appSet', '$flowType', '$flowFields', '$flowValues', 'N/A', 'Active', 'N/A', 'N/A')") or die(mysqli_error($con));
	}
}

// If user is selected the basic flow condition
else
{
	echo $flowTitle . "<br>";
	echo $flowDept . "<br>";
	echo $flowForm . "<br>";
	echo $appSet . "<br>";
	echo $flowType . "<br>";
	/*echo $flowCondition . "<br>";
	echo $flowFields2 . "<br>";
	echo $flowValues2 . "<br>";*/

	// Inserting for second fields flow
	// $insertQuery = mysqli_query($con, "INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowStatus) VALUES ('$flowTitle', '$flowDept', '$flowForm', '$appSet', '$flowType', 'Active' )") or die(mysqli_error($con));

	$insertQuery = mysqli_query($con, "INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowFields, flowValues, condtionType, flowStatus, flowFields2, flowValues2) VALUES ('$flowTitle', '$flowDept', '$flowForm', '$appSet', '$flowType', 'N/A', 'N/A', 'N/A', 'Active', 'N/A', 'N/A')") or die(mysqli_error($con));
}



// $flowCondition = $_POST['flowCondition'];

/*echo $flowTitle . "<br>";
echo $flowDept . "<br>";
echo $flowForm . "<br>";
echo $appSet . "<br>";
echo $chkfrmname . "<br>";
echo $flowFields . "<br>";
echo $flowValues . "<br>";
echo $flowCondition . "<br>";
echo $flowFields2 . "<br>";
echo $flowValues2 . "<br>";*/

// $insertQuery = mysqli_query("INSERT INTO docFlow () VALUES '$', '$', '$', '$', '$', '$', '$' ");

?>