<?php

$searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
include 'manage/connection.php';

$objPHPExcel = new PHPExcel();
$select = mysqli_query($con, $searchRecord);
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
    $user_ID = $row['user_ID'];
    $user_Name = $row['user_fName'] . ' ' . $row['user_mName'] . ' ' . $row['user_lName'];
    $user_address = $row['user_address'];
    $user_contact = $row['user_contact'];
    $user_email = $row['user_email'];
    $dept_ID = $row['dept_ID'];
    $desig_ID = $row['desig_ID'];
    $role_ID = $row['role_ID'];
    $user_DOB = $row['user_DOB'];
    $user_DOJ = $row['user_DOJ'];

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'User ID')
    ->setCellValue('B1', 'Username')
    ->setCellValue('C1', 'Address')
    ->setCellValue('D1', 'Contact')
    ->setCellValue('E1', 'Email')
    ->setCellValue('F1', 'Dept. ID')
    ->setCellValue('G1', 'Desig. ID')
    ->setCellValue('H1', 'Role ID')
    ->setCellValue('I1', 'Date of birth')
    ->setCellValue('J1', 'Date of joining');

    $objPHPExcel ->getActiveSheet() ->setCellValue($a, $user_ID)
    ->setCellValue($b, $user_Name)
    ->setCellValue($c, $user_address)
    ->setCellValue($d, $user_contact)
    ->setCellValue($e, $user_email)
    ->setCellValue($f, $dept_ID)
    ->setCellValue($g, $desig_ID)
    ->setCellValue($h, $role_ID)
    ->setCellValue($i, $user_DOB)
    ->setCellValue($j, $user_DOJ);

    $iii++;

    }

$file = 'User Records.xlsx';
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