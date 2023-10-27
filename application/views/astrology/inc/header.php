<?php 
$user_id = $this->session->user_id;
// $page = current_url();
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>

<!--Navbar Starts -->
<style type="text/css">
	        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 15px;
            right: 15px;
        }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css'); ?>">

<nav class="navbar navbar-expand-lg navbar fixed-top pb-2 card-header" style="background-color:#5cbdb9;" >
	<div class="container">
	  <a class="navbar-brand" href="#" style="color: white;font-size: 16px;">Phone : 012-1234567</a>
	  <form class="form-inline my-2 my-lg-0">
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: 1px solid white">
	    <span  class="fas fa-bars"  style="color: white"></span>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarSupportedContent" >
	    	<ul class="navbar-nav mr-auto">
	      		<li class="nav-item active">
	        		<a class="nav-link" href="<?php echo site_url()?>" style="color: white;">Home <span class="sr-only">(current)</span></a>
	     		</li>
	      		<li class="nav-item mr-2"> <a class="nav-link" href="<?php echo site_url('astrology/about_Us')?>"style="color: white;">About</a> </li>
	      		<li class="nav-item mr-2"> <a class="nav-link" href="<?php echo site_url('astrology/contact_Us')?>"style="color: white;">Contact</a> </li>

	      		<?php if(!$user_id){ 
	      			$page = current_url();
        			$_SESSION['page'] = $page;
	      		?>
	      			<a href="<?php echo site_url('site/login')?>" data-toggle="modal" data-target="#myModal"><button type="button" class="btn  mr-3" style="background-color: white;width: 100px;">Login</button></a>&nbsp;
	      			<a href="<?php echo site_url('site/register')?>"><button type="button" class="btn " style="background-color: white;width: 100px;">Register</button></a>	
	      		<?php } else { ?>
	      			<a href="<?php echo site_url('member/logout')?>"><button type="button" class="btn btn-danger mr-3" style="width: 100px;">Logout</button></a>&nbsp;
	      			<a href="<?php echo site_url('member')?>"><button type="button" class="btn btn-danger" style="width: 115px;">My Account</button></a>
	      		<?php } ?>
	    	</ul>
	  	</div>
	  </form> 
	</div>	  
</nav>

<!--Navbar End -->

<!-- Header starts -->

<header style="margin-top: 70px; height: 60px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<a class="navbar-brand mr-auto" href="<?php echo site_url('astrology/');?>">
            		<!-- <img class="img-fluid" style="height:40px;width: 200px;" src="<?php echo $logo;?>"> -->
            		<img src="<?php echo base_url('axxets/astrology/img/logo.jpg') ?>" 
            		class="img-fluid" style="height:50px;width: 200px;">
        		</a>
			<!-- <img src="<?php echo base_url('axxets/astrology/img/logo.jpg') ?>" height="50"> -->
			</div>
			<div class="col-lg-9 d-none d-sm-block">
				<div class="row">
					<div class="col-lg-2">
						<p>Get Your</p>
						<a href="<?php echo site_url('astrology/free_kundali')?>" style="text-decoration: none;"><h6 style="margin-top: -10px;">FREE KUNDALI</h6>
						</a>
					</div>
					<div class="col-lg-2">
						<p>Get Kundali</p>
						<a href="<?php echo site_url('astrology/data_female')?>" style="text-decoration: none;"><h6 style="margin-top: -10px;">MATCHING</h6></a>
					</div>
					<div class="col-lg-2">
						<p>View Vedic</p>
						<a href="<?php echo site_url('astrology/panchang')?>" style="text-decoration: none;"><h6 style="margin-top: -10px;">PANCHANG</h6></a>
					</div>
					<div class="col-lg-2">
						<p>Get Today's</p>
						<a href="<?php echo site_url('astrology/horoscope_chart'); ?>" style="text-decoration: none;"><h6 style="margin-top: -10px;"><small style="color:red;">*</small>HOROSCOPE</h6></a>
					</div>
					<div class="col-lg-2">
						<p>70+ Pages</p>
						<a href="<?php echo site_url('astrology/kundli_pdf')?>" style="text-decoration: none;"><h6 style="margin-top: -10px;">KUNDALI PDF</h6></a>
					</div>
					<div class="col-lg-2">
						<p>Ask Our</p>
						<a href="<?php echo site_url('astrology/')?>" style="text-decoration: none;"><h6 style="margin-top: -10px;"><small style="color:red;">*</small>ASTROLOGER</h6></a>
					</div>
					
				</div>		
			</div>
		</div>
	</div>
</header>
<!-- Header End -->
<!-- Carousel Starts -->
<section>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('axxets/astrology/img/c1.png') ?>" class="d-block w-100" alt="..." style="height: 300px;">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('axxets/astrology/img/c2.png') ?>" class="d-block w-100" alt="..." style="height: 300px;">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('axxets/astrology/img/c3.png') ?>" class="d-block w-100" alt="..." style="height: 300px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>
<!-- Carousel End -->

