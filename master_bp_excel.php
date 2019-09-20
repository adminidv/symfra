<?php

$searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
include 'manage/connection.php';
include("manage/session.php");

$userID = $_SESSION['user'];
$selectBr = mysqli_query($con, "SELECT * FROM users WHERE user_ID='$userID' ");
while ($rowBr = mysqli_fetch_array($selectBr))
{
  $userBr = $rowBr['userBr'];
}

$objPHPExcel = new PHPExcel();
$select = mysqli_query($con, "SELECT * FROM custmaster WHERE partyType='bp' AND userBr='$userBr' ");
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
    $legCode = $row['legCode'];
    $newCode = $row['newCode'];
    $bpTitle = $row['cmpTitle'];
    $bpStreet = $row['cmpStreet'];
    $bpCity = $row['cmpCity'];
    $bpCountry = $row['cmpCountry'];
    $telCode = $row['telCode'];
    $telNumber = $row['telNumber'];
    $cmpWebsite = $row['cmpWebsite'];
    $cmpEmail = $row['cmpEmail'];
    $taxType = $row['taxType'];
    $taxNo = $row['taxNo'];
    $seaImport = $row['seaImport'];
    $airImport = $row['airImport'];
    $seaExport = $row['seaExport'];
    $airExport = $row['airExport'];
    $repName = $row['repName'];
    $repDesig = $row['repDesig'];
    $repOffCell = $row['repOffCell'];   
    $repPerCell = $row['repPerCell'];
    $repEmail = $row['repEmail'];
    $fnBnkName = $row['fnBnkName'];
    $fnBnkBr = $row['fnBnkBr'];
    $fnCity = $row['fnCity'];
    $fnCountry = $row['fnCountry'];
    $fnIban = $row['fnIban'];
    $fnNonIban = $row['fnNonIban'];
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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Legacy Code')
    ->setCellValue('B1', 'New Code')
    ->setCellValue('C1', 'Title')
    ->setCellValue('D1', 'Street')
    ->setCellValue('E1', 'City')
    ->setCellValue('F1', 'City')
    ->setCellValue('G1', 'Tel. Code')
    ->setCellValue('H1', 'Tel. Number')
    ->setCellValue('I1', 'Website')
    ->setCellValue('J1', 'Email')
    ->setCellValue('K1', 'Tax Type')
    ->setCellValue('L1', 'Tax No.')
    ->setCellValue('M1', 'Sea Import')
    ->setCellValue('N1', 'Air Import')
    ->setCellValue('O1', 'Sea Export')
    ->setCellValue('P1', 'Air Export')
    ->setCellValue('Q1', 'Rep. Name')
    ->setCellValue('R1', 'Rep. Desig.')
    ->setCellValue('S1', 'Off. Cell')
    ->setCellValue('T1', 'Per. Cell')
    ->setCellValue('U1', 'Email')
    ->setCellValue('V1', 'Bank Name')
    ->setCellValue('W1', 'Bank Br')
    ->setCellValue('X1', 'City')
    ->setCellValue('Y1', 'Country')
    ->setCellValue('Z1', 'IBAN')
    ->setCellValue('AA1', 'Non IBAN')
    ->setCellValue('BB1', 'Cr. Days')
    ->setCellValue('CC1', 'Cr. Amount')
    ->setCellValue('DD1', 'Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $legCode)
    ->setCellValue($b, $newCode)
    ->setCellValue($c, $bpTitle)
    ->setCellValue($d, $bpStreet)
    ->setCellValue($e, $bpCity)
    ->setCellValue($f, $bpCity)
    ->setCellValue($g, $telCode)
    ->setCellValue($h, $telNumber)
    ->setCellValue($i, $cmpWebsite)
    ->setCellValue($j, $cmpEmail)
    ->setCellValue($k, $taxType)
    ->setCellValue($l, $taxNo)
    ->setCellValue($m, $seaImport)
    ->setCellValue($n, $airImport)
    ->setCellValue($o, $seaExport)
    ->setCellValue($p, $airExport)
    ->setCellValue($q, $repName)
    ->setCellValue($r, $repDesig)
    ->setCellValue($s, $repOffCell)
    ->setCellValue($t, $repPerCell)
    ->setCellValue($u, $repEmail)
    ->setCellValue($v, $fnBnkName)
    ->setCellValue($w, $fnBnkBr)
    ->setCellValue($x, $fnCity)
    ->setCellValue($y, $fnCountry)
    ->setCellValue($z, $fnIban)
    ->setCellValue($aa, $fnNonIban)
    ->setCellValue($ab, $fnCrDays)
    ->setCellValue($ac, $fnCrAmount)
    ->setCellValue($ad, $cmpStatus);

    $iii++;

    }

$file = 'BP Records.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location: master_bp_.php");
}


?>