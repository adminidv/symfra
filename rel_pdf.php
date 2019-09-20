<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, "SELECT * FROM emprelation");

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
<body>
  <table class="abc" id="usrtble">
    <thead>
     <tr>
                                   
                  <th>Relation ID</th>
                  <th>Relation Name</th>
                                  

      </tr>                            
    </thead>
    <tbody>
<?php


while ($data = mysqli_fetch_array($run))
{
  $rel_id = $data['rel_id'];
  $rel_name = $data['rel_name'];

  ?>

  <tr>
          <td><?php echo $data['rel_id']; ?></td>
          <td><?php echo $data['rel_name']; ?></td>
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
                    window.close();
                    // Close the tab here
                }
            });

        });

    </script>

</body>
</html>