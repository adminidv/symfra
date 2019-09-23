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
                                  <th>City Code</th>
                                  <th>City Name</th>
                                  <th>Country Name</th>
                                  <th>City Tel.Code</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selectcity = mysqli_query($con, "select * from city_setup ");
                                while ($rowcity = mysqli_fetch_array($selectcity))
                                {
                                ?>
                        <tr>
                          
                          <td><?php echo $rowcity['city_code']; ?></td>
                          <td><?php echo $rowcity['city_name']; ?></td>
                          <td><?php echo $rowcity['country_name']; ?></td>
                          <td><?php echo $rowcity['city_tel_code']; ?></td>
                          <td><?php echo $rowcity['status']; ?></td>
                        </tr>

            <?php
            
              }
            ?>
        </tbody>
    </table>

</body>
</html>