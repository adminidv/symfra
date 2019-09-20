<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
 

                                  
                   
                                 
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectsig =  "select * from sub_agents_parties_setup ";
$select = mysqli_query($con, $selectsig);
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
while ($rowinv = mysqli_fetch_array($select))
{
   
   
    $partyname = $rowinv['partyname'];
    $subpartyname = $rowinv['subpartyname'];
    $address = $rowinv['address'];
    $country = $rowinv['country'];
    $city = $rowinv['city'];
    $phone = $rowinv['phone'];
    $fax = $rowinv['fax'];
    $email = $rowinv['email'];
    $website = $rowinv['website'];
    $export_reg_no = $rowinv['export_reg_no'];
    $sales_tax_no = $rowinv['sales_tax_no'];
    $ntn_no = $rowinv['ntn_no']; 
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
    $m = 'M' . $iii;



   

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

    $objPHPExcel    ->getActiveSheet() ->setCellValue('A1', 'Party Name')
    ->setCellValue('B1', 'Sub Party Name')
    ->setCellValue('C1', 'Address')
    ->setCellValue('D1', 'Country')
    ->setCellValue('E1', 'City')
    ->setCellValue('F1', 'Phone')
    ->setCellValue('G1', 'Fax')
    ->setCellValue('H1', 'Email')
    ->setCellValue('I1', 'Website')
    ->setCellValue('J1', 'Export Region No.')
    ->setCellValue('K1', 'Sales Tax No.')
    ->setCellValue('L1', 'Ntn No.')
    ->setCellValue('M1', 'Status');


    $objPHPExcel    ->getActiveSheet() ->setCellValue($a, $partyname)
    ->setCellValue($b, $subpartyname)
    ->setCellValue($c, $address)
    ->setCellValue($d, $country)
    ->setCellValue($e, $city)
    ->setCellValue($f, $phone)
    ->setCellValue($g, $fax)
    ->setCellValue($h, $email)
    ->setCellValue($i, $website)
    ->setCellValue($j, $export_reg_no)
    ->setCellValue($k, $sales_tax_no)
    ->setCellValue($l, $ntn_no)
    ->setCellValue($m, $status);


    

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

  header("Location: sub_agent_parties_table.php");
}


?>