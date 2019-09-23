<?php

include('manage/connection.php');
include("manage/session.php");
$advSearch = 'Unide';
$ribbon = 'CoA';
$subRibbon = 'chartofAccounts';
$Quick = 'UnHide';
$Quickhr = 'Hide';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chart of Accounts</title>
	<link rel="shortcut icon" type="image/png" href="./images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
  <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
	<link rel="stylesheet" type="text/css" href="css/usertable.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
	<script src="js/jquery-3.3.1.js"></script>

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
	
  	<script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
<style>
	.slect-acnt-level {
    width: 15%;
    float: right;
    color: #05417e;
    padding: 10px 0 0 0;
    text-align: center;
}
.main_widget_box .nav-tabs > li > a {
    color: #05417e;
}
.nav-tabs {
	float: left;
    width: 85%;
    /* border: none !important; */
    border-bottom: 1px solid #ddd;
    background: #eee;
}
.widget_iner_box-child {
    width: 50%;
    margin: 30px 0px;
    float: left;
    padding: 15px 30px;
    background: #f3f3f3;
    border: 1px solid #E2e2e2;
}

ul, #myUL {
  list-style-type: none;
}
#myUL {
  margin: 0;
  padding: 0;
}
.caretcoa {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}
.caretcoa::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}
.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);  
}
.nested {
  display: none;
}
.active {
  display: block;
}

</style>

<script type="text/javascript">
  function showDiv1() {
    document.getElementById("widget_iner_box-child2").style.display = "block";
  }
  function showDiv2() {
    //document.getElementById("widget_iner_box-child2").style.display = "none";
    document.getElementById("secondWidget").style.display = "block";
  }
</script>

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
          <a href="Usermodules.php" class="btn btn-info">Financials</a>
          <a href="chart-of-accounts.php" class="btn btn-info active">Chart of Accounts</a>
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

           
           <?php include 'sidebar_widgets/user_advanced_search_widget.php'; ?>
                       <!-- sidebar-advanced-search_options  -->
           <?php include 'sidebar_widgets/user_form_quicklinks_widgets.php'; ?>
                          <!-- sidebar-menu  -->

      </div>
      <!-- sidebar-content  -->
 </nav>
  <!-- sidebar-wrapper  -->
</div>
<div class=" chart-account-sec main_widget_box">
	<div class="">
								
				<div class="acount_info widget_iner_box">
					
<button class="editEmpHst" id="editEmpHst" onclick="showUser('abc')">Div 1</button>
<button class="editEmpHst" id="editEmpHst" onclick="showUser2('xyz')">Div 2</button>

					<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home" id="asset" name="asset">Assets</a></li>
						  <li><a data-toggle="tab" href="#menu1">Liabilitites </a></li>
						  <li><a data-toggle="tab" href="#menu2">Capital & Reserves </a></li>
             	<li><a data-toggle="tab" href="#menu3">Turnover</a></li>
						  <li><a data-toggle="tab" href="#menu4">Cost of Sales</a></li>
						  <li><a data-toggle="tab" href="#menu4">Operating Costs</a></li>
						  <li><a data-toggle="tab" href="#menu4">Non-Operating Income & Expenditure </a></li>
					</ul>
              						
					<div class="tab-content">
						
					  <div id="home" class="tab-pane fade in active">
					  	
              <div class="widget_iner_box-child2" id="widget_iner_box-child2">


					  				
					  	</div>

              <div class="secondWidget" id="secondWidget">
                    
              </div>


					  		<div class="widget_iner_box-child" style="float: right;">
                            <?php

                              // Building connection
                              $con = mysqli_connect("localhost", "root", "")
                                or die("Error is: " . mysqli_error());

                              // Selecting DB
                              mysqli_select_db($con, "finance");

                              $selectLv1 = mysqli_query($con, "SELECT * FROM oact WHERE Levels='1' ");
  
                              // For Level 1
                              while($rowLv1 = mysqli_fetch_array($selectLv1))
                              {
                                $titleLv1 = $rowLv1['AcctName'];
                                $father1 = $rowLv1['AcctCode'];
                                $sendCode1 = $rowLv1['AcctCode'];
                                
                            ?>
                            <ul class="myUL">
                              <?php echo '<li onclick="showUser('.$father1.')"><span class="caretcoa">'.$titleLv1.'</span>'; ?>
                              
                                <ul class="nested">
                                  <?php
                                    // For Level 2
                                    $selectFather1 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father1."' ORDER BY AcctCode DESC ");
                                    while($rowLv2 = mysqli_fetch_array($selectFather1))
                                    {
                                      $titleLv2 = $rowLv2['AcctName'];
                                      $father2 = $rowLv2['AcctCode'];
                                      $sendCode2 = $rowLv2['AcctCode'];
                                  ?>

                                  <?php echo '<li onclick="showUser('.$father2.')"><span class="caretcoa">'.$father2 .' '. $titleLv2.'</span>'; ?>
                                    <ul class="nested">
                                      <?php
                                        // For Level 3
                                        $selectFather2 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father2."' ORDER BY AcctCode DESC ");
                                        while($rowLv3 = mysqli_fetch_array($selectFather2))
                                        {
                                          $titleLv3 = $rowLv3['AcctName'];
                                          $father3 = $rowLv3['AcctCode'];
                                      ?>

                                      <?php echo '<li onclick="showUser2('.$father3.')"><span class="caretcoa">'.$father3 .' '. $titleLv3.'</span>'; ?>
                                      <ul class="nested">
                                        <?php
                                          // For Level 4
                                          $selectFather3 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father3."' ORDER BY AcctCode DESC ");
                                          while($rowLv4 = mysqli_fetch_array($selectFather3))
                                          {
                                            $titleLv4 = $rowLv4['AcctName'];
                                            $father4 = $rowLv4['AcctCode'];
                                        ?>

                                        <?php echo '<li onclick="showUser2('.$father4.')"><span class="caretcoa">'.$father4 .' '. $titleLv4.'</span>'; ?>
                                        <ul class="nested">
                                          <?php
                                            // For Level 5
                                            $selectFather4 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father4."' ORDER BY AcctCode DESC ");
                                            while($rowLv5 = mysqli_fetch_array($selectFather4))
                                            {
                                              $titleLv5 = $rowLv5['AcctName'];
                                              $father5 = $rowLv5['AcctCode'];
                                          ?>

                                          <?php echo '<li onclick="showUser2('.$father5.')"><span class="caretcoa">'.$father5 .' '. $titleLv5.'</span>'; ?>
                                          <ul class="nested">
                                            <?php
                                              // For Level 6
                                              $selectFather5 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father5."' ORDER BY AcctCode DESC ");
                                              while($rowLv6 = mysqli_fetch_array($selectFather5))
                                              {
                                                $titleLv6 = $rowLv6['AcctName'];
                                                $father6 = $rowLv6['AcctCode'];
                                            ?>

                                            <?php echo '<li onclick="showUser2('.$father6.')"><span class="caretcoa">'.$father6 .' '. $titleLv6.'</span>'; ?>
                                            <ul class="nested">
                                              <?php
                                                // For Level 7
                                                $selectFather6 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father6."' ORDER BY AcctCode DESC ");
                                                while($rowLv7 = mysqli_fetch_array($selectFather6))
                                                {
                                                  $titleLv7 = $rowLv7['AcctName'];
                                                  $father7 = $rowLv7['AcctCode']; 
                                              ?>

                                              <li><span class="caretcoa"><?php echo $titleLv7; ?></span>
                                              <ul class="nested">
                                                <?php
                                                  // For Level 8
                                                  $selectFather7 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father7."' ORDER BY AcctCode DESC ");
                                                  while($rowLv8 = mysqli_fetch_array($selectFather7))
                                                  {
                                                    $titleLv8 = $rowLv8['AcctName'];
                                                    $father8 = $rowLv8['AcctCode'];
                                                ?>

                                                <li><span class="caretcoa"><?php echo $titleLv8; ?></span>
                                                <ul class="nested">
                                                  <?php
                                                    // For Level 9
                                                    $selectFather8 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father8."' ORDER BY AcctCode DESC ");
                                                    while($rowLv9 = mysqli_fetch_array($selectFather8))
                                                    {
                                                      $titleLv9 = $rowLv9['AcctName'];
                                                      $father9 = $rowLv9['AcctCode'];
                                                  ?>

                                                  <li><span class="caretcoa"><?php echo $titleLv9; ?></span>
                                                  <ul class="nested">
                                                    <?php
                                                      // For Level 10
                                                      $selectFather9 = mysqli_query($con, "SELECT * FROM oact WHERE FatherNum='".$father9."' ORDER BY AcctCode DESC ");
                                                      while($rowLv10 = mysqli_fetch_array($selectFather9))
                                                      {
                                                        $titleLv10 = $rowLv10['AcctName'];
                                                        $father10 = $rowLv10['AcctCode'];
                                                    ?>

                                                    <li><span class="caretcoa"><?php echo $titleLv10; ?></li></span>
                                                    
                                                    <?php
                                                    }
                                                    ?>

                                                  </ul>
                                                </li>
                                                  
                                                  <?php
                                                  }
                                                  ?>

                                                </ul>
                                              </li>
                                                
                                                <?php
                                                }
                                                ?>

                                              </ul>
                                            </li>
                                              
                                              <?php
                                              }
                                              ?>

                                            </ul>
                                          </li>
                                            
                                            <?php
                                            }
                                            ?>

                                          </ul>
                                        </li>
                                          
                                          <?php
                                          }
                                          ?>

                                        </ul>
                                      </li>
                                        
                                        <?php
                                        }
                                        ?>

                                      </ul>
                                    </li>
                                      
                                      <?php
                                      }
                                      ?>

                                    </ul>
                                  </li>

                                  <?php
                                  }
                                  ?>


                                </ul>
                              </li>
                            </ul>
                            
                            <?php
                              }
                            ?>
                  </div>

                  
					  </div>	

					</div>							
										<div class="cls"></div>
										<hr>
					
		</form>
				

	</div>
</div>


<script>
var toggler = document.getElementsByClassName("caretcoa");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>

<script type="text/javascript">
$(document).ready(function(){

  /*$(document).on('click', '.editEmpHst', function(){
  var SrNo = $(this).attr("id");
  $.ajax({
   url:"editEmployement.php",
   method:"post",
   data:{SrNo:SrNo},
   dataType:"json",
   success:function(data)
   {
    $('#widget_iner_box').html(data);
   }
  });
 });*/

 /*$('#editEmpHst').click(function(){
  
  
  $.ajax({
   url:"showCoA.php",
   method:"POST",
   success:function(data){
    $('#widget_iner_box').html(data);
   }
  });
 });*/

});
</script>

<script>
function showUser(str) {
        //document.getElementById("widget_iner_box-child2").style.display = "block";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("widget_iner_box-child3").style.display = "none"; 
                //document.getElementById("widget_iner_box-child2").style.display = "none";

                var testVar = "show";
                document.getElementById("secondWidget").style.display = "none";
                if (testVar == "show")
                {
                  document.getElementById("widget_iner_box-child2").style.display = "none";
                  document.getElementById("secondWidget").style.display = "none";
                  //document.write("Some test");
                  document.getElementById("widget_iner_box-child2").style.display = "block";
                  document.getElementById("widget_iner_box-child2").innerHTML = this.responseText;
                }

                



            }
        };
        xmlhttp.open("GET","showCoA.php?q="+str,true);
        xmlhttp.send();
    
}

function showUser2(str) {
        //document.getElementById("widget_iner_box-child2").style.display = "none";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                if (document.getElementById("widget_iner_box-child2").style.display != "none")
                {
                  document.getElementById("widget_iner_box-child2").style.display = "none";
                  document.getElementById("secondWidget").style.display = "block";
                  document.getElementById("secondWidget").innerHTML = this.responseText;
                  
                }
                
            }
        };
        xmlhttp.open("GET","showCoA2.php?q="+str,true);
        xmlhttp.send();
    
}
</script>

<script src="js/jquery.dataTables.min.js"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>