<?php 
$user_id = $this->session->user_id;
// $page = current_url();
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>
<!DOCTYPE html>
<html>
<head>
	<title>FREE KUNDLI PDF</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js" integrity="sha512-GctVjwNNH1cjfoaMyi3WTXq/Y+NDpQ2q+tVPGtNNCgmKiokNiWR68MMYbgaCLg5IgHgZ3dM8EVcmRpJVBLkaiA==" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/print_astropdf.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/panchang.css') ?>">

	<style type="text/css">
		.rounded-circle{
		  width: 120px;
		  height: 120px;
		  background-color: yellow;
		}

		.btn-circle{
		  border-radius: 40px ;
		  height: 68px ;
		  width: 250px;
		  background-color: #fdde6c;
		}
		.number{
		 margin-left: 39%;
		 padding-top: 19%;
		 font-size: 45px; 
		}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>
<body> 
	<?php $today = getdate(); 
	$walletBalance=$this->db_model->select_multi('balance', 'wallet', array('userid' => $user_id))->balance;
	$astroData=$this->db_model->select_multi('*', 'astro', array('user_id' => $user_id))->purchase_id;
	?>
	<nav class="navbar navbar-expand-lg fixed-top card-header pb-2">
		
		<button id="btn" class="btn btn-lg btn-success center">DOWNLOAD PDF</button>	
		<h5>
			User ID: <?php echo $user_id; ?><br>
			Purchase ID: <?php echo $astroData; ?>	
		</h5>
		<hr><h4>Wallet balance: <?php echo $walletBalance; ?></h4>
	</nav>
	<hr>
	<div id="content" style="background-color: white; padding-top: 50px">
	<div class="container" id="basicAstro">
		<div class="caption text-center">
			<h3 class="display-4">BASIC ASTRO</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
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
			<p class="mt-4">
				<p>Your <b><u>kundli</u></b> is ready. You are born on <?php echo $date; ?>/<?php echo $month; ?>/<?php echo $year; ?>. Your place of birth is <?php echo $place; ?>. If there is any mistake, please Click here to re-enter your birth 	details again or else go ahead and explore your Kundli.
					<?php $data_basicAstro = json_decode($responseData1); 
					//echo $responseData1; //To check the Details.?>
					<a href="/kundli/"><b>Click here</b></a> 
					to re-enter your birth details again or else go ahead and explore your Kundli.
				</p>
			</p>

			<div class="card mt-5 mb-3">
	  			<div class="card-header text-center">
	    			<h3>About You</h3>
	  			</div>
	  			<div class="card-body">
	    			<p class="card-text">You are born with the <?php echo $data_basicAstro->ascendant; ?> rising. This means your ascendant is <?php echo $data_basicAstro->ascendant; ?> and <?php echo $data_basicAstro->ascendant_lord; ?> is your ascendant lord. Being ascendant lord, <?php echo $data_basicAstro->ascendant_lord; ?> is one of the most prominent and beneficial planet for you. You can see the detailed ascendant report from below. Your Moon sign is <?php echo $data_basicAstro->sign; ?> and Moon sign lord is <?php echo $data_basicAstro->SignLord; ?>. Moon sign is also called	your birth sign or Janma Rashi. Your birth Nakshatra is <?php echo $data_basicAstro->Naksahtra; ?>. 
	    			</p>
		 		</div>
			</div>
		</div>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="sadhesati">
		<div class="caption text-center">
			<h3 class="display-4">SADHESATI</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/sadhesati1.jpg') ?>" class="img-thumbnail" alt="..." style="height: 400px; width: 500px;">
						</div>
						<div class="col-12 col-md-7 p-5">
							<h3>What is Sadhe sati ?</h3>
							<p class="mt-4" style="font-size: 20px;">
								<?php 
								$data_sadhesatiLifeDetails = json_decode($responseData201);
								$data_sadhesatiCurrentStatus = json_decode($responseData202);
								$data_sadhesatiRemedies = json_decode($responseData203);
							//echo $responseData203;//$data_sadhesati->conclusion; 
								echo $data_sadhesatiRemedies->what_is_sadhesati; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5 alert alert-info" role="alert">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/sadhesatiN.png') ?>" class="pb-5 d-none d-sm-block" height="180"  >
						</div>
						<div class="col-12 col-md-8">
							<h2 style="font-size: 44px;color: white;" class="mt-4 alert-heading">Sadhesati</h2>
							<p><?php
							echo "<b style='color: yellow;'>Consideration Date:</b>&nbsp;".$data_sadhesatiCurrentStatus->consideration_date;
							echo "<br><b style='color: yellow;'>Moon Sign:</b>&nbsp;".$data_sadhesatiCurrentStatus->moon_sign;
							echo "<br><b style='color: yellow;'>Saturn Sign:</b>&nbsp;".$data_sadhesatiCurrentStatus->saturn_sign;
							echo "<br><h3 style='color: white;'>".$data_sadhesatiCurrentStatus->is_undergoing_sadhesati."</h3>";
				//			echo $responseData203;
							?></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container table-responsive mb-5">
				<table class="table table-striped" style="border: 1px solid #F0F0F0">
				  <thead>
				    <tr>
				      <th scope="col">Date</th>
				      <th scope="col">Moon Sign</th>
				      <th scope="col">Saturn Sign</th>
				      <th scope="col">Retro</th>
				      <th scope="col">Type</th>
				      <th scope="col">Summary</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if(count($data_sadhesatiLifeDetails)): ?>
		                <?php foreach ($data_sadhesatiLifeDetails as $row): ?>
				    <tr>
				      <td scope="row"><?php echo $row->date;?></td>
				      <td><?php echo $row->moon_sign;?></td>
				      <td><?php echo $row->saturn_sign;?></td>
				      <td><?php echo $row->is_saturn_retrograde;?></td>
				      <td><?php echo $row->type;?></td>
				      <td><?php echo $row->summary;?></td>
				    </tr>
				        <?php endforeach; ?>
		              <?php endif; ?>
				  </tbody>
				</table>
			</div>
		</section>

		<section>
			<div class="container mb-5" style="font-size: 20px;">
				<div class="row">
					<h2 style="font-size: 44px;">Remedies for Sadhesati</h2>
				</div><hr class="bg-info" />
				<ul class="bullets next-line-pad list" style="padding-left: 25px">
					<?php foreach ($data_sadhesatiRemedies->remedies as $remedy):?>
					<li class="mt-3"><?php echo $remedy; ?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="pitraDosh">
		<div class="caption text-center">
			<h3 class="display-4">Pitra Dosha</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/pitraN.png') ?>" class="pb-5 d-none d-sm-block" height="150"  >
						</div>
						<div class="col-12 col-md-8">
							<h2 style="font-size: 44px;">What is Pitra Dosha?</h2>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<p style="font-size: 20px;">
					<?php 
					$data_pitradosh = json_decode($responseData20);
					echo $data_pitradosh->what_is_pitri_dosha; ?>
					
				</p>
			</div>
		</section>


		<section>
			<div class="container my-5">
				  <h4 class="alert-heading">Status</h4>
				  <p>
					<?php 
					 if($data_pitradosh->is_pitri_dosha_present == false){
						echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>".$data_pitradosh->conclusion."</h4></div>";
				 } 
				 else{ 
					echo "<div class='alert alert-danger role='alert'><h4 class='alert-heading'>Pitra-dosh Alert!!</h4>".$data_pitradosh->conclusion."</div>";
				 	} 
				 ?>
				 	</p>
				  <hr>
			</div>
		</section>

		<section>
			<div class="container mb-5" style="font-size: 20px;">
				<div class="row">
					<h2 style="font-size: 44px;">Remedies for Pitra Dosha</h2>
				</div><hr class="bg-info" />
				<ul class="bullets next-line-pad list" style="padding-left: 25px">
					<?php if($data_pitradosh->is_pitri_dosha_present==true){
						foreach ($data_pitradosh->remedies as $remedy):?>
					<li class="mt-3"><?php echo $remedy; ?></li>
					<?php endforeach; }
					else{
						echo "No remedies for now";
					} ?>
				</ul>
			</div>
		</section>

		<section>
			<div class="container mb-5" style="font-size: 20px;">
				<div class="row">
					<h2 style="font-size: 44px;">Effects of Pitra Dosha</h2>
				</div><hr class="bg-info" />
				<ul class="bullets next-line-pad list" style="padding-left: 25px">
					<?php if($data_pitradosh->is_pitri_dosha_present==true){
					foreach ($data_pitradosh->effects as $effect):?>
					<li class="mt-3"><?php echo $effect; ?></li>
					<?php endforeach; }
						else{
						echo "Nothing to worry.";
					}
					?>
				</ul>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="manglik">
		<?php 
		 	$data_manglik = json_decode($responseData21);
			// echo $responseData21;
		?>
		<div class="caption text-center">
			<h3 class="display-4">Manglik Dosh</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron" style="background-color: white">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 p-5">
							<h3>What is Manglik Dosha ?</h3>
							<p class="mt-4" style="font-size: 20px;">The Manglik Dosha is known to be very inauspicious and the individual may remain unmarried throughout his life. People are generally fearful towards this negative result of the planet that could effect their life. Especially, marriage. The Vedic astrology considers ascendent and the placement of 4th, 2nd, 7th, 8th and 12th house as unfavourable. Mars is basically known as the killer of marriage in all these houses as it is a significator of an individual’s health, personality and physic. An individual of Mars has the lack of politeness as their trait.
							</p>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="img-thumbnail ml-2" alt="..." style="height: 300px; width: 300px;border: none;">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container mb-5">
				  <h4 class="alert-heading">Status</h4>
				  <p>
					<?php 
					 if($data_manglik->is_present == false){
						echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>". $data_manglik->manglik_report."</h4></div>";
				 } 
				 else{ 
					echo "<div class='alert alert-danger role='alert'><h4 class='alert-heading'>Manglik Alert!!</h4>".$data_manglik->manglik_report."</div>";
				 	} 
				 ?>
				 	</p>
				  <hr>
			</div>
		</section>

		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="pb-5 d-none d-sm-block" height="170"  >
						</div>
						<div class="col-12 col-md-8 mt-4">
							<h2 style="color: black; font-size: 44px;">Reasons Behind Manglik Dosha</h2>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row">
							<div class="col-md-6">
								<h4 class="m-b-5">Rules based on Houses</h4>
								<ul class="bullets next-line-pad list" style="padding-left: 25px">
									<?php foreach ($data_manglik->manglik_present_rule->based_on_house as $house):?>
										<li class="mt-3"><?php echo $house; ?></li>
										<?php endforeach; ?>
								</ul>
							</div>
							<div class="col-md-6">
								<h4 class="m-b-5">Rules based on Aspect</h4>
								<ul class="bullets next-line-pad list" style="padding-left: 25px">
									<?php foreach ($data_manglik->manglik_present_rule->based_on_aspect as $aspect):?>
									<li class="mt-3"><?php echo $aspect; ?></li>
									<?php endforeach; ?>
									<hr class="m-t-5 m-b-5">
								</ul>
							</div>
				</div>
			</div>
		</section>

		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="pb-5 d-none d-sm-block" height="170"  >
						</div>
						<div class="col-12 col-md-8 mt-4">
							<h2 style="color: black; font-size: 44px;">Remedies for Manglik Dosha</h2>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container mb-5" style="font-size: 20px;">
				<ul>
					<li>Install an energized Mangal Yantra in your place of worship. Meditate on the triangular Mangal Yantra along with the recitation of Mangal mantra: Om Kram Krim Krom Sah Bhomayay Namah.</li>
					<li class="mt-3">In the evening, visit a Hanuman temple draw a triangle with red kumkum (roli) on a plate and worship Hanumanji with sindoor or red sandalwood, red flowers and a lighted lamp.</li>
					<li class="mt-3">Worship Lord Hanuman with the mantra: "||OM SHREEM HANUMATE NAMAH||"</li>
				</ul>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="kalsarpa">
		<?php 
		 	$data_kalsarpa = json_decode($responseData19);
					//echo $data_kalsarpa->one_line; 
					//echo $responseData19;
		?>
		<div class="caption text-center">
			<h3 class="display-4">KALSARPA Dosh</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
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
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="numerology">
		<?php 
		 	$data_numerology=json_decode($responseData38); 
			$data_numerologyReport=json_decode($responseData39); 
			$data_numerologyFavTime=json_decode($responseData40); 
			$data_numerologyPlaceVastu=json_decode($responseData41);
			$data_numerologyFastsReport=json_decode($responseData42);
			$data_numerologyFavLord=json_decode($responseData43);
			$data_numerologyFavMantra=json_decode($responseData44);
    		//echo $responseData43;
		?>
		<div class="caption text-center">
			<h3 class="display-4">NUMEROLOGY</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/numerologyN.png')?>" class="pb-5 d-none d-sm-block" height="160"  >
						</div>
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Your Numerology report</h2>
							<br>
							<h3 style="color: black"><?php echo $data_numerology->name; ?></h3>
							<h4 style="color: white"><p><?php echo $data_numerology->date; ?></p></h4>
							</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container my-5">
				<div class="card">
				  <div class="card-header text-center" style="font-size: 24px;font-weight: 500;">Numerology For You</div>
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-3">
						    <div class="rounded-circle ml-5">
						    	<p class="number"><?php echo $data_numerology->destiny_number; ?></p>
						    </div>
						    <p class="mt-3 ml-5	">Destiny Number</p>
						</div>
						<div class="col-md-3">
						    <div class="rounded-circle ml-5">
						    	<p class="number"><?php echo $data_numerology->radical_number; ?></p>
						    </div>
						    <p class="mt-3 ml-5">Radical Number</p>
						</div>
						<div class="col-md-3 ">
						    <div class="rounded-circle ml-5">
						    	<p class="number"><?php echo $data_numerology->name_number; ?></p>
						    </div>
						    <p class="mt-3 ml-5">Name Number</p>
						</div>
						<div class="col-md-3">
						    <div class="rounded-circle ml-5">
						    	<p class="number" style="margin-left: 24%;"><?php echo $data_numerology->evil_num; ?></p>
						    </div>
						    <p class="mt-3 ml-5">Evil Number</p>
						</div>    
				    </div>
				    <div class="row mt-5">
					    <div class="col-md-6">
						    <table class="table table-striped">
							  <tbody>
							    <tr>
							      <td>Your Name</td>
							      <th scope="col"><?php echo $data_numerology->name; ?></th>
							    </tr>
							    <tr>
							      <td>Birth Date</td>
							      <th><?php echo $data_numerology->date; ?></th>
							    </tr>
							    <tr>
							      <td>Radical Number</td>
							      <th><?php echo $data_numerology->radical_number; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Name Number</td>
							      <th><?php echo $data_numerology->name_number; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Destiny Number</td>
							      <th><?php echo $data_numerology->destiny_number; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Radical Ruler</td>
							      <th><?php echo $data_numerology->radical_ruler; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Friendly Numbers</td>
							      <th><?php echo $data_numerology->friendly_num; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Evil Numbers</td>
							      <th><?php echo $data_numerology->evil_num; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Neutral Numbers</td>
							      <th><?php echo $data_numerology->neutral_num; ?></th>
							    </tr>			    			    			    			    
							  </tbody>
							</table>
						</div>
						<div class="col-md-6">
						    <table class="table table-striped">
							  <tbody>
							    <tr>
							      <td>Favourbale days</td>
							      <th scope="col"><?php echo $data_numerology->fav_day; ?></th>
							    </tr>
							    <tr>
							      <td>Favourbale Stone</td>
							      <th><?php echo $data_numerology->fav_stone; ?></th>
							    </tr>
							    <tr>
							      <td>Favourable Substone</td>
							      <th><?php echo $data_numerology->fav_substone; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Favourable God</td>
							      <th><?php echo $data_numerology->fav_god; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Favourable Metal</td>
							      <th><?php echo $data_numerology->fav_metal; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Favourable Color</td>
							      <th><?php echo $data_numerology->fav_color; ?></th>
							    </tr>
							    <tr>
							      <td scope="row">Favourable Mantra</td>
							      <th><?php echo $data_numerology->fav_mantra; ?></th>
							    </tr>
							    </tbody>
							</table>
						</div>
					</div> 	
				    <h4 class="mt-5"><?php echo $data_numerologyReport->title; ?></h4>
				    <p style="font-size: 18px;"><?php echo $data_numerologyReport->description; ?></p>
				  </div>
				</div>
			</div>
		</section>

		<section>
			<div class="jumbotron" style="background-color: white;">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/fast1.png') ?>" alt="..." style="height: 300px; width: 450px;">
						</div>
						<div class="col-12 col-md-5 p-5">
							<h3><?php echo $data_numerologyFastsReport->title ?></h3>
							<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFastsReport->description ?>
							</p>
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
							<h3><?php echo $data_numerologyFavTime->title ?></h3>
							<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavTime->description ?>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/time.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="jumbotron" style="background-color: white;">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/gayatri.jpg') ?>" alt="..." style="height: 300px; width: 450px;">
						</div>
						<div class="col-12 col-md-5 p-5">
							<h3><?php echo $data_numerologyFavMantra->title ?></h3>
							<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavMantra->description; ?>
							</p>
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
							<h3><?php echo $data_numerologyFavLord->title ?></h3>
							<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavLord->description ?>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/vishnu.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="jumbotron" style="background-color: white;">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/vastu.jpg') ?>" alt="..." style="height: 450px; width: 500px;">
						</div>
						<div class="col-12 col-md-5 p-5">
							<h3><?php echo $data_numerologyPlaceVastu->title ?></h3>
							<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyPlaceVastu->description ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="rudraksha">
		<div class="caption text-center">
			<h3 class="display-4">RUDRAKSHA</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/rudraksha.png') ?>" class="pb-5 d-none d-sm-block" height="180">
						</div>
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Rudraksha for You</h2>
							<h4 style="color: black">
								<?php 
								$data_rudraksh = json_decode($responseData25);  
								$image_rudraksha=$data_rudraksh->img_url;
								//echo "<img src='".$image_rudraksha."' height='180'>";
								echo "<br>".$data_rudraksh->name;
								?>
								</h4>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container mb-5">
				<p style="font-size: 20px;"><?php echo $data_rudraksh->detail; ?><p>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="nakshatra">
		<?php 
		 	//echo $responseData31; 
			$data_DailyNakshtra=json_decode($responseData31);
		?>
		<div class="caption text-center">
			<h3 class="display-4">NAKSHATRA</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/nakshatra.jpg') ?>" class="pb-5 d-none d-sm-block" height="180"  >
						</div>
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Your Nakshatra report</h2>
							<h4 style="color: yellow"><?php echo $name; ?></h4>
							<p style="color: yellow;"><?php echo $date."/"."$month"."/".$year."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$hour."hr : ".$minute."min : ".$second."sec" ?></p>
							<p style="margin-top: -16px;color: yellow;"><?php echo $place ?></p>
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
							<h3>What your Nakshatra says about you?</h3>
							<p class="mt-4" style="font-size: 20px;">
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->health ?><br>
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->emotions ?><br>
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->profession ?><br>
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->personal_life ?><br>
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->luck ?><br>
								&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->travel ?>
							</p>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/nakshatra.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="gemstone">
		<?php 
		 	$data_gemstone=json_decode($responseData24);
				    	//echo $responseData24; 
		?>
		<div class="caption text-center">
			<h3 class="display-4">GEMSTONE</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-4">
				<h3>Your Life Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="saphire.jpg" class="card-img-top" alt="..." >-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->LIFE->name; ?></h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_metal; ?></span></li>
				  </ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Your Benefic Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="coral.png" class="card-img-top" alt="..." style="height: 220px;">-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->BENEFIC->name; ?></h5>
				  
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right" style="color: red;"><?php echo $data_gemstone->BENEFIC->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: red;"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_metal; ?></span></li>
				   </ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Your Lucky Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="ruby.png" class="card-img-top" alt="..." style="height: 220px;">-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->LUCKY->name; ?></h5>
				  
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right" style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_metal; ?></span></li>
				   </ul>
				</div>
			</div>
		</div>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="hora">
		<?php 
		 	$data_horomuhurta=json_decode($responseData48);
			//echo $responseData48."<br>";
		?>
		<div class="caption text-center">
			<h3 class="display-4">Hora Muhurta</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron2 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Hora For <?php echo $today['weekday'] ?></h2>
							<p style="color: yellow;"><?php echo $today['weekday'].",&nbsp;&nbsp;".$today['mday']."&nbsp;".$today['month']."&nbsp;&nbsp;".$today['year'].",&nbsp;&nbsp;".date("h:i A"); ?></p>
							<p style="margin-top: -16px;color: yellow;">Mumbai, Maharashtra, India</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container my-5">
				<h5>The following Hora Muhurta are shown for the date <?php echo $today['weekday'].",&nbsp;&nbsp;".$today['mday']."&nbsp;".$today['month']."&nbsp;&nbsp;".$today['year'].",&nbsp;&nbsp;".date("h:i A"); ?> and place "Mumbai, Maharashtra, India". These Panchang calculations are based on Drik Ganit i.e. current sidereal positions of planets in the sky. The Ayanamsha used is Lahiri or Chitrapakshiya. The current day sunrise is taken as the time to calculate planet positions and accordingly other drika panchang calculations.</h5>
				<div class="row mt-5">
					<div class="col-md-6">
						<div class="card text-center" style="width: 22rem;">
						  <div class="card-header"style="background-color: #5cbdb9;color: white;font-size: 22px;">Day Hora</div>
							<ul class="list-group list-group-flush" id="li">
								<?php foreach ($data_horomuhurta->hora->day as $d=>$dayHora):?>
								<li class="list-group-item">
									<strong><?php echo $dayHora->hora ?></strong>
									&nbsp;&nbsp;&nbsp;<?php echo $dayHora->time ?>
								</li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card text-center" style="width: 22rem;">
						  <div class="card-header"  style="background-color: #5cbdb9;color: white;font-size: 22px;">Night Hora</div>
							<ul class="list-group list-group-flush" id="li">
								<?php foreach ($data_horomuhurta->hora->night as $n=>$nightHora):?>
								<li class="list-group-item">
									<strong><?php echo $nightHora->hora ?></strong>
									&nbsp;&nbsp;&nbsp;<?php echo $nightHora->time ?>
								</li>
								<?php endforeach;?>
							</ul>
						</div>  
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<h1 class="mt-5">About Hora Muhurta</h1>
				<h5 style="font-weight: 400">The horas are auspicious for certain activities and inauspicious for others according to the nature of these planets. Planning the day according to the horas and avoiding unlucky activity during the connected hora reduces the chances of bad results.</h5>
			</div>		
		</section>	
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="chaughadiya">
		<?php 
		 	$data_chaughmuhurta=json_decode($responseData49);
			// echo $responseData49."<br>";
		?>
		<div class="caption text-center">
			<h3 class="display-4">Chaughadiya Muhurta</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron jumbotron2 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Chaughadiya For <?php echo $today['weekday'] ?></h2>
							<p style="color: yellow;"><?php echo $today['weekday'].",&nbsp;&nbsp;".$today['mday']."&nbsp;".$today['month']."&nbsp;&nbsp;".$today['year'].",&nbsp;&nbsp;".date("h:i A"); ?></p>
							<p style="margin-top: -16px;color: yellow;">Mumbai, Maharashtra, India</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container my-5">
				<h5>The following Chaughadiya are shown for the date <?php echo $weekday.",&nbsp;&nbsp;".$date."&nbsp;&nbsp;".$today['month']."&nbsp;&nbsp;".$year.",&nbsp;&nbsp;".date("h:i A"); ?> and place "Mumbai, Maharashtra, India". These Panchang calculations are based on Drik Ganit i.e. current sidereal positions of planets in the sky. The Ayanamsha used is Lahiri or Chitrapakshiya. The current day sunrise is taken as the time to calculate planet positions and accordingly other drika panchang calculations.</h5>
				<div class="row mt-5">
					<div class="col-md-6">
						<div class="card text-center" style="width: 22rem;">
						  <div class="card-header"style="background-color: #5cbdb9;color: white;font-size: 22px;">Day Hora</div>
							<ul class="list-group list-group-flush" id="li">
								<?php foreach ($data_chaughmuhurta->chaughadiya->day as $d=>$dayHora):?>
								<?php if($dayHora->muhurta =='Udveg' || $dayHora->muhurta =='Kaal' || $dayHora->muhurta =='Rog') {?>
								<li class="list-group-item" style="background-color: #FFA177FF">
									<strong>
										<?php echo $dayHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $dayHora->time ?>
								</li>
							<?php } else if($dayHora->muhurta =='Amrit' || $dayHora->muhurta =='Shubh' || $dayHora->muhurta =='Labh'){?>
								<li class="list-group-item" style="background-color: #F5C7B8FF">
									<strong>
										<?php echo $dayHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $dayHora->time ?>
								</li>
							<?php } else{ ?>
								<li class="list-group-item">
									<strong>
										<?php echo $dayHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $dayHora->time ?>
								</li>
							<?php } ?>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card text-center" style="width: 22rem;">
						  <div class="card-header"  style="background-color: #5cbdb9;color: white;font-size: 22px;">Night Hora</div>
							<ul class="list-group list-group-flush" id="li">
								<?php foreach ($data_chaughmuhurta->chaughadiya->night as $n=>$nightHora):?>
								<?php if($nightHora->muhurta =='Udveg' || $nightHora->muhurta =='Kaal' || $nightHora->muhurta =='Rog') {?>
								<li class="list-group-item" style="background-color: #FFA177FF">
									<strong>
										<?php echo $nightHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $nightHora->time ?>
								</li>
							<?php } else if($nightHora->muhurta =='Amrit' || $nightHora->muhurta =='Shubh' || $nightHora->muhurta =='Labh'){?>
								<li class="list-group-item" style="background-color: #F5C7B8FF">
									<strong>
										<?php echo $nightHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $nightHora->time ?>
								</li>
							<?php } else{ ?>
								<li class="list-group-item">
									<strong>
										<?php echo $nightHora->muhurta ?>
									</strong>
									&nbsp;&nbsp;&nbsp;<?php echo $nightHora->time ?>
								</li>
							<?php } ?>
								<?php endforeach;?>
							</ul>
						</div>  
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<h1 class="my-5">About Chaughadiya</h1>
				<h5 style="font-weight: 400">Ghadi is an ancient measure for calculations of time in India roughly equivalent to 24 minutes. Cho-ghadiya means four ghadi which totals to 96 minutes. Most of chaughadiya are of a figure around 96 minutes.</h5>
				<h5 class="mt-4" style="font-weight: 400">There are totally seven types of Choghdiya.</h5>
				<div class="my-2"><span class="rounded" style="background-color: #FFA177FF;color: #FFA177FF; border:1px solid black">red</span>&nbsp;&nbsp;- Udveg, Kal and Rog is considered inauspicious Chaughadiyas.</div>
				<div class="my-2"><span class="rounded" style="background-color: #F5C7B8FF;color: #F5C7B8FF; border:1px solid black">red</span>&nbsp;&nbsp;- Amrit, Shubh and Labh are considered the most auspicious Chaughadiyas.</div>
				<div class="my-2"><span class="rounded" style="background-color: #f0f8ff;color: #f0f8ff; border:1px solid black">red</span>&nbsp;&nbsp;- Char is considered as good Choghadiya.</div>
			</div>
		</section>				
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="ascendant">
		<?php 
		 	$data_ascendant=json_decode($responseData29);
					//echo $responseData29;
		?>
		<div class="caption text-center">
			<h3 class="display-4">Ascendant Information</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/ascendantN.png') ?>" class="img-thumbnail" alt="..." style="height: 450px; width: 600px;">
						</div>
						<div class="col-12 col-md-5 p-5">
							<h3>What is Ascendant ?</h3>
							<p class="mt-4" style="font-size: 20px;">The first house is known as Ascendant (Lagna) represents the presence of a person in a physical form. It represents the early life, childhood, character, health, willpower, fame, nature and different aspect of life. This house provides a peek into the sense of knowing one’s weakness, strength, likes, dislikes and much more. It is helpful to a person’s personality. How they perceive manners, behaviours and attitude in one’s life.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="jumbotron jumbotron1 mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<img src="<?php echo base_url('axxets/astrology/img/ascendantN.png') ?>" class="pb-5 d-none d-sm-block" height="160"  >
						</div>
						<div class="col-12 col-md-8">
							<h2 style="color: white; font-size: 44px;">Your Ascendant report</h2>
							<h4 style="color: yellow"><?php echo $name; ?></h4>
							<p style="color: yellow;"><?php echo $date."/".$month."/".$year; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $hour."hr : ".$minute."min : ".$second."sec"; ?></p>
							<!--<p style="margin-top: -16px;color: yellow;"><?php echo $birthplace; ?></p>-->
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row mb-5" style="font-size: 20px;">
					<div class="col-md mb-3"><?php echo $data_ascendant->asc_report->report; ?></div>
				</div>
			</div>
		</section>		
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="panchang">
		<?php 
			// print_r($today);
		 	$data_AdvPanchngSunRise=json_decode($responseData37);
			$data_AdvPanchngSunRiseNext=json_decode($responseData37Next);
			//echo $responseData37Next."<br>";
		?>
						<div class="caption text-center">
							<h3 class="display-4">PANCHANG Details</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
		<div class="row mt-3">
			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Today's Panchang</h3>
				    <div class="row">
				    	<div class="col-10">
				    		<p>Ayana - <strong><?php echo $data_AdvPanchngSunRise->ayana ; ?></strong></p>
				    		<h4><?php echo $data_AdvPanchngSunRise->ritu ; ?> Ritu</h4>
				    	</div>
				    	<div class="col-2">
				    		<i class="fas fa-seedling" style="font-size: 40px;"></i>
				    	</div>
				    </div>	
				  </div>
				  <ul class="list-group list-group-flush">
    				<li class="list-group-item"><?php echo $today['weekday'].",&nbsp;&nbsp;".$today['mday']."&nbsp;".$today['month']."&nbsp;&nbsp;".$today['year']; ?></li>
    			  </ul>	
				   <ul class="list-group list-group-flush">
				   	<div class="row">
				   		<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sunrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sunrise ; ?></p>
    					</div>
    					<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sunset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sunset ; ?></p>
    					</div>
    					<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Moonrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moonrise ; ?></p>
    					</div>
    					<div class="col-3">
    				 		<h6 class="mt-3 ml-4">Moonset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moonset ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Hindu Sunrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->vedic_sunrise ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Hindu Sunset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->vedic_sunset ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sun Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sun_sign ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Moon Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_sign ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Panchang Element</h3>	
				  </div>
				  	<dl class="row mt-4">
					  <dt class="col-sm-3">Tithi</dt>
					  <dd class="col-sm-9">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->tithi->details->tithi_name; ?>
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->tithi->end_time->hour.":".$data_AdvPanchngSunRise->tithi->end_time->minute.":".$data_AdvPanchngSunRise->tithi->end_time->second 
					  			?>
					    	</strong>
						</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->tithi->details->tithi_name; ?></small>
					  </dd>

					  <dt class="col-sm-3 mt-4">Nakshatra</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->nakshatra->details->nak_name; ?> 
					  		</strong>
					  		 upto 
					  		<strong>
					  		 	<?php 
					  				echo $data_AdvPanchngSunRise->nakshatra->end_time->hour.":".$data_AdvPanchngSunRise->nakshatra->end_time->minute.":".$data_AdvPanchngSunRise->nakshatra->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->nakshatra->details->nak_name; ?></small>
					  </dd>

					  <dt class="col-sm-3 mt-4">Yog</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->yog->details->yog_name; ?> 
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->yog->end_time->hour.":".$data_AdvPanchngSunRise->yog->end_time->minute.":".$data_AdvPanchngSunRise->yog->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->yog->details->yog_name; ?> </small>
					  </dd>

					 <dt class="col-sm-3 mt-4">Karan</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  		<?php echo $data_AdvPanchngSunRise->karan->details->karan_name; ?>  
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->karan->end_time->hour.":".$data_AdvPanchngSunRise->karan->end_time->minute.":".$data_AdvPanchngSunRise->karan->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->karan->details->karan_name; ?> </small>
					  </dd>
					</dl>
				</div>	
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Hindu Month and Year</h3>	
				  </div>
				  	<ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Vikram Samvat</h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->vikram_samvat."-".$data_AdvPanchngSunRise->vkram_samvat_name; ?>
    				 		</p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Shaka Samvat</h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->shaka_samvat."-".$data_AdvPanchngSunRise->shaka_samvat_name; ?>
    				 		</p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Paksha</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->paksha ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Ayana</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->ayana ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Purnimanta</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->hindu_maah->purnimanta ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Amanta</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->hindu_maah->amanta ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sun Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sun_sign ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Moon Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_sign ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>	
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Other Yoga</h3>	
				  </div>
				  
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
    				<li class="list-group-item"><?php echo $today['weekday'].",&nbsp;&nbsp;".$today['mday']."&nbsp;".$today['month']."&nbsp;&nbsp;".$today['year']; ?></li>
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4"> Other Panchang Yoga</h6>
    					</div>
    					<div class="col-6">
							  <dd class="col-sm-9">
							  	<p style="margin-bottom: -5px;">
							  		<strong>
							  			<?php echo $data_AdvPanchngSunRise->panchang_yog ; ?>
							  		</strong> 
							   	</p>
							  </dd>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Disha Shool</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->disha_shool ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Nakshatra Shool</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->nak_shool->direction ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Moon Nivash</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_nivas ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>	
			</div>
		</div>		
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="vimshottariDasha">
		<?php 
		 	$currentVimDasha=json_decode($responseData9);
			$currentVimDashaAll=json_decode($responseData10);
			$majorVimDasha=json_decode($responseData11);
			// echo $responseData9."<hr>";
			// echo $responseData10."<hr>";
			// echo $responseData11;
		?>
		<div class="caption text-center">
			<h3 class="display-4">Vimshottari Dasha</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron m-4">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 p-5">
							<h3>What is Vimshottari Dasha ?</h3>
							<p class="mt-4" style="font-size: 20px;">
								Vimshottari Dasha is the most logical and accurate dasha system to predict the event of the past, future, and present of a person’s life such as your marital, career and health predictions. It can predict any event in an astrology chart. Vimshottari holds a fixed cyclic order planet’s Mahadasha. This system works on the basis of Nakshatras. It starts from birth until the end of a native’s life. Mahadasha and Antardasha are the two main categories of Vimshottari where Antardasha gives the more exact time whereas the first Mahadasha is predicted by the Nakshatra of Moon’s transiting at the birth time.

							</p>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/vimshottari_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="row">
			
			<?php 
				if ($currentVimDasha) { ?>
			<div class="col-12">
				<center>
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Vimshottari Dasha order</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>	
				</center>
				<center class="card-header">
					<div class="dasha-head">
						<p class="h4">Maha Dasha</p>
						<p id="current_dasha_major">
							<?php echo "<b>".$currentVimDasha->major->planet."</b> &nbsp;&nbsp;".$currentVimDasha->major->start." to ".$currentVimDasha->major->end  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Antar Dasha</p>
						<p id="current_dasha_minor">
							<?php echo "<b>".$currentVimDasha->minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->minor->start." to ".$currentVimDasha->minor->end  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Prtyantar Dasha</p>
						<p id="current_dasha_sub_minor">
							<?php echo "<b>".$currentVimDasha->sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_minor->start." to ".$currentVimDasha->sub_minor->end  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Sookshm Dasha</p>
						<p id="current_dasha_sub_sub_minor">
							<?php echo "<b>".$currentVimDasha->sub_sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_sub_minor->start." to ".$currentVimDasha->sub_sub_minor->end  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Pran Dasha</p>
						<p id="current_dasha_sub_sub_sub_minor">
							<?php echo "<b>".$currentVimDasha->sub_sub_sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_sub_sub_minor->start." to ".$currentVimDasha->sub_sub_sub_minor->end  ?> 
						</p>
					</div>
				</center>
			</div>
			<?php } ?>
		</div>
		<div class="row">
				<div class="col-12 ml-2 text-center">
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Vimshottari Maha Dasha</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>
					<div class="table-scrollable table-scrollable-borderless mt-2">
						<table class="table table-hover table-light hidden-xs">
							<thead>
								<tr class="card-header">
									<th scope="row">Dasha Planet</th>
									<th scope="row">Start Date</th>
									<th scope="row">End Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($majorVimDasha as $value): ?>
								<tr>
									<td scope="row"><?php echo $value->planet; ?></td>
									<td scope="row"><?php echo $value->start; ?></td>
									<td scope="row"><?php echo $value->end; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>		
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="yoginiDasha">
		<?php 
		 $currentYoginiDasha=json_decode($responseData12);
		$majorYoginiDasha=json_decode($responseData13);
		$subYoginiDasha=json_decode($responseData14);
		// echo $responseData12."<hr>";
		// echo $responseData13."<hr>";
		// echo $responseData14;
		?>
		<div class="caption text-center">
			<h3 class="display-4">Yogini Dasha</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron m-4">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 p-5">
							<h3>What is Yogini Dasha ?</h3>
							<p class="mt-4" style="font-size: 20px;">
								Just like Vimshottari, Yogini Dasha is also an important dasha of Vedic astrology. In this also the Nakshatra dasha is based on the position of the moon. Each is assigned to the Yogini while each has corresponding node or planets. There are a total of 8 Yoginis while Ketu does not play a role here. 36 years is the total period of Yogini Dasha. To interpret Yogini dasha, the strength of the planets are very important.

							</p>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/yogini_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="row">
			
			<?php 
				if ($currentYoginiDasha) { ?>
			<div class="col-12">
				<center>
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Yogini Dasha order</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>	
				</center>
				<center class="card-header">
					<div class="dasha-head">
						<p class="h4">Maha Dasha</p>
						<p id="current_dasha_major">
							<?php echo "<b>".$currentYoginiDasha->major_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->major_dasha->start_date." to ".$currentYoginiDasha->major_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Antar Dasha</p>
						<p id="current_dasha_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_dasha->start_date." to ".$currentYoginiDasha->sub_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Prtyantar Dasha</p>
						<p id="current_dasha_sub_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_dasha->end_date  ?> 
						</p>
					</div>
					<!-- <div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Sookshm Dasha</p>
						<p id="current_dasha_sub_sub_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Pran Dasha</p>
						<p id="current_dasha_sub_sub_sub_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_sub_dasha->end_date  ?> 
						</p>
					</div> -->
				</center>
			</div>
			<?php } ?>
		</div>
		<div class="row">
				<div class="col-12 ml-2 text-center">
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Yogini Maha Dasha</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>
					<div class="table-scrollable table-scrollable-borderless mt-2">
						<table class="table table-hover table-light hidden-xs">
							<thead>
								<tr class="card-header">
									<th scope="row">Dasha Planet</th>
									<th scope="row">Start Date</th>
									<th scope="row">End Date</th>
									<th scope="row">Duration(Years)</th>
									<!-- <th scope="row">Duration(Years)</td> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach($majorYoginiDasha as $value): ?>
								<tr>
									<td scope="row"><?php echo $value->dasha_name; ?></td>
									<td scope="row"><?php echo $value->start_date; ?></td>
									<td scope="row"><?php echo $value->end_date; ?></td>
									<td scope="row"><?php echo $value->duration; ?></td>
									<!-- <td scope="row"><?php echo $value->duration; ?></td> -->
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>	
		<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
		</div><br>
		<div class="caption text-center">
			<h3 class="display-4">Yogini Sub Dasha</h3>
		</div>
		<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
		</div><br>	
		<div class="row m-2">
			<?php foreach ($subYoginiDasha as $majorYogini => $val): ?>
			<div class="col-3 text-center">
				<div class="caption">
					<h3 class="caption-subject">
						<?php echo $val->major_dasha->dasha_name." (".$val->major_dasha->duration." year)"; ?>
					</h3>
					<hr style="border: 1px solid grey">
					<p><?php echo $val->major_dasha->start_date; ?></p>
					<p><?php echo $val->major_dasha->end_date; ?></p>
					<hr style="border: 1px solid grey">									
				</div>
				<div class="table-scrollable table-scrollable-borderless mt-2">
					<table class="table table-hover table-light hidden-xs">
						<thead>
							<tr class="card-header">
								<th scope="row">Dasha Planet</th>
								<th scope="row">Start Date</th>
								<th scope="row">End Date</th>	
							</tr>
						</thead>
						<tbody>
							<?php foreach ($val->sub_dasha as $rows): ?>
							<tr>
								<td scope="row"><?php echo $rows->dasha_name ?></td>
								<td scope="row"><?php echo $rows->start_date ?></td>
								<td scope="row"><?php echo $rows->end_date ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>

	<div class="container" id="charDasha">
		<?php 
		 $currentCharDasha=json_decode($responseData15);
		$majorCharDasha=json_decode($responseData16);
		$subCharDasha=json_decode($responseData17);
		// $subsubCharDasha=json_decode($responseData18);
		// echo $responseData15."<hr>";
		// echo $responseData16."<hr>";
		// echo $responseData17."<hr>";
		// echo $responseData18;
		?>
		<div class="caption text-center">
			<h3 class="display-4">Char Dasha</h3>
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div>
		<section>
			<div class="jumbotron m-4">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 p-5">
							<h3>What is Char Dasha ?</h3>
							<p class="mt-4" style="font-size: 20px;">
								According to Vedic astrology, Jamini Chara dashas are dashas based on signs than planets. They are sign based on time periods. It is also known as Rashi Dasha. Chara’s are used to predict the astrological purpose. The Chara dasha is predicted through the position of Karakas ( 7 Chara Karakas) that is Amatya, Bhratri, Matri, Putra, Gnati and Dara karaka.

							</p>
						</div>
						<div class="col-12 col-md-5 mt-5">
							<img src="<?php echo base_url('axxets/astrology/img/char_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="row">
			
			<?php 
				if ($currentCharDasha) { ?>
			<div class="col-12">
				<center>
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Char Dasha order</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>	
				</center>
				<center class="card-header">
					<div class="dasha-head">
						<p class="h4">Maha Dasha</p>
						<p id="current_dasha_major">
							<?php echo "<b>".$currentCharDasha->major_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->major_dasha->start_date." to ".$currentCharDasha->major_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Antar Dasha</p>
						<p id="current_dasha_minor">
							<?php echo "<b>".$currentCharDasha->sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_dasha->start_date." to ".$currentCharDasha->sub_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Prtyantar Dasha</p>
						<p id="current_dasha_sub_minor">
							<?php echo "<b>".$currentCharDasha->sub_sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_sub_dasha->start_date." to ".$currentCharDasha->sub_sub_dasha->end_date  ?> 
						</p>
					</div>
					<!-- <div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Sookshm Dasha</p>
						<p id="current_dasha_sub_sub_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_dasha->end_date  ?> 
						</p>
					</div>
					<div class="arrow-down">
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="dasha-head">
						<p class="h4">Pran Dasha</p>
						<p id="current_dasha_sub_sub_sub_minor">
							<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_sub_dasha->end_date  ?> 
						</p>
					</div> -->
				</center>
			</div>
			<?php } ?>
		</div>
		<div class="row">
				<div class="col-12 ml-2 text-center">
					<div class="portlet-title margin-bottom-0 m-4">
						<div class="caption">
							<h3 class="display-4">Char Maha Dasha</h3>
							<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
							</div>
						</div>
					</div>
					<div class="table-scrollable table-scrollable-borderless mt-2">
						<table class="table table-hover table-light hidden-xs">
							<thead>
								<tr class="card-header">
									<th scope="row">Dasha Planet</th>
									<th scope="row">Start Date</th>
									<th scope="row">End Date</th>
									<th scope="row">Duration(Years)</th>
									<!-- <th scope="row">Duration(Years)</td> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach($majorCharDasha as $value): ?>
								<tr>
									<td scope="row"><?php echo $value->sign_name; ?></td>
									<td scope="row"><?php echo $value->start_date; ?></td>
									<td scope="row"><?php echo $value->end_date; ?></td>
									<td scope="row"><?php echo $value->duration; ?></td>
									<!-- <td scope="row"><?php echo $value->duration; ?></td> -->
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>	
		<div class="caption text-center">
			<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
			</div>
		</div><br>	
		<div class="row m-2">
			<div class="col-12 text-center">
				<div class="caption">
					<h3 class="caption-subject">
						<?php echo $subCharDasha->major_dasha->sign_name." (".$subCharDasha->major_dasha->duration." )"; ?>
					</h3>
					<hr style="border: 1px solid grey">
					<p><?php echo $subCharDasha->major_dasha->start_date; ?> to
					<?php echo $subCharDasha->major_dasha->end_date; ?></p>
					<hr style="border: 1px solid grey">					
				</div>
				<div class="table-scrollable table-scrollable-borderless mt-2">
					<table class="table table-hover table-light hidden-xs">
						<thead>
							<tr class="card-header">
								<th scope="row">Dasha Planet</th>
								<th scope="row">Start Date</th>
								<th scope="row">End Date</th>	
							</tr>
						</thead>
						<tbody>
							<?php foreach ($subCharDasha->sub_dasha as $rowsChar): ?>
							<tr>
								<td scope="row"><?php echo $rowsChar->sign_name ?></td>
								<td scope="row"><?php echo $rowsChar->start_date ?></td>
								<td scope="row"><?php echo $rowsChar->end_date ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, crimson 10%, orange 100%);background-size:100% 5px ;">
	</div><br>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {    
			$('#btn').click(function() {
			      var options = {
			              pagesplit: true //include this in your code
			      };
			      var pdf = new jsPDF('p','pt', 'a4');
			      pdf.internal.scaleFactor = 2.05;
			      pdf.addHTML($("#content"), 15, 15, options, function() {
			        pdf.save('Kundli.pdf');
			      });
			    });
			});

	</script>
</body>
</html>