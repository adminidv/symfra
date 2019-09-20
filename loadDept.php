<?php

include('manage/connection.php');

 function fill_brand($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM department";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["dept_ID"].'">'.$row["dept_name"].'</option>';  
      }  
      return $output;  
 }  

?>