<?php

include 'manage/connection.php';

// $searchRecord = $_GET["searchRecord"];
// $run= mysqli_query($con, "SELECT * FROM users");

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
            $airline_icao_Ar = $rowAr['airline_icao_Ar'];
            $con_office_Ar = $rowAr['con_office_Ar'];
            $airline_iata_Ar = $rowAr['airline_iata_Ar'];
            $fax_no_Ar = $rowAr['fax_no_Ar'];
            $email_Ar = $rowAr['email_Ar'];
            $website_Ar = $rowAr['website_Ar'];
            $kb_adj_Ar = $rowAr['kb_adj_Ar'];
            $awb_standard_Ar = $rowAr['awb_standard_Ar'];
            $awb_code_Ar = $rowAr['awb_code_Ar'];
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
  <title>usertable2</title>
  <style type="text/css">
  .abc {

  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.abc td, .abc th {
  border: 1px solid #ddd;
  padding: 8px;
}

.abc th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fff;
  color: black;
}

  }
  </style>

</head>
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc" id="usrtble">
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
                                  if ($airline_icao_Ar == 1)
                                  {
                                  ?>
                                  <th>ICAO</th>
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
                                  if ($airline_iata_Ar == 1)
                                  {
                                  ?>
                                  <th>IATA</th>
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
                                  if ($awb_code_Ar == 1)
                                  {
                                  ?>
                                  <th>AWB Code.</th>
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
                                                            $airline_icao = $rowairline['airline_icao'];
                                                            $con_office = $rowairline['con_office'];
                                                            $airline_iata = $rowairline['airline_iata'];
                                                            $fax_no = $rowairline['fax_no'];
                                                            $email = $rowairline['email'];
                                                            $website = $rowairline['website'];
                                                            $kb_adj = $rowairline['kb_adj'];
                                                            $awb_standard = $rowairline['awb_standard'];
                                                            $awb_code = $rowairline['awb_code'];
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
                                                            if ($airline_icao_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airline_icao; ?></td>
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
                                                            if ($airline_iata_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $airline_iata; ?></td>
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
                                                            ?> 

                                                            <?php
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
                                                            if ($awb_code_Ar == 1)
                                                            {
                                                            ?>
                                                            <td><?php echo $awb_code; ?></td>
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

<button type="button" id="btnExport">Click</button>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            html2canvas($('#usrtble')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                    
                    // Close the tab here
                }
            });


        });
        /*window.close();*/

    </script>

    <script type="text/javascript">
       function close_popup(){
         window.close();
       }
    </script>

</body>
</html>