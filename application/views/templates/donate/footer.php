<footer class="site-footer">
			<div class="footer-widgets">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-3">
							<div class="foot-about">
								<h2><a class="foot-logo" href="#"><img src="<?php echo base_url();?>axxets/templates/donate/images/foot-logo.png" alt=""></a></h2>
								<?php echo config_item('about_us') ?>
								<ul class="d-flex flex-wrap align-items-center">
									  <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
									  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
									  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									  <li><a href="#"><i class="fa fa-behance"></i></a></li>
									  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
							<h2>Useful Links</h2>
								<ul>
									 <li><a href="#">Privacy Policy</a></li>
									 <li><a href="#">Become  a Volunteer</a></li>
									 <li><a href="<?php echo site_url('site/register'); ?>">Donate</a></li>
									 <li><a href="#">Causes</a></li>
									 <li><a href="#">News</a></li>
								</ul>
						</div>
						<div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
							<div class="foot-latest-news">
								<h2>Latest News</h2>
								<ul>
									  <li>
											<h3><a href="#">A new cause to help</a></h3>
											<div class="posted-date">MArch 12, 2018</div>
									  </li>

									  <li>
											<h3><a href="#">We love to help people</a></h3>
											<div class="posted-date">MArch 12, 2018</div>
									  </li>

									  <li>
											<h3><a href="#">The new ideas for helping</a></h3>
											<div class="posted-date">MArch 12, 2018</div>
									  </li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
							<div class="foot-contact">
								<h2>Contact</h2>
								<ul>
									<p>
					        	<i class="fa fa-map-marker"></i>
                    <?php echo config_item('company_address'); ?><br>
                    <?php echo config_item('company_city'); ?>
                    <br>
                    <?php echo config_item('company_state'); ?> - 
                    <?php echo config_item('company_zipcode'); ?>
					        </p>
					        <p>
					        	<i class="fa fa-phone"></i>
                    <span class="mobile">Telephone:
                    <br/><?php echo config_item('phone'); ?></span>
					        </p>
					        <p>
					        	<i class="fa fa-envelope-o"></i> Email:
                    <br/><?php echo config_item('email'); ?>
					        </p>			 
								</ul>
							</div>
							<div class="subscribe-form">
							 <form class="d-flex flex-wrap align-items-center">
								  <input type="email" placeholder="Your email">
								  <input type="submit" value="send">
							 </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bar">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<p class="m-0">
								<?php if(config_item('footer_name') != '') { ?>
           							 &copy; <?php echo date('Y') ?> All Rights Reserved by 
        							<?php echo config_item('footer_name') ?>
        							<?php } else { ?>
        							&copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
      							<?php } ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>