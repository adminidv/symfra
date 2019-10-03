<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// current date function
$todayDate = date("Y-m-d");

// auto increment job
$selectLastjob = mysqli_query($con, "SELECT * FROM sea_export_entry ORDER BY job_no DESC LIMIT 1");
$rowLastjob = mysqli_fetch_array($selectLastjob, MYSQLI_ASSOC);

$lastjob = $rowLastjob['job_no'];
$jobID = $lastjob + 1;
$job_no = $jobID;

// auto increment concole
$selectLastID = mysqli_query($con, "SELECT * FROM sea_export_entry ORDER BY consol_no DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastconsole = $rowLastID['consol_no'];
$newID = $lastconsole + 1;
$consol_no = $newID;

if (isset($_POST['submitBtn'])) {

    $so_no =$_POST['so_no'];
    $com_name =$_POST['com_name'];
    $com_code =$_POST['com_code'];
    $party =$_POST['party'];
    $agent_party =$_POST['agent_party'];
    $foreign_agent =$_POST['foreign_agent'];
    $nomination =$_POST['nomination'];
    $spo =$_POST['spo'];
    $shipping_line =$_POST['shipping_line'];
    $ship_line_agent =$_POST['ship_line_agent'];
    $port_of_lord =$_POST['port_of_lord'];
    $destination =$_POST['destination'];
    $wharf =$_POST['wharf'];
    $clearing_agent =$_POST['clearing_agent'];
    $form_e_no =$_POST['form_e_no'];
    $date =$_POST['date'];
    $cut_date =$_POST['cut_date'];
    $ship_rcv_date =$_POST['ship_rcv_date'];
    $hand_over_s_l =$_POST['hand_over_s_l'];
    $doc_disp_date =$_POST['doc_disp_date'];
    $cc_date =$_POST['cc_date'];
    $four_copy_rcv =$_POST['four_copy_rcv'];
    $four_copy_date =$_POST['four_copy_date'];
    $s_b_no =$_POST['s_b_no'];
    $s_b_date =$_POST['s_b_date'];
    $egm =$_POST['egm'];
    $mbl_no =$_POST['mbl_no'];
    $mbl_date =$_POST['mbl_date'];
    $hbl_no =$_POST['hbl_no'];
    $hbl_date =$_POST['hbl_date'];
    $cbm =$_POST['cbm'];
    $pkgs =$_POST['pkgs'];
    $grs_weight =$_POST['grs_weight'];
    $uom =$_POST['uom'];
    $net_weight =$_POST['net_weight'];
    $shipment_no =$_POST['shipment_no'];
    $l_f =$_POST['l_f'];
    $f_c =$_POST['f_c'];
    $cy_cfs =$_POST['cy_cfs'];
    $packages =$_POST['packages'];
    $unit =$_POST['unit'];
    $gross_weight =$_POST['gross_weight'];
    $cbm_ship =$_POST['cbm_ship'];
    $net_weight_a =$_POST['net_weight_a'];
    $ship_inv_no =$_POST['ship_inv_no'];
    $ship_inv_date =$_POST['ship_inv_date'];
    $ship_curr =$_POST['ship_curr'];
    $ship_amount =$_POST['ship_amount'];
    $pre_alert =$_POST['pre_alert'];
    $hbl_printed =$_POST['hbl_printed'];
    $local_inv =$_POST['local_inv'];
    $intl_inv =$_POST['intl_inv'];
    $name =$_POST['name'];
    $address_a =$_POST['address_a'];
    $consignee_name =$_POST['consignee_name'];
    $consignee_address =$_POST['consignee_address'];
    $notify =$_POST['notify'];
    $foreign_name =$_POST['foreign_name'];
    $foreign_address =$_POST['foreign_address'];
    $export_ref =$_POST['export_ref'];
    $domestic_routing =$_POST['domestic_routing'];
    $domestic_address =$_POST['domestic_address'];
    $orignal_fbl =$_POST['orignal_fbl'];
    $freight_pay =$_POST['freight_pay'];
    $eta_a_date =$_POST['eta_a_date'];
    $eta_b_date =$_POST['eta_b_date'];
    $eta_c_date =$_POST['eta_c_date'];
    $etd_a_date =$_POST['etd_a_date'];
    $etd_b_date =$_POST['etd_b_date'];
    $etd_c_date =$_POST['etd_c_date'];
    $eta_date_a =$_POST['eta_date_a'];
    $eta_date_b =$_POST['eta_date_b'];
    $eta_date_c =$_POST['eta_date_c'];
    // $eta_a_date_box =$_POST['eta_a_date_box'];
    // $eta_b_date_box =$_POST['eta_b_date_box'];
    // $eta_c_date_box =$_POST['eta_c_date_box'];
    // $etd_a_date_box =$_POST['etd_a_date_box'];
    // $etd_b_date_box =$_POST['etd_b_date_box'];
    // $etd_c_date_box =$_POST['etd_c_date_box'];
    // $eta_date_a_box =$_POST['eta_date_a_box'];
    // $eta_date_b_box =$_POST['eta_date_b_box'];
    // $eta_date_c_box =$_POST['eta_date_c_box'];
     if (isset($_POST['eta_a_date_box']))
  {
    $eta_a_date_box = 1;
  }
  else
  {
    $eta_a_date_box = 0;
  }
     if (isset($_POST['eta_b_date_box']))
  {
    $eta_b_date_box = 1;
  }
  else
  {
    $eta_b_date_box = 0;
  }
     if (isset($_POST['eta_c_date_box']))
  {
    $eta_c_date_box = 1;
  }
  else
  {
    $eta_c_date_box = 0;
  }
     if (isset($_POST['etd_a_date_box']))
  {
    $etd_a_date_box = 1;
  }
  else
  {
    $etd_a_date_box = 0;
  }
     if (isset($_POST['etd_b_date_box']))
  {
    $etd_b_date_box = 1;
  }
  else
  {
    $etd_b_date_box = 0;
  }
     if (isset($_POST['etd_c_date_box']))
  {
    $etd_c_date_box = 1;
  }
  else
  {
    $etd_c_date_box = 0;
  }
     if (isset($_POST['eta_date_a_box']))
  {
    $eta_date_a_box = 1;
  }
  else
  {
    $eta_date_a_box = 0;
  }
     if (isset($_POST['eta_date_b_box']))
  {
    $eta_date_b_box = 1;
  }
  else
  {
    $eta_date_b_box = 0;
  }
     if (isset($_POST['eta_date_c_box']))
  {
    $eta_date_c_box = 1;
  }
  else
  {
    $eta_date_c_box = 0;
  }
    $vessel_a =$_POST['vessel_a'];
    $vessel_b =$_POST['vessel_b'];
    $vessel_c =$_POST['vessel_c'];
    $voyage_a =$_POST['voyage_a'];
    $voyage_b =$_POST['voyage_b'];
    $voyage_c =$_POST['voyage_c'];
  $selectType =$_POST['chkfrmname'];


     if ($selectType=='chkform2'){

    $last_con_no =$lastjob;
    $job_no =$job_no;
    $consol_no =$consol_no;
    $job_date =$todayDate;



    $insertQuery= mysqli_query($con, " insert into sea_export_entry (so_no,job_no,job_date,consol_no,last_con_no,com_name,com_code,party,agent_party,foreign_agent,nomination,spo,shipping_line,ship_line_agent,port_of_lord,destination,wharf,clearing_agent,form_e_no,date,cut_date,ship_rcv_date,hand_over_s_l,doc_disp_date,cc_date,four_copy_rcv,four_copy_date,s_b_no,s_b_date,egm,mbl_no,mbl_date,hbl_no,hbl_date,cbm,pkgs,grs_weight,uom,net_weight,shipment_no,l_f,f_c,cy_cfs,packages,unit,gross_weight,cbm_ship,net_weight_a,ship_inv_no,ship_inv_date,ship_curr,ship_amount,pre_alert,hbl_printed,local_inv,intl_inv,name,address_a,consignee_name,consignee_address,notify,foreign_name,foreign_address,export_ref,domestic_routing,domestic_address,orignal_fbl,freight_pay,eta_a_date,eta_b_date,eta_c_date,etd_a_date,etd_b_date,etd_c_date,eta_date_a,eta_date_b,eta_date_c,eta_a_date_box,eta_b_date_box,eta_c_date_box,etd_a_date_box,etd_b_date_box,etd_c_date_box,eta_date_a_box,eta_date_b_box,eta_date_c_box,vessel_a,vessel_b,vessel_c,voyage_a,voyage_b,voyage_c) Value ('$so_no','$job_no','$job_date','$consol_no','$last_con_no','$com_name','$com_code','$party','$agent_party','$foreign_agent','$nomination','$spo','$shipping_line','$ship_line_agent','$port_of_lord','$destination','$wharf','$clearing_agent','$form_e_no','$date','$cut_date','$ship_rcv_date','$hand_over_s_l','$doc_disp_date','$cc_date','$four_copy_rcv','$four_copy_date','$s_b_no','$s_b_date','$egm','$mbl_no','$mbl_date','$hbl_no','$hbl_date','$cbm','$pkgs','$grs_weight','$uom','$net_weight','$shipment_no','$l_f','$f_c','$cy_cfs','$packages','$unit','$gross_weight','$cbm_ship','$net_weight_a','$ship_inv_no','$ship_inv_date','$ship_curr','$ship_amount','$pre_alert','$hbl_printed','$local_inv','$intl_inv','$name','$address_a','$consignee_name','$consignee_address','$notify','$foreign_name','$foreign_address','$export_ref','$domestic_routing','$domestic_address','$orignal_fbl','$freight_pay','$eta_a_date','$eta_b_date','$eta_c_date','$etd_a_date','$etd_b_date','$etd_c_date','$eta_date_a','$eta_date_b','$eta_date_c','$eta_a_date_box','$eta_b_date_box','$eta_c_date_box','$etd_a_date_box','$etd_b_date_box','$etd_c_date_box','$eta_date_a_box','$eta_date_b_box','$eta_date_c_box','$vessel_a','$vessel_b','$vessel_c','$voyage_a','$voyage_b','$voyage_c')")or die(mysqli_error($con));

    header("Location: dataentry_of_mawb_sea_export.php");
    
}
else
{

    $job_no =$job_no;
    $job_date =$todayDate;
    $consol_no =$consol_no;

     $insertQuery= mysqli_query($con, " insert into sea_export_entry (so_no,job_no,job_date,consol_no,com_name,com_code,party,agent_party,foreign_agent,nomination,spo,shipping_line,ship_line_agent,port_of_lord,destination,wharf,clearing_agent,form_e_no,date,cut_date,ship_rcv_date,hand_over_s_l,doc_disp_date,cc_date,four_copy_rcv,four_copy_date,s_b_no,s_b_date,egm,mbl_no,mbl_date,hbl_no,hbl_date,cbm,pkgs,grs_weight,uom,net_weight,shipment_no,l_f,f_c,cy_cfs,packages,unit,gross_weight,cbm_ship,net_weight_a,ship_inv_no,ship_inv_date,ship_curr,ship_amount,pre_alert,hbl_printed,local_inv,intl_inv,name,address_a,consignee_name,consignee_address,notify,foreign_name,foreign_address,export_ref,domestic_routing,domestic_address,orignal_fbl,freight_pay,eta_a_date,eta_b_date,eta_c_date,etd_a_date,etd_b_date,etd_c_date,eta_date_a,eta_date_b,eta_date_c,eta_a_date_box,eta_b_date_box,eta_c_date_box,etd_a_date_box,etd_b_date_box,etd_c_date_box,eta_date_a_box,eta_date_b_box,eta_date_c_box,vessel_a,vessel_b,vessel_c,voyage_a,voyage_b,voyage_c) Value ('$so_no','$job_no','$job_date','$consol_no','$com_name','$com_code','$party','$agent_party','$foreign_agent','$nomination','$spo','$shipping_line','$ship_line_agent','$port_of_lord','$destination','$wharf','$clearing_agent','$form_e_no','$date','$cut_date','$ship_rcv_date','$hand_over_s_l','$doc_disp_date','$cc_date','$four_copy_rcv','$four_copy_date','$s_b_no','$s_b_date','$egm','$mbl_no','$mbl_date','$hbl_no','$hbl_date','$cbm','$pkgs','$grs_weight','$uom','$net_weight','$shipment_no','$l_f','$f_c','$cy_cfs','$packages','$unit','$gross_weight','$cbm_ship','$net_weight_a','$ship_inv_no','$ship_inv_date','$ship_curr','$ship_amount','$pre_alert','$hbl_printed','$local_inv','$intl_inv','$name','$address_a','$consignee_name','$consignee_address','$notify','$foreign_name','$foreign_address','$export_ref','$domestic_routing','$domestic_address','$orignal_fbl','$freight_pay','$eta_a_date','$eta_b_date','$eta_c_date','$etd_a_date','$etd_b_date','$etd_c_date','$eta_date_a','$eta_date_b','$eta_date_c','$eta_a_date_box','$eta_b_date_box','$eta_c_date_box','$etd_a_date_box','$etd_b_date_box','$etd_c_date_box','$eta_date_a_box','$eta_date_b_box','$eta_date_c_box','$vessel_a','$vessel_b','$vessel_c','$voyage_a','$voyage_b','$voyage_c')")or die(mysqli_error($con));


      header("Location: dataentry_of_mawb_sea_export.php");


}

  
}


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Entry(Sea Export)</title>
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/crm.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
  <script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
  
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
    

<style type="text/css">
.main_widget_box .nav-tabs > li > a {
        color: #05417e;
    }
.main_widget_box  .nav-tabs {
        background: #eee;
    }
.main_widget_box .tab-pane {
    margin-top: 30px;
    width: 100%;
    float: left;
}

#prtner_Bnk .input-feild input {
    padding: 0 0px;
}
#prtner_Bnk .input-feild {
    width: 70%;
}
#aimport_form_table_wrapper #aimport_form_table_filter {
    display: none;
}

 .dataTables_filter {
    display: none;
}
#containtable td input{
  width: 45px;
}


</style>

</head>
<body>
<?php include 'header.php';?>
<?php include 'inc_widgets/header_ribbon.php';?>

<!-- Bread Crumbs -->
<div class="breadCrumb_bar">
  <div class="breadCrumb_bar_iner">
    <div class="">
        <div class="btn-group btn-breadcrumb">
          <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="Usermodules.php" class="btn btn-info ">Operations</a>

          <a href="Usermodules.php" class="btn btn-info active">Data Entry(Sea Export)</a>

        </div>
    </div>
  </div>
</div>

<div class="page-wrapper symfra_theme toggled">

 <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">

           <div class="sidebar-brand">
            <a href="#">SYMFRA</a>
                <div id="close-sidebar">
                  <!-- <i class="fa fa-close"></i> -->
                </div>
           </div>

           <?php include 'sidebar_widgets/user_info_widgets.php'; ?>
                   <!-- sidebar-header  -->

           <div class="sidebar-search">
              <div>
                <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Search...">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
           </div>
                    <!-- sidebar-search  -->

           
           <?php include 'sidebar_widgets/adv_hr_bar.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class="main_widget_box">
  <div class="">
                  <!-- <hr> -->
    <form action="" method="POST" enctype="multipart/form-data">

       <!-- Modal One-->
       <div class="modal fade confirmTable-modal" id="draftModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure You Want to save it to draft?</p>
                  <button type="submit" name="saveBtn">Yes</button>
                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
       </div>

       <!-- Modal Two-->
       <div class="modal fade confirmTable-modal" id="addUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure You Want to Submit?</p>
                  <button type="submit" name="submitBtn">Yes</button>
                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
       </div>

         <!-- Add Value Modal Two-->
       <div class="modal fade confirmTable-modal" id="submit_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure You Want to Submit?</p>
                  <button type="submit" name="submitBtn">Yes</button>
                      <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                </div>
                <div class="modal-footer">
                  <p>Add Related content if needed</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
       </div>


       

      

       <label id="formSummary" style="color: red;"></label>


              <div class="widget_iner_box">

                <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                                          <!-- Go back button code starting here -->
                                          <?php include('inc_widgets/backBtn.php'); ?>
                                          <!-- Go back button code ending here -->
                    </div>
                    <button type="button" id="btnConfirm_Su" onclick="submitFunc();"> <small>Submit</small></button>
                    <button type="button" name="btnConfirm_S" onclick="saveFunc();"> <small>Save</small></button>
                    <button type="button" name="submitBtn"> <small>Cancel</small></button>         
                </div>

                <div class="col-md-12">

                  <div class="input-label"><label>Sale order</label></div>
                  <div class="mini_input-feild ">
                    
                    <input type="text" class="so_no" id="so_no" name="so_no">
                  </div>
                  

                  <div class="input-feild input-feild-checkboxs"  style="width: 25%;">
                    <input type="radio" id="chkfrmname1"  name="chkfrmname" value="chkform1" checked> <label>New Mawb</label>
                  </div>  

                  <div class="input-feild input-feild-checkboxs" style="width: 25%;">
                    <input type="radio" id="chkfrmname1"  name="chkfrmname" value="chkform2" ><label>Old Mawb</label>
                  </div>

                </div>

                <div class="cls"></div>
                <hr>


                <div class="col-md-6">
                            <div class="input-label chkform1 chkboxform"><label>Job No. </label></div>

                            <div class="input-feild chkform1 chkboxform">
                              <?php echo '<input class="mini_input_field" disabled="" type="text" name="job_no" value="'.$jobID.'">'; ?>
                            </div>

                            <div class="input-label chkform1 chkboxform"><label>Consol No. </label></div>
                            <div class="input-feild chkform1 chkboxform">
                            <?php echo '<input class="mini_input_field" disabled="" type="text" name="consol_no" value="'.$newID.'">'; ?>
                            </div>
                            <div class="input-label chkform1 chkboxform"><label>Job Date </label></div>
                            <div class="input-feild chkform1 chkboxform">
                            <input class="mini_input_field" type="date" name="job_date" value="<?php echo $todayDate?>" >
                            </div>



                            <div class="input-label chkform2 chkboxform" style="display: none;"><label>Job No. </label></div>

                            <div class="input-feild chkform2 chkboxform" style="display: none;">
                               <?php echo '<input class="mini_input_field" disabled="" type="text" name="job_no_a" value="'.$jobID.'">'; ?>
                            </div>

                            <div class="input-label chkform2 chkboxform" style="display: none;"><label>Last Consol. </label></div>
                            <div class="input-feild chkform2 chkboxform" style="display: none;">
                               <?php echo '<input class="mini_input_field" disabled="" type="text" name="last_con_no" value="'.$lastconsole.'">'; ?>
                            </div>

                            <div class="input-label chkform2 chkboxform" style="display: none;"><label>Consol No. </label></div>

                            <div class="input-feild chkform2 chkboxform" style="display: none;">
                              <select name="consol_no_a" id="consol_no_a" class="mini_select_field consol_no_a"> <option value="Select">Select </option>
                                          <?php

                                            $selectSub = mysqli_query($con, "select * from  sea_export_entry");

                                            while ($rowSub = mysqli_fetch_array($selectSub))
                                            {
                                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['consol_no'].'</option>';
                                            }
                                          ?>
                                     </select>
                            </div>
                            <div class="input-label chkform2 chkboxform" style="display: none;"><label>Job Date </label></div>
                            <div class="input-feild chkform2 chkboxform" style="display: none;">
                            <input class="mini_input_field" type="date" name="job_date_a" value="<?php echo $todayDate?>" >
                            </div>

                </div>

              </div>


               

              <div class="cls"></div>
              <hr>  

        <div class="widget_iner_box">
              
                              

                <div class="col-md-6">

                  <div class="input-label"><label>Commodity Name</label></div>

                  <div class="input-feild">
                   <select name="com_name" id="com_name" class="com_name" onchange="checkValues1();">
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from pro_setup_commodity");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['pro_description'].'</option>';
                            }
                          ?>
                      </select>

                  </div>


                  <!-- <div class="input-label"><label>Job Status</label></div>
                  <div class="input-feild">
                    <select><option>Nomination</option></select>
                  </div>
 -->

                   
                    </div>
                <div class="col-md-6">

                  

                  <div class="input-label"><label>Commodity Code</label></div>
                  <div class="input-feild">
                    
                    <input type="text" class="com_code" id="com_code" name="com_code">
                  </div>

                 

                </div>
        </div>

                <div class="cls"></div>
                <hr>
        <div class="widget_iner_box">         
              <div class="col-md-4">

                      <div class="input-label"><label>Party Code</label></div>
                      <div class="input-feild">
                        <select name="party" class="party" id="party" onchange="checkValues2()" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from custmaster");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Agent Party </label></div>
                      <div class="input-feild">
                        <select name="agent_party" class="agent_party" id="agent_party" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from sub_agents_parties_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['subpartyname'].'</option>';
                            }
                          ?>
                      </select> 
                      </div>

                      <div class="input-label"><label>Foreign Agent</label></div>
                      <div class="input-feild">
                        <select name="foreign_agent" class="foreign_agent" id="foreign_agent" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from custmaster");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Shipping Line</label></div>
                      <div class="input-feild">
                        <select name="shipping_line" class="shipping_line" id="shipping_line" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  shipping_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['ship_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>S/Line Agent</label></div>
                      <div class="input-feild">
                         <select name="ship_line_agent" class="ship_line_agent" id="ship_line_agent" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from custmaster");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>
                     
              </div>

              <div class="col-md-4">

                      <div class="input-label"><label>Nomination </label></div>
                      <div class="input-feild">
                          <select class="nomination" name="nomination" id="nomination">
                            <option>No</option>
                            <option>Yes</option>
                          </select>                        
                      </div> 

                       <div class="input-label"><label>SPO </label></div>
                      <div class="input-feild">
                          <select name="spo" class="spo" id="spo" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  spo_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['spo_name'].'</option>';
                            }
                          ?>
                      </select>                        
                      </div>

                      <div class="input-label"><label>Port of Load </label></div>
                      <div class="input-feild">
                         <select name="port_of_lord" class="port_of_lord" id="port_of_lord" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  destination_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                     
              </div>

              <div class="col-md-4">

                      <div class="input-label"><label>Destination</label></div>
                      <div class="input-feild">
                        <select name="destination" class="destination" id="destination" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  destination_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Wharf </label></div>
                      <div class="input-feild">
                         <select name="wharf" class="wharf" id="wharf" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  destination_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Clearing Agent </label></div>
                      <div class="input-feild">
                        <select name="clearing_agent" class="clearing_agent" id="clearing_agent" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from  clearing_agents");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>
              </div>
        </div>
                <div class="cls"></div>
                <hr> 

      

        <div class="widget_iner_box">        





                <div class="col-md-4">  

                   <div class="input-label"><label>Form 'E' No</label></div>
                  <div class="input-feild">
                    <input type="text" name="form_e_no">
                  </div>

                   <div class="input-label"><label>Ship Rcv Date.</label></div>
                  <div class="input-feild">
                    <input class="" type="date" name="ship_rcv_date">

                  </div>

                  <div class="input-label"><label>CC Date.</label></div>
                  <div class="input-feild">
                    <input class="" type="date" name="cc_date">
                  </div>

                  <div class="input-label"><label>S/B No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="s_b_no">
                  </div>

                  <!-- <div class="input-label"><label>M.R No</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div> -->

                  <div class="input-label"><label>MBL No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="mbl_no">
                  </div>
                  
                  <div class="input-label"><label>HBL No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="hbl_no">
                  </div>




                </div>
                
                <div class="col-md-4">
                    <div class="input-label"><label>Date.</label></div>
                    <div class="input-feild">
                    <input type="date" name="date">
                     </div>



                     <div class="input-label"><label>Hand Over to S/L</label></div>
                    <div class="input-feild">
                      <input type="date" name="hand_over_s_l">
                    </div>

                    <div class="input-label"><label>4th Copy Rcv</label></div>
                    <div class="input-feild">
                      <select class="mini_select_field" name="four_copy_rcv">
                            <option>No</option>
                            <option>Yes</option>
                      </select>
                    </div>

                    <!-- <div class="input-label"><label>S/B Place</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div> -->

                    <!-- <div class="input-label"><label>M.R Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div> -->
                     <div class="input-label"><label>S/B Date</label></div>
                    <div class="input-feild">
                      <input type="date" name="s_b_date">
                    </div>

                    <div class="input-label"><label>MBL Date</label></div>
                    <div class="input-feild">
                      <input type="date" name="mbl_date">
                    </div>

                    <div class="input-label"><label>HBL Date</label></div>
                    <div class="input-feild">
                      <input type="date" name="hbl_date">
                    </div>


                </div>

                <div class="col-md-4">
                    <div class="input-label"><label>Cut Off Date.</label></div>
                    <div class="input-feild">
                    <input type="date" name="cut_date">
                     </div>



                     <div class="input-label"><label>Date Disp Date</label></div>
                    <div class="input-feild">
                      <input type="date" name="doc_disp_date">
                    </div>

                    <div class="input-label"><label>4th Copy Date</label></div>
                    <div class="input-feild">
                      <input type="date" name="four_copy_date">
                    </div>

                   

                    <div class="input-label"><label>EGM</label></div>
                    <div class="input-feild">
                      <input type="text" name="egm">
                    </div>

                   <!--  <div class="cls"></div>
                    <hr>
 -->
                    <div class="input-label"><label>HBL Type</label></div>
                    <div class="input-feild">
                        <select name="clearing_agent" class="clearing_agent" id="clearing_agent" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from hbl_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['hbl_desc'].'</option>';
                            }
                          ?>
                      </select>
                    </div>

                    


                </div>
        </div>

        <div class="cls"></div>
        <hr>        

        <div class="widget_iner_box">
          <div class="col-md-4">
              <div class="input-label"><label>ETA  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="date" name="eta_a_date"><input type="checkbox" name="eta_a_date_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="date" name="etd_a_date"><input type="checkbox" name="etd_a_date_box" style="margin: 0 10px"></div>

               <div class="input-label"><label>ETA  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="date" name="eta_date_a"><input type="checkbox" name="eta_date_a_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name="vessel_a"></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name="voyage_a"></div>
          </div>

          <div class="cls"></div>
          <hr>


          <div class="col-md-4">
              <div class="input-label"><label>ETA  <small>(T/Ship Point1)</small></label></div>
              <div class="input-feild"><input type="date" name="eta_b_date"><input type="checkbox" name="eta_b_date_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="date" name="etd_b_date"><input type="checkbox" name="etd_b_date_box" style="margin: 0 10px"></div>

               <div class="input-label"><label>ETA  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="date" name="eta_date_b"><input type="checkbox" name="eta_date_b_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name="vessel_b"></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name="voyage_b"></div>
          </div>

          <div class="cls"></div>
          <hr>
          <div class="col-md-4">
             <div class="input-label"><label>ETA  <small>(T/Ship Point2)</small></label></div>
              <div class="input-feild"><input type="date" name="eta_c_date"><input type="checkbox" name="eta_c_date_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="date" name="etd_c_date"><input type="checkbox" name="etd_c_date_box" style="margin: 0 10px"></div>

               <div class="input-label"><label>ETA  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="date" name="eta_date_c"><input type="checkbox" name="eta_date_c_box" style="margin: 0 10px"></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name="vessel_c"></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name="voyage_c"></div>
          </div>



        </div>  


     

         <div class="cls"></div>
         <hr> 

         <div class="widget_iner_box">        
                
                <div class="col-md-4">  
                  <div class="widget_child_title"><h4>Consol Total </h4></div>
                    

                  <div class="input-label"><label>CBM</label></div>
                  <div class="input-feild">
                    <input type="text" name="cbm">
                  </div>

                  <div class="input-label"><label>Grs Weight</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="grs_weight">

                  </div>

                  <div class="input-label"><label>Net Weight</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="net_weight">
                  </div>

                  <!-- <div class="input-label"><label>Destination</label></div>
                  <div class="input-feild">
                    <select><option></option></select>
                  </div> -->

                  
                </div>
                
                <div class="col-md-4">

                <div class="widget_child_title"><hr></div>


                    <div class="input-label"><label>No. of Ship</label></div>
                    <div class="input-feild">
                      <input class="mini_input_field" type="text" name="shipment_no">
                    </div>

                    <div class="input-label"><label>Packages.</label></div>
                    <div class="input-feild">
                    <input type="text" name="pkgs">
                     </div>



                     <div class="input-label"><label>UOM</label></div>
                    <div class="input-feild">
                      <input type="text" name="uom">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="widget_child_title"><h4>Consol Job</h4></div>

                      <table id="hawbtable" class="display nowrap no-footer" style="width:100%">
                        <thead>
                          <tr>

                            
                            <th>Job No.</th>
                            <th>House No.</th>


                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                </div>

                <div class="cls"></div>
                <hr>

                <div class="col-md-4">
                    <div class="input-label"><label>LCL/FCL</label></div>
                    <div class="input-feild">
                      <select class="mini_select_field" name="l_f">
                            <option>LCL</option>
                            <option>FCL</option>
                            <option>P/FCL</option>
                      </select>
                     </div>



                     <div class="input-label"><label>CY/CFS</label></div>
                    <div class="input-feild">
                      <select class="mini_select_field" name="cy_cfs">
                            <option>CY/CY</option>
                            <option>CY/CFS</option>
                            <option>CFS/CY</option>
                            <option>CFS/CFS</option>
                      </select>
                    </div>

                    <div class="input-label"><label>Pkgs</label></div>
                    <div class="input-feild">
                      <input type="text" name="packages">
                    </div>

                    <div class="input-label"><label>Unit</label></div>
                    <div class="input-feild">
                      <select name="unit" class="unit" id="unit" >
                          <option value="Select">Select </option>
                          <?php

                            $selectCust = mysqli_query($con, "select * from hbl_setup");

                            while ($rowCust = mysqli_fetch_array($selectCust))
                            {
                              echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['hbl_desc'].'</option>';
                            }
                          ?>
                      </select>
                    </div>

                    
                </div>

                <div class="col-md-4">
                    <div class="input-label"><label>FOB/CIF</label></div>
                    <div class="input-feild">
                      <select class="mini_select_field" name="f_c">
                            <option>FOB</option>
                            <option>CIF</option>
                            <option>CNF</option>
                      </select>
                     </div>

                     <div class="input-label"><label>Gross Weight</label></div>
                    <div class="input-feild">
                      <input type="text" name="gross_weight">
                    </div>

                     <div class="input-label"><label>Net Weight</label></div>
                    <div class="input-feild">
                      <input type="text" name="net_weight_a">
                    </div>



                    <!--  <div class="input-label"><label>Currency</label></div>
                    <div class="input-feild">
                      <select><option></option></select>
                    </div> -->

                    <!-- <div class="input-label"><label>Ex.Rate</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div> -->

                   <!--  
                    <div class="cls"></div>
                    <hr> -->

                    <div class="input-label"><label>CBM</label></div>
                    <div class="input-feild">
                      <input type="text" name="cbm_ship">
                    </div>

                     <!-- <div class="input-label"><label>CBM Rate</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div> -->
                </div>
        </div>  

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-4">
                 <div class="widget_child_title"><h4>Shipper Invoice </h4></div>

                  <div class="input-label"><label>No </label></div>
                  <div class="input-feild">
                  <input type="text" name="ship_inv_no">
                
                  </div>

                  <div class="input-label"><label>Date</label></div>
                  <div class="input-feild">
                  <input type="text" name="ship_inv_date">
                  
                  </div>

                  <div class="input-label"><label>Currency </label></div>
                  <div class="input-feild">
                  <input type="text" name="ship_curr">
                  
                  </div>

                  <div class="input-label"><label>Amount </label></div>
                  <div class="input-feild">
                  <input type="text" name="ship_amount">
                
                  </div>


           </div>

          <div class="col-md-4">
             <div class="widget_child_title"><hr></div>
              <div class="input-label"><label>Pre-Alert Sent.</label></div>
                <div class="input-feild">
                  <input type="text" name="pre_alert">
              </div>

              <div class="input-label"><label>HBL Printed </label></div>
              <div class="input-feild">
              <input type="text" name="hbl_printed">
              
              </div>


              <!-- <div class="input-label"><label>Release Msg </label></div>
              <div class="input-feild">
              <input type="text" name="">
              
              </div> -->

              <!-- <div class="input-label"><label>Pre Alert Date </label></div>
              <div class="input-feild">
              <input type="text" name="">
              
              </div -->
          </div>

          <div class="col-md-4">    
              

            


              <div class="widget_child_title"><h4>Invoice Required </h4></div>

              <div class="input-label"><label>Local Invoice </label></div>
              <div class="input-feild">
                  <select class="mini_select_field" name="local_inv"><option>NO</option><option>YES</option></select>              
              </div>

              <div class="input-label"><label>Initial Invoice</label></div>
              <div class="input-feild">
                  <select class="mini_select_field" name="intl_inv"><option>N</option><option>Y</option></select>              
              </div>
          </div>
         
        </div>

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-6">

                  <div class="input-label"><label>Name </label></div>
                  <div class="input-feild">
                  <input type="text" name="name">
                
                  </div>

                  <div class="input-label"><label>Address</label></div>
                  <div class="input-feild">
                  <textarea name="address_a"></textarea>
                
                  </div>

                  <div class="input-label"><label>Consignee Name </label></div>
                  <div class="input-feild">
                  <input type="text" name="consignee_name">
                
                  </div>

                  <div class="input-label"><label>Consignee Address</label></div>
                  <div class="input-feild">
                  <textarea name="consignee_address"></textarea>
                
                  </div>
           </div>

          <div class="col-md-6">
                  <div class="input-label"><label>Forwarding Agent Name </label></div>
                  <div class="input-feild">
                  <input type="text" name="foreign_name">
                
                  </div>

                  <div class="input-label"><label>Forwarding Agent Address</label></div>
                  <div class="input-feild">
                  <textarea name="foreign_address"></textarea>
                
                  </div>

                  <div class="input-label"><label>Notify</label></div>
                  <div class="input-feild">
                  <textarea name="notify"></textarea>
                
                  </div>
          </div>


         
        </div> 

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-6">
                  

                  <div class="input-label"><label>Freight Pay At</label></div>
                  <div class="input-feild">
                  <input type="text" name="freight_pay">
                
                  </div>

                  <div class="input-label"><label>Original FBL/s</label></div>
                  <div class="input-feild">
                  <input type="text" name="orignal_fbl">
                
                  </div>
                  <div class="input-label"><label>Export Reference</label></div>
                  <div class="input-feild">
                  <textarea name="export_ref"></textarea>
                
                  </div>


           </div> 

           <div class="col-md-6">

                  
                  <div class="input-label"><label>Delivery Agent Name </label></div>
                  <div class="input-feild">
                  <input type="text" name="domestic_routing">
                
                  </div>

                  <div class="input-label"><label> Delivery Agent Address</label></div>
                  <div class="input-feild">
                  <textarea name="domestic_address"></textarea>
                
                  </div>
           </div>




         
        </div> 

        <div class="widget_iner_box">
            <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#containertab">Container Info</a></li>
                  <li><a data-toggle="tab" href="#local_invoices">Local Invoices</a></li>
                  <li><a data-toggle="tab" href="#frghtchrges">Freight Charges</a></li>
                  <li><a data-toggle="tab" href="#marknNos">Marks & Nos</a></li>


                </ul>
            </div>


           <div class="tab-content">

              <div id="containertab" class="tab-pane fade in active">

                  <div class="col-md-10">  
                    <table id="hawbtable2" class="display nowrap no-footer" style="width:100%">
                        <thead>
                          <tr>
                            <th>Seq No.</th>
                            <th class="hide">Job No.</th> 
                            <th>Container No</th>
                            <th>Size</th>
                            <th>Container Types</th>
                            <th>Seal No.</th>
                            <th>PCD</th>
                            <th>Vehicle</th>
                            <th>Vehicle Dt</th>
                          </tr>

                        </thead>
                        <tbody>

                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>


                          </tr>



                         


                        </tbody>
                                         <!--  <tfoot>
                                            <tr>
                                              <td class="hide"></td>
                                            <td><label>20*</label>
                                                <input type="text" name="sel_1" id="sel_1">
                                                <label>40*</label>
                                                <input type="text" name="sel_2" id="sel_2">
                                            </td>
                                           
                                            <td><label>40HC</label>
                                                <input type="text" name="sel_3" id="sel_3">
                                            </td>
                                            <td><label>45*</label>
                                                <input type="text" name="sel_4" id="sel_4">
                                            </td>
                                            </tr>
                                          </tfoot> -->
                    </table> 
                  </div>

                  <div class="col-md-2">
                    <table id="hawbtable4" class="display nowrap no-footer">
                      <thead>
                        <th>Size</th>
                        <th>No.</th>
                      </thead> 

                      <tbody>
                           <tr>
                            <td>
                                <select style="float: left;" name="sel_val1" id="sel_val1" onchange="drop1();" >
                                  <option>Select</option>
                                  <option value="20">20</option>
                                  <option value="40">40</option>
                                  <option value="40HC">40HC</option>
                                  <option value="45">45</option>
                                </select>
                            </td>
                         
                            <td>
                            </td>
                            
                          </tr>
                      </tbody> 

                    </table>
                  </div>                     
              </div>

              <div id="local_invoices" class="tab-pane fade in ">

      


                 <table id="local_inv_table" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>No.</th>
                        <th>Currency</th>
                        <th>F/Amount</th>
                        <th>PKR Amount</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                      </tr>
                    </tbody>

                 </table>                       
              </div>


              <div id="frghtchrges" class="tab-pane fade in ">

      


                 <table id="frghttable" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>Freight Charges</th>
                        <th>Prepaid </th>
                        <th>Collect</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>

                      </tr>
                    </tbody>

                 </table>                       
              </div>


              <div id="marknNos" class="tab-pane fade in ">

      


                 <table id="marknNostable" class="display nowrap no-footer" style="width:100%">
                    <thead>
                      <tr>
                        <th>Marks & Nos</th>
                        <th>Description of Packages & Goods</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>

                      </tr>
                    </tbody>

                 </table>                       
              </div>


           </div> 

        </div>   



          
    </form>
        
        

  </div>

  
</div>
<script>
  $(document).ready(function() {
     $('#chrgestable').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false


    } );

      $('#chrgestable1').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
        "ordering":false


    } );

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false

    } );


     $('#hawbtable2').DataTable( {
         "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false,

    } );

     $('#hawbtable4').DataTable( {
        "paging":false,
        "info":false,
        "ordering":false,

    } );

     $('#aimport_form_table').DataTable( {
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false

    } ); 

     $('#local_inv_table').DataTable( {
        "paging":false,
        "info":false,

    } ); 
    $('#frghttable').DataTable( {
        "paging":false,
        "info":false,

    } );

     $('#marknNostable').DataTable( {
        "paging":false,
        "info":false,

    } );



       $('#containtable').DataTable( {
        "paging":false,
        "info":false,
        "ordering":false

    } ); 


     

} );
</script>
<script>
  $(document).ready(function() {
     $('#prtytable').DataTable( {
        "paging":false,
        "info":false,

    } );

    $('#foreigntbale').DataTable( {
        "paging":false,
        "info":false,

    } );

     } );
</script>

<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('input[name="chkfrmname"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chkboxform").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name="chkfrmname2"]').click(function(){
        var inputValue2 = $(this).attr("value");
        var targetBox2 = $("." + inputValue2);
        $(".chkboxform2").not(targetBox2).hide();
        $(targetBox2).show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name="chkfrmname3"]').click(function(){
        var inputValue3 = $(this).attr("value");
        var targetBox3 = $("." + inputValue3);
        $(".chkboxform3").not(targetBox3).hide();
        $(targetBox3).show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name="chkfrmname4"]').click(function(){
        var inputValue4 = $(this).attr("value");
        var targetBox4 = $("." + inputValue4);
        $(".chkboxform4").not(targetBox4).hide();
        $(targetBox4).show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name="chkfrmname5"]').click(function(){
        var inputValue5 = $(this).attr("value");
        var targetBox5 = $("." + inputValue5);
        $(".chkboxform5").not(targetBox5).hide();
        $(targetBox5).show();
    });
});
</script>



<script type="text/javascript">
  function checkValues1() {
 var comName = document.getElementById("com_name").value;

      $.ajax({
         url:"sea_export_ajax1.php",  
                method:"GET",  
                data:{comName:comName},  
                dataType:"text",  
         success: function(data) {
              $('.com_code').val(data);  
                }
      });
 
} 


</script>
<script type="text/javascript">
  function checkValues2() {
 var subAgent = document.getElementById("party").value;

      $.ajax({
         url:"sea_export_ajax2.php",  
                method:"GET",  
                data:{subAgent:subAgent},  
                dataType:"text",  
         success: function(data) {
              $('.agent_party').html(data); 
                }
      });
 
} 


</script>
<script type="text/javascript">
function submitFunc()
{
  $("#submit_Modal").modal();
}
</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
