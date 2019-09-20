<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

//  Today date func
$todayDate = date("Y-m-d");

// auto increment
$selectLastID = mysqli_query($con, "SELECT * FROM air_import_entry ORDER BY job_no DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['job_no'];
$newID = $lastID + 1;
$job_no = $newID;

// fetch data in dat base
$m_awb2= $_GET['m_awb'];

$selectQurey= mysqli_query($con, " SELECT * FROM  air_import_entry WHERE m_awb= '$m_awb2' ");

while ($row= mysqli_fetch_array($selectQurey)) {
  $m_awb2= $row['m_awb'];
  $m_date2  = $row['m_date'];
  $m_pp_cc2 = $row['m_pp_cc'];
  $m_pieces2 = $row['m_pieces'];
  $m_grs_weight2 = $row['m_grs_weight'];
  $m_ch_weight2 = $row['m_ch_weight'];
  $m_rate2 = $row['m_rate'];
  $job_no2 = $row['job_no'];
  $h_awb2 = $row['h_awb'];
  $job_date2 = $row['job_date'];

}

// Add Air Import Submit Btn Event
if (isset($_POST['submitBtn'])) {
  
  $job_no = $job_no;
  $so_no = $_POST['so_no'];
  $job_date = $_POST['job_date'];
  $m_awb = $_POST['m_awb'];
  $m_date = $_POST['m_date'];
  $m_pp_cc = $_POST['m_pp_cc'];
  $m_pieces = $_POST['m_pieces'];
  $m_grs_weight = $_POST['m_grs_weight'];
  $m_ch_weight = $_POST['m_ch_weight'];
  $m_rate = $_POST['m_rate'];
  $h_awb = $_POST['h_awb'];
  $h_date = $_POST['h_date'];
  $h_pp_cc = $_POST['h_pp_cc'];
  $h_pieces = $_POST['h_pieces'];
  $h_grs_weight = $_POST['h_grs_weight'];
  $h_ch_weight = $_POST['h_ch_weight'];
  $h_rate = $_POST['h_rate'];
  $description = $_POST['description'];
  $party = $_POST['party'];
  $agent_party = $_POST['agent_party'];
  $foreign_party = $_POST['foreign_party'];
  $spo = $_POST['spo'];
  $origin = $_POST['origin'];
  $destination = $_POST['destination'];
  $flight_no = $_POST['flight_no'];
  $flight_date = $_POST['flight_date'];
  $igm_no = $_POST['igm_no'];
  $igm_date = $_POST['igm_date'];
  $air_d_o_no = $_POST['air_d_o_no'];
  $d_o_date = $_POST['d_o_date'];
  $b_e_no = $_POST['b_e_no'];
  $b_e_date = $_POST['b_e_date'];
  $index_no = $_POST['index_no'];
  $sub_index_no = $_POST['sub_index_no'];
  $e_t_d = $_POST['e_t_d'];
  $e_t_a = $_POST['e_t_a'];
  $l_c = $_POST['l_c'];
  $origin_d_o_no = $_POST['origin_d_o_no'];
  $passport_id = $_POST['passport_id'];
  $foreign_detail = $_POST['foreign_detail'];
  $notify_detail = $_POST['notify_detail'];
  $consignee_detail = $_POST['consignee_detail'];
  $remarks = $_POST['remarks'];
  $nomination = $_POST['nomination'];
  $remark = $_POST['remark'];
  $fight_term = $_POST['fight_term'];
  $invoice_f_agent = $_POST['invoice_f_agent'];
  $local_inv = $_POST['local_inv'];
  $inv_from_f_agent = $_POST['inv_from_f_agent'];
  $status = $_POST['status'];
  
  $checkCurr = $_POST['checkCurr'];
  $exchangeRate_P = $_POST['exchangeRate_P'];
  $sellRate_P = $_POST['sellRate_P'];
  $sellAmount_P = $_POST['sellAmount_P'];
  $sellAmountPKR_P = $_POST['sellAmountPKR_P'];
  $buyRate_P = $_POST['buyRate_P'];
  $buyAmount_P = $_POST['buyAmount_P'];
  $buyAmountPKR_P = $_POST['buyAmountPKR_P'];
  $diffAmount_P = $_POST['diffAmount_P'];
  $diffAmountPKR_P = $_POST['diffAmountPKR_P'];
  $profitRate_P = $_POST['profitRate_P'];
  $profitAmount_P = $_POST['profitAmount_P'];
  $profitAmountPKR_P = $_POST['profitAmountPKR_P'];
  $buyRate_F = $_POST['buyRate_F'];
  $buyAmount_F = $_POST['buyAmount_F'];
  $buyAmountPKR_F = $_POST['buyAmountPKR_F'];
  $sellRate_F = $_POST['sellRate_F'];
  $sellAmount_F = $_POST['sellAmount_F'];
  $sellAmountPKR_F = $_POST['sellAmountPKR_F'];
  $diffAmount_F = $_POST['diffAmount_F'];
  $diffAmountPKR_F = $_POST['diffAmountPKR_F'];
  $profitRate_F = $_POST['profitRate_F'];
  $profitAmount_F = $_POST['profitAmount_F'];
  $profitAmountPKR_F = $_POST['profitAmountPKR_F'];
  $payableAmount = $_POST['payableAmount'];
  $payableAmountPKR = $_POST['payableAmountPKR'];

   if (isset($_POST['status_type'])) {
    $status_type='Active';

  }
  else
  {
    $status_type='Deactive';
  }


  $InsertQuery = mysqli_query($con, " INSERT INTO air_import_entry (so_no,job_no,job_date,m_awb,m_date,m_pp_cc,m_pieces,m_grs_weight,m_ch_weight,m_rate,h_awb,h_date,h_pp_cc,h_pieces,h_grs_weight,h_ch_weight,h_rate,description,party,agent_party,foreign_party,spo,origin,destination,flight_no,flight_date,igm_no,igm_date,air_d_o_no,d_o_date,b_e_no,b_e_date,index_no,sub_index_no,e_t_d,e_t_a,l_c,origin_d_o_no,passport_id,foreign_detail,notify_detail,consignee_detail,remarks,nomination,status,remark,fight_term,invoice_f_agent,local_inv,inv_from_f_agent,status_type,checkCurr,exchangeRate_P,sellRate_P,sellAmount_P,sellAmountPKR_P,buyRate_P,buyAmount_P,buyAmountPKR_P,diffAmount_P,diffAmountPKR_P,profitRate_P,profitAmount_P,profitAmountPKR_P,buyRate_F,buyAmount_F,buyAmountPKR_F,sellRate_F,sellAmount_F,sellAmountPKR_F,diffAmount_F,diffAmountPKR_F,profitRate_F,profitAmount_F,profitAmountPKR_F,payableAmount,payableAmountPKR) VALUES ('$so_no','$job_no','$job_date','$m_awb','$m_date','$m_pp_cc','$m_pieces','$m_grs_weight','$m_ch_weight','$m_rate','$h_awb','$h_date','$h_pp_cc','$h_pieces','$h_grs_weight','$h_ch_weight','$h_rate','$description','$party','$agent_party','$foreign_party','$spo','$origin','$destination','$flight_no','$flight_date','$igm_no','$igm_date','$air_d_o_no','$d_o_date','$b_e_no','$b_e_date','$index_no','$sub_index_no','$e_t_d','$e_t_a','$l_c','$origin_d_o_no','$passport_id','$foreign_detail','$notify_detail','$consignee_detail','$remarks','$nomination','$status','$remark','$fight_term','$invoice_f_agent','$local_inv','$inv_from_f_agent','$status_type','$checkCurr','$exchangeRate_P','$sellRate_P','$sellAmount_P','$sellAmountPKR_P','$buyRate_P','$buyAmount_P','$buyAmountPKR_P','$diffAmount_P','$diffAmountPKR_P','$profitRate_P','$profitAmount_P','$profitAmountPKR_P','$buyRate_F','$buyAmount_F','$buyAmountPKR_F','$sellRate_F','$sellAmount_F','$sellAmountPKR_F','$diffAmount_F','$diffAmountPKR_F','$profitRate_F','$profitAmount_F','$profitAmountPKR_F','$payableAmount','$payableAmountPKR') ") or die(mysqli_error($con));

  header("location: add_job_air_import.php");



}

// Addmore house bill
if (isset($_POST['submitBtn1'])) {

  $job_no = $job_no;
  $job_date = $_POST['job_date'];
  $m_awb = $_POST['m_awb'];
  $m_date = $_POST['m_date'];
  $m_pp_cc = $_POST['m_pp_cc'];
  $m_pieces = $_POST['m_pieces'];
  $m_grs_weight = $_POST['m_grs_weight'];
  $m_ch_weight = $_POST['m_ch_weight'];
  $m_rate = $_POST['m_rate'];
  $h_awb = $_POST['h_awb'];
  $h_date = $_POST['h_date'];
  $h_pp_cc = $_POST['h_pp_cc'];
  $h_pieces = $_POST['h_pieces'];
  $h_grs_weight = $_POST['h_grs_weight'];
  $h_ch_weight = $_POST['h_ch_weight'];
  $h_rate = $_POST['h_rate'];
  $description = $_POST['description'];
  $party = $_POST['party'];
  $agent_party = $_POST['agent_party'];
  $foreign_party = $_POST['foreign_party'];
  $spo = $_POST['spo'];
  $origin = $_POST['origin'];
  $destination = $_POST['destination'];
  $flight_no = $_POST['flight_no'];
  $flight_date = $_POST['flight_date'];
  $igm_no = $_POST['igm_no'];
  $igm_date = $_POST['igm_date'];
  $air_d_o_no = $_POST['air_d_o_no'];
  $d_o_date = $_POST['d_o_date'];
  $b_e_no = $_POST['b_e_no'];
  $b_e_date = $_POST['b_e_date'];
  $index_no = $_POST['index_no'];
  $sub_index_no = $_POST['sub_index_no'];
  $e_t_d = $_POST['e_t_d'];
  $e_t_a = $_POST['e_t_a'];
  $l_c = $_POST['l_c'];
  $origin_d_o_no = $_POST['origin_d_o_no'];
  $passport_id = $_POST['passport_id'];
  $foreign_detail = $_POST['foreign_detail'];
  $notify_detail = $_POST['notify_detail'];
  $consignee_detail = $_POST['consignee_detail'];
  $remarks = $_POST['remarks'];
  $nomination = $_POST['nomination'];
  $remark = $_POST['remark'];
  $fight_term = $_POST['fight_term'];
  $invoice_f_agent = $_POST['invoice_f_agent'];
  $local_inv = $_POST['local_inv'];
  $inv_from_f_agent = $_POST['inv_from_f_agent'];
  $status = $_POST['status'];
 
  $checkCurr = $_POST['checkCurr'];
  $exchangeRate_P = $_POST['exchangeRate_P'];
  $sellRate_P = $_POST['sellRate_P'];
  $sellAmount_P = $_POST['sellAmount_P'];
  $sellAmountPKR_P = $_POST['sellAmountPKR_P'];
  $buyRate_P = $_POST['buyRate_P'];
  $buyAmount_P = $_POST['buyAmount_P'];
  $buyAmountPKR_P = $_POST['buyAmountPKR_P'];
  $diffAmount_P = $_POST['diffAmount_P'];
  $diffAmountPKR_P = $_POST['diffAmountPKR_P'];
  $profitRate_P = $_POST['profitRate_P'];
  $profitAmount_P = $_POST['profitAmount_P'];
  $profitAmountPKR_P = $_POST['profitAmountPKR_P'];
  $buyRate_F = $_POST['buyRate_F'];
  $buyAmount_F = $_POST['buyAmount_F'];
  $buyAmountPKR_F = $_POST['buyAmountPKR_F'];
  $sellRate_F = $_POST['sellRate_F'];
  $sellAmount_F = $_POST['sellAmount_F'];
  $sellAmountPKR_F = $_POST['sellAmountPKR_F'];
  $diffAmount_F = $_POST['diffAmount_F'];
  $diffAmountPKR_F = $_POST['diffAmountPKR_F'];
  $profitRate_F = $_POST['profitRate_F'];
  $profitAmount_F = $_POST['profitAmount_F'];
  $profitAmountPKR_F = $_POST['profitAmountPKR_F'];
  $payableAmount = $_POST['payableAmount'];
  $payableAmountPKR = $_POST['payableAmountPKR'];

  if (isset($_POST['status_type'])) {
    $status_type='Active';

  }
  else
  {
    $status_type='Deactive';
  }


  $InsertQuery = mysqli_query($con, " INSERT INTO air_import_entry (so_no,job_no,job_date,m_awb,m_date,m_pp_cc,m_pieces,m_grs_weight,m_ch_weight,m_rate,h_awb,h_date,h_pp_cc,h_pieces,h_grs_weight,h_ch_weight,h_rate,description,party,agent_party,foreign_party,spo,origin,destination,flight_no,flight_date,igm_no,igm_date,air_d_o_no,d_o_date,b_e_no,b_e_date,index_no,sub_index_no,e_t_d,e_t_a,l_c,origin_d_o_no,passport_id,foreign_detail,notify_detail,consignee_detail,remarks,nomination,status,remark,fight_term,invoice_f_agent,local_inv,inv_from_f_agent,status_type,checkCurr,exchangeRate_P,sellRate_P,sellAmount_P,sellAmountPKR_P,buyRate_P,buyAmount_P,buyAmountPKR_P,diffAmount_P,diffAmountPKR_P,profitRate_P,profitAmount_P,profitAmountPKR_P,buyRate_F,buyAmount_F,buyAmountPKR_F,sellRate_F,sellAmount_F,sellAmountPKR_F,diffAmount_F,diffAmountPKR_F,profitRate_F,profitAmount_F,profitAmountPKR_F,payableAmount,payableAmountPKR) VALUES ('$so_no','$job_no','$job_date','$m_awb','$m_date','$m_pp_cc','$m_pieces','$m_grs_weight','$m_ch_weight','$m_rate','$h_awb','$h_date','$h_pp_cc','$h_pieces','$h_grs_weight','$h_ch_weight','$h_rate','$description','$party','$agent_party','$foreign_party','$spo','$origin','$destination','$flight_no','$flight_date','$igm_no','$igm_date','$air_d_o_no','$d_o_date','$b_e_no','$b_e_date','$index_no','$sub_index_no','$e_t_d','$e_t_a','$l_c','$origin_d_o_no','$passport_id','$foreign_detail','$notify_detail','$consignee_detail','$remarks','$nomination','$status','$remark','$fight_term','$invoice_f_agent','$local_inv','$inv_from_f_agent','$status_type','$checkCurr','$exchangeRate_P','$sellRate_P','$sellAmount_P','$sellAmountPKR_P','$buyRate_P','$buyAmount_P','$buyAmountPKR_P','$diffAmount_P','$diffAmountPKR_P','$profitRate_P','$profitAmount_P','$profitAmountPKR_P','$buyRate_F','$buyAmount_F','$buyAmountPKR_F','$sellRate_F','$sellAmount_F','$sellAmountPKR_F','$diffAmount_F','$diffAmountPKR_F','$profitRate_F','$profitAmount_F','$profitAmountPKR_F','$payableAmount','$payableAmountPKR') ") or die(mysqli_error($con));

  header("location: add_job_air_import2.php?m_awb=" . $m_awb);
   

}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Air Import (Job Entry) </title>
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
#aimport_form_table_wrapper .dataTables_filter {
    display: none;
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

          <a href="Usermodules.php" class="btn btn-info active">Air Import (Job Entry)</a>

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
           
           <?php include 'sidebar_widgets/dai_advanced_search_widget.php'; ?>
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

      <!-- Modal_one-->
       <div class="modal fade confirmTable-modal" id="save_Modal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are You Sure You Want to Save?</p>
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
                          <button type="submit" name="submitBtn1"> Add More House</button>
                          <button type="submit" name="submitBtn">Yes Only This</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal">No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                         
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
                              

                <div class="col-md-6">

                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                   <?php echo '<input type="text" name="job_no" id="job_no" disabled value="'.$job_no.'">'; ?>
                  </div>

                  


                </div>

                <div class="col-md-6">

                  

                  <div class="input-label"><label>Date</label></div>
                  <div class="input-feild">
                        <input class="mini_input_field" type="date" name="job_date" value="<?php echo $job_date2 ?>">
                  </div>


                </div>
                <div class="col-md-12">
                  
               

                <table  id="aimport_form_table" class="display nowrap no-footer" style="width:100%">
                                                                  
                                                                 <thead>
                                                                            <tr>
                                                                              <th></th>
                                                                              <th>AWB No.</th>
                                                                              <th>Date</th>
                                                                              <th>PP/CC</th>
                                                                              <th>Pieces</th>
                                                                              <th>Grs. Weight</th>
                                                                              <th>Ch.Weight</th>
                                                                              <th>Rate</th>
                                                                            </tr>
                                                                  </thead>
                                                                  <tbody>   
                                                                             <tr>
                                                                              <th>MawB No.</th>
                                                                              <td> <input type="text" name="m_awb" value="<?php echo $m_awb2; ?>"></td>
                                                                              <td> <input type="date" name="m_date" value="<?php echo $m_date2 ?>"></td>
                                                                              <td> <select name="m_pp_cc">
                                                                                <option value="<?php echo $m_pp_cc2; ?>"><?php echo $m_pp_cc2; ?></option>
                                                                                <option value="<?php echo $m_pp_cc2; ?>"><?php echo $m_pp_cc2; ?></option>
                                                                              </select></td>
                                                                              <td> <input type="text" name="m_pieces" value="<?php echo $m_pieces2; ?>"></td>
                                                                              <td> <input type="text" name="m_grs_weight" value="<?php echo $m_grs_weight2; ?>"></td>
                                                                              <td> <input type="text" name="m_ch_weight" value="<?php echo $m_ch_weight2; ?>"></td>
                                                                              <td> <input type="text" name="m_rate" value="<?php echo $m_rate2; ?>"></td>
                                                                              <!-- <td rowspan="2"><textarea name="description"></textarea></td> -->                      
                                                                             </tr>

                                                                            <tr>
                                                                              <th>Hawb No.</th>
                                                                              <td> <input type="text" name="h_awb"></td>
                                                                              <td> <input type="date" name="h_date"></td>
                                                                                <td> <select name="h_pp_cc">
                                                                                <option value="pp">pp</option>
                                                                                <option value="cc">cc</option>
                                                                              </select></td>
                                                                              <td> <input type="text" name="h_pieces"></td>
                                                                              <td> <input type="text" name="h_grs_weight"></td>
                                                                              <td> <input type="text" name="h_ch_weight"></td>
                                                                              <td> <input type="text" name="h_rate"></td> 
                                                                              <td rowspan="0"></td>                     
                                                                             </tr> 

                                                                            
                                                                  </tbody>
                </table> 
               
        </div>

              <div class="cls"></div>
              <hr>				
                  <div class="col-md-6">
                   
                    <div class="input-label"><label>Goods Description</label></div>
                    <div class="input-feild">
                    <textarea name="description"></textarea>
                    </div>

                    <div class="input-label"><label>Status</label></div>
                    <div class="input-feild">
                    <input type="checkbox" name="status_type" id="status_type">
                    </div>

                  </div>
        </div>
        <div class="cls"></div>
        <hr>      

        <div class="widget_iner_box">         
               <div class="col-md-4">

                      <div class="input-label"><label>Party Code</label></div>
                      <div class="input-feild">
                       <select name="party" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>

                      </div>

                      <div class="input-label"><label>Agent Party</label></div>
                      <div class="input-feild">
                        <select name="agent_party" required>
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
                        <select name="foreign_party" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

               </div> 
                 
                 <div class="col-md-4">

                      <div class="input-label"><label>SPO Code</label></div>
                      <div class="input-feild">
                        <select name="spo" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSpo = mysqli_query($con, "select * from  spo_setup");

                            while ($rowSpo = mysqli_fetch_array($selectSpo))
                            {
                              echo '<option value="'.$rowSpo['spo_name'].'">'.$rowSpo['spo_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Origin</label></div>
                      <div class="input-feild">
                       <select name="origin" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['dest_name'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>


                      <div class="input-label"><label>Destination</label></div>
                      <div class="input-feild">
                        <select name="destination" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectdest = mysqli_query($con, "select * from destination_setup");

                            while ($rowdest = mysqli_fetch_array($selectdest))
                            {
                              echo '<option value="'.$rowdest['dest_name'].'">'.$rowdest['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>


                      
                  </div> 

                  <div class="col-md-4">
                    <div class="input-label"><label>Flight No.</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="flight_no">
                        
                      </div>
                     
                     <div class="input-label"><label>Flight Date</label></div>
                      <div class="input-feild">
                        <input class="" type="date" name="flight_date">
                      </div>

                  </div>
                  <div class="cls"></div>
                  <hr>

               <div class="col-md-4">
                 
                  <div class="input-label"><label>IGM No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="igm_no">

                      </div>

                      <div class="input-label"><label>Air D.O.P No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="air_d_o_no">
                        
                      </div>

                      <div class="input-label"><label>B/E No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="b_e_no">
                        
                      </div>

                      <div class="input-label"><label>Index No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="index_no">
                        
                      </div>


                      <div class="input-label"><label>E.T.D</label></div>
                      <div class="input-feild">
                        <input  type="date" name="e_t_d">                        
                      </div>

                      <div class="input-label"><label>L/C</label></div>
                      <div class="input-feild">
                        <input  type="text" name="l_c">                        
                      </div>

                      <div class="input-label"><label>Passport/ I.D</label></div>
                      <div class="input-feild">
                        <input  type="text" name="passport_id">                        
                      </div>
                    </div>
                      <div class="col-md-4">
                         <div class="input-label"><label>IGM Date</label></div>
            <div class="input-feild"><input type="date" name="igm_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


            <div class="input-label"><label>D.O Date</label></div>
            <div class="input-feild"><input type="date" name="d_o_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


            <div class="input-label"><label>B/E Date</label></div>
            <div class="input-feild"><input type="date" name="b_e_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>
          

            <div class="input-label"><label>Sub Index</label></div>
            <div class="input-feild"><input type="date" name="sub_index_no" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

            <div class="input-label"><label>E.T.A</label></div>
            <div class="input-feild"><input type="date" name="e_t_a" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

            <div class="input-label"><label>Origin D.O No.</label></div>
            <div class="input-feild"><input type="text" name="origin_d_o_no"></div>
           
                      </div>

                   
        </div>
         <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
          <div class="col-md-6">
            <div class="input-label"><label>Foreign Agent's Shipper </label></div>
            <div class="input-feild">
               <textarea name="foreign_detail"></textarea>
            </div>



            <div class="input-label"><label>Notify </label></div>
            <div class="input-feild">
              <textarea name="notify_detail"></textarea>
            </div>

          </div>


           <div class="col-md-6">

            <div class="input-label"><label>Consignee </label></div>
            <div class="input-feild">
              <textarea name="consignee_detail"></textarea>
            </div>

             
            <div class="input-label"><label>Remarks</label></div>
            <div class="input-feild">
              <textarea name="remarks"></textarea>
            </div>

            <div class="input-label"><label>Nomination</label></div>
            <div class="input-feild">
              <select class="mini_select_field" name="nomination">
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>

          </div>
        </div> 
      <div class="cls"></div>
      <hr>  

      <div class="widget_iner_box">
        <div class="col-md-5">
            <div class="widget_child_title"><h4>Invoice Required</h4></div>
            <div class="cls"></div>
            <hr>


            <div class="input-label"><label>Invoice to F/Agent</label></div>
            <div class="input-feild">
              <select class="mini_select_field" name="invoice_f_agent">
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>


            <div class="input-label"><label>Local Invoice</label></div>
            <div class="input-feild">
              <select class="mini_select_field" name="local_inv">
                <option>Yes</option>
                <option>No</option>

              </select>
            </div>

            <div class="input-label"><label>Inv. From F/Agent</label></div>
            <div class="input-feild">
              <select class="mini_select_field" name="inv_from_f_agent">
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>

        </div>
        <div class="col-md-4">

          <div class="widget_child_title"><h4>Shipment Status</h4></div>
            <div class="cls"></div>
            <hr>
         
            <div class="input-label"><label>Status</label></div>
          <div class="input-feild">
            <select class="mini_select_field" name="status">
            <option value="In process">In Process</option>
            <option value="Released">Released</option>
            <option value="Not Released">Not Released</option>
            <option value="Expected">Expected</option>
            </select>
          </div>

          <div class="input-label"><label>Freight trem</label></div>
          <div class="input-feild">
            <input class="mini_input_field" type="text" name="fight_term">
          </div>

            
           <div class="input-label"><label>Remarks</label></div>
          <div class="input-feild" >
            <textarea name="remark"></textarea>
          </div>

        </div>

        <div class="col-md-3">
            
            
            <div class="widget_child_title"><h4>House Airway Bill</h4></div>
            

            <table id="hawbtable" class="display nowrap no-footer" style="width:100%">
              <thead>
                <tr>
                  <th>Job No.</th>
                  <th>House No.</th>


                </tr>
              </thead>
              <tbody>
                
                 <?php
                    $selectQurey2= mysqli_query($con, " SELECT * FROM  air_import_entry WHERE m_awb= '$m_awb2' ");
                    while ($row2=mysqli_fetch_array($selectQurey2)) {
                       $job_no2 = $row2['job_no'];
                       $h_awb2 = $row2['h_awb'];
                    

                  ?>
                
                 <tr>
                  <td><?php echo $row2['job_no']; ?></td>
                  <td><?php echo $row2['h_awb']; ?></td>
                </tr>
                <?php
                  }
                ?>
                
              </tbody>
            </table>
        </div>

      </div>

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
            <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#local_invoices">Local Invoices</a></li>
                  <li><a data-toggle="tab" href="#party_agent_details">Party & Foreign Agent Details</a></li>
                </ul>
            </div>


           <div class="tab-content">

              <div id="local_invoices" class="tab-pane fade in active">
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

              <div id="party_agent_details" class="tab-pane fade">
                <div class="col-md-6">

                  <div class="input-label"><label>Currency</label></div>
                  <div class="input-feild">
                    <select class="mini_select_field" name="checkCurr" id="checkCurr">
                      <option value="">Select</option>
                      <?php

                      $selectCurCheck = mysqli_query($con, "SELECT * FROM currency_setup");
                      while ($rowCurCheck = mysqli_fetch_array($selectCurCheck))
                      {
                        echo '<option value="'.$rowCurCheck['SrNo'].'">'.$rowCurCheck['cur_code'].'</option>';
                      }

                      ?>
                    </select>
                  </div>

                  <div class="input-label"><label>Exchange Rate</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="text" name="exchangeRate_P" id="exchangeRate_P" onfocusout="exRate_P();">
                  </div>

                  <table  id="prtytable" class="display nowrap no-footer" style="width:100%">
                       <thead>
                          <tr>
                            <th>..</th>  
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Amount (PKR)</th>
                          </tr>
                       </thead>
                        <tbody>           
                          <tr>
                            <td>Selling</td>
                            <td><input type="text" name="sellRate_P" id="sellRate_P"></td>
                            <td><input type="text" name="sellAmount_P" id="sellAmount_P"></td>
                            <td><input type="text" name="sellAmountPKR_P" id="sellAmountPKR_P"></td>
                          </tr>

                          <tr>
                            <td>Buying</td>
                            <td><input type="text" name="buyRate_P" id="buyRate_P"></td>
                            <td><input type="text" name="buyAmount_P" id="buyAmount_P"></td>
                            <td><input type="text" name="buyAmountPKR_P" id="buyAmountPKR_P"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text" name="diffAmount_P" id="diffAmount_P"></td>
                            <td><input type="text" name="diffAmountPKR_P" id="diffAmountPKR_P"></td>
                          </tr>

                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text" name="profitRate_P" id="profitRate_P" onfocusout="calcProfit_P();" >%</td>
                            <td><input type="text" name="profitAmount_P" id="profitAmount_P"></td>
                            <td><input type="text" name="profitAmountPKR_P" id="profitAmountPKR_P"></td>
                          </tr>
                        </tbody>
                  </table> 
                </div>

                <div class="col-md-6">
                  <!-- <div class="input-label"><label>Exchange Rate</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="text" name="exchangeRate_F" id="exchangeRate_F">
                  </div> -->
                  <table  id="foreigntbale" class="display nowrap no-footer" style="width:100%">
                       <thead>
                          <tr>
                            <th>..</th>  
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Amount (PKR)</th>
                          </tr>
                       </thead>

                        <tbody>           
                          <tr>
                            <td>Buying</td>
                            <td><input type="text" name="buyRate_F" id="buyRate_F" onfocusout="calcDetails_Buy_F();"></td>
                            <td><input type="text" name="buyAmount_F" id="buyAmount_F"></td>
                            <td><input type="text" name="buyAmountPKR_F" id="buyAmountPKR_F"></td>
                          </tr>

                          <tr>
                            <td>Selling</td>
                            <td><input type="text" name="sellRate_F" id="sellRate_F" onfocusout="calcDetails_Sell_F();"></td>
                            <td><input type="text" name="sellAmount_F" id="sellAmount_F"></td>
                            <td><input type="text" name="sellAmountPKR_F" id="sellAmountPKR_F"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text" name="diffAmount_F" id="diffAmount_F"></td>
                            <td><input type="text" name="diffAmountPKR_F" id="diffAmountPKR_F"></td>
                          </tr>
                          
                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text" name="profitRate_F" id="profitRate_F"></td>
                            <td><input type="text" name="profitAmount_F" id="profitAmount_F"></td>
                            <td><input type="text" name="profitAmountPKR_F" id="profitAmountPKR_F"></td>
                          </tr>
                        </tbody>
                  </table>

                  <br>

                  <div class="input-label"><label>Payable</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="text" name="payableAmount" id="payableAmount">
                    <input class="mini_input_field" type="text" name="payableAmountPKR" id="payableAmountPKR">
                  </div>

                </div>

              </div>

           </div> 

        </div>      

				                          

					
		</form>
				
        

	</div>

  
</div>
<script>
  $(document).ready(function() {
     $('#aimport_form_table').DataTable( {
        "scrollX": true,
        "paging":false,
        "info":false,
        "ordering":false

    } );

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": true,
        "paging":false,
        "info":false,

    } );

     $('#local_inv_table').DataTable( {
        "paging":false,
        "info":false,

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
function saveFunc()
{
  $("#save_Modal").modal();
}
</script>
<script type="text/javascript">
function submitFunc()
{
  $("#submit_Modal").modal();
}
</script>

<script>
function nomChange()
{
  var nomination = document.getElementById("nomination").value;
  if (nomination == "Y")
  {
    document.getElementById('spo').style.visibility='hidden';
    document.getElementById('spoLable').style.visibility='hidden';
    // alert("Working");
  }
  else if (nomination == "N")
  {
    document.getElementById('spo').style.visibility='visible';
    document.getElementById('spoLable').style.visibility='visible';
    // alert("Working");
  }
}
</script>

<script type="text/javascript">
  function calcDetails_Buy_P()
  {
    var buyAmount_P;
    var MAWB_rate = document.getElementById("m_rate").value;
    var MAWB_ch_weight = document.getElementById("m_ch_weight").value;
    // alert("Working" + " " + MAWB_rate);
    buyAmount_P = MAWB_rate * MAWB_ch_weight;
    document.getElementById("buyRate_P").value = MAWB_rate;
    document.getElementById("buyAmount_P").value = buyAmount_P;
    
  }

  function calcDetails_Sell_P()
  {
    var sellAmount_P;
    var HAWB_rate = document.getElementById("h_rate").value;
    var HAWB_ch_weight = document.getElementById("h_ch_weight").value;
    // alert("Working" + " " + MAWB_rate);
    sellAmount_P = HAWB_rate * HAWB_ch_weight;
    document.getElementById("sellRate_P").value = HAWB_rate;
    document.getElementById("sellAmount_P").value = sellAmount_P;
  }

  function exRate_P()
  {
    var checkCurr = document.getElementById("checkCurr").value;
    if (checkCurr == "")
    {
      alert("Please select the currency first.");
      document.getElementById("exchangeRate_P").value = "";
    }

    else
    {
      var buyAmountPKR_P;
      var sellAmountPKR_P;
      var diffAmount_P;
      var diffAmountPKR_P;
      var exchangeRate_P = document.getElementById("exchangeRate_P").value;
      
      // For calculating the buying exchange rate
      var buyAmount_P = document.getElementById("buyAmount_P").value;
      buyAmountPKR_P = exchangeRate_P * buyAmount_P;
      document.getElementById("buyAmountPKR_P").value = buyAmountPKR_P;

      // For calculating the selling exchange rate
      var sellAmount_P = document.getElementById("sellAmount_P").value;
      sellAmountPKR_P = exchangeRate_P * sellAmount_P;
      document.getElementById("sellAmountPKR_P").value = sellAmountPKR_P;

      // For calculating the difference of amount (selling - buying)
      diffAmount_P = sellAmount_P - buyAmount_P;
      document.getElementById("diffAmount_P").value = diffAmount_P;

      // For calculating the difference amount in PKR (difference * exchange rate)
      diffAmountPKR_P = diffAmount_P * exchangeRate_P;
      document.getElementById("diffAmountPKR_P").value = diffAmountPKR_P;
    }
  }

  function calcProfit_P()
  {
    var profitAmount_P;
    var profitAmountPKR_P;
    var profitRate_P = document.getElementById("profitRate_P").value;

    // For calculating the profit amount (difference * profit rate / 100)
    var diffAmount_P = document.getElementById("diffAmount_P").value;
    profitAmount_P = (diffAmount_P * profitRate_P) / 100;
    document.getElementById("profitAmount_P").value = profitAmount_P;

    // For calculating the profit amount in PKR (profit amount * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    profitAmountPKR_P = profitAmount_P * exchangeRate_P;
    document.getElementById("profitAmountPKR_P").value = profitAmountPKR_P;
  }

  function calcDetails_Buy_F()
  {
    var buyAmount_F;
    var buyAmountPKR_F;

    // Calculating the amount in USD (foreign rate * charge weight)
    var buyRate_F = document.getElementById("buyRate_F").value;
    var MAWB_ch_weight = document.getElementById("m_ch_weight").value;
    buyAmount_F = buyRate_F * MAWB_ch_weight;
    document.getElementById("buyAmount_F").value = buyAmount_F;

    // Calculating the amount in PKR (amount in USD * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    buyAmountPKR_F = buyAmount_F * exchangeRate_P;
    document.getElementById("buyAmountPKR_F").value = buyAmountPKR_F;
    
  }

  function calcDetails_Sell_F()
  {
    var sellAmount_F;
    var sellAmountPKR_F;
    var diffAmount_F;
    var diffAmountPKR_F;

    // Calculating the amount in USD (foreign rate * charge weight)
    var sellRate_F = document.getElementById("sellRate_F").value;
    var HAWB_ch_weight = document.getElementById("h_ch_weight").value;
    sellAmount_F = sellRate_F * HAWB_ch_weight;
    document.getElementById("sellAmount_F").value = sellAmount_F;

    // Calculating the amount in PKR (amount in USD * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    sellAmountPKR_F = sellAmount_F * exchangeRate_P;
    document.getElementById("sellAmountPKR_F").value = sellAmountPKR_F;

    // For calculating the difference of amount (selling - buying)
    var buyAmount_F = document.getElementById("buyAmount_F").value;
    diffAmount_F = sellAmount_F - buyAmount_F;
    document.getElementById("diffAmount_F").value = diffAmount_F;

    // For calculating the difference amount in PKR (difference * exchange rate)
    var buyAmountPKR_F = document.getElementById("buyAmountPKR_F").value;
    diffAmountPKR_F = sellAmountPKR_F - buyAmountPKR_F;
    document.getElementById("diffAmountPKR_F").value = diffAmountPKR_F;

    // Calculating the profit
    var profitAmount_F;
    var profitAmountPKR_F;
    var profitRate_P = document.getElementById("profitRate_P").value;

    // Displaying profit % in foreign table
    document.getElementById("profitRate_F").value = profitRate_P;

    // For calculating the profit amount (difference * profit rate / 100)
    var diffAmount_F = document.getElementById("diffAmount_F").value;
    profitAmount_F = (diffAmount_F * profitRate_P) / 100;
    document.getElementById("profitAmount_F").value = profitAmount_F;

    // For calculating the profit amount in PKR (profit amount * exchange rate)
    var exchangeRate_P = document.getElementById("exchangeRate_P").value;
    profitAmountPKR_F = profitAmount_F * exchangeRate_P;
    document.getElementById("profitAmountPKR_F").value = profitAmountPKR_F;

    // For calculating the payable in USD (buying USD amount + profit USD amount)
    var buyAmount_F = document.getElementById("buyAmount_F").value;
    var profitAmount_F2 = document.getElementById("profitAmount_F").value;
    var payableAmount;
    payableAmount =  +buyAmount_F + +profitAmount_F2;
    document.getElementById("payableAmount").value = payableAmount;

    // For calculating the payable in PKR (buying PKR amount + profit PKR amount)
    var buyAmountPKR_F = document.getElementById("buyAmountPKR_F").value;
    var profitAmountPKR_F2 = document.getElementById("profitAmountPKR_F").value;
    var payableAmountPKR;
    payableAmountPKR = +profitAmountPKR_F2 + +buyAmountPKR_F;
    document.getElementById("payableAmountPKR").value = payableAmountPKR;


  }

</script>

<script type="text/javascript">

  // For Due Carrier
  function checkCurrency()
  {
    var totalCarrier = document.getElementById("totalCarrier").value;
    var totalCAA = document.getElementById("totalCAA").value;
    var totalAWC = document.getElementById("totalAWC").value;
    var secCharges = document.getElementById("secCharges").value;
    var secDD = document.getElementById("secDD").value;
    var totalSec = document.getElementById("totalSec").value;
    var fuelCharges = document.getElementById("fuelCharges").value;
    var fuelDD = document.getElementById("fuelDD").value;
    var totalFuel = document.getElementById("totalFuel").value;
    var scanCharges = document.getElementById("scanCharges").value;
    var scanDD = document.getElementById("scanDD").value;
    var totalScan = document.getElementById("totalScan").value;

    var mawb_No = document.getElementById("mawb_no").value;

    // rcp = document.getElementById("rcp").value;
    // commision = document.getElementById("commision").value;
    
    $.ajax({
     url:"addDueCarrier.php",
     method:"POST",
     data:{mawb_No:mawb_No, totalCarrier:totalCarrier, totalCAA:totalCAA, totalAWC:totalAWC, secCharges:secCharges, secDD:secDD, totalSec:totalSec, fuelCharges:fuelCharges, fuelDD:fuelDD, totalFuel:totalFuel, scanCharges:scanCharges, scanDD:scanDD, totalScan:totalScan},
     success:function(data){
      // alert('Working.');
      
      // fetch_item_data();
     }
    });

  }
  
</script>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
