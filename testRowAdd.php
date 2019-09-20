<!DOCTYPE html>
<html>
<head>
  <title>Row Addition on Plus Button</title>

  <!-- <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="js/bootstrap.min.css" />
  <script src="js/bootstrap.min.js"></script> -->

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

  <!-- Bread crumbs starting here -->
  <link rel="stylesheet" href="css/breadCrumb.css" type="text/css">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/modules.css" type="text/css">
  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">
  <!-- Bread crumbs ending here -->
  
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.min.js"></script>

 <style type="text/css">
  
  .tbleDrpdown ul {
   padding: 0;
}
.tbleDrpdown {
   display: inline-block;
   float: left;
   position: relative;
   top: 33px;
   z-index: 999;
}
#dpttable ul li {
   list-style: none;
   display: inline-block;
}
.tbleDrpdown button {
   color: #031a40;
   background: none;
   border: none;
}

#dpttable_length {
    float: right;
    margin: 3px 10px;
}

 </style>   
</head>

<body>

    <div class="leave-manage-sec-table widget_iner_box ">
        
      <table  id="dpttable" class="display nowrap no-footer" style="width:100%">
        <thead>
          <tr>
            <th>Depart ID</th>
            <th>Depart ID</th>
            <th>Depart Name</th>
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

      <div align="right">
       <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
      </div>

    </div>

<script>
$(document).ready(function(){
 var count = 2;

 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td><input type='text' name=''></td>";
   html_code += "<td><input type='text' name=''></td>";
   html_code += "<td><input type='text' name=''></td>"
   
   // html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#dpttable').append(html_code);
 });
 
});
</script>

</body>
</html>
