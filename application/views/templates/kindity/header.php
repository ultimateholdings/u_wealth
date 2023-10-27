<header class="header_area">
  	<div class="top_menu row m0">
  		<div class="container">
  			<div class="float-left">
  				<ul class="list header_social"  style="padding-top: 10px;">
  					<li style="margin-left:20px;"><a href="#" style="color: black;"><i class="fa fa-facebook"></i></a></li>
  					<li style="margin-left:20px;"><a href="#" style="color: black;"><i class="fa fa-twitter"></i></a></li>
  					<li style="margin-left:20px;"><a href="#" style="color: black;"><i class="fa fa-dribbble"></i></a></li>
  					<li style="margin-left:20px;"><a href="#" style="color: black;"><i class="fa fa-behance"></i></a></li>
  				</ul>
  			</div>
  			<div class="float-right" style="margin-top: 10px">
  				<select class="lan_pack" style="background: #F0F0F0; border: 1px solid 	#E0E0E0;width: 80px;">
  					<option value="1">English</option>
  					<option value="1">Bangla</option>
  					<option value="1">Indian</option>
  					<option value="1">Aus</option>
  				</select>
  				<a class="ac_btn" href="<?php echo site_url('site/login')?>" style="margin-left: 20px;color: black;background: #F0F0F0; border: 1px solid #E0E0E0;width: 120px;">My Account</a>
  				<a class="dn_btn" href="<?php echo site_url('site/register')?>" style="margin-left: 20px;color: black;background: #F0F0F0; border: 1px solid #E0E0E0;width: 120px;">Donate Now</a>
  		  </div>
      </div>	
    </div>
  </header>	
  <hr style="margin-top: -8px;">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
  		<div class="container">
  			<a class="navbar-brand logo_h" href="index.html"><img src="<?php echo base_url();?>axxets/templates/kindity/img/logo.png" alt="" style="height: 40px;"></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>
  						<!-- Collect the nav links, forms, and other content for toggling -->
  			<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
  				<ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('site/App/kindity/index') ?>" style="margin-left: 25px;">Home</a></li> 
  					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('site/App/kindity/gallery') ?>"style="margin-left: 25px;">Gallery</a></li>
  					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('site/App/kindity/about-us') ?>"style="margin-left: 25px;">About</a></li> 
  					<li class="nav-item submenu dropdown">
  					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-left: 25px;">Events</a>
  					  <ul class="dropdown-menu">
  					    <li class="nav-item"style="margin-left: 25px;"><a class="nav-link" href="<?php echo base_url('site/App/kindity/event') ?>">Event</a></li>
  					    <li class="nav-item"style="margin-left: 25px;"><a class="nav-link" href="<?php echo base_url('site/App/kindity/event-details') ?>">Event Details</a></li>
  					  </ul>
  								 
  						<!-- <li class="nav-item submenu dropdown">
  						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style="margin-left: 25px;">Pages</a>
  							<ul class="dropdown-menu">
  								<li class="nav-item"style="margin-left: 25px;"><a class="nav-link" href="elements.html">Elements</a></li>
  								<li class="nav-item"style="margin-left: 25px;"><a class="nav-link" href="donation.html">Donation</a></li>
  							</ul>-->
  					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('site/App/kindity/contact-us') ?>"style="margin-left: 25px;margin-right: 25px;">Contact</a></li> 
  				</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li class="nav-item"><a href="#" class="search"><i class="fas fa-search"></i></a></li>
  				</ul>
  			</div> 
  		</div>
    </nav>
  </div>