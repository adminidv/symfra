<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];
$run= mysqli_query($con, "SELECT * FROM leavemanagement");

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
                                   
            <th>Emp ID</th>
            <th>Week Day</th>
            <th>leave Type</th>
            <th>Hours</th>
            <th>Approved By</th>
            <th>Cancelled By</th>
            <th>Status</th>
            

      </tr>                            
    </thead>
    <tbody>
<?php


while ($data = mysqli_fetch_array($run))
{
          $empID = $data['empID'];
          $weekDate = $data['weekDate'];
          $leaveType = $data['leaveType'];
          $hoursTaken = $data['hoursTaken'];
          $approvedBy = $data['approvedBy'];
          $leaveReason = $data['leaveReason'];
          $status = $data['status'];

  ?>

  <tr>
          <td><?php echo $empID; ?></td>
          <td><?php echo $weekDate ; ?></td>
          <td><?php echo $leaveType; ?></td>
          <td><?php echo $hoursTaken ; ?></td>
          <td><?php echo $approvedBy; ?></td>
          <td><?php echo $leaveReason ; ?></td>
          <td><?php echo $status; ?></td>
  </tr>

  <?php

}

?>
                     
</tbody>
</table>



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