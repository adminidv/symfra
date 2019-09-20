<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, "SELECT * FROM expectedship");

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
  <title>Expected Shipment | PDF</title>
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
          if ($shipDate_cus == 1)
          {
          ?>
          <th>Date</th>
          <?php
          }
          ?>

          <?php
          if ($shipDay_cus == 1)
          {
          ?>
          <th>Day</th>
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
          <th>Pcs.</th>
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

while ($data = mysqli_fetch_array($run))
{
  $shipDate = $data['shipDate'];
  $shipDay = $data['shipDay'];
  $shipperName = $data['shipperName'];
  $awbNo = $data['awbNo'];
  $shipAirline = $data['shipAirline'];
  $shipPcs = $data['shipPcs'];
  $shipWeight = $data['shipWeight'];
  $finalPcs = $data['finalPcs'];
  $f_GrWeight = $data['f_GrWeight'];
  $f_ChWeight = $data['f_ChWeight'];
  $shipDest = $data['shipDest'];
  $shipHAWB = $data['shipHAWB'];
  $shipStatus = $data['shipStatus'];

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
                    pdfMake.createPdf(docDefinition).download("Expected Shipment.pdf");
                    
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