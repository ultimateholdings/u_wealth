<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/insurancebookhealth.css">
</head>
<body>
	<?php include 'header.php' ?>
<section class="main">
	<div class="col-lg-10 mx-auto ">
		<div class="content" >
			<div class=" heading">
				<h3>Health Policy Proposal</h3>
			</div>
			<form class="text-center" style="padding-top: 30px;" id="form1" action="<?php echo base_url();?>healthinsurance/verifyProposalInfo"  method="post">
			<div class="maincon">
				<div>
				<input type="hidden" name="totalAmount" value="<?php echo $totalAmount ?>"></input>
				<input type="hidden" name="city" value="<?php echo $city ?>"></input>
				<input type="hidden" name="supplierName" value="<?php echo $supplierName ?>"></input>
				<input type="hidden" name="members" value="<?php echo $members ?>"></input>
				<input type="hidden" name="sumAssured" value="<?php echo $sumAssured ?>"></input>
				<input type="hidden" name="planName" value="<?php echo $planName ?>"></input>
				<input type="hidden" name="addOn" value="<?php echo $addOn ?>"></input>
				<input type="hidden" name="transactionId" value="<?php echo $transactionId ?>"></input>	
				<input type="hidden" name="addOnDetails" value="<?php echo $addOnDetails ?>"></input>
				<input type="hidden" name="propfname" value="<?php echo $propfname ?>"></input>
				<input type="hidden" name="proplname" value="<?php echo $proplname ?>"></input>
				<input type="hidden" name="propGender" value="<?php echo $propGender ?>"></input>
				<input type="hidden" name="propOccupation" value="<?php echo $propOccupation ?>"></input>
				<input type="hidden" name="propRelation" value="<?php echo $propRelation ?>"></input>
				<input type="hidden" name="propNominee" value="<?php echo $propNominee ?>"></input>
				<input type="hidden" name="propNomineeAge" value="<?php echo $propNomineeAge ?>"></input>
				<input type="hidden" name="propPAN" value="<?php echo $propPAN ?>"></input>
				<input type="hidden" name="propAadhar" value="<?php echo $propAadhar ?>"></input>
				<input type="hidden" name="propMartial" value="<?php echo $propMartial ?>"></input>
				<input type="hidden" name="propDOB" value="<?php echo $propDOB ?>"></input>
				<input type="hidden" name="propNomineeRelation" value="<?php echo $propNomineeRelation ?>"></input>
				<?php
					$i = 0;
					for($i=0;$i<$totalInsurer;$i++) { ?>
					
				<input type="hidden" name="<?php echo 'member'.$i ?>"  value="<?php $member='member'.$i; echo $$member ?>"></input>
				<input type="hidden" name="<?php echo 'fname'.$i ?>"  value="<?php  $fname='fname'.$i; echo $$fname  ?>"></input>
				<input type="hidden" name="<?php echo 'lname'.$i ?>"  value="<?php  $lname='lname'.$i; echo $$lname  ?>"></input>
				<input type="hidden" name="<?php echo 'gender'.$i ?>"  value="<?php $gender='gender'.$i; echo $$gender ?>"></input>
				<input type="hidden" name="<?php echo 'relation'.$i ?>"  value="<?php  $relation='relation'.$i; echo $$relation  ?>"></input>
				<input type="hidden" name="<?php echo 'occupation'.$i ?>"  value="<?php $occupation='occupation'.$i; echo $$occupation  ?>"></input>
				<input type="hidden" name="<?php echo 'height'.$i ?>"  value="<?php $height='height'.$i; echo $$height  ?>"></input>
				<input type="hidden" name="<?php echo 'weight'.$i ?>"  value="<?php $weight='weight'.$i; echo $$weight  ?>"></input>
				<input type="hidden" name="<?php echo 'pan'.$i ?>"  value="<?php $pan='pan'.$i; echo $$pan  ?>"></input>
				<input type="hidden" name="<?php echo 'adhar'.$i ?>"  value="<?php $adhar='adhar'.$i; echo $$adhar  ?>"></input>
				<input type="hidden" name="<?php echo 'martialStatus'.$i ?>"  value="<?php $martialStatus='martialStatus'.$i; echo $$martialStatus  ?>"></input>
					
				<?php
					} ?>	
				<input type="hidden" name="totalInsurer"  value="<?php echo $totalInsurer ?>"></input>
				</div>
				<div class="row top" style="text-align:left;">
					<div class="col-lg-6 col-sm-12">
						<p ><span class="name">Search Criteria</span> <span class="r"><b>Premium</b></span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p>
							<i class="fa fa-rupee">&nbsp;<?php echo $totalAmount ?></i>
							<input type="hidden" name="totalAmount" value="<?php echo $totalAmount ?>"></input>
						</p>
					</div>
				</div>
				<br>
				<div class="row data">
					<div class="col-lg-5 col-sm-12">
						<ul style="color: black">
							<li><p><span><b>Zone</b></span>&emsp;&nbsp;&nbsp;&nbsp;------>&emsp;<?php echo $city ?></p></li><br />
							<li><p><span><b>Insurer</b></span>&emsp;------>&emsp;<?php echo $supplierName ?><br/>&nbsp;&nbsp;<p>&emsp;&emsp;<?php echo $members ?></p></li>
						</ul>
						
					</div>
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span><b>Sum Insured</b></span>&emsp;------>&emsp;<?php echo $sumAssured ?></p></li><br />
							<li><p><span><b>Plan Details</b></span>&emsp;------>&emsp;<?php echo $planName ?></p></li>
						</ul>
					</div>
					<div class="col-lg-2 col-sm-12">
						<img class="img-fluid" src="https://resources.ibe4all.com/insurance/images/new_india.jpg">
					</div>
				</div>
				<div class="addon-section" style="text-align:left;">
					<div class="col-lg-12">
						<div id="sh">
							<p>Addons Details</p>
						</div>
						<?php if($addOnDetails==null){?>
						<p class="notify">No Addon Selected</p>
						<?php } else { ?>
						<?php echo $addOnDetails;} ?>						
						<div></div>
						<div id="arrow" class="col-md-12 pro">
							<div class="col-md-3 offset-0"></div>
							<div class="progressmain">
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<!--<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar1.png"><span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">-->
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQplPu-nCxbDFkwDY7xFZ_8EEeyVHrfFUIzmg&usqp=CAU" width="40px" hight="40px"><span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">					
									
									Proposar details</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<!--<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar2.png"> -->
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQplPu-nCxbDFkwDY7xFZ_8EEeyVHrfFUIzmg&usqp=CAU" width="40px" hight="40px">
									<span id="spn1" class="arrowtext tr" style= key="Contact Information">Insurer Details</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar3.png">
									<span id="spn1" class="arrowtext tr" style= key="Contact Information">Contact Information</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar4.png"><span id="spn1" class="arrowtext tr" style= key="Payment Gateway">Verify Proposal </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<section class="details2" id="next"  >
					<div id="sh"style="text-align:left;">
						<p>Contact And Other Details</p>
					</div>
					<div style="text-align:left;"><span class="pname">Permanent Address</span></div>
					        <div class="row" style="padding-left: 20px;padding-right: 20px">
						  		<div class="col-lg-12 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="address" required><span class="highlight"></span><span class="bar"></span>
						    				<label style="text-align:left;">Enter Address*</label>
						  				</div>
						  		</div>
							</div>
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="city" required><span class="highlight"></span><span class="bar"></span>
						    				<label>City</label>
						  				</div>
						  		</div>
								<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="state" required><span class="highlight"></span><span class="bar"></span>
						    				<label>State</label>
						  				</div>
						  		</div>
								<div class="col-lg-4 col-sm-12">
					  				<div class="group">
					  					<input type="number" name="pincode" required><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Pincode*</label>
					  				</div>
					  			</div>
					  	</div>
						<div class="row" style="padding-left: 20px;padding-right: 20px">
						<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="number" name="mobileNumber" required><span class="highlight"></span><span class="bar"></span>
						    				<label>Mobile Number*</label>

						  				</div>
						  		</div>
						  		<div class="col-lg-4 col-sm-12">
							  			<div class="group">
							    			<input type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><span class="highlight"></span><span class="bar"></span>
							    				<label>Email*</label>
							  				</div>
						  		</div>
								
					  	</div>
							<div class="privacy" id="primary"style="text-align:left;">
						<br>
						<div >
						<span class="pname">Previous Policy Details</span></div>
						<br>
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text"  name="policyNumber" id="policyNumber"><span class="highlight"></span><span class="bar"></span>
						    				<label>Previous Policy Number</label>
						  				</div>
						  			</div>	
								  
								  	<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						  					<input type="text" name="previousInsurer" id="previousInsurer" ><span class="highlight"></span><span class="bar"> </span>
							    				<label>Previous Insurer</label>
						  				</div>
					  				</div>
									<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						  					<input type="date" id="policyExpiry" name="policyExpiry" ><span class="highlight"></span><span class="bar"> </span>
							    				<label>Previous Policy Expiry</label>
						  				</div>
					  				</div>
								  </div>
					</div> 
					<div class="privacy" id="primary"style="text-align:left;">
						<br>
						<div >
						<span class="pname">Other Details</span></div>
						<br>
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text"  name="GSTNumber" id="GSTNumber"><span class="highlight"></span><span class="bar"></span>
						    				<label>GST Number</label>
						  				</div>
						  			</div>	
								  </div>
					</div> 
					<div class="button">
						<button class="btn btn-lg btn-success" id="nextBtn">Next</button> 
				  	</div>
				</section>
			</div>
		</div>
		</form>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>