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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php include 'header.php' ?>
<section class="main">
	<div class="col-lg-10 mx-auto ">
		<div class="content" >
			<div class=" heading">
				<h3>Health Policy Proposal</h3>
			</div>
			<div class="maincon">
			
			<form class="text-center" style="padding-top: 30px;" id="form1" action="<?php echo base_url();?>healthinsurance/getContactInfo" method="post">
				<div>
					<input type="hidden" name="transactionId" value="<?php echo $transactionId ?>"></input>
					<input type="hidden" name="totalAmount" value="<?php echo $totalAmount ?>"></input>
					<input type="hidden" name="city" value="<?php echo $city ?>"></input>
					<input type="hidden" name="supplierName" value="<?php echo $supplierName ?>"></input>
					<input type="hidden" name="sumAssured" value="<?php echo $sumAssured ?>"></input>
					<input type="hidden" name="planName" value="<?php echo $planName ?>"></input>
					<input type="hidden" name="members" value="<?php echo $members ?>"></input>
					<input type="hidden" name="addOn" value="<?php echo $addOn ?>"></input>
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
				</div>
				<div class="row top"  style="text-align:left;">
				
					<div class="col-lg-6 col-sm-12">
						<p ><span class="name">Search Criteria</span> <span class="r"><b>Premium</b></span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p>
							<i class="fa fa-rupee">&nbsp;<?php echo $totalAmount ?></i><span class="r"></span>
						</p>
					</div>
				</div>
				<br>
				<div class="row data">
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span><b>Zone</b></span>&emsp;&nbsp;&nbsp;&nbsp;------>&emsp;<?php echo $city ?></p></li><br />
							<li><p><span><b>Insurer</b></span>&emsp;------>&emsp;<?php echo $supplierName ?><br/>&nbsp;&nbsp;<p>&emsp;&emsp;<?php echo $members ?></p></li>
						</ul>
						
					</div>
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span><b>Sum Insured</b></span>&emsp;------>&emsp;<?php echo $sumAssured ?>&nbsp;&nbsp;</p></li><br />
							<li><p><span><b>Plan Details</b></span>&emsp;------>&emsp;<?php echo $planName ?></p></li>
						</ul>
					</div>
					<div class="col-lg-2 col-sm-12">
						<img class="img-fluid" src="https://resources.ibe4all.com/insurance/images/new_india.jpg">
					</div>
				</div>
				<div class="addon-section"  style="text-align:left;">
					<div class="col-lg-12">					
						<div id="sh">
							<p>Addons Details</p>
						</div>
						<?php if($addOnDetails==null){?>
						<p class="notify">No Addon Selected</p>
						<?php } else { ?>
						<?php echo $addOnDetails; } ?>				
						<div></div>
						 <div id="arrow" class="col-md-12 pro">
							<div class="col-md-3 offset-0"></div>
							<div class="progressmain">
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<!--<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar1.png"> -->
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQplPu-nCxbDFkwDY7xFZ_8EEeyVHrfFUIzmg&usqp=CAU" width="40px" hight="40px">
									<span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">Proposar details</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar2.png"><span id="spn1" class="arrowtext tr" style= key="Contact Information">Insurer Details</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar3.png"><span id="spn1" class="arrowtext tr" style= key="Contact Information">Contact Information</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar4.png"><span id="spn1" class="arrowtext tr" style= key="Payment Gateway">Verify Proposal</span>
								</div>
							</div>
						</div> 
					</div>
				</div>
				<section class="details" id="maindetails">
					<div class="insured-details" style="text-align:left;">
						 <div id="sh">
						<p>Insured Details</p>
						<input type="hidden" name="memebers" value="<?php echo $members ;?>"></input>
						</div>
						<?php								
								if($members!=null){
								$array=explode("<br>",$members);
								if(count($array)!=0)
								{
								$i=0;
								foreach($array as $value)
								{
								$arrayValue=explode('----',$value);?>
								<div class="cd">
								<div><span class="cname"><?php echo $arrayValue[0] ?></span>
								<input type="hidden" name="<?php echo 'member'.$i ?>" value="<?php echo $arrayValue[0] ?>">
								</div>
								<div class="row" style="padding-left: 20px;padding-right: 20px">
									<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="<?php echo 'fname'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
						    				<label>First Name*</label>
						  				</div>
						  			</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" name="<?php echo 'lname'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
							    				<label>Last Name*</label>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select name="<?php echo 'gender'.$i ?>" required>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Gender*</option>
							    				<option value="Male">Male</option>
							    				<option value="Female">Female</option>
							    				</select>
							  				</div>
						  				</div>	
										</div><div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<select name="<?php echo 'relation'.$i ?>" required>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Relation</option><option value="Self">Self</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Son">Son</option><option value="Daughter">Daughter</option>
								    			</select>
								  				</div>
							  			</div>
							  			<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<select name="<?php echo 'occupation'.$i ?>">
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Occupation</option><option value="Agriculturalist">Agriculturalist</option><option value="Business">Business</option><option value="Central Government">Central Government</option><option value="House wife">House wife</option><option value="Pensioner">Pensioner</option><option value="Private Sector">Private Sector</option><option value="Professional">Professional</option><option value="Public Sector">Public Sector</option><option value="Retired">Retired</option><option value="Rural Artisan">Rural Artisan</option><option value="Salaried">Salaried</option><option value="Self Employed">Self Employed</option><option value="Service">Service</option><option value="State Government">State Government</option><option value="Student">Student</option>
								    			</select>
							  				</div>
							  			</div>
							  			<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" name="<?php echo 'height'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
								    				<label>Height (In CM)*</label>
								  				</div>
								  		</div>
						  		</div>							  		
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
							  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" name="<?php echo 'weight'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
							    				<label>Weight (In KG)*</label>
							  				</div>
							  		</div>
							  		<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="<?php echo 'pan'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter PAN Number*</label>
						  				</div>
						  			</div>
						  		
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" name="<?php echo 'adhar'.$i ?>" required><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter Aadhar Number*</label>
							  				</div>
						  				</div>
						  		</div>
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
						  			<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select name="<?php echo 'martialStatus'.$i ?>">
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Unmarried">Unmarried</option><option value="Widowed">Widowed</option><option value="Divorced">Divorced</option><option value="Separated">Separated</option></select>
							    				</select>
							  				</div>
						  				</div>
						  		</div>
								<?php $i++; }?>
								<input type="hidden" name="totalInsurer" value="<?php echo $i ?>"></input>
								<?php }
								}
								?>
						  		<div class="button">
									<button class="btn btn-lg btn-success" id="nextBtn">Next</button> 
				  				</div>
								
							</form>
					</div>
				</section>
			</div>
		</div>
		</form>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>