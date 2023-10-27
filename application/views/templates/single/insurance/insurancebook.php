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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/insurancebook.css">
  <script>
	function myFunction() 
	{
		//alert("func called");
		var fn = document.getElementById("firstname").value;
		
		var ln=document.getElementById("lastname").value;
		var gender=document.getElementById("gender").value;
		var nominee=document.getElementById("nominee").value;
		var nominee_relation=document.getElementById("nominee_relation").value;
		var nominee_age=document.getElementById("nominee_age").value;
		var pan=document.getElementById("pan").value;
		//alert(pan);
        if(fn == "")
        {
         alert('Please Enter First Name');
         document.getElementById('firstname').style.borderColor = "red";
         return false;
        }
        else if(ln == "")
        {
         alert('Please Enter Last Name');
         document.getElementById('lastname').style.borderColor = "red";
         return false;
        }
        else if(gender == "")
        {
         alert('Please Select Gender');
         document.getElementById('gender').style.borderColor = "red";
         return false;
        }
        else if(nominee == "")
        {
         alert('Please Enter Nominee');
         document.getElementById('nominee').style.borderColor = "red";
         return false;
        }
        else if(nominee_relation == "")
        {
         alert('Please Enter nominee relation');
         document.getElementById('nominee_relation').style.borderColor = "red";
         return false;
        }
         else if(nominee_age == "")
        {
         alert('Please Enter nominee age');
         document.getElementById('nominee_age').style.borderColor = "red";
         return false;
        }
        else if(/^[0-9]+$/.test(document.getElementById("pan").value))
        {
         alert('Please enter valid Pan NUmber');
         document.getElementById('pan').style.borderColor = "red";
         return false;
        }

       else
       {
        document.getElementById("next").style.display = "block";
        document.getElementById("maindetails").style.display = "none";
        document.getElementById('first_image').src="https://resources.ibe4all.com/BrokerAssist/health-images/Archeck.png";

        // alert(document.getElementById("firstname").value);
       }
       function myFunction2(){
       	var mobile = document.getElementById("mobile").value;
		var email=document.getElementById("email").value;
		var address=document.getElementById("address").value;
		var pincode=document.getElementById("pincode").value;
		var city=document.getElementById("city").value;
		var state=document.getElementById("state").value;
		var engineno=document.getElementById("engineno").value; 
		var chassisno=document.getElementById("chassisno").value;
		var chassisno=document.getElementById("chassisno").value;
		//alert(pan);
        if(mobile == "")
        {
         alert('Please Enter Mobile Number');
         document.getElementById('mobile').style.borderColor = "red";
         return false;
        }
        else if(email == "")
        {
         alert('Please Enter Email');
         document.getElementById('email').style.borderColor = "red";
         return false;
        }
        else if(address == "")
        {
         alert('Please Enter Address');
         document.getElementById('address').style.borderColor = "red";
         return false;
        }
        else if(pincode == "")
        {
         alert('Please Enter Pincode');
         document.getElementById('pincode').style.borderColor = "red";
         return false;
        }
        else if(city == "")
        {
         alert('Please Enter City');
         document.getElementById('city').style.borderColor = "red";
         return false;
        }
         else if(state == "")
        {
         alert('Please Enter State');
         document.getElementById('state').style.borderColor = "red";
         return false;
        }
        else if(engineno == "")
        {
         alert('Please Enter Engine Number');
         document.getElementById('engineno').style.borderColor = "red";
         return false;
        }
        else if(chassisno == "")
        {
         alert('Please Enter Chassis Number');
         document.getElementById('chassisno').style.borderColor = "red";
         return false;
        }
        else if(arai_approved == "")
        {
         alert('Please Select ARAI ');
         document.getElementById('arai_approved').style.borderColor = "red";
         return false;
        }
        

       else
       {
        document.getElementById("next").style.display = "block";
        document.getElementById("maindetails").style.display = "none";
        document.getElementById('first_image').src="https://resources.ibe4all.com/BrokerAssist/health-images/Archeck.png";

        // alert(document.getElementById("firstname").value);
       }

       }

   

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
	<div class="col-lg-11 mx-auto ">
		<div class="content" >
			<div class=" heading">
				<h3>Vehicle Policy Proposal for 1 year</h3>
			</div>
			<div class="maincon">
				<div class="row top">
					<div class="col-lg-6 col-sm-12">
						<p ><span class="name">Search Criteria</span> <span class="r"><b>Premium</b></span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p style="display:none;">
							<i class="fa fa-rupee rp">&nbsp;<?php echo $premium; ?></i><span class="r"><button class="btn btn-sm btn-warning"><a  class="go" href="">Go Back</a></button></span>
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
							<li><p><span>Region</span><span class="des">------>&nbsp;&nbsp;<?php echo $city;?></span></p></li>
							<li><p><span>Make</span><span class="des">---->&nbsp;&nbsp;<?php echo $model;?></span></p></li>
							<li><p><span>Reg-Date</span><span class="des">------>&nbsp;&nbsp;03/07/2019</span></p></li>
							<li><p><span>IDV</span><span class="des">----->&nbsp;&nbsp;<?php echo $IDV;?></span></p></li>
							<li><p><span>Claim Made Last Year?</span><span class="des">----->&nbsp;&nbsp;<?php echo $claimmade;?></span></p></li>
						</ul>
					</div>
					<div class="col-lg-2 col-sm-12">
						<img class="img-fluid" src="<?php echo $image;?>">
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
									<img id="first_image" src="https://resources.ibe4all.com/BrokerAssist/health-images/Ar1.png"><span id="spn1" class="arrowtext tr" style= key="PROPOSAL FORM">Proposal Form</span>
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
				<section class="details">
					<div id="sh">
						<p>Proposer Details</p>
					</div>
					<div><span class="fname">Please use the name mentioned in the RC copy of your Vehicle</span>
					</div>
					<form action="<?php echo site_url('insurance/MakeProposal_submit')?>" method="post" class="mainform">
						<div class="firstform" id="maindetails">
							<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
						  				<div class="group">
						    				<input type="text" name="firstname" id="firstname"><span class="highlight"></span><span class="bar"></span>
						    				<label>First Name*</label>
                                            
                                            
						  				</div>
						  	</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				    				<input type="text" name="lastname" id="lastname" ><span class="highlight"></span><span class="bar"></span>
				    				<label>Last Name*</label>
				  				</div>
			  				</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				  					<select name="gender" id="gender">
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
						    				<input type="text" name="nominee" id="nominee"><span class="highlight"></span><span class="bar"></span>
						    				<label>Enter Nominee*</label>
						  				</div>
						  	</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				  					<select name='nominee_relation' id="nominee_relation">
				    				<span class="highlight"></span><span class="bar"></span>
				    				<option value="">Nominee Relation*</option><option value="Brother">Brother</option><option value="Child">Child</option><option value="Daughter">Daughter</option><option value="Employee">Employee</option><option value="Father">Father</option><option value="Father-in-law">Father-in-law</option><option value="Husband">Husband</option><option value="Mother">Mother</option><option value="Mother-in-law">Mother-in-law</option><option value="Partner">Partner</option><option value="Self">Self</option><option value="Sister">Sister</option><option value="Son">Son</option><option value="Wife">Wife</option></select>
				  				</div>
			  				</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				    				<input type="number" name="nominee_age" id="nominee_age"><span class="highlight"></span><span class="bar"></span>
				    				<label>Enter Nominee Age*</label>
				  				</div>
			  				</div>
					  	</div>
					  	<div class="row" style="padding-left: 20px;padding-right: 20px">
								<div class="col-lg-4 col-sm-12">
						  				<div class="group"> <!--pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"-->
						    				<input type="text" name="pan" id="pan" ><span class="highlight" required=""></span><span class="bar"></span>
						    				<label>Enter PAN Number*</label>
						  				</div>
						  	</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				    				<input type="text" name="aadhar" id="aadhar" ><span class="highlight"></span><span class="bar"></span>
				    				<label>Enter Aadhar Number*</label>
				  				</div>
			  				</div>
			  				<div class="col-lg-4 col-sm-12">
				  				<div class="group">
				  					<select name="marital_status" id="marital_status">
				    				<span class="highlight"></span><span class="bar"></span>
				    				<option value="">Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Unmarried">Unmarried</option><option value="Widowed">Widowed</option><option value="Divorced">Divorced</option><option value="Separated">Separated</option></select>
				    				</select>
				  				</div>
			  				</div>
					  	</div>
				  		<div class="button">
				  			<!--<button class="btn btn-lg btn-success" type="submit" onclick="myFunction()">Next</button>-->
				  			<button class="btn btn-lg btn-success"  onclick="myFunction()">Next</button>
				  		</div>
				  	</div>
				  	<div class="secondform" id="startPrev" >
				  		<section class="details2" id="next" style="display: none;">
								<div id="sh">
									<p>Contact And Other Details</p>
								</div>	
								<div class="cd">
										<div><span class="cname">Communication Details</span>
										</div>
										<br>
										<div class="row" style="padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
									  			<div class="group">
									    				<input type="number" name="mobile" id="mobile" ><span class="highlight" ></span><span class="bar"></span>
									    				<label>Mobile Number*</label>
									  				</div>
									  	</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										    				<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" required=""><span class="highlight"></span><span class="bar"></span>
										    				<label>Email*</label>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										    				<input type="text" name="address" id="address" required><span class="highlight"></span><span class="bar"></span>
										    				<label>Enter Address*</label>
										  				</div>
									  				</div>
								  	</div>
								  		<div class="row" style="padding-left: 20px;padding-right: 20px">
												<div class="col-lg-4 col-sm-12">
									  				<div class="group">
									    				<input type="number" name="pincode" id="pincode" ><span class="highlight" ></span><span class="bar"></span>
									    				<label>Enter Pincode*</label>
									  				</div>
									  		    </div>
									  				<!--<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select>
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value=""></option></select>
										  				</div>
									  				</div>-->
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="text" name="city" id="city" required><span class="highlight"></span><span class="bar"></span>
									    				<label>Enter City*</label>
										  				</div>
									  				</div>

									  				<!--<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select>
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value=""></option></select>
										  				</div>
									  				</div>-->
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="text" name="state" id="state"><span class="highlight"></span><span class="bar"></span>
									    				<label>Enter State*</label>
										  				</div>
									  				</div>

								  		</div>
								  		<div class="row" style="display:none;padding-left: 20px;padding-right: 20px">
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select>
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value=""></option></select>
										    				</select>
										  				</div>
									  				</div>
								  		</div>
								</div>
								<div class="rd">
									<div><span class="cname">Registration Address</span>
										</div>
										<br>
										<div><input type="checkbox" name="filltoo" id="filltoo" onclick="filladd()">&nbsp;<b>Please Check If same as Permanent address</b>
									</div>
									<br>
										<div class="row" style="padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
									  				<div class="group">
									    				<input type="text" name="reg_address" id="reg_address" required=""><span class="highlight"></span><span class="bar"></span>
									    				<label>Enter Address*</label>

									  				</div>
									  		</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										    				<input type="number" name="reg_pincode" id="reg_pincode" required=""><span class="highlight"></span><span class="bar"></span>
										    				<label>Enter Pincode*</label>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="text" name="reg_city" id="reg_city" required=""><span class="highlight"></span><span class="bar"></span>
										    				<label>Enter City*</label>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="text" name="reg_state" id="reg_state" rrequired=""><span class="highlight"></span><span class="bar"></span>
										    				<label>Enter State*</label>
										  				</div>
									  				</div>
									  				<!--<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select>
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value=""></option>
										    			<option value=""></option></select>
										  				</div>
									  				</div>-->
								  		</div>
								  		<div class="row" style="display:none;padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="select_city" id="reg_city">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="">--select city--</option>
										    			<option value=""></option></select>
										  				</div>
									  		</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="select_state" id="reg_state">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="">--select area--</option></select>
										  				</div>
									  				</div>
								  		</div>
									
								</div>
								<div class="privacy">
									<div><span class="pname">Privacy Policy Details</span></div>
												<div class="row" style="padding-left: 20px;padding-right: 20px">
													<div class="col-lg-4 classol-sm-12">
											  				<div class="group">
											    				<input type="number" name="policyno" id="policyno" ><span class="highlight"></span><span class="bar"></span>
											    				<label>Enter Previous Policy Number</label>
											    			</div>
											  		</div>
											  		<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="Bajaj Allianz">Bajaj Allianz</option>
										<option value="BhartiAxa">BhartiAxa</option>
										<option value="Cholamandlam">Cholamandlam</option>
										<option value="Future Generalli">Future Generalli</option>
										<option value="GoDigit">GoDigit</option>
										<option value="HDFC ERGO">HDFC ERGO</option>
										<option value="ICICI Lombard">ICICI Lombard</option>
										<option value="Iffco Tokio">Iffco Tokio</option>
										<option value="Kotak">Kotak</option>
										<option value="L&amp;T Insurance">L&amp;T Insurance</option>
										<option value="Liberty Videocon">Liberty Videocon</option>
										<option value="National Insurance">National Insurance</option>
										<option value="New India">New India</option>
										<option value="Oriental Insurance">Oriental Insurance</option>
										<option value="Reliance General">Reliance General</option>
										<option value="Royal Sundaram">Royal Sundaram</option>
										<option value="SBI General ">SBI General </option>
										<option value="Shriram">Shriram</option>
										<option value="TATA AIG">TATA AIG</option>
										<option value="United India">United India</option>
										<option value="Universal Sompo">Universal Sompo</option></select>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
											  				<div class="group">
											    				<input type="date" name="expiry"><span class="highlight"></span><span class="bar"></span>
											    				<label>Expiry Date</label>

											  				</div>
											  		</div>

											  	</div>
										
								</div>
								<div class="vd">
									<div><span class="pname">Vehicle Details</span></div>
												<div class="row" style="padding-left: 20px;padding-right: 20px">
													<div class="col-lg-4 col-sm-12">
											  				<div class="group">
											    				<input type="number" name="engineno" id="engineno" required=""><span class="highlight"></span><span class="bar"></span>
											    				<label>Enter Engine Number*</label>
											    			</div>
											  		</div>
											  		<div class="col-lg-4 col-sm-12">
											  				<div class="group">
											    				<input type="number" name="chassisno" id="chassisno" required=""><span class="highlight"></span><span class="bar"></span>
											    				<label>Enter Chassis Number*</label>
											  				</div>
											  		</div>
											  		<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="arai_approved" id="arai_approved">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="" selected="">Please Select</option>
										    				<option value="yes">Yes</option>
										    				<option value="no">No</option></select><label>Is ARAI approved anti-theft device?</label>
										  				</div>
									  				</div>
												</div>
												<div class="row" style="padding-left: 20px;padding-right: 20px">
													<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="manufactured_year">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="" selected="">Select Manufactured Year</option><option value="2020" selected="selected">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option></select>
										    			</div>
									  			</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="financed">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="yes">Yes</option>
										    				<option value="no">No</option></select><label>Is Vehicle financed: </label>
										  				</div>
									  				</div>
												</div>
								</div>
								<div class="otherdetails">
									<div><span class="pname">Other Details&nbsp;<span class="man">(*Not Mandatory	)</span></span></div>
										<div class="row" style="padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="voluntary_deductable" >
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
										  					<select name="individual">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<OPTION>Individual</OPTION>
										    			</select>
										    			</div>
										    </div>
										    <div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="number" name="lpg_value"><span class="highlight"></span><span class="bar"></span>
											    				<label>Value of LPG/CNG kit if any(in Rs.)</label>
										  				</div>
										  	</div>
										</div>
										<div class="row" style="padding-left: 20px;padding-right: 20px">
											<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<input type="number" name="electrical_accessories"><span class="highlight"></span><span class="bar"></span>
											    				<label>Value of Electrical Accessories</label>
										  				</div>
										  </div>
										  	<div class="col-lg-4 col-sm-12">
								  				<div class="group">
								    				<input type="date" name="dob"><span class="highlight"></span><span class="bar"></span>
								    				<label>Date Of Birth Of Owner Driver</label>
								  				</div>
												</div>
													<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="ownership_changed">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="yes">Yes</option>
										    				<option value="no">No</option></select><label>If Ownership Changed in Last 12 month</label>
										  				</div>
									  			</div>
										</div>
										<div class="row" style="padding-left: 20px;padding-right: 20px">
													<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="member_aai">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="yes">Yes</option>
										    				<option value="no">No</option></select><label>Is owner a member of AAI?</label>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="legal_liability">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="yes">Yes</option>
										    				<option value="no">No</option></select><label>Legal liability to Paid Driver?</label>
										  				</div>
									  				</div>
									  				<div class="col-lg-4 col-sm-12">
										  				<div class="group">
										  					<select name="unnamed_passanger">
										    				<span class="highlight"></span><span class="bar"></span>
										    				<option value="">Yes</option>
										    				<option value="">No</option></select><label>Unnamed Passanger personal accident</label>
										  				</div>
									  				</div>
										</div>
										<div>
											<span id="previousb">
												<button class="btn btn-lg btn-primary" onclick="goBack()"><a href=""></a>Previous</button>
											</span>
											<span id="continueb">
											<input type="hidden" name="premium" id="premium" value="<?php echo $premium ?>" required="">
											<input type="hidden" name="vehicle_type" id="vehicle_type" value="<?php echo $vehicle_type ?>" required="">
											<input type="hidden" name="OrderNo" id="premium" value="<?php echo $OrderNo ?>" required="">
											<input type="hidden" name="referenceno" id="premium" value="<?php echo $referenceno ?>" required="">
											<input type="hidden" name="idv" id="idv" value="<?php echo $IDV ?>" required="">
											<input type="hidden" name="regdate" id="regdate" value="<?php echo $regdate ?>" required="">
											<input type="hidden" name="regno" id="regno" value="<?php echo $regno;?>" required="">
                                            <input type="hidden" name="premium_state" id="premium_state" value="<?php echo $state;?>" required="">
                                            <input type="hidden" name="premium_city" id="premium_city" value="<?php echo $city;?>" required="">
                                            <input type="hidden" name="premium_model" id="premium_model" value="<?php echo $model;?>" required="">
                                            <input type="hidden" name="premium_insurer" id="premium_insurer" value="<?php echo $insurer;?>" required="">
												<button type="submit" class="btn btn-lg btn-primary" onclick="myFunction2()"><a href=""></a>Continue</button>
												<!--<input type="submit" value="Continue"/>-->
											</span>
										</div>
								</div>
						  </section>
				  	</div>
					</form>
				</section>
				
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
<script>
$(document).ready(function() {
	var zip=document.getElementById('pincode');
	//alert(zip);
    $("#pincode").keyup(function() {
        var el = $(this);
        
        
        //alert(el);

        if (el.val().length === 5) {
            $.ajax({
                url: "https://api.postalpincode.in/pincode/641001",
                cache: false,
                dataType: "json",
                type: "GET",
                data: "zip=" + el.val(),
                success: function(result, success) {
                    //$("#city").val(result.city);
                    //$("#state").val(result.state);
                    //alert(result);
                }
            });
        }
    });
});
</script>
<script language="JavaScript">
    function permanent(p) {

        if(p.present.checked == true) {
        	//alert("checked again");
            p.reg_addresss.value = p.address.value;
            p.reg_city.value = p.city.value;
            p.reg_state.value = p.state.value;
            p.reg_country.value = p.country.value;
            p.reg_pincode.value = p.pincode.value;
        }
    }
</script>
<script>
	function filladd()
{
	 //alert("hello");
	 if(filltoo.checked == true) 
     {

             var reg_address =document.getElementById("address").value;
			 var reg_pincode =document.getElementById("pincode").value;
			 var reg_city =document.getElementById("city").value;
			 var reg_state =document.getElementById("state").value;
          
            var copyaddress =reg_address ;
            var copypincode =reg_pincode ;
            var copycity =reg_city ;
            var copystate =reg_state ;
            //alert(reg_address);

            
            document.getElementById("reg_address").value = copyaddress;
            document.getElementById("reg_pincode").value = copypincode;
            document.getElementById("reg_city").value = copycity;
            document.getElementById("reg_state").value = copystate;
            //alert(reg_address);
	 }
	 else if(filltoo.checked == false)
	 {
		 document.getElementById("reg_address").value='';
		 document.getElementById("reg_pincode").value='';
		 document.getElementById("reg_city").value='';
	 }
}
</script>
</body>
</html>
