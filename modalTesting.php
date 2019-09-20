<!DOCTYPE html>
<html>
<head>
  <title>Testing Modal</title>
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/symfra_forms.css">
    <link rel="stylesheet" type="text/css" href="css/main_box_widgets.css">
  <link rel="stylesheet" type="text/css" href="css/usertable.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
  <script src="js/jquery-3.3.1.js"></script>
  
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>

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

</body>


</html>