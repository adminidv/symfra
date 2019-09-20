<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

// echo $lasID;

$userID = $_SESSION['user'];

//$userNo = $_GET['empNo'];
$soNo = $_GET['soNo'];

// auto increment
$selectSO = mysqli_query($con, "SELECT * FROM saleOrders WHERE soNo='$soNo' ");
while ($rowSO = mysqli_fetch_array($selectSO))
{
  $saleCust = $rowSO['saleCust'];
  $conPerson = $rowSO['conPerson'];
  $conRef = $rowSO['conRef'];
  $saleCurr = $rowSO['saleCurr'];
  $saleStatus = $rowSO['saleStatus'];
  $postDate = $rowSO['postDate'];
  $docDate = $rowSO['docDate'];
  $agentParty = $rowSO['agentParty'];
  $foreignAgent = $rowSO['foreignAgent'];
  $saleNom = $rowSO['saleNom'];
  $saleSPO = $rowSO['saleSPO'];
  $salePcs = $rowSO['salePcs'];
  $saleCBM = $rowSO['saleCBM'];
  $grsWeight = $rowSO['grsWeight'];
  $saleComm = $rowSO['saleComm'];
  $chWeight = $rowSO['chWeight'];
  $saleRate = $rowSO['saleRate'];
  $totalFreight = $rowSO['totalFreight'];
  $goodsDesc = $rowSO['goodsDesc'];
  $saleOrigin = $rowSO['saleOrigin'];
  $saleDest = $rowSO['saleDest'];
  $saleRem = $rowSO['saleRem'];
  $totalBefDisc = $rowSO['totalBefDisc'];
  $saleDisc = $rowSO['saleDisc'];
  $saleTax = $rowSO['saleTax'];
  $saleTotal = $rowSO['saleTotal'];
  $saleReason = $rowSO['saleReason'];
  $saleLength = $rowSO['saleLength'];
  $saleWidth = $rowSO['saleWidth'];
  $saleHight = $rowSO['saleHeight'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Order(Air Export)</title>
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
    .dataTables_filter {
        display: none;
        }

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
          <a href="Usermodules.php" class="btn btn-info">CRM</a>
          <a href="#" class="btn btn-info active">Sales Order(Air Export)</a>
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

           <?php include 'sidebar_widgets/ae_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>

<div class=" add_customer_sec main_widget_box">

	<div class="">
      		<form action="" method="POST" enctype="multipart/form-data">

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
                          <!-- <button type="submit" name="submitBtn1"> Add More House</button> -->
                          <button type="submit" name="submitBtn">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal">No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                         
                        </div>
                      </div>
                    </div>
               </div>

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
            			 <label id="formSummary" style="color: red;"></label>

            				<div class="Bsic_usr_info widget_iner_box">

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
            										                    <div class="cls"></div>

            								<div class="col-md-6">

                              <div class="input-label"><label >Sales Order No. </label></div>
                              <div class="input-feild">
                                        <input disabled type="text" placeholder="" name="soNo" value="<?php echo $soNo ?>">
                              </div>

                              <div class="input-label"><label >Customer</label></div>
                              <div class="input-feild">
                                      <select name="saleCust" id="saleCust" class="saleCust" disabled onchange="checkValues()">
                                          <?php

                                            $selectCust = mysqli_query($con, "select * from custmaster WHERE newCode='$saleCust' ");

                                            while ($rowCust = mysqli_fetch_array($selectCust))
                                            {
                                              echo '<option value="'.$rowCust['newCode'].'">'.$rowCust['cmpTitle'].'</option>';
                                            }
                                          ?>
                                      </select>
                              </div>

                              <!-- <div class="input-label"><label >Name</label></div>	
                              <div class="input-feild">
                                     <input disabled  type="text" placeholder="" name="conPerson" id="conPerson" class="conPerson">
                              </div> -->
                                  
                              <div class="input-label"><label >Contact Person </label></div>  
                              <div class="input-feild">
                                       <select name="conPerson" id="conPerson" class="conPerson" disabled>
                                          <option ></option>
                                          <option ></option>
                                          <option ></option>
                                      </select>
                              </div>

                              <div class="input-label"><label >Contact Ref. No.</label></div>  
                              <div class="input-feild">
                                      <input type="text" placeholder="" name="conRef" id="conRef" class="conRef" value="<?php echo $conRef; ?>" disabled>
                              </div>    
                                    
                              <div class="input-label"><label >Currency  </label></div>
                              <div class="input-feild">
                                       <select class="mini_select_field" name="saleCurr" id="saleCurr" disabled>
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from currency_setup WHERE SrNo='$saleCurr' ");

                                                while ($rowCust = mysqli_fetch_array($selectCust))
                                                {
                                                  echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cur_name'].'</option>';
                                                }
                                              ?>
                                      </select>
                              </div>   

                              <div class="cls"></div>
                              <hr>

                               <div class="input-label"><label >Agent Party   </label></div>  
                              <div class="input-feild">
                                    <select class="mini_select_field agentParty" name="agentParty" id="agentParty" disabled>
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from sub_agents_parties_setup WHERE SrNo='$agentParty' ");

                                                while ($rowCust = mysqli_fetch_array($selectCust))
                                                {
                                                  echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['subpartyname'].'</option>';
                                                }
                                              ?>
                                      </select>
                              </div> 

                              <div class="input-label"><label >Foreign Agent </label></div>  
                              <div class="input-feild">
                                     <select class="mini_select_field foreignAgent" name="foreignAgent" id="foreignAgent" disabled>
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from custmaster WHERE SrNo='$foreignAgent' ");

                                                while ($rowCust = mysqli_fetch_array($selectCust))
                                                {
                                                  echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                                                }
                                              ?>
                                      </select>
                              </div> 

                              <div class="input-label"><label >Nomination </label></div>
                              <div class="input-feild ">
                                      <select class="mini_select_field saleNom" name="saleNom" 
                                        id="saleNom" disabled>
                                              <option value="<?php echo $saleNom ?>"><?php echo $saleNom ?></option>
                                      </select>
                              </div> 

                              <div id="slctshow">
                                 <div class="input-label"><label >SPO </label></div>
                                  <div class="input-feild ">
                                          <select class="mini_select_field saleSPO" name="saleSPO" id="saleSPO" disabled>
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from spo_setup WHERE SrNo='$saleSPO' ");

                                                while ($rowCust = mysqli_fetch_array($selectCust))
                                                {
                                                  echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['spo_name'].'</option>';
                                                }
                                              ?>
                                      </select>
                                  </div>
                              </div>    
                                                                           
            								</div>

            								<div class="col-md-6">
                            <div class="input-label"><label >Posting Date  </label></div>  
                            <div class="input-feild">
                                    <input type="date" name="postDate" id="postDate" class="postDate" value="<?php echo $postDate; ?>" disabled>
                            </div>

                            <div class="input-label"><label >Document Date</label></div>  
                            <div class="input-feild">
                                    <input type="date" name="docDate" id="docDate" class="docDate" value="<?php echo $docDate; ?>" disabled>
                            </div>

                            </div>
            				</div>			

            				<div class="cls"></div>
            				<hr>

                    <div class="widget_iner_box">
                      <div class="col-md-6">
                          <div class="input-label"><label >Pcs</label></div>  
                          <div class="input-feild">
                                  <input  type="text" name="salePcs" id="salePcs" class="salePcs" value="<?php echo $salePcs; ?>" disabled>
                          </div>

                          <div class="input-label"><label >Gross Weight</label></div>  
                          <div class="input-feild">
                                  <input type="text" name="grsWeight" id="grsWeight" class="grsWeight" value="<?php echo $grsWeight; ?>" disabled>
                          </div>

                          <div class="input-label"><label >Commodity</label></div>  
                          <div class="input-feild">
                              <select class="saleComm" name="saleComm" id="saleComm" disabled>
                                <?php

                                  $selectCust = mysqli_query($con, "select * from pro_setup_commodity WHERE SrNo='$saleComm' ");

                                  while ($rowCust = mysqli_fetch_array($selectCust))
                                  {
                                    echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['pro_name'].'</option>';
                                  }
                                ?>
                              </select>
                          </div>

                          <div class="cls"></div>
                          <hr>

                          <div class="widget_child_title"><h4>Shipping Info</h4></div>

                          <div class="input-label"><label >Origin</label></div>  
                          <div class="input-feild">
                                  <select name="saleOrigin" id="saleOrigin" class="saleOrigin" disabled>
                                    <?php

                                      $selectCust = mysqli_query($con, "select * from destination_setup WHERE SrNo='$saleOrigin' ");

                                      while ($rowCust = mysqli_fetch_array($selectCust))
                                      {
                                        echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                      }
                                    ?>
                                  </select> 
                          </div>

                          <div class="input-label"><label >Destination</label></div>  
                          <div class="input-feild">
                                 
                            <select name="saleDest" id="saleDest" class="saleDest" disabled>
                                <?php

                                  $selectCust = mysqli_query($con, "select * from destination_setup WHERE SrNo='$saleDest' ");

                                  while ($rowCust = mysqli_fetch_array($selectCust))
                                  {
                                    echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                  }
                                ?>
                            </select>
                          </div>

                      </div>
                      <div class="col-md-6"> 

                      <div class="col-md-3">
    
             
              <!-- volumatic popup-->
              <!-- Modal_one-->
              <div class="modal fade symfra_popup2" id="popup_4" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Volumetic Weight Calculation</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-fields">    
                              <label>Length</label>
                              <input type="text" name="volLength" id="volLength" placeholder="Enter Length">
                            </div>
                            <div class="input-fields">    
                              <label>Width</label>
                              <input type="text" name="volWidth" id="volWidth" placeholder="Enter Width">
                            </div>
                           <div class="input-fields">    
                              <label>Height</label>
                              <input type="text" name="volHeight" id="volHeight" onfocusout="calcVolume();" placeholder="Enter Height">
                            </div>
                             <div class="input-fields">    
                              <label>Volumatic Weight</label>
                              <input type="text" name="volWeight" id="volWeight" placeholder="Volumetic Weight">
                            </div>
                          <div style="clear: both"><button type="submit" name="volumeSubmit" id="volumeSubmit" onclick="checking(); return false;">Submit</button></div>
                        </div>
                        <div class="modal-footer">
                            <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                      
                    </div>
              </div>
        </div>

                          <div class="input-label"><label >Volumatic Weight</label></div>  
                           <div class="input-feild">
                              <button type="button" disabled data-toggle="modal" data-target="#popup_4">Check Volume.</button>
                          </div>

                          <div class="input-label"><label >Charge Weight</label></div>  
                          <div class="input-feild">
                              <input type="text" name="chWeight" id="chWeight" class="chWeight" value="<?php echo $chWeight; ?>" disabled>
                          </div>

                          <div class="input-label"><label >Rate</label></div>  
                          <div class="input-feild">
                              <input type="text" name="saleRate" id="saleRate" class="saleRate" onfocusout="calcFreight();" value="<?php echo $saleRate; ?>" disabled>
                          </div>

                          <div class="input-label"><label >Total Freight</label></div>  
                          <div class="input-feild">
                              <input  type="text" name="totalFreight" id="totalFreight" class="totalFreight" value="<?php echo $totalFreight; ?>" disabled>
                          </div>

                          <div class="input-label"><label >Goods & Description</label></div>  
                          <div class="input-feild">
                              <textarea name="goodsDesc" id="goodsDesc" class="goodsDesc" disabled><?php echo $goodsDesc; ?></textarea>
                          </div>

                      </div>
                    </div>            

                    <div class="cls"></div>
                    <hr>

                 		<div class="widget_iner_box">
                 		   		<div class="col-md-6">
                            <div class="input-label"><label >Remarks</label></div>
                            <div class="input-feild">
                              <textarea name="saleRem" id="saleRem" class="saleRem" disabled><?php echo $saleRem; ?></textarea>
                            </div>                                                         
                          </div>	

                          <div class="col-md-6">
                          
                              <div class="input-label"><label >Total Freight Before Discount</label></div>
                              <div class="input-feild">
                                  <input type="text" name="totalBefDisc" id="totalBefDisc" class="totalBefDisc" value="<?php echo $totalBefDisc; ?>" disabled>
                              </div>
                              
                              <div class="input-label"><label >Discount %</label></div>
                              <div class="input-feild">
                                   <input class="mini_input_field" type="text" name="saleDisc" id="saleDisc" class="saleDisc" value="<?php echo $saleDisc; ?>" disabled>
                              </div>

                              <div class="input-label"><label >Tax</label></div>
                              <div class="input-feild">
                                   <input type="text" name="saleTax" id="saleTax" class="saleTax" onfocusout="afterDisc();" value="<?php echo $saleTax; ?>" disabled>
                              </div>

                              <div class="input-label"><label >Total</label></div>
                              <div class="input-feild">
                                   <input type="text" name="saleTotal" id="saleTotal" class="saleTotal" value="<?php echo $saleTotal; ?>" disabled>
                              </div>

                              <div class="input-label"><label >Reason For Sale</label></div>
                              <div class="input-feild">
                              	<textarea name="saleReason" id="saleReason" class="saleReason" disabled><?php echo $saleReason; ?></textarea>
                              </div>                                                         
                          </div>	  
                 		</div> 

                    <div class="cls"></div>
                    <hr>   
   </div> 

      		</form>
	</div>
                    <!-- <div class="col-md-12 topscrolbtn"> 
                       <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
                    </div>  -->
</div>

<script>
  $('#nominationdrpdwn').on('change',function(){
    if( $(this).val()==="yes"){
    $("#slctshow").hide()
    }
    else{
    $("#slctshow").show()
    }
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

<script type="text/javascript">
  function checkValues() {
    var customerCont = document.getElementById("saleCust").value;

      $.ajax({
         url:"sales_air_export_ajax.php",  
                method:"GET",  
                data:{customerCont:customerCont},  
                dataType:"text",  
         success: function(data) {
              $('.conPerson').html(data); 
                }
      });
} 


</script>
<!-- <script>

  $(document).ready(function() {
    $('#Campaigntable').DataTable({
       "scrollX": true
   });
    $('#Campaigntable1').DataTable({
       "scrollX": true
   });
     $('#Campaigntable2').DataTable({
       "scrollX": true,
   });

     $('#aimport_form_table').DataTable({
       "scrollX": true,
       "ordering":false,
       "paging":false,
       "info":false,

    } );


     $('#aimport_form_table2').DataTable({
       "scrollX": true,
       "ordering":false,
       "paging":false,
       "info":false
   });


} );

</script>
 -->

 <script type="text/javascript">
   function calcVolume()
{
  var volWeight;
  var volLength = document.getElementById("volLength").value;
  var volWidth = document.getElementById("volWidth").value;
  var volHeight = document.getElementById("volHeight").value;
  // alert("Working" + " " + MAWB_rate);
  volWeight = volLength * volWidth * volHeight;
  document.getElementById("volWeight").value = volWeight;
  
}

function checking()
{
  // alert("Working");
  var volWeight = document.getElementById("volWeight").value;
  var grsWeight = document.getElementById("grsWeight").value;
  var volWeightInt = parseInt(volWeight);
  var grs_weightInt = parseInt(grsWeight);
  $('#popup_4').modal('hide');
  if (grsWeight > volWeightInt)
  {
    document.getElementById("chWeight").value = grsWeight;
  }
  else if (grsWeight < volWeightInt)
  {
    document.getElementById("chWeight").value = volWeight;
  }
  // alert(volWeight);
}

function calcFreight()
{
  var totalFreight;
  var chWeight = document.getElementById("chWeight").value;
  var saleRate = document.getElementById("saleRate").value;
  // alert("Working" + " " + MAWB_rate);
  totalFreight = chWeight * saleRate;
  document.getElementById("totalFreight").value = totalFreight;
  document.getElementById("totalBefDisc").value = totalFreight;
}

function afterDisc()
{
  var saleTotal;
  var saleDisc = document.getElementById("saleDisc").value;
  var saleTax = document.getElementById("saleTax").value;
  var totalBefDisc = document.getElementById("totalBefDisc").value;
  // alert("Working" + " " + MAWB_rate);
  // saleTotal = 1 - (saleDisc / 100);
  totalDis = 1 - (saleDisc / 100);
  totalTax = +saleTax + +totalBefDisc;
  saleTotal = totalTax * totalDis;
  //saleTotal = saleTax + +totalBefDisc (1 - (saleDisc / 100));
  document.getElementById("saleTotal").value = saleTotal;
  // document.getElementById("totalBefDisc").value = totalFreight;
}

 </script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>