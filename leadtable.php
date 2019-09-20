<!DOCTYPE html>
<html>
<head>
	<title>Lead Table</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/leadtable.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include 'header.php';?>


			<div class="Leadtable container">
				<div class="leadtabletitle">
					<h5>Lead Table</h5>
					<div class="leadcreatetbtn"><a href="create_lead.php">Create </a></div>
				</div>
					<table class="table table-striped table-bordered " >    
					        <thead>
					                    <tr>
					                    	<th>Lead ID</th>
					                        <th>Lead Name</th>
					                        <th>Customer Name</th>
					                        <th>Product Name</th>
					                        <th>Currency</th>
					                        <th>Primary Contact</th>
					                        <th>Budget Amount</th>
					                        <th>Lead Action</th>
					                        <th>Lead Check</th>

					                    </tr>
					        </thead>
					        <tbody>
					                    <tr>
					             			<td>1</td>
					                        <td> <a href="#">Lorem ipsum is dummy text</a> </td>
					                        <td>Adam Smith</td>
					                        <td>Pakacge 1</td>
					                        <td>$</td>
					                        <td>012345678</td>
					                        <td>100</td>
					                        <td> 
					                        	<select>
						                        	<option>Convert To Opportunity</option>
						                        	<option>Reject</option>
						                        	<option>Reassign</option>
						                        	<option>Retire</option>

					                        	</select> 
					                   		 </td>	
					                   		<td> <button>Check</button> </td> 			       
					                    </tr>

					                    <tr>
					                    	<td>2</td>
					                        <td> <a href="#">Lorem ipsum is dummy text</a> </td>
					                        <td>Adam Smith</td>
					                        <td>Pakacge 1</td>
					                        <td>$</td>
					                        <td>012345678</td>
					                        <td>500</td>
					                         <td> 
					                        	<select>
						                        	<option>Convert To Opportunity</option>
						                        	<option>Reject</option>
						                        	<option>Reassign</option>
						                        	<option>Retire</option>

					                        	</select> 
					                   		 </td>
					                   		<td> <button>Check</button> </td>  
					                    </tr>

					                    <tr>
					                    	<td>3</td>
					                        <td> <a href="#">Lorem ipsum is dummy text</a> </td>
					                        <td>Adam Smith</td>
					                        <td>Pakacge 1</td>
					                        <td>$</td>
					                        <td>012345678</td>
					                        <td>1200</td>
					                         <td> 
					                        	<select>
						                        	<option>Convert To Opportunity</option>
						                        	<option>Reject</option>
						                        	<option>Reassign</option>
						                        	<option>Retire</option>

					                        	</select> 
					                   		 </td>
					                   		<td> <button>Check</button> </td>  
					                    </tr>

					                    <tr>
					             			<td>4</td>
					                        <td> <a href="#">Lorem ipsum is dummy text</a> </td>
					                        <td>Adam Smith</td>
					                        <td>Pakacge 1</td>
					                        <td>$</td>
					                        <td>012345678</td>
					                        <td>700</td>
					                         <td> 
					                        	<select>
						                        	<option>Convert To Opportunity</option>
						                        	<option>Reject</option>
						                        	<option>Reassign</option>
						                        	<option>Retire</option>

					                        	</select> 
					                   		 </td>
					                   		<td> <button>Check</button> </td>  
					                    </tr>

					                    <tr>
					             			<td>5</td>
					                        <td> <a href="#">Lorem ipsum is dummy text</a> </td>
					                        <td>Adam Smith</td>
					                        <td>Pakacge 1</td>
					                        <td>$</td>
					                        <td>012345678</td>
					                        <td>400</td>
					                         <td> 
					                        	<select>
						                        	<option>Convert To Opportunity</option>
						                        	<option>Reject</option>
						                        	<option>Reassign</option>
						                        	<option>Retire</option>

					                        	</select> 
					                   		 </td>
					                   		<td> <button>Check</button> </td>  
					                    </tr>
					        </tbody>		     
					</table> 

					<div class="col-md-2">
						<div class="leadFtrcontnt">
							<h6><a href="#"> Unqualified Leads</a> <small>10</small> </h6>
							<h6><a href="#"> Qualified Leads</a> <small>7</small></h6>
							<h6><a href="#"> Retired Leads</a> <small>1</small></h6>
						</div>
					</div>
					<div class="col-md-4">
						 <div class="leadFtrcontnt">
							<h5><a href="#"> <b> Converted Leads</b></a> <small>50</small></h5>
						 </div>
					</div>

		 						 
			</div>		  
 </body>
</html>