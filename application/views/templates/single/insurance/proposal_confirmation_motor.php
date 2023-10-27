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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/insurancebook.css">
  <script>
$(document).ready(function(){	
  $( "#submitForm" ).click(function() {
	  if (!$("#termsCheckbox").is(":checked")) {
		alert("Please check the agree terms before proceeding");
	}else{
		$( "#form1" ).submit();
	}
	}); 
});
</script>
  
</head>
<body style="background: url(https://resources.ibe4all.com/BrokerAssist/health-images/bg1.jpg) no-repeat fixed center center / cover !important;">
	<?php include 'header.php' ?>
<section class="main" >
	<div class="col-lg-10 mx-auto ">
		<div class="content" style="padding-bottom: 30px;">
			<div class=" heading">
				<h3>Verify Policy Proposal for Vehicle Insurance</h3>
			</div>
			<div class="maincon">
				<div class="row top">
					<div class="col-lg-6 col-sm-12">
						<p><span><b>Status :</b>&nbsp;&nbsp;Proposal</span></p>
						<p><span><b>Reference ID:</b>&nbsp;&nbsp;<?php echo $referenceno;?></span></p>
						<p><span><b>Order No:</b>&nbsp;&nbsp;<?php echo $OrderNo;?></span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p style="display:none;"><b>Quote Premium:</b>&nbsp;&nbsp;
							<!--<i class="fa fa-rupee text-danger">&nbsp;<s class="text-danger">32500</s></i>-->
						</p>
						<p><b>Proposal Premium:</b>&nbsp;&nbsp;<i class="fa fa-rupee text-danger">&nbsp;<span class="text-danger"><?php echo $premium;?></span></i></p>
					</div>
				</div>
				<br>
				<div class="sec1">
					<h4 id="sh">Policy Details</h4><br>
						<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>State</span><span class="des">------>&nbsp;&nbsp;<?php echo $state;?></span></p></li>
									<!--<li><p><span>Region</span><span class="des">----&nbsp;&nbsp;MANCHERYAL</span></p></li>-->
									<li><p><span>Reg No</span><span class="des">------>&nbsp;&nbsp;<?php echo $regno;?></span></p></li>
									<li><p><span>Make 	</span><span class="des">------>&nbsp;&nbsp;<?php echo $make;?></span></p></li>
									<li><p><span> Premium</span><span class="des">------>&nbsp;&nbsp;<?php echo $premium;?></span></p></li>
									<!--<li><p><span>TP Premium</span><span class="des">----&nbsp;&nbsp;9534</span></p></li>-->

								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li style="display:none;"><p><span>PA to Owner/Driver</span><span class="des">------>&nbsp;&nbsp;331</span></p></li>
									<li><p><span>NCB</span><span class="des">---->&nbsp;&nbsp;0</span></p></li>
									<li style="display:none;"><p><span>GST</span><span class="des">------>&nbsp;&nbsp;4343</span></p></li>
									<li><p><span>IDV</span><span class="des">----->&nbsp;&nbsp;<?php echo $IDV;?></span></p></li>
									<li><p><span>Reg Date</span><span class="des">----->&nbsp;&nbsp;<?php echo $reg_date;?></span></p></li>
									<li><p><span>Insurer</span><span class="des">----->&nbsp;&nbsp;<?php echo $insurer;?></span></p></li>
								</ul>
							</div>
						</div>
						<div id="sh" style="color: grey"><h5>&nbsp;&nbsp;No Addon Selected</h5></div>
						<br>
						<div id="sh" style="color: grey;"><h5>&nbsp;&nbsp;Additional Cover</h5></div>
						<br>
						<div class="row data" style="border-bottom: 1px solid #d7d7d7;">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Is Vehicle financed</span><span class="des">------>&nbsp;&nbsp;<?php echo $financed;?></span></p></li>
									<li><p><span>Is ARAI approved anti-theft device?</span><span class="des">------>&nbsp;&nbsp;<?php echo $arai_approved;?></span></p></li>
									<li><p><span>If Ownership Changed in Last 12 month</span><span class="des">------>&nbsp;&nbsp;<?php echo $owner_changed;?></span></p></li>
									<li><p><span>Is owner a member of AAI?</span><span class="des">------>&nbsp;&nbsp;<?php echo $member_aai;?></span></p></li>
									<li style="display:none;"><p><span>AAI Expiry Date</span><span class="des">------>&nbsp;&nbsp;Membership Expiry</span></p></li>
				
								</ul>
							</div>
						</div>
				</div>
				<br>
				<div class="sec2">
					<h4 id="sh">Customer Details</h4><br>
					<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Full Name:</span><span class="des">------>&nbsp;&nbsp;<?php echo $firstname." ".$lastname;?></span></p></li>
									<li><p><span>Phone No:</span><span class="des">------>&nbsp;&nbsp;<?php echo $mobile;?></span></p></li>
									<li><p><span>Address</span><span class="des">------>&nbsp;&nbsp;<?php echo $mobile;?></span></p></li>
									<li><p><span>City</span><span class="des">------>&nbsp;&nbsp;<?php echo $city;?></span></p></li>
									<li><p><span>State</span><span class="des">------>&nbsp;&nbsp;<?php echo $state;?></span></p></li>
									<li><p><span>Pin Code*</span><span class="des">------>&nbsp;&nbsp;<?php echo $pan;?></span></p></li>

								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									
									<li><p><span>Email</span><span class="des">---->&nbsp;&nbsp;<?php echo $email;?></span></p></li>
									<li><p><span>Adhar Number</span><span class="des">------>&nbsp;&nbsp;<?php echo $aadhar;?></span></p></li>
									<li><p><span>Pan Number</span><span class="des">----->&nbsp;&nbsp;<?php echo $pan;?></span></p></li>
									<li><p><span>Nominee Name:</span><span class="des">----->&nbsp;&nbsp;<?php echo $nominee_name;?></span></p></li>
									<li><p><span>Nominee Relation:</span><span class="des">----->&nbsp;&nbsp;<?php echo $nominee_relation;?></span></p></li>
									<li><p><span>Nominee Age:</span><span class="des">----->&nbsp;&nbsp;<?php echo $nominee_age;?></span></p></li>
								</ul>
							</div>
						</div>
				</div>	
				<div class="btnsection" style="border-top: 1px solid #d7d7d7;">
					<br><br>
					<form id="form1" action="<?php echo site_url('insurance/alert')?>">
						<div>
							<p><input type="checkbox" id="termsCheckbox" name="" data-toggle="modal" data-target="#termsModal" >&nbsp;<span style="color: red">By Clicking you confirm that you have agreed to the Terms</span></p>
						</div>
						
					</form>
					<div class="no-print" style="border-top: 1px solid #d7d7d7; background:white;padding-left: 30px;padding-bottom: 30px;">
					<br><br>
						
						<div class="buttons">
							<p><span style="padding-right: 30px;"><button class="btn btn-success" id="submitForm"><!--Make Payment -->OK</button></span><span><button class="btn btn-warning" onClick="window.print()">Print</button></span>&nbsp;&nbsp;</p>
						</div>
				    </div>
					
				</div>	
			</div>
		</div>
	</div>

</section>
<div class="modal fade " id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TERMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <ol style="text-transform: lowercase;">
          <li id="firstWord">Register with voluntary interest after reading and agreeing the terms and conditions carefully .</li>
          <li id="firstWord">YOU MUST BE 18 YEAR OLD OR ABOVE.</li>
          <li id="firstWord">YOU MUST PROVIDE FOLLOWING DOCUMENTS :
                <ul>
                    <li>VALID MOBILE NUMBER</li>
                    <li>VALID EMAIL ID</li>
                </ul>
          </li>
          <li id="firstWord">ONE CAN OPEN UNIQUE ACCOUNT for promotional activites WITH UNIQUE NAME AND PAN.</li>
          <li id="firstWord"><strong><span class="company"><span class="company"><?php echo config_item('company_name'); ?></span></span></strong> IS NOT LIABLE TO PAY ANY OVERDUE INTERESTS FOR DELAY IN PAYMENTS.</li>
          <li id="firstWord">A person has to understands that he can do independent promotional activites and he is not an employee, agent, legal representative of <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>. User further agree and understand that you have no authority to incur any debt, expense or obligation on behalf of, for, or in the name of <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>.</li>
          <li id="firstWord">ALL PAYOUTS MENTIONED IN <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> USER ACCOUNT  ARE INCLUSIVE OF ALL TAXES.</li>
          <li id="firstWord">USER  ARE REQUESTED TO SUBMIT A COPY OF THEIR PAN CARD TO BE ABLE TO RECEIVE PAYMENTS.</li>
          <li><strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>  RESERVES THE RIGHT, IN ITS SOLE AND EXCLUSIVE DISCRETION, TO ALTER OR MODIFY THE PROGRAM AT ANY TIME INCLUDING THE PLAN AND TERMS OF ALL PAYMENT BENEFITS TO USER.</li>
          <li><strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>  RESERVES THE RIGHT TO TERMINATE ANY (USER'S, PARTNER'S) CONTRACT FOR ANY REASON WHAT SO EVER.</li>
          <li id="firstWord">WE HAVE <strong><span class="company"> NO MONEY REFUND POLICY </span></strong> SO NO REFUND AVAILABLE FOR ANY USER AT ANY REASON.</li>
          <li id="firstWord">WE DO NOT GIVE YOU ANY GUARANTEES EITHER, NO PROMISES. NEITHER EXPLICITLY NOR IMPLICITLY.</li>
          <li id="firstWord">DO NOT CREATE THE MISTAKEN BELIEF THAT YOU CAN BECOME RICH QUICK HERE. (CONVERSELY, YOU WILL LOSE EVERYTHING!)</li>
          <li id="firstWord">IF ANY USER VIOLATES OR  REFUSES TO TAKE PART IN THEIR RESPONSIBILITIES, OR COMMITS FRAUDULENT ACTIVITY AGAINST US, <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> RESERVES THE RIGHT TO WITHHOLD PAYMENT AND TAKE APPROPRIATE LEGAL ACTION TO COVER ITS DAMAGES.</li>
          <li id="firstWord">NOTIFY US VIA EMAIL IF YOU WISH TO PERMANENTLY CLOSE YOUR ACCOUNT.</li>
          <li id="firstWord">I ALSO AGREE THAT , I MUST NOT INVOLVE IN ANY ANTI-COMPANY WORK (WHICH WORK DOES NOT ALLOWED BY COMPANY , OR AGAINST COMPANY REPUTATION ) , IF FOUND ,MY CONTRACT  WITH <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong> WILL BE TERMINATED INSTANTLY . NO LOSS OR REFUND WILL BE MADE TO CUSTOMER OR USER.</li>
          <li id="firstWord">I agreed with absolute consciousness that the Company could freeze My Business ID or take back it, or transfer to another person, without my consent in the event of speak or campaign against the company’s interest, or work against the business idea of the company.</li>
          <br>
          <li id="firstWord">U<strong>SER DECLARATION :</strong>
              <ul>
                  <li id="firstWord">I HAVE READ THESE TERMS AND CONDITIONS AND WILL ABIDE BY IT, INCLUDING THE COMPLIANCE WITH ALL LAWS RELATED TO PROMOTION OF <strong><span class="company"><?php echo config_item('company_name'); ?></span></strong>. I ALSO ACKNOWLEDGE THAT IT IS MY RESPONSIBILITY TO REVIEW THESE TERMS AND CONDITIONS REGULARLY FOR ANY MODIFICATIONS.</li>
              </ul>
          </li>
    </ol>
      </div>
      <div class="modal-footer">
        <p><button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Close</button></p>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?> 

</body>
</html>