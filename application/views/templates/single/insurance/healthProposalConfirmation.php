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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<style>

@media print
{
    .no-print
    {
		background:blue;
        display: none !important;
        height: 0;
    }
}
</style>
</head>
<body style="background: url(https://resources.ibe4all.com/BrokerAssist/health-images/bg1.jpg) !important;">
<?php include 'header.php' ?>
<section class="main" style="padding-bottom: 20px;padding-top: 115px;">
	<div class="col-lg-10 mx-auto ">
		<form id="form1" action="<?php echo base_url();?>healthinsurance/submitHealthProposal" method="post">
		<div class="content" style="padding-bottom: 30px;">
			<div class=" heading">
				<h3>Verify Policy Proposal for Health Insurance</h3>
			</div>
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
				<input type="hidden" name="address"  value="<?php echo $address ?>"></input>
				<input type="hidden" name="mobileNumber"  value="<?php echo $mobileNumber ?>"></input>
				<input type="hidden" name="email"  value="<?php echo $email ?>"></input>
				<input type="hidden" name="state"  value="<?php echo $state ?>"></input>
				<input type="hidden" name="pincode"  value="<?php echo $pincode ?>"></input>
				<input type="hidden" name="proposalNo"  value="<?php echo $proposalNo ?>"></input>
				<input type="hidden" name="policyNumber"  value="<?php echo $policyNumber ?>"></input>
				<input type="hidden" name="previousInsurer"  value="<?php echo $previousInsurer ?>"></input>				
				</div>
			<div class="maincon">
				<div class="row top">
					<div class="col-lg-6 col-sm-12">
						<p><span><b>Status :</b>&nbsp;&nbsp;Proposal</span></p>
						<p><span><b>Transaction ID:</b>&nbsp;&nbsp;<?php echo $transactionId ?></span></p>
						<p><span><b>Proposal No:</b>&nbsp;&nbsp;<?php echo $proposalNo ?></span></p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<p><b>Quote Premium:</b>&nbsp;&nbsp;
							<i class="fa fa-rupee">&nbsp;<?php echo $totalAmount ?></i>
						</p>
						<p><b>Proposal Premium:</b>&nbsp;&nbsp;<i class="fa fa-rupee">&nbsp;<?php echo $proposalPremium ?></i></p>
					</div>
				</div>
				<br>
				<div class="sec1">
					<h4 id="sh">Policy Details</h4><br>
						<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>								
									<li><p><span>Sum Insured</span>&nbsp;&nbsp;------>&nbsp;&nbsp;<?php echo $sumAssured ?></p></li>
									<li><p><?php echo $members ?></p></li>
								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Zone</span>&nbsp;&emsp;&emsp;&emsp;------>&nbsp;&nbsp;<?php echo $city ?></p></li>
									<li><p><span>Supplier</span>&emsp;&emsp;------>&nbsp;&nbsp;<?php echo $supplierName ?></p></li>
									<li><p><span>Plan Details</span>&nbsp;&nbsp;------>&nbsp;&nbsp;<?php echo $planName ?></p></li>
								</ul>
							</div>
						</div>
						<div id="sh">
							<p>Addons Details</p>
						</div>
						<?php if($addOnDetails==null){?>
						<p class="notify">No Addon Selected</p>
						<?php } else { ?>
						<?php echo $addOnDetails; }?>
						<br>
				</div>
				<br>
				<div class="sec2">
					<h4 id="sh">Proposer Details</h4><br>
					<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>					
									<li><p><span>Full Name</span>&emsp;&emsp;&emsp;&emsp;&nbsp;------>&emsp;<?php echo $propfname." ".$proplname ?></p></li>
									<li><p><span>Occupation</span>&emsp;&emsp;&emsp;&nbsp;&nbsp;------>&emsp;<?php echo $propOccupation ?></p></li>
									<li><p><span>Relation</span>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;------>&emsp;<?php echo $propRelation ?></p></li>
									<li><p><span>Nominee Name</span>&emsp;&nbsp;&nbsp;&nbsp;------>&emsp;<?php echo $propNominee ?></p></li>
									<li><p><span>Nominee Age</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;------>&emsp;<?php echo $propNomineeAge ?></p></li>
									<li><p><span>Nominee Relation</span>&emsp;------>&emsp;<?php echo $propNomineeRelation ?></p></li>
								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Gender</span>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;----->&emsp;<?php echo $propGender ?></p></li>
									<li><p><span>DOB</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;----->&emsp;<?php echo $propDOB ?></p></li>
									<li><p><span>Marital Status</span>&emsp;&emsp;&nbsp;&nbsp;----->&emsp;<?php echo $propMartial ?></p></li>
									<li><p><span>PAN number:</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;----->&emsp;<?php echo $propPAN ?></p></li>
									<li><p><span>Adhar number:</span>&emsp;&emsp;----->&emsp;<?php echo $propAadhar ?></p></li>
								</ul>
							</div>
						</div>
				</div>	
				<div class="sec2">
					<h4 id="sh">Insurer Details</h4><br>				
					<?php
					$i = 0;
					for($i=0;$i<$totalInsurer;$i++) { ?>
					<h4 id="sh"><?php echo ${'member'.$i} ?></h4><br>
					<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Full Name:</span>&emsp;&emsp;&emsp;&emsp;------>&emsp;<?php $fname='fname'.$i; echo $$fname  ?> <?php $lname='lname'.$i; echo $$lname  ?></p></li>
									<li><p><span>Occupation:</span>&emsp;&emsp;&emsp;&nbsp;------>&emsp;<?php $occupation='occupation'.$i; echo $$occupation  ?></p></li>
									<li><p><span>Relation</span>&emsp;&emsp;&emsp;&emsp;&emsp;------>&emsp;<?php $relation='relation'.$i; echo $$relation  ?></p></li>
									<li><p><span>Height</span>&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;------>&emsp;<?php $height='height'.$i; echo $$height  ?></p></li>
									<li><p><span>Weight</span>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;------>&emsp;<?php $weight='weight'.$i; echo $$weight  ?></p></li>
								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Gender</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;----->&emsp;<?php  $gender='gender'.$i; echo $$gender ?></p></li>
									<li><p><span>PAN</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;----->&emsp;<?php $pan='pan'.$i; echo $$pan  ?></p></li>
									<li><p><span>Adhar</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;----->&emsp;<?php $adhar='adhar'.$i; echo $$adhar  ?></p></li>
									<li><p><span>Marital Status</span>&emsp;&emsp;&emsp;----->&emsp;<?php  $martialStatus='martialStatus'.$i; echo $$martialStatus  ?></p></li>
								</ul>
							</div>
						</div>
					
				
					
				<?php
					} ?>
				</div>
				<div class="sec2">
					<h4 id="sh">Contact Details</h4><br>
					<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Email:</span>&emsp;&emsp;&emsp;------>&emsp;<?php echo $email ?></p></li>
									<li><p><span>Phone No:</span>&emsp;------>&emsp;<?php echo $mobileNumber ?></p></li>
									<li><p><span>Address</span>&emsp;&emsp;------>&emsp;<?php echo $address ?></p></li>
								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>State</span>&emsp;&emsp;&emsp;----->&emsp;<?php echo $state ?></p></li>
									<li><p><span>City</span>&emsp;&emsp;&emsp;&nbsp;&nbsp;----->&emsp;<?php echo $city ?></p></li>
									<li><p><span>Pincode</span>&emsp;&nbsp;&nbsp;&nbsp;----->&emsp;<?php echo $pincode ?></p></li>
								</ul>
							</div>
						</div>
				</div>
				<div class="sec2">
					<h4 id="sh">Previous Policy Details</h4><br>
					<div class="row data">
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Policy Number</span>&emsp;------>&emsp;<?php echo $policyNumber ?></p></li>
								</ul>
							</div>
							<div class="col-lg-5 col-sm-12">
								<ul>
									<li><p><span>Previous Insurer Name</span>&emsp;----->&emsp;<?php echo $previousInsurer ?></p></li>
								</ul>
							</div>
						</div>
				</div>
				<!-- <div class="btnsection" style="border-top: 1px solid #d7d7d7;">
					<br><br>
						<div>
							<p><input type="checkbox" name="" data-toggle="modal" data-target="#termsModal" >&nbsp;<span style="color: red">By Clicking you confirm that you have agreed to the Terms</span></p>
						</div>
						<div class="buttons">
							<p><span style="padding-right: 30px;"><button class="btn btn-success" id="submitForm">Make Payment</button></span><span><button class="btn btn-warning" onClick="window.print()">Print</button></span>&nbsp;&nbsp;</p>
							<input type="button" value="Print this page" onClick="window.print()">
						</div>
				</div>	-->
			</div>
			</div>
			</form>
			<div class="no-print" style="border-top: 1px solid #d7d7d7; background:white;padding-left: 30px;padding-bottom: 30px;">
					<br><br>
						<div class="no-print">
							<p class="no-print"><input type="checkbox" name="termsCheckbox" id="termsCheckbox" data-toggle="modal" data-target="#termsModal" >&nbsp;<span style="color: red">By Clicking you confirm that you have agreed to the Terms</span></p>
						</div>
						<div class="buttons">
							<p><span style="padding-right: 30px;"><button class="btn btn-success" id="submitForm"><!--Make Payment -->Save the Data</button></span><span><button class="btn btn-warning" onClick="window.print()">Print</button></span>&nbsp;&nbsp;</p>
						</div>
				</div>
			
				</div>	
			
		</div>
	</div>

</section>
<div class="modal fade " id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-text="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TERMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-text="true">&times;</span>
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