<?php

include 'manage/connection.php';

$searchRecord = $_GET["searchRecord"];


// For search result field customization

?>

<!DOCTYPE html>
<html>
<head>
  <title>Foreign Associate Table</title>
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