<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/addonhealth.css">
  <script>
var clicked;
function update()
{
document.getElementById("buttonSelected").value=clicked;
}
</script>
</head>
<body>
<?php include 'header.php' ?>
<section class="main">
	<div class="col-lg-10 mx-auto ">
		<div class="content" >
			<div class=" heading">
				<h3>Health Policy Proposal (Choose Optional Add-On)</h3>
			</div>
			<div class="maincon">
			<form class="text-center" style="padding-top: 30px;" id="form1" action="<?php echo base_url();?>healthinsurance/getProposalData" onsubmit="return update();" method="post">
			<div>
			<input type="hidden" name="transactionId" value="<?php echo $transactionId ?>"></input>
			</div>
				<div class="row no-gutters">
					<div class="col-lg-4 col-sm-12">
						<input type="hidden" name="xmlValue" value="<?php echo $xmlData ;?>"></input>
						<div class="subhead">
							Policy
						</div>
						<br>
						<div class="subcon">
							<div class="row">
								<div class="col-md-6   option">
									ZONE
								</div>
								<div class="col-md-6  value">
									<?php echo $city ?> 
									<input type="hidden" name="city" value="<?php echo $city ;?>"></input>
								</div>
							</div>
							<p></p>
							<div class="row">
								<div class="col-md-6 option">
									Sum Insured
								</div>
								<div class="col-md-6 value">
									<?php echo $sumInsured ?>
									<input type="hidden" name="sumInsured" value="<?php echo $sumInsured ;?>"></input>
								</div>
							</div>
								<p></p>
							<div class="row">
								<div class="col-md-6 option">
								Insurer
								</div>
								<div class="col-md-6 value">
								<!--HDFC ERGO -->
								<?php echo $supplierName ?>
								<input type="hidden" name="supplierName" value="<?php echo $supplierName ?>"></input>
								</div>
							</div>
								<p></p>
							<div class="row">
								<div class="col-md-6 option">
									Plan Details
								</div>
								<div class="col-md-6 value">
									<!--Health Medisure Classic-->
									<?php echo $planName ?>
									<input type="hidden" name="planName" value="<?php echo $planName ?>"></input>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12">
						<div class="subhead">
							Proposer
						</div>
						<br>
						<div class="subcon">
							<div class="row">
							    <div class="text-center">
								<?php echo $members ?>
								<input type="hidden" name="members" value="<?php echo $members ?>"></input>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12">
						<div class="subhead">
							Amount
						</div>
						<br>
						<div class="subcon">
							<div class="row">
								<div class="col-md-6 option">
								Base Premium
								</div>
								<div class="col-md-6 value"><i class="fa fa-rupee"></i>
								<?php echo $basicPremium ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 option">
								GST
								</div>
								<div class="col-md-6 value"><i class="fa fa-rupee"></i>
								<?php echo round($basicPremium*.18) ?>
								</div>
							</div>
								<p></p>
							<div class="row">
								<div class="col-md-6 option">
									Total
								</div>
								<div class="col-md-6 value"><i class="fa fa-rupee"></i>
									<?php echo $totalAmount ?>
									<input type="hidden" name="totalAmount" value="<?php echo $totalAmount ?>"></input>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<?php if($addOn!=null){?>
				<h4>&nbsp;&nbsp;Choose from Available AddOn</h4>
				<?php }	?>				
			</div>
			<div class="text-center">
				<div class="col-md-12">
					<div class="row">
						<input type="hidden" name="addOn" value="<?php echo $addOn ;?>" ></input>
						<?php
								if($addOn!=null){
								$array=explode(",",$addOn);
								if(count($array)!=0)
								{
								foreach($array as $value)
								{?>
								<div class="col-md-4 col-sm-6">
				                	&nbsp;&nbsp;<input type="checkbox" name="addOnSelected[]" value="<?php echo $value ?>" >&nbsp;&nbsp;<span class="acin"><?php echo $value ?>
				                 </span>
				                </div>
								<?php }}
								}
								?>
						<div class="col-md-4 col-sm-6"></div>
						<div class="col-md-4 col-sm-6"></div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 text-center">
					<input type="hidden" name="buttonSelected" id="buttonSelected" value=""></input>
					<button class="btn btn-lg btn-primary" onclick="clicked='back';">Back</button>
				</div>
				<div class="col-lg-6 text-center">
					<button class="btn btn-lg btn-primary" onclick="clicked='continue';">Continue</button>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>