<?php 
	$today = getdate();
	$data_ZodiacYesterday=json_decode($responseData45);
	$data_ZodiacToday=json_decode($responseData46);
	$data_ZodiacTommorow=json_decode($responseData47);
	//echo $responseData47;
?>
<!DOCTYPE html>
<html>
<head>
	<title style="text-transform: capitalize;"><?php echo $data_ZodiacToday->sun_sign; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url('axxets/astrology/js/location.js') ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/astro.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/zodiac.css') ?>">

</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active" style="text-transform: capitalize;"><?php echo $data_ZodiacToday->sun_sign; ?></li>
</ol>
<!--body-->
<?php //echo $responseData45; ?>
<section>
	<div class="container mt-5">
		<div class="text-center">
			<h1>FREE DAILY HOROSCOPE</h1>
		</div>
		<div class="row mt-5">
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Aries')?>" name="aries"><img src="<?php echo base_url('axxets/astrology/img/aries1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Aries</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/3 - 19/4</p>-->
				</div>
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Taurus')?>"><img src="<?php echo base_url('axxets/astrology/img/taurus1.jpg') ?>" style="height: 60px;">
				</a>	
				<div class="text-center">
					<p>Taurus</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">20/4 - 20/5</p>-->
				</div>	
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Gemini')?>"><img src="<?php echo base_url('axxets/astrology/img/gemini1.jpg') ?>" style="height: 60px;">
				</a>	
				<div class="text-center">
					<p>Gemini</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/5 - 20/6</p>-->
				</div>	
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Cancer')?>"><img src="<?php echo base_url('axxets/astrology/img/cancer1.jpg') ?>" style="height: 60px;">
				</a>
				<div class="text-center">
					<p>Cancer</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/6 - 22/7</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Leo')?>"><img src="<?php echo base_url('axxets/astrology/img/leo1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Leo</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/7 - 22/8</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Virgo')?>"><img src="<?php echo base_url('axxets/astrology/img/virgo.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Virgo</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/8 - 22/9</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Libra')?>"><img src="<?php echo base_url('axxets/astrology/img/libra1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Libra</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/9 - 22/10</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Scorpio')?>"><img src="<?php echo base_url('axxets/astrology/img/scorpio1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Scorpio</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/10 - 21/11</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Sagittarius')?>"><img src="<?php echo base_url('axxets/astrology/img/sagittarius1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Sagittarius</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">22/11 - 21/12</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Capricorn')?>"><img src="<?php echo base_url('axxets/astrology/img/capricorn1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Capricorn</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">22/12 - 19/1</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('astrology/Aquarius')?>"><img src="<?php echo base_url('axxets/astrology/img/aquarius1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Aquarius</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">20/1 - 18/2</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">	
				<a href="<?php echo site_url('astrology/Pisces')?>"><img src="<?php echo base_url('axxets/astrology/img/pisces1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Pisces</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">19/2 - 20/3</p>-->
				</div>		
			</div>
		</div> 
	</div>
</section>

<section>
	<div class="container my-5" style="font-size: 16px;">
		<div class="row">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="box box-2">
					  	<div class="first">
					    	<img src="
					    	<?php 
					    	if($data_ZodiacToday->sun_sign == 'aries'){
					    		echo base_url('axxets/astrology/img/zodiac1.jpg');
					    	}
					    	else if($data_ZodiacToday->sun_sign == 'taurus'){
					    		echo base_url('axxets/astrology/img/zodiac2.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'gemini'){
					   			echo base_url('axxets/astrology/img/zodiac3.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'cancer'){
					   			echo base_url('axxets/astrology/img/zodiac4.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'leo'){
					   			echo base_url('axxets/astrology/img/zodiac5.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'virgo'){
					   			echo base_url('axxets/astrology/img/zodiac6.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'libra'){
					   			echo base_url('axxets/astrology/img/zodiac7.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'scorpio'){
					   			echo base_url('axxets/astrology/img/zodiac8.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'sagittarius'){
					   			echo base_url('axxets/astrology/img/zodiac9.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'capricorn'){
					   			echo base_url('axxets/astrology/img/zodiac10.jpg');
					   		}
					   		else if($data_ZodiacToday->sun_sign == 'aquarius'){
					   			echo base_url('axxets/astrology/img/zodiac11.jpg');
					   		}
					   		else{
					   			echo base_url('axxets/astrology/img/zodiac12.jpg');
					   		}

					    	?>
					    	" class="card-img-top" alt="...">
					  	</div>
					</div>  
				  	<!-- <div class="card-body">
				  		<h5>March 21 - April 20(sample data)</h5>
				  		<hr>
				  		<h5 style="color: red">Characteristics(sample data)</h5>
				  		<p>Ariens are famed for their fiery, positive, outgoing natures. Considered among the most enthusiastic of the zocliac children, they have high energy levels and often fast-paced lifestyles. Their fiery determination to accomplish things sometimes encourages hot-headedness and rudeness. Ariens do all things in their own way, with energetic determination and regardless of obstacles.
						</p>
				    	<hr>
				    	<h5 style="color: red">Strength</h5>
				    	<p>Courageous, Confident, Enthusiastic, Passionate</p>
				    	<hr>
				    	<h5 style="color: red">Weakness</h5>
				    	<p>Impatient, Short-Tempered, Aggressive</p>
				    	<hr>
				    	<h5 style="color: red">Favorable Colors</h5>
				    	<p>Red</p>
				    	<hr>
				    	<h5 style="color: red">Favorable Numbers</h5>
				    	<p>1, 8, 17</p>
				  	</div> -->
				</div>
			</div>

			<div class="col-md-8">
				<button class="tablink" onclick="openPage('yesterday', this, 'royalblue')">Yesterday</button>
				<button class="tablink" onclick="openPage('today', this, 'royalblue')" id="defaultOpen">Today</button>
				<button class="tablink" onclick="openPage('tommorow', this, 'royalblue')">Tomorrow</button>

				<div id="yesterday" class="tabcontent">
  					<ul class="tabs-content">
						<h3 class="text-center"><?php echo $data_ZodiacYesterday->prediction_date."&nbsp;for &nbsp;".$data_ZodiacYesterday->sun_sign; ?></h3><br><br><br>
						<li style="list-style:none">
							<div class="tab__content">
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/personal_life.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Personal life horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacYesterday->prediction->personal_life ?> 
											</p>
										</div>	
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/profession.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Profession horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacYesterday->prediction->profession ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/health.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Health horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacYesterday->prediction->health ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/emotions.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Emotions horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacYesterday->prediction->emotions ?>
			 								</p>
										</div>
									</div>
								</div>
								<br><br>
						
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/travel.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
											<h4 class="type--uppercase">Travel horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacYesterday->prediction->travel ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/luck.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Luck horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacYesterday->prediction->luck ?>
			 								</p>
										</div>
									</div>
								</div> 
							</div>
						</li>
					</ul>
				</div>
				<div id="today" class="tabcontent">
  					<ul class="tabs-content">
						<h3 class="text-center"> <?php echo $data_ZodiacToday->prediction_date."&nbsp;for &nbsp;".$data_ZodiacToday->sun_sign; ?></h3><br><br><br>
						<li style="list-style:none">
							<div class="tab__content">
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/personal_life.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Personal life horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacToday->prediction->personal_life ?> 
											</p>
										</div>	
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/profession.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Profession horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacToday->prediction->profession ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/health.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Health horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacToday->prediction->health ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/emotions.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Emotions horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacToday->prediction->emotions ?>
			 								</p>
										</div>
									</div>
								</div>
								<br><br>
						
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/travel.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
											<h4 class="type--uppercase">Travel horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacToday->prediction->travel ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/luck.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Luck horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacToday->prediction->luck ?>
			 								</p>
										</div>
									</div>
								</div> 
							</div>
						</li>
					</ul>
				</div>
				<div id="tommorow" class="tabcontent">
  					<ul class="tabs-content">
						<h3 class="text-center"><?php echo $data_ZodiacTommorow->prediction_date."&nbsp;for &nbsp;".$data_ZodiacTommorow->sun_sign; ?></h3><br><br><br>
						<li style="list-style:none">
							<div class="tab__content">
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/personal_life.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Personal life horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacTommorow->prediction->personal_life ?> 
											</p>
										</div>	
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/profession.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Profession horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacTommorow->prediction->profession ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/health.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8"> 
											<h4 class="type--uppercase">Health horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacTommorow->prediction->health ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/emotions.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Emotions horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacTommorow->prediction->emotions ?>
			 								</p>
										</div>
									</div>
								</div>
								<br><br>
						
								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/travel.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
											<h4 class="type--uppercase">Travel horoscope</h4>
											<p style="font-size:1.16em">
												<?php echo $data_ZodiacTommorow->prediction->travel ?>
											</p>
										</div>
									</div>
								</div>
								<br><br>

								<div class="boxed boxed--border boxed--md for-mobile bg--site">
									<div class="row">
										<div class="col-md-3 text-center">
											<img src="<?php echo base_url('axxets/astrology/img/luck.png') ?>" width="90" height="90" style="margin-top:20px;">
										</div>
										<div class="col-md-9 text-left p-t-10 p-l-8">
			 								<h4 class="type--uppercase">Luck horoscope</h4>
			 								<p style="font-size:1.16em">
			 									<?php echo $data_ZodiacTommorow->prediction->luck ?>
			 								</p>
										</div>
									</div>
								</div> 
							</div>
						</li>
					</ul>
				</div>
				<script type="text/javascript" src="<?php echo base_url('axxets/astrology/js/zodiac.js') ?>" ></script>
			</div>
		</div>
	</div>
</section>


<!-- Footer -->
