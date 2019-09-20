<?php

include('manage/connection.php');
$id = $_GET['id'];

if(isset($_GET['id']))
{
	$query = mysqli_query($con, "UPDATE department SET savedStatus='Deactive' WHERE dept_ID = '".$_GET['id']."' ");
  	echo $_GET['id'];
 	header("Location: department_setup.php");
}

?>