<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];

// For search result field customization

?>

<!DOCTYPE html>
<html>
<head>
  <title>Currency Table</title>
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
                                   
                   <tr>
                                   <!-- <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" />Select All </th> -->
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
                    // window.close();
                    // Close the tab here
                }
            });

        });

    </script>
    <script type="text/javascript">
     function close_popup(){
       window.close();
     }
  </script>

</body>
</html>