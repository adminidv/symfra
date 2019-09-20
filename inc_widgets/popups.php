<!DOCTYPE html>
<html>
<head>
	<title>Symfra_popups</title>
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/symfra_popups.css" type="text/css">
	<link rel="stylesheet" href="../css/font-awesome.css" type="text/css">

	<script src="../js/jquery-1.12.4.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="row">

		<div class="col-md-3">
	
			  <h4>Symfra Popup Example 1</h4>
			  <!-- Trigger the modal with a button -->
			  <button type="button"  data-toggle="modal" data-target="#popup_1">Submit</button>

			  <!-- Modal_one-->
			  <div class="modal fade symfra_popup1" id="popup_1" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
				          <p>Are You Sure You Want to Submit?.</p>
				          <button type="submit">Yes</button>
				          <button type="submit">No</button>

				        </div>
				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				      
				    </div>
			  </div>
		</div>	

		<div class="col-md-3">
	
			  <h4>Symfra Popup Example 2</h4>
			  <!-- Trigger the modal with a button -->
			  <button type="button"  data-toggle="modal" data-target="#popup_2">Submit</button>

			  <!-- Modal_one-->
			  <div class="modal fade symfra_popup2" id="popup_2" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
					        <div class="input-fields">	
					          <label>Label Here</label>	
					          <input type="text" name="" placeholder="Enter Here !">		
					        </div>

					        <div class="input-fields">	
					          <label>Label Here</label>	
					          <input type="text" name="" placeholder="Enter Here !">		
					        </div>

					         <div class="input-fields">	
						          <label>Select Here</label>	
						          <select>
						          	<option>1</option>
						          	<option>2</option>
						          	<option>3</option>

						          </select>		
					        </div>

				          <button type="submit">Submit</button>

				        </div>
				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				      
				    </div>
			  </div>
		</div>  

		<div class="col-md-3">
	
			  <h4>Symfra Popup Example 3</h4>
			  <!-- Trigger the modal with a button -->
			  <button type="button"  data-toggle="modal" data-target="#popup_3">Submit</button>

			  <!-- Modal_one-->
			  <div class="modal fade symfra_popup3" id="popup_3" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
				        	<div class="col-md-4">
				        	<p>Select Your Option</p>
				          <input type="checkbox" name="" value="Option 1" > <label>Option 1</label> <br>	
				          <input type="checkbox" name="" value="Option 2" > <label>Option 2</label> <br>
				          <input type="checkbox" name="" value="Option 3" > <label>Option 3</label> <br>
				          
				          

				        </div>
				        <div class="col-md-4">
				        <p>Select Your Option</p>
				          <input type="checkbox" name="" value="Option 1" > <label>Option 1</label> <br>	
				          <input type="checkbox" name="" value="Option 2" > <label>Option 2</label> <br>
				          <input type="checkbox" name="" value="Option 3" > <label>Option 3</label> <br>
				          
				          
				          </div>
				          <p>Select Your Option</p>
				          <input type="checkbox" name="" value="Option 1" > <label>Option 1</label> <br>	
				          <input type="checkbox" name="" value="Option 2" > <label>Option 2</label> <br>
				          <input type="checkbox" name="" value="Option 3" > <label>Option 3</label> <br>
				          
				          <button type="submit">Submit</button>

				        <div class="modal-footer">
				        	<p>Add Related content if needed</p>
				          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				        </div>
				      </div>
				      
				    </div>
			  </div>
		</div>
  	</div>
</div>

<script src="../js/bootstrap.min.js"></script>

</body>
</html>