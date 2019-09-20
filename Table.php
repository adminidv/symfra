<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'> 
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

<link rel="shortcut icon" type="image/png" href="images/favicon.png">



</head>
<body>

<?php include 'header.php';?>

<div class="container-fluid">
	<div class="row">
		<div class="invoice_boxes">
				<h3>Invoices</h3>
				<div class="col-md-2">
					<div class="scand_inv inv_box">
						<h6>Scanned</h6>
						<div class="inv_contnt">
							<h3>0 <small>0-7</small></h3>
							<h3>0 <small>8-14</small></h3>
							<h3>100 <small>15</small></h3>
						</div>
				<i class="fa fa-angle-down"></i>
					</div>
				</div>
				<div class="col-md-2">
					<div class="rcnt_inv inv_box">
						<h6>Recent</h6>
						<div class="inv_contnt">
							<h3>70</h3>
						</div>
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
				<div class="col-md-2">
						<div class="hlds_inv inv_box">
						<h6>Holds</h6>
						<div class="inv_contnt">
							<h3>128<small>Validation</small></h3>
							<h3>73<small>Purchasing</small></h3>
							<h3>1<small>Other</small></h3>
						</div>
					<i class="fa fa-angle-down"></i>
						</div>
				</div>
				<div class="col-md-2">
						<div class="prpd_inv inv_box">
						<h6>Prepaid</h6>
						<div class="inv_contnt">
							<h3>2<small>0-30</small></h3>
							<h3>0<small>31-60</small></h3>
							<h3>24<small>61+</small></h3>
						</div>
					<i class="fa fa-angle-down"></i>
						</div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2"></div>
		</div>
	</div>
</div>
<button class="Button Button--outline" onclick="printData()">Print</button>
<div id="printTable" class="Table-sec">
	<table class="table table-striped table-bordered " id="myData">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
			</tr>
			
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
			</tr>
		</tfoot>
		<tbody>
			
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Saad</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>
			<tr><td>001</td><td>Nick</td><td>Abc@gmail.com</td><td>012345789</td><td>xyz road</td></tr>


			
		</tbody>

	</table>
</div>
<script >
	     function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
       
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

</body>
</html>