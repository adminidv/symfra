<?php

include 'manage/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Hbl Description Table</title>
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
                                  <th>Hbl Description</th>
                                  <th>Status</th>

                                   </tr>
                        </thead>
                        <tbody>
                          
                          <?php
                                $selecthbl= mysqli_query($con, "SELECT * FROM  hbl_setup");
                                while ($rowhbl = mysqli_fetch_array($selecthbl))
                                {
                                ?>
                        <tr>
                          
                          <td><?php echo $rowhbl['hbl_desc']; ?></td>
                          <td><?php echo $rowhbl['status']; ?></td>
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