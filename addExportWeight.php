<?php

include('manage/connection.php');

if(isset($_POST["pcs"]))
{ 
 $mawb_no = $_POST["mawb_No"];
 $rcp = $_POST["rcp"];
 $commision = $_POST["commision"];
 $pcs = $_POST["pcs"];
 $grs_weight = $_POST["grs_weight"];
 $cl = $_POST["cl"];
 $commodity = $_POST["commodity"];
 $ch_weight = $_POST["ch_weight"];
 $rate = $_POST["rate"];
 $total_freight = $_POST["total_freight"];

 $query = '';

 $query .= '
   INSERT INTO air_export_weight_info (mawb_no, pcs, grs_weight, cl, commodity, ch_weight, rate, total_freight) 
   VALUES("'.$mawb_no.'", "'.$pcs.'", "'.$grs_weight.'", "'.$cl.'", "'.$commodity.'", "'.$ch_weight.'", "'.$rate.'", "'.$total_freight.'"); 
   ';

 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }

 else
 {
  echo 'All Fields are Required';
 }

}

// echo "Working.";
?>