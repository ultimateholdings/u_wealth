<!DOCTYPE html>
<html>
<head>
	<title>Free Kundli</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo base_url('axxets/astrology/js/mapbox-sdk.min.js') ?>"></script>
  	<link rel="stylesheet" href="<?php echo base_url('axxets/astrology/css/autocomplete.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		footer{
			background: rgba(37,37,37,0.84);
		}
		ul a li{
			color: grey;
		}
		ul a li:hover{
			color: white;
		}
	.breadcrumb-item + .breadcrumb-item::before {
    display: inline-block;
    padding-right: 0.5rem;
    color: grey;
    content: ">";   
	}

#breadcrumbLink{
  text-decoration: none;
  color: darkcyan;
}
.breadcrumb-item.active {
    color: black;
}
	</style>
	

</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item" ><a href="<?php echo site_url('Astrology/astro_home')?>"  id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active" style="color:black">Free Kundli</li>
</ol>

<section>
	<div class="container mt-5">
		<div class="text-center mt-5 mb-5"   id="tag1">
		   <h1>Gain Insight into Your Life by Creating Your Free Kundli</h1>
		</div>
		<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 0 20%;">
			<div class="card-body">
				<div class="mt-5 mb-5" style="padding:0 15%;">	
					<!--<form method="post" action="<?=site_url("Astrology/kundli_report"); ?>">-->
					<?php echo form_open('Astrology/basic_astro',['autocomplete'=>'off']); ?>
					<div class="row">
					  <?php $this->load->view('astrology/inc/FormInput') ?>
					    <div id="form_button">
					  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Create Free Kundli','class'=> 'submit btn btn-primary btn-lg btn-block mt-3 ml-3')); ?>
					  </div>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script src="<?php echo base_url('axxets/astrology/js/autocomplete.js') ?>"></script>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/kundli1.jpg') ?>" class="img-thumbnail" alt="..." style="height: 450px; width: 600px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3>What is Kundli ?</h3>
					<p class="mt-4" style="font-size: 20px;">Kundli also known as horoscope, represents the position of the planets at the time of your birth. Kundli is used to interpret celestial influence in your life. Accurate birth date, time and place are an important factor in Vedic Astrology as it helps to generate accurate Kundli. Kundli generation is the building block of predictive astrology. There are various types of options to generate a Kundli such as Parashari, Jaimini or KP Kundli along with different Ayanamsa. We at Vedic Rishi, provide you with all the options to choose and generate your own accurate Kundli.

					</p>
					 <a href="#tag1" class="btn btn-primary mt-3 ml-3 float-left">Create Your Free Kundli Now</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>How does Kundli works ?</h3>
					<p class="mt-4" style="font-size: 20px;">At the date of birth, time and place, there is specific astronomical pattern in the heavens or sky. This sky model is recorded from a distinct geographical point. This documentation of planet-earth-sky pattern at the time of your birth is known as Kundli Chart. On the kundli, planets and their signs, house divisions and ascendant or rising sign is indicated. To interpret or analyse this kundli, four steps are given as follows.

					</p>
					 <a href="#tag1" class="btn btn-primary mt-3 ml-3 float-left">Create Your Free Kundli Now</a>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/kundli2.jpg') ?>" class="img-thumbnail" alt="..." style="height: 300px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>
