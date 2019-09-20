
<?php

include 'manage/connection.php';

?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="css/sidebar.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <script src="js/jquery.min.js"></script>
  <script src="js/sidebar.js"></script>

</head>

<body>
<?php include 'header.php';?>

<div class="page-wrapper symfra_theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
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


  <main class="page-content">
    <div class="container-fluid">
      <!-- <h2>Modules</h2> -->
      <!-- <hr> -->
      <div class="row">
            <div class=" page-content_most_used_module_sec col-md-12 ">

              <div class="page-content_most_used_module">
                <img src="images/account.jpeg">
                <label>Accounts</label>
              </div>

              <div class="page-content_most_used_module">
                <img src="images/analytics.jpeg">
                <label>Analytics</label>
              </div>

              <div class="page-content_most_used_module">
                <img src="images/activities.jpeg">
                <label>Activities</label>
              </div>

              <div class="page-content_most_used_module">
                <img src="images/leads.jpeg">
                <label>Leads</label>
              </div>

              <div class="page-content_most_used_module">
                <img src="images/oppertunities.jpeg">
                <label>Opportunities</label>
              </div>

              <div class="page-content_most_used_module">
                <img src="images/Territories.jpeg">
                <label>Territories</label>
              </div>
            </div>
      </div>
     <!--  <hr> -->
            
    </div>

  </main>



  <!-- page-content" -->
</div>
<!-- page-wrapper -->


    <script src="js/jquery-3.3.1.js"></script>

  
    
</body>

</html>