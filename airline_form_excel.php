<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
include 'manage/connection.php';

$objPHPExcel = new PHPExcel();
$selectair =  "select * from airline_setup ";
$select = mysqli_query($con, $selectair);
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
while ($rowairline= mysqli_fetch_array($select))
      {
        $air_name = $rowairline['air_name'];
        $flight_name = $rowairline['flight_name'];
        $address = $rowairline['address'];
        $country = $rowairline['country'];
        $city = $rowairline['city'];
        $account_no = $rowairline['account_no'];
        $airline_icao = $rowairline['airline_icao'];
        $con_office = $rowairline['con_office'];
        $airline_iata = $rowairline['airline_iata'];
        $fax_no = $rowairline['fax_no'];
        $email = $rowairline['email'];
        $website = $rowairline['website'];
        $kb_adj = $rowairline['kb_adj'];
        $awb_standard = $rowairline['awb_standard'];
        $awb_code = $rowairline['awb_code'];
        $iata_mem = $rowairline['iata_mem'];
        $sec_charges = $rowairline['sec_charges'];
        $fuel_charges = $rowairline['fuel_charges'];
        $scan_charges = $rowairline['scan_charges'];
        $status = $rowairline['status'];
        $id = $rowairline['SrNo'];
                                                            

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
    $m = 'M' . $iii;
    $n = 'N' . $iii;
    $o = 'O' . $iii;
    $p = 'P' . $iii;
    $q = 'Q' . $iii;
    $r = 'R' . $iii;
    $s = 'S' . $iii;
    $t = 'T' . $iii;
    $u = 'U' . $iii;

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

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $id)
     ->setCellValue($b, $air_name)
    ->setCellValue($c, $flight_name)
    ->setCellValue($d, $address)
    ->setCellValue($e, $country)
    ->setCellValue($f, $city)
    ->setCellValue($g, $account_no)
    ->setCellValue($h, $airline_icao)
    ->setCellValue($i, $con_office)
    ->setCellValue($j, $airline_iata)
    ->setCellValue($k, $fax_no)
    ->setCellValue($l, $email)
    ->setCellValue($m, $website)
    ->setCellValue($n, $kb_adj)
    ->setCellValue($o, $awb_standard)
    ->setCellValue($p, $awb_code)
    ->setCellValue($q, $iata_mem)
    ->setCellValue($r, $sec_charges)
    ->setCellValue($s, $fuel_charges)
    ->setCellValue($t, $scan_charges)
    ->setCellValue($u, $status);
    

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

  header("Location: usertable.php");
}


?>