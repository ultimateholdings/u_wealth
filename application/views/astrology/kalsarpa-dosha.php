<!DOCTYPE html>
<html>
<head>
	<title>Kaalsarpa Dosha</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>


<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/kalsarpa_dasha_input')?>" id="breadcrumbLink">Kalsarpa Dosha</a></li>
  <li class="breadcrumb-item active">Kalsarpa Dosha Report</li>
</ol>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/kaalsarpaN.png') ?>" class="pb-5 d-none d-sm-block" height="180"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="font-size: 44px;">What is Kalsarpa Dosha?</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container" style="font-size: 20px;">
		<p>If all the 7 planets are situated between Rahu and Ketu then Kaal Sarp Yog is formed. According to the situation of Rahu in 12 houses of horoscope there are Kaal Sarp Yogas of 12 types.</p>

		<p>These are : Anant, Kulik, Vasuki, Shankhpal, Padma, Mahapadma, Takshak, Karkotak, Shankhchud, Ghaatak, Vishdhar Sheshnag. The Kaal Sarp Yog is of two types- Ascending and Descending.</p>

		<p>If all the 7 planets are eaten away by Rahu's mouth then it is Ascending Kaal Sarp Yog. If all planets are situated in back of Rahu then Descending Kaal Sarp Yog is formed.</p>
	</div>
</section>

<section>
	<div class="container my-5">
		 <?php 
				$data_kalsarpa = json_decode($responseData19);
					//echo $data_kalsarpa->one_line; 
					//echo $responseData19;
			 if($data_kalsarpa->present == false){
				echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>Congrats!</h4>".$data_kalsarpa->one_line."<hr></div>";
		 } 
		 else{ 
			echo "<div class='alert alert-danger role='alert'><h4 class='alert-heading'>Beware!!</h4>".$data_kalsarpa->one_line."<hr></div>";
		 } 
		 ?>
	</div> 		
</section>

<section>
	<div class="container mb-5" style="font-size: 20px;">
		<div class="row">
			<h2 style="font-size: 44px;">Remedies for Kaalsarpa Dosha</h2>
		</div><hr class="bg-info" />
		<ul>
			<li>Rudrabhisheka - a puja to Lord Shiva can be performed on a solar or lunar eclipse or on Mahashivratri at Mahakaleshwar temple, Ujjain Temple.</li>
			<li class="mt-3">Install an energized Kaal Sarpa Yog yantra at the place of veneration or puja room at home and worship it daily.</li>
			<li class="mt-3">Get a Kalsarpa dosha nivaran pooja performed on a Wednesday or Friday to negate the malefic effects of Rahu.</li>
			<li class="mt-3">Get a Dashansh Homa or Yajna done on Nag Panchami day in the month of Shravan in a temple or near a holy river
			</li>
			<li class="mt-3">Donate fresh reddish.</li>
			<li class="mt-3">Wear a 14 faced rudraksha or a combination of 8+9 faced rudraksha.</li>
		</ul>
	</div>
</section>

<!--<section>
	<div class="container">
		<div class="jumbotron jumbotron2">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="text-center">
						<h2 style="color: white">Check Out the Astrology <span>Loyalty Program</span> </h2>
						<h4 style="color: white">Earn Free recharge packs against your loyalty points</h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<button class="btn btn-circle"><span style="font-size: 26px;">Click Here</span></button>
				</div>	
			</div>
		</div>
	</div>
</section>-->
