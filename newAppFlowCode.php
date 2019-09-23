<?php

include('manage/connection.php');
include("manage/session.php");

// $appDept = $_POST['appDept'];
$appTitle = $_POST['appTitle'];
$appDescription = $_POST['appDescription'];
$noApp = $_POST['noApp'];
$app1 = $_POST['app1'];
$app2 = $_POST['app2'];
$app3 = $_POST['app3'];

// echo $appDept . '<br>';
echo $appTitle . '<br>';
echo $appDescription . '<br>';
echo $noApp . '<br>';
echo $app1 . '<br>';
echo $app2 . '<br>';
echo $app3 . '<br>';

// Basic flow variable declaration
$flowDept = $_POST['flowDept'];
$flowForm = $_POST['flowForm'];
$flowType = $_POST['flowType'];
$flowFields = $_POST['flowFields'];
$flowValues = $_POST['flowValues'];

// Fields flow variable declaration
$flowFields2 = $_POST['flowFields2'];
$flowValues2 = $_POST['flowValues2'];

// Inserting record if there is only 1 approval
if ($app2 == "Select" && $app3 == "Select")
{
	// If user is selected the fields flow condition
	if ($flowType == "Fields Flow")
	{
		// If flow type has two conditions
		if(isset($_POST['flowCondition']))
		{
			// Declartion of flow condition
			$flowCondition = $_POST['flowCondition'];

			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Second field's vairables
			echo $flowCondition . "<br>";
			echo $flowFields2 . "<br>";
			echo $flowValues2 . "<br>";

			// Inserting for second fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', 'NA', 'NA', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', '$flowCondition', '$flowFields2', '$flowValues2', 'Active')") or die(mysqli_error($con));
		}

		// If flow type has one condition
		else
		{
			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Inserting for first fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', 'NA', 'NA', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
		}
	}

	// If user is selected the basic flow condition
	else
	{
		echo $flowDept . "<br>";
		echo $flowForm . "<br>";
		echo $flowType . "<br>";
		
		$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', 'NA', 'NA', '$flowDept', '$flowForm', '$flowType', 'NA', 'NA', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
	}
	// header("Location: approval_flow.php");
}

// Inserting record if there are 2 approvals
else if ($app2 != "Select" && $app3 == "Select")
{
	// If user is selected the fields flow condition
	if ($flowType == "Fields Flow")
	{
		// If flow type has two conditions
		if(isset($_POST['flowCondition']))
		{
			// Declartion of flow condition
			$flowCondition = $_POST['flowCondition'];

			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Second field's vairables
			echo $flowCondition . "<br>";
			echo $flowFields2 . "<br>";
			echo $flowValues2 . "<br>";

			// Inserting for second fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', 'NA', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', '$flowCondition', '$flowFields2', '$flowValues2', 'Active')") or die(mysqli_error($con));
		}

		// If flow type has one condition
		else
		{
			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Inserting for first fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', 'NA', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
		}
	}

	// If user is selected the basic flow condition
	else
	{
		// echo $flowTitle . "<br>";
		echo $flowDept . "<br>";
		echo $flowForm . "<br>";
		// echo $appSet . "<br>";
		echo $flowType . "<br>";
		
		// $insertQuery = mysqli_query($con, "INSERT INTO docFlow (flowTitle, flowDept, flowForm, appSet, flowType, flowFields, flowValues, condtionType, flowStatus, flowFields2, flowValues2) VALUES ('$flowTitle', '$flowDept', '$flowForm', '$appSet', '$flowType', 'N/A', 'N/A', 'N/A', 'Active', 'N/A', 'N/A')") or die(mysqli_error($con));
		$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', 'NA', '$flowDept', '$flowForm', '$flowType', 'NA', 'NA', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
	}
	// header("Location: approval_flow.php");
}

// Inserting record if there are 3 approvals
else if ($app2 != "Select" && $app3 != "Select")
{
	// If user is selected the fields flow condition
	if ($flowType == "Fields Flow")
	{
		// If flow type has two conditions
		if(isset($_POST['flowCondition']))
		{
			// Declartion of flow condition
			$flowCondition = $_POST['flowCondition'];

			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Second field's vairables
			echo $flowCondition . "<br>";
			echo $flowFields2 . "<br>";
			echo $flowValues2 . "<br>";

			// Inserting for second fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', '$app3', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', '$flowCondition', '$flowFields2', '$flowValues2', 'Active')") or die(mysqli_error($con));

		}

		// If flow type has one condition
		else
		{
			echo $flowDept . "<br>";
			echo $flowForm . "<br>";
			echo $flowType . "<br>";
			echo $flowFields . "<br>";
			echo $flowValues . "<br>";

			// Inserting for first fields flow
			$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', '$app3', '$flowDept', '$flowForm', '$flowType', '$flowValues', '$flowFields', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
		}
	}

	// If user is selected the basic flow condition
	else
	{
		echo $flowDept . "<br>";
		echo $flowForm . "<br>";
		echo $flowType . "<br>";
	
		$insertQuery = mysqli_query($con, "INSERT INTO appdoc (appTitle, appDescription, noApp, app1, app2, app3, appDept, appForm, flowType, flowValues, flowFields, condtionType, flowFields2, flowValues2, savedStatus) VALUES ('$appTitle', '$appDescription', '$noApp', '$app1', '$app2', '$app3', '$flowDept', '$flowForm', '$flowType', 'NA', 'NA', 'NA', 'NA', 'NA', 'Active')") or die(mysqli_error($con));
	}
	// header("Location: approval_flow.php");
}

?>