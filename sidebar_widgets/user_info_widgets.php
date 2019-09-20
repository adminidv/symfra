<?php

//include("manage/session.php");
include('manage/connection.php');

$selectUser_C = mysqli_query($con, "select * from users where user_ID='$username'");
while ($rowUser_C = mysqli_fetch_array($selectUser_C))
{
  $uName_C = $rowUser_C['user_fName'];
  $desig_ID = $rowUser_C['desig_ID'];
  $userImg = $rowUser_C['user_img'];
}

$selectDesig_C = mysqli_query($con, "select * from designation where Desig_ID='$desig_ID'");
while ($rowDesig_C = mysqli_fetch_array($selectDesig_C))
{
  $Desig_name = $rowDesig_C['Desig_name'];
}

?>

          <div class="sidebar-header">
                <div class="user-pic">
                  <img class="img-responsive img-rounded" src="Profile Images/<?php echo $userImg; ?>"
                    alt="User picture">
                </div>
                <div class="user-info">
                  <span class="user-name"><!-- Adam --> 
                    <strong><?php echo $uName_C; ?></strong>
                  </span>
                  <span class="user-role"><?php echo $Desig_name; ?></span>
                  <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                  </span>
                </div>
              </div>