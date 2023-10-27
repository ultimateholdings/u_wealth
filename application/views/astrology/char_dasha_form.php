<!DOCTYPE html>
<html>
<head>
	<title>Char Dasha</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	  <script src="<?php echo base_url('axxets/astrology/js/mapbox-sdk.min.js') ?>"></script>
	  <link rel="stylesheet" href="<?php echo base_url('axxets/astrology/css/autocomplete.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=b71d909a197d8a6a4773f03dda117818&callback=initMap" async defer></script>
	<script type="text/javascript" src="<?php echo base_url('axxets/astrology/js/location.js') ?>" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Char Dasha</li>
</ol>
<section>
	<div class="container mt-5">
		<div class="text-center mt-5 mb-5">
		   <h1>Gain Insight into Your Life by Creating Your Free Kundli</h1>
		</div>
		<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 0 20%;">
			<div class="card-body">
				<div class="mt-5 mb-5" style="padding:0 15%;">	
					<!--<form method="post" action="<?=site_url("Astrology/kundli_report"); ?>">-->
					<?php echo form_open('astrology/char_dasha',['autocomplete'=>'off']); ?>
					<div class="row">
					    <?php $this->load->view('astrology/inc/FormInput') ?>
					    <div id="form_button">
					  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Get your Char Dasha Analysis','class'=> 'submit btn btn-primary btn-lg btn-block mt-3 ml-3')); ?>
					  </div>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script src="<?php echo base_url('axxets/astrology/js/autocomplete.js') ?>"></script>