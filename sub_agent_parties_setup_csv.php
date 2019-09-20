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
                                  <th>SrNo</th>
                                  <th>Party Name </th>
                                  <th>Sub Party Name</th>
                                  <th>Country</th>
                                  <th>City</th>
                                  <th>Address</th>
                                  <th>Phone</th>
                                  <th>Fax</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th>Export Reg. No</th>
                                  <th>Sales Tax No.</th>
                                  <th>NTN No.</th>
                                  <th>Status</th>
                                 

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selectvar= mysqli_query($con, "SELECT * FROM  sub_agents_parties_setup");
                                while ($rowtablevar = mysqli_fetch_array($selectvar))
                                {
                                ?>
                        <tr>
                          
                          <td><?php echo $rowtablevar['SrNo']; ?></td>
                          <td><?php echo $rowtablevar['partyname']; ?></td>
                          <td><?php echo $rowtablevar['subpartyname']; ?></td>
                          <td><?php echo $rowtablevar['address']; ?></td>
                          <td><?php echo $rowtablevar['country']; ?></td>
                          <td><?php echo $rowtablevar['city']; ?></td>
                          <td><?php echo $rowtablevar['phone']; ?></td>
                          <td><?php echo $rowtablevar['fax']; ?></td>
                          <td><?php echo $rowtablevar['email']; ?></td>
                          <td><?php echo $rowtablevar['website']; ?></td>
                          <td><?php echo $rowtablevar['export_reg_no']; ?></td>
                          <td><?php echo $rowtablevar['sales_tax_no']; ?></td>
                          <td><?php echo $rowtablevar['ntn_no']; ?></td>

                          <td><?php echo $rowtablevar['status']; ?></td>

                        </tr>

            <?php
            
              }
            ?>
        </tbody>
    </table>

</body>
</html>