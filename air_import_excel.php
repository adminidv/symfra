<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
                          
                                  
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectlea =  "select * from air_import_entry ";
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
    $job_no = $row['job_no'];
    $job_date  = $row['job_date'];
    $m_awb = $row['m_awb'];
    $m_date = $row['m_date'];
    $m_pp_cc = $row['m_pp_cc'];
    $m_pieces = $row['m_pieces'];
    $m_grs_weight  = $row['m_grs_weight'];
    $m_ch_weight = $row['m_ch_weight'];
    $m_rate = $row['m_rate'];
    $h_awb = $row['h_awb'];
    $h_date = $row['h_date'];
    $h_pp_cc = $row['h_pp_cc'];
    $h_pieces = $row['h_pieces'];
    $h_grs_weight = $row['h_grs_weight'];
    $h_ch_weight = $row['h_ch_weight'];
    $h_rate = $row['h_rate'];
    $description = $row['description'];
    $party = $row['party'];   
    $agent_party = $row['agent_party'];
    $foreign_party = $row['foreign_party'];
    $spo = $row['spo'];
    $origin = $row['origin'];
    $destination = $row['destination'];
    $flight_no = $row['flight_no'];
    $flight_date = $row['flight_date'];
    $igm_no = $row['igm_no'];
    $igm_date = $row['igm_date'];
    $air_d_o_no = $row['air_d_o_no'];
    $d_o_date = $row['d_o_date'];
    $b_e_no = $row['b_e_no'];
    $b_e_date = $row['b_e_date'];
    $index_no = $row['index_no'];
    $sub_index_no = $row['sub_index_no'];
    $e_t_d = $row['e_t_d'];
    $e_t_a = $row['e_t_a'];
    $l_c = $row['l_c'];
    $origin_d_o_no = $row['origin_d_o_no'];
    $passport_id = $row['passport_id'];
    $foreign_detail = $row['foreign_detail'];
    $notify_detail = $row['notify_detail'];
    $consignee_detail = $row['consignee_detail'];
    $remarks = $row['remarks'];
    $nomination = $row['nomination'];
    $status = $row['status'];
    $remark = $row['remark'];
    $fight_term = $row['fight_term'];
    $invoice_f_agent = $row['invoice_f_agent'];
    $local_inv = $row['local_inv'];
    $inv_from_f_agent = $row['inv_from_f_agent'];
    $status_type = $row['status_type'];
    $checkCurr = $row['checkCurr'];
    $exchangeRate_P = $row['exchangeRate_P'];
    $sellRate_P = $row['sellRate_P'];
    $sellAmount_P = $row['sellAmount_P'];
    $sellAmountPKR_P = $row['sellAmountPKR_P'];
    $buyRate_P = $row['buyRate_P'];
    $buyAmount_P = $row['buyAmount_P'];
    $buyAmountPKR_P = $row['buyAmountPKR_P'];
    $diffAmount_P = $row['diffAmount_P'];
    $diffAmountPKR_P = $row['diffAmountPKR_P'];
    $profitRate_P = $row['profitRate_P'];
    $profitAmount_P = $row['profitAmount_P'];
    $profitAmountPKR_P = $row['profitAmountPKR_P'];
    $buyRate_F = $row['buyRate_F'];
    $buyAmount_F = $row['buyAmount_F'];
    $buyAmountPKR_F = $row['buyAmountPKR_F'];
    $sellRate_F = $row['sellRate_F'];
    $sellAmount_F = $row['sellAmount_F'];
    $sellAmountPKR_F = $row['sellAmountPKR_F'];
    $diffAmount_F = $row['diffAmount_F'];
    $diffAmountPKR_F = $row['diffAmountPKR_F'];
    $profitRate_F = $row['profitRate_F'];
    $profitAmount_F = $row['profitAmount_F'];
    $profitAmountPKR_F = $row['profitAmountPKR_F'];
    $payableAmount = $row['payableAmount'];
    $payableAmountPKR = $row['payableAmountPKR'];

    
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
    $bc = 'BC' . $iii;
    $bd = 'BD' . $iii;
    $be = 'BE' . $iii;
    $bf = 'BF' . $iii;
    $bg = 'BG' . $iii;
    $bh = 'BH' . $iii;
    $bi = 'BI' . $iii;
    $bj = 'BJ' . $iii;
    $bk = 'BK' . $iii;
    $bl = 'BL' . $iii;
    $bm = 'BM' . $iii;
    $bn = 'BN' . $iii;
    $bo = 'BO' . $iii;
    $bp = 'BP' . $iii;
    $bq = 'BQ' . $iii;
    $br = 'BR' . $iii;
    $bs = 'BS' . $iii;
    $bt = 'BT' . $iii;
    $bu = 'BU' . $iii;
    $bv = 'BV' . $iii;
    $bw = 'BW' . $iii;
    $bx = 'BX' . $iii;
    $by = 'BY' . $iii;
    

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
    ->setCellValue('E1', 'MAWB Date')
    ->setCellValue('F1', 'P/C Master')
    ->setCellValue('G1', 'Pcs Master')
    ->setCellValue('H1', 'Grs.Weight Master')
    ->setCellValue('I1', 'Ch.Weight Master')
    ->setCellValue('J1', 'Rate Master')
    ->setCellValue('K1', 'HAWB No')
    ->setCellValue('L1', 'HAWB Date')
    ->setCellValue('M1', 'P/C House')
    ->setCellValue('N1', 'Pcs House')
    ->setCellValue('O1', 'Grs.Weight House')
    ->setCellValue('P1', 'Ch.Weight House')
    ->setCellValue('Q1', 'Rate House')
    ->setCellValue('R1', 'Description')
    ->setCellValue('S1', 'Party')
    ->setCellValue('T1', 'Agent Party')
    ->setCellValue('U1', 'Foreign Party')
    ->setCellValue('V1', 'SPO')
    ->setCellValue('W1', 'Origin')
    ->setCellValue('X1', 'Destination')
    ->setCellValue('Y1', 'Flight No')
    ->setCellValue('Z1', 'Flight Date')
    ->setCellValue('AA1', 'IGM No')
    ->setCellValue('AB1', 'IGM Date')
    ->setCellValue('AC1', 'Air D.O.P No.')
    ->setCellValue('AD1', 'D.O Date')
    ->setCellValue('AE1', 'B.E.No')
    ->setCellValue('AF1', 'B.E.date')
    ->setCellValue('AG1', 'Index No')
    ->setCellValue('AH1', 'Sub Index No')
    ->setCellValue('AI1', 'E.T.D')
    ->setCellValue('AJ1', ' E.T.A')
    ->setCellValue('AK1', 'L/C')
    ->setCellValue('AL1', 'Origin D.O.No')
    ->setCellValue('AM1', 'Passport ID')
    ->setCellValue('AN1', 'Foreign Agent')
    ->setCellValue('AO1', 'Notify')
    ->setCellValue('AP1', 'Consignee')
    ->setCellValue('AQ1', 'Remarks')
    ->setCellValue('AR1', 'Nomition')
    ->setCellValue('AS1', 'Status Shipment')
    ->setCellValue('AT1', 'Ship Remarks')
    ->setCellValue('AU1', 'Freight Term')
    ->setCellValue('AV1', 'Invoice To F/Agent')
    ->setCellValue('AW1', 'Local Invoice')
    ->setCellValue('AX1', 'Invoice Form F/Agent')
    ->setCellValue('AY1', 'Currency')
    ->setCellValue('AZ1', 'Exchange Rate')
    ->setCellValue('BA1', 'Sell Rate Party')
    ->setCellValue('BB1', 'Sell Amount Party')
    ->setCellValue('BC1', 'Sell Amount PKR Party')
    ->setCellValue('BD1', 'Buy Rate Party')
    ->setCellValue('BE1', 'Buy Amount Party')
    ->setCellValue('BF1', 'Buy Amount PKR Party')
    ->setCellValue('BG1', 'Diff Amount Party')
    ->setCellValue('BH1', 'Diff Amount PKR Party')
    ->setCellValue('BI1', 'Profit Rate Party')
    ->setCellValue('BJ1', 'Profit Amount Party')
    ->setCellValue('BK1', 'Profit Amount PKR Party')
    ->setCellValue('BL1', 'Buy Rate Foreign')
    ->setCellValue('BM1', 'Buy Amount Foreign')
    ->setCellValue('BN1', 'Buy Amount PKR Foreign')
    ->setCellValue('BO1', 'Sell Rate Foreign')
    ->setCellValue('BP1', 'Sell Amount Foreign')
    ->setCellValue('BQ1', 'Sell Amount PKR Foreign')
    ->setCellValue('BR1', 'Diff Amount Foreign')
    ->setCellValue('BS1', 'Diff Amount PKR Foreign')
    ->setCellValue('BT1', 'Profit Rate Foregn')
    ->setCellValue('BU1', 'Profit Amount Foreign')
    ->setCellValue('BV1', 'Profit Amount PKR Foreign')
    ->setCellValue('BW1', 'Payable Amount')
    ->setCellValue('BX1', 'Payable Amount PKR')
    ->setCellValue('BY1', 'Status Type');



    $objPHPExcel ->getActiveSheet() 
    ->setCellValue($a, $so_no)
    ->setCellValue($b, $job_no)
    ->setCellValue($c, $job_date)
    ->setCellValue($d, $m_awb)
    ->setCellValue($e, $m_date)
    ->setCellValue($f, $m_pp_cc)
    ->setCellValue($g, $m_pieces)
    ->setCellValue($h, $m_grs_weight)
    ->setCellValue($i, $m_ch_weight)
    ->setCellValue($j, $m_rate)
    ->setCellValue($k, $h_awb)
    ->setCellValue($l, $h_date)
    ->setCellValue($m, $h_pp_cc)
    ->setCellValue($n, $h_pieces)
    ->setCellValue($o, $h_grs_weight)
    ->setCellValue($p, $h_ch_weight)
    ->setCellValue($q, $h_rate)
    ->setCellValue($r, $description)
    ->setCellValue($s, $party)
    ->setCellValue($t, $agent_party)
    ->setCellValue($u, $foreign_party)
    ->setCellValue($v, $spo)
    ->setCellValue($w, $origin)
    ->setCellValue($x, $destination)
    ->setCellValue($y, $flight_no)
    ->setCellValue($z, $flight_date)
    ->setCellValue($aa, $igm_no)
    ->setCellValue($ab, $igm_date)
    ->setCellValue($ac, $air_d_o_no)
    ->setCellValue($ad, $d_o_date)
    ->setCellValue($ae, $b_e_no)
    ->setCellValue($af, $b_e_date)
    ->setCellValue($ag, $index_no)
    ->setCellValue($ah, $sub_index_no)
    ->setCellValue($ai, $e_t_d)
    ->setCellValue($aj, $e_t_a)
    ->setCellValue($ak, $l_c)
    ->setCellValue($al, $origin_d_o_no)
    ->setCellValue($am, $passport_id)
    ->setCellValue($an, $foreign_detail)
    ->setCellValue($ao, $notify_detail)
    ->setCellValue($ap, $consignee_detail)
    ->setCellValue($aq, $remarks)
    ->setCellValue($ar, $nomination)
    ->setCellValue($as, $status)
    ->setCellValue($at, $remark)
    ->setCellValue($au, $fight_term)
    ->setCellValue($av, $invoice_f_agent)
    ->setCellValue($aw, $local_inv)
    ->setCellValue($ax, $inv_from_f_agent)
    ->setCellValue($ay, $checkCurr)
    ->setCellValue($az, $exchangeRate_P)
    ->setCellValue($ba, $sellRate_P)
    ->setCellValue($bb, $sellAmount_P)
    ->setCellValue($bc, $sellAmountPKR_P)
    ->setCellValue($bd, $buyRate_P)
    ->setCellValue($be, $buyAmount_P)
    ->setCellValue($bf, $buyAmountPKR_P)
    ->setCellValue($bg, $diffAmount_P)
    ->setCellValue($bh, $diffAmountPKR_P)
    ->setCellValue($bi, $profitRate_P)
    ->setCellValue($bj, $profitAmount_P)
    ->setCellValue($bk, $profitAmountPKR_P)
    ->setCellValue($bl, $buyRate_F)
    ->setCellValue($bm, $buyAmount_F)
    ->setCellValue($bn, $buyAmountPKR_F)
    ->setCellValue($bo, $sellRate_F)
    ->setCellValue($bp, $sellAmount_F)
    ->setCellValue($bq, $sellAmountPKR_F)
    ->setCellValue($br, $diffAmount_F)
    ->setCellValue($bs, $diffAmountPKR_F)
    ->setCellValue($bt, $profitRate_F)
    ->setCellValue($bu, $profitAmount_F)
    ->setCellValue($bv, $profitAmountPKR_F)
    ->setCellValue($bw, $payableAmount)
    ->setCellValue($bx, $payableAmountPKR)
    ->setCellValue($by, $status_type);


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

  header("Location: air_import_tab.php");
}


?>