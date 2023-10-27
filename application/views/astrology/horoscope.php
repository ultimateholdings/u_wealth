<!DOCTYPE html>
<html>
<head>
	<title>Horoscope</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url('axxets/astrology/js/location.js') ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/horoscope.css') ?>">
	
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Horoscope</li>
</ol>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/panchang.png') ?>" class="pb-5 d-none d-sm-block" height="160"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 class="mt-3" style="color: white;">Horoscope</h2>
					<p>Choose your Sun Sign based on your date of birth and get to know your daily, monthly and yearly Sun sign based horoscopes.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
					<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac1.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 30%;">Aries</h1>
					  	 <p style="margin-left: 24%;">March 21 - April 20</p>
					  </div>
					</div>  
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Aries')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Aries Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Aries 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac2.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 25%;">Taurus</h1>
					  	 <p style="margin-left: 30%;">April 21 - May 21</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Taurus')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Taurus Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Taurus 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac3.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 25%;">Gemini</h1>
					  	 <p style="margin-left: 32%;">May 22 - June 21</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Gemini')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Gemini Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Gemini 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac4.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 25%;">Cancer</h1>
					  	 <p style="margin-left: 30%;">June 22 - July 22</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Cancer')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Cancer Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Cancer 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac5.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 35%;">Leo</h1>
					  	 <p style="margin-left: 25%;">July 23 - August 21</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Leo')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					   	<a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Leo Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Leo 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac6.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 30%;">Virgo</h1>
					  	 <p style="margin-left: 15%;">August 22 - September 23</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Virgo')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Virgo Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Virgo 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac7.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 30%;">Libra</h1>
					  	 <p style="margin-left: 15%;">September 24 - October 23</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Libra')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Libra Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Libra 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac8.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 20%;">Scorpio</h1>
					  	 <p style="margin-left: 15%;">October 24 - November 22</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Scorpio')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Scorpio Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Scorpio 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac9.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 7%;">Sagittarius</h1>
					  	 <p style="margin-left: 12%;">November 23 - December 22</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Sagittarius')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Sagittarius Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Sagittarius 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac10.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 12%;">Capricorn</h1>
					  	 <p style="margin-left: 15%;">December 23 - January 20</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Capricorn')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Capricorn Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Capricorn 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac11.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 15%;">Aquarius</h1>
					  	 <p style="margin-left: 18%;">January 21 - February 19</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Aquarius')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Aquarius Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Aquarius 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-12 col-md-4 p-5">
				<div class="card" style="width: 18rem;">
				  	<div class="box box-2">
					  <div class="first">
					    <img src="<?php echo base_url('axxets/astrology/img/zodiac12.jpg') ?>" class="card-img-top" alt="...">
					  </div>
					  <div class="second">
					  	 <h1 style="font-size: 50px; margin-top: -180px; margin-left: 25%;">Pisces</h1>
					  	 <p style="margin-left: 20%;">February 20 - March 20</p>
					  </div>
					</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
					    <a href="<?php echo site_url('Astrology/Pisces')?>"><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Today's Horoscope</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Pisces Month</li></a>
					    <a href=""><li class="list-group-item"><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp;Pisces 2020</li></a>
					</ul>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

