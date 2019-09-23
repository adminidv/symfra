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
$selectLastID = mysqli_query($con, "SELECT * FROM saleorders ORDER BY soNo DESC LIMIT 1");
$rowLastID = mysqli_fetch_array($selectLastID, MYSQLI_ASSOC);

$lastID = $rowLastID['soNo'];
$newID = $lastID + 1;
$soNo = $newID;


if (isset($_POST['submitBtn'])) {

   $soNo =$soNo;
   $saleCust =$_POST['saleCust'];
   $conPerson =$_POST['conPerson'];
   $conRef =$_POST['conRef'];
   $saleCurr =$_POST['saleCurr'];
   // $saleStatus =$_POST['saleStatus'];
   $postDate =$_POST['postDate'];
   $docDate =$_POST['docDate'];
   $agentParty =$_POST['agentParty'];
   $foreignAgent =$_POST['foreignAgent'];
   $saleNom =$_POST['saleNom'];
   $saleSPO =$_POST['saleSPO'];
   $mawbNo =$_POST['mawbNo'];
   $mawbDate =$_POST['mawbDate'];
   $flightNo =$_POST['flightNo'];
   $flightDate =$_POST['flightDate'];
   $salePcs =$_POST['salePcs'];
   // $saleCBM =$_POST['saleCBM'];
   $grsWeight =$_POST['grsWeight'];
   $saleComm =$_POST['saleComm'];
   $chWeight =$_POST['chWeight'];
   $saleRate =$_POST['saleRate'];
   $totalFreight =$_POST['totalFreight'];
   $goodsDesc =$_POST['goodsDesc'];
   $saleOrigin =$_POST['saleOrigin'];
   $saleDest =$_POST['saleDest'];
   $saleRem =$_POST['saleRem'];
   $totalBefDisc =$_POST['totalBefDisc'];
   $saleDisc =$_POST['saleDisc'];
   $saleTax =$_POST['saleTax'];
   $saleTotal =$_POST['saleTotal'];
   $saleReason =$_POST['saleReason'];
   // $saleType =$_POST['saleType'];

   $insertQurey= mysqli_query($con, " insert into saleorders (soNo, saleCust, conPerson, conRef, saleCurr, saleStatus, postDate, docDate, agentParty, foreignAgent, saleNom, saleSPO, mawbNo, mawbDate, flightNo, flightDate, salePcs, grsWeight, saleComm, chWeight, saleRate, totalFreight, goodsDesc, saleOrigin, saleDest, saleRem, totalBefDisc, saleDisc, saleTax, saleTotal, saleReason, saleType) value ('$soNo','$saleCust','$conPerson','$conRef','$saleCurr','Waiting for first approval','$postDate','$docDate','$agentParty','$foreignAgent','$saleNom','$saleSPO','$mawbNo','$mawbDate','$flightNo','$flightDate', '$salePcs','$grsWeight','$saleComm','$chWeight','$saleRate','$totalFreight','$goodsDesc','$saleOrigin','$saleDest','$saleRem','$totalBefDisc','$saleDisc','$saleTax','$saleTotal','$saleReason','Air Import')")or die(mysqli_error($con));

    // header("Location: sales_order_air_import.php");
  
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Order(Air Import)</title>
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
          <a href="usermodules.php" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
          <a href="usermodules.php" class="btn btn-info">CRM</a>
          <a href="#" class="btn btn-info active">Sales Order(Air Import)</a>
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

           <?php include 'sidebar_widgets/ai_advanced_search_widget.php'; ?>
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
                                <input  type="text" placeholder="" name="soNo" value="<?php echo $soNo ?>">
                              </div>

                              <div class="input-label"><label >Customer</label></div>
                              <div class="input-feild">
                                <select  name="saleCust" id="saleCust" class="saleCust" onchange="checkValues()">
                                  
                                  <?php

                                    $selectCust = mysqli_query($con, "select * from custmaster where SrNo='$saleCust'");

                                    while ($rowCust = mysqli_fetch_array($selectCust))
                                    {
                                      echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['cmpTitle'].'</option>';
                                    }
                                  ?>
                                </select>
                              </div>
                             
                         
                              <!-- <div class="input-label"><label >Name</label></div>  
                              <div class="input-feild">
                                     <input   type="text" placeholder="" name="conPerson" id="conPerson" class="conPerson">
                              </div> -->
                                  
                              <div class="input-label"><label >Contact Person </label></div>  
                              <div class="input-feild">
                                <select name="conPerson" id="conPerson" class="conPerson">

                                    <option > </option>
                                    <option > </option>
                                    <option ></option>
                                </select>
                              </div>

                              <div class="input-label"><label >Contact Ref. No.  </label></div>  
                              <div class="input-feild">
                                 <input   type="text"   placeholder="" name="conRef" id="conRef" class="conRef" value="<?php echo $conRef ?>">
                              </div>    
                                    
                              <div class="input-label"><label >Currency  </label></div>
                              <div class="input-feild">
                                  <select class="mini_select_field" name="saleCurr" id="saleCurr" >
                                    
                                    <?php

                                      $selectCust = mysqli_query($con, "select * from currency_setup where SrNo='$saleCurr'");

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
                                    <select  class="mini_select_field agentParty" name="agentParty" id="agentParty" >
                                               
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from sub_agents_parties_setup where SrNo='$agentParty'" );

                                                while ($rowCust = mysqli_fetch_array($selectCust))
                                                {
                                                  echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['subpartyname'].'</option>';
                                                }
                                              ?>
                                      </select>
                              </div> 

                               <div class="input-label"><label >Foreign Agent </label></div>  
                              <div class="input-feild">
                                     <select  class="mini_select_field foreignAgent" name="foreignAgent" id="foreignAgent" >
                                              
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from custmaster where SrNo='$foreignAgent'");

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
                                        id="saleNom">
                                              <option >No</option>
                                              <option value="yes" >Yes</option>
                                      </select>
                              </div> 

                              <div id="slctshow">
                                 <div class="input-label"><label >SPO </label></div>
                                  <div class="input-feild ">
                                          <select  class="mini_select_field saleSPO" name="saleSPO" id="saleSPO">
                                                   
                                              <?php

                                                $selectCust = mysqli_query($con, "select * from spo_setup where SrNo='$saleSPO'");

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
                                <input  value="<?php echo $postdate ?>" type="date" name="postDate" id="postDate" class="postDate">
                              </div>

                              <div class="input-label"><label >Document Date</label></div>  
                              <div class="input-feild">
                                <input type="date" name="docDate" id="docDate"  value="<?php echo $docDate?>" class="docDate">
                              </div>
                                                                                                                     
                            </div>
                    </div>      

                    <div class="cls"></div>
                    <hr>

            			   <div class="widget_iner_box">
                        <div class="col-md-6">
                            <div class="input-label"><label >Mawb No.</label></div>  
                            <div class="input-feild">
                              <input  value="<?php echo $mawbNo?>"  type="text" name="mawbNo" id="mawbNo" class="mawbNo">
                            </div>

                            

                            <div class="input-label"><label >Pcs</label></div>  
                          <div class="input-feild">
                            <input  type="text" name="salePcs" id="salePcs"  value="<?php echo $salePcs?>" class="salePcs">
                          </div>

                          <div class="input-label"><label >Gross Weight</label></div>  
                          <div class="input-feild">
                            <input  type="text" name="grsWeight" id="grsWeight" class="grsWeight"  value="<?php echo $grsWeight?>">
                          </div>

                          <div class="input-label"><label >Commodity</label></div>  
                          <div class="input-feild">
                            <select  class="saleComm" name="saleComm" id="saleComm">
                              
                                <?php

                                  $selectCust = mysqli_query($con, "select * from pro_setup_commodity where SrNo='$saleComm'");

                                  while ($rowCust = mysqli_fetch_array($selectCust))
                                  {
                                    echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['pro_name'].'</option>';
                                  }
                                ?>
                            </select>
                          </div>

                          <div class="input-label"><label >Charge Weight</label></div>  
                          <div class="input-feild">
                            <input  type="text"  value="<?php echo $chWeight?>" name="chWeight" id="chWeight" class="chWeight">
                          </div>

                          <div class="cls"></div>
                          <hr>

                          <div class="widget_child_title"><h4>Shipping Info</h4></div>

                          <div class="input-label"><label >Origin</label></div>  
                          <div class="input-feild">
                                  <select name="saleOrigin" id="saleOrigin" class="saleOrigin" >
                                    
                                      <?php

                                        $selectCust = mysqli_query($con, "select * from destination_setup where SrNo='$saleOrigin'");

                                        while ($rowCust = mysqli_fetch_array($selectCust))
                                        {
                                          echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                        }
                                      ?>
                                  </select>
                          </div>

                          <div class="input-label"><label >Destination</label></div>  
                          <div class="input-feild">
                            <select name="saleDest"  id="saleDest" class="saleDest">
                              
                                <?php

                                  $selectCust = mysqli_query($con, "select * from destination_setup where='$saleDest'");

                                  while ($rowCust = mysqli_fetch_array($selectCust))
                                  {
                                    echo '<option value="'.$rowCust['SrNo'].'">'.$rowCust['dest_name'].'</option>';
                                  }
                                ?>
                            </select>
                          </div>

                            <div class="input-label"><label >Flight No.</label></div>  
                            <div class="input-feild">
                                    <input   value="<?php echo $flightNo?>" type="text" name="flightNo" id="flightNo" class="flightNo">
                              
                            </div>

                            <div class="input-label"><label >Flight Date</label></div>  
                            <div class="input-feild">
                                <input type="date" name="flightDate" id="flightDate"  value="<?php echo $flightDate?>" class="flightDate">
                            </div>


                        </div>
                        <div class="col-md-6">  

                           <div class="input-label"><label > Mawb Date</label></div>  
                            <div class="input-feild">
                                    <input  value="<?php echo $mawbDate?>" type="date" name="mawbDate" id="mawbDate" class="mawbDate">
                            </div>

                            <div class="input-label"><label >Rate</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="saleRate" id="saleRate" class="saleRate" onfocusout="calcFreight();"  value="<?php echo $saleRate?>">
                            </div>

                            <div class="input-label"><label >Total</label></div>  
                            <div class="input-feild">
                                    <input  type="text" name="totalFreight" id="totalFreight"  value="<?php echo $totalFreight?>" class="totalFreight">
                            </div>

                             <div class="input-label"><label >Goods & Description</label></div>  
                            <div class="input-feild">
                                    <textarea name="goodsDesc" id="goodsDesc" class="goodsDesc"><?php echo $goodsDesc?></textarea>
                            </div>


                        </div>
                     </div>            

                    <div class="cls"></div>
                    <hr>

                 		   <div class="widget_iner_box">
                 		   		 <div class="col-md-6">
                                                            
                                                           
                                                            <div class="input-label"><label >Remarks</label></div>
                                                            <div class="input-feild">
                                                              <textarea name="saleRem" id="saleRem" class="saleRem"><?php echo 
                                                              
                                                              $saleRem?></textarea>
                                                            </div>                                                         
                                                        </div>  

                                                        <div class="col-md-6">
                                                        
                                                            <div class="input-label"><label >Total Freight Before Discount</label></div>
                                                            <div class="input-feild">
                                                                <input  value="<?php echo $totalBefDisc?>" type="text"  name="totalBefDisc" id="totalBefDisc" class="totalBefDisc">
                                                            </div>
                                                            
                                                            <div class="input-label"><label >Discount %</label></div>
                                                            <div class="input-feild">
                                                                 <input  value="<?php echo $saleDisc?>" class="mini_input_field" type="text" name="saleDisc" id="saleDisc" class="saleDisc">
                                                            </div>

                                                            <div class="input-label"><label >Tax</label></div>
                                                            <div class="input-feild">
                                                                 <input type="text" name="saleTax" id="saleTax" class="saleTax" onfocusout="afterDisc();"  value="<?php echo $saleTax?>" >
                                                            </div>

                                                            <div class="input-label"><label >Total</label></div>
                                                            <div class="input-feild">
                                                                 <input  type="text" name="saleTotal"  value="<?php echo $saleTotal?>" id="saleTotal" class="saleTotal">
                                                            </div>

                                                            <div class="input-label"><label >Reason For Sale</label></div>
                                                            <div class="input-feild">
                                                              <textarea name="saleReason" id="saleReason" class="saleReason"><?php echo $saleReason?></textarea>
                                                            </div>                                                       
                                                        </div>	  
                 		   </div>  

                       <div class="cls"></div>
                       <hr>

   </div>                                                       
      					
                   

      		</form>
	</div>

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
       "info":false
   });


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