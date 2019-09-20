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
                                  <th>Airport Name</th>
                                   <th>IATA Code</th>
                                   <th>ICAO Code</th>
                                   <th>Country Name</th>
                                   <th>City Name</th>
                                   <th>Office No.</th>
                                   <th>fax No.</th>
                                   <th>Email</th>
                                   <th>Wesite</th>
                                   <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                          
                                $selectairport= mysqli_query($con, "SELECT * FROM  airport_setup");

                                while ($rowairport = mysqli_fetch_array($selectairport))
                                {
                                ?>
                        <tr>
                          
                         <td><?php echo $rowairport['airport_name']; ?></td>
                          <td><?php echo $rowairport['airport_iata']; ?></td>
                          <td><?php echo $rowairport['airport_ICAO']; ?></td>
                          <td><?php echo $rowairport['country_name']; ?></td>
                          <td><?php echo $rowairport['city_name']; ?></td>
                          <td><?php echo $rowairport['cont_per_off']; ?></td>
                          <td><?php echo $rowairport['fax_no']; ?></td>
                          <td><?php echo $rowairport['email']; ?></td>
                          <td><?php echo $rowairport['website']; ?></td>
                          <td><?php echo $rowairport['status']; ?></td>
                        
                        </tr>

            <?php
            
              }
            ?>
        </tbody>
    </table>

</body>
</html>