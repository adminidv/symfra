<?php 
include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unhide';
$ribbon = 'Default';
$subRibbon = 'addUser';
$Quick = 'Hide';
$Quickhr = '';

$bpID = $_GET['bpID'];
$qry= "SELECT * FROM custmaster WHERE newCode = '$bpID'";
$run= mysqli_query($con, $qry);
$row = mysqli_fetch_array($run, MYSQLI_ASSOC);

if ($bpID==$row['newCode'])
{
  $legCode = $row['legCode'];
  $newCode = $row['newCode'];
  $bpTitle = $row['cmpTitle'];
  $bpStreet = $row['cmpStreet'];
  $bpCity = $row['cmpCity'];
  $bpCountry = $row['cmpCountry'];
  $telCode = $row['telCode'];
  $telNumber = $row['telNumber'];
  $cmpWebsite = $row['cmpWebsite'];
  $cmpEmail = $row['cmpEmail'];
  $taxType = $row['taxType'];
  $taxNo = $row['taxNo'];
  $txtSPO = $row['SPO'];
  $txtIATA = $row['IATANo'];
  $seaImport = $row['seaImport'];
  $airImport = $row['airImport'];
  $seaExport = $row['seaExport'];
  $airExport = $row['airExport'];
  $cmpStatus = $row['cmpStatus'];
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
	<title>Master BP View</title>
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
          <a href="master_bp.php" class="btn btn-info active">Master BP</a>
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

<div class="  main_widget_box">
	<div class="">
									<!-- <hr> -->
			<form action="" method="POST">

				     	<!-- Modal One-->
						 <div class="modal fade confirmTable-modal" id="addModal1" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Confirmation</h4>
							        </div>
							        <div class="modal-body">
							          <p>Are You Sure You Want to Submit?</p>
							          <button type="submit" name="submitBtn1">Yes</button>
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
               <div class="modal fade confirmTable-modal" id="saveModal1" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Save?</p>
                          <button type="submit" name="saveBtn1">Yes</button>
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

							  	<!-- <div class="widget_iner_box hide">
							  		<div class="col-md-6">
							  			<div class="input-label  hide"><label >Customer Type</label></div>	

							  			<div class="input-feild input-feild-checkboxs"  style="width: 25%;">
		                                  
		                                  <input type="radio" name="chkfrmname" value="chkform1" checked=""> <label>Company</label>

		                                </div>  

		                                <div class="input-feild input-feild-checkboxs" style="width: 25%;">
		                                  <input type="radio" name="chkfrmname" value="chkform2" ><label>Individual</label>

		                              	</div>

							  		</div>
							  		<div class="col-md-6"></div>
							  	</div> -->

											  	<!-- <div class="cls"></div>
											  	<hr> -->

								<div class=" widget_iner_box">

											<div class="form_sec_action_btn col-md-12">
													<div class="form_action_right_btn">
										                      <!-- Go back button code starting here -->
										                      <?php include('inc_widgets/backBtn.php'); ?>
										                      <!-- Go back button code ending here -->
													</div>
													<a id="btnEnable" href="master_bp_E.php?bpID=<?php echo $newCode; ?>"> <small>Edit</small></a>
											</div>
															<div class="cls"></div>

											 <div class="col-md-6">
			                                                 <div class="input-label"><label >New Code</label></div> 
                                                      <div class="input-feild">
                                                            <input  disabled type="text" name="newCode" id="newCode" placeholder="00000" value="<?php echo $newCode; ?>">
                                                      </div>
			                                                
			                                                <div class="input-label"><label >BP Master Name </label></div>	
			                                                <div class="input-feild">
			                                                       <input type="text" name="bpTitle" id="bpTitle" value="<?php echo $bpTitle; ?>" disabled>
			                                                </div>               
			                                         	                                                                          
			                 				 </div>

											<div class="col-md-6">

			                                                <div class="input-label"><label >Legacy Code</label></div>
                                                      <div class="input-feild">
                                                              <input class="" type="text" name="legCode" id="legCode" placeholder="" disabled value="<?php echo $legCode; ?>">
                                                      </div>


			             				    </div>								
								</div>			
												<div class="cls"></div>
												<hr>

								<div class=" widget_iner_box">
										<div class="col-md-6">
																<div class="input-label"><label > Address </label></div> 
				                                              	<div class="input-feild">
				                                                      <input type="text" placeholder="Street" name="bpStreet" id="bpStreet" value="<?php echo $bpStreet; ?>">
				                                                      <input type="tex" placeholder="City" name="bpCity" id="bpCity" value="<?php echo $bpCity; ?>" >
				                                                      <input type="text" placeholder="Country" name="bpCountry" id="bpCountry" value="<?php echo $bpCountry; ?>" >
				                                                      
				                                           		</div> 
				                                           		<div class="cls"></div>
				                                           		<hr>

				                                           		<div class="input-label"><label >Business Areas  </label></div> 
				                                           		<div class="input-feild input-feild-checkboxs">
				                                                 <?php 
                                                        if ($seaImport == 1)
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="seaImport" id="seaImport" value="Sea Import" checked><label>Sea Import</label><br>
                                                        
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="seaImport" id="seaImport" value="
                                                        Sea Import"><label>Sea Import</label><br>
                                                        
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php 
                                                        if ($airImport == 1)
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="airImport" id="airImport" value="Air Import" checked><label>Air Import</label><br>

                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="airImport" id="airImport" value="Air Import"><label>Air Import</label><br>

                                                        <?php
                                                        }
                                                        ?>

                                                        <?php 
                                                        if ($seaExport == 1)
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="seaExport" id="seaExport" value="Sea Export" checked><label>Sea Export</label><br>

                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="seaExport" id="seaExport" value="Sea Export"><label>Sea Export</label><br>

                                                        <?php
                                                        }
                                                        ?>

                                                        <?php 
                                                        if ($airExport == 1)
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="airExport" id="airExport" value="Air Export" checked><label>Air Export</label>

                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>

                                                        <input type="checkbox" disabled name="airExport" id="airExport" value="Air Export"><label>Air Export</label>

                                                        <?php
                                                        }
                                                        ?>
				                                              	</div>

										</div>
										<div class="col-md-6">
                                <div class="input-label"><label >Telephone </label></div> 
                                <div class="input-feild">
                                                              <select class="mini_select_field" disabled name="telCode" id="telCode">
                                                                  <option value="<?php echo $telCode; ?>"><?php echo $telCode; ?></option>
                                                                  <option value="+92">+92</option>
                                                              </select>
                                                              <input class="mini_input_field" disabled type="number" name="telNumber" id="telNumber" value="<?php echo $telNumber; ?>">
                                                      </div>

                                                      <div class="input-label"><label >Website </label></div> 
                                                        <div class="input-feild">
                                                              <input type="text" placeholder="Website" disabled name="cmpWebsite" id="cmpWebsite" value="<?php echo $cmpWebsite; ?>">
                                                      </div> 
                                                      <div class="input-label"><label >Email Address </label></div> 
                                                        <div class="input-feild">
                                                              <input type="text" placeholder="Email Address" disabled name="cmpEmail" id="cmpEmail" value="<?php echo $cmpEmail; ?>">
                                                      </div>  

                                                      <div class="input-label"><label >Tax Number </label></div> 
                                                      <div class="input-feild">
                                                        <select class="mini_select_field" name="taxType" disabled id="taxType">
                                                            <option value="<?php echo $taxType; ?>"><?php echo $taxType; ?></option>
                                                            <option value="NTN NUmber">NTN Number</option>
                                                            <option value="STRN NUmber">STRN Number</option>
                                                        </select>
                                                        <input class="mini_input_field" type="number" disabled name="taxNo" id="taxNo" value="<?php echo $taxNo; ?>">
                                                      </div>

                                                      <div class="input-label"><label >SPO </label></div> 
                                                      <div class="input-feild">
                                                        <select name="txtSPO" id="txtSPO" disabled>
                                                          <option value="<?php echo $SPO; ?>"><?php echo $txtSPO; ?></option>
                                                        </select>
                                                      </div>

                                                      <div class="input-label"><label >IATA </label></div> 
                                                      <div class="input-feild">
                                                        <input type="text" name="txtIATA" id="txtIATA" maxlength="10" value="<?php echo $txtIATA; ?>" disabled>
                                                      </div>
                    </div>	 
								</div>
												<div class="cls"></div>
												<hr>
                        
                        <div class="form_sec_action_btn col-md-12">   
                           <a id="btnEnable" href="master_bp_E.php?bpID=<?php echo $newCode; ?>"> <small>Edit</small></a>
                        </div> 
                        <div class="col-md-12 topscrolbtn"> 
                          <a id="scroltop"><i class=" fa fa-arrow-up"></i><small>Back to Top</small></a>
                        </div> 
                                        </div>

		</form>
				
	</div>

</div>

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

<script type="text/javascript">
function sbtModFunc1()
{
	$("#addModal1").modal();
}
function svModFunc1()
{
  $("#saveModal1").modal();
}
</script>


<script>
$("#scroltop").click(function() {
    $("html").animate({ scrollTop: 0 }, "slow");
  });
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>