<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// After Submit
//$empNo = $_GET['empNo'];
$userNo = $_GET['id'];
  // echo $user_id;
  $qry= "SELECT * FROM  air_import_entry WHERE SrNo = '$userNo'";
  $run= mysqli_query($con , $qry);
  $row = mysqli_fetch_array($run, MYSQLI_ASSOC);



    if ($userNo==$row['SrNo'])
    {

                  $SrNo = $row['SrNo'];
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

    }
    else
    {
        $msg = 'Got some error ';

        function alert($msg)
        {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
        alert($msg);
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
#aimport_form_table2_wrapper .dataTables_filter {
    display: none;
}

 #aimport_form_table .mini_input_field {
    width: 85% !important;
} 
  th {
    text-align: left !important;
}
.dataTables_filter {
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

               <!-- Show Log Chain -->
      <div class="modal fade symfra_popup2" id="logUser_Modal" role="dialog">
            <div class="modal-dialog">
              <!-- Show Log Chain -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Log Chain Details</h4>
                </div>

                  <table id="dpttable" class="display nowrap no-footer" style="width:100%">
                     
                     <thead>
                      <tr>
                      <th>SrNo</th>
                      <th>Instance</th>
                      <th>Record ID</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Update By</th>
                      <th>Update Date</th>
                      <th>Pervious Value</th>
                      <th>New Value</th>
                      </tr>

                     </thead>
                     <tbody>
                      <?php

                              include 'manage/connection.php';

                              $selectchainlog = mysqli_query($con, "select * from chainlog where formName = 'Air Import' ");

                              ?>
                          <?php

                                while ($rowchainlog = mysqli_fetch_array($selectchainlog))
                                {
                                ?>

                      <tr>
                      <td><?php echo $rowchainlog['SrNo']; ?></td>
                      <td><?php echo $rowchainlog['instance']; ?></td>
                      <td><?php echo $rowchainlog['record_id']; ?></td>
                      <td><?php echo $rowchainlog['createBy']; ?></td>
                      <td><?php echo $rowchainlog['createDate']; ?></td>
                      <td><?php echo $rowchainlog['updateBy']; ?></td>
                      <td><?php echo $rowchainlog['updateDate']; ?></td>
                      <td><?php echo $rowchainlog['perValue']; ?></td>
                      <td><?php echo $rowchainlog['newValue']; ?></td>
                      </tr>
                      <?php
                     }
                     ?>
                     </tbody>

                  </table>
                
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
                    <button type="button" name="saveBtn" onclick="logUserFunc();"> <small>Log Chain</small></button>
                   <button type="button" name="submitBtn"><a href="add_job_air_import_Edit.php?id=". $userNo> <small>Edit</small></a></button>         
                </div>
                              

                <div class="col-md-6">



                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                   <input type="text" name="job_no" id="job_no" disabled value="<?php echo $job_no ?>">
                  </div>

                  <div class="input-label"><label>So No</label></div>
                  <div class="input-feild">
                   <input class="mini_input_field" type="text" disabled name="so_no" value="<?php echo $so_no ?>" >
                  </div>
                
                </div>

                
                <div class="col-md-6">
                  <div class="input-label"><label>Job Date</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" type="date" disabled name="job_date" value="<?php echo $job_date ?>" >
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
                              <th>Pcs</th>
                              <th>Grs. Weight</th>
                              <th>Ch.Weight</th>
                              <th>Rate</th>
                             
                            </tr>
                          </thead>
                          <tbody>   
                                   <tr>
                                      <th>MAWB No.</th>
                                      <td> <input class="mini_input_field" disabled type="text" name="m_awb" value="<?php echo $m_awb ?>"></td>
                                      <td> <input class="mini_input_field" disabled type="date" name="m_date" value="<?php echo $m_date ?>"></td>
                                      <td> <select name="m_pp_cc" disabled>
                                        <option value=""><?php echo $m_pp_cc ?></option>
                                        <option value="pp">pp</option>
                                        <option value="cc">cc</option>
                                      </select></td>
                                      <td> <input class="mini_input_field" disabled type="text" name="m_pieces" value="<?php echo $m_pieces ?>"></td>
                                      <td> <input class="mini_input_field" disabled type="text" name="m_grs_weight" value="<?php echo $m_grs_weight ?>"></td>
                                      <td> <input class="mini_input_field" disabled class="mini_input_field"  type="text" name="m_ch_weight" id="m_ch_weight" value="<?php echo $m_ch_weight ?>"></td>
                                      <td> <input class="mini_input_field"disabled type="text" name="m_rate" id="m_rate" value="<?php echo $m_rate ?>" onfocusout="calcDetails_Buy_P();"></td>
                                      
                                   </tr>  

                                   <tr>
                                      <th>HAWB No.</th>
                                      <td> <input class="mini_input_field" disabled type="text" name="h_awb" value="<?php echo $h_awb ?>"></td>
                                      <td> <input class="mini_input_field" disabled type="date" name="h_date" value="<?php echo $h_date ?>"> </td>
                                        <td> <select name="h_pp_cc">
                                          <option value=""><?php echo $h_pp_cc ?></option>
                                        <option value="pp">pp</option>
                                        <option value="cc">cc</option>
                                      </select></td>
                                      <td> <input class="mini_input_field" disabled type="text" name="h_pieces" value="<?php echo $h_pieces ?>"></td>
                                      <td> <input class="mini_input_field" disabled  type="text" name="h_grs_weight" value="<?php echo $h_grs_weight ?>"></td>
                                      <td> <input class="mini_input_field" disabled type="text" name="h_ch_weight" id="h_ch_weight" value="<?php echo $h_ch_weight ?>"></td>
                                      <td> <input class="mini_input_field" disabled type="text" name="HAWB_rate" id="h_rate" value="<?php echo $h_rate ?>" onfocusout="calcDetails_Sell_P();"></td>
                                   </tr>
                                                                      
                          </tbody>
                          </table> 
              </div>
              <div class="cls"></div>
              <hr>

             <div class="col-md-6">
                   
                    <div class="input-label"><label>Goods Description</label></div>
                    <div class="input-feild">
                    <textarea name="description" disabled > <?php echo $description ?></textarea>
                    </div>

                    <div class="input-label"><label>Status</label></div>
                    <div class="input-feild">
                      <?php
                      if ($status_type == "Active")
                      {
                      ?>

                      <input type="checkbox" name="status_type" disabled id="status_type" checked>

                      <?php
                      }

                      else
                      {
                      ?>

                      <input type="checkbox" name="status_type" disabled id="status_type">

                      <?php
                      }
                      ?>
                    
                    </div>

                  </div>
        </div>
        <div class="cls"></div>
        <hr>				

        <div class="widget_iner_box">         
               <div class="col-md-4">

                      <div class="input-label"><label>Party</label></div>
                      <div class="input-feild">
                        <select name="party" disabled="" required>
                          <!-- <option value=""><?php echo $party ?></option> -->
                          <!-- <option value="Select">Select </option> -->
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster where SrNo='$party' ");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>

                      </div>

                      <div class="input-label"><label>Agent Party</label></div>
                      <div class="input-feild">
                        <select name="agent_party" disabled="" required>
                         
                          <?php

                            $selectSub = mysqli_query($con, "select * from sub_agents_parties_setup where SrNo='$agent_party'");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['subpartyname'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Foreign Agent</label></div>
                      <div class="input-feild">
                        <select name="foreign_party" disabled="" required>
                           >
                          <?php

                            $selectSub = mysqli_query($con, "select * from custmaster where SrNo='$party' ");

                            while ($rowSub = mysqli_fetch_array($selectSub))
                            {
                              echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['cmpTitle'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

               </div> 
                 
                 <div class="col-md-4">

                        <div class="input-label"><label>Nomination</label></div>
                      <div class="input-feild">
                        <select class="mini_select_field" disabled="" name="nomination" id="nomination" class="nomination" >
                          <option value="<?php echo $nomination ?>"><?php echo $nomination ?></option>
                          
                          <option value="N">N</option>
                          <option value="Y">Y</option>
                        </select>
                      </div>
                     

                      <div class="input-label"><label>Origin</label></div>
                      <div class="input-feild">
                       <select name="origin" disabled="" required>
                       
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup where SrNo='$origin'");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>

                      <div class="input-label"><label>Flight No.</label></div>
                      <div class="input-feild">
                        <input class="" type="text" disabled name="flight_no" value="<?php echo $flight_no ?>">
                        
                      </div>

                      


                      
                  </div> 

                  <div class="col-md-4">

                     <div class="input-label" id="spoLable"><label>SPO.</label></div>
                    <div class="input-feild">
                      <select name="spo" disabled="" id="spo" required>
                        
                        <?php

                          $selectSub = mysqli_query($con, "select * from spo_setup where SrNo='$spo'");
                          while ($rowSub = mysqli_fetch_array($selectSub))
                          {
                            echo '<option value="'.$rowSub['SrNo'].'">'.$rowSub['spo_name'].'</option>';
                          }

                        ?>
                      </select>
                    </div>

                      <div class="input-label"><label>Destination</label></div>
                      <div class="input-feild">
                        <select name="destination" disabled="" required>
                        
                          <?php

                            $selectorigin = mysqli_query($con, "select * from destination_setup where SrNo='$destination'");

                            while ($roworigin = mysqli_fetch_array($selectorigin))
                            {
                              echo '<option value="'.$roworigin['SrNo'].'">'.$roworigin['dest_name'].'</option>';
                            }
                          ?>
                      </select>
                      </div>
                      
                    
                     
                     <div class="input-label"><label>Flight Date</label></div>
                      <div class="input-feild">
                        <input class="" type="date" disabled name="flight_date" value="<?php echo $flight_date  ?>">
                      </div>

                  </div>
                  <div class="cls"></div>
                  <hr>

               <div class="col-md-4">
                 
                      <div class="input-label"><label>IGM No.</label></div>
                      <div class="input-feild">
                        <input  type="text" name="igm_no" disabled value="<?php echo $igm_no  ?>">

                      </div>

                      <div class="input-label"><label>Air D.O.P No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="air_d_o_no" disabled value="<?php echo $air_d_o_no ?>">
                        
                      </div>

                      <div class="input-label"><label>B/E No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="b_e_no" disabled value="<?php echo $b_e_no  ?>">
                        
                      </div>

                      


                      <div class="input-label"><label>E.T.D</label></div>
                      <div class="input-feild">
                        <input  type="date" name="e_t_d" disabled value="<?php echo $e_t_d ?>">                        
                      </div>

                      

                      
               </div>
               <div class="col-md-4">
                         <div class="input-label"><label>IGM Date</label></div>
                          <div class="input-feild"><input type="date" disabled name="igm_date" value="<?php  echo $igm_date ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


                            <div class="input-label"><label>D.O Date</label></div>
                            <div class="input-feild"><input type="date" disabled name="d_o_date" value="<?php  echo $d_o_date ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>


                            <div class="input-label"><label>B/E Date</label></div>
                            <div class="input-feild"><input type="date" disabled name="b_e_date" value="<?php  echo $b_e_date ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>
                          

                           

                            <div class="input-label"><label>E.T.A</label></div>
                            <div class="input-feild"><input type="date" disabled name="e_t_a"  value="<?php  echo $e_t_a ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

                            
           
                </div>
                <div class="col-md-4">

                  <div class="input-label"><label>Index No.</label></div>
                      <div class="input-feild">
                        <input type="text" name="index_no" disabled value="<?php echo $index_no ?>">
                        
                      </div>

                   <div class="input-label"><label>Sub Index</label></div>
                            <div class="input-feild"><input type="date" disabled name="sub_index_no" value="<?php echo $sub_index_no ?>" data-date-inline-picker="false" data-date-open-on-focus="true" /></div>

                    <div class="input-label"><label>Origin D.O No.</label></div>
                            <div class="input-feild"><input type="text" disabled name="origin_d_o_no" value="<?php echo $origin_d_o_no ?>"></div>

                    <div class="input-label"><label>L/C</label></div>
                      <div class="input-feild">
                        <input  type="text" name="l_c" disabled value="<?php echo $l_c  ?>">                        
                      </div>

                    <div class="input-label"><label>Passport/ I.D</label></div>
                      <div class="input-feild">
                        <input  type="text" name="passport_id" disabled value="<?php echo $passport_id ?>">                        
                      </div>

                </div>

                   
        </div>
         <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
          <div class="col-md-6">
            <div class="input-label"><label>Foreign Agent's Shipper </label></div>
            <div class="input-feild">
               <textarea name="foreign_detail" disabled><?php echo $foreign_detail  ?></textarea>
            </div>



            <div class="input-label"><label>Notify </label></div>
            <div class="input-feild">
              <textarea name="notify_detail" disabled> <?php echo $notify_detail ?> </textarea>
            </div>

          </div>


           <div class="col-md-6">

            <div class="input-label"><label>Consignee </label></div>
            <div class="input-feild">
              <textarea name="consignee_detail" disabled ><?php echo $consignee_detail ?></textarea>
            </div>

             
            <div class="input-label"><label>Remarks</label></div>
            <div class="input-feild">
              <textarea name="remarks" disabled><?php echo $remarks ?></textarea>
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
              <select class="mini_select_field" disabled="" name="invoice_f_agent">
                <?php echo $invoice_f_agent  ?> 
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>


            <div class="input-label"><label>Local Invoice</label></div>
            <div class="input-feild">
              <select class="mini_select_field" disabled="" name="local_inv">
                <?php echo $local_inv ?>
                <option>No</option>
                <option>Yes</option>

              </select>
            </div>

            <div class="input-label"><label>Inv. From F/Agent</label></div>
            <div class="input-feild">
              <select class="mini_select_field" disabled="" name="inv_from_f_agent">
                <?php echo $inv_from_f_agent  ?>
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
            <select class="mini_select_field" disabled="" name="status">
              <?php echo $status  ?>
            <option value="In process">In Process</option>
            <option value="Released">Released</option>
            <option value="Not Released">Not Released</option>
            <option value="Expected">Expected</option>
            </select>
          </div>

          <div class="input-label"><label>Freight trem</label></div>
          <div class="input-feild">
            <input class="mini_input_field" type="text" disabled name="fight_term" value="<?php echo $fight_term  ?>">
          </div>

            
           <div class="input-label"><label>Remarks</label></div>
          <div class="input-feild" >
            <textarea name="remark" disabled><?php echo $remark ?></textarea>
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
                    <select class="mini_select_field" disabled="" name="checkCurr" id="checkCurr">
                      
                      <?php

                      $selectCurCheck = mysqli_query($con, "SELECT * FROM currency_setup WHERE SrNo='$checkCurr' ");
                      while ($rowCurCheck = mysqli_fetch_array($selectCurCheck))
                      {
                        echo '<option value="'.$rowCurCheck['SrNo'].'">'.$rowCurCheck['cur_code'].'</option>';
                      }

                      ?>
                    </select>
                  </div>

                  <div class="input-label"><label>Exchange Rate</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" disabled type="text" name="exchangeRate_P" id="exchangeRate_P" value="<?php echo $exchangeRate_P ?>" 
                    onfocusout="exRate_P();">
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
                            <td><input type="text" disabled name="sellRate_P" id="sellRate_P" value="<?php echo $sellRate_P ?>"></td>
                            <td><input type="text" disabled name="sellAmount_P" id="sellAmount_P" value="<?php echo $sellAmount_P ?>" ></td>
                            <td><input type="text" name="sellAmountPKR_P" id="sellAmountPKR_P" value="<?php echo $sellAmount_P ?>"></td>
                          </tr>

                          <tr>
                            <td>Buying</td>
                            <td><input type="text" disabled name="buyRate_P" id="buyRate_P" value="<?php echo $buyRate_P ?>"></td>
                            <td><input type="text" disabled name="buyAmount_P" id="buyAmount_P" value="<?php echo $buyAmount_P?>"></td>
                            <td><input type="text" disabled name="buyAmountPKR_P" id="buyAmountPKR_P" value="<?php echo $buyAmountPKR_P?>"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text" disabled name="diffAmount_P" id="diffAmount_P" value="<?php echo $diffAmount_P?>"></td>
                            <td><input type="text" name="diffAmountPKR_P" id="diffAmountPKR_P" value="<?php echo $diffAmountPKR_P?>"></td>
                          </tr>

                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text" disabled name="profitRate_P" id="profitRate_P" value="<?php echo $profitRate_P?>" onfocusout="calcProfit_P();" >%</td>
                            <td><input type="text" disabled name="profitAmount_P" id="profitAmount_P" value="<?php echo $profitAmount_P?>"></td>
                            <td><input type="text" disabled name="profitAmountPKR_P" id="profitAmountPKR_P" value="<?php echo $profitAmountPKR_P?>"></td>
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
                            <td><input type="text" disabled name="buyRate_F" id="buyRate_F" value="<?php echo $buyRate_F ?>" onfocusout="calcDetails_Buy_F();"></td>
                            <td><input type="text" disabled name="buyAmount_F" id="buyAmount_F" value="<?php echo $buyAmount_F ?>"></td>
                            <td><input type="text" disabled name="buyAmountPKR_F" id="buyAmountPKR_F" value="<?php echo $buyAmountPKR_F ?>"></td>
                          </tr>

                          <tr>
                            <td>Selling</td>
                            <td><input type="text" disabled name="sellRate_F" id="sellRate_F" value="<?php echo $sellRate_F ?>" onfocusout="calcDetails_Sell_F();"></td>
                            <td><input type="text" disabled name="sellAmount_F" id="sellAmount_F" value="<?php echo $sellAmount_F ?>"></td>
                            <td><input type="text" disabled name="sellAmountPKR_F" id="sellAmountPKR_F" value="<?php echo $sellAmountPKR_F ?>"></td>
                          </tr>

                          <tr>
                            <td>Difference</td>
                            <td></td>
                            <td><input type="text" disabled name="diffAmount_F" id="diffAmount_F" value="<?php echo $diffAmount_F ?>"></td>
                            <td><input type="text" disabled name="diffAmountPKR_F" id="diffAmountPKR_F" value="<?php echo $diffAmountPKR_F ?>"></td>
                          </tr>
                          
                          <tr>
                            <td>Profit Share.</td>
                            <td><input type="text" disabled name="profitRate_F" id="profitRate_F" value="<?php echo $profitRate_F ?>"></td>
                            <td><input type="text" disabled name="profitAmount_F" id="profitAmount_F" value="<?php echo $profitAmount_F ?>"></td>
                            <td><input type="text"  disabled name="profitAmountPKR_F" id="profitAmountPKR_F" value="<?php echo $profitAmountPKR_F ?>"></td>
                          </tr>
                        </tbody>
                  </table>

                  <br>

                  <div class="input-label"><label>Payable</label></div>
                  <div class="input-feild">
                    <input class="mini_input_field" disabled type="text" name="payableAmount" id="payableAmount" value="<?php echo $payableAmount ?>">
                    <input class="mini_input_field" disabled type="text" name="payableAmountPKR" id="payableAmountPKR" value="<?php echo $payableAmountPKR ?>">
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
        "ordering":false,
      });

      $('#aimport_form_table2').DataTable( {
        "scrollX": false,
        "paging":false,
        "info":false,
      });

     $('#hawbtable').DataTable( {
        "scrollY": 50,
        "scrollX": true,
        "paging":false,
        "info":false,
      });

     $('#local_inv_table').DataTable( {
        "paging":false,
        "info":false,
      });
  });
</script>

<script>
  $(document).ready(function() {
     $('#prtytable').DataTable( {
        "paging":false,
        "info":false,
    });

    $('#foreigntbale').DataTable( {
        "paging":false,
        "info":false,
    });
  });
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
  var nominaton = document.getElementById("nominaton").value;
  if (nominaton == "Y")
  {
    document.getElementById('spo').style.visibility='hidden';
    document.getElementById('spoLable').style.visibility='hidden';
    // alert("Working");
  }
  else if (nominaton == "N")
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

<!-- java script -->
        <script type="text/javascript">
        function logUserFunc()
        {
          $("#logUser_Modal").modal();
        }
        </script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
