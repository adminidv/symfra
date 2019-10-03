<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';


// Today date func
$todayDate = date("Y-m-d");

// auto increment
$selectLastID = mysqli_query($con, "SELECT * FROM sea_job_entry ORDER BY job_no DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['job_no'];
$newID = $lastID + 1;
$job_no = $newID;

// Add Air Import Submit Btn Event
if (isset($_POST['submitBtn'])) {

  $job_no = $_POST['job_no'];
  $job_date = $_POST['job_date'];
  $mbl_no = $_POST['mbl_no'];
  $mbl_date = $_POST['mbl_date'];
  $mbl_pp_cc = $_POST['mbl_pp_cc'];
  $mbl_pieces = $_POST['mbl_pieces'];
  $mbl_cbm = $_POST['mbl_cbm'];
  $mbl_grs_weight = $_POST['mbl_grs_weight'];
  $mbl_ch_weight = $_POST['mbl_ch_weight'];
  $mbl_rate = $_POST['mbl_rate'];
  $hbl_no = $_POST['hbl_no'];
  $hbl_date = $_POST['hbl_date'];
  $hbl_pp_cc = $_POST['hbl_pp_cc'];
  $hbl_pieces = $_POST['hbl_pieces'];
  $hbl_cbm = $_POST['hbl_cbm'];
  $hbl_grs_weight = $_POST['hbl_grs_weight'];
  $hbl_ch_weight = $_POST['hbl_ch_weight'];
  $hbl_rate = $_POST['hbl_rate'];
  $description = $_POST['description'];
  $party = $_POST['party'];
  $agent_party = $_POST['agent_party'];
  $foreign_agent = $_POST['foreign_agent'];
  $spo = $_POST['spo'];
  $origin = $_POST['origin'];
  $shipping_line = $_POST['shipping_line'];
  $destination = $_POST['destination'];
  $vessel = $_POST['vessel'];
  $voyage = $_POST['voyage'];
  $e_t_d = $_POST['e_t_d'];
  $e_t_a = $_POST['e_t_a'];
  $b_e_no = $_POST['b_e_no'];
  $b_n_d = $_POST['b_n_d'];
   $s_e_no = $_POST['s_e_no'];
  $s_n_date = $_POST['s_n_date'];
  $index_no = $_POST['index_no'];
  $sub_index_no = $_POST['sub_index_no'];
  $igm_no = $_POST['igm_no'];
  $igm_date = $_POST['igm_date'];
  $lcl_fcl = $_POST['lcl_fcl'];
  $arrived_date = $_POST['arrived_date'];
  $forign_agent_shipper = $_POST['forign_agent_shipper'];
  $consignee = $_POST['consignee'];
  $remarks = $_POST['remarks'];
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $fight_term = $_POST['fight_term'];
  $inv_f_agent = $_POST['inv_f_agent'];
  $local_inv = $_POST['local_inv'];
  $inv_from_f_agent = $_POST['inv_from_f_agent'];
  $con_no1 = $_POST['con_no1'];
  $sel_val1 = $_POST['sel_val1'];
  $seal_no1 = $_POST['seal_no1'];
  $con_no2 = $_POST['con_no2'];
  $sel_val2 = $_POST['sel_val2'];
  $seal_no2 = $_POST['seal_no2'];
  $con_no3 = $_POST['con_no3'];
  $sel_val3 = $_POST['sel_val3'];
  $seal_no3 = $_POST['seal_no3'];
  $con_no4 = $_POST['con_no4'];
  $sel_val4 = $_POST['sel_val4'];
  $seal_no4 = $_POST['seal_no4'];
  $sel_1 = $_POST['sel_1'];
  $sel_2 = $_POST['sel_2'];
  $sel_3 = $_POST['sel_3'];
  $sel_4 = $_POST['sel_4'];

  $InsertQuery = mysqli_query($con, " INSERT INTO sea_job_entry (job_no,job_date,mbl_no,mbl_date,mbl_pp_cc,mbl_pieces,mbl_cbm,mbl_grs_weight,mbl_ch_weight,mbl_rate,hbl_no,hbl_date,hbl_pp_cc,hbl_pieces,hbl_cbm,hbl_grs_weight,hbl_ch_weight,hbl_rate,description,party,agent_party,foreign_agent,spo,shipping_line,origin,destination,vessel,voyage,e_t_d,e_t_a,b_e_no,b_n_d,s_e_no,s_e_date,index_no,sub_index_no,igm_no,igm_date,lcl_fcl,arrived_date,forign_agent_shipper,consignee,remarks,status,remark,fright_term,inv_f_agent,local_inv,inv_from_f_agent) VALUES ('$newID','$job_date','$mbl_no','$mbl_date','$mbl_pp_cc','$mbl_pieces','$mbl_cbm','$mbl_grs_weight','$mbl_ch_weight','$mbl_rate','$hbl_no','$hbl_date','$hbl_pp_cc','$hbl_pieces','$hbl_cbm','$hbl_grs_weight','$hbl_ch_weight','$hbl_rate','$description','$party','$agent_party','$foreign_agent','$spo','$shipping_line','$origin','$destination','$vessel','$voyage','$e_t_d','$e_t_a','$b_e_no','$b_n_d','$s_e_no','$s_e_date','$index_no','$sub_index_no','$igm_no','$igm_date','$lcl_fcl','$arrived_date','$forign_agent_shipper','$consignee','$remarks','$status','$remark','$fight_term','$inv_f_agent','$local_inv','$inv_from_f_agent') ") or die(mysqli_error($con));

  $InsertQuery2 = mysqli_query($con, " Insert into container (job_no,con_no1,sel_val1,seal_no1,con_no2,sel_val2,seal_no2,con_no3,sel_val3,seal_no3,con_no4,sel_val4,seal_no4,sel_1,sel_2,sel_3,sel_4) value ('$newID','$con_no1','$sel_val1','$seal_no1','$con_no2','$sel_val2','$seal_no2','$con_no3','$sel_val3','$seal_no3','$con_no4','$sel_val4','$seal_no4','$sel_1','$sel_2','$sel_3','$sel_4')") or die(mysql_error($con));

  header("location: add_job_sea_import.php");



}

// Addmore house bill
if (isset($_POST['submitBtn1'])) {

  $job_no = $_POST['job_no'];
  $job_date = $_POST['job_date'];
  $mbl_no = $_POST['mbl_no'];
  $mbl_date = $_POST['mbl_date'];
  $mbl_pp_cc = $_POST['mbl_pp_cc'];
  $mbl_pieces = $_POST['mbl_pieces'];
  $mbl_cbm = $_POST['mbl_cbm'];
  $mbl_grs_weight = $_POST['mbl_grs_weight'];
  $mbl_ch_weight = $_POST['mbl_ch_weight'];
  $mbl_rate = $_POST['mbl_rate'];
  $hbl_no = $_POST['hbl_no'];
  $hbl_date = $_POST['hbl_date'];
  $hbl_pp_cc = $_POST['hbl_pp_cc'];
  $hbl_pieces = $_POST['hbl_pieces'];
  $hbl_cbm = $_POST['hbl_cbm'];
  $hbl_grs_weight = $_POST['hbl_grs_weight'];
  $hbl_ch_weight = $_POST['hbl_ch_weight'];
  $hbl_rate = $_POST['hbl_rate'];
  $description = $_POST['description'];
  $party = $_POST['party'];
  $agent_party = $_POST['agent_party'];
  $foreign_agent = $_POST['foreign_agent'];
  $spo = $_POST['spo'];
  $origin = $_POST['origin'];
  $shipping_line = $_POST['shipping_line'];
  $destination = $_POST['destination'];
  $vessel = $_POST['vessel'];
  $voyage = $_POST['voyage'];
  $e_t_d = $_POST['e_t_d'];
  $e_t_a = $_POST['e_t_a'];
  $b_e_no = $_POST['b_e_no'];
  $b_n_d = $_POST['b_n_d'];
   $s_e_no = $_POST['s_e_no'];
  $s_n_date = $_POST['s_n_date'];
  $index_no = $_POST['index_no'];
  $sub_index_no = $_POST['sub_index_no'];
  $igm_no = $_POST['igm_no'];
  $igm_date = $_POST['igm_date'];
  $lcl_fcl = $_POST['lcl_fcl'];
  $arrived_date = $_POST['arrived_date'];
  $forign_agent_shipper = $_POST['forign_agent_shipper'];
  $consignee = $_POST['consignee'];
  $remarks = $_POST['remarks'];
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $fight_term = $_POST['fight_term'];
  $inv_f_agent = $_POST['inv_f_agent'];
  $local_inv = $_POST['local_inv'];
  $inv_from_f_agent = $_POST['inv_from_f_agent'];
  $con_no1 = $_POST['con_no1'];
  $sel_val1 = $_POST['sel_val1'];
  $seal_no1 = $_POST['seal_no1'];
  $con_no2 = $_POST['con_no2'];
  $sel_val2 = $_POST['sel_val2'];
  $seal_no2 = $_POST['seal_no2'];
  $con_no3 = $_POST['con_no3'];
  $sel_val3 = $_POST['sel_val3'];
  $seal_no3 = $_POST['seal_no3'];
  $con_no4 = $_POST['con_no4'];
  $sel_val4 = $_POST['sel_val4'];
  $seal_no4 = $_POST['seal_no4'];
  $sel_1 = $_POST['sel_1'];
  $sel_2 = $_POST['sel_2'];
  $sel_3 = $_POST['sel_3'];
  $sel_4 = $_POST['sel_4'];


  $InsertQuery = mysqli_query($con, " INSERT INTO sea_job_entry (job_no,job_date,mbl_no,mbl_date,mbl_pp_cc,mbl_pieces,mbl_cbm,mbl_grs_weight,mbl_ch_weight,mbl_rate,hbl_no,hbl_date,hbl_pp_cc,hbl_pieces,hbl_cbm,hbl_grs_weight,hbl_ch_weight,hbl_rate,description,party,agent_party,foreign_agent,spo,shipping_line,origin,destination,vessel,voyage,e_t_d,e_t_a,b_e_no,b_n_d,s_e_no,s_e_date,index_no,sub_index_no,igm_no,igm_date,lcl_fcl,arrived_date,forign_agent_shipper,consignee,remarks,status,remark,fright_term,inv_f_agent,local_inv,inv_from_f_agent) VALUES ('$newID','$job_date','$mbl_no','$mbl_date','$mbl_pp_cc','$mbl_pieces','$mbl_cbm','$mbl_grs_weight','$mbl_ch_weight','$mbl_rate','$hbl_no','$hbl_date','$hbl_pp_cc','$hbl_pieces','$hbl_cbm','$hbl_grs_weight','$hbl_ch_weight','$hbl_rate','$description','$party','$agent_party','$foreign_agent','$spo','$shipping_line','$origin','$destination','$vessel','$voyage','$e_t_d','$e_t_a','$b_e_no','$b_n_d','$s_e_no','$s_e_date','$index_no','$sub_index_no','$igm_no','$igm_date','$lcl_fcl','$arrived_date','$forign_agent_shipper','$consignee','$remarks','$status','$remark','$fight_term','$inv_f_agent','$local_inv','$inv_from_f_agent') ") or die(mysqli_error($con));


  $InsertQuery2 = mysqli_query($con, " INSERT INTO container (job_no,con_no1,sel_val1,seal_no1,con_no2,sel_val2,seal_no2,con_no3,sel_val3,seal_no3,con_no4,sel_val4,seal_no4,sel_1,sel_2,sel_3,sel_4) VALUES  ('$newID','$con_no1','$sel_val1','$seal_no1','$con_no2','$sel_val2','$seal_no2','$con_no3','$sel_val3','$seal_no3','$con_no4','$sel_val4','$seal_no4','$sel_1','$sel_2','$sel_3','$sel_4')") or die(mysql_error($con));

  header("location: add_job_sea_import2.php?mbl_no=" . $mbl_no);
   

}



 ?>

<!DOCTYPE html>
<html>
<head>
   <title>Sea Import (Job Entry) </title>
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
.dataTables_filter {
    display: none;
}

/*#hawbtable2 td input {
    width: 45px;
}*/
#aimport_form_table .mini_input_field {
    width: 85% !important;
} 
  th {
    text-align: left !important;
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

          <a href="Usermodules.php" class="btn btn-info active">Sea Import (Job Entry)</a>

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

                  <div class="input-label"><label>Sale Order</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="text" name="so_no"  >
                  </div>

                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                   <?php echo '<input type="text" name="job_no" id="job_no" disabled value="'.$job_no.'">'; ?>
                  </div>
                </div>

                <div class="col-md-6">

                  

                  <div class="input-label"><label>Date</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="date" name="job_date" value="<?php echo $todayDate?>" >
                  </div>
                </div>



                 <div class="col-md-12"> 

                   <table  id="aimport_form_table" class="display nowrap no-footer" style="width:100%">
                                                                  
                                                                 <thead>
                                                                            <tr>
                                                                              <th></th>
                                                                              <th>B/L No.</th>
                                                                              <th>Date</th>
                                                                              <th>PP/CC</th>
                                                                              <th>Pcs</th>
                                                                              <th>CBM</th>
                                                                              <th>Grs. Weight</th>
                                                                              <th>Ch.Weight</th>
                                                                              <th>Rate</th>
                                                                             
                                                                            </tr>
                                                                  </thead>
                                                                  <tbody>   
                                                                             <tr>
                                                                              <th>MBL No.</th>
                                                                              <td> <input class="mini_input_field" type="text" name="mbl_no"></td>
                                                                              <td> <input class="mini_input_field"type="date" name="mbl_date"></td>
                                                                              <td> <select class="mini_input_field" name="mbl_pp_cc">
                                                                                <option value="pp">pp</option>
                                                                                <option value="cc">cc</option>
                                                                              </select></td>
                                                                              <td> <input class="mini_input_field" type="text" name="mbl_pieces"></td>
                                                                             <td> <input class="mini_input_field" type="text" name="mbl_cbm"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="mbl_grs_weight"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="mbl_ch_weight"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="mbl_rate"></td>
                                                                              
                                                                             </tr>  
                                                                              
                                                                              

                                                                            <tr>
                                                                              <th>HBL No.</th>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_no"></td>
                                                                              <td> <input class="mini_input_field" type="date" name="hbl_date"></td>
                                                                                <td> <select class="mini_input_field" name="hbl_pp_cc">
                                                                                <option value="pp">pp</option>
                                                                                <option value="cc">cc</option>
                                                                              </select></td>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_pieces"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_cbm"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_grs_weight"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_ch_weight"></td>
                                                                              <td> <input class="mini_input_field" type="text" name="hbl_rate"></td>
                                                                             

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

                  </div>
            

                
             </div>        

        <div class="cls"></div>
        <hr>        
 
       <div class="widget_iner_box">         
               <div class="col-md-4">

                      <div class="input-label"><label>Party Code</label></div>
                      <div class="input-feild">
                        <select name="party" >
                          <option>qwerty</option>
                          
                        </select>

                      </div>

                      <div class="input-label"><label>Agent Party</label></div>
                      <div class="input-feild">
                        <select name="agent_party" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectSub = mysqli_query($con, "select * from sub_agent_parties_setup");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['partyname'].'">'.$rowSub['partyname'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Foreign Agent</label></div>
                      <div class="input-feild">
                        <select name="foreign_agent" required>
                          <option value="Select">Select </option>
                          <?php

                            $selectFor = mysqli_query($con, "select * from foreign_associate");

                            while ($rowFor = mysqli_fetch_array($selectFor))
                            {
                              echo '<option value="'.$rowFor['associatename'].'">'.$rowFor['associatename'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Shipping Line</label></div>
                      <div class="input-feild">
                        <select name="party" >
                          <option value="Select">Select </option>
                          <?php

                            $selectship = mysqli_query($con, "select * from shipping_setup");

                            while ($rowship = mysqli_fetch_array($selectship))
                            {
                              echo '<option value="'.$rowship['ship_name'].'">'.$rowship['ship_name'].'</option>';
                            }
                          ?>
                        </select>

                      </div>

               </div> 
                 
                 <div class="col-md-4">

                         <div class="input-label"><label>Nomination</label></div>
                          <div class="input-feild">
                            <select class="mini_select_field" name="nomination">
                              <option>No</option>
                              <option>Yes</option>

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

                      <div class="input-label"><label>Vessel</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="vessel">
                        
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
                     
                     <div class="input-label"><label>Voyage</label></div>
                      <div class="input-feild">
                        <input class="" type="text" name="voyage">
                      </div>

                  </div>
                  <div class="cls"></div>
                  <hr>

               <div class="col-md-4">
                 
                  <div class="input-label"><label>IGM No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="igm_no">

                      </div>

                      <div class="input-label"><label>S/E No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="s_e_no">
                        
                      </div>

                      <div class="input-label"><label>B/E No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="b_e_no">
                        
                      </div>

                      


                      <div class="input-label"><label>E.T.D</label></div>
                      <div class="input-feild">
                        <input  type="date" name="e_t_d">                        
                      </div>

                     

                      
                    </div>
                      <div class="col-md-4">
                         <div class="input-label"><label>IGM Date</label></div>
            <div class="input-feild"><input type="date" name="igm_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


            <div class="input-label"><label>S/E Date</label></div>
            <div class="input-feild"><input type="date" name="s_e_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


            <div class="input-label"><label>B/E Date</label></div>
            <div class="input-feild"><input type="date" name=" b_n_d" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>
          

            

            <div class="input-label"><label>E.T.A</label></div>
            <div class="input-feild"><input type="date" name="e_t_a" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

           
           
                      </div>

            <div class="col-md-4">

                     <div class="input-label"><label>L/F</label></div>
                      <div class="input-feild">
                        <select name="lcl_fcl" >
                          <option>Lcl</option>
                          <option>Fcl</option>
                          
                        </select>                     
                      </div>

                    <div class="input-label"><label>Index No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="index_no">
                        
                      </div>

                      <div class="input-label"><label>Sub Index</label></div>
                      <div class="input-feild"><input type="date" name="sub_index_no" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


                    <div class="input-label"><label>Arrived Date</label></div>
                     <div class="input-feild"><input type="date" name="arrived_date" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

                <div class="widget_child_title"><h4>Container Info</h4></div>
            

            
                      </div>

                   
        </div>
         <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
          <div class="col-md-6">
            <div class="input-label"><label>Foreign Agent's Shipper </label></div>
            <div class="input-feild">
               <textarea name="forign_agent_shipper"></textarea>
            </div>
          

          <div class="input-label"><label>Remarks</label></div>
            <div class="input-feild">
              <textarea name="remarks"></textarea>
            </div>
          </div>
           <div class="col-md-6">

            <div class="input-label"><label>Consignee </label></div>
            <div class="input-feild">
              <textarea name="consignee"></textarea>
            </div>

          <div class="cls"></div>
          <hr>
            

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
              <select class="mini_select_field" name="inv_f_agent">
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

                <tr>

                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            
             
        </div>

      </div>

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
            <div class="col-md-12"> 
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#containertab">Container Info</a></li>
                  <li><a data-toggle="tab" href="#local_invoices">Local Invoices</a></li>
                  <li><a data-toggle="tab" href="#party_agent_details">Party & Foreign Agent Details</a></li>
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

              <div id="party_agent_details" class="tab-pane fade">

                <div class="col-md-6">
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
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                  </tr>

                                  <tr>
                                    <td>Buying</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>

                                  <tr>
                                    <td>Difference</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>


                                  <tr>
                                    <td>Profit Share.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>


                        </tbody>
                  </table> 
                </div>

                <div class="col-md-6">
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
                                    <td>Selling</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                  </tr>

                                  <tr>
                                    <td>Buying</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>

                                  <tr>
                                    <td>Difference</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>


                                  <tr>
                                    <td>Profit Share.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>


                        </tbody>
                  </table> 
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
        "ordering":false,

    } );

     $('#aimport_form_table2').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,

    } );

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": false,
        "paging":false,
        "info":false,

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
<script type="text/javascript">
  function drop1() {
    var x10= document.getElementById('sel_val1').value;

    if (x10=='20') {
    var y = document.getElementById('sel_1').value;
     var v=1;
    var z= +y + +v;

    document.getElementById('sel_1').value=z;
    }
    else if (x10=='40') {

    var y = document.getElementById('sel_2').value;
      var v=1;
    var z= +y + +v;

    document.getElementById('sel_2').value=z;
    }
     else if (x10=='40HC') {

    var y = document.getElementById('sel_3').value;
     var v=1;
    var z= +y + +v;


    document.getElementById('sel_3').value=z;
    }
    else if (x10=='45') {

    var y = document.getElementById('sel_4').value;
     var v=1;
    var z= +y + +v;


    document.getElementById('sel_4').value=z;
    }
  }
</script>

<script type="text/javascript">
  function drop2() {
    var x1 = document.getElementById('sel_val2').value;

    if (x1=='20') {
    var y = document.getElementById('sel_1').value;
     var v=1;
    var z= +y + +v;
    document.getElementById('sel_1').value=z;
    }

    else if (x1=='40') {
    var y = document.getElementById('sel_2').value;
    var v=1;
    var z= +y + +v;
    document.getElementById('sel_2').value=z;
    }

    else if (x1=='40HC') {
    var y = document.getElementById('sel_3').value;
    var v=1;
    var z= +y + +v;
    document.getElementById('sel_3').value=z;
    }

    else if (x1=='45') {
    var y = document.getElementById('sel_4').value;
     var v=1;
    var z= +y + +v;
    document.getElementById('sel_4').value=z;
    }

  }
</script>

<script type="text/javascript">
  function drop3() {
    var x2 = document.getElementById('sel_val3').value;

    if (x2=='20') {
    var y = document.getElementById('sel_1').value;
     var v=1;
    var z= +y + +v;

    document.getElementById('sel_1').value=z;
    }
    else if (x2=='40') {

    var y = document.getElementById('sel_2').value;
      var v=1;
    var z= +y + +v;

    document.getElementById('sel_2').value=z;
    }
     else if (x2=='40HC') {

    var y = document.getElementById('sel_3').value;
     var v=1;
    var z= +y + +v;

    document.getElementById('sel_3').value=z;
    }
    else if (x2=='45') {

    var y = document.getElementById('sel_4').value;
      var v=1;
    var z= +y + +v;

    document.getElementById('sel_4').value=z;
    }
  }
</script>

<script type="text/javascript">
  function drop4() {
    var x3 = document.getElementById('sel_val4').value;

    if (x3=='20') {
    var y = document.getElementById('sel_1').value;
     var v=1;
    var z= +y + +v;

    document.getElementById('sel_1').value=z;
    }
    else if (x3=='40') {

    var y = document.getElementById('sel_2').value;
     var v=1;
    var z= +y + +v;


    document.getElementById('sel_2').value=z;
    }
     else if (x3=='40HC') {

    var y = document.getElementById('sel_3').value;
      var v=1;
    var z= +y + +v;


    document.getElementById('sel_3').value=z;
    }
    else if (x3=='45') {

    var y = document.getElementById('sel_4').value;
     var v=1;
    var z= +y + +v;


    document.getElementById('sel_4').value=z;
    }
  }
</script>

<script type="text/javascript">
   function FormValidation()
   {
      var regexp = /^[a-z]*$/i;
      var regexp2 = /^[0-9]*$/i;
      var re = /\S+@\S+\.\S+/;
      var decimals = /^[-+]?[0-9]+\.[0-9]+$/;
      var missingVal = 0;

      var mawb_no=document.getElementById('mawb_no').value;
      var awb_no=document.getElementById('awb_no').value;
      var sale_date=document.getElementById('sale_date').value;
      var booking_date=document.getElementById('booking_date').value;
      var charge_code=document.getElementById('charge_code').value;
      var station=document.getElementById('station').value;
      var party=document.getElementById('party').value;
      var party_name=document.getElementById('party_name').value;
      var party_address=document.getElementById('party_address').value;
      var con_name=document.getElementById('con_name').value;
      var airport_dep=document.getElementById('airport_dep').value;
      var airport_to_a=document.getElementById('airport_to_a').value;
      var airport_by_a=document.getElementById('airport_by_a').value;
      var currency=document.getElementById('currency').value;
      var destination=document.getElementById('destination').value;
      var flight_no_a=document.getElementById('flight_no_a').value;
      var flight_no_a_date=document.getElementById('flight_no_a_date').value;
      var pcs=document.getElementById('pcs').value;
      var grs_weight=document.getElementById('grs_weight').value;
      var commodity=document.getElementById('commodity').value;
      var ch_weight=document.getElementById('ch_weight').value;
      var rate=document.getElementById('rate').value;
      var nominaton=document.getElementById('nominaton').value;
      var spo=document.getElementById('spo').value;
      var said_chain=document.getElementById('said_chain').value;
     
      var summary = "Summary: ";

      if(said_chain == "")
      {
          document.getElementById('said_chain').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_said_chain").innerHTML = "Said is required.";
      }
      if(said_chain != "")
      {
          document.getElementById('said_chain').style.borderColor = "white";
          document.getElementById("V_said_chain").innerHTML = "";

      }

      if(spo == "")
      {
          document.getElementById('spo').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_spo").innerHTML = "SPO is required.";
      }
      if(spo != "")
      {
          document.getElementById('spo').style.borderColor = "white";
          document.getElementById("V_spo").innerHTML = "";

      }

      if(nominaton == "")
      {
          document.getElementById('nominaton').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_nominaton").innerHTML = "Nomination is required.";
      }
      if(nominaton != "")
      {
          document.getElementById('nominaton').style.borderColor = "white";
          document.getElementById("V_nominaton").innerHTML = "";

      }

       
      if(rate == "")
      {
          document.getElementById('rate').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("rate").innerHTML = "Rate is required.";
      }
      if(rate != "")
      {
          document.getElementById('rate').style.borderColor = "white";
          document.getElementById("V_rate").innerHTML = "";

          if (!regexp2.test(rate))
        {
          document.getElementById('rate').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rate").innerHTML = "Only numbers and decimals are allowed in rate.";
        }
      }

       if(ch_weight == "")
      {
          document.getElementById('ch_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_ch_weight").innerHTML = "Charge Weight is required.";
      }
      if(ch_weight != "")
      {
          document.getElementById('ch_weight').style.borderColor = "white";
          document.getElementById("V_ch_weight").innerHTML = "";

          if (!regexp2.test(ch_weight))
        {
          document.getElementById('ch_weight').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_ch_weight").innerHTML = "Only alphabets are allowed.";
        }
      }

      if(grs_weight == "")
      {
          document.getElementById('grs_weight').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_grs_weight").innerHTML = "Gross Weight is required.";
      }
      if(grs_weight != "")
      {
          document.getElementById('grs_weight').style.borderColor = "white";
          document.getElementById("V_grs_weight").innerHTML = "";

          if (!regexp2.test(grs_weight))
        {
          document.getElementById('grs_weight').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_grs_weight").innerHTML = "Only numbers are allowed.";
        }
      }

      if(pcs == "")
      {
          document.getElementById('pcs').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_pcs").innerHTML = "Pieces is required.";
      }
      if(pcs != "")
      {
          document.getElementById('pcs').style.borderColor = "white";
          document.getElementById("V_pcs").innerHTML = "";

      }

      if(commodity == "")
      {
          document.getElementById('commodity').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_commodity").innerHTML = "Commodity is required.";
      }
      if(commodity != "")
      {
          document.getElementById('commodity').style.borderColor = "white";
          document.getElementById("V_commodity").innerHTML = "";

      }

      if(flight_no_a_date == "")
      {
          document.getElementById('flight_no_a_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_no_a_date").innerHTML = "Flight Date is required.";
      }
      if(flight_no_a_date != "")
      {
          document.getElementById('flight_no_a_date').style.borderColor = "white";
          document.getElementById("V_flight_no_a_date").innerHTML = "";

      }

      if(flight_no_a == "")
      {
          document.getElementById('flight_no_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_flight_no_a").innerHTML = "Flight Date is required.";
      }
      if(flight_no_a != "")
      {
          document.getElementById('flight_no_a').style.borderColor = "white";
          document.getElementById("V_flight_no_a").innerHTML = "";

      }

      if(destination == "")
      {
          document.getElementById('destination').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_destination").innerHTML = "Destination is required.";
      }
      if(destination != "")
      {
          document.getElementById('destination').style.borderColor = "white";
          document.getElementById("V_destination").innerHTML = "";

      }

      if(currency == "")
      {
          document.getElementById('currency').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_currency").innerHTML = "Currency is required.";
      }
      if(currency != "")
      {
          document.getElementById('currency').style.borderColor = "white";
          document.getElementById("V_currency").innerHTML = "";

      }

      if(airport_by_a == "")
      {
          document.getElementById('airport_by_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_by_a").innerHTML = "Airport is required.";
      }
      if(airport_by_a != "")
      {
          document.getElementById('airport_by_a').style.borderColor = "white";
          document.getElementById("V_airport_by_a").innerHTML = "";

      }

       if(airport_to_a == "")
      {
          document.getElementById('airport_to_a').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_to_a").innerHTML = "Airport is required.";
      }
      if(airport_to_a != "")
      {
          document.getElementById('airport_to_a').style.borderColor = "white";
          document.getElementById("V_airport_to_a").innerHTML = "";

      }

       if(airport_dep == "")
      {
          document.getElementById('airport_dep').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_airport_dep").innerHTML = "Airport Dep is required.";
      }
      if(airport_dep != "")
      {
          document.getElementById('airport_dep').style.borderColor = "white";
          document.getElementById("V_airport_dep").innerHTML = "";

      }

      if(con_name == "")
      {
          document.getElementById('con_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_con_name").innerHTML = "Consignee name is required.";
      }
      if(con_name != "")
      {
          document.getElementById('con_name').style.borderColor = "white";
          document.getElementById("V_con_name").innerHTML = "";

      }

      if(party_address == "")
      {
          document.getElementById('party_address').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party_address").innerHTML = "Party Address is required.";
      }
      if(party_address != "")
      {
          document.getElementById('party_address').style.borderColor = "white";
          document.getElementById("V_party_address").innerHTML = "";

      }

       if(party_name == "")
      {
          document.getElementById('party_name').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party_name").innerHTML = "Party Name is required.";
      }
      if(party_name != "")
      {
          document.getElementById('party_name').style.borderColor = "white";
          document.getElementById("V_party_name").innerHTML = "";

      }

      if(party == "")
      {
          document.getElementById('party').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_party").innerHTML = "Party is required.";
      }
      if(party != "")
      {
          document.getElementById('party').style.borderColor = "white";
          document.getElementById("V_party").innerHTML = "";

      }

       if(station == "")
      {
          document.getElementById('station').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_station").innerHTML = "Station is required.";
      }
      if(station != "")
      {
          document.getElementById('station').style.borderColor = "white";
          document.getElementById("V_station").innerHTML = "";

      }

      if(charge_code == "")
      {
          document.getElementById('charge_code').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_charge_code").innerHTML = "Charge Code is required.";
      }
      if(charge_code != "")
      {
          document.getElementById('charge_code').style.borderColor = "white";
          document.getElementById("V_charge_code").innerHTML = "";

      }

      if(booking_date == "")
      {
          document.getElementById('booking_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_booking_date").innerHTML = "Boo Date is required.";
      }
      if(booking_date != "")
      {
          document.getElementById('booking_date').style.borderColor = "white";
          document.getElementById("V_booking_date").innerHTML = "";

      }

      if(sale_date == "")
      {
          document.getElementById('sale_date').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_sale_date").innerHTML = "Sale date is required.";
      }
      if(sale_date != "")
      {
          document.getElementById('sale_date').style.borderColor = "white";
          document.getElementById("V_sale_date").innerHTML = "";

      }

      if(awb_no == "")
      {
          document.getElementById('awb_no').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_awb_no").innerHTML = "AWB No. is required.";
      }
      if(awb_no != "")
      {
          document.getElementById('awb_no').style.borderColor = "white";
          document.getElementById("V_awb_no").innerHTML = "";

      }

      if(mawb_no == "")
      {
          document.getElementById('mawb_no').style.borderColor = "red";
          missingVal = 1;
          // summary += "Firstname is required.";
          document.getElementById("V_mawb_no").innerHTML = "MAWB No. is required.";
      }
      if(mawb_no != "")
      {
          document.getElementById('mawb_no').style.borderColor = "white";
          document.getElementById("V_mawb_no").innerHTML = "";

      }

      if (missingVal != 1)
      {
        document.getElementById('flight_no_a_date').style.borderColor = "white";
        document.getElementById('flight_no_a').style.borderColor = "white";
        document.getElementById('destination').style.borderColor = "white";
        document.getElementById('currency').style.borderColor = "white";
        document.getElementById('airport_by_a').style.borderColor = "white";
        document.getElementById('airport_to_a').style.borderColor = "white";
        document.getElementById('airport_dep').style.borderColor = "white";
        document.getElementById('con_name').style.borderColor = "white";
        document.getElementById('party_address').style.borderColor = "white";
        document.getElementById('party_name').style.borderColor = "white";
        document.getElementById('party').style.borderColor = "white";
        document.getElementById('station').style.borderColor = "white";
        document.getElementById('charge_code').style.borderColor = "white";
        document.getElementById('booking_date').style.borderColor = "white";
        document.getElementById('sale_date').style.borderColor = "white";
        document.getElementById('awb_no').style.borderColor = "white";
        document.getElementById('mawb_no').style.borderColor = "white";
        document.getElementById('pcs').style.borderColor = "white";
        document.getElementById('grs_weight').style.borderColor = "white";
        document.getElementById('commodity').style.borderColor = "white";
        document.getElementById('ch_weight').style.borderColor = "white";
        document.getElementById('rate').style.borderColor = "white";
        document.getElementById('nominaton').style.borderColor = "white";
        document.getElementById('spo').style.borderColor = "white";
        document.getElementById('said_chain').style.borderColor = "white";
       
        $("#submit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary").textContent="Error: ";
      }
      
  }
</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
