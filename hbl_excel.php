<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
 

                                  
                   
                                 
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selecthbl =  "select * from hbl_setup ";
$select = mysqli_query($con, $selecthbl);
if(mysqli_num_rows($select) > 0)
{
  
   
$iii = 2;
while ($rowhbl = mysqli_fetch_array($select))
{
   
    $hbl_desc = $rowhbl['hbl_desc'];
    $status = $rowhbl['status'];
    

    $a = 'A' . $iii;
    $b = 'B' . $iii;
   


    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $hbl_desc)
    ->setCellValue($b, $status);

    

    $iii++;

    }

$file = 'test.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location:hbl_setup.php");
}


?>