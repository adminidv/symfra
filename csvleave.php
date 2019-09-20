<?php

include 'manage/connection.php';

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
<body onload="exportTableToCSV('leave.csv')">

    <table>
        <thead>
            <tr>
                <th>Emp ID</th>
                  <th>Week Day</th>
                  <th>leave Type</th>
                  <th>Hours</th>
                  <th>Approved By</th>
                  <th>Cancelled By</th>
                  <th>Status</th>
                                                
            </tr>
        </thead>

        <tbody>
            <?php

                                  $qry1 = mysqli_query($con, "SELECT * FROM  leavemanagement ");

                                    while($row = mysqli_fetch_array($qry1)) {
                                      $empID = $row['empID'];
                                      $weekDate = $row['weekDate'];
                                      $leaveType = $row['leaveType'];
                                      $hoursTaken = $row['hoursTaken'];
                                      $approvedBy = $row['approvedBy'];
                                      $leaveReason = $row['leaveReason'];
                                      $status = $row['status'];
                                     
                                    //$empNo=$row['empNo'];
          
                                  ?>

            <tr>
                                    
                                    <td><?php echo $empID; ?></td>
                                    <td><?php echo $weekDate ; ?></td>
                                    <td><?php echo $leaveType; ?></td>
                                    <td><?php echo $hoursTaken ; ?></td>
                                    <td><?php echo $approvedBy; ?></td>
                                    <td><?php echo $leaveReason ; ?></td>
                                    <td><?php echo $status; ?></td>
                                    
            </tr>

            <?php
              }
            ?>
        </tbody>
    </table>

</body>
</html>