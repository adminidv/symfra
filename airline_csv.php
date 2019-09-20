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
<body onload="exportTableToCSV('members_dept.csv')">

    <table>
        <thead>
            <tr>
                                  <th>Airport D </th>
                                                              <th>W.E.F</th>
                                                              <th>Security Chg</th>
                                                              <th>Fuel Chg</th>                 
                                                              <th>Screen Chg</th>                
                                                              <th>AWC Chg</th>                  
                                                              <th>AWC Fee</th>                   
                                                              <th>Status</th>  
                                                            </tr>
                                                  </thead>
                                                  <tbody>   

                                                    <?php
                                                        
                                                          $selectairline= mysqli_query($con, "SELECT * FROM  airline_charges_setup");

                                                          while ($rowairline= mysqli_fetch_array($selectairline))
                                                          {
                                                          ?>        
                                                            
                                                              <td><?php echo $rowairline['airport_name']; ?></td> 
                                                              <td><?php echo $rowairline['w_e_f'];?></td> 
                                                              <td><?php echo $rowairline['airport_sec'];?></td>
                                                              <td><?php echo $rowairline['airport_fuel'];?></td>
                                                              <td><?php echo $rowairline['airport_screen'];?></td>
                                                              <td><?php echo $rowairline['airport_awc'];?></td>
                                                              <td><?php echo $rowairline['airport_awb'];?></td>
                                                              <td><?php echo $rowairline['status'];?></td>
                                                            </tr>

            <?php
            
              }
            ?>
        </tbody>
    </table>

</body>
</html>