<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
                            
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';
include("manage/session.php");

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

$selectlea =  "SELECT * FROM custmaster WHERE userBr='$userBr' ";
$select = mysqli_query($con, $selectlea);
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
while ($row= mysqli_fetch_array($select))
{
    $cmpType = $row['cmpType'];            
    $legCode = $row['legCode']; 
    $cmpTitle = $row['cmpTitle'];
    $newCode = $row ['newCode'];
    $cmpStreet = $row['cmpStreet'];
    $cmpCity = $row['cmpCity'];
    $cmpCountry = $row['cmpCountry'];
    $seaImport = $row['seaImport'];
    $airImport = $row['airImport'];
    $seaExport = $row['seaExport'];
    $airExport = $row['airExport'];
    $telCode = $row['telCode'];
    $telNumber = $row['telNumber'];
    $cmpWebsite = $row['cmpWebsite'];
    $cmpEmail = $row['cmpEmail'];
    $taxType = $row['taxType'];
    $taxNo = $row['taxNo'];
    $repName = $row['repName'];
    $repDesig = $row['repDesig'];
    $repOffCell = $row['repOffCell'];
    $repPerCell = $row['repPerCell'];
    $repEmail = $row['repEmail'];
    $fnBnkName = $row['fnBnkName'];
    $fnBnkBr = $row['fnBnkBr'];
    $fnCity = $row['fnCity'];
    $fnCountry = $row['fnCountry'];
    $fnNonIban = $row['fnNonIban'];
    $fnIban = $row['fnIban'];
    $fnCrDays = $row['fnCrDays'];
    $fnCrAmount = $row['fnCrAmount'];
    $cmpStatus = $row['cmpStatus'];
    
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
    $v = 'V' . $iii;
    $w = 'W' . $iii;
    $x = 'X' . $iii;
    $y = 'Y' . $iii;
    $z = 'Z' . $iii;
    $aa = 'AA' . $iii;
    $ab = 'AB' . $iii;
    $ac = 'AC' . $iii;
    $ad = 'AD' . $iii;
    $ae = 'AE' . $iii;
    

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Type')
    ->setCellValue('B1', 'Legacy Code')
    ->setCellValue('C1', 'New Code')
    ->setCellValue('D1', 'Title')
    ->setCellValue('E1', 'Street')
    ->setCellValue('F1', 'City')
    ->setCellValue('G1', 'Country')
    ->setCellValue('H1', 'Tel. Code')
    ->setCellValue('I1', 'Tel. Number')
    ->setCellValue('J1', 'Website')
    ->setCellValue('K1', 'Email')
    ->setCellValue('L1', 'Tax. Type')
    ->setCellValue('M1', 'Tax. No.')
    ->setCellValue('N1', 'Sea Import')
    ->setCellValue('O1', 'Air Import')
    ->setCellValue('P1', 'SeaExport')
    ->setCellValue('Q1', 'Air Export')
    ->setCellValue('R1', 'Rep. Name')
    ->setCellValue('S1', 'Rep. Desig')
    ->setCellValue('T1', 'Off. Cell')
    ->setCellValue('U1', 'Per. Cell')
    ->setCellValue('V1', 'Rep. Email')
    ->setCellValue('W1', 'Bank Name')
    ->setCellValue('X1', 'Bank B.r')
    ->setCellValue('Y1', 'City')
    ->setCellValue('Z1', 'Country')
    ->setCellValue('AA1', 'IBAN')
    ->setCellValue('BB1', 'Non-IBAN')
    ->setCellValue('CC1', 'Cr. Days')
    ->setCellValue('DD1', 'Cr. Amount')
    ->setCellValue('EE1', 'Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $cmpType)
    ->setCellValue($b, $legCode)
    ->setCellValue($c, $newCode)
    ->setCellValue($d, $cmpTitle)
    ->setCellValue($e, $cmpStreet)
    ->setCellValue($f, $cmpCity)
    ->setCellValue($g, $cmpCountry)
    ->setCellValue($h, $telCode)
    ->setCellValue($i, $telNumber)
    ->setCellValue($j, $cmpWebsite)
    ->setCellValue($k, $cmpEmail)
    ->setCellValue($l, $taxType)
    ->setCellValue($m, $taxNo)
    ->setCellValue($n, $seaImport)
    ->setCellValue($o, $airImport)
    ->setCellValue($p, $seaExport)
    ->setCellValue($q, $airExport)
    ->setCellValue($r, $repName)
    ->setCellValue($s, $repDesig)
    ->setCellValue($t, $repOffCell)
    ->setCellValue($u, $repPerCell)
    ->setCellValue($v, $repEmail)
    ->setCellValue($w, $fnBnkName)
    ->setCellValue($x, $fnBnkBr)
    ->setCellValue($y, $fnCity)
    ->setCellValue($z, $fnCountry)
    ->setCellValue($aa, $fnIban)
    ->setCellValue($ab, $fnNonIban)
    ->setCellValue($ac, $fnCrDays)
    ->setCellValue($ad, $fnCrAmount)
    ->setCellValue($ae, $cmpStatus);
    
    $iii++;

    }

$file = 'Customer Records.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location: leavetable.php");
}


?>