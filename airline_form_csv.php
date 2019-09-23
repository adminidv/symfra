<?php

include 'manage/connection.php';
// For search result field customization
 $selectAr = mysqli_query($con, 'SELECT * FROM airlinecustomize');
        while ($rowAr = mysqli_fetch_array($selectAr))
          {
            $SrNo_Ar = $rowAr['SrNo_Ar'];
            $air_name_Ar = $rowAr['air_name_Ar'];
            $flight_name_Ar = $rowAr['flight_name_Ar'];
            $address_Ar = $rowAr['address_Ar'];
            $country_Ar = $rowAr['country_Ar'];
            $city_Ar = $rowAr['city_Ar'];
            $account_no_Ar = $rowAr['account_no_Ar'];
            $contact_person_Ar = $rowAr['contact_person_Ar'];
            $con_office_Ar = $rowAr['con_office_Ar'];
            $con_personal_Ar = $rowAr['con_personal_Ar'];
            $fax_no_Ar = $rowAr['fax_no_Ar'];
            $email_Ar = $rowAr['email_Ar'];
            $website_Ar = $rowAr['website_Ar'];
            $kb_adj_Ar = $rowAr['kb_adj_Ar'];
            $awb_standard_Ar = $rowAr['awb_standard_Ar'];
            $iata_mem_Ar = $rowAr['iata_mem_Ar'];
            $sec_charges_Ar = $rowAr['sec_charges_Ar'];
            $fuel_charges_Ar = $rowAr['fuel_charges_Ar'];
            $scan_charges_Ar = $rowAr['scan_charges_Ar'];
            $status_Ar = $rowAr['status_Ar'];

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
<body onload="exportTableToCSV('members.csv')">

    <table>
        <thead>
           <tr>                   
          <?php
                                  if ($SrNo_Ar == 1)
                                  {
                                  ?>
                                  <th>SrNo</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($air_name_Ar == 1)
                                  {
                                  ?>
                                  <th>Airline Name </th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($flight_name_Ar == 1)
                                  {
                                  ?>
                                  <th>Flight Name</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($address_Ar == 1)
                                  {
                                  ?>
                                  <th>Address</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($country_Ar == 1)
                                  {
                                  ?>
                                  <th>Country</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($city_Ar == 1)
                                  {
                                  ?>
                                  <th>City</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($account_no_Ar == 1)
                                  {
                                  ?>
                                  <th>Account No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($contact_person_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Person Airline</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($con_office_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Office</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($con_personal_Ar == 1)
                                  {
                                  ?>
                                  <th>Contact Personal</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($fax_no_Ar == 1)
                                  {
                                  ?>
                                  <th>Fax No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($email_Ar == 1)
                                  {
                                  ?>
                                  <th>Email</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($website_Ar == 1)
                                  {
                                  ?>
                                  <th>Website</th>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($kb_adj_Ar == 1)
                                  {
                                  ?>
                                  <th>KB Adjusted</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($awb_standard_Ar == 1)
                                  {
                                  ?>
                                  <th>Standard AWB No.</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($iata_mem_Ar == 1)
                                  {
                                  ?>
                                  <th>IATA</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($sec_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Security Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($fuel_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Fuel Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($scan_charges_Ar == 1)
                                  {
                                  ?>
                                  <th>Scanning Charges</th>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  if ($status_Ar == 1)
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

               $selectairline = mysqli_query($con, "select * from  airline_setup ");
while ($rowairline= mysqli_fetch_array($selectairline))
                                                          {
                                                            
                                                            $air_name = $rowairline['air_name'];
                                                            $flight_name = $rowairline['flight_name'];
                                                            $address = $rowairline['address'];
                                                            $country = $rowairline['country'];
                                                            $city = $rowairline['city'];
                                                            $account_no = $rowairline['account_no'];
                                                            $contact_person = $rowairline['contact_person'];
                                                            $con_office = $rowairline['con_office'];
                                                            $con_personal = $rowairline['con_personal'];
                                                            $fax_no = $rowairline['fax_no'];
                                                            $email = $rowairline['email'];
                                                            $website = $rowairline['website'];
                                                            $kb_adj = $rowairline['kb_adj'];
                                                            $awb_standard = $rowairline['awb_standard'];;
                                                            $iata_mem = $rowairline['iata_mem'];
                                                            $sec_charges = $rowairline['sec_charges'];
                                                            $fuel_charges = $rowairline['fuel_charges'];
                                                            $scan_charges = $rowairline['scan_charges'];
                                                            $status = $rowairline['status'];
                                                            $id = $rowairline['SrNo'];

            ?>

            <tr>
               <?php
                                                            if ($SrNo_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $id; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($air_name_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $air_name; ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($flight_name_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $flight_name; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($address_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $address; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($country_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $country; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($city_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $city; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($account_no_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $account_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($contact_person_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $contact_person; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($con_office_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_office; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($con_personal_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $con_personal; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($fax_no_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fax_no; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($email_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $email; ?></td>
                                                            <?php
                                                            }
                                                            ?> <?php
                                                            if ($website_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $website; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($kb_adj_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $kb_adj; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($awb_standard_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awb_standard; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($iata_mem_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $iata_mem; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($sec_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $sec_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($fuel_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $fuel_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($scan_charges_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $scan_charges; ?></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($status_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $status; ?></td>
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