<?php include 'header.php' ?>
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
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/insurancebooktwowheeler.css">
  <script>
	function myFunction() {
  document.getElementById("next").style.display = "block";
   document.getElementById("maindetails").style.display = "none";
 }
function goBack() {
   document.getElementById("next").style.display = "none";
   document.getElementById("maindetails").style.display = "block";
}
</script>
</head>
<body>
	<?php include 'header.php' ?>
<section class="main">
	<div class="col-lg-10 mx-auto ">
		<div class="content" >
			<div class=" heading">
				<h3>Vehicle Policy Proposal for 1 year</h3>
			</div>
			<div class="maincon">
				<div class="row top">
					<div class="col-lg-6 col-sm-12">
						<p ><span class="name">Search Criteria</span> <span class="r">Premium</span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p>
							<i class="fa fa-rupee">&nbsp;<?php echo $premium; ?></i><span class="r"><button class="btn btn-sm btn-warning"><a  class="go" href="">Go Back</a></button></span>
						</p>
					</div>
				</div>
				<br>
				<div class="row data">
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span>State</span><span class="des">------>&nbsp;&nbsp;<?php echo $state;?></span></p></li>
							<li><p><span>Registration</span><span class="des">------>&nbsp;&nbsp;<?php echo $regno;?></span></p></li>
							<li><p><span>Premium</span><span class="des">------>&nbsp;&nbsp;<?php echo $premium;?></span></p></li>
							<li><p><span>NCB</span><span class="des">------>&nbsp;&nbsp;<?php echo $ncb;?></span></p></li>
							<li><p><span>Insurer</span><span class="des">------>&nbsp;&nbsp;<?php echo $insurer;?>*<?php echo $plan;?></span></p></li>
							<li><p><span>Previous Insurer</span><span class="des">------>&nbsp;&nbsp;GoDigit</span></p></li>

						</ul>
					</div>
					<div class="col-lg-5 col-sm-12">
						<ul>
							<li><p><span>Region</span><span class="des">------>&nbsp;&nbsp;NIRMAL</span></p></li>
							<li><p><span>Make</span><span class="des">---->&nbsp;&nbsp;HONDA,BRIO,1.2 E MT(1198),Petrol</span></p></li>
							<li><p><span>Reg-Date</span><span class="des">------>&nbsp;&nbsp;03/07/2019</span></p></li>
							<li><p><span>IDV</span><span class="des">----->&nbsp;&nbsp;431700</span></p></li>
							<li><p><span>Claim Made Last Year?</span><span class="des">----->&nbsp;&nbsp;No</span></p></li>
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
						<p class="notify">No Addon Selected</p>
						<div id="arrow" class="col-md-12 pro">
							<div class="col-md-3 offset-0"></div>
							<div class="progressmain">
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar1.png"><span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">Proposal Form</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls darrow down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar2.png"><span id="spn1" class="arrowtext tr" style= key="Contact Information">Contact Information</span>
								</div>
								<div id="p1" class="col-md-2 offset-0 cls down-arrow">
									<img src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar3.png"><span id="spn1" class="arrowtext tr" style= key="Payment Gateway">Payment Gateway</span>
								</div>
							</div>
						</div>
		
					</div>
				</div>
				<section class="details" id="maindetails">
					<div id="sh">
						<p>Proposer Details</p>
					</div>
					<div><span class="fname">Please use the name mentioned in the RC copy of your Vehicle</span>
							
						</div>
					<form action="" method="post" class="mainform">
						<div class="row" style="padding-left: 20px;padding-right: 20px">
							<div class="col-lg-4 col-sm-12">
					  				<div class="group">
					    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
					    				<label>First Name*</label>

					  				</div>
					  		</div>
					  				<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" required=""><span class="highlight"></span><span class="bar"></span>
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
				  		<div class="button">
				  			<button class="btn btn-lg btn-success" onclick="myFunction()">Next</button>
				  		</div>
					</form>
				</section>
				<section class="details2" id="next" style="display: none;">
					<div id="sh">
						<p>Contact And Other Details</p>
					</div>
					<div class="cd">
						<div><span class="cname">Communication Details</span>
								
							</div>
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
							    				</select>
							  				</div>
						  				</div>
					  		</div>
						</form>
					</div>
					<div class="rd">
						<div><span class="cname">Registration Address</span>
						</div><br>
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
							    				<option value=""></option>
							    			<option value=""></option></select>
							  				</div>
						  				</div>
						  		
					  		</div>
					  		<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">--select city--</option>
							    			<option value=""></option></select>
							  				</div>
						  		</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">--select area--</option></select>
							  				</div>
						  				</div>
					  		</div>
						</form>
					</div>
					<div class="privacy">
						<div><span class="pname">Privacy Policy Details</span></div>
								<form action="" method="post" class="mainform">
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Enter Previous Policy Number</label>

								  				</div>
								  		</div>
								  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">SBI General</option></select>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="date" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Expiry Date</label>

								  				</div>
								  		</div>

								  	</div>
								</form>
							
					</div>
					<div class="vd">
						<div><span class="pname">Vehicle Details</span></div>
						<form action="" method="post" class="mainform">
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Enter Engine Number*</label>

								  				</div>
								  		</div>
								  		<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="number" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Enter Chassis Number*</label>
								  				</div>
								  		</div>
								  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="" selected="">Select Manufactured Year</option><option value="2020" selected="selected">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option></select>
							    			</div>
						  				</div>


									</div>
									<div class="row" style="padding-left: 20px;padding-right: 20px">
										
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Yes</option>
							    				<option value="">No</option></select><label>Is Two Wheeler Financed: </label>
							  				</div>
						  				</div>
										
									</div>
								</form>

					</div>
					<div class="otherdetails">
						<div><span class="pname">Other Details&nbsp;<span class="man">(*Not Mandatory	)</span></span></div>
						<form action="" method="post" class="mainform">
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Voluntary Deductable Per Claim</option>
							    				<option>RS. 2500</option>
							    				<option>RS. 5000</option>
							    				<option>RS.7500</option>
							    				<option>RS.15000</option>
							    				</select>
							  				</div>
						  		</div>
						  		<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<OPTION>Individual</OPTION>
							    			</select>
							    			</div>
							    </div>
							    <div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="date" required=""><span class="highlight"></span><span class="bar"></span>
								    				<label>Date Of Birth Of Owner Driver</label>

								  				</div>
								</div>

							</div>
							<div class="row" style="padding-left: 20px;padding-right: 20px">
							  	
										<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Yes</option>
							    				<option value="">No</option></select><label>If Ownership Changed in Last 12 month</label>
							  				</div>
						  				</div>
						  				<div class="col-lg-4 col-sm-12">
							  				<div class="group">
							  					<select>
							    				<span class="highlight"></span><span class="bar"></span>
							    				<option value="">Yes</option>
							    				<option value="">No</option></select><label>Unnamed Passanger personal accident</label>
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

						</form>

					</div>
				</section>
			</div>
		</div>
	</div>

</section>
<?php include 'footer.php' ?>
</body>
</html>