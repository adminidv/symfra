<?php

include('manage/connection.php');

$userID = $_GET['user_id'];

// Checking for user auth ID
$selectAuth_U = mysqli_query($con, "SELECT * FROM users WHERE user_ID='". $userID ."'");
while ($rowAuth_U = mysqli_fetch_array($selectAuth_U))
{
	$authID_U = $rowAuth_U['Auth_ID'];
}

// Selecting authorization name according to user auth id
$selectAuth_N = mysqli_query($con , "SELECT * FROM authorizationset WHERE Auth_ID = '$authID_U'");
$rowAuth_N = mysqli_fetch_array($selectAuth_N, MYSQLI_ASSOC);
if ($authID_U == $rowAuth_N['Auth_ID'])
{
	$auth_Name_U = $rowAuth_N['auth_Name'];
}

// Checking for user auth ID
$selectAuth_D = mysqli_query($con, "SELECT * FROM authdetails WHERE auth_Name='". $auth_Name_U ."'");
while ($rowAuth_D = mysqli_fetch_array($selectAuth_D))
{
	$userAdd_U = $rowAuth_D['add_U'];
	$userUpdate_U = $rowAuth_D['update_U'];
	$userDelete_U = $rowAuth_D['delete_U'];
	$userView_U = $rowAuth_D['view_U'];
}



if (isset($_POST['btnSubmit']))
{

	// Setting the POST variables coming from form
	//$auth_Name = $_POST['auth_Name'];
	$user_ID = $_GET['user_id'];

	$userAdd = 0;
	$userUpdate = 0;
	$userDelete = 0;
	$userView = 0;

	if (isset($_POST['userAdd']))
	{
		$userAdd = 1;
	}
	if (isset($_POST['userUpdate']))
	{
		$userUpdate = 1;
	}
	if (isset($_POST['userDelete']))
	{
		$userDelete = 1;
	}
	if (isset($_POST['userView']))
	{
		$userView = 1;
	}

	// Inserting records to Authorization Set
	$insertAuthSet = mysqli_query($con, "insert into authorizationSet (auth_Name) values ('$user_ID')");

	// Inserting records to Authorization Details
	$insertAuthDetails = mysqli_query($con, "insert into authDetails (auth_Name, add_U, update_U, delete_U, view_U) values ('$user_ID', $userAdd, $userUpdate, $userDelete, $userView)");

	if ($insertAuthSet)
	{
		echo "Authorization set inserted successfully.";	
	}

	else
	{
		// Generating the alert
		echo "Got error.";
	}

	//Inserting records to Assign Authorization table
	// $insertAuthSet = mysqli_query($con, "insert into authAssign (dept_Name, desig_Name, auth_Name) values ('0', '0', '$auth_Name')");


	$upqry= mysqli_query($con, "UPDATE users SET Auth_ID = '9' WHERE user_ID= '$user_ID' ");
	if ($upqry)
	{
		echo 'All Done.';
	}
	else
	{
		echo mysqli_error($con);
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Custom Authorization</title>
</head>
<body>

<div>
	<form method="POST" action="">
		<h1>Assigning Custom Authorization</h1>
		
		<br>
		
		<div style="border: solid 2px black; width: 20%;">
			<label>Users:</label>
			<br><br>
			<?php
			if ($userAdd_U == 1)
			{
				echo '<input type="checkbox" name="userAdd" value="Add User" checked /> Add User <br>';
			}
			else
			{
				echo '<input type="checkbox" name="userAdd" value="Add User" /> Add User <br>';
			}

			if ($userUpdate_U == 1)
			{
				echo '<input type="checkbox" name="userUpdate" value="Update User" checked /> Update User <br>';
			}
			else
			{
				echo '<input type="checkbox" name="userUpdate" value="Update User" /> Update User <br>';
			}

			if ($userDelete_U == 1)
			{
				echo '<input type="checkbox" name="userDelete" value="Delete User" checked /> Delete User <br>';
			}
			else
			{
				echo '<input type="checkbox" name="userDelete" value="Delete User" /> Delete User <br>';
			}

			if ($userView_U == 1)
			{
				echo '<input type="checkbox" name="userView" value="View User" checked /> View User <br>';
			}
			else
			{
				echo '<input type="checkbox" name="userView" value="View User" /> View User <br>';
			}

			?>
			
		</div>

		<br>

		<div style="border: solid 2px black; width: 20%;">
			<label>Sales:</label>
			<br><br>
			<input type="checkbox" name="" value="Add Sales" /> Add Sales <br>
			<input type="checkbox" name="" value="Update Sales" /> Update Sales <br>
			<input type="checkbox" name="" value="Delete Sales" /> Delete Sales <br>
			<input type="checkbox" name="" value="View Sales" /> View Sales <br>
		</div>

		<br>

		<input type="submit" name="btnSubmit">
	</form>
</div>

</body>
</html>