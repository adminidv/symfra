<!DOCTYPE html>
<html>
<head>
	<title>New Export</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" href="css/newexport.css" type="text/css">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body>

<?php include 'header.php';?>



<div class="container">
	<div class="row">
		<div class="export-frm-title">
			<div class="col-md-12">
				<h5>Air Export </h5>
			</div>
		</div>
	</div>
</div>

<div class="container master_customer_contnr">
	<div class="row">

			<div class="master_customer_colm col-md-6">			
						

						<div class="sec-title col-md-12">
							<label>Consignee</label>
						</div>
							<div class="col-md-9">
								<div class="input-feild">
									<label>Code</label>
									<input type="text" name="">
								</div>
							</div>
								<div class="col-md-3 ">		
									<div class="input-feild consildtion_dpdwn">
										<label>Consiladation</label>
										<select>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
							
							

							<div class="col-md-12">	
								<div class="input-feild">
									<label> Name</label>
									<input type="text" name="">
								</div>
							</div>	

							<div class="col-md-12">	
								<div class="input-feild">
									<label> Address</label>
									<textarea ></textarea>
								</div>
							</div>	
			</div>	


			<div class="master_customer_colm col-md-6">	

						<div class="sec-title col-md-12">
							<label>Airway Bill Details</label>
						</div>

							<div class="col-md-8">
								<div class="input-feild">
									<label>MAWB No.</label>
									<input type="text" name="">
								</div>
							</div>

							<div class="col-md-4">	
								<div class="input-feild exprt_typ_dpdwn">
									<label>Export Type</label>
									<select>
										<option>House Airway Bill</option>
										<option>Master Airway Bill</option>
									</select>
								</div>
							</div>	

							<div class="col-md-6 ownr_col">
									<div class="input-feild">
										<label>Owner</label>
										<div class="col-md-3">
											<input type="number" name="">
										</div>
										<div class="col-md-9">
											<input type="text" name="owner_name" disabled>
										</div>
										
									</div>
									<div class="input-feild">
										<label>Charge Code</label>
										<input type="text" name="">
									</div>
									<div class="input-feild">
										<label>Station</label>
										<input type="text" name="">
									</div>							
							</div>


							<div class="col-md-6">		
								<div class="input-feild">
									<label>Sale Date</label>
									<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
								</div>
								<div class="input-feild">
									<label>Awb Date</label>
									<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
								</div>
								<div class="input-feild">
									<label>Booking Date</label>
									<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
								</div>
							</div>				
			</div>	

			<div class="export-pro-table col-md-12">
				<div class="tble-btn">
					<button>Add row</button>
				</div>
					<table class="table table table-striped table-bordered ">
						 		<thead>
						                    <tr>
						                    	<th>Code</th>
						                    	<th>Agent Party</th>
						                    	<th>Name</th>
						                    	<th>Address</th>
						                    	<th>Rcp</th>
						                        <th>Commodity</th>
						                        <th>No of Pieces</th>
						                        <th>CI</th>
						                        <th>Chargeable Weight</th>
						                        <th>Rate</th>
						                        <th>Total Freight</th>
						                    </tr>
						        </thead>

						        <tbody>
						        	<tr>
						        		<td><input type="number" name="" class="prtycod_inpt"></td><td>Lorem Ipsum</td><td>Lorem Ipsum</td><td>xyz road</td><td>..</td><td>Lorem Ipsum</td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td>
						        	</tr>
						        	<tr>
						        		<td><input type="number" name="" class="prtycod_inpt"></td><td>Lorem Ipsum</td><td>Lorem Ipsum</td><td>xyz road</td><td>..</td><td>Lorem Ipsum</td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td>
						        	</tr>
						        	<tr>
						        		<td><input type="number" name="" class="prtycod_inpt"></td><td>Lorem Ipsum</td><td>Lorem Ipsum</td><td>xyz road</td><td>..</td><td>Lorem Ipsum</td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td>
						        	</tr>
						        	<tr>
						        		<td><input type="number" name="" class="prtycod_inpt"></td><td>Lorem Ipsum</td><td>Lorem Ipsum</td><td>xyz road</td><td>..</td><td>Lorem Ipsum</td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="number" name="" class="prtycod_inpt"></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td><td><input type="text" name=""  disabled></td>
						        	</tr>

						        </tbody>
					</table>
													<!-- <div class="col-md-12 KBchrgssec">
														<div class="col-md-12">
															<h4>Charges</h4>
														</div>
														<div class="col-md-3">
															<div class="input-feild">
																<label>Freight</label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Due Carrier</label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Due Agent</label>
																<input type="text" name="" disabled="">
															</div>
														</div>
														<div class="col-md-3">	
															<div class="input-feild">
																<label>Total K.B Amount </label>
																<input type="text" name="" disabled="">
															</div>


															<div class="input-feild">
																<label>Other Payable </label>
																<input type="text" name="" disabled="">
															</div>


															<div class="input-feild">
																<label>Gross Payable </label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Net Payable </label>
																<input type="text" name="" disabled="">
															</div>
														</div>
													</div> -->
			</div>


			<div class="export_form_tabs">
						
				<section id="tabs">
							<div class="container">
								<div class="row">
									<div class="col-md-12 ">
										<nav>
											<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

												<a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tranfer Information</a>

												<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Air Line KB </a>

												<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Charges</a>

												<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Other Information</a>



											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">

											<div class="tab-pane fade active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
												
												<div class="col-md-4">
													<div class="col-md-12">
														<div class="input-feild">
															<label>Airport Dep.</label>
															<input type="text" name="">
														</div>

														<div class="input-feild">
															<label>CC Port</label>
															<input type="text" name="">
														</div>
													</div>

													<div class="col-md-3">
														<div class="input-feild">
															<label>Currency</label>
															<select>
																<option>$</option>
																<option>Pkr</option>
																<option>£</option>
															</select>	
														</div>
													</div>
													
													<div class="col-md-9">
														<div class="input-feild">
															<label>Account No.</label>
															<input type="text" name="">
														</div>
													</div>	
												</div>

												<div class="col-md-4">

													<div class="input-feild">
														<div class="col-md-4">
															<label>To</label>
															<input type="text" name="">
														</div>
														<div class="col-md-4">
															<label>To</label>
															<input type="text" name="">
														</div>
														<div class="col-md-4">
															<label>To</label>
															<input type="text" name="">
														</div>
													</div>

													<div class="input-feild">
														<div class="col-md-4">
															<label>By</label>
															<input type="text" name="">
														</div>
														<div class="col-md-4">
															<label>By</label>
															<input type="text" name="">
														</div>
														<div class="col-md-4">
															<label>By</label>
															<input type="text" name="">
														</div>
													</div>

													<div class="input-feild">
														<div class="col-md-12">
															<label>Destination</label>
															<textarea></textarea>
														</div>			
													</div>		
												</div>

												<div class="col-md-4">

													<div class="input-feild">
														<div class="col-md-6">

															<label>Flight No.1</label>
															<input type="text" name="">

															<label>Flight No.2</label>
															<input type="text" name="">

															<label>Form "E" No</label>
															<input type="text" name="">

															<label>Ship. Inv No</label>
															<input type="text" name="">

														</div>
														<div class="col-md-6">
															<label>Date</label>
															<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
														</div>

														<div class="col-md-6">
															<label>Date</label>
															<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
														</div>

														<div class="col-md-6">
															<label>Date</label>
															<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
														</div>

														<div class="col-md-6">
															<label>Date</label>
															<input type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
														</div>
													</div>		
												</div>

												<div class="col-md-12">
													<div class="col-md-2">
														<div class="input-feild">
															<label>Job No.</label>
															<input type="number" name="">
														</div>
													</div>
													
													<div class="col-md-3">	
														<div class="input-feild">
															<label>Insurance</label>
															<input type="text" name="">
														</div>
													</div>

													<div class="col-md-4">	
														<div class="input-feild">
															<label>Declared Val Carriage</label>
															<input type="text" name="">
														</div>
													</div>	

													<div class="col-md-3">
															<div class="input-feild">
																<label>Declared Val Customs</label>
																<input type="text" name="">
															</div>
														
													</div>
												</div>											
											</div>

											<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
												
													<div class="col-md-3">
														<div class="col-md-12">
															<div class="input-feild">
																<label>Commission [Y/N]</label>
																<select>
																	<option>yes</option>
																	<option>no</option>

																</select>
															</div>

															<div class="input-feild">
																<label>K.B [Y/N]</label>
																<select>
																	<option>yes</option>
																	<option>no</option>

																</select>
															</div>

														</div>
													</div>

													<div class="col-md-3">
														<div class="col-md-12">
															<div class="input-feild">
																	<label>New Commodity</label>
																	<select>
																		<option>New</option>
																		<option>Old</option>
																	</select>
															</div>
															<div class="input-feild">
																	<label>New Rate [Y/N]</label>
																	<select>
																		<option>New</option>
																		<option>Old</option>

																	</select>
																	<select>
																		<option>NN</option>
																	</select>
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="col-md-3">
															<div class="input-feild">
																<label>Agreed Rate </label>
																	<input type="text" name="" disabled>
															</div>

															<div class="input-feild">
																	<label>Less: Commission</label>
																	<select>
																		<option>New</option>
																		<option>Old</option>
																	</select>
															</div>
														</div>

														<div class="col-md-3">
																<div class="input-feild">
																	<label>Agreed Freight </label>
																		<input type="text" name="" disabled>
																</div>

																<div class="input-feild">
																	<label> Freight Difference</label>
																		<input type="text" name="" disabled>
																</div>
														</div>

														<div class="col-md-3">
																<div class="input-feild">
																	<label>K.B Freight </label>
																		<input type="text" name="" disabled>
																</div>

																<div class="input-feild">
																	<label> K.B Rate(%)</label>
																		<input type="text" name="" disabled>
																</div>
														</div>

														<div class="col-md-3">
																<div class="input-feild">
																	<label>K.B Amount  </label>
																		<input type="text" name="" disabled>
																</div>

																<div class="input-feild">
																	<label> AirLine Sector</label>
																		<input type="text" name="" disabled>
																</div>
														</div>
													</div>


													<div class="col-md-12 KBchrgssec">
														<div class="col-md-12">
															<h4>Charges</h4>
														</div>
														<div class="col-md-3">
															<div class="input-feild">
																<label>Freight</label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Due Carrier</label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Due Agent</label>
																<input type="text" name="" disabled="">
															</div>
														</div>
														<div class="col-md-3">	
															<div class="input-feild">
																<label>Total K.B Amount </label>
																<input type="text" name="" disabled="">
															</div>


															<div class="input-feild">
																<label>Other Payable </label>
																<input type="text" name="" disabled="">
															</div>


															<div class="input-feild">
																<label>Gross Payable </label>
																<input type="text" name="" disabled="">
															</div>

															<div class="input-feild">
																<label>Net Payable </label>
																<input type="text" name="" disabled="">
															</div>
														</div>
													</div>

											</div>

											<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="			nav-contact-tab">
													<div class="col-md-4">
															<div class="input-feild">
																<label>Due Carrier</label>
																<input type="text" name="">
															</div>
															<div class="input-feild">
																<label>CAA Charges</label>
																<input type="text" name="">
															</div>
															<div class="input-feild">
																<label>AWC Charges</label>
																<input type="text" name="">
															</div>

															<div class="input-feild">
																<label>Security Charges</label>
																	<div class="col-md-2 inr_col">
																	<select>
																		<option>CW</option>
																	</select>
																	</div>
																	<div class="col-md-10 inr_col">
																		<input type="text" name="">
																	</div>
															</div>

															<div class="input-feild">
																<label>Fuel Surcharge</label>

																<div class="col-md-2 inr_col">
																<select>
																	<option>CW</option>
																</select>
																</div>

																<div class="col-md-10 inr_col">
																<input type="text" name="">
																</div>
															</div>

															<div class="input-feild">

																<label>Scaning Charges</label>
																	<div class="col-md-2 inr_col">
																		<select>
																			<option>CW</option>
																		</select>
																	</div>	
																	<div class="col-md-10 inr_col">
																		<input type="text" name="">
																	</div>
															</div>												
													</div>

													<div class="col-md-8">
														<div class="chrge_tble-one">
															<table class="table table-bordered table-striped">

																<thead>
																	<th></th>
																	<th>Rate</th>
																	<th>Charges</th>
																</thead>

																<tbody>
																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""><select><option>CW</option></select></td>
																		<td><input type="text" name="" disabled></td>
																</tr>

																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""><select><option>CW</option></select></td>
																		<td><input type="text" name="" disabled></td>
																</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<td></td>
																		<th style="text-align: right;">Total Due Carrier</th>
																		<th><input type="text" name="" disabled class="duecariertotl"></th>

																	</tr>
																</tfoot>

															</table>
														</div>

														<div class="chrge_tble-two">
															<table class="table table-bordered table-striped">

																<thead>
																	<th style="text-align:right;">AWA Fee</th>
																	<th>Charges</th>
																	<th>Print On AWB</th>
																</thead>

																<tbody>
																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""></td>
																		<td></td>
																</tr>

																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""></td>
																		<td><input type="text" name="" disabled></td>
																</tr>
																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""></td>
																		<td><input type="text" name="" disabled></td>
																</tr>
																<tr>
																		<td><input type="number" name="" class="chrge_num_inpt1"> <input type="text" name=""></td>
																		<td><input type="text" name=""></td>
																		<td><input type="text" name="" disabled></td>
																</tr>
																</tbody>
																<tfoot>
																	<tr>									
																		<th style="text-align: right;">Total</th>
																		<th><input type="text" name="" disabled class="dueagnttotl"></th>
																		<td></td>

																	</tr>
																</tfoot>

															</table>
														</div>

													</div>

											</div>


												<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
											
													</div>
										</div>
									
									</div>
								</div>
							</div>
				</section>

			</div>

			
	</div>
</div>













<script>
			function openCity(evt, cityName) {
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
			    tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
			    tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
</script>



























		<!-- datepicker script -->
		<script type="text/javascript">
			
						webshim.setOptions('forms-ext', {
						    replaceUI: 'auto',
						    types: 'date',
						    date: {
						        startView: 2,
						        inlinePicker: true,
						        classes: 'hide-inputbtns'
						    }
						});
						webshim.setOptions('forms', {
						    lazyCustomMessages: true
						});
						//start polyfilling
						webshim.polyfill('forms forms-ext');

						//only last example using format display
						$(function () {
						    $('.format-date').each(function () {
						        var $display = $('.date-display', this);
						        $(this).on('change', function (e) {
						            //webshim.format will automatically format date to according to webshim.activeLang or the browsers locale
						            var localizedDate = webshim.format.date($.prop(e.target, 'value'));
						            $display.html(localizedDate);
						        });
						    });
						});
		</script>
		<!-- datepicker script end -->


</body>
</html>