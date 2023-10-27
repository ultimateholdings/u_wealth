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
<script>
function myFunction() {
  document.getElementById("next").style.display = "block";
   document.getElementById("maindetails").style.display = "none";
}
function myFunctionnext() {
  document.getElementById("question").style.display = "block";
   document.getElementById("next").style.display = "none";
}
</script>

<script>
$(document).ready(function(){
  $("#nextBtn").click(function(){
	 //$("#form1").validate();
	  $("#question").style.display = "block";
		$("#next").style.display = "none";
    });
}); 
});
</script>
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
			
				<div class="row top">
				
					<div class="col-lg-6 col-sm-12">
						<p ><span class="name">Search Criteria</span> <span class="r">Premium</span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p>
							<i class="fa fa-rupee">&nbsp;3250</i><span class="r"><button class="btn btn-sm btn-warning"><a  class="go" href="">Go Back</a></button></span>
						</p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span>Zone</span><span class="des">------>&nbsp;&nbsp;CHINTAMANI</span></p></li>
							<li><p><span>Insurer</span><span class="des">------>&nbsp;&nbsp;<?php echo $supplierName ?></span><br/>&nbsp;&nbsp;<p>&emsp;&emsp;<?php echo $members ?></p></li>
						</ul>
						
					</div>
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span>Sum Insured</span><span class="des">------>&nbsp;&nbsp;<?php echo $sumAssured ?></span></p></li>
							<li><p><span>Plan Details</span><span class="des">---->&nbsp;&nbsp;<?php echo $planName ?></span></p></li>
							<!--<li><p><span></span><span class="des">------&nbsp;&nbsp;</span></p></li>
							<li><p><span></span><span class="des">-----&nbsp;&nbsp;</span></p></li>
							<li><p><span></span><span class="des">-----&nbsp;&nbsp;</span></p></li>-->
						</ul>
					</div>
					<div class="col-lg-2 col-sm-12">
						<img class="img-fluid" src="https://resources.ibe4all.com/insurance/images/new_india.jpg">
					</div>
				</div>
				<br><br>
				<div class="addon-section">
					<div class="col-lg-12">
						<div id="sh">
							<p>Addons Details</p>
						</div>
						<?php if($addOn==null){?>
						<p class="notify">No Addon Selected</p>
						<?php } else { ?>
						<?php foreach ($addOn as $addOnSelected){ 
                           echo $addOnSelected."<br />";
                        } echo "<br/><br/>";}  ?>						
						<div></div>
						<div id="arrow" class="col-md-12 pro">
							<div class="col-md-3 offset-0"></div>
							<div class="progressmain">
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar1.png"><span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">Proposal Form</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar2.png"><span id="spn1" class="arrowtext tr" style= key="Contact Information">Contact Information</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar3.png"><span id="spn1" class="arrowtext tr" style= key="Contact Information">Medical History</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar4.png"><span id="spn1" class="arrowtext tr" style= key="Payment Gateway">Payment Gateway</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<section class="details" id="maindetails">
					<div class="proposer-details">
						<div id="sh">
							<p>Proposer Details</p>
						</div>
						<div><span class="fname">Please use the name mentioned in the RC copy of your Vehicle</span>
						</div>
						<form action="#primary" method="post" class="mainform" id="form1"> 
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="propfname" required=""><span class="highlight"></span><span class="bar"></span>
						    				<label>First Name*</label>
						  				</div>
						  	</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" name="proplname" required=""><span class="highlight"></span><span class="bar"></span>
							    				<label>Last Name*</label>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option>Gender*</option>
							    				<option>Male</option>
							    				<option>Female</option>
							    				</select>
							  				</div>
						  				</div>
					  	</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
									<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Occupation</option><option value="Agriculturalist">Agriculturalist</option><option value="Business">Business</option><option value="Central Government">Central Government</option><option value="House wife">House wife</option><option value="Pensioner">Pensioner</option><option value="Private Sector">Private Sector</option><option value="Professional">Professional</option><option value="Public Sector">Public Sector</option><option value="Retired">Retired</option><option value="Rural Artisan">Rural Artisan</option><option value="Salaried">Salaried</option><option value="Self Employed">Self Employed</option><option value="Service">Service</option><option value="State Government">State Government</option><option value="Student">Student</option>
								    			</select>
							  				</div>
							  		</div>
							  				<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								  					<input type="date" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label></label>
								  				</div>
							  				</div>
							  				<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Relation</option><option value="Self">Self</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Son">Son</option><option value="Daughter">Daughter</option>
								    				</select>
								  				</div>
							  				</div>
					  		</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
									<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter Nominee*</label>
							  				</div>
							  	</div>
							  				<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								  					<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Nominee Relation*</option><option value="Brother">Brother</option><option value="Child">Child</option><option value="Daughter">Daughter</option><option value="Employee">Employee</option><option value="Father">Father</option><option value="Father-in-law">Father-in-law</option><option value="Husband">Husband</option><option value="Mother">Mother</option><option value="Mother-in-law">Mother-in-law</option><option value="Partner">Partner</option><option value="Self">Self</option><option value="Sister">Sister</option><option value="Son">Son</option><option value="Wife">Wife</option></select>
								  				</div>
							  				</div>
							  				<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Enter Nominee Age*</label>
								  				</div>
							  				</div>
					  		</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
									<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter PAN Number*</label>
							  				</div>
							  	</div>
				  				<div class="col-lg-4 col-sm-12">
					  				<div class="group">
					    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
					    				<label>Enter Aadhar Number*</label>
					  				</div>
				  				</div>
				  				<div class="col-lg-4 col-sm-12">
					  				<div class="group">
					  					<select>
					    				<span class="highlight"></span><span class="bar"></span>
					    				<option value="">Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Unmarried">Unmarried</option><option value="Widowed">Widowed</option><option value="Divorced">Divorced</option><option value="Separated">Separated</option></select>
					    				</select>
					  				</div>
				  				</div>
					  		</div>
						<!--</form> -->
					</div>
					<div class="insured-details">
						<div id="sh">
						<p>Insured Details</p>
						</div>
						<div class="cd">
							<div><span class="cname">Self</span>
						</div>
							<!--<form action="" method="post" class="mainform" id="form2"> -->
								<div class="row" style="padding-left: 20px;padding-right: 20px">
									<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
						    				<label>First Name*</label>

						  				</div>
						  			</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
							    				<label>Last Name*</label>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select required>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option>Gender*</option>
							    				<option>Male</option>
							    				<option>Female</option>
							    				</select>
							  				</div>
						  				</div>
							  				
							  </div>
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Relation</option><option value="Self">Self</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Son">Son</option><option value="Daughter">Daughter</option>
								    			</select>
								  				</div>
							  			</div>
							  			<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value="">Occupation</option><option value="Agriculturalist">Agriculturalist</option><option value="Business">Business</option><option value="Central Government">Central Government</option><option value="House wife">House wife</option><option value="Pensioner">Pensioner</option><option value="Private Sector">Private Sector</option><option value="Professional">Professional</option><option value="Public Sector">Public Sector</option><option value="Retired">Retired</option><option value="Rural Artisan">Rural Artisan</option><option value="Salaried">Salaried</option><option value="Self Employed">Self Employed</option><option value="Service">Service</option><option value="State Government">State Government</option><option value="Student">Student</option>
								    			</select>
							  				</div>
							  			</div>
							  			<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" ><span class="highlight"></span><span class="bar"></span>
								    				<label>Height (In CM)*</label>

								  				</div>
								  		</div>
						  		</div>
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
							  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
							    				<label>Weight (In KG)*</label>
							  				</div>
							  		</div>
							  		<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter PAN Number*</label>
						  				</div>
						  			</div>
						  		
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter Aadhar Number*</label>
							  				</div>
						  				</div>
						  		</div>
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
						  			<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" ><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Nominee*</label>
						  				</div>
						  			</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Nominee Relation*</option><option value="Brother">Brother</option><option value="Child">Child</option><option value="Daughter">Daughter</option><option value="Employee">Employee</option><option value="Father">Father</option><option value="Father-in-law">Father-in-law</option><option value="Husband">Husband</option><option value="Mother">Mother</option><option value="Mother-in-law">Mother-in-law</option><option value="Partner">Partner</option><option value="Self">Self</option><option value="Sister">Sister</option><option value="Son">Son</option><option value="Wife">Wife</option></select>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="number" ><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter Nominee Age*</label>
							  				</div>
						  				</div>
						  		</div>
						  		<div class="row" style="padding-left: 20px;padding-right: 20px">
						  			<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Unmarried">Unmarried</option><option value="Widowed">Widowed</option><option value="Divorced">Divorced</option><option value="Separated">Separated</option></select>
							    				</select>
							  				</div>
						  				</div>
						  		</div>
						  		<div class="button">
				  					<!--<button class="btn btn-lg btn-success" onclick="myFunction()">Next</button> -->
									<button class="btn btn-lg btn-success" id="nextBtn">Next</button> 
				  				</div>
							</form>
					</div>
				</section>
				<section class="details2" id="next" style="display: none;">
					<div id="sh">
						<p>Contact And Other Details</p>
					</div>
					<div><span class="pname">Permanent Address</span></div>
						<form action="" method="post" class="mainform">
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
						    				<label>Mobile Number*</label>

						  				</div>
						  		</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							    				<input type="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><span class="highlight"></span><span class="bar"></span>
							    				<label>Email*</label>
							  				</div>
						  				</div>
						  		<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Address*</label>
						  				</div>
						  		</div>
					  	</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
					  			<div class="col-lg-4 col-sm-12">
					  				<div class="group">
					  					<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Pincode*</label>
					  				</div>
					  			</div>
									<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								  					<select>
								    				<span class="highlight"></span><span class="bar"></span>
								    				<option value=""></option>
								    			<option value=""></option></select>
								  				</div>
							  	</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value=""></option></select>
							  				</div>
						  				</div>
					  		</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
					  			<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value=""></option></select>
							  				</div>
						  				</div>
					  		</div>
						</form>
					<div class="privacy" id="primary">
						<br>
						<div><span class="pname">Residential Address</span></div><br>
							<div><input class="cb" type="checkbox">&nbsp;Please Check If same as Permanent address
									</div>
								<form action="" method="post" class="mainform">
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Address*</label>
						  				</div>
						  			</div>
								  	<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						  					<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
							    				<label>Enter Pincode*</label>
						  				</div>
					  				</div>	
					  					<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value=""></option></select>
							  				</div>
						  				</div>
								  </div>
								  <div class="row" style="padding-left: 20px;padding-right: 20px">
								  	<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">--Select City--</option></select>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">--Select Area--</option></select>
							  				</div>
						  				</div>
								  </div>
								</form>
							
					</div>
					<div class="vd">
						<div><span class="pname">Previous Policy Details</span></div>
						<form action="" method="post" class="mainform">
									<div class="row" style="padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Enter Previous Policy Number*</label>

								  				</div>
								  		</div>
								  		<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								  					<select>
								    				<option value="">--Select Previous Insurer Name--</option><option value="Aditya Birla">Aditya Birla</option><option value="Apollo Health">Apollo Health</option><option value="Bajaj Allianz">Bajaj Allianz</option><option value="BhartiAxa">BhartiAxa</option><option value="Cholamandlam">Cholamandlam</option><option value="CIGNA">CIGNA</option><option value="Edelweiss">Edelweiss</option><option value="Future Generalli">Future Generalli</option><option value="GoDigit">GoDigit</option><option value="HDFC ERGO">HDFC ERGO</option><option value="ICICI Lombard">ICICI Lombard</option><option value="Iffco Tokio">Iffco Tokio</option><option value="Kotak">Kotak</option><option value="L&amp;T Insurance">L&amp;T Insurance</option><option value="Liberty Videocon">Liberty Videocon</option><option value="LIC">LIC</option><option value="Max Bupa">Max Bupa</option><option value="National Insurance">National Insurance</option><option value="New India">New India</option><option value="Oriental Insurance">Oriental Insurance</option><option value="Reliance General">Reliance General</option><option value="Religare Health">Religare Health</option><option value="Royal Sundaram">Royal Sundaram</option><option value="SBI General ">SBI General </option><option value="Shriram">Shriram</option><option value="Star Health">Star Health</option><option value="TATA AIG">TATA AIG</option><option value="TT">TT</option><option value="United India">United India</option><option value="Universal Sompo">Universal Sompo</option></select>
								  				</div>
								  		</div>
								  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<input type="date" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Previous Policy Expiry(If Any)</label>
							  				</div>
						  				</div>

									</div>
						</form>

					</div>
					<div class="otherdetails">
						<div><span class="pname">Other Details&nbsp;</span></div>
						<form action="" method="post" class="mainform">
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>GST Number</label>
							  				</div>
						  	</div>
							</div>
								<span id="previousb">
									<button class="btn btn-lg btn-primary"><a href=""></a>Previous</button>
								</span>
								<span id="continueb">
									<button class="btn btn-lg btn-primary" onclick="myFunctionnext()"><a href=""></a>Next</button>
								</span>
						</form>
					</div>
				</section>
				<section class="details3" id="question" style="display: none;" >
					<div id="sh">
						Medical Questionnaire
					</div>
					<div class="question-content">
						<div class="col-md-12 text-center qh">
							Self
						</div>
						<div class="col-md-12 ques">
							<p>
								<div class="q"><button class="btn btn-sm btn-success">Q</button>&nbsp;Does any person(s) to be insured has any Pre-existing diseases?</div>
								<div class="col-md-6 yes">
									<li>
	  			 						<input  type="radio" data-target="#collapse1" data-toggle="collapse" id="yes">
	  									<label><b>Yes</b></label>
									</li>
										&nbsp;&nbsp;&nbsp;&nbsp;
									<li>
	  									<input type="radio" value="no">
	  									<label for="no"><b>No</b></label>
									</li>
								</div>
							</p>
						</div>
					<div>
						<div id="accordion">
							<div class="collapse" id="collapse1" data-parent="#accordion">
		  					<div class="col-md-6 justify-content-center">
		  						<p><input type="text" name=""><label>Pre Existing disease Name</label></p>
		  					</div>
		  				</div>
		  			</div>
					</div>
					<div>
								<span id="previousb">
									<button class="btn btn-lg btn-primary"><a href=""></a>Previous</button>
								</span>
								<span id="continueb">
									<button class="btn btn-lg btn-primary"><a href=""></a>Continue</button>
								</span>
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