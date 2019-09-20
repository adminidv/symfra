<?php

include 'manage/connection.php';

$selectDept = mysqli_query($con, "select * from department ");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Department Table</title>
	<!-- <link rel="shortcut icon" type="image/png" href="images/favicon.png"> -->
<!-- 	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css"> -->


<!-- 	<script src="js/jquery-1.12.4.js"></script>
 -->
 <style type="text/css">
		
.user_table-title h4 {
    font-size: 15px;
    font-weight: 600;
    color: #034787;
    text-align: center;
}
.Usertable th {
    padding: 4px 0px !important;
    text-align: center;
/*    color: #034787;
*/    background: #fff;
}
.Usertable td {
    padding: 4px 0px !important;
    text-align: center;
    border: none !important;
}
.container.Usertable {
	width: 100%;
    background: #f3f3f3;
    box-shadow: 0px 0px 5px -4px;
    margin-top: 25px;
}
.user_create_btn{
	text-align: right;
}
.user_create_btn a {
    background-image: linear-gradient(to right top, #004e92, #06407c, #073367, #062653, #031a40, #031a40, #031a40, #031a40, #062653, #073367, #06407c, #004e92);
    color: #fff;
    padding: 5px 20px;
    margin: 5px 0;
    display: inline-block;
}
.user_create_btn a:hover {
    text-decoration: none;
    color: #fff;
}

</style>



</head>
<body>
	

<div class="container Usertable">
	<div class="row">

		<!-- <div class="col-md-12">
			<div class="user_create_btn">
					<a href="add_user.php">New User</a>
				</div>
		</div> -->

		<div class="col-md-12">
				<div class="user_table-title">
					<h4>Department Info Table</h4>
				</div>

				<div class="input-feild">
				<input type="text" id="myInput" placeholder="Search here..">
				</div>

				<table class="table table-striped table-bordered" id="myTable">
					        <thead>
					                    <tr>
					                    	<th>Department ID</th>
					                        <th>Title</th>				                     
					                        <th>Active</th>
					                    </tr>
					        </thead>
							      	<tbody>

							      		<?php

									    while ($rowDept = mysqli_fetch_array($selectDept))
									    {
									  	?>
							       		<tr>
							       			<td><?php echo $rowDept['dept_ID']; ?></td>
        									<td><?php echo $rowDept['dept_name']; ?></td>
							       			<td><input type="checkbox" checked disabled /></td>
							       		</tr>
							       		<?php
									    }
									  	?>

							       	</tbody>		     
				</table> 
		</div>

	</div>
</div>

<script>
$(document).ready(function(){
 $("#myInput").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTable tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
</script>

<!-- <script src="js/bootstrap.min.js"></script>
 -->
</body>
</html>