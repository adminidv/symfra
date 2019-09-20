<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
 

                                  
                   
                                 
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectairport =  "select * from  airport_setup ";
$select = mysqli_query($con, $selectairport);
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
while ($rowcity = mysqli_fetch_array($select))
{
   
    $airport_name = $rowcity['airport_name'];
    $airport_iata = $rowcity['airport_iata'];
    $airport_ICAO = $rowcity['airport_ICAO'];
    $country_name = $rowcity['country_name'];
    $city_name = $rowcity['city_name'];
    $cont_per_off = $rowcity['cont_per_off'];
    $fax_no = $rowcity['fax_no'];
    $email = $rowcity['email'];
    $website = $rowcity['website'];
    $status = $rowcity['status'];
    

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Airport Name')
    ->setCellValue('B1', 'IATA Code')
    ->setCellValue('C1', 'ICAO Code')
    ->setCellValue('D1', 'Country Name')
    ->setCellValue('E1', 'City Name')
    ->setCellValue('F1', 'Office No.')
    ->setCellValue('G1', 'Fax No.')
    ->setCellValue('H1', 'Email')
    ->setCellValue('I1', 'Website')
    ->setCellValue('J1', 'Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $airport_name)
    ->setCellValue($b, $airport_iata)
    ->setCellValue($c, $airport_ICAO)
    ->setCellValue($d, $country_name)
    ->setCellValue($e, $city_name)
    ->setCellValue($f, $cont_per_off)
    ->setCellValue($g, $fax_no)
    ->setCellValue($h, $email)
    ->setCellValue($i, $website)
    ->setCellValue($j, $status);

    

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

  header("Location: airport_setup.php");
}


?>