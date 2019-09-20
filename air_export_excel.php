<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
                          
                                  
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectlea =  "select * from air_export_entry ";
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
    $so_no = $row['so_no'];
    $job_no_a = $row['job_no_a'];
    $job_date_a  = $row['job_date_a'];
    $mawb_no = $row['mawb_no'];
    $awb_no = $row['awb_no'];
    $sale_date = $row['sale_date'];
    $owner_name = $row['owner_name'];
    $charge_code  = $row['charge_code'];
    $charge_type = $row['charge_type'];
    $booking_date = $row['booking_date'];
    $station = $row['station'];
    $party = $row['party'];
    $agent_party = $row['agent_party'];
    $party_name = $row['party_name'];
    $party_address = $row['party_address'];
    $con_consolidation = $row['con_consolidation'];
    $con_name = $row['con_name'];
    $con_address = $row['con_address'];
    $airport_dep = $row['airport_dep'];   
    $airport_to_a = $row['airport_to_a'];
    $airport_to_b = $row['airport_to_b'];
    $airport_to_c = $row['airport_to_c'];
    $airport_by_a = $row['airport_by_a'];
    $airport_by_b = $row['airport_by_b'];
    $airport_by_c = $row['airport_by_c'];
    $currency = $row['currency'];
    $destination = $row['destination'];
    $account_no = $row['account_no'];
    $flight_no_a = $row['flight_no_a'];
    $flight_no_a_date = $row['flight_no_a_date'];
    $form_e_no = $row['form_e_no'];
    $form_e_date = $row['form_e_date'];
    $flight_no_b = $row['flight_no_b'];
    $flight_no_b_date = $row['flight_no_b_date'];
    $ship_inv_no = $row['ship_inv_no'];
    $ship_inv_no_date = $row['ship_inv_no_date'];
    $job_no = $row['job_no'];
    $insurance = $row['insurance'];
    $decl_val_carriage = $row['decl_val_carriage'];
    $decl_val_custom = $row['decl_val_custom'];
    $nominaton = $row['nominaton'];
    $handling_info = $row['handling_info'];
    $other_info = $row['other_info'];
    $account_info = $row['account_info'];
    $said_chain = $row['said_chain'];
    $ref_no = $row['ref_no'];
    $td_flash = $row['td_flash'];
    $clearing_agent = $row['clearing_agent'];
    $spo = $row['spo'];
    $freight = $row['freight'];
    $due_carrier = $row['due_carrier'];
    $due_agent = $row['due_agent'];
    $awb_total = $row['awb_total'];
    $payable_airline = $row['payable_airline'];
    // $due_agent_AE = $row['due_agent_AE'];
    // $buyRate_P = $row['buyRate_P'];
    // $buyAmountPKR_P = $row['buyAmountPKR_P'];
    // $diffAmount_P = $row['diffAmount_P'];
    // $profitRate_P = $row['profitRate_P'];
    // $profitAmount_P = $row['profitAmount_P'];
    // $profitAmountPKR_P = $row['profitAmountPKR_P'];
    // $buyRate_F = $row['buyRate_F'];
    // $buyAmount_F = $row['buyAmount_F'];
    // $buyAmountPKR_F = $row['buyAmountPKR_F'];
    // $sellRate_F = $row['sellRate_F'];
    // $sellAmount_F = $row['sellAmount_F'];
    // $sellAmountPKR_F = $row['sellAmountPKR_F'];
    // $diffAmount_F = $row['diffAmount_F'];
    // $diffAmountPKR_F = $row['diffAmountPKR_F'];
    // $profitRate_F = $row['profitRate_F'];
    // $profitAmount_F = $row['profitAmount_F'];
    // $profitAmountPKR_F = $row['profitAmountPKR_F'];
    // $payableAmount = $row['payableAmount'];
    // $payableAmountPKR = $row['payableAmountPKR'];

    
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
    $aq = 'AQ' . $iii;
    $ar = 'AR' . $iii;
    $as = 'AS' . $iii;
    $at = 'AT' . $iii;
    $au = 'AU' . $iii;
    $av = 'AV' . $iii;
    $aw = 'AW' . $iii;
    $ax = 'AX' . $iii;
    $ay = 'AY' . $iii;
    $az = 'AZ' . $iii;
    $ba = 'BA' . $iii;
    $bb = 'BB' . $iii;
    // $bc = 'BC' . $iii;
    // $bd = 'BD' . $iii;
    // $be = 'BE' . $iii;
    // $bf = 'BF' . $iii;
    // $bg = 'BG' . $iii;
    // $bh = 'BH' . $iii;
    // $bi = 'BI' . $iii;
    // $bj = 'BJ' . $iii;
    // $bk = 'BK' . $iii;
    // $bl = 'BL' . $iii;
    // $bm = 'BM' . $iii;
    // $bn = 'BN' . $iii;
    // $bo = 'BO' . $iii;
    // $bp = 'BP' . $iii;
    // $bq = 'BQ' . $iii;
    // $br = 'BR' . $iii;
    // $bs = 'BS' . $iii;
    // $bt = 'BT' . $iii;
    // $bu = 'BU' . $iii;
    // $bv = 'BV' . $iii;
    // $bw = 'BW' . $iii;
    // $bx = 'BX' . $iii;

    

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

    $objPHPExcel ->getActiveSheet() ->setCellValue('A1', 'So No')
    ->setCellValue('B1', 'Job No')
    ->setCellValue('C1', 'Job Date')
    ->setCellValue('D1', 'MAWB No')
    ->setCellValue('E1', 'AWB Date')
    ->setCellValue('F1', 'Sale Date')
    ->setCellValue('G1', 'Owner Name')
    ->setCellValue('H1', 'Charge Code')
    ->setCellValue('I1', 'Charge Type')
    ->setCellValue('J1', 'Booking Date')
    ->setCellValue('K1', 'Station')
    ->setCellValue('L1', 'Party')
    ->setCellValue('M1', 'Agent Party')
    ->setCellValue('N1', 'Name')
    ->setCellValue('O1', 'Address')
    ->setCellValue('P1', 'Consolidation')
    ->setCellValue('Q1', 'Name')
    ->setCellValue('R1', 'Address')
    ->setCellValue('S1', 'Airport Dep')
    ->setCellValue('T1', 'Airport Dep To')
    ->setCellValue('U1', 'Airport Dep To')
    ->setCellValue('V1', 'Airport Dep TO')
    ->setCellValue('W1', 'Airport Dep By')
    ->setCellValue('X1', 'Airport Dep By')
    ->setCellValue('Y1', 'Airport Dep By')
    ->setCellValue('Z1', 'Currency')
    ->setCellValue('AA1', 'Desyination')
    ->setCellValue('AB1', 'Account No')
    ->setCellValue('AC1', 'Flight No A')
    ->setCellValue('AD1', 'Flight No A Date')
    ->setCellValue('AE1', 'Form E No')
    ->setCellValue('AF1', 'Form E No Date')
    ->setCellValue('AG1', 'Flight No B')
    ->setCellValue('AH1', 'Flight No B Date')
    ->setCellValue('AI1', 'Ship Inv. No.')
    ->setCellValue('AJ1', 'Ship Inv. No. Date')
    ->setCellValue('AK1', 'Job No')
    ->setCellValue('AL1', 'Insurance')
    ->setCellValue('AM1', 'Declare Val Carriage')
    ->setCellValue('AN1', 'Declare Val Carriage')
    ->setCellValue('AO1', 'Nomination')
    ->setCellValue('AP1', 'Handling Information')
    ->setCellValue('AQ1', 'Other Information')
    ->setCellValue('AR1', 'Account Information')
    ->setCellValue('AS1', 'Said To Contain')
    ->setCellValue('AT1', 'Referance No')
    ->setCellValue('AU1', 'Td Flash')
    ->setCellValue('AV1', 'Clearin Agent')
    ->setCellValue('AW1', 'SPO')
    ->setCellValue('AX1', 'Freight')
    ->setCellValue('AY1', 'Due Carrier')
    ->setCellValue('AZ1', 'Due Agent')
    ->setCellValue('BA1', 'AWB Total')
    ->setCellValue('BB1', 'Payable To Airline');
    // ->setCellValue('BB1', 'Due Agent')
    // ->setCellValue('BC1', 'Buy Rate')
    // ->setCellValue('BD1', 'Payable To A')
    // ->setCellValue('BE1', 'Buy Amount PKR Party')
    // ->setCellValue('BF1', 'Profit Rate Party')
    // ->setCellValue('BG1', 'Diff Amount PKR Party')
    // ->setCellValue('BH1', 'Profit Rate Party')
    // ->setCellValue('BI1', 'Profit Amount Party')
    // ->setCellValue('BJ1', 'Profit Amount PKR Party')
    // ->setCellValue('BK1', 'Buy Rate Foreign')
    // ->setCellValue('BL1', 'Buy Amount Foreign')
    // ->setCellValue('BM1', 'Buy Amount PKR Foreign')
    // ->setCellValue('BN1', 'Sell Rate Foreign')
    // ->setCellValue('BO1', 'Sell Amount Foreign')
    // ->setCellValue('BP1', 'Sell Amount PKR Foreign')
    // ->setCellValue('BQ1', 'Diff Amount Foreign')
    // ->setCellValue('BR1', 'Diff Amount PKR Foreign')
    // ->setCellValue('BS1', 'Profit Rate Foregn')
    // ->setCellValue('BT1', 'Profit Amount Foreign')
    // ->setCellValue('BU1', 'Profit Amount PKR Foreign')
    // ->setCellValue('BV1', 'Payable Amount')
    // ->setCellValue('BW1', 'Payable Amount PKR');


    $objPHPExcel ->getActiveSheet() 
    ->setCellValue($a, $so_no)
    ->setCellValue($b, $job_no_a)
    ->setCellValue($c, $job_date_a)
    ->setCellValue($d, $mawb_no)
    ->setCellValue($e, $awb_no)
    ->setCellValue($f, $sale_date)
    ->setCellValue($g, $owner_name)
    ->setCellValue($h, $charge_code)
    ->setCellValue($i, $charge_type)
    ->setCellValue($j, $booking_date)
    ->setCellValue($k, $station)
    ->setCellValue($l, $party)
    ->setCellValue($m, $agent_party)
    ->setCellValue($n, $party_name)
    ->setCellValue($o, $party_address)
    ->setCellValue($p, $con_consolidation)
    ->setCellValue($q, $con_name)
    ->setCellValue($r, $con_address)
    ->setCellValue($s, $airport_dep)
    ->setCellValue($t, $airport_to_a)
    ->setCellValue($u, $airport_to_b)
    ->setCellValue($v, $airport_to_c)
    ->setCellValue($w, $airport_by_a)
    ->setCellValue($x, $airport_by_b)
    ->setCellValue($y, $airport_by_c)
    ->setCellValue($z, $currency)
    ->setCellValue($aa, $destination)
    ->setCellValue($ab, $account_no)
    ->setCellValue($ac, $flight_no_a)
    ->setCellValue($ad, $flight_no_a_date)
    ->setCellValue($ae, $form_e_no)
    ->setCellValue($af, $form_e_date)
    ->setCellValue($ag, $flight_no_b)
    ->setCellValue($ah, $flight_no_b_date)
    ->setCellValue($ai, $ship_inv_no)
    ->setCellValue($aj, $ship_inv_no_date)
    ->setCellValue($ak, $job_no)
    ->setCellValue($al, $insurance)
    ->setCellValue($am, $decl_val_carriage)
    ->setCellValue($an, $decl_val_custom)
    ->setCellValue($ao, $nominaton)
    ->setCellValue($ap, $handling_info)
    ->setCellValue($aq, $other_info)
    ->setCellValue($ar, $account_info)
    ->setCellValue($as, $said_chain)
    ->setCellValue($at, $ref_no)
    ->setCellValue($au, $td_flash)
    ->setCellValue($av, $clearing_agent)
    ->setCellValue($aw, $spo)
    ->setCellValue($ax, $freight)
    ->setCellValue($ay, $due_carrier)
    ->setCellValue($az, $due_agent)
    ->setCellValue($ba, $awb_total)
    ->setCellValue($bb, $payable_airline);
    // ->setCellValue($bc, $due_agent_AE)
    // ->setCellValue($bd, $buyRate_P)
    // ->setCellValue($be, $payable_airline_AE)
    // ->setCellValue($bf, $buyAmount_P)
    // ->setCellValue($bg, $buyAmountPKR_P)
    // ->setCellValue($bh, $diffAmount_P)
    // ->setCellValue($bi, $diffAmountPKR_P)
    // ->setCellValue($bj, $profitRate_P)
    // ->setCellValue($bk, $profitAmount_P)
    // ->setCellValue($bl, $profitAmountPKR_P)
    // ->setCellValue($bm, $buyRate_F)
    // ->setCellValue($bn, $buyAmount_F)
    // ->setCellValue($bo, $buyAmountPKR_F)
    // ->setCellValue($bp, $sellRate_F)
    // ->setCellValue($bq, $sellAmount_F)
    // ->setCellValue($br, $sellAmountPKR_F)
    // ->setCellValue($bs, $diffAmount_F)
    // ->setCellValue($bt, $diffAmountPKR_F)
    // ->setCellValue($bu, $profitRate_F)
    // ->setCellValue($bv, $profitAmount_F)
    // ->setCellValue($bw, $profitAmountPKR_F)
    // ->setCellValue($bx, $payableAmount);


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

  header("Location: air_export_table.php");
}


?>