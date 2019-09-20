<?php

include 'manage/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Signatory Table</title>
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

<script type="text/javascript">
  window.onload = function() {
   window.print(); 
 }
</script>

<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();
}
</script>

</head>
<body onLoad="setTimeout('close_popup()', 2500)">
  <table class="abc">
    <thead>
                                  <tr>
                                   <!-- <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" />Select All </th> -->
                                 
                                 
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
                                  <th>View</th>
                                  <th>Edit</th>
                                  <th>Action</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selectsig= mysqli_query($con, "SELECT * FROM  sub_agent_parties_setup");
                                while ($rowsig = mysqli_fetch_array($selectsig))
                                {
                                ?>
                        <tr>
                          

                          <td><?php echo $rowsig['partyname']; ?></td>
                          <td><?php echo $rowsig['subpartyname']; ?></td>
                          <td><?php echo $rowsig['country']; ?></td>
                          <td><?php echo $rowsig['city']; ?></td>
                          <td><?php echo $rowsig['address']; ?></td>
                          <td><?php echo $rowsig['phone']; ?></td>
                          <td><?php echo $rowsig['fax']; ?></td>

                          <td><?php echo $rowsig['email']; ?></td>
                          <td><?php echo $rowsig['website']; ?></td>
                          <td><?php echo $rowsig['export_reg_no']; ?></td>
                          <td><?php echo $rowsig['sales_tax_no']; ?></td>
                          <td><?php echo $rowsig['ntn_no']; ?></td>

                        </tr>
                        <?php
                          }
                          ?>

                      </tbody>  
</table>

<script type="text/javascript">
     function close_popup(){
       window.close();
     }
  </script>
  
</body>
</html>