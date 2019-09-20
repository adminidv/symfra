<?php

include 'manage/connection.php';
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
    <title>Download File to CSV</title>

    <script type="text/javascript">
         function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {type: "text/csv"});

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }

         function exportTableToCSV(filename) {
            var csv = [];
            var rows = document.querySelectorAll("table tr");
            
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");
                
                for (var j = 0; j < cols.length; j++) 
                    row.push(cols[j].innerText);
                
                csv.push(row.join(","));        
            }

            // Download CSV file
            downloadCSV(csv.join("\n"), filename);
            window.close();
           
            
    }

     </script>
</head>
<body onload="exportTableToCSV('User Records.csv')">

    <table>
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

                $searchQuery = mysqli_query($con, "SELECT * FROM users");

              while ($searchRow= mysqli_fetch_array($searchQuery))
              {
                //$userID = $row['user_ID'];
                $dept_ID = $searchRow['dept_ID'];
                $selectDept = mysqli_query($con , "SELECT * FROM department WHERE dept_ID = '$dept_ID'");
                $rowDept = mysqli_fetch_array($selectDept, MYSQLI_ASSOC);
                if ($dept_ID == $rowDept['dept_ID'])
                {
                  $dept_name = $rowDept['dept_name'];
                }

                $desig_ID = $searchRow['desig_ID'];
                $selectDesig = mysqli_query($con , "SELECT * FROM designation WHERE Desig_ID = '$desig_ID'");
                $rowDesig = mysqli_fetch_array($selectDesig, MYSQLI_ASSOC);
                if ($desig_ID == $rowDesig['Desig_ID'])
                {
                  $Desig_name = $rowDesig['Desig_name'];
                }

                $role_ID = $searchRow['role_ID'];
                $selectRole = mysqli_query($con , "SELECT * FROM roles WHERE role_ID = '$role_ID'");
                $rowRole = mysqli_fetch_array($selectRole, MYSQLI_ASSOC);
                if ($role_ID == $rowRole['role_ID'])
                {
                  $role_Name = $rowRole['role_Name'];
                }
                $id = $searchRow['user_ID'];

                $userName = $searchRow['user_fName'] . ' ' . $searchRow['user_mName'] .' '.$searchRow['user_lName'];
                $email = $searchRow['user_email'];
                $contact = $searchRow['user_contact'];
                $address = $searchRow['user_address'];
                $doj = $searchRow['user_DOJ'];
                $dob = $searchRow['user_DOB'];
                $dol = $searchRow['user_DOL'];
                $region = $searchRow['user_region'];

               // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);

            ?>

            <tr>
                <?php
    if ($userID_UM == 1)
    {
    ?>
    <td><?php echo $id; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userName_UM == 1)
    {
    ?>
    <td><?php echo $userName; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userAddress_UM == 1)
    {
    ?>
    <td><?php echo $address; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userContact_UM == 1)
    {
    ?>
    <td><?php echo $contact; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userEmail_UM == 1)
    {
    ?>
    <td><?php echo $email; ?></td>
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
    <td><?php echo $region; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOB_UM == 1)
    {
    ?>
    <td><?php echo $dob; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOJ_UM == 1)
    {
    ?>
    <td><?php echo $doj; ?></td>
    <?php
    }
    ?>

    <?php
    if ($userDOL_UM == 1)
    {
    ?>
    <td><?php echo $dol; ?></td>
    <?php
    }
    ?>
  </tr>

  <?php

}

?>
        </tbody>
    </table>

</body>
</html>