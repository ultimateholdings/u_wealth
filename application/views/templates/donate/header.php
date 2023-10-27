<?php
$logo = file_exists(FCPATH ."axxets/client/logo.png") ? base_url().'axxets/client/logo.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>
<header class="site-header">
		<div class="top-header-bar">
			<div class="container">
				<div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
					<div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
						<div class="header-bar-email">
								 MAIL: <?php echo config_item('email'); ?>
						</div>

						<div class="header-bar-text">
								<p>PHONE: <span><?php echo config_item('phone'); ?></span></p>
						</div>
					</div>
					<div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
						<div class="donate-btn">
							 <a href="<?php echo site_url('site/register'); ?>">Donate Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-bar">
			<div class="container">
				<div class="row">
						<div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
							<div class="site-branding d-flex align-items-center">
								<a class="d-block" href="<?php echo site_url('/') ?>" rel="home"><img class="d-block" src="<?php echo $logo ?>" alt="logo"></a>
							</div>
							<nav class="site-navigation d-flex justify-content-end align-items-center">
								 <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
									  <li class="current-menu-item"><a href="<?php echo base_url('site/App/donate/index') ?>">Home</a></li>
									  <li><a href="<?php echo base_url('site/App/donate/about') ?>">About US</a></li>
									  <li><a href="<?php echo base_url('site/App/donate/causes') ?>">Causes</a></li>
									  <li><a href="<?php echo base_url('site/App/donate/news') ?>">News</a></li>
									  <li><a href="<?php echo base_url('site/App/donate/contact') ?>">Contact</a></li>
									  <li><a href="<?php echo site_url('site/login'); ?>" target="_blanlk">Login</a></li>
          					<li><a href="<?php echo site_url('site/register'); ?>" target="_blank">Join Now</a></li>
								 </ul>
							</nav>
							<div class="hamburger-menu d-lg-none">
								 <span></span>
								 <span></span>
								 <span></span>
								 <span></span>
							</div>
						</div>
				</div>
			</div>
		</div>
	</header>