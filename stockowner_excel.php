<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
 

                                  
                   
                                 
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectsig =  "select * from stockowner ";
$select = mysqli_query($con, $selectsig);
if(mysqli_num_rows($select) > 0)
{
  /*$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setTitle('User Details');
    $objPHPExcel->setActiveSheetIndex(0)
    ->SetHeaderCells('A1', 'User ID')
    ->SetHeaderCells('B1', 'User Name')
    ->SetHeaderCells('C1', 'owner_phone')
    ->SetHeaderCells('D1', 'Contact')
    ->SetHeaderCells('E1', 'Email ID')
    ->SetHeaderCells('F1', 'Department ID')
    ->SetHeaderCells('G1', 'Designation ID')
    ->SetHeaderCells('H1', 'Role ID')
    ->SetHeaderCells('I1', 'Date of Birth')
    ->SetHeaderCells('J1', 'Date of Joining');*/

$iii = 2;
while ($rowinv = mysqli_fetch_array($select))
{
   
   
    $owner_name = $rowinv['owner_name'];
    $owner_add = $rowinv['owner_add'];
    $owner_country = $rowinv['owner_country'];
    $owner_city = $rowinv['owner_city'];
    $owner_phone = $rowinv['owner_phone'];
    $fax = $rowinv['fax'];
    $email = $rowinv['email'];
    $website = $rowinv['website'];
    $iata_code = $rowinv['iata_code'];
    $commesion = $rowinv['commesion'];
    $wht = $rowinv['wht'];   
    $status = $rowinv['status'];
    

    $a = 'A' . $iii;
    $b = 'B' . $iii;
    $c = 'C' . $iii;
    $d = 'D' . $iii;
    $e = 'E' . $iii;
    $f = 'F' . $iii;
    $g = 'G' . $iii;
    $h = 'H' . $iii;
    $i = 'I' . $iii;
    $j = 'J' . $iii;
    $k = 'K' . $iii;
    $l = 'L' . $iii;

   

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

    $objPHPExcel    ->getActiveSheet() ->setCellValue('A1', 'Name')
    ->setCellValue('B1', 'Address')
    ->setCellValue('C1', 'Country')
    ->setCellValue('D1', 'City')
    ->setCellValue('E1', 'Phone')
    ->setCellValue('F1', 'Fax')
    ->setCellValue('G1', 'Email')
    ->setCellValue('H1', 'Website')
    ->setCellValue('I1', 'iata_code')
    ->setCellValue('J1', 'commesion')
    ->setCellValue('K1', 'wht')
    ->setCellValue('L1', 'Status');


    $objPHPExcel    ->getActiveSheet() ->setCellValue($a, $owner_name)
    ->setCellValue($b, $owner_add)
    ->setCellValue($c, $owner_country)
    ->setCellValue($d, $owner_city)
    ->setCellValue($e, $owner_phone)
    ->setCellValue($f, $fax)
    ->setCellValue($g, $email)
    ->setCellValue($h, $website)
    ->setCellValue($i, $iata_code)
    ->setCellValue($j, $commesion)
    ->setCellValue($k, $wht)
    ->setCellValue($l, $status);


    

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

  header("Location: clearing_agents_table.php");
}


?>