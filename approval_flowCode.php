<?php

include('manage/connection.php');
include("manage/session.php");

$appDept = $_POST['appDept'];
$appTitle = $_POST['appTitle'];
$appDescription = $_POST['appDescription'];
$noApp = $_POST['noApp'];
$app1 = $_POST['app1'];
$app2 = $_POST['app2'];
$app3 = $_POST['app3'];

echo $appDept . '<br>';
echo $appTitle . '<br>';
echo $appDescription . '<br>';
echo $noApp . '<br>';
echo $app1 . '<br>';
echo $app2 . '<br>';
echo $app3 . '<br>';

// Inserting record if there is only 1 approval
if ($app2 == "Select" && $app3 == "Select")
{
	$insertQuery = mysqli_query($con, "INSERT INTO appFlow (appTitle, appDepartment, appDescription, noApp, app1, app2, app3, appStatus) VALUES ('$appTitle', '$appDept', '$appDescription', '$noApp', '$app1', 'NA', 'NA', 'Active') ");

	header("Location: approval_flow.php");
}

// Inserting record if there are 2 approvals
else if ($app2 != "Select" && $app3 == "Select")
{
	$insertQuery = mysqli_query($con, "INSERT INTO appFlow (appTitle, appDepartment, appDescription, noApp, app1, app2, app3, appStatus) VALUES ('$appTitle', '$appDept', '$appDescription', '$noApp', '$app1', '$app2', 'NA', 'Active') ");

	header("Location: approval_flow.php");
}

// Inserting record if there are 3 approvals
else if ($app2 != "Select" && $app3 != "Select")
{
	$insertQuery = mysqli_query($con, "INSERT INTO appFlow (appTitle, appDepartment, appDescription, noApp, app1, app2, app3, appStatus) VALUES ('$appTitle', '$appDept', '$appDescription', '$noApp', '$app1', '$app2', '$app3', 'Active') ");

	header("Location: approval_flow.php");
}

?>