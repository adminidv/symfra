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
                                  <th>Invoice Code</th>
                                  <th>Invoice Name</th>
                                  <th>Invoice AWB</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selectinv = mysqli_query($con, "select * from invoice_setup ");
                                while ($rowinv = mysqli_fetch_array($selectinv))
                                {
                                ?>
                        <tr>
                          
                            <td><?php echo $rowinv['inv_code']; ?></td>
                          <td><?php echo $rowinv['inv_name']; ?></td>
                          <td><?php echo $rowinv['inv_awb']; ?></td>
                          <td><?php echo $rowinv['status']; ?></td>
                        </tr>

            <?php
            
              }
            ?>
        </tbody>
    </table>

</body>
</html>