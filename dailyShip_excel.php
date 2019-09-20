<?php

require_once 'Classes/PHPExcel.php';
include 'manage/connection.php';

$searchRecord = "SELECT * FROM expectedship";

$objPHPExcel = new PHPExcel();
$select = mysqli_query($con, $searchRecord);
if(mysqli_num_rows($select) > 0)
{

$iii = 2;
while ($row = mysqli_fetch_array($select))
{
    $shipDate = $row['shipDate'];
    $shipDay = $row['shipDay'];
    $shipperName = $row['shipperName'];
    $awbNo = $row['awbNo'];
    $shipAirline = $row['shipAirline'];
    $shipPcs = $row['shipPcs'];
    $shipWeight = $row['shipWeight'];
    $finalPcs = $row['finalPcs'];
    $f_GrWeight = $row['f_GrWeight'];
    $f_ChWeight = $row['f_ChWeight'];
    $shipDest = $row['shipDest'];
    $shipHAWB = $row['shipHAWB'];
    $shipStatus = $row['shipStatus'];

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Ship Date')
    ->setCellValue('B1', 'Ship Day')
    ->setCellValue('C1', 'Shipper Name')
    ->setCellValue('D1', 'AWB No.')
    ->setCellValue('E1', 'Airline')
    ->setCellValue('F1', 'Pcs.')
    ->setCellValue('G1', 'Weight')
    ->setCellValue('H1', 'Final Pcs.')
    ->setCellValue('I1', 'Final Gr. Weight')
    ->setCellValue('J1', 'Final Ch. Weight')
    ->setCellValue('K1', 'Destination')
    ->setCellValue('L1', 'HAWB')
    ->setCellValue('M1', 'Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $shipDate)
    ->setCellValue($b, $shipDay)
    ->setCellValue($c, $shipperName)
    ->setCellValue($d, $awbNo)
    ->setCellValue($e, $shipAirline)
    ->setCellValue($f, $shipPcs)
    ->setCellValue($g, $shipWeight)
    ->setCellValue($h, $finalPcs)
    ->setCellValue($i, $f_GrWeight)
    ->setCellValue($j, $f_ChWeight)
    ->setCellValue($k, $shipDest)
    ->setCellValue($l, $shipHAWB)
    ->setCellValue($m, $shipStatus);

    $iii++;

    }

$file = 'Expected Shipment.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location: viewDailyShip.php");
}


?>