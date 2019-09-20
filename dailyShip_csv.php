<?php

include 'manage/connection.php';
// For search result field customization
$selectUM = mysqli_query($con, 'SELECT * FROM expectedship_cus');

while ($rowUM = mysqli_fetch_array($selectUM))
{
  $shipDate_cus = $rowUM['shipDate_cus'];
  $shipDay_cus = $rowUM['shipDay_cus'];
  $shipperName_cus = $rowUM['shipperName_cus'];
  $awbNo_cus = $rowUM['awbNo_cus'];
  $shipAirline_cus = $rowUM['shipAirline_cus'];
  $shipPcs_cus = $rowUM['shipPcs_cus'];
  $shipWeight_cus = $rowUM['shipWeight_cus'];
  $finalPcs_cus = $rowUM['finalPcs_cus'];
  $f_GrWeight_cus = $rowUM['f_GrWeight_cus'];
  $f_ChWeight_cus = $rowUM['f_ChWeight_cus'];
  $shipDest_cus = $rowUM['shipDest_cus'];
  $shipHAWB_cus = $rowUM['shipHAWB_cus'];
  $shipStatus_cus = $rowUM['shipStatus_cus'];
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
<body onload="exportTableToCSV('Expected Shipment.csv')">

    <table>
        <thead>
            <tr>
          <?php
          if ($shipDate_cus == 1)
          {
          ?>
          <th>Ship Date</th>
          <?php
          }
          ?>

          <?php
          if ($shipDay_cus == 1)
          {
          ?>
          <th>Ship Day</th>
          <?php
          }
          ?>

          <?php
          if ($shipperName_cus == 1)
          {
          ?>
          <th>Shipper Name</th>
          <?php
          }
          ?>

          <?php
          if ($awbNo_cus == 1)
          {
          ?>
          <th>AWB No.</th>
          <?php
          }
          ?>

          <?php
          if ($shipAirline_cus == 1)
          {
          ?>
          <th>Airline</th>
          <?php
          }
          ?>

          <?php
          if ($shipPcs_cus == 1)
          {
          ?>
          <th>Pcs.</th>
          <?php
          }
          ?>

          <?php
          if ($shipWeight_cus == 1)
          {
          ?>
          <th>Weight</th>
          <?php
          }
          ?>

          <?php
          if ($finalPcs_cus == 1)
          {
          ?>
          <th>Final Pcs.</th>
          <?php
          }
          ?>

          <?php
          if ($f_GrWeight_cus == 1)
          {
          ?>
          <th>Final Gr. Weight</th>
          <?php
          }
          ?>

          <?php
          if ($f_ChWeight_cus == 1)
          {
          ?>
          <th>Final Ch. Weight</th>
          <?php
          }
          ?>

          <?php
          if ($shipDest_cus == 1)
          {
          ?>
          <th>Destination</th>
          <?php
          }
          ?>

          <?php
          if ($shipHAWB_cus == 1)
          {
          ?>
          <th>HAWB</th>
          <?php
          }
          ?>

          <?php
          if ($shipStatus_cus == 1)
          {
          ?>
          <th>Status</th>
          <?php
          }
          ?>
            </tr>
        </thead>

        <tbody>
            <?php

              $searchQuery = mysqli_query($con, "SELECT * FROM expectedship");

              while ($searchRow= mysqli_fetch_array($searchQuery))
              {
                $shipDate = $searchRow['shipDate'];
                $shipDay = $searchRow['shipDay'];
                $shipperName = $searchRow['shipperName'];
                $awbNo = $searchRow['awbNo'];
                $shipAirline = $searchRow['shipAirline'];
                $shipPcs = $searchRow['shipPcs'];
                $shipWeight = $searchRow['shipWeight'];
                $finalPcs = $searchRow['finalPcs'];
                $f_GrWeight = $searchRow['f_GrWeight'];
                $f_ChWeight = $searchRow['f_ChWeight'];
                $shipDest = $searchRow['shipDest'];
                $shipHAWB = $searchRow['shipHAWB'];
                $shipStatus = $searchRow['shipStatus'];

               // $user_arr[] = array($userName,$email,$contact,$address,$dept_name,$Desig_name,$role_Name, $doj);

            ?>

            <tr>
                <?php
    if ($shipDate_cus == 1)
    {
    ?>
    <td><?php echo $shipDate; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipDay_cus == 1)
    {
    ?>
    <td><?php echo $shipDay; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipperName_cus == 1)
    {
    ?>
    <td><?php echo $shipperName; ?></td>
    <?php
    }
    ?>

    <?php
    if ($awbNo_cus == 1)
    {
    ?>
    <td><?php echo $awbNo; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipAirline_cus == 1)
    {
    ?>
    <td><?php echo $shipAirline; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipPcs_cus == 1)
    {
    ?>
    <td><?php echo $shipPcs; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipWeight_cus == 1)
    {
    ?>
    <td><?php echo $shipWeight; ?></td>
    <?php
    }
    ?>

    <?php
    if ($finalPcs_cus == 1)
    {
    ?>
    <td><?php echo $finalPcs; ?></td>
    <?php
    }
    ?>

    <?php
    if ($f_GrWeight_cus == 1)
    {
    ?>
    <td><?php echo $f_GrWeight; ?></td>
    <?php
    }
    ?>

    <?php
    if ($f_ChWeight_cus == 1)
    {
    ?>
    <td><?php echo $f_ChWeight; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipDest_cus == 1)
    {
    ?>
    <td><?php echo $shipDest; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipHAWB_cus == 1)
    {
    ?>
    <td><?php echo $shipHAWB; ?></td>
    <?php
    }
    ?>

    <?php
    if ($shipStatus_cus == 1)
    {
    ?>
    <td><?php echo $shipStatus; ?></td>
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