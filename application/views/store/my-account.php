<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My Account || <?php echo config_item('company_name') ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon -->		
        <link rel='icon' href="<?php echo base_url('axxets/favicon.ico')?>" type='image/x-icon'/>
		
		<!--google-fonts-->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400' rel='stylesheet' type='text/css'/>
		<link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css' />
		
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/bootstrap.min.css') ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/animate.css') ?>">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/nivo-slider.css') ?>">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/jquery-ui.min.css') ?>">
    <!-- Image Zoom CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/img-zoom/jquery.simpleLens.css') ?>">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/meanmenu.min.css') ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/owl.carousel.css') ?>">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/font-awesome.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/style.css') ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/responsive.css') ?>">
    <!-- modernizr js -->
    <script src="<?php echo base_url('axxets/shop/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- header start -->
		<header>
            <!-- header-top start -->
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- header-top-left start -->
                            <div class="header-top-left res1">
                                <div class="top-menu lang-select floatleft">
                                    <ul>
                                        <li><a href="#">English <i class="fa fa-angle-down"></i></a>
                                            <ul class="last-change">
                                                <li><a href="#">Bangla</a></li>
                                                <li><a href="#">Arabi</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top-menu money-select floatleft">
                                    <ul>
                                        <li><a href="#">USD <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="#">TKA</a></li>
                                                <li><a href="#">EUR</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="phone-number floatleft"><i class="fa fa-phone"></i>Phone : 123 456  789</div>
                            </div>
                            <!-- header-top-left end -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- header-top-right start -->
                            <div class="header-top-right">
                                <div class="top-menu floatright">
                                    <ul>
                                        <li><a href="#">Account <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">My Wishlist</a></li>
                                                <li><a href="#">My Cart</a></li>
                                                <li><a href="#">Checkout</a></li>
                                                <li><a href="#">Testimonial</a></li>
                                                <li><a href="#">Our Blog</a></li>
                                                <li><a href="#">Log In</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- header-top-right end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top end -->
            <!-- header-bottom start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="header-bottom-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <!--logo start-->
                               <div class="logo r1">
                                    <a href="<?php echo site_url('site/store')?>"><img src="<?php echo base_url();?>axxets/client/logo.png" alt="logo" />
                                    </a>
                                </div>
                                <!--logo end-->
                            </div>
                           <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="mobile-menu-area">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mobile-menu">
                                             <nav id="dropdown">
                                                    <ul class="menu">
                                                        <li><a class="active" href="<?php echo site_url('site/store')?>">home</a>
                                                            <ul class="sub-menu">
                                                                <li><a target="_blank" href="<?php echo site_url('site/store')?>" class="mega-menu-title">Home Version One</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v2')?>">Home Version Two</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v3')?>">Home Version Three</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v4')?>">Home Version Four</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Women</a>
                                                            <ul class="mega-menu mega-menu-two">
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">clothing</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Western wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Party dress</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sports Wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Swim & Beachwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweater</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Skirts</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Ethnic wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sarees</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">kurtas/kurtis</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Lehengas Choli</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">dupatta</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Anarkali suits</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Blouse</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Footwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sandals</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">slippers</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Smart watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Personal care appliances</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">beauty and grooming</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">makeup</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">skincare</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Hair care</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Deodorants & Perfumes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Bath & spa</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Jwellery</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><a  target="_blank" href="<?php echo site_url('emart/shop')?>">Men</a>
                                                            <ul class="mega-menu mega-menu-three">
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Clothing</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">T-shirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">formal wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">pants</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sweater</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">belts</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Seasonal Wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweaters</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Jackets</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweatshirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Rain coats</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Thermals</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Footwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">formal shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Casual shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Boots</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Running shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sandals & Floaters</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Fast track</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">casio</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Titan</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Fossil</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sonata</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="<?php echo site_url('emart/shop')?>">Baby & Kids</a>
                                                            <ul class="sub-menu">
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Remote control toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Educational toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Soft toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">outdoor toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Musical Toys</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Dolls & doll houses</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Puzzels</a></li>
                                                            </ul>
                                                             <ul class="sub-menu">
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">clothing</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">shirts</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">T-shirts</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Froks</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Skirts</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">ethnic wear</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Body suits</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Dresses</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="<?php echo site_url('emart/shop')?>">Home & Furniture</a>
                                                             <ul class="sub-menu">
                                                                <li><a target="_blank"  href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Kitchen,Cookwear & Servewear</a></li>
                                                                <li><a target="_blank"  href="<?php echo site_url('emart/shop')?>">Pans</a></li>
                                                                <li><a target="_blank"  href="<?php echo site_url('emart/shop')?>">Pressure Cooker</a></li>
                                                                <li><a target="_blank"  href="<?php echo site_url('emart/shop')?>">Kitchen tools</a></li>
                                                                <li><a target="_blank"  href="<?php echo site_url('emart/shop')?>">Gas stoves</a></li>
                                                            </ul>
                                                              <ul class="sub-menu">
                                                                <li><a href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Tablewear & Dinnerwear</a></li>
                                                                <li><a href="<?php echo site_url('emart/shop')?>">Coffee Mugs</a></li>
                                                                <li><a href="<?php echo site_url('emart/shop')?>">Dinner sets</a></li>
                                                                <li><a href="<?php echo site_url('emart/shop')?>">Barware</a></li>
                                                            </ul>
                                                                <ul class="sub-menu">
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Furniture</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Beds</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Sofas</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Dinnining Table</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Chairs</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">TV units & Cabinates</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Drawers</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Sofa Beds</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">pages</a>
                                                            <ul class="sub-menu">
                                                                <li><a target="_blank" href="blog.html" class="mega-menu-title">Blog</a></li>
                                                                <li><a target="_blank" href="blog-details.html">blog details</a></li>
                                                                <li><a target="_blank" href="checkout.html">checkout</a></li>
                                                                <li><a target="_blank" href="<?php echo "base_url('site/contact')"?>contact</a></li>
                                                                <li><a target="_blank" href="login.html">login</a></li>
                                                                <li><a target="_blank" href="<?php echo "base_url('site/my-account')"?>my account</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">shop</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shop-list')?>">shop list</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('emart/shopping-cart')?>">shopping cart</a></li>
                                                                <a target="_blank" href="<?php echo site_url('site/single-product')?>">single product</a></li>
                                                                <li> <a target="_blank" href="<?php echo site_url('site/wishlist')?>">wish list</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--mainmenu start-->
                                     <div class="mainmenu">
                                    <nav>
                                        <ul>
                                            <li><a class="active" href="<?php echo site_url('site/store')?>">home</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="<?php echo site_url('site/store')?>" class="mega-menu-title">Home Version One</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v2')?>">Home Version Two</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v3')?>">Home Version Three</a></li>
                                                                <li><a target="_blank" href="<?php echo site_url('site/v4')?>">Home Version Four</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Women</a>
                                                            <ul class="mega-menu mega-menu-two">
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">clothing</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Western wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Party dress</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sports Wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Swim & Beachwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweater</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Skirts</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Ethnic wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sarees</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">kurtas/kurtis</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Lehengas Choli</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">dupatta</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Anarkali suits</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Blouse</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Footwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sandals</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">slippers</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Smart watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Personal care appliances</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">beauty and grooming</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">makeup</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">skincare</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Hair care</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Deodorants & Perfumes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Bath & spa</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Jwellery</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="<?php echo site_url('emart/shop')?>">Men</a>
                                                            <ul class="mega-menu mega-menu-three">
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Clothing</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">T-shirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">formal wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">pants</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sweater</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">belts</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Seasonal Wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweaters</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Jackets</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sweatshirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Rain coats</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Thermals</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('site_urle/shop')?>" class="mega-menu-title">Footwear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">sports shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">formal shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Casual shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Boots</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Running shoes</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sandals & Floaters</a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Watches</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Fast track</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">casio</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Titan</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Fossil</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Sonata</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">Baby & Kids</a>
                                                            <ul class="mega-menu mega-menu-four">
                                                                <li>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Remote control toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Educational toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Soft toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">outdoor toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Musical Toys</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Dolls & doll houses</a>
                                                               <a  target="_blank"  href="<?php echo site_url('emart/shop')?>">Puzzels</a>
                                                            </li>
                                                            <li>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">clothing</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">shirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">T-shirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Froks</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Skirts</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">ethnic wear</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Body suits</a>
                                                                    <a target="_blank" href="<?php echo site_url('emart/shop')?>">Dresses</a>
                                                                </li>
                                                                <li>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>" class="mega-menu-title">Baby Care</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Wipes</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Baby Gift Sets</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Baby food</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Baby Bedding</a>
                                                                <a target="_blank" href="<?php echo site_url('emart/shop')?>">Baby Bathing Accessories</a>
                                                            </li>
                                                            </ul> 
                                                        </li>
                                                        
                                                     
                                            <li><a target="_blank" href="#">pages</a>
                                                <ul class="sub-menu">
                                                    <li><a target="_blank" href="<?php echo site_url('site/blog')?>" class="mega-menu-title">Blog</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/blog-details')?>">blog details</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/checkout')?>">checkout</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/contact')?>">contact</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/login')?>">login</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/my-account')?>">my account</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shop')?>">shop</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shop-list')?>">shop list</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('emart/shopping-cart')?>">shopping cart</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/single-product')?>">single product</a></li>
                                                        <li><a target="_blank" href="<?php echo site_url('site/wish-list')?>"> wish list</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!--mainmenu end-->
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="cart-and-search floatright">
                                    <!--search-box-start-->
                                    <div class="search-box floatleft">
                                        <form action="#">
                                            <input type="text" placeholder="Enter keywords to search... " />
                                            <button><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <!--search-box-end-->
                                    <!--total-cart-start-->
                                    <div class="total-cart floatleft">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>2</span>
                                        </a>
                                        <div class="mini-cart-dropdown">
                                            <div class="single-mini-cart">
                                                <div class="mini-cart-thumb">
                                                   <a href="#"><img src="<?php echo base_url('axxets/shop/img/products/wine-3_2.jpg') ?>" alt="" /></a>
                                                </div>
                                                <div class="mini-cart-content">
                                                    <a href="#" class="product-name">Donec ac tempus</a>
                                                    <span class="mini-cart-quantity">1</span>
                                                    <span>x</span>
                                                    <span class="mini-cart-price">$220</span>
                                                </div>
                                                <div class="cart-item-remove-edit">
                                                    <a href="#" class="edit-item"></a>
                                                    <a href="#" class="remove-item"></a>
                                                </div>
                                            </div>
                                            <div class="single-mini-cart">
                                                <div class="mini-cart-thumb">
                                                      <a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" /></a>
                                                </div>
                                                <div class="mini-cart-content">
                                                    <a href="#" class="product-name">Donec ac tempus</a>
                                                    <span class="mini-cart-quantity">1</span>
                                                    <span>x</span>
                                                    <span class="mini-cart-price">$220</span>
                                                </div>
                                                <div class="cart-item-remove-edit">
                                                    <a href="#" class="edit-item"></a>
                                                    <a href="#" class="remove-item"></a>
                                                </div>
                                            </div>
                                            <div class="single-mini-cart">
                                                <div class="mini-cart-subtotal">
                                                    Subtotal: <span class="price">$1,044.00</span>
                                                </div>
                                            </div>
                                            <div class="mini-cart-action">
                                                <button class="floatleft">view cart <i class="fa fa-angle-right"></i></button>
                                                <button class="floatright">checkout <i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--total-cart-end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-bottom end -->
        </header>
		<!-- header end -->
		 <!-- breadcrumbs-area-area start -->
		 <div class="breadcrumbs-area log">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home <span>></span></a></li>
								<li><a href="#">Wine <span>></span></a></li>
								<li><a href="#">Basics <span>></span></a></li>
								<li><a href="#">shoes <span>></span></a></li>
								<li><span>sandals</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		 </div>
		 <!-- breadcrumbs-area-area end -->
		 <!-- my account content section start -->
		<section class="collapse_area coll2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="check">
                            <h2>My Account </h2>
                        </div>
                        <div class="faq-accordion">
                            <div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed method" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Edit your account information <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" >
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>My Account Information</h2>
                                                <form class="form-horizontal" action="#">
                                                    <fieldset>
                                                        <legend>Your Personal Details</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">First Name </label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Last Name</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">E-Mail</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="email" placeholder="E-Mail">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Telephone</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="tel" placeholder="Telephone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Fax</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" placeholder="Fax">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">
                                                        <div class="pull-left">
                                                            <a class="btn btn-default ce5" href="#">Back</a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change your password   <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>Change Password</h2>
                                                <form class="form-horizontal" action="#">
                                                    <fieldset>
                                                        <legend>Your Password</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" placeholder="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password Confirm</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" placeholder="password confirm">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">
                                                        <div class="pull-left">
                                                            <a class="btn btn-default ce5" href="#">Back</a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">Modify your address book entries   <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                        <div class="easy2">
                                            <h2>Address Book Entries</h2>
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <td class="text-left">
                                                        Farhana hayder (shuvo)
                                                        <br>
                                                        hastech
                                                        <br>
                                                        Road#1 , Block#c
                                                        <br>
                                                        Rampura.
                                                        <br>
                                                        Dhaka
                                                        <br>
                                                        Bangladesh
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-info g6" href="#">Edit</a>
                                                        <a class="btn btn-danger g6" href="#">Delete</a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="buttons clearfix">
                                                <div class="pull-left">
                                                    <a class="btn btn-default ce5" href="#">Back</a>
                                                </div>
                                                <div class="pull-right">
                                                    <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="collap" href="wishlist.html">Modify your wish list   <i class="fa fa-caret-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- my account  content section end -->
		<!--brands-area start-->
		<div class="brands-area">
			<div class="container">
				<div class="brands-inner section-padding">
					<div class="row">
						<div class="brans-carousel">
							<!-- single-brand start -->
							<div class="col-lg-12">
								<div class="single-brand">
									 <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
								</div>
							</div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							<div class="col-lg-12">
								<div class="single-brand">
									  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
								</div>
							</div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							<div class="col-lg-12">
								<div class="single-brand">
									<a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/3.jpg') ?>" alt="" /></a>
								</div>
							</div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							<div class="col-lg-12">
								<div class="single-brand">
									 <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" /></a>
								</div>
							</div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							<div class="col-lg-12">
								<div class="single-brand">
									<a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/5.jpg') ?>" alt="" />
								</div>
							</div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
                                </div>
                            </div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" />
                                    </a>
                                </div>
                            </div>
							<!-- single-brand end -->
							<!-- single-brand start -->
							 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
                                </div>
                            </div>
							<!-- single-brand end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--brands-area end-->
		<!--testimonial-area start-->
		<div class="testimonial-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="testimonial-inner text-center">
							<!--single-testimonial start-->
							<div class="single-testimonial">
								 <div class="testimonial-content-avatar">
                                    <img src="<?php echo base_url('axxets/shop/img/testimonial/1.png')?>" alt="" />
								</div>
								<div class="testimonial-posted-by">
									<span class="testimonial-author">Ms.Maria Carey</span>
									<span class="testimonial-date">February 22, 2016</span>
								</div>
								<a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...	</a>
							</div>
							<!--single-testimonial end-->
							<!--single-testimonial start-->
							<div class="single-testimonial">
								 <div class="testimonial-content-avatar">
                                    <img src="<?php echo base_url('axxets/shop/img/testimonial/1.png')?>" alt="" />
								</div>
								<div class="testimonial-posted-by">
									<span class="testimonial-author">Ms.Maria Carey</span>
									<span class="testimonial-date">February 22, 2016</span>
								</div>
								<a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...	</a>
							</div>
							<!--single-testimonial end-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--testimonial-area end-->
		<!--footer start-->
		<?php include 'footer.php'; ?>
		<!--footer end-->
		
		<!-- all js here -->
		<!-- jquery latest version -->
    <script src="<?php echo base_url('axxets/shop/js/vendor/jquery-1.12.0.min.js') ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('axxets/shop/js/bootstrap.min.js') ?>"></script>
    <!-- nivo slider js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.nivo.slider.pack.js') ?>"></script>
    <!-- jquery.countdown js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.countdown.min.js') ?>"></script>
    <!-- owl.carousel js -->
    <script src="<?php echo base_url('axxets/shop/js/owl.carousel.min.js') ?>"></script>
    <!-- Img Zoom js -->
    <script src="<?php echo base_url('axxets/shop/js/img-zoom/jquery.simpleLens.min.js') ?>"></script>
    <!-- meanmenu js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.meanmenu.js') ?>"></script>
    <!-- jquery-ui js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery-ui.min.js') ?>"></script>
    <!-- wow js -->
    <script src="<?php echo base_url('axxets/shop/js/wow.min.js') ?>"></script>
    <!-- plugins js -->
    <script src="<?php echo base_url('axxets/shop/js/plugins.js') ?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('axxets/shop/js/main.js') ?>"></script>
    </body>
</html>
