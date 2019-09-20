<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
                          
                                  
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

$selectlea =  "select * from saleorders ";
$select = mysqli_query($con, $selectlea);
if(mysqli_num_rows($select) > 0)
{

$iii = 2;
while ($row= mysqli_fetch_array($select))
{
    $soNo = $row['soNo'];
    $saleCust = $row['saleCust'];
    $conPerson = $row['conPerson'];
    $conRef = $row['conRef'];
    $saleCurr = $row['saleCurr'];
    $saleStatus = $row['saleStatus'];
    $postDate  = $row['postDate'];
    $docDate = $row['docDate'];
    $agentParty = $row['agentParty'];
    $foreignAgent = $row['foreignAgent'];
    $saleNom = $row['saleNom'];
    $saleSPO = $row['saleSPO'];
    $mawbNo = $row['mawbNo'];
    $mawbDate = $row['mawbDate'];
    $mblNo = $row['mblNo'];
    $mblDate = $row['mblDate'];
    $salePcs = $row['salePcs'];
    $saleCBM = $row['saleCBM'];
    $grsWeight = $row['grsWeight'];   
    $saleComm = $row['saleComm'];
    $chWeight = $row['chWeight'];
    $saleRate = $row['saleRate'];
    $totalFreight = $row['totalFreight'];
    $goodsDesc = $row['goodsDesc'];
    $saleOrigin = $row['saleOrigin'];
    $saleDest = $row['saleDest'];
    $shipLine = $row['shipLine'];
    $saleVessel = $row['saleVessel'];
    $saleVoyage = $row['saleVoyage'];
    $flightNo = $row['flightNo'];
    $flightDate = $row['flightDate'];
    $saleRem = $row['saleRem'];
    $totalBefDisc = $row['totalBefDisc'];
    $saleDisc = $row['saleDisc'];
    $saleTax = $row['saleTax'];
    $saleTotal = $row['saleTotal'];
    $saleReason = $row['saleReason'];
    /*$shipApp_O = $row['shipApp_O'];
    $appReason_O = $row['appReason_O'];
    $shipApp_F = $row['shipApp_F'];
    $appReason_F = $row['appReason_F'];*/
    $saleLength = $row['saleLength'];
    $saleWidth = $row['saleWidth'];
    $saleHight = $row['saleHeight'];
    $saleVolWt = $row['saleVolWt'];
    $saleType = $row['saleType'];

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
    $af = 'AF' . $iii;
    $ag = 'AG' . $iii;
    $ah = 'AH' . $iii;
    $ai = 'AI' . $iii;
    $aj = 'AJ' . $iii;
    $ak = 'AK' . $iii;
    $al = 'AL' . $iii;
    $am = 'AM' . $iii;
    $an = 'AN' . $iii;
    $ao = 'AO' . $iii;
    $ap = 'AP' . $iii;

    /*$objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Sales Order No.')
    ->setCellValue('B1', 'Customer')
    ->setCellValue('C1', 'Contact Person')
    ->setCellValue('D1', 'Contact Ref. No')
    ->setCellValue('E1', 'Currency')
    ->setCellValue('F1', 'Status')
    ->setCellValue('G1', 'Posting Date')
    ->setCellValue('H1', 'Document Date')
    ->setCellValue('I1', 'Agent Party')
    ->setCellValue('J1', 'Foreign Party')
    ->setCellValue('K1', 'Nomination')
    ->setCellValue('L1', 'SPO')
    ->setCellValue('M1', 'MAWB No.')
    ->setCellValue('N1', 'MAWB Date')
    ->setCellValue('O1', 'Name')
    ->setCellValue('P1', 'MBL No.')
    ->setCellValue('Q1', 'MBL Date')
    ->setCellValue('R1', 'Pcs.')
    ->setCellValue('S1', 'CBM')
    ->setCellValue('T1', 'Gross Weight ')
    ->setCellValue('U1', 'Commodity')
    ->setCellValue('V1', 'Charge Weight')
    ->setCellValue('W1', 'Rate')
    ->setCellValue('X1', 'Total Frieght')
    ->setCellValue('Y1', 'Goods Description')
    ->setCellValue('Z1', 'Origin')
    ->setCellValue('AB1', 'Destination')
    ->setCellValue('AC1', 'Shipping Line')
    ->setCellValue('AD1', 'Vessel')
    ->setCellValue('AE1', 'Voyage')
    ->setCellValue('AF1', 'Flight No.')
    ->setCellValue('AG1', 'Flight Date')
    ->setCellValue('AH1', 'Remarks')
    ->setCellValue('AI1', 'Before Disc.')
    ->setCellValue('AJ1', 'Discount')
    ->setCellValue('AK1', 'Tax')
    ->setCellValue('AL1', 'Total')
    ->setCellValue('AM1', 'Reason')
    ->setCellValue('AN1', 'Length')
    ->setCellValue('AO1', 'Width')
    ->setCellValue('AP1', 'Height')
    ->setCellValue('AQ1', 'Vol. Weight')
    ->setCellValue('AR1', 'Sale Type')*/

    $objPHPExcel ->getActiveSheet() 
    ->setCellValue('A1', 'Sale Order')
    ->setCellValue('B1', 'Customer')
    ->setCellValue('C1', 'Contact Person')
    ->setCellValue('D1', 'Reference')
    ->setCellValue('E1', 'Currency')
    ->setCellValue('E1', 'Status')
    ->setCellValue('F1', 'Post Date')
    ->setCellValue('G1', 'Document Date')
    ->setCellValue('H1', 'Agent Party')
    ->setCellValue('I1', 'Foreign Agent')
    ->setCellValue('J1', 'Nomination')
    ->setCellValue('K1', 'SPO')
    ->setCellValue('L1', 'MAWB No.')
    ->setCellValue('M1', 'MAWB Date')
    ->setCellValue('N1', 'MBL No.')
    ->setCellValue('O1', 'MBL Date')
    ->setCellValue('P1', 'Pcs')
    ->setCellValue('Q1', 'CBM')
    ->setCellValue('R1', 'Gross Weight')
    ->setCellValue('S1', 'Commodity')
    ->setCellValue('T1', 'Charge Weight')
    ->setCellValue('U1', 'Rate')
    ->setCellValue('V1', 'Total Freight')
    ->setCellValue('W1', 'Goods Description')
    ->setCellValue('X1', 'Origin')
    ->setCellValue('Y1', 'Destination')
    ->setCellValue('Z1', 'Shipping Line')
    ->setCellValue('AA1', 'Vessel')
    ->setCellValue('AB1', 'Voyage')
    ->setCellValue('AC1', 'Flight No.')
    ->setCellValue('AD1', 'Flight Date')
    ->setCellValue('AE1', 'Remarks')
    ->setCellValue('AF1', 'Total Bef. Disc.')
    ->setCellValue('AG1', 'Sale Disc.')
    ->setCellValue('AH1', 'Tax')
    ->setCellValue('AI1', 'Total')
    ->setCellValue('AJ1', 'Reason')
    ->setCellValue('AK1', 'Lenght')
    ->setCellValue('AL1', 'Width')
    ->setCellValue('AM1', 'Height')
    ->setCellValue('AN1', 'Volt. Weight')
    ->setCellValue('AO1', 'Sale Type');

    $objPHPExcel ->getActiveSheet() 
    ->setCellValue($a, $soNo)
    ->setCellValue($b, $saleCust)
    ->setCellValue($c, $conPerson)
    ->setCellValue($d, $conRef)
    ->setCellValue($e, $saleCurr)
    ->setCellValue($f, $saleStatus)
    ->setCellValue($g, $postDate)
    ->setCellValue($h, $docDate)
    ->setCellValue($i, $agentParty)
    ->setCellValue($j, $foreignAgent)
    ->setCellValue($k, $saleNom)
    ->setCellValue($l, $saleSPO)
    ->setCellValue($m, $mawbNo)
    ->setCellValue($n, $mawbDate)
    ->setCellValue($o, $mblNo)
    ->setCellValue($p, $mblDate)
    ->setCellValue($q, $salePcs)
    ->setCellValue($r, $saleCBM)
    ->setCellValue($s, $grsWeight)
    ->setCellValue($t, $saleComm)
    ->setCellValue($u, $chWeight)
    ->setCellValue($v, $saleRate)
    ->setCellValue($w, $totalFreight)
    ->setCellValue($x, $goodsDesc)
    ->setCellValue($y, $saleOrigin)
    ->setCellValue($z, $saleDest)
    ->setCellValue($aa, $shipLine)
    ->setCellValue($ab, $saleVessel)
    ->setCellValue($ac, $saleVoyage)
    ->setCellValue($ad, $flightNo)
    ->setCellValue($ae, $flightDate)
    ->setCellValue($af, $saleRem)
    ->setCellValue($ag, $totalBefDisc)
    ->setCellValue($ah, $saleDisc)
    ->setCellValue($ai, $saleTax)
    ->setCellValue($aj, $saleTotal)
    ->setCellValue($ak, $saleReason)
    ->setCellValue($al, $saleLength)
    ->setCellValue($am, $saleWidth)
    ->setCellValue($an, $saleHight)
    ->setCellValue($ao, $saleVolWt)
    ->setCellValue($ap, $saleType);

    $iii++;
}

$file = 'Sale Orders.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location: so_air_export_table.php");
}


?>