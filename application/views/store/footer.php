<footer>
            <div class="footer-area">
                <!--footer-top-area start-->
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="footer-about-us">
                                <div class="footer-about-us-inner">
                                    <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                                       <div class="footer-about-us-thumb">
                                            <img src="<?php echo $footer_product[0]['image'] ? base_url('uploads/' . $footer_product[0]['image']) : base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" />
                                    </div>
                                </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="footer-about-us-content">
                                            <h1>about us</h1>
                                            <p><?php echo config_item('about_us') ?></p>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="footer-contact">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p class="adress">
                                                                    <i class="fa fa-map-marker"></i>
                                                                    <?php echo config_item('company_address'); ?><br>
                                                                    <?php echo config_item('company_city'); ?>
                                                                    <br>
                                                                    <?php echo config_item('company_state'); ?> - 
                                                                    <?php echo config_item('company_zipcode'); ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p class="phone">
                                                                    <i class="fa fa-phone"></i>
                                                                    <span class="mobile">Telephone:
                                                                        <br/><?php echo config_item('phone'); ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p class="email">
                                                                    <i class="fa fa-envelope-o"></i> Email:
                                                                    <br/><?php echo config_item('email'); ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--footer-top-area end-->
                <!--footer-widgets-area start-->
                <div class="footer-widgets-area">
                    <div class="container">
                        <div class="row">
                            <!-- single-footer-widget start -->
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <div class="single-footer-widget">
                                    <h3>My account</h3>
                                    <ul>
                                        <li><a href="<?php echo site_url('member')?>">My Account</a></li>
                                        <li><a href="<?php echo site_url('site/register')?>">Refer & Earn</a></li>
                                        <li><a href="<?php echo site_url('emart/shopping-cart')?>">My Cart</a></li>
                                        <li><a href="<?php echo site_url('emart/contact')?>">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-footer-widget end -->
                            <!-- single-footer-widget start -->
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <div class="single-footer-widget res1">
                                    <h3>Connect with Us</h3>
                                    <ul>
                                        <li><a href="<?php echo site_url('emart/contact')?>">Google Map</a></li>
                                        <li><a href="<?php echo config_item('facebook') ?>">Facebook</a></li>
                                        <li><a href="<?php echo config_item('twitter') ?>">Twitter</a></li>
                                        <li><a href="<?php echo config_item('linkedin') ?>">Linkedin</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-footer-widget end -->
                            <!-- single-footer-widget start -->
                            <div class="col-lg-2 col-md-2 hidden-sm col-xs-12">
                                <div class="single-footer-widget res1">
                                    <h3>Extras</h3>
                                    <ul>
                                        <li><a href="<?php echo site_url('/')?>">Home</a></li>
                                        <li><a href="<?php echo site_url('emart/shop')?>">Shop</a></li>
                                        <li><a href="<?php echo site_url('emart/shop')?>">Grab Deals</a></li>
                                        <li><a href="<?php echo site_url('site/register')?>">Be an Affiliate</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-footer-widget end -->
                            <!-- single-footer-widget start -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget res11">
                                    <h3>Popular Products</h3>
                                    <div class="single-carousel9">
                                        <div>
                                            <?php foreach($random_product as $r){ ?>
                                            <div class="single-prodcut smrgn">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="product-thumb">
                                                            <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $r['id'];?>"><img src="<?php echo $r['image'] ? base_url('uploads/' . $r['image']) : base_url('uploads/default.jpg'); ?>" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                                        <h2 class="product-name"><a href="#"><?php echo $r['prod_name']?></a></h2>
                                                        <div class="price-box res1">
                                                            <p class="old-price"><?php echo config_item('currency'). " ". round($r['prod_price']*1.5,0);?></p>
                                                            <p class="normal-price"><?php echo $r['prod_price']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single-footer-widget end -->
                            <!-- single-footer-widget start -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget res11">
                                    <h3>OPENING TIME</h3>
                                    <div class="store-opening-time">
                                        <p>
                                            <span class="day">Monday - Friday</span>
                                            <span class="time">9:00 - 22:00</span>
                                        </p>
                                        <p>
                                            <span class="day">Saturday</span>
                                            <span class="time">9:00 - 22:00</span>
                                        </p>
                                        <p>
                                            <span class="day">Sunday</span>
                                            <span class="time">9:00 - 22:00</span>
                                        </p>
                                    </div>
                                    <div class="payment">
                                        <label>payment methods</label>
                                        <a href="#"><img src="<?php echo base_url('axxets/shop/img/payment/payment.png')?>" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single-footer-widget end -->
                        </div>
                    </div>
                </div>
                <!--footer-widgets-area end-->
                <!--footer-copyright-area start-->
                <div class="footer-copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer-copyright">
                                    <p class="w3-link"><?php echo footer_note('#ffc107'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--footer-copyright-area end-->
            </div>
    </footer>