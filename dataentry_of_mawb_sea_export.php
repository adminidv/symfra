<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info ">Operations</a>

          <a href="#" class="btn btn-info active">Data Entry(Sea Export)</a>

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

       

      

			 <label id="formSummary" style="color: red;"></label>


              <div class="widget_iner_box">

                <div class="form_sec_action_btn col-md-12">
                    <div class="form_action_right_btn">
                                          <!-- Go back button code starting here -->
                                          <?php include('inc_widgets/backBtn.php'); ?>
                                          <!-- Go back button code ending here -->
                    </div>
                    <button type="button" id="btnConfirm_Su" onclick="FormValidation();"> <small>Submit</small></button>
                    <button type="button" name="btnConfirm_S" onclick="saveDraft();"> <small>Save</small></button>
                    <button type="button" name="submitBtn"> <small>Cancel</small></button>        
                </div>


                <div class="col-md-12">
                  

                  <div class="input-feild input-feild-checkboxs"  style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform1" checked> <label>New Mawb</label>
                  </div>  

                  <div class="input-feild input-feild-checkboxs" style="width: 25%;">
                    <input type="radio" name="chkfrmname" value="chkform2" ><label>Old Mawb</label>
                  </div>

                </div>

                <div class="cls"></div>
                <hr>


                <div class="col-md-6">
                            <div class="input-label"><label>MAWB No. </label></div>

                            <div class="input-feild chkform1 chkboxform">
                            <input class="mini_input_field" disabled="" type="text" name=""></input>
                            </div>

                            <div class="input-feild chkform2 chkboxform" style="display: none;">
                              <select class="mini_select_field"><option></option></select>
                            </div>

                 </div>

              </div>

              <div class="cls"></div>
              <hr>  

        <div class="widget_iner_box">
              
                              

                <div class="col-md-6">

                  <div class="input-label"><label>Job No.</label></div>
                  <div class="input-feild">
                    <input type="text" name="">
                  </div>


                  <div class="input-label"><label>Job Status</label></div>
                  <div class="input-feild">
                    <select><option>Nomination</option></select>
                  </div>


                   <div class="input-label"><label>Concol No.</label></div>
                  <div class="input-feild">
                    <input disabled="" class="mini_input_field" type="text" name="">
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="input-label"><label>Date</label></div>
                  <div class="input-feild">
                    <input type="text" name="">
                  </div>

                  <div class="input-label"><label>Commodity</label></div>
                  <div class="input-feild">
                    <textarea></textarea>
                  </div>

                 

                </div>
        </div>

                <div class="cls"></div>
                <hr>
        <div class="widget_iner_box">         
              <div class="col-md-4">

                      <div class="input-label"><label>Party Code</label></div>
                      <div class="input-feild">
                        <select><option></option></select>
                      </div>

                      <div class="input-label"><label>Agent Party </label></div>
                      <div class="input-feild">
                        <select><option></option></select>
                      </div>

                      <div class="input-label"><label>Foreign Agent</label></div>
                      <div class="input-feild">
                        <select><option></option></select>
                      </div>

                      <div class="input-label"><label>Shipping Line</label></div>
                      <div class="input-feild">
                        <select><option></option></select>
                      </div>

                      <div class="input-label"><label>S/Line Agent</label></div>
                      <div class="input-feild">
                        <select><option></option></select>
                      </div>
                     
              </div>

              <div class="col-md-4">

                      <div class="input-label"><label>Nomination </label></div>
                      <div class="input-feild">
                          <select class=""><option></option></select>                        
                      </div> 

                       <div class="input-label"><label>SPO </label></div>
                      <div class="input-feild">
                          <select class=""><option></option></select>                        
                      </div>

                      <div class="input-label"><label>Port of Load </label></div>
                      <div class="input-feild">
                        <select class=""><option></option></select>
                        
                      </div>

                     
              </div>

              <div class="col-md-4">

                      <div class="input-label"><label>Destination</label></div>
                      <div class="input-feild">
                        <select class="" ><option></option></select>
                        
                      </div>

                      <div class="input-label"><label>Wharf </label></div>
                      <div class="input-feild">
                          <select class=""><option></option></select>
                      </div>

                      <div class="input-label"><label>Clearing Agent </label></div>
                      <div class="input-feild">
                        <select class=""><option></option></select>
                        
                      </div>
              </div>
        </div>
                <div class="cls"></div>
                <hr> 

      

        <div class="widget_iner_box">        





                <div class="col-md-4">  

                   <div class="input-label"><label>Form 'E' No</label></div>
                  <div class="input-feild">
                    <input type="text" name="">
                  </div>

                   <div class="input-label"><label>Ship Rcv Date.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">

                  </div>

                  <div class="input-label"><label>CC Date.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>

                  <div class="input-label"><label>S/B No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>

                  <div class="input-label"><label>M.R No</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>

                  <div class="input-label"><label>MBL No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>
                  
                  <div class="input-label"><label>HBL No.</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>




                </div>
                
                <div class="col-md-4">
                    <div class="input-label"><label>Date.</label></div>
                    <div class="input-feild">
                    <input type="text" name="">
                     </div>



                     <div class="input-label"><label>Hand Over to S/L</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>4th Copy Rcv</label></div>
                    <div class="input-feild">
                      <select class="mini_select_field"><option></option></select>
                    </div>

                    <div class="input-label"><label>S/B Place</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>M.R Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>


                </div>

                <div class="col-md-4">
                    <div class="input-label"><label>Cut Off Date.</label></div>
                    <div class="input-feild">
                    <input type="text" name="">
                     </div>



                     <div class="input-label"><label>Date Disp Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>4th Copy Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>S/B Date</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>EGM</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="cls"></div>
                    <hr>

                    <div class="input-label"><label>HBL Type</label></div>
                    <div class="input-feild">
                        <select><option></option></select>
                    </div>

                    


                </div>
        </div>

        <div class="cls"></div>
        <hr>				

        <div class="widget_iner_box">
          <div class="col-md-4">
              <div class="input-label"><label>ETA  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>

               <div class="input-label"><label>ETD  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name=""></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="cls"></div>
          <hr>


          <div class="col-md-4">
              <div class="input-label"><label>ETA  <small>(T/Ship Point1)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>

               <div class="input-label"><label>ETD  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name=""></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="cls"></div>
          <hr>
          <div class="col-md-4">
             <div class="input-label"><label>ETA  <small>(T/Ship Point2)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>ETD  <small>(Part of Load)</small></label></div>
              <div class="input-feild"><input type="text" name=""></div>

               <div class="input-label"><label>ETD  <small>(at Destination)</small></label></div>
               <div class="input-feild"><input type="text" name=""></div>
          </div>

          <div class="col-md-4">
              <div class="input-label"><label>Vessel</label></div>
              <div class="input-feild"><input type="text" name=""></div>

              <div class="input-label"><label>Voyage</label></div>
              <div class="input-feild"><input type="text" name=""></div>
          </div>



        </div>  


     

         <div class="cls"></div>
         <hr> 

         <div class="widget_iner_box">        
                
                <div class="col-md-4">  
                  <div class="widget_child_title"><h4>Consol Total </h4></div>
                    

                  <div class="input-label"><label>CBM</label></div>
                  <div class="input-feild">
                    <input type="text" name="">
                  </div>

                  <div class="input-label"><label>Grs Weight</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">

                  </div>

                  <div class="input-label"><label>Net Weight</label></div>
                  <div class="input-feild">
                    <input class="" type="text" name="">
                  </div>

                  <div class="input-label"><label>Destination</label></div>
                  <div class="input-feild">
                    <select><option></option></select>
                  </div>

                  
                </div>
                
                <div class="col-md-4">

                <div class="widget_child_title"><hr></div>


                    <div class="input-label"><label>No. of Ship</label></div>
                    <div class="input-feild">
                      <input disabled="" class="mini_input_field" type="text" name="">
                    </div>

                    <div class="input-label"><label>Packages.</label></div>
                    <div class="input-feild">
                    <input type="text" name="">
                     </div>



                     <div class="input-label"><label>UOM</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
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
                    <div class="input-label"><label>LCL</label></div>
                    <div class="input-feild">
                      <select><option></option></select>
                     </div>



                     <div class="input-label"><label>CY/CFS</label></div>
                    <div class="input-feild">
                      <select><option></option></select>
                    </div>

                    <div class="input-label"><label>Pkgs</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>Unit</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    <div class="input-label"><label>Gross Weight</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                     <div class="input-label"><label>Net Weight</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-label"><label>FOB/CIF</label></div>
                    <div class="input-feild">
                      <select><option></option></select>
                     </div>



                     <div class="input-label"><label>Currency</label></div>
                    <div class="input-feild">
                      <select><option></option></select>
                    </div>

                    <div class="input-label"><label>Ex.Rate</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                    
                    <div class="cls"></div>
                    <hr>

                    <div class="input-label"><label>CBM</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>

                     <div class="input-label"><label>CBM Rate</label></div>
                    <div class="input-feild">
                      <input type="text" name="">
                    </div>
                </div>
        </div>  

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-4">
                 <div class="widget_child_title"><h4>Shipper Invoice </h4></div>

                  <div class="input-label"><label>No </label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>

                  <div class="input-label"><label>Date</label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                  
                  </div>

                  <div class="input-label"><label>Currency </label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                  
                  </div>

                  <div class="input-label"><label>Amount </label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>


           </div>

          <div class="col-md-4">
             <div class="widget_child_title"><hr></div>
              <div class="input-label"><label>Ship. Div Y/N</label></div>
                <div class="input-feild">
                  <select class="mini_select_field">
                    <option>Y</option>
                    <option>N</option>

                  </select>
              </div>

              <div class="input-label"><label>Ship Div Date </label></div>
              <div class="input-feild">
              <input type="text" name="">
              
              </div>


              <div class="input-label"><label>Release Msg </label></div>
              <div class="input-feild">
              <input type="text" name="">
              
              </div>

              <div class="input-label"><label>Pre Alert Date </label></div>
              <div class="input-feild">
              <input type="text" name="">
              
              </div>
          </div>

          <div class="col-md-4">    
              

            


              <div class="widget_child_title"><h4>Invoice Required </h4></div>

              <div class="input-label"><label>Local Invoice </label></div>
              <div class="input-feild">
                  <select class="mini_select_field"><option>N</option><option>Y</option></select>              
              </div>

              <div class="input-label"><label>Initial Invoice</label></div>
              <div class="input-feild">
                  <select class="mini_select_field"><option>N</option><option>Y</option></select>              
              </div>
          </div>
         
        </div>

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-6">

                  <div class="input-label"><label>Name/Address</label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
                  </div>

                  <div class="input-label"><label>Consignee</label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
                  </div>
           </div>

          <div class="col-md-6">
                  <div class="input-label"><label>Notify</label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
                  </div>

                  <div class="input-label"><label>Forwarding Agent </label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
                  </div>
          </div>


         
        </div> 

        <div class="cls"></div>
        <hr>

        <div class="widget_iner_box">
           <div class="col-md-6">
                  <div class="input-label"><label>Document No.  </label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>

                  <div class="input-label"><label>Initial Carriage </label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>

                  <div class="input-label"><label>Freight Pay At</label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>

                  <div class="input-label"><label>Original FBL/s</label></div>
                  <div class="input-feild">
                  <input type="text" name="">
                
                  </div>


           </div> 

           <div class="col-md-6">

                  <div class="input-label"><label>Export Reference</label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
                  </div>

                  <div class="input-label"><label>Domestic Routing / Delivery Agent</label></div>
                  <div class="input-feild">
                  <textarea></textarea>
                
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
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chkboxform").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
