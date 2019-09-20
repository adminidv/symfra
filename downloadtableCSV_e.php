<?php

include 'manage/connection.php';
include("manage/session.php");

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

// For search result field customization
$selectUM = mysqli_query($con, 'SELECT * FROM table_em');

while ($rowEM = mysqli_fetch_array($selectUM))
{
              $empFName_em = $rowEM['empFName_em'];
              $empMName_em = $rowEM['empMName_em'];
              $empLName_em = $rowEM['empLName_em'];
              $empNo_em= $rowEM['empNo_em'];
              $cnicNo_em = $rowEM['cnicNo_em'];
              $ntnNo_em = $rowEM['ntnNo_em'];
              $empName_em = $rowEM['empName_em'];
              $empGrdName_em = $rowEM['empGrdName_em'];
              $empDOB_em = $rowEM['empDOB_em'];
              $empCell_em = $rowEM['empCell_em'];
              $empOffice_em = $rowEM['empOffice_em'];
              $empHomeNo_em = $rowEM['empHomeNo_em'];
              $empEmergencyNo_em = $rowEM['empEmergencyNo_em'];
              $empMaritalStatus_em = $rowEM['empMaritalStatus_em'];
              $empSpouseName_em = $rowEM['empSpouseName_em'];
              $empChildren_em= $rowEM['empChildren_em'];
              $empDept_em = $rowEM['empDept_em'];
              $empDesig_em = $rowEM['empDesig_em'];
              $empGrade_em = $rowEM['empGrade_em'];
              $empEntity_em = $rowEM['empEntity_em'];
              $lineManager_em = $rowEM['lineManager_em'];
              $empCountry_em = $rowEM['empCountry_em'];
              $empCity_em = $rowEM['empCity_em'];
              $empAddress_em = $rowEM['empAddress_em'];
              $empDOJ_em = $rowEM['empDOJ_em'];
              $empWorkEmail_em = $rowEM['empWorkEmail_em'];
              $empGender_em = $rowEM['empGender_em'];
              $leavePckg_em = $rowEM['leavePckg_em'];
              $savedStatus_em = $rowEM['savedStatus_em'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Records | CSV</title>

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
<body onload="exportTableToCSV('members.csv')">

    <table>
        <thead>
            <tr>
          <?php
          if ($empNo_em == 1)
          {
          ?>
          <th>Employee ID</th>
          <?php
          }
          ?>

          <?php
          if ($empFName_em == 1)
          {
          ?>
          <th>First Name</th>
          <?php
          }
          ?>

          <?php
          if ($empMName_em == 1)
          {
          ?>
          <th>Middle Name</th>
          <?php
          }
          ?>

          <?php
          if ($empLName_em == 1)
          {
          ?>
          <th>Last Name</th>
          <?php
          }
          ?>

          <?php
          if ($empName_em == 1)
          {
          ?>
          <th>Employee Name</th>
          <?php
          }
          ?>

          <?php
          if ($empGrdName_em == 1)
          {
          ?>
          <th>Father/Husband</th>
          <?php
          }
          ?>

          <?php
          if ($empCell_em == 1)
          {
          ?>
          <th>Contact No.</th>
          <?php
          }
          ?>
          
          <?php
          if ($empHomeNo_em == 1)
          {
          ?>
          <th>Home No.</th>
          <?php
          }
          ?>
          <?php
          if ($empEmergencyNo_em == 1)
          {
          ?>
          <th>Emergency No.</th>
          <?php
          }
          ?>
          

          <?php
          if ($empWorkEmail_em == 1)
          {
          ?>
          <th>Email ID</th>
          <?php
          }
          ?>

          <?php
          if ($empDept_em == 1)
          {
          ?>
          <th>Department</th>
          <?php
          }
          ?>

          <?php
          if ($empDesig_em == 1)
          {
          ?>
          <th>Designation</th>
          <?php
          }
          ?>

          <?php
          if ($empEntity_em == 1)
          {
          ?>
          <th>Entity</th>
          <?php
          }
          ?>

          <?php
          if ($empGrade_em == 1)
          {
          ?>
          <th>Grade</th>
          <?php
          }
          ?>

          <?php
          if ($empDOB_em == 1)
          {
          ?>
          <th>Date of Birth</th>
          <?php
          }
          ?>

          <?php
          if ($empDOJ_em == 1)
          {
          ?>
          <th>Date of Joining</th>
          <?php
          }
          ?>

          <?php
          if ($leavePckg_em == 1)
          {
          ?>
          <th>Leave Pakage</th>
          <?php
          }
          ?>

          <?php
          if ($ntnNo_em == 1)
          {
          ?>
          <th>NTN Number</th>
          <?php
          }
          ?>
          <?php
          if ($cnicNo_em == 1)
          {
          ?>
          <th>CNIC Number</th>
          <?php
          }
          ?>
          <?php
          if ($empGender_em == 1)
          {
          ?>
          <th>Gender</th>
          <?php
          }
          ?>
          <?php

          if ($empAddress_em == 1)
          {
          ?>
          <th>Adddress</th>
          <?php
          }
          ?>
          <?php
          if ($empCity_em == 1)
          {
          ?>
          <th>City</th>
          <?php
          }
          ?>
          <?php
          if ($empCountry_em == 1)
          {
          ?>
          <th>Country</th>
          <?php
          }
          ?>
          <?php
          if ($lineManager_em == 1)
          {
          ?>
          <th>Reporting Manager</th>
          <?php
          }
          ?>
          
          <?php
          if ($empMaritalStatus_em == 1)
          {
          ?>
          <th>Marital Status</th>
          <?php
          }
          ?>
            </tr>
        </thead>

        <tbody>
            <?php

                                  $qry1 = mysqli_query($con, "SELECT * FROM empinfo WHERE userBr='$userBr' ");

                                   while ($row = mysqli_fetch_array($qry1))
                                   {
                                      $empNo= $row['empNo'];
                                      $cnicNo = $row['cnicNo'];
                                      $ntnNo = $row['ntnNo'];
                                      $empFName = $row['empFName'];
                                      $empMName = $row['empMName'];
                                      $empLName = $row['empLName'];
                                      $empName = $row['empName'];
                                      $empGrdName = $row['empGrdName'];
                                      $empDOB = $row['empDOB'];
                                      $empCell = $row['empCell'];
                                      $empHomeNo = $row['empHomeNo'];
                                      $empEmergencyNo = $row['empEmergencyNo'];
                                      $emergRel = $row['emergRel'];
                                      $empMaritalStatus = $row['empMaritalStatus'];
                                      $empDept = $row['empDept'];
                                      $empDesig = $row['empDesig'];
                                      $empGrade = $row['empGrade'];
                                      $empEntity = $row['empEntity'];
                                      $lineManager = $row['lineManager'];
                                      $empCountry = $row['empCountry'];
                                      $empCity = $row['empCity'];
                                      $empAddress = $row['empAddress'];
                                      $empDOJ = $row['empDOJ'];
                                      $empWorkEmail = $row['empWorkEmail'];
                                      $empGender = $row['empGender'];
                                      $leavePckg = $row['leavePckg'];
                                      $savedStatus = $row['savedStatus'];
                                      //$empNo=$row['empNo'];
  ?>

 <tr>                   
           <?php
                                            if ($empNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empNo; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empFName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empFName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empMName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empMName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empLName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empLName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empGrdName_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGrdName; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empCell_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCell; ?></td>
                                            <?php
                                            }
                                            ?>
                                            
                                            <?php
                                            if ($empHomeNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empHomeNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empEmergencyNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empEmergencyNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            

                                            <?php
                                            if ($empWorkEmail_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empWorkEmail; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDept_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDept; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDesig_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDesig; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empEntity_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empEntity; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empGrade_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGrade; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDOB_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDOB; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($empDOJ_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empDOJ; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($leavePckg_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $leavePckg; ?></td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($ntnNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $ntnNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($cnicNo_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $cnicNo; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empGender_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empGender; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php

                                            if ($empAddress_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empAddress; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empCity_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCity; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($empCountry_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empCountry; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($lineManager_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $lineManager; ?></td>
                                            <?php
                                            }
                                            ?>
                                            
                                            <?php
                                            if ($empMaritalStatus_em == 1)
                                            {
                                            ?>
                                            <td><?php echo $empMaritalStatus; ?></td>
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