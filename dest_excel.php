<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
 

                                  

                                  
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectdest =  "select * from  destination_setup ";
$select = mysqli_query($con, $selectdest);
if(mysqli_num_rows($select) > 0)
{
  /*$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setTitle('User Details');
    $objPHPExcel->setActiveSheetIndex(0)
    ->SetHeaderCells('A1', 'User ID')
    ->SetHeaderCells('B1', 'User Name')
    ->SetHeaderCells('C1', 'Address')
    ->SetHeaderCells('D1', 'Contact')
    ->SetHeaderCells('E1', 'Email ID')
    ->SetHeaderCells('F1', 'Department ID')
    ->SetHeaderCells('G1', 'Designation ID')
    ->SetHeaderCells('H1', 'Role ID')
    ->SetHeaderCells('I1', 'Date of Birth')
    ->SetHeaderCells('J1', 'Date of Joining');*/

$iii = 2;
while ($rowdest = mysqli_fetch_array($select))
{
   
  $dest_code = $rowdest['dest_code'];
  $dest_name = $rowdest['dest_name'];
  $dest_sector = $rowdest['dest_sector'];
  $dest_country = $rowdest['dest_country'];
  $status = $rowdest['status'];
    

    $a = 'A' . $iii;
    $b = 'B' . $iii;
    $c = 'C' . $iii;
    $b = 'D' . $iii;
    $c = 'E' . $iii;
   

    /*$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);*/
    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Destination Code')
    ->setCellValue('B1', 'Destination Name')
    ->setCellValue('C1', 'Destination Sector')
    ->setCellValue('D1', 'Destination Country')
    ->setCellValue('E1', 'Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $dest_code)
    ->setCellValue($b, $dest_name)
    ->setCellValue($c, $dest_country)
    ->setCellValue($d, $dest_country)
    ->setCellValue($e, $dest_country);
    

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
  

  header("Location: destination_setup_table.php");
}


?>