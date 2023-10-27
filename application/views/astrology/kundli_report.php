<!DOCTYPE html>
<html>
<head>
	<title>Kundli report</title>
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
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/free_kundali')?>" id="breadcrumbLink">Free Kundli</a></li>
  <li class="breadcrumb-item active">Kundli report</li>
</ol>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/kundli1.jpg') ?>" class="pb-5 d-none d-sm-block" height="180"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Kundli report</h2>
					<h4 style="color: yellow"><?php echo $name;?></h4>
					<p style="color: yellow;"><?php echo $date."/"."$month"."/".$year."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$hour."hr : ".$minute."min : ".$second."sec" ?></p>
					<p style="margin-top: -16px;color: yellow;"><?php echo $place;?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<h1 class="mt-5">Namaste,<span style="color: red;"> <?php echo $name; ?></span></h1>
	<p class="mt-4"><p>Your <b><u>kundli</u></b> is ready. You are born on <?php echo $date; ?>/<?php echo $month; ?>/<?php echo $year; ?>. Your place of birth is <?php echo $place; ?>. If there is any mistake, please Click here to re-enter your birth details again or else go ahead and explore your Kundli.
	<?php $data_basicAstro = json_decode($responseData1); 
	//echo $responseData1; //To check the Details.
	?><a href="/kundli/"><b>Click here</b></a> to re-enter your birth details again or else go ahead and explore your Kundli.</p></p>

	<div class="card mt-5">
	  <div class="card-header text-center">
	    <h3>About You</h3>
	  </div>
	  <div class="card-body">
	    <p class="card-text">You are born with the <?php echo $data_basicAstro->ascendant; ?> rising. This means your ascendant is <?php echo $data_basicAstro->ascendant; ?> and <?php echo $data_basicAstro->ascendant_lord; ?> is your ascendant lord. Being ascendant lord, <?php echo $data_basicAstro->ascendant_lord; ?> is one of the most prominent and beneficial planet for you. You can see the detailed ascendant report from below. Your Moon sign is <?php echo $data_basicAstro->sign; ?> and Moon sign lord is <?php echo $data_basicAstro->SignLord; ?>. Moon sign is also called
		your birth sign or Janma Rashi. Your birth Nakshatra is <?php echo $data_basicAstro->Naksahtra; ?>. </p>
		 </div>
	</div>
</div><br><br><br>

<section>
	<div class="container">
		<!--<h2>Kundli Predictions and Analysis</h2><hr><br>
		<div class="row">
			<div class="col-md-3">
				<a href="#" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Get your Ascendant Report</h3>
				  </div>
				</a>
			</div>
			<div class="col-md-3">	
				<a href="#" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Numerology analysis for you</h3>
				  </div>
				</a>
			</div>	
			<div class="col-md-3">	
				<a href="#" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Numerology Favorable points</h3>
				  </div>
				</a>
			</div>	
			<div class="col-md-3">	
				<a href="#" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Kundli Predictions Here</h3>
				  </div>
				</a>
			</div>	
		</div><br><br>-->
		<h2>Dosha Analysis for you</h2><hr><br>
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo site_url('Astrology/kalsarpa_dasha_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Get Kal-sarpa Dosha analysis</h3>
				  </div>
				</a>
			</div>
			<div class="col-md-3">	
				<a href="<?php echo site_url('Astrology/pitri_dasha_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Get Pitri-Dosha analysis</h3>
				  </div>
				</a>
			</div>	
			<div class="col-md-3">	
				<a href="<?php echo site_url('Astrology/Sadhesati_dosha_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Get Sadhesati Dosha analysis</h3>
				  </div>
				</a>
			</div>	
			<div class="col-md-3">	
				<a href="<?php echo site_url('Astrology/manglik_dosha_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Get Manglik Dosha analysis</h3>
				  </div>
				</a>
			</div>	
		</div>
		<br><br>
		<h2>Kundli Remedial Measures for you</h2><hr><br>
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo site_url('Astrology/gemstone_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Gemstone you can wear</h3>
				  </div>
				</a>
			</div>
			<div class="col-md-3">	
				<a href="<?php echo site_url('Astrology/rudraksha_input')?>" id="card1" class="card text-white mb-3" style="max-width: 15rem;text-decoration: none;">
				  <div class="card-body text-center">
				    <h3>Rudraksha recommendation</h3>
				  </div>
				</a>
			</div>	
		</div>
	</div>		
</section>

<!--<section>
	<div class="container mt-5">
		<div class="jumbotron jumbotron2">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="text-center">
						<h2 style="color: black">Check Out the Astrology <span>Loyalty Program</span> </h2>
						<h4 style="color: black">Earn Free recharge packs against your loyalty points</h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<button class="btn btn-circle"><span style="font-size: 26px;">Click Here</span></button>
				</div>	
			</div>
		</div>
	</div>
</section>-->