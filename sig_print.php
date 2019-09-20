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
                                 
                                   <th>Signatory Name</th>
                                  <th>Designation</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selectsig= mysqli_query($con, "SELECT * FROM  signatory_setup");
                                while ($rowsig = mysqli_fetch_array($selectsig))
                                {
                                ?>
                        <tr>
                          
                          <td><?php echo $rowsig['sig_name']; ?></td>
                          <td><?php echo $rowsig['sig_desg']; ?></td>
                          <td><?php echo $rowsig['status']; ?></td>
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