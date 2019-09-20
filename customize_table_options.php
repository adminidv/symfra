<!DOCTYPE html>
<html>
<head>
	<title>customize table option</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/customize_table_feilds.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/sidebar.js"></script>

</head>

<body>
	<?php include 'header.php';?>

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
 

<!--  <div class="panel panel-default" style="background-color:#fff; width: 800px; margin-left:15%;">
 --> 
 <div class="panel panel-default customize_table_sec" style="background-color:#fff; ">
    <div class="panel-body" >
       <div class="row">
       <div class="col-sm-5">
       <select name="from" id="multiselect_left" class="form-control" size="15" multiple="multiple">
       <optgroup label="Table Mandatory Fields">
       <option type="checkbox" value=1>Name</option>
       <option value=2>Email</option>
       <option value=4> Contact Number</option>
       <option value=4> Emergency Contact Number</option>
       <option value=5> Address</option>
       <option value=6> Date of Birth</option>
       <option value=7> Gender</option>
       </optgroup>
       <optgroup label=" Table Optional Fields">
       <option value=8>Department</option>
       <option value=9>Designation</option>
       <option value=10>Role</option>
       <option value=11>Active</option>
       <option value=11>Date Of Joining</option>
       <option value=11>Date Of Leaving</option>
       <option value=11>View</option>
       <option value=11>Edit</option>
       <option value=11>Delete</option>

       </optgroup>
       </select>
       </div>
    <div class="col-sm-2">
       <button type="button" id="btn_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
       <button type="button" id="btn_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
       <button type="button" id="btn_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
       <button type="button" id="btn_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
    </div>
        <div class="col-sm-5">
   <select name="from" id="multiselect_right" class="form-control" size="15" multiple="multiple">
   </select>
    <div class="row">
    <div class="col-xs-6">
    <button type="button" id="multiselect_move_up" class="btn btn-block"><i class="glyphicon glyphicon-arrow-up"></i></button>
    </div>
    <div class="col-xs-6">
    <button type="button" id="multiselect_move_down" class="btn btn-block col-sm-6"><i class="glyphicon glyphicon-arrow-down"></i></button>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>


<script>

  
          	$(function() {
            $('#btn_leftSelected').click(function () {
            // pass id select lists as parameters
            moveItemsToLeft('#multiselect_left', '#multiselect_right');
            });
            $('#btn_rightSelected').on('click', function () {
            moveItemsToRight('#multiselect_left', '#multiselect_right');
            });
            $('#btn_leftAll').on('click', function () {
            moveAllItemsToSource('#multiselect_left', '#multiselect_right');
            });

            $('#btn_rightAll').on('click', function () {
            moveAllItemsToDest('#multiselect_left', '#multiselect_right');
            });

            $('#btn_move_up').click(function(){
            moveUp('#multiselect_right');
            });

            $('#btn_move_down').click(function(){
            moveDown('#multiselect_right');
            });
            });

            function moveItemsToRight(sourseSelect, destSelect) { // move selected items from left to right select list
            $(destSelect).append($(sourseSelect+' option:selected').clone());
            $(sourseSelect+' option:selected').css("display", "none").removeAttr("selected");
            }

            function moveItemsToLeft(sourseSelect, destSelect) { // move back selected items from right to left select list
            $(destSelect+" option:selected").each(function() {
            $(sourseSelect+' option[value='+$(this).val()+']').show().removeAttr("selected");
            $(this).remove();
            });
            }

            function moveAllItemsToDest(sourseSelect, destSelect) { // move all items from left to right select list
            $(destSelect).append($(sourseSelect+' option').clone());
            $(sourseSelect+' option').css("display", "none").removeAttr("selected");
            $(destSelect+' option').filter(function() {
            if($(this).css("display") == "none"){
            $(this).remove();
            }

            });
            }

            function moveAllItemsToSource(sourseSelect, destSelect){ // move back all available items from right to left select list
            $(sourseSelect+' option').show().removeAttr("selected");
            $(destSelect+' option').remove();
            }

            function moveUp(destSelect){ // move selected items one step up in right select list
            var op = $(destSelect+' option:selected');
            op.first().prev().before(op);
            }

            function moveDown(destSelect){ // move selected items one step down in right select list
            var op = $(destSelect+' option:selected');
            op.last().next().after(op);
            }
</script>

    <script src="js/jquery-3.3.1.js"></script>

</body>
</html>