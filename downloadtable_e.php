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
$select = mysqli_query($con, "SELECT * FROM empinfo WHERE userBr='$userBr' ");
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
while ($row = mysqli_fetch_array($select))
{
          $empNo= $row['empNo'];
          $cnicNo = $row['cnicNo'];
          $ntnNo = $row['ntnNo'];
          $empName = $row['empName'];
          $empGrdName = $row['empGrdName'];
          $empDOB = $row['empDOB'];
          $empCell = $row['empCell'];
          $empOffice = $row['empOffice'];
          $empHomeNo = $row['empHomeNo'];
          $empEmergencyNo = $row['empEmergencyNo'];
          $empMaritalStatus = $row['empMaritalStatus'];
          $empSpouseName = $row['empSpouseName'];
          $empChildren = $row['empChildren'];
          $empDept = $row['empDept'];
          $empDesig = $row['empDesig'];
          $empGrade = $row['empGrade'];
          $empEntity = $row['empEntity'];
          $lineManager = $row['lineManager'];
          $empCountry = $row['empCountry'];
          $empCity = $row['empCity'];
          $empAddress = $row['empAddress'];
          $empDOJ = $row['empDOJ'];
          $empWorkEmail = $row['empWorkEmail'];
          $empGender = $row['empGender'];
          $leavePckg = $row['leavePckg'];
          $savedStatus = $row['savedStatus'];

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'Employee No.')
    ->setCellValue('B1', 'CNIC No.')
    ->setCellValue('C1', 'NTN No.')
    ->setCellValue('D1', 'Name')
    ->setCellValue('E1', 'Guardian Name')
    ->setCellValue('F1', 'Date of Birth')
    ->setCellValue('G1', 'Contact No.')
    ->setCellValue('H1', 'Office No.')
    ->setCellValue('I1', 'Office No.')
    ->setCellValue('J1', 'Emergency No.')
    ->setCellValue('K1', 'Marital Status')
    ->setCellValue('L1', 'Spouse Name')
    ->setCellValue('M1', 'Childrens')
    ->setCellValue('N1', 'Department')
    ->setCellValue('O1', 'Designation')
    ->setCellValue('P1', 'Grade')
    ->setCellValue('Q1', 'Entity')
    ->setCellValue('R1', 'Line Manager')
    ->setCellValue('S1', 'Country')
    ->setCellValue('T1', 'City')
    ->setCellValue('U1', 'Address')
    ->setCellValue('V1', 'Date of Joining')
    ->setCellValue('W1', 'Work Email')
    ->setCellValue('X1', 'Gender')
    ->setCellValue('Y1', 'Leave Package')
    ->setCellValue('Z1', 'Saved Status');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $empNo)
    ->setCellValue($b, $cnicNo)
    ->setCellValue($c, $ntnNo)
    ->setCellValue($d, $empName)
    ->setCellValue($e, $empGrdName)
    ->setCellValue($f, $empDOB)
    ->setCellValue($g, $empCell)
    ->setCellValue($h, $empOffice)
    ->setCellValue($i, $empHomeNo)
    ->setCellValue($j, $empEmergencyNo)
    ->setCellValue($k, $empMaritalStatus)
    ->setCellValue($l, $empSpouseName)
    ->setCellValue($m, $empChildren)
    ->setCellValue($n, $empDept)
    ->setCellValue($o, $empDesig)
    ->setCellValue($p, $empGrade)
    ->setCellValue($q, $empEntity)
    ->setCellValue($r, $lineManager)
    ->setCellValue($s, $empCountry)
    ->setCellValue($t, $empCity)
    ->setCellValue($u, $empAddress)
    ->setCellValue($v, $empDOJ)
    ->setCellValue($w, $empWorkEmail)
    ->setCellValue($x, $empGender)
    ->setCellValue($y, $leavePckg)
    ->setCellValue($z, $savedStatus);

    $iii++;

    }

$file = 'Employee Records.xlsx';
  // redirecting browser
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename=' . $file);
  header('Cache-Control: max-age=0');

  // writing result to file
  $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  // php output instead of filename
  $file ->save('php://output');

  header("Location: emptable.php");
}


?>