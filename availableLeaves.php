<?php

include('manage/connection.php');

$leaveType = $_GET['leaveType'];

$selectRem = "SELECT * FROM leavestaken WHERE leaveType = '".$leaveType."' AND empID='Anas Siddiqui' AND leaveYear='2019' ";
$resultRem = mysqli_query($con, $selectRem);

while($rowRem = mysqli_fetch_array($resultRem)) {
   $remLeaves = $rowRem['leavesRemaining'];
}

echo '
<div class="input-label"><label>Available Leaves</label></div>
<div class="input-feild">
	<input type="text" disabled value="'.$remLeaves.'">
</div>';


// echo "Avialable Leaves: " . $remLeaves;
mysqli_close($con);
?>
</body>
</html>