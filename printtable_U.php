<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, $searchRecord);

// For search result field customization
$selectUM = mysqli_query($con, 'SELECT * FROM tableview_UM');

while ($rowUM = mysqli_fetch_array($selectUM))
{
  $userID_UM = $rowUM['userID_UM'];
  $userName_UM = $rowUM['userName_UM'];
  $userAddress_UM = $rowUM['userAddress_UM'];
  $userContact_UM = $rowUM['userContact_UM'];
  $userEmail_UM = $rowUM['userEmail_UM'];
  $userDept_UM = $rowUM['userDept_UM'];
  $userDesig_UM = $rowUM['userDesig_UM'];
  $userRole_UM = $rowUM['userRole_UM'];
  $userRegion_UM = $rowUM['userRegion_UM'];
  $userDOB_UM = $rowUM['userDOB_UM'];
  $userDOJ_UM = $rowUM['userDOJ_UM'];
  $userDOL_UM = $rowUM['userDOL_UM'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>usertable2</title>
  <style type="text/css">
  .abc {

  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.abc td, .abc th {
  border: 1px solid #ddd;
  padding: 8px;
}

.abc th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fff;
  color: black;
}

  }
  </style>

<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();
}
</script>

</head>
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc">
    <thead>
      <tr>                   
          <?php
          if ($userID_UM == 1)
          {
          ?>
          <th>User ID</th>
          <?php
          }
          ?>

          <?php
          if ($userName_UM == 1)
          {
          ?>
          <th>User Name</th>
          <?php
          }
          ?>

          <?php
          if ($userAddress_UM == 1)
          {
          ?>
          <th>Address</th>
          <?php
          }
          ?>

          <?php
          if ($userContact_UM == 1)
          {
          ?>
          <th>Contact No.</th>
          <?php
          }
          ?>

          <?php
          if ($userEmail_UM == 1)
          {
          ?>
          <th>Email ID</th>
          <?php
          }
          ?>

          <?php
          if ($userDept_UM == 1)
          {
          ?>
          <th>Department</th>
          <?php
          }
          ?>

          <?php
          if ($userDesig_UM == 1)
          {
          ?>
          <th>Designation</th>
          <?php
          }
          ?>

          <?php
          if ($userRole_UM == 1)
          {
          ?>
          <th>Role</th>
          <?php
          }
          ?>

          <?php
          if ($userRegion_UM == 1)
          {
          ?>
          <th>Region</th>
          <?php
          }
          ?>

          <?php
          if ($userDOB_UM == 1)
          {
          ?>
          <th>Date of Birth</th>
          <?php
          }
          ?>

          <?php
          if ($userDOJ_UM == 1)
          {
          ?>
          <th>Date of Joining</th>
          <?php
          }
          ?>

          <?php
          if ($userDOL_UM == 1)
          {
          ?>
          <th>Date of Leaving</th>
          <?php
          }
          ?>
      </tr>
    </thead>
    <tbody>
<?php


while ($data = mysqli_fetch_array($run))
{
  $user_ID = $data['user_ID'];
  $user_fName = $data['user_fName'] . ' ' . $data['user_mName'] . ' ' . $data['user_lName'];
  $user_address = $data['user_address'];
  $user_contact = $data['user_contact'];
  $user_email = $data['user_email'];
  $dept_ID = $data['dept_ID'];
  $desig_ID = $data['desig_ID'];
  $role_ID = $data['role_ID'];
  $user_region = $data['user_region'];
  $user_DOB = $data['user_DOB'];
  $user_DOJ = $data['user_DOJ'];
  $user_DOL = $data['user_DOL'];

  ?>

  <tr>
    <?php
    if ($userID_UM == 1)
    {
    ?>
    <td><?php echo $user_ID; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userName_UM == 1)
    {
    ?>
    <td><?php echo $user_fName; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userAddress_UM == 1)
    {
    ?>
    <td><?php echo $user_address; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userContact_UM == 1)
    {
    ?>
    <td><?php echo $user_contact; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userEmail_UM == 1)
    {
    ?>
    <td><?php echo $user_email; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDept_UM == 1)
    {
    ?>
    <td><?php echo $dept_ID; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDesig_UM == 1)
    {
    ?>
    <td><?php echo $desig_ID; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userRole_UM == 1)
    {
    ?>
    <td><?php echo $role_ID; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userRegion_UM == 1)
    {
    ?>
    <td><?php echo $user_region; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOB_UM == 1)
    {
    ?>
    <td><?php echo $user_DOB; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOJ_UM == 1)
    {
    ?>
    <td><?php echo $user_DOJ; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOL_UM == 1)
    {
    ?>
    <td><?php echo $user_DOL; ?></td>
    <?php
    }
    ?>
  </tr>

  <?php

}

?>
                     
</tbody>
</table>

<script type="text/javascript">
   function close_popup(){
     window.close();
   }
</script>

</body>
</html>