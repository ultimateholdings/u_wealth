<!DOCTYPE html>
<html>
<head>
	<title>Kundli Matching</title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/kundli_matching.css') ?>">
	</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<section>
	<div class="container mt-5">
		<div class="card shadow-lg p-3 mb-5 bg-white rounded" id="tag">
			<div class="card-body">
				<div class="card-header" style="background-color: #5cbdb9;">
				<h4 class="ml-3">Match your horoscope now</h4>
				<p class="ml-3" style="font-size: 20px; color: white">Kundli matching help you find a way to your partner and lead a happy and prosperous married life. Along with Gun Milan, checkout other important aspects such as Nadi Dosha, Manglik Dosha, Gana Dosha and much more.</p>
				</div>
				<div class="mt-5 mb-5" style="padding:0 20%;">	
					<form action="<?php echo site_url('astrology/data_male') ?>" autocomplete="off" method="POST">
						<!-- <?php echo form_open('astrology/data_male',['autocomplete'=>'off']); ?> -->
						  <h5 class="mb-4">Enter Female Birth Details</h5>
						  <div class="row">
						    <div class="col-12">
						      <label>Female Name</label>
						      <!-- <input type="text" class="form-control" placeholder="First name"> -->
						      <?php echo form_input($data=array('class'=>'form-control','name'=>'Name','placeholder'=>'First name','required'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
					      		<label>Date</label>
					      		<!--<input type="date" class="form-control">-->
					       		<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'date','placeholder'=>'DD','min'=>1,'max'=>31,'required'=>''));?>
					    	</div>
					    	<div class="col-4 mt-2">
					      		<label>Month</label>
					      		<!--<input type="number" class="form-control" placeholder="Hour">-->
					      		<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'month','placeholder'=>'MM','min'=>1,'max'=>12,'required'=>''));?>
					    	</div>
					    	<div class="col-4 mt-2">
					      		<label>Year</label>
					      		<!--<input type="number" class="form-control" placeholder="Hour">-->
					      		<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'year','placeholder'=>'YYYY','min'=>1900,'max'=>$today['year'],'required'=>''));?>
					    	</div>
						    <div class="col-4 mt-2">
						      <label>Hour</label>
						      <!--<input type="number" class="form-control" placeholder="Hour">-->
						      <?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'hour','placeholder'=>'Hour','min'=>0,'max'=>23,'required'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      <label>Minute</label>
						      <!--<input type="number" class="form-control" placeholder="Min">-->
						      <?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'min','placeholder'=>'Min','min'=>0,'max'=>59,'required'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
					      		<label>Second</label>
					      		<!--<input type="number" class="form-control" placeholder="Sec">-->
					      		<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'sec','placeholder'=>'ss','min'=>0,'max'=>59,'required'=>''));?>
					    	</div>
					   		<div class="col-12 mt-3 autocomplete">
					      		<label>Birth Place</label>
					      		<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
					      		<?php echo form_input($data=array('type'=>'search','id'=>'myInput','class'=>'form-control','name'=>'birthplace','placeholder'=>'Enter Your Birth Place','required'=>''));?>
					    	</div>
						    <div class="col-6 pt-3">
						    	<small>*Enter Male details on next page</small>
						    </div>
						    <div class="col-6">
						    <!--<button type="button" class="btn btn-primary mt-3 ml-3 float-left">Next</button>-->
						    <?php echo form_submit($data = array('type' => 'submit','value'=> 'Next','class'=> 'submit btn btn-primary mt-3 ml-3 float-left')); ?>
						    </div>
						  </div>
					</form>	
					<!-- <?php echo form_close(); ?> -->
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
					<img src="<?php echo base_url('axxets/astrology/img/wedding1.jpg') ?>" class="img-thumbnail" alt="..." style="height: 450px; width: 600px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3>What is Kundli Matching ?</h3>
					<p class="mt-4" style="font-size: 20px;">'Vivaha' or Marriage is one of the 16 Samskaras or religious conducts/rites. Samskaras are the different crucial turning points in a person's life; hence they are respected and celebrated. Kundli matching is the horoscope matching of the couple before marriage. Ashtakoot and Dashtakoot are two majorly followed matching systems in Vedic Astrology. It indicates the influence of the stars on marital life and remedial measures needed to be taken in case of any inauspicious yogas just to ensure a happy and healthy married life.
					</p>
					 <a href="#tag" class="btn btn-primary mt-3 ml-3 float-left">Get Kundli Matching Now</a>
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
					<h3>Why Kundli Matching ?</h3>
					<p class="mt-4" style="font-size: 20px;">Marriage Matchmaking has now assumed a greater significance with the changing socio-economic conditions and radical modifications in the status and role of women in family life. Besides comparing the educational, cultural and professional backgrounds, the prospective bride/groom and their parents are also interested in assuring whether their married life will be happy, harmonious and fruitful too.

					</p>
					 <a href="#tag" class="btn btn-primary mt-3 ml-3 float-left">Get Kundli Matching Now</a>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/wedding2.jpg') ?>" class="img-thumbnail" alt="..." style="height: 300px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>
