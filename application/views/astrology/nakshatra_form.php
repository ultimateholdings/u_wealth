<!DOCTYPE html>
<html>
<head>
	<title>Nakshatra</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
		<script src="<?php echo base_url('axxets/astrology/js/mapbox-sdk.min.js') ?>"></script>
  	<link rel="stylesheet" href="<?php echo base_url('axxets/astrology/css/autocomplete.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/nakshatra_form.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header'); ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Nakshatra</li>
</ol>
<section>
	<div class="container mt-5">
		<div class="card shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-body">
				<div class="card-header" style="background-color: #5cbdb9;">
				<h4 class="ml-3">Nakshatra For you</h4>
				<p class="ml-3" style="font-size: 20px; color: white"><strong>'Nakshatra'</strong> is a term used for lunar mansion in Vedic astrology. Each lunar mansion of 13°20' length is subdivided into four quarters of 3°20' called padas. As per Hindu Mythology, a nakshatra is one of 27 houses along the ecliptic. The nakshatra or lunar constellations are connected to the natal signs of the moon.</p>
				</div>
				<div class="mt-5 mb-5" style="padding:0 20%;">	
					<?php echo form_open('Astrology/nakshatra_prediction',['autocomplete'=>'off']); ?>
					<div class="row">
					<?php $this->load->view('astrology/inc/FormInput') ?>
					    <div id="form_button">
					  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Get Your Nakshatra Prediction','class'=> 'submit btn btn-primary btn-lg btn-block mt-3 ml-3')); ?>
					  </div>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>	
			</div>
		</div>
	</div>	
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/nakshatra.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 500px;">
				</div>
				<div class="col-12 col-md-7 p-5">
					<h3>Importance of Nakshatra</h3>
					<p class="mt-4" style="font-size: 20px;">Nakshatra is responsible to give an analysis of one's thinking power, insights, characteristics and even helps to calculate your dasha period ( birth chart ). People use the concept of Nakshatra for astrological analysis and accurate predictions. Nakshatra is based on a list of 27 asterisms and each nakshatra has a powerful deity that places within it. Each nakshatra has its own shakti and power and is governed as ‘lord’ by one of the nine planets following the same order: South lunar node, Venus, Sun, Moon, Mars, North lunar node, Jupiter, Saturn, and Mercury. The sequence repeats itself three times to cover all 27 nakshatras.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="<?php echo base_url('axxets/astrology/js/autocomplete.js') ?>"></script>

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
