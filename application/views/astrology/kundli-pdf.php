<?php 
$user_id = $this->session->user_id;
// $page = current_url();
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kundli PDF</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/horoscope.css') ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<section class="mb-5">
	<div class="container" id="Features">
		<div class="text-center mt-5">
			<h2 style="font-size: 42px;">Premium Horoscope Features</h2>
		</div>
		<div class="row" >
			<div class="col-12 col-lg-4 mt-5">
				<div class="card card1" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Psersonlised Horoscope</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">Your horoscope is a snapshot of the planetary arrangement in the skies at the time of your birth. Know the planetary positions in your Horoscope and understand what they hold for you.	</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4 mt-5">
				<div class="card card1" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Horoscope Charts</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">Ascendant Chart, Navmansha Chart and Moon Chart together making it easy for analytical reading. Besides this, the meaning and significance of each Chart has also been given for simplified understanding.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4 mt-5">
				<div class="card card1" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;House and Sign Analysis</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">The nine planets behave differently in different houses and different signs. Get your free Horoscope with detailed analysis of the effects of the nine planets on your career, health, finance, relationship, etc.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Planetary Profiles</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">Know the planet placement in your horoscope whether a particular planet is Yogkaraka, Benefic, Malefic or Neutral in your kundli and get to know their analysis as per house and sign.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Numerology Prdeictions</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">The numbers have their own vibrations which produce various effects and influences on us. This personalised report gives you the complete numerological analysis based on your birth date and name.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1	" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Manglika and Kalsarpa Dosha</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text"> Manglik Dosha and Kalsarpa Dosha are considered among the most dreadful dosha in a Horoscope. But do you know that some planetary positioning can actually negate or reduce their effects? Know more.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1	" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Pitra Dosha Analysis</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text">  Pitra Dosha is a karmic debt of the ancestors and reflected in your horoscope in the form of planetary combinations. Get to know whether your kundli is free from Pitra Dosha and what are their remedies.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1	" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Sadhesati Timelines</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text"> Sadhesati refers to the seven and a half year period in which Saturn moves through 3 signs, Moon sign, one before Moon sign and one after Moon sign. This report gives you the complete date and time for all the 3 Sadhesati periods coming in your life and their remedies.</p>
				  </div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card card1	" style="width: 18rem; border: none;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #5b32b4;"><i class="far fa-check-circle"></i>&nbsp;Gems and Rudraksha</h5>
				    <h6 class="card-subtitle mb-2 text-muted"></h6>
				    <p class="card-text"> Gems therapy and Mantra recitation are two most powerful remedies for averting the malefic effects of planets. Different gems and different mantras are to be used for different purposes. Know which is your most suited Gem and Mantra.</p>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<h2 style="font-weight: 800; color: #57471e">Ask An Expert Astrologer</h2>
					<h4 class="mt-4" style="font-weight: 700; color: #57471e">Because life is full of uncertanties & challenges.</h4>
					<p class="mt-5" style="font-size: 20px;"><i class="far fa-check-circle" style="color: #5cbdb9;"></i>&nbsp;&nbsp;All Your Answers Delivered on Email Withing the 48 hours.</p>
					<p  style="font-size: 20px;"><i class="far fa-check-circle"style="color: #5cbdb9;"></i>&nbsp;&nbsp; High Level Accuracy.</p>
					<p  style="font-size: 20px;"><i class="far fa-check-circle"style="color: #5cbdb9;"></i>&nbsp;&nbsp;Highly Experienced Astrologer.</p>
					<p  style="font-size: 20px;"><i class="far fa-check-circle"style="color: #5cbdb9;"></i>&nbsp;&nbsp;Questions covering all major part of your life.</p>
					<p  style="font-size: 20px;"><i class="far fa-check-circle"style="color: #5cbdb9;"></i>&nbsp;&nbsp;Effective remedial suggestions.</p>
				</div>
				<div class="col-12 col-md-6"></div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron" style="background-color: white">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h1 class="display-4">Price : ₹499* Only <small><strike>₹999</strike></small></h1>
					<h3>You Save <strong style="color: green">₹500 (50%)</strong></h3>
					 <p style="color: green;">1245 People Bought Just now!!</p>
					<p class="mt-4" style="font-size: 20px;">Kundli PDF is one of our premium and unique offering with 70 pages of detailed horoscope analysis ranging from dosha analysis, numerological forecasts to detailed predictions and malefic, benefic or yogakaraka aspect of each planet in your kundli.

					</p>
					<?php 
						$result=$this->db_model->select_multi('balance', 'wallet', array('userid' => $user_id));
						$balance=$result->balance;

						$astroData=$this->db_model->select_multi('*', 'astro', array('user_id' => $user_id));
					
						if(!$user_id){
					 ?>
					 <a href="<?php echo site_url('site/login'); ?>" class="btn btn-danger btn-lg mt-3 float-left" data-toggle="modal" data-target="#myModal">Sign-In for Kundli PDF</a><br><br><br>
					 <!-- <h3 style="color: crimson">Login to member account!!!</h3> -->
					<?php }else if($balance<499 && $astroData->status != 'Paid') { ?>
						<!-- <a href="<?php echo site_url('astrology/kundli_pdf'); ?>" class="btn btn-danger btn-lg mt-3 float-left">Get Free Kundli PDF Now</a> -->
						
						<div class="alert alert-danger" style="color: crimson">Insufficient wallet balance!!! <br>Please top-up your wallet.
						</div>
					<?php }else if($astroData->status == 'Paid'){ ?>
						<a href="<?php echo site_url('astrology/kundli_print_form'); ?>" class="btn btn-success btn-lg mt-3 float-left">Get Kundli PDF >></a>
					<?php }else{ ?>
						<a href="<?php echo site_url('astrology/kundli_print_form'); ?>" class="btn btn-danger btn-lg mt-3 float-left">Purchase NOW >></a>
					<?php } ?>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/kundlibook.jpg') ?>" class="img-thumbnail" alt="..." style="height: 300px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>
