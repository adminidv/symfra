<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, "SELECT * FROM  destination_setup");

// For search result field customization

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
                                   
                  <th>Destination Code</th>
                  <th>Destination Name</th>
                  <th>Destination Sector</th>
                  <th>Destination Country</th>
                  <th>Status</th>
                                  

      </tr>                            
    </thead>
    <tbody>
<?php


while ($data = mysqli_fetch_array($run))
{
  $dest_code = $data['dest_code'];
  $dest_name = $data['dest_name'];
  $dest_sector = $data['dest_sector'];
  $dest_country = $data['dest_country'];
  $status = $data['status'];
  ?>

  <tr>
          <td><?php echo $data['dest_code']; ?></td>
          <td><?php echo $data['dest_name']; ?></td>
          <td><?php echo $data['dest_sector']; ?></td>
          <td><?php echo $data['dest_country']; ?></td>
          <td><?php echo $data['status']; ?></td>
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