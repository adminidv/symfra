<?php

// $searchRecord = $_GET["searchRecord"];

//echo $searchRecord;

require_once 'Classes/PHPExcel.php';
                          
                                  
$objPHPExcel = new PHPExcel();
include 'manage/connection.php';

 $selectlea =  "select * from sea_export_entry ";
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
    $job_date = $row['job_date'];
    $consol_no = $row['consol_no'];
    $last_con_no = $row['last_con_no'];
    $com_name = $row['com_name'];    
    $com_code = $row['com_code'];
    $party = $row['party'];
    $agent_party = $row['agent_party'];
    $foreign_agent = $row['foreign_agent'];
    $nomination = $row['nomination'];
    $spo = $row['spo'];
    $shipping_line = $row['shipping_line'];
    $port_of_lord = $row['port_of_lord'];
    $ship_line_agent = $row['ship_line_agent'];
    $destination = $row['destination'];
    $wharf = $row['wharf'];
    $clearing_agent = $row['clearing_agent'];
    $form_e_no = $row['form_e_no'];
    $date = $row['date'];
    $cut_date = $row['cut_date'];
    $ship_rcv_date = $row['ship_rcv_date'];
    $hand_over_s_l = $row['hand_over_s_l'];
    $doc_disp_date = $row['doc_disp_date'];
    $cc_date = $row['cc_date'];
    $four_copy_rcv = $row['four_copy_rcv'];
    $four_copy_date = $row['four_copy_date'];
    $s_b_no = $row['s_b_no'];
    $s_b_date= $row['s_b_date'];
    $egm = $row['egm'];
    $mbl_no = $row['mbl_no'];
    $mbl_date = $row['mbl_date'];
    $hbl_no = $row['hbl_no'];
    $hbl_date = $row['hbl_date'];
    $cbm = $row['cbm'];
    $pkgs = $row['pkgs'];
    $grs_weight = $row['grs_weight'];
    $uom = $row['uom'];
    $net_weight = $row['net_weight'];
    $shipment_no = $row['shipment_no'];
    $l_f = $row['l_f'];
    $f_c = $row['f_c'];
    $cy_cfs = $row['cy_cfs'];
    $packages = $row['packages'];
    $unit = $row['unit'];
    $gross_weight = $row['gross_weight'];
    $cbm_ship = $row['cbm_ship'];
    $net_weight_a = $row['net_weight_a'];
    $ship_inv_no = $row['ship_inv_no'];
    $ship_inv_date = $row['ship_inv_date'];
    $ship_curr = $row['ship_curr'];
    $ship_amount = $row['ship_amount'];
    $pre_alert = $row['pre_alert'];
    $hbl_printed = $row['hbl_printed'];
    $local_inv = $row['local_inv'];
    $intl_inv = $row['intl_inv'];
    $name = $row['name'];
    $address_a = $row['address_a'];
    $consignee_name = $row['consignee_name'];
    $consignee_address = $row['consignee_address'];
    $notify = $row['notify'];
    $foreign_name = $row['foreign_name'];
    $foreign_address = $row['foreign_address'];
    $export_ref = $row['export_ref'];
    $domestic_routing = $row['domestic_routing'];
    $domestic_address = $row['domestic_address'];
    $orignal_fbl = $row['orignal_fbl'];
    $freight_pay = $row['freight_pay'];
    $eta_a_date = $row['eta_a_date'];
    $eta_b_date = $row['eta_b_date'];
    $eta_c_date = $row['eta_c_date'];
    $etd_a_date = $row['etd_a_date'];
    $etd_b_date = $row['etd_b_date'];
    $etd_c_date = $row['etd_c_date'];
    $eta_date_a = $row['eta_date_a'];
    $eta_date_b = $row['eta_date_b'];
    $eta_date_c = $row['eta_date_c'];
    $eta_a_date_box = $row['eta_a_date_box'];
    $eta_b_date_box = $row['eta_b_date_box'];
    $eta_c_date_box = $row['eta_c_date_box'];
    $etd_a_date_box = $row['etd_a_date_box'];
    $etd_b_date_box = $row['etd_b_date_box'];
    $etd_c_date_box = $row['etd_c_date_box'];
    $eta_date_a_box = $row['eta_date_a_box'];
    $eta_date_b_box = $row['eta_date_b_box'];
    $eta_date_c_box = $row['eta_date_c_box'];
    $vessel_a = $row['vessel_a'];
    $vessel_b = $row['vessel_b'];
    $vessel_c = $row['vessel_c'];
    $voyage_a = $row['voyage_a'];
    $voyage_b = $row['voyage_b'];
    $voyage_c = $row['voyage_c'];

    
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
    $bz = 'BY' . $iii;
    $ca = 'CA' . $iii;
    $cb = 'CB' . $iii;
    $cc = 'CC' . $iii;
    $cd = 'CD' . $iii;
    $ce = 'CE' . $iii;
    $cf = 'CF' . $iii;
    $cg = 'CG' . $iii;
    $ch = 'CH' . $iii;
    $ci = 'CI' . $iii;
    $cj = 'CJ' . $iii;
    $ck = 'CK' . $iii;
    $cl = 'CL' . $iii;
    $cm = 'CM' . $iii;
    $cn = 'CN' . $iii;
    $co = 'CO' . $iii;

;


    

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
    ->setCellValue('BZ1', 'Status Type')
    ->setCellValue('CA1', 'Status Type')
    ->setCellValue('CB1', 'Status Type')
    ->setCellValue('CC1', 'Status Type')
    ->setCellValue('CD1', 'Status Type')
    ->setCellValue('CE1', 'Status Type')
    ->setCellValue('CF1', 'Status Type')
    ->setCellValue('CG1', 'Status Type')
    ->setCellValue('CH1', 'Status Type')
    ->setCellValue('CI1', 'Status Type')
    ->setCellValue('CJ1', 'Status Type')
    ->setCellValue('CK1', 'Status Type')
    ->setCellValue('CL1', 'Status Type')
    ->setCellValue('CM1', 'Status Type')
    ->setCellValue('CN1', 'Status Type')
    ->setCellValue('CN1', 'Status Type')
    ->setCellValue('CO1', 'Status Type');





    $objPHPExcel ->getActiveSheet() 
    ->setCellValue($a, $so_no)
    ->setCellValue($b, $job_no)
    ->setCellValue($c, $job_date)
    ->setCellValue($d, $consol_no)
    ->setCellValue($e, $last_con_no)
    ->setCellValue($f, $com_name)
    ->setCellValue($g, $com_code)
    ->setCellValue($h, $party)
    ->setCellValue($i, $agent_party)
    ->setCellValue($j, $foreign_agent)
    ->setCellValue($k, $nomination)
    ->setCellValue($l, $spo)
    ->setCellValue($m, $shipping_line)
    ->setCellValue($n, $ship_line_agent)
    ->setCellValue($o, $port_of_lord)
    ->setCellValue($p, $destination)
    ->setCellValue($q, $wharf)
    ->setCellValue($r, $clearing_agent)
    ->setCellValue($s, $form_e_no)
    ->setCellValue($t, $date)
    ->setCellValue($u, $cut_date)
    ->setCellValue($v, $ship_rcv_date)
    ->setCellValue($w, $hand_over_s_l)
    ->setCellValue($x, $doc_disp_date)
    ->setCellValue($y, $cc_date)
    ->setCellValue($z, $four_copy_rcv)
    ->setCellValue($aa, $four_copy_date)
    ->setCellValue($ab, $s_b_no)
    ->setCellValue($ac, $s_b_date)
    ->setCellValue($ad, $egm)
    ->setCellValue($ae, $mbl_no)
    ->setCellValue($af, $mbl_date)
    ->setCellValue($ag, $hbl_no)
    ->setCellValue($ah, $hbl_date)
    ->setCellValue($ai, $cbm)
    ->setCellValue($aj, $pkgs)
    ->setCellValue($ak, $grs_weight)
    ->setCellValue($al, $uom)
    ->setCellValue($am, $net_weight)
    ->setCellValue($an, $shipment_no)
    ->setCellValue($ao, $l_f)
    ->setCellValue($ap, $f_c)
    ->setCellValue($aq, $cy_cfs)
    ->setCellValue($ar, $packages)
    ->setCellValue($as, $unit)
    ->setCellValue($at, $gross_weight)
    ->setCellValue($au, $cbm_ship)
    ->setCellValue($av, $net_weight_a)
    ->setCellValue($aw, $ship_inv_no)
    ->setCellValue($ax, $ship_inv_date)
    ->setCellValue($ay, $ship_curr)
    ->setCellValue($az, $ship_amount)
    ->setCellValue($ba, $pre_alert)
    ->setCellValue($bb, $hbl_printed)
    ->setCellValue($bc, $local_inv)
    ->setCellValue($bd, $intl_inv)
    ->setCellValue($be, $name)
    ->setCellValue($bf, $address_a)
    ->setCellValue($bg, $consignee_name)
    ->setCellValue($bh, $consignee_address)
    ->setCellValue($bi, $notify)
    ->setCellValue($bj, $foreign_name)
    ->setCellValue($bk, $foreign_address)
    ->setCellValue($bl, $export_ref)
    ->setCellValue($bm, $domestic_routing)
    ->setCellValue($bn, $domestic_address)
    ->setCellValue($bo, $orignal_fbl)
    ->setCellValue($bp, $freight_pay)
    ->setCellValue($bq, $eta_a_date)
    ->setCellValue($br, $eta_b_date)
    ->setCellValue($bs, $eta_c_date)
    ->setCellValue($bt, $etd_a_date)
    ->setCellValue($bu, $etd_b_date)
    ->setCellValue($bv, $etd_c_date)
    ->setCellValue($bw, $eta_date_a)
    ->setCellValue($bx, $eta_date_b)
    ->setCellValue($by, $eta_date_c)
    ->setCellValue($bz, $eta_a_date_box)
    ->setCellValue($ca, $eta_b_date_box)
    ->setCellValue($cb, $eta_c_date_box)
    ->setCellValue($cc, $etd_a_date_box)
    ->setCellValue($cd, $etd_b_date_box)
    ->setCellValue($ce, $etd_c_date_box)
    ->setCellValue($cf, $eta_date_a_box)
    ->setCellValue($cg, $eta_date_b_box)
    ->setCellValue($ch, $eta_date_c_box)
    ->setCellValue($ci, $vessel_a)
    ->setCellValue($cj, $vessel_b)
    ->setCellValue($ck, $vessel_c)
    ->setCellValue($cl, $voyage_a)
    ->setCellValue($cm, $voyage_b)
    ->setCellValue($cn, $voyage_c);
   


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

  header("Location: sea_export_table.php");
}


?>
